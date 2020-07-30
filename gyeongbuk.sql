-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- 생성 시간: 20-07-30 17:22
-- 서버 버전: 10.4.11-MariaDB
-- PHP 버전: 7.2.27

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
(1, 'bizz1', 'asdf1234@A', '명재나라', '000-00-00000', 1);

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
(10, 'asdf1234@A', '니달리', 'female', 20, 'bizz11');

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
-- 테이블의 인덱스 `common_user`
--
ALTER TABLE `common_user`
  ADD PRIMARY KEY (`idx`),
  ADD UNIQUE KEY `id` (`id`);

--
-- 덤프된 테이블의 AUTO_INCREMENT
--

--
-- 테이블의 AUTO_INCREMENT `biz_user`
--
ALTER TABLE `biz_user`
  MODIFY `idx` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 테이블의 AUTO_INCREMENT `common_user`
--
ALTER TABLE `common_user`
  MODIFY `idx` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
