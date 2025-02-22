@extends('layouts.master')
@section('content')
    <div class="home ">
      @include('layouts.sideBar')
    <div class="main">
      @include('layouts.navBar')

      <div class="mx-3"> 
        
      <div class="table-cont mx-auto">
        <div class="table-responsive">



          <div class="table-responsive mb-2 border rounded-1 mt-4">
            <table class="table text-nowrap mb-0 align-middle">
              <thead class="text-dark fs-4">
                <tr>
                  <th>
                    <h6 class="fs-4 fw-semibold mb-0">Ref</h6>
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
                  <th scope="col">
                    <label for="tout">
                      Tout
                    </label>
                    <input class="form-check-input primary" type="checkbox" id="tout">
                  </th>
                </tr>
              </thead>
              <tbody>
                @if ($colis->isEmpty())
                <tr>
                <td class="text-center" colspan="10">
                  Aucune colis reçue
                </td>
            </tr>

              @else
                @foreach ($colis as $coli)
                <tr id="{{$coli->ref}}">
                  <td>
                      <div class="ms-3">
                        <h6 class="fs-4 fw-semibold mb-0">{{$coli->ref}}</h6>
                    </div>
                  </td>
                  <td>
                    <p class="mb-0 fw-normal">{{$coli->date_creation}}</p>
                  </td>
                  <td>
                    <p class="mb-0 fw-normal">{{$coli->telephone}}</p>
                  </td>
                  <td>
                    <p class="mb-0 fw-normal">{{$coli->client->nom_magasin ?? $coli->client->nom}}</p>
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
        <div class="d-flex flex-column align-items-end">
          <span id="ajouter-btn" class="ms-auto btn btn-success mb-2 ">Ajouter</span>
        </div>


        <div class="d-flex justify-content-between" style="display: none;">

          <div class="card col-5" id="listLivreurs" style="display: none;">
            <div class="card-body ">
              <h4 class="card-title mb-3">Liste des livreur</h4>
            <ol class="list-group list-group-numbered" id="listeLivreurOl">
              
            </ol>
          </div>
          </div>

        <div>
          <div class="table-responsive mb-2 border rounded-1" >
            <table class="table text-nowrap mb-0 align-middle">
              <thead class="text-dark fs-4">
                <tr>
                  <th>
                    <h6 class="fs-4 fw-semibold mb-0">Reference</h6>
                  </th>
                  <th>
                    <h6 class="fs-4 fw-semibold mb-0">Nom du magasin</h6>
                  </th>
                  <th>
                    <h6 class="fs-4 fw-semibold mb-0">Ville</h6>
                  </th>
                  <th>
                    <h6 class="fs-4 fw-semibold mb-0">Status</h6>
                  </th>
                  <th>
                    <h6 class="fs-4 fw-semibold mb-0">Action</h6>
                  </th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>
                    <div class="d-flex align-items-center">
                      <div class="ms-3">
                        <h6 class="fs-4 fw-semibold mb-0">Sunil Joshi</h6>
                      </div>
                    </div>
                  </td>
                  <td>
                    <div class="d-flex align-items-center">
                      <div class="ms-3">
                        <h6 class="fs-4 fw-semibold mb-0">Sunil Joshi</h6>
                      </div>
                    </div>
                  </td>
                  <td>
                    <p class="mb-0 fw-normal fs-4">Elite Admin</p>
                  </td>
                  <td>
                    <span class="badge bg-success-subtle text-success">Active</span>
                  </td>
                  <td>
                    <div class="d-flex align-items-center">
                      <a href="javascript:void(0)" class="text-bg-secondary text-white fs-6 round-40 rounded-circle me-n2 card-hover border border-2 border-white d-flex align-items-center justify-content-center">
                        S
                      </a>
                      <a href="javascript:void(0)" class="text-bg-danger text-white fs-6 round-40 rounded-circle me-n2 card-hover border border-2 border-white d-flex align-items-center justify-content-center">
                        D
                      </a>
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
          <div class="d-flex flex-column align-items-end">
            <span id="valider-btn" class="ms-auto btn btn-success mb-2 ">Valider</span>
          </div>
        </div>
      </div>



        <div id="primary-header-modal" class="modal fade" tabindex="-1" aria-labelledby="primary-header-modalLabel"
            style="display: none;" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-lg">
              <div class="modal-content">
                <div class="modal-header modal-colored-header bg-primary text-white">
                  <h4 class="modal-title text-white" id="primary-header-modalLabel">
                    Bon Distribution
                  </h4>
                  <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <h5 >Colis selectionnez :<span id="colis-count">0</span></h5>
                  <h5 class="mt-0">Livreur</h5>
                  <div class="row">
                    <div class="mb-3">
                      <select id="livreur" class="form-select" name="id_livreur">
                        <option value="-1">Choisissez livreur ...</option>
                        @foreach($livreur as $liv)
                            <option value={{$liv->id}}>{{$liv->nom}}</option>
                          @endforeach
                        
                      </select>
                    </div>
                  </div>

                </div>
                <div class="modal-footer">
                  <button type="button" id="annuler" class="btn btn-light" data-bs-dismiss="modal">
                    Annuler
                  </button>
                  <button type="submit" id="btn-enregisterBonDistr" class="btn bg-primary-subtle text-primary ">
                    Enregister
                  </button>
                </div>
              </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
          </div>
      </div>
    </div>
  </div>
  <script>
  const tout = document.getElementById('tout');
  const ajouterBtn = document.getElementById('ajouter-btn'); 
  const enregisterBonDistr = document.getElementById('btn-enregisterBonDistr');

  function getSelectedColis() {
    const checkboxes = document.querySelectorAll('tbody tr td .coli-checked');
    const colis = [];
    checkboxes.forEach(checkbox => {
      if (checkbox.checked) {
        colis.push(checkbox.parentElement.parentElement.id);  
      }
    });
    return colis;
  }
  tout.addEventListener('click', () => {
    const checkboxes = document.querySelectorAll('tbody tr td .coli-checked');
    checkboxes.forEach(checkbox => {
      checkbox.checked = tout.checked; 
    });

  });

 
  ajouterBtn.addEventListener('click', () => {
    const colis = getSelectedColis();
    const errorMessages = document.querySelectorAll(".form-control-feedback");
        errorMessages.forEach(msg => msg.remove());  
    if(colis.length === 0){
      showError('ajouter-btn', 'Veuillez selectionner au moins un colis');
    }else{

      document.getElementById('colis-count').innerHTML = colis.length;  
      $('#primary-header-modal').modal('show');
    }

    
  });
  enregisterBonDistr.addEventListener('click', () => {
    const colis = getSelectedColis();
    const livreur = document.getElementById('livreur').value;
    const errorMessages = document.querySelectorAll(".form-control-feedback");
    errorMessages.forEach(msg => msg.remove()); 
    if(livreur == '-1'){
      showError('livreur', 'Veuillez selectionner le livreur');
    }else{
      $('#primary-header-modal').modal('hide');
      let bon = {
        livreur_id: livreur,
        colis_ids: colis
      };

      let bonDistributions = JSON.parse(localStorage.getItem('bon_distribution')) || [];
      bonDistributions.push(bon);
      localStorage.setItem('bon_distribution', JSON.stringify(bonDistributions));

      let unvalidatedColis = JSON.parse(localStorage.getItem('unvalidatedColis')) || [];
      unvalidatedColis.push(colis);
      localStorage.setItem('unvalidatedColis', JSON.stringify(unvalidatedColis));

      const checkedColis = getSelectedColis();
      fillListeLivreur();
        checkedColis.forEach(coliId => {
           const row = document.getElementById(coliId);
           if (row) {
              row.remove();
           }

          });
          const colisList = @json($colis);
          console.log('colis: ',colisList)
          const storedColisRefs = JSON.parse(localStorage.getItem('unvalidatedColis')) || [];
          console.log(storedColisRefs) // Array of refs stored in localStorage
          const filteredColis = colisList.filter(colis => !storedColisRefs == colis.ref);
          console.log(filteredColis)
      }
      });

    function fillListeLivreur() {
      const liste = document.getElementById('listLivreurs');
      const livreurOl = document.getElementById('listeLivreurOl');
      const bonDistributions = JSON.parse(localStorage.getItem('bon_distribution')) || [];
    
    livreurOl.innerHTML = '';
    const livreurs = @json($livreur);
    bonDistributions.forEach(bon => {
      const matchedLivreur = livreurs.find(livreur => livreur.id == bon.livreur_id);
      const livreurName = matchedLivreur ? matchedLivreur.nom : "Inconnu";
      livreurOl.innerHTML += (`
            <li class="list-group-item d-flex justify-content-between align-items-start m-0" id="${bon.colis_ids[0]}">
                <div class="ms-2 me-auto">
                    <div class="fw-bold">${livreurName}</div>
                </div>
                <span class="badge bg-primary">${bon.colis_ids.length}</span>
            </li>
        `);
    });

    // Show list if there are items, otherwise hide
    if (liste) {
        liste.style.display = bonDistributions.length > 0 ? "block" : "none";
    }
}
  window.onload = function() {
      console.log("Window is loaded!");
      // Call your function here
      fillListeLivreur();

  };

  // enregisterBonDistr.addEventListener('click', ()=>{
    
  //   const colis = getSelectedColis();
  //   const livreur = document.getElementById('livreur').value;
  //   console.log(livreur)
    
  //   fetch('{{route('bonDistr.store')}}',{
  //     method : 'POST',
  //     headers : {
  //       'Content-Type': 'application/json',
  //       'X-CSRF-TOKEN': '{{ csrf_token() }}'
  //     },
  //     body : JSON.stringify({
  //       livreur_id : livreur,
  //       colis_ids : colis
  //     })
  //   })
  //   .then(response => response.json())
  //   .then(data => {
  //     // Handle success response
  //     console.log(data);
  //     // Optionally, close the modal and reset the form
  //     // $('#primary-header-modal').modal('hide');
  //     // document.getElementById('distribution-form').reset();
  //     const checkedColis = getSelectedColis();
  //     checkedColis.forEach(coliId => {
  //       const row = document.getElementById(coliId);
  //       if (row) {
  //         row.remove();
  //       }
  //     });
  //   })
  //   .catch(error => {
  //     // Handle error response
  //     console.error('Error:', error);
  //   });
  // });

  // Event listeners for individual checkboxes
  // Event listeners for individual checkboxes



function showError(inputId, message) {
        const inputField = document.getElementById(inputId);
        const errorSmall = document.createElement("small");
        errorSmall.classList.add("form-control-feedback", "text-danger");
        errorSmall.textContent = message;
        inputField.parentElement.appendChild(errorSmall);
    }
</script>

  @endsection
