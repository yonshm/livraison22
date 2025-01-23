@extends('layouts.master')

@section('title', 'Client | Livraison')

@section('content')
<div class="home">
  @include('layouts.sideBarClient')
  <div class="main">
    <div class="card-body p-3">
      <div class="mb-3 d-flex justify-content-between align-items-center">
        <span id="btn-enregistrer" class="ms-auto btn btn-success mb-0">enregistrer</span>
      </div>
      <div class="table-responsive border rounded">
        <table class="table align-middle text-nowrap mb-0">
          <thead>
            <tr class="text-center">
              <th scope="col">#Code d'envoi</th>
              <th scope="col">Destinataire</th>
              <th scope="col">Date de creation</th>
              <th scope="col">Prix</th>
              <th scope="col">ville</th>
              <th scope="col">Action</th>
              <th scope="col">
                <label for="tout">
                  Tout
                </label>
                <input class="form-check-input primary" type="checkbox" id="tout">
              </th>
            </tr>
          </thead>
          <tbody>
            @if ($noRamasse->isEmpty())
        <tr>
          <td class="text-center" colspan="7">
          No Coli pour ramassage
          </td>
        </tr>

      @else
    @foreach ($noRamasse as $rammasse)
    <tr class="text-center" id="{{$rammasse->id}}">
      <th>
      <h6 class="fw-semibold mb-0 fs-4">
      {{$rammasse->id}}
      </h6>
      </th>
      <td>
      <h6 class="fw-semibold mb-0 fs-4">
      {{$rammasse->destinataire}}
      </h6>
      </td>
      <td>
      <h6 class="fw-semibold mb-0 fs-4">
      {{$rammasse->date_creation}}
      </h6>
      </td>
      <td>
      <h6 class="fw-semibold mb-0 fs-4">
      {{$rammasse->prix}}

      </h6>
      </td>
      <td>
      <h6 class="fw-semibold mb-0 fs-4">
      {{$rammasse->ville->nom_ville}}

      </h6>
      </td>

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
      <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="">
      <li>
        <a class="dropdown-item d-flex align-items-center gap-3" href="">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
        class="icon icon-tabler icons-tabler-outline icon-tabler-edit">
        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
        <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" />
        <path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" />
        <path d="M16 5l3 3" />
        </svg>
        Edit
        </a>
      </li>
      <li>
        <form action="" method="POST">
        @method('DELETE')
        @csrf
        <button class="dropdown-item d-flex align-items-center gap-3">

        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
        class="icon icon-tabler icons-tabler-outline icon-tabler-trash">
        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
        <path d="M4 7l16 0" />
        <path d="M10 11l0 6" />
        <path d="M14 11l0 6" />
        <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
        <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
        </svg>
        Delete
        </button>
        </form>
      </li>
      </ul>
      </div>
      </td>
      <td>
      <input type="checkbox" class="form-check-input primary coli-checked" id="">
      </td>
    </tr>

  @endforeach
  @endif
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <script>
    const tout = document.getElementById('tout');
    const enregistrer = document.getElementById('btn-enregistrer');
    tout.addEventListener('click', () => {
      const checkboxes = document.querySelectorAll('tbody tr td .coli-checked');
      checkboxes.forEach(checkbox => {
        checkbox.checked = tout.checked;
      });
    });

    enregistrer.addEventListener('click', () => {
      const checkboxes = document.querySelectorAll('tbody tr td .coli-checked');
      const colis = [];

      checkboxes.forEach(checkbox => {
        if (checkbox.checked) {
          const tr = checkbox.closest('tr').id;
          colis.push(tr);
          checkboxes.checked = false;
          checkbox.closest('tr').remove();

        }
      });

      console.log(colis);
      fetch(`/client/bon/ramassage/`, {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
          'X-CSRF-TOKEN': '{{ csrf_token() }}',
        },
        body: JSON.stringify({
          'colis': colis
        })
      }).then(response => response.json())
        .then(data => {
          console.log('Success:', data);
        })
        .catch((error) => {
          console.error('Error:', error)
        })
        })
  </script>
  @endsection