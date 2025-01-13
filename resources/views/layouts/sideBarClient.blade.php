<div id="sidebar" class="sidebar">
        <!-- Colis :::: -->
        <div class="part">
          <h6>Colis</h6>
          <div class="item">
            <span>1 - Colis</span>
            <ul>
              <li><a href="{{route('colis.create')}}">nouveau coli </a></li>
              <li><a href="{{route('colis.listeColis')}}">liste colis </a></li>
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
              <li><a href="{{route('bon_ramassage.index')}}">liste bons de ramassage </a></li>
              <li><a href="{{route('bon_ramassage.create')}}">ajouter bon de ramassage </a></li>
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
        </div>
      </div>