<style>
    #tableDiv{
        width: 80%;
        margin: 0 auto;
    }
    @media screen and (max-width: 992px){
        #tableDiv{
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
        <div id="tableDiv" class="card-body">
              <h3 class="card-title mb-3">Ajouter Utilisateur</h3>
              <form id="globalForm" action="{{route('utilisateur.store')}}" method="POST">
                @csrf
                <div class="form-body">
                    <div class="row">
                        <div class="col-md-6">
                            <label class="form-label">Nom</label>
                            <div class="mb-3">
                                <input type="text" id="nom" name="nom" class="form-control" placeholder="Nom">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">CIN</label>
                            <div class="mb-3">
                                <input type="text" id="cin" name="cin" class="form-control" placeholder="CIN">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Numero de telephone </label>
                            <div class="mb-3">
                                <input type="text" id="telephone" name="telephone" class="form-control" placeholder="Numero de telephone">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Eemail</label>
                            <div class="mb-3">
                                <input type="email" id="email" name="email" class="form-control" placeholder="Email">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Mot de passe</label>
                            <div class="mb-3">
                                <input type="password" id="password" name="password" class="form-control" placeholder="Mot de passe">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Confirmation de mot de passe</label>
                            <div class="mb-3">
                                <input type="password" id="c_password"  class="form-control" placeholder="Confirmation de mot de passe">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Ville</label>
                            <div class="mb-3">
                                <select id="ville" class="form-select" name="local">
                                    <option selected="" value="">Choisissez ville ...</option>
                                    @foreach ($villes as $ville)
                                    <option value="{{$ville->id}}"> {{$ville->nom_ville}} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Adresse</label>
                            <div class="mb-3">
                                <input type="text" id="adresse" name="adresse" class="form-control" placeholder="Adresse">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Nom du banque</label>
                            <div class="mb-3">
                                <select id="nomBanque" class="form-select" name="id_banque">
                                    <option selected="" value="">Choisissez nom du banque ...</option>
                                    @foreach ($banques as $banque)
                                    <option value="{{$banque->id}}"> {{$banque->nom_banque}} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Numero du compte</label>
                            <div class="mb-3">
                                <input type="text" id="numero_compte" name="numero_compte" class="form-control" placeholder="Numero du compte">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Role</label>
                            <div class="mb-3">
                                <select id="role" class="form-select" name="id_role">
                                    <option selected="" value="">Choisissez role ...</option>
                                    @foreach ($roles as $role)
                                    <option value="{{$role->id}}"> {{$role->nom_role}} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        
                    </div>
                </div>
                <div class="form-actions d-md-flex align-items-center">
                  <div class="d-flex ms-auto gap-6">
                        <button type="reset" class="btn bg-danger-subtle text-danger ">
                          Reset
                        </button>
                        <button type="submit" class="btn btn-success  me-6">
                            Ajouter
                        </button>
                  </div>
                </div>
              </form>
            </div>
    </div>
</div>
<script>


    document.getElementById('globalForm').addEventListener('submit', function(event) {
        event.preventDefault();
        if(dataValid()){
            this.submit();
        }
        });

    function dataValid() {
    const nom = document.getElementById("nom");
    const cin = document.getElementById("cin");
    const telephone = document.getElementById("telephone");
    const email = document.getElementById("email");
    const password = document.getElementById("password");
    const c_password = document.getElementById("c_password");
    const ville = document.getElementById("ville");
    const adresse = document.getElementById("adresse");
    const nomBanque = document.getElementById("nomBanque");
    const numero_compte = document.getElementById("numero_compte");
    const role = document.getElementById("role");

    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    nom.classList.remove("is-invalid");
    cin.classList.remove("is-invalid");
    telephone.classList.remove("is-invalid");
    email.classList.remove("is-invalid");
    password.classList.remove("is-invalid");
    c_password.classList.remove("is-invalid");
    ville.classList.remove("is-invalid");
    adresse.classList.remove("is-invalid");
    nomBanque.classList.remove("is-invalid");
    numero_compte.classList.remove("is-invalid");
    role.classList.remove("is-invalid");

    let isValid = true;

    if (nom.value.trim() === "") {
        nom.classList.add("is-invalid");
        isValid = false;
    }

    if (cin.value.trim() === "") {
        cin.classList.add("is-invalid");
        isValid = false;
    }

    if (telephone.value.trim() === "") {
        telephone.classList.add("is-invalid");
        isValid = false;
    } else if (
        !/^\d{10}$/.test(telephone.value.trim()) &&
        !(
            telephone.value.trim().startsWith("+212") &&
            /^\+212\d{9}$/.test(telephone.value.trim())
        )
    ) {
        telephone.classList.add("is-invalid");
        isValid = false;
    }

    if (email.value.trim() === "" || !emailRegex.test(email.value.trim())) {
        email.classList.add("is-invalid");
        isValid = false;
    }

    if (password.value === "") {
        password.classList.add("is-invalid");
        isValid = false;
    }

    if (c_password.value === "") {
        c_password.classList.add("is-invalid");
        isValid = false;
    } else if (password.value !== c_password.value) {
        password.classList.add("is-invalid");
        c_password.classList.add("is-invalid");
        isValid = false;
    }

    if (ville.value === "") {
        ville.classList.add("is-invalid");
        isValid = false;
    }

    if (adresse.value.trim() === "") {
        adresse.classList.add("is-invalid");
        isValid = false;
    }

    if (nomBanque.value === "") {
        nomBanque.classList.add("is-invalid");
        isValid = false;
    }

    if (
        numero_compte.value.trim() === "" ||
        isNaN(numero_compte.value.trim())
    ) {
        numero_compte.classList.add("is-invalid");
        isValid = false;
    }

    if (role.value.trim() === "") {
        role.classList.add("is-invalid");
        isValid = false;
    }

    return isValid;
}
</script>
@endsection
