-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 24, 2025 at 09:14 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `booksforyou_chattagram`
--

-- --------------------------------------------------------

--
-- Table structure for table `book_info`
--

CREATE TABLE `book_info` (
  `bid` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `category` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `book_qty` int(11) NOT NULL DEFAULT 0,
  `image` varchar(100) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `book_info`
--

INSERT INTO `book_info` (`bid`, `name`, `title`, `price`, `category`, `description`, `book_qty`, `image`, `date`) VALUES
(72, 'Atomic Habits', 'James C', 699, 'knowledge', 'Her imaginative childrens books feature many natural animals that can be found in the British countryside', 20, 'ah.png', '2023-02-23 13:14:49'),
(81, 'Darwin', 'Darwin D.', 469, 'knowledge', 'Beatrix Potter ', 20, 'sddxc.jpg', '2023-02-24 10:54:38'),
(83, 'Capture The Crown ', 'Jennifer E.', 633, 'Magic', 'From the author of The Witch Boy trilogy comes a graphic novel about family, romance, and first love', 20, 'gf.jpg', '2023-02-24 10:56:14'),
(84, 'Crush The King ', 'Jennifer L', 566, 'knowledge', 'These stories are carefully chosen to highlight the power of the gods and how sometimes the demons challenge it. The stories are narrated in a way that would be suitable for children and ensures small moral lessons in each story. Children will learn that there are no short cuts to success, and our confidence is our biggest super power.', 20, 'uuh.jpg', '2023-02-24 10:58:12'),
(85, 'Stephen King', 'Carre', 545, 'Adventure', 'The political struggle in the ancient city of Hastinapur is escalating as the Pandavas and Kauravas are on the verge of war. But its the rise of the demonic Asura King, Mahendrasura, that most troubles Krishna. Fueled by vengeance, Mahendrasura is not looking to just win a battle. Instead, he in search of dark powers to eradicate humanity once and for all.', 20, 'FGGH.jpg', '2023-02-24 10:58:53'),
(86, 'The Winter King', 'Christ C', 65, 'knowledge', 'Trapped in an era beyond his wildest dreams, Abhay has managed to land right in the middle of all these conflicts. Along with Krishna and Suryaputra Karna, the responsibility to save the past, the present, and the future of mankind has fallen on Abhays shoulders. And for that, he must unlock ancient puzzles, encounter mythical beasts - and confront his terrifying destiny!', 20, 'ghfh.jpg', '2023-02-24 10:59:29'),
(88, 'Ray Bearer', 'Jordan I.', 999, 'Magic', 'Once upon a time there were four little Rabbits, and their names were -- ', 20, 'jjj.jpg', '2023-02-24 11:05:00'),
(89, 'The Sea Girl', 'Adriene ', 699, '', 'From the authovel about family, romance, and first love. ', 20, 'jhj.jfif', '2023-02-24 11:07:51'),
(90, 'Love Boat', 'Abile Hing', 499, 'Adventure', 'Feel the power of strength and banding together come alive through the celebration of our very own female animal characters in Lili the Lioness & Friends. Written, designed and produced in-house, this impactful read highlights the importance of community ', 20, 'jkkj.jpg', '2023-02-24 11:25:52'),
(93, 'Seventh Sun', ' Lani Forbes', 560, 'Magic', 'The terrible Asuras are pretty notorious. These demons have decided to spread chaos across the world and win over heaven. Here comes an Asura trying to kidnap mother Earth', 20, 'kjljl.jpg', '2023-02-24 11:55:58'),
(94, 'Sunrise', 'Jhon D', 800, 'Magic', 'Charming but venturesome college student, Abhay Sharma, always thought the Mahabharata was just a story; until he set out to explore the secrets of an ancient temple – and finds himself transported five thousand years back in time!', 20, 'hujh.jpg', '2023-02-24 11:57:02'),
(95, 'Batman Knight', 'DC', 789, 'Adventure', 'This collection of adorable stories for children show us how the Asuras tried to defeat the Devas, and how the gods ultimately won over. These stories will entertain, educate and provide healthy enjoyment to the readers.', 20, 'kjkjl.jpg', '2023-02-24 11:59:54'),
(96, 'Last Blood ', 'Alexander G', 500, '', 'The political struggle in the ancient city of Hastinapur is escalating as the Pandavas and Kauravas are on the verge of war. But its the rise of the demonic Asura King, Mahendrasura, that most troubles Krishna. Fueled by vengeance, Mahendrasura is not looking to just win a battle. Instead, he in search of dark powers to eradicate humanity once and for all.', 20, 'hjhj.jpg', '2023-02-24 12:12:30'),
(98, 'Programming With C++', 'by John R Hubbard', 350, 'Academic', 'Product details of Programming With C++ by John R Hubbard\r\nBook Name: Programming With C++\r\nAuthor: John R Hubbard\r\nPublishers: Mcgraw Hill Education\r\nPrint: Bangladeshi print\r\nPage:600\r\nQuality: paper back\r\nISBN:9780070144811', 20, 'pcc.png', '2024-11-04 16:08:55'),
(99, 'Java: The Complete R', 'Herbert Schildt ', 425, '', 'The definitive guide to Java programming―thoroughly revised for Java SE 21Fully updated for Java SE 21, Java™: The Complete Reference, Thirteenth Edition explains how to develop, compile, debug, and run Java programs. Best-selling programming author Herb Schildt and Dr. Danny Coward cover the entire Java language, including its syntax, keywords, and fundamental programming principles. You’ll also find information on key portions of the Java API library, such as I/O, the Collections Framework, the stream library, and the concurrency utilities. Swing, JavaBeans, and servlets are examined, and numerous examples demonstrate Java in action.Recent additions to the Java platform, such as pattern matching in switch statements, record patterns, sequenced collections and virtual threads are also discussed in detail. Best of all, the book is written in the clear, crisp, uncompromising style that has made Schildt and Coward the choice of millions worldwide.Coverage includes:• Data types, variables, arrays, and operators• Control statements• Classes, objects, and methods• Method overloading and overriding•Inheritance•Interfaces and packages•Exception handling•Multithreaded programming, including virtual threads•Enumerations, autoboxing, and annotations•The I/O classes•Generics•Lambda expressions•Modules•Records•Sealed classes•Text blocks•switch expressions, including with pattern matching•Pattern matching with instance of including with records•String handling•The Collections Framework•Networking•Event handling•AWT•Swing•The Concurrent API•The Stream API•Regular expressions•JavaBeans•Servlets•Much, much more', 20, 'jvc.jpg', '2024-11-04 16:18:34'),
(100, 'Engineering Mathemat', 'Dr. T K V Iyengar, D', 500, 'Adventure', 'This is the Second edition of the book \"Engineering Mathematics Volume-IV (Complex Variables and Fourier Analysis)\".  This text book has been written strictly according to the revised syllabus (R-16) 2016-17 of B. Tech. II Year, First Semester students of Jawaharlal Nehru Technological University, Hyderabad. The treatment of all topics has been made as simple as possible and in some instances with detailed explanation as the book is meant to be understood with a minimum effort on the part of the reader. However, as Mathematics is a subject to be understood and practiced, the students are advised to practice the exercises. ', 20, 'emc.png', '2024-11-04 16:23:46'),
(101, 'Complex Analysis and', 'Luis Barreira , Clau', 399, 'Academic', 'Emphasis is given to the applications of complex analysis to differential equations\r\nProvides a rigorous approach with the right balance between theory and practice\r\nIncludes approximately 200 examples and 200 problems with detailed solutions\r\nIncludes supplementary material: sn.pub/extras', 20, 'cmc.jpg', '2024-11-04 16:25:38');

-- --------------------------------------------------------

--
-- Stand-in structure for view `book_stock_view`
-- (See below for the actual view)
--
CREATE TABLE `book_stock_view` (
`bid` int(100)
,`book_name` varchar(100)
,`initial_qty` int(11)
,`ordered_qty` decimal(42,0)
,`available_qty` decimal(43,0)
);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(100) NOT NULL,
  `book_id` int(20) NOT NULL,
  `user_id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `price` int(20) NOT NULL,
  `image` varchar(200) NOT NULL,
  `quantity` int(25) NOT NULL,
  `total` double(10,2) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `book_id`, `user_id`, `name`, `price`, `image`, `quantity`, `total`, `date`) VALUES
(0, 102, 68, 'Bikash life story', 250, 'WhatsApp I', 1, 250.00, '2025-05-24 01:06:31');

-- --------------------------------------------------------

--
-- Table structure for table `confirm_order`
--

CREATE TABLE `confirm_order` (
  `order_id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `number` int(12) NOT NULL,
  `address` varchar(500) NOT NULL,
  `payment_method` varchar(20) NOT NULL,
  `total_books` varchar(500) NOT NULL,
  `order_date` varchar(100) NOT NULL,
  `payment_status` varchar(100) NOT NULL DEFAULT 'pending',
  `date` varchar(20) NOT NULL,
  `total_price` double(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `confirm_order`
--

INSERT INTO `confirm_order` (`order_id`, `user_id`, `name`, `email`, `number`, `address`, `payment_method`, `total_books`, `order_date`, `payment_status`, `date`, `total_price`) VALUES
(33, 58, 'Rohan Rashid', 'rashidrohan97@gmail.com', 1612181539, 'Rajbari,Dhaka,Bangladesh, Rajbari, Dhaka, Bangladesh - 7700', 'cash on delivery', ' Batman Knight #95,(1) ', '16-Jul-2024', 'pending', '', 789.00),
(34, 58, 'Rohan Rashid', 'rashidrohan97@gmail.com', 1612181539, 'Rajbari,Dhaka,Bangladesh, Rajbari, Dhaka, Bangladesh - 7700', 'cash on delivery', ' Batman Knight #95,(1) ', '04-Nov-2024', 'pending', '', 789.00),
(35, 65, 'Rone', 'sho@gmail.com', 1751572586, 'Rajbari Sadar, Rajbari, Dhaka, Dhaka, Bangladesh - 1268', 'cash on delivery', ' Seventh Sun #93,(1) ', '19-May-2025', 'pending', '', 560.00),
(36, 68, 'ami ami', 'admin@gmail.com', 2147483647, 'Dhanmondi 17, Dhaka, Dhaka, Bangladesh - 1200', 'Bikas', ' Last Blood  #96,(2)  Seventh Sun #93,(3) ', '22-May-2025', 'pending', '22.05.2025', 2680.00),
(37, 68, 'ami ami', 'admin@gmail.com', 2147483647, 'Dhanmondi 17, Dhaka, Dhaka, Bangladesh - 1200', 'cash on delivery', ' Java: The Complete R #99,(5)  Last Blood  #96,(3) ', '22-May-2025', 'pending', '22.05.2025', 3625.00),
(38, 68, 'ami ami', 'admin@gmail.com', 2147483647, 'Dhanmondi 17, Dhaka, Dhaka, Bangladesh - 1200', 'cash on delivery', ' Last Blood  #96,(3) ', '22-May-2025', 'pending', '22.05.2025', 1500.00),
(39, 68, 'ami ami', 'admin@gmail.com', 2147483647, 'Dhanmondi 17, Dhaka, Dhaka, Bangladesh - 1200', 'cash on delivery', ' Last Blood  #96,(3) ', '22-May-2025', 'pending', '22.05.2025', 1500.00),
(40, 68, 'ami ami', 'admin@gmail.com', 2147483647, 'Dhanmondi 17, Dhaka, Dhaka, Bangladesh - 1200', 'cash on delivery', ' Last Blood  #96,(3) ', '22-May-2025', 'pending', '22.05.2025', 1500.00),
(41, 68, 'ami ami', 'admin@gmail.com', 2147483647, 'Dhanmondi 17, Dhaka, Dhaka, Bangladesh - 1200', 'cash on delivery', ' Last Blood  #96,(3) ', '22-May-2025', 'pending', '22.05.2025', 1500.00),
(42, 68, 'ami ami', 'admin@gmail.com', 2147483647, 'Dhanmondi 17, Dhaka, Dhaka, Bangladesh - 1200', 'cash on delivery', ' Last Blood  #96,(3) ', '22-May-2025', 'pending', '22.05.2025', 1500.00),
(43, 68, 'mmmmmmmmmmmmmmm', 'admin@gmail.com', 2147483647, 'Dhanmondi 17, Dhaka, Dhaka, Bangladesh - 1200', 'cash on delivery', ' Bikash life story #102,(1) ', '22-May-2025', 'cancelled', '', 250.00),
(44, 68, 'uuuuuuu', 'admin@gmail.com', 2147483647, 'Dhanmondi 100000, Dhaka, Dhaka, Bangladesh - 1200', 'cash on delivery', ' lebu #104,(3)  Stephen King #85,(3) ', '22-May-2025', 'completed', '23.05.2025', 1641.00),
(0, 68, 'Shoem', 'jahangirhossainshohagh@gmail.com', 546341633, '1hbjgk, Rajbari, Dhaka, Bangladesh - 7700', 'cash on delivery', ' Java: The Complete R #99,(3) ', '23-May-2025', 'cancelled', '', 1275.00),
(0, 68, 'Shoem', 'm6yeasmin@gmail.com', 2147483647, 'Rajbari Sadar, Rajbari, Dhaka, Bangladesh - 7700', 'cash on delivery', ' Bikash life story #102,(3)  Java: The Complete R #99,(1) ', '23-May-2025', 'pending', '', 1175.00);

-- --------------------------------------------------------

--
-- Table structure for table `msg`
--

CREATE TABLE `msg` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `number` int(20) NOT NULL,
  `msg` text NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(225) NOT NULL,
  `user_id` int(100) NOT NULL,
  `address` varchar(50) NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL,
  `pincode` int(6) NOT NULL,
  `book` varchar(50) NOT NULL,
  `unit_price` double(10,2) NOT NULL,
  `quantity` int(10) NOT NULL,
  `sub_total` double(10,2) NOT NULL,
  `payment_status` varchar(100) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users_info`
--

CREATE TABLE `users_info` (
  `Id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `surname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `user_type` varchar(20) NOT NULL DEFAULT 'user',
  `branch` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users_info`
--

INSERT INTO `users_info` (`Id`, `name`, `surname`, `email`, `password`, `user_type`, `branch`) VALUES
(56, 'admin', 'admin', 'admin@gmail.com', 'admin1234', 'Admin', ''),
(58, 'Rohan', 'Rashid', 'rohan@gmail.com', '@rohan', 'User', ''),
(60, 'Arnob', '', 'arnob@gmail.com', 'arnob1234', 'user', ''),
(61, 'Rone', '', 'rone@gmail.com', 'rone1234', 'user', ''),
(62, 'Imran', '', 'imran@gmail.com', 'imran1234', 'user', ''),
(63, 'Bikash', '', 'bikash@gmail.com', 'bikash1234', 'user', ''),
(64, 'Rohan', '', 'rohan@gmail.com', 'rohan1234', 'user', ''),
(65, 'sss', 'sss', 'sho@gmail.com', '111', 'User', 'Rajshahi'),
(66, 'ss', 'ss', 's@gmail.com', '111', 'User', 'Dhaka'),
(67, 'j', 'j', 'j@gmail.com', '111', 'User', 'Chattagram'),
(68, 'dhaka', 'dhaka', 'dhaka@gmail.com', '111', 'User', 'Dhaka'),
(69, 'rajshahi', 'rajshahi', 'rajshahi@gmail.com', '111', 'User', 'Rajshahi'),
(70, 'chattagram', 'chattagram', 'chattagram@gmail.com', '111', 'User', 'Chattagram'),
(0, 'yiukyi', 'yuiytiu', 'dgdg@mail.cm', '111', 'User', 'Dhaka');

-- --------------------------------------------------------

--
-- Structure for view `book_stock_view`
--
DROP TABLE IF EXISTS `book_stock_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `book_stock_view`  AS WITH split_books AS (SELECT `co`.`order_id` AS `order_id`, `co`.`payment_status` AS `payment_status`, trim(substring_index(`co`.`total_books`,'  ',1)) AS `book_entry`, trim(substr(`co`.`total_books`,octet_length(substring_index(`co`.`total_books`,'  ',1)) + 3)) AS `rest`, `co`.`total_books` AS `total_books` FROM `confirm_order` AS `co` WHERE `co`.`payment_status` = 'completed' UNION ALL SELECT `split_books`.`order_id` AS `order_id`, `split_books`.`payment_status` AS `payment_status`, trim(substring_index(`split_books`.`rest`,'  ',1)) AS `book_entry`, trim(substr(`split_books`.`rest`,octet_length(substring_index(`split_books`.`rest`,'  ',1)) + 3)), `split_books`.`total_books` AS `total_books` FROM `split_books` WHERE `split_books`.`rest` <> ''), parsed_books AS (SELECT `sb`.`order_id` AS `order_id`, cast(substring_index(substring_index(`sb`.`book_entry`,',(',1),'#',-1) as unsigned) AS `bid`, cast(substring_index(substring_index(`sb`.`book_entry`,'(',-1),')',1) as unsigned) AS `qty` FROM `split_books` AS `sb`) SELECT `b`.`bid` AS `bid`, `b`.`name` AS `book_name`, `b`.`book_qty` AS `initial_qty`, coalesce(sum(`pb`.`qty`),0) AS `ordered_qty`, `b`.`book_qty`- coalesce(sum(`pb`.`qty`),0) AS `available_qty` FROM (`book_info` `b` left join `parsed_books` `pb` on(`pb`.`bid` = `b`.`bid`)) GROUP BY `b`.`bid``bid`  ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
