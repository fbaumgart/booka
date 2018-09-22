-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 01 Lip 2018, 22:34
-- Wersja serwera: 10.1.32-MariaDB
-- Wersja PHP: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `booka`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `books`
--

CREATE TABLE `books` (
  `ID_book` int(11) NOT NULL,
  `title` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `author_first_name` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `author_last_name` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `books`
--

INSERT INTO `books` (`ID_book`, `title`, `author_first_name`, `author_last_name`) VALUES
(1, 'Crime And Punishment', 'Fyodor', 'Dostoevsky'),
(2, 'Women', 'Charles', 'Bukowski'),
(3, 'The Catcher In The Rye', 'Jerome David', 'Salinger'),
(4, 'Ulysses', 'James', 'Joyce'),
(5, 'The Trial', 'Franz', 'Kafka'),
(6, 'The Da Vinci Code', 'Dan', 'Brown'),
(7, 'The Idiot', 'Fyodor', 'Dostoevsky'),
(8, 'The Dark Tower', 'Stephen', 'King'),
(9, 'Pet Semetery', 'Stephen', 'King'),
(10, 'The Brief History Of Time', 'Stephen', 'Hawking'),
(11, 'A Clockwork Orange', 'Anthony', 'Burgess'),
(12, 'Macbeth', 'William', 'Shakespear'),
(13, 'Harry Potter and The Goblet Of Fire', 'J.K.', 'Rowling'),
(14, 'Fifty Shades Of Gray', 'E.L.', 'James'),
(15, 'Pride And Prejudice', 'Jane', 'Austen'),
(16, 'In Search Of Lost Time', 'Marcel', 'Proust'),
(17, 'Moby Dick', 'Herman', 'Melville'),
(18, 'War And Peace', 'Leo', 'Tolstoy'),
(19, 'Lolita', 'Vladimir', 'Nabokov'),
(20, 'Heart Of Darkness', 'Joseph', 'Conrad'),
(21, 'Ninety Eighty Four', 'George', 'Orwell'),
(22, 'The Hound Of The Baskervilles', 'Arthur Conan', 'Doyle');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `transactions`
--

CREATE TABLE `transactions` (
  `ID_transaction` int(11) NOT NULL,
  `Date_start` date NOT NULL,
  `Date_end` date DEFAULT NULL,
  `ID_book` int(11) NOT NULL,
  `ID_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `ID_user` int(11) NOT NULL,
  `username` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `password` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `email` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`ID_user`, `username`, `password`, `email`) VALUES
(28, 'admin', '$2y$10$1.04cbdk4Q9t.WP6etTUguzV4ph9wLB42ROYCc5nHaeBkYcCrVZ2K', 'admin@example.com');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`ID_book`),
  ADD UNIQUE KEY `ID_book` (`ID_book`);

--
-- Indeksy dla tabeli `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`ID_transaction`),
  ADD KEY `transaction_book_fk` (`ID_book`),
  ADD KEY `transaction_user_fk` (`ID_user`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID_user`),
  ADD UNIQUE KEY `ID_user` (`ID_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `books`
--
ALTER TABLE `books`
  MODIFY `ID_book` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT dla tabeli `transactions`
--
ALTER TABLE `transactions`
  MODIFY `ID_transaction` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `ID_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transaction_book_fk` FOREIGN KEY (`ID_book`) REFERENCES `books` (`ID_book`) ON UPDATE CASCADE,
  ADD CONSTRAINT `transaction_user_fk` FOREIGN KEY (`ID_user`) REFERENCES `users` (`ID_user`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
