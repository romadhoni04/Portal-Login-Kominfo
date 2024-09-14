<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Dasa Wisma Kabupaten Jepara</title>
    <meta name="description" content="Dasa Wisma Kabupaten Jepara adalah platform yang mendukung kegiatan pemberdayaan masyarakat melalui pendataan dan pembinaan ibu rumah tangga serta lingkungan sekitarnya di Kabupaten Jepara.">
    <meta name="keywords" content="Dasa Wisma, Kabupaten Jepara, Pemberdayaan Masyarakat, Ibu Rumah Tangga, Pendataan, Pembinaan, Kegiatan Sosial">


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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css" rel="stylesheet">

</head>

<body class="index-page">


    <header id="header" class="header d-flex align-items-center sticky-top">
        <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">
            <a href="{{ url('/') }}" class="logo d-flex align-items-center">
                <!-- Uncomment the line below if you also wish to use an image logo -->
                <img src="https://sippn.menpan.go.id/images/article/large/logo-jepara-11.png" alt="Dasa Wisma Kabupaten Jepara" style="max-width: 65px; max-height: 65px;">

                <h1 class="sitename">Dasa Wisma Jepara</h1>
            </a>


            <nav id="navmenu" class="navmenu">

                <ul>
                    <a href="{{ url('/') }}" class="active">Home</a>
                    <li><a href="{{ route('about') }}">About</a></li>
                    <li><a href="{{ route('services') }}">Services</a></li>
                    <li><a href="{{ route('portfolio') }}">Portfolio</a></li>
                    <li><a href="{{ route('team') }}">Team</a></li>
                    <li><a href="{{ route('blog.index') }}">Blog</a></li>
                    <li><a href="{{ url('contact') }}">Contact</a></li>
                    <li><a href="{{ url('login') }}">Login</a></li>
                    <!-- <li>
                        <div class="theme-switcher">
                            <button id="theme-toggle" class="btn btn-dark rounded-circle">
                                <i class="bi bi-moon"></i>
                            </button>
                        </div>
                    </li>
                </ul>

                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        const themeToggle = document.getElementById('theme-toggle');
                        const currentTheme = localStorage.getItem('theme');
                        const root = document.documentElement; // Mengacu pada <html>

                        // Set the initial theme based on the saved value
                        if (currentTheme) {
                            root.setAttribute('data-theme', currentTheme);
                            if (currentTheme === 'dark') {
                                themeToggle.innerHTML = '<i class="bi bi-sun"></i>';
                            } else {
                                themeToggle.innerHTML = '<i class="bi bi-moon"></i>';
                            }
                        }

                        // Toggle the theme on button click
                        themeToggle.addEventListener('click', function() {
                            // Toggle data-theme attribute
                            const currentTheme = root.getAttribute('data-theme');
                            const newTheme = currentTheme === 'dark' ? 'light' : 'dark';
                            root.setAttribute('data-theme', newTheme);

                            // Simpan preferensi tema ke Local Storage
                            localStorage.setItem('theme', newTheme);

                            // Update button icon
                            themeToggle.innerHTML = newTheme === 'dark' ?
                                '<i class="bi bi-sun"></i>' :
                                '<i class="bi bi-moon"></i>';
                        });
                    });
                </script>

                -->
                    <!--
                    <li class="dropdown"><a href="#"><span>Dropdown</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                        <ul>
                            <li><a href="#">Dropdown 1</a></li>
                            <li class="dropdown"><a href="#"><span>Deep Dropdown</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                                <ul>
                                    <li><a href="#">Deep Dropdown 1</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Dropdown 2</a></li>
                        </ul>
                    </li>
-->
                    <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>

        </div>
    </header>

    <main class="main">

        <!-- Hero Section -->
        <section id="hero" class="hero section dark-background">

            <!-- <img src="assets/img/hero-bg.jpg" alt="" data-aos="fade-in"> -->

            <div id="hero-carousel" class="carousel carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">
                <div class="container position-relative">

                    <div class="carousel-item active">
                        <div class="carousel-container">
                            <h2>Selamat Datang di Dasa Wisma Kabupaten Jepara</h2>
                            <p>Dasa Wisma Kabupaten Jepara adalah organisasi yang berperan penting dalam meningkatkan kesejahteraan masyarakat melalui partisipasi aktif perempuan. Kami berkomitmen untuk mendukung berbagai program sosial, kesehatan, dan pendidikan demi membangun masyarakat yang lebih sejahtera dan mandiri.</p>
                            <a href="{{ route('about') }}" class="btn-get-started">Pelajari Lebih Lanjut</a>
                        </div>
                    </div><!-- End Carousel Item -->

                    <div class="carousel-item">
                        <div class="carousel-container">
                            <h2>Program Kesejahteraan Keluarga</h2>
                            <p>Dasa Wisma mendukung upaya peningkatan kualitas hidup keluarga di Kabupaten Jepara melalui berbagai program pemberdayaan perempuan, kesehatan, dan pendidikan anak. Bersama-sama, kita wujudkan masyarakat yang sehat dan mandiri.</p>
                            <a href="{{ route('services') }}" class="btn-get-started">Pelajari Lebih Lanjut</a>
                        </div>
                    </div><!-- End Carousel Item -->

                    <div class="carousel-item">
                        <div class="carousel-container">
                            <h2>Partisipasi Aktif untuk Kemajuan Bersama</h2>
                            <p>Dasa Wisma mengajak seluruh lapisan masyarakat, khususnya kaum perempuan, untuk terlibat dalam kegiatan yang bertujuan memajukan kesejahteraan dan kemandirian keluarga di Kabupaten Jepara. Partisipasi Anda sangat berharga dalam membangun masa depan yang lebih baik.</p>
                            <a href="#about" class="btn-get-started">Pelajari Lebih Lanjut</a>
                        </div>
                    </div><!-- End Carousel Item -->

                </div><!-- End Carousel Item -->

                <a class="carousel-control-prev" href="#hero-carousel" role="button" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
                </a>

                <a class="carousel-control-next" href="#hero-carousel" role="button" data-bs-slide="next">
                    <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
                </a>

                <ol class="carousel-indicators"></ol>

            </div>

            </div>

        </section><!-- /Hero Section -->

        <!-- Featured Services Section -->
        <section id="featured-services" class="featured-services section">

            <div class="container">

                <div class="row gy-4">

                    <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
                        <div class="service-item item-cyan position-relative">
                            <div class="icon">
                                <i class="bi bi-person-heart"></i>
                            </div>
                            <a href="{{ route('service-details') }}" class="stretched-link">

                                <h3>Pemberdayaan Perempuan</h3>
                            </a>
                            <p>Dasa Wisma Kabupaten Jepara berfokus pada pemberdayaan perempuan untuk meningkatkan kesejahteraan keluarga melalui berbagai program keterampilan dan pendidikan.</p>
                        </div>
                    </div><!-- End Service Item -->


                    <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="200">
                        <div class="service-item item-orange position-relative">
                            <div class="icon">
                                <i class="bi bi-heart-pulse"></i>
                            </div>
                            <a href="{{ route('service-details') }}" class="stretched-link">

                                <h3>Kesehatan Keluarga</h3>
                            </a>
                            <p>Kesehatan keluarga adalah prioritas kami. Program-program kami mendukung kesehatan ibu dan anak, serta pencegahan stunting di Kabupaten Jepara.</p>
                        </div>
                    </div><!-- End Service Item -->


                    <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="300">
                        <div class="service-item item-teal position-relative">
                            <div class="icon">
                                <i class="bi bi-book"></i>
                            </div>
                            <a href="{{ route('service-details') }}" class="stretched-link">

                                <h3>Pendidikan Anak Usia Dini</h3>
                            </a>
                            <p>Melalui program pendidikan anak usia dini, kami berupaya membentuk generasi yang cerdas dan berkualitas di Kabupaten Jepara.</p>
                        </div>
                    </div><!-- End Service Item -->



                    <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="400">
                        <div class="service-item item-red position-relative">
                            <div class="icon">
                                <i class="bi bi-briefcase"></i>
                            </div>
                            <a href="{{ route('service-details') }}" class="stretched-link">

                                <h3>Pengembangan Ekonomi Keluarga</h3>
                            </a>
                            <p>Melalui program-program ekonomi kreatif, Dasa Wisma Kabupaten Jepara membantu keluarga mengembangkan usaha kecil dan menengah untuk meningkatkan kesejahteraan ekonomi.</p>
                        </div>
                    </div><!-- End Service Item -->


                </div>

            </div>

        </section><!-- /Featured Services Section -->



        <!-- Features Section -->
        <section id="features" class="features section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Fitur Unggulan</h2>
                <p>Menampilkan berbagai program unggulan yang dikembangkan untuk mendukung kesejahteraan dan pemberdayaan masyarakat melalui Dasa Wisma Kabupaten Jepara.</p>
            </div><!-- End Section Title -->


            <div class="container">

                <div class="row gy-4 align-items-center features-item">
                    <div class="col-md-5 d-flex align-items-center" data-aos="zoom-out" data-aos-delay="100">
                        <img src="assets/img/fe1.jpg" class="img-fluid" alt="Dasa Wisma Kabupaten Jepara">
                    </div>
                    <div class="col-md-7" data-aos="fade-up" data-aos-delay="100">
                        <h3>Program Pemberdayaan Perempuan</h3>
                        <p class="fst-italic">
                            Dasa Wisma Kabupaten Jepara berfokus pada peningkatan kapasitas perempuan untuk meningkatkan kesejahteraan keluarga melalui pelatihan dan pengembangan keterampilan.
                        </p>
                        <ul>
                            <li><i class="bi bi-check"></i><span> Meningkatkan keterampilan perempuan untuk berperan aktif dalam usaha keluarga.</span></li>
                            <li><i class="bi bi-check"></i> <span>Mendukung ekonomi keluarga melalui program kewirausahaan.</span></li>
                            <li><i class="bi bi-check"></i> <span>Pelatihan usaha kecil menengah untuk meningkatkan pendapatan keluarga.</span></li>
                        </ul>
                    </div>
                </div><!-- Features Item -->

                <div class="row gy-4 align-items-center features-item">
                    <div class="col-md-5 order-1 order-md-2 d-flex align-items-center" data-aos="zoom-out" data-aos-delay="200">
                        <img src="assets/img/fe2.jpg" class="img-fluid" alt="Dasa Wisma Kabupaten Jepara">
                    </div>
                    <div class="col-md-7 order-2 order-md-1" data-aos="fade-up" data-aos-delay="200">
                        <h3>Program Kesehatan Keluarga</h3>
                        <p class="fst-italic">
                            Melalui program kesehatan, Dasa Wisma mendukung upaya pencegahan stunting dan peningkatan kesehatan ibu dan anak di Kabupaten Jepara.
                        </p>
                        <p>
                            Program ini bertujuan untuk meningkatkan kualitas hidup keluarga dengan fokus pada gizi yang baik, pemeriksaan kesehatan rutin, dan edukasi kesehatan bagi ibu dan anak.
                        </p>
                    </div>
                </div><!-- Features Item -->

                <div class="row gy-4 align-items-center features-item">
                    <div class="col-md-5 d-flex align-items-center" data-aos="zoom-out">
                        <img src="assets/img/fe3.jpg" class="img-fluid" alt="Dasa Wisma Kabupaten Jepara">
                    </div>
                    <div class="col-md-7" data-aos="fade-up">
                        <h3>Pendidikan Anak Usia Dini</h3>
                        <p>Program ini bertujuan untuk memberikan pendidikan usia dini yang berkualitas kepada anak-anak di Kabupaten Jepara agar mereka tumbuh menjadi generasi yang cerdas dan mandiri.</p>
                        <ul>
                            <li><i class="bi bi-check"></i> <span>Fasilitasi pendidikan anak usia dini melalui kelompok bermain dan PAUD.</span></li>
                            <li><i class="bi bi-check"></i><span> Peningkatan kualitas pendidikan melalui pelatihan guru dan penyediaan fasilitas.</span></li>
                            <li><i class="bi bi-check"></i> <span>Program pemberian gizi seimbang untuk mendukung tumbuh kembang anak.</span></li>
                        </ul>
                    </div>
                </div><!-- Features Item -->

                <div class="row gy-4 align-items-center features-item">
                    <div class="col-md-5 order-1 order-md-2 d-flex align-items-center" data-aos="zoom-out">
                        <img src="assets/img/fe4.jpg" class="img-fluid" alt="Dasa Wisma Kabupaten Jepara">
                    </div>
                    <div class="col-md-7 order-2 order-md-1" data-aos="fade-up">
                        <h3>Pengembangan Ekonomi Kreatif</h3>
                        <p class="fst-italic">
                            Dasa Wisma Kabupaten Jepara turut mendukung pengembangan ekonomi kreatif sebagai salah satu cara meningkatkan pendapatan keluarga.
                        </p>
                        <p>
                            Program ini melibatkan pelatihan keterampilan seperti kerajinan tangan, kuliner, dan produk lokal lainnya untuk membantu keluarga menciptakan peluang usaha baru.
                        </p>
                    </div>
                </div><!-- Features Item -->

            </div>


        </section><!-- /Features Section -->
        <!-- About Section -->
        <section id="about" class="about section light-background">

            <div class="container">

                <div class="row gy-4">
                    <div class="col-lg-6 position-relative align-self-start" data-aos="fade-up" data-aos-delay="100">
                        <img src="assets/img/about.jpg" class="img-fluid" alt="Dasa Wisma Kabupaten Jepara">
                        <a href="https://youtu.be/mFn5GNUdP1Q?si=a3x0YLCh2ERm21Do" class="glightbox pulsating-play-btn"></a>
                    </div>
                    <div class="col-lg-6 content" data-aos="fade-up" data-aos-delay="200">
                        <h3>Membangun Kesejahteraan Bersama Dasa Wisma Kabupaten Jepara</h3>
                        <p class="fst-italic">
                            Dasa Wisma Kabupaten Jepara berkomitmen untuk meningkatkan kesejahteraan keluarga melalui berbagai program yang melibatkan partisipasi aktif masyarakat.
                        </p>
                        <ul>
                            <li><i class="bi bi-check2-all"></i> <span>Pemberdayaan perempuan melalui pelatihan keterampilan dan usaha kecil menengah.</span></li>
                            <li><i class="bi bi-check2-all"></i> <span>Program kesehatan untuk ibu dan anak guna mencegah stunting serta meningkatkan kualitas hidup keluarga.</span></li>
                            <li><i class="bi bi-check2-all"></i> <span>Pendidikan anak usia dini untuk membentuk generasi yang sehat, cerdas, dan berkualitas di Kabupaten Jepara.</span></li>
                        </ul>
                        <p>
                            Dasa Wisma terus berupaya menjadi mitra strategis dalam memajukan masyarakat melalui program-program yang fokus pada pemberdayaan dan pembangunan keluarga yang lebih baik.
                        </p>
                    </div>
                </div>


            </div>

        </section><!-- /About Section -->
    </main>

    <footer id="footer" class="footer dark-background">

        <!--    <div class="footer-newsletter">
            <div class="container">
                <div class="row justify-content-center text-center">
                    <div class="col-lg-6">
                        <h4>Bergabunglah dengan Newsletter Kami</h4>
                        <p>Daftarkan diri Anda untuk mendapatkan berita terbaru tentang program dan kegiatan Dasa Wisma Kabupaten Jepara!</p>
                        <form action="forms/newsletter.php" method="post" class="php-email-form">
                            <div class="newsletter-form">
                                <input type="email" name="email" placeholder="Masukkan email Anda">
                                <input type="submit" value="Berlangganan">
                            </div>
                            <div class="loading">Sedang memuat...</div>
                            <div class="error-message"></div>
                            <div class="sent-message">Permintaan berlangganan Anda telah terkirim. Terima kasih!</div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
-->

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
                        <li><i class="bi bi-chevron-right"></i> <a href="{{ url('/') }}">Home</a></li>
                        <li><i class="bi bi-chevron-right"></i> <a href="{{ route('about') }}">About us</a></li>
                        <li><i class="bi bi-chevron-right"></i> <a href="{{ route('services') }}">Services</a></li>
                        <li><i class="bi bi-chevron-right"></i> <a href="{{ route('contact') }}">Contact</a></li>
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
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>

    <!-- Main JS File -->
    <script src="{{ asset('assets/js/main.js') }}"></script>

</body>

</html>