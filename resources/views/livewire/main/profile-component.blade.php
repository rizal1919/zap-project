@extends('layouts.template')

@section('title', 'Profile')

@section('js_scripts')
    <script src="metronic_assets/profile.js"></script>
@endsection

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
			<div class="w-lg-500px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto">
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
				<form class="form w-100" id="profile_form">
					<!--begin::Heading-->
					@csrf
                    @routes
					<div class="text-center mb-6">
						<h1 class="text-dark mb-3 text-capitalize">{{ $user->username }}</h1>
					</div>
					<div class="fv-row mb-5">
                        <!--begin::Label-->
                        <label class="form-label required">Tempat anda sekarang</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <select class="form-select" data-control="select2" name="place" data-placeholder="Pilih Tempat">
                            <option></option>
                            @foreach($places as $data)
                                <option value="{{ $data->id }}">{{ $data->place }}</option>
                            @endforeach
                        </select>
                        <!--end::Input-->
                    </div>
                    <div class="fv-row mb-5">
                        <textarea name="activity" class="form-control" placeholder="Isikan kendala di sini..." id="activity" cols="5" rows="5"></textarea>
                    </div>
					<!--begin::Actions-->
					<div class="text-center">
						<!--begin::Submit button-->
						<button type="submit" id="profile_submit" class="btn btn-sm btn-success">
							<span class="indicator-label">Mulai</span>
							<span class="indicator-progress">Silahkan Tunggu...
							<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
						</button>
						
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


