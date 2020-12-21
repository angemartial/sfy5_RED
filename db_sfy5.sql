-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 22 déc. 2020 à 00:01
-- Version du serveur :  10.4.14-MariaDB
-- Version de PHP : 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `db_sfy5`
--

-- --------------------------------------------------------

--
-- Structure de la table `about_us`
--

CREATE TABLE `about_us` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `introduction` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `illustration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mission` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `vision` longtext COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `about_us`
--

INSERT INTO `about_us` (`id`, `title`, `introduction`, `content`, `illustration`, `mission`, `vision`) VALUES
(1, 'RED', '<div><strong><em>Le réseau Recherche Edification et Développement (RED) est né de la volonté de doctorants ivoiriens en Droit et en Economie, passionnés par la culture de l’excellence et désireux d’apprendre et de partager les savoirs acquis dans leurs différents domaines de compétence.</em></strong></div>', '<div>Il est composé de doctorants et chercheurs ivoiriens en droit et en économie réunis autour d’un idéal commun celui de promouvoir la recherche scientifique et ainsi faire évoluer et vulgariser le droit, l’économie et toutes les autres sciences utiles au développement de la Côte d’Ivoire et de l’Afrique par la rédaction d’articles dans leurs domaines respectifs.<br><br></div><div>Le site internet redforsearchers.com a été mis en ligne en décembre 2016 afin de rendre accessibles les données et recherches juridiques et économiques ivoiriennes. La mise en place de ce support électronique a pour objectifs de :<br><br></div><ul><li>Contribuer à l’avancement des connaissances en toutes sciences utiles au développement de la Côte d’Ivoire et de l’Afrique</li><li>Diffuser les informations y afférentes</li><li>Promouvoir la culture de la rédaction tant universitaire que professionnelle aussi bien en Côte d’Ivoire que dans les pays Africains</li><li>Placer les jalons de l’édification de théories scientifiques sur le continent Africain qui soient adaptées à son identité culturelle profonde</li></ul><div>En espérant que toutes les personnes assoiffées de savoir et de recherches étanchent leur soif ici !!<br><br></div><div>Bonne visite !!<br><br></div>', 'dda9cbf21a7f921891abab6f2ddb652a78331cb3.jpeg', '<div>Il est composé de doctorants et chercheurs ivoiriens en droit et en économie réunis autour d’un idéal commun celui de promouvoir la recherche scientifique et ainsi faire évoluer et vulgariser le droit, l’économie et toutes les autres sciences utiles au développement de la Côte d’Ivoire et de l’Afrique par la rédaction d’articles dans leurs domaines respectifs.</div>', '<div>Il est composé de doctorants et chercheurs ivoiriens en droit et en économie réunis autour d’un idéal commun celui de promouvoir la recherche scientifique et ainsi faire évoluer et vulgariser le droit, l’économie et toutes les autres sciences utiles au développement de la Côte d’Ivoire et de l’Afrique par la rédaction d’articles dans leurs domaines respectifs.</div>');

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

CREATE TABLE `article` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `introduction` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `illustration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `published_at` datetime NOT NULL,
  `subcategory1_id` int(11) DEFAULT NULL,
  `subcategory_id` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`id`, `category_id`, `title`, `introduction`, `content`, `slug`, `illustration`, `published_at`, `subcategory1_id`, `subcategory_id`, `user_id`) VALUES
(3, 11, 'DU DROIT À LA SANTÉ EN CÔTE D’IVOIRE : ÉTAT DES LIEUX ET PERSPECTIVES D’AMÉLIORATION', '<div>Le mercredi 27 novembre 2019, un Conseil des Ministres s’est tenu, à la Préfecture de Katiola, sous la présidence du Chef de l’État, Son Excellence Monsieur Alassane OUATTARA.</div>', '<div>Repoussée au profit de la Commission Africaine des Droits de l’Homme et des Peuples (CMADHP), trente-sept ans plus tard, l’idée prend vie avec la signature le 9 juin 1998 à Ouagadougou et l’entrée en vigueur le 25 janvier 2004 du protocole relatif à la charte africaine des droits de l’Homme et des peuples portant création d’une Cour africaine des droits de l’homme et des peuples. Après une existence virtuelle de 2004-2006, la Cour voit réellement le jour après la désignation de son siège et l’élection de ses juges. D’après son préambule, la Cour a pour but de « compléter et renforcer la mission de la Commission Africaine des Droits de l’Homme et des Peuples ». En d’autres termes, « assurer la protection des droits de l’homme et des peuples, des libertés et devoirs en Afrique ». Ce protocole a été ratifié par trente 30 pays sur les 55 que composent l’Union Africaine, et prévoit en plus de la ratification, une déclaration de reconnaissance de compétence des États afin de permettre à leurs citoyens de saisir directement la Cour. Un tiers des États ratificateurs a eu à faire la déclaration de compétence soit 10 États sur trente. Continuer à lire …</div>', 'du-droit-a-la-sante-en-cote-divoire-etat-des-lieux-et-perspectives-damelioration', '6d2650c3e6aef847f5e1f58640707e41ffcb32bf.jpeg', '2020-11-22 21:01:55', NULL, NULL, 12),
(4, 2, 'LES ENJEUX DE L’AIDE PUBLIQUE AU DÉVELOPPEMENT', 'Née dans le contexte de la guerre froide et de la décolonisation, l’Aide Publique au Développement (APD) fut un vecteur d’intérêts politiques et stratégiques avant de se transformer, depuis les années 1990, pour faire face aux défis de la mondialisation. Elle doit, à la fois, lutter contre la pauvreté et gérer les effets de l’intégration (économiques, sociaux, éthiques ou environnementaux) mondiale', 'Le milieu des années 1990 est, en effet, témoin d’un tournant des réflexions sur l’efficacité, le devenir, la recomposition des objectifs ainsi que les instruments et les transformations institutionnelles des pays bénéficiaires de l’aide. L’environnement international s’est profondément modifié avec la mondialisation, le développement des pays asiatiques, qui ont eu de moins en moins besoin de l’aide dont ils ont bénéficié jusqu’aux années 1960, et la marginalisation du continent africain malgré le volume et la longévité des flux reçus[2]. Continuer à lire …', 'les-enjeux-de-laide-publique-au-developpement', '2bb342b0a6f4bcf46bb61df56acacecce9946151.jpeg', '2020-11-22 21:01:57', NULL, NULL, 12),
(5, 2, 'LA VICTIME DANS LA PROCÉDURE PÉNALE IVOIRIENNE', 'Haumond Nelly Assamoi, Doctorante en droit privé et sciences criminelles à l’Université de Limoges', 'Dans la plupart des groupes ethniques ivoiriens, traditionnellement lorsqu’il y a frictions entre deux individus, c’est l’ensemble de la communauté à laquelle ils appartiennent qui se trouve concernée. Est alors mise en place une procédure de règlement de conflit qui inclut toute la communauté. La victime lésée par le comportement prohibé ainsi que l’auteur de ce comportement se retrouvent devant les anciens et toute la communauté sous l’arbre à palabre[1] pour régler le conflit. La victime tient de ce fait une place à part entière et somme toute importante au cours de ces procédures. En effet, bien que la communauté participe à la gestion du conflit, la victime et l’auteur sont les principaux acteurs. La victime est celle qui a été offensée et une place de choix lui est accordée : c’est elle qui exerce les poursuites, personnellement ou par le biais de mandataires (famille et amis). L’auteur, également, se défend des accusations portées contre lui et est présent, mais accompagné de membres de sa famille ou d’amis pouvant se porter garants de sa bonne moralité. La sanction de l’auteur prend généralement la forme d’une réparation de la victime et de ses proches. Ainsi, on considère comme victime non pas seulement celle qui a souffert personnellement de la commission de l’infraction, mais toutes les personnes qui l’entourent à des degrés près.\r\n\r\nÀ la suite de la colonisation cette forme traditionnelle de règlement des conflits a laissé la place en Côte d’Ivoire à une justice étatique. Désormais, consécutivement à la commission d’une infraction – crime, délit ou contravention – même si la justice traditionnelle demeure dans certaines communautés, c’est la procédure pénale étatique qui est mise en œuvre. Continuer à lire …', 'la-victime-dans-la-procedure-penale-ivoirienne', 'b9137b3b7b8608fe775f400a0b17bcbb11fb88c8.jpeg', '2020-11-22 21:01:45', NULL, NULL, 12),
(6, 1, 'LE DROIT DU TRAVAIL IVOIRIEN À L’ÉPREUVE DE LA CRISE DU COVID-19', 'Konin Marc Assoumou, Doctorant en Droit privé à l’université Jean Monnet de Saint-Étienne', 'La crise sanitaire du Covid-19 et ses conséquences sur les activités économiques contraignent les États à adapter la régulation des rapports sociaux. Les mesures de distanciation sociale ainsi que les restrictions aux libertés individuelles qu’impose la lutte contre le virus rendent difficile l’exercice des activités économiques. Le droit comme outil de régulation des relations sociales, plus particulièrement le droit du travail, apparait ainsi comme l’une des réponses apportées par les États. Face à cette pandémie, seules des réponses adaptées permettront de surmonter les conséquences socio-économiques qui découleront de cette crise.\r\n\r\nAux préoccupations légitimes des employeurs et des salariés, des réponses continuent à être apportées par l’élaboration de réponses normatives. En Côte d’Ivoire, les décrets pris en Conseil des ministres depuis le début de la crise sanitaire illustrent la prise en compte de la nécessité de mesures d’urgence[1]. Cependant, les mesures en vue d’assurer la sauvegarde des emplois tardent à faire leur incursion dans le paysage législatif ivoirien. Pour rappel, la législation ivoirienne du travail a été réformée par la loi du 20 juillet 2015, substituant ainsi la loi n° 95-15 du 12 janvier 1995. Continuer à lire …', 'le-droit-du-travail-ivoirien-a-lepreuve-de-la-crise-du-covid-19', '7415e6662f87d8ad8f2de43b86d6470b2f5fe03f.jpeg', '2020-11-22 21:01:22', NULL, NULL, 12),
(7, 1, 'LES NOUVEAUX PRINCIPES DIRECTEURS DE LA PROCÉDURE PÉNALE IVOIRIENNE', 'Haumond Nelly ASSAMOI, Doctorante en droit privé et sciences criminelles à l’Université de Limoges', 'La procédure pénale est la procédure mise en œuvre à la suite de la commission d’une infraction. Elle est, de ce fait, « constituée de l’ensemble des règles relatives à la constatation des infractions, ainsi qu’à l’identification, l’appréhension, la poursuite et le jugement de leurs auteurs »[1]. Elle commence, alors, dès la constatation de l’infraction et se termine à l’exécution de la peine. Son but est d’établir la vérité judiciaire et, ainsi, déterminer la responsabilité pénale de l’auteur de l’infraction et la sanction qui doit lui être appliquée.\r\n\r\nCependant, pour qu’elle soit juste, comprise et fiable, la justice se doit d’être rendue dans le respect des droits de chaque partie qui y intervient. Et, en raison de son caractère répressif et de son impact sur les libertés individuelles, les droits internationaux et régionaux mettent en avant depuis plusieurs décennies diverses garanties qui doivent être respectées et appliquées tout au long de la procédure pénale. Ces garanties sont celles qui sont attendues de tout État de droit. Ce sont des garanties qui relèvent tant des institutions chargées de rendre la justice, telles que les exigences d’indépendance et d’impartialité, que des garanties procédurales telles que le droit à un délai raisonnable de la procédure, ou encore le principe du', 'les-nouveaux-principes-directeurs-de-la-procedure-penale-ivoirienne', 'e105a249d4adc707a9da364c032d4557fa46132d.jpeg', '2020-11-22 21:01:59', NULL, NULL, 12),
(8, 11, 'DU DROIT À LA SANTÉ EN CÔTE D’IVOIRE : ÉTAT DES LIEUX ET PERSPECTIVES D’AMÉLIORATION', '<div>« <em>Existe-t-il pour l’homme un bien plus précieux que la Santé</em> ? », s’interrogeait un philosophe<a href=\"https://reseau-red.com/category/articles-juridiques/#_ftn1\">[1]</a> préfigurant l’importance accrue de la santé.</div>', '<div>Le droit à la santé est le défi le plus important et le plus complexe pour les États, influant sur leur économie, mais surtout sur la qualité de vie de leurs populations<a href=\"https://reseau-red.com/category/articles-juridiques/#_ftn2\">[2]</a>. La santé se définit comme « <em>un état de complet bien-être physique, mental et social, et qui ne consiste pas seulement en une absence de maladie ou d’infirmité »</em><a href=\"https://reseau-red.com/category/articles-juridiques/#_ftn3\">[3]</a> . Elle est considérée dans le Préambule de la Constitution de l’Organisation mondiale de la Santé comme un droit fondamental pour tout être humain. Plus encore la constitution ivoirienne de 2016 en son article 9 al. 2 promeut le « <em>droit à un accès aux services de santé </em>» à toute personne.<br><br></div><div>Partant, le droit à la santé comprend l’ensemble des règles relatives tant au « bien-être », à l’amélioration des conditions de vie des individus, qu’à la relation entre les professionnels de la santé et les patients. La crise actuelle du Covid19 a permis à tous les Etats d’évaluer leur système de santé, et peut-être, à espérer, penser une amélioration substantielle de celui-ci. Comptant parmi les pays africains à fort indice de développement, la situation du droit à la santé en Côte d’Ivoire, et surtout de l’accès aux soins de qualité demeure insatisfaisante et témoigne d’une bataille continue. De même, les textes régissant le droit à la santé en Côte d’Ivoire sont des textes hérités de la colonisation, tombés très vite en désuétude<a href=\"https://reseau-red.com/category/articles-juridiques/#_ftn4\">[4]</a>. Cette situation tend à rendre presque illusoire l’existence d’un véritable droit à la santé dans le pays, suivant l’état des lieux que l’on peut en dresser (I). Cependant, des perspectives d’amélioration tendent à assurer au droit à la santé une certaine réalité (II). <a href=\"https://reseau-red.com/2020/07/13/du-droit-a-la-sante-en-cote-divoire-etat-des-lieux-et-perspectives-damelioration/#more-635\">Continuer à lire …</a></div>', 'du-droit-a-la-sante-en-cote-divoire-etat-des-lieux-et-perspectives-damelioration', '1a3c66ad5dff146fa106d23a138cb5f46dc1591e.jpeg', '2020-11-22 21:01:50', NULL, NULL, 12),
(9, 11, 'Collectivités territoriales ivoiriennes : vers une plus grande autonomie financière ?', '<div>Le mercredi 27 novembre 2019, un Conseil des Ministres s’est tenu, à la Préfecture de Katiola, sous la présidence du Chef de l’État, Son Excellence Monsieur Alassane OUATTARA.</div>', '<div>Parmi les projets de loi adoptés par le Conseil des Ministres, l’un a attiré particulièrement notre attention. Il s’agit du projet de loi portant régime financier des collectivités territoriales et des districts autonomes<a href=\"https://reseau-red.com/category/actualites/#_ftn1\">[1]</a>. C’est au titre du Ministère auprès du Premier Ministre, chargé du Budget et du Portefeuille de l’État, en liaison avec le Ministère de l’Administration du Territoire et de la Décentralisation et le Ministère de l’Economie et des Finances que le conseil a adopté ce projet de loi qui « <em>donnera la possibilité pour les Collectivités territoriales et les Districts autonomes, de créer, d’exploiter ou de faire exploiter des services publics à caractère industriel et commercial dont les conditions de fonctionnement sont similaires à celles des entreprises privées</em> »<a href=\"https://reseau-red.com/category/actualites/#_ftn2\">[2]</a>. <a href=\"https://reseau-red.com/2020/01/07/collectivites-territoriales-ivoiriennes-vers-une-plus-grande-autonomie-financiere/#more-518\">Continuer à lire …</a></div>', 'collectivites-territoriales-ivoiriennes-vers-une-plus-grande-autonomie-financiere', 'bb6d36dfe4827250e6c80850ffe65ed59187dda8.jpeg', '2020-12-09 21:18:16', NULL, 2, 12),
(12, 11, 'Droit des affaires', '<div><a href=\"https://reseau-red.com/2020/05/18/le-retrait-de-la-declaration-dacceptation-de-la-competence-de-la-cour-africaine-des-droits-de-lhomme-et-des-peuples-par-letat-de-cote-divoire-regard-dun/\">Le retrait de la déclaration d’acceptation de la compétence de la Cour africaine des droits de l’homme et des peuples par l’État de Côte d’Ivoire : regard d’un privatiste<br></a><br></div>', '<div><a href=\"https://reseau-red.com/2020/05/18/le-retrait-de-la-declaration-dacceptation-de-la-competence-de-la-cour-africaine-des-droits-de-lhomme-et-des-peuples-par-letat-de-cote-divoire-regard-dun/\">Le retrait de la déclaration d’acceptation de la compétence de la Cour africaine des droits de l’homme et des peuples par l’État de Côte d’Ivoire : regard d’un privatiste<br>Le retrait de la déclaration d’acceptation de la compétence de la Cour africaine des droits de l’homme et des peuples par l’État de Côte d’Ivoire : regard d’un privatiste<br></a><br></div>', 'droit-des-affaires', '4c7116381e60c8bd3d1b61073e27c82040e8f979.jpeg', '2020-12-21 22:45:08', NULL, 1, 12);

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'Article'),
(2, 'Economie'),
(3, 'Base de données'),
(4, 'Répères Méthologiques'),
(11, 'Actualités');

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` int(11) NOT NULL,
  `subject` int(11) NOT NULL,
  `message` longtext COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `phone`, `subject`, `message`) VALUES
(1, 'koffi ange martial kouadio', 'angemartialkoffi@outlook.fr', 2147483647, 1, 'lhbkhuucytdxgrxdshr-d-tukvhlj'),
(2, 'koffi Ange Martial Kouadio', 'angemartialkoffi@gmail.com', 1767061325, 1, 'kgvgjvcjfchfgcfgchfdxhfdxgrswtz\'qztwsg'),
(3, 'koffi ange martial kouadio', 'angemartialkoffi@outlook.fr', 2147483647, 1, 'kanDUHADMCUF'),
(4, 'koffi Ange Martial Kouadio', 'angemartialkoffi@gmail.com', 2147483647, 1, 'JDQNJDSMOHFUZRFJZJKVB/KSB');

-- --------------------------------------------------------

--
-- Structure de la table `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20201125202738', '2020-11-25 21:28:55', 1127),
('DoctrineMigrations\\Version20201125210536', '2020-11-25 22:06:47', 109),
('DoctrineMigrations\\Version20201205110626', '2020-12-05 12:07:21', 1521),
('DoctrineMigrations\\Version20201205121748', '2020-12-05 13:17:58', 222),
('DoctrineMigrations\\Version20201205125356', '2020-12-05 13:54:11', 3009),
('DoctrineMigrations\\Version20201205130123', '2020-12-05 14:01:29', 1699),
('DoctrineMigrations\\Version20201206131648', '2020-12-06 14:16:56', 3552),
('DoctrineMigrations\\Version20201206133401', '2020-12-06 14:34:07', 330);

-- --------------------------------------------------------

--
-- Structure de la table `members`
--

CREATE TABLE `members` (
  `id` int(11) NOT NULL,
  `fonction` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `firstname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `presentation` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `illustration` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `experience` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `education` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `members`
--

INSERT INTO `members` (`id`, `fonction`, `firstname`, `lastname`, `presentation`, `illustration`, `experience`, `education`, `slug`) VALUES
(1, 'Enseignante Chercheur', 'Marie-Noel', 'KOFFI', '<div>Est doctorante en droit privé à l’université Jean Monnet de Saint-Etienne et est rattachée au Centre de Recherches Critiques sur le Droit (CERCRID).<br><br></div><div>Consciente de l’importance du droit des sûretés en droit des affaires, elle a durant son cursus universitaire , effectué divers travaux dans cette discipline. Elle a, à cet effet, rédigé deux mémoires en droit des suretés. Le premier relatif au gage sans dépossession en droit OHADA et le second sur le régime juridique applicable au compte bancaire affecté en garantie d’une dette. Elle rédige actuellement une thèse intitulée « Réflexions pour un renouveau du droit des sûretés personnelles ».<br><br></div><div>L’intérêt de son sujet réside dans le constat de nombreuses imperfections des sûretés personnelles en droit français dont la doctrine réclame une reforme en profondeur des textes. En effet, l’ordonnance n° 2006-346 du 23 mars 2006 relative aux sûretés a refondu le droit des sûretés réelles mais n’a quasiment pas toucher les sûretés personnelles. C’est pourquoi, elle fait état d’une part des nombreuses lacunes des sûretés personnelles et propose d’autre part un nouveau modèle de sûreté plus équitable pour les parties.<br><br></div><div>Il s’agit certes d’une thèse en droit français mais elle s’inspire d’autres droits étrangers tel le droit allemand.<br><br></div><div>Parallèlement à ses recherches, elle est chargée d’enseignement dans diverses matières du droit privé à l’université Jean Monnet de Saint-Etienne.<br><br></div><div>Intéressée par le développement de son pays et du continent africain, elle a intégré le Réseau Recherche Édification et Développement afin de partager son savoir. Elle est membre du comité de lecture.</div>', 'bfd3787b368f42f587330c011512e6123d2ab0ce.jpeg', '<div><br>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English.</div><div><br>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words.</div>', '<ul><li><strong>Law School:<br></strong><br></li><li>J.D., 1991 – 1994, Harvard Law School of Law (Status : Excellent – Top 3 of School)</li><li>B.S., 1995 – 2000, University of Law, New York (Status : Excellent)</li><li><strong>Certificate:<br></strong><br></li><li>Environmental and Natural Resources Law Certificate (Status : Excellent)</li><li>Business and Commercial Law Certificate (Status : Great)</li><li><strong>Bar Admissions:<br></strong><br></li><li>NewYork 1983</li><li>The State Bar of NewYork</li><li>US Court of Florida Claims</li></ul><div><br></div>', 'marie-noel'),
(2, 'Enseignante Chercheur', 'Haumond N’doumi Nelly Brenda', 'ASSAMOI', '<div>Est doctorante en droit privé et sciences criminelles à l’Université de Limoges au sein du laboratoire Observation des Mutations Institutionnelles et Juridiques.<br><br></div><div>Fort intéressée par le droit pénal et les droits de l’homme elle a fait son mémoire de recherche sur <em>‘la comparution immédiate à l’aune du droit à un procès équitable’</em>. Et aujourd’hui, dans le cadre de sa thèse, elle travaille sur <em>‘l’action civile et le droit à un procès pénal équitable’</em>. L’objet de ses travaux est de déterminer l’impact que représente l’action civile sur l’économie générale du procès pénal eu égard aux garanties irriguant celui-ci. Et à cet effet, elle s’intéresse non seulement au droit français en la matière, mais également aux droits régionaux et internationaux des droits de l’homme, ainsi qu’aux applications internes du procès équitable.<br><br></div><div>En parallèle à ses travaux de recherches, elle est également chargée d’enseignement à l’Université de Limoges, sous contrat ATER, dans diverses matières telles que le droit pénal et le droit civil.<br><br></div><div>Fascinée par la recherche et ayant à cœur le développement scientifique de sa terre natale, elle souhaite apporter sa pierre à l’édification de l’Afrique. C’est pour cette raison qu’elle intervient au sein du RED dont le but principal est de promouvoir la recherche scientifique et ainsi faire évoluer et vulgariser le droit, l’économie et toutes les autres sciences utiles au développement de la Côte d’Ivoire et de l’Afrique. Et, comme tous les autres membres elle est engagée dans la poursuite de ce rêve et intervient, à cet effet, en tant que membre du conseil d’administration et secrétaire.</div>', '16c4269f6584ac5dbb531a23be429648068236a7.jpeg', '<div>Fascinée par la recherche et ayant à cœur le développement scientifique de sa terre natale, elle souhaite apporter sa pierre à l’édification de l’Afrique. C’est pour cette raison qu’elle intervient au sein du RED dont le but principal est de promouvoir la recherche scientifique et ainsi faire évoluer et vulgariser le droit, l’économie et toutes les autres sciences utiles au développement de la Côte d’Ivoire et de l’Afrique. Et, comme tous les autres membres elle est engagée dans la poursuite de ce</div>', '<ul><li><strong>Law School:<br></strong><br></li><li>J.D., 1991 – 1994, Harvard Law School of Law (Status : Excellent – Top 3 of School)</li><li>B.S., 1995 – 2000, University of Law, New York (Status : Excellent)</li><li><strong>Certificate:<br></strong><br></li><li>Environmental and Natural Resources Law Certificate (Status : Excellent)</li><li>Business and Commercial Law Certificate (Status : Great)</li><li><strong>Bar Admissions:<br></strong><br></li><li>NewYork 1983</li><li>The State Bar of NewYork</li><li>US Court of Florida Claims</li></ul><div><br></div>', 'haumond-ndoumi-nelly-brenda'),
(3, 'Enseignante Chercheur', 'Koutoua Pierre Stéphane', 'NINDJIN', '<div>Est un jeune juriste-chercheur spécialisé en droit privé des contrats, chargé d’enseignement à l’Université;<br><br></div><div>Doctorant depuis 2015, il réalise ses travaux au centre de recherches de l’Institut de droit privé de l’Université Toulouse 1 capitole, sur le thème de l’indivisibilité en droit des contrats.<br><br></div><div>L’objet de cette étude, est la clarification du régime juridique des montages contractuels tant civils que commerciaux déclarés indissociables, liant <em>de juris</em> ou <em>de facto</em> leur sort, par l’élaboration de critères d’identification communs et fiables qui permettront d’assurer le respect des prévisions contractuels, mais encore garantir la sécurité juridique des relations d’affaires.<br><br></div><div>Le domaine de la notion est vaste, et couvre l’ensemble du droit privé des contrats tant français qu’international. Il présente dès lors un intérêt certain pour les relations d’affaires entre les pays issus du droit OHADA, de l’Europe ou de la sphère juridique internationale, dans le cadre des échanges commerciaux transfrontaliers.<br><br></div><div>Il intervient au sein de l’équipe dynamique du RED, en qualité de juriste-chercheur, spécialiste du droit des contrats civils et commerciaux, apportant sa pierre à l’édification et au développement de la recherche scientifique en Côte d’Ivoire, en Afrique mais encore dans une perspective internationale. Et pour consolider son engagement au sein de ce réseau, il y intervient, également, en tant que membre du comité de lecture.</div>', 'bac5777900ca5e8276545c7557f239a03f1cbf3a.jpeg', '<div>Il intervient au sein de l’équipe dynamique du RED, en qualité de juriste-chercheur, spécialiste du droit des contrats civils et commerciaux, apportant sa pierre à l’édification et au développement de la recherche scientifique en Côte d’Ivoire, en Afrique mais encore dans une perspective internationale. Et pour consolider son engagement au sein de ce réseau, il y intervient, également, en tant que membre du comité de lecture.</div>', '<ul><li><strong>Law School:<br></strong><br></li><li>J.D., 1991 – 1994, Harvard Law School of Law (Status : Excellent – Top 3 of School)</li><li>B.S., 1995 – 2000, University of Law, New York (Status : Excellent)</li><li><strong>Certificate:<br></strong><br></li><li>Environmental and Natural Resources Law Certificate (Status : Excellent)</li><li>Business and Commercial Law Certificate (Status : Great)</li><li><strong>Bar Admissions:<br></strong><br></li><li>NewYork 1983</li><li>The State Bar of NewYork</li><li>US Court of Florida Claims</li></ul><div><br></div>', 'koutoua-pierre-stephane');

-- --------------------------------------------------------

--
-- Structure de la table `slider`
--

CREATE TABLE `slider` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `illustration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `subcategory`
--

CREATE TABLE `subcategory` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `subcategory`
--

INSERT INTO `subcategory` (`id`, `name`) VALUES
(1, 'Economie'),
(2, 'Droit');

-- --------------------------------------------------------

--
-- Structure de la table `subcategory1`
--

CREATE TABLE `subcategory1` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `tag`
--

CREATE TABLE `tag` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` longtext COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '(DC2Type:json)',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `firstname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `email`, `roles`, `password`, `firstname`, `lastname`, `description`, `slug`) VALUES
(12, 'angem@gmail.com', '[\"ROLE_ADMIN\"]', '$argon2id$v=19$m=65536,t=4,p=1$RFJkVXNwUHYweEtHcVZ4bg$lOHiaU4/tHLXFyRsLJaPphUU1gkKfCKs2MUOyqADchk', 'koffi Ange', 'Kouadio', 'parlez un peu de vous parlez un peu de vous parlez un peu de vous parlez un peu de vous parlez un peu de vous parlez un peu de vous parlez un peu de vous parlez un peu de vous parlez un peu de vous parlez un peu de vous parlez un peu de vous parlez un peu de vous parlez un peu de vous parlez un peu de vous parlez un peu de vous parlez un peu de vous parlez un peu de vous parlez un peu de vous parlez un peu de vous parlez un peu de vous', NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `about_us`
--
ALTER TABLE `about_us`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_23A0E6612469DE2` (`category_id`),
  ADD KEY `IDX_23A0E66233E2F3A` (`subcategory1_id`),
  ADD KEY `IDX_23A0E665DC6FE57` (`subcategory_id`),
  ADD KEY `IDX_23A0E66A76ED395` (`user_id`);

--
-- Index pour la table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Index pour la table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `subcategory`
--
ALTER TABLE `subcategory`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `subcategory1`
--
ALTER TABLE `subcategory1`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tag`
--
ALTER TABLE `tag`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `about_us`
--
ALTER TABLE `about_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `subcategory`
--
ALTER TABLE `subcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `subcategory1`
--
ALTER TABLE `subcategory1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `tag`
--
ALTER TABLE `tag`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `FK_23A0E6612469DE2` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`),
  ADD CONSTRAINT `FK_23A0E66233E2F3A` FOREIGN KEY (`subcategory1_id`) REFERENCES `subcategory1` (`id`),
  ADD CONSTRAINT `FK_23A0E665DC6FE57` FOREIGN KEY (`subcategory_id`) REFERENCES `subcategory` (`id`),
  ADD CONSTRAINT `FK_23A0E66A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
