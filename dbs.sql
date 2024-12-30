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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table inventori.ranpur: ~4 rows (approximately)
INSERT INTO `ranpur` (`id`, `id_jenis_ranpur`, `id_tipe_ranpur`, `id_wilayah`, `nama_ranpur`, `deskripsi`) VALUES
	(2, 1, 1, 1, 'Ranpur 2', ''),
	(3, 1, 1, 2, 'Ranpur 1', ''),
	(5, 1, 1, 1, 'Ranpur 1', '<p>satu</p>\r\n<hr>\r\n<p>dua</p>'),
	(6, 1, 1, 1, 'Ranpur 3', '<p>asm</p>\r\n<hr>\r\n<p>kla</p>');

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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table inventori.users: ~0 rows (approximately)

-- Dumping structure for table inventori.wilayah
CREATE TABLE IF NOT EXISTS `wilayah` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama_wilayah` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table inventori.wilayah: ~1 rows (approximately)
INSERT INTO `wilayah` (`id`, `nama_wilayah`) VALUES
	(1, 'Yonkav 1'),
	(2, 'Yonkav 8');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
