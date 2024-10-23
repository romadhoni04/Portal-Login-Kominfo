-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 23, 2024 at 02:57 AM
-- Server version: 8.0.30
-- PHP Version: 8.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_login_kominfo`
--

-- --------------------------------------------------------

--
-- Table structure for table `abouts`
--

CREATE TABLE `abouts` (
  `id` bigint UNSIGNED NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `abouts`
--

INSERT INTO `abouts` (`id`, `image`, `title`, `content`, `created_at`, `updated_at`) VALUES
(1, '1726514829.jpg', 'Komitmen Kami terhadap Kesejahteraan Masyarakat', 'Dasa Wisma Kabupaten Jepara berfokus pada peningkatan kualitas hidup masyarakat melalui berbagai inisiatif sosial. Kami bekerja sama dengan berbagai pihak untuk mencapai tujuan ini.\r\n\r\n1. Program pelatihan dan pemberdayaan masyarakat.\r\n\r\n2. Pengelolaan bantuan sosial dan kesehatan.\r\n\r\n3. Inisiatif lingkungan dan kebersihan untuk komunitas.\r\n\r\nKami percaya bahwa dengan kerjasama dan dedikasi, kita dapat mencapai perubahan positif dan memberikan dampak yang signifikan bagi masyarakat Kabupaten Jepara. Dukungan dan partisipasi Anda sangat berarti bagi kami.', '2024-09-16 04:13:58', '2024-09-16 19:27:09');

-- --------------------------------------------------------

--
-- Table structure for table `activity_logs`
--

CREATE TABLE `activity_logs` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `activity_logs`
--

INSERT INTO `activity_logs` (`id`, `user_id`, `description`, `created_at`, `updated_at`) VALUES
(3, 1, 'Voluptate voluptas consequatur perspiciatis recusandae voluptatem eius.', '2024-09-09 10:50:18', '2024-09-09 10:50:18'),
(4, 11, 'Distinctio ipsa expedita accusantium et sit quo unde.', '2024-09-09 10:50:18', '2024-09-09 10:50:18'),
(6, 4, 'Laudantium fuga doloribus magnam corporis voluptas soluta.', '2024-09-09 10:50:18', '2024-09-09 10:50:18'),
(9, 13, 'Sit in quaerat velit aut fuga eaque.', '2024-09-09 10:50:18', '2024-09-09 10:50:18'),
(10, 1, 'Consectetur quia sunt quas in pariatur eos.', '2024-09-09 10:50:18', '2024-09-09 10:50:18'),
(14, 4, 'Optio laborum et saepe aspernatur laudantium odio commodi.', '2024-09-09 18:13:01', '2024-09-09 18:13:01'),
(18, 1, 'Consectetur vel architecto rem aliquid non distinctio.', '2024-09-09 18:13:01', '2024-09-09 18:13:01'),
(21, 1, 'Laboriosam in culpa aut.', '2024-09-09 18:13:01', '2024-09-09 18:13:01'),
(24, 11, 'Ratione minima non sunt delectus.', '2024-09-09 18:13:01', '2024-09-09 18:13:01'),
(27, 11, 'Laboriosam accusantium fuga distinctio consectetur quisquam.', '2024-09-09 18:13:01', '2024-09-09 18:13:01'),
(32, 4, 'Aut ut nemo natus et quisquam omnis.', '2024-09-09 18:13:01', '2024-09-09 18:13:01');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `author_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `content`, `image`, `author_id`, `created_at`, `updated_at`) VALUES
(1, 'Luncurkan “Samudra”, Pj Bupati Jepara Dorong Data OPD Terintegrasi', 'JEPARA – Organisasi Perangkat Daerah (OPD) yang belum mengintegrasikan aplikasinya ke Satu Manajemen untuk Data Jepara (Samudra), diminta untuk segera diintegrasikan. Pasalnya, dengan adanya aplikasi data yang saling terintegrasi, dapat memudahkan masyarakat untuk mendapatkan pelayanan publik dan informasi dengan akurat.\r\n\r\nHal itu disampaikan Penjabat (Pj) Bupati Jepara Edy Supriyanta, saat meluncurkan aplikasi Samudra, di Pendapa Kartini, Senin (15/7/2024). Sebab, sesuai dengan arahan Presiden Joko Widodo beberapa waktu lalu, pemerintah diminta tidak lagi membuat aplikasi baru, namun mengintegrasikan beberapa aplikasi pada satu portal.\r\n\r\nMenurutnya, sebuah portal yang dapat menampung seluruh aplikasi dan informasi yang ada di Jepara tersebut sangat penting. Satu data tidak hanya bermanfaat untuk masyarakat, namun juga untuk pemerintah dalam mengambil kebijakan.\r\n\r\nEdy menyadari, aplikasi Samudra masih memerlukan pembaharuan dan koordinasi dengan pihak-pihak terkait, agar data yang disajikan lengkap.\r\n\r\n“Tadi saya bisa lihat berapa jumlah stunting kita, ternyata datanya sudah betul. Ketersediaan ruang inap rumah sakit juga sudah ada. Ini merupakan bentuk pelayanan untuk masyarakat,” tandasnya.\r\n\r\nPada kesempatan itu, Edy juga mengingatkan pentingnya akuntabilitas dan transparansi pemerintah, agar dapat meningkatkan partisipasi masyarakat dalam mengawal proses pembangunan daerah. Dirinya berharap, aplikasi tersebut dapat berkelanjutan dan yang terpenting adalah keamanan data, agar tidak mudah terkena serangan siber.\r\n\r\nKepala Diskominfo Provinsi Jawa Tengah Riena Retnaningrum mengatakan, data pemerintah dibutuhkan dalam proses pembangunan dan menjadi modal terpenting dalam menunjukkan arah pembangunan, baik di tingkat pusat maupun daerah.\r\n\r\n“Untuk itu, saya menyampaikan apresiasi kepada Pemerintah Kabupaten Jepara atas komitmennya, untuk menerapkan kebijakan satu data melalui portal Samudra,” ucap Riena.\r\n\r\nRiena berharap, dengan adanya Samudra dapat mendorong keterbukaan informasi dan data, serta dapat dimanfaatkan secara maksimal dan berkelanjutan bagi pemerintah dan masyarakat.\r\n\r\nTerkait masih adanya beberapa perangkat daerah yang belum terintegrasi, Kepala Diskominfo Kabupaten Jepara Arif Darmawan menyampaikan, pihaknya terus berkoordinasi dengan berbagai pihak.\r\n\r\n“Ini masih dalam pengembangan, dan kami koordinasikan. Terbaru, besok programer kami akan berkolaborasi dengan programer RSUD RA Kartini. Harapannya, di aplikasi Samudra nanti kita bisa melakukan pendaftaran pasien,” ujarnya.\r\n\r\nArif menambahkan, aplikasi Samudra dapat diakses masyarakat melalui tautan samudra.jepara.go.id, atau dapat diunduh melalui google playstore.', 'blogs/OPvancJBUljpj7cKqq1jcTdxrLkaV3x2zXOjf12b.jpg', 1, '2024-09-14 09:19:44', '2024-09-14 22:20:51'),
(2, 'Perbaikan Jalan dan Pembangunan Alun-Alun 1 Jepara Dipastikan Selesai Sebelum 2025', 'Penjabat (Pj) Bupati Jepara Edy Supriyanta menyampaikan, revitalisasi Alun-Alun 1 Jepara menggunakan anggaran Rp4 miliar, yang bersumber dari Bantuan Provinsi Jawa Tengah (Banprov). Sedangkan proses pembangunannya, sudah dimulai sejak 17 Juli dan diperkirakan selesai pada 13 Desember 2024.\r\n\r\nDisampaikan, pihaknya akan mempercantik Alun-Alun 1 Jepara dengan beberapa fasilitas, terutama penambahan fasilitas videotron, olahraga outdoor, aksesoris, dan area toilet. Dan yang menjadi perhatian adalah pembangunan jogging track, yakni pelebaran dari yang semula 4 meter menjadi 8 meter. Progres pembangunannya saat ini, sudah mencapai 20 persen.\r\n\r\n“Saya melihat animo masyarakat saat car free day (CFD) sangat luar biasa. Jogging track kita lebarkan, dan yang semula lantai dasarnya keramik, kita ganti dengan batu alam andesit,” terangnya.\r\n\r\nEdy berharap, alun-alun yang sudah menjadi ikon Kota Jepara, bisa menjadi sarana refreshing untuk keluarga. Selain itu, diharapkan masyarakat turut serta ikut menjaga dan merawatnya.\r\n\r\nSelain meninjau proses Pembangunan Alun-Alun 1 Jepara, Pj Bupati Jepara juga meninjau perbaikan Jalan Tanggultlare-Kerso, Selasa (10/9/2024).\r\n\r\nEdy menyampaikan, total jalan milik kabupaten sepanjang 852 kilometer, dengan 238 ruas jalan. Dari keseluruhan ruas jalan tersebut, 100 ruas jalan milik kabupaten sudah dilakukan perbaikan. Proses pengerjaan perbaikan melalui klinik jalan akan terus dilakukan, dan ditargetkan semuanya akan selesai pada Desember mendatang.\r\n\r\nKepala Dinas Pekerjaan Umum dan Penataan Ruang (DPUPR) Kabupaten Jepara, Ary Bachtiar menyampaikan, untuk pemeliharaan jalan itu ada rutin dan berkala. Kalau klinik jalan itu pemeliharaan rutin dan lebih kepada penambalan lubang jalan.\r\n\r\n“Jadi kita kejar sampai nanti di akhir tahun ini. Harapan kita, seluruhnya tuntas dan untuk progres sejauh ini sudah di atas 50 persen,” kata Ary.\r\n\r\nUntuk anggaran klinik jalan, Ary mengatakan, anggarannya mencapai Rp9 miliar dengan rincian Rp4 miliar untuk pengadaan aspal dan Rp5 miliar untuk pengadaan material, alat, dan tenaga.\r\n\r\n“Kalau klinik sifatnya sepanjang tahun, nanti penanganan selain pengaspalan secara aspal panas atau hot mix, juga dilakukan penanganan pengaspalan secara cold mix atau aspal dingin yang kita sudah laksanakan di jalan-jalan di daerah kota dan sifatnya darurat,” jelasnya.\r\n\r\nTerkait Pembangunan Alun-Alun 1 Jepara, Ary menyampaikan, sesuai dengan kontrak, pembangunan selesai pada 13 Desember 2024.\r\n\r\n“Harapan kita, sebelum tahun baru 2025 bisa digunakan, dan menjadi tempat santai bagi keluarga atau masyarakat,” jelasnya.', 'blogs/EJ1pvK0iwnINZCdUq6iRVsXFe5QyFUVHEw5YxEZd.gif', 1, '2024-09-14 15:17:38', '2024-09-14 15:42:00'),
(3, 'Bertepatan dengan Haul ke 120 RA. Kartini, Kapolres Jepara Launching Buku ‘Mozaik Pengabdian Di Bumi Kartini', 'Kepala Kepolisian Resor (Kapolres) Jepara AKBP Wahyu Nugroho Setyawan menggelar peluncuran buku yang berjudul ‘Mozaik Pengabdian AKBP Wahyu Nugroho Setyawan, S.I.K., M.PICT., M.Krim di Bumi Kartini’ di aula Resto Maribu Jepara, Sabtu (14/9/2024).\r\n\r\nBuku yang ditulis oleh jurnalis senior Hadi Priyanto ini, memberikan gambaran perjalanan dan pengabdian AKBP Wahyu Nugroho Setyawan sebagai anggota Polri dalam menjalankan tugas melindungi, mengayomi dan melayani masyarakat.\r\n\r\nDimulai dari penugasan pertama di Polda Metro Jaya setelah lulus dari Akademi Kepolisian tahun 2003 hingga menjadi Kapolres Sukoharjo tahun 2021 dan Kapolres Jepara tahun 2023.\r\n\r\nDisamping itu, keberaniannya dalam memanfaatkan peluang yang diberikan oleh institusi kepolisian untuk menambah ilmu dan pengetahuan yang linier dengan bidang tugasnya. Yaitu mendapatkan dua beasiswa program S-2 di Macquarie Universty Australia dan Universitas Indonesia.\r\n\r\nBuku dengan tebal xi+183 halaman dan terdiri dari 19 bab tersebut berbagi kisah tentang perjuangan, mimpi, dan kekuatan leluhur yang terasa begitu kuat di Bumi Kartini. Ia berharap bukunya dapat menjadi inspirasi bagi masyarakat Jepara dan seluruh Indonesia agar terus melakukan hal-hal baik yang dapat dikenang di lingkungan sekitar.\r\n\r\n“Semoga buku ini dapat memberikan manfaat dan inspirasi terutama generasi muda serta masyarakat Jepara dalam mewujudkan cita – cita sesuai bakat dan minatnya,” ujarnya.\r\n\r\n“Selain itu, saya juga berharap buku ini menjadi memori bagi saya selama berada disini. Saya mencoba memberikan yang terbaik melalui buku ini dan kedepannya saya juga berharap bisa bermanfaat baik untuk anggota Polres maupun masyarakat Jepara,” ucap AKBP Wahyu.\r\n\r\nIa juga menekankan pentingnya pemanfaatan waktu sangat esensial sekaligus menjadi pintu pembuka dan tolok ukur kesuksesan seseorang, yang diwujudkannya melalui ‘waktu adalah anugerah’.\r\n\r\nDalam upaya penulisan biografinya, AKBP Wahyu bekerja sama dengan penulis senior yang memiliki kualitas menulis sebagai wartawan yang berpengalaman, yaitu Hadi Priyanto dan tim Sihumas Polres Jepara. Mereka membantu dalam penulisan dan desain buku, serta mendorong dirinya untuk terus menjadi inspirasi hingga berbagi pengalaman.\r\n\r\nDiketahui, selain kegiatan peluncuran buku ‘Mozaik Pengabdian AKBP Wahyu Nugroho Setyawan, S.I.K., M.PICT., M.Krim di Bumi Kartini’ juga dibarengi dengan haul ke-120 R.A. Kartini.\r\n\r\nDimana dalam kegiatan tersebut dihadiri oleh jajaran Forkopimda Jepara, anggota TNI-Polri, tokoh masyarakat, tokoh adat, akademisi, jurnalis, mahasiswa hingga berbagai lapisan elemen masyarakat. Dengan penuh semangat, AKBP Wahyu menyampaikan jika pesan dari bukunya adalah pentingnya melakukan hal-hal baik yang dapat dikenang dan terus berusaha untuk kemajuan banyak orang.\r\n\r\nDengan adanya kegiatan haul ke-120 R.A. Kartini menjadi momen penting untuk mengenang perjuangan dan kontribusinya dalam emansipasi wanita di Indonesia.\r\n\r\nMenurut AKBP Wahyu, R.A. Kartini dikenal sebagai pelopor gerakan emansipasi wanita di Indonesia. Melalui surat-suratnya, ia menyuarakan impian untuk memberikan pendidikan yang lebih baik bagi perempuan. Gerakan yang dipelopori oleh Kartini membuka jalan bagi wanita untuk mengakses pendidikan dan berpartisipasi aktif dalam masyarakat.\r\n\r\nSelain itu, dalam melaksanakan tugas di Kabupaten Jepara, AKBP Wahyu mengaku banyak mendapat inspirasi dari nilai-nilai kejuangan R.A. Kartini, sehingga nilai-nilai budaya kearifan lokal Jepara itu ia implementasikan dalam tugas kepolisian seperti dengan membuat program ‘Polwan Kartini Jepara Menyapa’ dan ‘Kampung Kartini Tangguh’.\r\n\r\nKedua program ini berupaya semakin mendekatkan Polri dengan masyarakat dengan menerjunkan langsung para petugas Polwan untuk membantu permasalahan sosial yang dihadapi masyarakat Jepara', 'blogs/UowY01WXqAeRGNb439YFZ3epRqMFODFZRolvZqsD.jpg', 1, '2024-09-14 15:54:22', '2024-09-14 15:54:22'),
(4, 'Kebanggaan Jepara, Subhan Disambut Meriah Setelah Harumkan Indonesia di Paralimpiade Paris 2024', 'Sepulang dari Paris, Subhan, salah satu atlet tim bulu tangkis Indonesia dalam Paralimpiade Paris 2024, mendapat sambutan meriah dari masyarakat Kabupaten Jepara. Prestasi gemilang yang ia raih dengan membawa pulang medali perunggu dalam cabang olahraga bulutangkis ganda campuran diapresiasi secara luas, baik oleh Pemerintah Kabupaten (Pemkab) Jepara maupun warga setempat.\r\n\r\nPada Jumat (13/9/2024), Subhan disambut dengan arak-arakan besar-besaran dari Makam Mantingan hingga Pendopo R.A Kartini Kabupaten Jepara. Dalam kirab tersebut, Subhan diarak menggunakan Jeep terbuka sambil dielu-elukan oleh ratusan pelajar dan masyarakat yang berjajar di sepanjang jalan. Penyambutan ini mencerminkan kebanggaan masyarakat Jepara atas prestasi atlet asal daerah mereka yang berhasil mengharumkan nama Indonesia di panggung dunia.\r\n\r\nSetibanya di Pendopo R.A Kartini, rombongan Subhan disambut oleh Penjabat (Pj) Bupati Jepara, Edy Supriyanta, beserta jajaran Forum Komunikasi Pimpinan Daerah (Forkopimda). Dalam sambutannya, Edy menyampaikan apresiasi dan rasa bangganya atas pencapaian Subhan. Ia menegaskan bahwa Subhan merupakan bukti bahwa Kabupaten Jepara memiliki talenta-talenta hebat yang mampu bersaing di kancah internasional.', 'blogs/xwCY72v4Lu6SeHbH76dXFHDekXVZmRMbpfXk6nPU.jpg', 1, '2024-09-14 15:58:45', '2024-09-14 15:58:45');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `name`, `logo`, `created_at`, `updated_at`, `link`) VALUES
(1, 'Wadul Bupati', 'logos/NWKyS3avFW42LsqLXS5jQ21v4GNy8vDbFIBz3STJ.png', '2024-09-18 07:08:53', '2024-09-21 12:31:40', 'https://wadul.jepara.go.id/'),
(4, 'Samudra Jepara', 'logos/1jXE1tY6tYFClWWjTMg2Ebw2MdLgCvz581SzbK60.png', '2024-09-18 07:37:46', '2024-09-20 03:48:09', 'https://samudra.jepara.go.id/'),
(8, 'DPRD Jepara', 'logos/Xu8OpzHDJo9YHtv8Xn5gBWhTeVMMD1xVaNNykKZ4.png', '2024-09-18 07:39:22', '2024-09-20 01:32:50', 'https://dprd.jepara.go.id/'),
(9, 'DKPP Jepara', 'logos/nMOHdd4s73xoU8OjP3gmxsqQcLI0wXXdpTaT598F.png', '2024-09-18 07:39:37', '2024-09-21 12:37:27', 'https://dkpp.jepara.go.id/'),
(10, 'Diskominfo Jepara', 'logos/lPHR0ugqTO24fR7P60Siu2wU5pxPdsfag0wPpFXp.png', '2024-09-18 07:40:28', '2024-09-20 01:35:10', 'https://diskominfo.jepara.go.id/'),
(13, 'Pantai Kartini', 'logos/3cz8i6OAORIVwxbPiYEJeZwCH9DCyo4QdsVotuK2.jpg', '2024-09-21 12:35:35', '2024-09-21 12:38:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `data_keluarga`
--

CREATE TABLE `data_keluarga` (
  `no_kk` varchar(16) NOT NULL,
  `nama_kepala_keluarga` varchar(255) DEFAULT NULL,
  `dawis_id` int DEFAULT NULL,
  `no_kel` int DEFAULT NULL,
  `no_kec` int DEFAULT NULL,
  `no_kab` int DEFAULT NULL,
  `no_prop` int DEFAULT NULL,
  `kepala_rumah_tangga_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `data_keluarga`
--

INSERT INTO `data_keluarga` (`no_kk`, `nama_kepala_keluarga`, `dawis_id`, `no_kel`, `no_kec`, `no_kab`, `no_prop`, `kepala_rumah_tangga_id`) VALUES
('3173010412020000', 'Doni Tes', 22, 2009, 13, 20, 33, 2),
('3173010412020005', 'Roma Dhoni', 22, 2001, 10, 20, 33, 2),
('3173010412020007', 'Doni Tes', 36, 2001, 10, 20, 33, 6),
('33456', 'doni anjay 4', 23, 2005, 15, 20, 33, 2),
('444333', 'doniii karimun 4 5', 22, 2004, 15, 20, 33, 4),
('54321', 'Roma Dhoni Keren tes', 22, 2004, 5, 20, 33, 4),
('556478', 'Roma Dhoni tanjung Fix', 34, 2002, 15, 20, 33, NULL),
('77865432', 'doniii anjay 4 tes aja ya', 34, 2009, 14, 20, 33, NULL),
('7886543', 'doni anjay 3', 34, 2003, 15, 20, 33, NULL),
('78962', 'Doni tanjung', 34, 2005, 15, 20, 33, NULL),
('887652390', 'Nuril Ganteng', 34, 2007, 4, 20, 33, 5),
('9876520', 'tes tes doni aja', 34, 2007, 13, 20, 33, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `data_keluarga_akumulasi`
--

CREATE TABLE `data_keluarga_akumulasi` (
  `no_kk` varchar(16) DEFAULT NULL,
  `balita` int DEFAULT NULL,
  `pus` int DEFAULT NULL,
  `wus` int DEFAULT NULL,
  `tiga_buta` int DEFAULT NULL,
  `ibu_hamil` int DEFAULT NULL,
  `ibu_menyusui` int DEFAULT NULL,
  `lansia` int DEFAULT NULL,
  `makanan_pokok` int DEFAULT NULL,
  `makanan_pokok_lain` varchar(255) DEFAULT NULL,
  `jumlah_keluarga` int DEFAULT NULL,
  `jumlah_keluarga_jumlah` int DEFAULT NULL,
  `sumber_air_keluarga` int DEFAULT NULL,
  `sumber_air_keluarga_lain` varchar(255) DEFAULT NULL,
  `tempat_sampah_keluarga` int DEFAULT NULL,
  `saluran_air_limbah` int DEFAULT NULL,
  `stiker_p4k` int DEFAULT NULL,
  `kriteria_rumah` int DEFAULT NULL,
  `aktivitas_up2k` int DEFAULT NULL,
  `aktivitas_up2k_lain` varchar(255) DEFAULT NULL,
  `aktivitas_usaha_kesehatan_lingkungan` int DEFAULT NULL,
  `memiliki_tabungan` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `data_keluarga_akumulasi`
--

INSERT INTO `data_keluarga_akumulasi` (`no_kk`, `balita`, `pus`, `wus`, `tiga_buta`, `ibu_hamil`, `ibu_menyusui`, `lansia`, `makanan_pokok`, `makanan_pokok_lain`, `jumlah_keluarga`, `jumlah_keluarga_jumlah`, `sumber_air_keluarga`, `sumber_air_keluarga_lain`, `tempat_sampah_keluarga`, `saluran_air_limbah`, `stiker_p4k`, `kriteria_rumah`, `aktivitas_up2k`, `aktivitas_up2k_lain`, `aktivitas_usaha_kesehatan_lingkungan`, `memiliki_tabungan`) VALUES
('3173010412020005', 1, 2, 1, 1, 0, 1, 1, 1, 'Nasi', 1, 1, 1, 'Sumur', 1, 1, 1, 1, 1, 'Kegiatan A', 1, 1),
('3173010412020005', 2, 1, 2, 0, 1, 0, 2, 2, 'Beras', 1, 1, 2, 'Sumur', 1, 1, 0, 1, 2, 'Kegiatan B', 0, 1),
('33456', 0, 1, 1, 0, 0, 1, 0, 1, 'Jagung', 0, 0, 1, 'Air PAM', 1, 1, 1, 0, 1, 'Kegiatan C', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `data_penduduk`
--

CREATE TABLE `data_penduduk` (
  `id` int NOT NULL,
  `no_kk` varchar(255) DEFAULT NULL,
  `no_ktp` varchar(255) DEFAULT NULL,
  `nama_lengkap` varchar(255) DEFAULT NULL,
  `jenis_kelamin` enum('L','P') DEFAULT NULL,
  `tempat_lahir` varchar(255) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `shdk` int DEFAULT NULL,
  `status_kawin` int DEFAULT NULL,
  `pendidikan` int DEFAULT NULL,
  `pekerjaan` int DEFAULT NULL,
  `difabel` int DEFAULT NULL,
  `keg_pancasila` int DEFAULT NULL,
  `keg_gotong_royong` int DEFAULT NULL,
  `keg_pendidikan` int DEFAULT NULL,
  `keg_koperasi` int DEFAULT NULL,
  `keg_pangan` int DEFAULT NULL,
  `keg_sandang` int DEFAULT NULL,
  `keg_kesehatan` int DEFAULT NULL,
  `keg_perencanaan_sehat` int DEFAULT NULL,
  `keterangan` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `data_penduduk`
--

INSERT INTO `data_penduduk` (`id`, `no_kk`, `no_ktp`, `nama_lengkap`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `shdk`, `status_kawin`, `pendidikan`, `pekerjaan`, `difabel`, `keg_pancasila`, `keg_gotong_royong`, `keg_pendidikan`, `keg_koperasi`, `keg_pangan`, `keg_sandang`, `keg_kesehatan`, `keg_perencanaan_sehat`, `keterangan`) VALUES
(9, '12345', '54321', 'Roma Dhoni', 'L', 'Jakarta', '2024-10-17', 1, 1, 1, 1, 0, 0, 0, -1, 0, 0, 0, 0, 0, 'TES'),
(10, '12345', '54321', 'Roma Dhoni', 'L', 'Jakarta', '2024-10-17', 1, 1, 1, 1, 0, 0, 0, -1, 0, 0, 0, 0, 0, 'TES'),
(11, '12345', '54321', 'Roma Dhoni', 'L', 'Jakarta', '2024-10-17', 1, 1, 1, 1, 0, 0, 0, -1, 0, 0, 0, 0, 0, 'TES'),
(12, '1111', '3173010412020089', 'Roma Dhoni', 'L', 'Jakarta', '2024-10-30', 2, 2, 4, 9, 0, 0, 0, -1, 0, 0, 0, 0, 0, 'ANJAY'),
(14, '1111', '120292078', 'Roma Dhoni TES FIKS', 'P', 'Jakarta', '2024-10-03', 1, 1, 1, 2, 0, 1, 0, 1, 1, 0, 1, 1, 1, 'TES COBA'),
(25, '321', '81281', 'Roma Dhoni', 'L', 'Jakarta', '2024-10-23', 3, 2, 10, 8, 1, 1, 1, 1, 1, 1, 1, 1, 1, 'TES ANJAY'),
(26, '1111', '31730104120200890', 'Roma Dhoni', 'L', 'Jakarta', '2002-12-04', 1, 1, 8, 7, 0, 0, 1, 0, 1, 0, 1, 1, 0, 'Tes'),
(27, '3173010412020005', '3173301041202001', 'Roma Dhoni', 'P', 'Jakarta', '2024-10-21', 1, 2, 8, 8, 0, 1, 0, 1, 0, 1, 0, 1, 0, 'IYA'),
(28, '3173010412020005', '3173301041202002', 'Roma Dhoni', 'L', 'Jakarta', '2024-10-16', 5, 1, 8, 9, 1, 0, 1, 0, 1, 0, 1, 0, 1, 'TIDAK'),
(29, '3173010412020007', '3173301041202002', 'Roma Dhoni', 'L', 'Jakarta', '2024-10-21', 1, 2, 5, 4, 0, 1, 0, 1, 0, 1, 0, 1, 0, 'TES KETERANGAN'),
(30, '3173010412020007', '3173010412020009', 'Roma Dhoni', 'L', 'Jakarta', '2024-10-21', 1, 2, 2, 2, 0, 1, 0, 1, 0, 1, 1, 0, 1, 'TES');

-- --------------------------------------------------------

--
-- Table structure for table `dawis`
--

CREATE TABLE `dawis` (
  `id` int NOT NULL,
  `nama_dawis` varchar(255) DEFAULT NULL,
  `rt` int DEFAULT NULL,
  `rw` int DEFAULT NULL,
  `dusun` varchar(255) DEFAULT NULL,
  `no_kel` int DEFAULT NULL,
  `no_kec` int DEFAULT NULL,
  `no_kab` int DEFAULT NULL,
  `no_prop` int DEFAULT NULL,
  `tahun` year DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `dawis`
--

INSERT INTO `dawis` (`id`, `nama_dawis`, `rt`, `rw`, `dusun`, `no_kel`, `no_kec`, `no_kab`, `no_prop`, `tahun`) VALUES
(22, 'DASA WISMA KARIMUN', 1, 2, 'DUSUN KARIMUN', 2001, 5, 20, 33, 2024),
(23, 'DASA WISMA KARIMUN PARANG', 1, 1, 'DUSUN KARIMUN PARANG', 2001, 10, 20, 33, 2024),
(27, 'dasa wisma tes', 1, 1, 'DUSUN KARIMUN PARANG', 2001, 14, 20, 33, 2023),
(28, 'Bungar Anggrek', 1, 1, 'Mana aja', 2002, 2, 20, 33, 2001),
(30, 'DASA WISMA KARIMUN ANJAY', 1, 2, 'DUSUN KARIMUN JAYA ANJAY', 2014, 12, 20, 33, 2024),
(32, 'DASA WISMA KARIMUN ANJAY 2', 2, 1, 'DUSUN KARIMUN ANJAY 2', 2006, 12, 20, 33, 2001),
(33, 'DASA WISMA KARIMUN ANJAY 3', 2, 1, 'DUSUN KARIMUN ANJAY 3', 2001, 10, 20, 33, 2001),
(34, 'DASA WISMA KARIMUN ANJAY 4', 2, 1, 'DUSUN KARIMUN ANJAY 5', 2002, 4, 20, 33, 2001),
(36, 'Dasa Wisma Tes 1', 1, 2, 'Dusun Jebol', 2007, 4, 20, 33, 2024);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kab`
--

CREATE TABLE `kab` (
  `no_kab` int NOT NULL,
  `nama_kab` varchar(255) DEFAULT NULL,
  `no_prop` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `kab`
--

INSERT INTO `kab` (`no_kab`, `nama_kab`, `no_prop`) VALUES
(20, 'JEPARA', 33);

-- --------------------------------------------------------

--
-- Table structure for table `kec`
--

CREATE TABLE `kec` (
  `no_kec` int NOT NULL,
  `nama_kec` varchar(255) DEFAULT NULL,
  `no_kab` int DEFAULT NULL,
  `no_prop` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `kec`
--

INSERT INTO `kec` (`no_kec`, `nama_kec`, `no_kab`, `no_prop`) VALUES
(1, 'KEDUNG', 20, 33),
(2, 'PECANGAAN', 20, 33),
(3, 'WELAHAN', 20, 33),
(4, 'MAYONG', 20, 33),
(5, 'BATEALIT', 20, 33),
(6, 'JEPARA', 20, 33),
(7, 'MLONGGO', 20, 33),
(8, 'BANGSRI', 20, 33),
(9, 'KELING', 20, 33),
(10, 'KARIMUNJAWA', 20, 33),
(11, 'TAHUNAN', 20, 33),
(12, 'NALUMSARI', 20, 33),
(13, 'KALINYAMATAN', 20, 33),
(14, 'KEMBANG', 20, 33),
(15, 'PAKISAJI', 20, 33),
(16, 'DONOROJO', 20, 33);

-- --------------------------------------------------------

--
-- Table structure for table `kel`
--

CREATE TABLE `kel` (
  `no_kel` int NOT NULL,
  `nama_kel` varchar(255) DEFAULT NULL,
  `no_kec` int NOT NULL,
  `no_kab` int NOT NULL,
  `no_prop` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `kel`
--

INSERT INTO `kel` (`no_kel`, `nama_kel`, `no_kec`, `no_kab`, `no_prop`) VALUES
(1001, 'KARANGKEBAGUSAN', 6, 20, 33),
(1002, 'DEMAAN', 6, 20, 33),
(1003, 'POTROYUDAN', 6, 20, 33),
(1004, 'BAPANGAN', 6, 20, 33),
(1005, 'SARIPAN', 6, 20, 33),
(1006, 'PANGGANG', 6, 20, 33),
(1007, 'KAUMAN', 6, 20, 33),
(1008, 'BULU', 6, 20, 33),
(1009, 'JOBOKUTO', 6, 20, 33),
(1010, 'UJUNGBATU', 6, 20, 33),
(1011, 'PENGKOL', 6, 20, 33),
(2001, 'KEDUNGMALANG', 1, 20, 33),
(2001, 'KALIOMBO', 2, 20, 33),
(2001, 'UJUNG PANDAN', 3, 20, 33),
(2001, 'MAYONG LOR', 4, 20, 33),
(2001, 'GENENG', 5, 20, 33),
(2001, 'MOROREJO', 7, 20, 33),
(2001, 'GUYANGAN', 8, 20, 33),
(2001, 'TEMPUR', 9, 20, 33),
(2001, 'KARIMUNJAWA', 10, 20, 33),
(2001, 'NGABUL', 11, 20, 33),
(2001, 'BLIMBINGREJO', 12, 20, 33),
(2001, 'BATUKALI', 13, 20, 33),
(2001, 'DUDAKAWU', 14, 20, 33),
(2001, 'LEBAK', 15, 20, 33),
(2001, 'SUMBERREJO', 16, 20, 33),
(2002, 'KALIANYAR', 1, 20, 33),
(2002, 'KARANGRANDU', 2, 20, 33),
(2002, 'KARANGANYAR', 3, 20, 33),
(2002, 'TIGOJURU', 4, 20, 33),
(2002, 'RAGUKLAMPITAN', 5, 20, 33),
(2002, 'KEPUK', 8, 20, 33),
(2002, 'DAMARWULAN', 9, 20, 33),
(2002, 'KEMUJAN', 10, 20, 33),
(2002, 'LANGON', 11, 20, 33),
(2002, 'TUNGGULPANDEAN', 12, 20, 33),
(2002, 'BANDUNGREJO', 13, 20, 33),
(2002, 'SUMANDING', 14, 20, 33),
(2002, 'BULUNGAN', 15, 20, 33),
(2002, 'CLERING', 16, 20, 33),
(2003, 'KARANGAJI', 1, 20, 33),
(2003, 'GERDU', 2, 20, 33),
(2003, 'GUWOSOBOKERTO', 3, 20, 33),
(2003, 'PAREN', 4, 20, 33),
(2003, 'NGASEM', 5, 20, 33),
(2003, 'PAPASAN', 8, 20, 33),
(2003, 'KUNIR', 9, 20, 33),
(2003, 'PARANG', 10, 20, 33),
(2003, 'SUKODONO', 11, 20, 33),
(2003, 'PRINGTULIS', 12, 20, 33),
(2003, 'BANYUPUTIH', 13, 20, 33),
(2003, 'BUCU', 14, 20, 33),
(2003, 'SUWAWAL TIMUR', 15, 20, 33),
(2003, 'UJUNGWATU', 16, 20, 33),
(2004, 'TEDUNAN', 1, 20, 33),
(2004, 'PECANGAAN KULON', 2, 20, 33),
(2004, 'KEDUNGSARIMULYO', 3, 20, 33),
(2004, 'KUANYAR', 4, 20, 33),
(2004, 'BAWU', 5, 20, 33),
(2004, 'SRIKANDANG', 8, 20, 33),
(2004, 'WATUAJI', 9, 20, 33),
(2004, 'NYAMUK', 10, 20, 33),
(2004, 'PETEKEYAN', 11, 20, 33),
(2004, 'JATISARI', 12, 20, 33),
(2004, 'PENDOSAWALAN', 13, 20, 33),
(2004, 'CEPOGO', 14, 20, 33),
(2004, 'KAWAK', 15, 20, 33),
(2004, 'BANYUMANIS', 16, 20, 33),
(2005, 'SOWAN LOR', 1, 20, 33),
(2005, 'RENGGING', 2, 20, 33),
(2005, 'BUGO', 3, 20, 33),
(2005, 'PELANG', 4, 20, 33),
(2005, 'MINDAHAN', 5, 20, 33),
(2005, 'TENGGULI', 8, 20, 33),
(2005, 'KLEPU', 9, 20, 33),
(2005, 'MANGUNAN', 11, 20, 33),
(2005, 'GEMIRING KIDUL', 12, 20, 33),
(2005, 'DAMARJATI', 13, 20, 33),
(2005, 'PENDEM', 14, 20, 33),
(2005, 'TANJUNG', 15, 20, 33),
(2005, 'TULAKAN', 16, 20, 33),
(2006, 'SOWAN KIDUL', 1, 20, 33),
(2006, 'TROSO', 2, 20, 33),
(2006, 'WELAHAN', 3, 20, 33),
(2006, 'SENGONBUGEL', 4, 20, 33),
(2006, 'SOMOSARI', 5, 20, 33),
(2006, 'BANGSRI', 8, 20, 33),
(2006, 'TUNAHAN', 9, 20, 33),
(2006, 'PLATAR', 11, 20, 33),
(2006, 'GEMIRING LOR', 12, 20, 33),
(2006, 'PURWOGONDO', 13, 20, 33),
(2006, 'JINGGOTAN', 14, 20, 33),
(2006, 'PLAJAN', 15, 20, 33),
(2006, 'BANDUNGHARJO', 16, 20, 33),
(2007, 'WANUSOBO', 1, 20, 33),
(2007, 'NGELING', 2, 20, 33),
(2007, 'GEDANGAN', 3, 20, 33),
(2007, 'JEBOL', 4, 20, 33),
(2007, 'BATEALIT', 5, 20, 33),
(2007, 'BANJARAN', 8, 20, 33),
(2007, 'KALIGARANG', 9, 20, 33),
(2007, 'SEMAT', 11, 20, 33),
(2007, 'NALUMSARI', 12, 20, 33),
(2007, 'MARGOYOSO', 13, 20, 33),
(2007, 'DERMOLO', 14, 20, 33),
(2007, 'SLAGI', 15, 20, 33),
(2007, 'BLINGOH', 16, 20, 33),
(2008, 'SURODADI', 1, 20, 33),
(2008, 'PULODARAT', 2, 20, 33),
(2008, 'KETILENGSINGOLELO', 3, 20, 33),
(2008, 'SINGOROJO', 4, 20, 33),
(2008, 'BRINGIN', 5, 20, 33),
(2008, 'WEDELAN', 8, 20, 33),
(2008, 'KELING', 9, 20, 33),
(2008, 'TELUKAWUR', 11, 20, 33),
(2008, 'TRITIS', 12, 20, 33),
(2008, 'SENDANG', 13, 20, 33),
(2008, 'KALIAMAN', 14, 20, 33),
(2008, 'MAMBAK', 15, 20, 33),
(2008, 'JUGO', 16, 20, 33),
(2009, 'PANGGUNG', 1, 20, 33),
(2009, 'LEBUAWU', 2, 20, 33),
(2009, 'KALIPUCANG WETAN', 3, 20, 33),
(2009, 'PELEMKEREP', 4, 20, 33),
(2009, 'BANTRUNG', 5, 20, 33),
(2009, 'SUWAWAL', 7, 20, 33),
(2009, 'KEDUNGLEPER', 8, 20, 33),
(2009, 'GELANG', 9, 20, 33),
(2009, 'DEMANGAN', 11, 20, 33),
(2009, 'DAREN', 12, 20, 33),
(2009, 'KRIYAN', 13, 20, 33),
(2009, 'TUBANAN', 14, 20, 33),
(2010, 'BULAK BARU', 1, 20, 33),
(2010, 'GEMULUNG', 2, 20, 33),
(2010, 'KALIPUCANG KULON', 3, 20, 33),
(2010, 'BUARAN', 4, 20, 33),
(2010, 'PEKALONGAN', 5, 20, 33),
(2010, 'SINANGGUL', 7, 20, 33),
(2010, 'JERUKWANGI', 8, 20, 33),
(2010, 'JLEGONG', 9, 20, 33),
(2010, 'TEGALSAMBI', 11, 20, 33),
(2010, 'KARANGNONGKO', 12, 20, 33),
(2010, 'ROBAYAN', 13, 20, 33),
(2010, 'BALONG', 14, 20, 33),
(2011, 'JONDANG', 1, 20, 33),
(2011, 'PECANGAAN WETAN', 2, 20, 33),
(2011, 'GIDANGLELO', 3, 20, 33),
(2011, 'NGROTO', 4, 20, 33),
(2011, 'MINDAHAN KIDUL', 5, 20, 33),
(2011, 'JAMBU', 7, 20, 33),
(2011, 'BONDO', 8, 20, 33),
(2011, 'KELET', 9, 20, 33),
(2011, 'MANTINGAN', 11, 20, 33),
(2011, 'NGETUK', 12, 20, 33),
(2011, 'BAKALAN', 13, 20, 33),
(2011, 'KANCILAN', 14, 20, 33),
(2012, 'BUGEL', 1, 20, 33),
(2012, 'KRASAK', 2, 20, 33),
(2012, 'KENDENGSIDIALIT', 3, 20, 33),
(2012, 'RAJEKWESI', 4, 20, 33),
(2012, 'MULYOHARJO', 6, 20, 33),
(2012, 'SROBYONG', 7, 20, 33),
(2012, 'BANJARAGUNG', 8, 20, 33),
(2012, 'TAHUNAN', 11, 20, 33),
(2012, 'BEDANPETE', 12, 20, 33),
(2012, 'MANYARGADING', 13, 20, 33),
(2013, 'DONGOS', 1, 20, 33),
(2013, 'SIDIGEDE', 3, 20, 33),
(2013, 'DATAR', 4, 20, 33),
(2013, 'WONOREJO', 6, 20, 33),
(2013, 'SEKURO', 7, 20, 33),
(2013, 'KECAPI', 11, 20, 33),
(2013, 'MURYOLOBO', 12, 20, 33),
(2014, 'MENGANTI', 1, 20, 33),
(2014, 'TELUK WETAN', 3, 20, 33),
(2014, 'PULE', 4, 20, 33),
(2014, 'KEDUNGCINO', 6, 20, 33),
(2014, 'KARANGGONDANG', 7, 20, 33),
(2014, 'SENENAN', 11, 20, 33),
(2014, 'BATEGEDE', 12, 20, 33),
(2015, 'KERSO', 1, 20, 33),
(2015, 'BRANTAK SEKARJATI', 3, 20, 33),
(2015, 'BANDUNG', 4, 20, 33),
(2015, 'KUWASEN', 6, 20, 33),
(2015, 'JAMBU TIMUR', 7, 20, 33),
(2015, 'KRAPYAK', 11, 20, 33),
(2015, 'DORANG', 12, 20, 33),
(2016, 'TANGGUL TLARE', 1, 20, 33),
(2016, 'BUNGU', 4, 20, 33),
(2016, 'BANDENGAN', 6, 20, 33),
(2017, 'RAU', 1, 20, 33),
(2017, 'PANCUR', 4, 20, 33),
(2018, 'SUKOSONO', 1, 20, 33),
(2018, 'MAYONG KIDUL', 4, 20, 33),
(2020, 'BUMIHARJO', 9, 20, 33);

-- --------------------------------------------------------

--
-- Table structure for table `kepala_rumah_tangga`
--

CREATE TABLE `kepala_rumah_tangga` (
  `id` int NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `dawis_id` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `kepala_rumah_tangga`
--

INSERT INTO `kepala_rumah_tangga` (`id`, `nama`, `dawis_id`, `created_at`, `updated_at`) VALUES
(2, 'Dhoni Roma', 22, '2024-10-01 04:32:34', '2024-10-01 04:53:26'),
(3, 'Roma Dhoni', 23, '2024-10-01 04:50:53', '2024-10-01 04:50:53'),
(4, 'Roma Dhoni Karimun 4', 34, '2024-10-12 10:15:49', '2024-10-12 10:15:49'),
(5, 'Roma Dhoni Anjay 4', 34, '2024-10-16 03:23:59', '2024-10-16 03:23:59'),
(6, 'Roma Dhoni', 36, '2024-10-21 07:38:07', '2024-10-21 07:38:07');

-- --------------------------------------------------------

--
-- Table structure for table `layouts`
--

CREATE TABLE `layouts` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `css_properties` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `layouts`
--

INSERT INTO `layouts` (`id`, `name`, `css_properties`, `created_at`, `updated_at`) VALUES
(1, 'Sample Layout', 'display: flex; align-items: center; border: 1px solid #e0e0e0; border-radius: 12px; padding: 20px; background-color: #ffffff; margin: 10px 0; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1); max-width: 600px; margin: 20px auto; transition: transform 0.3s, box-shadow 0.3s;', '2024-09-18 06:52:02', '2024-09-18 06:52:02');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_08_28_064043_add_last_name_to_users_table', 2),
(5, '2024_08_30_012530_add_profile_image_to_users_table', 2),
(6, '2024_09_04_030605_add_role_to_users_table', 3),
(7, '2024_09_05_010046_create_permission_tables', 4),
(8, '2024_09_09_172416_create_activity_logs_table', 5),
(10, '2024_09_12_114744_add_profile_photo_to_users_table', 6),
(11, '2024_09_13_173214_create_notifications_table', 7),
(12, '2024_09_13_190659_create_messages_table', 8),
(13, '2024_09_13_193239_create_programs_table', 9),
(14, '2024_09_14_132042_create_messages_table', 10),
(15, '2024_09_14_161523_create_blogs_table', 11),
(16, '2024_09_15_060802_create_services_table', 12),
(17, '2024_09_15_174513_create_services_table', 13),
(18, '2024_09_15_192230_add_catalog_files_to_services_table', 14),
(19, '2024_09_15_222245_create_portofolios_table', 15),
(20, '2024_09_15_222312_create_portofolio_images_table', 15),
(21, '2024_09_16_073707_add_image_to_portofolios_table', 16),
(22, '2024_09_16_105542_create_abouts_table', 17),
(23, '2024_09_18_110012_add_user_id_to_services_table', 18),
(24, '2024_09_18_133502_create_layouts_table', 19),
(25, '2024_09_18_135827_create_clients_table', 20),
(26, '2024_09_19_075358_add_link_to_clients_table', 21),
(27, '2024_09_23_105909_create_props_table', 22),
(28, '2024_09_23_105919_create_kabs_table', 22),
(29, '2024_09_23_105927_create_kecs_table', 22),
(30, '2024_09_23_105942_create_kels_table', 22),
(31, '2024_09_23_105950_create_dawis_table', 22),
(32, '2024_09_23_105957_create_kepala_rumah_tangga_table', 23),
(33, '2024_09_23_110013_create_data_keluarga_table', 24),
(34, '2024_09_23_110020_create_data_keluarga_akumulasi_table', 24),
(35, '2024_09_23_110026_create_ref_shdk_table', 24),
(36, '2024_09_23_110032_create_ref_perkawinan_table', 24),
(37, '2024_09_23_110038_create_ref_pendidikan_table', 24),
(38, '2024_09_23_110044_create_ref_pekerjaan_table', 24),
(39, '2024_09_23_131207_create_data_penduduk_table', 25),
(40, '2024_09_27_092701_add_user_id_to_dawis_table', 26),
(41, '2024_10_01_090759_add_timestamps_to_kepala_rumah_tangga_table', 27),
(42, '2024_10_18_091145_rename_id_penduduk_to_id_in_data_penduduk_table', 28);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 11),
(2, 'App\\Models\\User', 13),
(2, 'App\\Models\\User', 15),
(2, 'App\\Models\\User', 17),
(2, 'App\\Models\\User', 19);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` bigint UNSIGNED NOT NULL,
  `type` varchar(255) NOT NULL,
  `notifiable_type` varchar(191) NOT NULL,
  `notifiable_id` bigint UNSIGNED NOT NULL,
  `data` text NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('anam1@gmail.com', '$2y$12$HosPe8LvcEt8j4rYkhgEX.Ms47EowIqMlV12.WlvG1RpLuPlo6p1C', '2024-09-05 20:55:45'),
('dhoniroma676@gmail.com', '$2y$12$BtfTWgZ8VKT.nLYRXt96YOX3AhSdDH6PVX.EIDf.UKecbJ7jAlXp2', '2024-09-03 20:33:02'),
('sayagans0412@gmail.com', '$2y$12$YJRlVrGiLJOTtRDn/35AcODGso2ee0dlPnfpvE2NfgT/Ogh0O0906', '2024-09-22 10:15:29');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `portofolios`
--

CREATE TABLE `portofolios` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `category` varchar(255) NOT NULL,
  `client` varchar(255) NOT NULL,
  `project_date` date NOT NULL,
  `project_url` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `portofolios`
--

INSERT INTO `portofolios` (`id`, `title`, `description`, `category`, `client`, `project_date`, `project_url`, `created_at`, `updated_at`, `image`) VALUES
(3, 'Kegiatan Adat Kebudayaan Sedekah Bumi dan Bazar Umkm Tahun 2024', 'Kegiatan Adat Kebudayaan Sedekah Bumi dan Bazar Umkm Tahun 2024 Pada Desa Singorojo Mayong Jepara', 'Kegiatan Adat', 'Desa Singorojo', '2024-09-17', 'http://singorojo.desa.id/', '2024-09-16 20:10:30', '2024-09-16 20:10:30', NULL),
(6, 'Musyawarah Desa', 'Penetapan dan Penyepakatan Perubahan RPJMDes Periode 2019 - 2024', 'Mudes', 'Desa Kawak', '2024-09-05', 'http://kawak.desa.id/', '2024-09-21 18:21:09', '2024-09-21 19:06:30', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `portofolio_images`
--

CREATE TABLE `portofolio_images` (
  `id` bigint UNSIGNED NOT NULL,
  `portofolio_id` bigint UNSIGNED NOT NULL,
  `image_url` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `portofolio_images`
--

INSERT INTO `portofolio_images` (`id`, `portofolio_id`, `image_url`, `created_at`, `updated_at`) VALUES
(3, 3, 'portfolios/3OJdQzEC5Pa9ktrbah6UoEuSQQx9hR8uLvk94WYa.jpg', '2024-09-16 20:10:30', '2024-09-16 20:10:30'),
(19, 6, 'portfolios/iD3g6T2mTgufjmn8YCg92YLxZDwe36fB2EQxRyNS.jpg', '2024-09-21 19:06:30', '2024-09-21 19:06:30'),
(20, 6, 'portfolios/es8VXqc4JGhaT1IiPFfsXbCLCDzgKKj7UO3WxpRF.jpg', '2024-09-21 19:06:30', '2024-09-21 19:06:30');

-- --------------------------------------------------------

--
-- Table structure for table `programs`
--

CREATE TABLE `programs` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `prop`
--

CREATE TABLE `prop` (
  `no_prop` int NOT NULL,
  `nama_prop` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `prop`
--

INSERT INTO `prop` (`no_prop`, `nama_prop`) VALUES
(33, 'JAWA TENGAH');

-- --------------------------------------------------------

--
-- Table structure for table `ref_pekerjaan`
--

CREATE TABLE `ref_pekerjaan` (
  `id` int NOT NULL,
  `nama` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `ref_pekerjaan`
--

INSERT INTO `ref_pekerjaan` (`id`, `nama`) VALUES
(1, 'Tidak Bekerja'),
(2, 'Petani'),
(3, 'Buruh Tani'),
(4, 'Nelayan'),
(5, 'Pedagang'),
(6, 'Karyawan Swasta'),
(7, 'PNS/ASN'),
(8, 'TNI/Polri'),
(9, 'Guru/Dosen'),
(10, 'Pelajar/Mahasiswa'),
(11, 'Wiraswasta'),
(12, 'Ibu Rumah Tangga'),
(13, 'Pensiunan'),
(14, 'Lainnya');

-- --------------------------------------------------------

--
-- Table structure for table `ref_pendidikan`
--

CREATE TABLE `ref_pendidikan` (
  `id` int NOT NULL,
  `nama` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `ref_pendidikan`
--

INSERT INTO `ref_pendidikan` (`id`, `nama`) VALUES
(1, 'Tidak/Belum Sekolah'),
(2, 'Tidak Tamat SD'),
(3, 'SD/MI/Sederajat'),
(4, 'SMP/MTs/Sederajat'),
(5, 'SMA/MA/SMK/Sederajat'),
(6, 'Diploma I/II'),
(7, 'Diploma III/Sarjana Muda'),
(8, 'Sarjana (S1/D4)'),
(9, 'Magister (S2)'),
(10, 'Doktor (S3)');

-- --------------------------------------------------------

--
-- Table structure for table `ref_perkawinan`
--

CREATE TABLE `ref_perkawinan` (
  `id` int NOT NULL,
  `status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `ref_perkawinan`
--

INSERT INTO `ref_perkawinan` (`id`, `status`) VALUES
(1, 'Belum Kawin'),
(2, 'Kawin'),
(3, 'Cerai Hidup'),
(4, 'Cerai Mati');

-- --------------------------------------------------------

--
-- Table structure for table `ref_shdk`
--

CREATE TABLE `ref_shdk` (
  `id` int NOT NULL,
  `nama_shdk` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `ref_shdk`
--

INSERT INTO `ref_shdk` (`id`, `nama_shdk`) VALUES
(1, 'Kepala Keluarga'),
(2, 'Istri'),
(3, 'Suami'),
(4, 'Anak'),
(5, 'Kerabat'),
(6, 'Orang Tua'),
(7, 'Menantu'),
(8, 'Cucu');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'superadmin', 'web', '2024-09-04 18:07:38', '2024-09-04 18:07:38'),
(2, 'Administrator', 'web', '2024-09-07 18:22:52', '2024-09-07 18:22:52'),
(3, 'User', 'web', '2024-09-09 08:24:34', '2024-09-09 08:24:34');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `catalog_pdf` varchar(255) DEFAULT NULL,
  `catalog_doc` varchar(255) DEFAULT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `title`, `description`, `image`, `created_at`, `updated_at`, `catalog_pdf`, `catalog_doc`, `user_id`) VALUES
(1, 'Program Pemberdayaan Perempuan', 'Dasa Wisma Kabupaten Jepara fokus pada pemberdayaan perempuan untuk meningkatkan kesejahteraan keluarga melalui berbagai program keterampilan dan pendidikan.\r\n\r\n    1. Meningkatkan keterampilan perempuan untuk berperan aktif dalam usaha keluarga.\r\n\r\n    2. Mendukung ekonomi keluarga melalui program kewirausahaan.\r\n\r\n    3. Pelatihan usaha kecil menengah untuk meningkatkan pendapatan keluarga.\r\n\r\nsekian terimakasih', 'services/6HkT2F0qoYIAO5HPahc5gKS6MvepCbBdnfXztuf0.jpg', '2024-09-15 10:45:52', '2024-09-18 04:17:50', 'catalogs/cUHsKx0MTUqipJZfOucA1ugQgqPbMT8xh6eRzPMK.pdf', 'catalogs/BqpKy0oCaSTsGYLFTWchj4P0Wgmwij2GEEqMKicu.docx', 1),
(2, 'Program Kesehatan Keluarga', 'Kesehatan keluarga adalah prioritas kami. Program kami mendukung kesehatan ibu dan anak, serta pencegahan stunting di Kabupaten Jepara.\r\n\r\n Melalui program kesehatan, Dasa Wisma mendukung upaya pencegahan stunting dan peningkatan kesehatan ibu dan anak di Kabupaten Jepara.\r\n\r\nProgram ini bertujuan untuk meningkatkan kualitas hidup keluarga dengan fokus pada gizi yang baik, pemeriksaan kesehatan rutin, dan edukasi kesehatan bagi ibu dan anak.', 'services/E257ednuPCtlajgl0lAcfKl6xpjBIwtasPhkqemo.jpg', '2024-09-15 12:09:38', '2024-09-18 04:24:16', NULL, NULL, 1),
(3, 'Pendidikan Anak Usia Dini', 'Program ini bertujuan memberikan pendidikan usia dini berkualitas kepada anak-anak di Kabupaten Jepara agar mereka tumbuh cerdas dan berkepribadian mandiri.\r\n\r\n    1. Fasilitasi pendidikan anak usia dini melalui kelompok bermain dan PAUD.\r\n\r\n    2. Peningkatan kualitas pendidikan melalui pelatihan guru dan penyediaan fasilitas.\r\n\r\n    3. Program pemberian gizi seimbang untuk mendukung tumbuh kembang anak.\r\n\r\nMelalui program pendidikan anak usia dini, kami berupaya membentuk generasi yang cerdas dan berkualitas di Kabupaten Jepara.', 'services/5ZcvLmP3PzhIZ8GuDswTyA8BodqwE7WNFH7XgBzu.jpg', '2024-09-15 12:12:11', '2024-09-18 04:24:21', NULL, NULL, 1),
(4, 'Pengembangan Ekonomi Keluarga', 'Melalui program ekonomi kreatif, Dasa Wisma Kabupaten Jepara membantu keluarga mengembangkan usaha kecil dan menengah untuk meningkatkan kesejahteraan ekonomi.\r\n \r\nDasa Wisma Kabupaten Jepara turut mendukung pengembangan ekonomi kreatif sebagai salah satu cara meningkatkan pendapatan keluarga.\r\n\r\nProgram ini melibatkan pelatihan keterampilan seperti kerajinan tangan, kuliner, dan produk lokal lainnya untuk membantu keluarga menciptakan peluang usaha baru.', 'services/vXC502db3rgLzhZaMGBj7cMyqrhOsVEGnf2o5iFs.jpg', '2024-09-15 12:13:31', '2024-09-17 02:38:04', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text,
  `payload` longtext NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `profile_photo` varchar(255) DEFAULT NULL,
  `profile_image` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `last_name`, `email`, `profile_photo`, `profile_image`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role`) VALUES
(1, 'Super Admin', 'Roma Dhoni', 'dhoniroma676@gmail.com', '1726228556.jpg', NULL, NULL, '$2y$12$HucBAG8DxQwQFCcBccEnnuXeb2PaO9gow7VrF52NnPWt1Z5QXogPO', NULL, '2024-09-04 03:20:18', '2024-09-23 02:36:29', 'superadmin'),
(4, 'Doni', 'Ganteng', 'sayagans0412@gmail.com', NULL, NULL, NULL, '$2y$12$HucBAG8DxQwQFCcBccEnnuXeb2PaO9gow7VrF52NnPWt1Z5QXogPO', NULL, '2024-09-04 18:39:03', '2024-09-07 12:44:24', 'administrator'),
(11, 'endah', 'santoso', 'tes@gmail.com', NULL, NULL, NULL, '$2y$12$CmhcKwmzQdKRglEysaGoyOSIBcvhc.8gir0fo6hDzHvzfrlwCmtu6', NULL, '2024-09-09 08:20:55', '2024-09-09 08:49:17', 'user'),
(13, 'Roma', 'Dhoni', 'sindidoniaja@gmail.com', NULL, NULL, NULL, '$2y$12$l.PnHXMEmB3BxHOEzvLP4evv3JFVoRGLVhQFQzaGSjof0RGA4frAS', 'wuYniYHMAq7LomVb7dH5RdscVuLQ0wjMMK4rgme33ojhyhnVHPaEcv9PL1xG', '2024-09-09 08:39:29', '2024-09-22 10:13:52', 'administrator'),
(15, 'doni', 'ganteng', 'anjay@gmail.com', NULL, NULL, NULL, '$2y$12$6mW7HxZHMzb0BXU56nSSeOIX1ArnDQGI9v0h2JUKJTHAcJFMFa2Ua', NULL, '2024-09-09 18:14:15', '2024-09-09 18:14:15', 'administrator'),
(17, 'Roma', 'Dhoni', 'tesadmin@gmail.com', NULL, NULL, NULL, '$2y$12$X4bbTNXkGKIcdFGFuRtTZOKmlExo2HkdgZ9TdJMhLgHKpKSp2VC2W', NULL, '2024-09-10 00:45:43', '2024-09-10 00:45:43', 'administrator'),
(19, 'administrator', 'doni', 'adminaja@gmail.com', NULL, NULL, NULL, '$2y$12$AEWXonCg0jldPMAbAxHPse9VpQIEzM3xI0reDZrjbi.7JRRDqVOgW', NULL, '2024-09-10 02:43:53', '2024-09-10 02:43:53', 'administrator'),
(22, 'Roma', 'Dhoni', 'user@gmail.com', NULL, NULL, NULL, '$2y$12$rxjg7EAq9IFMj8u9WiRtcusKHzncQhXlahB/.xQIds34j0KK8Q7IO', NULL, '2024-09-14 08:25:01', '2024-09-14 08:25:01', 'user'),
(23, 'siapaa', 'yaaaa', 'tanya@gmail.com', NULL, NULL, NULL, '$2y$12$.MjfrQcbQ2/eV9Yty7zr6.Jv8neNQQPJ8JZI/HlXPhFH/SBjkCKyG', NULL, '2024-09-14 08:28:57', '2024-09-14 08:28:57', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abouts`
--
ALTER TABLE `abouts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `activity_logs`
--
ALTER TABLE `activity_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `activity_logs_user_id_foreign` (`user_id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_keluarga`
--
ALTER TABLE `data_keluarga`
  ADD PRIMARY KEY (`no_kk`),
  ADD KEY `dawis_id` (`dawis_id`),
  ADD KEY `no_kel` (`no_kel`),
  ADD KEY `no_kec` (`no_kec`),
  ADD KEY `no_kab` (`no_kab`),
  ADD KEY `no_prop` (`no_prop`),
  ADD KEY `kepala_rumah_tangga_id` (`kepala_rumah_tangga_id`);

--
-- Indexes for table `data_keluarga_akumulasi`
--
ALTER TABLE `data_keluarga_akumulasi`
  ADD KEY `data_keluarga_akumulasi_ibfk_1` (`no_kk`);

--
-- Indexes for table `data_penduduk`
--
ALTER TABLE `data_penduduk`
  ADD PRIMARY KEY (`id`),
  ADD KEY `shdk` (`shdk`),
  ADD KEY `status_kawin` (`status_kawin`),
  ADD KEY `pendidikan` (`pendidikan`),
  ADD KEY `pekerjaan` (`pekerjaan`);

--
-- Indexes for table `dawis`
--
ALTER TABLE `dawis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `no_kel` (`no_kel`),
  ADD KEY `no_kec` (`no_kec`),
  ADD KEY `no_kab` (`no_kab`),
  ADD KEY `no_prop` (`no_prop`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kab`
--
ALTER TABLE `kab`
  ADD PRIMARY KEY (`no_kab`),
  ADD KEY `no_prop` (`no_prop`);

--
-- Indexes for table `kec`
--
ALTER TABLE `kec`
  ADD PRIMARY KEY (`no_kec`),
  ADD KEY `no_kab` (`no_kab`),
  ADD KEY `no_prop` (`no_prop`);

--
-- Indexes for table `kel`
--
ALTER TABLE `kel`
  ADD PRIMARY KEY (`no_kel`,`no_kec`,`no_kab`),
  ADD KEY `fk_kel_kec` (`no_kec`),
  ADD KEY `fk_kel_kab` (`no_kab`),
  ADD KEY `fk_kel_prop` (`no_prop`);

--
-- Indexes for table `kepala_rumah_tangga`
--
ALTER TABLE `kepala_rumah_tangga`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dawis_id` (`dawis_id`);

--
-- Indexes for table `layouts`
--
ALTER TABLE `layouts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `portofolios`
--
ALTER TABLE `portofolios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `portofolio_images`
--
ALTER TABLE `portofolio_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `portofolio_images_portofolio_id_foreign` (`portofolio_id`);

--
-- Indexes for table `programs`
--
ALTER TABLE `programs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prop`
--
ALTER TABLE `prop`
  ADD PRIMARY KEY (`no_prop`);

--
-- Indexes for table `ref_pekerjaan`
--
ALTER TABLE `ref_pekerjaan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ref_pendidikan`
--
ALTER TABLE `ref_pendidikan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ref_perkawinan`
--
ALTER TABLE `ref_perkawinan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ref_shdk`
--
ALTER TABLE `ref_shdk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`),
  ADD KEY `services_user_id_foreign` (`user_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `abouts`
--
ALTER TABLE `abouts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `activity_logs`
--
ALTER TABLE `activity_logs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `data_penduduk`
--
ALTER TABLE `data_penduduk`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `dawis`
--
ALTER TABLE `dawis`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kepala_rumah_tangga`
--
ALTER TABLE `kepala_rumah_tangga`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `layouts`
--
ALTER TABLE `layouts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `portofolios`
--
ALTER TABLE `portofolios`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `portofolio_images`
--
ALTER TABLE `portofolio_images`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `programs`
--
ALTER TABLE `programs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ref_pekerjaan`
--
ALTER TABLE `ref_pekerjaan`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `ref_pendidikan`
--
ALTER TABLE `ref_pendidikan`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `ref_perkawinan`
--
ALTER TABLE `ref_perkawinan`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ref_shdk`
--
ALTER TABLE `ref_shdk`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `activity_logs`
--
ALTER TABLE `activity_logs`
  ADD CONSTRAINT `activity_logs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `data_keluarga`
--
ALTER TABLE `data_keluarga`
  ADD CONSTRAINT `data_keluarga_ibfk_1` FOREIGN KEY (`dawis_id`) REFERENCES `dawis` (`id`),
  ADD CONSTRAINT `data_keluarga_ibfk_2` FOREIGN KEY (`no_kel`) REFERENCES `kel` (`no_kel`),
  ADD CONSTRAINT `data_keluarga_ibfk_3` FOREIGN KEY (`no_kec`) REFERENCES `kec` (`no_kec`),
  ADD CONSTRAINT `data_keluarga_ibfk_4` FOREIGN KEY (`no_kab`) REFERENCES `kab` (`no_kab`),
  ADD CONSTRAINT `data_keluarga_ibfk_5` FOREIGN KEY (`no_prop`) REFERENCES `prop` (`no_prop`),
  ADD CONSTRAINT `data_keluarga_ibfk_6` FOREIGN KEY (`kepala_rumah_tangga_id`) REFERENCES `kepala_rumah_tangga` (`id`);

--
-- Constraints for table `data_keluarga_akumulasi`
--
ALTER TABLE `data_keluarga_akumulasi`
  ADD CONSTRAINT `data_keluarga_akumulasi_ibfk_1` FOREIGN KEY (`no_kk`) REFERENCES `data_keluarga` (`no_kk`);

--
-- Constraints for table `data_penduduk`
--
ALTER TABLE `data_penduduk`
  ADD CONSTRAINT `data_penduduk_ibfk_1` FOREIGN KEY (`shdk`) REFERENCES `ref_shdk` (`id`),
  ADD CONSTRAINT `data_penduduk_ibfk_2` FOREIGN KEY (`status_kawin`) REFERENCES `ref_perkawinan` (`id`),
  ADD CONSTRAINT `data_penduduk_ibfk_3` FOREIGN KEY (`pendidikan`) REFERENCES `ref_pendidikan` (`id`),
  ADD CONSTRAINT `data_penduduk_ibfk_4` FOREIGN KEY (`pekerjaan`) REFERENCES `ref_pekerjaan` (`id`);

--
-- Constraints for table `dawis`
--
ALTER TABLE `dawis`
  ADD CONSTRAINT `dawis_ibfk_1` FOREIGN KEY (`no_kel`) REFERENCES `kel` (`no_kel`),
  ADD CONSTRAINT `dawis_ibfk_2` FOREIGN KEY (`no_kec`) REFERENCES `kec` (`no_kec`),
  ADD CONSTRAINT `dawis_ibfk_3` FOREIGN KEY (`no_kab`) REFERENCES `kab` (`no_kab`),
  ADD CONSTRAINT `dawis_ibfk_4` FOREIGN KEY (`no_prop`) REFERENCES `prop` (`no_prop`);

--
-- Constraints for table `kab`
--
ALTER TABLE `kab`
  ADD CONSTRAINT `kab_ibfk_1` FOREIGN KEY (`no_prop`) REFERENCES `prop` (`no_prop`);

--
-- Constraints for table `kec`
--
ALTER TABLE `kec`
  ADD CONSTRAINT `kec_ibfk_1` FOREIGN KEY (`no_kab`) REFERENCES `kab` (`no_kab`),
  ADD CONSTRAINT `kec_ibfk_2` FOREIGN KEY (`no_prop`) REFERENCES `prop` (`no_prop`);

--
-- Constraints for table `kel`
--
ALTER TABLE `kel`
  ADD CONSTRAINT `fk_kel_kab` FOREIGN KEY (`no_kab`) REFERENCES `kab` (`no_kab`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_kel_kec` FOREIGN KEY (`no_kec`) REFERENCES `kec` (`no_kec`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_kel_prop` FOREIGN KEY (`no_prop`) REFERENCES `prop` (`no_prop`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kepala_rumah_tangga`
--
ALTER TABLE `kepala_rumah_tangga`
  ADD CONSTRAINT `kepala_rumah_tangga_ibfk_1` FOREIGN KEY (`dawis_id`) REFERENCES `dawis` (`id`);

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `portofolio_images`
--
ALTER TABLE `portofolio_images`
  ADD CONSTRAINT `portofolio_images_portofolio_id_foreign` FOREIGN KEY (`portofolio_id`) REFERENCES `portofolios` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `services`
--
ALTER TABLE `services`
  ADD CONSTRAINT `services_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
