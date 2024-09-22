---

# Dasa Wisma Kabupaten Jepara

Selamat datang di repositori website **Dasa Wisma Kabupaten Jepara**. Proyek ini bertujuan untuk memfasilitasi administrasi, organisasi, dan komunikasi dalam komunitas Dasa Wisma di Kabupaten Jepara. Platform ini menyediakan alat untuk mengelola peran pengguna, visualisasi data, layanan, dan fitur lainnya yang dirancang khusus untuk mendukung pemerintahan lokal dan komunitas di Jepara.

## Gambaran Proyek

Dasa Wisma adalah inisiatif yang bertujuan untuk meningkatkan kesejahteraan masyarakat melalui partisipasi di tingkat rumah tangga. Website ini memungkinkan administrator dan superadmin untuk mengelola data terkait Dasa Wisma, seperti statistik pengguna, layanan, portofolio, dan artikel yang berkaitan dengan kegiatan Dasa Wisma di Kabupaten Jepara.

## Fitur Utama

- **Manajemen Peran Pengguna**: Administrator dapat mengelola peran pengguna, termasuk `user`, `administrator`, dan `superadmin`.
- **Visualisasi Data**: Menyediakan diagram dan grafik yang memvisualisasikan data pengguna dan layanan menggunakan Chart.js.
- **Pengelolaan Layanan**: CRUD layanan yang dapat diatur oleh superadmin, dengan informasi layanan yang ditampilkan di halaman khusus.
- **Portofolio**: Superadmin dapat mengelola portofolio dengan fitur untuk menambahkan, mengedit, dan menghapus gambar portofolio.

## Teknologi yang Digunakan

- **Laravel 11**: Sebagai framework backend utama untuk membangun dan mengelola logika aplikasi.
- **Bootstrap 5**: Untuk mendukung tampilan dan tata letak responsif.
- **Chart.js**: Untuk visualisasi data dalam bentuk diagram dan grafik interaktif.
- **HTML2Canvas**: Untuk menangkap tampilan halaman sebagai gambar.
- **Swiper.js**: Untuk menampilkan carousel logo dan konten terkait lainnya.

## Cara Penggunaan

1. Clone repositori ini ke direktori lokal Anda.
2. Install dependensi menggunakan Composer dan NPM:
    ```
    composer install
    npm install
    npm run dev
    ```
3. Jalankan migrasi database:
    ```
    php artisan migrate
    ```
4. Jalankan server lokal:
    ```
    php artisan serve
    ```

## Lisensi

Proyek ini dibuat dengan dukungan oleh **Diskominfo Kabupaten Jepara**. Semua hak cipta dilindungi.

---

