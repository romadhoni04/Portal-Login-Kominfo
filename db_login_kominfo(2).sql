-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 14, 2024 at 11:05 PM
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
(15, '2024_09_14_161523_create_blogs_table', 11);

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
('sayagans0412@gmail.com', '$2y$12$ZZdbCiDjeKEvP5ETmLRaMumghekLNI/UjbNl33pn9ZRA2S34dx0Ne', '2024-09-05 20:29:59');

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
(1, 'Super Admin', 'Roma Dhoni', 'dhoniroma676@gmail.com', '1726228556.jpg', NULL, NULL, '$2y$12$HucBAG8DxQwQFCcBccEnnuXeb2PaO9gow7VrF52NnPWt1Z5QXogPO', NULL, '2024-09-04 03:20:18', '2024-09-13 11:55:56', 'superadmin'),
(4, 'Doni', 'Ganteng', 'sayagans0412@gmail.com', NULL, NULL, NULL, '$2y$12$HucBAG8DxQwQFCcBccEnnuXeb2PaO9gow7VrF52NnPWt1Z5QXogPO', NULL, '2024-09-04 18:39:03', '2024-09-07 12:44:24', 'administrator'),
(11, 'endah', 'santoso', 'tes@gmail.com', NULL, NULL, NULL, '$2y$12$CmhcKwmzQdKRglEysaGoyOSIBcvhc.8gir0fo6hDzHvzfrlwCmtu6', NULL, '2024-09-09 08:20:55', '2024-09-09 08:49:17', 'user'),
(13, 'Roma', 'Dhoni', 'sindidoniaja@gmail.com', NULL, NULL, NULL, '$2y$12$LAK84VFYoGrp9fnOHmWHteCHvMyCtFfUWqFyuPIYtAPewLZqibCQy', NULL, '2024-09-09 08:39:29', '2024-09-09 08:39:29', 'administrator'),
(15, 'doni', 'ganteng', 'anjay@gmail.com', NULL, NULL, NULL, '$2y$12$6mW7HxZHMzb0BXU56nSSeOIX1ArnDQGI9v0h2JUKJTHAcJFMFa2Ua', NULL, '2024-09-09 18:14:15', '2024-09-09 18:14:15', 'administrator'),
(17, 'Roma', 'Dhoni', 'tesadmin@gmail.com', NULL, NULL, NULL, '$2y$12$X4bbTNXkGKIcdFGFuRtTZOKmlExo2HkdgZ9TdJMhLgHKpKSp2VC2W', NULL, '2024-09-10 00:45:43', '2024-09-10 00:45:43', 'administrator'),
(19, 'administrator', 'doni', 'adminaja@gmail.com', NULL, NULL, NULL, '$2y$12$AEWXonCg0jldPMAbAxHPse9VpQIEzM3xI0reDZrjbi.7JRRDqVOgW', NULL, '2024-09-10 02:43:53', '2024-09-10 02:43:53', 'administrator'),
(22, 'Roma', 'Dhoni', 'user@gmail.com', NULL, NULL, NULL, '$2y$12$rxjg7EAq9IFMj8u9WiRtcusKHzncQhXlahB/.xQIds34j0KK8Q7IO', NULL, '2024-09-14 08:25:01', '2024-09-14 08:25:01', 'user'),
(23, 'siapaa', 'yaaaa', 'tanya@gmail.com', NULL, NULL, NULL, '$2y$12$.MjfrQcbQ2/eV9Yty7zr6.Jv8neNQQPJ8JZI/HlXPhFH/SBjkCKyG', NULL, '2024-09-14 08:28:57', '2024-09-14 08:28:57', 'user');

--
-- Indexes for dumped tables
--

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
-- Indexes for table `programs`
--
ALTER TABLE `programs`
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
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

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
-- AUTO_INCREMENT for table `programs`
--
ALTER TABLE `programs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
