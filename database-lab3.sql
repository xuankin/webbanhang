-- --------------------------------------------------------
-- Host:                         127.0.0.1
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


-- Dumping database structure for my_store
CREATE DATABASE IF NOT EXISTS `my_store` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `my_store`;

-- Dumping structure for table my_store.category
CREATE TABLE IF NOT EXISTS `category` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `description` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table my_store.category: ~5 rows (approximately)
INSERT INTO `category` (`id`, `name`, `description`) VALUES
	(1, 'Điện thoại', 'Danh mục các loại điện thoại'),
	(2, 'Laptop', 'Danh mục các loại laptop'),
	(3, 'Máy tính bảng', 'Danh mục các loại máy tính bảng'),
	(4, 'Phụ kiện', 'Danh mục phụ kiện điện tử'),
	(5, 'Thiết bị âm thanh', 'Danh mục loa, tai nghe, micro'),
	(6, 'Điện thoại', 'Danh mục các loại điện thoại'),
	(7, 'Laptop', 'Danh mục các loại laptop'),
	(8, 'Máy tính bảng', 'Danh mục các loại máy tính bảng'),
	(9, 'Phụ kiện', 'Danh mục phụ kiện điện tử'),
	(10, 'Thiết bị âm thanh', 'Danh mục loa, tai nghe, micro'),
	(11, 'Đồng hồ thông minh ', 'thiết bị điện tử hihi');

-- Dumping structure for table my_store.product
CREATE TABLE IF NOT EXISTS `product` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `description` text,
  `price` decimal(10,2) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `category_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `category_id` (`category_id`),
  CONSTRAINT `product_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table my_store.product: ~5 rows (approximately)
INSERT INTO `product` (`id`, `name`, `description`, `price`, `image`, `category_id`) VALUES
	(8, 'LAPTOP ASUS', 'Intel I9 13900H', 22000000.00, 'uploads/4671-45837_vivobook_x515_silver_bhs_ha5.jpg', 2),
	(11, 'IPhone 18 Promax 5TB', 'Mạnh', 50000000.00, 'uploads/Apple-iOS-18-Siri_inline.jpg.large.jpg', 1),
	(12, 'Laptop HP 15s ', 'Văn Phòng', 12000000.00, 'uploads/hp-15-fc0085au-r5-a6vv8pa-170225-110652-878-600x600.jpg', 2),
	(14, 'ĐIỆN THOẠI NOVO', 'TỐT', 12000000.00, 'uploads/vivo-y29-8gb-128gb-100225-043030-300-600x600.jpg', 1),
	(15, 'IPHONE 16 ĐEN', 'TUYỆT VỜI', 30000000.00, 'uploads/iphone-16e-den-thumb-600x600.jpg', 1),
	(16, 'BE FIT WATCH', 'GỌN NHẸ', 70000.00, 'uploads/befit-watch-s-day-silicone-xam-tn-600x600.jpg', 4),
	(17, 'XIAOMI REDMI WATCH', '213', 4300000.00, 'uploads/dong-ho-thong-minh-xiaomi-redmi-watch-4-47-5mm-day-silicone-090124-114101-1-600x600.jpg', 4),
	(18, 'oppo reno 3', 'tuyet', 24000000.00, 'uploads/oppo-reno13-f-5g-thumb-600x600.jpg', 1),
	(19, 'May tinh acer', '12', 12000000.00, 'uploads/acer-nitro-v-15-anv15-41-r2up-r5-nhqpgsv004-thumb-638717682684228496-600x600.jpg', 2),
	(20, 'IPAD PRO', 'good', 32000000.00, 'uploads/ipad-pro-11-inch-m4-wifi-black-thumb-600x600.jpg', 3),
	(21, 'macbook', 'vip', 24000000.00, 'uploads/apple-macbook-air-m2-2022-16gb-256gb-170225-102137-693-600x600.jpg', 2),
	(22, 'đồng hồ nữ cao cấp', 'cao cấp', 450000.00, 'uploads/candino-c4720-1-nu-thumb-seo.jpg', 4),
	(23, 'đồng hồ thông minh apple', '12', 3400000.00, 'uploads/apple-watch-s10-day-vai-den-bong-tb-600x600.jpg', 11),
	(24, 'tai nghe samsung', '123', 4500000.00, 'uploads/tai-nghe-bluetooth-chup-tai-havit-h661bt-thumb-600x600.jpg', 9),
	(25, 'chuột công thái học', 'pro', 1300000.00, 'uploads/chuot-bluetooth-logitech-lift-vertical-600x600.jpg', 9);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
