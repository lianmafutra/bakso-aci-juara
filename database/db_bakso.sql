-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               5.7.24 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for db_bakso
CREATE DATABASE IF NOT EXISTS `db_bakso` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `db_bakso`;

-- Dumping structure for table db_bakso.daftar_menu
CREATE TABLE IF NOT EXISTS `daftar_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kategori_menu_id` int(11) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `deskripsi` text,
  `gambar` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table db_bakso.daftar_menu: ~2 rows (approximately)
/*!40000 ALTER TABLE `daftar_menu` DISABLE KEYS */;
INSERT INTO `daftar_menu` (`id`, `kategori_menu_id`, `nama`, `harga`, `deskripsi`, `gambar`, `created_at`, `updated_at`) VALUES
	(9, 2, 'Bakso Biasa', 10000, 'bakso biasa', '61c082f4a8d78-1640006388.jpg', '2021-12-20 13:19:48', '2021-12-20 13:19:48'),
	(10, 2, 'Bakso Telur', 12000, 'bakso pakai telur', '61c08311013ce-1640006417.jpg', '2021-12-20 13:20:17', '2021-12-20 13:20:17'),
	(11, 4, 'Es Teh', 4000, 'es teh manis', '61c083264f737-1640006438.jpeg', '2021-12-20 13:20:38', '2021-12-20 13:20:38');
/*!40000 ALTER TABLE `daftar_menu` ENABLE KEYS */;

-- Dumping structure for table db_bakso.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_bakso.failed_jobs: ~0 rows (approximately)
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;

-- Dumping structure for table db_bakso.kategori_menu
CREATE TABLE IF NOT EXISTS `kategori_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table db_bakso.kategori_menu: ~3 rows (approximately)
/*!40000 ALTER TABLE `kategori_menu` DISABLE KEYS */;
INSERT INTO `kategori_menu` (`id`, `nama`, `created_at`, `updated_at`) VALUES
	(2, 'Makanan', '2021-12-19 11:12:46', '2021-12-19 11:12:47'),
	(3, 'Lainnya', '2021-12-19 11:12:53', '2021-12-19 13:58:19'),
	(4, 'Minuman', '2021-12-20 13:19:16', '2021-12-20 13:19:16');
/*!40000 ALTER TABLE `kategori_menu` ENABLE KEYS */;

-- Dumping structure for table db_bakso.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_bakso.migrations: ~2 rows (approximately)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2019_08_19_000000_create_failed_jobs_table', 1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping structure for table db_bakso.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_bakso.password_resets: ~0 rows (approximately)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Dumping structure for table db_bakso.pesanan
CREATE TABLE IF NOT EXISTS `pesanan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `users_id` int(11) DEFAULT NULL,
  `no_meja` varchar(50) NOT NULL DEFAULT '0',
  `tanggal` datetime DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `kategori` varchar(255) DEFAULT NULL,
  `harga` varchar(255) DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `catatan` text,
  `jumlah` int(11) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table db_bakso.pesanan: ~3 rows (approximately)
/*!40000 ALTER TABLE `pesanan` DISABLE KEYS */;
INSERT INTO `pesanan` (`id`, `users_id`, `no_meja`, `tanggal`, `nama`, `kategori`, `harga`, `gambar`, `catatan`, `jumlah`, `status`, `created_at`, `updated_at`) VALUES
	(1, NULL, '0', NULL, 'minuman', NULL, NULL, NULL, NULL, NULL, NULL, '2021-12-19 11:12:38', '2021-12-19 11:12:39'),
	(2, NULL, '0', NULL, 'makanan', NULL, NULL, NULL, NULL, NULL, NULL, '2021-12-19 11:12:46', '2021-12-19 11:12:47'),
	(3, NULL, '0', NULL, 'lainnya', NULL, NULL, NULL, NULL, NULL, NULL, '2021-12-19 11:12:53', '2021-12-19 11:12:55');
/*!40000 ALTER TABLE `pesanan` ENABLE KEYS */;

-- Dumping structure for table db_bakso.roles
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `jenis` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table db_bakso.roles: ~2 rows (approximately)
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` (`id`, `jenis`, `created_at`, `updated_at`) VALUES
	(1, 'admin', '2021-12-19 12:36:19', '2021-12-19 12:36:20'),
	(2, 'pelayan', '2021-12-19 12:36:35', '2021-12-19 12:36:36'),
	(3, 'kasir', '2021-12-19 12:36:35', '2021-12-19 12:36:37');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;

-- Dumping structure for table db_bakso.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `roles_id` int(10) unsigned NOT NULL DEFAULT '0',
  `username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_bakso.users: ~3 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `roles_id`, `username`, `name`, `last_name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 1, 'admin', 'lian mafutra', 'mafutra', 'lianmafutra@gmail.com', NULL, '$2y$10$VnXaDZXpnN73uxNRtImM0OpBywgiuFRZvJjCUlQanII/ShfwJDIpi', NULL, '2021-12-19 03:19:24', '2021-12-19 03:19:24'),
	(2, 2, 'hudabaru', 'Huda', 'mafutra', 'lianmafutra2@gmail.com', NULL, '$2y$10$VnXaDZXpnN73uxNRtImM0OpBywgiuFRZvJjCUlQanII/ShfwJDIpi', NULL, '2021-12-19 03:19:24', '2021-12-19 03:19:24'),
	(3, 2, 'budi1234', 'Budi', 'mafutra', 'lianmafutra24@gmail.com', NULL, '$2y$10$VnXaDZXpnN73uxNRtImM0OpBywgiuFRZvJjCUlQanII/ShfwJDIpi', NULL, '2021-12-19 03:19:24', '2021-12-19 03:19:24');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
