-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- ホスト: 127.0.0.1
-- 生成日時: 2025-01-13 14:46:39
-- サーバのバージョン： 10.4.32-MariaDB
-- PHP のバージョン: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `people_info`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `birthday` varchar(10) NOT NULL,
  `mail` varchar(40) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- テーブルのデータのダンプ `users`
--

INSERT INTO `users` (`id`, `name`, `gender`, `birthday`, `mail`, `created_at`, `updated_at`) VALUES
(1, 'あべ', '女性', '2025-01-01', 'abe@contoso.com', '2025-01-10 23:39:02', '2025-01-10 23:39:02'),
(2, 'くどう', '女性', '2025-01-01', 'kudo@contoso.com', '2025-01-11 11:07:43', '2025-01-11 11:07:43'),
(3, 'くどう', '女性', '2025-01-01', 'kudo@contoso.com', '2025-01-11 11:26:08', '2025-01-11 11:26:08'),
(4, 'すずき', '男性', '2024-12-31', 'suzuki@contoso.com', '2025-01-12 11:48:54', '2025-01-12 11:48:54'),
(5, 'さとう', '男性', '2025-01-01', 'sato@contoso.com', '2025-01-13 09:22:50', '2025-01-13 09:22:50'),
(6, 'SUZUKI', '女性', '2025-01-01', 'suzuki@sontoso.com', '2025-01-13 13:47:41', '2025-01-13 14:18:57'),
(7, '太田Ota', '男性', '2024-05-01', 'ota@contoso.com', '2025-01-13 14:23:18', '2025-01-13 14:37:03'),
(8, 'ito', '男性', '1998-07-08', 'ito@conroso.com', '2025-01-13 14:41:29', '2025-01-13 14:41:29'),
(9, 'ito', '男性', '1998-07-08', 'ito@conroso.com', '2025-01-13 14:42:24', '2025-01-13 14:42:24'),
(10, 'ito', '男性', '1998-07-08', 'ito@conroso.com', '2025-01-13 14:42:34', '2025-01-13 14:42:34'),
(11, 'ito伊藤', '男性', '1998-07-01', 'ito@conroso.com', '2025-01-13 14:42:46', '2025-01-13 15:06:00'),
(15, 'a', '男性', '2025-01-16', 'aa', '2025-01-13 21:17:24', '2025-01-13 21:17:24');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
