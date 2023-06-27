<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Please Change | Home</title>

    <!-- bootstrap 5 -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
      crossorigin="anonymous"
    />

    <!-- font awesome -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
      integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />

    <!-- custom css -->
    <link rel="stylesheet" href="{{asset('css/normalize.css')}}" />
    <link rel="stylesheet" href="{{asset('css/main.css')}}" />
    <link rel="stylesheet" href="{{asset('css/media.css')}}" />
  </head>
  <body>
    <nav class="navbar navbar-expand-lg">
      <div class="container-fluid">
        <a class="navbar-brand" href="{{route('main.home')}}">
          <img src="img/logo.png" alt="logo" />
        </a>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <li class="nav-item dropdown">
              <a
                class="nav-link dropdown-toggle"
                href="#"
                id="navbarDropdown"
                role="button"
                data-bs-toggle="dropdown"
                aria-expanded="false"
              >
                Investment Opportunities
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="#">Option 1</a></li>
                <li><a class="dropdown-item" href="#">Option 2</a></li>
              </ul>
            </li>
            <li class="nav-item dropdown">
              <a
                class="nav-link dropdown-toggle"
                href="#"
                id="navbarDropdown"
                role="button"
                data-bs-toggle="dropdown"
                aria-expanded="false"
              >
                How it works
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="#">Option 1</a></li>
                <li><a class="dropdown-item" href="#">Option 2</a></li>
              </ul>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">About Us</a>
            </li>
            <div class="btns">
                {{-- <a href="#" class="btn btn-blue">Login</a> --}}
                <a href="javascript:void(0)" class="btn bg-primary text-light btn-blue-outline" data-bs-toggle="modal" data-bs-target="#opt1">Login</a>
            </div>
            {{-- <li class="nav-item">
              <a class="nav-link" href="#">
                <svg
                  width="32"
                  height="32"
                  viewBox="0 0 32 32"
                  fill="none"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <path
                    d="M5.33398 22.6667L4.66316 22.3313C4.54692 22.5637 4.55934 22.8399 4.696 23.061C4.83265 23.2821 5.07405 23.4167 5.33398 23.4167V22.6667ZM26.6673 22.6667V23.4167C26.9272 23.4167 27.1686 23.2821 27.3053 23.061C27.442 22.8399 27.4544 22.5637 27.3381 22.3313L26.6673 22.6667ZM8.75065 12C8.75065 7.99594 11.9966 4.75 16.0007 4.75V3.25C11.1682 3.25 7.25065 7.16751 7.25065 12H8.75065ZM16.0007 4.75C20.0047 4.75 23.2507 7.99594 23.2507 12H24.7507C24.7507 7.16751 20.8331 3.25 16.0007 3.25V4.75ZM7.25065 12C7.25065 14.5532 6.60999 17.1336 5.95581 19.0962C5.63021 20.073 5.30469 20.8866 5.06129 21.4546C4.93967 21.7383 4.83878 21.9602 4.76893 22.1099C4.73401 22.1847 4.70688 22.2415 4.68881 22.2788C4.67978 22.2975 4.67302 22.3113 4.66869 22.3201C4.66653 22.3245 4.66497 22.3276 4.66404 22.3295C4.66358 22.3304 4.66327 22.331 4.66312 22.3313C4.66305 22.3315 4.66302 22.3316 4.66302 22.3315C4.66303 22.3315 4.66306 22.3315 4.66306 22.3315C4.66311 22.3314 4.66316 22.3313 5.33398 22.6667C6.0048 23.0021 6.00488 23.0019 6.00497 23.0018C6.00501 23.0017 6.0051 23.0015 6.00519 23.0013C6.00536 23.001 6.00557 23.0006 6.00582 23C6.00631 22.999 6.00697 22.9977 6.00779 22.9961C6.00943 22.9928 6.0117 22.9882 6.01458 22.9823C6.02034 22.9706 6.02855 22.9538 6.03905 22.9321C6.06005 22.8887 6.09021 22.8257 6.12821 22.7442C6.20419 22.5814 6.31163 22.345 6.44001 22.0454C6.69661 21.4467 7.03776 20.5937 7.37883 19.5705C8.05797 17.5331 8.75065 14.7801 8.75065 12H7.25065ZM5.33398 23.4167H26.6673V21.9167H5.33398V23.4167ZM26.6673 22.6667C27.3381 22.3313 27.3382 22.3314 27.3382 22.3315C27.3382 22.3315 27.3383 22.3315 27.3383 22.3315C27.3383 22.3316 27.3383 22.3315 27.3382 22.3313C27.338 22.331 27.3377 22.3304 27.3373 22.3295C27.3363 22.3276 27.3348 22.3245 27.3326 22.3201C27.3283 22.3113 27.3215 22.2975 27.3125 22.2788C27.2944 22.2415 27.2673 22.1847 27.2324 22.1099C27.1625 21.9602 27.0616 21.7383 26.94 21.4546C26.6966 20.8866 26.3711 20.073 26.0455 19.0962C25.3913 17.1336 24.7507 14.5532 24.7507 12H23.2507C23.2507 14.7801 23.9433 17.5331 24.6225 19.5705C24.9635 20.5937 25.3047 21.4467 25.5613 22.0454C25.6897 22.345 25.7971 22.5814 25.8731 22.7442C25.9111 22.8257 25.9412 22.8887 25.9622 22.9321C25.9727 22.9538 25.981 22.9706 25.9867 22.9823C25.9896 22.9882 25.9919 22.9928 25.9935 22.9961C25.9943 22.9977 25.995 22.999 25.9955 23C25.9957 23.0006 25.9959 23.001 25.9961 23.0013C25.9962 23.0015 25.9963 23.0017 25.9963 23.0018C25.9964 23.0019 25.9965 23.0021 26.6673 22.6667ZM19.2507 24C19.2507 25.7949 17.7956 27.25 16.0007 27.25V28.75C18.624 28.75 20.7507 26.6234 20.7507 24H19.2507ZM16.0007 27.25C14.2057 27.25 12.7507 25.7949 12.7507 24H11.2507C11.2507 26.6234 13.3773 28.75 16.0007 28.75V27.25ZM12.7507 24V22.6667H11.2507V24H12.7507ZM20.7507 24V22.6667H19.2507V24H20.7507Z"
                    fill="#3B7CEE"
                  />
                </svg>
              </a>
            </li> --}}
            {{-- <li class="nav-item dropdown">
              <a
                class="nav-link mx-0 dropdown-toggle"
                href="#"
                id="navbarDropdown"
                role="button"
                data-bs-toggle="dropdown"
                aria-expanded="false"
              >
                <svg
                  width="35"
                  height="36"
                  viewBox="0 0 35 36"
                  fill="none"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <path
                    d="M14.1491 23.125H20.8509V21.625H14.1491V23.125ZM20.8509 23.125C23.4185 23.125 25.5 25.2065 25.5 27.7741H27C27 24.3781 24.2469 21.625 20.8509 21.625V23.125ZM14.1491 21.625C10.7531 21.625 8 24.3781 8 27.7741H9.5C9.5 25.2065 11.5815 23.125 14.1491 23.125V21.625ZM21.125 13.625C21.125 15.627 19.502 17.25 17.5 17.25V18.75C20.3305 18.75 22.625 16.4555 22.625 13.625H21.125ZM17.5 17.25C15.498 17.25 13.875 15.627 13.875 13.625H12.375C12.375 16.4555 14.6695 18.75 17.5 18.75V17.25ZM13.875 13.625C13.875 11.623 15.498 10 17.5 10V8.5C14.6695 8.5 12.375 10.7945 12.375 13.625H13.875ZM17.5 10C19.502 10 21.125 11.623 21.125 13.625H22.625C22.625 10.7945 20.3305 8.5 17.5 8.5V10ZM29.875 18C29.875 24.8345 24.3345 30.375 17.5 30.375V31.875C25.163 31.875 31.375 25.663 31.375 18H29.875ZM17.5 30.375C10.6655 30.375 5.125 24.8345 5.125 18H3.625C3.625 25.663 9.83705 31.875 17.5 31.875V30.375ZM5.125 18C5.125 11.1655 10.6655 5.625 17.5 5.625V4.125C9.83705 4.125 3.625 10.337 3.625 18H5.125ZM17.5 5.625C24.3345 5.625 29.875 11.1655 29.875 18H31.375C31.375 10.337 25.163 4.125 17.5 4.125V5.625Z"
                    fill="#3B7CEE"
                  />
                </svg>

                Jhon
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="#">Option 1</a></li>
                <li><a class="dropdown-item" href="#">Option 2</a></li>
              </ul>
            </li> --}}
          </ul>
        </div>
      </div>
    </nav>

    <!-- section 2 -->
    <div class="service_section_2">
      <div class="container">
        <div class="text_content text-center">
          <h2 class="section_title">Start turning your ideas into reality</h2>
          <p class="section_para">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. A convallis
            ultrices malesuada quis lorem turpis.
          </p>
        </div>
        <div class="row">
          <div class="col-lg-6" id="investee">
            <div class="register_option" data-bs-toggle="modal" id="investee" data-bs-target="#opt2">
              <h3>Become an Investee</h3>
              <img src="img/opt1.png" alt="opt" />
            </div>
          </div>
          <div class="col-lg-6" data-bs-toggle="modal" id="invester" data-bs-target="#opt2">
            <div class="register_option">
              <h3>Become an Investor</h3>
              <img src="img/opt2.png" alt="opt" />
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal -->
    <div
      class="modal fade"
      id="opt1"
      data-bs-backdrop="static"
      data-bs-keyboard="false"
      tabindex="-1"
      aria-labelledby="staticBackdropLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">Register</h5>
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
              aria-label="Close"
            ></button>
          </div>
          <div class="modal-body">
            <form method="POST" action="{{ route('login') }}">
              @csrf
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label"
                  >Email address</label
                >
                <input
                  type="email"
                  name="email"
                  class="form-control"
                  id="exampleInputEmail1"
                  aria-describedby="emailHelp"
                />
                <div id="emailHelp" class="form-text">
                  We'll never share your email with anyone else.
                </div>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              <div class="mb-3">
                <label for="password" class="form-label"
                  >Password</label
                >
                <input
                  type="password"
                  class="form-control"
                  id="password"
                  name="password"
                />
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
          </div>
          <div class="modal-footer">
            <button
              type="button"
              class="btn btn-secondary"
              data-bs-dismiss="modal"
            >
              Close
            </button>
            {{-- <button type="button" class="btn btn-primary">Understood</button> --}}
          </div>
        </div>
      </div>
    </div>

    <!-- Modal -->
    <div
      class="modal fade"
      id="opt2"
      data-bs-backdrop="static"
      data-bs-keyboard="false"
      tabindex="-1"
      aria-labelledby="staticBackdropLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">Registration</h5>
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
              aria-label="Close"
            ></button>
          </div>
          <div class="modal-body">
            <form method="POST" action="{{ route('register') }}">
                @csrf
            <input type="hidden" name="role" id="role">
            <div class="mb-3">
                <label for="name" class="form-label"
                    >Name</label
                >
                <input
                    type="text"
                    class="form-control"
                    id="name"
                    name="name"
                />
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
              <div class="mb-3">
                <label for="email" class="form-label"
                  >Email address</label
                >
                <input
                  type="email"
                  class="form-control"
                  id="email"
                  name="email"
                  aria-describedby="emailHelp"
                />
                <div id="emailHelp" class="form-text">
                  We'll never share your email with anyone else.
                </div>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              <div class="mb-3">
                <label for="password" class="form-label"
                  >Password</label
                >
                <input
                  type="password"
                  class="form-control"
                  id="password"
                  name="password"
                />
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              <div class="mb-3">
                <label for="password_confirmation" class="form-label"
                  >Confirm Password</label
                >
                <input
                  type="password"
                  class="form-control"
                  id="password_confirmation"
                  name="password_confirmation"
                />
              </div>
                <button type="submit" class="btn btn-primary">
                    {{ __('Register') }}
                </button>
            </form>
          </div>
          <div class="modal-footer">
            <button
              type="button"
              class="btn btn-secondary"
              data-bs-dismiss="modal"
            >
              Close
            </button>
            {{-- <button type="button" class="btn btn-primary">Understood</button> --}}
          </div>
        </div>
      </div>
    </div>

    <!-- footer -->
    <footer>
      <div class="links custom_container d-flex justify-content-between">
        <div>
          <a href="#" class="link">About Us</a>
          <a href="#" class="link">Contact Us</a>
          <a href="#" class="link">FAQ</a>
          <a href="#" class="link">Integrity Policy</a>
        </div>
        <div>
          <a href="#" class="social_link">
            <img src="img/Instagram.png" alt="Instagram" />
          </a>
          <a href="#" class="social_link">
            <img src="img/Facebook.png" alt="Facebook" />
          </a>
          <a href="#" class="social_link">
            <img src="img/LinkedIn.png" alt="LinkedIn" />
          </a>
        </div>
      </div>
      <p class="copyright my-2 custom_container">
        ©2022 Change Please. All rights reserved
      </p>
    </footer>

    <!-- bootstrap 5 js -->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
      crossorigin="anonymous"
    ></script>
    <script>
        window.onload = function(){
            let investee = document.getElementById("investee");
            let invester = document.getElementById("invester");

            investee.addEventListener("click" , function(e){
                setRoleField(1)
            })
            invester.addEventListener("click" , function(e){
                setRoleField(2)
            })
            function setRoleField(role)
            {
                document.getElementById("role").value = role;
            }
        }
    </script>

  </body>
</html>










{{-- new code starts here --}}
{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}
