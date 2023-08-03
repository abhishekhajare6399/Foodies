-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 18, 2022 at 08:48 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `foodies`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `cateid` int(10) NOT NULL,
  `categories` varchar(50) NOT NULL,
  `image` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `cateid`, `categories`, `image`) VALUES
(1, 56735, 'South Indian Food', 'categories image/south.jpg'),
(2, 13592, 'Chaat Food', 'categories image/chaat.jpg'),
(3, 11421, 'Chinese food', 'categories image/chines.jpg'),
(5, 30142, 'Punjabi Food', 'categories image/punjabi.jpg'),
(6, 83644, 'Thali Food', 'categories image/thali.jpg'),
(8, 94463, 'Pizza Food', 'categories image/bangoli.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `checkout`
--

CREATE TABLE `checkout` (
  `id` int(11) NOT NULL,
  `loginid` int(10) NOT NULL,
  `resid` int(10) NOT NULL,
  `foodid` int(10) NOT NULL,
  `quantity` int(5) NOT NULL,
  `total` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `checkout`
--

INSERT INTO `checkout` (`id`, `loginid`, `resid`, `foodid`, `quantity`, `total`, `date`, `time`) VALUES
(130, 6562583, 868460, 26092, 10, 1000, '2022-11-17', '11:23:39'),
(132, 6562583, 868460, 84445, 4, 320, '2022-11-17', '11:23:48');

-- --------------------------------------------------------

--
-- Table structure for table `district`
--

CREATE TABLE `district` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `country_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `district`
--

INSERT INTO `district` (`id`, `name`, `country_id`) VALUES
(1, 'Nicobar', 1),
(2, 'North and Middle Andaman	', 1),
(3, 'South Andaman', 1),
(4, 'Ananthapur', 2),
(5, 'Chittoor', 2),
(6, 'Cuddapah	', 2),
(7, 'East Godavari', 2),
(8, 'Guntur', 2),
(9, 'Krishna', 2),
(10, 'Kurnool', 2),
(11, 'Nellore', 2),
(12, 'Prakasam', 2),
(13, 'Srikakulam', 2),
(14, 'Visakhapatnam', 2),
(15, 'Vizianagaram', 2),
(16, 'West Godavari	', 2),
(17, 'Changlang', 3),
(18, 'Dibang Valley', 3),
(19, 'East Kameng', 3),
(20, 'East Siang', 3),
(21, 'Kurung Kumey', 3),
(22, 'Lohit', 3),
(23, 'Lower Dibang Valley', 3),
(24, 'Lower Subansiri', 3),
(25, 'Papum Pare', 3),
(26, 'Tawang', 3),
(27, 'Tirap', 3),
(28, 'Upper Siang', 3),
(29, 'Upper Subansiri', 3),
(30, 'West Kameng', 3),
(31, 'West Siang', 3),
(32, 'Barpeta', 4),
(33, 'Bongaigaon', 4),
(34, 'Cachar', 4),
(35, 'Darrang', 4),
(36, 'Dhemaji', 4),
(37, 'Dhubri', 4),
(38, 'Dibrugarh', 4),
(39, 'Goalpara', 4),
(40, 'Golaghat', 4),
(41, 'Hailakandi', 4),
(42, 'Jorhat', 4),
(43, 'Kamrup', 4),
(44, 'Karbi Anglong', 4),
(45, 'Karimganj', 4),
(46, 'Kokrajhar', 4),
(47, 'Lakhimpur', 4),
(48, 'Marigaon', 4),
(49, 'Nagaon', 4),
(50, 'Nalbari', 4),
(51, 'North Cachar Hills', 4),
(52, 'Sibsagar', 4),
(53, 'Sonitpur', 4),
(54, 'Tinsukia', 4),
(55, 'Araria', 5),
(56, 'Arwal', 5),
(57, 'Aurangabad(BH)', 5),
(58, 'Banka', 5),
(59, 'Begusarai', 5),
(60, 'Bhagalpur', 5),
(61, 'Bhojpur', 5),
(62, 'Buxar', 5),
(63, 'Darbhanga', 5),
(64, 'East Champaran', 5),
(65, 'Gaya', 5),
(66, 'Gopalganj', 5),
(67, 'Jamui', 5),
(68, 'Jehanabad', 5),
(69, 'Kaimur (Bhabua)', 5),
(70, 'Katihar', 5),
(71, 'Khagaria', 5),
(72, 'Kishanganj', 5),
(73, 'Lakhisarai', 5),
(74, 'Madhepura', 5),
(75, 'Madhubani', 5),
(76, 'Munger', 5),
(77, 'Muzaffarpur', 5),
(78, 'Nalanda', 5),
(79, 'Nawada', 5),
(80, 'Patna', 5),
(81, 'Purnia', 5),
(82, 'Rohtas', 5),
(83, 'Saharsa', 5),
(84, 'Samastipur', 5),
(85, 'Saran', 5),
(86, 'Sheikhpura', 5),
(87, 'Sheohar', 5),
(88, 'Sitamarhi', 5),
(89, 'Siwan', 5),
(90, 'Supaul', 5),
(91, 'Vaishali', 5),
(92, 'West Champaran', 5),
(93, 'Bastar', 6),
(94, 'Bijapur(CGH)', 6),
(95, 'Bilaspur(CGH)', 6),
(96, 'Dantewada', 6),
(97, 'Dhamtari', 6),
(98, 'Durg', 6),
(99, 'Gariaband', 6),
(100, 'Janjgir-champa', 6),
(101, 'Jashpur', 6),
(102, 'Kanker', 6),
(103, 'Kawardha', 6),
(104, 'Korba', 6),
(105, 'Koriya', 6),
(106, 'Mahasamund', 6),
(107, 'Narayanpur', 6),
(108, 'Raigarh', 6),
(109, 'Raipur', 6),
(110, 'Rajnandgaon', 6),
(111, 'Surguja', 6),
(112, 'Dadra & Nagar Haveli', 10),
(113, 'Chandigarh', 7),
(114, 'Daman', 8),
(115, 'Diu', 8),
(116, 'Central Delhi', 9),
(117, 'East Delhi', 9),
(118, 'New Delhi', 9),
(119, 'North Delhi', 9),
(120, 'North East Delhi', 9),
(121, 'North West Delhi', 9),
(122, 'South Delhi', 9),
(123, 'South West Delhi', 9),
(124, 'West Delhi', 9),
(125, 'North Goa', 11),
(126, 'South Goa', 11),
(127, 'Ahmedabad', 12),
(128, 'Amreli', 12),
(129, 'Anand', 12),
(130, 'Banaskantha', 12),
(131, 'Bharuch', 12),
(132, 'Bhavnagar', 12),
(133, 'Dahod', 12),
(134, 'Gandhi Nagar', 12),
(135, 'Jamnagar', 12),
(136, 'Junagadh', 12),
(137, 'Kachchh', 12),
(138, 'Kheda', 12),
(139, 'Mahesana', 12),
(140, 'Narmada', 12),
(141, 'Navsari', 12),
(142, 'Panch Mahals', 12),
(143, 'Patan', 12),
(144, 'Porbandar', 12),
(145, 'Rajkot', 12),
(146, 'Sabarkantha', 12),
(147, 'Surat', 12),
(148, 'Surendra Nagar', 12),
(149, 'Tapi', 12),
(150, 'The Dangs', 12),
(151, 'Vadodara', 12),
(152, 'Valsad', 12),
(153, 'Bilaspur (HP)', 13),
(154, 'Chamba', 13),
(155, 'Hamirpur(HP)', 13),
(156, 'Kangra', 13),
(157, 'Kinnaur', 13),
(158, 'Kullu', 13),
(159, 'Lahul & Spiti', 13),
(160, 'Mandi', 13),
(161, 'Shimla', 13),
(162, 'Sirmaur', 13),
(163, 'Solan', 13),
(164, 'Una', 13),
(165, 'Ambala', 14),
(166, 'Bhiwani', 14),
(167, 'Faridabad', 14),
(168, 'Fatehabad', 14),
(169, 'Gurgaon', 14),
(170, 'Hisar', 14),
(171, 'Jhajjar', 14),
(172, 'Jind', 14),
(173, 'Kaithal', 14),
(174, 'Karnal', 14),
(175, 'Kurukshetra', 14),
(176, 'Mahendragarh', 14),
(177, 'Panchkula', 14),
(178, 'Panipat', 14),
(179, 'Rewari', 14),
(180, 'Rohtak', 14),
(181, 'Sirsa', 14),
(182, 'Sonipat', 14),
(183, 'Yamuna Nagar', 14),
(184, 'Ananthnag', 15),
(185, 'Bandipur', 15),
(186, 'Baramulla', 15),
(187, 'Budgam', 15),
(188, 'Doda', 15),
(189, 'Jammu', 15),
(190, 'Kargil', 15),
(191, 'Kathua', 15),
(192, 'Kulgam', 15),
(193, 'Kupwara', 15),
(194, 'Leh', 15),
(195, 'Poonch', 15),
(196, 'Pulwama', 15),
(197, 'Rajauri', 15),
(198, 'Reasi', 15),
(199, 'Shopian', 15),
(200, 'Srinagar', 15),
(201, 'Udhampur', 15),
(202, 'Bokaro', 16),
(203, 'Chatra', 16),
(204, 'Deoghar', 16),
(205, 'Dhanbad', 16),
(206, 'Dumka', 16),
(207, 'East Singhbhum', 16),
(208, 'Garhwa', 16),
(209, 'Giridh', 16),
(210, 'Godda', 16),
(211, 'Gumla', 16),
(212, 'Hazaribag', 16),
(213, 'Jamtara', 16),
(214, 'Khunti', 16),
(215, 'Koderma', 16),
(216, 'Latehar', 16),
(217, 'Lohardaga', 16),
(218, 'Pakur', 16),
(219, 'Palamau', 16),
(220, 'Ramgarh', 16),
(221, 'Ranchi', 16),
(222, 'Sahibganj', 16),
(223, 'Seraikela-kharsawan', 16),
(224, 'Simdega', 16),
(225, 'West Singhbhum', 16),
(226, 'Alappuzha', 17),
(227, 'Ernakulam', 17),
(228, 'Idukki', 17),
(229, 'Kannur', 17),
(230, 'Kasargod', 17),
(231, 'Kollam', 17),
(232, 'Kottayam', 17),
(233, 'Kozhikode', 17),
(234, 'Malappuram', 17),
(235, 'Palakkad', 17),
(236, 'Pathanamthitta', 17),
(237, 'Thiruvananthapuram', 17),
(238, 'Thrissur', 17),
(239, 'Wayanad', 17),
(240, 'Bagalkot', 18),
(241, 'Bangalore', 18),
(242, 'Bangalore Rural', 18),
(243, 'Belgaum', 18),
(244, 'Bellary', 18),
(245, 'Bidar', 18),
(246, 'Bijapur(KAR)', 18),
(247, 'Chamrajnagar', 18),
(248, 'Chickmagalur', 18),
(249, 'Chikkaballapur', 18),
(250, 'Chitradurga', 18),
(251, 'Dakshina Kannada', 18),
(252, 'Davangere', 18),
(253, 'Dharwad', 18),
(254, 'Gadag', 18),
(255, 'Gulbarga', 18),
(256, 'Hassan', 18),
(257, 'Haveri', 18),
(258, 'Kodagu', 18),
(259, 'Kolar', 18),
(260, 'Koppal', 18),
(261, 'Mandya', 18),
(262, 'Mysore', 18),
(263, 'Raichur', 18),
(264, 'Ramanagar', 18),
(265, 'Shimoga', 18),
(266, 'Tumkur', 18),
(267, 'Udupi', 18),
(268, 'Uttara Kannada', 18),
(269, 'Yadgir	', 18),
(270, 'Lakshadweep', 19),
(271, 'East Garo Hills', 20),
(272, 'East Khasi Hills', 20),
(273, 'Jaintia Hills', 20),
(274, 'Ri Bhoi', 20),
(275, 'South Garo Hills', 20),
(276, 'West Garo Hills', 20),
(277, 'West Khasi Hills', 20),
(278, 'Ahmednagar', 21),
(279, 'Akola', 21),
(280, 'Amravati', 21),
(281, 'Aurangabad', 21),
(282, 'Beed', 21),
(283, 'Bhandara', 21),
(284, 'Buldhana', 21),
(285, 'Chandrapur', 21),
(286, 'Dhule', 21),
(287, 'Gadchiroli', 21),
(288, 'Gondia', 21),
(289, 'Hingoli', 21),
(290, 'Jalgaon', 21),
(291, 'Jalna', 21),
(292, 'Kolhapur', 21),
(293, 'Latur', 21),
(294, 'Mumbai', 21),
(295, 'Mumbai', 21),
(296, 'Nanded', 21),
(297, 'Nandurbar', 21),
(298, 'Nashik', 21),
(299, 'Osmanabad', 21),
(300, 'Parbhani', 21),
(301, 'Pune', 21),
(302, 'Raigarh(MH)', 21),
(303, 'Ratnagiri', 21),
(304, 'Sangli', 21),
(305, 'Satara', 21),
(306, 'Sindhudurg', 21),
(307, 'Solapur', 21),
(308, 'Thane', 21),
(309, 'Wardha', 21),
(310, 'Washim', 21),
(311, 'Yavatmal', 21),
(312, 'Bishnupur', 22),
(313, 'Chandel', 22),
(314, 'Churachandpur', 22),
(315, 'Imphal East', 22),
(316, 'Imphal West', 22),
(317, 'Senapati', 22),
(318, 'Tamenglong', 22),
(319, 'Thoubal', 22),
(320, 'Ukhrul', 22),
(321, 'Alirajpur', 23),
(322, 'Anuppur', 23),
(323, 'Ashok Nagar', 23),
(324, 'Balaghat', 23),
(325, 'Barwani', 23),
(326, 'Betul', 23),
(327, 'Bhind', 23),
(328, 'Bhopal', 23),
(329, 'Burhanpur', 23),
(330, 'Chhatarpur', 23),
(331, 'Chhindwara', 23),
(332, 'Damoh', 23),
(333, 'Datia', 23),
(334, 'Dewas', 23),
(335, 'Dhar', 23),
(336, 'Dindori', 23),
(337, 'East Nimar', 23),
(338, 'Guna', 23),
(339, 'Gwalior', 23),
(340, 'Harda', 23),
(341, 'Hoshangabad', 23),
(342, 'Indore', 23),
(343, 'Jabalpur', 23),
(344, 'Jhabua', 23),
(345, 'Katni', 23),
(346, 'Khandwa', 23),
(347, 'Khargone', 23),
(348, 'Mandla', 23),
(349, 'Mandsaur', 23),
(350, 'Morena', 23),
(351, 'Narsinghpur', 23),
(352, 'Neemuch', 23),
(353, 'Panna', 23),
(354, 'Raisen', 23),
(355, 'Rajgarh', 23),
(356, 'Ratlam', 23),
(357, 'Rewa', 23),
(358, 'Sagar', 23),
(359, 'Satna', 23),
(360, 'Sehore', 23),
(361, 'Seoni', 23),
(362, 'Shahdol', 23),
(363, 'Shajapur', 23),
(364, 'Sheopur', 23),
(365, 'Shivpuri', 23),
(366, 'Sidhi', 23),
(367, 'Singrauli', 23),
(368, 'Tikamgarh', 23),
(369, 'Ujjain', 23),
(370, 'Umaria', 23),
(371, 'Vidisha', 23),
(372, 'West Nimar', 23),
(373, 'Aizawl', 24),
(374, 'Champhai', 24),
(375, 'Kolasib', 24),
(376, 'Lawngtlai', 24),
(377, 'Lunglei', 24),
(378, 'Mammit', 24),
(379, 'Saiha', 24),
(380, 'Serchhip', 24),
(381, 'Dimapur', 25),
(382, 'Kiphire', 25),
(383, 'Kohima', 25),
(384, 'Longleng', 25),
(385, 'Mokokchung', 25),
(386, 'Mon', 25),
(387, 'Peren', 25),
(388, 'Phek', 25),
(389, 'Tuensang', 25),
(390, 'Wokha', 25),
(391, 'Zunhebotto', 25),
(392, 'Angul', 26),
(393, 'Balangir', 26),
(394, 'Baleswar', 26),
(395, 'Bargarh', 26),
(396, 'Bhadrak', 26),
(397, 'Boudh', 26),
(398, 'Cuttack', 26),
(399, 'Debagarh', 26),
(400, 'Dhenkanal', 26),
(401, 'Gajapati', 26),
(402, 'Ganjam', 26),
(403, 'Jagatsinghapur', 26),
(404, 'Jajapur', 26),
(405, 'Jharsuguda', 26),
(406, 'Kalahandi', 26),
(407, 'Kandhamal', 26),
(408, 'Kendrapara', 26),
(409, 'Kendujhar', 26),
(410, 'Khorda', 26),
(411, 'Koraput', 26),
(412, 'Malkangiri', 26),
(413, 'Mayurbhanj', 26),
(414, 'Nabarangapur', 26),
(415, 'Nayagarh', 26),
(416, 'Nuapada', 26),
(417, 'Puri', 26),
(418, 'Rayagada', 26),
(419, 'Sambalpur', 26),
(420, 'Sonapur', 26),
(421, 'Sundergarh', 26),
(422, 'Amritsar', 27),
(423, 'Barnala', 27),
(424, 'Bathinda', 27),
(425, 'Faridkot', 27),
(426, 'Fatehgarh Sahib', 27),
(427, 'Fazilka', 27),
(428, 'Firozpur', 27),
(429, 'Gurdaspur', 27),
(430, 'Hoshiarpur', 27),
(431, 'Jalandhar', 27),
(432, 'Kapurthala', 27),
(433, 'Ludhiana', 27),
(434, 'Mansa', 27),
(435, 'Moga', 27),
(436, 'Mohali', 27),
(437, 'Muktsar', 27),
(438, 'Nawanshahr', 27),
(439, 'Pathankot', 27),
(440, 'Patiala', 27),
(441, 'Ropar', 27),
(442, 'Rupnagar', 27),
(443, 'Sangrur', 27),
(444, 'Tarn Taran', 27),
(445, 'Karaikal', 28),
(446, 'Mahe', 28),
(447, 'Pondicherry', 28),
(448, 'Ajmer', 29),
(449, 'Alwar', 29),
(450, 'Banswara', 29),
(451, 'Baran', 29),
(452, 'Barmer', 29),
(453, 'Bharatpur', 29),
(454, 'Bhilwara', 29),
(455, 'Bikaner', 29),
(456, 'Bundi', 29),
(457, 'Chittorgarh', 29),
(458, 'Churu', 29),
(459, 'Dausa', 29),
(460, 'Dholpur', 29),
(461, 'Dungarpur', 29),
(462, 'Ganganagar', 29),
(463, 'Hanumangarh', 29),
(464, 'Jaipur', 29),
(465, 'Jaisalmer', 29),
(466, 'Jalor', 29),
(467, 'Jhalawar', 29),
(468, 'Jhujhunu', 29),
(469, 'Jodhpur', 29),
(470, 'Karauli', 29),
(471, 'Kota', 29),
(472, 'Nagaur', 29),
(473, 'Pali', 29),
(474, 'Rajsamand', 29),
(475, 'Sawai Madhopur', 29),
(476, 'Sikar', 29),
(477, 'Sirohi', 29),
(478, 'Tonk', 29),
(479, 'Udaipur', 29),
(480, 'East Sikkim', 30),
(481, 'North Sikkim', 30),
(482, 'South Sikkim', 30),
(483, 'West Sikkim', 30),
(484, 'Ariyalur', 31),
(485, 'Chennai', 31),
(486, 'Coimbatore', 31),
(487, 'Cuddalore', 31),
(488, 'Dharmapuri', 31),
(489, 'Dindigul', 31),
(490, 'Erode', 31),
(491, 'Kanchipuram', 31),
(492, 'Kanyakumari', 31),
(493, 'Karur', 31),
(494, 'Krishnagiri', 31),
(495, 'Madurai', 31),
(496, 'Nagapattinam', 31),
(497, 'Namakkal', 31),
(498, 'Nilgiris', 31),
(499, 'Perambalur', 31),
(500, 'Pudukkottai', 31),
(501, 'Ramanathapuram', 31),
(502, 'Salem', 31),
(503, 'Sivaganga', 31),
(504, 'Thanjavur', 31),
(505, 'Theni', 31),
(506, 'Tiruchirappalli', 31),
(507, 'Tirunelveli', 31),
(508, 'Tiruvallur', 31),
(509, 'Tiruvannamalai', 31),
(510, 'Tiruvarur', 31),
(511, 'Tuticorin', 31),
(512, 'Vellore', 31),
(513, 'Villupuram', 31),
(514, 'Virudhunagar', 31),
(515, 'Dhalai', 32),
(516, 'North Tripura', 32),
(517, 'South Tripura', 32),
(518, 'West Tripura', 32),
(519, 'Almora', 33),
(520, 'Bageshwar', 33),
(521, 'Chamoli', 33),
(522, 'Champawat', 33),
(523, 'Dehradun', 33),
(524, 'Haridwar', 33),
(525, 'Nainital', 33),
(526, 'Pauri Garhwal', 33),
(527, 'Pithoragarh', 33),
(528, 'Rudraprayag', 33),
(529, 'Tehri Garhwal', 33),
(530, 'Udham Singh Nagar', 33),
(531, 'Uttarkashi', 33),
(532, 'Agra', 34),
(533, 'Aligarh', 34),
(534, 'Allahabad', 34),
(535, 'Ambedkar Nagar', 34),
(536, 'Auraiya', 34),
(537, 'Azamgarh', 34),
(538, 'Bagpat', 34),
(539, 'Bahraich', 34),
(540, 'Ballia', 34),
(541, 'Balrampur', 34),
(542, 'Banda', 34),
(543, 'Barabanki', 34),
(544, 'Bareilly', 34),
(545, 'Basti', 34),
(546, 'Bijnor', 34),
(547, 'Budaun', 34),
(548, 'Bulandshahr', 34),
(549, 'Chandauli', 34),
(550, 'Chitrakoot', 34),
(551, 'Deoria', 34),
(552, 'Etah', 34),
(553, 'Etawah', 34),
(554, 'Faizabad', 34),
(555, 'Farrukhabad', 34),
(556, 'Fatehpur', 34),
(557, 'Firozabad', 34),
(558, 'Gautam Buddha Nagar', 34),
(559, 'Ghaziabad', 34),
(560, 'Ghazipur', 34),
(561, 'Gonda', 34),
(562, 'Gorakhpur', 34),
(563, 'Hamirpur', 34),
(564, 'Hardoi', 34),
(565, 'Hathras', 34),
(566, 'Jalaun', 34),
(567, 'Jaunpur', 34),
(568, 'Jhansi', 34),
(569, 'Jyotiba Phule Nagar', 34),
(570, 'Kannauj', 34),
(571, 'Kanpur Dehat', 34),
(572, 'Kanpur Nagar', 34),
(573, 'Kaushambi', 34),
(574, 'Kheri', 34),
(575, 'Kushinagar', 34),
(576, 'Lalitpur', 34),
(577, 'Lucknow', 34),
(578, 'Maharajganj', 34),
(579, 'Mahoba', 34),
(580, 'Mainpuri', 34),
(581, 'Mathura', 34),
(582, 'Mau', 34),
(583, 'Meerut', 34),
(584, 'Mirzapur', 34),
(585, 'Moradabad', 34),
(586, 'Muzaffarnagar', 34),
(587, 'Pilibhit', 34),
(588, 'Pratapgarh', 34),
(589, 'Raebareli	', 34),
(590, 'Rampur', 34),
(591, 'Saharanpur', 34),
(592, 'Sant Kabir Nagar', 34),
(593, 'Sant Ravidas Nagar', 34),
(594, 'Shahjahanpur', 34),
(595, 'Shrawasti', 34),
(596, 'Siddharthnagar', 34),
(597, 'Sitapur', 34),
(598, 'Sonbhadra', 34),
(599, 'Sultanpur', 34),
(600, 'Unnao', 34),
(601, 'Varanasi', 34),
(602, 'Bankura', 35),
(603, 'Bardhaman', 35),
(604, 'Birbhum', 35),
(605, 'Cooch Behar', 35),
(606, 'Darjiling', 35),
(607, 'East Midnapore', 35),
(608, 'Hooghly', 35),
(609, 'Howrah', 35),
(610, 'Jalpaiguri', 35),
(611, 'Kolkata', 35),
(612, 'Malda', 35),
(613, 'Medinipur', 35),
(614, 'Murshidabad', 35),
(615, 'Nadia', 35),
(616, 'North 24 Parganas', 35),
(617, 'North Dinajpur', 35),
(618, 'Puruliya', 35),
(619, 'South 24 Parganas', 35),
(620, 'South Dinajpur', 35),
(621, 'West Midnapore', 35),
(622, 'Adilabad', 36),
(623, 'Hyderabad', 36),
(624, 'K.V.Rangareddy', 36),
(625, 'Karim Nagar', 36),
(626, 'Khammam', 36),
(627, 'Mahabub Nagar', 36),
(628, 'Medak', 36),
(629, 'Nalgonda', 36),
(630, 'Nizamabad', 36),
(631, 'Warangal', 36);

-- --------------------------------------------------------

--
-- Table structure for table `histroy`
--

CREATE TABLE `histroy` (
  `cid` int(11) NOT NULL,
  `orderid` varchar(15) NOT NULL,
  `loginid` int(10) NOT NULL,
  `resid` varchar(50) NOT NULL,
  `foodid` varchar(12) NOT NULL,
  `foodname` varchar(50) NOT NULL,
  `price` varchar(50) NOT NULL,
  `quantity` varchar(100) NOT NULL,
  `discount` varchar(50) NOT NULL,
  `total` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `instruction` varchar(255) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `histroy`
--

INSERT INTO `histroy` (`cid`, `orderid`, `loginid`, `resid`, `foodid`, `foodname`, `price`, `quantity`, `discount`, `total`, `date`, `time`, `instruction`, `status`) VALUES
(1, '5087157566', 6562583, '868460', '13505', 'Misal Pav', '80', '2', '46.8', '160', '2022-11-13', '03:08:37', 'Make Testy and Spicey', 'Delivered'),
(2, '5087157566', 6562583, '868460', '73604', 'Tari Vada Pav', '60', '2', '46.8', '120', '2022-11-13', '03:08:37', 'Make Testy and Spicey', 'Delivered'),
(3, '5087157566', 6562583, '868460', '61702', 'Bhel', '45', '4', '46.8', '180', '2022-11-13', '03:08:37', 'Make Testy and Spicey', 'Delivered'),
(4, '5087157566', 6562583, '868460', '84445', 'Chees Bhel', '80', '4', '46.8', '320', '2022-11-13', '03:08:37', 'Make Testy and Spicey', 'Delivered'),
(5, '4755709355', 6562583, '997508', '39811', 'Singapore Rice', '90', '2', '31.2', '180', '2022-11-13', '03:11:23', 'Make testy add extra dry noodles', 'Delivered'),
(6, '4755709355', 6562583, '997508', '30043', 'Hakka Noodles', '80', '2', '31.2', '160', '2022-11-13', '03:11:23', 'Make testy add extra dry noodles', 'Delivered'),
(7, '4755709355', 6562583, '997508', '22584', 'Noodle Soup', '60', '3', '31.2', '180', '2022-11-13', '03:11:23', 'Make testy add extra dry noodles', 'Delivered'),
(8, '2932818235', 2893186, '868460', '13505', 'Misal Pav', '80', '2', '30.9', '160', '2022-11-13', '03:25:50', 'Make it fast', 'Delivered'),
(9, '2932818235', 2893186, '868460', '61702', 'Bhel', '45', '2', '30.9', '90', '2022-11-13', '03:25:50', 'Make it fast', 'Delivered'),
(10, '2932818235', 2893186, '868460', '13206', 'Suki Bhel', '45', '2', '30.9', '90', '2022-11-13', '03:25:50', 'Make it fast', 'Delivered'),
(11, '2932818235', 2893186, '868460', '94641', 'Pani Puri', '25', '7', '30.9', '175', '2022-11-13', '03:25:50', 'Make it fast', 'Delivered'),
(12, '630204405', 6562583, '868460', '61702', 'Bhel', '45', '2', '7.2', '90', '2022-11-14', '01:39:32', '', 'Cancel'),
(13, '630204405', 6562583, '868460', '13206', 'Suki Bhel', '45', '2', '7.2', '90', '2022-11-14', '01:39:32', '', 'Cancel'),
(14, '1487895169', 6562583, '868460', '13505', 'Misal Pav', '80', '2', '40.2', '160', '2022-11-16', '06:21:46', '', 'Cancel'),
(15, '1487895169', 6562583, '868460', '26092', 'Dahi Misal Pav', '100', '2', '40.2', '200', '2022-11-16', '06:21:46', '', 'Cancel'),
(16, '1487895169', 6562583, '868460', '84445', 'Chees Bhel', '80', '2', '40.2', '160', '2022-11-16', '06:21:46', '', 'Cancel'),
(17, '1487895169', 6562583, '868460', '78069', 'Ragada Kachori', '50', '3', '40.2', '150', '2022-11-16', '06:21:46', '', 'Cancel'),
(18, '8830587555', 6562583, '868460', '26092', 'Dahi Misal Pav', '100', '10', '105.6', '1000', '2022-11-17', '11:25:14', 'Make Food Testy And Give extra Dahi And 30 Extra Pav.', 'Delivered'),
(19, '8830587555', 6562583, '868460', '84445', 'Chees Bhel', '80', '4', '105.6', '320', '2022-11-17', '11:25:14', 'Make Food Testy And Give extra Dahi And 30 Extra Pav.', 'Delivered');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `resid` int(10) NOT NULL,
  `foodid` int(10) NOT NULL,
  `foodname` varchar(50) NOT NULL,
  `price` varchar(5) NOT NULL,
  `description` varchar(500) NOT NULL,
  `image` varchar(50) NOT NULL,
  `cateid` varchar(50) NOT NULL,
  `menustatus` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `resid`, `foodid`, `foodname`, `price`, `description`, `image`, `cateid`, `menustatus`) VALUES
(1, 997508, 79401, 'Chicken Tam Yam Soup', '100', '', 'menu image/g4.jpg', '11421', 'Available'),
(2, 997508, 32534, 'Chicken Manchow Soup', '70', '', 'menu image/g5.jpg', '11421', 'Available'),
(3, 997508, 69600, 'Veg Hongkong Rice', '90', '', 'menu image/g7.jpg', '11421', 'Available'),
(4, 997508, 39811, 'Singapore Rice', '90', '', 'menu image/g.jpg', '11421', 'Available'),
(5, 997508, 87877, 'Veg Special Rice', '100', '', 'menu image/g7.jpg', '11421', 'Available'),
(6, 997508, 30043, 'Hakka Noodles', '80', '', 'menu image/g1.jpg', '11421', 'Available'),
(7, 997508, 23410, 'Special Noodles', '120', '', 'menu image/g2.jpg', '11421', 'Available'),
(8, 997508, 22584, 'Noodle Soup', '60', '', 'menu image/g6.jpg', '11421', 'Available'),
(9, 868460, 13505, 'Misal Pav', '80', '', 'menu image/h1.jpg', '13592', 'Available'),
(10, 868460, 26092, 'Dahi Misal Pav', '100', '', 'menu image/h2.jpg', '13592', 'Available'),
(11, 868460, 73604, 'Tari Vada Pav', '60', '', 'menu image/h3.jpg', '13592', 'Available'),
(12, 868460, 54622, 'Vada Pav', '20', '', 'menu image/vada.jpg', '13592', 'Available'),
(13, 868460, 61702, 'Bhel', '45', '', 'menu image/h4.jpg', '13592', 'Available'),
(14, 868460, 13206, 'Suki Bhel', '45', '', 'menu image/h5.jpg', '13592', 'Available'),
(15, 868460, 85430, 'Matki Bhel', '60', '', 'menu image/h6.jpg', '13592', 'Available'),
(16, 868460, 28023, 'Special Bhel', '70', '', 'menu image/h7.jpg', '13592', 'Available'),
(17, 868460, 84445, 'Chees Bhel', '80', '', 'menu image/h8.jpg', '13592', 'Available'),
(18, 868460, 78069, 'Ragada Kachori', '50', '', 'menu image/h9.jpg', '13592', 'Available'),
(19, 868460, 77957, 'Ragada Samosa', '50', '', 'menu image/h10.jpg', '13592', 'Available'),
(20, 868460, 94641, 'Pani Puri', '25', '', 'menu image/h11.jpg', '13592', 'Available'),
(21, 482531, 59770, 'Chicken Biryani', '265', '', 'menu image/r1.avif', '83644', 'Available'),
(22, 482531, 48797, 'Chicken Handi', '336', 'Chicken dish with creamy gravy, cooked with traditional Asian spices.\r\n\r\n', 'menu image/r2.avif', '83644', 'Available'),
(23, 482531, 45855, 'Paneer Kadai', '242', 'Paneer mixed with onion gravy and spices\r\n\r\n', 'menu image/r3.avif', '83644', 'Available'),
(24, 482531, 82587, 'Paneer Tikka Masala', '245', '', 'menu image/r5.avif', '83644', 'Available'),
(25, 482531, 87422, 'Paneer Angara', '240', 'Paneer Angara is Well Known for its Hot and Spicy Delicacies.\r\n\r\n', 'menu image/r4.avif', '83644', 'Available'),
(26, 482531, 22648, 'Chicken Tangdi Kabab', '330', 'Chicken Tangdi Kebab\r\n\r\n', 'menu image/r6.avif', '83644', 'Available'),
(27, 482531, 48729, 'Hyderabadi Biryani', '308', '', 'menu image/r7.avif', '83644', 'Available'),
(28, 482531, 77763, 'Paneer Pasanda', '275', '', 'menu image/r8.avif', '83644', 'Available'),
(29, 482531, 99365, 'Chicken Tandoori', '275', '', 'menu image/r9.avif', '83644', 'Available'),
(30, 482531, 57314, 'Chicken Tikka Masala', '275', '', 'menu image/r10.avif', '83644', 'Available'),
(31, 482531, 74468, 'Dal Khichdi', '220', 'Khichdi Is A Healthy Indian Dish Made With Rice And Moong Lentils\r\n\r\n', 'menu image/r11.avif', '83644', 'Available'),
(32, 482531, 53143, 'Butter Chicken', '440', '', 'menu image/r12.avif', '83644', 'Available'),
(33, 482531, 34373, 'Dal Tadka', '143', '', 'menu image/r13.avif', '83644', 'Available'),
(34, 482531, 38098, 'Veg Kolhapuri', '209', '', 'menu image/r14.avif', '83644', 'Available'),
(35, 482531, 18246, 'Tandoori Roti', '20', '', 'menu image/r15.avif', '83644', 'Available'),
(36, 793023, 62858, 'Sabudana Vada ( Single )', '50', '', 'menu image/k1.jpg', '56735', 'Available'),
(37, 793023, 51629, 'Udid Vada Sambar ', '60', '', 'menu image/k2.jpg', '56735', 'Available'),
(38, 793023, 73500, 'Batata Vada Sambar  ', '60', '', 'menu image/k3.jpg', '56735', 'Available'),
(39, 793023, 20341, 'Mukabla plate', '120', '', 'menu image/south2.jpg', '56735', 'Available'),
(40, 793023, 54325, 'Idli Sambar Plate', '40', '', 'menu image/k4.jpg', '56735', 'Available'),
(41, 793023, 14355, 'Idli wadaIdli wada', '80', '', 'menu image/k5.jpg', '56735', 'Available'),
(42, 793023, 97642, 'Masala Dosa', '70', '', 'menu image/k6.jpg', '56735', 'Available'),
(43, 793023, 73356, 'Uttapam', '70', '', 'menu image/k7.jpg', '56735', 'Available'),
(44, 638489, 69881, 'Onion Pakora', '60', '', 'menu image/gv1.jpg', '83644', 'Available'),
(45, 638489, 27430, 'Finger Chips', '75', '', 'menu image/fires.jfif', '83644', 'Available'),
(46, 638489, 65883, 'Masala Finger Chips', '80', '', 'menu image/gv2.jpg', '94463', 'Available'),
(47, 638489, 35412, 'Mixed Veg Roll', '80', '', 'menu image/gv3.jpg', '94463', 'Available'),
(48, 638489, 17494, 'Aloo Mattar Roll', '80', '', 'menu image/gv4.jpg', '94463', 'Available'),
(49, 638489, 61886, ' Paneer Roll', '85', '', 'menu image/gv5.jpg', '94463', 'Available'),
(50, 638489, 17384, 'Pav Bhaji', '120', '', 'menu image/gv6.jpg', '83644', 'Available'),
(51, 881638, 59225, 'Kachori Bhel', '70', '', 'menu image/aa1.avif', '13592', 'Available'),
(52, 881638, 34244, 'Sukki Bhel', '60', '', 'menu image/aa2.avif', '13592', 'Available'),
(53, 881638, 84648, 'Chees Bhel', '80', '', 'menu image/aa3.avif', '13592', 'Available');

-- --------------------------------------------------------

--
-- Table structure for table `order1`
--

CREATE TABLE `order1` (
  `cid` int(11) NOT NULL,
  `orderid` varchar(15) NOT NULL,
  `loginid` int(10) NOT NULL,
  `resid` varchar(50) NOT NULL,
  `foodid` varchar(12) NOT NULL,
  `foodname` varchar(50) NOT NULL,
  `price` varchar(50) NOT NULL,
  `quantity` varchar(100) NOT NULL,
  `discount` varchar(50) NOT NULL,
  `total` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `instruction` varchar(255) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order1`
--

INSERT INTO `order1` (`cid`, `orderid`, `loginid`, `resid`, `foodid`, `foodname`, `price`, `quantity`, `discount`, `total`, `date`, `time`, `instruction`, `status`) VALUES
(1, '5087157566', 6562583, '868460', '13505', 'Misal Pav', '80', '2', '46.8', '160', '2022-11-13', '03:08:37', 'Make Testy and Spicey', 'Delivered'),
(2, '5087157566', 6562583, '868460', '73604', 'Tari Vada Pav', '60', '2', '46.8', '120', '2022-11-13', '03:08:37', 'Make Testy and Spicey', 'Delivered'),
(3, '5087157566', 6562583, '868460', '61702', 'Bhel', '45', '4', '46.8', '180', '2022-11-13', '03:08:37', 'Make Testy and Spicey', 'Delivered'),
(4, '5087157566', 6562583, '868460', '84445', 'Chees Bhel', '80', '4', '46.8', '320', '2022-11-13', '03:08:37', 'Make Testy and Spicey', 'Delivered'),
(5, '4755709355', 6562583, '997508', '39811', 'Singapore Rice', '90', '2', '31.2', '180', '2022-11-13', '03:11:23', 'Make testy add extra dry noodles', 'Delivered'),
(6, '4755709355', 6562583, '997508', '30043', 'Hakka Noodles', '80', '2', '31.2', '160', '2022-11-13', '03:11:23', 'Make testy add extra dry noodles', 'Delivered'),
(7, '4755709355', 6562583, '997508', '22584', 'Noodle Soup', '60', '3', '31.2', '180', '2022-11-13', '03:11:23', 'Make testy add extra dry noodles', 'Delivered'),
(8, '2932818235', 2893186, '868460', '13505', 'Misal Pav', '80', '2', '30.9', '160', '2022-11-13', '03:25:50', 'Make it fast', 'Delivered'),
(9, '2932818235', 2893186, '868460', '61702', 'Bhel', '45', '2', '30.9', '90', '2022-11-13', '03:25:50', 'Make it fast', 'Delivered'),
(10, '2932818235', 2893186, '868460', '13206', 'Suki Bhel', '45', '2', '30.9', '90', '2022-11-13', '03:25:50', 'Make it fast', 'Delivered'),
(11, '2932818235', 2893186, '868460', '94641', 'Pani Puri', '25', '7', '30.9', '175', '2022-11-13', '03:25:50', 'Make it fast', 'Delivered'),
(12, '630204405', 6562583, '868460', '61702', 'Bhel', '45', '2', '7.2', '90', '2022-11-14', '01:39:32', '', 'Cancel'),
(13, '630204405', 6562583, '868460', '13206', 'Suki Bhel', '45', '2', '7.2', '90', '2022-11-14', '01:39:32', '', 'Cancel'),
(14, '1487895169', 6562583, '868460', '13505', 'Misal Pav', '80', '2', '40.2', '160', '2022-11-16', '06:21:46', '', 'Cancel'),
(15, '1487895169', 6562583, '868460', '26092', 'Dahi Misal Pav', '100', '2', '40.2', '200', '2022-11-16', '06:21:46', '', 'Cancel'),
(16, '1487895169', 6562583, '868460', '84445', 'Chees Bhel', '80', '2', '40.2', '160', '2022-11-16', '06:21:46', '', 'Cancel'),
(17, '1487895169', 6562583, '868460', '78069', 'Ragada Kachori', '50', '3', '40.2', '150', '2022-11-16', '06:21:46', '', 'Cancel'),
(18, '8830587555', 6562583, '868460', '26092', 'Dahi Misal Pav', '100', '10', '105.6', '1000', '2022-11-17', '11:25:14', 'Make Food Testy And Give extra Dahi And 30 Extra Pav.', 'Delivered'),
(19, '8830587555', 6562583, '868460', '84445', 'Chees Bhel', '80', '4', '105.6', '320', '2022-11-17', '11:25:14', 'Make Food Testy And Give extra Dahi And 30 Extra Pav.', 'Delivered');

-- --------------------------------------------------------

--
-- Table structure for table `signup`
--

CREATE TABLE `signup` (
  `cid` int(11) NOT NULL,
  `loginid` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `mobile` varchar(12) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `cpassword` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `waddress` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `pincode` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `image` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `mstatus` varchar(50) NOT NULL,
  `token` varchar(50) NOT NULL,
  `otp` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `signup`
--

INSERT INTO `signup` (`cid`, `loginid`, `name`, `mobile`, `email`, `password`, `cpassword`, `address`, `waddress`, `city`, `state`, `pincode`, `date`, `time`, `image`, `status`, `mstatus`, `token`, `otp`) VALUES
(1, 2893186, 'Siddharth Adawale', '95642154625', 'abhishek.hajare@mitaoe.ac.in', '$2y$10$eUcS91Fbd9Dojn.BdnV3LOR6y3Hcyf0p06aXlGGstwH', '$2y$10$chkMPLG2BtDSOc7hZGaxaO6LIipc04Hr1PpIUde8UIg', 'Ho. No. 4748 Mali Gali Maliwada Pune', '', 'Pune', 'MAHARASHTRA', 414002, '2022-11-13', '12:25:39', 'image/profile.jpg', 'Active', 'Active', '91b0523c9bb499081383e13c517a73', 9951),
(2, 6562583, 'Abhishek Hajare', '9421017990', 'abhishekhajare088@gmail.com', '$2y$10$tn5Yl6OD8g2aGdGP5O0KbOu3sU4uR.YAU83funslrs1', '$2y$10$l/QcMb.FyqCEdFeEAOthbednDyeTCdOQ2y2oBBUdH0U', 'Ho. No. 4748 Nirfarake Gali Maliwada Ahmednagar', '', 'Ahmednagar', 'MAHARASHTRA', 414001, '2022-11-13', '12:26:23', 'profile image/profile.jpg', 'Active', 'Active', 'ab318db11642aeb65dd3c71dff068c', 8597);

-- --------------------------------------------------------

--
-- Table structure for table `signuphotel`
--

CREATE TABLE `signuphotel` (
  `id` int(11) NOT NULL,
  `resid` int(10) NOT NULL,
  `hotel` varchar(50) NOT NULL,
  `Categories` varchar(50) NOT NULL,
  `mobile` varchar(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `cpassword` varchar(100) NOT NULL,
  `address` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `pincode` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `description` varchar(255) NOT NULL,
  `image` varchar(50) NOT NULL,
  `token` varchar(50) NOT NULL,
  `otp` int(11) NOT NULL,
  `status` varchar(50) NOT NULL,
  `mstatus` varchar(50) NOT NULL,
  `hstatus` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `signuphotel`
--

INSERT INTO `signuphotel` (`id`, `resid`, `hotel`, `Categories`, `mobile`, `email`, `password`, `cpassword`, `address`, `city`, `state`, `pincode`, `date`, `time`, `description`, `image`, `token`, `otp`, `status`, `mstatus`, `hstatus`) VALUES
(1, 868460, 'Hajare Bandhu Bhelwale ', 'Chaat Food', '9422339397', 'shirishhajare470@gmail.com', '$2y$10$UZHuCBGrGiNKPfM5cE4y8O7QHBKjT4yqptt6UwFJD1N', '$2y$10$br.V6YlWd7qjgrabqpGGcutxq1UYJ97266a8k8zH5tQ', 'Ahmednagar, Maliwada, Wadiya Park, Ahmednagar - 41', 'Ahmednagar', 'MAHARASHTRA', 414001, '2022-11-12', '11:44:46', 'Foodies of all ages enjoy and appreciate Fast Food. When you have an urge to binge on mouthwatering and alluring meals to satisfy a food yearning, the restaurants can provide you with a variety of options. In fact, there are places that also offer healthy', 'hotel image/bhel.jpg', 'e6907c1fd7636cbcbd45c86bf1d1d2', 4002, 'Active', 'Active', 'Open'),
(2, 997508, 'Gulmohar Chinese And Fast Food', 'Chinese food', '9542136254', 'abhishek762016@gmail.com', '$2y$10$KvR4yrLGWl9f.FEQnYZ4zu7QIZDUJIY58Dz.Bny4W1v', '$2y$10$Xa.Nr8G9tNV1Cd5/vhWEnejQ0IPMLMBVL51LCApX4Mi', 'Plot No. 11, Gulmohar Road, Gulmohar, Ahmednagar ', 'Ahmednagar', 'MAHARASHTRA', 414001, '2022-11-12', '11:42:44', 'Gulmohar Chinese And Fast Food in Gulmohar has a wide range of products and / or services to cater to the varied requirements of their customers. The staff at this establishment are courteous and prompt at providing any assistance. They readily answer any', 'hotel image/chines1.jpg', '235ccc3cd99172be0afb9e76ddc09d', 8041, 'Active', 'Active', 'Open'),
(3, 482531, 'Hotel New Ranjit Family Garden Restaurant ', 'Thali Food', '0213454211', 'supprot.farmagri@gmail.com', '$2y$10$n1eXsXEvAIIQemrTreHJC.k9hg4QXWPwnH0TIp9PwbR', '$2y$10$ytijWJGwTvBf4NefDQxgduFFR/w4fykVlnrAQ9WpD2Q', 'Burudgaon Road, Ahmednagar Camp, Ahmednagar - 4140', 'Ahmednagar', 'MAHARASHTRA', 414001, '2022-11-12', '11:51:51', 'Looking forward to enjoying some scrumptious food along with delectable drinks? Wishing to spend a fun night out with your friends? If yes, then there are many Restaurants & Bars for you to choose from! These restaurants offer a wide array of delicious di', 'hotel image/hotel1.jpg', 'adae7f66a994f0ccbc5318e4c3f69a', 6620, 'Active', 'Active', 'Open'),
(4, 793023, 'Kailash Udapi Centre   ', 'South Indian Food', '02145365856', 'farmagrimit11@gmail.com', '$2y$10$N.5u/hSOAet6oaxl1EhrhudYHkfsi/2XFGGyvsyZbG9', '$2y$10$0P9t./QEACpV52.oIIJ/1uuhQrQmSO9UEhDyikpV0do', 'G1/G 2 Shiv Shakti Apartment, Kist Lane, Juna Kapa', 'Ahmednagar', 'MAHARASHTRA', 414001, '2022-11-12', '11:56:48', 'Restaurants in Ahmednagar provide various cuisines with an aesthetic seating arrangement and the best services. Restaurants act as great places for many situations. From team meetings to family dinners, it can help serve a wide range of audiences. Many re', 'hotel image/south1.jpg', '8f670a18adb75a0136236b95c1a42c', 7008, 'Active', 'Active', 'Open'),
(5, 903146, 'Cafe Katta   ', 'Pizza Food', '354686385', 'siddharth.adawale@mitaoe.ac.in', '$2y$10$HxhoGgX6oDC8w/RB2dN9aeTFKthGy4mSkKNgex1jfUG', '$2y$10$D7H7idXRuYXIWCQXzmc8t.LsRqDlXrr6f52lS.4N.ek', 'Vasant Vihar Apartment, Balikashram Road, Ahmednag', 'Ahmednagar', 'MAHARASHTRA', 414001, '2022-11-13', '12:25:35', 'Cafe Katta in Ahmednagar. Fast Food with Address, Contact Number, Photos, Maps. View Cafe Katta, Ahmednagar on Justdial.\r\n\r\nFoodies of all ages enjoy and appreciate Fast Food. When you have an urge to binge on mouthwatering and alluring meals to satisfy a', 'hotel image/pizza2.jfif', 'd30c37976c3d49006e82fe435ba2a2', 2963, 'Active', 'Active', 'Open'),
(6, 375331, 'A 1 Chinese Center   ', 'Chinese food', '021365215', 'abhishekhajare88@gmail.com', '$2y$10$2nimUdEqbeJfxM1ogtbXu.3IRqm37EANxJYN1/60xSZ', '$2y$10$QKQTYXooINJG8/EGC3VmieY/dfBKeI0tHhc9yTPYKQb', 'H. 118, Ahmednagar, Ahmednagar Locality, Seven Roo', 'Ahmednagar', 'MAHARASHTRA', 414001, '2022-11-13', '12:28:06', 'Foodies of all ages enjoy and appreciate Fast Food. When you have an urge to binge on mouthwatering and alluring meals to satisfy a food yearning, the restaurants can provide you with a variety of options. In fact, there are places that also offer healthy', 'hotel image/chines.jpg', '485f62001d7640cdfe6dbcb1dd0b2e', 4317, 'Active', 'Active', 'Open'),
(7, 881638, 'Asha Bhel Pandhrichya Pulachi', 'Chaat Food', '2452463351', 'abhishekhajare@gmail.com', '$2y$10$F7gxoTstPk662xjFG9bEweplNqhu91HgF.6.waqcjeG', '$2y$10$HfhQdg4Fka6KzIrZItYRE.8OA3lfM0uSWCMqwNr90Iy', 'Swastik Chowk, Nagar Pune Road, Swastik Chowk, Ahm', 'Ahmednagar', 'MAHARASHTRA', 414001, '2022-11-13', '12:31:08', 'Restaurants in Ahmednagar provide various cuisines with an aesthetic seating arrangement and the best services. Restaurants act as great places for many situations. From team meetings to family dinners, it can help serve a wide range of audiences. Many re', 'hotel image/bhel1.jpg', '22882172f6949f369a8ec86b2ac4fc', 9495, 'Active', 'Active', 'Open'),
(8, 271253, 'Hotel Sarang ', 'Thali Food', '25421017990', 'abhishek088@gmail.com', '$2y$10$5o5zp3x1M0ppATgpCBDu0Oz7/RvAWH/Zj32ZYJ1hR2n', '$2y$10$gl6e/wYL2kXwm5QDj1oG2e2R49BChzVWTjPTthHRTcE', 'Haaji Ibrahim Building, Station Road, Market Yard ', 'Ahmednagar', 'MAHARASHTRA', 414001, '2022-11-13', '12:33:38', 'Also listed in Hotels, Hotels (Rs 1001 To Rs 2000) etc. Hotel Sarang in Market Yard Ahmednagar is one of the most trustworthy names in the field. They have received a 3.9 rating from their customers. To make the transactional experience hassle-free for cu', 'hotel image/thali.jpg', '32529f954650d5bc987ee5d4b9c3d6', 9649, 'Active', 'Active', 'Open'),
(9, 638489, 'Govinda Deccan Veg', 'Thali Food', '09421017990', 'abhishekhajare088@gmail.com', '$2y$10$Fmac6ywxwgRM6kTb4/NEhOKfisOhjuyQSDT56oE1TRn', '$2y$10$mcZ9qWS60t44PzI1kqUV4ePnhu6Cm/b/weCEamU4ljy', 'Below Z Bridge, Deccan Gymkhana, Pune - 411004, Ne', 'Pune', 'MAHARASHTRA', 411004, '2022-11-13', '01:27:17', 'As the name suggests, Pure Veg Restaurants serve only vegetarian food. They offer a variety of delicious food and many options to choose from. From soups to main course to desserts, they offer anything and everything. Such restaurants can be categorised b', 'hotel image/thali.jpg', 'e64a1debe9b71cfd04a1c4a9e6fcae', 9162, 'Active', 'Active', 'Open'),
(10, 817486, 'Pizza Hut', 'Pizza Food', 'Pizza Hut', 'abhishekshajare786@gmail.com', '$2y$10$PkZ/qUbbkZviYWbp82x/P.Th6elArivfcMo5IDZVjdV', '$2y$10$/FYVsW3DxBaoZrKyFSqKXemLtNg7416WkI94B6nmEkg', 'G5, LG Flr, Phoenix Marketcity Mall Survey Number ', 'Pune', 'MAHARASHTRA', 414004, '2022-11-13', '01:29:39', 'As the name suggests, Pure Veg Restaurants serve only vegetarian food. They offer a variety of delicious food and many options to choose from. From soups to main course to desserts, they offer anything and everything. Such restaurants can be categorised b', 'hotel image/pizza2.jfif', '6cc09047583155118f5471d5599d59', 9667, 'Active', 'Active', 'Open'),
(11, 981838, 'Burger King', 'Pizza Food', '2544210179', 'abhishekhaj@gmail.com', '$2y$10$5k8PwUYXjCndHRMCNqDZg.Y8meyVQXxUM7tLW/HNTW0', '$2y$10$YQZisJUwJcVXTLBVnTkTcelTFq3Zhx7u3s4LJIT5yNv', 'Survey No 2394, East Street, M G Road, Camp, pune ', 'Pune', 'MAHARASHTRA', 414004, '2022-11-13', '01:31:53', 'Foodies of all ages enjoy and appreciate Fast Food. When you have an urge to binge on mouthwatering and alluring meals to satisfy a food yearning, the restaurants can provide you with a variety of options. In fact, there are places that also offer healthy', 'hotel image/brg1.jfif', 'a6940533e037b7cbbdd087b4d86b22', 4764, 'Active', 'Active', 'Open'),
(12, 438287, 'Jaishree Pure Veg ', 'Thali Food', '023458452', 'abhishajare088@gmail.com', '$2y$10$XskJOQb40joD8xTD5AxXQ.RtP/tp9obQSJWLnRXoF9/', '$2y$10$PF0DVQ.ki3TNa7FkhGGX..E0y7.o.2fe8gZ/mgucILB', 'Shop No 1, 2, 3, 4 Comman Sens Bulding, Market Yar', 'Pune', 'MAHARASHTRA', 414004, '2022-11-13', '01:35:08', 'Restaurants in Pune provide various cuisines with an aesthetic seating arrangement and the best services. Restaurants act as great places for many situations. From team meetings to family dinners, it can help serve a wide range of audiences. Many restaura', 'hotel image/hotel1.jpg', 'dc0b843c483b3eb44372e95cb03cec', 7889, 'Active', 'Active', 'Open');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(200) NOT NULL,
  `image` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `state_list`
--

CREATE TABLE `state_list` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `state_list`
--

INSERT INTO `state_list` (`id`, `name`) VALUES
(1, 'ANDAMAN AND NICOBAR ISLANDS'),
(2, 'ANDHRA PRADESH'),
(3, 'ARUNACHAL PRADESH'),
(4, 'ASSAM'),
(5, 'BIHAR'),
(6, 'CHATTISGARH'),
(7, 'CHANDIGARH'),
(8, 'DAMAN AND DIU'),
(9, 'DELHI'),
(10, 'DADRA AND NAGAR HAVELI'),
(11, 'GOA'),
(12, 'GUJARAT'),
(13, 'HIMACHAL PRADESH'),
(14, 'HARYANA'),
(15, 'JAMMU AND KASHMIR'),
(16, 'JHARKHAND'),
(17, 'KERALA'),
(18, 'KARNATAKA'),
(19, 'LAKSHADWEEP'),
(20, 'MEGHALAYA'),
(21, 'MAHARASHTRA'),
(22, 'MANIPUR'),
(23, 'MADHYA PRADESH'),
(24, 'MIZORAM'),
(25, 'NAGALAND'),
(26, 'ODISHA'),
(27, 'PUNJAB'),
(28, 'PONDICHERRY'),
(29, 'RAJASTHAN'),
(30, 'SIKKIM'),
(31, 'TAMIL NADU'),
(32, 'TRIPURA'),
(33, 'UTTARAKHAND'),
(34, 'UTTAR PRADESH'),
(35, 'WEST BENGAL'),
(36, 'TELANGANA');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `checkout`
--
ALTER TABLE `checkout`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `district`
--
ALTER TABLE `district`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `histroy`
--
ALTER TABLE `histroy`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order1`
--
ALTER TABLE `order1`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `signup`
--
ALTER TABLE `signup`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `signuphotel`
--
ALTER TABLE `signuphotel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `state_list`
--
ALTER TABLE `state_list`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `checkout`
--
ALTER TABLE `checkout`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;

--
-- AUTO_INCREMENT for table `district`
--
ALTER TABLE `district`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=632;

--
-- AUTO_INCREMENT for table `histroy`
--
ALTER TABLE `histroy`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `order1`
--
ALTER TABLE `order1`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `signup`
--
ALTER TABLE `signup`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `signuphotel`
--
ALTER TABLE `signuphotel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `state_list`
--
ALTER TABLE `state_list`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
