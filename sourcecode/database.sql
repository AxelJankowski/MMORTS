-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 16 Gru 2019, 16:52
-- Wersja serwera: 10.4.8-MariaDB
-- Wersja PHP: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `mmorts`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `army`
--

CREATE TABLE `army` (
  `id` int(255) NOT NULL,
  `position_x` int(255) DEFAULT NULL,
  `position_y` int(255) DEFAULT NULL,
  `city_id` int(255) DEFAULT NULL,
  `swordsman` int(255) DEFAULT NULL,
  `archer` int(255) DEFAULT NULL,
  `knight` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `buildings`
--

CREATE TABLE `buildings` (
  `id` int(255) NOT NULL,
  `city_id` int(255) DEFAULT NULL,
  `keep_level` int(2) DEFAULT 1,
  `tavern_level` int(2) DEFAULT 1,
  `barracks_level` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `buildings`
--

INSERT INTO `buildings` (`id`, `city_id`, `keep_level`, `tavern_level`, `barracks_level`) VALUES
(1, 1, 1, 1, NULL),
(2, 2, 1, 1, NULL);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `building_types`
--

CREATE TABLE `building_types` (
  `id` int(255) NOT NULL,
  `type` varchar(255) DEFAULT NULL,
  `level` int(2) DEFAULT NULL,
  `defence` int(255) DEFAULT NULL,
  `wood_production` int(255) DEFAULT NULL,
  `stone_production` int(255) DEFAULT NULL,
  `clay_production` int(255) DEFAULT NULL,
  `iternit_production` int(255) DEFAULT NULL,
  `food_production` int(255) DEFAULT NULL,
  `swordsman_production` int(255) DEFAULT NULL,
  `archer_production` int(255) DEFAULT NULL,
  `knight_production` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `building_types`
--

INSERT INTO `building_types` (`id`, `type`, `level`, `defence`, `wood_production`, `stone_production`, `clay_production`, `iternit_production`, `food_production`, `swordsman_production`, `archer_production`, `knight_production`) VALUES
(1, 'keep', 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL),
(2, 'keep', 1, 1000, 10, 0, 0, 0, 10, NULL, NULL, NULL),
(3, 'keep', 2, 2000, 20, 10, 0, 0, 20, NULL, NULL, NULL),
(4, 'tavern', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 'tavern', 1, 200, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 'barracks', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 'barracks', 1, 400, NULL, NULL, NULL, NULL, NULL, 10, 5, NULL);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `cities`
--

CREATE TABLE `cities` (
  `id` int(255) NOT NULL,
  `user_id` int(255) DEFAULT NULL,
  `name` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `cities`
--

INSERT INTO `cities` (`id`, `user_id`, `name`) VALUES
(1, 1, 'Popopołczyno'),
(2, 2, 'Test');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `configuration`
--

CREATE TABLE `configuration` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `separator` varchar(3) NOT NULL,
  `description` varchar(255) NOT NULL,
  `maintenance` tinyint(1) NOT NULL,
  `logo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `configuration`
--

INSERT INTO `configuration` (`id`, `name`, `separator`, `description`, `maintenance`, `logo`) VALUES
(1, 'MMORTS', ' | ', 'Browser strategy game', 0, 'logo-sword.png');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `map`
--

CREATE TABLE `map` (
  `id` int(255) NOT NULL,
  `x` int(255) DEFAULT NULL,
  `y` int(255) DEFAULT NULL,
  `type` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `resources`
--

CREATE TABLE `resources` (
  `id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `city_id` int(255) NOT NULL,
  `wood` int(255) NOT NULL DEFAULT 200,
  `stone` int(255) NOT NULL DEFAULT 100,
  `clay` int(255) NOT NULL DEFAULT 100,
  `iternit` int(255) NOT NULL DEFAULT 0,
  `food` int(255) NOT NULL DEFAULT 200
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `resources`
--

INSERT INTO `resources` (`id`, `user_id`, `city_id`, `wood`, `stone`, `clay`, `iternit`, `food`) VALUES
(1, 1, 1, 200, 100, 100, 0, 200),
(2, 2, 2, 200, 100, 100, 0, 200);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `terrain-types`
--

CREATE TABLE `terrain-types` (
  `id` int(255) NOT NULL,
  `type` int(255) DEFAULT NULL,
  `terrain` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `units`
--

CREATE TABLE `units` (
  `id` int(255) NOT NULL,
  `unit_name` varchar(50) DEFAULT NULL,
  `attack_value` int(255) DEFAULT NULL,
  `defence_value` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `id` int(255) NOT NULL,
  `username` varchar(20) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` char(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(1, 'eSKULLuss', 'eskulluss@gmail.com', '$2y$10$VrSP/ft3bC/PX.UuYMy9VOYbYxv9MViLIYnqRaiUNw4LJQj/a1qa.'),
(2, 'test', 'test@test.test', '$2y$10$nAancLD.kBxRbENHuSK.Eung.XUksnzR4LThseXWuTPf00g0Jpz9.');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `army`
--
ALTER TABLE `army`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `buildings`
--
ALTER TABLE `buildings`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `building_types`
--
ALTER TABLE `building_types`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `configuration`
--
ALTER TABLE `configuration`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `map`
--
ALTER TABLE `map`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `resources`
--
ALTER TABLE `resources`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `terrain-types`
--
ALTER TABLE `terrain-types`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `army`
--
ALTER TABLE `army`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `buildings`
--
ALTER TABLE `buildings`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT dla tabeli `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT dla tabeli `configuration`
--
ALTER TABLE `configuration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT dla tabeli `map`
--
ALTER TABLE `map`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `resources`
--
ALTER TABLE `resources`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT dla tabeli `terrain-types`
--
ALTER TABLE `terrain-types`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `units`
--
ALTER TABLE `units`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
