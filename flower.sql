-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2024-12-28 15:09:09
-- 伺服器版本： 10.4.32-MariaDB
-- PHP 版本： 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `flower`
--

-- --------------------------------------------------------

--
-- 資料表結構 `admin`
--

CREATE TABLE `admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `acc` text NOT NULL,
  `pw` text NOT NULL,
  `sh` int(1) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `admin`
--

INSERT INTO `admin` (`id`, `acc`, `pw`, `sh`) VALUES
(1, 'admin', '1234', 0),
(2, 'mandy', '1234', 0),
(4, 'test', '1234', 0);

-- --------------------------------------------------------

--
-- 資料表結構 `ads`
--

CREATE TABLE `ads` (
  `id` int(10) UNSIGNED NOT NULL,
  `text` text NOT NULL,
  `sh` int(1) UNSIGNED NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `ads`
--

INSERT INTO `ads` (`id`, `text`, `sh`) VALUES
(1, '臺灣師大合辦第11屆麋研齋全國硬筆書法比賽活動', 1),
(5, '轉知:教育是人類升沉的樞紐-2013教師生命成長營', 1),
(7, '66666車', 1),
(8, '欣榮圖書館101年悅讀達人徵文比賽，歡迎全校師生踴躍投稿參加', 1),
(9, '轉知:教育是人類升沉的樞紐-2013教師生命成長營', 1);

-- --------------------------------------------------------

--
-- 資料表結構 `bottom`
--

CREATE TABLE `bottom` (
  `id` int(10) UNSIGNED NOT NULL,
  `bottom` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `bottom`
--

INSERT INTO `bottom` (`id`, `bottom`) VALUES
(1, '202412版權所有');

-- --------------------------------------------------------

--
-- 資料表結構 `images`
--

CREATE TABLE `images` (
  `id` int(10) UNSIGNED NOT NULL,
  `img` text NOT NULL,
  `sh` int(1) UNSIGNED NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `images`
--

INSERT INTO `images` (`id`, `img`, `sh`) VALUES
(1, '6.jpg', 1),
(2, '7.jpg', 1),
(4, '8.jpg', 1),
(5, '9.jpg', 1),
(7, '10.jpg', 1),
(8, 'basket.jpg', 1),
(9, '11.jpg', 1),
(10, 'snowman.jpg', 1),
(11, 'su.jpg', 1),
(12, 'su-1.jpg', 1),
(13, '13.jpg', 1),
(14, '15.jpg', 1),
(15, '12.jpg', 1);

-- --------------------------------------------------------

--
-- 資料表結構 `menus`
--

CREATE TABLE `menus` (
  `id` int(10) UNSIGNED NOT NULL,
  `href` text NOT NULL,
  `text` text NOT NULL,
  `sh` int(1) UNSIGNED NOT NULL DEFAULT 1,
  `main_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `menus`
--

INSERT INTO `menus` (`id`, `href`, `text`, `sh`, `main_id`) VALUES
(1, 'http://127.0.0.1/index.php', '網站首頁', 1, 0),
(2, 'http://127.0.0.1/admin.php', '管理登入', 1, 0),
(3, '1111', '111', 1, 1),
(4, '2222', '2222', 1, 1),
(5, '3333', '3333', 1, 1),
(6, '6666', '5555', 1, 2),
(7, '8888', '7777', 1, 2),
(8, '101010', '9999', 1, 2);

-- --------------------------------------------------------

--
-- 資料表結構 `mvims`
--

CREATE TABLE `mvims` (
  `id` int(10) UNSIGNED NOT NULL,
  `img` text NOT NULL,
  `sh` int(1) UNSIGNED NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `mvims`
--

INSERT INTO `mvims` (`id`, `img`, `sh`) VALUES
(1, '0.jpg', 1),
(2, '1.jpg', 1),
(4, '2.jpg', 1),
(5, '3.jpg', 1);

-- --------------------------------------------------------

--
-- 資料表結構 `news`
--

CREATE TABLE `news` (
  `id` int(10) UNSIGNED NOT NULL,
  `img` text NOT NULL,
  `text` text NOT NULL,
  `sh` int(1) UNSIGNED NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `news`
--

INSERT INTO `news` (`id`, `img`, `text`, `sh`) VALUES
(1, '', '手作聖誕花圈工作坊 \r\n費用：1880元（含精美提袋、手作材料、工具及飲品一杯）\r\n✨上課時間（製作過程約2小時）\r\n12月14日（星期六）13:30時\r\n12月20日（星期五）13:30時\r\n✨ 地點：\r\n 光點未來Cafe（文化三路一段191巷32號）\r\n (距離A9捷運站約5分鐘，附近停車方便）', 1),
(2, '', '12月21日 一束送給畢業生的花禮，訂花小姐姐交待希望能典雅一點別太粉但又希望有一點粉～一次過關', 1),
(3, '', '12月 6日 《花????小知識-葉牡丹》\r\n一直覺得葉牡丹有種很接地氣的高級感，很難想像跟我們常見的甘籃真的就是同種的觀賞植物（不能吃喔！），根部生長旺盛，莖部端縮粗壯，高莖品種與多年生栽培者莖較高且略有木質化現象，葉片蓮座狀密集排列，葉圓形或橢圓形，因冬季低溫使心部葉片變色，呈現紫、白、粉紅等色彩', 1),
(4, '', '12月2日 灰色，一個屬於安靜低調的顏色，在包裝材料裡面常常被拿來襯托其它人，但有天自己當了主角，各種不同質地、色調的灰互相交錯也是很有高級感，僅以簡單的白玫瑰、一些常見的綠葉，外搭灰色系包裝，氣勢並不輸我們常見的紅粉紫包裝，我想這束訂花的主人一定對色彩有一定的敏感度，才會大膽的直接指定就是要這樣的花禮～', 1),
(5, '', '11月26日 《永生手提聖誕球》\r\n想改變一下空間感受聖誕節氣息嗎？\r\n或是 想改變一下以往的聖誕節裝飾呢？\r\n這款永生手提聖誕球或許也是個不錯的選擇喔～', 1),
(6, '', '11月23日 《楜桃木邊壓克力畫框-聖誕節系列》近期一直默默地增加聖誕節作品，相較於鐘罩畫框雖然只能看到兩個面但似乎更有延伸感，運用臺灣廠商 mu.flos的花材搭配日本進口葉材果實，整體質感滿分，加上富有童趣的棉花及聖誕樹飾品，是不是更有過節氣息呢？', 1),
(7, '', '手作聖誕花圈工作坊 \r\n費用：1880元（含精美提袋、手作材料、工具及飲品一杯）\r\n✨上課時間（製作過程約2小時）\r\n12月14日（星期六）13:30時\r\n12月20日（星期五）13:30時\r\n✨ 地點：\r\n 光點未來Cafe（文化三路一段191巷32號）\r\n (距離A9捷運站約5分鐘，附近停車方便）', 1);

-- --------------------------------------------------------

--
-- 資料表結構 `titles`
--

CREATE TABLE `titles` (
  `id` int(10) UNSIGNED NOT NULL,
  `img` text NOT NULL,
  `text` text NOT NULL,
  `sh` int(1) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `titles`
--

INSERT INTO `titles` (`id`, `img`, `text`, `sh`) VALUES
(10, '0.logo.jpg', 'logo', 1),
(12, 'logo-1.jpg', 'logo-1', 0),
(14, 'logo-3.jpg', 'logo-2', 0);

-- --------------------------------------------------------

--
-- 資料表結構 `total`
--

CREATE TABLE `total` (
  `id` int(10) UNSIGNED NOT NULL,
  `total` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `total`
--

INSERT INTO `total` (`id`, `total`) VALUES
(1, 10007);

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `ads`
--
ALTER TABLE `ads`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `bottom`
--
ALTER TABLE `bottom`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `mvims`
--
ALTER TABLE `mvims`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `titles`
--
ALTER TABLE `titles`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `total`
--
ALTER TABLE `total`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `ads`
--
ALTER TABLE `ads`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `bottom`
--
ALTER TABLE `bottom`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `images`
--
ALTER TABLE `images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `mvims`
--
ALTER TABLE `mvims`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `news`
--
ALTER TABLE `news`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `titles`
--
ALTER TABLE `titles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `total`
--
ALTER TABLE `total`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
