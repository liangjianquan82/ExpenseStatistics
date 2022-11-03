-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- 主机： 127.0.0.1
-- 生成日期： 2022-11-03 14:48:38
-- 服务器版本： 10.4.24-MariaDB
-- PHP 版本： 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 数据库： `expstat1`
--

-- --------------------------------------------------------

--
-- 表的结构 `fee_bill`
--

CREATE TABLE `fee_bill` (
  `bill_id` int(11) NOT NULL,
  `type_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `bill_time` date NOT NULL DEFAULT current_timestamp(),
  `Remark` text DEFAULT NULL,
  `amount` decimal(8,2) DEFAULT 0.00,
  `state` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 转存表中的数据 `fee_bill`
--

INSERT INTO `fee_bill` (`bill_id`, `type_id`, `user_id`, `bill_time`, `Remark`, `amount`, `state`, `user_name`) VALUES
(1, 1, 1, '2022-11-02', '', '20.00', 1, ''),
(4, 3, NULL, '2022-11-02', '', '30.00', 1, 'user1111@gmail.com'),
(5, 6, NULL, '2022-11-02', '', '100.00', 1, 'user1111@gmail.com'),
(6, 7, NULL, '2022-11-02', '', '50.00', 1, 'user1111@gmail.com'),
(7, 10, NULL, '2022-11-02', '', '36.00', 1, 'user1111@gmail.com'),
(8, 11, NULL, '2022-11-02', '', '30.00', 1, 'user1111@gmail.com'),
(9, 9, NULL, '2022-11-02', '', '300.00', 1, 'user1111@gmail.com'),
(10, 6, NULL, '2022-11-02', '', '33.00', 1, 'user1111@gmail.com'),
(11, 2, NULL, '2022-11-02', '', '45.80', 1, 'user1111@gmail.com'),
(12, 2, NULL, '2022-11-02', '', '33.00', 1, 'user1111@gmail.com'),
(13, 2, NULL, '2022-11-02', '', '55.00', 1, 'user1111@gmail.com'),
(14, 1, NULL, '2022-11-02', '', '55.50', 1, 'user1111@gmail.com'),
(15, 3, NULL, '2022-11-02', '', '78.11', 1, 'user1111@gmail.com'),
(16, 5, NULL, '2022-11-02', '', '1500.00', 2, 'user1111@gmail.com'),
(17, 4, NULL, '2022-11-02', '', '450.00', 2, 'user1111@gmail.com'),
(18, 1, NULL, '2022-10-01', '', '50.00', 1, 'user1111@gmail.com'),
(19, 5, NULL, '2022-10-01', '', '1400.00', 2, 'user1111@gmail.com');

-- --------------------------------------------------------

--
-- 表的结构 `fee_type`
--

CREATE TABLE `fee_type` (
  `type_id` int(11) NOT NULL,
  `type_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 转存表中的数据 `fee_type`
--

INSERT INTO `fee_type` (`type_id`, `type_name`) VALUES
(1, 'food'),
(2, 'gas'),
(3, 'gift'),
(4, 'other income'),
(5, 'salary income'),
(6, 'Restaurant'),
(7, 'hotel'),
(8, 'daily necessities'),
(9, 'rent'),
(10, 'travel'),
(11, 'entertainment'),
(12, 'film'),
(13, 'wine'),
(14, 'medicine'),
(15, 'play'),
(16, 'food1'),
(17, 'film1'),
(18, 'film2'),
(19, 'wine1'),
(20, 'rent2'),
(21, 'hotel1'),
(22, 'wine2'),
(23, 'film12'),
(24, 'hotel12');

-- --------------------------------------------------------

--
-- 表的结构 `tb_user`
--

CREATE TABLE `tb_user` (
  `user_id` int(11) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 转存表中的数据 `tb_user`
--

INSERT INTO `tb_user` (`user_id`, `user_email`, `password`) VALUES
(1, 'user1111@gmail.com', '11111');

--
-- 转储表的索引
--

--
-- 表的索引 `fee_bill`
--
ALTER TABLE `fee_bill`
  ADD PRIMARY KEY (`bill_id`),
  ADD KEY `FK_FEE_BILL_REFERENCE_FEE_TYPE` (`type_id`),
  ADD KEY `FK_FEE_BILL_REFERENCE_TB_USER` (`user_id`);

--
-- 表的索引 `fee_type`
--
ALTER TABLE `fee_type`
  ADD PRIMARY KEY (`type_id`);

--
-- 表的索引 `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`user_id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `fee_bill`
--
ALTER TABLE `fee_bill`
  MODIFY `bill_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- 使用表AUTO_INCREMENT `fee_type`
--
ALTER TABLE `fee_type`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- 使用表AUTO_INCREMENT `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- 限制导出的表
--

--
-- 限制表 `fee_bill`
--
ALTER TABLE `fee_bill`
  ADD CONSTRAINT `FK_FEE_BILL_REFERENCE_FEE_TYPE` FOREIGN KEY (`type_id`) REFERENCES `fee_type` (`type_id`),
  ADD CONSTRAINT `FK_FEE_BILL_REFERENCE_TB_USER` FOREIGN KEY (`user_id`) REFERENCES `tb_user` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
