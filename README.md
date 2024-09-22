# Laravel 11

Login Portal Kominfo Laravel 11.

| Laravel Version | Branch | Support |
| --------------- | ------ | ------- |
| 11.0            | main   |         |

# Dasa Wisma Kabupaten Jepara

Selamat datang di repositori website **Dasa Wisma Kabupaten Jepara**. Proyek ini bertujuan untuk memfasilitasi administrasi, organisasi, dan komunikasi dalam komunitas Dasa Wisma di Kabupaten Jepara. Platform ini menyediakan alat untuk mengelola peran pengguna, visualisasi data, layanan, portofolio, dan fitur lainnya yang dirancang khusus untuk mendukung pemerintahan lokal dan komunitas di Jepara.

## Gambaran Proyek

Dasa Wisma adalah inisiatif yang bertujuan untuk meningkatkan kesejahteraan masyarakat melalui partisipasi di tingkat rumah tangga. Website ini memungkinkan administrator dan superadmin untuk mengelola data terkait Dasa Wisma, seperti statistik pengguna, layanan, portofolio, dan artikel yang berkaitan dengan kegiatan Dasa Wisma di Kabupaten Jepara.

## Fitur Utama

-   **Manajemen Peran Pengguna**: Administrator dapat mengelola peran pengguna, termasuk `user`, `administrator`, dan `superadmin`.
-   **Visualisasi Data**: Menyediakan diagram dan grafik yang memvisualisasikan data pengguna dan layanan menggunakan Chart.js.
-   **Pengelolaan Layanan**: CRUD layanan yang dapat diatur oleh superadmin, dengan informasi layanan yang ditampilkan di halaman khusus.
-   **Portofolio**: Superadmin dapat mengelola portofolio dengan fitur untuk menambahkan, mengedit, dan menghapus gambar portofolio.

## Teknologi yang Digunakan

-   **Laravel 11**: Sebagai framework backend utama untuk membangun dan mengelola logika aplikasi.
-   **Bootstrap 5**: Untuk mendukung tampilan dan tata letak responsif.
-   **Chart.js**: Untuk visualisasi data dalam bentuk diagram dan grafik interaktif.
-   **HTML2Canvas**: Untuk menangkap tampilan halaman sebagai gambar.
-   **Swiper.js**: Untuk menampilkan carousel logo dan konten terkait lainnya.

## Cara Penggunaan

1. Clone repositori ini ke direktori lokal Anda:
    ```bash
    git clone <url-repositori>
    ```
2. Install dependensi menggunakan Composer dan NPM:
    ```bash
    composer install
    npm install
    npm run dev
    ```
3. Jalankan migrasi database:
    ```bash
    php artisan migrate
    ```
4. Jalankan server lokal:
    ```bash
    php artisan serve
    ```

## Preview

`login`

<img src="https://i.imgur.com/eTuEtpx.png">

---

`dashboard`

<img src="https://i.imgur.com/gHCpbes.png">

---

`profile`

<img src="https://i.imgur.com/zkquLWr.png">

---

`register`

<img src="https://i.imgur.com/HtS2lzX.png">

---

`reset password`

<img src="https://i.imgur.com/OwosYrK.png">

---

`reset password`

<img src="https://i.imgur.com/7n6qZpr.png">

---

`reset password`

<img src="https://i.imgur.com/FtHd7lf.png">

## License

Politeknik Balekambang Jepara.

1. Muhammad Nuril Anwar
2. Roma Dhoni
3. Muhammad Asroful Anam

Proyek ini dibuat dengan dukungan oleh **Diskominfo Kabupaten Jepara**. Semua hak cipta dilindungi.

## Login

1. Superadmin

    email : dhoniroma676@gmail.com
    password : doni12345

2. admin

    email : admin@gmail.com
    password : doni12345

3. user

    email : doni@gmail.com
    password : doni12345

`untuk user bisa registrasi sendiri tetapi untuk admin dan superadmin silahkan login dengan email dan juga password yang tertera`
