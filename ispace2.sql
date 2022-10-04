-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 02 Oca 2022, 21:10:42
-- Sunucu sürümü: 10.1.38-MariaDB
-- PHP Sürümü: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `ispace2`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `actors`
--

CREATE TABLE `actors` (
  `actor_id` int(11) NOT NULL,
  `actor_name` varchar(50) DEFAULT NULL,
  `actor_surname` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `actors`
--

INSERT INTO `actors` (`actor_id`, `actor_name`, `actor_surname`) VALUES
(5, 'Tom', 'Hanks'),
(6, 'Johnny', 'Depp'),
(7, 'Leonardo ', 'DiCaprio'),
(10, 'Jake ', 'Gyllenhaal'),
(11, 'Scarlett ', 'Johansson'),
(13, 'Meryl ', 'Streep'),
(15, 'Cate ', 'Blanchett'),
(16, 'Halle ', 'Berry'),
(17, 'Julianne ', 'Moore'),
(18, 'Angelina', 'Jolie'),
(19, 'Natalie ', 'Portman'),
(21, 'Gabriel ', 'Macht'),
(24, 'Patrick ', 'J. Adams'),
(26, 'Benedict', 'Cumberbatch'),
(27, 'Martin ', 'Freeman'),
(28, 'Anya ', 'Taylor-Joy'),
(29, 'Chloe ', 'Pirrie'),
(30, 'Thomas ', 'Brodie-Sangster'),
(31, 'Margaret ', 'Qualley'),
(32, 'Nick', ' Robinson'),
(33, 'Rylea Nevaeh ', 'Whittet'),
(34, 'Andie ', 'MacDowell'),
(35, 'Anika Noni', ' Rose'),
(36, 'Jessie ', 'Buckley'),
(37, 'Jared ', 'Harris'),
(38, ' Michiel ', 'Huisman'),
(39, ' Carla ', 'Gugino'),
(40, 'Henry ', 'Thomas'),
(41, ' Elizabeth ', 'Reaser'),
(42, ' Tim', ' Robbins'),
(43, 'Morgan ', 'Freeman'),
(44, ' Brad ', 'Pitt'),
(45, ' Edward', ' Norton');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `artist_list_artwork`
--

CREATE TABLE `artist_list_artwork` (
  `artist_id_artwork` int(11) NOT NULL,
  `artist_name_artwork` varchar(50) DEFAULT NULL,
  `artist_surname_artwork` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `artist_list_artwork`
--

INSERT INTO `artist_list_artwork` (`artist_id_artwork`, `artist_name_artwork`, `artist_surname_artwork`) VALUES
(1, ' Leonardo', ' da Vinci'),
(2, 'Vincent ', 'van Gogh'),
(3, 'Johannes ', 'Vermeer'),
(4, 'Sandro ', 'Botticelli'),
(6, 'Pablo  ', 'Picasso');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `artist_list_music`
--

CREATE TABLE `artist_list_music` (
  `artist_id_music` int(11) NOT NULL,
  `artist_name_music` varchar(50) DEFAULT NULL,
  `artist_surname_music` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `artist_list_music`
--

INSERT INTO `artist_list_music` (`artist_id_music`, `artist_name_music`, `artist_surname_music`) VALUES
(1, 'Coldplay ', NULL),
(2, 'kylie ', 'minogue '),
(3, 'lily ', 'allen'),
(4, 'fun', NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `artworkhasartists`
--

CREATE TABLE `artworkhasartists` (
  `Artwork_id` int(11) NOT NULL,
  `Artist_id_artwork` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `artworkhasartists`
--

INSERT INTO `artworkhasartists` (`Artwork_id`, `Artist_id_artwork`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `artworks`
--

CREATE TABLE `artworks` (
  `artwork_id` int(11) NOT NULL,
  `artwork_title` varchar(100) DEFAULT NULL,
  `artwork_size` varchar(20) DEFAULT NULL,
  `artwork_location` varchar(50) DEFAULT NULL,
  `artwork_period` varchar(50) DEFAULT NULL,
  `artwork_medium` varchar(20) DEFAULT NULL,
  `artwork_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `artworks`
--

INSERT INTO `artworks` (`artwork_id`, `artwork_title`, `artwork_size`, `artwork_location`, `artwork_period`, `artwork_medium`, `artwork_date`) VALUES
(1, 'Mona Lisa', '77x53', 'Louvre Museum', 'Renaissance', 'Painting', '1003-12-06'),
(2, 'The Starry Night', '74x92', 'The Museum of Modern Art', 'Post Impressionism', 'Painting', NULL),
(3, 'Girl with a Pearl Earring', '44x39', 'Mauritshuis', 'Dutch Golden Age', 'Painting', NULL),
(4, 'The Birth of Venus', '1.72x2.78', 'Uffizi Gallery', 'Renaissance', 'Painting', NULL),
(5, 'The Last Supper', '4.6x8.8', 'The Last Supper/Location Santa Maria delle Grazie', 'Renaissance', 'Painting', NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `author`
--

CREATE TABLE `author` (
  `author_id` int(11) NOT NULL,
  `author_name` varchar(20) DEFAULT NULL,
  `author_surname` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `author`
--

INSERT INTO `author` (`author_id`, `author_name`, `author_surname`) VALUES
(1, ' Diana ', 'Gabaldon'),
(2, ' Chloe', ' Gong'),
(3, ' Rebecca', 'Ross'),
(4, ' Dustin ', 'Thao'),
(5, 'Leigh ', 'Bardugo ');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `books`
--

CREATE TABLE `books` (
  `book_id` int(11) NOT NULL,
  `book_name` char(20) DEFAULT NULL,
  `book_genre` varchar(20) DEFAULT NULL,
  `book_goodreads_rating` varchar(10) DEFAULT NULL,
  `book_language` varchar(20) DEFAULT NULL,
  `book_cover` varchar(100) DEFAULT NULL,
  `book_publisher` varchar(20) DEFAULT NULL,
  `book_release_date` date DEFAULT NULL,
  `book_page_number` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `books`
--

INSERT INTO `books` (`book_id`, `book_name`, `book_genre`, `book_goodreads_rating`, `book_language`, `book_cover`, `book_publisher`, `book_release_date`, `book_page_number`) VALUES
(1, ' You\'ve Reached Sam', 'Romance', '4.7', 'English', 'https://www.goodreads.com/book/show/53086843-you-ve-reached-sam', 'Dustin Thao ', '2019-12-15', 324),
(2, 'Dreams Lie Beneath', 'Drama', '4.19', 'English', 'https://www.goodreads.com/book/show/54557816-dreams-lie-beneath', ' Rebecca Ross ', '2018-11-11', 400),
(3, 'Our Violent Ends', 'Horror', '4.3', 'English', 'https://www.goodreads.com/book/show/44084762-our-violent-ends', ' Chloe Gong (', '2013-12-15', 547),
(4, 'Rule of Wolves', 'Sci-Fiction', '4.3', 'English', 'https://www.goodreads.com/book/show/36307674-rule-of-wolves', 'Leigh Bardugo ', '2018-11-11', 239),
(5, 'Go Tell the Bees Tha', 'Fantasy', '4.55', 'English', 'https://www.goodreads.com/book/show/57699848-go-tell-the-bees-that-i-am-gone', 'Diana Gabaldon (', '2020-03-12', 631);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `directors`
--

CREATE TABLE `directors` (
  `director_id` int(11) NOT NULL,
  `director_name` varchar(50) DEFAULT NULL,
  `director_surname` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `directors`
--

INSERT INTO `directors` (`director_id`, `director_name`, `director_surname`) VALUES
(2, 'Greg ', 'Nicotero'),
(5, 'David ', 'Lynch'),
(6, 'Martin ', 'Scorsese'),
(7, 'Steven', ' Soderbergh'),
(9, 'Terrence ', 'Malick'),
(10, 'David ', 'Cronenberg'),
(12, 'Bela', ' Tarr'),
(13, 'Quentin ', 'Tarantino'),
(14, 'Vince ', 'Gilligan'),
(15, 'Terry ', 'McDonough'),
(16, 'Johan ', 'Renck'),
(17, 'Michelle ', 'MacLaren'),
(18, 'Colin ', 'Bucksey'),
(19, 'Michael ', 'Slovis'),
(20, 'Johan ', 'Renck'),
(21, 'Paul ', 'McGuigan'),
(22, 'Mike ', 'Flanagan'),
(23, 'Scott ', 'Frank'),
(24, 'Quyen ', 'Tran'),
(25, 'Guy ', 'Godfree'),
(26, 'Vincent ', 'de Paula'),
(27, ' Frank', ' Darabont'),
(28, ' Steven ', 'Spielberg'),
(29, ' Robert', ' Zemeckis'),
(30, ' Christopher ', 'Nolan');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `episodes`
--

CREATE TABLE `episodes` (
  `episode_id` int(11) NOT NULL,
  `tvSeries_id` int(11) NOT NULL,
  `season_number` int(11) DEFAULT NULL,
  `episode_number` int(11) DEFAULT NULL,
  `episode_duration` int(11) DEFAULT NULL,
  `episode_title` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `episodes`
--

INSERT INTO `episodes` (`episode_id`, `tvSeries_id`, `season_number`, `episode_number`, `episode_duration`, `episode_title`) VALUES
(1, 7, 1, 0, 55, 'Unaired Pilot'),
(3, 7, 1, 1, 88, 'A Study in Pink'),
(5, 7, 1, 2, 89, 'The Blind Banker'),
(6, 7, 1, 3, 89, 'The Great Game'),
(8, 7, 2, 1, 89, 'A Scandal in Belgravia'),
(10, 7, 2, 2, 88, 'The Hounds of Baskerville'),
(12, 7, 2, 3, 88, 'The Reichenbach Fall'),
(13, 7, 3, 1, 88, 'The Empty Hearse'),
(15, 7, 3, 2, 86, 'The Sign of Three'),
(17, 7, 3, 3, 89, 'His Last Vow'),
(19, 7, 4, 0, 89, 'The Abominable Bride'),
(21, 7, 4, 1, 88, 'The Six Thatchers'),
(23, 7, 4, 2, 89, 'The Lying Detective'),
(25, 7, 4, 3, 89, 'The Final Problem'),
(27, 7, 3, 0, 7, 'Many Happy Returns'),
(29, 19, 1, 1, 59, 'Openings'),
(31, 19, 1, 2, 65, 'Exchanges'),
(32, 19, 1, 3, 46, 'Doubled Pawns'),
(33, 19, 1, 4, 49, 'Middle Game'),
(34, 19, 1, 5, 48, 'Fork'),
(35, 19, 1, 6, 60, 'Adjournment'),
(36, 19, 1, 7, 68, 'End Game'),
(38, 15, 1, 1, 50, 'Dollar Store'),
(39, 15, 1, 2, 52, 'Ponies'),
(40, 15, 1, 3, 47, 'Sea Glass'),
(41, 15, 1, 4, 48, 'Cashmere'),
(42, 15, 1, 5, 59, 'Thief'),
(43, 15, 1, 6, 57, 'M'),
(44, 15, 1, 7, 53, 'String Cheese'),
(45, 15, 1, 8, 59, 'Bear Hunt'),
(46, 15, 1, 9, 60, 'Sky Blue'),
(47, 15, 1, 10, 54, 'Maid\r\nSnaps'),
(48, 17, 1, 1, 58, '1:23:45'),
(49, 17, 1, 2, 65, 'Please Remain Calm'),
(50, 17, 1, 3, 65, 'Open Wide, O Earth'),
(51, 17, 1, 4, 67, 'The Happiness of All Mankind'),
(52, 17, 1, 5, 88, 'Chernobyl\r\nVichnaya Pamyat'),
(53, 21, 1, 1, 60, 'Steven Sees a Ghost'),
(54, 21, 1, 2, 51, 'Open Casket'),
(55, 21, 1, 3, 53, 'Touch'),
(56, 21, 1, 4, 53, 'The Twin Thing'),
(57, 21, 1, 5, 70, 'The Bent-Neck Lady'),
(58, 21, 1, 6, 57, 'Two Storms'),
(59, 21, 1, 7, 60, 'Eulogy'),
(60, 21, 1, 8, 43, 'Witness Marks'),
(61, 21, 1, 9, 58, 'Screaming Meemies'),
(62, 21, 1, 10, 71, 'Silence Lay Steadily');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `follow`
--

CREATE TABLE `follow` (
  `follower_id` int(11) NOT NULL,
  `followed_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `follow`
--

INSERT INTO `follow` (`follower_id`, `followed_id`) VALUES
(1, 3),
(1, 4),
(2, 5),
(3, 1),
(3, 4),
(3, 5),
(4, 1),
(4, 3),
(5, 2),
(5, 3);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `genres`
--

CREATE TABLE `genres` (
  `genre_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `genres`
--

INSERT INTO `genres` (`genre_name`) VALUES
(' Mystery '),
('Action'),
('Adventure'),
('Animation'),
('Biography'),
('Comedy'),
('Crime'),
('Drama'),
('Family'),
('Fantasy'),
('History'),
('Horror'),
('Romance'),
('Sci-Fi'),
('Thriller'),
('War');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `listen`
--

CREATE TABLE `listen` (
  `user_id` int(11) NOT NULL,
  `music_id` int(11) NOT NULL,
  `music_like_date` date DEFAULT NULL,
  `music_comment` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `listen`
--

INSERT INTO `listen` (`user_id`, `music_id`, `music_like_date`, `music_comment`) VALUES
(1, 4, '2021-12-05', 'good'),
(2, 1, '2021-12-05', 'good'),
(2, 4, NULL, 'eh'),
(3, 2, '2021-12-05', 'good'),
(4, 6, '2021-12-05', 'good\r\n'),
(5, 1, NULL, 'good'),
(5, 3, '2021-12-05', 'good');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `movies`
--

CREATE TABLE `movies` (
  `movie_title` varchar(100) DEFAULT NULL,
  `movie_language` varchar(20) DEFAULT NULL,
  `movie_video_links` varchar(300) DEFAULT NULL,
  `movie_image` varchar(300) DEFAULT NULL,
  `movie_IMDB_ranking` float DEFAULT NULL,
  `movie_RT_rating` float DEFAULT NULL,
  `movie_id` int(11) NOT NULL,
  `movie_description` varchar(1000) DEFAULT NULL,
  `movie_duration` varchar(20) DEFAULT NULL,
  `movie_releasedate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `movies`
--

INSERT INTO `movies` (`movie_title`, `movie_language`, `movie_video_links`, `movie_image`, `movie_IMDB_ranking`, `movie_RT_rating`, `movie_id`, `movie_description`, `movie_duration`, `movie_releasedate`) VALUES
('Schindler\'s List ', 'English', 'https://www.imdb.com/video/vi1158527769?playlistId=tt0108052&ref_=tt_ov_vi', 'https://www.imdb.com/title/tt0108052/mediaviewer/rm1610023168/', 9, 5, 1, 'In German-occupied Poland during World War II, industrialist Oskar Schindler gradually becomes concerned for his Jewish workforce after witnessing their persecution by the Nazis.', '195', '1993-03-04'),
('The Shawshank Redemption', 'English', 'https://www.imdb.com/video/vi3877612057?playlistId=tt0111161&ref_=tt_pr_ov_vi', 'https://www.imdb.com/title/tt0111161/mediaviewer/rm10105600/?ref_=tt_ov_i', 9.3, 4.7, 2, 'Two imprisoned men bond over a number of years, finding solace and eventual redemption through acts of common decency.', '144', '1994-03-04'),
('Fight Club', 'English', 'https://www.imdb.com/video/vi781228825?playlistId=tt0137523&ref_=tt_ov_vi', 'https://www.imdb.com/title/tt0137523/mediaviewer/rm1412004864/', 8.8, 4.5, 3, 'An insomniac office worker and a devil-may-care soap maker form an underground fight club that evolves into much more', '139', '1999-03-04'),
('Forrest Gump', 'English', 'https://www.imdb.com/video/vi3567517977?playlistId=tt0109830&ref_=tt_pr_ov_vi', 'https://www.imdb.com/title/tt0109830/mediaviewer/rm1954748672/', 8.8, 4.1, 4, 'The presidencies of Kennedy and Johnson, the Vietnam War, the Watergate scandal and other historical events unfold from the perspective of an Alabama man with an IQ of 75, whose only desire is to be reunited with his childhood sweetheart.', '144', '1994-11-11'),
('Inception', 'English', 'https://www.imdb.com/video/vi2959588889?playlistId=tt1375666&ref_=tt_pr_ov_vi', 'https://www.imdb.com/title/tt1375666/mediaviewer/rm3426651392/', 8.8, 4.4, 5, 'A thief who steals corporate secrets through the use of dream-sharing technology is given the inverse task of planting an idea into the mind of a C.E.O., but his tragic past may doom the project and his team to disaster.', '148', '2010-07-30');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `movies_cast`
--

CREATE TABLE `movies_cast` (
  `movie_id` int(11) NOT NULL,
  `actor_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `movies_cast`
--

INSERT INTO `movies_cast` (`movie_id`, `actor_id`) VALUES
(2, 42),
(2, 43),
(3, 44),
(3, 45),
(4, 5),
(5, 7);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `movies_directed_by`
--

CREATE TABLE `movies_directed_by` (
  `movie_id` int(11) NOT NULL,
  `director_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `movies_directed_by`
--

INSERT INTO `movies_directed_by` (`movie_id`, `director_id`) VALUES
(1, 28),
(2, 27),
(3, 5),
(4, 29),
(5, 30);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `movie_genre`
--

CREATE TABLE `movie_genre` (
  `movie_id` int(11) NOT NULL,
  `genre_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `movie_genre`
--

INSERT INTO `movie_genre` (`movie_id`, `genre_name`) VALUES
(1, 'Biography'),
(1, 'Drama'),
(2, 'Drama'),
(2, 'History'),
(3, 'Drama'),
(4, 'Drama'),
(4, 'Romance'),
(5, 'Action'),
(5, 'Adventure'),
(5, 'Sci-Fi');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `music`
--

CREATE TABLE `music` (
  `music_id` int(11) NOT NULL,
  `music_title` varchar(100) DEFAULT NULL,
  `album_name` varchar(20) DEFAULT NULL,
  `music_release_date` date DEFAULT NULL,
  `music_cover_image` varchar(300) DEFAULT NULL,
  `music_preview` varchar(300) DEFAULT NULL,
  `music_link` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `music`
--

INSERT INTO `music` (`music_id`, `music_title`, `album_name`, `music_release_date`, `music_cover_image`, `music_preview`, `music_link`) VALUES
(1, 'can’t get you out of my head', 'Fever', '2001-12-14', 'https://www.google.com/search?q=can%E2%80%99t+get+you+out+of+my+head+album+name&tbm=isch&source=iu&ictx=1&fir=BHS7Wj6_Vc3VXM%252CIGFNgLi69pwixM%252C%252Fg%252F1q5hq5vzh&vet=1&usg=AI4_-kRQsBfMLeg-QqBxYQM67IXMqvyZ8A&sa=X&ved=2ahUKEwiZpJ738Mz0AhWoQvEDHRA-AzwQ_B16BAgNEAE&biw=1280&bih=577&dpr=1.5#imgrc=k', NULL, 'https://www.youtube.com/watch?v=c18441Eh_WE'),
(2, 'Paradise', 'Mylo Xyloto', '2011-10-19', 'https://www.google.com/search?q=coldplay+paradise+album+cover&tbm=isch&source=iu&ictx=1&fir=P8mru4hcO7cmmM%252CorCR3KNlYhXzHM%252C_%253BOX8hFmzk9r6DMM%252CEBCvXPA7u0j1PM%252C_%253BMO-X8mhZ_wsxTM%252Cv6g9thyMVP_LbM%252C_%253BMJ-k5kmgrZJxSM%252C-yTmCFoT5_OhzM%252C_%253B2uSVUzZ5YgUayM%252CDj1HV9HpWULAw', NULL, 'https://www.youtube.com/watch?v=1G4isv_Fylg'),
(3, 'we are young', 'Some Nights', '2014-02-21', 'https://www.google.com/search?q=fun+we+are+young+album+release+date&tbm=isch&source=iu&ictx=1&fir=PH0Tf6e_hAcNuM%252C49qf34ju_lgLsM%252C%252Fm%252F0hht0_z&vet=1&usg=AI4_-kSRASU_OcajBLjvRdhhXEsaxPf3lQ&sa=X&ved=2ahUKEwi4s_HT8cz0AhV4R_EDHWx9DkQQ_B16BAgREAE&biw=1280&bih=577&dpr=1.5#imgrc=PH0Tf6e_hAcNuM', NULL, 'https://www.youtube.com/watch?v=Sv6dMFF_yts'),
(4, 'Smile', 'Alright, Still', '2006-07-13', 'https://www.google.com/search?q=lily+allen+smile+album+release+date&tbm=isch&source=iu&ictx=1&fir=USJHPJRVaibpbM%252C_N1LzC26Jma9zM%252C%252Fm%252F01stct2&vet=1&usg=AI4_-kTh5Bjv-hBels56Ps1B2sxiJHaEkA&sa=X&ved=2ahUKEwjj_L_z8cz0AhVXSvEDHdKSCCQQ_B16BAgSEAE&biw=1280&bih=577&dpr=1.5#imgrc=USJHPJRVaibpbM', NULL, 'https://www.youtube.com/watch?v=0WxDrVUrSvI'),
(5, ' the power of love', 'English Rain', '2013-05-13', 'https://www.google.com/search?q=gabrielle+aplin+the+power+of+love+album+release+date&tbm=isch&source=iu&ictx=1&fir=8k1Hw1KEsK5WpM%252C2FTHUoksSR3eNM%252C%252Fm%252F0vdcyyx&vet=1&usg=AI4_-kSfLZLxXCJquqp0xgA8hrq7-aZtEA&sa=X&ved=2ahUKEwizhfaR8sz0AhWXQvEDHUPHABsQ_B16BAgREAE&biw=1280&bih=577&dpr=1.5#imgr', NULL, 'https://www.youtube.com/watch?v=zNpeK7sDLzE'),
(6, 'viva la vida', 'Viva la Vida or Deat', '2008-08-12', 'https://www.google.com/search?q=coldplay+viva+la+vida+album+release+date&tbm=isch&source=iu&ictx=1&fir=UGk3Nb_TMy7qoM%252CCOenIADLqb8HsM%252C%252Fm%252F03cqqf1&vet=1&usg=AI4_-kROWCb6IdfEqTdDi4ep4srJKVOz-w&sa=X&ved=2ahUKEwiGh9O18sz0AhUgRvEDHaW6BV0Q_B16BAgbEAE&biw=1280&bih=577&dpr=1.5#imgrc=UGk3Nb_TMy', NULL, 'https://www.youtube.com/watch?v=dvgZkm1xWPE');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `musicincludesartists`
--

CREATE TABLE `musicincludesartists` (
  `music_id` int(11) NOT NULL,
  `artist_id_music` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `musicincludesartists`
--

INSERT INTO `musicincludesartists` (`music_id`, `artist_id_music`) VALUES
(1, 2),
(2, 1),
(3, 3),
(3, 4),
(4, 3),
(4, 4),
(6, 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `readbooks`
--

CREATE TABLE `readbooks` (
  `book_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `book_comment` varchar(200) DEFAULT NULL,
  `book_like_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `readbooks`
--

INSERT INTO `readbooks` (`book_id`, `user_id`, `book_comment`, `book_like_date`) VALUES
(1, 5, 'good', '2021-12-05'),
(2, 1, 'good', '2021-12-05'),
(3, 3, 'good', '2021-12-05'),
(4, 2, 'good', '2021-12-05'),
(4, 3, 'good', NULL),
(4, 4, 'good', '2021-12-05');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tvseries_cast`
--

CREATE TABLE `tvseries_cast` (
  `tvSeries_id` int(11) NOT NULL,
  `actor_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `tvseries_cast`
--

INSERT INTO `tvseries_cast` (`tvSeries_id`, `actor_id`) VALUES
(7, 26),
(7, 27),
(15, 31),
(15, 32),
(15, 33),
(15, 34),
(15, 35),
(17, 36),
(17, 37),
(19, 28),
(19, 29),
(19, 30),
(21, 38),
(21, 39),
(21, 40),
(21, 41);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tvseries_genre`
--

CREATE TABLE `tvseries_genre` (
  `tvSeries_id` int(11) NOT NULL,
  `genre_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `tvseries_genre`
--

INSERT INTO `tvseries_genre` (`tvSeries_id`, `genre_name`) VALUES
(7, ' Mystery '),
(7, 'Crime'),
(7, 'Drama'),
(15, 'Drama'),
(17, 'Drama'),
(17, 'History'),
(17, 'Thriller'),
(19, 'Drama'),
(21, ' Mystery '),
(21, 'Drama'),
(21, 'Horror');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tv_series`
--

CREATE TABLE `tv_series` (
  `tvSeries_id` int(11) NOT NULL,
  `tvSeries_name` varchar(100) DEFAULT NULL,
  `tvSeries_total_season` int(11) DEFAULT NULL,
  `tvSeries_total_episode` int(11) DEFAULT NULL,
  `tvSeries_IMDB_rating` int(11) DEFAULT NULL,
  `tvSeries_RT_rating` int(11) DEFAULT NULL,
  `tvSeries_start_date` date DEFAULT NULL,
  `tvSeries_end_date` date DEFAULT NULL,
  `tvSeries_video_link` varchar(300) DEFAULT NULL,
  `tvSeries_language` varchar(20) DEFAULT NULL,
  `tvSeries_description` varchar(1000) DEFAULT NULL,
  `tvSeries_image` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `tv_series`
--

INSERT INTO `tv_series` (`tvSeries_id`, `tvSeries_name`, `tvSeries_total_season`, `tvSeries_total_episode`, `tvSeries_IMDB_rating`, `tvSeries_RT_rating`, `tvSeries_start_date`, `tvSeries_end_date`, `tvSeries_video_link`, `tvSeries_language`, `tvSeries_description`, `tvSeries_image`) VALUES
(7, 'Sherlock', 4, 15, 9, 77, '2010-07-25', '2017-01-17', 'https://www.imdb.com/video/vi1741338137?playlistId=tt1475582&ref_=tt_pr_ov_vi', 'English', 'A modern update finds the famous sleuth and his doctor partner solving crime in 21st century London.', 'https://www.imdb.com/title/tt1475582/mediaviewer/rm1796736512/'),
(15, 'Maid', 1, 10, 9, 87, '2021-10-01', '0000-00-00', 'https://www.imdb.com/video/vi2142946073?playlistId=tt11337908&ref_=tt_pr_ov_vi', 'English', 'After fleeing an abusive relationship, a young mother finds a job cleaning houses as she fights to provide for her child and build them a better future.', 'https://www.imdb.com/title/tt11337908/mediaviewer/rm2355621889/'),
(17, 'Chernobyl', 1, 5, 9, 98, '2019-05-06', '2019-06-03', 'https://www.imdb.com/video/vi3724524825?playlistId=tt7366338&ref_=tt_pr_ov_vi', 'English', 'In April 1986, an explosion at the Chernobyl nuclear power plant in the Union of Soviet Socialist Republics becomes one of the world\'s worst man-made catastrophes.', 'https://www.imdb.com/title/tt7366338/mediaviewer/rm1726585857/'),
(19, 'The Queen\'s Gambit', 1, 7, 9, 94, '2020-10-23', '2020-10-23', 'https://www.imdb.com/video/vi1185857817?playlistId=tt10048342&ref_=tt_pr_ov_vi', 'English', 'Orphaned at the tender age of nine, prodigious introvert Beth Harmon discovers and masters the game of chess in 1960s USA. But child stardom comes at a price.', 'https://www.imdb.com/title/tt10048342/mediaviewer/rm1650697985/'),
(21, 'The Haunting of Hill House', 1, 10, 9, 91, '2018-10-12', '2018-10-12', 'https://www.imdb.com/video/vi2940975897?playlistId=tt6763664&ref_=tt_pr_ov_vi', 'English', 'Flashing between past and present, a fractured family confronts haunting memories of their old home and the terrifying events that drove them from it.', 'https://www.imdb.com/title/tt6763664/mediaviewer/rm890600960/');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tv_series_directed_by`
--

CREATE TABLE `tv_series_directed_by` (
  `director_id` int(11) NOT NULL,
  `tvSeries_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `tv_series_directed_by`
--

INSERT INTO `tv_series_directed_by` (`director_id`, `tvSeries_id`) VALUES
(16, 17),
(21, 7),
(22, 21),
(23, 19),
(24, 15),
(25, 15),
(26, 15);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `login_password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `login_password`) VALUES
(1, 'Burcu', 'burcu@sabanciuniv.edu', '123'),
(2, 'Ali', 'ali@sabanciuniv.edu', '123'),
(3, 'Berna', 'berna@sabanciuniv.edu', '123'),
(4, 'Gonul', 'gonul@sabanciuniv.edu', '123'),
(5, 'Tan', 'tan@sabanciuniv.edu', '123'),
(6, 'Ispace', 'ispace@sabanciuniv.edu', '123');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `viewartwork`
--

CREATE TABLE `viewartwork` (
  `user_id` int(11) NOT NULL,
  `artwork_id` int(11) NOT NULL,
  `artwork_like_date` date DEFAULT NULL,
  `artwork_comment` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `viewartwork`
--

INSERT INTO `viewartwork` (`user_id`, `artwork_id`, `artwork_like_date`, `artwork_comment`) VALUES
(1, 4, '2021-12-05', 'good'),
(2, 1, '2021-12-05', 'good'),
(2, 2, NULL, 'good'),
(3, 3, '2021-12-05', 'good'),
(4, 5, '2021-12-05', 'good'),
(5, 2, '2021-12-05', 'good');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `watch_episode`
--

CREATE TABLE `watch_episode` (
  `user_id` int(11) NOT NULL,
  `episode_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `watch_episode`
--

INSERT INTO `watch_episode` (`user_id`, `episode_id`) VALUES
(1, 1),
(1, 3),
(1, 6),
(1, 8),
(2, 13),
(2, 27),
(2, 33),
(3, 1),
(3, 23),
(3, 53),
(3, 54),
(4, 38),
(4, 39),
(4, 40),
(5, 48),
(5, 49),
(6, 5),
(6, 10);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `watch_movie`
--

CREATE TABLE `watch_movie` (
  `user_id` int(11) NOT NULL,
  `movie_id` int(11) NOT NULL,
  `movie_rate_date` date DEFAULT NULL,
  `movie_comment` varchar(200) DEFAULT NULL,
  `movie_rating` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `watch_movie`
--

INSERT INTO `watch_movie` (`user_id`, `movie_id`, `movie_rate_date`, `movie_comment`, `movie_rating`) VALUES
(1, 2, NULL, 'baddd', 1),
(1, 4, '2021-12-05', 'good', 8.8),
(1, 5, NULL, 'nice', 8),
(2, 1, NULL, '1', 1),
(2, 3, NULL, 'eh', 4),
(2, 4, '2021-12-05', 'good', 8.4),
(3, 2, '2021-12-05', 'good', 9.3),
(3, 3, NULL, 'bad', 5),
(4, 1, '2021-12-05', 'nice', 9),
(5, 1, '2021-12-05', 'good', 9);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `watch_tv_series`
--

CREATE TABLE `watch_tv_series` (
  `user_id` int(11) NOT NULL,
  `tvSeries_id` int(11) NOT NULL,
  `tvSeries_rate_date` date DEFAULT NULL,
  `tvSeries_comment` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rate` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `watch_tv_series`
--

INSERT INTO `watch_tv_series` (`user_id`, `tvSeries_id`, `tvSeries_rate_date`, `tvSeries_comment`, `rate`) VALUES
(1, 17, NULL, 'nice', 5),
(2, 0, NULL, 'good', 8),
(2, 17, NULL, 'eh', 8),
(3, 19, NULL, 'nice', 9),
(6, 0, NULL, 'good', 8),
(6, 15, NULL, 'nice', 7),
(6, 19, NULL, 'good', 8);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `written_by`
--

CREATE TABLE `written_by` (
  `author_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `written_by`
--

INSERT INTO `written_by` (`author_id`, `book_id`) VALUES
(1, 5),
(2, 3),
(3, 2),
(4, 1),
(5, 4);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `actors`
--
ALTER TABLE `actors`
  ADD PRIMARY KEY (`actor_id`);

--
-- Tablo için indeksler `artist_list_artwork`
--
ALTER TABLE `artist_list_artwork`
  ADD PRIMARY KEY (`artist_id_artwork`);

--
-- Tablo için indeksler `artist_list_music`
--
ALTER TABLE `artist_list_music`
  ADD PRIMARY KEY (`artist_id_music`);

--
-- Tablo için indeksler `artworkhasartists`
--
ALTER TABLE `artworkhasartists`
  ADD PRIMARY KEY (`Artwork_id`,`Artist_id_artwork`),
  ADD KEY `Artist_id_artwork` (`Artist_id_artwork`);

--
-- Tablo için indeksler `artworks`
--
ALTER TABLE `artworks`
  ADD PRIMARY KEY (`artwork_id`);

--
-- Tablo için indeksler `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`author_id`);

--
-- Tablo için indeksler `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`book_id`);

--
-- Tablo için indeksler `directors`
--
ALTER TABLE `directors`
  ADD PRIMARY KEY (`director_id`);

--
-- Tablo için indeksler `episodes`
--
ALTER TABLE `episodes`
  ADD PRIMARY KEY (`episode_id`),
  ADD KEY `tvSeries_id` (`tvSeries_id`);

--
-- Tablo için indeksler `follow`
--
ALTER TABLE `follow`
  ADD PRIMARY KEY (`follower_id`,`followed_id`),
  ADD KEY `followed_id` (`followed_id`);

--
-- Tablo için indeksler `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`genre_name`);

--
-- Tablo için indeksler `listen`
--
ALTER TABLE `listen`
  ADD PRIMARY KEY (`user_id`,`music_id`),
  ADD KEY `music_id` (`music_id`);

--
-- Tablo için indeksler `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`movie_id`);

--
-- Tablo için indeksler `movies_cast`
--
ALTER TABLE `movies_cast`
  ADD PRIMARY KEY (`movie_id`,`actor_id`),
  ADD KEY `actor_id` (`actor_id`);

--
-- Tablo için indeksler `movies_directed_by`
--
ALTER TABLE `movies_directed_by`
  ADD PRIMARY KEY (`movie_id`,`director_id`),
  ADD KEY `director_id` (`director_id`);

--
-- Tablo için indeksler `movie_genre`
--
ALTER TABLE `movie_genre`
  ADD PRIMARY KEY (`movie_id`,`genre_name`),
  ADD KEY `genre_name` (`genre_name`);

--
-- Tablo için indeksler `music`
--
ALTER TABLE `music`
  ADD PRIMARY KEY (`music_id`);

--
-- Tablo için indeksler `musicincludesartists`
--
ALTER TABLE `musicincludesartists`
  ADD PRIMARY KEY (`music_id`,`artist_id_music`),
  ADD KEY `artist_id_music` (`artist_id_music`);

--
-- Tablo için indeksler `readbooks`
--
ALTER TABLE `readbooks`
  ADD PRIMARY KEY (`book_id`,`user_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Tablo için indeksler `tvseries_cast`
--
ALTER TABLE `tvseries_cast`
  ADD PRIMARY KEY (`tvSeries_id`,`actor_id`),
  ADD KEY `actor_id` (`actor_id`);

--
-- Tablo için indeksler `tvseries_genre`
--
ALTER TABLE `tvseries_genre`
  ADD PRIMARY KEY (`tvSeries_id`,`genre_name`),
  ADD KEY `genre_name` (`genre_name`);

--
-- Tablo için indeksler `tv_series`
--
ALTER TABLE `tv_series`
  ADD PRIMARY KEY (`tvSeries_id`);

--
-- Tablo için indeksler `tv_series_directed_by`
--
ALTER TABLE `tv_series_directed_by`
  ADD PRIMARY KEY (`director_id`,`tvSeries_id`),
  ADD KEY `tvSeries_id` (`tvSeries_id`);

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Tablo için indeksler `viewartwork`
--
ALTER TABLE `viewartwork`
  ADD PRIMARY KEY (`user_id`,`artwork_id`),
  ADD KEY `artwork_id` (`artwork_id`);

--
-- Tablo için indeksler `watch_episode`
--
ALTER TABLE `watch_episode`
  ADD PRIMARY KEY (`user_id`,`episode_id`),
  ADD KEY `episode_id` (`episode_id`);

--
-- Tablo için indeksler `watch_movie`
--
ALTER TABLE `watch_movie`
  ADD PRIMARY KEY (`user_id`,`movie_id`),
  ADD KEY `movie_id` (`movie_id`);

--
-- Tablo için indeksler `watch_tv_series`
--
ALTER TABLE `watch_tv_series`
  ADD PRIMARY KEY (`user_id`,`tvSeries_id`);

--
-- Tablo için indeksler `written_by`
--
ALTER TABLE `written_by`
  ADD PRIMARY KEY (`author_id`,`book_id`),
  ADD KEY `book_id` (`book_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `actors`
--
ALTER TABLE `actors`
  MODIFY `actor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- Tablo için AUTO_INCREMENT değeri `artist_list_artwork`
--
ALTER TABLE `artist_list_artwork`
  MODIFY `artist_id_artwork` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Tablo için AUTO_INCREMENT değeri `artist_list_music`
--
ALTER TABLE `artist_list_music`
  MODIFY `artist_id_music` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Tablo için AUTO_INCREMENT değeri `artworks`
--
ALTER TABLE `artworks`
  MODIFY `artwork_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Tablo için AUTO_INCREMENT değeri `author`
--
ALTER TABLE `author`
  MODIFY `author_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Tablo için AUTO_INCREMENT değeri `books`
--
ALTER TABLE `books`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Tablo için AUTO_INCREMENT değeri `directors`
--
ALTER TABLE `directors`
  MODIFY `director_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Tablo için AUTO_INCREMENT değeri `episodes`
--
ALTER TABLE `episodes`
  MODIFY `episode_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- Tablo için AUTO_INCREMENT değeri `movies`
--
ALTER TABLE `movies`
  MODIFY `movie_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Tablo için AUTO_INCREMENT değeri `music`
--
ALTER TABLE `music`
  MODIFY `music_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Tablo için AUTO_INCREMENT değeri `tv_series`
--
ALTER TABLE `tv_series`
  MODIFY `tvSeries_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `artworkhasartists`
--
ALTER TABLE `artworkhasartists`
  ADD CONSTRAINT `artworkhasartists_ibfk_1` FOREIGN KEY (`Artwork_id`) REFERENCES `artworks` (`artwork_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `artworkhasartists_ibfk_2` FOREIGN KEY (`Artist_id_artwork`) REFERENCES `artist_list_artwork` (`artist_id_artwork`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Tablo kısıtlamaları `episodes`
--
ALTER TABLE `episodes`
  ADD CONSTRAINT `episodes_ibfk_1` FOREIGN KEY (`tvSeries_id`) REFERENCES `tv_series` (`tvSeries_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Tablo kısıtlamaları `follow`
--
ALTER TABLE `follow`
  ADD CONSTRAINT `follow_ibfk_1` FOREIGN KEY (`follower_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `follow_ibfk_2` FOREIGN KEY (`followed_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Tablo kısıtlamaları `listen`
--
ALTER TABLE `listen`
  ADD CONSTRAINT `listen_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `listen_ibfk_2` FOREIGN KEY (`music_id`) REFERENCES `music` (`music_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Tablo kısıtlamaları `movies_cast`
--
ALTER TABLE `movies_cast`
  ADD CONSTRAINT `movies_cast_ibfk_1` FOREIGN KEY (`actor_id`) REFERENCES `actors` (`actor_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `movies_cast_ibfk_2` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`movie_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Tablo kısıtlamaları `movies_directed_by`
--
ALTER TABLE `movies_directed_by`
  ADD CONSTRAINT `movies_directed_by_ibfk_1` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`movie_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `movies_directed_by_ibfk_2` FOREIGN KEY (`director_id`) REFERENCES `directors` (`director_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Tablo kısıtlamaları `movie_genre`
--
ALTER TABLE `movie_genre`
  ADD CONSTRAINT `movie_genre_ibfk_1` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`movie_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `movie_genre_ibfk_2` FOREIGN KEY (`genre_name`) REFERENCES `genres` (`genre_name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Tablo kısıtlamaları `musicincludesartists`
--
ALTER TABLE `musicincludesartists`
  ADD CONSTRAINT `musicincludesartists_ibfk_1` FOREIGN KEY (`music_id`) REFERENCES `music` (`music_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `musicincludesartists_ibfk_2` FOREIGN KEY (`artist_id_music`) REFERENCES `artist_list_music` (`artist_id_music`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Tablo kısıtlamaları `readbooks`
--
ALTER TABLE `readbooks`
  ADD CONSTRAINT `readbooks_ibfk_1` FOREIGN KEY (`book_id`) REFERENCES `books` (`book_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `readbooks_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Tablo kısıtlamaları `tvseries_cast`
--
ALTER TABLE `tvseries_cast`
  ADD CONSTRAINT `tvseries_cast_ibfk_1` FOREIGN KEY (`tvSeries_id`) REFERENCES `tv_series` (`tvSeries_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tvseries_cast_ibfk_2` FOREIGN KEY (`actor_id`) REFERENCES `actors` (`actor_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Tablo kısıtlamaları `tvseries_genre`
--
ALTER TABLE `tvseries_genre`
  ADD CONSTRAINT `tvseries_genre_ibfk_1` FOREIGN KEY (`tvSeries_id`) REFERENCES `tv_series` (`tvSeries_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tvseries_genre_ibfk_2` FOREIGN KEY (`genre_name`) REFERENCES `genres` (`genre_name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Tablo kısıtlamaları `tv_series_directed_by`
--
ALTER TABLE `tv_series_directed_by`
  ADD CONSTRAINT `tv_series_directed_by_ibfk_1` FOREIGN KEY (`director_id`) REFERENCES `directors` (`director_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tv_series_directed_by_ibfk_2` FOREIGN KEY (`tvSeries_id`) REFERENCES `tv_series` (`tvSeries_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Tablo kısıtlamaları `viewartwork`
--
ALTER TABLE `viewartwork`
  ADD CONSTRAINT `viewartwork_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `viewartwork_ibfk_2` FOREIGN KEY (`artwork_id`) REFERENCES `artworks` (`artwork_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Tablo kısıtlamaları `watch_episode`
--
ALTER TABLE `watch_episode`
  ADD CONSTRAINT `watch_episode_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `watch_episode_ibfk_2` FOREIGN KEY (`episode_id`) REFERENCES `episodes` (`episode_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Tablo kısıtlamaları `watch_movie`
--
ALTER TABLE `watch_movie`
  ADD CONSTRAINT `watch_movie_ibfk_1` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`movie_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `watch_movie_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Tablo kısıtlamaları `written_by`
--
ALTER TABLE `written_by`
  ADD CONSTRAINT `written_by_ibfk_1` FOREIGN KEY (`author_id`) REFERENCES `author` (`author_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `written_by_ibfk_2` FOREIGN KEY (`book_id`) REFERENCES `books` (`book_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
