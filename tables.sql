-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 25, 2019 at 03:05 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webvidz`
--

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE `movies` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `releaseyear` year(4) DEFAULT NULL,
  `synopsis` text,
  `poster` varchar(255) DEFAULT NULL,
  `trailer` varchar(255) DEFAULT NULL,
  `director` varchar(255) DEFAULT NULL,
  `genre` varchar(255) DEFAULT NULL,
  `rating` decimal(2,1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`id`, `title`, `releaseyear`, `synopsis`, `poster`, `trailer`, `director`, `genre`, `rating`) VALUES
(8, 'Avengers: Endgame', 2019, 'Adrift in space with no food or water, Tony Stark sends a message to Pepper Potts as his oxygen supply starts to dwindle. Meanwhile, the remaining Avengers -- Thor, Black Widow, Captain America and Bruce Banner -- must figure out a way to bring back their vanquished allies for an epic showdown with Thanos -- the evil demigod who decimated the planet and the universe.\r\n', 'http://www.gstatic.com/tv/thumb/v22vodart/15366809/p15366809_v_v8_af.jpg', 'https://www.youtube.com/embed/TcMBFSGVi1c', 'Anthony Russo, Joe Russo', 'action', '5.0'),
(9, 'Toy Story 4', 2019, 'Woody, Buzz Lightyear and the rest of the gang embark on a road trip with Bonnie and a new toy named Forky. The adventurous journey turns into an unexpected reunion as Woody\'s slight detour leads him to his long-lost friend Bo Peep. As Woody and Bo discuss the old days, they soon start to realize that they\'re worlds apart when it comes to what they want from life as a toy.\r\n', 'http://www.gstatic.com/tv/thumb/v22vodart/12004128/p12004128_v_v8_aj.jpg', 'https://www.youtube.com/embed/Ra2K0zDNu7A', 'Josh Cooley', 'comedy', '4.0'),
(10, 'Spider-Man: Far From Home', 2019, 'Peter Parker\'s relaxing European vacation takes an unexpected turn when Nick Fury shows up in his hotel room to recruit him for a mission. The world is in danger as four massive elemental creatures -- each representing Earth, air, water and fire -- emerge from a hole torn in the universe. Parker soon finds himself donning the Spider-Man suit to help Fury and fellow superhero Mysterio stop the evil entities from wreaking havoc across the continent.\r\n', 'http://www.gstatic.com/tv/thumb/v22vodart/14569140/p14569140_v_v8_am.jpg', 'https://www.youtube.com/embed/J_DXYCZceXE', 'Jon Watts', 'comedy', '4.0'),
(11, 'Black Panther', 2018, 'After the death of his father, T\'Challa returns home to the African nation of Wakanda to take his rightful place as king. When a powerful enemy suddenly reappears, T\'Challa\'s mettle as king -- and as Black Panther -- gets tested when he\'s drawn into a conflict that puts the fate of Wakanda and the entire world at risk. Faced with treachery and danger, the young king must rally his allies and release the full power of Black Panther to defeat his foes and secure the safety of his people.\r\n', 'http://www.gstatic.com/tv/thumb/v22vodart/12878741/p12878741_v_v8_ay.jpg', 'https://www.youtube.com/embed/T7R7gn6_M7k', 'Ryan Coogler', 'action', '4.0'),
(12, 'Avengers: Infinity War', 2018, 'Iron Man, Thor, the Hulk and the rest of the Avengers unite to battle their most powerful enemy yet -- the evil Thanos. On a mission to collect all six Infinity Stones, Thanos plans to use the artifacts to inflict his twisted will on reality. The fate of the planet and existence itself has never been more uncertain as everything the Avengers have fought for has led up to this moment.\r\n', 'http://www.gstatic.com/tv/thumb/v22vodart/12863030/p12863030_v_v8_ah.jpg', 'https://www.youtube.com/embed/6ZfuNTqbHE8', 'Anthony Russo', 'action', '4.0'),
(13, 'Downton Abbey', 2019, 'Excitement is high at Downton Abbey when the Crawley family learns that King George V and Queen Mary are coming to visit. But trouble soon arises when Mrs. Patmore, Daisy and the rest of the servants learn that the king and queen travel with their own chefs and attendants -- setting the stage for an impromptu scheme and other shenanigans.\r\n', 'http://www.gstatic.com/tv/thumb/v22vodart/16356852/p16356852_v_v8_aa.jpg', 'https://www.youtube.com/embed/tu3mP0c51hE', 'Michael Engler', 'drama', '4.0'),
(14, 'Thor: Ragnarok', 2017, 'Imprisoned on the other side of the universe, the mighty Thor finds himself in a deadly gladiatorial contest that pits him against the Hulk, his former ally and fellow Avenger. Thor\'s quest for survival leads him in a race against time to prevent the all-powerful Hela from destroying his home world and the Asgardian civilization.\r\n', 'http://www.gstatic.com/tv/thumb/v22vodart/12402331/p12402331_v_v8_az.jpg', 'https://www.youtube.com/embed/ue80QwXMRHg', 'Taika Waititi', 'comedy', '4.0'),
(15, 'American Factory', 2019, 'In post-industrial Ohio, a Chinese billionaire opens a new factory in the husk of an abandoned General Motors plant. Early days of hope and optimism give way to setbacks as high-tech China clashes with working-class America.\r\n', 'https://supchina.com/wp-content/uploads/2019/09/American-Factory.jpg', 'https://www.youtube.com/embed/m36QeKOJ2Fc', 'Julia Reichert, Steven Bognar', 'documentary', '4.0'),
(16, 'Joker', 2019, 'Failed comedian Arthur Fleck encounters violent thugs while wandering the streets of Gotham City dressed as a clown. Disregarded by society, Fleck begins a slow dissent into madness as he transforms into the criminal mastermind known as the Joker.\r\n', 'https://pbs.twimg.com/media/EDEsh0gU4AUTO3P?format=jpg&name=900x900', 'https://www.youtube.com/embed/t433PEQGErc', 'Todd Phillips', 'drama', '4.0'),
(17, 'Hustlers', 2019, 'Working as a stripper to make ends meet, Destiny\'s life changes forever when she becomes friends with Ramona -- the club\'s top money earner. Ramona soon shows Destiny how to finagle her way around the wealthy Wall Street clientele who frequent the club. But when the 2008 economic collapse cuts into their profits, the gals and two other dancers devise a daring scheme to take their lives back.\r\n', 'http://www.gstatic.com/tv/thumb/movieposters/16835712/p16835712_p_v8_ab.jpg', 'https://www.youtube.com/watch?v=_e67tHHEk5w', 'Lorene Scafaria', 'drama', '3.0'),
(18, 'Apollo 11', 2019, 'Never-before-seen footage and audio recordings take you straight into the heart of NASA\'s most celebrated mission as astronauts Neil Armstrong, Buzz Aldrin and Michael Collins embark on a historic trip to the moon.\r\n', 'http://www.gstatic.com/tv/thumb/v22vodart/15758881/p15758881_v_v8_ab.jpg', 'https://www.youtube.com/embed/tRZk-PWexdE', 'Todd Douglas Miller', 'documentary', '4.0'),
(19, '13th', 2016, 'Filmmaker Ava DuVernay explores the history of racial inequality in the United States, focusing on the fact that the nation\'s prisons are disproportionately filled with African-Americans.\r\n', 'http://www.gstatic.com/tv/thumb/v22vodart/13102119/p13102119_v_v8_aa.jpg', 'https://www.youtube.com/embed/f6GDcBf_IjY', ' Ava DuVernay', 'documentary', '4.0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `movies`
--
ALTER TABLE `movies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
