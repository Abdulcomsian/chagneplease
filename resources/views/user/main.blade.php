<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
   @yield('title')
   
   @livewireStyles

   @livewireScripts
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
    <link rel="stylesheet" href="{{asset('css/progress-steps.css')}}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css"/>
    @yield('style')
  </head>
  <body>
    <nav class="navbar navbar-expand-lg">
      <div class="container-fluid">
        <a class="navbar-brand" href="{{route('main.home')}}">
          <img src="{{asset('images/site-logo.png')}}" alt="logo" />
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
          <!-- <span class="navbar-toggler-icon"></span> -->
          <i class="fas fa-bars"></i>
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
            {{-- @if(auth()->user() && auth()->user()->role == 1)
            <li class="nav-item">
              <a class="nav-link" href="{{route('user.plans')}}">Plan</a>
            </li>
            @endif --}}
            <li class="nav-item">
              <a class="nav-link" href="{{route('user.filter')}}">Projects</a>
            </li>
            @if(auth()->user())
            <li class="nav-item dropdown">
              <a
                class="nav-link dropdown-toggle"
                href="#"
                id="navbarDropdown"
                role="button"
                data-bs-toggle="dropdown"
                aria-expanded="false"
              >
              <svg width="35" height="36" viewBox="0 0 35 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M14.1491 23.125H20.8509V21.625H14.1491V23.125ZM20.8509 23.125C23.4185 23.125 25.5 25.2065 25.5 27.7741H27C27 24.3781 24.2469 21.625 20.8509 21.625V23.125ZM14.1491 21.625C10.7531 21.625 8 24.3781 8 27.7741H9.5C9.5 25.2065 11.5815 23.125 14.1491 23.125V21.625ZM21.125 13.625C21.125 15.627 19.502 17.25 17.5 17.25V18.75C20.3305 18.75 22.625 16.4555 22.625 13.625H21.125ZM17.5 17.25C15.498 17.25 13.875 15.627 13.875 13.625H12.375C12.375 16.4555 14.6695 18.75 17.5 18.75V17.25ZM13.875 13.625C13.875 11.623 15.498 10 17.5 10V8.5C14.6695 8.5 12.375 10.7945 12.375 13.625H13.875ZM17.5 10C19.502 10 21.125 11.623 21.125 13.625H22.625C22.625 10.7945 20.3305 8.5 17.5 8.5V10ZM29.875 18C29.875 24.8345 24.3345 30.375 17.5 30.375V31.875C25.163 31.875 31.375 25.663 31.375 18H29.875ZM17.5 30.375C10.6655 30.375 5.125 24.8345 5.125 18H3.625C3.625 25.663 9.83705 31.875 17.5 31.875V30.375ZM5.125 18C5.125 11.1655 10.6655 5.625 17.5 5.625V4.125C9.83705 4.125 3.625 10.337 3.625 18H5.125ZM17.5 5.625C24.3345 5.625 29.875 11.1655 29.875 18H31.375C31.375 10.337 25.163 4.125 17.5 4.125V5.625Z" fill="#3B7CEE"></path>
              </svg>
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                @if(auth()->user())
                  <li><a class="dropdown-item" href="{{route('user.profile')}}">Profile</a></li>
                @endif
                @if(auth()->user() && auth()->user()->role == 1)
                  <li><a class="dropdown-item" href="{{route('user.plans')}}">Plan</a></li>
                @endif
                <li><a class="dropdown-item" href="{{route('user.logout')}}">Sign Out</a></li>
              </ul>
            </li>
            @else
            <div class="btns">
              <a href="javascript:void(0)" class="btn bg-primary text-light btn-blue-outline" data-bs-toggle="modal" data-bs-target="#opt1">Login</a>
              {{-- <a href="{{route('login')}}" class="btn btn-blue-outline">Login Here</a> --}}
            </div>
            <div class="btns"> 
              <a href="{{route('login')}}" class="btn btn-blue-outline">Sign Up</a>
            </div>
            @endif
            
          </ul>
          {{-- <div class="btns">
            <a href="#" class="btn btn-blue">Login</a>
            <a href="{{route('analyst.dashboard')}}" class="btn btn-blue-outline">Dashboard</a>
          </div> --}}
        </div>
      </div>
    </nav>


    <!-- Modal -->
    <div class="modal fade" id="opt1" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">Login</h5>
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
              aria-label="Close"
            ></button>
          </div>
          <div class="modal-body">
            @if($errors->any())
              @if($errors->has('login_error'))
                @foreach($errors->all() as $error)
                  <div class="text-center"><strong class="text-danger">{{$error}}</strong></div>
                @endforeach
              @endif
            @endif
            <form method="POST" action="{{ route('login') }}">
              @csrf
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label"
                  >Email address</label
                >
                <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"/>
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

    <!-- analyst page -->

    <div class="analyst_dashboard">
      <div class="custom_container">
        <div class="row my-5">
          {{-- <div class="col-lg-3">
            <div class="side_box">
              <p class="breadcumb">
                Home / <span class="text-blue">Investees</span>
              </p>
              <div class="dash_side_menu">
                <a
                  href="{{route('analyst.market')}}"
                  class="nav_link active"
                  data-bs-toggle="modal"
                  data-bs-target="#model1"
                  >Market</a
                >
                <a
                  href="{{route('analyst.traction')}}"
                  class="nav_link"
                  data-bs-toggle="modal"
                  data-bs-target="#model1"
                  >Traction</a
                >
                <a
                  href="{{route('analyst.team')}}"
                  class="nav_link"
                  data-bs-toggle="modal"
                  data-bs-target="#model1"
                  >Team</a
                >
                <a
                  href="{{route('analyst.competition')}}"
                  class="nav_link"
                  data-bs-toggle="modal"
                  data-bs-target="#model1"
                  >Competition</a
                >
                <a
                  href="{{route('analyst.competition')}}"
                  class="nav_link"
                  data-bs-toggle="modal"
                  data-bs-target="#model1"
                  >Financials</a
                >
                <a
                  href="{{route('analyst.intellectual_property')}}"
                  class="nav_link"
                  data-bs-toggle="modal"
                  data-bs-target="#model1"
                  >Intellectual Property</a
                >
                <a
                  href="{{route('analyst.funds')}}"
                  class="nav_link"
                  data-bs-toggle="modal"
                  data-bs-target="#model1"
                  >Use of Funds</a
                >
                <a
                  href="{{route('analyst.business_model')}}"
                  class="nav_link"
                  data-bs-toggle="modal"
                  data-bs-target="#model1"
                  >Business Model</a
                >
                <a
                  href="{{route('analyst.corporate_structure')}}"
                  class="nav_link"
                  data-bs-toggle="modal"
                  data-bs-target="#model1"
                  >Corporate Structure</a
                >
                <a
                  href="{{route('analyst.existing_financial_round')}}"
                  class="nav_link"
                  data-bs-toggle="modal"
                  data-bs-target="#model1"
                  >Existing Financing Round</a
                >
              </div>
              <!-- rating models -->
              <div class="rating_models">
                <!-- Modal -->
                <div
                  class="modal fade"
                  id="model1"
                  tabindex="-1"
                  aria-labelledby="model1Label"
                  aria-hidden="true"
                >
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                      <div class="modal-header border-0 pb-0">
                        <h5 class="modal-title" id="model1Label">
                          <!-- Modal title -->
                        </h5>
                        <button
                          type="button"
                          class="btn-close"
                          data-bs-dismiss="modal"
                          aria-label="Close"
                        ></button>
                      </div>
                      <div class="modal-body">
                        <div class="rating_text">
                          <h3>How would you rate</h3>
                          <span>“Market”</span>
                        </div>
                        <div class="rating_dot d-flex justify-content-center">
                          <div class="dot red mx-3">
                            <span class="rating_circle red"></span>
                            <div class="circle_label">Poor</div>
                          </div>
                          <div class="dot yellow mx-3">
                            <span class="rating_circle yellow"></span>
                            <div class="circle_label">Average</div>
                          </div>
                          <div class="dot green active mx-3">
                            <span class="rating_circle green"></span>
                            <div class="circle_label">Good</div>
                          </div>
                        </div>
                        <!-- score -->
                        <span class="score_title">Score</span>
                        <div class="d-flex justify-content-between">
                          <div
                            class="input-group flex-column align-items-center"
                          >
                            <input type="radio" name="score" onclick="poor()" />
                            <label for="score">1</label>
                          </div>
                          <div
                            class="input-group flex-column align-items-center"
                          >
                            <input type="radio" name="score" onclick="poor()" />
                            <label for="score">2</label>
                          </div>
                          <div
                            class="input-group flex-column align-items-center"
                          >
                            <input type="radio" name="score" onclick="poor()" />
                            <label for="score">3</label>
                          </div>
                          <div
                            class="input-group flex-column align-items-center"
                          >
                            <input type="radio" name="score" onclick="poor()" />
                            <label for="score">4</label>
                          </div>
                          <div
                            class="input-group flex-column align-items-center"
                          >
                            <input
                              type="radio"
                              name="score"
                              onclick="average()"
                            />
                            <label for="score">5</label>
                          </div>
                          <div
                            class="input-group flex-column align-items-center"
                          >
                            <input
                              type="radio"
                              name="score"
                              onclick="average()"
                            />
                            <label for="score">6</label>
                          </div>
                          <div
                            class="input-group flex-column align-items-center"
                          >
                            <input
                              type="radio"
                              name="score"
                              onclick="average()"
                            />
                            <label for="score">7</label>
                          </div>
                          <div
                            class="input-group flex-column align-items-center"
                          >
                            <input type="radio" name="score" onclick="good()" />
                            <label for="score">8</label>
                          </div>
                          <div
                            class="input-group flex-column align-items-center"
                          >
                            <input type="radio" name="score" onclick="good()" />
                            <label for="score">9</label>
                          </div>
                          <div
                            class="input-group flex-column align-items-center"
                          >
                            <input type="radio" name="score" onclick="good()" />
                            <label for="score">10</label>
                          </div>
                        </div>

                        <span class="comment_title">Comment:</span>
                        <textarea
                          name="comment"
                          id="comment"
                          class="review_textarea"
                          placeholder="Write your feedback..."
                        ></textarea>
                      </div>
                      <div
                        class="modal-footer rating_footer border-0 pt-0 d-flex justify-content-center"
                      >
                        <button type="button" class="btn btn-blue">Rate</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div> --}}
          <div class="col-lg-12">
                <!-- Main Content Starts Here -->
                @yield('main-content')
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
            <img src="{{asset('img/Instagram.png')}}" alt="Instagram" />
          </a>
          <a href="#" class="social_link">
            <img src="{{asset('img/Facebook.png')}}" alt="Facebook" />
          </a>
          <a href="#" class="social_link">
            <img src="{{asset('img/LinkedIn.png')}}" alt="LinkedIn" />
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

    <!-- load jquery cdn -->
    <script
      src="https://code.jquery.com/jquery-3.6.1.min.js"
      integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ="
      crossorigin="anonymous"
    ></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    
    <script type="text/javascript" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>

    <!-- rating js -->
    <script>
      function poor() {
        $(".dot").removeClass("active");
        $(".dot.red").addClass("active");
      }

      function average() {
        $(".dot").removeClass("active");
        $(".dot.yellow").addClass("active");
      }

      function good() {
        $(".dot").removeClass("active");
        $(".dot.green").addClass("active");
      }
    </script>
    
    @yield('script')
  </body>
</html>
