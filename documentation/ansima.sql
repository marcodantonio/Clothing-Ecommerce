-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Set 13, 2023 alle 10:23
-- Versione del server: 10.4.28-MariaDB
-- Versione PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ansima`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `backup_indirizzo`
--

CREATE TABLE `backup_indirizzo` (
  `id` int(10) UNSIGNED NOT NULL,
  `fullname` text NOT NULL,
  `email` text NOT NULL,
  `via` text NOT NULL,
  `cap` text NOT NULL,
  `stato` varchar(50) NOT NULL,
  `citta` varchar(50) NOT NULL,
  `id_utente` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dump dei dati per la tabella `backup_indirizzo`
--

INSERT INTO `backup_indirizzo` (`id`, `fullname`, `email`, `via`, `cap`, `stato`, `citta`, `id_utente`) VALUES
(1, 'Simone Morisi', 'simone@email.it', 'Roma', '67051', 'Italia', 'Avezzano', 1),
(2, 'Antonio Valentino', 'antonio@email.it', 'Calabria', '67051', 'Italia', 'Avezzano', 2),
(3, 'Marco D\'antonio', 'marco@email.it', 'Pescara', '67051', 'Italia', 'Avezzano', 3);

-- --------------------------------------------------------

--
-- Struttura della tabella `brand`
--

CREATE TABLE `brand` (
  `id` int(10) UNSIGNED NOT NULL,
  `nome` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `brand`
--

INSERT INTO `brand` (`id`, `nome`) VALUES
(2, 'Adidas'),
(1, 'Gucci'),
(3, 'Nike'),
(4, 'Vans'),
(5, 'Zara');

--
-- Trigger `brand`
--
DELIMITER $$
CREATE TRIGGER `elimina_prodotto_brand` BEFORE DELETE ON `brand` FOR EACH ROW BEGIN
DELETE FROM prodotto WHERE id_brand = OLD.id;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struttura della tabella `carrello`
--

CREATE TABLE `carrello` (
  `id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `carrello`
--

INSERT INTO `carrello` (`id`) VALUES
(1),
(2),
(3);

-- --------------------------------------------------------

--
-- Struttura della tabella `carrello_prodotto`
--

CREATE TABLE `carrello_prodotto` (
  `id_carrello` int(10) UNSIGNED NOT NULL,
  `id_prodotto` int(10) UNSIGNED NOT NULL,
  `taglia` varchar(100) NOT NULL,
  `quantita` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `carta_credito`
--

CREATE TABLE `carta_credito` (
  `id` int(10) UNSIGNED NOT NULL,
  `proprietario` varchar(50) NOT NULL,
  `numero` bigint(20) NOT NULL,
  `data_scadenza` date NOT NULL,
  `cvv` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `carta_credito`
--

INSERT INTO `carta_credito` (`id`, `proprietario`, `numero`, `data_scadenza`, `cvv`) VALUES
(1, 'Antonio Valentino', 1234567812345678, '2026-02-03', 333),
(2, 'Antonio Valentino', 5678123456781234, '2024-07-11', 678);

-- --------------------------------------------------------

--
-- Struttura della tabella `categoria`
--

CREATE TABLE `categoria` (
  `id` int(10) UNSIGNED NOT NULL,
  `tipologia` varchar(50) NOT NULL,
  `svg` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `categoria`
--

INSERT INTO `categoria` (`id`, `tipologia`, `svg`) VALUES
(1, 'Trousers', '#trousers-1'),
(2, 'Dresses', '#dress1-1'),
(3, 'T-Shirts', '#shirt5-1'),
(4, 'Jackets', '#jacket-1'),
(5, 'Pullovers', '#pullover-1');

-- --------------------------------------------------------

--
-- Struttura della tabella `colore`
--

CREATE TABLE `colore` (
  `id` int(10) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `hexcode` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dump dei dati per la tabella `colore`
--

INSERT INTO `colore` (`id`, `nome`, `hexcode`) VALUES
(4, 'Nero', '#000000FF'),
(6, 'Grigio', '#808080FF'),
(7, 'Bianco', '#FFFFFFFF'),
(8, 'Blu', '#0F13FFFF'),
(9, 'Rosa', '#FF7AF0FF'),
(10, 'Giallo', '#FFEE2EFF'),
(11, 'Verde', '#2FFF2BFF'),
(12, 'Arancione', '#FF7300FF');

--
-- Trigger `colore`
--
DELIMITER $$
CREATE TRIGGER `elimina_prodotto_colore` BEFORE DELETE ON `colore` FOR EACH ROW BEGIN
DELETE FROM prodotto WHERE id_colore = OLD.id;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struttura della tabella `corriere`
--

CREATE TABLE `corriere` (
  `id` int(10) UNSIGNED NOT NULL,
  `nome_corriere` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `corriere`
--

INSERT INTO `corriere` (`id`, `nome_corriere`) VALUES
(1, 'Bartolini'),
(2, 'DHL');

-- --------------------------------------------------------

--
-- Struttura della tabella `dettaglio_prodotto`
--

CREATE TABLE `dettaglio_prodotto` (
  `id` int(10) UNSIGNED NOT NULL,
  `codice_articolo` text NOT NULL,
  `nome` varchar(50) NOT NULL,
  `costo` float UNSIGNED NOT NULL,
  `immagine` varchar(50) NOT NULL,
  `categoria` varchar(50) NOT NULL,
  `brand` varchar(50) NOT NULL,
  `colore` varchar(50) NOT NULL,
  `taglia` varchar(10) NOT NULL,
  `quantita` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `dettaglio_prodotto`
--

INSERT INTO `dettaglio_prodotto` (`id`, `codice_articolo`, `nome`, `costo`, `immagine`, `categoria`, `brand`, `colore`, `taglia`, `quantita`) VALUES
(200, 'N4NF6SM2', 'Vestito grigio', 35, '0693492802_2_2_1.jpg', 'Dress', 'H&M', 'Grigio', 'M', 1),
(201, 'S13JPRNA', 'Veste nera', 50, '0365115800_1_2_1.jpg', 'Dress', 'Pull', 'Nero', 'L', 1),
(202, 'AJOCZB4J', 'Jeans aderenti', 75, '0144074800_1_1_1.jpg', 'Trousers', 'Dickies', 'Nero', 'L', 3),
(203, 'ZTG5JHN8', 'Jeans larghi', 70, '0029352433_1_1_1.jpg', 'Trousers', 'Carhartt', 'Blu chiaro', 'XL', 1),
(204, 'S13JPRNA', 'Veste nera', 50, '0365115800_1_2_1.jpg', 'Dress', 'Pull', 'Nero', 'L', 1),
(205, 'AJOCZB4J', 'Jeans aderenti', 75, '0144074800_1_1_1.jpg', 'Trousers', 'Dickies', 'Nero', 'XS', 1),
(206, 'ZTG5JHN8', 'Jeans larghi', 42, '0029352433_1_1_1.jpg', 'Trousers', 'Carhartt', 'Blu chiaro', 'XS', 1),
(207, 'HWVK1IVC', 'T-shirt bianca', 6, '0987188250_1_1_1.jpg', 'T-Shirts', 'H&M', 'Nero', 'XS', 1),
(208, 'S13JPRNA', 'Veste nera', 40, '0365115800_1_2_1.jpg', 'Dress', 'Pull', 'Nero', 'XS', 1),
(209, 'S13JPRNA', 'Veste rosa', 22, '0364326148_1_1_1.jpg', 'Dress', 'Pull', 'Rosa', 'XS', 1),
(210, 'LJPC4B41', 'Maglia scollata bianca', 15.3, '0931168712_1_1_1.jpg', 'T-Shirts', 'Nike', 'Bianco', 'XS', 1),
(211, 'S13JPRNA', 'Vestito rosa', 22, '0364326148_1_1_1.jpg', 'Dresses', 'Vans', 'Rosa', 'XS', 4);

-- --------------------------------------------------------

--
-- Struttura della tabella `email_registrate`
--

CREATE TABLE `email_registrate` (
  `id` int(10) NOT NULL,
  `email` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dump dei dati per la tabella `email_registrate`
--

INSERT INTO `email_registrate` (`id`, `email`) VALUES
(2, 'antonio@email.it');

-- --------------------------------------------------------

--
-- Struttura della tabella `email_ricevute`
--

CREATE TABLE `email_ricevute` (
  `id` int(11) NOT NULL,
  `nome` text NOT NULL,
  `cognome` text NOT NULL,
  `email` text NOT NULL,
  `messaggio` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dump dei dati per la tabella `email_ricevute`
--

INSERT INTO `email_ricevute` (`id`, `nome`, `cognome`, `email`, `messaggio`) VALUES
(1, 'Antonio', 'Valentino', 'antonio@email.it', 'Sito Ben Fatto!');

-- --------------------------------------------------------

--
-- Struttura della tabella `gruppo`
--

CREATE TABLE `gruppo` (
  `id` int(10) UNSIGNED NOT NULL,
  `nome` varchar(20) NOT NULL,
  `descrizione` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `gruppo`
--

INSERT INTO `gruppo` (`id`, `nome`, `descrizione`) VALUES
(1, 'cliente', ''),
(2, 'Amministratore', ''),
(3, 'Proprietario', '');

-- --------------------------------------------------------

--
-- Struttura della tabella `immagine`
--

CREATE TABLE `immagine` (
  `id` int(10) UNSIGNED NOT NULL,
  `nome` varchar(50) NOT NULL,
  `id_prodotto` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `immagine`
--

INSERT INTO `immagine` (`id`, `nome`, `id_prodotto`) VALUES
(8, '0029352433_1_1_1.jpg', 1),
(9, '0029352433_2_1_1.jpg', 1),
(33, '0027211800_1_2_1.jpg', 2),
(34, '0027211800_2_1_1.jpg', 2),
(35, '0693492802_2_2_1.jpg', 7),
(36, '0693492802_2_3_1.jpg', 7),
(43, '0365115800_1_2_1.jpg', 4),
(44, '0365115800_2_1_1.jpg', 4),
(45, '0949168513_1_1_1.jpg', 5),
(46, '0949168513_2_1_1.jpg', 5),
(47, '0144074800_1_1_1.jpg', 6),
(48, '0144074800_2_1_1.jpg', 6),
(49, '0987188250_1_1_1.jpg', 3),
(50, '0987188250_2_1_1.jpg', 3),
(51, '5161335400_1_1_1.jpg', 8),
(52, '5161335400_2_3_1.jpg', 8),
(53, '1000962306_1_1_1.jpg', 9),
(54, '1000962306_2_1_1.jpg', 9),
(55, '0364326148_1_1_1.jpg', 10),
(56, '0364326148_2_1_1.jpg', 10),
(59, '0931168712_1_1_1.jpg', 11),
(60, '0931168712_2_1_1.jpg', 11),
(61, '0950354513_1_1_1.jpg', 11),
(62, '0950354513_2_1_1.jpg', 11),
(63, '0950354513_1_1_1.jpg', 11),
(64, '0950354513_2_1_1.jpg', 11),
(65, '0950354513_1_1_1.jpg', 12),
(66, '0950354513_2_1_1.jpg', 12),
(67, 'category-men.jpg', 13),
(68, '0915494643_1_1_1.jpg', 14),
(69, '0915494643_2_1_1.jpg', 14),
(70, 'category-jackets.jpg', 15);

-- --------------------------------------------------------

--
-- Struttura della tabella `indirizzo`
--

CREATE TABLE `indirizzo` (
  `id` int(10) UNSIGNED NOT NULL,
  `fullname` text NOT NULL,
  `email` text NOT NULL,
  `via` text NOT NULL,
  `cap` int(10) UNSIGNED NOT NULL,
  `stato` varchar(50) NOT NULL,
  `citta` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `indirizzo`
--

INSERT INTO `indirizzo` (`id`, `fullname`, `email`, `via`, `cap`, `stato`, `citta`) VALUES
(1, 'Simone Morisi', 'simone@email.it', 'Roma', 67051, 'Italia', 'L&ap;Avezzano'),
(2, 'Antonio Valentino', 'antonio@email.it', 'Calabria', 67051, 'Italia', 'L&ap;Avezzano'),
(3, 'Marco D\'antonio', 'marco@email.it', 'Pescara', 67051, 'Italia', 'L&ap;Avezzano');

-- --------------------------------------------------------

--
-- Struttura della tabella `lista_desideri`
--

CREATE TABLE `lista_desideri` (
  `id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `lista_desideri`
--

INSERT INTO `lista_desideri` (`id`) VALUES
(1),
(2),
(3);

-- --------------------------------------------------------

--
-- Struttura della tabella `ordine`
--

CREATE TABLE `ordine` (
  `id` int(10) UNSIGNED NOT NULL,
  `codice` varchar(50) NOT NULL,
  `stato_pagamento` varchar(45) NOT NULL,
  `tipo_spedizione` varchar(45) NOT NULL,
  `stato_ordine` varchar(45) NOT NULL,
  `data` date NOT NULL,
  `id_corriere` int(10) UNSIGNED DEFAULT NULL,
  `id_pagamento` int(10) UNSIGNED DEFAULT NULL,
  `id_indirizzo` int(10) UNSIGNED NOT NULL,
  `fullname` text NOT NULL,
  `email` text NOT NULL,
  `via` text NOT NULL,
  `cap` int(10) NOT NULL,
  `stato` varchar(50) NOT NULL,
  `citta` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `ordine`
--

INSERT INTO `ordine` (`id`, `codice`, `stato_pagamento`, `tipo_spedizione`, `stato_ordine`, `data`, `id_corriere`, `id_pagamento`, `id_indirizzo`, `fullname`, `email`, `via`, `cap`, `stato`, `citta`) VALUES
(42, 'P25Z7VSY', 'Confermato', 'express', 'In corso', '2023-09-05', 1, 1, 2, 'antonio@email.it', 'antonio@email.it', 'Calabria', 67051, 'Italia', 'L&ap;Avezzano'),
(43, 'SN65TW7A', 'In attesa', 'standard', 'In corso', '2023-09-05', 1, 2, 2, 'antonio@email.it', 'antonio@email.it', 'Calabria', 67051, 'Italia', 'L&ap;Avezzano');

-- --------------------------------------------------------

--
-- Struttura della tabella `pagamento`
--

CREATE TABLE `pagamento` (
  `id` int(10) UNSIGNED NOT NULL,
  `tipologia` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `pagamento`
--

INSERT INTO `pagamento` (`id`, `tipologia`) VALUES
(1, 'Carta di credito'),
(2, 'Alla consegna');

-- --------------------------------------------------------

--
-- Struttura della tabella `prodotto`
--

CREATE TABLE `prodotto` (
  `id` int(10) UNSIGNED NOT NULL,
  `codice_articolo` varchar(100) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `descrizione1` text NOT NULL,
  `descrizione2` text NOT NULL,
  `costo` float UNSIGNED NOT NULL,
  `materiale` varchar(50) NOT NULL,
  `vestibilita` varchar(50) NOT NULL,
  `tipologia` varchar(200) NOT NULL,
  `id_categoria` int(10) UNSIGNED DEFAULT NULL,
  `id_brand` int(10) UNSIGNED DEFAULT NULL,
  `id_colore` int(10) DEFAULT NULL,
  `id_sconto` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `prodotto`
--

INSERT INTO `prodotto` (`id`, `codice_articolo`, `nome`, `descrizione1`, `descrizione2`, `costo`, `materiale`, `vestibilita`, `tipologia`, `id_categoria`, `id_brand`, `id_colore`, `id_sconto`) VALUES
(1, 'ZTG5JHN8', 'Jeans larghi', 'Jeans a 5 tasche in consistente denim lavato, lunghezza alla caviglia. Linea comoda con gamba dritta e leggermente a sigaretta in fondo. Vita altissima con cintura staccabile con anelli a D. Patta con cerniera e bottone. Realizzati in parte con cotone riciclato.', 'Pantalone donna, elastico a coulisse in vita, rotture anteriori. Jeans casual dalla vestibilitÃ  regolare.', 70, 'Jeans', 'Oversize', 'Donna', 1, 1, 8, 0),
(2, 'HDG65PLJ', 'Jeans stretti neri', 'Jeans da donna, perfetti per tutte le stagioni', 'Jeans comodi ed eleganti', 95, 'Jeans', 'Stretti', 'Donna', 1, 1, 4, 0),
(3, 'LAMANINO', 'T-shirt bianca', 'Maglietta a maniche corte.', 'Semplice e comoda.', 6, 'Cotone', 'Oversize', 'Donna', 3, 5, 7, 0),
(4, 'S13JPRNA', 'Vestito nero', 'Abito trendy interamente ricoperto di pizzo, con gonna ampia e ondeggiante, perfetto per le occasioni di festa.', 'Il tessuto morbido, lo scollo rotondo e la manica a 3/4 assicurano il massimo comfort indossandolo. ', 50, 'Cotone', 'Normale', 'Donna', 2, 4, 4, 1),
(5, 'VHDHRTKZ', 'T-shirt', 'Maglia a mezze maniche con taschini, perfetta per i pomeriggi estivi', 'La soluzione ideale per tutti i tuoi outfit casual e disinvolti viene da bpc. Disegna una classica t-shirt a manica corta con scollo rotondo dalla linea allungata e dal design essenziale.', 25, 'Cotone', 'Normale', 'Donna', 3, 4, 11, 2),
(6, 'AJOCZB4J', 'Jeans aderenti', 'Un jeans basic nel tuo guardaroba, compagno di tanti outfit comodi e informali. ', 'Aspetto sempre attuale, grazie al taglio Bootcut, Ã¨ realizzato in confortevole cotone elasticizzato. Ãˆ un classico modello cinquetasche a vita alta, con impunture in colore a contrasto.', 75, 'Jeans', 'Aderente', 'Donna', 1, 3, 4, 0),
(7, 'ASDF8OIU', 'Vestito grigio', 'Veste da donna elegante comoda per ogni occasione', 'Vestito lungo leggero', 30, 'Cotone', 'Normale', 'Donna', 2, 5, 6, 0),
(8, 'YLM77NA1', 'Jeans a vita alta', 'Jeans modello cinque tasche con chiusura zip coperta, modello slim fit e Push in - a vita piÃ¹ alta per un maggior confort ed un effetto pancia piatta e tasche posteriori tagliate effetto push up', 'in denim di misto cotone e poliestere elasticizzato sottoposto a tintura lavaggio e trattamento per una finitura di colore unica ed un aspetto used', 33, 'jeans', 'Stretta', 'Donna', 1, 1, 8, 0),
(9, 'BNDAL11K', 't-shirt leggera', 'Maglia girocollo in filato di misto viscosa poliestere e poliammide', 'modello dritto leggermente svasato con fondo lavorato ottoman - effetto coste orizzontali strette e piccolo logo in metallo cucito sul fondo', 10, 'cotone', 'Larga', 'Donna', 3, 3, 10, 1),
(10, 'S13JPRNA', 'Vestito rosa', 'Abito in maglia lungo dal taglio dritto, con scollo a barca', 'manica lunga e ampi spacchi laterali con logo e bordo spalmato ton sur ton, in filato di misto poliestere poliammide acrilico e lana', 22, 'Cotone', 'Larga', 'Donna', 2, 4, 9, 0),
(11, 'LJPC4B41', 'Maglia scollata bianca', 'Con questa nuova linea, Kiabi si impegna con stile nello sviluppo della sua gamma di prodotti eco-sostenibili, promuovendo la sostenibilitÃ  ambientale nel settore tessile.', ' Questo prodotto Ã¨ realizzato al 100% in fibra di cotone proveniente da agricoltura biologica. Il cotone biologico Ã¨ coltivato senza semi OGM con compost naturale che sostituisce i fertilizzanti chimici e i pesticidi. Anche tu puoi portare avanti questa iniziativa, lavando i tuoi capi a 30 gradi o a freddo!', 18, 'Cotone', 'Normale', 'Donna', 3, 3, 7, 1),
(12, 'KJHT1MMV', 'Vestito a palline', 'Abito VIKA  seduce per il suo stile delicato e per i suoi dettagli curati.', 'Questo abito midi, confezionato in un materiale fluido, sfoggia una bella stampa vegetale, uno scollo a V che prosegue in tante arricciature e delle maniche corte con smock nella parte inferiore. ', 22, 'Cotone', 'Normale', 'Donna', 2, 1, 11, 0),
(13, 'BNM9L871M', 'Giacca uomo', 'Una nuova interpretazione del guardaroba maschile con questa camicia da uomo in tessuto oxford realizzata in cotone organico, casual e moderna.', 'Questo prodotto contiene cotone proveniente biologica. Cotone coltivato secondo regole rigorose, senza uso di pesticidi o prodotti chimici. Questo aiuta a preservare gli ecosistemi e ridurre impatto sul riscaldamento globale.\r\n', 30, 'Cotone', 'Normale', 'Uomo', 4, 4, 11, 0),
(14, 'VHDHRTKZ', 'T-shirt', 'Maglia a mezze maniche con taschini, perfetta per i pomeriggi estivi', 'La soluzione ideale per tutti i tuoi outfit casual e disinvolti viene da bpc. Disegna una classica t-shirt a manica corta con scollo rotondo dalla linea allungata e dal design essenziale.', 25, 'Cotone', 'Normale', 'Donna', 3, 4, 12, 0),
(15, 'LOLHGBB3', 'Giacca in pelle', 'Giacca in pelle per donna, per ogni occasione', 'Finti taschini a filetto sul frontale, cuciture a vista, imbottitura sulle spalle, interno foderato.', 50, 'Pelle', 'Stretta', 'Donna', 4, 3, 4, 0);

--
-- Trigger `prodotto`
--
DELIMITER $$
CREATE TRIGGER `elimina_recensioni_prodotto` BEFORE DELETE ON `prodotto` FOR EACH ROW BEGIN
DELETE FROM recensione WHERE id_prodotto = OLD.id;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struttura della tabella `prodotto_lista_desideri`
--

CREATE TABLE `prodotto_lista_desideri` (
  `id_prodotto` int(10) UNSIGNED NOT NULL,
  `id_lista_desideri` int(10) UNSIGNED NOT NULL,
  `taglia` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Struttura della tabella `prodotto_ordine`
--

CREATE TABLE `prodotto_ordine` (
  `id_prodotto` int(10) UNSIGNED NOT NULL,
  `id_ordine` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dump dei dati per la tabella `prodotto_ordine`
--

INSERT INTO `prodotto_ordine` (`id_prodotto`, `id_ordine`) VALUES
(210, 42),
(211, 43);

-- --------------------------------------------------------

--
-- Struttura della tabella `recensione`
--

CREATE TABLE `recensione` (
  `id` int(10) UNSIGNED NOT NULL,
  `dettaglio` text NOT NULL,
  `id_utente` int(10) UNSIGNED DEFAULT NULL,
  `valutazione` int(10) UNSIGNED NOT NULL,
  `id_prodotto` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `recensione`
--

INSERT INTO `recensione` (`id`, `dettaglio`, `id_utente`, `valutazione`, `id_prodotto`) VALUES
(1, 'Molto bella', 2, 5, 13),
(2, 'Ben fatto', 2, 4, 15);

-- --------------------------------------------------------

--
-- Struttura della tabella `sconto`
--

CREATE TABLE `sconto` (
  `id` int(10) NOT NULL,
  `codice_sconto` varchar(200) NOT NULL,
  `percentuale_sconto` varchar(20) NOT NULL,
  `scadenza` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dump dei dati per la tabella `sconto`
--

INSERT INTO `sconto` (`id`, `codice_sconto`, `percentuale_sconto`, `scadenza`) VALUES
(1, 'Sconti Estivi', '15', '2023-09-21'),
(2, 'Offerta Speciale', '40', '2023-09-15');

-- --------------------------------------------------------

--
-- Struttura della tabella `sito`
--

CREATE TABLE `sito` (
  `id` int(10) UNSIGNED NOT NULL,
  `Nome_negozio` text NOT NULL,
  `Nuovi_arrivi` text NOT NULL,
  `Descrizione_negozio` text NOT NULL,
  `Descrizione_abbigliamento` text NOT NULL,
  `Descrizione_shop` text NOT NULL,
  `Andress` text NOT NULL,
  `Call_center` text NOT NULL,
  `eletronic_support` text NOT NULL,
  `Call_Center_Number` int(30) NOT NULL,
  `Electronic_support_Number` varchar(50) NOT NULL,
  `titolo_pagina` text NOT NULL,
  `titolo_login` text NOT NULL,
  `titolo_registrazione` text NOT NULL,
  `descrizione_login` text NOT NULL,
  `descrizione_registrazione` text NOT NULL,
  `uomo` text NOT NULL,
  `donna` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dump dei dati per la tabella `sito`
--

INSERT INTO `sito` (`id`, `Nome_negozio`, `Nuovi_arrivi`, `Descrizione_negozio`, `Descrizione_abbigliamento`, `Descrizione_shop`, `Andress`, `Call_center`, `eletronic_support`, `Call_Center_Number`, `Electronic_support_Number`, `titolo_pagina`, `titolo_login`, `titolo_registrazione`, `descrizione_login`, `descrizione_registrazione`, `uomo`, `donna`) VALUES
(1, 'Chi siamo?', 'Nuovi Arrivi', 'Siamo una nuova catena di negozi emergente che punta su un servizio clienti superiore alla media.\r\nAbbiamo degli store dislocati in Italia.\r\n  ', 'I nuovi arrivi sono fondamentali per rimanere al passo con la moda, infatti la nostra pagina viene aggiornata giornalmente.\r\nAbbiamo una vasta scelta di capi e accessori di tutti i tipi per la creazione del tuo look preferito.', 'In questa pagina potrai visualizzare tutto il catalogo di Varkala', 'Via Milano, Milano, Italia', 'Disponibile nei giorni feriali dalle 8:00 fino alle 18:30.', 'Contattaci via email per richieste e info.', 273729381, 'support@email.it', 'Benvenuto in Varkala! \r\nEffettua il login, oppure registrarti qui.', 'Gia\' nostro cliente', 'Non sei ancora un nostro cliente registrato?', 'Effettua il login per usufruire tutti i nostri servizi!\r\nContatta il nostro centro assistenza o scrivi alla nostra mail per avere piu info o per fare delle richieste.', 'Registrati e entra a far parte della nostra community cosi da rimanere aggiornato sulla moda ogni volta che vuoi.\r\nContatta il nostro centro assistenza o scrivi alla nostra mail per info o richieste.\r\n\r\n', 'category-men.jpg', 'category-women.jpg');

-- --------------------------------------------------------

--
-- Struttura della tabella `slider`
--

CREATE TABLE `slider` (
  `id` int(10) NOT NULL,
  `foto` text NOT NULL,
  `titolo` text NOT NULL,
  `descrizione` text NOT NULL,
  `nome_bottone` text NOT NULL,
  `link_bottone` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dump dei dati per la tabella `slider`
--

INSERT INTO `slider` (`id`, `foto`, `titolo`, `descrizione`, `nome_bottone`, `link_bottone`) VALUES
(1, 'home-1-plain.jpg', 'Blouses Tops', 'Our all-time favourites', 'Discover more', 'category-sidebar'),
(2, 'home-2-plain.jpg', 'Blue White', 'Linen and denim', 'Start shopping', 'category-sidebar');

-- --------------------------------------------------------

--
-- Struttura della tabella `store`
--

CREATE TABLE `store` (
  `id` int(10) NOT NULL,
  `name` text NOT NULL,
  `andress` text NOT NULL,
  `number` bigint(20) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dump dei dati per la tabella `store`
--

INSERT INTO `store` (`id`, `name`, `andress`, `number`, `email`) VALUES
(1, 'Napoli', 'via Napoli', 3456789100, 'napoli@email.it'),
(2, 'Milano', 'via Milano', 3456789100, 'milano@email.it'),
(3, 'Roma', 'via Roma', 3456789100, 'roma@email.it');

-- --------------------------------------------------------

--
-- Struttura della tabella `taglia`
--

CREATE TABLE `taglia` (
  `id` int(10) UNSIGNED NOT NULL,
  `tipologia` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `taglia`
--

INSERT INTO `taglia` (`id`, `tipologia`) VALUES
(4, 'L'),
(3, 'M'),
(2, 'S'),
(5, 'XL'),
(1, 'XS');

-- --------------------------------------------------------

--
-- Struttura della tabella `taglia_prodotto`
--

CREATE TABLE `taglia_prodotto` (
  `id_taglia` int(10) UNSIGNED NOT NULL,
  `id_prodotto` int(10) UNSIGNED NOT NULL,
  `quantita` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `taglia_prodotto`
--

INSERT INTO `taglia_prodotto` (`id_taglia`, `id_prodotto`, `quantita`) VALUES
(1, 1, 19),
(1, 2, 12),
(1, 3, 7),
(1, 4, 2),
(1, 5, 10),
(1, 6, 4),
(1, 8, 15),
(1, 9, 15),
(1, 10, 10),
(1, 11, 9),
(1, 12, 15),
(1, 13, 15),
(1, 14, 15),
(1, 15, 15),
(2, 1, 19),
(2, 2, 18),
(2, 4, 13),
(2, 5, 17),
(2, 6, 17),
(2, 8, 16),
(2, 9, 16),
(2, 10, 16),
(2, 11, 10),
(2, 12, 16),
(2, 14, 16),
(2, 15, 12),
(3, 1, 15),
(3, 2, 19),
(3, 3, 9),
(3, 7, 19),
(3, 8, 12),
(3, 9, 12),
(3, 10, 12),
(3, 11, 10),
(3, 15, 12),
(4, 2, 56),
(4, 4, 27),
(4, 6, 5),
(4, 7, 18),
(4, 10, 18),
(4, 11, 18),
(4, 13, 16),
(5, 1, 57),
(5, 4, 10),
(5, 6, 12),
(5, 9, 17),
(5, 11, 7),
(5, 12, 12),
(5, 14, 17),
(6, 1, 70);

-- --------------------------------------------------------

--
-- Struttura della tabella `utente`
--

CREATE TABLE `utente` (
  `id` int(10) UNSIGNED NOT NULL,
  `nome` varchar(100) NOT NULL,
  `cognome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `telefono` bigint(20) NOT NULL,
  `fax` bigint(20) NOT NULL,
  `id_gruppo` int(10) UNSIGNED DEFAULT NULL,
  `id_lista_desideri` int(10) UNSIGNED DEFAULT NULL,
  `id_carrello` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `utente`
--

INSERT INTO `utente` (`id`, `nome`, `cognome`, `email`, `password`, `foto`, `telefono`, `fax`, `id_gruppo`, `id_lista_desideri`, `id_carrello`) VALUES
(1, 'Simone', 'Morisi', 'simone@email.it', 'pass', NULL, 3456789100, 1, 3, 1, 1),
(2, 'Antonio', 'Valentino', 'antonio@email.it', 'pass', NULL, 3456789100, 2, 1, 2, 2),
(3, 'Marco', 'D\'antonio', 'marco@email.it', 'pass', NULL, 3456789100, 3, 2, 3, 3);

-- --------------------------------------------------------

--
-- Struttura della tabella `utente_cartacredito`
--

CREATE TABLE `utente_cartacredito` (
  `id_utente` int(10) UNSIGNED NOT NULL,
  `id_carta_credito` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `utente_cartacredito`
--

INSERT INTO `utente_cartacredito` (`id_utente`, `id_carta_credito`) VALUES
(2, 1),
(2, 2);

-- --------------------------------------------------------

--
-- Struttura della tabella `utente_indirizzo`
--

CREATE TABLE `utente_indirizzo` (
  `id_utente` int(10) UNSIGNED NOT NULL,
  `id_indirizzo` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `utente_indirizzo`
--

INSERT INTO `utente_indirizzo` (`id_utente`, `id_indirizzo`) VALUES
(1, 1),
(2, 2),
(3, 3);

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `backup_indirizzo`
--
ALTER TABLE `backup_indirizzo`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nome` (`nome`);

--
-- Indici per le tabelle `carrello`
--
ALTER TABLE `carrello`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `carrello_prodotto`
--
ALTER TABLE `carrello_prodotto`
  ADD PRIMARY KEY (`id_carrello`,`id_prodotto`,`taglia`) USING BTREE,
  ADD KEY `prodotto_carrello` (`id_prodotto`);

--
-- Indici per le tabelle `carta_credito`
--
ALTER TABLE `carta_credito`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `colore`
--
ALTER TABLE `colore`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `corriere`
--
ALTER TABLE `corriere`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `dettaglio_prodotto`
--
ALTER TABLE `dettaglio_prodotto`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `email_registrate`
--
ALTER TABLE `email_registrate`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `email_ricevute`
--
ALTER TABLE `email_ricevute`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `gruppo`
--
ALTER TABLE `gruppo`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `immagine`
--
ALTER TABLE `immagine`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_prodotto_idx` (`id_prodotto`);

--
-- Indici per le tabelle `indirizzo`
--
ALTER TABLE `indirizzo`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `lista_desideri`
--
ALTER TABLE `lista_desideri`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `ordine`
--
ALTER TABLE `ordine`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_corriere_idx` (`id_corriere`),
  ADD KEY `id_pagamento_idx` (`id_pagamento`),
  ADD KEY `id_indirizzo2` (`id_indirizzo`);

--
-- Indici per le tabelle `pagamento`
--
ALTER TABLE `pagamento`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `prodotto`
--
ALTER TABLE `prodotto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_categoria_idx` (`id_categoria`),
  ADD KEY `id_brand2_idx` (`id_brand`),
  ADD KEY `id_colore` (`id_colore`) USING BTREE,
  ADD KEY `sconto` (`id_sconto`);

--
-- Indici per le tabelle `prodotto_lista_desideri`
--
ALTER TABLE `prodotto_lista_desideri`
  ADD PRIMARY KEY (`id_prodotto`,`id_lista_desideri`,`taglia`),
  ADD KEY `id_lista_desideri` (`id_lista_desideri`),
  ADD KEY `id_prodotto` (`id_prodotto`) USING BTREE;

--
-- Indici per le tabelle `prodotto_ordine`
--
ALTER TABLE `prodotto_ordine`
  ADD PRIMARY KEY (`id_prodotto`,`id_ordine`),
  ADD KEY `id_prodotto` (`id_prodotto`),
  ADD KEY `id_ordine` (`id_ordine`);

--
-- Indici per le tabelle `recensione`
--
ALTER TABLE `recensione`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_prodotto_idx` (`id_prodotto`),
  ADD KEY `id_utente_idx` (`id_utente`);

--
-- Indici per le tabelle `sconto`
--
ALTER TABLE `sconto`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `sito`
--
ALTER TABLE `sito`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `store`
--
ALTER TABLE `store`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `taglia`
--
ALTER TABLE `taglia`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tipologia` (`tipologia`);

--
-- Indici per le tabelle `taglia_prodotto`
--
ALTER TABLE `taglia_prodotto`
  ADD PRIMARY KEY (`id_taglia`,`id_prodotto`),
  ADD KEY `prodotto_taglia` (`id_prodotto`),
  ADD KEY `id_taglia` (`id_taglia`);

--
-- Indici per le tabelle `utente`
--
ALTER TABLE `utente`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`),
  ADD UNIQUE KEY `id_lista_desideri` (`id_lista_desideri`),
  ADD UNIQUE KEY `id_carrello` (`id_carrello`),
  ADD KEY `id_gruppo_idx` (`id_gruppo`),
  ADD KEY `id_lista_desideri_idx` (`id_lista_desideri`),
  ADD KEY `id_carrello_idx` (`id_carrello`);

--
-- Indici per le tabelle `utente_cartacredito`
--
ALTER TABLE `utente_cartacredito`
  ADD PRIMARY KEY (`id_utente`,`id_carta_credito`),
  ADD KEY `carta_utente` (`id_carta_credito`);

--
-- Indici per le tabelle `utente_indirizzo`
--
ALTER TABLE `utente_indirizzo`
  ADD PRIMARY KEY (`id_utente`,`id_indirizzo`),
  ADD KEY `indirizzo_utente` (`id_indirizzo`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `brand`
--
ALTER TABLE `brand`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT per la tabella `carrello`
--
ALTER TABLE `carrello`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT per la tabella `carta_credito`
--
ALTER TABLE `carta_credito`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=618;

--
-- AUTO_INCREMENT per la tabella `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT per la tabella `colore`
--
ALTER TABLE `colore`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT per la tabella `corriere`
--
ALTER TABLE `corriere`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT per la tabella `dettaglio_prodotto`
--
ALTER TABLE `dettaglio_prodotto`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=212;

--
-- AUTO_INCREMENT per la tabella `email_registrate`
--
ALTER TABLE `email_registrate`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT per la tabella `email_ricevute`
--
ALTER TABLE `email_ricevute`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT per la tabella `gruppo`
--
ALTER TABLE `gruppo`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT per la tabella `immagine`
--
ALTER TABLE `immagine`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT per la tabella `indirizzo`
--
ALTER TABLE `indirizzo`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT per la tabella `lista_desideri`
--
ALTER TABLE `lista_desideri`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT per la tabella `ordine`
--
ALTER TABLE `ordine`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT per la tabella `pagamento`
--
ALTER TABLE `pagamento`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT per la tabella `prodotto`
--
ALTER TABLE `prodotto`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT per la tabella `recensione`
--
ALTER TABLE `recensione`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT per la tabella `sconto`
--
ALTER TABLE `sconto`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT per la tabella `sito`
--
ALTER TABLE `sito`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT per la tabella `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT per la tabella `store`
--
ALTER TABLE `store`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT per la tabella `taglia`
--
ALTER TABLE `taglia`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT per la tabella `utente`
--
ALTER TABLE `utente`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `carrello_prodotto`
--
ALTER TABLE `carrello_prodotto`
  ADD CONSTRAINT `carrello_prodotto` FOREIGN KEY (`id_carrello`) REFERENCES `carrello` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `prodotto_carrello` FOREIGN KEY (`id_prodotto`) REFERENCES `prodotto` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limiti per la tabella `immagine`
--
ALTER TABLE `immagine`
  ADD CONSTRAINT `id_prodotto2` FOREIGN KEY (`id_prodotto`) REFERENCES `prodotto` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limiti per la tabella `ordine`
--
ALTER TABLE `ordine`
  ADD CONSTRAINT `id_corriere` FOREIGN KEY (`id_corriere`) REFERENCES `corriere` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `id_indirizzo` FOREIGN KEY (`id_indirizzo`) REFERENCES `indirizzo` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `id_pagamento` FOREIGN KEY (`id_pagamento`) REFERENCES `pagamento` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limiti per la tabella `prodotto`
--
ALTER TABLE `prodotto`
  ADD CONSTRAINT `id_brand2` FOREIGN KEY (`id_brand`) REFERENCES `brand` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `id_categoria` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `prodotto_colore` FOREIGN KEY (`id_colore`) REFERENCES `colore` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Limiti per la tabella `prodotto_lista_desideri`
--
ALTER TABLE `prodotto_lista_desideri`
  ADD CONSTRAINT `lista_utente` FOREIGN KEY (`id_lista_desideri`) REFERENCES `lista_desideri` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `prodotto-lista` FOREIGN KEY (`id_prodotto`) REFERENCES `prodotto` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limiti per la tabella `prodotto_ordine`
--
ALTER TABLE `prodotto_ordine`
  ADD CONSTRAINT `ordine_prodotto` FOREIGN KEY (`id_ordine`) REFERENCES `ordine` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `prodotto_ordine` FOREIGN KEY (`id_prodotto`) REFERENCES `dettaglio_prodotto` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limiti per la tabella `recensione`
--
ALTER TABLE `recensione`
  ADD CONSTRAINT `id_prodotto` FOREIGN KEY (`id_prodotto`) REFERENCES `prodotto` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `id_utente` FOREIGN KEY (`id_utente`) REFERENCES `utente` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limiti per la tabella `taglia_prodotto`
--
ALTER TABLE `taglia_prodotto`
  ADD CONSTRAINT `prodotto_taglia` FOREIGN KEY (`id_prodotto`) REFERENCES `prodotto` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limiti per la tabella `utente`
--
ALTER TABLE `utente`
  ADD CONSTRAINT `id_carrello` FOREIGN KEY (`id_carrello`) REFERENCES `carrello` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_gruppo` FOREIGN KEY (`id_gruppo`) REFERENCES `gruppo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `id_lista_desideri` FOREIGN KEY (`id_lista_desideri`) REFERENCES `lista_desideri` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limiti per la tabella `utente_cartacredito`
--
ALTER TABLE `utente_cartacredito`
  ADD CONSTRAINT `carta_utente` FOREIGN KEY (`id_carta_credito`) REFERENCES `carta_credito` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `utente_carta` FOREIGN KEY (`id_utente`) REFERENCES `utente` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limiti per la tabella `utente_indirizzo`
--
ALTER TABLE `utente_indirizzo`
  ADD CONSTRAINT `indirizzo_utente` FOREIGN KEY (`id_indirizzo`) REFERENCES `indirizzo` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `utente_indirizzo` FOREIGN KEY (`id_utente`) REFERENCES `utente` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
