-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- 생성 시간: 20-07-31 20:51
-- 서버 버전: 10.4.10-MariaDB
-- PHP 버전: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 데이터베이스: `gyeongbuk`
--

-- --------------------------------------------------------

--
-- 테이블 구조 `biz_user`
--

CREATE TABLE `biz_user` (
  `idx` int(11) NOT NULL,
  `id` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `number` varchar(100) NOT NULL,
  `type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 테이블의 덤프 데이터 `biz_user`
--

INSERT INTO `biz_user` (`idx`, `id`, `password`, `name`, `number`, `type`) VALUES
(1, 'bizz1', 'asdf1234@A', '명재나라', '000-00-00000', 1),
(2, 'bizz2', 'asdf', '녹서스', '666-66-66666', 2),
(3, 'bizz3', 'asdf1234@A', '데마시아', '123-45-67890', 0),
(4, 'bizz5', 'asdf1234@A', '아이오니아', '135-79-13579', 2);

-- --------------------------------------------------------

--
-- 테이블 구조 `booth`
--

CREATE TABLE `booth` (
  `idx` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(11) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `position` varchar(100) NOT NULL,
  `writer` int(11) NOT NULL,
  `age` varchar(200) NOT NULL,
  `type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 테이블의 덤프 데이터 `booth`
--

INSERT INTO `booth` (`idx`, `name`, `price`, `gender`, `position`, `writer`, `age`, `type`) VALUES
(5, 'booth1', 15000, 'male', '6,3', 2, '[10,20,30,50,60]', 2),
(6, '정재성', 150, 'female', '4,6', 2, '[10,20,30,40]', 2),
(7, '바텀부쉬제어와드', 75, 'male', '7,8', 2, '[10,20,30]', 2),
(8, 'localhost', 1600, 'male', '7,4', 2, '[20,50]', 2),
(9, '탑부쉬제어와드', 75000, 'felmale', '5,4', 3, '[10,20,30,50]', 0),
(10, '부스1234', 1500, 'male', '3,3', 3, '[20,30,50]', 0),
(11, '부스부스', 15600, 'male', '7,5', 3, '[10,20,40,60]', 0),
(12, '부스부스부스', 15000, 'male', '10,4', 3, '[40,50]', 0),
(13, '부부스스', 15000, 'male', '4,5', 3, '[30,40,60]', 0),
(14, '부스인척하는부스', 13000, 'male', '8,2', 3, '[20]', 0),
(15, '집에가고싶다', 5000, 'female', '1,1', 4, '[20,30,40,60,70]', 2),
(16, '인천이 더 싫다', 6000, 'female', '1,2', 4, '[10,40,50,60]', 2);

-- --------------------------------------------------------

--
-- 테이블 구조 `common_user`
--

CREATE TABLE `common_user` (
  `idx` int(11) NOT NULL,
  `password` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `age` int(11) NOT NULL,
  `id` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 테이블의 덤프 데이터 `common_user`
--

INSERT INTO `common_user` (`idx`, `password`, `name`, `gender`, `age`, `id`) VALUES
(1, 'Asdf1234@', '정재성', 'male', 10, 'ajwwlswotjd'),
(4, 'asdf1234@A', '정재성이', 'male', 10, 'ajwwlswotjd2'),
(5, 'asdf1234@A', '정재성삼', 'male', 10, 'ajwwlswotjd3'),
(6, 'asdf1234@A', '정재성사', 'male', 10, 'ajwwlswotjd4'),
(9, 'Asdf1234@', '유저일', 'female', 10, 'user1'),
(10, 'asdf1234@A', '니달리', 'female', 20, 'bizz11'),
(12, 'asdf1234@A', '정재성오', 'male', 10, 'ajwwlswotjd5'),
(13, 'asdf1234@A', '정재성육', 'male', 10, 'ajwwlswotjd6');

-- --------------------------------------------------------

--
-- 테이블 구조 `reservation`
--

CREATE TABLE `reservation` (
  `idx` int(11) NOT NULL,
  `booth_idx` int(11) NOT NULL,
  `applicant_idx` int(11) NOT NULL,
  `user_idx` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 테이블의 덤프 데이터 `reservation`
--

INSERT INTO `reservation` (`idx`, `booth_idx`, `applicant_idx`, `user_idx`, `status`) VALUES
(9, 15, 4, 4, 1);

--
-- 덤프된 테이블의 인덱스
--

--
-- 테이블의 인덱스 `biz_user`
--
ALTER TABLE `biz_user`
  ADD PRIMARY KEY (`idx`),
  ADD UNIQUE KEY `id` (`id`);

--
-- 테이블의 인덱스 `booth`
--
ALTER TABLE `booth`
  ADD PRIMARY KEY (`idx`);

--
-- 테이블의 인덱스 `common_user`
--
ALTER TABLE `common_user`
  ADD PRIMARY KEY (`idx`),
  ADD UNIQUE KEY `id` (`id`);

--
-- 테이블의 인덱스 `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`idx`);

--
-- 덤프된 테이블의 AUTO_INCREMENT
--

--
-- 테이블의 AUTO_INCREMENT `biz_user`
--
ALTER TABLE `biz_user`
  MODIFY `idx` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- 테이블의 AUTO_INCREMENT `booth`
--
ALTER TABLE `booth`
  MODIFY `idx` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- 테이블의 AUTO_INCREMENT `common_user`
--
ALTER TABLE `common_user`
  MODIFY `idx` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- 테이블의 AUTO_INCREMENT `reservation`
--
ALTER TABLE `reservation`
  MODIFY `idx` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
