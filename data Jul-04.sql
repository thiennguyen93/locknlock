-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               10.4.13-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             11.0.0.5919
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for locknlock
DROP DATABASE IF EXISTS `locknlock`;
CREATE DATABASE IF NOT EXISTS `locknlock` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `locknlock`;

-- Dumping structure for table locknlock.categories
DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id của danh mục',
  `name` varchar(50) DEFAULT NULL COMMENT 'tên danh mục',
  `description` text DEFAULT NULL COMMENT 'mô tả danh mục',
  `url_img` text DEFAULT NULL COMMENT 'source ảnh danh mục',
  `parentId` int(11) DEFAULT NULL COMMENT 'id danh mục cha',
  `isFrontPage` char(50) DEFAULT 'N' COMMENT 'có hiện lên trang chủ hay không',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Bảng sanh mục sản phẩm';

-- Dumping data for table locknlock.categories: ~0 rows (approximately)
DELETE FROM `categories`;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;

-- Dumping structure for table locknlock.contacts
DROP TABLE IF EXISTS `contacts`;
CREATE TABLE IF NOT EXISTS `contacts` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id',
  `email` varchar(50) DEFAULT NULL COMMENT 'email khách hàng',
  `name` varchar(50) DEFAULT NULL COMMENT 'tên khách hàng',
  `subject` varchar(50) DEFAULT NULL COMMENT 'chủ đề liên hệ',
  `content` text DEFAULT NULL COMMENT 'Nội dung',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Bảng liên hệ';

-- Dumping data for table locknlock.contacts: ~0 rows (approximately)
DELETE FROM `contacts`;
/*!40000 ALTER TABLE `contacts` DISABLE KEYS */;
/*!40000 ALTER TABLE `contacts` ENABLE KEYS */;

-- Dumping structure for table locknlock.posts
DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id bài viết',
  `content` text CHARACTER SET utf8mb4 DEFAULT NULL COMMENT 'Nội dung HTML bài viết',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Bài viết về sản phẩm';

-- Dumping data for table locknlock.posts: ~0 rows (approximately)
DELETE FROM `posts`;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;

-- Dumping structure for table locknlock.products
DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID sản phẩm',
  `name` varchar(50) DEFAULT NULL COMMENT 'Tên sản phẩm',
  `description` tinytext DEFAULT NULL COMMENT 'Mô tả sơ lược về sản phẩm',
  `price` int(11) DEFAULT 0 COMMENT 'Giá sản phẩm',
  `postID` int(11) DEFAULT 0 COMMENT 'Bài viết về sản phẩm',
  `categoryID` int(11) DEFAULT NULL,
  `thumbnail_url` varchar(50) DEFAULT NULL COMMENT 'url hình sản phẩm thu nhỏ',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Sảng phẩm';

-- Dumping data for table locknlock.products: ~0 rows (approximately)
DELETE FROM `products`;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
/*!40000 ALTER TABLE `products` ENABLE KEYS */;

-- Dumping structure for table locknlock.specs
DROP TABLE IF EXISTS `specs`;
CREATE TABLE IF NOT EXISTS `specs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `productID` int(11) DEFAULT 0 COMMENT 'ID sản phẩm',
  `name` varchar(50) DEFAULT NULL COMMENT 'Tên thuộc tính',
  `value` varchar(50) DEFAULT NULL COMMENT 'Giá trị của thuộc tính',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Bảng thông số sản phẩm';

-- Dumping data for table locknlock.specs: ~0 rows (approximately)
DELETE FROM `specs`;
/*!40000 ALTER TABLE `specs` DISABLE KEYS */;
/*!40000 ALTER TABLE `specs` ENABLE KEYS */;

-- Dumping structure for table locknlock.users
DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID người dùng',
  `username` varchar(50) DEFAULT NULL COMMENT 'Tên đăng nhập',
  `hoten` varchar(50) NOT NULL DEFAULT '0' COMMENT 'Họ tên người dùng',
  `email` varchar(50) NOT NULL DEFAULT '0' COMMENT 'email',
  `password` varchar(50) NOT NULL DEFAULT '0' COMMENT 'mật khẩu',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Bảng thông tni người dùng';

-- Dumping data for table locknlock.users: ~0 rows (approximately)
DELETE FROM `users`;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
