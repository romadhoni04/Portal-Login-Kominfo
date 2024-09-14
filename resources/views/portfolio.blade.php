<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Portofolio - Dasa Wisma Kabupaten Jepara</title>
  <meta name="description" content="Jelajahi portofolio proyek dan inisiatif yang telah dilakukan oleh Dasa Wisma Kabupaten Jepara untuk meningkatkan kesejahteraan komunitas dan pengembangan sosial.">
  <meta name="keywords" content="Dasa Wisma, Jepara, Portofolio, Proyek, Inisiatif, Pengembangan Komunitas, Kesejahteraan Sosial">


  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">

</head>

<body class="portfolio-page">


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
          <li><a href="{{ route('services') }}">Services</a></li>
          <li><a href="{{ route('portfolio') }}" class="active">Portfolio</a></li>
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
        <h1>Program Dasa Wisma</h1>
        <p>Menampilkan berbagai informasi dan layanan terkait program Dasa Wisma di Kabupaten Jepara, serta upaya untuk memberdayakan masyarakat.</p>
        <nav class="breadcrumbs">
          <ol>
            <li><a href="{{ url('/') }}">Beranda</a></li>
            <li class="current">Program Dasa Wisma</li>
          </ol>
        </nav>
      </div>
    </div><!-- End Page Title -->


    <!-- Portfolio Section -->
    <section id="portfolio" class="portfolio section">

      <div class="container">

        <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">
          <ul class="portfolio-filters isotope-filters" data-aos="fade-up" data-aos-delay="100">
            <li data-filter="*" class="filter-active">Semua</li>
            <li data-filter=".filter-program">Program</li>
            <li data-filter=".filter-layanan">Layanan</li>
            <li data-filter=".filter-kegiatan">Kegiatan</li>
            <li data-filter=".filter-mitra">Mitra</li>
          </ul><!-- End Portfolio Filters -->


          <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200">

            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-program">
              <div class="portfolio-content h-100">
                <img src="assets/img/portfolio/app-1.jpg" class="img-fluid" alt="">
                <div class="portfolio-info">
                  <h4>Program 1</h4>
                  <p>Detail program yang dilakukan oleh Dasa Wisma Kabupaten Jepara</p>
                  <a href="assets/img/portfolio/app-1.jpg" title="Program 1" data-gallery="portfolio-gallery-program" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                  <a href="{{ route('service-details') }}" title="Detail Lebih Lanjut" class="details-link"><i class="bi bi-link-45deg"></i></a>
                </div>
              </div>
            </div><!-- End Portfolio Item -->

            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-layanan">
              <div class="portfolio-content h-100">
                <img src="assets/img/portfolio/product-1.jpg" class="img-fluid" alt="">
                <div class="portfolio-info">
                  <h4>Layanan 1</h4>
                  <p>Informasi tentang layanan yang tersedia di Dasa Wisma Kabupaten Jepara</p>
                  <a href="assets/img/portfolio/product-1.jpg" title="Layanan 1" data-gallery="portfolio-gallery-layanan" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                  <a href="{{ route('service-details') }}" title="Detail Lebih Lanjut" class="details-link"><i class="bi bi-link-45deg"></i></a>
                </div>
              </div>
            </div><!-- End Portfolio Item -->

            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-kegiatan">
              <div class="portfolio-content h-100">
                <img src="assets/img/portfolio/branding-1.jpg" class="img-fluid" alt="">
                <div class="portfolio-info">
                  <h4>Kegiatan 1</h4>
                  <p>Deskripsi kegiatan yang dilaksanakan oleh Dasa Wisma Kabupaten Jepara</p>
                  <a href="assets/img/portfolio/branding-1.jpg" title="Kegiatan 1" data-gallery="portfolio-gallery-kegiatan" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                  <a href="{{ route('service-details') }}" title="Detail Lebih Lanjut" class="details-link"><i class="bi bi-link-45deg"></i></a>
                </div>
              </div>
            </div><!-- End Portfolio Item -->

            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-mitra">
              <div class="portfolio-content h-100">
                <img src="assets/img/portfolio/books-1.jpg" class="img-fluid" alt="">
                <div class="portfolio-info">
                  <h4>Mitra 1</h4>
                  <p>Informasi mengenai mitra yang bekerja sama dengan Dasa Wisma Kabupaten Jepara</p>
                  <a href="assets/img/portfolio/books-1.jpg" title="Mitra 1" data-gallery="portfolio-gallery-mitra" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                  <a href="{{ route('service-details') }}" title="Detail Lebih Lanjut" class="details-link"><i class="bi bi-link-45deg"></i></a>
                </div>
              </div>
            </div><!-- End Portfolio Item -->

            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-program">
              <div class="portfolio-content h-100">
                <img src="assets/img/portfolio/app-2.jpg" class="img-fluid" alt="">
                <div class="portfolio-info">
                  <h4>Program 2</h4>
                  <p>Detail program yang dilakukan oleh Dasa Wisma Kabupaten Jepara</p>
                  <a href="assets/img/portfolio/app-2.jpg" title="Program 2" data-gallery="portfolio-gallery-program" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                  <a href="{{ route('service-details') }}" title="Detail Lebih Lanjut" class="details-link"><i class="bi bi-link-45deg"></i></a>
                </div>
              </div>
            </div><!-- End Portfolio Item -->

            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-layanan">
              <div class="portfolio-content h-100">
                <img src="assets/img/portfolio/product-2.jpg" class="img-fluid" alt="">
                <div class="portfolio-info">
                  <h4>Layanan 2</h4>
                  <p>Informasi tentang layanan yang tersedia di Dasa Wisma Kabupaten Jepara</p>
                  <a href="assets/img/portfolio/product-2.jpg" title="Layanan 2" data-gallery="portfolio-gallery-layanan" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                  <a href="{{ route('service-details') }}" title="Detail Lebih Lanjut" class="details-link"><i class="bi bi-link-45deg"></i></a>
                </div>
              </div>
            </div><!-- End Portfolio Item -->

            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-kegiatan">
              <div class="portfolio-content h-100">
                <img src="assets/img/portfolio/kegiatan-2.jpg" class="img-fluid" alt="">
                <div class="portfolio-info">
                  <h4>Kegiatan 2</h4>
                  <p>Deskripsi kegiatan yang dilaksanakan oleh Dasa Wisma Kabupaten Jepara</p>
                  <a href="assets/img/portfolio/kegiatan-2.jpg" title="Kegiatan 2" data-gallery="portfolio-gallery-kegiatan" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                  <a href="{{ route('service-details') }}" title="Detail Lebih Lanjut" class="details-link"><i class="bi bi-link-45deg"></i></a>
                </div>
              </div>
            </div><!-- End Portfolio Item -->

            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-mitra">
              <div class="portfolio-content h-100">
                <img src="assets/img/portfolio/mitra-2.jpg" class="img-fluid" alt="">
                <div class="portfolio-info">
                  <h4>Mitra 2</h4>
                  <p>Informasi mengenai mitra yang bekerja sama dengan Dasa Wisma Kabupaten Jepara</p>
                  <a href="assets/img/portfolio/mitra-2.jpg" title="Mitra 2" data-gallery="portfolio-gallery-mitra" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                  <a href="{{ route('service-details') }}" title="Detail Lebih Lanjut" class="details-link"><i class="bi bi-link-45deg"></i></a>
                </div>
              </div>
            </div><!-- End Portfolio Item -->

            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-program">
              <div class="portfolio-content h-100">
                <img src="assets/img/portfolio/program-3.jpg" class="img-fluid" alt="">
                <div class="portfolio-info">
                  <h4>Program 3</h4>
                  <p>Detail program yang dilakukan oleh Dasa Wisma Kabupaten Jepara</p>
                  <a href="assets/img/portfolio/program-3.jpg" title="Program 3" data-gallery="portfolio-gallery-program" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                  <a href="{{ route('service-details') }}" title="Detail Lebih Lanjut" class="details-link"><i class="bi bi-link-45deg"></i></a>
                </div>
              </div>
            </div><!-- End Portfolio Item -->

            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-layanan">
              <div class="portfolio-content h-100">
                <img src="assets/img/portfolio/layanan-3.jpg" class="img-fluid" alt="">
                <div class="portfolio-info">
                  <h4>Layanan 3</h4>
                  <p>Informasi tentang layanan yang tersedia di Dasa Wisma Kabupaten Jepara</p>
                  <a href="assets/img/portfolio/layanan-3.jpg" title="Layanan 3" data-gallery="portfolio-gallery-layanan" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                  <a href="{{ route('service-details') }}" title="Detail Lebih Lanjut" class="details-link"><i class="bi bi-link-45deg"></i></a>
                </div>
              </div>
            </div><!-- End Portfolio Item -->

            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-kegiatan">
              <div class="portfolio-content h-100">
                <img src="assets/img/portfolio/kegiatan-3.jpg" class="img-fluid" alt="">
                <div class="portfolio-info">
                  <h4>Kegiatan 3</h4>
                  <p>Deskripsi kegiatan yang dilaksanakan oleh Dasa Wisma Kabupaten Jepara</p>
                  <a href="assets/img/portfolio/kegiatan-3.jpg" title="Kegiatan 3" data-gallery="portfolio-gallery-kegiatan" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                  <a href="{{ route('service-details') }}" title="Detail Lebih Lanjut" class="details-link"><i class="bi bi-link-45deg"></i></a>
                </div>
              </div>
            </div><!-- End Portfolio Item -->

            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-mitra">
              <div class="portfolio-content h-100">
                <img src="assets/img/portfolio/mitra-3.jpg" class="img-fluid" alt="">
                <div class="portfolio-info">
                  <h4>Mitra 3</h4>
                  <p>Informasi mengenai mitra yang bekerja sama dengan Dasa Wisma Kabupaten Jepara</p>
                  <a href="assets/img/portfolio/mitra-3.jpg" title="Mitra 3" data-gallery="portfolio-gallery-mitra" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                  <a href="{{ route('service-details') }}" title="Detail Lebih Lanjut" class="details-link"><i class="bi bi-link-45deg"></i></a>
                </div>
              </div>
            </div><!-- End Portfolio Item -->


          </div>

        </div>

    </section><!-- /Portfolio Section -->

  </main>

  <footer id="footer" class="footer dark-background">

    <!--  <div class="footer-newsletter">
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