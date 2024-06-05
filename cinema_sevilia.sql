-- --------------------------------------------------------
-- Hôte:                         127.0.0.1
-- Version du serveur:           8.0.30 - MySQL Community Server - GPL
-- SE du serveur:                Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Listage de la structure de la base pour cinema_sevilia
CREATE DATABASE IF NOT EXISTS `cinema_sevilia` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `cinema_sevilia`;

-- Listage de la structure de table cinema_sevilia. actor
CREATE TABLE IF NOT EXISTS `actor` (
  `idActor` int NOT NULL AUTO_INCREMENT,
  `nameActor` varchar(50) NOT NULL DEFAULT '0',
  `surnameActor` varchar(50) NOT NULL DEFAULT '0',
  `genderActor` varchar(10) NOT NULL DEFAULT '0',
  `bdayActor` date NOT NULL,
  PRIMARY KEY (`idActor`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table cinema_sevilia.actor : ~0 rows (environ)
INSERT INTO `actor` (`idActor`, `nameActor`, `surnameActor`, `genderActor`, `bdayAtor`) VALUES
	(1, 'Uma', 'Thurman', 'f', '1970-04-29'),
	(2, 'David', 'Carradine', 'm', '1936-12-08'),
	(3, 'Lucy ', 'Liu', 'f', '1968-12-02'),
	(4, 'Michael', 'Madsen', 'm', '1957-09-25'),
	(5, 'John', 'Travolta', 'm', '1954-02-18'),
	(6, 'Samuel', 'L. Jackson', 'm', '1948-12-21'),
	(7, 'Jackie', 'Chan', 'm', '1954-04-07'),
	(8, 'Pierce', 'Brosnan', 'm', '1953-05-16'),
	(9, 'Ryan', 'Gosling', 'm', '1980-11-12'),
	(10, 'Rachel', 'McAdams', 'f', '1978-11-17');

-- Listage de la structure de table cinema_sevilia. casting
CREATE TABLE IF NOT EXISTS `casting` (
  `idFilm` int NOT NULL,
  `idActor` int NOT NULL,
  `idRole` int NOT NULL,
  KEY `idFilm` (`idFilm`),
  KEY `idActor` (`idActor`),
  KEY `idRole` (`idRole`),
  CONSTRAINT `FK__film` FOREIGN KEY (`idFilm`) REFERENCES `film` (`idFilm`),
  CONSTRAINT `FK_casting_actor` FOREIGN KEY (`idActor`) REFERENCES `actor` (`idActor`),
  CONSTRAINT `FK_casting_role` FOREIGN KEY (`idRole`) REFERENCES `role` (`idRole`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table cinema_sevilia.casting : ~0 rows (environ)
INSERT INTO `casting` (`idFilm`, `idActor`, `idRole`) VALUES
	(3, 1, 1),
	(3, 2, 3),
	(3, 3, 2),
	(5, 1, 1),
	(5, 2, 3),
	(5, 4, 4),
	(6, 1, 7),
	(6, 5, 5),
	(6, 6, 6),
	(9, 7, 8),
	(9, 8, 9),
	(10, 9, 10),
	(10, 10, 11);

-- Listage de la structure de table cinema_sevilia. director
CREATE TABLE IF NOT EXISTS `director` (
  `idDirector` int NOT NULL AUTO_INCREMENT,
  `nameDirector` varchar(50) NOT NULL DEFAULT '0',
  `surnameDirector` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`idDirector`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table cinema_sevilia.director : ~0 rows (environ)
INSERT INTO `director` (`idDirector`, `nameDirector`, `surnameDirector`) VALUES
	(1, 'Quentin', 'Tarantino'),
	(2, 'Jackie', 'Chan'),
	(3, 'Nick', 'Cassavetes');

-- Listage de la structure de table cinema_sevilia. film
CREATE TABLE IF NOT EXISTS `film` (
  `idFilm` int NOT NULL AUTO_INCREMENT,
  `titleFilm` varchar(150) NOT NULL DEFAULT '0',
  `yearRelease` int NOT NULL DEFAULT '0',
  `durationMins` int NOT NULL DEFAULT '0',
  `synopsisFilm` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `posterFilm` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `ratingFilm` int NOT NULL DEFAULT '0',
  `idDirector` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`idFilm`),
  KEY `idDirector` (`idDirector`),
  CONSTRAINT `FK__director` FOREIGN KEY (`idDirector`) REFERENCES `director` (`idDirector`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table cinema_sevilia.film : ~0 rows (environ)
INSERT INTO `film` (`idFilm`, `titleFilm`, `yearRelease`, `durationMins`, `synopsisFilm`, `posterFilm`, `ratingFilm`, `idDirector`) VALUES
	(3, 'Kill Bill 1', 2003, 111, NULL, NULL, 4, 1),
	(5, 'Kill Bill 2', 2004, 137, 'Après s\'être débarrassée de ses anciennes collègues Vernita Green et O-Ren Ishii, la Mariée poursuit sa quête vengeresse. Il lui reste à régler le sort de Budd puis de Elle Driver avant d\'atteindre le but ultime : tuer Bill.', NULL, 4, 1),
	(6, 'Pulp Fiction', 1994, 154, NULL, NULL, 5, 1),
	(9, 'The Foreigner', 2017, 114, NULL, NULL, 5, 2),
	(10, 'The Notebook', 2004, 121, NULL, NULL, 5, 3);

-- Listage de la structure de table cinema_sevilia. films_genres
CREATE TABLE IF NOT EXISTS `films_genres` (
  `idGenre` int NOT NULL,
  `idFilm` int NOT NULL,
  KEY `idGenre` (`idGenre`),
  KEY `idFilm` (`idFilm`),
  CONSTRAINT `FK__genre` FOREIGN KEY (`idGenre`) REFERENCES `genre` (`idGenre`),
  CONSTRAINT `FK_films_genres_film` FOREIGN KEY (`idFilm`) REFERENCES `film` (`idFilm`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table cinema_sevilia.films_genres : ~0 rows (environ)
INSERT INTO `films_genres` (`idGenre`, `idFilm`) VALUES
	(1, 3),
	(2, 3),
	(1, 5),
	(1, 5),
	(4, 6),
	(3, 6),
	(1, 9),
	(5, 9),
	(7, 10),
	(6, 10);

-- Listage de la structure de table cinema_sevilia. genre
CREATE TABLE IF NOT EXISTS `genre` (
  `idGenre` int NOT NULL AUTO_INCREMENT,
  `nameGenre` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`idGenre`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table cinema_sevilia.genre : ~0 rows (environ)
INSERT INTO `genre` (`idGenre`, `nameGenre`) VALUES
	(1, 'action'),
	(2, 'martial arts'),
	(3, 'feature film'),
	(4, 'crime fiction'),
	(5, 'thriller'),
	(6, 'romance'),
	(7, 'drama');

-- Listage de la structure de table cinema_sevilia. role
CREATE TABLE IF NOT EXISTS `role` (
  `idRole` int NOT NULL AUTO_INCREMENT,
  `nameRole` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`idRole`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table cinema_sevilia.role : ~0 rows (environ)
INSERT INTO `role` (`idRole`, `nameRole`) VALUES
	(1, 'Bride'),
	(2, 'O-Ren Ishii'),
	(3, 'Bill '),
	(4, 'Budd'),
	(5, 'Vincent Vega'),
	(6, 'Jules Winnfield'),
	(7, 'Mia Wallace'),
	(8, 'Quan Ngoc Minh'),
	(9, 'Liam Hennessy'),
	(10, 'Noah'),
	(11, '	Allie Hamilton');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
