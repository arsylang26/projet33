-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Mer 31 Mai 2017 à 16:30
-- Version du serveur :  5.7.14
-- Version de PHP :  5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `projet3`
--

-- --------------------------------------------------------

--
-- Structure de la table `administration`
--

CREATE TABLE `administration` (
  `id` int(11) NOT NULL,
  `identifiant` varchar(30) NOT NULL,
  `pwd` varchar(150) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `administration`
--

INSERT INTO `administration` (`id`, `identifiant`, `pwd`) VALUES
(1, 'jforteroche', 'adb8aa2a6004d501aa1f5c42b2d0fbd79a7d1065');

-- --------------------------------------------------------

--
-- Structure de la table `commentaires`
--

CREATE TABLE `commentaires` (
  `id` int(11) NOT NULL,
  `date_commentaire` datetime NOT NULL,
  `auteur` varchar(100) CHARACTER SET latin1 NOT NULL,
  `contenu` text CHARACTER SET latin1 NOT NULL,
  `id_episode` int(11) NOT NULL,
  `rang_commentaire` int(11) NOT NULL,
  `parent_commentaire` int(11) DEFAULT NULL,
  `abusif` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `commentaires`
--

INSERT INTO `commentaires` (`id`, `date_commentaire`, `auteur`, `contenu`, `id_episode`, `rang_commentaire`, `parent_commentaire`, `abusif`) VALUES
(6, '2017-03-09 20:15:46', 'jaja', 'pfff !!!', 1, 0, NULL, 1),
(7, '2017-03-09 20:16:31', 'jaja', 'Grrrrrr !', 1, 0, NULL, 0),
(8, '2017-03-09 20:16:47', 'fifo', 'au secours !', 1, 1, 7, 0),
(9, '2017-03-23 07:00:00', 'sébastien', 'on peut le dire...', 1, 2, 8, 0),
(10, '2017-03-28 22:00:00', 'inconnu', 'troisième commentaire', 1, 3, 9, 0),
(17, '2017-04-04 20:13:40', 'gt', 'help', 1, 0, NULL, 0),
(21, '2017-04-05 21:40:54', 'fabien', 'sddff', 1, 1, 17, 0),
(25, '2017-05-08 19:51:46', 'lm', 'hj', 5, 0, NULL, 0),
(28, '2017-05-18 19:21:56', 'essai', 'bof bof', 8, 0, NULL, 0),
(29, '2017-05-18 19:23:19', 'essai', 'bof ghj', 5, 0, NULL, 0),
(30, '2017-05-19 21:08:15', 'hhh', 'dfgfdggdfdgdgdgdgdg', 13, 0, NULL, 0),
(31, '2017-05-19 21:10:18', 'jkl', 'hgjgkk titrtjejrtk', 13, 0, NULL, 0),
(32, '2017-05-19 21:10:56', 'frt', 'ddfgh hhh u', 13, 0, NULL, 0),
(33, '2017-05-19 21:23:05', 'dfsd', 'efrffdf', 13, 0, NULL, 0),
(34, '2017-05-19 21:23:21', 'dzee', 'sdssqs', 13, 0, NULL, 0),
(35, '2017-05-21 21:47:52', 'jh', 'ghhh', 13, 0, NULL, 0),
(36, '2017-05-21 21:56:59', 'gj', 'kkk', 13, 0, NULL, 0),
(37, '2017-05-21 22:05:31', 'hg', 'fgfg', 13, 0, NULL, 0),
(38, '2017-05-22 20:17:51', 'hhjk', 'hhhjjhjkjkliu', 13, 0, NULL, 0),
(46, '2017-05-29 20:53:03', 'fabien', 'Vestibulum tempor mattis ipsum, fringilla volutpat dolor laoreet et. Sed condimentum, nisi quis iaculis gravida, velit lectus tempor massa, sed ultricies lectus ante vel justo. Aliquam varius commodo scelerisque. Nam rutrum, eros at ornare iaculis, felis tortor feugiat est, sed efficitur purus leo vel magna. Nullam iaculis massa eu posuere malesuada. Aliquam eu varius eros. Suspendisse rutrum tortor sapien, nec bibendum est sollicitudin a. Nam tellus mauris, scelerisque nec velit eget, malesuada', 13, 1, 30, 0),
(47, '2017-05-29 20:53:24', 'zorro', 'Vestibulum tempor mattis ipsum, fringilla volutpat dolor laoreet et. Sed condimentum, nisi quis iaculis gravida, velit lectus tempor massa, sed ultricies lectus ante vel justo. Aliquam varius commodo scelerisque. Nam rutrum, eros at ornare iaculis, felis tortor feugiat est, sed efficitur purus leo vel magna. Nullam iaculis massa eu posuere malesuada. Aliquam eu varius eros. Suspendisse rutrum tortor sapien, nec bibendum est sollicitudin a. Nam tellus mauris, scelerisque nec velit eget, malesuada', 13, 2, 46, 0),
(48, '2017-05-29 20:53:54', 'titi', 'Vestibulum tempor mattis ipsum, fringilla volutpat dolor laoreet et. Sed condimentum, nisi quis iaculis gravida, velit lectus tempor massa, sed ultricies lectus ante vel justo. Aliquam varius commodo scelerisque. Nam rutrum, eros at ornare iaculis, felis tortor feugiat est, sed efficitur purus leo vel magna. Nullam iaculis massa eu posuere malesuada. Aliquam eu varius eros. Suspendisse rutrum tortor sapien, nec bibendum est sollicitudin a. Nam tellus mauris, scelerisque nec velit eget, malesuada', 13, 3, 47, 0),
(51, '2017-05-30 19:56:19', 'esdffgghhhhhhhh', 'fshhhhhhddsjjkklslll   kkk', 14, 0, NULL, 0),
(52, '2017-05-31 16:28:37', 'fabien', 'sublime !!!', 19, 0, NULL, 0);

-- --------------------------------------------------------

--
-- Structure de la table `episodes`
--

CREATE TABLE `episodes` (
  `id` int(11) NOT NULL,
  `date_episode` datetime NOT NULL,
  `titre` varchar(255) CHARACTER SET latin1 NOT NULL,
  `contenu` text CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `episodes`
--

INSERT INTO `episodes` (`id`, `date_episode`, `titre`, `contenu`) VALUES
(1, '2017-03-01 13:42:00', 'premier épisode', ' Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l\'imprimerie depuis les années 1500, quand un peintre anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte. Il n\'a pas fait que survivre cinq siècles, mais s\'est aussi adapté à la bureautique informatique, sans que son contenu n\'en soit modifié. Il a été popularisé dans les années 1960 grâce à la vente de feuilles Letraset contenant des passages du Lorem Ipsum, et, plus récemment, par son inclusion dans des applications de mise en page de texte, comme Aldus PageMaker.'),
(5, '2017-04-12 19:16:45', 'deuxième épisode', '<div id="TheTexte" class="Texte" lang="zxx">\r\n<p>Batnae municipium in Anthemusia conditum Macedonum manu priscorum ab Euphrate flumine brevi spatio disparatur, refertum mercatoribus opulentis, ubi annua sollemnitate prope Septembris initium mensis ad nundinas magna promiscuae fortunae convenit multitudo ad commercanda quae Indi mittunt et Seres aliaque plurima vehi terra marique consueta.</p>\r\n<p>Inter has ruinarum varietates a Nisibi quam tuebatur accitus Vrsicinus, cui nos obsecuturos iunxerat imperiale praeceptum, dispicere litis exitialis certamina cogebatur abnuens et reclamans, adulatorum oblatrantibus turmis, bellicosus sane milesque semper et militum ductor sed forensibus iurgiis longe discretus, qui metu sui discriminis anxius cum accusatores quaesitoresque subditivos sibi consociatos ex isdem foveis cerneret emergentes, quae clam palamve agitabantur, occultis Constantium litteris edocebat inplorans subsidia, quorum metu tumor notissimus Caesaris exhalaret.</p>\r\n<p>Illud autem non dubitatur quod cum esset aliquando virtutum omnium domicilium Roma, ingenuos advenas plerique nobilium, ut Homerici bacarum suavitate Lotophagi, humanitatis multiformibus officiis retentabant.</p>\r\n</div>'),
(8, '2017-05-13 20:18:51', 'troisième', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In ut molestie sapien, at porta augue. Etiam quis commodo massa, eget egestas neque. Integer fermentum erat at justo tincidunt, a gravida lectus scelerisque. Phasellus finibus pulvinar odio sit amet placerat. Aliquam ornare libero sit amet sem vehicula finibus. Integer lacinia, augue ac condimentum volutpat, metus libero ultricies tortor, in egestas massa nunc eu ante. Quisque felis diam, ultrices sed erat nec, lobortis pulvinar velit. Curabitur condimentum justo maximus sodales ullamcorper. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Sed ut faucibus nunc, nec blandit risus. Vestibulum ornare elementum metus, eu ornare magna varius sit amet. Pellentesque feugiat sem in neque fringilla lacinia. Donec scelerisque tincidunt elit, nec convallis metus euismod non.<span style="text-decoration: line-through;"><strong> Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</strong></span>&nbsp;</p>'),
(12, '2017-05-18 20:14:15', 'quatrième', '<p><span style="font-family: Arial; font-size: 12px; background-color: #a0a0a0;">La nuit &eacute;tait fort noire et la for&ecirc;t tr&egrave;s-sombre.&nbsp;</span><br style="margin: 0px; padding: 0px; font-family: Arial; font-size: 12px; background-color: #a0a0a0;" /><span style="font-family: Arial; font-size: 12px; background-color: #a0a0a0;">Hermann &agrave; mes c&ocirc;t&eacute;s me paraissait une ombre.&nbsp;</span><br style="margin: 0px; padding: 0px; font-family: Arial; font-size: 12px; background-color: #a0a0a0;" /><span style="font-family: Arial; font-size: 12px; background-color: #a0a0a0;">Nos chevaux galopaient. A la garde de Dieu !&nbsp;</span><br style="margin: 0px; padding: 0px; font-family: Arial; font-size: 12px; background-color: #a0a0a0;" /><span style="font-family: Arial; font-size: 12px; background-color: #a0a0a0;">Les nuages du ciel ressemblaient &agrave; des marbres.&nbsp;</span><br style="margin: 0px; padding: 0px; font-family: Arial; font-size: 12px; background-color: #a0a0a0;" /><span style="font-family: Arial; font-size: 12px; background-color: #a0a0a0;">Les &eacute;toiles volaient dans les branches des arbres&nbsp;</span><br style="margin: 0px; padding: 0px; font-family: Arial; font-size: 12px; background-color: #a0a0a0;" /><span style="font-family: Arial; font-size: 12px; background-color: #a0a0a0;">Comme un essaim d\'oiseaux de feu.&nbsp;</span><br style="margin: 0px; padding: 0px; font-family: Arial; font-size: 12px; background-color: #a0a0a0;" /><br style="margin: 0px; padding: 0px; font-family: Arial; font-size: 12px; background-color: #a0a0a0;" /><span style="font-family: Arial; font-size: 12px; background-color: #a0a0a0;">Je suis plein de regrets. Bris&eacute; par la souffrance,&nbsp;</span><br style="margin: 0px; padding: 0px; font-family: Arial; font-size: 12px; background-color: #a0a0a0;" /><span style="font-family: Arial; font-size: 12px; background-color: #a0a0a0;">L\'esprit profond d\'Hermann est vide d\'esp&eacute;rance.&nbsp;</span><br style="margin: 0px; padding: 0px; font-family: Arial; font-size: 12px; background-color: #a0a0a0;" /><span style="font-family: Arial; font-size: 12px; background-color: #a0a0a0;">Je suis plein de regrets. O mes amours, dormez !&nbsp;</span><br style="margin: 0px; padding: 0px; font-family: Arial; font-size: 12px; background-color: #a0a0a0;" /><span style="font-family: Arial; font-size: 12px; background-color: #a0a0a0;">Or, tout en traversant ces solitudes vertes,&nbsp;</span><br style="margin: 0px; padding: 0px; font-family: Arial; font-size: 12px; background-color: #a0a0a0;" /><span style="font-family: Arial; font-size: 12px; background-color: #a0a0a0;">Hermann me dit : &laquo;Je songe aux tombes entr\'ouvertes ;&raquo;&nbsp;</span><br style="margin: 0px; padding: 0px; font-family: Arial; font-size: 12px; background-color: #a0a0a0;" /><span style="font-family: Arial; font-size: 12px; background-color: #a0a0a0;">Et je lui dis : &laquo;Je pense aux tombeaux referm&eacute;s.&raquo;&nbsp;</span><br style="margin: 0px; padding: 0px; font-family: Arial; font-size: 12px; background-color: #a0a0a0;" /><br style="margin: 0px; padding: 0px; font-family: Arial; font-size: 12px; background-color: #a0a0a0;" /><span style="font-family: Arial; font-size: 12px; background-color: #a0a0a0;">Lui regarde en avant : je regarde en arri&egrave;re,&nbsp;</span><br style="margin: 0px; padding: 0px; font-family: Arial; font-size: 12px; background-color: #a0a0a0;" /><span style="font-family: Arial; font-size: 12px; background-color: #a0a0a0;">Nos chevaux galopaient &agrave; travers la clairi&egrave;re ;&nbsp;</span><br style="margin: 0px; padding: 0px; font-family: Arial; font-size: 12px; background-color: #a0a0a0;" /><span style="font-family: Arial; font-size: 12px; background-color: #a0a0a0;">Le vent nous apportait de lointains angelus; dit :&nbsp;</span><br style="margin: 0px; padding: 0px; font-family: Arial; font-size: 12px; background-color: #a0a0a0;" /><span style="font-family: Arial; font-size: 12px; background-color: #a0a0a0;">&laquo;Je songe &agrave; ceux que l\'existence afflige,&nbsp;</span><br style="margin: 0px; padding: 0px; font-family: Arial; font-size: 12px; background-color: #a0a0a0;" /><span style="font-family: Arial; font-size: 12px; background-color: #a0a0a0;">A ceux qui sont, &agrave; ceux qui vivent. -- Moi, lui dis-je,&nbsp;</span><br style="margin: 0px; padding: 0px; font-family: Arial; font-size: 12px; background-color: #a0a0a0;" /><span style="font-family: Arial; font-size: 12px; background-color: #a0a0a0;">Je pense &agrave; ceux qui ne sont plus !&raquo;&nbsp;</span><br style="margin: 0px; padding: 0px; font-family: Arial; font-size: 12px; background-color: #a0a0a0;" /><br style="margin: 0px; padding: 0px; font-family: Arial; font-size: 12px; background-color: #a0a0a0;" /><span style="font-family: Arial; font-size: 12px; background-color: #a0a0a0;">Les fontaines chantaient. Que disaient les fontaines ?&nbsp;</span><br style="margin: 0px; padding: 0px; font-family: Arial; font-size: 12px; background-color: #a0a0a0;" /><span style="font-family: Arial; font-size: 12px; background-color: #a0a0a0;">Les ch&ecirc;nes murmuraient. Que murmuraient les ch&ecirc;nes ?&nbsp;</span><br style="margin: 0px; padding: 0px; font-family: Arial; font-size: 12px; background-color: #a0a0a0;" /><span style="font-family: Arial; font-size: 12px; background-color: #a0a0a0;">Les buissons chuchotaient comme d\'anciens amis.&nbsp;</span><br style="margin: 0px; padding: 0px; font-family: Arial; font-size: 12px; background-color: #a0a0a0;" /><span style="font-family: Arial; font-size: 12px; background-color: #a0a0a0;">Hermann me dit : &laquo;Jamais les vivants ne sommeillent.&nbsp;</span><br style="margin: 0px; padding: 0px; font-family: Arial; font-size: 12px; background-color: #a0a0a0;" /><span style="font-family: Arial; font-size: 12px; background-color: #a0a0a0;">En ce moment, des yeux pleurent, d\'autres yeux veillent.&raquo;&nbsp;</span><br style="margin: 0px; padding: 0px; font-family: Arial; font-size: 12px; background-color: #a0a0a0;" /><span style="font-family: Arial; font-size: 12px; background-color: #a0a0a0;">Et je lui dis : &laquo;H&eacute;las! d\'autres sont endormis !&raquo;&nbsp;</span><br style="margin: 0px; padding: 0px; font-family: Arial; font-size: 12px; background-color: #a0a0a0;" /><br style="margin: 0px; padding: 0px; font-family: Arial; font-size: 12px; background-color: #a0a0a0;" /><span style="font-family: Arial; font-size: 12px; background-color: #a0a0a0;">Hermann reprit alors : &laquo;Le malheur, c\'est la vie.&nbsp;</span><br style="margin: 0px; padding: 0px; font-family: Arial; font-size: 12px; background-color: #a0a0a0;" /><span style="font-family: Arial; font-size: 12px; background-color: #a0a0a0;">Les morts ne souffrent plus. Ils sont heureux ! j\'envie&nbsp;</span><br style="margin: 0px; padding: 0px; font-family: Arial; font-size: 12px; background-color: #a0a0a0;" /><span style="font-family: Arial; font-size: 12px; background-color: #a0a0a0;">Leur fosse o&ugrave; l\'herbe pousse, o&ugrave; s\'effeuillent les bois.&nbsp;</span><br style="margin: 0px; padding: 0px; font-family: Arial; font-size: 12px; background-color: #a0a0a0;" /><span style="font-family: Arial; font-size: 12px; background-color: #a0a0a0;">Car la nuit les caresse avec ses douces flammes ;&nbsp;</span><br style="margin: 0px; padding: 0px; font-family: Arial; font-size: 12px; background-color: #a0a0a0;" /><span style="font-family: Arial; font-size: 12px; background-color: #a0a0a0;">Car le ciel rayonnant calme toutes les &acirc;mes&nbsp;</span><br style="margin: 0px; padding: 0px; font-family: Arial; font-size: 12px; background-color: #a0a0a0;" /><span style="font-family: Arial; font-size: 12px; background-color: #a0a0a0;">Dans tous les tombeaux &agrave; la fois !&raquo;&nbsp;</span><br style="margin: 0px; padding: 0px; font-family: Arial; font-size: 12px; background-color: #a0a0a0;" /><br style="margin: 0px; padding: 0px; font-family: Arial; font-size: 12px; background-color: #a0a0a0;" /><span style="font-family: Arial; font-size: 12px; background-color: #a0a0a0;">Et je lui dis : &laquo;Tais-toi ! respect au noir myst&egrave;re !&nbsp;</span><br style="margin: 0px; padding: 0px; font-family: Arial; font-size: 12px; background-color: #a0a0a0;" /><span style="font-family: Arial; font-size: 12px; background-color: #a0a0a0;">Les morts gisent couch&eacute;s sous nos pieds dans la terre.&nbsp;</span><br style="margin: 0px; padding: 0px; font-family: Arial; font-size: 12px; background-color: #a0a0a0;" /><span style="font-family: Arial; font-size: 12px; background-color: #a0a0a0;">Les morts, ce sont les coeurs qui t\'aimaient autrefois&nbsp;</span><br style="margin: 0px; padding: 0px; font-family: Arial; font-size: 12px; background-color: #a0a0a0;" /><span style="font-family: Arial; font-size: 12px; background-color: #a0a0a0;">C\'est ton ange expir&eacute; ! c\'est ton p&egrave;re et ta m&egrave;re !&nbsp;</span><br style="margin: 0px; padding: 0px; font-family: Arial; font-size: 12px; background-color: #a0a0a0;" /><span style="font-family: Arial; font-size: 12px; background-color: #a0a0a0;">Ne les attristons point par l\'ironie am&egrave;re.&nbsp;</span><br style="margin: 0px; padding: 0px; font-family: Arial; font-size: 12px; background-color: #a0a0a0;" /><span style="font-family: Arial; font-size: 12px; background-color: #a0a0a0;">Comme &agrave; travers un r&ecirc;ve ils entendent nos voix.&raquo;</span></p>'),
(13, '2017-05-18 20:17:46', 'cinquième', '<div>\r\n<h2>Qu\'est-ce que le Lorem Ipsum?</h2>\r\n<p>Le <strong>Lorem Ipsum</strong> est simplement du faux texte employ&eacute; dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l\'imprimerie depuis les ann&eacute;es 1500, quand un peintre anonyme assembla ensemble des morceaux de texte pour r&eacute;aliser un livre sp&eacute;cimen de polices de texte. Il n\'a pas fait que survivre cinq si&egrave;cles, mais s\'est aussi adapt&eacute; &agrave; la bureautique informatique, sans que son contenu n\'en soit modifi&eacute;. Il a &eacute;t&eacute; popularis&eacute; dans les ann&eacute;es 1960 gr&acirc;ce &agrave; la vente de feuilles Letraset contenant des passages du Lorem Ipsum, et, plus r&eacute;cemment, par son inclusion dans des applications de mise en page de texte, comme Aldus PageMaker.</p>\r\n</div>'),
(14, '2017-05-23 19:32:36', 'Sixième', '<p>Mon jardin fut doux et l&eacute;ger,<br />Tant qu\'il fut mon humble richesse :<br />Mi-potager et mi-verger,&nbsp;<br />Avec quelque fleur qui se dresse&nbsp;<br />Couleur d\'amour et d\'all&eacute;gresse,&nbsp;<br />Et des oiseaux sur des rameaux,&nbsp;<br />Et du gazon pour la paresse.<br />Mais rien ne valut mes ormeaux.<br /><br />Dans ma claire salle &agrave; manger<br />O&ugrave; du vin fit quelque prouesse,&nbsp;<br />Je les voyais tous deux bouger<br />Doucement au vent qui les presse&nbsp;<br />L\'un vers l\'autre en une caresse,<br />Et leurs feuilles fl&ucirc;taient des mots.&nbsp;<br />Le clos &eacute;tait plein de tendresse.<br />Mais rien ne valut mes ormeaux.<br /><br />H&eacute;las ! Quand il fallut changer&nbsp;<br />De cieux et quitter ma liesse,<br />Le verger et le potager&nbsp;<br />Se partag&egrave;rent ma tristesse,&nbsp;<br />Et la fleur couleur charmeresse,<br />Et l\'herbe, oreiller de mes maux,&nbsp;<br />Et l\'oiseau, surent ma d&eacute;tresse.<br />Mais rien ne valut mes ormeaux.<br /><br />ENVOI<br /><br />Prince, j\'ai go&ucirc;t&eacute; la simplesse<br />De vivre heureux dans vos hameaux :<br />Ga&icirc;t&eacute;, sant&eacute; que rien ne blesse.<br />Mais rien ne valut mes ormeaux.</p>'),
(19, '2017-05-31 16:26:19', 'Into the wild', '<p style="text-align: justify;"><span style="color: #333333; font-family: Arial, sans-serif; font-size: 16px;">Tout juste diplômé de l\'université, Christopher McCandless, 22 ans, est promis à un brillant avenir. Pourtant, tournant le dos à l\'existence confortable et sans surprise qui l\'attend, le jeune homme décide de prendre la route en laissant tout derrière lui.</span><br style="box-sizing: border-box; color: #333333; font-family: Arial, sans-serif; font-size: 16px;" /><span style="color: #333333; font-family: Arial, sans-serif; font-size: 16px;">Des champs de blé du Dakota aux flots tumultueux du Colorado, en passant par les communautés hippies de Californie, Christopher va rencontrer des personnages hauts en couleur. Chacun, à sa manière, va façonner sa vision de la vie et des autres.</span><br style="box-sizing: border-box; color: #333333; font-family: Arial, sans-serif; font-size: 16px;" /><span style="color: #333333; font-family: Arial, sans-serif; font-size: 16px;">Au bout de son voyage, Christopher atteindra son but ultime en s\'aventurant seul dans les étendues sauvages de l\'Alaska pour vivre en totale communion avec la nature.</span></p>');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `administration`
--
ALTER TABLE `administration`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `commentaires`
--
ALTER TABLE `commentaires`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_episode` (`id_episode`),
  ADD KEY `parent_commentaire` (`parent_commentaire`);

--
-- Index pour la table `episodes`
--
ALTER TABLE `episodes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `administration`
--
ALTER TABLE `administration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `commentaires`
--
ALTER TABLE `commentaires`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
--
-- AUTO_INCREMENT pour la table `episodes`
--
ALTER TABLE `episodes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `commentaires`
--
ALTER TABLE `commentaires`
  ADD CONSTRAINT `id_episode` FOREIGN KEY (`id_episode`) REFERENCES `episodes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `parent_commentaire` FOREIGN KEY (`parent_commentaire`) REFERENCES `commentaires` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
