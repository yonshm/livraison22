<x-layout>
<div class="body-wrapper">
  <div class="container-fluid">
    <div class="row">
      {{$clients}}
      <h1 class="text-center">Liste de les clients</h1>
      <div class="product-list col-lg-12">
        <div class="card">
          <div class="card-body p-3">
            <div class="table-responsive border rounded">
      
            <table class="table align-middle text-nowrap mb-0">
                    <thead>
                      <tr class="text-center">
                          <th scope="col">#</th>
                          <th scope="col">Nom</th>
                          <th scope="col">CIN</th>
                          <th scope="col">Telephone</th>
                          <th scope="col">Email</th>
                          <th scope="col">Adresse</th>
                          <th scope="col">Bank</th>
                          <th scope="col">Numero Compte</th>
                          <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($clients as $clt)
                          <tr class="text-center">
                              <th>#</th>
                              <td>
                                <h6 class="fw-semibold mb-0 fs-4">
                                  {{$clt->nom}}
                                </h6>
                              </td>
                              <td>
                                <h6 class="fw-semibold mb-0 fs-4">
                                  {{$clt->cin}}
                                </h6>
                              </td>
                              <td>
                                <h6 class="fw-semibold mb-0 fs-4">
                                  {{$clt->telephone}}
                                </h6>
                              </td>
                              <td>
                                <h6 class="fw-semibold mb-0 fs-4">
                                  {{$clt->email}}
                                </h6>
                              </td>
                              <td>
                                <h6 class="fw-semibold mb-0 fs-4">
                                  {{$clt->ville->nom_ville}} - {{$clt->adresse}}
                                </h6>
                              </td>
                              <td>
                                <h6 class="fw-semibold mb-0 fs-4">
                                  {{$clt->banque->nom_banque}}
                                </h6>
                              </td>
                              <td>
                                <h6 class="fw-semibold mb-0 fs-4">
                                  {{$clt->numero_compte}}
                                </h6>
                              </td>
                              <td>
                                <button class="btn btn-primary">Show</button>
                                <button class="btn btn-success">Edit</button>
                                <button class="btn btn-danger">
                                  <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  
                                        fill="none"  stroke="currentColor"  stroke-width="1.75"  stroke-linecap="round"  stroke-linejoin="round"  
                                        class="icon icon-tabler icons-tabler-outline icon-tabler-trash"><path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                        <path d="M4 7l16 0" /><path d="M10 11l0 6" /><path d="M14 11l0 6" /><path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                                        <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" /></svg>
                                </button>
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
</div>

    <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>
</x-layout>