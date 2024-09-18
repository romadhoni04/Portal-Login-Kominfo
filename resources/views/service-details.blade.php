<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>{{ $service->title }} - Dasa Wisma Kabupaten Jepara</title>
  <meta name="description" content="Detail layanan {{ $service->title }} dari Dasa Wisma Kabupaten Jepara.">
  <meta name="keywords" content="Dasa Wisma, Jepara, {{ $service->title }}, Layanan">

  <!-- Favicons -->
  <link href="{{ asset('assets/img/favicon.png') }}" rel="icon">
  <link href="{{ asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700&family=Poppins:wght@100;300;400;500;600;700&family=Raleway:wght@100;300;400;500;600;700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">
  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=G-6HV0L5NBCE"></script>
  <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
      dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'G-6HV0L5NBCE');
  </script>

</head>

<body class="service-details-page">


  <header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

      <a href="{{ url('/') }}" class="logo d-flex align-items-center">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <img src="https://sippn.menpan.go.id/images/article/large/logo-jepara-11.png" alt="Dasa Wisma Kabupaten Jepara" style="max-width: 65px; max-height: 65px;">
        <h1 class="sitename">Dasa Wisma Jepara</h1>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="{{ url('/') }}">Beranda</a></li>
          <li><a href="{{ route('about') }}">Tentang</a></li>
          <li><a href="{{ route('services') }}" class="active">Layanan</a></li>
          <li><a href="{{ route('portfolio') }}">Portofolio</a></li>
          <!-- <li><a href="{{ route('team') }}">Tim</a></li> -->
          <li><a href="{{ route('blog.index') }}">Blog</a></li>
          <li><a href="{{ url('contact') }}">Kontak</a></li>
          <li><a href="{{ url('login') }}">Masuk</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

    </div>
  </header>

  <main class="main">

    <!-- Page Title -->
    <div class="page-title dark-background">
      <div class="container position-relative">
        <h1>Detail Pelayanan</h1>
        <p>Temukan berbagai layanan yang kami tawarkan untuk mendukung pengembangan komunitas, kesehatan, dan pendidikan di Kabupaten Jepara.</p>
        <nav class="breadcrumbs">
          <ol>
            <li><a href="{{ url('/') }}">Home</a></li>
            <li class="current">Service Details</li>
          </ol>
        </nav>
      </div>
    </div><!-- End Page Title -->

    <!-- Service Details Section -->
    <section id="service-details" class="service-details section">

      <div class="container">

        <div class="row gy-5">

          <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">

            <div class="service-box">
              <h4>Services List</h4>
              <div class="services-list">
                @foreach($services as $otherService)
                <a href="{{ route('service-details', $otherService->id) }}" class="{{ $service->id === $otherService->id ? 'active' : '' }}">
                  <i class="bi bi-arrow-right-circle"></i>
                  <span>{{ $otherService->title }}</span>
                </a>
                @endforeach
              </div>
            </div>
            <!-- End Services List -->

            <!-- Tambahkan bagian author role dan nama di sini -->
            <!-- Tambahkan bagian author role dan nama di sini -->

            <div class="author-info">
              <div class="avatar">
                <!-- Avatar Placeholder, bisa diganti dengan gambar atau inisial -->
                @if($service->author)
                {{ strtoupper($service->author->fullName[0]) }}
                @else
                ?
                @endif
              </div>
              <div class="details">
                @if($service->author)
                <p class="role">Pengunggah : <br> {{ $service->author->role }}</p>
                <p class="name">Nama : <br> {{ $service->author->fullName }}</p>
                @else
                <p class="unknown">Role: Unknown Author</p>
                @endif
              </div>
            </div>



            <!-- Akhir bagian author role dan nama -->

            <div class="service-box">
              <h4>Download Document</h4>
              <div class="download-catalog">
                @if($service->catalog_pdf)
                <a href="{{ asset('storage/' . $service->catalog_pdf) }}" target="_blank">
                  <i class="bi bi-filetype-pdf"></i><span>Catalog PDF</span>
                </a>
                @endif

                @if($service->catalog_doc)
                <a href="{{ asset('storage/' . $service->catalog_doc) }}" target="_blank">
                  <i class="bi bi-file-earmark-word"></i><span>Catalog DOC</span>
                </a>
                @endif
              </div>
            </div>
            <!-- End Services List -->

            <div class="help-box d-flex flex-column justify-content-center align-items-center">
              <i class="bi bi-headset help-icon"></i>
              <h4>Mempunyai Pertanyaan?</h4>
              <p class="d-flex align-items-center mt-2 mb-0">
                <i class="bi bi-telephone me-2"></i>
                <a href="tel:+0291591492" class="text-decoration-none">0291591492</a>
              </p>
              <p class="d-flex align-items-center mt-1 mb-0">
                <i class="bi bi-envelope me-2"></i>
                <a href="mailto:diskominfo@jepara.go.id" class="text-decoration-none">diskominfo@jepara.go.id</a>
              </p>
            </div>

          </div>


          <div class="col-lg-8 ps-lg-5" data-aos="fade-up" data-aos-delay="200">
            <div style="text-align: center;">
              <img src="{{ asset('storage/' . $service->image) }}" alt="{{ $service->title }}" class="img-fluid services-img">
            </div>

            <h3>{{ $service->title }}</h3>
            <!-- Menggunakan nl2br untuk menjaga enter atau baris baru -->
            <p>{!! nl2br(e($service->description)) !!}</p>

            <!-- Daftar fitur atau keuntungan layanan jika ada -->
            <!-- Anda bisa menambahkan fitur seperti ini jika ada kolom fitur -->
            @if(!empty($service->features))
            <ul>
              @foreach($service->features as $feature)
              <li><i class=" bi bi-check-circle"></i> <span>{{ $feature }}</span></li>
              @endforeach
            </ul>
            @endif
            <p>
              <!-- Deskripsi tambahan layanan -->
            </p>
          </div>


        </div>

      </div>

    </section><!-- /Service Details Section -->

  </main>

  <footer id="footer" class="footer dark-background">

    <div class="container footer-top">
      <div class="row gy-4">
        <div class="col-lg-4 col-md-6 footer-about">
          <a href="{{ url('/') }}" class="d-flex align-items-center">
            <span class="sitename">Dasa Wisma Kabupaten Jepara</span>
          </a>
          <div class="footer-contact pt-3">
            <p>Lantai 2 Diskominfo Jepara, Gedung OPD Bersama.</p>
            <p>Jl.Kartini No.1 Jepara.</p>
            <p class="mt-3"><strong>Phone:</strong> <span>0291591492</span></p>
            <p><strong>Email:</strong> <span>diskominfo@jepara.go.id</span></p>

          </div>
        </div>

        <div class="col-lg-2 col-md-3 footer-links">
          <h4>Layanan Kami</h4>
          <ul>
            <li><i class="bi bi-chevron-right"></i> <a href="{{ url('/') }}">Beranda</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="{{ route('about') }}">Tentang</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="{{ route('services') }}">Layanan</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="{{ route('contact') }}">Kontak</a></li>
          </ul>
        </div>

        <div class="col-lg-2 col-md-3 footer-links">
          <h4>Layanan Kami</h4>
          <ul>
            <li><i class="bi bi-chevron-right"></i> <a href="https://jepara.go.id/" target="_blank" rel="noopener noreferrer">Website Jepara</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="https://wadul.jepara.go.id/" target="_blank" rel="noopener noreferrer">Wadul Bupati Jepara</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="https://diskominfo.jepara.go.id/" target="_blank" rel="noopener noreferrer">Diskominfo Jepara</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="https://samudra.jepara.go.id/" target="_blank" rel="noopener noreferrer">Samudra Jepara</a></li>
          </ul>

        </div>

        <div class="col-lg-4 col-md-12">
          <h4>Ikuti Kami</h4>
          <p>Kunjungi media sosial kami untuk berita terbaru dan informasi tentang program Dasa Wisma Kabupaten Jepara.</p>
          <div class="social-links d-flex">
            <a href="https://x.com/diskominfojpr"><i class="bi bi-twitter-x"></i></a>
            <a href="https://www.facebook.com/diskominfo.jepara.go.id/"><i class="bi bi-facebook"></i></a>
            <a href="https://www.instagram.com/diskominfojpr/"><i class="bi bi-instagram"></i></a>
            <a href="diskominfo@jepara.go.id"><i class="bi bi-envelope"></i></a>

          </div>
        </div>

      </div>
    </div>

    <div class="footer-bottom">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-6 text-center">
            <p>&copy; 2024 Dasa Wisma Kabupaten Jepara. Semua hak cipta dilindungi. <br> Website ini dikembangkan oleh <a href="https://diskominfo.jepara.go.id/" class="custom-link">Diskominfo Jepara</a>.</p>
          </div>
        </div>
      </div>
    </div>

  </footer>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>
  <script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
  <script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
  <script src="{{ asset('assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/waypoints/noframework.waypoints.js') }}"></script>
  <script src="{{ asset('assets/vendor/imagesloaded/imagesloaded.pkgd.min.js') }}"> </script>

  <!--Main JS File -->
  <script src="{{ asset('assets/js/main.js') }}"></script>

</body>

</html>