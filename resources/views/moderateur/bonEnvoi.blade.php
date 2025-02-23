@extends('layouts.master2')
@section('content')
    <div class="home">
      @include('layouts.sideBarModerateur')
    
    <div class="main">
      @include('layouts.nav')
      <div class="mx-3">
        <div class="table-responsive mb-4 border rounded-1 mt-3">
          <table class="table text-nowrap mb-0 align-middle">
            <thead class="text-dark fs-4">
              <tr>
                <th>
                  <h6 class="fs-4 fw-semibold mb-0">Réference</h6>
                </th>
                <th>
                  <h6 class="fs-4 fw-semibold mb-0">Date D'expedition</h6>
                </th>
                <th>
                  <h6 class="fs-4 fw-semibold mb-0">Zone</h6>
                </th>
                <th>
                  <h6 class="fs-4 fw-semibold mb-0">Statut</h6>
                </th>
                <th>
                  <h6 class="fs-4 fw-semibold mb-0">Colis</h6>
                </th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($bonEnvoi as $item)
              <tr>
                <td>
                    <div class="ms-3">
                      <h6 class="fs-4 fw-semibold mb-0">{{$item->ref}}</h6>
                  </div>
                </td>
                <td>
                  <p class="mb-0 fw-normal">{{$item->date_debut}}</p>
                </td>
                <td>
                  <p class="mb-0 fw-normal">{{$item->zoneTable->nom_zone}}</p>
                </td>
                <td>
                  <span class="badge bg-success-subtle text-success">{{$item->arrivee == 1 ? 'reçue' : 'en route'}}</span>
                </td>
                <td>
                  <p class="mb-0 fw-normal">{{$item->bon_ramassage->count()}}</p>
                </td>
                <td>
                  <div class="dropdown dropstart">
                    <a href="javascript:void(0)" class="text-muted" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                      <i class="ti ti-dots-vertical fs-6"></i>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                      <li>
                        <a class="dropdown-item d-flex align-items-center gap-3" href="javascript:void(0)">
                          <i class="fs-4 ti ti-plus"></i>Add
                        </a>
                      </li>
                      <li>
                        <a class="dropdown-item d-flex align-items-center gap-3" href="javascript:void(0)">
                          <i class="fs-4 ti ti-edit"></i>Edit
                        </a>
                      </li>
                      <li>
                        <a class="dropdown-item d-flex align-items-center gap-3" href="javascript:void(0)">
                          <i class="fs-4 ti ti-trash"></i>Delete
                        </a>
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
  
</div>
@endsection