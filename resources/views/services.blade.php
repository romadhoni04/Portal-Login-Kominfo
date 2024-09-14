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
          <a href="{{ url('/') }}">Home</a>

          <li><a href="{{ route('about') }}">About</a></li>
          <li><a href="{{ route('services') }}" class="active">Services</a></li>
          <li><a href="{{ route('portfolio') }}">Portfolio</a></li>
          <li><a href="{{ route('team') }}">Team</a></li>
          <li><a href="{{ route('blog') }}">Blog</a></li>
          <li><a href="{{ url('contact') }}">Contact</a></li>
          <li><a href="{{ url('login') }}">Login</a></li>
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

          <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
            <div class="service-item item-cyan position-relative">
              <div class="icon">
                <i class="bi bi-heart-pulse"></i> <!-- Mengganti ikon untuk layanan kesehatan -->
              </div>
              <a href="{{ route('service-details') }}" class="stretched-link">
                <h3>Layanan Kesehatan</h3>
              </a>
              <p>Memberikan dukungan kesehatan yang komprehensif untuk meningkatkan kesejahteraan masyarakat. Termasuk layanan medis, konsultasi, dan perawatan kesehatan dasar.</p>
            </div>
          </div><!-- End Service Item -->


          <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="200">
            <div class="service-item item-orange position-relative">
              <div class="icon">
                <i class="bi bi-tools"></i> <!-- Mengganti ikon untuk pelatihan keterampilan -->
              </div>
              <a href="{{ route('service-details') }}" class="stretched-link">
                <h3>Pelatihan Keterampilan</h3>
              </a>
              <p>Menyediakan berbagai pelatihan keterampilan untuk meningkatkan kemampuan warga. Termasuk pelatihan teknis, kewirausahaan, dan keterampilan praktis lainnya.</p>
            </div>
          </div><!-- End Service Item -->

          <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="300">
            <div class="service-item item-teal position-relative">
              <div class="icon">
                <i class="bi bi-book"></i> <!-- Mengganti ikon untuk pengembangan pendidikan -->
              </div>
              <a href="{{ route('service-details') }}" class="stretched-link">
                <h3>Pengembangan Pendidikan</h3>
              </a>
              <p>Program-program untuk meningkatkan kualitas pendidikan di Kabupaten Jepara. Meliputi pengadaan bahan ajar, pelatihan untuk guru, dan dukungan untuk sekolah-sekolah.</p>
            </div>
          </div><!-- End Service Item -->


          <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="400">
            <div class="service-item item-red position-relative">
              <div class="icon">
                <i class="bi bi-people"></i> <!-- Mengganti ikon untuk pemberdayaan masyarakat -->
              </div>
              <a href="{{ route('service-details') }}" class="stretched-link">
                <h3>Program Pemberdayaan Masyarakat</h3>
              </a>
              <p>Inisiatif untuk memberdayakan masyarakat dengan berbagai program sosial dan ekonomi. Fokus pada peningkatan kualitas hidup melalui bantuan langsung dan pengembangan komunitas.</p>
              <a href="{{ route('service-details') }}" class="stretched-link"></a>
            </div>
          </div><!-- End Service Item -->


        </div>

      </div>

    </section><!-- /Featured Services Section -->

    <!-- Services Section -->
    <section id="services" class="services section">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4">

          <div class="col-lg-6" data-aos="zoom-in" data-aos-delay="200">
            <div class="service-item position-relative">
              <div class="img">
                <img src="assets/img/services-1.jpg" class="img-fluid" alt="Layanan 1">
              </div>
              <div class="details">
                <a href="{{ route('service-details') }}" class="stretched-link">
                  <h3>Pendidikan dan Pelatihan</h3>
                </a>
                <p>Program pendidikan dan pelatihan untuk meningkatkan keterampilan masyarakat dalam berbagai bidang, termasuk keahlian teknis dan manajerial.</p>
              </div>
            </div>
          </div><!-- End Service Item -->

          <div class="col-lg-6" data-aos="zoom-in" data-aos-delay="300">
            <div class="service-item position-relative">
              <div class="img">
                <img src="assets/img/services-2.jpg" class="img-fluid" alt="Layanan 2">
              </div>
              <div class="details">
                <a href="{{ route('service-details') }}" class="stretched-link">
                  <h3>Kesehatan Masyarakat</h3>
                </a>
                <p>Inisiatif untuk meningkatkan kesehatan masyarakat melalui layanan kesehatan, pemeriksaan rutin, dan program pencegahan penyakit.</p>
              </div>
            </div>
          </div><!-- End Service Item -->

          <div class="col-lg-6" data-aos="zoom-in" data-aos-delay="400">
            <div class="service-item position-relative">
              <div class="img">
                <img src="assets/img/services-3.jpg" class="img-fluid" alt="Layanan 3">
              </div>
              <div class="details">
                <a href="{{ route('service-details') }}" class="stretched-link">
                  <h3>Pembangunan Infrastruktur</h3>
                </a>
                <p>Proyek pembangunan infrastruktur untuk meningkatkan fasilitas publik dan aksesibilitas di wilayah kabupaten, termasuk perbaikan jalan dan fasilitas umum.</p>
              </div>
            </div>
          </div><!-- End Service Item -->

          <div class="col-lg-6" data-aos="zoom-in" data-aos-delay="500">
            <div class="service-item position-relative">
              <div class="img">
                <img src="assets/img/services-4.jpg" class="img-fluid" alt="Layanan 4">
              </div>
              <div class="details">
                <a href="{{ route('service-details') }}" class="stretched-link">
                  <h3>Program Sosial dan Ekonomi</h3>
                </a>
                <p>Program untuk meningkatkan kesejahteraan sosial dan ekonomi masyarakat, termasuk bantuan sosial dan pengembangan usaha kecil dan menengah.</p>
                <a href="{{ route('service-details') }}" class="stretched-link"></a>
              </div>
            </div>
          </div><!-- End Service Item -->


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

    <!-- <div class="footer-newsletter">
      <div class="container">
        <div class="row justify-content-center text-center">
          <div class="col-lg-6">
            <h4>Join Our Newsletter</h4>
            <p>Subscribe to our newsletter and receive the latest news about our products and services!</p>
            <form action="forms/newsletter.php" method="post" class="php-email-form">
              <div class="newsletter-form"><input type="email" name="email"><input type="submit" value="Subscribe"></div>
              <div class="loading">Loading</div>
              <div class="error-message"></div>
              <div class="sent-message">Your subscription request has been sent. Thank you!</div>
            </form>
          </div>
        </div>
      </div>
    </div> -->

    <div class="container footer-top">
      <div class="row gy-4">
        <div class="col-lg-4 col-md-6 footer-about">
          <a href="{{ url('/') }}" class="d-flex align-items-center">
            <span class="sitename">Dasa Wisma Kabupaten Jepara</span>
          </a>
          <div class="footer-contact pt-3">
            <p>Lantai 2 Diskominfo Jepara, Gedung OPD Bersama.</p>
            <p>Jl.Kartini No.1 Jepara.</p>
            <p class="mt-3"><strong>Phone:</strong> <span>+0291591492</span></p>
            <p><strong>Email:</strong> <span>diskominfo@jepara.go.id</span></p>
          </div>
        </div>

        <div class="col-lg-2 col-md-3 footer-links">
          <h4>Useful Links</h4>
          <ul>
            <li><i class="bi bi-chevron-right"></i> <a href="{{ url('/') }}">Home</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="{{ route('about') }}">About us</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="{{ route('services') }}">Services</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="{{ route('contact') }}">Contact</a></li>
          </ul>
        </div>

        <div class="col-lg-2 col-md-3 footer-links">
          <h4>Layanan Kami</h4>
          <ul>
            <li><i class="bi bi-chevron-right"></i> <a href="https://jepara.go.id/">Website Jepara</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="https://wadul.jepara.go.id/">Wadul Bupati Jepara</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="https://diskominfo.jepara.go.id/">Diskominfo Jepara</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="https://samudra.jepara.go.id/">Samudra Jepara</a></li>
          </ul>
        </div>

        <div class="col-lg-4 col-md-12">
          <h4>Ikuti Kami</h4>
          <p>Kunjungi media sosial kami untuk berita terbaru dan informasi tentang program Dasa Wisma Kabupaten Jepara.</p>
          <div class="social-links d-flex">
            <a href=""><i class="bi bi-twitter-x"></i></a>
            <a href=""><i class="bi bi-facebook"></i></a>
            <a href=""><i class="bi bi-instagram"></i></a>
            <a href=""><i class="bi bi-linkedin"></i></a>
          </div>
        </div>

      </div>
    </div>

    <div class="container copyright text-center mt-4">
      <p>© <span>Copyright</span> <strong class="px-1 sitename">Diskominfo Jepara</strong> <span>All Rights Reserved</span></p>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you've purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: [buy-url] -->
        Designed by <a href="https://github.com/Romadhoni04">Diskominfo Jepara</a>
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