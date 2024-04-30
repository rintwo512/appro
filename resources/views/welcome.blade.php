
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>APPRO - Welcome Page</title>
  <meta name="robots" content="noindex, nofollow">
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('assets/css/welcome/bootstrap.min.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
  <!-- Template Main CSS File -->
  <link href="{{ asset('/assets/css/welcome.css') }}" rel="stylesheet">

  
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top ">
    <div class="container d-flex align-items-center">

      {{-- <h1 class="logo me-auto"><a href="index.html">Arsha</a></h1> --}}
      <!-- Uncomment below if you prefer to use an image logo -->
     <a href="index.html" class="logo me-auto animate__animated animate__backInLeft"><img src="{{ asset('/assets/images/logos/logo2.svg') }}" alt="" class="img-fluid"></a>

     

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">

    <div class="container">
      <div class="row">
        <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1 animate__animated animate__slideInUp" data-aos="fade-up" data-aos-delay="200">
          <h1>Better Solutions For Your Business</h1>
          <h2>Kami adalah tim desainer berbakat yang membuat website.</h2>
          <div class="d-flex justify-content-center justify-content-lg-start">
            <a href="{{ route('login') }}" class="btn-get-started scrollto">Get Started</a>          
          </div>
        </div>
        <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
          <img src="{{ asset('/assets/images/backgrounds/hero-img.png') }}" class="animate__animated animate__zoomIn img-fluid animasi" alt="">
        </div>
      </div>
    </div>

  </section><!-- End Hero -->

 

  <script src="{{ asset('/assets/js/welcome.js') }}"></script>


</body>

</html>