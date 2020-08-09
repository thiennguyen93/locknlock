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
CREATE DATABASE IF NOT EXISTS `locknlock` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `locknlock`;

-- Dumping structure for table locknlock.categories
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id của danh mục',
  `name` varchar(50) DEFAULT NULL COMMENT 'tên danh mục',
  `description` text DEFAULT NULL COMMENT 'mô tả danh mục',
  `url_img` text DEFAULT NULL COMMENT 'source ảnh danh mục',
  `parentId` int(11) DEFAULT NULL COMMENT 'id danh mục cha',
  `isFrontPage` char(50) DEFAULT 'N' COMMENT 'có hiện lên trang chủ hay không',
  `status` int(1) DEFAULT 1 COMMENT '0: inactive, 1: active',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=67 DEFAULT CHARSET=utf8 COMMENT='Bảng sanh mục sản phẩm';

-- Dumping data for table locknlock.categories: ~66 rows (approximately)
DELETE FROM `categories`;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` (`id`, `name`, `description`, `url_img`, `parentId`, `isFrontPage`, `status`) VALUES
	(1, 'Hộp bảo quản', NULL, 'CA_food_storage.png', NULL, 'Y', 1),
	(2, 'Dụng cụ nấu ăn', NULL, 'CA_cookware_2.png', NULL, 'Y', 1),
	(4, 'Đồ dùng dã ngoại', NULL, 'CA_vacuum_flask.png', NULL, 'Y', 1),
	(6, 'Hàng gia dụng', NULL, 'CA_appliances_1.png', NULL, 'Y', 1),
	(7, 'Phụ kiện nhà bếp', NULL, NULL, NULL, 'N', 1),
	(8, 'Đồ dùng sinh hoạt', NULL, NULL, NULL, 'N', 1),
	(9, 'Đồ dùng trẻ em', NULL, NULL, NULL, 'N', 1),
	(10, 'Đồ Nội thất', NULL, NULL, NULL, 'N', 1),
	(11, 'Hộp kín hơi', NULL, NULL, 1, 'N', 1),
	(12, 'Hộp nhựa', NULL, NULL, 1, 'N', 1),
	(15, 'Chảo/ Chảo sâu lòng', NULL, NULL, 2, 'N', 1),
	(16, 'Nồi chảo/ Nồi áp suất', NULL, NULL, 2, 'N', 1),
	(21, 'Dao/ Kéo', NULL, NULL, 2, 'N', 1),
	(22, 'Thớt', NULL, NULL, 2, 'N', 1),
	(23, 'Bình nước', NULL, NULL, 3, 'N', 1),
	(24, 'Ly/ Cốc', NULL, NULL, 3, 'N', 1),
	(29, 'Bình nước', NULL, 'CA_water_bottle.png', 4, 'Y', 1),
	(30, 'Hộp cơm', NULL, 'CA_lunch_box.png', 4, 'Y', 1),
	(33, 'Hộp cơm giữ nhiệt', NULL, NULL, 5, 'N', 1),
	(34, 'Hộp đựng cháo', NULL, NULL, 5, 'N', 1),
	(39, 'Dụng cụ vệ sinh', NULL, NULL, 7, 'N', 1),
	(46, 'Dụng cụ nhà tắm', NULL, NULL, 8, 'N', 1),
	(47, 'Thùng rác', NULL, NULL, 8, 'N', 1),
	(48, 'Móc/ Kệ treo đồ', NULL, NULL, 8, 'N', 1),
	(51, 'Dụng cụ uống sửa', NULL, NULL, 9, 'N', 1),
	(52, 'Đồ dùng cho bé', NULL, NULL, 9, 'N', 1),
	(55, 'Bàn đa năng', NULL, NULL, 10, 'N', 1),
	(56, 'Kệ treo/ Kệ sách', NULL, NULL, 10, 'N', 1),
	(64, 'Bàn trang điểm/ Gương', NULL, NULL, 10, 'N', 1),
	(66, 'Test menu cấp 3', NULL, NULL, 11, 'N', 1);
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;

-- Dumping structure for table locknlock.comments
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userId` int(11) NOT NULL DEFAULT 0,
  `userName` varchar(50) NOT NULL DEFAULT '0' COMMENT 'Này dành cho comment của những user không đăng nhập',
  `productId` int(11) NOT NULL DEFAULT 0 COMMENT 'id bình luận theo sản phẩm',
  `postId` varchar(11) NOT NULL DEFAULT '0' COMMENT 'id bình luận theo bài viết',
  `comment` varchar(1000) NOT NULL DEFAULT '0' COMMENT 'Nội dung bình luận',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- Dumping data for table locknlock.comments: 0 rows
DELETE FROM `comments`;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;

-- Dumping structure for table locknlock.contacts
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
CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id bài viết',
  `title` varchar(100) DEFAULT NULL COMMENT 'Tên bài viết',
  `authorId` varchar(100) DEFAULT NULL COMMENT 'Id user viết bài',
  `authorName` varchar(100) DEFAULT NULL COMMENT 'Tên user viết bài (nếu không có id)',
  `content` text CHARACTER SET utf8mb4 DEFAULT NULL COMMENT 'Nội dung HTML bài viết',
  `description` varchar(50) DEFAULT NULL,
  `slug` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='Bài viết về sản phẩm';

-- Dumping data for table locknlock.posts: ~2 rows (approximately)
DELETE FROM `posts`;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
INSERT INTO `posts` (`id`, `title`, `authorId`, `authorName`, `content`, `description`, `slug`) VALUES
	(1, '', '1', 'Nguyễn Ngọc Phước Thiện', '<p class=\'text-center\'><img src="http://www.locknlock.vn/prod/spec_img/LBU1285.jpg" title="LBU1285.jpg" ow="750" oh="5243"><br style="clear:both;">&nbsp;</p>', NULL, NULL),
	(2, 'Giới thiệu', '1', 'Nguyễn Ngọc Phước Thiện', '<p data-spm-anchor-id="a2o4n.brand.0.i1.45c4fbfaXRPRoz"><a href="https://locknlockvietnam.com/"><strong>Lock&amp;Lock</strong></a>&nbsp;lu&ocirc;n được người d&ugrave;ng nhắc đến khi t&igrave;m mua c&aacute;c sản phẩm gia dụng chất lượng cao, chắc chắn người ti&ecirc;u d&ugrave;ng sẽ li&ecirc;n tưởng ngay đến h&igrave;nh ảnh hai chiếc kh&oacute;a lồng m&oacute;c v&agrave;o nhau của Lock&amp;Lock.</p>\r\n<p data-spm-anchor-id="a2o4n.brand.0.i1.45c4fbfaXRPRoz">Th&agrave;nh lập từ năm 1985 v&agrave; đặt trụ sở ch&iacute;nh tại Seoul, H&agrave;n Quốc,&nbsp;<strong>Lock&amp;Lock</strong>&nbsp;được biết đến như nh&agrave; ti&ecirc;n phong đưa ra kh&aacute;i niệm mới trong lĩnh vực sản xuất hộp đựng thức ăn 4 kh&oacute;a cạnh. Kh&ocirc;ng ngừng chuy&ecirc;n m&ocirc;n h&oacute;a v&agrave; nỗ lực nghi&ecirc;n cứu, ph&aacute;t triển,<strong>&nbsp;Lock&amp;Lock đ&atilde; trở th&agrave;nh một trong những nh&agrave; sản xuất v&agrave; ph&acirc;n phối vật dụng nh&agrave; bếp nổi tiếng to&agrave;n cầu</strong>, v&agrave; cho đến nay đ&atilde; sản xuất hơn 600 loại sản phẩm gia dụng kh&aacute;c nhau từ đồ d&ugrave;ng gia dụng, đồ d&ugrave;ng d&atilde; ngoại,&nbsp;hộp cơm, hộp bảo quản,&nbsp;b&igrave;nh đựng nước,&nbsp;b&igrave;nh giữ nhiệt, đến&nbsp;dao nấu bếp&nbsp;v&agrave; c&aacute;c sản phẩm gốm sứ.</p>\r\n<p data-spm-anchor-id="a2o4n.brand.0.i1.45c4fbfaXRPRoz">Kh&ocirc;ng chỉ dừng lại ở thị trường trong nước,&nbsp;<strong>Lock&amp;Lock</strong>&nbsp;đ&atilde; mở rộng k&ecirc;nh sản xuất ra tr&ecirc;n&nbsp;85 quốc gia&nbsp;kh&aacute;c nhau như Mỹ, Đức, Nhật Bản, Hong Kong,&hellip; v&agrave; phải kể đến l&agrave; Việt Nam, một trong những quốc gia m&agrave; sản phẩm của&nbsp;<strong>Lock&amp;Lock</strong>&nbsp;đang rất được ưa chuộng v&agrave; tin d&ugrave;ng. Giữ vững gi&aacute; trị cốt l&otilde;i chung &ndash; &ldquo;Đơn giản v&agrave; nhanh ch&oacute;ng&rdquo; v&agrave; quan t&acirc;m s&acirc;u sắc đến con người v&agrave; m&ocirc;i trường, Lock&amp;Lock vẫn tiếp tục cho ra đời c&aacute;c sản phẩm kh&ocirc;ng chỉ mang t&iacute;nh tiện dụng cao m&agrave; c&ograve;n g&oacute;p phần bảo vệ sức khỏe con người v&agrave; giảm thiểu &ocirc; nhiễm m&ocirc;i trường tốt hơn.</p>\r\n<p data-spm-anchor-id="a2o4n.brand.0.i1.45c4fbfaXRPRoz">Hướng đến kh&ocirc;ng gian sống tiện nghi hiện đại v&agrave; tự h&agrave;o l&agrave; đối t&aacute;c ph&acirc;n phối của thương hiệu Lock&amp;Lock tại Việt Nam,&nbsp;<strong>Lock&amp;Lock Việt Nam</strong>&nbsp;&ndash; giới thiệu cho người ti&ecirc;u d&ugrave;ng Việt Nam cơ hội tận hưởng những khuyến m&atilde;i, ưu đ&atilde;i của c&aacute;c&nbsp;<a href="https://locknlockvietnam.com/"><strong>sản phẩm gia dụng Lock&amp;Lock</strong></a>&nbsp;mới nhất hiện nay.</p>', 'trang about', 'gioi-thieu');
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;

-- Dumping structure for table locknlock.products
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID sản phẩm',
  `name` varchar(200) DEFAULT NULL COMMENT 'Tên sản phẩm',
  `description` tinytext DEFAULT NULL COMMENT 'Mô tả sơ lược về sản phẩm',
  `price` int(11) DEFAULT 0 COMMENT 'Giá sản phẩm',
  `postID` int(11) DEFAULT 0 COMMENT 'Bài viết về sản phẩm',
  `categoryID` int(11) DEFAULT NULL,
  `thumbnail_url` varchar(50) DEFAULT NULL COMMENT 'url hình sản phẩm thu nhỏ',
  `created` datetime DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COMMENT='Sảng phẩm';

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
CREATE TABLE IF NOT EXISTS `role` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Mã vai trò',
  `name` varchar(50) NOT NULL DEFAULT '0' COMMENT 'Tên vai trò',
  `adminPage` int(1) NOT NULL DEFAULT 0 COMMENT 'Quyền truy cập trang Admin Y(1)/N(0)',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='Bảng phân quyền';

-- Dumping data for table locknlock.role: 2 rows
DELETE FROM `role`;
/*!40000 ALTER TABLE `role` DISABLE KEYS */;
INSERT INTO `role` (`id`, `name`, `adminPage`) VALUES
	(1, 'Quản trị viên', 1),
	(2, 'Khách hàng', 0);
/*!40000 ALTER TABLE `role` ENABLE KEYS */;

-- Dumping structure for table locknlock.specs
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
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID người dùng',
  `username` varchar(50) DEFAULT NULL COMMENT 'Tên đăng nhập',
  `hoten` varchar(50) NOT NULL DEFAULT '0' COMMENT 'Họ tên người dùng',
  `email` varchar(50) NOT NULL DEFAULT '0' COMMENT 'email',
  `password` varchar(50) NOT NULL DEFAULT '0' COMMENT 'mật khẩu',
  `roleId` int(11) DEFAULT NULL COMMENT 'Phân loại quyền',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COMMENT='Bảng thông tni người dùng';

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
