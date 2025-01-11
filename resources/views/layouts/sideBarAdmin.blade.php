        <div id="sidebar" class="sidebar">
            <div class="d-flex align-items-stretch">
              <div class="card w-100">
                <div class="card-body p-0">
                  <div class="mb-4">
                    <h4 class="card-title mb-0">Menu</h4>
                  </div>
                  <div class="accordion accordion-flush" id="accordionFlushExample">
                    {{-- Start Row --}}
                    <div class="accordion-item">
                      <h2 class="accordion-header" id="flush-headingOne">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                          Parametres
                        </button>
                      </h2>
                      <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample" style="">
                          <ul class="accordion-body py-0">
                            <li><a href="{{route('villes.index')}}">villes</a></li>
                            <li><a href="{{route('zones.index')}}">zones</a></li>
                            <li><a href="{{route('villes.index')}}">options</a></li>
                            <li><a href="{{route('villes.index')}}">SMS</a></li>
                            <li><a href="{{route('villes.index')}}">E-mail</a></li>
                          </ul>
                      </div>
                    </div>
                    {{-- End Row --}}
                  </div>
                </div>
              </div>
            </div>


          <!-- Colis :::: -->
          {{-- <div class="part">
            <h6>Colis</h6>
            <div class="item">
              <span>1 - Colis</span>
              <ul>
                <li><a href="{{route('colis.create')}}">nouveau coli </a></li>
                <li><a href="{{route('colis.indexByClient')}}">liste colis </a></li>
                <li><a href="{{route('colis.colisAttenderRamassage')}}">colis pour ramasage </a></li>
                <li><a href="{{route('colis.colisNonExpedies')}}">colis non expedies </a></li>
              </ul>
            </div>
            <div class="item">
              <span>2 - Gestion d'inventaire</span>
              <ul>
                <li><a href="#">Ajouter Produit </a></li>
                <li><a href="#">Inventaire </a></li>
              </ul>
            </div>
          </div>
  
          <!-- Bons Et Factures :::: -->
          <div class="part">
            <h6>Bons Et Factures</h6>
            <div class="item">
              <span>1 - Bons de ramassage</span>
              <ul>
                <li><a href="#">liste bons de ramassage </a></li>
                <li><a href="#">ajouter bon de ramassage </a></li>
              </ul>
            </div>
            <div class="item">
              <span>2 - Bons de retour</span>
              <ul>
                <li><a href="#">liste bons de retour </a></li>
                <li><a href="#">ajouter bon de retour </a></li>
              </ul>
            </div>
            <div class="item">
              <span>3 - Liste Factures</span>
            </div>
          </div>
          <!-- Utilite -->
          <div class="part">
            <h6>Utilite</h6>
            <div class="item">
              <span>1 - utilisateurs</span>
            </div>
            <div class="item">
              <span>2 - Supports</span>
            </div>
          </div> --}}

</div>


