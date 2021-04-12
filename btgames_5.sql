-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 11 Kwi 2021, 18:46
-- Wersja serwera: 10.4.18-MariaDB
-- Wersja PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `btgames`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `gry`
--

CREATE TABLE `gry` (
  `id_gry` int(11) NOT NULL,
  `nazwa_produktu` varchar(100) DEFAULT NULL,
  `ilosc_produktu` int(11) NOT NULL,
  `cena_produktu` decimal(10,2) NOT NULL,
  `opis_produktu` text NOT NULL,
  `Id_producenta` int(11) NOT NULL,
  `rok_produkcji` int(11) NOT NULL,
  `grafika` varchar(150) NOT NULL,
  `wersja` int(11) NOT NULL,
  `pegi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `gry`
--

INSERT INTO `gry` (`id_gry`, `nazwa_produktu`, `ilosc_produktu`, `cena_produktu`, `opis_produktu`, `Id_producenta`, `rok_produkcji`, `grafika`, `wersja`, `pegi`) VALUES
(3, 'Valheim', 100, '71.99', 'A battle-slain warrior, the Valkyries have ferried your soul to Valheim, the tenth Norse world. Besieged by creatures of chaos and ancient enemies of the gods, you are the newest custodian of the primordial purgatory, tasked with slaying Odin’s ancient rivals and bringing order to Valheim.\r\n\r\nYour trials begin at the disarmingly peaceful centre of Valheim, but the gods reward the brave and glory awaits. Venture forth through imposing forests and snow-capped mountains, explore and harvest more valuable materials to craft deadlier weapons, sturdier armor, viking strongholds and outposts. Build a mighty longship and sail the great oceans in search of exotic lands … but be wary of sailing too far...', 4, 2021, 'https://cdn-products.eneba.com/resized-products/KqyA6nfvm1NRSC9AXGGv1Dhun5TuUmihCBX5BMrqOX4_350x200_1x-0.jpeg', 1, 16),
(4, 'Metro Exodus', 100, '169.00', 'The year is 2036.\r\n\r\nA quarter-century after nuclear war devastated the earth, a few thousand survivors still cling to existence beneath the ruins of Moscow, in the tunnels of the Metro.\r\n\r\nThey have struggled against the poisoned elements, fought mutated beasts and paranormal horrors, and suffered the flames of civil war.\r\n\r\nBut now, as Artyom, you must flee the Metro and lead a band of Spartan Rangers on an incredible, continent-spanning journey across post-apocalyptic Russia in search of a new life in the East.\r\n\r\nMetro Exodus is an epic, story-driven first person shooter from 4A Games that blends deadly combat and stealth with exploration and survival horror in one of the most immersive game worlds ever created.\r\n\r\nExplore the Russian wilderness across vast, non-linear levels and follow a thrilling story-line that spans an entire year through spring, summer and autumn to the depths of nuclear winter.\r\n\r\nInspired by the novels of Dmitry Glukhovsky, Metro Exodus continues Artyom’s story in the greatest Metro adventure yet.', 6, 2019, 'https://store-images.s-microsoft.com/image/apps.17469.14629297938323596.ae5a0f66-9aae-4772-9256-436ac917cdc5.6ab1ff65-7480-416d-b264-1ab1903212b1', 1, 16),
(5, 'Forza Horizon 4', 100, '214.99', 'Dynamic seasons change everything at the world’s greatest automotive festival. Go it alone or team up with others to explore beautiful and historic Britain in a shared open world. Collect, modify and drive over 450 cars. Race, stunt, create and explore – choose your own path to become a Horizon Superstar.\r\n\r\n\r\nCollect Over 450 Cars\r\nEnjoy the largest and most diverse Horizon car roster yet, including over 100 licensed manufacturers.\r\n\r\nRace. Stunt. Create. Explore.\r\nIn the new open-ended campaign, everything you do progresses your game.\r\n\r\nExplore a Shared World\r\nReal players populate your world. When time of day, weather and seasons change, everyone playing the game experiences it at the same time.\r\n\r\nExplore Beautiful, Historic Britain\r\nThis is Britain Like You’ve Never Seen it. Discover lakes, valleys, castles, and breathtaking scenery all in spectacular native 4K and HDR.', 5, 2021, 'https://store-images.s-microsoft.com/image/apps.36093.14339303838396367.725ab8dd-f8b7-4a29-a351-45ebd5d66edd.ba2a2523-7f32-4f92-a83d-26097b7b6ca1', 1, 3),
(6, 'Loop Hero', 100, '69.99', 'The Lich has thrown the world into a timeless loop and plunged its inhabitants into never ending chaos. Wield an expanding deck of mystical cards to place enemies, buildings, and terrain along each unique expedition loop for the brave hero. Recover and equip powerful loot for each class of hero for their battles and expand the survivors\' camp to reinforce each adventure through the loop. Unlock new classes, new cards, and devious guardians on your quest to shatter the endless cycle of despair.\r\n\r\nInfinite Adventure: Select from unlockable character classes and deck cards before setting out on each expedition along a randomly generated loop path. No expedition is ever the same as the ones before it.\r\n\r\nPlan Your Struggle: Strategically place building, terrain, and enemy cards along each loop to create your own dangerous path. Find balance between the cards to increase your chances of survival while recovering valuable loot and resources for your camp.\r\n\r\nLoot and Upgrade: Strike down menacing creatures, recover stronger loot to equip on the fly and unlock new perks along the way.\r\n\r\nExpand Your Camp: Turn hard-earned resources into campsite upgrades and gain valuable reinforcements with each completed loop along the expedition path.\r\n\r\nSave the Lost World: Overcome a series of unholy guardian bosses over a grand saga to save the world and break the time loop of the Lich!', 12, 2021, 'https://static-cdn.jtvnw.net/ttv-boxart/Loop%20Hero.jpg', 0, 16),
(7, 'Stronghold: Warlords', 100, '149.99', 'For the first time ever Stronghold: Warlords allows you to recruit, upgrade and command AI lords across the battlefield in the form of in-game ‘Warlords’. Each warlord under your command boosts your strategic prowess with unique perks, characteristics and upgradeable abilities. Put them to work for your industry, fortifying borders, forging weapons or team up for a pincer attack! Each campaign mission, skirmish game and multiplayer battle means a fresh set of warlords to command and a completely new way to play Stronghold.\r\n\r\n\r\n\r\nThe next chapter in Firefly Studios\' real-time strategy series, Stronghold: Warlords is the first game to recreate the castle economies of East Asia. In Warlords players take command of Mongol hordes, imperial warriors and samurai clansmen as they lay siege to Japanese castles and fortified Chinese cities. Besiege historical warlords using new gunpowder-fuelled siege weapons and classic units across 31 campaign missions, multiplayer, skirmish and free build modes.', 8, 2021, 'https://images.gram.pl/game/elzv20190717134248732rlwa.jpg', 1, 16),
(8, 'Baldur\'s Gate 3', 100, '199.00', 'Gather your party, and return to the Forgotten Realms in a tale of fellowship and betrayal, sacrifice and survival, and the lure of absolute power.\r\n\r\nMysterious abilities are awakening inside you, drawn from a Mind Flayer parasite planted in your brain. Resist, and turn darkness against itself. Or embrace corruption, and become ultimate evil.\r\n\r\nFrom the creators of Divinity: Original Sin 2 comes a next-generation RPG, set in the world of Dungeons and Dragons.\r\n\r\nChoose from a wide selection of D&D races and classes, or play as an origin character with a hand-crafted background. Adventure, loot, battle and romance as you journey through the Forgotten Realms and beyond. Play alone, and select your companions carefully, or as a party of up to four in multiplayer.\r\n\r\nAbducted, infected, lost. You are turning into a monster, but as the corruption inside you grows, so does your power. That power may help you to survive, but there will be a price to pay, and more than any ability, the bonds of trust that you build within your party could be your greatest strength. Caught in a conflict between devils, deities, and sinister otherworldly forces, you will determine the fate of the Forgotten Realms together.\r\n\r\nForged with the new Divinity 4.0 engine, Baldur’s Gate 3 gives you unprecedented freedom to explore, experiment, and interact with a world that reacts to your choices. A grand, cinematic narrative brings you closer to your characters than ever before, as you venture through our biggest world yet.', 9, 2020, 'https://britgamer.s3.eu-west-1.amazonaws.com/styles/cover_art/s3/2020-05/baldurs-gate-3-cover.jpg?itok=0QCBxCXl', 1, 16),
(9, 'Little Nightmares II', 100, '125.00', 'Return to a world of charming horror in Little Nightmares II, a suspense adventure game in which you play as Mono, a young boy trapped in a world that has been distorted by the humming transmission of a distant tower.\r\n\r\nWith Six, the girl in the yellow raincoat, as his guide, Mono sets out to discover the dark secrets of The Signal Tower. Their journey won\'t be easy; Mono and Six will face a host of new threats from the terrible residents of this world.\r\n\r\nWill you dare to face this collection of new, little nightmares?', 10, 2021, 'https://upload.wikimedia.org/wikipedia/en/c/c4/Little_Nightmares_Cover_Art.jpg', 1, 16),
(10, 'Cyberpunk 2077', 100, '199.00', 'Cyberpunk 2077 is an open-world, action-adventure story set in Night City, a megalopolis\r\nobsessed with power, glamour and body modification. You play as V, a mercenary outlaw going after a one-of-a-kind implant that is the key to immortality. You can customize your character’s cyberware, skillset and playstyle, and explore a vast city where the choices you make shape the story and the world around you.\r\n\r\nBecome a cyberpunk, an urban mercenary equipped with cybernetic enhancements and build\r\nyour legend on the streets of Night City.\r\n\r\nEnter the massive open world of Night City, a place that sets new standards in terms of visuals, complexity and depth.\r\n\r\nTake the riskiest job of your life and go after a prototype implant that is the key to immortality.', 11, 2020, 'https://store-images.s-microsoft.com/image/apps.20969.63407868131364914.0f6bcae3-6458-450b-bfc3-7cb0553c6674.93e7c9e8-a2e6-4d89-a002-c1aa2cc7cb2a', 1, 18),
(11, 'Ark: Survival Evolved', 100, '179.99', 'As a man or woman stranded naked, freezing and starving on the shores of a mysterious island called ARK, you must hunt, harvest resources, craft items, grow crops, research technologies, and build shelters to withstand the elements. Use your cunning and resources to kill or tame & breed the leviathan dinosaurs and other primeval creatures roaming the land, and team up with or prey on hundreds of other players to survive, dominate... and escape!\r\n\r\n\r\n\r\nDinosaurs, Creatures, & Breeding! -- over 100+ creatures can be tamed using a challenging capture-&-affinity process, involving weakening a feral creature to knock it unconscious, and then nursing it back to health with appropriate food. Once tamed, you can issue commands to your tames, which it may follow depending on how well you’ve tamed and trained it. Tames, which can continue to level-up and consume food, can also carry Inventory and Equipment such as Armor, carry prey back to your settlement depending on their strength, and larger tames can be ridden and directly controlled! Fly a Pterodactyl over the snow-capped mountains, lift allies over enemy walls, race through the jungle with a pack of Raptors, tromp through an enemy base along a gigantic brontosaurus, or chase down prey on the back of a raging T-Rex! Take part in a dynamic ecosystem life-cycle with its own predator & prey hierarchies, where you are just one creature among many species struggling for dominance and survival. Tames can also be mated with the opposite gender, to selectively breed successive generations using a trait system based on recombinant genetic inheritance. This process includes both egg-based incubation and mammalian gestation lifecycles! Or put more simply, raise babies!\r\n', 12, 2017, 'https://image.ceneostatic.pl/data/products/47499702/i-ark-survival-evolved-digital.jpg', 1, 12),
(12, 'Grounded', 100, '107.99', 'The world is a vast, beautiful and dangerous place – especially when you have been shrunk to the size of an ant. Explore, build and survive together in this first person, multiplayer, survival-adventure. Can you thrive alongside the hordes of giant insects, fighting to survive the perils of the backyard?\r\n\r\nExplore this immersive and persistent world, where the insect life reacts to your actions.\r\n\r\nShelter and tools are critical to your survival. Build epic bases to protect you and your stuff from the insects and the elements. Craft weapons, tools, and armor, allowing you to better fight, explore and survive.\r\n\r\nYou can face the backyard alone or together, online, with up to three friends - the choice is yours.\r\n\r\nUncover the secrets lurking in the shadows of Grounded as you freely explore the backyard and progress through its mysterious story.', 13, 2020, 'https://upload.wikimedia.org/wikipedia/en/a/ab/Grounded_game_cover_art.jpg', 1, 7),
(13, 'Hades', 100, '89.99', 'Hades is a god-like rogue-like dungeon crawler that combines the best aspects of Supergiant\'s critically acclaimed titles, including the fast-paced action of Bastion, the rich atmosphere and depth of Transistor, and the character-driven storytelling of Pyre.\r\n\r\nBATTLE OUT OF HELL\r\nAs the immortal Prince of the Underworld, you\'ll wield the powers and mythic weapons of Olympus to break free from the clutches of the god of the dead himself, while growing stronger and unraveling more of the story with each unique escape attempt.\r\n\r\nUNLEASH THE FURY OF OLYMPUS\r\nThe Olympians have your back! Meet Zeus, Athena, Poseidon, and many more, and choose from their dozens of powerful Boons that enhance your abilities. There are thousands of viable character builds to discover as you go.\r\n\r\nBEFRIEND GODS, GHOSTS, AND MONSTERS\r\nA fully-voiced cast of colorful, larger-than-life characters is waiting to meet you! Grow your relationships with them, and experience thousands of unique story events as you learn about what\'s really at stake for this big, dysfunctional family.\r\n\r\nBUILT FOR REPLAYABILITY\r\nNew surprises await each time you delve into the ever-shifting Underworld, whose guardian bosses will remember you. Use the powerful Mirror of Night to grow permanently stronger, and give yourself a leg up the next time you run away from home.\r\n\r\nNOTHING IS IMPOSSIBLE\r\nPermanent upgrades mean you don\'t have to be a god yourself to experience the exciting combat and gripping story. Though, if you happen to be one, crank up the challenge and get ready for some white-knuckle action that will put your well-practiced skills to the test.\r\n\r\nSIGNATURE SUPERGIANT STYLE\r\nThe rich, atmospheric presentation and unique melding of gameplay and narrative that\'s been core to Supergiant\'s games is here in full force: spectacular hand-painted environments and a blood-pumping original score bring the Underworld to life.', 14, 2020, 'https://lh3.googleusercontent.com/sLgvchryv-3IQ3IEX_4n3WlMnqxb5Rz7EhYmFhkig-x7H6m2RNmtlYB5MSqQp8CQ3hm1qttUATW-GbdBFnQxbYPExQ', 1, 16),
(14, 'Among Us', 100, '17.99', 'Play with 4-10 player online or via local WiFi as you attempt to prepare your spaceship for departure, but beware as one or more random players among the Crew are Impostors bent on killing everyone!\r\n\r\nOriginally created as a party game, we recommend playing with friends at a LAN party or online using voice chat. Enjoy cross-platform play between Android, iOS and PC.', 15, 2018, 'https://cdn2.unrealengine.com/egs-amongus-innersloth-s6-1200x1600-675403712.jpg', 0, 7),
(15, 'Grand Theft Auto V', 100, '129.59', 'When a young street hustler, a retired bank robber and a terrifying psychopath find themselves entangled with some of the most frightening and deranged elements of the criminal underworld, the U.S. government and the entertainment industry, they must pull off a series of dangerous heists to survive in a ruthless city in which they can trust nobody, least of all each other.\r\n\r\nGrand Theft Auto V for PC offers players the option to explore the award-winning world of Los Santos and Blaine County in resolutions of up to 4k and beyond, as well as the chance to experience the game running at 60 frames per second.\r\n\r\nThe game offers players a huge range of PC-specific customization options, including over 25 separate configurable settings for texture quality, shaders, tessellation, anti-aliasing and more, as well as support and extensive customization for mouse and keyboard controls. Additional options include a population density slider to control car and pedestrian traffic, as well as dual and triple monitor support, 3D compatibility, and plug-and-play controller support.\r\n\r\nGrand Theft Auto V for PC also includes Grand Theft Auto Online, with support for 30 players and two spectators. Grand Theft Auto Online for PC will include all existing gameplay upgrades and Rockstar-created content released since the launch of Grand Theft Auto Online, including Heists and Adversary modes.\r\n\r\nThe PC version of Grand Theft Auto V and Grand Theft Auto Online features First Person Mode, giving players the chance to explore the incredibly detailed world of Los Santos and Blaine County in an entirely new way.\r\n\r\nGrand Theft Auto V for PC also brings the debut of the Rockstar Editor, a powerful suite of creative tools to quickly and easily capture, edit and share game footage from within Grand Theft Auto V and Grand Theft Auto Online. The Rockstar Editor’s Director Mode allows players the ability to stage their own scenes using prominent story characters, pedestrians, and even animals to bring their vision to life. Along with advanced camera manipulation and editing effects including fast and slow motion, and an array of camera filters, players can add their own music using songs from GTAV radio stations, or dynamically control the intensity of the game’s score. Completed videos can be uploaded directly from the Rockstar Editor to YouTube and the Rockstar Games Social Club for easy sharing.\r\n\r\nSoundtrack artists The Alchemist and Oh No return as hosts of the new radio station, The Lab FM. The station features new and exclusive music from the production duo based on and inspired by the game’s original soundtrack. Collaborating guest artists include Earl Sweatshirt, Freddie Gibbs, Little Dragon, Killer Mike, Sam Herring from Future Islands, and more. Players can also discover Los Santos and Blaine County while enjoying their own music through Self Radio, a new radio station that will host player-created custom soundtracks.', 16, 2015, 'https://www.gtabase.com/igallery/501-600/GTA_V_Official_Cover_Art-524-1920.jpg', 1, 18),
(16, 'The Witcher® 3: Wild Hunt', 100, '99.99', 'The Witcher: Wild Hunt is a story-driven open world RPG set in a visually stunning fantasy universe full of meaningful choices and impactful consequences. In The Witcher, you play as professional monster hunter Geralt of Rivia tasked with finding a child of prophecy in a vast open world rich with merchant cities, pirate islands, dangerous mountain passes, and forgotten caverns to explore.', 11, 2015, 'https://image.ceneostatic.pl/data/products/30285236/i-wiedzmin-3-dziki-gon-digital.jpg', 1, 18),
(17, 'Borderlands 3', 100, '259.90', 'The original shooter-looter returns, packing bazillions of guns and an all-new mayhem-fueled adventure! Blast through new worlds and enemies as one of four brand new Vault Hunters – the ultimate treasure-seeking badasses of the Borderlands, each with deep skill trees, abilities, and customization. Play solo or join with friends to take on insane enemies, score loads of loot and save your home from the most ruthless cult leaders in the galaxy.\r\n\r\nA MAYHEM-FUELED THRILL RIDE\r\nStop the fanatical Calypso Twins from uniting the bandit clans and claiming the galaxy’s ultimate power. Only you, a thrill-seeking Vault Hunter, have the arsenal and allies to take them down.\r\n\r\nYOUR VAULT HUNTER, YOUR PLAYSTYLE\r\nBecome one of four extraordinary Vault Hunters, each with unique abilities, playstyles, deep skill trees, and tons of personalization options. All Vault Hunters are capable of awesome mayhem alone, but together they are unstoppable.\r\n\r\nLOCK, LOAD, AND LOOT\r\nWith bazillions of guns and gadgets, every fight is an opportunity to score new gear. Firearms with self-propelling bullet shields? Check. Rifles that spawn fire-spewing volcanoes? Obviously. Guns that grow legs and chase down enemies while hurling verbal insults? Yeah, got that too.\r\n\r\nNEW BORDERLANDS\r\nDiscover new worlds beyond Pandora, each featuring unique environments to explore and enemies to destroy. Tear through hostile deserts, battle your way across war-torn cityscapes, navigate deadly bayous, and more!\r\n\r\nQUICK & SEAMLESS CO-OP ACTION\r\nPlay with anyone at any time with online co-op, regardless of your level or mission progress.', 17, 2020, 'https://store-images.s-microsoft.com/image/apps.29198.66416288418246547.8db04ed4-6710-424c-b2c7-fc1b8f89e9a2.125b501a-844a-4ec6-86ef-3c46ebf4c698', 1, 18);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `jezyk`
--

CREATE TABLE `jezyk` (
  `id_jezyk` int(11) NOT NULL,
  `jezyk` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `jezyk`
--

INSERT INTO `jezyk` (`id_jezyk`, `jezyk`) VALUES
(1, 'polski'),
(2, 'angielski'),
(3, 'niemiecki');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `jezyk_gry`
--

CREATE TABLE `jezyk_gry` (
  `id_jezyk` int(11) NOT NULL,
  `id_gry` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `jezyk_gry`
--

INSERT INTO `jezyk_gry` (`id_jezyk`, `id_gry`) VALUES
(2, 3),
(3, 3),
(1, 4),
(2, 4),
(3, 4),
(1, 5),
(2, 5),
(3, 5),
(2, 6),
(3, 6),
(1, 7),
(2, 7),
(3, 7),
(1, 8),
(2, 8),
(3, 8),
(1, 9),
(2, 9),
(3, 9),
(1, 10),
(2, 10),
(3, 10),
(1, 11),
(2, 11),
(3, 11),
(1, 12),
(2, 12),
(3, 12),
(1, 13),
(2, 13),
(3, 13),
(1, 14),
(2, 14),
(1, 15),
(2, 15),
(3, 15),
(1, 16),
(2, 16),
(3, 16),
(1, 17),
(2, 17),
(3, 17);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `kategorie`
--

CREATE TABLE `kategorie` (
  `id_kat` int(11) NOT NULL,
  `nazwa` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `kategorie`
--

INSERT INTO `kategorie` (`id_kat`, `nazwa`) VALUES
(3, 'Akcja'),
(4, 'MMO'),
(5, 'Niezależne'),
(6, 'Przygodowe'),
(7, 'Rekreacyjne'),
(8, 'RPG'),
(9, 'Sportowe'),
(10, 'Strategiczne'),
(11, 'Symulatory'),
(12, 'Wyścigowe'),
(13, 'Survival'),
(14, 'Battle Royale'),
(17, 'Horror'),
(18, 'Roguelike');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `kategorie_gry`
--

CREATE TABLE `kategorie_gry` (
  `id_gry` int(11) NOT NULL,
  `id_kat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `kategorie_gry`
--

INSERT INTO `kategorie_gry` (`id_gry`, `id_kat`) VALUES
(3, 3),
(3, 5),
(3, 6),
(3, 8),
(4, 3),
(5, 12),
(6, 5),
(6, 8),
(6, 10),
(7, 10),
(7, 11),
(8, 6),
(8, 8),
(8, 10),
(9, 6),
(9, 17),
(10, 3),
(10, 8),
(11, 3),
(11, 6),
(11, 5),
(11, 4),
(11, 8),
(11, 13),
(12, 3),
(12, 13),
(12, 6),
(13, 3),
(13, 5),
(13, 18),
(13, 8),
(15, 3),
(15, 6),
(14, 7),
(16, 3),
(16, 8),
(16, 6),
(17, 3),
(17, 8);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `konto`
--

CREATE TABLE `konto` (
  `Konto_id` int(11) NOT NULL,
  `Login` varchar(20) NOT NULL,
  `Haslo` varchar(30) NOT NULL,
  `Imie` varchar(20) NOT NULL,
  `Nazwisko` varchar(30) NOT NULL,
  `Adres` text NOT NULL,
  `Telefon` varchar(15) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Uprawnienia` tinyint(1) NOT NULL,
  `zdjecie` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `konto`
--

INSERT INTO `konto` (`Konto_id`, `Login`, `Haslo`, `Imie`, `Nazwisko`, `Adres`, `Telefon`, `Email`, `Uprawnienia`, `zdjecie`) VALUES
(0, 'admin', 'admin', 'admin', 'admin', 'admin', 'admin', 'admin', 2, 'https://thumbs.dreamstime.com/b/admin-ikona-w-modnym-projekta-stylu-odizolowywająca-na-białym-tle-wektorowej-ikony-prosty-i-nowożytny-płaski-symbol-dla-135742404.jpg');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `koszyk`
--

CREATE TABLE `koszyk` (
  `koszyk_id` int(11) NOT NULL,
  `Koszyk_konto_id` int(11) NOT NULL,
  `id_gry` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `producent`
--

CREATE TABLE `producent` (
  `producent_ID` int(11) NOT NULL,
  `producent_nazwa` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `producent`
--

INSERT INTO `producent` (`producent_ID`, `producent_nazwa`) VALUES
(4, ' Iron Gate AB'),
(5, 'Playground Games'),
(6, '4A Games'),
(7, 'Four Quarters'),
(8, 'FireFly Studios'),
(9, 'Larian Studios'),
(10, 'Tarsier Studios'),
(11, 'CD Projekt Red'),
(12, 'Studio Wildcard'),
(13, 'Obsidian Entertainment'),
(14, 'Supergiant Games'),
(15, 'InnerSloth'),
(16, 'Rockstar North'),
(17, 'Gearbox Software');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `zamowienia`
--

CREATE TABLE `zamowienia` (
  `Zamowienie_id` int(11) NOT NULL,
  `nr_zamowienia` int(11) NOT NULL,
  `Zamowienie_konto_id` int(11) NOT NULL,
  `id_gry` int(11) NOT NULL,
  `realizacja` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `gry`
--
ALTER TABLE `gry`
  ADD PRIMARY KEY (`id_gry`);

--
-- Indeksy dla tabeli `jezyk`
--
ALTER TABLE `jezyk`
  ADD PRIMARY KEY (`id_jezyk`);

--
-- Indeksy dla tabeli `jezyk_gry`
--
ALTER TABLE `jezyk_gry`
  ADD KEY `jezyk_gry_ibfk_2` (`id_jezyk`),
  ADD KEY `jezyk_gry_ibfk_1` (`id_gry`);

--
-- Indeksy dla tabeli `kategorie`
--
ALTER TABLE `kategorie`
  ADD PRIMARY KEY (`id_kat`);

--
-- Indeksy dla tabeli `kategorie_gry`
--
ALTER TABLE `kategorie_gry`
  ADD KEY `gry` (`id_gry`),
  ADD KEY `kat` (`id_kat`);

--
-- Indeksy dla tabeli `konto`
--
ALTER TABLE `konto`
  ADD PRIMARY KEY (`Konto_id`);

--
-- Indeksy dla tabeli `koszyk`
--
ALTER TABLE `koszyk`
  ADD PRIMARY KEY (`koszyk_id`),
  ADD KEY `gry` (`id_gry`);

--
-- Indeksy dla tabeli `producent`
--
ALTER TABLE `producent`
  ADD PRIMARY KEY (`producent_ID`);

--
-- Indeksy dla tabeli `zamowienia`
--
ALTER TABLE `zamowienia`
  ADD PRIMARY KEY (`Zamowienie_id`),
  ADD KEY `zamowienia_ibfk_1` (`id_gry`),
  ADD KEY `zamowienia_ibfk_2` (`Zamowienie_konto_id`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `gry`
--
ALTER TABLE `gry`
  MODIFY `id_gry` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT dla tabeli `jezyk`
--
ALTER TABLE `jezyk`
  MODIFY `id_jezyk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT dla tabeli `kategorie`
--
ALTER TABLE `kategorie`
  MODIFY `id_kat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT dla tabeli `konto`
--
ALTER TABLE `konto`
  MODIFY `Konto_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT dla tabeli `koszyk`
--
ALTER TABLE `koszyk`
  MODIFY `koszyk_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT dla tabeli `producent`
--
ALTER TABLE `producent`
  MODIFY `producent_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT dla tabeli `zamowienia`
--
ALTER TABLE `zamowienia`
  MODIFY `Zamowienie_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `jezyk_gry`
--
ALTER TABLE `jezyk_gry`
  ADD CONSTRAINT `jezyk_gry_ibfk_1` FOREIGN KEY (`id_gry`) REFERENCES `gry` (`id_gry`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `jezyk_gry_ibfk_2` FOREIGN KEY (`id_jezyk`) REFERENCES `jezyk` (`id_jezyk`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ograniczenia dla tabeli `kategorie_gry`
--
ALTER TABLE `kategorie_gry`
  ADD CONSTRAINT `kategorie_gry_ibfk_1` FOREIGN KEY (`id_gry`) REFERENCES `gry` (`id_gry`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kategorie_gry_ibfk_2` FOREIGN KEY (`id_kat`) REFERENCES `kategorie` (`id_kat`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ograniczenia dla tabeli `koszyk`
--
ALTER TABLE `koszyk`
  ADD CONSTRAINT `gry` FOREIGN KEY (`id_gry`) REFERENCES `gry` (`id_gry`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ograniczenia dla tabeli `zamowienia`
--
ALTER TABLE `zamowienia`
  ADD CONSTRAINT `zamowienia_ibfk_1` FOREIGN KEY (`id_gry`) REFERENCES `gry` (`id_gry`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `zamowienia_ibfk_2` FOREIGN KEY (`Zamowienie_konto_id`) REFERENCES `konto` (`Konto_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
