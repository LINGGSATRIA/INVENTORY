-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping structure for table inventori.jenis_ranpur
CREATE TABLE IF NOT EXISTS `jenis_ranpur` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama_ranpur` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table inventori.jenis_ranpur: ~1 rows (approximately)
INSERT INTO `jenis_ranpur` (`id`, `nama_ranpur`) VALUES
	(1, 'Tank');

-- Dumping structure for table inventori.kategori
CREATE TABLE IF NOT EXISTS `kategori` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama_kategori` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table inventori.kategori: ~3 rows (approximately)
INSERT INTO `kategori` (`id`, `nama_kategori`) VALUES
	(1, 'System Otomotive & Hull'),
	(2, 'System Senjata/Turret'),
	(3, 'BML');

-- Dumping structure for table inventori.kategori_stok
CREATE TABLE IF NOT EXISTS `kategori_stok` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_tipe_ranpur` int DEFAULT NULL,
  `id_kategori` int DEFAULT NULL,
  `Deskripsi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`),
  KEY `id_tipe_ranpur` (`id_tipe_ranpur`),
  KEY `nama_kategori` (`id_kategori`) USING BTREE,
  CONSTRAINT `FK_kategori_stok_kategori` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id`),
  CONSTRAINT `FK_kategori_stok_tipe_ranpur` FOREIGN KEY (`id_tipe_ranpur`) REFERENCES `tipe_ranpur` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table inventori.kategori_stok: ~1 rows (approximately)
INSERT INTO `kategori_stok` (`id`, `id_tipe_ranpur`, `id_kategori`, `Deskripsi`) VALUES
	(1, 1, 1, '<p style="color: blue; font-weight: bold;">Judul Sheet</p>\r\n<p style="color: gray; font-style: italic;">Konten untuk Sheet</p>\r\n<hr>\r\n<p style="color: blue; font-weight: bold;">Judul Sheet</p>\r\n<p style="color: gray; font-style: italic;">Konten untuk Sheet</p>');

-- Dumping structure for table inventori.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `version` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `class` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `group` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `namespace` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `time` int NOT NULL,
  `batch` int unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table inventori.migrations: ~1 rows (approximately)
INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
	(1, '2024-12-31-114409', 'App\\Database\\Migrations\\AddTimestampToUsers', 'default', 'App', 1735645490, 1);

-- Dumping structure for table inventori.ranpur
CREATE TABLE IF NOT EXISTS `ranpur` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_jenis_ranpur` int DEFAULT NULL,
  `id_tipe_ranpur` int DEFAULT NULL,
  `id_wilayah` int DEFAULT NULL,
  `nama_ranpur` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`),
  KEY `id_jenis_ranpur` (`id_jenis_ranpur`),
  KEY `id_wilayah` (`id_wilayah`),
  KEY `id_tipe_ranpur` (`id_tipe_ranpur`),
  CONSTRAINT `ranpur_ibfk_1` FOREIGN KEY (`id_jenis_ranpur`) REFERENCES `jenis_ranpur` (`id`),
  CONSTRAINT `ranpur_ibfk_2` FOREIGN KEY (`id_wilayah`) REFERENCES `wilayah` (`id`),
  CONSTRAINT `ranpur_ibfk_3` FOREIGN KEY (`id_tipe_ranpur`) REFERENCES `tipe_ranpur` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table inventori.ranpur: ~5 rows (approximately)
INSERT INTO `ranpur` (`id`, `id_jenis_ranpur`, `id_tipe_ranpur`, `id_wilayah`, `nama_ranpur`, `deskripsi`) VALUES
	(2, 1, 1, 1, 'Ranpur 2', ''),
	(3, 1, 1, 2, 'Ranpur 1', ''),
	(5, 1, 1, 1, 'Ranpur 1', '<p>satu</p>\r\n<hr>\r\n<p>dua</p>'),
	(6, 1, 1, 1, 'Ranpur 3', '<p>asm</p>\r\n<hr>\r\n<p>kla</p>'),
	(7, 1, 1, 2, 'Ranpur 2', '<p style="color: blue; font-weight: bold;">Judul Sheet</p>\r\n<p style="color: gray; font-style: italic;">Konten untuk Sheet</p>\r\n<hr>\r\n<p style="color: blue; font-weight: bold;">Judul Sheet</p>\r\n<p style="color: gray; font-style: italic;">Konten untuk Sheet</p>\r\n<hr>\r\n<p style="color: blue; font-weight: bold;">&nbsp;</p>');

-- Dumping structure for table inventori.tipe_ranpur
CREATE TABLE IF NOT EXISTS `tipe_ranpur` (
  `id` int NOT NULL AUTO_INCREMENT,
  `tipe_ranpur` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table inventori.tipe_ranpur: ~1 rows (approximately)
INSERT INTO `tipe_ranpur` (`id`, `tipe_ranpur`) VALUES
	(1, 'Leopard');

-- Dumping structure for table inventori.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table inventori.users: ~1 rows (approximately)
INSERT INTO `users` (`id`, `email`, `password`, `name`, `created_at`, `updated_at`) VALUES
	(3, 'admin@admin.com', '$2y$10$btHIVjS78NApiOGQs5qjo.gbXorb9Ci05SIPnbfk1Y/FWMpGjQUjW', 'Lingga Satria BS', '2024-12-31 12:21:02', '2025-01-01 08:15:27');

-- Dumping structure for table inventori.wilayah
CREATE TABLE IF NOT EXISTS `wilayah` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama_wilayah` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table inventori.wilayah: ~2 rows (approximately)
INSERT INTO `wilayah` (`id`, `nama_wilayah`) VALUES
	(1, 'Yonkav 1'),
	(2, 'Yonkav 8');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
