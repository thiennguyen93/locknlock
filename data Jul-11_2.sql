-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.26 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             10.2.0.5599
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
  `description` text COMMENT 'mô tả danh mục',
  `url_img` text COMMENT 'source ảnh danh mục',
  `parentId` int(11) DEFAULT NULL COMMENT 'id danh mục cha',
  `isFrontPage` char(50) DEFAULT 'N' COMMENT 'có hiện lên trang chủ hay không',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Bảng sanh mục sản phẩm';

-- Dumping data for table locknlock.categories: ~64 rows (approximately)
DELETE FROM `categories`;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` (`id`, `name`, `description`, `url_img`, `parentId`, `isFrontPage`) VALUES
	(1, 'Hộp bảo quản', NULL, 'CA_food_storage.png', NULL, ' Y'),
	(2, 'Dụng cụ nấu ăn', NULL, 'CA_cookware_2.png', NULL, 'Y'),
	(3, 'Đồ dùng trên bàn', NULL, NULL, NULL, 'N'),
	(4, 'Đồ dùng dã ngoại', NULL, 'CA_vacuum_flask.png', NULL, 'Y'),
	(5, 'Bình giữ nhiệt/ Giữ lạnh', NULL, NULL, NULL, 'N'),
	(6, 'Hàng gia dụng', NULL, 'CA_appliances_1.png', NULL, 'Y'),
	(7, 'Phụ kiện nhà bếp', NULL, NULL, NULL, 'N'),
	(8, 'Đồ dùng sinh hoạt', NULL, NULL, NULL, 'N'),
	(9, 'Đồ dùng trẻ em', NULL, NULL, NULL, 'N'),
	(10, 'Đồ Nội thất', NULL, NULL, NULL, 'N'),
	(11, 'Hộp kín hơi', NULL, NULL, 1, 'N'),
	(12, 'Hộp nhựa', NULL, NULL, 1, 'N'),
	(13, 'Hủ gia vị', NULL, NULL, 1, 'N'),
	(14, 'Nắp hộp kín hơi', NULL, NULL, 1, 'N'),
	(15, 'Chảo/ Chảo sâu lòng', NULL, NULL, 2, 'N'),
	(16, 'Nồi chảo/ Nồi áp suất', NULL, NULL, 2, 'N'),
	(17, 'Dùng cho lò nướng', NULL, NULL, 2, 'N'),
	(18, 'Dụng cụ trộn thực phẩm', NULL, NULL, 2, 'N'),
	(19, 'Khay/ rổ', NULL, NULL, 2, 'N'),
	(20, 'Dụng cụ nhà bếp/ Đồ gắp', NULL, NULL, 2, 'N'),
	(21, 'Dao/ Kéo', NULL, NULL, 2, 'N'),
	(22, 'Thớt', NULL, NULL, 2, 'N'),
	(23, 'Bình nước', NULL, NULL, 3, 'N'),
	(24, 'Ly/ Cốc', NULL, NULL, 3, 'N'),
	(25, 'Đế nồi', NULL, NULL, 3, 'N'),
	(26, 'Khay', NULL, NULL, 3, 'N'),
	(27, 'Tấm lót bàn ăn', NULL, NULL, 3, 'N'),
	(28, 'Ấm đun nước', NULL, NULL, 3, 'N'),
	(29, 'Bình nước', NULL, 'CA_water_bottle.png', 4, 'Y'),
	(30, 'Hộp cơm', NULL, 'CA_lunch_box.png', 4, 'Y'),
	(31, 'Đồ dùng du lịch', NULL, NULL, 4, 'N'),
	(32, 'Đồ dùng cắm trại', NULL, NULL, 4, 'N'),
	(33, 'Hộp cơm giữ nhiệt', NULL, NULL, 5, 'N'),
	(34, 'Hộp đựng cháo', NULL, NULL, 5, 'N'),
	(35, 'Bình giữ nhiệt/ Giữ lạnh', NULL, NULL, 5, 'N'),
	(36, 'Túi chườm đá', NULL, NULL, 5, 'N'),
	(37, 'Thiết bị nhà bếp', NULL, NULL, 6, 'N'),
	(38, 'Thiết bị gia dụng', NULL, NULL, 6, 'N'),
	(39, 'Dụng cụ vệ sinh', NULL, NULL, 7, 'N'),
	(40, 'Đồ rửa chén', NULL, NULL, 7, 'N'),
	(41, 'Dụng cụ làm đá', NULL, NULL, 7, 'N'),
	(42, 'Dụng cụ nấu ăn', NULL, NULL, 7, 'N'),
	(43, 'Giá/ Kệ', NULL, NULL, 7, 'N'),
	(44, 'Hàng dùng một lần', NULL, NULL, 7, 'N'),
	(45, 'Dụng cụ bảo quản tủ lạnh', NULL, NULL, 7, 'N'),
	(46, 'Dụng cụ nhà tắm', NULL, NULL, 8, 'N'),
	(47, 'Thùng rác', NULL, NULL, 8, 'N'),
	(48, 'Móc/ Kệ treo đồ', NULL, NULL, 8, 'N'),
	(49, 'Chăn/ra/gối', NULL, NULL, 8, 'N'),
	(50, 'Cây lau nhà', NULL, NULL, 8, 'N'),
	(51, 'Dụng cụ uống sửa', NULL, NULL, 9, 'N'),
	(52, 'Đồ dùng cho bé', NULL, NULL, 9, 'N'),
	(53, 'Dụng cụ vệ sinh cho bé', NULL, NULL, 9, 'N'),
	(54, 'Thảm cho bé', NULL, NULL, 9, 'N'),
	(55, 'Bàn đa năng', NULL, NULL, 10, 'N'),
	(56, 'Kệ treo/ Kệ sách', NULL, NULL, 10, 'N'),
	(57, 'Bàn/ Tủ/ Ghế', NULL, NULL, 10, 'N'),
	(58, 'Giường', NULL, NULL, 10, 'N'),
	(59, 'Sofa/ Đồ dùng phòng khách', NULL, NULL, 10, 'N'),
	(60, 'Thảm', NULL, NULL, 10, 'N'),
	(61, 'Phụ kiện nội thất', NULL, NULL, 10, 'N'),
	(62, 'Đèn', NULL, NULL, 10, 'N'),
	(63, 'Tủ quần áo/ Tủ lắp ráp', NULL, NULL, 10, 'N'),
	(64, 'Bàn trang điểm/ Gương', NULL, NULL, 10, 'N');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;

-- Dumping structure for table locknlock.comments
DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userId` int(11) NOT NULL DEFAULT '0',
  `userName` varchar(50) NOT NULL DEFAULT '0' COMMENT 'Này dành cho comment của những user không đăng nhập',
  `productId` int(11) NOT NULL DEFAULT '0' COMMENT 'id bình luận theo sản phẩm',
  `postId` varchar(11) NOT NULL DEFAULT '0' COMMENT 'id bình luận theo bài viết',
  `comment` varchar(1000) NOT NULL DEFAULT '0' COMMENT 'Nội dung bình luận',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- Dumping data for table locknlock.comments: 0 rows
DELETE FROM `comments`;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;

-- Dumping structure for table locknlock.contacts
DROP TABLE IF EXISTS `contacts`;
CREATE TABLE IF NOT EXISTS `contacts` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id',
  `email` varchar(50) DEFAULT NULL COMMENT 'email khách hàng',
  `name` varchar(50) DEFAULT NULL COMMENT 'tên khách hàng',
  `subject` varchar(50) DEFAULT NULL COMMENT 'chủ đề liên hệ',
  `content` text COMMENT 'Nội dung',
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
  `content` text CHARACTER SET utf8mb4 COMMENT 'Nội dung HTML bài viết',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Bài viết về sản phẩm';

-- Dumping data for table locknlock.posts: ~1 rows (approximately)
DELETE FROM `posts`;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
INSERT INTO `posts` (`id`, `content`) VALUES
	(1, '<p class=\'text-center\'><img src="http://www.locknlock.vn/prod/spec_img/LBU1285.jpg" title="LBU1285.jpg" ow="750" oh="5243"><br style="clear:both;">&nbsp;</p>');
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;

-- Dumping structure for table locknlock.products
DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID sản phẩm',
  `name` varchar(200) DEFAULT NULL COMMENT 'Tên sản phẩm',
  `description` tinytext COMMENT 'Mô tả sơ lược về sản phẩm',
  `price` int(11) DEFAULT '0' COMMENT 'Giá sản phẩm',
  `postID` int(11) DEFAULT '0' COMMENT 'Bài viết về sản phẩm',
  `categoryID` int(11) DEFAULT NULL,
  `thumbnail_url` varchar(50) DEFAULT NULL COMMENT 'url hình sản phẩm thu nhỏ',
  `created` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Sảng phẩm';

-- Dumping data for table locknlock.products: ~11 rows (approximately)
DELETE FROM `products`;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` (`id`, `name`, `description`, `price`, `postID`, `categoryID`, `thumbnail_url`, `created`) VALUES
	(1, 'Bộ 3 hộp thủy tinh L&L Euro', 'LLG214*2, LLG224*1', 570000, 0, 11, '1.jpg', '2020-07-10 13:41:25'),
	(2, 'HPL550- Hộp bảo quản gạo bằng nhựa Lock&Lock 12kg', NULL, 290000, 0, 11, '2.jpg', '2020-07-11 12:41:26'),
	(3, 'Hộp nhựa L&L Twist Two way 760ml+310ml - Nắp màu đỏ', NULL, 99000, 0, 12, '3.jpg', '2020-07-11 09:41:26'),
	(5, 'Hộp nhựa L&L Twist Two way 560ml+310ml - Nắp màu đỏ', NULL, 95000, 0, 12, '4.jpg', '2020-07-10 14:41:27'),
	(6, 'Chảo nhôm sâu lòng chống dính BAUM Marble 30cm, 1 tay cầm, nắp thủy tinh, hiệu L&L', NULL, 759000, 0, 15, '5.jpg', '2020-06-11 14:41:28'),
	(7, 'Chảo nhôm sâu lòng chống dính BAUM Marble 28cm, 1 tay cầm, nắp thủy tinh, hiệu L&L', NULL, 669000, 1, 15, '6.jpg', '2020-05-11 14:41:29'),
	(8, 'Nồi nhôm chống dính BAUM Marble 24cm, 2 tay cầm, nắp thủy tinh, hiệu L&L', NULL, 749000, 0, 16, '7.jpg', '2020-07-16 14:41:29'),
	(9, 'Bộ nồi ZEN COOK BALLOON bằng sứ', '2 cái nồi + 2 cái nắp', 2000000, 0, 16, '8.jpg', '2020-07-11 06:41:30'),
	(10, 'Bộ 3 Tô Trộn Thủy Tinh Chịu Nhiệt Boroseal Lock&Lock ', 'LLG013S3 (1.5L / Tô)', 589000, 0, 18, '9.jpg', '2020-07-12 06:41:31'),
	(11, 'CKK101S5BLK - Bộ dao nhà bếp 5 món COOKPLUS Lock & Lock', 'Dao: 4 cái ; Dụng cụ gọt vỏ trái cây: 1 cái', 250000, 0, 21, '10.jpg', '2020-05-11 10:41:32'),
	(12, 'Bộ 2 thớt gỗ cây cao su', '1 thớt hình chữ nhật + 1 thớt ping pong', 350000, 0, 22, '11.jpg', '2020-03-11 08:41:32');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;

-- Dumping structure for table locknlock.role
DROP TABLE IF EXISTS `role`;
CREATE TABLE IF NOT EXISTS `role` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Mã vai trò',
  `name` varchar(50) NOT NULL DEFAULT '0' COMMENT 'Tên vai trò',
  `adminPage` int(1) NOT NULL DEFAULT '0' COMMENT 'Quyền truy cập trang Admin Y(1)/N(0)',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Bảng phân quyền';

-- Dumping data for table locknlock.role: 2 rows
DELETE FROM `role`;
/*!40000 ALTER TABLE `role` DISABLE KEYS */;
INSERT INTO `role` (`id`, `name`, `adminPage`) VALUES
	(1, 'Quản trị viên', 1),
	(2, 'Khách hàng', 0);
/*!40000 ALTER TABLE `role` ENABLE KEYS */;

-- Dumping structure for table locknlock.specs
DROP TABLE IF EXISTS `specs`;
CREATE TABLE IF NOT EXISTS `specs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `productID` int(11) DEFAULT '0' COMMENT 'ID sản phẩm',
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
  `roleId` int(11) DEFAULT NULL COMMENT 'Phân loại quyền',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Bảng thông tni người dùng';

-- Dumping data for table locknlock.users: ~2 rows (approximately)
DELETE FROM `users`;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `username`, `hoten`, `email`, `password`, `roleId`) VALUES
	(1, 'admin', 'Nguyễn Ngọc Phước Thiện', 'info@thiennguyenpro.com', '123456', 1),
	(2, 'user1', 'Nguyễn Thiện Nhân', 'thiennhan@gmail.com', '123456', 2);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
