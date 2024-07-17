<!DOCTYPE html>
<html lang="en" dir="ltr" data-bs-theme="light" data-color-theme="Blue_Theme" data-layout="vertical">

<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    @include('components.auth.styles')

    <title>APPRO - Forgot Password</title>
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
                                       Silakan masukkan alamat email yang terkait dengan akun Anda dan Kami akan mengirimkan email berisi tautan untuk mengatur ulang kata sandi Anda.
                                    </p>
                                </div>
                                <form action="{{ route('auth.forgot-password.post') }}" method="post">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email address</label>
                                        <input type="text" class="form-control" id="email" name="email"
                                            value="{{ old('email') }}">
                                        @error('email')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <button type="submit" class="btn btn-primary w-100 py-8 mb-3">Forgot
                                        Password</button>
                                    <a href="{{ route('login') }}"
                                        class="btn bg-primary-subtle text-primary w-100 py-8">Back to
                                        Login</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="dark-transparent sidebartoggler"></div>

        @include('components.auth.script')

        <script>
            const btnReg = document.getElementById("btnRegister");
            btnReg.addEventListener("click", () => {
                Swal.fire({
                    icon: 'error',
                    title: "Oops...",
                    html: "Silahkan hubungi Administrator Anda!!!",
                    footer: '<a href="">www.appro.co.id</a>'
                })
            });
        </script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const togglePassword = document.querySelector('#togglePassword');
                const password = document.querySelector('#password');

                togglePassword.addEventListener('click', function() {
                    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
                    password.setAttribute('type', type);

                    // Ganti ikon
                    if (type === 'password') {
                        togglePassword.innerHTML = '<i class="bx bxs-show"></i>';
                    } else {
                        togglePassword.innerHTML = '<i class="bx bxs-hide"></i>';
                    }
                });

                const toggleUsername = document.querySelector('#toggleUsername');
                const login = document.querySelector('#login');

                toggleUsername.addEventListener('click', function() {
                    const type = login.getAttribute('type') === 'number' ? 'email' : 'number';
                    login.setAttribute('type', type);

                    // Ganti ikon
                    if (type === 'number') {
                        toggleUsername.innerHTML = '<i class="bx bxs-calculator"></i>';
                    } else {
                        toggleUsername.innerHTML = '<i class="bx bxs-envelope"></i>';
                    }
                });
            });
        </script>
</body>

</html>
