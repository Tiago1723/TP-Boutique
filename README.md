# Structure
> La structure utilise le modèle MVC
![illustration du modèle MVC](./.document/modelMVC.png)

# Connection avec la base de donnée
> Utilisation du fichier core/Secure.php pour recuperer les information de connection

# Contenue de la base de donnée

```sql
--
-- Base de données : `boutique_en_ligne`
--

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `nom`) VALUES
(1, 'Shonen'),
(2, 'Seinen'),
(3, 'Shojo'),
(4, 'Isekai'),
(5, 'Fantasy'),
(6, 'Horreur');

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

CREATE TABLE `produits` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `numéro_tome` int(11) NOT NULL,
  `image` text NOT NULL,
  `description` text DEFAULT NULL,
  `prix` decimal(10,2) NOT NULL,
  `quantite` int(11) NOT NULL,
  `id_categorie` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;

--
-- Déchargement des données de la table `produits`
--

INSERT INTO `produits` (`id`, `nom`, `numéro_tome`, `image`, `description`, `prix`, `quantite`, `id_categorie`) VALUES
(13, 'One Piece', 1, 'https://s4.anilist.co/file/anilistcdn/media/manga/cover/large/bx30013-BeslEMqiPhlk.jpg', 'Les aventures de Luffy à la recherche du One Piece.', 7.20, 50, 1),
(14, 'Naruto', 1, 'https://s4.anilist.co/file/anilistcdn/media/manga/cover/large/nx30011-9yUF1dXWgDOx.jpg', 'Un ninja rêve de devenir Hokage.', 6.90, 40, 1),
(15, 'Attack on Titan', 1, 'https://s4.anilist.co/file/anilistcdn/media/manga/cover/large/bx53390-1RsuABC34P9D.jpg', 'L’humanité lutte contre des géants.', 7.50, 35, 1),
(16, 'Berserk', 1, 'https://s4.anilist.co/file/anilistcdn/media/manga/cover/large/bx30002-Cul4OeN7bYtn.jpg', 'Un guerrier solitaire dans un monde sombre.', 8.50, 20, 2),
(17, 'Tokyo Ghoul', 1, 'https://s4.anilist.co/file/anilistcdn/media/manga/cover/large/bx63327-glC9cDxYBja9.png', 'Un étudiant devient un demi-ghoul.', 7.90, 25, 2),
(18, 'Fruits Basket', 1, 'https://s4.anilist.co/file/anilistcdn/media/manga/cover/large/bx30102-MJuQ0e0k2CgU.png', 'Une lycéenne découvre une étrange famille.', 6.80, 30, 3),
(19, 'Re:Zero', 1, 'https://s4.anilist.co/file/anilistcdn/media/manga/cover/large/nx85736-ujogxQ4eWUQ4.jpg', 'Un jeune homme transporté dans un autre monde.', 7.95, 20, 4),
(20, 'Sword Art Online', 1, 'https://s4.anilist.co/file/anilistcdn/media/manga/cover/large/nx53718-vP0MCWbNEfwW.jpg', 'Des joueurs piégés dans un jeu vidéo.', 7.50, 22, 4),
(21, 'Fairy Tail', 1, 'https://s4.anilist.co/file/anilistcdn/media/manga/cover/medium/92603-kNSnvE6m9A7X.jpg', 'Une guilde de mages en quête d’aventure.', 7.20, 28, 5),
(22, 'Junji Ito Collection', 1, 'https://s4.anilist.co/file/anilistcdn/media/manga/cover/large/bx145268-AMaV3LpD2o9S.jpg', 'Histoires horrifiques dérangeantes.', 9.00, 15, 6);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `produits`
--
ALTER TABLE `produits`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_1` (`id_categorie`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `produits`
--
ALTER TABLE `produits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `produits`
--
ALTER TABLE `produits`
  ADD CONSTRAINT `produits_ibfk_1` FOREIGN KEY (`id_categorie`) REFERENCES `categories` (`id`);
COMMIT;

```