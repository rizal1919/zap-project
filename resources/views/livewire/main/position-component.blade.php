@extends('layouts.template')

@section('title', 'Position')

@section('content')
<div>
    {{-- @dd($user) --}}
    <!--begin::Authentication - Sign-in -->
	<div class="bgi-position-y-bottom position-x-center bgi-no-repeat bgi-size-contain" style="background-image: url(images/14.png)">
		<!--begin::Content-->
		<div class="d-flex flex-center flex-column flex-column-fluid p-10 pb-lg-20">
			<!--begin::Logo-->
			
			{{-- <a href="../../demo1/dist/index.html" class="mb-12">
				<img alt="Logo" src="assets/media/logos/logo-1.svg" class="h-40px" />
			</a> --}}
			<!--end::Logo-->
			<!--begin::Wrapper-->
			<div class="w-lg-500px h-lg-450px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto">
				<!--begin::Form-->
				
				<div class="row justify-content-center" style="margin-bottom: 50px;">
					<div class="col-lg-3 text-end">
						<a href="{{ route('position') }}">
							<svg xmlns="http://www.w3.org/2000/svg" width="30" fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
								<path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"/>
							</svg>
						</a>
					</div>
					<div class="col-lg-2 text-center">
						<a href="{{ route('profile') }}">
							<svg xmlns="http://www.w3.org/2000/svg" width="30" fill="darkgreen" class="bi bi-person-circle" viewBox="0 0 16 16">
								<path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
								<path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
							</svg>
						</a>
					</div>
					<div class="col-lg-3">
						<a href="{{ route('logout') }}" class="text-decoration-none" style="cursor: pointer;"> 
							<svg xmlns="http://www.w3.org/2000/svg" width="30"  fill="red" class="bi bi-backspace-reverse-fill" viewBox="0 0 16 16">
								<path d="M0 3a2 2 0 0 1 2-2h7.08a2 2 0 0 1 1.519.698l4.843 5.651a1 1 0 0 1 0 1.302L10.6 14.3a2 2 0 0 1-1.52.7H2a2 2 0 0 1-2-2V3zm9.854 2.854a.5.5 0 0 0-.708-.708L7 7.293 4.854 5.146a.5.5 0 1 0-.708.708L6.293 8l-2.147 2.146a.5.5 0 0 0 .708.708L7 8.707l2.146 2.147a.5.5 0 0 0 .708-.708L7.707 8l2.147-2.146z"/>
							  </svg>
						</a>
					</div>
				</div>
				<form class="form w-100" novalidate="novalidate" id="kt_sign_in_form" data-kt-redirect-url="../../demo1/dist/index.html" action="#">
					<!--begin::Heading-->
					@csrf
					<div class="text-center mb-10">
						<!--begin::Title-->
                        {{-- @dd($user) --}}
						<h6 class="text-dark mb-3 text-uppercase">Posisi {{ $user->username }}</h6>
						<!--end::Title-->
						<!--begin::Link-->
						{{-- <div class="text-gray-400 fw-bold fs-4">New Here?
						<a href="{{ route('startSignup') }}" class="link-primary fw-bolder">Create an Account</a></div> --}}
						<!--end::Link-->
					</div>
					<!--begin::Heading-->
					<!--begin::Input group-->
					{{-- <div class="fv-row mb-10">
						<!--begin::Label-->
						<label class="form-label fs-6 fw-bolder text-dark">Username</label>
						<!--end::Label-->
						<!--begin::Input-->
						<input class="form-control form-control-lg form-control-solid" type="text" name="username" autocomplete="off" />
						<!--end::Input-->
					</div> --}}
					<!--end::Input group-->
					<!--begin::Input group-->
					{{-- <div class="fv-row mb-10">
						<!--begin::Wrapper-->
						<div class="d-flex flex-stack mb-2">
							<!--begin::Label-->
							<label class="form-label fw-bolder text-dark fs-6 mb-0">Password</label>
							<!--end::Label-->
							<!--begin::Link-->
							<a href="../../demo1/dist/authentication/layouts/basic/password-reset.html" class="link-primary fs-6 fw-bolder">Forgot Password ?</a>
							<!--end::Link-->
						</div>
						<!--end::Wrapper-->
						<!--begin::Input-->
						<input class="form-control form-control-lg form-control-solid" type="password" name="password" autocomplete="off" />
						<!--end::Input-->
					</div> --}}
					<!--end::Input group-->

					<div class="text-center">
						<h1 style="font-size: 50px; margin-bottom: 20px;">{{ $last_activity != null ? $last_activity->place_activity->place : "Place Unset" }}</h1>
						<p>{{ $last_activity != null ? $last_activity->activity : "Troubleshoot Is Not Writen or Undefined" }}</p>
					</div>
					<!--begin::Actions-->
					<div class="text-center">
						<!--begin::Submit button-->
						{{-- <button type="submit" id="kt_sign_in_submit" class="btn btn-lg btn-primary w-100 mb-5">
							<span class="indicator-label">Continue</span>
							<span class="indicator-progress">Please wait...
							<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
						</button> --}}
						<!--end::Submit button-->
						<!--begin::Separator-->
						{{-- <div class="text-center text-muted text-uppercase fw-bolder mb-5">or</div> --}}
						<!--end::Separator-->
						<!--begin::Google link-->
						{{-- <a href="#" class="btn btn-flex flex-center btn-light btn-lg w-100 mb-5">
						<img alt="Logo" src="assets/media/svg/brand-logos/google-icon.svg" class="h-20px me-3" />Continue with Google</a> --}}
						<!--end::Google link-->
						<!--begin::Google link-->
						{{-- <a href="#" class="btn btn-flex flex-center btn-light btn-lg w-100 mb-5">
						<img alt="Logo" src="assets/media/svg/brand-logos/facebook-4.svg" class="h-20px me-3" />Continue with Facebook</a> --}}
						<!--end::Google link-->
						<!--begin::Google link-->
						{{-- <a href="#" class="btn btn-flex flex-center btn-light btn-lg w-100">
						<img alt="Logo" src="assets/media/svg/brand-logos/apple-black.svg" class="h-20px me-3" />Continue with Apple</a> --}}
						<!--end::Google link-->
					</div>
					<!--end::Actions-->
				</form>
				<!--end::Form-->
			</div>
			<!--end::Wrapper-->
		</div>
		<!--end::Content-->
		<!--begin::Footer-->
		{{-- <div class="d-flex flex-center flex-column-auto p-10">
			<!--begin::Links-->
			<div class="d-flex align-items-center fw-bold fs-6">
				<a href="https://keenthemes.com" class="text-muted text-hover-primary px-2">About</a>
				<a href="mailto:support@keenthemes.com" class="text-muted text-hover-primary px-2">Contact</a>
				<a href="https://1.envato.market/EA4JP" class="text-muted text-hover-primary px-2">Contact Us</a>
			</div>
			<!--end::Links-->
		</div> --}}
		<!--end::Footer-->
	</div>
	<!--end::Authentication - Sign-in-->
</div>
@endsection