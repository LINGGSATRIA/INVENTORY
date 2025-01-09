/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

CREATE TABLE IF NOT EXISTS `jenis_ranpur` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama_ranpur` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `jenis_ranpur` (`id`, `nama_ranpur`) VALUES
	(1, 'kanon'),
	(2, 'personel');

CREATE TABLE IF NOT EXISTS `kategori` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama_kategori` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `kategori` (`id`, `nama_kategori`) VALUES
	(1, 'BML'),
	(6, 'asd'),
	(7, 'sss'),
	(8, 'Casis');

CREATE TABLE IF NOT EXISTS `kategori_stok` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_versi_ranpur` int DEFAULT NULL,
  `id_kategori` int DEFAULT NULL,
  `Deskripsi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`),
  KEY `nama_kategori` (`id_kategori`) USING BTREE,
  KEY `id_tipe_ranpur` (`id_versi_ranpur`) USING BTREE,
  CONSTRAINT `FK_kategori_stok_kategori` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id`),
  CONSTRAINT `FK_kategori_stok_versi_ranpur` FOREIGN KEY (`id_versi_ranpur`) REFERENCES `versi_ranpur` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `kategori_stok` (`id`, `id_versi_ranpur`, `id_kategori`, `Deskripsi`) VALUES
	(1, 1, 8, '<table id="dataTable" style="border-collapse: collapse; width: 100%;" border="1">\r\n<thead>\r\n<tr>\r\n<th>No. Seri Sukcad</th>\r\n<th>Jenis Sukcad</th>\r\n<th>Nama Sukcad</th>\r\n<th>Yonkav 1</th>\r\n<th>Yonkav 8</th>\r\n<th>Pusdikkav</th>\r\n<th>Kikav Puslatpur</th>\r\n<th>Bengpuskav</th>\r\n<th>Gupusran</th>\r\n<th>Total Sukcad</th>\r\n</tr>\r\n</thead>\r\n<tbody>\r\n<tr>\r\n<td>c1</td>\r\n<td>c1</td>\r\n<td>c1</td>\r\n<td>c1</td>\r\n<td>c1</td>\r\n<td>c1</td>\r\n<td>c1</td>\r\n<td>c1</td>\r\n<td>c1</td>\r\n<td>c1</td>\r\n</tr>\r\n<tr>\r\n<td>c2</td>\r\n<td>c3</td>\r\n<td>c3</td>\r\n<td>c3</td>\r\n<td>c3</td>\r\n<td>c3</td>\r\n<td>c3</td>\r\n<td>c3</td>\r\n<td>c3</td>\r\n<td>c3</td>\r\n</tr>\r\n</tbody>\r\n</table>'),
	(2, 1, 1, '<table id="dataTable" class="table table-bordered" style="width: 100%;">\r\n<thead class="thead-dark">\r\n<tr>\r\n<th>No. Seri Sukcad</th>\r\n<th>Jenis Sukcad</th>\r\n<th>Nama Sukcad</th>\r\n<th>YONKAV 1</th>\r\n<th>Yonkav 8</th>\r\n<th>Pusdikkav</th>\r\n<th>Kikav Puslatpur</th>\r\n<th>Bengpuskav</th>\r\n<th>Gupusran</th>\r\n<th>Total Sukcad</th>\r\n</tr>\r\n</thead>\r\n<tbody>\r\n<tr>\r\n<td>ad</td>\r\n<td>ss</td>\r\n<td>sd</td>\r\n<td>a</td>\r\n<td>aa</td>\r\n<td>aa</td>\r\n<td>aa</td>\r\n<td>aa</td>\r\n<td>aa</td>\r\n<td>aa</td>\r\n</tr>\r\n<tr>\r\n<td>d</td>\r\n<td>d</td>\r\n<td>d</td>\r\n<td>d</td>\r\n<td>d</td>\r\n<td>d</td>\r\n<td>dd</td>\r\n<td>d</td>\r\n<td>s</td>\r\n<td>aa</td>\r\n</tr>\r\n<tr>\r\n<td>d</td>\r\n<td>d</td>\r\n<td>s</td>\r\n<td>j</td>\r\n<td>j</td>\r\n<td>g</td>\r\n<td>jj</td>\r\n<td>j</td>\r\n<td>j</td>\r\n<td>j</td>\r\n</tr>\r\n</tbody>\r\n</table>');

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

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
	(1, '2024-12-31-114409', 'App\\Database\\Migrations\\AddTimestampToUsers', 'default', 'App', 1735645490, 1);

CREATE TABLE IF NOT EXISTS `ranpur` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_jenis_ranpur` int DEFAULT NULL,
  `id_tipe_ranpur` int DEFAULT NULL,
  `id_versi_ranpur` int DEFAULT NULL,
  `id_wilayah` int DEFAULT NULL,
  `sub_wilayah` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_jenis_ranpur` (`id_jenis_ranpur`),
  KEY `id_tipe_ranpur` (`id_tipe_ranpur`),
  KEY `id_versi_ranpur` (`id_versi_ranpur`) USING BTREE,
  KEY `id_wilayah` (`id_wilayah`),
  CONSTRAINT `FK_ranpur_versi_ranpur` FOREIGN KEY (`id_versi_ranpur`) REFERENCES `versi_ranpur` (`id`),
  CONSTRAINT `ranpur_ibfk_1` FOREIGN KEY (`id_jenis_ranpur`) REFERENCES `jenis_ranpur` (`id`),
  CONSTRAINT `ranpur_ibfk_3` FOREIGN KEY (`id_tipe_ranpur`) REFERENCES `tipe_ranpur` (`id`),
  CONSTRAINT `ranpur_ibfk_4` FOREIGN KEY (`id_wilayah`) REFERENCES `wilayah` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `ranpur` (`id`, `id_jenis_ranpur`, `id_tipe_ranpur`, `id_versi_ranpur`, `id_wilayah`, `sub_wilayah`) VALUES
	(1, 1, 1, 1, 1, 'YONKAV 1');

CREATE TABLE IF NOT EXISTS `tipe_ranpur` (
  `id` int NOT NULL AUTO_INCREMENT,
  `tipe_ranpur` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

INSERT INTO `tipe_ranpur` (`id`, `tipe_ranpur`) VALUES
	(1, 'Leopard'),
	(3, 'Truk');

CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `foto` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `users` (`id`, `email`, `password`, `role`, `name`, `created_at`, `updated_at`, `foto`) VALUES
	(3, 'admin@admin.com', '$2y$10$btHIVjS78NApiOGQs5qjo.gbXorb9Ci05SIPnbfk1Y/FWMpGjQUjW', '1', 'Lingga Satria BS', '2024-12-31 12:21:02', '2025-01-04 09:21:46', 'uploads/3_1735982506.jpeg'),
	(7, 'user@user.com', '$2y$10$BUKNHGlYdK2ZDUe4Edwvv.It.xZLut7PUo9wTqW84jZBykKQ4yIFC', '2', 'wildanu', '2025-01-04 07:06:58', '2025-01-05 17:02:23', 'uploads/7_1735984124.png');

CREATE TABLE IF NOT EXISTS `versi_ranpur` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama_versi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `versi_ranpur` (`id`, `nama_versi`) VALUES
	(1, 'Leopard_XXX'),
	(3, 'Leopard_YYY'),
	(4, 'asd'),
	(5, 'Truk_ZZZ'),
	(6, 'Truk_YYY');

CREATE TABLE IF NOT EXISTS `wilayah` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama_wilayah` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `wilayah` (`id`, `nama_wilayah`) VALUES
	(1, 'PUSENKAV');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
