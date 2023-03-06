-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost:3306
-- Thời gian đã tạo: Th3 06, 2023 lúc 02:06 PM
-- Phiên bản máy phục vụ: 8.0.30
-- Phiên bản PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `btth01_cse485`
--

DELIMITER $$
--
-- Thủ tục
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_DSBaiViet` (IN `ten` VARCHAR(50))   BEGIN
    DECLARE id INT DEFAULT -1;
    SET id = (SELECT ma_tloai
    FROM theloai WHERE ten_tloai = ten);
    IF id >= 0
    THEN 
        SELECT * FROM baiviet 
        WHERE ma_tloai = id;
    ELSE 
        SELECT "Khong ton tai the loai tren";
    END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `test` (IN `ten` VARCHAR(50))   BEGIN
    SELECT * FROM theloai WHERE ten_tloai = ten;    
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `baiviet`
--

CREATE TABLE `baiviet` (
  `ma_bviet` int UNSIGNED NOT NULL,
  `tieude` varchar(200) NOT NULL,
  `ten_bhat` varchar(100) NOT NULL,
  `ma_tloai` int UNSIGNED NOT NULL,
  `tomtat` text NOT NULL,
  `noidung` text,
  `ma_tgia` int UNSIGNED NOT NULL,
  `ngayviet` date NOT NULL,
  `hinhanh` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `baiviet`
--

INSERT INTO `baiviet` (`ma_bviet`, `tieude`, `ten_bhat`, `ma_tloai`, `tomtat`, `noidung`, `ma_tgia`, `ngayviet`, `hinhanh`) VALUES
(4, 'Quê tôi!', 'Quê hương', 5, 'Quê hương là gì mà chở đầy kí ức nhỏ xinh. Có đám trẻ nô đùa bên nhau dưới gốc ổi nhà bà Năm giữa trưa nắng gắt chỉ để chờ bà đi vắng là hái trộm. Có hai anh em tôi bì bõm lội sình bắt cua đem về nhà cho mẹ nấu canh, nấu cháo… Có ba chị em tôi lục đục tự nấu ăn khi mẹ vắng nhà. Có anh tôi luôn dắt tôi đi cùng đường ngõ xóm chỉ để em được vui. Có cả những trận cãi nhau nảy lửa của ba anh em nữa…', '', 5, '2014-02-20', 'assets/image_article/screencapture-127-0-0-1-8000-admin-product-2023-02-28-22_25_22.png'),
(5, 'Đất nước', 'Đất nước', 5, 'Đã bao nhiêu lần tôi tự hỏi: liệu trên Thế giới này có nơi nào chiến tranh tang thương mà lại rất đổi anh hùng như nước mình không? Liệu có mảnh đất nào mà mỗi tấc đất hôm nay đã thấm máu xương của những thế hệ đi trước nhiều như nước mình không? Và, liệu có một đất nước nào lại có nhiều bà mẹ đau khổ nhưng cũng hết sức gan góc như đất nước mình không?', NULL, 1, '2010-05-25', NULL),
(6, 'Hard Rock Hallelujah', 'Hard Rock Hallelujah', 7, 'Những linh hồn đang lạc lối, mù quáng mất phương hướng trong cõi trần gian đầy nghiệt ngã hãy nên lắng nghe \"Hard Rock Hallelujah\" để có thể quên tất cả mọi thứ để tìm về đúng bản chất sâu thẳm nhất trong tâm hồn chính mình!', NULL, 6, '2013-09-12', NULL),
(7, 'The Unforgiven', 'The Unforgiven', 7, 'Lâu lắm rồi mới nghe lại The Unforgiven II, vì bài này không phải là bài mà tôi thích. Anh bạn tôi lúc trước, đi đâu cũng nghêu ngao bài này ấy, chỉ tại vì hắn đang... thất tình mà lị. Mà sao Metallica có The Unforgiven rồi lại có thêm bài này chi nữa vậy không biết nữa, làm cho tôi cảm thấy hình như hơi bị đúng so với tâm trạng của tôi lúc này.', NULL, 1, '2010-05-25', NULL),
(9, 'Love Me Like There’s No Tomorrow', 'Love Me Like There’s No Tomorrow', 8, 'Nếu ai đã từng yêu Queen, yêu cái chất giọng cao, sắc sảo như một vết cắt thật ngọt ẩn giấu bao cảm xúc mãnh liệt của Freddie chắc không thể không \"điêu đứng\" mỗi khi nghe Love Me Like There’s No Tomorrow.', NULL, 1, '2013-02-26', NULL),
(10, 'I\'m stronger', 'I\'m stronger', 7, 'Em không phải là người giỏi giấu cảm xúc, nhưng em lại là người giỏi đoán biết cảm xúc của người khác vậy nên đừng cố nói nhớ em, rằng mọi thứ chỉ là do hoàn cảnh. Và cũng đừng dối em rằng anh đã từng yêu em. Em nhắm mắt cũng cảm nhận được mà, thật đấy', NULL, 2, '2013-08-21', NULL),
(11, 'Ôi Cuộc Sống Mến Thương', 'Ôi Cuộc Sống Mến Thương', 5, 'Có một câu nói như thế này \"Âm nhạc là một cái gì khác lạ mà hầu như tôi muốn nói nó là một phép thần diệu.Vì nó đứng giữa tư tưởng và hiện tượng, tinh thần và vật chất, mọi thứ trung gian mơ hồ thế đó mà không là thế đó giữa các sự vật mà âm nhạc hòa giải\"', NULL, 2, '2011-10-09', NULL),
(12, 'Cây và gió', 'Cây và gió', 7, 'Em và anh, hai đứa quen nhau thật tình cờ. Lời hát của anh từ bài hát “Cây và gió” đã làm tâm hồn em xao động. Nhưng sự thật phũ phàng rằng em chưa bao giờ nói cho anh biết những suy nghĩ tận sâu trong tim mình. Bởi vì em nhút nhát, em không dám đối mặt với thực tế khắc nghiệt, hay thực ra em không dám đối diện với chính mình.', NULL, 7, '2013-12-05', NULL);

--
-- Bẫy `baiviet`
--
DELIMITER $$
CREATE TRIGGER `SLBaiViet` AFTER INSERT ON `baiviet` FOR EACH ROW BEGIN 
    
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tacgia`
--

CREATE TABLE `tacgia` (
  `ma_tgia` int UNSIGNED NOT NULL,
  `ten_tgia` varchar(100) NOT NULL,
  `hinh_tgia` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `tacgia`
--

INSERT INTO `tacgia` (`ma_tgia`, `ten_tgia`, `hinh_tgia`) VALUES
(1, 'Nhacvietplus', 'assets/image_author/screencapture-127-0-0-1-8000-about-2023-02-28-22_09_59.png'),
(2, 'Sưu tầm', NULL),
(3, 'Sandy', NULL),
(4, 'Lê Trung Ngân', NULL),
(5, 'Khánh Ngọc', NULL),
(6, 'Night Stalker', NULL),
(7, 'Phạm Phương Anh', NULL),
(8, 'Tâm tình', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `theloai`
--

CREATE TABLE `theloai` (
  `ma_tloai` int UNSIGNED NOT NULL,
  `ten_tloai` varchar(50) NOT NULL,
  `SLBaiViet` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `theloai`
--

INSERT INTO `theloai` (`ma_tloai`, `ten_tloai`, `SLBaiViet`) VALUES
(3, 'Nhạc cách mạng', NULL),
(4, 'Nhạc thiếu nhi', NULL),
(5, 'Nhạc quê hương', NULL),
(6, 'POP', NULL),
(7, 'Rock', NULL),
(8, 'R&B', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `isAdmin` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `isAdmin`) VALUES
(1, 'admin', 'admin', 1),
(2, 'user', '123', 0);

-- --------------------------------------------------------

--
-- Cấu trúc đóng vai cho view `vw_music`
-- (See below for the actual view)
--
CREATE TABLE `vw_music` (
`hinhanh` varchar(200)
,`ma_bviet` int unsigned
,`ma_tgia` int unsigned
,`ma_tloai` int unsigned
,`ngayviet` date
,`noidung` text
,`ten_bhat` varchar(100)
,`ten_tgia` varchar(100)
,`ten_tloai` varchar(50)
,`tieude` varchar(200)
,`tomtat` text
);

-- --------------------------------------------------------

--
-- Cấu trúc cho view `vw_music`
--
DROP TABLE IF EXISTS `vw_music`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_music`  AS SELECT `bv`.`ma_bviet` AS `ma_bviet`, `bv`.`tieude` AS `tieude`, `bv`.`ten_bhat` AS `ten_bhat`, `bv`.`ma_tloai` AS `ma_tloai`, `bv`.`tomtat` AS `tomtat`, `bv`.`noidung` AS `noidung`, `bv`.`ma_tgia` AS `ma_tgia`, `bv`.`ngayviet` AS `ngayviet`, `bv`.`hinhanh` AS `hinhanh`, `tg`.`ten_tgia` AS `ten_tgia`, `tl`.`ten_tloai` AS `ten_tloai` FROM ((`baiviet` `bv` join `tacgia` `tg` on((`tg`.`ma_tgia` = `bv`.`ma_tgia`))) join `theloai` `tl` on((`tl`.`ma_tloai` = `bv`.`ma_tloai`)))  ;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `baiviet`
--
ALTER TABLE `baiviet`
  ADD PRIMARY KEY (`ma_bviet`),
  ADD KEY `ma_tloai` (`ma_tloai`),
  ADD KEY `ma_tgia` (`ma_tgia`);

--
-- Chỉ mục cho bảng `tacgia`
--
ALTER TABLE `tacgia`
  ADD PRIMARY KEY (`ma_tgia`);

--
-- Chỉ mục cho bảng `theloai`
--
ALTER TABLE `theloai`
  ADD PRIMARY KEY (`ma_tloai`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `baiviet`
--
ALTER TABLE `baiviet`
  MODIFY `ma_bviet` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `tacgia`
--
ALTER TABLE `tacgia`
  MODIFY `ma_tgia` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `theloai`
--
ALTER TABLE `theloai`
  MODIFY `ma_tloai` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `baiviet`
--
ALTER TABLE `baiviet`
  ADD CONSTRAINT `baiviet_ibfk_1` FOREIGN KEY (`ma_tloai`) REFERENCES `theloai` (`ma_tloai`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `baiviet_ibfk_2` FOREIGN KEY (`ma_tgia`) REFERENCES `tacgia` (`ma_tgia`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
