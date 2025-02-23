@extends('layouts.master2')
@section('content')
    

<style>
    .alert {
    padding: 10px;
    margin: 10px 0;
    border-radius: 5px;
    }

    .alert-success {
      background-color: #d4edda;
      color: #155724;
    }

    .alert-danger {
      background-color: #f8d7da;
      color: #721c24;
    }

    .alert-info {
      background-color: #d1ecf1;
      color: #0c5460;
    }

    
</style>
<div class="home">
  @include('layouts.sideBarModerateur')

<div class="main">
  @include('layouts.nav')


    <div class="card mt-3">
        <div class="card-body">
          <h4 class="card-title">Arrivage</h4>
          <form id="status-form" action="{{ route('update.status') }}" method="POST">
            @csrf
            <div class="row">
              <div class="col-md-12">
                <div class="floating mb-3">
                <input 
              type="text" 
              name="ref" 
              placeholder="Scannez ou tapez le référence" 
              class="form-control" 
              required 
              onkeydown="handleScanner(event)"/>
            </div>
              </div>
            </div>
          </form>
          @error('ref')
          <span style="color: rgb(255, 0, 0);">{{ $message }}</span>
      @enderror
        </div>



      <div class="infos mx-4">

          <div>
              @if(session('success'))
              <div class="alert alert-success">
                  {{ session('success') }}
                </div>
                @endif
                
                @if(session('error'))
            <div class="alert alert-danger">
              {{ session('error') }}
            </div>
    @endif

    @if(session('info'))
    <div class="alert alert-info">
        {{ session('info') }}
    </div>
    @endif
</div>
</div>


{{-- Tables of colis --}}
</div>



@if(session()->has('bonEnvoi'))
<div class="card mt-3">
  <div class="card-body">
    <h4 class="card-title">Bon Envoi Scanée</h4>
    <div class="table-responsive mb-4 border rounded-1 mt-3">
      <table class="table text-nowrap mb-0 align-middle">
        <thead class="text-dark fs-4 table-primary">
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
          <tr>
            <td>
                <div class="ms-3">
                  <h6 class="fs-4 fw-semibold mb-0">{{session('bonEnvoi')->ref}}</h6>
              </div>
            </td>
            <td>
              <p class="mb-0 fw-normal">{{session('bonEnvoi')->date_debut}}</p>
            </td>
            <td>
              <p class="mb-0 fw-normal">{{session('bonEnvoi')->zoneTable->nom_zone}}</p>
            </td>
            <td>
              <span class="badge bg-success-subtle text-success">{{session('bonEnvoi')->arrivee == 1 ? 'reçue' : 'en route'}}</span>
            </td>
            <td>
              <p class="mb-0 fw-normal">{{session('bonEnvoi')->bon_ramassage->count()}}</p>
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
        </tbody>
      </table>
    </div>
  </div>
</div>
@endif
@if(session()->has('colis'))
<div class="card mt-3">
  <div class="card-body">
    <h4 class="card-title">Scan Du Colis</h4>
      <div class="row">
        <div class="col-md-12">
          <div class="floating mb-3">
          <input 
        type="text" 
        name="ref"
        placeholder="Scannez ou tapez le référence du coli" 
        class="form-control" 
        required 
        onkeydown="handleScannerColi(event)"
        id="scanColi"/>
      </div>
        </div>
      </div>
  </div>
</div>
    @error('ref')
    <span style="color: rgb(255, 0, 0);">{{ $message }}</span>
@enderror
<div class="d-flex justify-content-between">
  <!-- First Table -->
  <div class="col-md-6">
    <div class="card mb-3 mt-3 mx-2">
      <div class="card-body">
        <h4 class="card-title">Colis</h4>  
        <div class="table-responsive">  
          <table class="table mb-0">
            <thead class="table-success">
              <tr>
                <th scope="col">Ref</th>
                <th scope="col">Statut</th>
                <th scope="col">Ville</th>
              </tr>
            </thead>
            <tbody>
              @foreach (session('colis') as $item)
                @if (($item->status->nom_status ?? '') == 'expidé') 
                <tr id={{ $item->ref }}>
                      <td>{{ $item->ref }}</td>
                      <td>{{ $item->status->nom_status ?? '' }}</td>
                      <td>{{ $item->ville->nom_ville }}</td>
                  </tr>
                @endif
              @endforeach
            </tbody>
          </table>
        </div> 
      </div> 
    </div> 
  </div>

  <!-- Second Table -->
  <div class="col-md-6">
    <div class="card mb-3 mt-3 mx-2">
      <div class="card-body">
        <h4 class="card-title">Colis Scanée</h4>  
        <div class="table-responsive">  
          <table class="table mb-0">
            <thead class="table-success">
              <tr>
                <th scope="col">Ref</th>
                <th scope="col">Statut</th>
                <th scope="col">Ville</th>
              </tr>
            </thead>
            <tbody id="colisScanned">
              @foreach (session('colis') as $item)
                @if (($item->status->nom_status ?? '') == 'reçue') 
                  <tr id={{ $item->ref }}>
                      <td>{{ $item->ref }}</td>
                      <td>{{ $item->status->nom_status ?? '' }}</td>
                      <td>{{ $item->ville->nom_ville }}</td>
                  </tr>
                @endif
              @endforeach
            </tbody>
          </table>
        </div> 
      </div> 
    </div> 
  </div>
</div>

    
{{-- @if(session()->has('colis') && session('colis')->isNotEmpty())
<div class="card mt-3">
  <div class="card-body">
    <h4 class="card-title">Colis</h4>
    <div class="table-responsive mb-4 border rounded-1 mt-2">
        <table class="table text-nowrap mb-0 align-middle">
            <thead class="text-dark fs-4">
                <tr>
                    <th><h6 class="fs-4 fw-semibold mb-0">Reference</h6></th>
                    <th><h6 class="fs-4 fw-semibold mb-0">Status</h6></th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach(session('colis') as $colisItem)
                    <tr>
                        <td><h6 class="fs-4 fw-semibold mb-0">{{ $colisItem->ref }}</h6></td>
                        <td>
                            <span class="badge text-bg-light text-dark fw-semibold fs-2 gap-1 d-inline-flex align-items-center">
                                <i class="ti ti-clock-hour-4 fs-3"></i> {{$colisItem->status->nom_status ?? ''}}
                            </span>
                        </td>
                        <td>
                            <div class="dropdown dropstart">
                                <a href="javascript:void(0)" class="text-muted" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="ti ti-dots fs-5"></i>
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
@endif

@if(session()->has('colis') && session('colis')->isNotEmpty())
<div class="card mt-3">
  <div class="card-body">
    <h4 class="card-title">Colis</h4>
    <div class="table-responsive mb-4 border rounded-1 mt-2">
        <table class="table text-nowrap mb-0 align-middle">
            <thead class="text-dark fs-4">
                <tr>
                    <th><h6 class="fs-4 fw-semibold mb-0">Reference</h6></th>
                    <th><h6 class="fs-4 fw-semibold mb-0">Status</h6></th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach(session('colis') as $colisItem)
                    <tr>
                        <td><h6 class="fs-4 fw-semibold mb-0">{{ $colisItem->ref }}</h6></td>
                        <td>
                            <span class="badge text-bg-light text-dark fw-semibold fs-2 gap-1 d-inline-flex align-items-center">
                                <i class="ti ti-clock-hour-4 fs-3"></i> {{$colisItem->status->nom_status ?? ''}}
                            </span>
                        </td>
                        <td>
                            <div class="dropdown dropstart">
                                <a href="javascript:void(0)" class="text-muted" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="ti ti-dots fs-5"></i>
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
@endif --}}
</div>
@endif
</div>
</div>
</div>
<script>
  function handleScannerColi(event) {
    if (event.key === 'Enter') { 
        let scannedValue = event.target.value.trim();
        let row = document.getElementById(scannedValue); 
        console.log(scannedValue);
        if(row) {
          let statusCell = row.cells[1];

          fetch('{{route('bonEnv.updateColiStatus')}}',{
          method : 'POST',
          headers : {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
          },
          body: JSON.stringify({ ref: scannedValue })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                statusCell.textContent = "reçue"; 
                document.getElementById('colisScanned').appendChild(row);
            
          console.log(row)
        }else{
           alert("Erreur : " + data.message);
          }
        })
        .catch(error => console.error("Error:", error));
      }else{
        alert("Colis non trouvé !");
      }
        event.target.value = "";
    }
}


  

</script>
@endsection