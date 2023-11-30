@extends('layouts.app')

@section('main-content')
<!--begin::Authentication - Sign-in -->
<div class="d-flex flex-column flex-column-fluid bgi-position-y-bottom position-x-center bgi-no-repeat bgi-size-contain bgi-attachment-fixed" style="background-image: url(assets/media/illustrations/sigma-1/14.png">
    <!--begin::Content-->
    <div class="d-flex flex-center flex-column flex-column-fluid p-10 pb-lg-20">
        <!--begin::Logo-->
        <a href="../../demo7/dist/index.html" class="mb-12">
            <img alt="Logo" src="{{ asset('media/logos/logo-1.svg') }}" class="h-40px" />
        </a>
        <!--end::Logo-->
        <!--begin::Wrapper-->
        <div class="w-lg-500px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto">
            <!--begin::Form-->
            <form class="form w-100" novalidate="novalidate" id="kt_sign_in_form" method="POST" action="{{ route('login') }}">
                    @csrf
                <!--begin::Heading-->
                <div class="text-center mb-10">
                    <!--begin::Title-->
                    <h1 class="text-dark mb-3">Sign In</h1>
                </div>
                <div class="fv-row text-center">
                    <!--begin::Label-->
                    <label class="form-label fs-6 fw-bolder text-dark">Email</label>
                    <input class="form-control form-control-lg form-control-solid @error('email') is-invalid @enderror" type="text" name="email" value="{{ old('email') }}" autocomplete="email" autofocus />
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <!--end::Input-->
                </div>
                <div class="fv-row mb-10 text-center">
                    <!--begin::Wrapper-->
                    <div class="d-flex flex-stack mb-2">
                        <!--begin::Label-->
                        <label class="form-label fw-bolder text-dark fs-6 mb-0">Password</label>
                        <a href="../../demo7/dist/authentication/flows/basic/password-reset.html" class="link-primary fs-6 fw-bolder">Forgot Password ?</a>
                        <!--end::Link-->
                    </div>
                    <input class="form-control form-control-lg form-control-solid @error('password') is-invalid @enderror" type="password" name="password" required autocomplete="current-password" />
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="text-center">
                    <!--begin::Submit button-->
                    <button type="submit" id="kt_sign_in_submit" class="btn btn-lg btn-primary w-100 mb-5">
                        <span class="indicator-label">Continue</span>
                        <span class="indicator-progress">Please wait...
                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                    </button>
                    <!--end::Separator-->
                </div>
                <!--end::Actions-->
            </form>
            <!--end::Form-->
        </div>
        <!--end::Wrapper-->
    </div>
    <div class="d-flex flex-center flex-column-auto p-10">
        <!--begin::Links-->
        <div class="d-flex align-items-center fw-bold fs-6">
            <a href="#" class="text-muted text-hover-primary px-2">About</a>
            <a href="#" class="text-muted text-hover-primary px-2">Contact</a>
            <a href="#" class="text-muted text-hover-primary px-2">Contact Us</a>
        </div>
        <!--end::Links-->
    </div>
    <!--end::Footer-->
</div>
<!--end::Authentication - Sign-in-->
@endsection
