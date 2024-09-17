<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Pelayanan - Dasa Wisma Kabupaten Jepara</title>
  <meta name="description" content="Temukan layanan yang ditawarkan oleh Dasa Wisma Kabupaten Jepara, termasuk pengembangan komunitas, layanan kesehatan, dan inisiatif pendidikan.">
  <meta name="keywords" content="Dasa Wisma, Jepara, Pengembangan Komunitas, Kesehatan, Pendidikan">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700&family=Poppins:wght@100;300;400;500;600;700&family=Raleway:wght@100;300;400;500;600;700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">
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


<body class="services-page">


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
        <h1>Pelayanan</h1>
        <p>Temukan berbagai layanan yang kami tawarkan untuk mendukung pengembangan komunitas, kesehatan, dan pendidikan di Kabupaten Jepara.</p>
        <nav class="breadcrumbs">
          <ol>
            <li><a href="{{ url('/') }}">Beranda</a></li>
            <li class="current">Pelayanan</li>
          </ol>
        </nav>
      </div>
    </div><!-- End Page Title -->


    <!-- Featured Services Section -->
    <section id="featured-services" class="featured-services section">

      <div class="container">

        <div class="row gy-4">

          <!-- <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
            <div class="service-item item-cyan position-relative">
              <div class="icon">
                <i class="bi bi-heart-pulse"></i> <! Mengganti ikon untuk layanan kesehatan 
              </div>
              <a href="#" class="stretched-link">
                <h3>Layanan Kesehatan</h3>
              </a>
              <p>Memberikan dukungan kesehatan yang komprehensif untuk meningkatkan kesejahteraan masyarakat. Termasuk layanan medis, konsultasi, dan perawatan kesehatan dasar.</p>
            </div>
          </div><!-- End Service Item -->

          <!--
          <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="200">
            <div class="service-item item-orange position-relative">
              <div class="icon">
                <i class="bi bi-tools"></i> <!-Mengganti ikon untuk pelatihan keterampilan 
              </div>
              <a href="#" class="stretched-link">
                <h3>Pelatihan Keterampilan</h3>
              </a>
              <p>Menyediakan berbagai pelatihan keterampilan untuk meningkatkan kemampuan warga. Termasuk pelatihan teknis, kewirausahaan, dan keterampilan praktis lainnya.</p>
            </div>
          </div><!-- End Service Item 

          <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="300">
            <div class="service-item item-teal position-relative">
              <div class="icon">
                <i class="bi bi-book"></i> <!- Mengganti ikon untuk pengembangan pendidikan 
              </div>
              <a href="#" class="stretched-link">
                <h3>Pengembangan Pendidikan</h3>
              </a>
              <p>Program-program untuk meningkatkan kualitas pendidikan di Kabupaten Jepara. Meliputi pengadaan bahan ajar, pelatihan untuk guru, dan dukungan untuk sekolah-sekolah.</p>
            </div>
          </div><!-- End Service Item 


         <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="400">
            <div class="service-item item-red position-relative">
              <div class="icon">
                <i class="bi bi-people"></i> <!-- Mengganti ikon untuk pemberdayaan masyarakat 
              </div>
              <a href="#" class="stretched-link">
                <h3>Program Pemberdayaan Masyarakat</h3>
              </a>
              <p>Inisiatif untuk memberdayakan masyarakat dengan berbagai program sosial dan ekonomi. Fokus pada peningkatan kualitas hidup melalui bantuan langsung dan pengembangan komunitas.</p>
              <a href="#" class="stretched-link"></a>
            </div>
          </div><!-- End Service Item -->


        </div>

      </div>

    </section><!-- /Featured Services Section -->

    <section id="services" class="services section">
      <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="row gy-4">
          @foreach($services as $service)
          <div class="col-lg-6" data-aos="zoom-in" data-aos-delay="{{ $loop->iteration * 100 + 100 }}">
            <div class="service-item position-relative">
              <div class="img text-center mb-3">
                <!-- Atur gambar agar selalu rapi dan tidak terlalu besar -->
                <img src="{{ asset('storage/' . $service->image) }}" class="img-fluid services-img" alt="{{ $service->title }}" style="max-width: 100%; height: auto; max-height: 300px; object-fit: cover; border-radius: 10px;">
              </div>
              <div class="details">
                <!-- Batasi panjang judul dan deskripsi -->
                <a href="{{ route('service-details', ['id' => $service->id]) }}" class="stretched-link">
                  <h3>{{ Str::limit($service->title, 50) }}</h3>
                </a>
                <p>{{ Str::limit($service->description, 100, '...') }}</p>
              </div>
            </div>
          </div><!-- End Service Item -->
          @endforeach
        </div>
      </div>
    </section><!-- /Services Section -->



    <!-- Pricing Section 
    <section id="pricing" class="pricing section">

      <!-- Section Title 
      <div class="container section-title" data-aos="fade-up">
        <h2>Pricing</h2>
        <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
      </div><!-- End Section Title 

      <div class="container">

        <div class="row g-4 g-lg-0">

          <div class="col-lg-4" data-aos="zoom-in" data-aos-delay="100">
            <div class="pricing-item">
              <h3>Free Plan</h3>
              <h4><sup>$</sup>0<span> / month</span></h4>
              <ul>
                <li><i class="bi bi-check"></i> <span>Quam adipiscing vitae proin</span></li>
                <li><i class="bi bi-check"></i> <span>Nec feugiat nisl pretium</span></li>
                <li><i class="bi bi-check"></i> <span>Nulla at volutpat diam uteera</span></li>
                <li class="na"><i class="bi bi-x"></i> <span>Pharetra massa massa ultricies</span></li>
                <li class="na"><i class="bi bi-x"></i> <span>Massa ultricies mi quis hendrerit</span></li>
              </ul>
              <div class="text-center"><a href="#" class="buy-btn">Buy Now</a></div>
            </div>
          </div><!-End Pricing Item 

          <div class="col-lg-4 featured" data-aos="zoom-in" data-aos-delay="200">
            <div class="pricing-item">
              <h3>Business Plan</h3>
              <h4><sup>$</sup>29<span> / month</span></h4>
              <ul>
                <li><i class="bi bi-check"></i> <span>Quam adipiscing vitae proin</span></li>
                <li><i class="bi bi-check"></i> <span>Nec feugiat nisl pretium</span></li>
                <li><i class="bi bi-check"></i> <span>Nulla at volutpat diam uteera</span></li>
                <li><i class="bi bi-check"></i> <span>Pharetra massa massa ultricies</span></li>
                <li><i class="bi bi-check"></i> <span>Massa ultricies mi quis hendrerit</span></li>
              </ul>
              <div class="text-center"><a href="#" class="buy-btn">Buy Now</a></div>
            </div>
          </div><!-- End Pricing Item 

          <div class="col-lg-4" data-aos="zoom-in" data-aos-delay="100">
            <div class="pricing-item">
              <h3>Developer Plan</h3>
              <h4><sup>$</sup>49<span> / month</span></h4>
              <ul>
                <li><i class="bi bi-check"></i> <span>Quam adipiscing vitae proin</span></li>
                <li><i class="bi bi-check"></i> <span>Nec feugiat nisl pretium</span></li>
                <li><i class="bi bi-check"></i> <span>Nulla at volutpat diam uteera</span></li>
                <li><i class="bi bi-check"></i> <span>Pharetra massa massa ultricies</span></li>
                <li><i class="bi bi-check"></i> <span>Massa ultricies mi quis hendrerit</span></li>
              </ul>
              <div class="text-center"><a href="#" class="buy-btn">Buy Now</a></div>
            </div>
          </div><!-- End Pricing Item 

        </div>

      </div>

    </section> Pricing Section -->

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
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>

  <!-- Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>