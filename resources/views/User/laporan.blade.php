@extends('layouts.user')
@section('css')
<link rel="stylesheet" href="{{ asset('css/laporan.css') }}">
<style>
    .notification {
        padding: 14px;
        text-align: center;
        background: #f4b704;
        color: #fff;
        font-weight: 300;
    }

    .btn-white {
        background: black;
        color: #000;
        text-transform: uppercase;
        padding: 0px 25px 0px 25px;
        font-size: 14px;
    }
</style>
@endsection
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>PEKAT Bakom Sari || Laporan</title>
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
          <li><a class="nav-link scrollto" href="{{ route('login-user') }}">Login</a></li>
          <li><a class="getstarted scrollto" href="{{ route('pekat.formRegister') }}">Register</a></li>
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
        @if (session('success'))
        <div class = "alert alert-error alert-dismissible fade show" role="alert">
               {{session('success')}}
       <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
       </div>
       @endif
       
       @if (session('error'))
       <div class = "alert alert-error alert-dismissible fade show" role="alert">
              {{session('error')}}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
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
    <!-- ======= About Section ======= -->
    <section id="about" class="about">

      <div class="container" data-aos="fade-up">
        <div class="row justify-content-between">
          <div class="col-lg-8 col-md-12 col-sm-12 col-12 col">
              <div class="content content-top shadow">
                  @if ($errors->any())
                  @foreach ($errors->all() as $error)
                  <div class="alert alert-danger">{{ $error }}</div>
                  @endforeach
                  @endif
                  @if (Session::has('pengaduan'))
                  <div class="alert alert-{{ Session::get('type') }}">{{ Session::get('pengaduan') }}</div>
                  @endif
                  <form action="{{ route('pekat.store') }}" method="POST" enctype="multipart/form-data">
                      @csrf
                      <div class="form-group">
                          <input type="text" value="{{ old('judul_laporan') }}" name="judul_laporan" placeholder="Masukkan Judul Laporan"
                              class="form-control">
                      </div>
                      <div class="form-group">
                          <input type="hidden" value="{{ Auth::guard('masyarakat')->user()->nama }}" name="nama" placeholder="Masukkan Nama"
                              class="form-control">
                      </div>
                      <div class="form-group">
                          <textarea name="isi_laporan" placeholder="Masukkan Isi Laporan" class="form-control"
                              rows="4">{{ old('isi_laporan') }}</textarea>
                      </div>
                      <div class="form-group">
                          <input type="text" value="{{ old('tgl_kejadian') }}" name="tgl_kejadian" placeholder="Pilih Tanggal Kejadian" class="form-control"
                              onfocusin="(this.type='date')" onfocusout="(this.type='text')">
                      </div>
                      <div class="form-group">
                          <textarea name="lokasi_kejadian" rows="3" class="form-control" placeholder="Lokasi Kejadian">{{ old('lokasi_kejadian') }}</textarea>
                      </div>
                      <div class="form-group">
                          <div class="input-group mb-3">
                              <select name="kategori_kejadian" class="custom-select" id="inputGroupSelect01" required>
                                  <option value="" selected>Pilih Kategori Kejadian</option>
                                  <option value="agama">Agama</option>
                                  <option value="hukum">Hukum</option>
                                  <option value="lingkungan">Lingkungan</option>
                                  <option value="sosial">Sosial</option>
                              </select>
                          </div>
                      </div>
                      <div class="form-group">
                          <input type="file" name="foto" class="form-control">
                      </div>
                      <button type="submit" class="btn btn-custom mt-2">Kirim</button>
                  </form>
              </div>
          </div>
          <div class="col-lg-4 col-md-12 col-sm-12 col-12 col">
              <div class="content content-bottom shadow">
                  <div>
                      <img src="{{ asset('images/user_default.svg') }}" alt="user profile" class="photo">
                      <div class="self-align">
                          <h5><a style="color: #6a70fc" href="#">{{ Auth::guard('masyarakat')->user()->nama }}</a></h5>
                          <p class="text-dark">{{ Auth::guard('masyarakat')->user()->username }}</p>
                      </div>
                      <div class="row text-center">
                          <div class="col">
                              <p class="italic mb-0">Pending</p>
                              <div class="text-center">
                                  {{ $hitung[0] }}
                              </div>
                          </div>
                          <div class="col">
                              <p class="italic mb-0">Proses</p>
                              <div class="text-center">
                                  {{ $hitung[1] }}
                              </div>
                          </div>
                          <div class="col">
                              <p class="italic mb-0">Selesai</p>
                              <div class="text-center">
                                  {{ $hitung[2] }}
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  
      <div class="row mt-5">
          <div class="col-lg-8">
              <a class="d-inline tab {{ $siapa != 'me' ? 'tab-active' : ''}} mr-4" href="{{ route('pekat.laporan') }}">
                  Semua
              </a>
              <hr>
          </div>
          <table id="pengaduanTable" class="table">
              <thead>
                  <tr>
                      <th>No</th>
                      <th>Tanggal</th>
                      <th>Isi Laporan</th>
                      <th>Status</th>
                      <th>Tanggapan</th>
                  </tr>
              </thead>
              <tbody>
                  @foreach ($pengaduan as $k => $v)
                  <tr>
                      <td>{{ $k += 1 }}</td>
                      <td>{{ $v->tgl_pengaduan }}</td>
                      <td>{{ $v->isi_laporan }}</td>
                      <td>
                          @if ($v->status == '0')
                              <a href="" class="badge badge-danger">Pending</a>
                          @elseif($v->status == 'proses')
                              <a href="" class="badge badge-warning text-white">Proses</a>
                          @else
                              <a href="" class="badge badge-success">Selesai</a>
                          @endif
                      </td>
                      <td>    
                      @if ($v->tanggapan != null)
                      <p class="light">{{ $v->tanggapan->tanggapan }}</p>
                      @endif
                      </td>
                  </tr>
                  @endforeach
              </tbody>
          </table>
      </div>
  </div> 
      </div>

    </section><!-- End About Section -->

    
    

        

    

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