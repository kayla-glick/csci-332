-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 27, 2017 at 08:01 PM
-- Server version: 5.6.36-82.1-log
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kyleg382_csci332`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`kyleg382`@`localhost` PROCEDURE `DefaultTheatersProc` (`cinema` INT, `count` INT, `default_capacity` INT)  BEGIN
DECLARE i INT;
SET i = 0;
WHILE i < count DO
INSERT INTO Theaters (number, capacity, cinema_id) VALUES (i + 1, default_capacity, cinema);
SET i = i + 1;
END WHILE;
END$$

--
-- Functions
--
CREATE DEFINER=`kyleg382`@`localhost` FUNCTION `FullAddress` (`address_id` INT) RETURNS VARCHAR(524) CHARSET utf8 BEGIN
DECLARE address VARCHAR(524);
SET address = ( SELECT CONCAT(street, '<br>', city, ', ', state, ' ', zip) FROM Addresses WHERE id = address_id );
RETURN address;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Stand-in structure for view `AccountInformation`
-- (See below for the actual view)
--
CREATE TABLE `AccountInformation` (
`account_id` int(11)
,`first_name` varchar(255)
,`last_name` varchar(255)
,`email` varchar(255)
,`is_owner` tinyint(1)
,`is_producer` tinyint(1)
,`address_id` int(11)
,`address` varchar(524)
,`street` varchar(255)
,`city` varchar(255)
,`state` varchar(2)
,`zip` char(5)
);

-- --------------------------------------------------------

--
-- Table structure for table `Accounts`
--

CREATE TABLE `Accounts` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address_id` int(11) NOT NULL,
  `is_owner` tinyint(1) NOT NULL,
  `is_producer` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Accounts`
--

INSERT INTO `Accounts` (`id`, `first_name`, `last_name`, `email`, `address_id`, `is_owner`, `is_producer`) VALUES
(10, 'Kyle', 'Glick', 'glickkd@g.cofc.edu', 51, 1, 1),
(11, 'John', 'Doe', 'jodoe@gmail.com', 52, 0, 0),
(12, 'Jane', 'Doe', 'jadoe@gmail.com', 53, 0, 0),
(15, 'Richie', 'Rich', 'my@money.co', 57, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `Addresses`
--

CREATE TABLE `Addresses` (
  `id` int(11) NOT NULL,
  `state` varchar(2) NOT NULL,
  `city` varchar(255) NOT NULL,
  `street` varchar(255) NOT NULL,
  `zip` char(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Addresses`
--

INSERT INTO `Addresses` (`id`, `state`, `city`, `street`, `zip`) VALUES
(57, 'CA', 'Richland', '1 Richland Blvd', '55555'),
(58, 'CA', 'Richland', '6 Richland Blvd', '55555'),
(52, 'SC', 'Charleston', '123 Fake St. Apt. 1', '29424'),
(53, 'SC', 'Charleston', '123 Fake St. Apt. 2', '29424'),
(56, 'SC', 'Charleston', '22 Jump St.', '29424'),
(51, 'SC', 'Charleston', '66 George St.', '29424');

-- --------------------------------------------------------

--
-- Stand-in structure for view `CinemaInformation`
-- (See below for the actual view)
--
CREATE TABLE `CinemaInformation` (
`cinema_id` int(11)
,`name` varchar(255)
,`address` varchar(524)
,`address_id` int(11)
,`street` varchar(255)
,`city` varchar(255)
,`state` varchar(2)
,`zip` char(5)
,`owner_id` int(11)
,`owner` text
,`theater_count` bigint(21)
,`showing_count` bigint(21)
);

-- --------------------------------------------------------

--
-- Table structure for table `Cinemas`
--

CREATE TABLE `Cinemas` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address_id` int(11) NOT NULL,
  `owner_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Cinemas`
--

INSERT INTO `Cinemas` (`id`, `name`, `address_id`, `owner_id`) VALUES
(1, 'Cinemax', 56, 10),
(2, 'BigBucks Movies', 58, 15);

-- --------------------------------------------------------

--
-- Stand-in structure for view `MovieInformation`
-- (See below for the actual view)
--
CREATE TABLE `MovieInformation` (
`movie_id` int(11)
,`title` varchar(255)
,`description` text
,`genre` varchar(255)
,`rating` varchar(5)
,`release_date` date
,`run_time` int(11)
,`producer_id` int(11)
,`producer` varchar(511)
);

-- --------------------------------------------------------

--
-- Table structure for table `Movies`
--

CREATE TABLE `Movies` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text,
  `genre` varchar(255) NOT NULL,
  `rating` varchar(5) NOT NULL,
  `producer_id` int(11) NOT NULL,
  `run_time` int(11) NOT NULL,
  `release_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Movies`
--

INSERT INTO `Movies` (`id`, `title`, `description`, `genre`, `rating`, `producer_id`, `run_time`, `release_date`) VALUES
(3, 'An Excellent Movie', 'A movie that you MUST see.', 'Adventure', 'PG-13', 10, 90, '2017-11-20'),
(4, 'A Good Movie', 'A movie that you probably want to see.', 'Comedy', 'PG', 10, 85, '2017-11-14'),
(5, 'An Average Movie', 'This movie is decent, but not anything special.', 'Drama', 'G', 10, 87, '2017-11-24'),
(6, 'A Bad Movie', 'This really isnt worth seeing.', 'Animated', 'G', 10, 92, '2017-11-21'),
(7, 'A Terrible Movie', 'You definitely should not watch this movie.', 'Adult', 'R', 10, 95, '2017-11-25'),
(8, 'Star Wars XLV - The Last Return of the Jedi Clone', 'They really need to stop making these movies.', 'Action', 'PG', 15, 83, '2017-12-21'),
(9, 'Indiana Jones and the Programmers of the Lost Bug', 'Indiana Jones is back, and more confused than ever. Follow along as he finds the dastardly production bug stopping all customer workflow!', 'Horror', 'PG-13', 15, 105, '2018-01-01'),
(10, 'Shrek 4 - The Internet Meme', 'THIS IS MY SWAMP!', 'Animated', 'G', 15, 76, '2017-12-25'),
(11, 'Sausage Party 2', 'You\'re gonna need some Jesus in your life after this.', 'Comedy', 'R', 15, 70, '2017-12-05');

-- --------------------------------------------------------

--
-- Stand-in structure for view `ShowingInformation`
-- (See below for the actual view)
--
CREATE TABLE `ShowingInformation` (
`showing_id` int(11)
,`show_date` date
,`show_time` time
,`price` int(11)
,`movie_id` int(11)
,`movie` varchar(255)
,`rating` varchar(5)
,`run_time` int(11)
,`cinema_id` int(11)
,`theater_id` int(11)
,`theater_number` int(11)
,`capacity` int(11)
,`ticket_count` bigint(21)
);

-- --------------------------------------------------------

--
-- Table structure for table `Showings`
--

CREATE TABLE `Showings` (
  `id` int(11) NOT NULL,
  `theater_id` int(11) NOT NULL,
  `movie_id` int(11) NOT NULL,
  `show_date` date NOT NULL,
  `show_time` time NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Showings`
--

INSERT INTO `Showings` (`id`, `theater_id`, `movie_id`, `show_date`, `show_time`, `price`) VALUES
(1, 1, 3, '2017-11-20', '14:45:00', 1000),
(2, 2, 3, '2017-11-20', '15:15:00', 1000),
(3, 5, 3, '2017-11-20', '16:30:00', 1000),
(4, 3, 4, '2017-11-14', '14:00:00', 800),
(5, 4, 4, '2017-11-14', '15:00:00', 800),
(6, 5, 5, '2017-11-24', '17:00:00', 600),
(7, 4, 6, '2017-11-21', '13:00:00', 500),
(11, 1, 8, '2017-12-21', '17:00:00', 995),
(12, 2, 8, '2017-12-21', '15:00:00', 995),
(13, 4, 9, '2018-01-01', '15:00:00', 600),
(14, 5, 10, '2017-12-25', '21:00:00', 755),
(15, 3, 11, '2017-12-05', '18:00:00', 500),
(16, 2, 9, '2018-01-02', '15:00:00', 600),
(17, 8, 3, '2017-11-25', '16:00:00', 1500),
(18, 9, 4, '2017-11-25', '18:00:00', 1300),
(19, 10, 3, '2017-11-25', '20:00:00', 1500),
(20, 13, 5, '2017-11-25', '17:35:00', 900),
(21, 11, 8, '2017-12-28', '19:00:00', 2000),
(22, 9, 8, '2017-12-28', '18:00:00', 2000),
(23, 14, 9, '2018-01-01', '17:30:00', 1300),
(24, 17, 10, '2017-12-29', '20:30:00', 1000),
(25, 15, 11, '2017-12-31', '23:59:00', 100000);

--
-- Triggers `Showings`
--
DELIMITER $$
CREATE TRIGGER `InsertShowingsTrig` BEFORE INSERT ON `Showings` FOR EACH ROW BEGIN
DECLARE overlapping INTEGER;
DECLARE run_time INTEGER;
DECLARE end_time TIME;
DECLARE date DATE;
SET run_time = ( SELECT run_time FROM Movies WHERE id=NEW.movie_id );
SET end_time = AddTime(NEW.show_time, SEC_TO_TIME(run_time * 60));
SET overlapping = ( 
    SELECT COUNT(*) FROM Showings shows
    INNER JOIN Movies movs ON movs.id=shows.movie_id
    WHERE shows.theater_id=NEW.theater_id AND shows.show_date=NEW.show_date
    AND (
        (NEW.show_time >= shows.show_time AND NEW.show_time <= AddTime(shows.show_time, SEC_TO_TIME(movs.run_time * 60)))
        OR
        (end_time >= shows.show_time AND end_time <= AddTime(shows.show_time, SEC_TO_TIME(movs.run_time * 60)))
    )
);
IF overlapping > 0 THEN
SIGNAL sqlstate '45001' SET message_text="There is already a showing in this theater at this time.";
END IF;

SET date = ( SELECT release_date from Movies where id=NEW.movie_id );
IF NEW.show_date < date THEN
SIGNAL sqlstate '45001' SET message_text="Showings may only occur after a movie is released.";
END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Stand-in structure for view `ShowingsReport`
-- (See below for the actual view)
--
CREATE TABLE `ShowingsReport` (
`theater_id` int(11)
,`theater_number` int(11)
,`capacity` int(11)
,`show_date` date
,`show_time` time
,`price` int(11)
,`movie` varchar(255)
,`run_time` int(11)
,`ticket_count` bigint(21)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `TheaterInformation`
-- (See below for the actual view)
--
CREATE TABLE `TheaterInformation` (
`theater_id` int(11)
,`number` int(11)
,`capacity` int(11)
,`cinema_id` int(11)
,`showing_count` bigint(21)
);

-- --------------------------------------------------------

--
-- Table structure for table `Theaters`
--

CREATE TABLE `Theaters` (
  `id` int(11) NOT NULL,
  `number` int(11) NOT NULL,
  `capacity` int(11) NOT NULL,
  `cinema_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Theaters`
--

INSERT INTO `Theaters` (`id`, `number`, `capacity`, `cinema_id`) VALUES
(1, 1, 3, 1),
(2, 2, 300, 1),
(3, 3, 300, 1),
(4, 4, 300, 1),
(5, 5, 300, 1),
(7, 6, 200, 1),
(8, 1, 200, 2),
(9, 2, 200, 2),
(10, 3, 200, 2),
(11, 4, 200, 2),
(12, 5, 200, 2),
(13, 6, 200, 2),
(14, 7, 200, 2),
(15, 8, 200, 2),
(16, 9, 200, 2),
(17, 10, 200, 2);

-- --------------------------------------------------------

--
-- Stand-in structure for view `TicketInformation`
-- (See below for the actual view)
--
CREATE TABLE `TicketInformation` (
`ticket_id` int(11)
,`account_id` int(11)
,`show_date` date
,`show_time` time
,`price` int(11)
,`theater_number` int(11)
,`cinema_name` varchar(255)
,`address` varchar(524)
,`movie_title` varchar(255)
,`genre` varchar(255)
,`rating` varchar(5)
,`run_time` int(11)
);

-- --------------------------------------------------------

--
-- Table structure for table `Tickets`
--

CREATE TABLE `Tickets` (
  `id` int(11) NOT NULL,
  `transaction_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Tickets`
--

INSERT INTO `Tickets` (`id`, `transaction_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 2),
(5, 3),
(6, 3),
(7, 4),
(8, 5),
(9, 6);

-- --------------------------------------------------------

--
-- Table structure for table `Transactions`
--

CREATE TABLE `Transactions` (
  `id` int(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  `showing_id` int(11) NOT NULL,
  `ticket_count` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Transactions`
--

INSERT INTO `Transactions` (`id`, `account_id`, `showing_id`, `ticket_count`, `amount`, `date`) VALUES
(1, 10, 1, 3, 3000, '2017-11-27 17:17:07'),
(2, 11, 12, 1, 995, '2017-11-28 01:55:54'),
(3, 11, 19, 2, 3000, '2017-11-28 01:56:10'),
(4, 11, 14, 1, 755, '2017-11-28 01:56:56'),
(5, 12, 13, 1, 600, '2017-11-28 01:57:14'),
(6, 12, 25, 1, 100000, '2017-11-28 01:57:38');

--
-- Triggers `Transactions`
--
DELIMITER $$
CREATE TRIGGER `CreateTicketsTrig` AFTER INSERT ON `Transactions` FOR EACH ROW BEGIN
DECLARE i INTEGER;
SET i = 0;
WHILE i < NEW.ticket_count DO
INSERT INTO Tickets (transaction_id) VALUES (NEW.id);
SET i = i + 1;
END WHILE;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Structure for view `AccountInformation`
--
DROP TABLE IF EXISTS `AccountInformation`;

CREATE ALGORITHM=UNDEFINED DEFINER=`kyleg382`@`localhost` SQL SECURITY DEFINER VIEW `AccountInformation`  AS  select `acct`.`id` AS `account_id`,`acct`.`first_name` AS `first_name`,`acct`.`last_name` AS `last_name`,`acct`.`email` AS `email`,`acct`.`is_owner` AS `is_owner`,`acct`.`is_producer` AS `is_producer`,`addr`.`id` AS `address_id`,`FullAddress`(`addr`.`id`) AS `address`,`addr`.`street` AS `street`,`addr`.`city` AS `city`,`addr`.`state` AS `state`,`addr`.`zip` AS `zip` from (`Accounts` `acct` join `Addresses` `addr` on((`acct`.`address_id` = `addr`.`id`))) ;

-- --------------------------------------------------------

--
-- Structure for view `CinemaInformation`
--
DROP TABLE IF EXISTS `CinemaInformation`;

CREATE ALGORITHM=UNDEFINED DEFINER=`kyleg382`@`localhost` SQL SECURITY DEFINER VIEW `CinemaInformation`  AS  select `cins`.`id` AS `cinema_id`,`cins`.`name` AS `name`,`FullAddress`(`adds`.`id`) AS `address`,`adds`.`id` AS `address_id`,`adds`.`street` AS `street`,`adds`.`city` AS `city`,`adds`.`state` AS `state`,`adds`.`zip` AS `zip`,`cins`.`owner_id` AS `owner_id`,concat(`accs`.`first_name`,' ',`accs`.`last_name`,' (',`accs`.`email`,')') AS `owner`,(select count(`Theaters`.`id`) from `Theaters` where (`Theaters`.`cinema_id` = `cins`.`id`)) AS `theater_count`,(select count(`shows`.`id`) from (`Showings` `shows` join `Theaters` `thets` on((`shows`.`theater_id` = `thets`.`id`))) where (`thets`.`cinema_id` = `cins`.`id`)) AS `showing_count` from ((`Cinemas` `cins` join `Addresses` `adds` on((`adds`.`id` = `cins`.`address_id`))) join `Accounts` `accs` on((`accs`.`id` = `cins`.`owner_id`))) ;

-- --------------------------------------------------------

--
-- Structure for view `MovieInformation`
--
DROP TABLE IF EXISTS `MovieInformation`;

CREATE ALGORITHM=UNDEFINED DEFINER=`kyleg382`@`localhost` SQL SECURITY DEFINER VIEW `MovieInformation`  AS  select distinct `movs`.`id` AS `movie_id`,`movs`.`title` AS `title`,`movs`.`description` AS `description`,`movs`.`genre` AS `genre`,`movs`.`rating` AS `rating`,`movs`.`release_date` AS `release_date`,`movs`.`run_time` AS `run_time`,`movs`.`producer_id` AS `producer_id`,concat(`accs`.`first_name`,' ',`accs`.`last_name`) AS `producer` from (`Movies` `movs` join `Accounts` `accs` on((`accs`.`id` = `movs`.`producer_id`))) ;

-- --------------------------------------------------------

--
-- Structure for view `ShowingInformation`
--
DROP TABLE IF EXISTS `ShowingInformation`;

CREATE ALGORITHM=UNDEFINED DEFINER=`kyleg382`@`localhost` SQL SECURITY DEFINER VIEW `ShowingInformation`  AS  select `shows`.`id` AS `showing_id`,`shows`.`show_date` AS `show_date`,`shows`.`show_time` AS `show_time`,`shows`.`price` AS `price`,`movs`.`id` AS `movie_id`,`movs`.`title` AS `movie`,`movs`.`rating` AS `rating`,`movs`.`run_time` AS `run_time`,`cins`.`id` AS `cinema_id`,`thets`.`id` AS `theater_id`,`thets`.`number` AS `theater_number`,`thets`.`capacity` AS `capacity`,(select count(0) from (`Tickets` `ticks` join `Transactions` `trans` on((`ticks`.`transaction_id` = `trans`.`id`))) where (`trans`.`showing_id` = `shows`.`id`)) AS `ticket_count` from (((`Showings` `shows` join `Movies` `movs` on((`shows`.`movie_id` = `movs`.`id`))) join `Theaters` `thets` on((`shows`.`theater_id` = `thets`.`id`))) join `Cinemas` `cins` on((`thets`.`cinema_id` = `cins`.`id`))) order by `movs`.`title`,`shows`.`show_date`,`shows`.`show_time` ;

-- --------------------------------------------------------

--
-- Structure for view `ShowingsReport`
--
DROP TABLE IF EXISTS `ShowingsReport`;

CREATE ALGORITHM=UNDEFINED DEFINER=`kyleg382`@`localhost` SQL SECURITY DEFINER VIEW `ShowingsReport`  AS  select `thets`.`id` AS `theater_id`,`thets`.`number` AS `theater_number`,`thets`.`capacity` AS `capacity`,`shows`.`show_date` AS `show_date`,`shows`.`show_time` AS `show_time`,`shows`.`price` AS `price`,`movs`.`title` AS `movie`,`movs`.`run_time` AS `run_time`,(select count(0) from (`Tickets` `ticks` join `Transactions` `trans` on((`ticks`.`transaction_id` = `trans`.`id`))) where (`trans`.`showing_id` = `shows`.`id`)) AS `ticket_count` from ((`Theaters` `thets` left join `Showings` `shows` on((`shows`.`theater_id` = `thets`.`id`))) join `Movies` `movs` on((`shows`.`movie_id` = `movs`.`id`))) ;

-- --------------------------------------------------------

--
-- Structure for view `TheaterInformation`
--
DROP TABLE IF EXISTS `TheaterInformation`;

CREATE ALGORITHM=UNDEFINED DEFINER=`kyleg382`@`localhost` SQL SECURITY DEFINER VIEW `TheaterInformation`  AS  select `thets`.`id` AS `theater_id`,`thets`.`number` AS `number`,`thets`.`capacity` AS `capacity`,`cins`.`id` AS `cinema_id`,(select count(`Showings`.`id`) from `Showings` where (`Showings`.`theater_id` = `thets`.`id`)) AS `showing_count` from (`Theaters` `thets` join `Cinemas` `cins` on((`thets`.`cinema_id` = `cins`.`id`))) ;

-- --------------------------------------------------------

--
-- Structure for view `TicketInformation`
--
DROP TABLE IF EXISTS `TicketInformation`;

CREATE ALGORITHM=UNDEFINED DEFINER=`kyleg382`@`localhost` SQL SECURITY DEFINER VIEW `TicketInformation`  AS  select `ticks`.`id` AS `ticket_id`,`tracs`.`account_id` AS `account_id`,`shows`.`show_date` AS `show_date`,`shows`.`show_time` AS `show_time`,`shows`.`price` AS `price`,`thetrs`.`number` AS `theater_number`,`cins`.`name` AS `cinema_name`,`FullAddress`(`adds`.`id`) AS `address`,`movs`.`title` AS `movie_title`,`movs`.`genre` AS `genre`,`movs`.`rating` AS `rating`,`movs`.`run_time` AS `run_time` from ((((((`Tickets` `ticks` join `Transactions` `tracs` on((`ticks`.`transaction_id` = `tracs`.`id`))) join `Showings` `shows` on((`tracs`.`showing_id` = `shows`.`id`))) join `Theaters` `thetrs` on((`shows`.`theater_id` = `thetrs`.`id`))) join `Cinemas` `cins` on((`thetrs`.`cinema_id` = `cins`.`id`))) join `Addresses` `adds` on((`cins`.`address_id` = `adds`.`id`))) join `Movies` `movs` on((`shows`.`movie_id` = `movs`.`id`))) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Accounts`
--
ALTER TABLE `Accounts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `address_id` (`address_id`);

--
-- Indexes for table `Addresses`
--
ALTER TABLE `Addresses`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `full_address` (`state`,`city`,`street`,`zip`);

--
-- Indexes for table `Cinemas`
--
ALTER TABLE `Cinemas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `address_id` (`address_id`),
  ADD KEY `owner_id` (`owner_id`);

--
-- Indexes for table `Movies`
--
ALTER TABLE `Movies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `producer_id` (`producer_id`);

--
-- Indexes for table `Showings`
--
ALTER TABLE `Showings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `theater_id` (`theater_id`),
  ADD KEY `movie_id` (`movie_id`);

--
-- Indexes for table `Theaters`
--
ALTER TABLE `Theaters`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `number` (`number`,`cinema_id`),
  ADD KEY `cinema_id` (`cinema_id`);

--
-- Indexes for table `Tickets`
--
ALTER TABLE `Tickets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transaction_id` (`transaction_id`);

--
-- Indexes for table `Transactions`
--
ALTER TABLE `Transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `account_id` (`account_id`),
  ADD KEY `showing_id` (`showing_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Accounts`
--
ALTER TABLE `Accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `Addresses`
--
ALTER TABLE `Addresses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;
--
-- AUTO_INCREMENT for table `Cinemas`
--
ALTER TABLE `Cinemas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `Movies`
--
ALTER TABLE `Movies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `Showings`
--
ALTER TABLE `Showings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `Theaters`
--
ALTER TABLE `Theaters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `Tickets`
--
ALTER TABLE `Tickets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `Transactions`
--
ALTER TABLE `Transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `Accounts`
--
ALTER TABLE `Accounts`
  ADD CONSTRAINT `Accounts_ibfk_1` FOREIGN KEY (`address_id`) REFERENCES `Addresses` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `Cinemas`
--
ALTER TABLE `Cinemas`
  ADD CONSTRAINT `Cinemas_ibfk_1` FOREIGN KEY (`address_id`) REFERENCES `Addresses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `Cinemas_ibfk_2` FOREIGN KEY (`owner_id`) REFERENCES `Accounts` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `Movies`
--
ALTER TABLE `Movies`
  ADD CONSTRAINT `Movies_ibfk_1` FOREIGN KEY (`producer_id`) REFERENCES `Accounts` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `Showings`
--
ALTER TABLE `Showings`
  ADD CONSTRAINT `Showings_ibfk_1` FOREIGN KEY (`theater_id`) REFERENCES `Theaters` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `Showings_ibfk_2` FOREIGN KEY (`movie_id`) REFERENCES `Movies` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `Theaters`
--
ALTER TABLE `Theaters`
  ADD CONSTRAINT `Theaters_ibfk_1` FOREIGN KEY (`cinema_id`) REFERENCES `Cinemas` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `Tickets`
--
ALTER TABLE `Tickets`
  ADD CONSTRAINT `Tickets_ibfk_1` FOREIGN KEY (`transaction_id`) REFERENCES `Transactions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `Transactions`
--
ALTER TABLE `Transactions`
  ADD CONSTRAINT `Transactions_ibfk_1` FOREIGN KEY (`account_id`) REFERENCES `Accounts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `Transactions_ibfk_2` FOREIGN KEY (`showing_id`) REFERENCES `Showings` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
