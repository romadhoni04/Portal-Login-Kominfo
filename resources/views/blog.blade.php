<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Blog - Dasa Wisma Kabupaten Jepara</title>
  <meta name="description" content="Dapatkan informasi terbaru dari Dasa Wisma Kabupaten Jepara melalui artikel, berita, dan update mengenai program dan kegiatan komunitas.">
  <meta name="keywords" content="Dasa Wisma, Jepara, Blog, Artikel, Berita, Komunitas, Program, Kegiatan">

  <!-- Favicons -->
  <link href="{{ asset('assets/img/favicon.png') }}" rel="icon">
  <link href="{{ asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

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

<body class="blog-page">
  <header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">
      <a href="{{ url('/') }}" class="logo d-flex align-items-center">
        <img src="https://sippn.menpan.go.id/images/article/large/logo-jepara-11.png" alt="Dasa Wisma Kabupaten Jepara" style="max-width: 65px; max-height: 65px;">
        <h1 class="sitename">Dasa Wisma Jepara</h1>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="{{ url('/') }}">Beranda</a></li>
          <li><a href="{{ route('about') }}">Tentang</a></li>
          <li><a href="{{ route('services') }}">Layanan</a></li>
          <li><a href="{{ route('portfolio') }}">Portofolio</a></li>
          <!-- <li><a href="{{ route('team') }}">Tim</a></li> -->
          <li><a href="{{ route('blog.index') }}" class="active">Blog</a></li>
          <li><a href="{{ url('contact') }}">Kontak</a></li>
          <li><a href="{{ url('login') }}">Masuk</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>
    </div>
  </header>

  <main class="main">
    <!-- Judul Halaman -->
    <div class="page-title dark-background">
      <div class="container position-relative">
        <h1>Blog</h1>
        <p>Temukan berita terbaru, artikel informatif, dan update terkini tentang program dan kegiatan Dasa Wisma Kabupaten Jepara.</p>
        <nav class="breadcrumbs">
          <ol>
            <li><a href="{{ url('/') }}">Beranda</a></li>
            <li class="current">Blog</li>
          </ol>
        </nav>
      </div>
    </div><!-- Akhir Judul Halaman -->

    <!-- Bagian Postingan Blog -->
    <section id="blog-posts" class="blog-posts section">
      <div class="container">
        <div class="row gy-4">
          @foreach($blogs as $blog)
          <div class="col-lg-4">
            <article>
              <div class="post-img">
                <img src="{{ asset('storage/' . $blog->image) }}" alt="{{ $blog->title }}" class="img-fluid">
              </div>
              <p class="post-category">{{ Str::limit($blog->content, 100, '...') }}</p>
              <h2 class="title">
                <a href="{{ route('blog.show', $blog->id) }}">{{ Str::limit($blog->title, 50, '...') }}</a>
              </h2>
              <div class="d-flex align-items-center">
                @if($blog->author && $blog->author->profile_photo)
                <img src="{{ asset('storage/profile_photos/' . $blog->author->profile_photo) }}" alt="{{ $blog->author->name }}" class="img-fluid post-author-img flex-shrink-0">
                @else
                @if(isset($superadmin) && $superadmin->profile_photo)
                <img src="{{ asset('storage/profile_photos/' . $superadmin->profile_photo) }}" alt="{{ $superadmin->name }}" class="img-fluid post-author-img flex-shrink-0">
                @else
                <img src="{{ asset('assets/img/blog/default-author.jpg') }}" alt="Default Author" class="img-fluid post-author-img flex-shrink-0">
                @endif
                @endif
                <div class="post-meta">
                  <p class="post-author">
                    {{ $blog->author ? $blog->author->role  : 'Unknown Author' }}
                  </p>
                  @if($blog->author)
                  <p class="post-full-name">
                    {{ $blog->author->fullName }}
                  </p>
                  @endif
                  <p class="post-date">
                    <time datetime="{{ $blog->created_at->format('Y-m-d') }}">{{ $blog->created_at->format('d M, Y') }}</time>
                  </p>
                </div>


              </div>
            </article>
          </div>
          @endforeach
        </div>
      </div>
    </section><!-- /Bagian Postingan Blog -->


    <!-- Bagian Pagination Blog -->
    <section id="blog-pagination" class="blog-pagination section">
      <div class="container">
        <div class="d-flex justify-content-center">
          {{ $blogs->links() }}
        </div>
      </div>
    </section><!-- /Bagian Pagination Blog -->
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

  <!-- Vendor JS Files -->
  <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
  <script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>

  <!-- Main JS File -->
  <script src="{{ asset('assets/js/main.js') }}"></script>
</body>

</html>