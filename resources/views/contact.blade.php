<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Kontak - Dasa Wisma Kabupaten Jepara</title>
  <meta name="description" content="Hubungi Dasa Wisma Kabupaten Jepara untuk pertanyaan, saran, atau informasi lebih lanjut tentang program dan layanan kami. Kami siap membantu Anda.">
  <meta name="keywords" content="Dasa Wisma, Jepara, Kontak, Hubungi Kami, Informasi, Pertanyaan, Saran">
  <meta name="csrf-token" content="{{ csrf_token() }}">


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

<body class="contact-page">

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
          <li class="dropdown"><a href="#"><span>Informasi</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
            <ul>
              <li><a href="{{ route('services') }}">Layanan</a></li>
              <li><a href="{{ route('portfolio') }}">Portofolio</a></li>
              <li><a href="{{ route('blog.index') }}">Blog</a></li>
            </ul>
          </li>
          <li><a href="{{ url('dasawisma-show') }}">Dasa Wisma</a></li>
          <!-- <li><a href="{{ route('team') }}">Tim</a></li> -->
          <li><a href="{{ url('contact') }}" class="active">Kontak</a></li>
          <li><a href="{{ url('login') }}">Masuk</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

    </div>
  </header>

  <main class="main">

    <!-- Page Title -->

    <!-- Contact Section -->
    <!-- Page Title -->
    <div class="page-title dark-background">
      <div class="container position-relative">
        <h1>Kontak</h1>
        <p>Hubungi kami untuk informasi lebih lanjut mengenai program dan layanan Dasa Wisma Kabupaten Jepara.</p>
        <nav class="breadcrumbs">
          <ol>
            <li><a href="{{ url('/') }}">Beranda</a></li>
            <li class="current">Kontak</li>
          </ol>
        </nav>
      </div>
    </div><!-- End Page Title -->

    <!-- Contact Section -->
    <section id="contact" class="contact section">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4">
          <div class="col-lg-6">
            <div class="row gy-4">

              <div class="col-lg-12">
                <div class="info-item d-flex flex-column justify-content-center align-items-center" data-aos="fade-up" data-aos-delay="200">
                  <a href="https://maps.app.goo.gl/vcsndFoRjer2koC87" target="_blank" title="Diskominfo Jepara" style="text-align: center; display: flex; flex-direction: column; align-items: center;">
                    <div class="icon-container" style="display: flex; justify-content: center; align-items: center; margin-bottom: 15px;">
                      <i class="bi bi-geo-alt" style="font-size: 2rem; color: #333;"></i>
                    </div>
                    <h3>Alamat</h3>
                    <p>Lantai 2 Diskominfo Jepara, Gedung OPD Bersama.</p>
                    <p>Jl. Kartini No.1 Jepara.</p>
                  </a>
                </div>
              </div><!-- End Info Item -->

              <div class="col-md-6">
                <div class="info-item d-flex flex-column justify-content-center align-items-center" data-aos="fade-up" data-aos-delay="300">
                  <a href="tel:+0291591492" title="Telepon Kami" style="text-align: center; display: flex; flex-direction: column; align-items: center;">
                    <div class="icon-container" style="display: flex; justify-content: center; align-items: center; margin-bottom: 15px;">
                      <i class="bi bi-telephone" style="font-size: 2rem; color: #333;"></i>
                    </div>
                    <h3>Telepon Kami</h3>
                    <p>+0291591492</p>
                  </a>
                </div>
              </div><!-- End Info Item -->

              <div class="col-md-6">
                <div class="info-item d-flex flex-column justify-content-center align-items-center" data-aos="fade-up" data-aos-delay="400">
                  <a href="mailto:diskominfo@jepara.go.id" title="Kirim Email" style="text-align: center; display: flex; flex-direction: column; align-items: center;">
                    <div class="icon-container" style="display: flex; justify-content: center; align-items: center; margin-bottom: 15px;">
                      <i class="bi bi-envelope" style="font-size: 2rem; color: #333;"></i>
                    </div>
                    <h3>Kirim Email</h3>
                    <p>diskominfo@jepara.go.id</p>
                  </a>
                </div>
              </div><!-- End Info Item -->



            </div>
          </div>

          <div class="col-lg-6">
            <!-- Menampilkan pesan sukses/error dinamis -->
            <div id="errorMessage" class="alert alert-danger" style="display: none;"></div>
            <div id="successMessage" class="alert alert-success" style="display: none;"></div>
            <!-- Form kontak -->
            <form id="contactForm" action="{{ route('contact.send') }}" method="post" class="php-email-form" data-aos="fade-up" data-aos-delay="500">
              @csrf <!-- Token CSRF untuk keamanan -->
              <div class="row gy-4">
                <div class="col-md-6">
                  <input type="text" name="name" class="form-control" placeholder="Nama Anda" value="{{ old('name') }}" required>
                  @error('name')
                  <small class="text-danger">{{ $message }}</small>
                  @enderror
                </div>

                <div class="col-md-6">
                  <input type="email" class="form-control" name="email" placeholder="Email Anda" value="{{ old('email') }}" required>
                  @error('email')
                  <small class="text-danger">{{ $message }}</small>
                  @enderror
                </div>

                <div class="col-md-12">
                  <input type="text" class="form-control" name="subject" placeholder="Subjek" value="{{ old('subject') }}" required>
                  @error('subject')
                  <small class="text-danger">{{ $message }}</small>
                  @enderror
                </div>

                <div class="col-md-12">
                  <textarea class="form-control" name="message" rows="4" placeholder="Pesan" required>{{ old('message') }}</textarea>
                  @error('message')
                  <small class="text-danger">{{ $message }}</small>
                  @enderror
                </div>

                <div class="col-md-12 text-center">
                  <!-- Loading Message -->
                  <div id="loadingMessage" style="display: none;">
                    <div class="spinner-container">
                      <div class="spinner"></div>
                    </div>
                    <p>Mohon bersabar, pesan Anda sedang dimuat...</p>
                  </div>

                  <!-- Form Kontak -->
                  <button id="submitButton" type="submit">Kirim Pesan</button>
                </div>

            </form>
          </div>

          <script>
            document.getElementById('contactForm').addEventListener('submit', function(e) {
              e.preventDefault(); // Mencegah reload halaman

              // Ambil data form
              const formData = new FormData(this);

              // Tampilkan pesan loading
              document.getElementById('loadingMessage').style.display = 'block';

              // Kirim form menggunakan AJAX
              fetch(this.action, {
                  method: 'POST',
                  body: formData,
                  headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                  }
                })
                .then(response => response.json())
                .then(data => {
                  // Sembunyikan pesan loading
                  document.getElementById('loadingMessage').style.display = 'none';

                  if (data.status === 'SUCCESS') {
                    // Tampilkan pesan sukses
                    document.getElementById('successMessage').innerHTML = data.message;
                    document.getElementById('successMessage').style.display = 'block';
                    document.getElementById('errorMessage').style.display = 'none';

                    // Reset form setelah sukses
                    document.getElementById('contactForm').reset();
                  } else {
                    // Tampilkan pesan error jika ada masalah
                    document.getElementById('errorMessage').innerHTML = 'Terjadi kesalahan, silakan coba lagi.';
                    document.getElementById('errorMessage').style.display = 'block';
                    document.getElementById('successMessage').style.display = 'none';
                  }
                })
                .catch(error => {
                  // Sembunyikan pesan loading
                  document.getElementById('loadingMessage').style.display = 'none';

                  // Tangani error jika fetch gagal
                  document.getElementById('errorMessage').innerHTML = 'Terjadi kesalahan, silakan coba lagi nanti.';
                  document.getElementById('errorMessage').style.display = 'block';
                  document.getElementById('successMessage').style.display = 'none';
                });
            });
          </script>
        </div>

      </div>

      <div class="mt-5" data-aos="fade-up" data-aos-delay="200">
        <iframe style="border:0; width: 100%; height: 370px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3963.444769491805!2d110.66516817364746!3d-6.5915096934021635!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e711f0321765631%3A0x79188af8cb42f959!2sDinas%20Komunikasi%20dan%20Informatika%20(DISKOMINFO)%20Kabupaten%20Jepara!5e0!3m2!1sen!2sid!4v1726199992216!5m2!1sen!2sid" frameborder="0" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div><!-- End Google Maps -->

    </section><!-- /Contact Section -->


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