-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Dic 13, 2022 alle 18:19
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
  `User` int(8) NOT NULL,
  `Seats` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `bookings`
--

INSERT INTO `bookings` (`ID`, `Projection`, `User`, `Seats`) VALUES
(7, 4, 1, 4),
(26, 3, 2, 6),
(27, 7, 3, 5);

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
(3, 'Avengers: Endgame', 'Alla deriva nello spazio senza cibo o acqua, Tony Stark vede la propria scorta di ossigeno diminuire di minuto in minuto. Nel frattempo, i restanti Vendicatori affrontano un epico scontro con Thanos.', '../pics/avengers_endgame.jpg'),
(4, 'Top Gun: Maverick', 'Dopo oltre 30 anni di servizio come uno dei migliori aviatori della Marina, Pete \"Maverick\" Mitchell è il posto a cui appartiene, spingendosi oltre i limiti come coraggioso pilota collaudatore e schivando l\'avanzamento di grado che lo avrebbe radicato. Addestrando un distaccamento di laureati per un incarico speciale, Maverick deve affrontare i fantasmi del suo passato e le sue paure più profonde, culminando in una missione che richiede il massimo sacrificio da coloro che scelgono di volare.', 'Top_gun.jpg'),
(5, 'Drive', '\r\nDriver è un abile stuntman di Hollywood che lavora al chiaro di luna come autista di fuga per i criminali. Sebbene proietti un aspetto gelido, ultimamente si sta avvicinando a una graziosa vicina di nome Irene e al suo giovane figlio, Benicio. Quando il marito di Irene esce di prigione, chiede aiuto a Driver per una rapina da un milione di dollari. Il lavoro va terribilmente storto e Driver deve rischiare la vita per proteggere Irene e Benicio dalle menti vendicative dietro la rapina.', 'Drive.jpg'),
(6, 'Indiana Jones e i Predatori dell\'Arca Perduta', 'Racconto epico in cui un intrepido archeologo cerca di sconfiggere una banda di nazisti per ottenere una reliquia religiosa unica che è centrale nei loro piani per il dominio del mondo. Combattendo contro una fobia dei serpenti e una vendicativa ex fidanzata, Indiana Jones è in costante pericolo, scappando a ogni angolo in questa celebrazione degli innocenti film d\'avventura di un\'era precedente.', 'Indiana_Jones_ROTLA.jpg'),
(7, 'Avatar 2: La Via dell\'acqua', '\r\nJake Sully e Ney\'tiri hanno formato una famiglia e stanno facendo di tutto per restare insieme. Tuttavia, devono lasciare la loro casa ed esplorare le regioni di Pandora. Quando un\'antica minaccia ricompare, Jake deve combattere una difficile guerra contro gli umani.', 'Avatar2.jpg'),
(8, 'American Psycho', 'A New York City nel 1987, un giovane e affascinante professionista urbano, Patrick Bateman (Christian Bale), vive una seconda vita come un raccapricciante serial killer di notte. Il cast è composto dal detective (Willem Dafoe), dal fidanzato (Reese Witherspoon), dall\'amante (Samantha Mathis), dal collega (Jared Leto) e dalla segretaria (Chloë Sevigny). Questa è una commedia pungente e ironica che esamina gli elementi che rendono un uomo un mostro.', 'AmericanPsycho.jpg'),
(9, 'The Lighthouse', 'Due guardiani del faro cercano di mantenere la loro sanità mentale mentre vivono su una remota e misteriosa isola del New England nel 1890.', 'TheLightHouse.jpg'),
(10, 'The Shining', 'Jack Torrance (Jack Nicholson) diventa custode invernale presso l\'isolato Overlook Hotel in Colorado, sperando di curare il suo blocco dello scrittore. Si stabilisce insieme a sua moglie, Wendy (Shelley Duvall), e suo figlio, Danny (Danny Lloyd), che è afflitto da premonizioni psichiche. Mentre la scrittura di Jack non va da nessuna parte e le visioni di Danny diventano più inquietanti, Jack scopre gli oscuri segreti dell\'hotel e inizia a trasformarsi in un maniaco omicida deciso a terrorizzare la sua famiglia.', 'Shining.jpg'),
(11, 'Blade Runner 2049', 'L\'agente K (Ryan Gosling), un nuovo blade runner del dipartimento di polizia di Los Angeles, porta alla luce un segreto a lungo sepolto che ha il potenziale per far precipitare nel caos ciò che resta della società. La sua scoperta lo porta alla ricerca di Rick Deckard (Harrison Ford), un ex blade runner scomparso da 30 anni.', 'BladeRunner2049.jpg');

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
(6, 1, '2023-01-05 18:00:00', 3),
(7, 4, '2023-01-08 18:00:00', 2),
(9, 5, '2022-12-26 17:00:00', 1),
(10, 5, '2022-05-13 18:30:00', 4),
(11, 6, '2022-12-30 20:00:00', 4),
(12, 6, '2023-01-12 15:00:00', 2),
(13, 7, '2022-12-23 15:00:00', 1),
(14, 8, '2023-02-15 20:00:00', 4),
(15, 8, '2023-01-24 21:00:00', 4),
(16, 9, '2023-01-30 22:00:00', 2),
(17, 10, '2022-12-31 20:00:00', 2),
(18, 11, '2023-01-14 21:00:00', 4);

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
(4, 'flovison@itisrossi.vi.it', 'Fabrizio Lovison', '123'),
(5, 'pbrunelli@itisrossi.vi.it', 'Paolo Brunelli', '123');

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
  MODIFY `ID` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT per la tabella `film`
--
ALTER TABLE `film`
  MODIFY `ID` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT per la tabella `proiezioni`
--
ALTER TABLE `proiezioni`
  MODIFY `ID` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT per la tabella `rooms`
--
ALTER TABLE `rooms`
  MODIFY `Id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT per la tabella `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
