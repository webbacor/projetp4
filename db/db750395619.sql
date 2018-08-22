-- phpMyAdmin SQL Dump
-- version 4.1.14.8
-- http://www.phpmyadmin.net
--
-- Client :  db750395619.db.1and1.com
-- Généré le :  Mar 21 Août 2018 à 18:23
-- Version du serveur :  5.5.60-0+deb7u1-log
-- Version de PHP :  5.4.45-0+deb7u14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `db750395619`
--

-- --------------------------------------------------------

--
-- Structure de la table `t_billet`
--

CREATE TABLE IF NOT EXISTS `t_billet` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `content` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `chapter` int(11) NOT NULL,
  `status` varchar(10) COLLATE utf8_unicode_ci DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=26 ;

--
-- Contenu de la table `t_billet`
--

INSERT INTO `t_billet` (`id`, `title`, `content`, `chapter`, `status`) VALUES
(6, 'Chapitre 2 -  le troisième matin où il fait - 25 °C.', '<p><strong>C''est le troisi&egrave;me matin de notre exp&eacute;dition en tra&icirc;neau &agrave; chiens</strong>, outrepasse ses droits et &agrave; ces &eacute;cologistes bienpensants.Je pr&eacute;f&eacute;rais largement le parc quand il s''appelait McKinley et qu''il &eacute;tait fait pour les mouftons. Puis, Washington nous a fait avaler<br />cette chose qu''on appelle l''Anilca [Alaska National Interest Lands Conservation Act].&raquo;</p>\r\n<p>Cette loi, vot&eacute;e par le Congr&egrave;s en 1980, a transform&eacute; 420 000 km2 en for&ecirc;ts, r&eacute;serves et parcs nationaux, plus 200 000 km2 en espaces<br />sauvages prot&eacute;g&eacute;s. Le parc du mont McKinley a &eacute;t&eacute; rebaptis&eacute; Denali, sa superficie passant de 8100 &agrave; 24 300 km2. Les droits de propri&eacute;t&eacute;<br />priv&eacute;e ont toutefois &eacute;t&eacute; pr&eacute;serv&eacute;s dans l''ensemble de la r&eacute;serve, de m&ecirc;me que les droits de chasse et de pi&eacute;geage dans certains secteurs.<br />Pour beaucoup, l''Anilca est l''une des victoires les plus &eacute;clatantes des protecteurs de l''environnementdans l''histoire des &Eacute;tats-Unis.</p>\r\n<p>Mais nombre d''askiens y ont vu l''apog&eacute;e de longues ann&eacute;es d''interventionnisme f&eacute;d&eacute;ral. En 1978,<br />des manifestants avaient br&ucirc;l&eacute; une effigie de Jimmy Carter &agrave; Fairbanks (la deuxi&egrave;me plus grande ville de l''&Eacute;tat), car le pr&eacute;sident am&eacute;ricain<br />avait promu 227 000 km2 du territoire alaskien au rang de monument national. Et, en 1979, des habitants de localit&eacute;s proches du parc avaient<br /><br />Je suis bien loin de cette pol&eacute;mique - et de tout le reste - quand je passe la t&ecirc;te dans l''ouverture de ma tente, sur un site de campement<br />des environs de Cache Creek, &agrave; la mi-mars.</p>\r\n<p>C''est le troisi&egrave;me matin de notre exp&eacute;dition en tra&icirc;neau &agrave; chiens, et<strong> le troisi&egrave;me matin o&ugrave; il fait - 25 &deg;C.</strong> J''envisage de me retirer dans mon abri<br />douillet</p>\r\n<p style="text-align: center;">.<img src="img/repos.png" alt="repos" width="378" height="251" /></p>\r\n<p>mais le Denali, visible la plupart du temps en hiver, aimante mon regard. Des rayons de soleil &eacute;claboussent le sommet.<br />Quand je trouve enfin le courage de sortir de ma tente, la trentaine de chiens jappent et aboient. En hiver, les attelages de chiens font<br />encore partie int&eacute;grante de la vie dans ces r&eacute;gions recul&eacute;es. C''est avec eux que les limites du parc sont surveill&eacute;es, que les recherches sur<br />la faune sont men&eacute;es, et que le mat&eacute;riel n&eacute;cessaire au nettoyage et &agrave; l''entretien des cabanes est transport&eacute;. Et, parmi les d&eacute;monstrations<br />propos&eacute;es aux visiteurs par le personnel du parc, le spectacle organis&eacute; chaque &eacute;t&eacute; avec le chenil est le plus appr&eacute;ci&eacute;.<br />Les chiens rattachent les gens &agrave; l''histoire et &agrave; une exp&eacute;rience que la plupart d''entre eux ne vivront jamais, observe Jennifer Raffaeli, la<br />directrice du chenil.</p>', 2, 'Publié'),
(7, 'Chapitre 3 - Mes contraintes', '<p style="text-align: left;"><strong>Le but de ce voyage &eacute;tait de me fondre dans la nature, alors je me suis fix&eacute; quelques r&egrave;gles :</strong></p>\r\n<p><img style="float: right;" src="img/glace.jpg" alt="glace" width="226" height="149" /></p>\r\n<p>Premi&egrave;rement, je n&rsquo;avais pas le droit de suivre de route, de chemin, ni m&ecirc;me de sentier de randonn&eacute;e. Je devais cr&eacute;er mon propre passage et entrer le plus profond&eacute;ment possible dans le sauvage. J&rsquo;ai donc planifi&eacute; mon itin&eacute;raire l&agrave; o&ugrave; il n&rsquo;y avait aucune route, aucune habitation, aucune infrastructure humaine. En Alaska ce n&rsquo;est pas si dur &agrave; trouver.</p>\r\n<p>La deuxi&egrave;me r&egrave;gle &eacute;tait que mon sac devait comporter bien moins de choses que dans mes pr&eacute;c&eacute;dents voyages (fini les r&eacute;serves de nourriture, les trois pulls, le tapis de sol, le filtre &agrave; eau, le r&eacute;chaud). J&rsquo;ai &eacute;limin&eacute; l&rsquo;utile et n&rsquo;ai gard&eacute; que l&rsquo;indispensable.</p>\r\n<p>Dans mon sac, je portais : Une tente (que j&rsquo;ai du rafistoler avec du scotch apr&egrave;s l&rsquo;attaque d&rsquo;un ours), un duvet, un pull, un briquet, une boussole, des cartes, un GPS, un t&eacute;l&eacute;phone satellite, un couteau, un gourde, une gamelle, des livres, un appareil photo, une cam&eacute;ra, un cahier et un crayon. Avec cet &eacute;quipement, on peut partir quasiment partout pendant plusieurs mois.</p>\r\n<p>Mon objectif dans mes prochaines exp&eacute;ditions est d&rsquo;apprendre &agrave; me passer au fur et &agrave; mesure de ces objets en faisant par exemple du feu moi-m&ecirc;me, en me taillant une pierre qui fera office de couteau, en construisant des abris pour me passer de la tente...</p>', 3, 'Publié'),
(9, 'Chapitre 1 -  sur la piste des loups', '<p style="text-align: left;">&nbsp;<img src="img/loups.jpg" alt="Loup" width="140" height="140" /></p>\r\n<p style="text-align: left;">Notre avion sur skis décolle de la piste couverte de neige, située près des bâtiments de la direction du parc. Emmitouflé et coincé derrière Miller dans le minuscule habitacle, je le regarde secouer la tête.</p>\r\n<div class="layout-container">\r\n<div id="layout-content">\r\n<div id="block-nationalgeographic-content">\r\n<article class="node node--type-article node--promoted node--view-mode-full ng-article media-photo" role="article" data-history-node-id="20386">\r\n<div class="article-container">\r\n<div class="ng-article__content">\r\n<div class="grid-wrapper ng-article__group">\r\n<div class="ng-article__main-col">\r\n<div class="paragraph paragraph--type--content paragraph--view-mode--default">\r\n<p style="padding-left: 30px; text-align: left;"><strong><em>&laquo; Ça m&rsquo;étonnerait bien que ça reste aussi chaud toute la journée. &raquo;&nbsp;</em></strong></p>\r\n<p>Quelques minutes plus tard, nous entendons dans notre écouteur gauche le premier signal d&rsquo;un loup muni d&rsquo;un collier émetteur. Miller vire dans sa direction. Le grésillement se fait plus fort quand nous franchissons les limites du parc et survolons le Stampede corridor (&laquo; couloir de la cavalcade &raquo;), une bande de terres publiques et privées également appelée le Wolf Townships (&laquo; quartiers des loups &raquo;).&nbsp;</p>\r\n<p style="padding-left: 30px;"><em>&laquo; Ça doit être la femelle de la meute d&rsquo;East Fork, estime Miller. En novembre dernier, nous y avions comptabilisé au moins quinze loups, mais le mâle porteur d&rsquo;un collier a été retrouvé mort il y a deux semaines, le 6 mars. Depuis, je n&rsquo;ai vu qu&rsquo;une seule piste d&rsquo;empreintes. &raquo;</em>&nbsp;</p>\r\n<p>Dennis Miller suit le signal, descend et vole en zigzag dans une vallée où la trace d&rsquo;un loup solitaire se perd entre les arbres. Il vire sur l&rsquo;aile gauche, scrutant vers le bas.</p>\r\n<p style="padding-left: 30px;"><em>&laquo; Je vais faire juste un passage, dit-il en virant de plus en plus serré. Il y a des types dans ces maisons, là, s&rsquo;ils me voient tourner dans le ciel, ils vont sortir de chez eux pour essayer de trouver l&rsquo;animal que je cherche et lui tirer dessus. &raquo;</em>&nbsp;</p>\r\n<p>C&rsquo;est le cinquième jour que je passe à voler avec Miller et les biologistes du Denali. En mars, ceux-ci se concentrent sur les loups. Dès qu&rsquo;ils en repèrent un au sein du parc, ils demandent à une équipe héliportée de le neutraliser à l&rsquo;aide d&rsquo;une fléchette anesthésiante, puis le munissent d&rsquo;un collier. Ils prélèvent aussi du sang et des poils, dans l&rsquo;espoir d&rsquo;en apprendre plus sur la santé, le comportement et la génétique d&rsquo;un des animaux les plus incompris du monde.&nbsp;</p>\r\n<p>Ces recherches poursuivent les travaux pionniers de l&rsquo;écologue Adolph Murie, l&rsquo;un des premiers scientifiques à avoir étudié les loups du Denali à l&rsquo;état sauvage. En 1939, à l&rsquo;époque de sa&nbsp;première expédition dans ce qui s&rsquo;appelait alors le parc national du mont McKinley, les loups étaient considérés comme de la vermine, et les gardes avaient l&rsquo;habitude de les tirer à vue. Ses études montrèrent que les loups et d&rsquo;autres superprédateurs jouent un rôle essentiel dans les milieux naturels sains. Murie prônait de gérer les parcs en protégeant des écosystèmes entiers plutôt que des espèces en particulier.&nbsp;D&rsquo;autres scientifiques et théoriciens influents devaient le suivre au Denali.</p>\r\n<p>Les paysages de montagne en grande partie dénudés y offrent un cadre idéal pour observer la faune sauvage. Ici ont éclos nombre de principes fondamentaux de la défense de l&rsquo;environnement, ainsi que des méthodes décisionnelles fondées sur les données scientifiques.&nbsp;Le Denali a aussi un immense impact sur les centaines de milliers de profanes qui y affluent avec des rêves de découverte de la nature, et en repartent forts d&rsquo;une connaissance plus intime du monde sauvage.</p>\r\n<p style="padding-left: 30px;"><em>&laquo; Nous le constatons sans cesse, assure Don Striker, le directeur du parc. Ils viennent ici pour prendre quelques photos. Mais, au cours de cette première expérience en pleine nature, il se produit un déclic. Ils s&rsquo;en retournent en voulant protéger de tels lieux. &raquo;</em></p>\r\n</div>\r\n<div data-pestle-module="ArticleImageModule" data-pestle-options="{\r\n      ">\r\n<div class="ng-article-image ng-article-image--medium " data-reactroot="">\r\n<div class="ng-article-image__content">\r\n<div class="ng-article-image__content__copy">Une mère grizzli et ses petits provoquent un embouteillage sur la grand-route du parc du Denali. Longue de 148 km, elle n&rsquo;est ouverte aux véhicules particuliers que pendant cinq jours en été.</div>\r\n</div>\r\n</div>\r\n</div>\r\n<div class="paragraph paragraph--type--content paragraph--view-mode--default">\r\n<div>\r\n<p>Pourtant, rien n&rsquo;a jamais été tout rose au paradis du Denali. Le parc fut créé en 1917 comme refuge pour les mouflons de Dall, les orignaux et les caribous. Ses premiers gardes pourchassaient les braconniers qui ravitaillaient en viande les mineurs et les constructeurs de voies ferrées. Ce bras de fer entre la préservation et l&rsquo;exploitation des ressources allait devenir le différend central dans la gestion des parcs. Encore aujourd&rsquo;hui, il existe peu d&rsquo;endroits où ce conflit se ressent aussi intensément qu&rsquo;au Denali, et où il est géré de façon aussi créative.&nbsp;</p>\r\n<p style="padding-left: 30px;"><em>&laquo; Ce parc peut prêter à confusion sous bien des aspects, explique le garde John Leonard. C&rsquo;est la pleine nature, mais on peut atterrir en avion dans certains endroits, et chasser et poser des pièges dans d&rsquo;autres. C&rsquo;est la particularité du Denali : il n&rsquo;est pas verrouillé. Et c&rsquo;est ce qui le rend si difficile à gérer. &raquo;</em>&nbsp;</p>\r\n<p>Un de ses pièges, posé juste à l&rsquo;extérieur du parc, prend la femelle alpha de la meute d&rsquo;East Fork. En 2012, il traîne un cadavre de cheval jusqu&rsquo;à un site fréquenté par les loups et qu&rsquo;il cerne de pièges et de collets. Quand il revient, quelques jours plus tard, une femelle gravide de la même meute a été capturée. La prise, photographiée par un voisin et confirmée plus tard par Wallace, lui vaut un article dans le Los Angeles Times, des menaces de mort, et un bon coup de pub pour son autoentreprise de guide. La même année, il attrape la dernière femelle reproductrice de la meute de Grant Creek, qui parfois s&rsquo;aventure juste en dehors du parc. Du coup, la meute ne donnera plus de petits et tombera de quinze individus à trois.&nbsp;Il y a quelques années encore, un loup rôdant près de chez Wallace aurait été protégé par la loi. Mais les meutes les plus vulnérables du&nbsp;Denali sont au c&oelig;ur de luttes politiques peu reluisantes.</p>\r\n</div>\r\n</div>\r\n<div data-pestle-module="ArticleImageModule" data-pestle-options="{\r\n      ">&nbsp;</div>\r\n<div data-pestle-module="ArticleImageModule" data-pestle-options="{\r\n      ">&nbsp;</div>\r\n<div class="paragraph paragraph--type--content paragraph--view-mode--default">&nbsp;</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</article>\r\n</div>\r\n</div>\r\n</div>\r\n<div data-pestle-module="CookieFooterModule" data-pestle-options="{\r\n      ">&nbsp;</div>', 1, 'Publié'),
(25, 'Chapitre 4 - ', '', 4, 'Brouillon');

-- --------------------------------------------------------

--
-- Structure de la table `t_comment`
--

CREATE TABLE IF NOT EXISTS `t_comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `bil_id` int(11) NOT NULL,
  `usr_id` int(11) NOT NULL,
  `commentDate` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_bil_id` (`bil_id`),
  KEY `fk_com_usr` (`usr_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=91 ;

--
-- Contenu de la table `t_comment`
--

INSERT INTO `t_comment` (`id`, `content`, `bil_id`, `usr_id`, `commentDate`) VALUES
(82, '<p>Je suis impatient pour la suite..</p>', 7, 5, '2018-08-08'),
(83, '<p>Quand pensez-vous finir le livre, je souhaite l''acheter au plus vite</p>', 7, 5, '2018-08-09'),
(90, 'Le sujet est brulant ......', 6, 5, '2018-08-21');

-- --------------------------------------------------------

--
-- Structure de la table `t_report`
--

CREATE TABLE IF NOT EXISTS `t_report` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `com_id` int(11) NOT NULL,
  `usr_id` int(11) NOT NULL,
  `report_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `t_user`
--

CREATE TABLE IF NOT EXISTS `t_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(88) COLLATE utf8_unicode_ci NOT NULL,
  `salt` varchar(23) COLLATE utf8_unicode_ci DEFAULT NULL,
  `role` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `isLocked` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=15 ;

--
-- Contenu de la table `t_user`
--

INSERT INTO `t_user` (`id`, `name`, `password`, `salt`, `role`, `isLocked`) VALUES
(1, 'corinne', 'rodrigue', '', '', 0),
(3, 'alain', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', '', 'user', 0),
(5, 'vincent', '87e1f221a672a14a323e57bb65eaea19d3ed3804', '', 'user', 0),
(6, 'JeanF', 'd6f8cdd522e4013ea482c6dfb3154c086b627eec', '', 'admin', 0),
(7, 'antoine', '9359a4d812173b65a3a0094cd86363e79731a3c2', '', 'admin', 0),
(8, 'dominique', 'f313791ae069ed592c35c483b3d4f8d2a74a74b2', '', 'user', 0),
(9, 'patricia', '04e6f3bca0d940b47b477d89cc9d3e92d03f22dd', '', 'user', 0),
(10, 'bernard', '0b8e0b1f37895567811a9d382317c26804f86e3a', '', 'user', 0),
(12, 'ff', 'ed70c57d7564e994e7d5f6fd6967cea8b347efbc', '', 'user', 0),
(14, 'rr', '843cbacc61c8fe45886819ff1516e2e179374496', '', 'user', 0);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `t_comment`
--
ALTER TABLE `t_comment`
  ADD CONSTRAINT `fk_bil_id` FOREIGN KEY (`bil_id`) REFERENCES `t_billet` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_com_usr` FOREIGN KEY (`usr_id`) REFERENCES `t_user` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
