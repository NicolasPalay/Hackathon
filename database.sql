-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Jeu 26 Octobre 2017 à 13:53
-- Version du serveur :  5.7.19-0ubuntu0.16.04.1
-- Version de PHP :  7.0.22-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `simple-mvc`
--

-- --------------------------------------------------------

--
-- Structure de la table `item`
--

CREATE TABLE `item` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `item`
--

INSERT INTO `item` (`id`, `title`) VALUES
(1, 'Stuff'),
(2, 'Doodads');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `item`
--
ALTER TABLE `item`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

create table reservation
(
    id_reservation int auto_increment
        primary key,
    starting_date  date not null,
    end_date       date not null
);

create table user
(
    id_user      int auto_increment
        primary key,
    first_name   varchar(255) not null,
    last_name    varchar(255) not null,
    email        varchar(255) not null,
    phone_number varchar(15)  not null
);

create table van
(
    id_van             int auto_increment
        primary key,
    brand              varchar(255) not null,
    type               varchar(255) not null,
    year               varchar(255) not null,
    gear_box           varchar(255) not null,
    first_photo_link   varchar(255) not null,
    second_photo_link  varchar(255) null,
    third_photo_link   varchar(255) not null,
    fourth__photo_link varchar(255) not null,
    fifth_photo_link   varchar(255) not null
);

create table car_choice
(
    id_user int not null,
    id_van  int not null,
    constraint fk_car_choice_user_id
        foreign key (id_user) references user (id_user),
    constraint fk_car_choice_van_id
        foreign key (id_van) references van (id_van)
);

create table location
(
    van_id         int not null,
    reservation_id int not null,
    constraint fk_Location_reservation_id
        foreign key (reservation_id) references reservation (id_reservation),
    constraint fk_Location_van_id
        foreign key (van_id) references van (id_van)
);

insert into van (id_van, brand, type, year, gear_box, first_photo_link, second_photo_link, third_photo_link, fourth__photo_link, fifth_photo_link)
values  (1, 'Volkswagen', 'beach', '2022', 'Manual', 'beach-one-first-photo', 'beach-one-second-photo', 'beach-one-third-photo', 'beach-one-fourth-photo', 'beach-one-fifth-photo'),
        (2, 'Volkswagen', 'beach', '2022', 'Manual', 'beach-two-first-photo', 'beach-two-second-photo', 'beach-two-third-photo', 'beach-two-fourth-photo', 'beach-two-fifth-photo'),
        (3, 'Volkswagen', 'beach', '2022', 'Auto', 'beach-three-first-photo', 'beach-three-second-photo', 'beach-three-third-photo', 'beach-three-fourth-photo', 'beach-three-fifth-photo'),
        (4, 'Volkswagen', 'beach', '2022', 'Auto', 'beach-four-first-photo', 'beach-four-second-photo', 'beach-four-third-photo', 'beach-four-fourth-photo', 'beach-four-fifth-photo'),
        (5, 'Volkswagen', 'coast', '2022', 'Manual', 'coast-one-first-photo', 'coast-one-second-photo', 'coast-one-third-photo', 'coast-one-fourth-photo', 'coast-one-fifth-photo'),
        (6, 'Volkswagen', 'coast', '2022', 'Manual', 'coast-two-first-photo', 'coast-two-second-photo', 'coast-two-third-photo', 'coast-two-fourth-photo', 'coast-two-fifth-photo'),
        (7, 'Volkswagen', 'coast', '2022', 'Auto', 'coast-three-first-photo', 'coast-three-second-photo', 'coast-three-third-photo', 'coast-three-fourth-photo', 'coast-three-fifth-photo'),
        (8, 'Volkswagen', 'edition', '2022', 'Manual', 'edition-one-first-photo', 'edition-one-second-photo', 'edition-one-third-photo', 'edition-one-fourth-photo', 'edition-one-fifth-photo'),
        (9, 'Volkswagen', 'edition', '2022', 'Manual', 'edition-two-first-photo', 'edition-two-second-photo', 'edition-two-third-photo', 'edition-two-fourth-photo', 'edition-two-fifth-photo'),
        (10, 'Volkswagen', 'edition', '2022', 'Auto', 'edition-three-first-photo', 'editon-three-second-photo', 'editon-three-third-photo', 'editon-three-fourth-photo', 'edition-three-fifth-photo');

insert into user (id_user, first_name, last_name, email, phone_number)
values  (1, 'Tomas', 'Spit', 'Info@aldiana.com', '051020304050'),
        (2, 'Nico', 'Dev', 'Info@aldiana.com', '051020304050'),
        (3, 'Youssouf', 'Soudjay', 'Info@aldiana.com', '051020304050'),
        (4, 'Edouard', 'Houmaire', 'Info@aldiana.com', '051020304050');
