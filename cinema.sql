-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Dic 11, 2022 alle 16:50
-- Versione del server: 10.4.25-MariaDB
-- Versione PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cinema`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `bookings`
--

CREATE TABLE `bookings` (
  `ID` int(9) NOT NULL,
  `Projection` int(8) NOT NULL,
  `User` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `film`
--

CREATE TABLE `film` (
  `ID` int(8) NOT NULL,
  `Title` varchar(100) NOT NULL,
  `Plot` varchar(1500) NOT NULL,
  `Thumbnail` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `film`
--

INSERT INTO `film` (`ID`, `Title`, `Plot`, `Thumbnail`) VALUES
(1, 'Taxi Driver', 'Un tassista di New York dal carattere sensibile e solitario scivola lentamente in una spirale di follia che lo spinge a ribellarsi in maniera violenta alle ingiustizie di una società corrotta e alienante.', '../pics/taxiDriver.jpg'),
(2, 'Non è un paese per vecchi', 'Durante una battuta di caccia in solitaria, un saldatore del Texas trova e si impossessa di una somma di denaro precedentemente rubata. L\'uomo diventa così preda di una banda di criminali.', '../pics/Non_è_un_paese_per_vecchi.jpg'),
(3, 'Avengers: Endgame', 'Alla deriva nello spazio senza cibo o acqua, Tony Stark vede la propria scorta di ossigeno diminuire di minuto in minuto. Nel frattempo, i restanti Vendicatori affrontano un epico scontro con Thanos.', '../pics/avengers_endgame.jpg');

-- --------------------------------------------------------

--
-- Struttura della tabella `proiezioni`
--

CREATE TABLE `proiezioni` (
  `ID` int(8) NOT NULL,
  `Movie` int(8) NOT NULL,
  `Date` datetime NOT NULL,
  `Room` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `proiezioni`
--

INSERT INTO `proiezioni` (`ID`, `Movie`, `Date`, `Room`) VALUES
(3, 1, '2022-12-23 12:00:00', 1),
(4, 2, '2022-12-30 16:30:00', 2),
(5, 3, '2023-01-05 18:00:00', 2),
(6, 1, '2023-01-05 18:00:00', 3);

-- --------------------------------------------------------

--
-- Struttura della tabella `rooms`
--

CREATE TABLE `rooms` (
  `Id` int(6) NOT NULL,
  `Seats` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `rooms`
--

INSERT INTO `rooms` (`Id`, `Seats`) VALUES
(1, 100),
(2, 80),
(3, 150),
(4, 150);

-- --------------------------------------------------------

--
-- Struttura della tabella `users`
--

CREATE TABLE `users` (
  `ID` int(8) NOT NULL,
  `mail` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `Password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `users`
--

INSERT INTO `users` (`ID`, `mail`, `name`, `Password`) VALUES
(1, 'asolazzo@itisrossi.vi.it', 'Alessandro Solazzo', '123'),
(2, '6190001@itisrossi.vi.it', 'Riccardo Finello', '123'),
(3, 'acosta@itisrossi.vi.it', 'Alberto Costa', '123'),
(4, 'flovison@itisrossi.vi.it', 'Fabrizio Lovison', '123');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `User` (`User`),
  ADD KEY `Projection` (`Projection`);

--
-- Indici per le tabelle `film`
--
ALTER TABLE `film`
  ADD PRIMARY KEY (`ID`);

--
-- Indici per le tabelle `proiezioni`
--
ALTER TABLE `proiezioni`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Movie` (`Movie`),
  ADD KEY `Room` (`Room`);

--
-- Indici per le tabelle `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`Id`);

--
-- Indici per le tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `mail` (`mail`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `bookings`
--
ALTER TABLE `bookings`
  MODIFY `ID` int(9) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `film`
--
ALTER TABLE `film`
  MODIFY `ID` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT per la tabella `proiezioni`
--
ALTER TABLE `proiezioni`
  MODIFY `ID` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT per la tabella `rooms`
--
ALTER TABLE `rooms`
  MODIFY `Id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT per la tabella `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_ibfk_1` FOREIGN KEY (`User`) REFERENCES `users` (`ID`),
  ADD CONSTRAINT `bookings_ibfk_2` FOREIGN KEY (`Projection`) REFERENCES `proiezioni` (`ID`);

--
-- Limiti per la tabella `proiezioni`
--
ALTER TABLE `proiezioni`
  ADD CONSTRAINT `proiezioni_ibfk_1` FOREIGN KEY (`Movie`) REFERENCES `film` (`ID`),
  ADD CONSTRAINT `proiezioni_ibfk_2` FOREIGN KEY (`Room`) REFERENCES `rooms` (`Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
