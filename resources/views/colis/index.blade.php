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
            <form id="formFilter"  method="POST" class="mt-4">
              @csrf
            <div class="form-group">
              <div class="row">
              <div class="col-md-4">
                <div class="">
                <input type="text" name="track_number" class="form-control" placeholder="Rechercher coli">
                </div>
              </div>

              <div class="col-md-4">
                <div class="mb-3">
                <select name="etat" class="select2 form-control">
                  <option value="-1">Etat</option>
                  <option value="0">Non paye</option>
                  <option value="1">Paye</option>
                </select>
                </div>
              </div>



              <div class="col-md-4">
                <div class="mb-3">
                <select name="id_status" class="select2 form-control">
                  <option value="-1">Status</option>
                  @foreach ($status as $s)
                    <option value="{{ $s->id }}">{{ $s->nom_status }}</option>
                  @endforeach
                </select>
                </div>
              </div>
              </div>



              <div class="row">
              <div class="col-md-4">
                <select name="id_ville" class="select2 form-control">
                <option value="-1">Villes</option>
                @foreach ($villes as $v)
                    <option value="{{ $v->id }}">{{ $v->nom_ville }}</option>
                  @endforeach
                </select>
              </div>

              <div class="col-md-4">
                <select id="id_business" name="id_business" class="select2 form-control">
                <option value="-1">Business</option>
                @foreach ($business as $b)
                    <option value="{{ $b->id }}">{{ $b->nom_business }}</option>
                  @endforeach
                </select>
              </div>

              <div class="col-md-4">
                <input type="date" name="date" class="form-control" value="">
              </div>
              </div>
            </div>
            <div class="form-actions mt-3">
              <div class="d-flex justify-content-end gap-6">
              <button type="submit" class="btn btn-primary ">
                Filter
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
        <tbody id="colisTableBody">
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
        <button  class="dropdown-item d-flex align-items-center gap-3">
          <i class='bx bxs-trash fs-7'></i>
          Delete
        </button>
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
      const tr = this.closest('tr')
      deleteColis(tr, tr.id);
      console.log(tr,tr.id)
    })
    });

    const deleteColis = (ele,id) => {
    fetch(`/client/colis/${id}`, {
            method: 'DELETE',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        })
        .then(response => response.json())
        .then(data => {
            console.log(data.message); 
            alert('Colis deleted successfully');
            ele.remove();
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Failed to delete colis');
        });
    };
  </script>

  <script>

  document.getElementById('formFilter').addEventListener('submit', function (e) {
    e.preventDefault();

    const formFilter = new FormData(this);

    fetch("{{ route('colis.listeColis.filter') }}", {
      method: "POST",
      headers: {
        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
      },
      body: formFilter,
    })
    .then(response => response.json())
    .then(data => {
      const tableBody = document.querySelector("#colisTableBody"); 

      tableBody.innerHTML = '';

      data.colis.forEach(coli => {
        const tr = document.createElement('tr');
        tr.id = coli.id;
        tr.classList.add('odd');
        
        tr.innerHTML = `
          <td>${coli.track_number}</td>
          <td>${coli.business.nom_business}</td>
          <td>${coli.destinataire}</td>
          <td>
            <span style="padding: 6px 15px;" class="badge bg-info-subtle text-info">
              ${coli.etat ? 'Paye' : 'Non Paye'}
            </span>
          </td>
          <td>
            ${coli.id_status ?
              `<span style="padding: 6px 15px;" class="badge bg-${coli.status.color}-subtle text-${coli.status.color}">
                ${coli.status.nom_status}
              </span>` :
              `<span style="padding: 6px 15px;" class="badge bg-warning-subtle text-warning">Attender Ramassage</span>`
            }
          </td>
          <td>${coli.ville.nom_ville} - ${coli.adresse}</td>
          <td>${coli.prix} DH</td>
          <td>${coli.marchandise}</td>
          <td>${coli.date_creation}</td>
          <td class="text-center">
            <div class="dropdown dropstart">
              <a href="javascript:void(0)" class="text-muted" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-dots-vertical">
                  <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                  <path d="M12 12m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" />
                  <path d="M12 19m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" />
                  <path d="M12 5m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" />
                </svg>
              </a>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <li><a class="dropdown-item d-flex align-items-center gap-2" href="javascript:void(0)"><i class='bx bx-list-ul fs-7'></i> Suivi</a></li>
                <li><a class="dropdown-item d-flex align-items-center gap-2" target="_blank" href="coli/${coli.id}/ticket"><i class='fs-7 bx bxs-printer'></i> Ticket</a></li>
                <li><a href="colis/edit/${coli.id}" class="dropdown-item d-flex align-items-center gap-3"><i class='bx bxs-edit fs-7'></i> Edit</a></li>
                <li >
                      <button onclick="deleteColis(${this.closest('tr')} , ${coli.id})"  class="dropdown-item d-flex align-items-center gap-3">
                        <i class='bx bxs-trash fs-7'></i>
                        Delete
                      </button>
                  </li>
                </ul>
            </div>
          </td>
        `;

        tableBody.appendChild(tr);
      });
    })
    .catch(error => {
      console.error('Error:', error);
    });
  });
</script>


@endsection