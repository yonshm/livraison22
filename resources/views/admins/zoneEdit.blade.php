<style>
    #formAjouterZone{
        width: 55%;
        padding: 32px 48px;
        box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
        position: absolute;
        top: 50 ;
        left: 50%;
        transform: translateX(-50%);
        background-color: #FFF;
        transition: 1s;
    }
    @media screen and (max-width: 992px){
        #formAjouterZone{
            width: 90%;
        }

    }
</style>
@extends('layouts.master')

@section('title', 'Admin | Livraison')

@section('content')
<div class="home">
    @include('layouts.sideBarAdmin')
    
    <form id="formAjouterZone" action="{{ route('zones.update',$zone->id) }}" method="POST">
    @method('PUT')
    @csrf
    <h4 class="card-title mb-5 text-center">Modifier Zone</h4>
    <div class="row">
        <div class="col-md-8">
        <div class="form-floating mb-3">
            <input type="text" name="nom_zone" value="{{old('nom_zone',$zone->nom_zone)}}" class="form-control" id="tb-nzone" placeholder="Enter nom zone">
            <label for="tb-ref">Nom Zone</label>
        </div>
        </div>
        <div class="col-12">
        <div class="d-md-flex align-items-center">
            <div class="ms-auto mt-3 mt-md-0">
            <button type="submit" class="btn btn-success hstack gap-6">
                Modifier
            </button>
            </div>
        </div>
        </div>
    </div>
</form>
@endsection
