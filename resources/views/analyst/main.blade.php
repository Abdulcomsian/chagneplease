<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    @yield('title')

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
  <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css">

  <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">

  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  
  <script type="text/javascript" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>

    <!-- custom css -->
    <link rel="stylesheet" href="{{asset('css/normalize.css')}}" />
    <link rel="stylesheet" href="{{asset('css/main.css')}}" />
    <link rel="stylesheet" href="{{asset('css/media.css')}}" />
    <style>
      .investee-status{
        text-transform: capitalize;
      }
      .view-investee-plan{
        color: #608AEE;
      }
      .investee-plan{
        text-decoration: none;
      }
  
    </style>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg">
      <div class="container-fluid">
        <a class="navbar-brand" href="{{route('main.home')}}">
          <img src="{{asset('img/logo.png')}}" alt="logo" />
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
                <li><a class="dropdown-item" href="{{route('analyst.logout')}}">Sign Out</a></li>
              </ul>
            </li>
          </ul>
          <div class="btns">
            {{-- <a href="#" class="btn btn-blue">Login</a> --}}
            {{-- <a href="#" class="btn btn-blue-outline">Sign Up</a> --}}
            <a href="{{route('analyst.dashboard')}}" class="btn btn-blue-outline">Dashboard</a>
          </div>
        </div>
      </div>
    </nav>

    <!-- analyst page -->

    <div class="analyst_dashboard">
      <div class="custom_container">
        <div class="row my-5">
          <div class="col-lg-3">
            <div class="side_box">
              <p class="breadcumb">
                Home / <span class="text-blue">Investees</span>
              </p>
              <div class="dash_side_menu">
                <a href="{{route('analyst.dashboard')}}" class="nav_link {{(request()->is('analyst/home')) ? 'active' : ''}}">Dashboard</a>
                <a href="{{route('analyst.investee')}}" class="nav_link {{(request()->is('analyst/investee-list')) ? 'active' : ''}}"">Investees</a>
                <a href="#" class="nav_link">Others</a>
              </div>
            </div>
          </div>
          

          <div class="col-lg-9 px-3">
             {{-- Main content starts here --}}
             @yield('main-content')
             {{-- Main content ends here --}}
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    @yield('script')
  </body>
</html>
