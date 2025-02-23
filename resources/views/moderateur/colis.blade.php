@extends('layouts.master2')
@section('content')
    <div class="home">
      @include('layouts.sideBarModerateur')
    
    <div class="main">
      @include('layouts.nav')
      <div class="mx-3">
      <div class="acc-filter">
        <div class="colis-filter">
          <div class="accordion mt-3" id="accordionExample">
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                  Filtrer
                </button>
              </h2>
              <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  <form class="mt-4">
                    <div class="form-group">
                      <div class="row">
                        <div class="col-md-4">
                          <div class="">
                            <input type="text" class="form-control" placeholder="Rechercher coli">
                          </div>
                        </div>

                        <div class="col-md-4">
                              <div class="mb-3">
                                <select class="select2 form-control">
                                  <option value="">Etat</option>
                                  <option value="">Option1</option>
                                  <option value="">Option1</option>
                                </select>
                              </div>
                        </div>      
                           


                          <div class="col-md-4">
                            <div class="mb-3">
                              <select class="select2 form-control">
                                <option value="">Status</option>
                                <option value="">Option1</option>
                                <option value="">Option1</option>
                              </select>
                            </div>
                          </div>
                      </div>


                    
                      <div class="row">
                        <div class="col-md-4">
                          <select class="select2 form-control">
                            <option value="">Livreur</option>
                            <option value="">Option1</option>
                            <option value="">Option1</option>
                          </select>
                        </div>

                        <div class="col-md-4">
                          <select class="select2 form-control">
                            <option value="">Dernier mise a jour</option>
                            <option value="">Option1</option>
                            <option value="">Option1</option>
                          </select>
                        </div>

                        <div class="col-md-4">
                          <input type="date" class="form-control" value="2025-01-03">
                        </div>
                      </div>
                  </div>
                  <div class="form-actions mt-3">
                    <div class="d-flex justify-content-end gap-6">
                      <button type="submit" class="btn btn-primary ">
                        Submit
                      </button>
                      <button type="reset" class="btn bg-danger-subtle text-danger ">
                        Reset
                      </button>
                    </div>
                  </div>
                      </div>
                      
                   </div>

                   
                </form>
                </div>
              </div>
            </div>
    </div>
      <div class="table-cont mx-auto">
        <div class="table-responsive">



          <div class="table-responsive mb-4 border rounded-1 mt-4">
            <table class="table text-nowrap mb-0 align-middle">
              <thead class="text-dark fs-4">
                <tr>
                  <th>
                    <h6 class="fs-4 fw-semibold mb-0">Code d'envoi</h6>
                  </th>
                  <th>
                    <h6 class="fs-4 fw-semibold mb-0">Date D'expedition</h6>
                  </th>
                  <th>
                    <h6 class="fs-4 fw-semibold mb-0">Télephone</h6>
                  </th>
                  <th>
                    <h6 class="fs-4 fw-semibold mb-0">Nom du magasin</h6>
                  </th>
                  <th>
                    <h6 class="fs-4 fw-semibold mb-0">Etat</h6>
                  </th>
                  <th>
                    <h6 class="fs-4 fw-semibold mb-0">Statut</h6>
                  </th>
                  <th>
                    <h6 class="fs-4 fw-semibold mb-0">Ville</h6>
                  </th>
                  <th>
                    <h6 class="fs-4 fw-semibold mb-0">Prix</h6>
                  </th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($colis as $coli)
                <tr>
                  <td>
                      <div class="ms-3">
                        <h6 class="fs-4 fw-semibold mb-0">{{$coli->track_number}}</h6>
                    </div>
                  </td>
                  <td>
                    <p class="mb-0 fw-normal">{{$coli->date_creation}}</p>
                  </td>
                  <td>
                    <p class="mb-0 fw-normal">{{$coli->telephone}}</p>
                  </td>
                  <td>
                    <p class="mb-0 fw-normal">{{$coli->client->nom_magasin ?? $coli->utilisateur->nom}}</p>
                  </td>
                  <td>
                    <p class="mb-0 fw-normal">{{$coli->etat == 1 ? 'paye' : 'Non paye'}}</p>
                  </td>
                  <td>
                    <span class="badge bg-success-subtle text-success">{{$coli->status->nom_status ?? ''}}</span>
                  </td>
                  <td>
                    <p class="mb-0 fw-normal">{{$coli->ville->nom_ville}}</p>
                  </td>
                  <td>
                    <p class="mb-0 fw-normal">{{$coli->prix}}</p>
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

    </div>
    
  </div>
@endsection