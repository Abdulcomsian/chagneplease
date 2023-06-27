
<!DOCTYPE html>
<!--
Author: Keenthemes
Product Name: Metronic - #1 Selling Bootstrap 5 HTML Multi-demo Admin Dashboard ThemePurchase: https://1.envato.market/EA4JPWebsite: http://www.keenthemes.com
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
License: For each use you must have a valid license purchased only from above link in order to legally use the theme for your project.-->
<html lang="en">
	<!--begin::Head-->
	<head><base href="../../">
		<meta charset="utf-8" />
		<title>Analyst Login</title>
		<link rel="canonical" href="Https://preview.keenthemes.com/metronic8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="shortcut icon" href="./metronic/chati-dashboard/assets/media/logos/favicon.ico" />
		<!--begin::Fonts-->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
		<!--end::Fonts-->
		<!--begin::Global Stylesheets Bundle(used by all pages)-->
		<link href="{{asset('assets/plugins/global/plugins.bundle.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('assets/css/style.bundle.css')}}" rel="stylesheet" type="text/css" />
		<!--end::Global Stylesheets Bundle-->
	</head>
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_body" class="bg-white">
		<!--begin::Main-->
		<div class="d-flex flex-column flex-root">
			<!--begin::Authentication - Signup Free Trial-->
			<div class="d-flex flex-column flex-xl-row flex-column-fluid">
				<!--begin::Aside-->
				<div class="d-flex flex-column flex-lg-row-fluid">
					<!--begin::Wrapper-->
					<div class="d-flex flex-row-fluid flex-center p-10">
						<!--begin::Content-->
						<div class="d-flex flex-column">
							<!--begin::Logo-->
							<a href="{{route('main.home')}}" class="mb-15">
								<img alt="Logo" src="{{asset('images/site-logo.png')}}" class="h-50px" />
							</a>
							<!--end::Logo-->
							<!--begin::Title-->
							<h1 class="text-dark fs-2x mb-3">Welcome, Analyst!</h1>
							<!--end::Title-->
							<!--begin::Description-->
							<div class="fw-bold fs-4 text-gray-400 mb-10">Plan your blog post by choosing a topic creating
							<br />an outline and checking facts</div>
							<!--begin::Description-->
						</div>
						<!--end::Content-->
					</div>
					<!--end::Wrapper-->
					<!--begin::Illustration-->
					<div class="d-flex flex-row-auto bgi-no-repeat bgi-position-x-center bgi-size-contain bgi-position-y-bottom min-h-200px min-h-xl-300px mb-xl-10" style="background-image: url(./metronic/chati-dashboard/assets/media/illustrations/networks.png)"></div>
					<!--end::Illustration-->
				</div>
				<!--begin::Aside-->
				<!--begin::Content-->
				<div class="flex-row-fluid d-flex flex-center justfiy-content-xl-first p-10">
					<!--begin::Wrapper-->
					<div class="d-flex flex-center p-15 shadow rounded w-100 w-md-550px mx-auto ms-xl-20">
						<!--begin::Form-->
                        <form class="form w-100" novalidate="novalidate"  method="POST" action="{{ route('analyst.authenticate') }}" id="kt_free_trial_form">
                            @csrf
                            <!--begin::Heading-->
							<div class="text-center mb-10">
								<!--begin::Title-->
								<h1 class="text-dark mb-3">Log In</h1>
								<!--end::Title-->
								@if(Session::has('attemptError'))
									<span class="text-danger text-center">
										<strong>{{ Session::get('attemptError') }}</strong>
									</span>
								@endif
							</div>
							<!--begin::Heading-->
							<!--begin::Input group-->
							<div class="fv-row mb-10">
								<label class="form-label fw-bolder text-dark fs-6">Email</label>
								<input class="form-control form-control-solid" type="email" placeholder="Enter Email" name="email" autocomplete="off" value="{{ old('email') }}"  required/>
								@error('email')
									<span class="text-danger">
										<strong>{{ $message }}</strong>
									</span>
								@enderror
                            </div>
							<!--end::Input group-->
						
							<!--begin::Row-->
							<div class="fv-row mb-10">
								<label class="form-label fw-bolder text-dark fs-6">Password</label>
								<input class="form-control form-control-solid" type="password" placeholder="Enter Password" name="password" autocomplete="off" />
								@error('password')
									<span class="text-danger">
										<strong>{{ $message }}</strong>
									</span>
								@enderror
                            </div>
							<!--end::Row-->
							<!--begin::Row-->

                            <div class="fv-row mb-10">
								<input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
    
                                <label class="form-check-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>


                    
							<!--end::Row-->
							<!--begin::Row-->
							<div class="text-center pb-lg-0 pb-8">
								<button type="submit" id="kt_free_trial_submit" class="btn btn-lg btn-primary fw-bolder">
									<span class="indicator-label">Login</span>
									<span class="indicator-progress">Please wait...
									<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
								</button>
							</div>
							<!--end::Row-->
						</form>
						<!--end::Form-->
					</div>
					<!--end::Wrapper-->
				</div>
				<!--end::Right Content-->
			</div>
			<!--end::Authentication - Signup Free Trial-->
		</div>
		<!--end::Main-->
		<!--begin::Javascript-->
		<!--begin::Global Javascript Bundle(used by all pages)-->
		<script src="{{asset('assets/plugins/global/plugins.bundle.js')}}"></script>
		<script src="{{asset('assets/js/scripts.bundle.js')}}"></script>
		<!--end::Global Javascript Bundle-->
		<!--begin::Page Custom Javascript(used by this page)-->
		<!--end::Page Custom Javascript-->
		<!--end::Javascript-->
	</body>
	<!--end::Body-->
</html>