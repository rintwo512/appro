<!DOCTYPE html>
<html lang="en" dir="ltr" data-bs-theme="light" data-color-theme="Blue_Theme" data-layout="vertical">

<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    @include('components.auth.styles')

    <title>APPRO - Login Page</title>
</head>

<body>

    <div class="flash-error-login" data-errorlogin="{{ session('errorLogin') }}"></div>
    <div class="flash-success-login" data-errorsuccess="{{ session('successLogin') }}"></div>
    <!-- Preloader -->
    <div id="main-wrapper" class="auth-customizer-none">
        <div class="position-relative overflow-hidden radial-gradient min-vh-100 w-100">
            <div class="position-relative z-index-5">
                <div class="row">
                    <div class="col-xl-7 col-xxl-8">
                        <a href=""
                            class="text-nowrap logo-img d-block px-4 py-9 w-100 animate__animated animate__backInLeft">
                            <img src="{{ asset('/assets/images/logos/logo.svg') }}" class="dark-logo" alt="Logo-Dark" />

                        </a>
                        <div
                            class="d-none d-xl-flex align-items-center justify-content-center h-n80 animate__animated animate__backInUp">
                            <img src="{{ asset('/assets/images/backgrounds/login-security.svg') }}" alt="modernize-img"
                                class="img-fluid" width="500">
                        </div>
                    </div>
                    <div class="col-xl-5 col-xxl-4 animate__animated animate__backInDown">
                        <div
                            class="authentication-login min-vh-100 bg-body row justify-content-center align-items-center p-4">
                            <div class="auth-max-width col-sm-8 col-md-6 col-xl-7 px-4">
                                <h2 class="mb-1 fs-7 fw-bolder">Welcome to Appro</h2>
                                <div class="position-relative text-center my-4">
                                    <span
                                        class="border-top w-100 position-absolute top-50 start-50 translate-middle"></span>
                                </div>
                                <form method="post" action="{{ route('login.post') }}">
                                    @csrf
                                    <label for="login" class="form-label">NIK or Email</label>
                                    <div class="input-group mb-3">
                                        <input type="number" class="form-control @error('login') is-invalid @enderror"
                                            id="login" name="login">
                                        <button class="btn bg-primary-subtle text-primary rounded-start-0 rounded-end"
                                            type="button" id="toggleUsername"><i
                                                class='bx bxs-calculator'></i></button>
                                        @error('login')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <label for="password" class="form-label">Password</label>
                                    <div class="input-group mb-3">
                                        <input type="password"
                                            class="form-control @error('password') is-invalid @enderror" id="password"
                                            name="password">
                                        <button class="btn bg-primary-subtle text-primary rounded-start-0 rounded-end"
                                            type="button" id="togglePassword"><i class='bx bxs-show'></i></button>
                                        @error('password')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between mb-4">
                                        <a class="text-primary fw-medium fs-3"
                                            href="{{ route('auth.forgot-password') }}">Lupa Sandi ?</a>
                                    </div>
                                    <button type="submit" class="btn btn-primary w-100 py-8 mb-4 rounded-2">Sign
                                        In</button>
                                    <div class="d-flex align-items-center justify-content-center">
                                        <p class="fs-4 mb-0 fw-medium">Belum punya akun?</p>
                                        <a class="text-primary fw-medium ms-2" href="javascritp:void(0)"
                                            id="btnRegister">Buat akun</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="dark-transparent sidebartoggler"></div>

    @include('components.admin.manajemen-users.modal-detail-users')
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
