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

-- Dumping data for table inventori.kategori: ~1 rows (approximately)
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table inventori.kategori_stok: ~1 rows (approximately)
INSERT INTO `kategori_stok` (`id`, `id_tipe_ranpur`, `id_kategori`, `Deskripsi`) VALUES
	(1, 1, 1, '<p class="MsoNormal"><span style="mso-ansi-language: EN-ID;">Fast Moving</span></p>\r\n<ul style="margin-top: 0cm;" type="disc">\r\n<li class="MsoNormal" style="mso-list: l0 level1 lfo1; tab-stops: list 36.0pt;"><span style="mso-ansi-language: EN-ID;">FILTER ELEMENT, FLUI</span></li>\r\n<ul style="margin-top: 0cm;" type="circle">\r\n<li class="MsoNormal" style="mso-list: l0 level2 lfo1; tab-stops: list 72.0pt;"><span style="mso-ansi-language: EN-ID;">921805 / 63 800 55 111</span></li>\r\n</ul>\r\n<li class="MsoNormal" style="mso-list: l0 level1 lfo1; tab-stops: list 36.0pt;"><span style="mso-ansi-language: EN-ID;">SCREW, CAP, SOCKET HE</span></li>\r\n<ul style="margin-top: 0cm;" type="circle">\r\n<li class="MsoNormal" style="mso-list: l0 level2 lfo1; tab-stops: list 72.0pt;"><span style="mso-ansi-language: EN-ID;">ISO4762-M6X16-8.8-A2P</span></li>\r\n</ul>\r\n<li class="MsoNormal" style="mso-list: l0 level1 lfo1; tab-stops: list 36.0pt;"><span style="mso-ansi-language: EN-ID;">O-RING</span></li>\r\n<ul style="margin-top: 0cm;" type="circle">\r\n<li class="MsoNormal" style="mso-list: l0 level2 lfo1; tab-stops: list 72.0pt;"><span style="mso-ansi-language: EN-ID;">OR20,0X1,5/VI / \'OR20,0X1,5 FKM 80</span></li>\r\n</ul>\r\n<li class="MsoNormal" style="mso-list: l0 level1 lfo1; tab-stops: list 36.0pt;"><span style="mso-ansi-language: EN-ID;">INSERT (FILTER GEARBOX BAWAH)</span></li>\r\n<ul style="margin-top: 0cm;" type="circle">\r\n<li class="MsoNormal" style="mso-list: l0 level2 lfo1; tab-stops: list 72.0pt;"><span style="mso-ansi-language: EN-ID;">5561537-4 / S4.1206-08</span></li>\r\n</ul>\r\n<li class="MsoNormal" style="mso-list: l0 level1 lfo1; tab-stops: list 36.0pt;"><span style="mso-ansi-language: EN-ID;">FILTER ELEMENT,FLUI (FILTER OLI GEARBOX KIKA)</span></li>\r\n<ul style="margin-top: 0cm;" type="circle">\r\n<li class="MsoNormal" style="mso-list: l0 level2 lfo1; tab-stops: list 72.0pt;"><span style="mso-ansi-language: EN-ID;">5562065-3 / P2.1123.04</span></li>\r\n</ul>\r\n<li class="MsoNormal" style="mso-list: l0 level1 lfo1; tab-stops: list 36.0pt;"><span style="mso-ansi-language: EN-ID;">FILTER ELEMENT,FLUI (FILTER OLI GEARBOX KIKA)</span></li>\r\n<ul style="margin-top: 0cm;" type="circle">\r\n<li class="MsoNormal" style="mso-list: l0 level2 lfo1; tab-stops: list 72.0pt;"><span style="mso-ansi-language: EN-ID;">5562064-3 / S2.0823-00</span></li>\r\n</ul>\r\n</ul>\r\n<div class="MsoNormal" style="text-align: center;" align="center"><hr align="center" size="2" width="100%"></div>\r\n<p class="MsoNormal"><span style="mso-ansi-language: EN-ID;">Slow Moving</span></p>\r\n<ul style="margin-top: 0cm;" type="disc">\r\n<li class="MsoNormal" style="mso-list: l1 level1 lfo2; tab-stops: list 36.0pt;"><span style="mso-ansi-language: EN-ID;">PLATE, INSTRUCTION</span></li>\r\n<ul style="margin-top: 0cm;" type="circle">\r\n<li class="MsoNormal" style="mso-list: l1 level2 lfo2; tab-stops: list 72.0pt;"><span style="mso-ansi-language: EN-ID;">2300109-031125.001.0</span></li>\r\n</ul>\r\n<li class="MsoNormal" style="mso-list: l1 level1 lfo2; tab-stops: list 36.0pt;"><span style="mso-ansi-language: EN-ID;">WAHER, SPRING TENSI</span></li>\r\n<ul style="margin-top: 0cm;" type="circle">\r\n<li class="MsoNormal" style="mso-list: l1 level2 lfo2; tab-stops: list 72.0pt;"><span style="mso-ansi-language: EN-ID;">DIN137-B6-FST-A3P</span></li>\r\n</ul>\r\n<li class="MsoNormal" style="mso-list: l1 level1 lfo2; tab-stops: list 36.0pt;"><span style="mso-ansi-language: EN-ID;">GASKET (SEAL)</span></li>\r\n<ul style="margin-top: 0cm;" type="circle">\r\n<li class="MsoNormal" style="mso-list: l1 level2 lfo2; tab-stops: list 72.0pt;"><span style="mso-ansi-language: EN-ID;">5330-123278685</span></li>\r\n</ul>\r\n<li class="MsoNormal" style="mso-list: l1 level1 lfo2; tab-stops: list 36.0pt;"><span style="mso-ansi-language: EN-ID;">STUD, PLAIN</span></li>\r\n<ul style="margin-top: 0cm;" type="circle">\r\n<li class="MsoNormal" style="mso-list: l1 level2 lfo2; tab-stops: list 72.0pt;"><span style="mso-ansi-language: EN-ID;">DIN835-M8X30-8.8 / N0444112</span></li>\r\n</ul>\r\n<li class="MsoNormal" style="mso-list: l1 level1 lfo2; tab-stops: list 36.0pt;"><span style="mso-ansi-language: EN-ID;">CLAMP, LOOP</span></li>\r\n<ul style="margin-top: 0cm;" type="circle">\r\n<li class="MsoNormal" style="mso-list: l1 level2 lfo2; tab-stops: list 72.0pt;"><span style="mso-ansi-language: EN-ID;">DIN3016-1-A1-18X20-W1-2-CR / DIN3016-A1-18X20-W1-2-CR</span></li>\r\n</ul>\r\n<li class="MsoNormal" style="mso-list: l1 level1 lfo2; tab-stops: list 36.0pt;"><span style="mso-ansi-language: EN-ID;">HOSE ASSEMBLY, NONME</span></li>\r\n<ul style="margin-top: 0cm;" type="circle">\r\n<li class="MsoNormal" style="mso-list: l1 level2 lfo2; tab-stops: list 72.0pt;"><span style="mso-ansi-language: EN-ID;">8730700381 / 1N00535JJJ00566</span></li>\r\n</ul>\r\n<li class="MsoNormal" style="mso-list: l1 level1 lfo2; tab-stops: list 36.0pt;"><span style="mso-ansi-language: EN-ID;">VALVE, CHECK</span></li>\r\n<ul style="margin-top: 0cm;" type="circle">\r\n<li class="MsoNormal" style="mso-list: l1 level2 lfo2; tab-stops: list 72.0pt;"><span style="mso-ansi-language: EN-ID;">8701800032</span></li>\r\n</ul>\r\n<li class="MsoNormal" style="mso-list: l1 level1 lfo2; tab-stops: list 36.0pt;"><span style="mso-ansi-language: EN-ID;">FILTER, RADIO FREQUE</span></li>\r\n<ul style="margin-top: 0cm;" type="circle">\r\n<li class="MsoNormal" style="mso-list: l1 level2 lfo2; tab-stops: list 72.0pt;"><span style="mso-ansi-language: EN-ID;">290003012</span></li>\r\n</ul>\r\n<li class="MsoNormal" style="mso-list: l1 level1 lfo2; tab-stops: list 36.0pt;"><span style="mso-ansi-language: EN-ID;">TANK, FUEL, ENGINE</span></li>\r\n<ul style="margin-top: 0cm;" type="circle">\r\n<li class="MsoNormal" style="mso-list: l1 level2 lfo2; tab-stops: list 72.0pt;"><span style="mso-ansi-language: EN-ID;">2300109-031221.000.0 / 2300109-031211.000.0</span></li>\r\n</ul>\r\n<li class="MsoNormal" style="mso-list: l1 level1 lfo2; tab-stops: list 36.0pt;"><span style="mso-ansi-language: EN-ID;">PAD, TRACK SHOE</span></li>\r\n<ul style="margin-top: 0cm;" type="circle">\r\n<li class="MsoNormal" style="mso-list: l1 level2 lfo2; tab-stops: list 72.0pt;"><span style="mso-ansi-language: EN-ID;">75700600 / 96207401</span></li>\r\n</ul>\r\n<li class="MsoNormal" style="mso-list: l1 level1 lfo2; tab-stops: list 36.0pt;"><span style="mso-ansi-language: EN-ID;">ELECTRONIC COMPONENTS ASSEMBLY</span></li>\r\n<ul style="margin-top: 0cm;" type="circle">\r\n<li class="MsoNormal" style="mso-list: l1 level2 lfo2; tab-stops: list 72.0pt;"><span style="mso-ansi-language: EN-ID;">X00E50209948</span></li>\r\n</ul>\r\n<li class="MsoNormal" style="mso-list: l1 level1 lfo2; tab-stops: list 36.0pt;"><span style="mso-ansi-language: EN-ID;">CLAMP, HOSE</span></li>\r\n<ul style="margin-top: 0cm;" type="circle">\r\n<li class="MsoNormal" style="mso-list: l1 level2 lfo2; tab-stops: list 72.0pt;"><span style="mso-ansi-language: EN-ID;">DIN3017-AS20-32C8-W5 / DIN3017-AS20-32W5</span></li>\r\n</ul>\r\n<li class="MsoNormal" style="mso-list: l1 level1 lfo2; tab-stops: list 36.0pt;"><span style="mso-ansi-language: EN-ID;">TURBOSUPERCHANGER, E</span></li>\r\n<ul style="margin-top: 0cm;" type="circle">\r\n<li class="MsoNormal" style="mso-list: l1 level2 lfo2; tab-stops: list 72.0pt;"><span style="mso-ansi-language: EN-ID;">5110200500 / 5110202605</span></li>\r\n</ul>\r\n<li class="MsoNormal" style="mso-list: l1 level1 lfo2; tab-stops: list 36.0pt;"><span style="mso-ansi-language: EN-ID;">REGULATOR, ENGINE GE</span></li>\r\n<ul style="margin-top: 0cm;" type="circle">\r\n<li class="MsoNormal" style="mso-list: l1 level2 lfo2; tab-stops: list 72.0pt;"><span style="mso-ansi-language: EN-ID;">272RPG33-6 / RPG 33-6-B</span></li>\r\n</ul>\r\n<li class="MsoNormal" style="mso-list: l1 level1 lfo2; tab-stops: list 36.0pt;"><span style="mso-ansi-language: EN-ID;">FLUID COUPLING</span></li>\r\n<ul style="margin-top: 0cm;" type="circle">\r\n<li class="MsoNormal" style="mso-list: l1 level2 lfo2; tab-stops: list 72.0pt;"><span style="mso-ansi-language: EN-ID;">8701500827</span></li>\r\n</ul>\r\n<li class="MsoNormal" style="mso-list: l1 level1 lfo2; tab-stops: list 36.0pt;"><span style="mso-ansi-language: EN-ID;">DISTRIBUTION BOX</span></li>\r\n<ul style="margin-top: 0cm;" type="circle">\r\n<li class="MsoNormal" style="mso-list: l1 level2 lfo2; tab-stops: list 72.0pt;"><span style="mso-ansi-language: EN-ID;">8731502338 / X87334400013</span></li>\r\n</ul>\r\n<li class="MsoNormal" style="mso-list: l1 level1 lfo2; tab-stops: list 36.0pt;"><span style="mso-ansi-language: EN-ID;">SWIVEL JOINT, HYDRAU</span></li>\r\n<ul style="margin-top: 0cm;" type="circle">\r\n<li class="MsoNormal" style="mso-list: l1 level2 lfo2; tab-stops: list 72.0pt;"><span style="mso-ansi-language: EN-ID;">WH18-LMKD-OMD-VI-A3P</span></li>\r\n</ul>\r\n<li class="MsoNormal" style="mso-list: l1 level1 lfo2; tab-stops: list 36.0pt;"><span style="mso-ansi-language: EN-ID;">STATOR, TRACK</span></li>\r\n<ul style="margin-top: 0cm;" type="circle">\r\n<li class="MsoNormal" style="mso-list: l1 level2 lfo2; tab-stops: list 72.0pt;"><span style="mso-ansi-language: EN-ID;">1058560 / 23111-3800.40</span></li>\r\n</ul>\r\n<li class="MsoNormal" style="mso-list: l1 level1 lfo2; tab-stops: list 36.0pt;"><span style="mso-ansi-language: EN-ID;">FILTER ELEMENT, FLUI</span></li>\r\n<ul style="margin-top: 0cm;" type="circle">\r\n<li class="MsoNormal" style="mso-list: l1 level2 lfo2; tab-stops: list 72.0pt;"><span style="mso-ansi-language: EN-ID;">921705</span></li>\r\n</ul>\r\n<li class="MsoNormal" style="mso-list: l1 level1 lfo2; tab-stops: list 36.0pt;"><span style="mso-ansi-language: EN-ID;">LEVER, REMOTE CONTRO</span></li>\r\n<ul style="margin-top: 0cm;" type="circle">\r\n<li class="MsoNormal" style="mso-list: l1 level2 lfo2; tab-stops: list 72.0pt;"><span style="mso-ansi-language: EN-ID;">2300397-031122.000.0</span></li>\r\n</ul>\r\n<li class="MsoNormal" style="mso-list: l1 level1 lfo2; tab-stops: list 36.0pt;"><span style="mso-ansi-language: EN-ID;">COUPLING HALF, QUICK</span></li>\r\n<ul style="margin-top: 0cm;" type="circle">\r\n<li class="MsoNormal" style="mso-list: l1 level2 lfo2; tab-stops: list 72.0pt;"><span style="mso-ansi-language: EN-ID;">616312313026</span></li>\r\n</ul>\r\n<li class="MsoNormal" style="mso-list: l1 level1 lfo2; tab-stops: list 36.0pt;"><span style="mso-ansi-language: EN-ID;">BLOWER, AIR CLEANER</span></li>\r\n<ul style="margin-top: 0cm;" type="circle">\r\n<li class="MsoNormal" style="mso-list: l1 level2 lfo2; tab-stops: list 72.0pt;"><span style="mso-ansi-language: EN-ID;">272496690</span></li>\r\n</ul>\r\n<li class="MsoNormal" style="mso-list: l1 level1 lfo2; tab-stops: list 36.0pt;"><span style="mso-ansi-language: EN-ID;">GYROSCOPE</span></li>\r\n<ul style="margin-top: 0cm;" type="circle">\r\n<li class="MsoNormal" style="mso-list: l1 level2 lfo2; tab-stops: list 72.0pt;"><span style="mso-ansi-language: EN-ID;">43707381-001</span></li>\r\n</ul>\r\n<li class="MsoNormal" style="mso-list: l1 level1 lfo2; tab-stops: list 36.0pt;"><span style="mso-ansi-language: EN-ID;">DISTRIBUTION BOX</span></li>\r\n<ul style="margin-top: 0cm;" type="circle">\r\n<li class="MsoNormal" style="mso-list: l1 level2 lfo2; tab-stops: list 72.0pt;"><span style="mso-ansi-language: EN-ID;">\'8731503138</span></li>\r\n</ul>\r\n<li class="MsoNormal" style="mso-list: l1 level1 lfo2; tab-stops: list 36.0pt;"><span style="mso-ansi-language: EN-ID;">CYLINDER SLEEVE</span></li>\r\n<ul style="margin-top: 0cm;" type="circle">\r\n<li class="MsoNormal" style="mso-list: l1 level2 lfo2; tab-stops: list 72.0pt;"><span style="mso-ansi-language: EN-ID;">2815-121587417</span></li>\r\n</ul>\r\n<li class="MsoNormal" style="mso-list: l1 level1 lfo2; tab-stops: list 36.0pt;"><span style="mso-ansi-language: EN-ID;">SUPPORT ROLLER AXLE W</span></li>\r\n<ul style="margin-top: 0cm;" type="circle">\r\n<li class="MsoNormal" style="mso-list: l1 level2 lfo2; tab-stops: list 72.0pt;"><span style="mso-ansi-language: EN-ID;">2300436-093100.000.0</span></li>\r\n</ul>\r\n<li class="MsoNormal" style="mso-list: l1 level1 lfo2; tab-stops: list 36.0pt;"><span style="mso-ansi-language: EN-ID;">\'QUADRANT,FIRE CONTR</span></li>\r\n<ul style="margin-top: 0cm;" type="circle">\r\n<li class="MsoNormal" style="mso-list: l1 level2 lfo2; tab-stops: list 72.0pt;"><span style="mso-ansi-language: EN-ID;">009-131.000-000</span></li>\r\n</ul>\r\n<li class="MsoNormal" style="mso-list: l1 level1 lfo2; tab-stops: list 36.0pt;"><span style="mso-ansi-language: EN-ID;">BEARING HALF SET,SL</span></li>\r\n<ul style="margin-top: 0cm;" type="circle">\r\n<li class="MsoNormal" style="mso-list: l1 level2 lfo2; tab-stops: list 72.0pt;"><span style="mso-ansi-language: EN-ID;">8380300646</span></li>\r\n</ul>\r\n<li class="MsoNormal" style="mso-list: l1 level1 lfo2; tab-stops: list 36.0pt;"><span style="mso-ansi-language: EN-ID;">IMPELLER</span></li>\r\n<ul style="margin-top: 0cm;" type="circle">\r\n<li class="MsoNormal" style="mso-list: l1 level2 lfo2; tab-stops: list 72.0pt;"><span style="mso-ansi-language: EN-ID;">72.4.614.0003 / 8732010607</span></li>\r\n</ul>\r\n<li class="MsoNormal" style="mso-list: l1 level1 lfo2; tab-stops: list 36.0pt;"><span style="mso-ansi-language: EN-ID;">PARTS KIT,AIR FILTER</span></li>\r\n<ul style="margin-top: 0cm;" type="circle">\r\n<li class="MsoNormal" style="mso-list: l1 level2 lfo2; tab-stops: list 72.0pt;"><span style="mso-ansi-language: EN-ID;">45 570 57 134</span></li>\r\n</ul>\r\n<li class="MsoNormal" style="mso-list: l1 level1 lfo2; tab-stops: list 36.0pt;"><span style="mso-ansi-language: EN-ID;">DISPENSING PUMP, EL</span></li>\r\n<ul style="margin-top: 0cm;" type="circle">\r\n<li class="MsoNormal" style="mso-list: l1 level2 lfo2; tab-stops: list 72.0pt;"><span style="mso-ansi-language: EN-ID;">10-011 10 019</span></li>\r\n</ul>\r\n<li class="MsoNormal" style="mso-list: l1 level1 lfo2; tab-stops: list 36.0pt;"><span lang="PT-BR" style="mso-ansi-language: PT-BR;">PUMP,FUEL,ELECTRICA (POMPA BBM UTAMA)</span></li>\r\n<ul style="margin-top: 0cm;" type="circle">\r\n<li class="MsoNormal" style="mso-list: l1 level2 lfo2; tab-stops: list 72.0pt;"><span style="mso-ansi-language: EN-ID;">\'011.80.064 / 10-01110081</span></li>\r\n</ul>\r\n<li class="MsoNormal" style="mso-list: l1 level1 lfo2; tab-stops: list 36.0pt;"><span style="mso-ansi-language: EN-ID;">RELAY,ELECTROMAGNET (RELAY KOTAK)</span></li>\r\n<ul style="margin-top: 0cm;" type="circle">\r\n<li class="MsoNormal" style="mso-list: l1 level2 lfo2; tab-stops: list 72.0pt;"><span style="mso-ansi-language: EN-ID;">332204204 / 0986Ah0614</span></li>\r\n</ul>\r\n<li class="MsoNormal" style="mso-list: l1 level1 lfo2; tab-stops: list 36.0pt;"><span style="mso-ansi-language: EN-ID;">SWITCH</span></li>\r\n<ul style="margin-top: 0cm;" type="circle">\r\n<li class="MsoNormal" style="mso-list: l1 level2 lfo2; tab-stops: list 72.0pt;"><span style="mso-ansi-language: EN-ID;">5561944-3 / 238.801/014/002</span></li>\r\n</ul>\r\n<li class="MsoNormal" style="mso-list: l1 level1 lfo2; tab-stops: list 36.0pt;"><span style="mso-ansi-language: EN-ID;">SWITCH,PRESSURE (SWITCH HIDROLIK)</span></li>\r\n<ul style="margin-top: 0cm;" type="circle">\r\n<li class="MsoNormal" style="mso-list: l1 level2 lfo2; tab-stops: list 72.0pt;"><span style="mso-ansi-language: EN-ID;">5077 302 006 / 5818-01-08.00</span></li>\r\n</ul>\r\n<li class="MsoNormal" style="mso-list: l1 level1 lfo2; tab-stops: list 36.0pt;"><span style="mso-ansi-language: EN-ID;">COUPLING HALF,QUICK (KLEM PENGIKAT BBM)</span></li>\r\n<ul style="margin-top: 0cm;" type="circle">\r\n<li class="MsoNormal" style="mso-list: l1 level2 lfo2; tab-stops: list 72.0pt;"><span style="mso-ansi-language: EN-ID;">\'0009974689 / 626312316022</span></li>\r\n</ul>\r\n<li class="MsoNormal" style="mso-list: l1 level1 lfo2; tab-stops: list 36.0pt;"><span style="mso-ansi-language: EN-ID;">Hydraulic swivel joint (ADAPTOR SELANG HIDROLIK)</span></li>\r\n<ul style="margin-top: 0cm;" type="circle">\r\n<li class="MsoNormal" style="mso-list: l1 level2 lfo2; tab-stops: list 72.0pt;"><span style="mso-ansi-language: EN-ID;">DSVW10LMOMDA3K / WHK10LMOMDCF</span></li>\r\n</ul>\r\n<li class="MsoNormal" style="mso-list: l1 level1 lfo2; tab-stops: list 36.0pt;"><span style="mso-ansi-language: EN-ID;">WASHER,LOCK (RING BAUT PENGETAPAN POMPA HIDROLIK)</span></li>\r\n<ul style="margin-top: 0cm;" type="circle">\r\n<li class="MsoNormal" style="mso-list: l1 level2 lfo2; tab-stops: list 72.0pt;"><span style="mso-ansi-language: EN-ID;">DIN7980-8-FST-A3P</span></li>\r\n</ul>\r\n</ul>\r\n<p class="MsoNormal"><span lang="IN">&nbsp;</span></p>'),
	(2, 1, 2, '<p>Fast Moving</p>\r\n<ul>\r\n<li>Data Kosong</li>\r\n</ul>\r\n<hr>\r\n<p>Slow Moving</p>\r\n<ul>\r\n<li>Data Kosong</li>\r\n</ul>'),
	(3, 1, 3, '<div>\r\n<ul>\r\n<li>\r\n<p>O-236</p>\r\n<ul>\r\n<li>\r\n<p>NYCOLUBE 436</p>\r\n</li>\r\n</ul>\r\n</li>\r\n<li>\r\n<p>GREENCOOL 8200MP</p>\r\n</li>\r\n<li>\r\n<p>O-1178</p>\r\n<ul>\r\n<li>\r\n<p>NYCOLUBE 294</p>\r\n</li>\r\n</ul>\r\n</li>\r\n<li>\r\n<p>OY 1005</p>\r\n<ul>\r\n<li>\r\n<p>NYCOLUBE 132</p>\r\n</li>\r\n</ul>\r\n</li>\r\n<li>\r\n<p>NYCOGREASE GN 17</p>\r\n</li>\r\n<li>\r\n<p>GREENCOOL 8200MP</p>\r\n</li>\r\n<li>\r\n<p>Hydraulic Fluid C-635</p>\r\n<ul>\r\n<li>\r\n<p>HYDRAUNYCOIL FH 6</p>\r\n</li>\r\n</ul>\r\n</li>\r\n<li>\r\n<p>S-738 = 6 Liter</p>\r\n</li>\r\n<li>\r\n<p>Nitrogen</p>\r\n</li>\r\n</ul>\r\n</div>');

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

-- Dumping data for table inventori.wilayah: ~2 rows (approximately)
INSERT INTO `wilayah` (`id`, `nama_wilayah`) VALUES
	(1, 'Yonkav 1'),
	(2, 'Yonkav 8');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
