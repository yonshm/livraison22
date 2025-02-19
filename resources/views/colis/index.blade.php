@extends('layouts.master')

@section('title', 'Client | Livraison')

@section('content')
  <div class="home">
    @include('layouts.sideBar')

    <div class="main pb-5">
    @include('layouts.nav')



    <div class="card right-side mx-lg-3 mt-3">
      <div id="ajouterColi" class="card-body p-3">
      <div class="d-flex justify-content-between align-items-center">
        <h4 class="card-title mb-0">Liste des Colis</h4>
        <a href="{{route('colis.create')}}" class="btn btn-success mb-0">Ajouter</a>
      </div>
      </div>
    </div>

    <div class="mx-lg-3">
      <div class="acc-filter">
      <div class="colis-filter">
        <div class="accordion mt-3" id="accordionExample">
        <div class="accordion-item">
          <h2 class="accordion-header">
          <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo">
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
    </div>

    <div class="card right-side mx-lg-3 mt-4">
      <div class="table-responsive border rounded">
      <table id="row_group" class="table w-100 table-striped table-bordered display text-nowrap dataTable"
        aria-describedby="row_group_info">
        <thead>
        <!-- start row -->
        <tr>
          <th>code Suivi</th>
          <th>Expediteur</th>
          <th>Destinataire</th>
          <th>État de Paiement</th>
          <th>Status</th>
          <th>Ville</th>
          <th>prix</th>
          <th>information</th>
          <th>
          <span>D.M.L</span>
          </th>
          <th>action</th>
        </tr>
        <!-- end row -->
        </thead>
        <tbody>
        @if ($colis->isEmpty())
      <tr>
        <td class="text-center" colspan="10">
        Aucune Colis
        </td>
      </tr>

    @else
    @foreach ($colis as $coli)
    <tr id="{{ $coli->id }}" class="odd">
      <td>{{$coli->track_number}}</td>
      <td>{{$coli->business->nom_business}}</td>
      <td>{{$coli->destinataire}}</td>
      <td>
      <span style="padding: 6px 15px;" class="badge bg-info-subtle text-info">
      {{$coli->etat ? 'Paye' : 'Non Paye' }}
      </span>
      </td>
      <td>
      @if ($coli->id_status)
      <span style="padding: 6px 15px;"
      class="badge bg-{{ $coli->status->color }}-subtle text-{{ $coli->status->color }}">
      {{ $coli->status->nom_status }}
      </span>
    @else
      <span style="padding: 6px 15px;" class="badge bg-warning-subtle text-warning">
      Attender Ramassage
      </span>
    @endif
      </td>
      <td>{{$coli->ville->nom_ville}} - {{$coli->adresse}}</td>
      <td>{{$coli->prix}} DH</td>
      <td>{{$coli->marchandise}}</td>
      <td>{{$coli->date_creation}}</td>
      <td class="text-center">
      <div class="dropdown dropstart">
      <a href="javascript:void(0)" class="text-muted" id="dropdownMenuButton" data-bs-toggle="dropdown"
      aria-expanded="false">
      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
      stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
      class="icon icon-tabler icons-tabler-outline icon-tabler-dots-vertical">
      <path stroke="none" d="M0 0h24v24H0z" fill="none" />
      <path d="M12 12m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" />
      <path d="M12 19m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" />
      <path d="M12 5m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" />
      </svg>

      </a>
      <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
      <li>
      <a class="dropdown-item d-flex align-items-center gap-2" href="javascript:void(0)">
      <i class='bx bx-list-ul fs-7'></i>
      Suivi
      </a>
      </li>
      <li>
      <a class="dropdown-item d-flex align-items-center gap-2" target="_blank"
      href="{{ route('coli.ticket', $coli->id) }}">
      <i class='fs-7 bx bxs-printer'></i>
      Ticket
      </a>
      </li>

    <li class="edit-coli">
      <a href="{{ route('colis.edit', $coli->id ) }}" class="dropdown-item d-flex align-items-center gap-3">
          <i class='bx bxs-edit fs-7'></i>
          Edit
      </a>
    </li>
    <li class="delete-coli">
        <a href="javascript:void(0)" class="dropdown-item d-flex align-items-center gap-3">
          <i class='bx bxs-trash fs-7'></i>
          Delete
        </a>
        
      </li>
      </ul>
      </div>
      </td>
    </tr>
  @endforeach
  @endif
        </tbody>

      </table>
      </div>
    </div>
    </div>
  </div>

  <script>
    const deleteColi = document.querySelectorAll('.delete-coli');
    deleteColi.forEach(coli => {
    coli.addEventListener('click', function () {
      console.log("Clicked element:", this);

      console.log("ID:", this.id);
      console.log(this.closest('tr'))
      deleteColis(id)
    })
    });

    const deleteColis = (id) => {
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    fetch(`/client/colis/${id}`, {
            method: 'DELETE',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrfToken,
            },
        })
        .then(response => response.json())
        .then(data => {
            console.log(data.message); 
            alert('Colis deleted successfully');
            window.location.reload();
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Failed to delete colis');
        });
    };
  </script>

@endsection