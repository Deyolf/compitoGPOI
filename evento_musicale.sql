-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Creato il: Apr 01, 2025 alle 18:49
-- Versione del server: 5.7.11
-- Versione PHP: 5.6.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `evento_musicale`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `cantante`
--

CREATE TABLE `cantante` (
  `id_cantante` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `cognome` varchar(100) NOT NULL,
  `data_nascita` date NOT NULL,
  `soprannome` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `cantante`
--

INSERT INTO `cantante` (`id_cantante`, `nome`, `cognome`, `data_nascita`, `soprannome`) VALUES
(1, 'Fabio', 'Colombo', '2006-11-20', 'ElFabito');

-- --------------------------------------------------------

--
-- Struttura della tabella `cantante_canzone`
--

CREATE TABLE `cantante_canzone` (
  `id_cantante` int(11) NOT NULL,
  `id_canzone` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `canzone`
--

CREATE TABLE `canzone` (
  `id_canzone` int(11) NOT NULL,
  `titolo` varchar(30) NOT NULL,
  `orario` time NOT NULL,
  `cantante` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `canzone`
--

INSERT INTO `canzone` (`id_canzone`, `titolo`, `orario`, `cantante`) VALUES
(1, 'prova', '20:00:00', 1),
(2, 'canzone2', '20:30:00', 1);

-- --------------------------------------------------------

--
-- Struttura della tabella `evento`
--

CREATE TABLE `evento` (
  `id_evento` int(11) NOT NULL,
  `luogo` text NOT NULL,
  `data` date NOT NULL,
  `posti_totali` int(11) NOT NULL,
  `posti_disponibili` int(11) NOT NULL,
  `posti_occupati` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `evento`
--

INSERT INTO `evento` (`id_evento`, `luogo`, `data`, `posti_totali`, `posti_disponibili`, `posti_occupati`) VALUES
(1, 'Bergamo', '2026-04-20', 1000, 897, 101);

-- --------------------------------------------------------

--
-- Struttura della tabella `genere`
--

CREATE TABLE `genere` (
  `id_genere` int(11) NOT NULL,
  `nome` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `prenotazioni`
--

CREATE TABLE `prenotazioni` (
  `id_prenotazione` int(11) NOT NULL,
  `numero_posto` varchar(10) NOT NULL,
  `utente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `prenotazioni`
--

INSERT INTO `prenotazioni` (`id_prenotazione`, `numero_posto`, `utente`) VALUES
(1, '2', 3),
(2, '3', 4),
(3, '4', 5);

-- --------------------------------------------------------

--
-- Struttura della tabella `utente`
--

CREATE TABLE `utente` (
  `id_utente` int(11) NOT NULL,
  `nome` varchar(30) NOT NULL,
  `cognome` varchar(30) NOT NULL,
  `data_nascita` date NOT NULL,
  `provincia` char(2) DEFAULT NULL,
  `nazionalita` varchar(30) DEFAULT NULL,
  `citta` varchar(30) DEFAULT NULL,
  `via` varchar(30) DEFAULT NULL,
  `cap` int(5) DEFAULT NULL,
  `civico` int(11) DEFAULT NULL,
  `IBAN` varchar(34) DEFAULT NULL,
  `telefono` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `utente`
--

INSERT INTO `utente` (`id_utente`, `nome`, `cognome`, `data_nascita`, `provincia`, `nazionalita`, `citta`, `via`, `cap`, `civico`, `IBAN`, `telefono`) VALUES
(1, 'Mattia', 'Manenti', '2006-11-20', 'BG', 'Italia', 'Bergamo', 'Via Bolgare 3', 24060, 9999, '123456789', '3665977950'),
(3, 'Prova', 'Prova', '2004-11-20', 'MI', 'Italia', 'Milano', 'Via ', 12345, 9999, '123456789', '3332331212'),
(4, 'Prova2', 'Prova2', '2000-10-20', 'BG', 'Italia', '', 'Via casa prova2', 24060, 9999, '123456788', '1234564545'),
(5, 'Prova3', 'Prova3', '1998-05-10', 'BG', 'Italia', 'Bergamo', 'Via casa prova3', 24060, 9999, '789456123', '3331661245');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `cantante`
--
ALTER TABLE `cantante`
  ADD PRIMARY KEY (`id_cantante`);

--
-- Indici per le tabelle `canzone`
--
ALTER TABLE `canzone`
  ADD PRIMARY KEY (`id_canzone`),
  ADD UNIQUE KEY `orario` (`orario`);

--
-- Indici per le tabelle `evento`
--
ALTER TABLE `evento`
  ADD PRIMARY KEY (`id_evento`);

--
-- Indici per le tabelle `prenotazioni`
--
ALTER TABLE `prenotazioni`
  ADD PRIMARY KEY (`id_prenotazione`);

--
-- Indici per le tabelle `utente`
--
ALTER TABLE `utente`
  ADD PRIMARY KEY (`id_utente`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `cantante`
--
ALTER TABLE `cantante`
  MODIFY `id_cantante` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT per la tabella `canzone`
--
ALTER TABLE `canzone`
  MODIFY `id_canzone` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT per la tabella `prenotazioni`
--
ALTER TABLE `prenotazioni`
  MODIFY `id_prenotazione` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT per la tabella `utente`
--
ALTER TABLE `utente`
  MODIFY `id_utente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
