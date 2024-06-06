-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Cze 02, 2024 at 09:44 PM
-- Wersja serwera: 10.4.32-MariaDB
-- Wersja PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `site`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `files`
--

CREATE TABLE `files` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `filename` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`id`, `user_id`, `filename`) VALUES
(1, 1, '1713605435619.png'),
(2, 1, 'scale_1200.jpg'),
(3, 1, 'Знімок екрана 2023-12-09 135552.png'),
(4, 2, '1659990660_1-kartinkin-net-p-anime-priroda-oboi-na-telefon-krasivo-1.jpg'),
(5, 3, '20240420135525.png'),
(6, 2, 'awatar.jpg'),
(7, 2, 'lanzarotte.jpg'),
(8, 2, 'pekin.jpg'),
(9, 3, 'lanzarotte.jpg'),
(10, 2, '1660142952_4-kartinkin-net-p-anime-fon-dvizhushchiisya-krasivo-14.jpg'),
(11, 2, 'Firefly Piękny, przytulny, fantazyjny kamienny domek w wiosennym lesie z boku, brukowanej ścieżki i .jpg'),
(12, 2, '1717155313957.jpg'),
(13, 2, 'Firefly маленький котик грає з клубком ниток в саду вешневим коло хати. хутро чорного кольору 66616.jpg'),
(14, 2, 'Firefly маленький котик грає з клубком ниток в саду вешневим коло хати. хутро чорного кольору 16046.jpg'),
(15, 2, 'Firefly маленький котик грає з клубком ниток в саду вешневим коло хати 16046.jpg'),
(16, 2, 'Firefly маленький котик грає з клубком ниток в саду вешневим коло хати 81640.jpg'),
(17, 2, '1713605435619.png'),
(18, 2, 'zd1.png'),
(19, 2, 'zd2.png'),
(20, 2, '1717154855572.jpg'),
(21, 2, '1717155071075.jpg');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `id` int(250) NOT NULL,
  `login` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `forder` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `email`, `forder`) VALUES
(1, 'Adept', '$2y$10$a1fcBaYWxa0JJxB/RXO7he0be7EuOfIEFoaOjuPJllPyS54p.mEru', '$2y$10$UCpTGheKX9Guh3THe.jYxO4xXcfuRPaeP71cMAILkHba0B6eVN0U6', 'Adept665779872062'),
(2, 'Blaizard', '$2y$10$QNQ.NMPKlqTM0Q8R/pSJGOXlWU9/4gNEqxtoHlzkhX.BPXqyT4PDa', '$2y$10$UCpTGheKX9Guh3THe.jYxO4xXcfuRPaeP71cMAILkHba0B6eVN0U6', 'Blaizard339944046154'),
(3, 'andrii', '$2y$10$sjJa0i9EC1SCSbLSHRXCC.XraSvy2MhEJCn/y5bkP/DstT16ZGIde', '$2y$10$HuUr6BSQsjA10NE7cW/SYeWL1TJrBV3C1M0GgTBrt/x9YoVOu0nre', 'andrii48675690572'),
(4, 'sasd3', '$2y$10$0oBqtG65waVDk7yAaTeDP.YraN33ifKkMSH.9nCa4sLzJFTqrXTy2', '$2y$10$WGYR2u1RS0U1wBsgooh9je0rAZAWE8sGF65L4OKBkgy5V0Ip8D5Cy', 'sasd1470255732836'),
(5, 'qwerty', '$2y$10$j6L20s59.yEyQOKCk8iPgul1qP5lsNZF5DSSoF.3CemvCMvdp5HmW', '$2y$10$l2wT9EgGgvxCUMJGOHVauOoTtNSHOhc/GCS4wb4F3.ul8oLupGRdi', 'qwerty990215825917'),
(6, 'іфвро', '$2y$10$gdAKDlc4DpQJwH3gFwCXyenjpI.KYWCEql2zRRkvnH55f0iAYitEy', '$2y$10$drfSIxvh9IclvpvOot73j..8NWsSbicNgEgWv.u5LOWaygtoHaM7u', 'іфвро738199084261'),
(7, 'asasd', '$2y$10$RGFTbhWYLMdeBEBKa4KftOEynkWANtBa3UzXFPZDu.25L.gDoApV2', '$2y$10$jqVrlG4/1hsuzPAAMh0NMewSDsEQu5kQKbF9IeGEzdOozg0WUDIwq', 'asasd475802251901'),
(8, 'qwerty1', '$2y$10$MSo7XQeZSh3NnmUCH9AVSuFyvO2NOV8JmC1rLJRF4pkEmK78nwali', '$2y$10$jOy9bLjJt.eKWSvo5i3UE.gQZo4AOEUyf6LJj39qaXDfEUAK4uqVO', 'qwerty1372034126328'),
(9, 'паів', '$2y$10$l0De4C47dvkzxqs3y68V2.zVGKXR1Wf99/FlBdnLioCCuEr7jPXnK', '$2y$10$9zb3FrmhvU/Yuoz7kBbSAeyjQoIOGyq48qLvsyc9DqmoKZIcIUg.K', 'паів279126982838'),
(10, 'фіфв', '$2y$10$wdv1XOkLyxIK3QZb.QWKPuYqRVcyyI80t0gbj/HDYyK1e7Kym.rpe', '$2y$10$JKG/9jQPo60ZBj49frS1WuB5wIZpXzSEd13V7idhKCBJacOCclLoe', 'фіфв1187787565587'),
(11, 'andrii.nesterovets', '$2y$10$6WVnPKs3iHb./jW1u/ygPOouXsjkIsPcKfYS9yp3Wx0FcN1qxSDkO', '$2y$10$kuUsIMyYJFVIvnE1vodos.6HOw5DeVal8QxJWRl8casKb4KocWFCO', 'andrii.nesterovets468864974700');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`),
  ADD KEY `f_id_users` (`user_id`) USING BTREE;

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `files`
--
ALTER TABLE `files`
  ADD CONSTRAINT `fk_id_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
