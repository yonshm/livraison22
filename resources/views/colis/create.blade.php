@extends('layouts.master')

@section('title', 'Client | Livraison')

@section('content')
<div class="home">
    @include('layouts.sideBar')

    <div class="main pb-5">
        @include('layouts.nav')
        <div class="card right-side mx-lg-3 mt-5">
            <div id="ajouterColi" class="card-body p-3">
                <h4 class="card-title mb-3 text-center">Nouveau colis</h4>
                <span>Rotour List colis</span>
                <form action="{{ route('colis.store') }}" class="mt-2" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="inputDestinataire" class="form-label">Destinataire</label>
                                <input type="text" class="form-control" name="destinataire" id="inputDestinataire"
                                    placeholder="Destinataire">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class=" mb-3">
                                <label for="inputTelephone" class="form-label">Telephone</label>
                                <input type="text" class="form-control" name="telephone" id="inputTelephone" min="10"
                                    max="15" placeholder="Telephone">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Ville</label>
                                <select id="slc-ville" class="form-select" name="id_ville"
                                    aria-label="Default select example">
                                    <option selected="" value="-1">Ville</option>
                                    @foreach ($villes as $ville)
                                        <option value="{{$ville->id}}">{{$ville->nom_ville}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Business</label>
                                <select id="slc-business" class="form-select" name="id_business"
                                    aria-label="Default select example">
                                    <option selected="" value="-1">Business</option>
                                    @foreach ($business as $b)
                                        <option value="{{$b->id}}">{{$b->nom_business}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="inputAdresse" class="form-label">Adresse</label>
                                <input type="text" name="adresse" class="form-control" id="inputAdresse"
                                    placeholder="Adresse">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class=" mb-3">
                                <label for="inputMarchandise" class="form-label">Marchandise</label>
                                <input type="text" name="marchandise" class="form-control" id="inputMarchandise"
                                    placeholder="Marchandise">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class=" mb-3">
                                <label for="inputQuantite" class="form-label">Quantite</label>
                                <input type="number" class="form-control" id="inputQuantite" placeholder="Quantite">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class=" mb-3">
                                <label for="inputPrix" class="form-label">Prix</label>
                                <input type="number" name="prix" step="0.01" class="form-control" id="inputPrix"
                                    placeholder="Prix">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="col-md-6">
                                <div class=" mb-3 ">
                                    <label for="inputCommentaire" class="form-label">Commentaire ( Autre telephone, Date
                                        de livraison,..)</label>
                                    <textarea class="form-control" name="commentaire" id="inputCommentaire" cols="20"
                                        rows="3"
                                        placeholder="Commentaire ( Autre telephone, Date de livraison, ...)"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row my-1">
                        <div class="col-md-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" checked name="ouvrir" id="ouvrirColis">
                                <label class="form-check-label" for="ouvrirColis">
                                    Le colis peut être ouvert
                                </label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="colisRemplacer">
                                <label class="form-check-label" for="colisRemplacer">
                                    Colis a Remplacer
                                </label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="colisDuStock">
                                <label class="form-check-label" for="colisDuStock">
                                    Colis du Stock
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="col-12 mb-2">
                            <div class="d-md-flex align-items-center">
                                <div class="ms-auto d-flex mt-3 gap-10 mt-md-0">
                                    <button type="reset" class="btn bg-danger-subtle text-danger hstack gap-6">
                                        <i class='bx bx-reset fs-7'></i>
                                        Reinitialiser
                                    </button>

                                    <button type="submit" class="btn btn-primary hstack gap-6">
                                        <i class='bx bx-save fs-7'></i>
                                        Enregistrer
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="d-flex align-items-center justify-content-between mt-2">
                        <div class="mb-3">
                            <label for="inputAdresse" class="form-label">Frais de livraison: </label>
                            <span>
                                <span id="fraisLivraison">00.00</span> DH
                            </span>
                        </div>
                        <div class="mb-3">
                            <label for="inputAdresse" class="form-label">Frais de retour: </label>
                            <span>
                                <span id="fraisRetour">00.00</span> DH
                            </span>
                        </div>
                        <div class="mb-3">
                            <label for="inputAdresse" class="form-label">Frais de refus: </label>
                            <span>
                                <span id="fraisRefus">00.00</span> DH
                            </span>
                        </div>
                    </div>
                        <div id="produits-modal" class="card-body col-lg-8 py-4 px-7">
                            <div class="mx-auto w-100" id="modal-body">
                                <div class="table-responsive mb-4 border rounded-1">
                                    <table class="table text-nowrap mb-0 align-middle">
                                        <thead>
                                            <tr>
                                                <th>Produit</th>
                                                <th>SKU</th>
                                                <th>Quantite</th>
                                                <th>Tout</th>
                                            </tr>
                                        </thead>
                                        <tbody id="tbodyProStock">
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div>
                            </div>
                        </div>
                    
                </form>
            </div>
        </div>
    </div>
</div>
     




<script>
    document.addEventListener('DOMContentLoaded', function() {
        let produitStock = [];

        const slc_ville = document.getElementById('slc-ville');
        const fraisLivraison = document.getElementById('fraisLivraison');
        const fraisRetour = document.getElementById('fraisRetour');
        const fraisRefus = document.getElementById('fraisRefus');

        slc_ville.addEventListener('change', () => {
            const id = slc_ville.value;
            fetch('/villes/' + id)
                .then(response => response.json())
                .then(data => {
                    console.log(data);
                    fraisLivraison.innerText = `${data[0].frais_livraison}.00`;
                    fraisRetour.innerText = `${data[0].frais_retour}.00`;
                    fraisRefus.innerText = `${data[0].frais_refus}.00`;
                })
                .catch(err => { console.error(err) })
        })
        const form = document.querySelector('form');
        form.addEventListener('submit', function(event) {
            clearPreviousErrors();
            const destinataire = document.getElementById('inputDestinataire').value.trim();
            const telephone = document.getElementById('inputTelephone').value.trim();
            const commentaire = document.getElementById('inputCommentaire').value.trim();
            const ville = document.getElementById('slc-ville').value.trim();
            const business = document.getElementById('slc-business').value.trim();
            const adresse = document.getElementById('inputAdresse').value.trim();
            const marchandise = document.getElementById('inputMarchandise').value.trim();
            const quantite = document.getElementById('inputQuantite').value.trim();
            const prix = document.getElementById('inputPrix').value.trim();
            const ouvrirColis = document.getElementById('ouvrirColis').checked;

            let valid = true;
            if (!destinataire) {
                valid = false;
                showError('inputDestinataire', 'Le destinataire est requis.');
            }

            if (!telephone || !isValidPhoneNumber(telephone)) {
                valid = false;
                showError('inputTelephone', 'Le téléphone doit comporter 10 chiffres (commençant par 0) ou 9 chiffres (commençant par +212).');
            }

            if (!ville || ville == '-1') {
                valid = false;
                showError('slc-ville', 'Ville est requise.');
            }
            if (!business || business == '-1') {
                valid = false;
                showError('slc-business', 'Business est requise.');
            }
            if (!adresse) {
                valid = false;
                showError('inputAdresse', 'L\'adresse est requise.');
            }

            if (!marchandise) {
                valid = false;
                showError('inputMarchandise', 'La marchandise est requise.');
            }

            if (!quantite || isNaN(quantite) || quantite <= 0) {
                valid = false;
                showError('inputQuantite', 'La quantité doit être un nombre positif.');
            }

            if (!prix || isNaN(prix) || prix <= 0) {
                valid = false;
                showError('inputPrix', 'Le prix doit être un nombre positif.');
            }
      
            if (!valid) {
                event.preventDefault();
            }
        });




        function isValidPhoneNumber(phone) {
            if (phone.startsWith('0') && phone.length === 10 && /^\d{10}$/.test(phone)) {
                return true;
            }

            if (phone.startsWith('+212') && phone.length === 13 && /^\+212\d{9}$/.test(phone)) {
                return true;
            }
            return false;
        }


        function showError(inputId, message) {
            const inputField = document.getElementById(inputId);
            const errorSmall = document.createElement("small");
            errorSmall.classList.add("form-control-feedback", "text-danger");
            errorSmall.textContent = message;
            inputField.parentElement.appendChild(errorSmall);
        }

        
        function clearPreviousErrors() {
            const errorMessages = document.querySelectorAll('.form-control-feedback.text-danger');
            errorMessages.forEach(error => {
                error.remove();
            });
        }
        
        const p = document.getElementById('colisDuStock');
        const modal = document.getElementById('produits-modal');
        p.addEventListener('change', ()=>{
            modal.classList.toggle("afficheModel");
            if (!modal.classList.contains("afficheModel")) {
                document.getElementById('tbodyProStock').innerHTML = "<tr><td></td><td></td><td></td><td></td></tr>";
            }else{
                coliStock();
            }

        })
      
        document.getElementById('slc-business').addEventListener('change', ()=>{
            coliStock()
        })
        function coliStock(){
            const idBusiness = document.getElementById('slc-business').value.trim();
            if(idBusiness && idBusiness != '-1'){
                fetch('/client/stock/produits/business/'+ idBusiness)
                .then(res => res.json())
                .then(data => modal_body(data) )
                .catch(err => console.error(err))
            }else{
                document.getElementById('tbodyProStock').innerHTML = "<tr><td></td><td></td><td></td><td></td></tr>";
            }
        }
        function modal_body(listProduits){
            const tbodyProStock = document.getElementById('tbodyProStock');
            let trs = listProduits.map(p => {
                
            if (p.varainte && p.varainte.length > 0) {
                return p.varainte.map(v => {
                                return `
                                <tr>
                                    <td>${v.nom_varainte}</td>
                                    <td>${v.SKU}</td>
                                    <td>${v.quantite}</td>
                                    <td class="col-2">
                                        <input class="col-8" name="variant[${v.SKU}]" max="${v.quantite}" min="0" type="number" >
                                    </td>
                                </tr>
                                `;
                            }).join('');
            } else {
                    return `
                    <tr>
                        <td> ${p.nom_produit} </td>
                        <td> ${p.SKU} </td>
                        <td> ${p.quantite} </td>
                        <td class="col-2"> 
                            <input class="col-8" name="produit[${p.SKU}]" max="${p.quantite}" min="0" type="number" >
                        </td>
                    </tr>
                    `;
                }
            }).join('');
                tbodyProStock.innerHTML = trs ;
            }


    });
</script>


{{-- <script>
    const slc_ville = document.getElementById('slc-ville');
    const fraisLivraison = document.getElementById('fraisLivraison');
    const fraisRetour = document.getElementById('fraisRetour');
    const fraisRefus = document.getElementById('fraisRefus');

    slc_ville.addEventListener('change', () => {
        const id = slc_ville.value;
        fetch('/villes/' + id)
            .then(response => response.json())
            .then(data => {
                console.log(data);
                fraisLivraison.innerText = `${data[0].frais_livraison}.00`;
                fraisRetour.innerText = `${data[0].frais_retour}.00`;
                fraisRefus.innerText = `${data[0].frais_refus}.00`;
            })
            .catch(err => { console.error(err) })
    })
</script> --}}
@endsection