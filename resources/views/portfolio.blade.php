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

  <!-- jQuery (required for Isotope) -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <!-- Isotope -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/isotope/3.0.6/isotope.pkgd.min.js"></script>

  <!-- GLightbox (for lightbox functionality) -->
  <script src="https://cdn.jsdelivr.net/npm/glightbox@3.0.8/dist/js/glightbox.min.js"></script>



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
          <li><a href="{{ url('/') }}">Beranda</a></li>
          <li><a href="{{ route('about') }}">Tentang</a></li>
          <li class="dropdown"><a href="#" class="active"><span>Informasi</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
            <ul>
              <li><a href="{{ route('services') }}">Layanan</a></li>
              <li><a href="{{ route('portfolio') }}" class="active">Portofolio</a></li>
              <li><a href="{{ route('blog.index') }}">Blog</a></li>
            </ul>
          </li>
          <li><a href="{{ url('dasawisma-show') }}">Dasa Wisma</a></li>
          <!-- <li><a href="{{ route('team') }}">Tim</a></li> -->
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
        <!-- Portfolio Items -->
        <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">

          <ul class="portfolio-filters isotope-filters" data-aos="fade-up" data-aos-delay="100">
            <li data-filter="*" class="filter-active">portfolio Galeri</li>
          </ul>
          <!-- Portfolio Items -->

          <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200">
            @foreach($portfolios as $portfolio)
            <div class="col-lg-4 col-md-6 portfolio-item isotope-item {{ $portfolio->category }}">
              <div class="portfolio-content h-100">
                @if($portfolio->images->isNotEmpty())
                <img src="{{ asset('storage/' . $portfolio->images->first()->image_url) }}" class="img-fluid" alt="{{ $portfolio->title }}">
                @endif
                <div class="portfolio-info">
                  <h4>{{ $portfolio->title }}</h4>
                  <p>{{ $portfolio->description }}</p>
                  <a href="{{ asset('storage/' . $portfolio->images->first()->image_url) }}" title="{{ $portfolio->title }}" data-gallery="portfolio-gallery-{{ $portfolio->id }}" class="glightbox preview-link" title="Lihat Gambar">
                    <i class="bi bi-zoom-in"></i>
                  </a>
                  <a href="{{ route('portfolio-details', ['id' => $portfolio->id]) }}" title="More Details" class="details-link">
                    <i class="bi bi-link-45deg"></i>
                  </a>
                </div>
              </div>
            </div><!-- End Portfolio Item -->

            <!-- Modal untuk Galeri Gambar -->
            <div class="modal fade" id="portfolioModal{{ $portfolio->id }}" tabindex="-1" aria-labelledby="portfolioModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="portfolioModalLabel">{{ $portfolio->title }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <div class="row">
                      @foreach($portfolio->images as $image)
                      <div class="col-4">
                        <img src="{{ asset('storage/' . $image->image_url) }}" class="img-fluid" alt="{{ $portfolio->title }}">
                      </div>
                      @endforeach
                    </div>
                  </div>
                </div>
              </div>
            </div><!-- End Modal -->
            @endforeach

          </div><!-- End Portfolio Container -->



        </div><!-- End Portfolio Container -->
        <!-- End Portfolio Items -->
        <script>
          $(document).ready(function() {
            // Initialize Isotope
            var $grid = $('.isotope-container').isotope({
              itemSelector: '.portfolio-item',
              layoutMode: 'masonry'
            });

            // Filter items on button click
            $('.portfolio-filters').on('click', 'li', function() {
              var filterValue = $(this).attr('data-filter');
              $grid.isotope({
                filter: filterValue
              });

              // Update active class
              $('.portfolio-filters li').removeClass('filter-active');
              $(this).addClass('filter-active');
            });

            // Initialize GLightbox
            const lightbox = GLightbox({
              selector: '.glightbox'
            });
          });
        </script>
      </div>
      </div>
    </section>


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
      <div class="container copyright text-center mt-4">
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