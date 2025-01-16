<style>
    #formAjouterProduit{
        width: 55%;
        padding: 32px 48px;
        box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
        position: absolute;
        top: -130%;
        left: 50%;
        transform: translateX(-50%);
        background-color: #FFF;
        transition: 1s;
        visibility: hidden;
    }
    .showForm{
        top: 50 !important;
        visibility: visible !important;
    }
    @media screen and (max-width: 992px){
        #formAjouterProduit{
            width: 90%;
        }

    }
</style>

@extends('layouts.master')

@section('title', 'Admin | Livraison')

@section('content')
<div class="home">
    @include('layouts.sideBarAdmin')
    
    <div class="main">
        <div class="card right-side">
            <div class="card-body">
                <div class="mb-3 d-flex justify-content-between align-items-center">
                <h4 class="card-title mb-0">Liste des produits</h4>
                <span id="ajouterProduit" class="btn btn-success mb-0">Ajouter</span>
              </div>
                <div class="table-responsive">
                  <table id="row_group" class="table w-100 table-striped table-bordered display text-nowrap dataTable" aria-describedby="row_group_info">
                    <thead>
                      <!-- start row -->
                      <tr class="text-center">
                        <th>image Produit</th>
                        <th>Nom Produit</th>
                        <th>Varainte</th>
                        <th>SKU</th>
                        <th>Quantite</th>
                        <th>Nom business</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    <!-- end row -->
                  </thead>
                  <tbody>
                      @foreach ($produits as $p)
                            <tr class="odd text-center">
                                <td class="text-center" style="vertical-align: middle">
                                    <img height="100" src="https://fakeimg.pl/450x450/" alt="{{$p->nom_produit}}">
                                </td>
                                <td class="text-center" style="vertical-align: middle" >{{$p->nom_produit}}</td>
                                <td style="vertical-align: middle" >
                                    <ul>
                                        @foreach ($p->varainte as $v)
                                        <li class="py-1"> {{$v->nom_varainte}}</li>
                                        @endforeach
                                    </ul>
                                </td>
                                <td style="vertical-align: middle" >
                                    <ul>
                                        @foreach ($p->varainte as $v)
                                        <li class="py-1"> {{$v->SKU}}</li>
                                        @endforeach
                                    </ul>
                                </td>
                                <td style="vertical-align: middle" >
                                    <ul>
                                        @foreach ($p->varainte as $v)
                                        <li class="py-1"> {{$v->quantite}}</li>
                                        @endforeach
                                    </ul>
                                </td>
                                <td style="vertical-align: middle" >{{$p->business->nom_business}}</td>
                                <td class="text-center" style="vertical-align: middle" >{{ $p->status ? 'Recu' : 'No Recu' }}</td>
                                <td class="text-center" style="vertical-align: middle">
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
                                        <a class="dropdown-item d-flex align-items-center gap-3" href="{{route('produit.edit', $p->id)}}">
                                          <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-edit"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" /><path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" /><path d="M16 5l3 3" /></svg>
                                            Edit
                                        </a>
                                      </li>
                                      <li>
                                        <form  action="{{route('produit.destroy', $p->id)}}" method="POST">
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
                    {{ $produits->links('pagination::bootstrap-5') }}
              </div>       
            </div>
        </div>
    </div>
</div>


<form id="formAjouterProduit" action="{{ route('villes.store') }}" method="POST">
    @csrf
    <h4 class="card-title mb-5 text-center">Ajouter du Produit</h4>
    <div class="row">
        <div class="col-md-6">
            <div class="form-floating mb-3">
                <input type="text" name="nom_produit" class="form-control" id="nomProduit" placeholder="Nom Produit">
                <label for="nomProduit">Nom Produit</label>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-floating mb-3">
                <input type="text" name="SKU" class="form-control" id="sku" placeholder="Ref du produit">
                <label for="sku">#Ref du produit</label>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-floating mb-3">
                <input type="number" name="quantite" value="0" class="form-control" id="qte" placeholder="Quantite">
                <label for="qte">Quantite</label>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-floating mb-3">
                <input type="text" name="note" class="form-control" id="note" placeholder="Enter frais retour">
                <label for="note">Note</label>
            </div>
        </div>

        <div class="col-md-6 mx-auto">
            <div class="mb-3">
                <select id="zone" class="form-select" name="id_zone">
                    <option selected="">Choisissez une business ...</option>
                    @foreach ($business as $b)
                        <option value="{{$b->id}}">{{$b->nom_business}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="mb-3">
            <button onclick="education_fields();" class="btn btn-success fw-medium" type="button">
                <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  
                    fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  
                    class="icon icon-tabler icons-tabler-outline icon-tabler-plus"><path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                    <path d="M12 5l0 14" /><path d="M5 12l14 0" /></svg>
                    Ajouter variante
            </button>
        </div>
        <div id="education_fields">

        </div>
        <div class="col-12">
        <div class="d-md-flex align-items-center">
           <div class="d-flex gap-6 ms-auto mt-3 mt-md-0">
                <button id="annuler" type="reset" class="btn bg-danger-subtle text-danger hstack gap-6">
                    Annuler
                </button>
                <button type="submit" class="btn btn-primary hstack gap-6">
                    Ajouter
                </button>
            </div>
        </div>
        </div>
    </div>
</form>

<script>
    const ajouterProduit = document.getElementById('ajouterProduit');
    const annuler = document.getElementById('annuler');
    const formAjouterVille = document.getElementById('formAjouterVille');
    ajouterProduit.addEventListener('click', () => {
        formAjouterProduit.classList.add('showForm')
    })
    annuler.addEventListener('click', () => {
        formAjouterProduit.classList.remove('showForm')
    })
    formAjouterProduit.addEventListener('submit', function (event) {
        event.preventDefault();
        if (dataValid()){
            this.submit();
        }
    })


    let room = 1;
    function education_fields() {
    room++;
    let objTo = document.getElementById("education_fields");
    let divtest = document.createElement("div");
    divtest.setAttribute("class", "mb-3 removeclass" + room);
    let rdiv = "removeclass" + room;
    divtest.innerHTML =
        `<form class="row">
            <div class="col-sm-4 mb-3">
                <div class="form-group">
                    <input type="text" class="form-control" id="nom_varainte" name="nom_varainte" placeholder="Nom varainte"></div>
                </div>
                <div class="col-sm-4 mb-3"> <div class="form-group">
                    <input type="text" class="form-control" id="sku" name="SKU" placeholder="SKU">
                </div>
            </div>
            <div class="col-sm-3 mb-3">
                <div class="form-group">
                    <input type="number" class="form-control" id="qte" name="quantite" placeholder="Quantite">
                </div>
            </div>
            <div class="col-sm-1">
                <div class="form-group">
                    <button class="btn btn-danger" type="button" onclick="remove_education_fields('${room}' );">
                        <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-minus"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 12l14 0" /></svg>
                    </button>
                </div>
            </div>
            </form>`;

    objTo.appendChild(divtest);
    }

    function remove_education_fields(rid) {
    var elements = document.querySelectorAll('.removeclass' + rid);
    elements.forEach(function(element) {
        element.remove();
    });
    }

</script>

@endsection