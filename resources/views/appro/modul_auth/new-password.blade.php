<!DOCTYPE html>
<html lang="en" dir="ltr" data-bs-theme="light" data-color-theme="Blue_Theme" data-layout="vertical">

<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    @include('components.auth.styles')

    <title>APPRO - Create New Password</title>
</head>

<body>

    <div class="flash-error-login" data-errorlogin="{{ session('errorLogin') }}"></div>
    <div class="flash-success-login" data-errorsuccess="{{ session('successLogin') }}"></div>
    <!-- Preloader -->
    <div id="main-wrapper" class="auth-customizer-none">
        <div
            class="position-relative overflow-hidden radial-gradient min-vh-100 w-100 d-flex align-items-center justify-content-center">
            <div class="d-flex align-items-center justify-content-center w-100">
                <div class="row justify-content-center w-100">
                    <div class="col-md-8 col-lg-6 col-xxl-3 auth-card">
                        <div class="card mb-0">
                            <div class="card-body pt-5">
                                <a href="#" class="text-nowrap logo-img text-center d-block mb-4 w-100">
                                    <img src="{{ asset('/assets/images/logos/logo.svg') }}" class="dark-logo"
                                        alt="Logo-Dark" />
                                </a>
                                <div class="mb-5 text-center">
                                    <p class="mb-0 ">
                                        Silahkan masukkan password baru Anda pada kolom dibawah.
                                    </p>
                                </div>
                                <form action="{{ route('reset.password.post') }}" method="post">
                                    @csrf
                                    <input type="text" hidden name="token" value="{{ $token }}">
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email address</label>
                                        <input type="text" class="form-control" name="email" placeholder="Email"
                                            value="{{ $email }}" readonly>
                                        @error('email')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="password" class="form-label">New Password</label>
                                        <input type="password" class="form-control" name="password" id="password">
                                        @error('password')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="password_confirmation" class="form-label">Retype Password</label>
                                        <input type="password" class="form-control" name="password_confirmation"
                                            id="password_confirmation">
                                        @error('password_confirmation')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <button type="submit" class="btn btn-primary w-100 py-8 mb-3">Submit</button>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="dark-transparent sidebartoggler"></div>

        @include('components.auth.script')
</body>

</html>
