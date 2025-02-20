<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Produit;
use App\Models\Business;
use App\Models\Varainte;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Validation\ValidationException;

class ProduitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $id_client = session('user')->id;
        $business = Business::where('id_utilisateur', $id_client)->get();
        $produits = Produit::with('business')->with(['varainte' => function ($query) {
            $query->where('status', 1);
            $query->whereNotNull('id_responsable');
        }])
        ->where('id_client', $id_client)
        ->where('status', 1)
        ->whereNotNull('id_responsable')
        ->orderByDesc('id')->paginate(5);

        return view('produits.index', compact('produits', 'business'));
    }

    public function getProducts()
    {
        try{

            $id_client = session('user')->id;
            
            
            $produits = Produit::where(['status' => 1, 'id_client' => $id_client])
            ->where(function($query) {
                $query->where('quantite', '>', 0)
                    ->orWhereNull('quantite');
            })
            ->whereNotNull('id_responsable')
            ->with(['varainte' => function($v) {
                $v->where('quantite', '>', 0);
            }])
            ->get();
            
            if ($produits->isEmpty()) {
                return response()->json(['message' => 'No produits'], 404);
            }
            
            return response()->json($produits);

        } catch (Exception $e) {

            return response()->json(['error' => 'Une erreur est survenue lors de la récupération des produits'], 500);
        }

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $id_client = session('user')->id;
        $business = Business::where('id_utilisateur', $id_client)->get();
        return view('produits.create', compact('business'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $id_client = session('user')->id;
        try{

            $request->validate([
                'nom_produit' => 'required|string|max:30',
                'SKU' => 'required|string|max:255|unique:produits,SKU',
                'quantite' => 'required|integer|min:0',
                'note' => 'nullable|string|max:255',
                'id_business' => 'required|exists:businesses,id',
                'variants' => 'nullable|array',
                'variants.*.nom_varainte' => 'required|string|max:20',
                'variants.*.SKU' => 'required|string|max:255|unique:varaintes,SKU',
                'variants.*.quantite' => 'required|integer|min:0',
            ]);
            
            $data = [
                'nom_produit' => $request->nom_produit,
                'SKU' => $request->SKU,
                'quantite' => $request->quantite,
                'id_client' => $id_client,
                'note' => $request->note,
                'status' => 0,
                'id_business' => $request->id_business,
                'status' => 0,
                'id_responsable' => null,
            ];
            $produit = Produit::create($data);
            
            // Create variants ::::::::::::::::::::::
            if ($request->has('variants')) {
                foreach ($request->variants as $variant) {
                    Varainte::create([
                        'nom_varainte' => $variant['nom_varainte'],
                        'SKU' => $variant['SKU'],
                        'quantite' => $variant['quantite'],
                        'id_produit' => $produit->id,
                        'status' => 0,
                        'id_responsable' => null,
                    ]);
                }
            }
            return response()->json([
                'success' => true,
                'message' => 'Produit et variantes créés avec succès.',
                'data' => $produit,
            ], 201);
        }catch (ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Validation error.',
                'errors' => $e->errors(),
            ], 422);

        } catch (QueryException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Erreur de base de données. Veuillez vérifier vos saisies.'
            ], 500);

        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Une erreur s\'est produite. Veuillez réessayer plus tard.'
            ], 500);
        }
        dd($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function inventory(string $id)
    {
        $id_client = session('user')->id;
        $business = Business::where('id_utilisateur', $id_client);
        $produits = Produit::with('varainte')->with('business')->where('id_utilisateur', $id_client)->orderByDesc('id')->paginate(5);
        return view('produits.index', compact('produits', 'business'));
    }
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $id_client = session('user')->id;
        $produit = Produit::findOrFail($id);

        if ($produit->id_client != $id_client) {
            return response()->json(['message' => 'You do not have permission to edit this product.'], 403);
        }

    }


    /**
 * Update the specified resource in storage.
 */
    public function update(Request $request, string $id)
    {
        $id_client = session('user')->id;
        $request->validate([
            'nom_produit' => 'required|string|max:30',
            'SKU' => 'required|string|max:255',
            'quantite' => 'required|integer|min:0',
            'note' => 'nullable|string|max:255',
            'id_business' => 'required|exists:businesses,id',
            'variants' => 'nullable|array',
            'variants.*.nom_varainte' => 'required|string|max:20',
            'variants.*.SKU' => 'required|string|max:255',
            'variants.*.quantite' => 'required|integer|min:0',
        ]);

        $produit = Produit::findOrFail($id);

        if ($produit->id_client != $id_client) {
            return response()->json(['message' => 'You do not have permission to update this product.'], 403);
        }

        $produit->update([
            'nom_produit' => $request->nom_produit,
            'SKU' => $request->SKU,
            'quantite' => $request->quantite,
            'note' => $request->note,
            'id_business' => $request->id_business,
        ]);

        if ($request->has('variants')) {
            foreach ($request->variants as $variant) {
                Varainte::updateOrCreate(
                    ['id' => $variant['id'] ?? null, 'id_produit' => $produit->id],
                    [
                        'nom_varainte' => $variant['nom_varainte'],
                        'SKU' => $variant['SKU'],
                        'quantite' => $variant['quantite'],
                        'status' => 0,
                        'id_responsable' => null,
                    ]
                );
            }
        }

        return response()->json(['message' => 'Product updated successfully!', 'product' => $produit]);
    }


    public function destroy(string $id)
    {
        $id_client = session('user')->id;
        $produit = Produit::findOrFail($id);

        if ($produit->id_client != $id_client) {
            return response()->json(['message' => 'You do not have permission to delete this product.'], 403);
        }
        Varainte::where('id_produit', $produit->id)->delete();

        $produit->delete();

        return response()->json(['message' => 'Product deleted successfully!']);
    }
}
