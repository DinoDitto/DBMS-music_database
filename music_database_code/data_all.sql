-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2022-06-06 14:59:21
-- 伺服器版本： 10.4.24-MariaDB
-- PHP 版本： 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `data_all`
--

-- --------------------------------------------------------

--
-- 資料表結構 `playlist`
--

CREATE TABLE `playlist` (
  `id` int(11) NOT NULL,
  `playlistTitle` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `playlist`
--

INSERT INTO `playlist` (`id`, `playlistTitle`, `user_id`) VALUES
(14, '開心', 1),
(17, '傷心', 1),
(18, '悲憤', 1),
(20, '六月想聽', 7);

-- --------------------------------------------------------

--
-- 資料表結構 `song`
--

CREATE TABLE `song` (
  `id` int(11) NOT NULL,
  `songTitle` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `singer` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `album` text COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '\'無(單曲)\'',
  `type` text COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '\'無法定義\'',
  `year` year(4) NOT NULL,
  `length` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `song`
--

INSERT INTO `song` (`id`, `songTitle`, `singer`, `album`, `type`, `year`, `length`) VALUES
(1, '閣愛妳一擺', '茄子蛋', '\'無(單曲)\'', '台語流行', 2021, '00:04:39'),
(3, '你不屬於我', '周興哲', '\'無(單曲)\'', '華語流行', 2021, '00:05:23'),
(4, '人間天堂', '王以太', '演說家', '華語嘻哈', 2019, '00:03:28'),
(5, '還沒想好', '王以太', '演說家', '華語嘻哈', 2019, '00:03:54'),
(6, '掛羊頭賣狗肉', '王以太', '演說家', '華語嘻哈', 2019, '00:04:51'),
(9, 'Mojito', '周杰倫', '\'無(單曲)\'', '華語流行', 2020, '00:03:09'),
(10, '我是如此相信', '周杰倫', '\'無(單曲)\'', '華語流行', 2019, '00:04:26'),
(11, '夜曲', '周杰倫', '11月的蕭邦', '華語流行', 2005, '00:03:54'),
(12, '藍色風暴', '周杰倫', '11月的蕭邦', '華語流行', 2005, '00:04:46'),
(14, 'goosebumps', 'Travis Scott', 'Birds in the Trap Sing McKnight', '英語嘻哈', 2016, '00:04:04'),
(15, 'the ends', 'Travis Scott', 'Birds in the Trap Sing McKnight', '英語嘻哈', 2016, '00:03:22'),
(18, 'test', '12', '123', '測試', 2003, '00:03:02');

-- --------------------------------------------------------

--
-- 資料表結構 `song_in_playlist`
--

CREATE TABLE `song_in_playlist` (
  `id` int(11) NOT NULL,
  `song_id` int(30) NOT NULL,
  `playlist_id` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `song_in_playlist`
--

INSERT INTO `song_in_playlist` (`id`, `song_id`, `playlist_id`) VALUES
(30, 3, 14),
(31, 11, 18),
(32, 14, 18),
(35, 15, 17);

-- --------------------------------------------------------

--
-- 資料表結構 `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `birth` date NOT NULL,
  `Email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phoneNum` char(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `userAccount` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `userPassword` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `user`
--

INSERT INTO `user` (`id`, `name`, `gender`, `birth`, `Email`, `phoneNum`, `userAccount`, `userPassword`) VALUES
(1, '小明', '男', '2010-07-05', '4211d@gmail.com', '0972981548', 'test1', '121212'),
(2, '林祥吉', '男', '2001-04-06', '4211good@gmail.com', '0972981547', 'dddino', '123456'),
(3, '小李', '男', '2001-11-06', '42gd@gmail.com', '0978981547', 'lili', '1234999'),
(4, '小狗', '男', '2014-11-06', '4256565d@gmail.com', '0975541547', 'dogdog', '9912599'),
(5, '小貓', '女', '2008-10-04', '42cat5d@gmail.com', '0975541886', 'catcat1', '12catcat'),
(6, '測試', '男', '2013-06-19', '421od@gmail.com', '0972981522', 'test888', '123456'),
(7, '測試人', '男', '2013-06-19', '421od@gmail.com', '0972981522', 'test666', '112233');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `playlist`
--
ALTER TABLE `playlist`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- 資料表索引 `song`
--
ALTER TABLE `song`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `song_in_playlist`
--
ALTER TABLE `song_in_playlist`
  ADD PRIMARY KEY (`id`),
  ADD KEY `song_id` (`song_id`),
  ADD KEY `playlist_id` (`playlist_id`);

--
-- 資料表索引 `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `playlist`
--
ALTER TABLE `playlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `song`
--
ALTER TABLE `song`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `song_in_playlist`
--
ALTER TABLE `song_in_playlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- 已傾印資料表的限制式
--

--
-- 資料表的限制式 `playlist`
--
ALTER TABLE `playlist`
  ADD CONSTRAINT `playlist_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 資料表的限制式 `song_in_playlist`
--
ALTER TABLE `song_in_playlist`
  ADD CONSTRAINT `song_in_playlist_ibfk_1` FOREIGN KEY (`song_id`) REFERENCES `song` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `song_in_playlist_ibfk_2` FOREIGN KEY (`playlist_id`) REFERENCES `playlist` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
