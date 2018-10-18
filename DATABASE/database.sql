-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Oct 18, 2018 at 05:35 PM
-- Server version: 5.7.21
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `colors`
--
CREATE DATABASE IF NOT EXISTS `colors` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `colors`;

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

DROP TABLE IF EXISTS `invoices`;
CREATE TABLE `invoices` (
  `invoice_id` int(6) UNSIGNED ZEROFILL NOT NULL,
  `user_id` int(6) UNSIGNED ZEROFILL NOT NULL,
  `date_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `order_status` enum('入金待ち','発送待ち','配送中','配送済み','キャンセル') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '入金待ち'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`invoice_id`, `user_id`, `date_time`, `order_status`) VALUES
(000001, 000001, '2018-08-19 21:50:06', '配送中'),
(000002, 000002, '2018-08-19 21:49:10', '配送中'),
(000003, 000003, '2018-08-17 18:05:08', '発送待ち'),
(000004, 000004, '2018-08-17 18:07:11', '入金待ち'),
(000005, 000005, '2018-08-17 18:07:11', '入金待ち'),
(000006, 000006, '2018-08-17 18:07:11', '入金待ち'),
(000007, 000007, '2018-08-17 18:07:11', '入金待ち'),
(000008, 000008, '2018-08-17 18:07:11', '発送待ち'),
(000009, 000009, '2018-08-17 18:07:40', '配送中'),
(000010, 000010, '2018-08-17 18:07:40', '入金待ち'),
(000011, 000003, '2018-09-22 10:58:57', '入金待ち');

-- --------------------------------------------------------

--
-- Table structure for table `invoice_detail`
--

DROP TABLE IF EXISTS `invoice_detail`;
CREATE TABLE `invoice_detail` (
  `invoice_id` int(6) UNSIGNED ZEROFILL NOT NULL,
  `product_id` int(6) UNSIGNED ZEROFILL NOT NULL,
  `quantity_s` int(3) UNSIGNED NOT NULL DEFAULT '0',
  `quantity_m` int(3) UNSIGNED NOT NULL DEFAULT '0',
  `quantity_l` int(3) UNSIGNED NOT NULL DEFAULT '0',
  `quantity_xl` int(3) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `invoice_detail`
--

INSERT INTO `invoice_detail` (`invoice_id`, `product_id`, `quantity_s`, `quantity_m`, `quantity_l`, `quantity_xl`) VALUES
(000001, 000001, 0, 1, 0, 0),
(000002, 000003, 0, 0, 1, 0),
(000003, 000001, 1, 0, 0, 0),
(000004, 000008, 0, 1, 0, 0),
(000005, 000007, 0, 0, 1, 0),
(000006, 000006, 2, 0, 0, 0),
(000007, 000005, 0, 0, 1, 0),
(000008, 000004, 1, 0, 0, 0),
(000010, 000001, 0, 1, 0, 0),
(000011, 000001, 3, 0, 1, 0),
(000011, 000004, 0, 0, 0, 2);

-- --------------------------------------------------------

--
-- Table structure for table `origin`
--

DROP TABLE IF EXISTS `origin`;
CREATE TABLE `origin` (
  `origin_id` int(6) UNSIGNED ZEROFILL NOT NULL,
  `product_id` int(6) UNSIGNED ZEROFILL NOT NULL,
  `country` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `continent` enum('北アメリカ','南アメリカ','南極','アフリカ','ヨーロッパ','アジア','オーストラリア') COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `origin`
--

INSERT INTO `origin` (`origin_id`, `product_id`, `country`, `continent`) VALUES
(000007, 000001, 'フランス', 'ヨーロッパ'),
(000008, 000002, '中国', 'アジア'),
(000009, 000003, '日本', 'アジア'),
(000010, 000004, 'インド', 'アジア'),
(000011, 000005, 'インドネシア', 'アジア'),
(000012, 000006, 'マレーシア', 'アジア'),
(000013, 000007, 'タイ', 'アジア'),
(000014, 000008, 'ギリシャ', 'ヨーロッパ');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

DROP TABLE IF EXISTS `payment`;
CREATE TABLE `payment` (
  `payment_id` int(6) UNSIGNED ZEROFILL NOT NULL,
  `invoice_id` int(6) UNSIGNED ZEROFILL NOT NULL,
  `payment_method` enum('クレジットカード','コンビニ','代金引換','ATM','ネットバンキング') COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_id`, `invoice_id`, `payment_method`, `date_time`) VALUES
(000001, 000001, 'クレジットカード', '2018-08-10 21:00:39'),
(000002, 000002, 'クレジットカード', '2018-08-17 18:36:03'),
(000003, 000003, 'コンビニ', '2018-08-17 18:36:03'),
(000004, 000004, 'クレジットカード', '2018-08-17 18:36:30'),
(000005, 000005, 'クレジットカード', '2018-08-17 18:36:30'),
(000006, 000006, 'コンビニ', '2018-08-17 18:37:51'),
(000007, 000007, 'ATM', '2018-08-17 18:37:51'),
(000008, 000008, 'クレジットカード', '2018-08-17 18:38:57'),
(000009, 000009, 'クレジットカード', '2018-08-17 18:38:57'),
(000010, 000010, 'コンビニ', '2018-08-17 18:38:57'),
(000011, 000011, 'クレジットカード', '2018-09-22 11:17:12');

-- --------------------------------------------------------

--
-- Table structure for table `prefecture`
--

DROP TABLE IF EXISTS `prefecture`;
CREATE TABLE `prefecture` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_kana` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `prefecture`
--

INSERT INTO `prefecture` (`id`, `name`, `name_kana`) VALUES
(1, '北海道', 'ホッカイドウ'),
(2, '青森県', 'アオモリケン'),
(3, '岩手県', 'イワテケン'),
(4, '宮城県', 'ミヤギケン'),
(5, '秋田県', 'アキタケン'),
(6, '山形県', 'ヤマガタケン'),
(7, '福島県', 'フクシマケン'),
(8, '茨城県', 'イバラキケン'),
(9, '栃木県', 'トチギケン'),
(10, '群馬県', 'グンマケン'),
(11, '埼玉県', 'サイタマケン'),
(12, '千葉県', 'チバケン'),
(13, '東京都', 'トウキョウト'),
(14, '神奈川県', 'カナガワケン'),
(15, '新潟県', 'ニイガタケン'),
(16, '富山県', 'トヤマケン'),
(17, '石川県', 'イシカワケン'),
(18, '福井県', 'フクイケン'),
(19, '山梨県', 'ヤマナシケン'),
(20, '長野県', 'ナガノケン'),
(21, '岐阜県', 'ギフケン'),
(22, '静岡県', 'シズオカケン'),
(23, '愛知県', 'アイチケン'),
(24, '三重県', 'ミエケン'),
(25, '滋賀県', 'シガケン'),
(26, '京都府', 'キョウトフ'),
(27, '大阪府', 'オオサカフ'),
(28, '兵庫県', 'ヒョウゴケン'),
(29, '奈良県', 'ナラケン'),
(30, '和歌山県', 'ワカヤマケン'),
(31, '鳥取県', 'トットリケン'),
(32, '島根県', 'シマネケン'),
(33, '岡山県', 'オカヤマケン'),
(34, '広島県', 'ヒロシマケン'),
(35, '山口県', 'ヤマグチケン'),
(36, '徳島県', 'トクシマケン'),
(37, '香川県', 'カガワケン'),
(38, '愛媛県', 'エヒメケン'),
(39, '高知県', 'コウチケン'),
(40, '福岡県', 'フクオカケン'),
(41, '佐賀県', 'サガケン'),
(42, '長崎県', 'ナガサキケン'),
(43, '熊本県', 'クマモトケン'),
(44, '大分県', 'オオイタケン'),
(45, '宮崎県', 'ミヤザキケン'),
(46, '鹿児島県', 'カゴシマケン'),
(47, '沖縄県', 'オキナワケン');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE `product` (
  `product_id` int(2) UNSIGNED ZEROFILL NOT NULL,
  `product_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `price` int(10) UNSIGNED NOT NULL,
  `gender` enum('メンズ','レディース','メンズ・レディース','') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `date_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `price`, `gender`, `description`, `date_time`) VALUES
(01, 'ディアンドルドイツドレス', 6200, 'レディース', '生産地／ ドイツ連邦共和国<br>品質／ コットン100％<br>エプロン取り外し可能<br>ポケットあり\r\n', '2018-10-07 16:41:11'),
(02, '小鞠花柄レトロ振袖', 25000, 'レディース', '生産地／日本<br>品質／ ポリエステル100％<br>髪飾り別売り<br>肌着別売り', '2018-10-07 16:41:38'),
(03, 'ウクライナソロチカドレス', 7500, 'レディース', '生産地／ウクライナ<br>品質／ リネン100％<br>首飾り付き<br>帽子別売り', '2018-10-07 16:42:03'),
(04, 'パキスタンシェルワーニ', 8300, 'メンズ', '生産地／パキスタン<br>品質／ シルク100％<br>上下セット<br>モデル別売り', '2018-10-07 16:42:31'),
(05, 'アチュカンパキスタン', 9200, 'メンズ', '生産地／パキスタン<br>品質／ シルク100％<br>上下セット<br>モデルセット', '2018-10-07 16:43:07'),
(06, 'カラコルキリギスタン', 6800, 'レディース', '生産地／キリギスタン<br>品質／ ポリエステル100％<br>帽子セット<br>山別売り', '2018-10-07 16:43:40'),
(07, 'バナラシシルクサリー', 8205, 'レディース', '生産地／インド<br>品質／ シルク100％<br>スカート取り外し可能<br>ポケットあり', '2018-10-07 16:44:23'),
(08, 'チマチョゴリ', 14000, 'レディース', '生産地／韓国<br>品質／ ポリエステル100％<br>髪飾り別売り<br>肌着別売り', '2018-10-07 16:44:57'),
(09, 'チャイナドレス', 3980, 'レディース', '生産地／中国<br>品質／ ポリエステル100％<br>靴別売り<br>木別売り', '2018-10-08 16:26:15'),
(10, 'ケミスアフガニスタン', 29800, 'レディース', '生産地／アフガニスタン<br>品質／ シルク50％コットン50％<br>靴別売り<br>意外と高いよね', '2018-10-08 16:30:07'),
(11, 'カフタンドレスモロッコ', 25000, 'レディース', '生産地／モロッコ<br>品質／ ポリエステル100％<br>前開きボタン付き<br>手洗いのみ', '2018-10-08 16:30:07'),
(12, 'ウィルピルメキシカンドレス', 12000, 'レディース', '生産地／メキシコ<br>品質／ レーヨン30％コットン30％その他40％<br>一点物<br>上下セパレート', '2018-10-08 16:31:23'),
(13, 'ジャパニンジャ', 10000, 'メンズ', '生産地／日本<br>品質／ ポリエステル100％<br>今の日本に<br>果たしているのか', '2018-10-08 16:31:23'),
(14, 'チョハジョージア', 250000, 'メンズ', '生産地／ジョージア<br>品質／ ???100％<br>右二の腕を<br>木にやられた男', '2018-10-08 16:33:03'),
(15, 'チュッタイ', 25000, 'レディース', '生産地／タイ<br>品質／ ポリエステル100％<br>扇子付き<br>お買い得ですよ', '2018-10-08 16:33:03'),
(16, 'ケンテ', 5600, 'メンズ', '生産地／ガーナ<br>品質／ ポリエステル100％<br>帽子付き<br>靴付き', '2018-10-08 16:35:28'),
(17, 'チョリータドレス', 6800, 'レディース', '生産地／ボリビア<br>品質／ ポリエステル100％<br>スカート付き<br>帽子付き', '2018-10-08 16:35:28'),
(18, 'サラファンドレス', 9800, 'レディース', '生産地／ロシア<br>品質／ ポリエステル100％<br>壺別売り<br>帽子付き', '2018-10-08 16:36:28'),
(19, 'チェコクロイエドレス', 14800, 'メンズ', '生産地／チェコ<br>品質／ ポリエステル100％<br>松野付き<br>松野送料別途', '2018-10-08 16:36:28'),
(20, 'アオザイ', 4800, 'レディース', '生産地／ベトナム<br>品質／ ポリエステル100％<br>肌着付き<br>団扇別売り', '2018-10-08 16:37:00');

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

DROP TABLE IF EXISTS `stock`;
CREATE TABLE `stock` (
  `stock_id` int(6) UNSIGNED ZEROFILL NOT NULL,
  `product_id` int(6) UNSIGNED ZEROFILL NOT NULL,
  `size_s` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `size_m` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `size_l` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `size_xl` int(10) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`stock_id`, `product_id`, `size_s`, `size_m`, `size_l`, `size_xl`) VALUES
(000006, 000001, 100, 100, 100, 100),
(000007, 000002, 100, 100, 100, 100),
(000008, 000003, 100, 100, 100, 100),
(000009, 000004, 100, 100, 100, 100),
(000010, 000005, 100, 100, 100, 100),
(000011, 000006, 100, 100, 100, 100),
(000012, 000007, 100, 100, 100, 100),
(000013, 000008, 100, 100, 100, 100);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `user_id` int(6) UNSIGNED ZEROFILL NOT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `first_name_furigana` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_name_furigana` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `birthday` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `login_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gender` enum('男','女','未回答','') COLLATE utf8_unicode_ci NOT NULL,
  `tel` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `date_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `hash` varchar(32) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `first_name_furigana`, `last_name_furigana`, `birthday`, `email`, `login_name`, `gender`, `tel`, `date_time`, `hash`) VALUES
(000001, 'willy', 'chokee', 'ウィリー', 'チョウ', '1992-08-19', 'willy_choke@gmail.com', 'willy_choke', '未回答', '08066294635', '2018-09-28 16:55:37', '900150983cd24fb0d6963f7d28e17f72'),
(000002, '暉一郎', '榊原', 'キイチロウ', 'サカキハラ', '1980-07-11', 'skkhrkitru@dti.ad.jp', 'sakihara', '男', '	09026334231', '2018-09-29 11:19:44', '900150983cd24fb0d6963f7d28e17f72'),
(000003, '宗司', '河野', 'ムネシ', 'カワノ', '1990-12-01', 'onawak1992@so-net.ne.jp', 'kawano', '男', '09005439082', '2018-09-29 11:20:48', '900150983cd24fb0d6963f7d28e17f72'),
(000004, '久哉', '戸田', 'ヒサヤ', 'トダ', '1975-02-14', 'todahisaya@infoseek.jp ', 'todahisaya', '男', '07078309743 ', '2018-09-29 11:20:58', '900150983cd24fb0d6963f7d28e17f72'),
(000005, 'るり子', '向井', 'ルリコ', 'ムカイ', '1997-08-06', 'ruti@pory.or.jp', 'ruriko', '女', '07028350843', '2018-09-29 11:43:17', '900150983cd24fb0d6963f7d28e17f72'),
(000006, '絵美', '片桐', 'エミ', 'カタギリ', '1990-05-09', 'ime1990@web.ad.jp  ', 'emi1990', '女', '09099952379 ', '2018-09-29 11:21:14', '900150983cd24fb0d6963f7d28e17f72'),
(000007, '梨恵子', '堀江', 'リエコ', 'ホリエ', '1980-04-06', 'okeir9968@plala.or.jp', 'horie', '女', '07028350843', '2018-09-29 11:21:20', '900150983cd24fb0d6963f7d28e17f72'),
(000008, '永子', '菅', 'ナガコ', 'スガ', '1991-01-27', 'suga75@dti.ad.jp', 'suga1991', '女', '09010656847', '2018-09-29 11:21:29', '900150983cd24fb0d6963f7d28e17f72'),
(000009, '智子', '木下', 'トモコ', 'キシタ', '2002-11-30', 'kisita.tomoko@infoseek.jp', 'tomoko', '女', '07056079505', '2018-09-29 11:21:42', '900150983cd24fb0d6963f7d28e17f72'),
(000010, '孝彦', '森岡', 'タカヒコ', 'モリオカ', '1998-08-11', 'morioka_takahiko@eaccess.net', 'morioka', '男', '09085022082 ', '2018-09-29 11:21:51', '900150983cd24fb0d6963f7d28e17f72');

-- --------------------------------------------------------

--
-- Table structure for table `user_act`
--

DROP TABLE IF EXISTS `user_act`;
CREATE TABLE `user_act` (
  `user_act_id` int(6) UNSIGNED ZEROFILL NOT NULL,
  `user_id` int(6) UNSIGNED ZEROFILL NOT NULL,
  `type_of_act` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `detail` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `date_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_act`
--

INSERT INTO `user_act` (`user_act_id`, `user_id`, `type_of_act`, `detail`, `date_time`) VALUES
(000001, 000001, 'コメントしました', 'ほしい洋服を探していると必ずといっていいほどたどりつくのがこのサイト！ \r\nほんとに毎回品揃えの多さにはびっくりします！ ', '2018-08-10 19:52:19');

-- --------------------------------------------------------

--
-- Table structure for table `user_address`
--

DROP TABLE IF EXISTS `user_address`;
CREATE TABLE `user_address` (
  `address_id` int(6) UNSIGNED ZEROFILL NOT NULL,
  `user_id` int(6) UNSIGNED ZEROFILL NOT NULL,
  `postal_code` int(7) NOT NULL,
  `province` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `detail` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_address`
--

INSERT INTO `user_address` (`address_id`, `user_id`, `postal_code`, `province`, `detail`) VALUES
(000001, 000001, 1660011, '東京都', '杉並区高円寺南3-3-3ツチダビル3701'),
(000002, 000002, 6200071, '京都府', '福知山市一尾2-8-9'),
(000003, 000003, 6210805, '京都府', '亀岡市安町9-2-1'),
(000004, 000004, 7422714, '山口県', '大島郡周防大島町戸田3-14-9'),
(000005, 000005, 7760001, '徳島県', '吉野川市鴨島町牛島6-15-5'),
(000006, 000006, 6308323, '奈良県', '奈良市京終地方東側町9-11-6'),
(000007, 000007, 1350047, '東京都', '江東区富岡6-6-2'),
(000008, 000008, 9103404, '福井県', '福井市大丹生町7-8-8'),
(000009, 000009, 6711111, '兵庫県', '姫路市広畑区北河原町9-6-2 セトル広畑区北河原町 13階'),
(000010, 000010, 4260055, '静岡県', '藤枝市大西町4-3-9 東横イン・大西町 12階');

-- --------------------------------------------------------

--
-- Table structure for table `visitor_count`
--

DROP TABLE IF EXISTS `visitor_count`;
CREATE TABLE `visitor_count` (
  `count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `visitor_count`
--

INSERT INTO `visitor_count` (`count`) VALUES
(451);

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

DROP TABLE IF EXISTS `wishlist`;
CREATE TABLE `wishlist` (
  `user_id` int(6) UNSIGNED ZEROFILL NOT NULL,
  `product_id` int(6) UNSIGNED ZEROFILL NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`invoice_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `invoice_detail`
--
ALTER TABLE `invoice_detail`
  ADD PRIMARY KEY (`invoice_id`,`product_id`),
  ADD KEY `invoice_detail_ibfk_2` (`product_id`);

--
-- Indexes for table `origin`
--
ALTER TABLE `origin`
  ADD PRIMARY KEY (`origin_id`),
  ADD KEY `origin_ibfk_1` (`product_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `invoice_id` (`invoice_id`);

--
-- Indexes for table `prefecture`
--
ALTER TABLE `prefecture`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`stock_id`),
  ADD KEY `stock_ibfk_1` (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_act`
--
ALTER TABLE `user_act`
  ADD PRIMARY KEY (`user_act_id`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- Indexes for table `user_address`
--
ALTER TABLE `user_address`
  ADD PRIMARY KEY (`address_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `visitor_count`
--
ALTER TABLE `visitor_count`
  ADD PRIMARY KEY (`count`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`user_id`,`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `invoice_id` int(6) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `origin`
--
ALTER TABLE `origin`
  MODIFY `origin_id` int(6) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(6) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(2) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `stock_id` int(6) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(6) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user_act`
--
ALTER TABLE `user_act`
  MODIFY `user_act_id` int(6) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_address`
--
ALTER TABLE `user_address`
  MODIFY `address_id` int(6) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `visitor_count`
--
ALTER TABLE `visitor_count`
  MODIFY `count` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=452;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `invoices`
--
ALTER TABLE `invoices`
  ADD CONSTRAINT `invoices_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `invoice_detail`
--
ALTER TABLE `invoice_detail`
  ADD CONSTRAINT `invoice_detail_ibfk_1` FOREIGN KEY (`invoice_id`) REFERENCES `invoices` (`invoice_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `invoice_detail_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `origin`
--
ALTER TABLE `origin`
  ADD CONSTRAINT `origin_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`invoice_id`) REFERENCES `invoices` (`invoice_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `stock`
--
ALTER TABLE `stock`
  ADD CONSTRAINT `stock_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_act`
--
ALTER TABLE `user_act`
  ADD CONSTRAINT `user_act_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_address`
--
ALTER TABLE `user_address`
  ADD CONSTRAINT `user_address_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);