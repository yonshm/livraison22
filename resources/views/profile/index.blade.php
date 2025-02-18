@extends('layouts.master')

@section('title', 'Client | Livraison')

@section('content')
<div class="home">
    @include('layouts.sideBar')
    <div class="main pb-5">
        @include('layouts.nav')
        <div class="card card-body mx-lg-3 mt-4 py-4">
            <div class="row align-items-center">
                <div class="col-12">
                    <div class="d-sm-flex align-items-center justify-space-between">
                        <h4 class="mb-4 mb-sm-0 card-title">Account Setting</h4>
                        <nav aria-label="breadcrumb" class="ms-auto">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item d-flex align-items-center">
                                    <a class="text-muted text-decoration-none d-flex" href="../main/index.html">
                                        <iconify-icon icon="solar:home-2-line-duotone" class="fs-6"></iconify-icon>
                                    </a>
                                </li>
                                <li class="breadcrumb-item" aria-current="page">
                                    <span class="badge fw-medium fs-2 bg-primary-subtle text-primary">
                                        Account Setting
                                    </span>
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="card right-side mx-lg-3 mt-4">


            <div class="card">
                <ul class="nav nav-pills user-profile-tab" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button
                            class="nav-link position-relative rounded-0 active d-flex align-items-center justify-content-center bg-transparent fs-3 py-3"
                            id="pills-account-tab" data-bs-toggle="pill" data-bs-target="#pills-account" type="button"
                            role="tab" aria-controls="pills-account" aria-selected="true">
                            <!-- icon for mobile -->
                            <span class="d-none d-md-block">Account</span>
                        </button>
                    </li>

                </ul>
                <div class="card-body">
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-account" role="tabpanel"
                            aria-labelledby="pills-account-tab" tabindex="0">
                            <div class="row">
                                <div class="col-lg-6 d-flex align-items-stretch">
                                    <div class="card w-100 border position-relative overflow-hidden">
                                        <div class="card-body p-4">
                                            <h4 class="card-title">Change Profile</h4>
                                            <p class="card-subtitle mb-4">Change your profile picture from here</p>
                                            <div class="text-center">
                                                <img id="profileImage" src={{$utilisateur->img ?? "https://fakeimg.pl/250x250/"}} alt="{{$utilisateur->nom}}"
                                                    class="img-fluid rounded-circle" width="120" height="120">
                                                <div
                                                    class="d-flex align-items-center justify-content-center my-4 gap-6">
                                                    <input type="file" id="imageUpload" accept="image/*" class="d-none"
                                                        onchange="previewImage(event)">
                                                    <button class="btn btn-primary"
                                                        onclick="document.getElementById('imageUpload').click()">Upload</button>
                                                    <button class="btn bg-danger-subtle text-danger"
                                                        onclick="resetImage()">Reset</button>
                                                </div>
                                                <p class="mb-0">Allowed JPG, GIF or PNG. Max size of 800K</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 d-flex align-items-stretch">
                                    <div class="card w-100 border position-relative overflow-hidden">
                                        <div class="card-body p-4">
                                            <h4 class="card-title">Change Password</h4>
                                            <p class="card-subtitle mb-4">To change your password please confirm
                                                here</p>
                                            <form>
                                                <div class="mb-3">
                                                    <label for="exampleInputPassword1" class="form-label">Current
                                                        Password</label>
                                                    <input type="password" class="form-control"
                                                        id="exampleInputPassword1" value="">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="exampleInputPassword2" class="form-label">New
                                                        Password</label>
                                                    <input type="password" class="form-control"
                                                        id="exampleInputPassword2" value="">
                                                </div>
                                                <div>
                                                    <label for="exampleInputPassword3" class="form-label">Confirm
                                                        Password</label>
                                                    <input type="password" class="form-control"
                                                        id="exampleInputPassword3" value="">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="card w-100 border position-relative overflow-hidden mb-0">
                                        <div class="card-body p-4">
                                            <h4 class="card-title">Personal Details</h4>
                                            <p class="card-subtitle mb-4">To change your personal detail , edit and
                                                save
                                                from here</p>
                                            <form id="userForm">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="mb-3">
                                                            <label for="nom" class="form-label">Nom</label>
                                                            <input type="text" class="form-control" id="nom" name="nom"
                                                                value="{{$utilisateur->nom}}">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label">Ville</label>
                                                            <select class="form-select" name="ville" id="ville"
                                                                aria-label="Default select example">
                                                                <option selected="" value="">Select ville ...</option>
                                                                @foreach ($villes as $v)
                                                                    <option
                                                                        value="{{$v->id}} {{ $v->id == $utilisateur->local ? 'selected' : '' }}">
                                                                        {{$v->nom_ville}}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="email" class="form-label">Email</label>
                                                            <input type="email" class="form-control" id="email"
                                                                name="email" value="{{$utilisateur->email ?? ''}}"
                                                                placeholder="info@modernize.com">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="mb-3">
                                                            <label for="nomMagasin" class="form-label">Nom
                                                                magasin</label>
                                                            <input type="text" class="form-control" id="nomMagasin"
                                                                name="nom_magasin" placeholder="Nom magasin"
                                                                value="{{$utilisateur->nom_magasin ?? ''}}">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label">Devise</label>
                                                            <select class="form-select" id="id_banque" name="id_banque"
                                                                aria-label="Default select example">
                                                                <option selected="" value="">Select Devise ...</option>
                                                                @foreach ($monnies as $m)
                                                                    <option
                                                                        value="{{$m->id}} {{ $m->id == $utilisateur->id_banque ? 'selected' : '' }}">
                                                                        {{$m->nom_monnie}}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="tele" class="form-label">Telephone</label>
                                                            <input type="text" class="form-control" id="tele"
                                                                name="telephone"
                                                                value="{{$utilisateur->telephone ?? '' }}"
                                                                placeholder="+212 60000000" 0>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div>
                                                            <label for="adresse" class="form-label">Adresse</label>
                                                            <input type="text" class="form-control" id="adresse"
                                                                value="{{$utilisateur->nom_magasin ?? ''}}"
                                                                placeholder="814 Howard Street, 120065, India">
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div
                                                            class="d-flex align-items-center justify-content-end mt-4 gap-6">
                                                            <button class="btn btn-primary">Save</button>
                                                            <button
                                                                class="btn bg-danger-subtle text-danger">Cancel</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<script>
    // Function to preview the uploaded image

    const imageUpload = document.getElementById('imageUpload');
    function previewImage(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();

            reader.onload = function (e) {
                const imageElement = document.getElementById('profileImage');
                imageElement.src = e.target.result;
            }
            reader.readAsDataURL(file);
        }
    }
    function resetImage() {
        document.getElementById('profileImage').src = "https://fakeimg.pl/250x250/";
        document.getElementById('imageUpload').value = "";
    }


    // Get the form with inputs ::::
    const userForm = document.getElementById('userForm');
    const nom = document.getElementById('nom');
    const email = document.getElementById('email');
    const ville = document.getElementById('ville');
    const telephone = document.getElementById('tele');
    const nomMagasin = document.getElementById('nomMagasin');
    const id_banque = document.getElementById('id_banque');
    const adresse = document.getElementById('adresse');

    userForm.addEventListener('submit', function (e) {
        e.preventDefault();
        const phonePattern = /^\+212\d{9}$/;
        const emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;

        const errorMessages = document.querySelectorAll(".form-control-feedback");
        errorMessages.forEach(msg => msg.remove());

        let valid = true;

        if (!nom.value.trim()) {
            showError("nom", "Nom is required");
            valid = false;
        }

        if (!ville.value) {
            showError("ville", "Please select a Ville");
            valid = false;
        }

        if (!email.value.trim() || !emailPattern.test(email.value)) {
            showError("email", "Please enter a valid email address");
            valid = false;
        }
        if (!telephone.value.trim() || !phonePattern.test(telephone.value)) {
            showError("tele", "Please enter a valid phone number");
            valid = false;
        }

        if (!nomMagasin.value.trim()) {
            showError("nomMagasin", "Nom Magasin is required");
            valid = false;
        }

        if (!id_banque.value) {
            showError("id_banque", "Please select a Devise");
            valid = false;
        }

        if (!adresse.value.trim()) {
            showError("adresse", "Adresse is required");
            valid = false;
        }

        if (valid) {
            userForm.submit();
        }
    });
    function showError(inputId, message) {
        const inputField = document.getElementById(inputId);
        const errorSmall = document.createElement("small");
        errorSmall.classList.add("form-control-feedback", "text-danger");
        errorSmall.textContent = message;
        inputField.parentElement.appendChild(errorSmall);
    }
</script>

@endsection