@extends('layouts.master')

@section('title', 'Admin | Livraison')

@section('content')
<div class="home">
    @include('layouts.sideBarAdmin')
    
    <div class="main">
        <div class="card right-side">
            <div class="card-body">
                <div class="mb-3 d-flex justify-content-between align-items-center">
                    <h4 class="card-title mb-0">Liste des Villes</h4>
                    <a href="{{route('utilisateur.create')}}" class="btn btn-success mb-0">Ajouter</a>
                </div>
                <div class="table-responsive">
                  <table id="row_group" class="table w-100 table-striped table-bordered display text-nowrap dataTable" aria-describedby="row_group_info">
                    <thead>
                      <!-- start row -->
                      <tr>
                        <th>Photo</th>
                        <th>Information</th>
                        <th>Role</th>
                        <th>Date de creation</th>
                        <th>Crear Par</th>
                        <th>action</th>
                    </tr>
                    <!-- end row -->
                    </thead>
                    <tbody id="tbody">
                        @foreach ($utilisateurs as $user)
                            <tr class="odd" style="vertical-align: middle">
                                <td class="text-center">
                                    <img height="100" src="https://fakeimg.pl/450x450/" alt="{{$user->nom}}">
                                </td>
                                
                                <td class="text-dark fw-semibold">
                                    <ul>
                                        <li> Nom : {{$user->nom}}</li>
                                        <li>CIN : {{$user->cin}}</li>
                                        <li>Telephone : {{$user->telephone}}</li>
                                        <li>Email : {{$user->email}}</li>
                                        <li>Ville : {{$user->ville->nom_ville}} - {{$user->adresse}}</li>
                                    </ul>
                                </td>
                                <td class="text-center text-dark fw-semibold">
                                    {{$user->role->nom_role}}
                                </td>
                                <td>
                                </td>
                                <td>
                                </td>
                                <td class="text-center">
                                    <div class="dropdown dropstart">
                                        <a href="javascript:void(0)" class="text-muted" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                            <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  
                                                        stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  
                                                        class="icon icon-tabler icons-tabler-outline icon-tabler-dots-vertical">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                                        <path d="M12 12m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" />
                                                        <path d="M12 19m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" />
                                                        <path d="M12 5m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" />
                                            </svg>

                                        </a>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="">
                                            <li>
                                                <a class="dropdown-item d-flex align-items-center gap-3" href="{{route('utilisateur.edit', $user->id)}}">
                                                    <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-edit"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" /><path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" /><path d="M16 5l3 3" /></svg>
                                                        Edit
                                                </a>
                                            </li>
                                            <li>
                                                <form  action="{{route('utilisateur.destroy', $user->id)}}" method="POST">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button class="dropdown-item d-flex align-items-center gap-3">

                                                        <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-trash"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 7l16 0" /><path d="M10 11l0 6" /><path d="M14 11l0 6" /><path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" /><path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" /></svg>
                                                            Delete
                                                    </button>
                                                </form>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    </table>
                </div>
            </div>
            {{ $utilisateurs->links('pagination::bootstrap-5') }}
        </div>
    </div>
</div>
<script>

</script>
@endsection
