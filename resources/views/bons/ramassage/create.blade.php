@extends('layouts.master')

@section('title', 'Client | Livraison')

@section('content')
<div class="home">
    @include('layouts.sideBarClient')

    <div class="main">
      <div class="card-body p-3">
                <div class="mb-3 d-flex flex-column justify-content-between align-items-center gap-6">
                  @if (count($noRamasse) > 0)
                    <span class="badge  bg-info-subtle text-info py-2 px-3 mb-3"> ( {{count($noRamasse)}} ) Colis Pret la preparation</span>
                  @endif
                    <a href="{{route('bon_ramassage.create')}}" class="btn btn-success mb-0">Ajouter bon ramassage</a>
                </div>
        
        {{$noRamasse}}
    </div>
</div>
@endsection
