CREATE TABLE `cms_articles` (
  `id` int(11) NOT NULL,
  `titre` varchar(50) NOT NULL,
  `description` varchar(255) NOT NULL,
  `url_image` text NOT NULL,
  `contenu` text NOT NULL,
  `auteur` varchar(30) NOT NULL,
  `date` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `cms_articles`
--

INSERT INTO `cms_articles` (`id`, `titre`, `description`, `url_image`, `contenu`, `auteur`, `date`) VALUES
(1, 'Article de Test #1', 'Article de Test #1', 'https://images.habbo.com/web_images/habbo-web-articles/lpromo_seaside_gen1.png', '&lt;p&gt;Ceci est un article de test.&lt;/p&gt;\n', 'TheoDEV', 1500040600),
(2, 'Article de Test #2', 'Article de Test #2', 'https://images.habbo.com/web_images/habbo-web-articles/lpromo_seaside_gen1.png', '&lt;p&gt;Ceci est un article de test.&lt;/p&gt;\n', 'TheoDEV', 1500040619);

-- --------------------------------------------------------

--
-- Structure de la table `cms_configs`
--

CREATE TABLE `cms_configs` (
  `nom_site` varchar(255) NOT NULL DEFAULT 'Habbo',
  `lien_site` varchar(255) NOT NULL DEFAULT '//localhost'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `cms_configs`
--

INSERT INTO `cms_configs` (`nom_site`, `lien_site`) VALUES
('LiteCMS', '//localhost');

-- --------------------------------------------------------

--
-- Structure de la table `cms_configs_logs`
--

CREATE TABLE `cms_configs_logs` (
  `id` int(11) NOT NULL,
  `pseudo` varchar(30) NOT NULL,
  `action` text NOT NULL,
  `date` int(11) NOT NULL,
  `ip` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `cms_configs_swfs`
--

CREATE TABLE `cms_configs_swfs` (
  `ip_vps` varchar(255) NOT NULL,
  `port_emu` varchar(255) NOT NULL,
  `external_variables` text NOT NULL,
  `external_flash_texts` text NOT NULL,
  `productdata` text NOT NULL,
  `furnidata` text NOT NULL,
  `base_habbo_swf` text NOT NULL,
  `habbo_swf` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `cms_configs_swfs`
--

INSERT INTO `cms_configs_swfs` (`ip_vps`, `port_emu`, `external_variables`, `external_flash_texts`, `productdata`, `furnidata`, `base_habbo_swf`, `habbo_swf`) VALUES
('127.0.0.0', '0', 'http://localhost/swf/external_variables.txt', 'http://localhost/swf/external_flash_texts.txt', 'http://localhost/swf/productdata.txt', 'http://localhost/swf/furnidata.txt', 'http://localhost/swf/PRODUCTION00000000/', 'http://localhost/swf/PRODUCTION00000000/Habbo.swf');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `cms_articles`
--
ALTER TABLE `cms_articles`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `cms_configs`
--
ALTER TABLE `cms_configs`
  ADD PRIMARY KEY (`nom_site`);

--
-- Index pour la table `cms_configs_logs`
--
ALTER TABLE `cms_configs_logs`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `cms_configs_swfs`
--
ALTER TABLE `cms_configs_swfs`
  ADD PRIMARY KEY (`ip_vps`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `cms_articles`
--
ALTER TABLE `cms_articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `cms_configs_logs`
--
ALTER TABLE `cms_configs_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;COMMIT;
