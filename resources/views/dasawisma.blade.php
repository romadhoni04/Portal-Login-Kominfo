<!DOCTYPE html>
<html lang="en">

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Data Statistik - Dasa Wisma Kabupaten Jepara</title>
  <meta name="description" content="Lihat data statistik Dasa Wisma Kabupaten Jepara. Informasi lengkap tentang berbagai indikator dan laporan terkait kegiatan Dasa Wisma.">
  <meta name="keywords" content="Dasa Wisma, Jepara, Statistik, Data, Informasi, Laporan">
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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.debug.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>


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
          <li><a href="{{ route('dasawisma') }}" class="active">Dasa Wisma</a></li>
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
        <h1>Data Statistik Dasa Wisma</h1>
        <p>Informasi lengkap tentang statistik dan laporan kegiatan Dasa Wisma Kabupaten Jepara.</p>
        <nav class="breadcrumbs">
          <ol>
            <li><a href="{{ url('/') }}">Beranda</a></li>
            <li class="current">Dasa Wisma</li>
          </ol>
        </nav>
      </div>
    </div><!-- End Page Title -->

    <!-- Section Data Pengguna -->
    <!-- Section Data Pengguna -->
    <section id="data-pengguna" class="data-pengguna section">
      <div class="container" data-aos="fade-up">
        <div class="section-title">
          <h2>Pengguna Terdaftar</h2>
          <p>Daftar pengguna yang telah terdaftar pada program Dasa Wisma.</p>

          <!-- Tabel Pengguna -->
          <style>
            .table-container {
              margin: 20px auto;
              max-width: 800px;
              overflow-x: auto;
              /* Memungkinkan scroll horizontal */
              border-radius: 10px;
              box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            }

            .table {
              border-collapse: collapse;
              width: 100%;
              animation: fadeIn 0.5s;
            }

            .table th,
            .table td {
              padding: 15px;
              text-align: left;
              transition: background-color 0.3s;
            }

            .table th {
              background-color: #007bff;
              color: white;
            }

            .table tbody tr {
              border-bottom: 1px solid #ddd;
            }

            .table tbody tr:hover {
              background-color: rgba(0, 123, 255, 0.1);
            }

            @keyframes fadeIn {
              from {
                opacity: 0;
              }

              to {
                opacity: 1;
              }
            }

            .no-data {
              text-align: center;
              font-style: italic;
              color: #888;
            }

            /* Media query untuk tampilan mobile */
            @media (max-width: 768px) {

              .table th,
              .table td {
                padding: 10px;
                /* Kurangi padding di tampilan mobile */
                font-size: 14px;
                /* Sesuaikan ukuran font */
              }
            }
          </style>

          <div id="table-container" class="table-container">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Lengkap</th>
                  <th>Email</th>
                  <th>Tanggal Terdaftar</th>
                </tr>
              </thead>
              <tbody>
                @forelse($users as $index => $user)
                <tr>
                  <td>{{ $index + 1 }}</td>
                  <td>{{ $user->fullName }}</td>
                  <td>{{ $user->email }}</td>
                  <td>{{ $user->created_at->format('d M Y') }}</td>
                </tr>
                @empty
                <tr>
                  <td colspan="4" class="no-data">Tidak ada pengguna terdaftar.</td>
                </tr>
                @endforelse
              </tbody>
            </table>
          </div>

          <div class="download-buttons">
            <a id="download-pdf" href="{{ route('download.pdf') }}" class="btn btn-primary">Unduh PDF</a>
            <a id="download-excel" href="{{ route('download.excel') }}" class="btn btn-success">Unduh Excel</a>

          </div>

          <br>

          <!-- Visualisasi Data -->

          <!-- Chart container with download options -->
          <div class="chart-container" style="display: flex; gap: 20px; justify-content: center;">
            <!-- Grafik Bar -->
            <div class="chart-item" style="text-align: center; background-color: #f9f9f9; border-radius: 12px; padding: 20px; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);">
              <h3 style="color: #333; margin-bottom: 15px;">Jumlah Pengguna Perbulan</h3>
              <canvas id="userChart" style="max-width: 300px; max-height: 300px; margin: 0 auto;"></canvas>
              <div style="margin-top: 10px;">
                <button class="download-btn" onclick="downloadChart('userChart', 'png', 'Jumlah Pengguna Perbulan Dasa Wisma Kabupaten Jepara')">Download PNG</button>
                <button class="download-btn" onclick="downloadChart('userChart', 'jpg', 'Jumlah Pengguna Perbulan Dasa Wisma Kabupaten Jepara')">Download JPG</button>
                <button class="download-btn" onclick="downloadPDF('userChart', 'Jumlah Pengguna Perbulan Dasa Wisma Kabupaten Jepara')">Download PDF</button>
                <button class="download-btn" onclick="downloadExcel('userChart', 'Jumlah Pengguna Perbulan Dasa Wisma Kabupaten Jepara')">Download Excel</button>
              </div>
            </div>

            <!-- Grafik Pie -->
            <div class="chart-item" style="text-align: center; background-color: #f9f9f9; border-radius: 12px; padding: 20px; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);">
              <h3 style="color: #333; margin-bottom: 15px;">Diagram Jumlah Pengguna Perbulan</h3>
              <canvas id="userPieChart" style="max-width: 300px; max-height: 300px; margin: 0 auto;"></canvas>
              <div style="margin-top: 10px;">
                <button class="download-btn" onclick="downloadChart('userPieChart', 'png', 'Diagram Jumlah Pengguna Perbulan Dasa Wisma Kabupaten Jepara')">Download PNG</button>
                <button class="download-btn" onclick="downloadChart('userPieChart', 'jpg', 'Diagram Jumlah Pengguna Perbulan Dasa Wisma Kabupaten Jepara')">Download JPG</button>
                <button class="download-btn" onclick="downloadPDF('userPieChart', 'Diagram Jumlah Pengguna Perbulan Dasa Wisma Kabupaten Jepara')">Download PDF</button>
                <button class="download-btn" onclick="downloadExcel('userPieChart', 'Diagram Jumlah Pengguna Perbulan Dasa Wisma Kabupaten Jepara')">Download Excel</button>
              </div>
            </div>
          </div>


          <br> <br>

          <div class="chart-container" style="display: flex; gap: 20px; justify-content: center;">
            <div class="chart-item" style="text-align: center; background-color: #f9f9f9; border-radius: 12px; padding: 20px; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);">
              <h3 style="color: #333; margin-bottom: 15px;">Data Tanggal Pendaftaran</h3>
              <canvas id="userRegisterDateHistogram" style="max-width: 300px; max-height: 300px; margin: 0 auto;"></canvas>
              <div style="margin-top: 10px;">
                <button class="download-btn" onclick="downloadChart('userRegisterDateHistogram', 'png', 'Data Tanggal Pendaftaran Dasa Wisma Kabupaten Jepara')">Download PNG</button>
                <button class="download-btn" onclick="downloadChart('userRegisterDateHistogram', 'jpg', 'Data Tanggal Pendaftaran Dasa Wisma Kabupaten Jepara')">Download JPG</button>
                <button class="download-btn" onclick="downloadPDF('userRegisterDateHistogram', 'Data Tanggal Pendaftaran Dasa Wisma Kabupaten Jepara')">Download PDF</button>
                <button class="download-btn" onclick="downloadExcel('userRegisterDateHistogram', 'Data Tanggal Pendaftaran Dasa Wisma Kabupaten Jepara')">Download Excel</button>
              </div>
            </div>
            <div class="chart-item" style="text-align: center; background-color: #f9f9f9; border-radius: 12px; padding: 20px; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);">
              <h3 style="color: #333; margin-bottom: 15px;">Diagram Data Tanggal Pendaftaran</h3>
              <canvas id="userRegisterDatePieChart" style="max-width: 300px; max-height: 300px;  margin: 0 auto;"></canvas>
              <div style="margin-top: 10px;">
                <button class="download-btn" onclick="downloadChart('userRegisterDatePieChart', 'png', 'Diagram Data Tanggal Pendaftaran Dasa Wisma Kabupaten Jepara')">Download PNG</button>
                <button class="download-btn" onclick="downloadChart('userRegisterDatePieChart', 'jpg', 'Diagram Data Tanggal Pendaftaran Dasa Wisma Kabupaten Jepara')">Download JPG</button>
                <button class="download-btn" onclick="downloadPDF('userRegisterDatePieChart', 'Diagram Data Tanggal Pendaftaran Dasa Wisma Kabupaten Jepara')">Download PDF</button>
                <button class="download-btn" onclick="downloadExcel('userRegisterDatePieChart', 'Diagram Data Tanggal Pendaftaran Dasa Wisma Kabupaten Jepara')">Download Excel</button>
              </div>
            </div>
          </div>

          <br> <br>

          <div class="chart-container" style="display: flex; gap: 20px; justify-content: center;">
            <div class="chart-item" style="text-align: center; background-color: #f9f9f9; border-radius: 12px; padding: 20px; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);">
              <h3 style="color: #333; margin-bottom: 15px;">Total Pengguna Keseluruhan</h3>
              <canvas id="userAreaChart" style="max-width: 300px; max-height: 300px;  margin: 0 auto;"></canvas>
              <div style="margin-top: 10px;">
                <button class="download-btn" onclick="downloadChart('userAreaChart', 'png', 'Total Pengguna Website Dasa Wisma Kabupaten Jepara')">Download PNG</button>
                <button class="download-btn" onclick="downloadChart('userAreaChart', 'jpg', 'Total Pengguna Website Dasa Wisma Kabupaten Jepara')">Download JPG</button>
                <button class="download-btn" onclick="downloadPDF('userAreaChart', 'Total Pengguna Website Dasa Wisma Kabupaten Jepara')">Download PDF</button>
                <button class="download-btn" onclick="downloadExcel('userAreaChart', 'Total Pengguna Website Dasa Wisma Kabupaten Jepara')">Download Excel</button>
              </div>
            </div>
            <div class="chart-item" style="text-align: center; background-color: #f9f9f9; border-radius: 12px; padding: 20px; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);">
              <h3 style="color: #333; margin-bottom: 15px;">Diagram Total Pengguna Keseluruhan</h3>
              <canvas id="userAreaPieChart" style="max-width: 300px; max-height: 300px;  margin: 0 auto;"></canvas>
              <div style="margin-top: 10px;">
                <button class="download-btn" onclick="downloadChart('userAreaPieChart', 'png', 'Diagram Total Pengguna Website Dasa Wisma Kabupaten Jepara')">Download PNG</button>
                <button class="download-btn" onclick="downloadChart('userAreaPieChart', 'jpg', 'Diagram Total Pengguna Website Dasa Wisma Kabupaten Jepara')">Download JPG</button>
                <button class="download-btn" onclick="downloadPDF('userAreaPieChart', 'Diagram Total Pengguna Website Dasa Wisma Kabupaten Jepara')">Download PDF</button>
                <button class="download-btn" onclick="downloadExcel('userAreaPieChart', 'Diagram Total Pengguna Website Dasa Wisma Kabupaten Jepara')">Download Excel</button>
              </div>
            </div>
          </div>
          <!-- CSS untuk tombol download dan animasi -->
          <style>
            @media (max-width: 768px) {
              .chart-container {
                flex-direction: column;
                /* Mengubah arah dari horizontal menjadi vertikal */
                gap: 10px;
                justify-content: center;
              }

              .download-btn {
                padding: 8px 14px;
                background-color: #4CAF50;
                color: white;
                border: none;
                border-radius: 5px;
                cursor: pointer;
                transition: background-color 0.3s ease, transform 0.3s ease;
                margin: 3px;

              }

              .download-btn:hover {
                background-color: #45a049;
                transform: scale(1.05);
              }

              .chart-item {
                transition: transform 0.3s, box-shadow 0.3s;
                max-width: 100%;
                /* Membuat chart-item mengambil lebar penuh di mobile */
                margin: 0 auto;
                /* Membuat chart berada di tengah */
              }

              .chart-item:hover {
                transform: translateY(-10px);
                box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
              }
            }
          </style>
        </div>
      </div>
    </section>

    <!-- Load necessary libraries -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


    <script src="https://cdn.jsdelivr.net/npm/docx@latest/build/index.min.js"></script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.0/xlsx.full.min.js"></script>

    <script>
      // Function definitions
      function downloadChart(chartId, format, fileName) {
        var canvas = document.getElementById(chartId);
        if (canvas) {
          var link = document.createElement('a');

          // Mengatur tipe MIME berdasarkan format yang dipilih
          var mimeType = format === 'jpg' ? 'image/jpeg' : 'image/' + format;

          // Mengonversi canvas menjadi data URL
          link.href = canvas.toDataURL(mimeType);

          // Mengatur nama file yang akan diunduh berdasarkan parameter fileName
          link.download = fileName + '.' + format; // Gunakan nama file yang diinginkan

          // Eksekusi pengunduhan
          link.click();
        } else {
          console.error("Canvas tidak ditemukan:", chartId);
        }
      }

      async function downloadPDF(chartId, fileName) {
        const {
          jsPDF
        } = window.jspdf;
        var canvas = document.getElementById(chartId);
        if (canvas) {
          // Mengambil data gambar dari canvas dalam format PNG
          var imgData = canvas.toDataURL('image/png');

          // Membuat objek PDF baru
          var pdf = new jsPDF();

          // Menentukan ukuran gambar dan halaman
          var imgWidth = 190; // Sesuaikan lebar gambar dalam PDF
          var pageHeight = pdf.internal.pageSize.height;
          var imgHeight = (canvas.height * imgWidth) / canvas.width;
          var heightLeft = imgHeight;

          var position = 0;

          // Menambahkan gambar ke halaman pertama PDF
          pdf.addImage(imgData, 'PNG', 10, position, imgWidth, imgHeight);
          heightLeft -= pageHeight;

          // Jika gambar lebih besar dari satu halaman, tambahkan halaman baru
          while (heightLeft >= 0) {
            position = heightLeft - imgHeight;
            pdf.addPage();
            pdf.addImage(imgData, 'PNG', 10, position, imgWidth, imgHeight);
            heightLeft -= pageHeight;
          }

          // Simpan file PDF dengan nama yang diberikan
          pdf.save(fileName + '.pdf');
        } else {
          console.error("Canvas tidak ditemukan untuk PDF:", chartId);
        }
      }


      function downloadExcel(chartId, fileName) {
        // Data header untuk Excel
        var data = [
          ['Bulan', 'Jumlah Pengguna']
        ];

        // Ambil elemen chart berdasarkan ID
        var chartElement = document.getElementById(chartId);
        var chartInstance = Chart.getChart(chartElement); // Mendapatkan instance Chart.js

        // Mengambil labels dan data dari chart
        var labels = chartInstance.data.labels;
        var values = chartInstance.data.datasets[0].data;

        // Menggabungkan label dan nilai ke dalam array data
        for (var i = 0; i < labels.length; i++) {
          data.push([labels[i], values[i]]);
        }

        // Membuat worksheet dari array data
        var ws = XLSX.utils.aoa_to_sheet(data);

        // Membuat workbook baru
        var wb = XLSX.utils.book_new();

        // Menambahkan worksheet ke dalam workbook
        XLSX.utils.book_append_sheet(wb, ws, "Data Pengguna");

        // Menyimpan file Excel dengan nama sesuai parameter
        XLSX.writeFile(wb, fileName + ".xlsx");
      }




      document.addEventListener('DOMContentLoaded', function() {
        var userCounts = JSON.parse('{!! json_encode($userCounts) !!}');
        var dailyCounts = JSON.parse('{!! json_encode($dailyCounts) !!}');

        var labels = Object.keys(userCounts).map(function(month) {
          return 'Bulan ' + month;
        });
        var data = Object.values(userCounts);

        // Konfigurasi Chart Bar
        var ctxBar = document.getElementById('userChart').getContext('2d');
        new Chart(ctxBar, {
          type: 'bar',
          data: {
            labels: labels,
            datasets: [{
              label: 'Jumlah Pengguna per Bulan',
              data: data,
              backgroundColor: 'rgba(54, 162, 235, 0.6)',
              borderColor: 'rgba(54, 162, 235, 1)',
              borderWidth: 1
            }]
          },
          options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
              y: {
                beginAtZero: true
              }
            }
          }
        });

        // Konfigurasi Chart Pie
        var ctxPie = document.getElementById('userPieChart').getContext('2d');
        new Chart(ctxPie, {
          type: 'pie',
          data: {
            labels: labels,
            datasets: [{
              label: 'Diagram Jumlah Pengguna Per Bulan Yaitu',
              data: data,
              backgroundColor: [
                'rgba(255, 99, 132, 0.6)',
                'rgba(54, 162, 235, 0.6)',
                'rgba(255, 206, 86, 0.6)',
                'rgba(75, 192, 192, 0.6)'
              ],
              borderWidth: 1
            }]
          },
          options: {
            responsive: true,
            maintainAspectRatio: false
          }
        });

        // Chart lainnya
        var ctxArea = document.getElementById('userAreaChart').getContext('2d');
        new Chart(ctxArea, {
          type: 'line',
          data: {
            labels: labels,
            datasets: [{
              label: 'Total Pengguna Seluruhnya',
              data: data,
              backgroundColor: 'rgba(75, 192, 192, 0.2)',
              borderColor: 'rgba(75, 192, 192, 1)',
              fill: true
            }]
          },
          options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
              y: {
                beginAtZero: true
              }
            }
          }
        });


        var ctxAreaPie = document.getElementById('userAreaPieChart').getContext('2d');
        new Chart(ctxAreaPie, {
          type: 'pie',
          data: {
            labels: labels,
            datasets: [{
              label: 'Diagram Total Pengguna Seluruhnya',
              data: data,
              backgroundColor: [
                'rgba(255, 99, 132, 0.6)', 'rgba(54, 162, 235, 0.6)', 'rgba(255, 206, 86, 0.6)',
                'rgba(75, 192, 192, 0.6)', 'rgba(153, 102, 255, 0.6)', 'rgba(255, 159, 64, 0.6)'
              ],
              borderColor: [
                'rgba(255, 99, 132, 1)', 'rgba(54, 162, 235, 1)', 'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)', 'rgba(153, 102, 255, 1)', 'rgba(255, 159, 64, 1)'
              ],
              borderWidth: 1
            }]
          },
          options: {
            responsive: true,
            maintainAspectRatio: false
          }
        });


        var ctxRegisterDate = document.getElementById('userRegisterDateHistogram').getContext('2d');
        var dailyCounts = JSON.parse('{!! json_encode($dailyCounts) !!}');
        var dailyLabels = Object.keys(dailyCounts);
        var dailyData = Object.values(dailyCounts);
        new Chart(ctxRegisterDate, {
          type: 'bar',
          data: {
            labels: dailyLabels,
            datasets: [{
              label: 'Total Jumlah & Waktu Pendaftar',
              data: dailyData,
              backgroundColor: 'rgba(75, 192, 192, 0.6)'
            }]
          },
          options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
              x: {
                title: {
                  display: true,
                  text: 'Tanggal Pendaftaran'
                }
              },
              y: {
                title: {
                  display: true,
                  text: 'Jumlah Pendaftar'
                },
                beginAtZero: true
              }
            }
          }
        });

        var ctxRegisterDatePie = document.getElementById('userRegisterDatePieChart').getContext('2d');
        new Chart(ctxRegisterDatePie, {
          type: 'pie',
          data: {
            labels: dailyLabels,
            datasets: [{
              label: 'Diagram Jumlah & Waktu Pendaftar',
              data: dailyData,
              backgroundColor: [
                'rgba(255, 99, 132, 0.6)', 'rgba(54, 162, 235, 0.6)', 'rgba(255, 206, 86, 0.6)',
                'rgba(75, 192, 192, 0.6)', 'rgba(153, 102, 255, 0.6)', 'rgba(255, 159, 64, 0.6)'
              ],
              borderColor: [
                'rgba(255, 99, 132, 1)', 'rgba(54, 162, 235, 1)', 'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)', 'rgba(153, 102, 255, 1)', 'rgba(255, 159, 64, 1)'
              ],
              borderWidth: 1
            }]
          },
          options: {
            responsive: true,
            maintainAspectRatio: false
          }
        });
      });
    </script>



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