<!DOCTYPE html>
<html lang="en" dir="ltr" data-bs-theme="light" data-color-theme="Blue_Theme" data-layout="vertical">

<head>
  <!-- Required meta tags -->
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="{{asset('css/global_styles.css')}}" />
  <title>App | Livraison</title>
</head>

<body class="data-sidebartype='full'">
  <div id="main-wrapper" class="d-flex">
    <div class="position-relative overflow-hidden radial-gradient min-vh-100 w-100">
      <div class="position-relative z-index-5">
        <div class="row gx-0">

          <div class="col-lg-6 col-xl-5 col-xxl-4">
            <div class="min-vh-100 bg-body row justify-content-center align-items-center p-5">
              <div class="col-12 auth-card">
                <a href="/" class="text-nowrap logo-img d-block w-100">
                  <img src="{{asset('images/logos/logo-icon.svg')}}" class="dark-logo" alt="Logo-Dark" />
                </a>
                <h2 class="mb-2 mt-4 fs-7 fw-bolder">Sign Up</h2>
                <p class="mb-9">Your Admin Dashboard</p>
                <form action="{{ route('register') }}" method="POST">
                  @csrf
                  <div class="mb-3">
                    <label for="inputNom" class="form-label">Nom</label>
                    <input type="text" name="nom" class="form-control" value="{{old('nom')}}" id="inputNom"
                      aria-describedby="emailHelp" />
                  </div>
                  <div class="mb-3">
                    <label for="inputEmail1" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" value="{{old('email')}}" id="inputEmail1"
                      aria-describedby="emailHelp" />
                  </div>
                  <div class="mb-4">
                    <label for="inputPassword1" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="inputPassword1" />
                  </div>
                  <div class="mb-4">
                    <label for="inputPassword2" class="form-label">Confirm Password</label>
                    <input type="password" name="password_confirmation" class="form-control" id="inputPassword2" />
                  </div>
                  <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <div class="form-check">
                      <input class="form-check-input primary" type="checkbox" value="" id="flexCheckChecked" checked />
                      <label class="form-check-label text-dark" for="flexCheckChecked">
                        Keep me logged in
                      </label>
                    </div>
                  </div>
                  <button type="submit" class="btn btn-primary w-100 py-8 mb-4 rounded-2">Sign Up</button>
                  <div class="d-flex align-items-center justify-content-center">
                    <p class="fs-4 mb-0 fw-medium">Already have an Account?</p>
                    <a class="text-primary fw-medium ms-2" href="{{route('login')}}">Sign in Now</a>
                  </div>
                </form>
              </div>
            </div>
          </div>

          <div class="col-lg-6 col-xl-7 col-xxl-8 position-relative overflow-hidden bg-dark d-none d-lg-block">
            <div class="circle-top"></div>
            <div>
              <img src="{{asset('images/logos/logo-icon.svg')}}" class="circle-bottom" alt="Logo-Dark" />
            </div>
            <div class="d-lg-flex align-items-center z-index-5 position-relative h-n80">
              <div class="row justify-content-center w-100">
                <div class="col-lg-6">
                  <h2 class="text-white fs-10 mb-3 lh-sm">
                    Welcome to
                    <br />
                    App | Livraion
                  </h2>
                  <span class="opacity-75 fs-4 text-white d-block mb-3">App | Livraion helps developers to build organized
                    and well
                    <br />
                    coded dashboards full of beautiful and rich modules.
                  </span>
                  <a href="../landingpage/index.html" class="btn btn-primary">Learn More</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="dark-transparent sidebartoggler"></div>
</body>

</html>