-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 14, 2022 lúc 05:27 PM
-- Phiên bản máy phục vụ: 10.4.24-MariaDB
-- Phiên bản PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
CREATE DATABASE IF NOT EXISTS `boxgame` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `boxgame`;
--
-- Cơ sở dữ liệu: `boxgame`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `account_admin`
--

CREATE TABLE `account_admin` (
  `adminId` varchar(45) NOT NULL,
  `name` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `role` varchar(45) NOT NULL,
  `status` bit(1) NOT NULL DEFAULT b'1',
  `phone` varchar(10) DEFAULT NULL,
  `created_at` varchar(45) DEFAULT NULL,
  `update_at` varchar(45) DEFAULT NULL,
  `image` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `account_admin`
--

INSERT INTO `account_admin` (`adminId`, `name`, `email`, `password`, `role`, `status`, `phone`, `created_at`, `update_at`, `image`) VALUES
('admin', 'admin', 'admin@gmail.com', '12345678', 'manager', b'1', NULL, NULL, NULL, NULL),
('loc', 'Mr. Clown', 'loclongla1999@gmail.com', '12345678', 'boss', b'1', NULL, NULL, NULL, 'img/admin/adminloc.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart_details`
--

CREATE TABLE `cart_details` (
  `cart_details_id` int(11) NOT NULL,
  `cartId` int(11) NOT NULL,
  `gameId` varchar(45) NOT NULL,
  `gamePrice` float NOT NULL,
  `gameIcon` varchar(100) NOT NULL,
  `gameSale` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `cart_details`
--

INSERT INTO `cart_details` (`cart_details_id`, `cartId`, `gameId`, `gamePrice`, `gameIcon`, `gameSale`) VALUES
(3, 2, 'Hollow_Knight___Silksong', 16.99, 'img/game/Hollow_Knight___Silksong/icon/icon.jpg', 0),
(6, 4, 'Goat_Simulator_3', 19.99, 'img/game/Goat_Simulator_3/icon/icon.jpg', 0),
(7, 4, 'Hollow_Knight___Silksong', 16.99, 'img/game/Hollow_Knight___Silksong/icon/icon.jpg', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart_master`
--

CREATE TABLE `cart_master` (
  `cartId` int(11) NOT NULL,
  `userID` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` bit(1) NOT NULL DEFAULT b'0',
  `cartTotal` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `cart_master`
--

INSERT INTO `cart_master` (`cartId`, `userID`, `created_at`, `status`, `cartTotal`) VALUES
(2, 'hoan9999', '2022-11-14 12:52:56', b'1', 16.99),
(4, 'hoan9999', '2022-11-14 12:57:48', b'1', 36.98);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `category` int(11) NOT NULL,
  `type` varchar(45) NOT NULL,
  `gameId` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`category`, `type`, `gameId`) VALUES
(40, 'PvP', 'War_Thunder'),
(41, 'Strategy', 'War_Thunder'),
(42, 'Anime', 'PC_Building_Simulator_2'),
(43, 'Family', 'PC_Building_Simulator_2'),
(45, 'Anime', 'SuchArt___Genius_Artist_Simulator'),
(46, 'Family', 'SuchArt___Genius_Artist_Simulator'),
(47, 'Adventure', 'JARS'),
(49, 'Strategy', 'JARS'),
(50, 'Adventure', 'Source_of_Madness'),
(51, 'MOBA', 'Source_of_Madness'),
(52, 'Survivals', 'Source_of_Madness'),
(53, 'Strategy', 'Source_of_Madness'),
(54, 'Adventure', 'Railway_Empire'),
(55, 'Anime', 'Railway_Empire'),
(56, 'Survivals', 'Railway_Empire'),
(76, 'Adventure', 'Unrail'),
(77, 'Anime', 'Unrail'),
(78, 'MOBA', 'Unrail'),
(79, 'Survivals', 'Unrail'),
(80, 'Strategy', 'Unrail'),
(89, 'Adventure', 'Uncharted___Legacy_of_Thieves'),
(90, 'FPS-Shooter', 'Uncharted___Legacy_of_Thieves'),
(91, 'PvP', 'Uncharted___Legacy_of_Thieves'),
(92, 'Strategy', 'Uncharted___Legacy_of_Thieves'),
(93, 'Adventure', 'Dying_Light_2_Stay_Human'),
(94, 'Anime', 'Dying_Light_2_Stay_Human'),
(95, 'Horror', 'Dying_Light_2_Stay_Human'),
(97, 'PvP', 'Dying_Light_2_Stay_Human'),
(98, 'Survivals', 'Dying_Light_2_Stay_Human'),
(99, 'PvP', 'Rocket_League'),
(100, 'Simulation', 'Rocket_League'),
(101, 'Strategy', 'Rocket_League'),
(102, 'Adventure', 'Goat_Simulator_3'),
(103, 'Family', 'Goat_Simulator_3'),
(105, 'Simulation', 'Goat_Simulator_3'),
(106, 'Adventure', 'Titanfall_2'),
(107, 'FPS-Shooter', 'Titanfall_2'),
(109, 'PvP', 'Titanfall_2'),
(110, 'Adventure', 'The_Day_Before'),
(111, 'FPS-Shooter', 'The_Day_Before'),
(112, 'Horror', 'The_Day_Before'),
(113, 'Strategy', 'The_Day_Before'),
(114, 'Survivals', 'The_Day_Before'),
(115, 'Adventure', 'S.T.A.L.K.E.R._2___Heart_of_Chornobyl'),
(116, 'FPS-Shooter', 'S.T.A.L.K.E.R._2___Heart_of_Chornobyl'),
(117, 'Strategy', 'S.T.A.L.K.E.R._2___Heart_of_Chornobyl'),
(118, 'Survivals', 'S.T.A.L.K.E.R._2___Heart_of_Chornobyl'),
(122, 'Adventure', 'Hollow_Knight___Silksong'),
(123, 'Casual', 'Hollow_Knight___Silksong'),
(124, 'Family', 'Hollow_Knight___Silksong'),
(125, 'Horror', 'Hollow_Knight___Silksong'),
(140, 'Adventure', 'A_Plague_Tale_Requiem'),
(141, 'Casual', 'A_Plague_Tale_Requiem'),
(142, 'Horror', 'A_Plague_Tale_Requiem'),
(143, 'Strategy', 'A_Plague_Tale_Requiem'),
(144, 'Survivals', 'A_Plague_Tale_Requiem'),
(150, 'Adventure', 'The_Division_2'),
(151, 'Casual', 'The_Division_2'),
(152, 'PvP', 'The_Division_2'),
(153, 'Strategy', 'The_Division_2'),
(154, 'Survivals', 'The_Division_2');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `game`
--

CREATE TABLE `game` (
  `gameId` varchar(45) NOT NULL,
  `price` float NOT NULL,
  `description` varchar(1000) NOT NULL,
  `about` varchar(2000) DEFAULT NULL,
  `icon` varchar(100) NOT NULL,
  `banner` varchar(200) NOT NULL,
  `gameplay` varchar(100) NOT NULL,
  `release_date` datetime NOT NULL,
  `developer` varchar(45) NOT NULL,
  `developer_web` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `sale` int(11) DEFAULT 0,
  `number_sold` int(100) DEFAULT NULL,
  `top_page` bit(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `game`
--

INSERT INTO `game` (`gameId`, `price`, `description`, `about`, `icon`, `banner`, `gameplay`, `release_date`, `developer`, `developer_web`, `created_at`, `sale`, `number_sold`, `top_page`) VALUES
('A_Plague_Tale_Requiem', 59.99, 'Embark on a heartrending journey into a brutal, breathtaking world, and discover the cost of saving those you love in a desperate struggle for survival. Strike from the shadows or unleash hell with a variety of weapons, tools and unearthly powers.', 'Far across the sea, an island calls…\r\nEmbark on a heartrending journey into a brutal, breathtaking world twisted by supernatural forces.\r\nAfter escaping their devastated homeland, Amicia and Hugo travel far south, to new regions and vibrant cities. There, they attempt to start a new life and control Hugo’s curse.\r\nBut, when Hugo’s powers reawaken, death and destruction return in a flood of devouring rats. Forced to flee once more, the siblings place their hopes in a prophesized island that may hold the key to saving Hugo.\r\nDiscover the cost of saving those you love in a desperate struggle for survival. Strike from the shadows or unleash hell, overcoming foes and challenges with a variety of weapons, tools and unearthly powers.', 'img/game/A_Plague_Tale_Requiem/icon/icon.jpg', 'img/game/A_Plague_Tale_Requiem/banner/banner.jpg', 'img/game/A_Plague_Tale_Requiem/gameplay/', '2020-10-18 00:00:00', 'Focus Entertaiment', 'https://www.focus-entmt.com', '2022-10-23 13:44:32', 0, NULL, b'1'),
('Dying_Light_2_Stay_Human', 45.99, 'The virus won and civilization has fallen back to the Dark Ages. The City, one of the last human settlements, is on the brink of collapse. Use your agility and combat skills to survive, and reshape the world. Your choices matter.', 'Over twenty years ago in Harran, we fought the virus—and lost. Now, we’re losing again. The City, one of the last large human settlements, is torn by conflict. Civilization has fallen back into the Dark Ages. And yet, we still have hope.\r\nYou are a wanderer with the power to change the fate of The City. But your exceptional abilities come at a price. Haunted by memories you cannot decipher, you set out to learn the truth… and find yourself in a combat zone. Hone your skills, as to defeat your enemies and make allies, you’ll need both fists and wits. Unravel the dark secrets behind the wielders of power, choose sides and decide your destiny. But wherever your actions take you, there is one thing you can never forget—stay human.', 'img/game/Dying_Light_2_Stay_Human/icon/icon.jpg', 'img/game/Dying_Light_2_Stay_Human/banner/banner.jpg', 'img/game/Dying_Light_2_Stay_Human/gameplay/', '2023-02-20 00:00:00', 'Techland', 'https://store.epicgames.com/en-US/p/dying-light-2-stay-human', '2022-10-31 03:19:30', 50, NULL, b'0'),
('Goat_Simulator_3', 19.99, 'Pilgor’s baaack! Gather your herd and venture forth into Goat Simulator 3; an all-new, totally realistic, multiplayer sandbox farmyard experience. Pre-purchase now and get your own jiggly in-game Pre-Udder!', 'Pilgor’s baaack!\r\nOrder the Standard Edition early and you’ll get your very own in-game Pre-udder. It’s exactly what you think it is.\r\nGather your herd and venture forth into Goat Simulator 3; an all-new, totally realistic, sandbox farmyard experience that puts you back in the hooves of no one is favourite female protagonist.\r\nThat’s right – we’re doing this again. The baa has been raised, and Pilgor is joined by other goats too. You can invite up to three friends in local or online co-op, create carnage as a team, or compete in mini-games and then not be friends anymore.\r\nGet ready for another round of udder mayhem. Lick, headbutt, and ruin your way through a brand new open world in the biggest waste of your time since Goat Simulator! We won’t tell you how to play (except in the tutorial), but merely provide the means to be the goats of your dreams.', 'img/game/Goat_Simulator_3/icon/icon.jpg', 'img/game/Goat_Simulator_3/banner/banner.jpg', 'img/game/Goat_Simulator_3/gameplay/', '2022-11-18 00:00:00', 'Coffee Stain North AB', 'https://store.epicgames.com/en-US/p/goat-simulator-3', '2022-10-31 03:57:02', NULL, NULL, b'0'),
('Hollow_Knight___Silksong', 16.99, 'Discover a vast, haunted kingdom in Hollow Knight: Silksong! The sequel to the award winning action-adventure. Explore, fight and survive as you ascend to the peak of a land ruled by silk and song.', 'Play as Hornet, princess-protector of Hallownest, and adventure through a whole new kingdom ruled by silk and song! Captured and brought to this unfamiliar world, Hornet must battle foes and solve mysteries as she ascends on a deadly pilgrimage to the kingdom’s peak.\r\nHollow Knight: Silksong is the epic sequel to Hollow Knight, the award winning action-adventure. As the lethal hunter Hornet, journey to all-new lands, discover new powers, battle vast hordes of bugs and beasts and uncover ancient secrets tied to your nature and your past.', 'img/game/Hollow_Knight___Silksong/icon/icon.jpg', 'img/game/Hollow_Knight___Silksong/banner/banner.jpg', 'img/game/Hollow_Knight___Silksong/gameplay/', '2023-02-05 00:00:00', 'Team Cherry', 'https://store.steampowered.com/app/1030300/Hollow_Knight_Silksong/', '2022-11-12 12:37:55', 0, NULL, b'0'),
('JARS', 9.99, 'JARS is a strategy game featuring puzzles and elements of tower defense. Join Victor in his spooky yet endearing world and prepare for a quest to uncover the secrets of his family’s basement. Will you save the world or get grounded by mother?', 'Join Victor\'s bizarre adventure in the family basement. Discover enormous minions and dangerous nasties hidden in the shadows of the cellar. What shady secrets are buried under the house? Why are some pages in this mysterious book missing? And why the heck is there a Dracula in the basement?! The fate of the world rests on Victor\'s skinny shoulders! Will you save the world or get grounded by mother?', 'img/game/JARS/icon/icon.jpg', 'img/game/JARS/banner/banner.jpg', 'img/game/JARS/gameplay/', '2021-10-20 00:00:00', 'Mousetrap Games', 'https://store.epicgames.com/en-US/p/jars-e39063', '2022-10-24 03:30:27', 10, NULL, b'0'),
('PC_Building_Simulator_2', 39.99, 'Grow your empire as you learn to repair, build and customize PCs at the next level. Experience deeper simulation, an upgraded career mode, and powerful new customization features. Use realistic parts from 40+ hardware brands to bring your ultimate PC to life.', 'Start your own PC business in Career Mode, and learn to build and repair PCs. Upgrade your workshop and unlock new tools and equipment as you level up. Turn a profit while going the extra mile for your customers, and watch the positive reviews roll in. Unleash your creativity in Free Build Mode. Select from 1200+ components to plan and execute a powerhouse PC. Install upgraded water cooling, overclock your CPU & GPU, and tweak RAM timings to turbocharge performance. Use 3DMark and Cinebench benchmarks to test and optimize your design. Add sequenced RGB lighting, spray paint and stickers to create the ultimate custom rig. Customize your workshop with new walls, floors, posters and furniture, and make your PC building space your own. Go deeper into your builds with realistic hardware and software simulation. Optimize cooling with the Fan Control app and thermal camera, track power consumption with Power Monitor, and add custom water blocks to GPUs, CPUs, RAM and Motherboards. 18 original tracks that span the genres from French Touch, UK Garage and Grime to Indie Rock, soulful Dub and Synth Pop ballads. Gavin employs original vintage synths and studio equipment throughout the record, elevating the production beyond the purely digital, and creating an album with warmth, character and retro charm. Get the official soundtrack on Bandcamp', 'img/game/PC_Building_Simulator_2/icon/icon.jpg', '', 'img/game/PC_Building_Simulator_2/gameplay/', '2022-10-12 00:00:00', 'Spiral House Ltd', 'https://store.epicgames.com/en-US/p/pc-building-simulator-2', '2022-10-24 03:07:01', 30, 10, b'0'),
('Railway_Empire', 49.99, 'In Railway Empire, you will create an elaborate and wide-ranging rail network, purchase over 40 different trains modelled in extraordinary detail, and buy or build railway stations, factories and attractions to keep your network ahead of the competition.', NULL, 'img/game/Railway_Empire/icon/icon.jpg', '', 'img/game/Railway_Empire/gameplay/', '2020-09-10 00:00:00', 'Gaming Minds Studios', 'https://store.epicgames.com/en-US/p/railway-empire', '2022-10-24 03:44:49', 70, NULL, b'0'),
('Rocket_League', 19.99, 'Rocket League is a high-powered hybrid of arcade-style soccer and vehicular mayhem with easy-to-understand controls and fluid, physics-driven competition.', 'Download and compete in the high-octane hybrid of arcade-style soccer and vehicular mayhem! customize your car, hit the field, and compete in one of the most critically acclaimed sports games of all time! Download and take your shot!\r\nHit the field by yourself or with friends in 1v1, 2v2, and 3v3 Online Modes, or enjoy Extra Modes like Rumble, Snow Day, or Hoops. Unlock items in Rocket Pass, climb the Competitive Ranks, compete in Competitive Tournaments, complete Challenges, enjoy cross-platform progression and more! The field is waiting. Take your shot!', 'img/game/Rocket_League/icon/icon.jpg', 'img/game/Rocket_League/banner/banner.jpg', 'img/game/Rocket_League/gameplay/', '2018-02-10 00:00:00', 'Psyonix LLC', 'https://store.epicgames.com/en-US/p/rocket-league', '2022-10-31 03:41:00', NULL, NULL, b'0'),
('S.T.A.L.K.E.R._2___Heart_of_Chornobyl', 49.99, 'Discover the vast Chornobyl Exclusion Zone full of dangerous enemies, deadly anomalies and powerful artifacts. Unveil your own epic story as you make your way to the Heart of Chornobyl. Make your choices wisely, as they will determine your fate in the end.', 'Chornobyl Exclusion Zone has changed dramatically after the second massive explosion in year 2006. Violent mutants, deadly anomalies, warring factions have made the Zone a very tough place to survive. Nevertheless, artifacts of unbelievable value attracted many people called S.T.A.L.K.E.R.s, who entered the Zone for their own risk striving to make a fortune out of it or even to find the Truth concealed in the Heart of Chornobyl.\r\nTake over a role of the lone stalker and explore photorealistic seamless open world in a 64-km² radioactive zone with a variety of environments that reveal post-apocalyptic atmosphere from different angles. Make your way through the Zone to define your destiny as you choose your paths within highly branching epic story.', 'img/game/S.T.A.L.K.E.R._2___Heart_of_Chornobyl/icon/icon.jpg', 'img/game/S.T.A.L.K.E.R._2___Heart_of_Chornobyl/banner/banner.jpg', 'img/game/S.T.A.L.K.E.R._2___Heart_of_Chornobyl/gameplay/', '2023-12-01 00:00:00', 'GSC Game World', 'https://store.steampowered.com/app/1643320/STALKER_2_Heart_of_Chornobyl/', '2022-11-12 10:48:40', 0, NULL, b'0'),
('Source_of_Madness', 29.99, 'Source of Madness is a side-scrolling dark action roguelite set in a twisted Lovecraftian inspired world powered by procedural generation and AI machine learning. Take on the role of a new Acolyte as they embark on a nightmarish odyssey.', NULL, 'img/game/Source_of_Madness/icon/icon.jpg', '', 'img/game/Source_of_Madness/gameplay/', '2020-10-11 00:00:00', 'Carry Castle', 'https://store.epicgames.com/en-US/p/source-of-madness-287857', '2022-10-24 03:35:33', 20, 23, b'0'),
('SuchArt___Genius_Artist_Simulator', 19.99, 'A unique artist sim game with realistic paint mixing, physics and numerous painting tools. Upgrade and customize your studio, complete tasks, sell and expose art, buy instruments and get famous!', NULL, 'img/game/SuchArt___Genius_Artist_Simulator/icon/icon.jpg', '', 'img/game/SuchArt___Genius_Artist_Simulator/gameplay/', '2022-10-10 00:00:00', 'Voolgi', 'https://store.epicgames.com/en-US/p/suchart-genius-artist-simulator', '2022-10-24 03:20:45', 20, 34, b'0'),
('The_Day_Before', 49.99, 'The Day Before is an open-world MMO survival set in a deadly, post-pandemic America overrun by flesh-hungry infected and survivors killing each other for food, weapons, and cars.', 'SURVIVE AT ALL COSTS\r\nSearch abandoned vehicles, houses, and skyscrapers as you scavenge for resources.\r\nENTER PLACES NO ONE ELSE DARES\r\nCrush the infected and other players with realistic weapons, becoming a legend of the new world.\r\nDISCOVER THE VAST POST-PANDEMIC WORLD\r\nExplore beautiful yet dangerous places with stunningly detailed vehicles.\r\nFIND A COLONY OF SURVIVORS\r\nTake part in the restoration of the former society before it is too late. In the survivor colony, you can sell your loot and communicate safely with other players.', 'img/game/The_Day_Before/icon/icon.jpg', 'img/game/The_Day_Before/banner/banner.jpg', 'img/game/The_Day_Before/gameplay/', '2023-03-01 00:00:00', 'FNTASTIC', 'https://store.steampowered.com/app/1372880/The_Day_Before/', '2022-11-12 09:38:38', NULL, NULL, b'0'),
('The_Division_2', 49.99, 'Tom Clancys The Division 2 is a shooter RPG with campaign, co-op, and PvP modes that offers more variety in missions and challenges, new progression systems with unique twists and surprises, and fresh innovations that offer new ways to play.', NULL, 'img/game/The_Division_2/icon/icon.jpg', 'img/game/The_Division_2/banner/banner.jpg', 'img/game/The_Division_2/gameplay/', '2020-10-16 00:00:00', 'Ubisoft', NULL, '2022-11-14 16:16:47', 0, NULL, b'1'),
('Titanfall_2', 49.99, 'Respawn Entertainment gives you the most advanced titan technology in its new, single player campaign & multiplayer experience. Combine & conquer with new titans & pilots, deadlier weapons, & customization and progression systems that help you and your titan flow as one unstoppable killing force.', 'Call down your Titan and get ready for an exhilarating first-person shooter experience in Titanfall® 2! The sequel introduces a new single player campaign that explores the bond between Pilot and Titan. Or blast your way through an even more innovative and intense multiplayer experience - featuring 6 new Titans, deadly new Pilot abilities, expanded customization, new maps, modes, and much more.', 'img/game/Titanfall_2/icon/icon.jpg', 'img/game/Titanfall_2/banner/banner.jpg', 'img/game/Titanfall_2/gameplay/', '2016-10-28 00:00:00', 'Respawn Entertainment', 'https://store.steampowered.com/app/1237970/Titanfall_2/', '2022-11-04 04:34:41', NULL, NULL, b'1'),
('Uncharted___Legacy_of_Thieves', 59.99, 'Play as Nathan Drake and Chloe Frazer in their own standalone adventures as they confront their pasts and forge their own legacies. This game includes the critically acclaimed single-player stories from both UNCHARTED 4: A Thief’s End and UNCHARTED: The Lost Legacy.', '', 'img/game/Uncharted___Legacy_of_Thieves/icon/icon.jpg', 'img/game/Uncharted___Legacy_of_Thieves/banner/banner.jpg', 'img/game/Uncharted___Legacy_of_Thieves/gameplay/', '2022-10-19 00:00:00', 'Naghty Dog', 'https://www.naughtydog.com/', '2022-10-23 15:44:36', 0, NULL, b'1'),
('Unrail', 19.99, 'Unrailed! is a co-op multiplayer game where you have to work together with your friends to build a train track across endless procedurally generated worlds. Master random encounters with its inhabitants, upgrade your train and keep it from derailing!', 'Gather resources and craft tracks to extend your railroad to prevent your train from reaching the end. But watch out - there is only one tool of each type. Co-operation and co-ordination of your team is essential to survive this increasingly challenging journey!\r\nEvery world is unique! You and your team will have to master ever new challenges to stay on track!', 'img/game/Unrail/icon/icon.jpg', 'img/game/Unrail/banner/banner.jpg', 'img/game/Unrail/gameplay/', '2020-09-24 00:00:00', 'Daedalic Entertainment', 'https://store.steampowered.com/franchise/daedalic?snr=1_5_9__408', '2022-10-26 07:59:58', 20, 45, b'0'),
('War_Thunder', 0, 'War Thunder is the most comprehensive free-to-play, cross-platform, MMO military game dedicated to aviation, armoured vehicles, and naval craft, from the early 20th century to the most advanced modern combat units. Join now and take part in major battles on land, in the air, and at sea.', NULL, 'img/game/War_Thunder/icon/icon.jpg', 'img/game/War_Thunder/banner/banner.jpg', 'img/game/War_Thunder/gameplay/', '2013-08-15 00:00:00', 'Gaijin Entertaiment', 'https://gaijin.net/', '2022-10-23 15:56:06', 0, 12, b'1');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `payments`
--

CREATE TABLE `payments` (
  `cardId` int(11) NOT NULL,
  `userID` varchar(255) NOT NULL,
  `card_number` varchar(255) NOT NULL,
  `cvv` int(3) NOT NULL,
  `payment_date` char(5) NOT NULL,
  `card_name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `payments`
--

INSERT INTO `payments` (`cardId`, `userID`, `card_number`, `cvv`, `payment_date`, `card_name`, `image`, `updated_at`, `created_at`) VALUES
(2, 'hoan9999', '0', 0, '0', 'vnpay', 'assets_home/images/vnpay.png', '2022-11-14 05:42:18', '2022-11-14 05:42:18'),
(3, 'hoan9999', '6556766456564576', 123, '12/24', 'visa', 'assets_home/images/visa.jpg', '2022-11-14 05:47:28', '2022-11-14 05:47:16');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `rating`
--

CREATE TABLE `rating` (
  `userID` varchar(255) NOT NULL,
  `gameId` varchar(45) NOT NULL,
  `message` varchar(1000) DEFAULT NULL,
  `star` float NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `rating`
--

INSERT INTO `rating` (`userID`, `gameId`, `message`, `star`, `created_at`, `updated_at`) VALUES
('hoan9999', 'Hollow_Knight___Silksong', NULL, 5, '2022-11-14 15:48:22', NULL),
('hoan9999', 'Source_of_Madness', NULL, 5, '2022-11-14 16:03:43', '2022-11-14 16:03:43'),
('LocNguyen24', 'A_Plague_Tale_Requiem', NULL, 4.8, '2022-11-14 16:04:34', '2022-11-14 16:04:34'),
('LocNguyen24', 'JARS', 'Very good game', 4.3, '2022-11-02 12:53:12', '2022-11-02 12:53:12'),
('MrLoc', 'JARS', 'Good', 4, '2022-11-14 12:00:18', '2022-11-14 12:00:18'),
('MrLoc', 'Rocket_League', NULL, 4.5, '2022-11-14 16:04:03', '2022-11-14 16:04:03');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `store_cart`
--

CREATE TABLE `store_cart` (
  `userID` varchar(255) NOT NULL,
  `gameId` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `store_cart`
--

INSERT INTO `store_cart` (`userID`, `gameId`) VALUES
('hoan9999', 'Goat_Simulator_3'),
('hoan9999', 'Hollow_Knight___Silksong');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `system_requirement`
--

CREATE TABLE `system_requirement` (
  `sysId` int(11) NOT NULL,
  `gameId` varchar(45) NOT NULL,
  `version` varchar(45) NOT NULL,
  `os` varchar(45) NOT NULL,
  `storage` varchar(45) NOT NULL,
  `ram` varchar(45) NOT NULL,
  `chip` varchar(100) NOT NULL,
  `graphic` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `system_requirement`
--

INSERT INTO `system_requirement` (`sysId`, `gameId`, `version`, `os`, `storage`, `ram`, `chip`, `graphic`) VALUES
(9, 'Uncharted___Legacy_of_Thieves', '10', 'window', '100GB', '12GB', 'i7', '1050Ti'),
(10, 'War_Thunder', '10', 'Window', '50GB', '12GB', 'i7', '1080Ti'),
(11, 'PC_Building_Simulator_2', '10', 'window', '40GB', '12 GB', 'Intel Core i5-10400 or AMD Ryzen 5 3600', 'NVIDIA GeForce GTX 1660 Super, 6 GB or AMD Radeon RX 5600 XT, 6 GB'),
(12, 'SuchArt___Genius_Artist_Simulator', '64-Bit Windows 7/8/10', 'window', '20GB', '8GB', 'Intel Core i5-2400 @ 3.1 GHz or AMD FX-6300 @ 3.5 GHz or equivalent', 'GTX 770 2GB or higher'),
(13, 'JARS', '10', 'window', '10GB', '4GB', 'Intel i5 +', 'Nvidia GTX 460 / Radeon HD 7800 or better'),
(14, 'Source_of_Madness', '7+', 'window', '1GB', '4GB', 'Intel i5+', 'Nvidia GTX 460 / Radeon HD 7800 or better'),
(15, 'Railway_Empire', '7, 8, 10 64bit', 'window', '7GB', '8GB', 'Intel Core i5 2400s @ 2.5 GHz or AMD FX 4100 @ 3.6', 'nVidia GeForce GTX 680 or AMD Radeon HD7970 or better (2048MB VRAM or more, with Shader Model 5.0)'),
(16, 'PC_Building_Simulator_2', '15', 'mac', '20GB', '8Gb', 'A15', '1050Ti'),
(17, 'A_Plague_Tale_Requiem', '10', 'window', '200GB', '12GB', 'i5', '1050Ti'),
(19, 'Unrail', '7', 'window', '2GB', '2GB', '2Ghz', 'R7 200'),
(20, 'Unrail', '15', 'mac', '2GB', '2GB', 'A12', 'Apple GPU'),
(21, 'Dying_Light_2_Stay_Human', '10', 'window', '60GB', '16GB', 'Intel Core i3-9100 / AMD Ryzen 3 2300X', 'NVIDIA® GeForce RTX™ 2060 6GB or AMD RX Vega 56 8GB or newer.'),
(22, 'Rocket_League', '7', 'window', '20GB', '6GB', 'i5', '1060Ti'),
(23, 'Goat_Simulator_3', '10', 'window', '50GB', '12GB', 'i5 9400F', '1070Ti 8GB'),
(24, 'Titanfall_2', 'Win 7/8/8.1/10 64bit', 'window', '45GB', '16GB', 'Intel Core i5-6600 or equivalent', 'NVIDIA Geforce GTX 1060 6GB or AMD Radeon RX 480 8GB'),
(25, 'Titanfall_2', 'Apple OS 16', 'mac', '45GB', '16GB', 'M1', '1060Ti or higher'),
(26, 'Titanfall_2', 'S, 360, One', 'xbox', '45GB', '16GB', 'N/A', 'N/A'),
(27, 'The_Day_Before', '64-bit Windows 7, Windows 8.1, Windows 10', 'window', '75GB', '16GB', 'Intel Core i5-6600K / AMD Ryzen 5 1600', 'NVIDIA GeForce GTX 1060 6GB / AMD Radeon RX 580 4GB'),
(28, 'S.T.A.L.K.E.R._2___Heart_of_Chornobyl', 'Windows 10', 'window', '150 GB available space SSD', '16GB', 'AMD Ryzen 7 3700X / Intel Core i7-9700K', 'AMD Radeon RX 5700 XT 8GB / NVIDIA GeForce RTX 2070 SUPER 8GB / NVIDIA GeForce GTX 1080 Ti 11GB'),
(29, 'Hollow_Knight___Silksong', '64bit 7, 8.1, 10', 'window', '12GB', '8GB', 'Intel core i5+', 'GeForce GTX 560+'),
(31, 'The_Division_2', '10 64bit', 'window', '75GB', '12GB', 'i7+', '1050Ti');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `type`
--

CREATE TABLE `type` (
  `type` varchar(45) NOT NULL,
  `image` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `type`
--

INSERT INTO `type` (`type`, `image`) VALUES
('3D', 'img/type/type_3D.jpg'),
('Adventure', 'img/type/type_Adventure.jpg'),
('Anime', 'img/type/type_Anime.jpg'),
('Casual', 'img/type/type_Casual.jpg'),
('Family', 'img/type/type_Family.jpg'),
('FPS-Shooter', 'img/type/type_FPS-Shooter.jpg'),
('Horror', 'img/type/type_Horror.jpg'),
('MOBA', 'img/type/type_MOBA.jpg'),
('PvP', 'img/type/type_PvP.jpg'),
('Simulation', 'img/type/type_Simulation.jpg'),
('Sports', 'img/type/type_Sports.jpg'),
('Strategy', 'img/type/type_Strategy.jpg'),
('Survivals', 'img/type/type_Survivals.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `userID` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `status` bit(1) DEFAULT b'1',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `image` varchar(255) DEFAULT 'assets_home\images\useravatar\avatardefault.jpg',
  `blocked_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`userID`, `username`, `email`, `password`, `remember_token`, `status`, `created_at`, `updated_at`, `image`, `blocked_at`) VALUES
('hoan9999', 'phuoc hoan', 'phuochoan1999qng@gmail.com', '$2y$10$7cXwNuVcqI.2A9knmXvHH.aDxlyxMTKD87T2h358pU53kDTi5EkbS', NULL, b'1', '2022-11-14 05:38:51', '2022-11-14 13:01:10', 'assets_home/images/useravatar/avatardefault.jpg', NULL),
('LocNguyen24', 'loc', 'loclongla1999@gmail.com', '$2y$10$8X8m1KExFPl9ajMjt7ASP.ubQI4Gu8MZcPPL6O05LRMRwWUDnqXwi', NULL, b'1', '2022-10-27 07:28:54', '2022-10-27 07:28:54', NULL, NULL),
('MrLoc', 'MrLoc', 'loc@gmail.com', '$2y$10$qxh18VFX2tXfZzKyTVo/uOTJN4JlfXHyWbtzHD.eoHFgEO39a.5PW', NULL, b'1', '2022-11-14 04:59:46', '2022-11-14 04:59:46', 'assets_home/images/useravatar/avatardefault.jpg', NULL);

--
-- Chỉ mục cho các bảng đã đổ
--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
--
-- Chỉ mục cho bảng `account_admin`
--
ALTER TABLE `account_admin`
  ADD PRIMARY KEY (`adminId`);

--
-- Chỉ mục cho bảng `cart_details`
--
ALTER TABLE `cart_details`
  ADD PRIMARY KEY (`cart_details_id`),
  ADD KEY `cartId` (`cartId`,`gameId`),
  ADD KEY `game_cart` (`gameId`);

--
-- Chỉ mục cho bảng `cart_master`
--
ALTER TABLE `cart_master`
  ADD PRIMARY KEY (`cartId`),
  ADD KEY `name_cart` (`userID`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category`),
  ADD KEY `game_cate` (`gameId`),
  ADD KEY `type_cate` (`type`);

--
-- Chỉ mục cho bảng `game`
--
ALTER TABLE `game`
  ADD PRIMARY KEY (`gameId`);

--
-- Chỉ mục cho bảng `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`cardId`),
  ADD KEY `user_payment` (`userID`);

--
-- Chỉ mục cho bảng `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`userID`,`gameId`),
  ADD KEY `game_cmt` (`gameId`);

--
-- Chỉ mục cho bảng `store_cart`
--
ALTER TABLE `store_cart`
  ADD PRIMARY KEY (`userID`,`gameId`),
  ADD KEY `user_name` (`userID`),
  ADD KEY `game_name` (`gameId`);

--
-- Chỉ mục cho bảng `system_requirement`
--
ALTER TABLE `system_requirement`
  ADD PRIMARY KEY (`sysId`),
  ADD KEY `game_sys_re` (`gameId`);

--
-- Chỉ mục cho bảng `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`type`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `cart_details`
--
ALTER TABLE `cart_details`
  MODIFY `cart_details_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `cart_master`
--
ALTER TABLE `cart_master`
  MODIFY `cartId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=155;

--
-- AUTO_INCREMENT cho bảng `payments`
--
ALTER TABLE `payments`
  MODIFY `cardId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `system_requirement`
--
ALTER TABLE `system_requirement`
  MODIFY `sysId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `cart_details`
--
ALTER TABLE `cart_details`
  ADD CONSTRAINT `cart` FOREIGN KEY (`cartId`) REFERENCES `cart_master` (`cartId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `game_cart` FOREIGN KEY (`gameId`) REFERENCES `game` (`gameId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `cart_master`
--
ALTER TABLE `cart_master`
  ADD CONSTRAINT `name_cart` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `category`
--
ALTER TABLE `category`
  ADD CONSTRAINT `game_cate` FOREIGN KEY (`gameId`) REFERENCES `game` (`gameId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `type_cate` FOREIGN KEY (`type`) REFERENCES `type` (`type`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `user_payment` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `rating`
--
ALTER TABLE `rating`
  ADD CONSTRAINT `game_cmt` FOREIGN KEY (`gameId`) REFERENCES `game` (`gameId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_cmt` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `store_cart`
--
ALTER TABLE `store_cart`
  ADD CONSTRAINT `game_name` FOREIGN KEY (`gameId`) REFERENCES `game` (`gameId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_name` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `system_requirement`
--
ALTER TABLE `system_requirement`
  ADD CONSTRAINT `game_sys_re` FOREIGN KEY (`gameId`) REFERENCES `game` (`gameId`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
