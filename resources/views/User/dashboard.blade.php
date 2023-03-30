@extends('layouts.user')
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>PEKAT Bakom Sari</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="user/assets/img/favicon.png" rel="icon">
  <link href="user/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="user/assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="user/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="user/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="user/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="user/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="user/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="user/assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: FlexStart
  * Updated: Mar 10 2023 with Bootstrap v5.2.3
  * Template URL: https://bootstrapmade.com/flexstart-bootstrap-startup-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

      <a href="{{ route('pekat.index') }}" class="logo d-flex align-items-center">
        <img src="user/assets/img/logo.png" alt="">
        <span>PEMAS Bakom Sari</span>
      </a>

      <nav id="navbar" class="navbar">
        @if (Auth::guard('masyarakat')->check())
        <ul>
            <li><a class="nav-link scrollto" href="{{ route('dashboard.user') }}">Dashboard</a></li>
            <li><a class="nav-link scrollto" href="{{ route('pekat.laporan') }}">Laporan</a></li>
            <li><a class="getstarted scrollto" href="{{ route('pekat.logout') }}">{{ Auth::guard('masyarakat')->user()->nama }}</a></li>
        </ul>
        @else
        <ul>
          <li><a class="nav-link scrollto" href="{{ route('login-user') }}">Masuk</a></li>
          <li><a class="getstarted scrollto" href="{{ route('pekat.formRegister') }}">Registrasi</a></li>
        </ul>
        @endif
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="hero d-flex align-items-center">

    <div class="container">
      <div class="row">
        @if (Session::has('login'))
                  <div class="alert alert-{{ Session::get('') }}">{{ Session::get('login') }}</div>
                  @endif
       
        @if (Session::has('register'))
        <div class="alert alert-{{ Session::get('') }}">{{ Session::get('register') }}</div>
        @endif

        <div class="col-lg-6 d-flex flex-column justify-content-center">
          <h1 data-aos="fade-up">Pengaduan Masyarakat Bakom Sari RT 02/12</h1>
          <h2 data-aos="fade-up" data-aos-delay="400">Aplikasi ini digunakan untuk memudahkan masyarakat bakom sari, khususnya RT 02/12 dalam mengajukan pengaduan atau Laporan yang menjadi keluhan di Lingkungan RT 02</h2>
          <div data-aos="fade-up" data-aos-delay="600">
            <div class="text-center text-lg-start">
            </div>
          </div>
        </div>
        <div class="col-lg-6 hero-img" data-aos="zoom-out" data-aos-delay="200">
          <img src="user/assets/img/hero-img.png" class="img-fluid" alt="">
        </div>
      </div>
    </div>

  </section><!-- End Hero -->

  <main id="main">
    
     <!-- ======= Counts Section ======= -->
     <section id="counts" class="counts">
      <div class="container" data-aos="fade-up">

        <div class="row gy-4">

          <div class="col-lg-3 col-md-6">
            <div class="count-box">
              <div>
                <span data-purecounter-start="0" data-purecounter-end="{{ $pending }}" data-purecounter-duration="1" class="purecounter"></span>
                <p>Pengaduan Pending</p>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="count-box">
              <div>
                <span data-purecounter-start="0" data-purecounter-end="{{ $proses }}" data-purecounter-duration="1" class="purecounter"></span>
                <p>Pengaduan Proses</p>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="count-box">
              <div>
                <span data-purecounter-start="0" data-purecounter-end="{{ $selesai }}" data-purecounter-duration="1" class="purecounter"></span>
                <p>Pengaduan Selesai</p>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="count-box">
              <div>
                <span data-purecounter-start="0" data-purecounter-end="{{ $tanggapan }}" data-purecounter-duration="1" class="purecounter"></span>
                <p>Tanggapan</p>
              </div>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Counts Section -->
    
    
 


    

   
    

        

    {{-- <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>FlexStart</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/flexstart-bootstrap-startup-template/ -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>
  </footer><!-- End Footer --> --}}

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="user/assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="user/assets/vendor/aos/aos.js"></script>
  <script src="user/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="user/assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="user/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="user/assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="user/assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="user/assets/js/main.js"></script>

</body>

</html>