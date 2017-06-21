-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 15, 2016 at 12:01 PM
-- Server version: 5.6.20
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `laravel_dev`
--

-- --------------------------------------------------------

--
-- Table structure for table `addbookidlist`
--

CREATE TABLE IF NOT EXISTS `addbookidlist` (
`id` int(10) unsigned NOT NULL,
  `arr_id` int(11) NOT NULL DEFAULT '0',
  `all_id` int(11) NOT NULL DEFAULT '0',
  `owner_id` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `addbookidlist`
--

INSERT INTO `addbookidlist` (`id`, `arr_id`, `all_id`, `owner_id`) VALUES
(1, 1, 12, 2),
(2, 2, 22, 2),
(3, 3, 32, 2),
(4, 4, 42, 2),
(5, 5, 52, 2),
(6, 6, 62, 2);

-- --------------------------------------------------------

--
-- Table structure for table `addlistid`
--

CREATE TABLE IF NOT EXISTS `addlistid` (
`id` int(10) unsigned NOT NULL,
  `arr_id` int(11) NOT NULL DEFAULT '0',
  `all_id` int(11) NOT NULL DEFAULT '0',
  `owner_id` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `addlistid`
--

INSERT INTO `addlistid` (`id`, `arr_id`, `all_id`, `owner_id`) VALUES
(1, 1, 21, 2),
(2, 2, 22, 2),
(3, 3, 23, 2),
(5, 4, 51, 5),
(6, 5, 52, 5);

-- --------------------------------------------------------

--
-- Table structure for table `book_catalog`
--

CREATE TABLE IF NOT EXISTS `book_catalog` (
`id` int(10) unsigned NOT NULL,
  `owner_id` int(11) NOT NULL DEFAULT '0',
  `book_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `google_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `list_id` int(11) NOT NULL DEFAULT '0',
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'None',
  `author_last` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'None',
  `author_first` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'None',
  `year` int(11) NOT NULL DEFAULT '2000',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=19 ;

--
-- Dumping data for table `book_catalog`
--

INSERT INTO `book_catalog` (`id`, `owner_id`, `book_id`, `google_id`, `list_id`, `title`, `author_last`, `author_first`, `year`, `created_at`, `updated_at`) VALUES
(1, 2, '9780547951942', 'yl4dILkcqm4C', 1, 'The Lord of the Rings', 'Tolkien', 'J.R.R.', 2012, NULL, NULL),
(2, 2, '9780553802023', 'VTu8i9vGUksC', 1, 'The Cat in the Hat', 'Seuss', 'Dr.', 2012, '2016-06-14 14:35:39', '2016-06-14 14:35:39'),
(3, 2, '1400032709', 'lo0cCD_eRygC', 2, 'Choke', 'Palahniuk', 'Chuck', 2002, '2016-06-13 18:57:43', '2016-06-13 18:57:43'),
(4, 2, '9780753516898', 'QaYbM0Fvch8C', 2, 'I Am America (and So Can You!)', 'Colbert', 'Stephen', 2009, '2016-06-13 19:35:28', '2016-06-13 19:35:28'),
(5, 2, '9780061965104', '1IleAgAAQBAJ', 2, 'The Giving Tree', 'Silverstein', 'Shel', 2014, '2016-06-14 11:37:46', '2016-06-14 11:37:46'),
(6, 2, '0393062244', '0co_UQgNXacC', 1, 'Death by Black Hole', 'deGrasse', 'Neil', 2007, '2016-06-14 13:08:31', '2016-06-14 13:08:31'),
(8, 2, '1429900458', 'Qg2dmntfxmQC', 3, 'On Intelligence', 'Hawkins', 'Jeff', 2007, '2016-06-15 02:43:23', '2016-06-15 02:43:23'),
(9, 2, '9781593271442', '0FW3DMNhl1EC', 3, 'Hacking, 2nd Edition', 'Erickson', 'Jon', 2008, '2016-06-15 02:48:05', '2016-06-15 02:48:05'),
(11, 5, '1568987366', '_22t2rC6X2MC', 1, 'Ghost', 'Mackay-Lyons', 'Brian', 2008, '2016-06-15 12:34:31', '2016-06-15 12:34:31'),
(12, 5, '9780545215817', 'ohbUC_FA_E8C', 2, 'Clifford''s Thanksgiving Visit', 'Bridwell', 'Norman', 2010, '2016-06-15 12:39:52', '2016-06-15 12:39:52'),
(13, 5, '9781453206409', 'TwYszLPJS00C', 2, 'The Boo', 'Conroy', 'Pat', 2010, '2016-06-15 12:53:07', '2016-06-15 12:53:07'),
(17, 5, '9781439147733', 'nuFSJ_kuflAC', 1, 'Serious as Dog Dirt', 'Margera', 'Bam', 2009, '2016-06-15 14:57:13', '2016-06-15 14:57:13'),
(18, 5, '0374528179', 'vZMUC4wpdiMC', 1, 'Babi Yar', 'Anatoliĭ', 'A.', 1970, '2016-06-15 15:08:05', '2016-06-15 15:08:05');

-- --------------------------------------------------------

--
-- Table structure for table `book_detail`
--

CREATE TABLE IF NOT EXISTS `book_detail` (
`id` int(10) unsigned NOT NULL,
  `owner_id` int(11) NOT NULL DEFAULT '0',
  `book_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `publisher` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'None',
  `categories` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'None',
  `rating` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'None',
  `description` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=19 ;

--
-- Dumping data for table `book_detail`
--

INSERT INTO `book_detail` (`id`, `owner_id`, `book_id`, `publisher`, `categories`, `rating`, `description`) VALUES
(1, 2, '9780547951942', 'Houghton Mifflin Harcourt', 'Fiction', '4.5', 'One Ring to rule them all, One Ring to find them, One Ring to bring them all and in the darkness bind them In ancient times the Rings of Power were crafted by the Elven-smiths, and Sauron, the Dark Lord, forged the One Ring, filling it with his own power so that he could rule all others. But the One Ring was taken from him, and though he sought it throughout Middle-earth, it remained lost to him. After many ages it fell by chance into the hands of the hobbit Bilbo Baggins. From Sauron''s fastness in the Dark Tower of Mordor, his power spread far and wide. Sauron gathered all the Great Rings to him, but always he searched for the One Ring that would complete his dominion. When Bilbo reached his eleventy-first birthday he disappeared, bequeathing to his young cousin Frodo the Ruling Ring and a perilous quest: to journey across Middle-earth, deep into the shadow of the Dark Lord, and destroy the Ring by casting it into the Cracks of Doom. The Lord of the Rings tells of the great quest undertaken by Frodo and the Fellowship of the Ring: Gandalf the Wizard; the hobbits Merry, Pippin, and Sam; Gimli the Dwarf; Legolas the Elf; Boromir of Gondor; and a tall, mysterious stranger called Strider. This new edition includes the fiftieth-anniversary fully corrected text setting and, for the first time, an extensive new index. J.R.R. Tolkien (1892-1973), beloved throughout the world as the creator of The Hobbit, The Lord of the Rings, and The Silmarillion, was a professor of Anglo-Saxon at Oxford, a fellow of Pembroke College, and a fellow of Merton College until his retirement in 1959. His chief interest was the linguistic aspects of the early English written tradition, but while he studied classic works of the past, he was creating a set of his own.'),
(2, 2, '9780553802023', 'Random House Books for Young Readers', 'Juvenile Fiction', '4', 'Two children sitting at home on a rainy day are visited by the Cat in the Hat, who shows them some tricks and games.'),
(3, 2, '1400032709', 'Anchor', 'Fiction', '4', 'Victor Mancini, a medical-school dropout, is an antihero for our deranged times. Needing to pay elder care for his mother, Victor has devised an ingenious scam: he pretends to choke on pieces of food while dining in upscale restaurants. He then allows himself to be “saved” by fellow patrons who, feeling responsible for Victor’s life, go on to send checks to support him. When he’s not pulling this stunt, Victor cruises sexual addiction recovery workshops for action, visits his addled mom, and spends his days working at a colonial theme park. His creator, Chuck Palahniuk, is the visionary we need and the satirist we deserve.'),
(4, 2, '9780753516898', 'Random House', 'Humor', '3.5', 'Stephen Colbert was The Daily Show''s longest-running and most memorable correspondent. His right-wing, super-patriotic persona, his insight and general rightness led to The Colbert Report, a half-hour TV platform for his views on the issues of the day and, more importantly, why everyone else''s views are just plain wrong. I Am America (And So Can You!) features Stephen''s most deeply held knee-jerk beliefs on everything from The Family to Race and Immigration and provides the ultimate satirical guide to the glorious marvel that is American Life. He bravely takes on the forces aligned to destroy America - whether they be terrorists, environmentalists, or brand-name breakfast cereals - and tackles difficult issues like religion, sexuality, and nature (''I''ve never trusted the sea. What''s it hiding under there?'') With hilarious illustrations and charts (''Things That Are Trying to Turn Me Gay'', ''Sports to Ignore'' and many more) and a complete transcript of Colbert''s infamous speech at the 2006 White House Correspondents'' Dinner, this is a brilliantly funny book as well as a very clever commentary on America today.'),
(5, 2, '9780061965104', 'Harper Collins', 'Juvenile Fiction', '4', 'This year, as The Giving Tree turns fifty, this timeless classic is available for the first time ever in ebook format. This digital edition will allow young readers and lifelong fans to continue the legacy and love of a household classic that will now reach an even wider audience. Never before have Shel Silverstein''s children''s books appeared in a format other than hardcover. Since it was first published fifty years ago, Shel Silverstein''s poignant picture book for readers of all ages has offered a touching interpretation of the gift of giving and a serene acceptance of another''s capacity to love in return. Shel Silverstein''s incomparable career as a bestselling children''s book author and illustrator began with Lafcadio, the Lion Who Shot Back. He is also the creator of picture books including A Giraffe and a Half, Who Wants a Cheap Rhinoceros?, The Missing Piece, The Missing Piece Meets the Big O, and the perennial favorite The Giving Tree, and of classic poetry collections such as Where the Sidewalk Ends, A Light in the Attic, Falling Up, Every Thing On It, Don''t Bump the Glump!, and Runny Babbit. Supports the Common Core State Standards.'),
(6, 2, '0393062244', 'W. W. Norton & Company', 'Science', '4', 'A collection of essays on the cosmos, written by an American Museum of Natural History astrophysicist, includes "Holy Wars," "Ends of the World," and "Hollywood Nights."'),
(8, 2, '1429900458', 'Macmillan', 'Computers', '4', 'From the inventor of the PalmPilot comes a new and compelling theory of intelligence, brain function, and the future of intelligent machines Jeff Hawkins, the man who created the PalmPilot, Treo smart phone, and other handheld devices, has reshaped our relationship to computers. Now he stands ready to revolutionize both neuroscience and computing in one stroke, with a new understanding of intelligence itself. Hawkins develops a powerful theory of how the human brain works, explaining why computers are not intelligent and how, based on this new theory, we can finally build intelligent machines. The brain is not a computer, but a memory system that stores experiences in a way that reflects the true structure of the world, remembering sequences of events and their nested relationships and making predictions based on those memories. It is this memory-prediction system that forms the basis of intelligence, perception, creativity, and even consciousness. In an engaging style that will captivate audiences from the merely curious to the professional scientist, Hawkins shows how a clear understanding of how the brain works will make it possible for us to build intelligent machines, in silicon, that will exceed our human ability in surprising ways. Written with acclaimed science writer Sandra Blakeslee, On Intelligence promises to completely transfigure the possibilities of the technology age. It is a landmark book in its scope and clarity.'),
(9, 2, '9781593271442', 'No Starch Press', 'COMPUTERS', '4', 'An introduction to hacking describes the techniques of computer hacking, covering such topics as stack-based overflows, format string exploits, network security, cryptographic attacks, and shellcode.'),
(11, 5, '1568987366', 'Princeton Architectural Press', 'Architecture', '5', '"Architecture is a social art. If the practice of architecture is the art of what you can make happen, then I believe that you are only as good as your bullpenthe builders, the engineers, the artisans, the colleagues, the staffwho collaborate with you; those who become possessed by the same urge to build, by the same belief that we are working on something exceptional together." Brian MacKay-Lyons For two weeks each summer, architect Brian MacKay-Lyons uses his family farm on the east coast of Nova Scotia for aspecial event. Among the stone ruins of a village almost four hundred years old, he assembles a community of architects,professors, and students for a design-build internship and educational initiative called Ghost Research Lab. The twoweek projectone week of design and one week of constructionrests on the idea that architecture is not only about building but also about the landscape, its history, and the community. Based on the apprenticeship environment of ancient guilds, where architectural knowledge was transferred through direct experience, Ghost redefines the architectas a builder who cultivates and contributes to the quality of the native landscape. Published to celebrate the event''s tenth anniversary, Ghost offers a thorough documentation of the past decade''s design-build events including drawings, models, and final photographs of completed structures. Organized chronologically and interwoven with MacKay-Lyons''s simple and accessible personal narratives, Ghost also features essays by some of the most eminent figures in architectural criticism, including Christine Macy, Brian Carter, Karl Habermann, Robert Ivy, Kenneth Frampton, Thomas Fisher, Juhani Pallasmaa, Peter Buchanan, and Robert McCarter. In an architectural climatefull of trends and egos, Ghost is the rare manifesto that does not preach but rather inspires quietly with simple ideas that unexpectedly unsettle and arouse.'),
(12, 5, '9780545215817', 'Scholastic Inc.', 'Juvenile Fiction', '4', 'When Emily Elizabeth visits her grandparents on Thanksgiving, Clifford decides to see his mother, and searches the city for her.'),
(13, 5, '9781453206409', 'Open Road Media', 'Fiction', '2', 'Acclaimed author Pat Conroy’s debut novel about life at the Citadel in the 1960s is a profound exploration of what it means to be a man of honor Lt. Col. Nugent Courvoisie, known to the cadets as “the Boo,” is an imposing and inspiring leader at the South Carolina military academy, the Citadel. A harsh disciplinarian but a compassionate mentor, he guides and inspires his young charges. Cadet Peter Cates is an anomaly. He is a gifted writer, a talented basketball player, and a good student, but his outward successes do little to impress his abusive father. The Boo takes Cates under his wing, but their bond is threatened when they’re forced to confront an act of violence on campus. Drawn from Pat Conroy’s own experiences as a student at the Citadel, The Boo is an unforgettable story about duty, loyalty, and standing up for what is right in the face of overwhelming circumstances.'),
(17, 5, '9781439147733', 'Simon and Schuster', 'Biography & Autobiography', '4', 'Bam Marger''s personal writings, photos and drawings.'),
(18, 5, '0374528179', 'Macmillan', 'History', '4.5', '"First published in censored form in Yunost 1966, under the title ''Babi Yar''"--T.p. verso.');

-- --------------------------------------------------------

--
-- Table structure for table `list_catalog`
--

CREATE TABLE IF NOT EXISTS `list_catalog` (
`id` int(10) unsigned NOT NULL,
  `owner_id` int(11) NOT NULL DEFAULT '0',
  `list_id` int(11) NOT NULL DEFAULT '0',
  `list_array` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `list_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'None',
  `fullCount` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `list_catalog`
--

INSERT INTO `list_catalog` (`id`, `owner_id`, `list_id`, `list_array`, `list_title`, `fullCount`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 'a:3:{s:13:"9780553802023";i:1;s:10:"0393062244";i:2;s:13:"9780547951942";i:3;}', 'First New List', 3, '2016-06-12 18:25:55', '2016-06-13 19:45:56'),
(2, 2, 2, 'a:3:{i:1400032709;i:1;s:13:"9780753516898";i:2;s:13:"9780061965104";i:3;}', 'Super Cool List', 3, '2016-06-13 17:44:01', '2016-06-13 19:45:56'),
(3, 2, 3, 'a:2:{i:1429900458;i:1;s:13:"9781593271442";i:2;}', 'Stress Test', 2, NULL, NULL),
(4, 5, 1, 'a:3:{s:13:"9781439147733";i:1;i:1568987366;i:2;s:10:"0374528179";i:3;}', 'New List 1', 3, NULL, NULL),
(5, 5, 2, 'a:2:{s:13:"9780545215817";i:1;s:13:"9781453206409";i:2;}', 'Second List', 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_100000_create_password_resets_table', 1),
('2016_06_11_000923_create_users_table', 1),
('2016_06_11_002519_create_items_table', 2),
('2016_06_11_061307_create_token_column', 3),
('2016_06_11_102159_create_user_details', 4),
('2016_06_11_102209_remove_items', 5),
('2016_06_11_102230_create_user_stats', 5),
('2016_06_11_103749_create_book_catalog', 5),
('2016_06_11_104157_create_list_catalog', 6),
('2016_06_11_104529_create_book_detail', 7),
('2016_06_13_151126_add_list_id', 8),
('2016_06_13_151251_add_id_list', 9),
('2016_06_13_155942_add_bulk_list', 10),
('2016_06_14_081324_add_id_list', 10),
('2016_06_14_082407_add_list_id', 11),
('2016_06_14_114523_add_book_id_list', 12);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `password`, `email`, `created_at`, `updated_at`, `remember_token`) VALUES
(2, 'Terry', '$2y$10$zlCFKrrQR7xZ6UA1F03rd.BsekTVwvO/Ut1l6UxNOPmFkHM3aROOy', 'test@test.com', NULL, '2016-06-15 02:49:55', 'BFE2ievAb6GJBKik3KWt62Mm7LhySrfdrI6PkJ3W08MD8r5DL3heR94HfPOd'),
(5, 'Test User 1', '$2y$10$mN3tBq.LwacCKSFUBsPUDe59d1sp/PJBUe2cbQeUMADlX49lVqGZy', 'testuser@test.com', '2016-06-15 03:39:45', '2016-06-15 03:39:45', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE IF NOT EXISTS `user_details` (
`id` int(10) unsigned NOT NULL,
  `owner_id` int(11) NOT NULL DEFAULT '0',
  `real_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'None',
  `gender` tinyint(1) NOT NULL DEFAULT '0',
  `fav_book` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'None',
  `fav_genre` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'None',
  `fav_author` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'None',
  `region` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'None',
  `country` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'None'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`id`, `owner_id`, `real_name`, `gender`, `fav_book`, `fav_genre`, `fav_author`, `region`, `country`) VALUES
(1, 2, 'Terry', 1, 'Of Mice And Programmers', 'White Pages', 'Harry Potter', 'Colorado', 'USA');

-- --------------------------------------------------------

--
-- Table structure for table `user_stats`
--

CREATE TABLE IF NOT EXISTS `user_stats` (
`id` int(10) unsigned NOT NULL,
  `owner_id` int(11) NOT NULL DEFAULT '0',
  `crnt_count` int(11) NOT NULL DEFAULT '0',
  `list_count` int(11) NOT NULL DEFAULT '0',
  `all_count` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `user_stats`
--

INSERT INTO `user_stats` (`id`, `owner_id`, `crnt_count`, `list_count`, `all_count`) VALUES
(1, 2, 8, 2, 4),
(2, 5, 6, 2, 7);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addbookidlist`
--
ALTER TABLE `addbookidlist`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `addlistid`
--
ALTER TABLE `addlistid`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `book_catalog`
--
ALTER TABLE `book_catalog`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `book_detail`
--
ALTER TABLE `book_detail`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `list_catalog`
--
ALTER TABLE `list_catalog`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
 ADD KEY `password_resets_email_index` (`email`), ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_stats`
--
ALTER TABLE `user_stats`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addbookidlist`
--
ALTER TABLE `addbookidlist`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `addlistid`
--
ALTER TABLE `addlistid`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `book_catalog`
--
ALTER TABLE `book_catalog`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `book_detail`
--
ALTER TABLE `book_detail`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `list_catalog`
--
ALTER TABLE `list_catalog`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `user_stats`
--
ALTER TABLE `user_stats`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
