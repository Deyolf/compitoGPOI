-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Creato il: Mar 25, 2025 alle 17:14
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
  `orario` date NOT NULL,
  `cantante` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `IBAN` varchar(20) DEFAULT NULL,
  `telefono` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  MODIFY `id_canzone` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT per la tabella `prenotazioni`
--
ALTER TABLE `prenotazioni`
  MODIFY `id_prenotazione` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT per la tabella `utente`
--
ALTER TABLE `utente`
  MODIFY `id_utente` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
