-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 30 nov. 2021 à 10:41
-- Version du serveur : 10.4.21-MariaDB
-- Version de PHP : 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `ventebd`
--

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE `commande` (
  `idC` int(10) NOT NULL,
  `nomUser` varchar(255) NOT NULL,
  `prenomUser` varchar(255) NOT NULL,
  `addresse` varchar(255) NOT NULL,
  `telephone` int(8) NOT NULL,
  `id_produit` int(10) NOT NULL,
  `quantite` int(255) NOT NULL,
  `modeLivraison` varchar(255) NOT NULL,
  `modePaiement` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `commande`
--

INSERT INTO `commande` (`idC`, `nomUser`, `prenomUser`, `addresse`, `telephone`, `id_produit`, `quantite`, `modeLivraison`, `modePaiement`, `mail`, `status`) VALUES
(11, 'bader', 'meriem', 'le sers', 26334028, 7, 1, 'à domicile', 'espéce', 'meriembader8@gmail.com', 'closed'),
(13, 'Bacha', 'yosra', 'gafsa ville ', 12345678, 3, 1, 'sur place', 'espéce', 'yosra.bacha@esprit.tn', 'opened'),
(14, 'Flen', 'Ben flen', 'rue flen ben falten', 25893699, 6, 1, 'par poste', 'virement', 'flen.benfalten@falten.tn', 'opened');

-- --------------------------------------------------------

--
-- Structure de la table `paiement`
--

CREATE TABLE `paiement` (
  `id` int(11) NOT NULL,
  `commandeRef` varchar(255) NOT NULL,
  `produit` varchar(255) NOT NULL,
  `prix` int(255) NOT NULL,
  `date` date NOT NULL,
  `mode` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `paiement`
--

INSERT INTO `paiement` (`id`, `commandeRef`, `produit`, `prix`, `date`, `mode`) VALUES
(2, '12346987FG', 'velo', 566, '2021-11-29', 'espéce'),
(3, '1555987RT', 'velo', 566, '2021-11-29', 'espéce'),
(4, 'a15799333FG', 'voiture', 5988200, '2021-11-29', 'en ligne'),
(6, '559gfr89', 'poupé', 10, '2021-11-29', 'chéquee'),
(8, '7899635FT', 'rubiks', 10, '2021-11-30', 'en ligne');

-- --------------------------------------------------------

--
-- Structure de la table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `desc` text NOT NULL,
  `price` decimal(7,2) NOT NULL,
  `rrp` decimal(7,2) NOT NULL DEFAULT 0.00,
  `quantity` int(11) NOT NULL,
  `img` text NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `products`
--

INSERT INTO `products` (`id`, `name`, `desc`, `price`, `rrp`, `quantity`, `img`, `date_added`) VALUES
(1, 'Manga', ' the story of a young boy named Tanjiro Kamado who becomes a demon slayer to avenge the deaths of his family and to find a cure for his sister', '29.99', '0.00', 10, 'manga.jpg', '2019-03-13 17:55:22'),
(2, 'Lettres persanes Montesqieu', 'Lettres persanes est un roman épistolaire de Montesquieu rassemblant la correspondance fictive échangée entre deux voyageurs persans, Usbek et Rica, et leurs amis respectifs restés en Perse. Leur séjour à l’étranger dure neuf ans.', '14.99', '19.99', 34, 'montesquieu.jpg', '2019-03-13 18:52:49'),
(3, 'Le rouge est le noir\r\nstandhal', 'Le Rouge et le Noir, sous-titré Chronique du XIX e siècle, puis Chronique de 1830, est un roman écrit par Stendhal, publié pour la première fois à Paris ...', '19.99', '0.00', 23, 'standhal.jpg', '2019-03-13 18:47:56'),
(4, 'ce que le jour doit à la nuit', 'Ce que le jour doit à la nuit est un roman de Yasmina Khadra écrit en 2008. L\'action se déroule principalement en Algérie de 1930 à 1962', '69.99', '0.00', 7, 'pelerin.jpg', '2019-03-13 17:42:04'),
(5, ' Le pelerin ', 'lorem epsum lorem epsum lorem epsum lorem epsum lorem epsum lorem epsum lorem epsumlorem epsum ', '29.99', '0.00', 10, 'pelerin.jpg', '2019-03-13 17:55:22'),
(6, 'Le Zahir', 'lorem epsum lorem epsum lorem epsum lorem epsum lorem epsum lorem epsum lorem epsumlorem epsum ', '14.99', '19.99', 34, 'zahir.jpg', '2019-03-13 18:52:49'),
(7, 'untitledd ', 'lorem epsum lorem epsum lorem epsum lorem epsum lorem epsum lorem epsum lorem epsumlorem epsum ', '19.99', '0.00', 23, 'standhal.jpg', '2019-03-13 18:47:56'),
(8, 'Monstesqieu', 'lorem epsum lorem epsum lorem epsum lorem epsum lorem epsum lorem epsum lorem epsumlorem epsum ', '69.99', '0.00', 7, 'montesquieu.jpg', '2019-03-13 17:42:04');

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE `produit` (
  `idProduit` int(10) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `quantite_total` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `prix` int(255) NOT NULL,
  `status` varchar(25) NOT NULL,
  `reference` varchar(255) NOT NULL,
  `chemin_img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`idProduit`, `nom`, `quantite_total`, `description`, `prix`, `status`, `reference`, `chemin_img`) VALUES
(1, 'Vélo', '2', 'tres bonne qualité', 290, 'en stock', '', '2564865F'),
(2, 'rubiks', '15', 'pratique et facile à utiliser', 15, 'en stock', '', '25879933DG');

-- --------------------------------------------------------

--
-- Structure de la table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL,
  `txn_id` varchar(255) NOT NULL,
  `payment_amount` decimal(7,2) NOT NULL,
  `payment_status` varchar(30) NOT NULL,
  `item_id` varchar(255) NOT NULL,
  `item_quantity` varchar(255) NOT NULL,
  `item_mc_gross` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `payer_email` varchar(255) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL DEFAULT '',
  `address_street` varchar(255) NOT NULL,
  `address_city` varchar(255) NOT NULL,
  `address_state` varchar(255) NOT NULL,
  `address_zip` varchar(255) NOT NULL,
  `address_country` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`idC`),
  ADD KEY `fk_prod_cmd` (`id_produit`) USING BTREE;

--
-- Index pour la table `paiement`
--
ALTER TABLE `paiement`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`idProduit`);

--
-- Index pour la table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `txn_id` (`txn_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `commande`
--
ALTER TABLE `commande`
  MODIFY `idC` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `paiement`
--
ALTER TABLE `paiement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `produit`
--
ALTER TABLE `produit`
  MODIFY `idProduit` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `fk_prod_cmd` FOREIGN KEY (`id_produit`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
