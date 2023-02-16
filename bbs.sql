-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- 생성 시간: 23-02-16 06:13
-- 서버 버전: 10.4.22-MariaDB
-- PHP 버전: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 데이터베이스: `bbs`
--

-- --------------------------------------------------------

--
-- 테이블 구조 `board`
--

CREATE TABLE `board` (
  `idx` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `pw` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `date` date NOT NULL,
  `hit` int(10) DEFAULT NULL,
  `thumbsup` int(10) DEFAULT NULL,
  `lock_post` int(10) NOT NULL,
  `file` varchar(100) NOT NULL,
  `is_img` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 테이블의 덤프 데이터 `board`
--

INSERT INTO `board` (`idx`, `name`, `pw`, `title`, `content`, `date`, `hit`, `thumbsup`, `lock_post`, `file`, `is_img`) VALUES
(1, '홍길동', '1234', '안녕하세요 안녕하세요 안녕하세요', '안녕하세요 어겐', '2023-02-13', 1, 1, 0, '', 0),
(2, 'test', 'test', '안녕하세요', '안녕하세요', '2023-02-13', 25, 1, 0, '', 0),
(3, '성춘향', '$2y$10$wJRPr5LUDg78M6GpCy6Orep2PYd0BUrOODv/vXlpCaNeH36TqAisG', '찾지마~', '안녕~', '2023-02-13', 10, NULL, 0, '', 0),
(4, '이름테스트2', '$2y$10$IsijmPmwgfrAmU/XtMhgruBicQ4MtkhRCP3NmFjrlR8l9OplqCu3y', '제목 테스트2', '내용 테스트2', '2023-02-15', 1, NULL, 0, '', 0),
(5, 'test', '$2y$10$Ea2kTNK3dgvRYvDjoRI8EejP1RaWttnnp54CARgYlh3nw5bP7iObu', 'test', 'test', '0000-00-00', 29, 2, 0, '', 0),
(8, '잠금테스트', '$2y$10$pBKKt.ntsqkpei9MvqyBv.4u/6Gt.QROd2yako3IIl/o8NdgmTVKW', '잠금테스트 제목', '잠금테스트 내용', '2023-02-14', NULL, NULL, 1, '', 0),
(9, '잠금테스트2', '$2y$10$EfDVFO1GhsZEumr2q3XvLe.a886FeMf43utA.ohIZqX0cXKzN9Spq', '잠금테스트2', '잠금테스트2 금테스트2 잠금테스트2', '2023-02-14', 82, NULL, 1, '', 0),
(10, '테스트', '$2y$10$EfDVFO1GhsZEumr2q3XvLe.a886FeMf43utA.ohIZqX0cXKzN9Spq', '페이지네이션 테스트', '페이지네이션 테스트', '2023-02-16', NULL, NULL, 0, '', 0),
(11, '테스트', '$2y$10$EfDVFO1GhsZEumr2q3XvLe.a886FeMf43utA.ohIZqX0cXKzN9Spq', '페이지네이션 테스트', '페이지네이션 테스트', '2023-02-16', NULL, NULL, 0, '', 0),
(12, '테스트', '$2y$10$EfDVFO1GhsZEumr2q3XvLe.a886FeMf43utA.ohIZqX0cXKzN9Spq', '페이지네이션 테스트', '페이지네이션 테스트', '2023-02-16', NULL, NULL, 0, '', 0),
(13, '테스트', '$2y$10$EfDVFO1GhsZEumr2q3XvLe.a886FeMf43utA.ohIZqX0cXKzN9Spq', '페이지네이션 테스트', '페이지네이션 테스트', '2023-02-16', NULL, NULL, 0, '', 0),
(14, '테스트', '$2y$10$EfDVFO1GhsZEumr2q3XvLe.a886FeMf43utA.ohIZqX0cXKzN9Spq', '페이지네이션 테스트', '페이지네이션 테스트', '2023-02-16', NULL, NULL, 0, '', 0),
(15, '테스트', '$2y$10$EfDVFO1GhsZEumr2q3XvLe.a886FeMf43utA.ohIZqX0cXKzN9Spq', '페이지네이션 테스트', '페이지네이션 테스트', '2023-02-16', NULL, NULL, 0, '', 0),
(16, '테스트', '$2y$10$EfDVFO1GhsZEumr2q3XvLe.a886FeMf43utA.ohIZqX0cXKzN9Spq', '페이지네이션 테스트', '페이지네이션 테스트', '2023-02-16', NULL, NULL, 0, '', 0),
(17, '테스트', '$2y$10$EfDVFO1GhsZEumr2q3XvLe.a886FeMf43utA.ohIZqX0cXKzN9Spq', '페이지네이션 테스트', '페이지네이션 테스트', '2023-02-16', NULL, NULL, 0, '', 0),
(18, '테스트', '$2y$10$EfDVFO1GhsZEumr2q3XvLe.a886FeMf43utA.ohIZqX0cXKzN9Spq', '페이지네이션 테스트', '페이지네이션 테스트', '2023-02-16', NULL, NULL, 0, '', 0),
(19, '테스트', '$2y$10$EfDVFO1GhsZEumr2q3XvLe.a886FeMf43utA.ohIZqX0cXKzN9Spq', '페이지네이션 테스트', '페이지네이션 테스트', '2023-02-16', NULL, NULL, 0, '', 0),
(20, '테스트', '$2y$10$EfDVFO1GhsZEumr2q3XvLe.a886FeMf43utA.ohIZqX0cXKzN9Spq', '페이지네이션 테스트', '페이지네이션 테스트', '2023-02-16', NULL, NULL, 0, '', 0),
(21, '테스트', '$2y$10$EfDVFO1GhsZEumr2q3XvLe.a886FeMf43utA.ohIZqX0cXKzN9Spq', '페이지네이션 테스트', '페이지네이션 테스트', '2023-02-16', NULL, NULL, 0, '', 0),
(22, '테스트', '$2y$10$EfDVFO1GhsZEumr2q3XvLe.a886FeMf43utA.ohIZqX0cXKzN9Spq', '페이지네이션 테스트', '페이지네이션 테스트', '2023-02-16', NULL, NULL, 0, '', 0),
(23, '테스트', '$2y$10$EfDVFO1GhsZEumr2q3XvLe.a886FeMf43utA.ohIZqX0cXKzN9Spq', '페이지네이션 테스트', '페이지네이션 테스트', '2023-02-16', NULL, NULL, 0, '', 0),
(24, '테스트', '$2y$10$EfDVFO1GhsZEumr2q3XvLe.a886FeMf43utA.ohIZqX0cXKzN9Spq', '페이지네이션 테스트', '페이지네이션 테스트', '2023-02-16', NULL, NULL, 0, '', 0),
(25, '테스트', '$2y$10$EfDVFO1GhsZEumr2q3XvLe.a886FeMf43utA.ohIZqX0cXKzN9Spq', '페이지네이션 테스트', '페이지네이션 테스트', '2023-02-16', NULL, NULL, 0, '', 0),
(26, '테스트', '$2y$10$EfDVFO1GhsZEumr2q3XvLe.a886FeMf43utA.ohIZqX0cXKzN9Spq', '페이지네이션 테스트', '페이지네이션 테스트', '2023-02-16', NULL, NULL, 0, '', 0),
(27, '테스트', '$2y$10$EfDVFO1GhsZEumr2q3XvLe.a886FeMf43utA.ohIZqX0cXKzN9Spq', '페이지네이션 테스트', '페이지네이션 테스트', '2023-02-16', NULL, NULL, 0, '', 0),
(28, '테스트', '$2y$10$EfDVFO1GhsZEumr2q3XvLe.a886FeMf43utA.ohIZqX0cXKzN9Spq', '페이지네이션 테스트', '페이지네이션 테스트', '2023-02-16', NULL, NULL, 0, '', 0),
(29, '테스트', '$2y$10$EfDVFO1GhsZEumr2q3XvLe.a886FeMf43utA.ohIZqX0cXKzN9Spq', '페이지네이션 테스트', '페이지네이션 테스트', '2023-02-16', NULL, NULL, 0, '', 0),
(30, '테스트', '$2y$10$EfDVFO1GhsZEumr2q3XvLe.a886FeMf43utA.ohIZqX0cXKzN9Spq', '페이지네이션 테스트', '페이지네이션 테스트', '2023-02-16', NULL, NULL, 0, '', 0),
(31, '테스트', '$2y$10$EfDVFO1GhsZEumr2q3XvLe.a886FeMf43utA.ohIZqX0cXKzN9Spq', '페이지네이션 테스트', '페이지네이션 테스트', '2023-02-16', NULL, NULL, 0, '', 0),
(32, '테스트', '$2y$10$EfDVFO1GhsZEumr2q3XvLe.a886FeMf43utA.ohIZqX0cXKzN9Spq', '페이지네이션 테스트', '페이지네이션 테스트', '2023-02-16', NULL, NULL, 0, '', 0),
(33, '테스트', '$2y$10$EfDVFO1GhsZEumr2q3XvLe.a886FeMf43utA.ohIZqX0cXKzN9Spq', '페이지네이션 테스트', '페이지네이션 테스트', '2023-02-16', NULL, NULL, 0, '', 0),
(34, '테스트', '$2y$10$EfDVFO1GhsZEumr2q3XvLe.a886FeMf43utA.ohIZqX0cXKzN9Spq', '페이지네이션 테스트', '페이지네이션 테스트', '2023-02-16', NULL, NULL, 0, '', 0),
(35, '테스트', '$2y$10$EfDVFO1GhsZEumr2q3XvLe.a886FeMf43utA.ohIZqX0cXKzN9Spq', '페이지네이션 테스트', '페이지네이션 테스트', '2023-02-16', NULL, NULL, 0, '', 0),
(36, '테스트', '$2y$10$EfDVFO1GhsZEumr2q3XvLe.a886FeMf43utA.ohIZqX0cXKzN9Spq', '페이지네이션 테스트', '페이지네이션 테스트', '2023-02-16', NULL, NULL, 0, '', 0),
(37, '테스트', '$2y$10$EfDVFO1GhsZEumr2q3XvLe.a886FeMf43utA.ohIZqX0cXKzN9Spq', '페이지네이션 테스트', '페이지네이션 테스트', '2023-02-16', NULL, NULL, 0, '', 0),
(38, '테스트', '$2y$10$EfDVFO1GhsZEumr2q3XvLe.a886FeMf43utA.ohIZqX0cXKzN9Spq', '페이지네이션 테스트', '페이지네이션 테스트', '2023-02-16', NULL, NULL, 0, '', 0),
(39, '테스트', '$2y$10$EfDVFO1GhsZEumr2q3XvLe.a886FeMf43utA.ohIZqX0cXKzN9Spq', '페이지네이션 테스트', '페이지네이션 테스트', '2023-02-16', NULL, NULL, 0, '', 0),
(40, '테스트', '$2y$10$EfDVFO1GhsZEumr2q3XvLe.a886FeMf43utA.ohIZqX0cXKzN9Spq', '페이지네이션 테스트', '페이지네이션 테스트', '2023-02-16', NULL, NULL, 0, '', 0),
(41, '테스트', '$2y$10$EfDVFO1GhsZEumr2q3XvLe.a886FeMf43utA.ohIZqX0cXKzN9Spq', '페이지네이션 테스트', '페이지네이션 테스트', '2023-02-16', NULL, NULL, 0, '', 0),
(42, '테스트', '$2y$10$EfDVFO1GhsZEumr2q3XvLe.a886FeMf43utA.ohIZqX0cXKzN9Spq', '페이지네이션 테스트', '페이지네이션 테스트', '2023-02-16', NULL, NULL, 0, '', 0),
(43, '테스트', '$2y$10$EfDVFO1GhsZEumr2q3XvLe.a886FeMf43utA.ohIZqX0cXKzN9Spq', '페이지네이션 테스트', '페이지네이션 테스트', '2023-02-16', NULL, NULL, 0, '', 0),
(44, '테스트', '$2y$10$EfDVFO1GhsZEumr2q3XvLe.a886FeMf43utA.ohIZqX0cXKzN9Spq', '페이지네이션 테스트', '페이지네이션 테스트', '2023-02-16', NULL, NULL, 0, '', 0),
(45, '이도령', '$2y$10$mJA3p7jDQaOX8tk.Oi0qVuK/n690DcoFkIZbzwcVGFUShOG25O5tq', '업로드 테스트', '업로드 테스트', '2023-02-16', 1, NULL, 0, 'img1.png', 0),
(46, '이도령', '$2y$10$ZZd1Z9.Mx1qFPcGT/u8ofeDNmvJ.KPLT5sjjSzS4pi4ehU36VFDs.', '한글 테스트', '한글 테스트', '2023-02-16', 1, NULL, 0, '', 0),
(47, '이도령', '$2y$10$hwjgMgCqNbVfsCARkKWEjeBAx.fsCnQq739SJAv52Lao7S/EDKiRS', 'test', 'test', '2023-02-16', 1, NULL, 0, '', 0),
(48, '이도령', '$2y$10$h8xj9CW7slTwswDb2TTv4efv/8tXM5gEpW./E8UqjAA4d6Uw4U8t2', 'test2', 'test2', '2023-02-16', 1, NULL, 0, '', 0),
(49, '이도령', '$2y$10$8HXeAnfIIrQa/HJ/47MmXO5hLEs/S0OId.b2C0iRcslsyf2PDM2C2', '한글 테스트2', '한글 테스트2', '2023-02-16', 1, NULL, 0, '', 0),
(50, '이도령', '$2y$10$X2lRtSmamXw6fGlOyanTe.OnBR/NSSo6LH2iHuBHRTL3w0rBoQZe2', 'TEST', 'TEST', '2023-02-16', 1, NULL, 0, '이미지 - 복사본.png', 0),
(51, '이도령', '$2y$10$hn0WTEZD4MGUwIzeTiUbsOo7JKSFl4sMRxI1Iauwspji2ZpWGRr9K', '1111', '1111', '2023-02-16', 2, NULL, 0, 'img2.png', 0),
(52, '1111', '$2y$10$/sZJnoxkrXTXKdIsbLqFGe9JE9s026axvVELLHp8bIBGNIB3/LHIe', '1111', '1111', '2023-02-16', 2, NULL, 0, 'img3.png', 1);

-- --------------------------------------------------------

--
-- 테이블 구조 `reply`
--

CREATE TABLE `reply` (
  `idx` int(10) NOT NULL,
  `con_num` int(10) NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 테이블의 덤프 데이터 `reply`
--

INSERT INTO `reply` (`idx`, `con_num`, `name`, `password`, `content`, `date`) VALUES
(3, 5, '워리어1', '$2y$10$h9bM7MboBBHzTGHMdCszGeXpoz52P3tR0i6diWJQ5sm.MgTDIqVUO', '댓글 내용', '2023-02-15 00:00:00'),
(4, 5, '워리어2', '$2y$10$K059T80nYKDTsaRNr7J4C.8P8G4SnYEnoRoaukyxRoSX8pLSsRs6W', '댓글 내용2 - 수정', '2023-02-15 00:00:00'),
(5, 5, '워리어3', '$2y$10$WISBEHEqK8T8snZ4DOtdJOI12smrkZ/VHIdobup4.vPfROFKKaY5S', '내용3 - 수정 수정 수정', '2023-02-15 02:03:38');

--
-- 덤프된 테이블의 인덱스
--

--
-- 테이블의 인덱스 `board`
--
ALTER TABLE `board`
  ADD PRIMARY KEY (`idx`);

--
-- 테이블의 인덱스 `reply`
--
ALTER TABLE `reply`
  ADD PRIMARY KEY (`idx`);

--
-- 덤프된 테이블의 AUTO_INCREMENT
--

--
-- 테이블의 AUTO_INCREMENT `board`
--
ALTER TABLE `board`
  MODIFY `idx` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- 테이블의 AUTO_INCREMENT `reply`
--
ALTER TABLE `reply`
  MODIFY `idx` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
