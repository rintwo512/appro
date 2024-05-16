<!DOCTYPE html>
<html lang="en" dir="ltr" data-bs-theme="dark" data-color-theme="Blue_Theme" data-layout="vertical" id="thems">

<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicon icon-->
    <link rel="shortcut icon" type="image/png" href="{{ asset('assets/images/logos/favicon.png') }}" />

    <title>{{ $title ?? config('app.name') }}</title>


    <x-home.styles />



</head>

<body>



    {{-- ALERT --}}
    <div class="flash-error-login" data-errorlogin="{{ session('errorLogin') }}"></div>
    <div class="flash-error" data-error="{{ session('error') }}"></div>
    <div class="flash-success" data-success="{{ session('success') }}"></div>
    <div class="flash-success-toast" id="toasted" data-successtoast="{{ session('successtoast') }}"></div>
    {{-- <div class="toast toast-onload align-items-center text-bg-primary border-0" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="toast-body hstack align-items-start gap-6">
      <i class="ti ti-alert-circle fs-6"></i>
      <div>
        <h5 class="text-white fs-3 mb-1">Welcome to Modernize</h5>
        <h6 class="text-white fs-2 mb-0">Easy to costomize the Template!!!</h6>
      </div>
      <button type="button" class="btn-close btn-close-white fs-2 m-0 ms-auto shadow-none" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
  </div> --}}
    <!-- Preloader -->
    <div class="preloader">
        <img src="{{ asset('assets/images/logos/favicon.png') }}" alt="loader" class="lds-ripple img-fluid" />
    </div>
    <div id="main-wrapper">
        <!-- Sidebar Start -->
        @include('components.partials.sidebar')
        <!--  Sidebar End -->
        <div class="page-wrapper">
            <!--  Header Start -->
            <header class="topbar">
                @include('components.partials.header')
                @include('components.partials.header_horizontal')
            </header>
            <!--  Header End -->

            @include('components.partials.sidebar_horizontal')

            <div class="body-wrapper">
                {{ $slot }}
            </div>
            @include('components.partials.setting_theme')
        </div>

        <!--  Search Bar -->
        @include('components.partials.search_bar')
        <!--  Shopping Cart -->
        <div class="offcanvas offcanvas-end shopping-cart" tabindex="-1" id="offcanvasRight"
            aria-labelledby="offcanvasRightLabel">
            <div class="offcanvas-header justify-content-between py-4">
                <h5 class="offcanvas-title fs-5 fw-semibold" id="offcanvasRightLabel">
                    Memo
                </h5>
                <span class="badge bg-primary rounded-4 px-3 py-1 lh-sm">5 new</span>
            </div>
            <div class="offcanvas-body h-100 px-4 pt-0" data-simplebar>
                <ul class="mb-0">
                    <li class="pb-7">
                        <div class="message-body">
                            <a href="../main/app-email.html" class="py-8 px-7 d-flex align-items-center">
                                <span
                                    class="d-flex align-items-center justify-content-center text-bg-light rounded-1 p-6">
                                    <i class='bx bx-message-square-add fs-7'></i>
                                </span>
                                <div class="w-100 ps-3">
                                    <h6 class="mb-1 fs-3 fw-semibold lh-base">Buat Memo</h6>
                                </div>
                            </a>
                            <a href="../main/app-email.html" class="py-8 px-7 d-flex align-items-center">
                                <span
                                    class="d-flex align-items-center justify-content-center text-bg-light rounded-1 p-6">
                                    <i class='bx bx-message-alt-dots fs-7'></i>
                                </span>
                                <div class="w-100 ps-3">
                                    <h6 class="mb-1 fs-3 fw-semibold lh-base">Memo Masuk</h6>
                                </div>
                                <span class="badge bg-info rounded">3</span>
                            </a>
                            <a href="../main/app-email.html" class="py-8 px-7 d-flex align-items-center">
                                <span
                                    class="d-flex align-items-center justify-content-center text-bg-light rounded-1 p-6">
                                    <i class='bx bx-message-alt-minus fs-7'></i>
                                </span>
                                <div class="w-100 ps-3">
                                    <h6 class="mb-1 fs-3 fw-semibold lh-base">Memo Keluar</h6>
                                </div>
                                <span class="badge bg-warning rounded">3</span>
                            </a>
                            <a href="../main/app-email.html" class="py-8 px-7 d-flex align-items-center">
                                <span
                                    class="d-flex align-items-center justify-content-center text-bg-light rounded-1 p-6">
                                    <i class='bx bx-trash fs-7'></i>
                                </span>
                                <div class="w-100 ps-3">
                                    <h6 class="mb-1 fs-3 fw-semibold lh-base">Trash</h6>
                                </div>
                                <span class="badge bg-danger rounded">3</span>
                            </a>
                        </div>
                    </li>

                </ul>

            </div>
        </div>
    </div>


    <div class="dark-transparent sidebartoggler"></div>

    <x-home.script />

</body>

</html>
