-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 08, 2017 at 06:25 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ity_i_task_you_temp`
--

-- --------------------------------------------------------

--
-- Table structure for table `functionality_type_master`
--

CREATE TABLE `functionality_type_master` (
  `code` int(5) NOT NULL,
  `functionalityType` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ity_api_country_master`
--

CREATE TABLE `ity_api_country_master` (
  `id` int(11) NOT NULL,
  `iso` char(2) NOT NULL,
  `name` varchar(80) NOT NULL,
  `nicename` varchar(80) NOT NULL,
  `iso3` char(3) DEFAULT NULL,
  `numcode` smallint(6) DEFAULT NULL,
  `phonecode` int(5) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1',
  `createdDate` date NOT NULL,
  `modifiedDate` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ity_api_country_master`
--

INSERT INTO `ity_api_country_master` (`id`, `iso`, `name`, `nicename`, `iso3`, `numcode`, `phonecode`, `status`, `createdDate`, `modifiedDate`) VALUES
(2, 'AL', 'ALBANIA', 'Albania', 'ALB', 8, 355, '1', '0000-00-00', '0000-00-00'),
(3, 'DZ', 'ALGERIA', 'Algeria', 'DZA', 12, 213, '1', '0000-00-00', '0000-00-00'),
(4, 'AS', 'AMERICAN SAMOA', 'American Samoa', 'ASM', 16, 1684, '1', '0000-00-00', '0000-00-00'),
(5, 'AD', 'ANDORRA', 'Andorra', 'AND', 20, 376, '1', '0000-00-00', '0000-00-00'),
(6, 'AO', 'ANGOLA', 'Angola', 'AGO', 24, 244, '1', '0000-00-00', '0000-00-00'),
(7, 'AI', 'ANGUILLA', 'Anguilla', 'AIA', 660, 1264, '1', '0000-00-00', '0000-00-00'),
(9, 'AG', 'ANTIGUA AND BARBUDA', 'Antigua and Barbuda', 'ATG', 28, 1268, '1', '0000-00-00', '0000-00-00'),
(10, 'AR', 'ARGENTINA', 'Argentina', 'ARG', 32, 54, '1', '0000-00-00', '0000-00-00'),
(11, 'AM', 'ARMENIA', 'Armenia', 'ARM', 51, 374, '1', '0000-00-00', '0000-00-00'),
(12, 'AW', 'ARUBA', 'Aruba', 'ABW', 533, 297, '1', '0000-00-00', '0000-00-00'),
(13, 'AU', 'AUSTRALIA', 'Australia', 'AUS', 36, 61, '1', '0000-00-00', '0000-00-00'),
(14, 'AT', 'AUSTRIA', 'Austria', 'AUT', 40, 43, '1', '0000-00-00', '0000-00-00'),
(15, 'AZ', 'AZERBAIJAN', 'Azerbaijan', 'AZE', 31, 994, '1', '0000-00-00', '0000-00-00'),
(16, 'BS', 'BAHAMAS', 'Bahamas', 'BHS', 44, 1242, '1', '0000-00-00', '0000-00-00'),
(17, 'BH', 'BAHRAIN', 'Bahrain', 'BHR', 48, 973, '1', '0000-00-00', '0000-00-00'),
(18, 'BD', 'BANGLADESH', 'Bangladesh', 'BGD', 50, 880, '1', '0000-00-00', '0000-00-00'),
(19, 'BB', 'BARBADOS', 'Barbados', 'BRB', 52, 1246, '1', '0000-00-00', '0000-00-00'),
(20, 'BY', 'BELARUS', 'Belarus', 'BLR', 112, 375, '1', '0000-00-00', '0000-00-00'),
(21, 'BE', 'BELGIUM', 'Belgium', 'BEL', 56, 32, '1', '0000-00-00', '0000-00-00'),
(22, 'BZ', 'BELIZE', 'Belize', 'BLZ', 84, 501, '1', '0000-00-00', '0000-00-00'),
(23, 'BJ', 'BENIN', 'Benin', 'BEN', 204, 229, '1', '0000-00-00', '0000-00-00'),
(24, 'BM', 'BERMUDA', 'Bermuda', 'BMU', 60, 1441, '1', '0000-00-00', '0000-00-00'),
(25, 'BT', 'BHUTAN', 'Bhutan', 'BTN', 64, 975, '1', '0000-00-00', '0000-00-00'),
(26, 'BO', 'BOLIVIA', 'Bolivia', 'BOL', 68, 591, '1', '0000-00-00', '0000-00-00'),
(27, 'BA', 'BOSNIA AND HERZEGOVINA', 'Bosnia and Herzegovina', 'BIH', 70, 387, '1', '0000-00-00', '0000-00-00'),
(28, 'BW', 'BOTSWANA', 'Botswana', 'BWA', 72, 267, '1', '0000-00-00', '0000-00-00'),
(30, 'BR', 'BRAZIL', 'Brazil', 'BRA', 76, 55, '1', '0000-00-00', '0000-00-00'),
(31, 'IO', 'BRITISH INDIAN OCEAN TERRITORY', 'British Indian Ocean Territory', NULL, NULL, 246, '1', '0000-00-00', '0000-00-00'),
(32, 'BN', 'BRUNEI DARUSSALAM', 'Brunei Darussalam', 'BRN', 96, 673, '1', '0000-00-00', '0000-00-00'),
(33, 'BG', 'BULGARIA', 'Bulgaria', 'BGR', 100, 359, '1', '0000-00-00', '0000-00-00'),
(34, 'BF', 'BURKINA FASO', 'Burkina Faso', 'BFA', 854, 226, '1', '0000-00-00', '0000-00-00'),
(35, 'BI', 'BURUNDI', 'Burundi', 'BDI', 108, 257, '1', '0000-00-00', '0000-00-00'),
(36, 'KH', 'CAMBODIA', 'Cambodia', 'KHM', 116, 855, '1', '0000-00-00', '0000-00-00'),
(37, 'CM', 'CAMEROON', 'Cameroon', 'CMR', 120, 237, '1', '0000-00-00', '0000-00-00'),
(38, 'CA', 'CANADA', 'Canada', 'CAN', 124, 1, '1', '0000-00-00', '0000-00-00'),
(39, 'CV', 'CAPE VERDE', 'Cape Verde', 'CPV', 132, 238, '1', '0000-00-00', '0000-00-00'),
(40, 'KY', 'CAYMAN ISLANDS', 'Cayman Islands', 'CYM', 136, 1345, '1', '0000-00-00', '0000-00-00'),
(41, 'CF', 'CENTRAL AFRICAN REPUBLIC', 'Central African Republic', 'CAF', 140, 236, '1', '0000-00-00', '0000-00-00'),
(42, 'TD', 'CHAD', 'Chad', 'TCD', 148, 235, '1', '0000-00-00', '0000-00-00'),
(43, 'CL', 'CHILE', 'Chile', 'CHL', 152, 56, '1', '0000-00-00', '0000-00-00'),
(44, 'CN', 'CHINA', 'China', 'CHN', 156, 86, '1', '0000-00-00', '0000-00-00'),
(45, 'CX', 'CHRISTMAS ISLAND', 'Christmas Island', NULL, NULL, 61, '1', '0000-00-00', '0000-00-00'),
(46, 'CC', 'COCOS (KEELING) ISLANDS', 'Cocos (Keeling) Islands', NULL, NULL, 672, '1', '0000-00-00', '0000-00-00'),
(47, 'CO', 'COLOMBIA', 'Colombia', 'COL', 170, 57, '1', '0000-00-00', '0000-00-00'),
(48, 'KM', 'COMOROS', 'Comoros', 'COM', 174, 269, '1', '0000-00-00', '0000-00-00'),
(49, 'CG', 'CONGO', 'Congo', 'COG', 178, 242, '1', '0000-00-00', '0000-00-00'),
(50, 'CD', 'CONGO, THE DEMOCRATIC REPUBLIC OF THE', 'Congo, the Democratic Republic of the', 'COD', 180, 242, '1', '0000-00-00', '0000-00-00'),
(51, 'CK', 'COOK ISLANDS', 'Cook Islands', 'COK', 184, 682, '1', '0000-00-00', '0000-00-00'),
(52, 'CR', 'COSTA RICA', 'Costa Rica', 'CRI', 188, 506, '1', '0000-00-00', '0000-00-00'),
(53, 'CI', 'COTE D''IVOIRE', 'Cote D''Ivoire', 'CIV', 384, 225, '1', '0000-00-00', '0000-00-00'),
(54, 'HR', 'CROATIA', 'Croatia', 'HRV', 191, 385, '1', '0000-00-00', '0000-00-00'),
(55, 'CU', 'CUBA', 'Cuba', 'CUB', 192, 53, '1', '0000-00-00', '0000-00-00'),
(56, 'CY', 'CYPRUS', 'Cyprus', 'CYP', 196, 357, '1', '0000-00-00', '0000-00-00'),
(57, 'CZ', 'CZECH REPUBLIC', 'Czech Republic', 'CZE', 203, 420, '1', '0000-00-00', '0000-00-00'),
(58, 'DK', 'DENMARK', 'Denmark', 'DNK', 208, 45, '1', '0000-00-00', '0000-00-00'),
(59, 'DJ', 'DJIBOUTI', 'Djibouti', 'DJI', 262, 253, '1', '0000-00-00', '0000-00-00'),
(60, 'DM', 'DOMINICA', 'Dominica', 'DMA', 212, 1767, '1', '0000-00-00', '0000-00-00'),
(61, 'DO', 'DOMINICAN REPUBLIC', 'Dominican Republic', 'DOM', 214, 1809, '1', '0000-00-00', '0000-00-00'),
(62, 'EC', 'ECUADOR', 'Ecuador', 'ECU', 218, 593, '1', '0000-00-00', '0000-00-00'),
(63, 'EG', 'EGYPT', 'Egypt', 'EGY', 818, 20, '1', '0000-00-00', '0000-00-00'),
(64, 'SV', 'EL SALVADOR', 'El Salvador', 'SLV', 222, 503, '1', '0000-00-00', '0000-00-00'),
(65, 'GQ', 'EQUATORIAL GUINEA', 'Equatorial Guinea', 'GNQ', 226, 240, '1', '0000-00-00', '0000-00-00'),
(66, 'ER', 'ERITREA', 'Eritrea', 'ERI', 232, 291, '1', '0000-00-00', '0000-00-00'),
(67, 'EE', 'ESTONIA', 'Estonia', 'EST', 233, 372, '1', '0000-00-00', '0000-00-00'),
(68, 'ET', 'ETHIOPIA', 'Ethiopia', 'ETH', 231, 251, '1', '0000-00-00', '0000-00-00'),
(69, 'FK', 'FALKLAND ISLANDS (MALVINAS)', 'Falkland Islands (Malvinas)', 'FLK', 238, 500, '1', '0000-00-00', '0000-00-00'),
(70, 'FO', 'FAROE ISLANDS', 'Faroe Islands', 'FRO', 234, 298, '1', '0000-00-00', '0000-00-00'),
(71, 'FJ', 'FIJI', 'Fiji', 'FJI', 242, 679, '1', '0000-00-00', '0000-00-00'),
(72, 'FI', 'FINLAND', 'Finland', 'FIN', 246, 358, '1', '0000-00-00', '0000-00-00'),
(73, 'FR', 'FRANCE', 'France', 'FRA', 250, 33, '1', '0000-00-00', '0000-00-00'),
(74, 'GF', 'FRENCH GUIANA', 'French Guiana', 'GUF', 254, 594, '1', '0000-00-00', '0000-00-00'),
(75, 'PF', 'FRENCH POLYNESIA', 'French Polynesia', 'PYF', 258, 689, '1', '0000-00-00', '0000-00-00'),
(77, 'GA', 'GABON', 'Gabon', 'GAB', 266, 241, '1', '0000-00-00', '0000-00-00'),
(78, 'GM', 'GAMBIA', 'Gambia', 'GMB', 270, 220, '1', '0000-00-00', '0000-00-00'),
(79, 'GE', 'GEORGIA', 'Georgia', 'GEO', 268, 995, '1', '0000-00-00', '0000-00-00'),
(80, 'DE', 'GERMANY', 'Germany', 'DEU', 276, 49, '1', '0000-00-00', '0000-00-00'),
(81, 'GH', 'GHANA', 'Ghana', 'GHA', 288, 233, '1', '0000-00-00', '0000-00-00'),
(82, 'GI', 'GIBRALTAR', 'Gibraltar', 'GIB', 292, 350, '1', '0000-00-00', '0000-00-00'),
(83, 'GR', 'GREECE', 'Greece', 'GRC', 300, 30, '1', '0000-00-00', '0000-00-00'),
(84, 'GL', 'GREENLAND', 'Greenland', 'GRL', 304, 299, '1', '0000-00-00', '0000-00-00'),
(85, 'GD', 'GRENADA', 'Grenada', 'GRD', 308, 1473, '1', '0000-00-00', '0000-00-00'),
(86, 'GP', 'GUADELOUPE', 'Guadeloupe', 'GLP', 312, 590, '1', '0000-00-00', '0000-00-00'),
(87, 'GU', 'GUAM', 'Guam', 'GUM', 316, 1671, '1', '0000-00-00', '0000-00-00'),
(88, 'GT', 'GUATEMALA', 'Guatemala', 'GTM', 320, 502, '1', '0000-00-00', '0000-00-00'),
(89, 'GN', 'GUINEA', 'Guinea', 'GIN', 324, 224, '1', '0000-00-00', '0000-00-00'),
(90, 'GW', 'GUINEA-BISSAU', 'Guinea-Bissau', 'GNB', 624, 245, '1', '0000-00-00', '0000-00-00'),
(91, 'GY', 'GUYANA', 'Guyana', 'GUY', 328, 592, '1', '0000-00-00', '0000-00-00'),
(92, 'HT', 'HAITI', 'Haiti', 'HTI', 332, 509, '1', '0000-00-00', '0000-00-00'),
(94, 'VA', 'HOLY SEE (VATICAN CITY STATE)', 'Holy See (Vatican City State)', 'VAT', 336, 39, '1', '0000-00-00', '0000-00-00'),
(95, 'HN', 'HONDURAS', 'Honduras', 'HND', 340, 504, '1', '0000-00-00', '0000-00-00'),
(96, 'HK', 'HONG KONG', 'Hong Kong', 'HKG', 344, 852, '1', '0000-00-00', '0000-00-00'),
(97, 'HU', 'HUNGARY', 'Hungary', 'HUN', 348, 36, '1', '0000-00-00', '0000-00-00'),
(98, 'IS', 'ICELAND', 'Iceland', 'ISL', 352, 354, '1', '0000-00-00', '0000-00-00'),
(1, 'IN', 'INDIA', 'India', 'IND', 356, 91, '1', '0000-00-00', '0000-00-00'),
(100, 'ID', 'INDONESIA', 'Indonesia', 'IDN', 360, 62, '1', '0000-00-00', '0000-00-00'),
(101, 'IR', 'IRAN, ISLAMIC REPUBLIC OF', 'Iran, Islamic Republic of', 'IRN', 364, 98, '1', '0000-00-00', '0000-00-00'),
(102, 'IQ', 'IRAQ', 'Iraq', 'IRQ', 368, 964, '1', '0000-00-00', '0000-00-00'),
(103, 'IE', 'IRELAND', 'Ireland', 'IRL', 372, 353, '1', '0000-00-00', '0000-00-00'),
(104, 'IL', 'ISRAEL', 'Israel', 'ISR', 376, 972, '1', '0000-00-00', '0000-00-00'),
(105, 'IT', 'ITALY', 'Italy', 'ITA', 380, 39, '1', '0000-00-00', '0000-00-00'),
(106, 'JM', 'JAMAICA', 'Jamaica', 'JAM', 388, 1876, '1', '0000-00-00', '0000-00-00'),
(107, 'JP', 'JAPAN', 'Japan', 'JPN', 392, 81, '1', '0000-00-00', '0000-00-00'),
(108, 'JO', 'JORDAN', 'Jordan', 'JOR', 400, 962, '1', '0000-00-00', '0000-00-00'),
(109, 'KZ', 'KAZAKHSTAN', 'Kazakhstan', 'KAZ', 398, 7, '1', '0000-00-00', '0000-00-00'),
(110, 'KE', 'KENYA', 'Kenya', 'KEN', 404, 254, '1', '0000-00-00', '0000-00-00'),
(111, 'KI', 'KIRIBATI', 'Kiribati', 'KIR', 296, 686, '1', '0000-00-00', '0000-00-00'),
(112, 'KP', 'KOREA, DEMOCRATIC PEOPLE''S REPUBLIC OF', 'Korea, Democratic People''s Republic of', 'PRK', 408, 850, '1', '0000-00-00', '0000-00-00'),
(113, 'KR', 'KOREA, REPUBLIC OF', 'Korea, Republic of', 'KOR', 410, 82, '1', '0000-00-00', '0000-00-00'),
(114, 'KW', 'KUWAIT', 'Kuwait', 'KWT', 414, 965, '1', '0000-00-00', '0000-00-00'),
(115, 'KG', 'KYRGYZSTAN', 'Kyrgyzstan', 'KGZ', 417, 996, '1', '0000-00-00', '0000-00-00'),
(116, 'LA', 'LAO PEOPLE''S DEMOCRATIC REPUBLIC', 'Lao People''s Democratic Republic', 'LAO', 418, 856, '1', '0000-00-00', '0000-00-00'),
(117, 'LV', 'LATVIA', 'Latvia', 'LVA', 428, 371, '1', '0000-00-00', '0000-00-00'),
(118, 'LB', 'LEBANON', 'Lebanon', 'LBN', 422, 961, '1', '0000-00-00', '0000-00-00'),
(119, 'LS', 'LESOTHO', 'Lesotho', 'LSO', 426, 266, '1', '0000-00-00', '0000-00-00'),
(120, 'LR', 'LIBERIA', 'Liberia', 'LBR', 430, 231, '1', '0000-00-00', '0000-00-00'),
(121, 'LY', 'LIBYAN ARAB JAMAHIRIYA', 'Libyan Arab Jamahiriya', 'LBY', 434, 218, '1', '0000-00-00', '0000-00-00'),
(122, 'LI', 'LIECHTENSTEIN', 'Liechtenstein', 'LIE', 438, 423, '1', '0000-00-00', '0000-00-00'),
(123, 'LT', 'LITHUANIA', 'Lithuania', 'LTU', 440, 370, '1', '0000-00-00', '0000-00-00'),
(124, 'LU', 'LUXEMBOURG', 'Luxembourg', 'LUX', 442, 352, '1', '0000-00-00', '0000-00-00'),
(125, 'MO', 'MACAO', 'Macao', 'MAC', 446, 853, '1', '0000-00-00', '0000-00-00'),
(126, 'MK', 'MACEDONIA, THE FORMER YUGOSLAV REPUBLIC OF', 'Macedonia, the Former Yugoslav Republic of', 'MKD', 807, 389, '1', '0000-00-00', '0000-00-00'),
(127, 'MG', 'MADAGASCAR', 'Madagascar', 'MDG', 450, 261, '1', '0000-00-00', '0000-00-00'),
(128, 'MW', 'MALAWI', 'Malawi', 'MWI', 454, 265, '1', '0000-00-00', '0000-00-00'),
(129, 'MY', 'MALAYSIA', 'Malaysia', 'MYS', 458, 60, '1', '0000-00-00', '0000-00-00'),
(130, 'MV', 'MALDIVES', 'Maldives', 'MDV', 462, 960, '1', '0000-00-00', '0000-00-00'),
(131, 'ML', 'MALI', 'Mali', 'MLI', 466, 223, '1', '0000-00-00', '0000-00-00'),
(132, 'MT', 'MALTA', 'Malta', 'MLT', 470, 356, '1', '0000-00-00', '0000-00-00'),
(133, 'MH', 'MARSHALL ISLANDS', 'Marshall Islands', 'MHL', 584, 692, '1', '0000-00-00', '0000-00-00'),
(134, 'MQ', 'MARTINIQUE', 'Martinique', 'MTQ', 474, 596, '1', '0000-00-00', '0000-00-00'),
(135, 'MR', 'MAURITANIA', 'Mauritania', 'MRT', 478, 222, '1', '0000-00-00', '0000-00-00'),
(136, 'MU', 'MAURITIUS', 'Mauritius', 'MUS', 480, 230, '1', '0000-00-00', '0000-00-00'),
(137, 'YT', 'MAYOTTE', 'Mayotte', NULL, NULL, 269, '1', '0000-00-00', '0000-00-00'),
(138, 'MX', 'MEXICO', 'Mexico', 'MEX', 484, 52, '1', '0000-00-00', '0000-00-00'),
(139, 'FM', 'MICRONESIA, FEDERATED STATES OF', 'Micronesia, Federated States of', 'FSM', 583, 691, '1', '0000-00-00', '0000-00-00'),
(140, 'MD', 'MOLDOVA, REPUBLIC OF', 'Moldova, Republic of', 'MDA', 498, 373, '1', '0000-00-00', '0000-00-00'),
(141, 'MC', 'MONACO', 'Monaco', 'MCO', 492, 377, '1', '0000-00-00', '0000-00-00'),
(142, 'MN', 'MONGOLIA', 'Mongolia', 'MNG', 496, 976, '1', '0000-00-00', '0000-00-00'),
(143, 'MS', 'MONTSERRAT', 'Montserrat', 'MSR', 500, 1664, '1', '0000-00-00', '0000-00-00'),
(144, 'MA', 'MOROCCO', 'Morocco', 'MAR', 504, 212, '1', '0000-00-00', '0000-00-00'),
(145, 'MZ', 'MOZAMBIQUE', 'Mozambique', 'MOZ', 508, 258, '1', '0000-00-00', '0000-00-00'),
(146, 'MM', 'MYANMAR', 'Myanmar', 'MMR', 104, 95, '1', '0000-00-00', '0000-00-00'),
(147, 'NA', 'NAMIBIA', 'Namibia', 'NAM', 516, 264, '1', '0000-00-00', '0000-00-00'),
(148, 'NR', 'NAURU', 'Nauru', 'NRU', 520, 674, '1', '0000-00-00', '0000-00-00'),
(149, 'NP', 'NEPAL', 'Nepal', 'NPL', 524, 977, '1', '0000-00-00', '0000-00-00'),
(150, 'NL', 'NETHERLANDS', 'Netherlands', 'NLD', 528, 31, '1', '0000-00-00', '0000-00-00'),
(151, 'AN', 'NETHERLANDS ANTILLES', 'Netherlands Antilles', 'ANT', 530, 599, '1', '0000-00-00', '0000-00-00'),
(152, 'NC', 'NEW CALEDONIA', 'New Caledonia', 'NCL', 540, 687, '1', '0000-00-00', '0000-00-00'),
(153, 'NZ', 'NEW ZEALAND', 'New Zealand', 'NZL', 554, 64, '1', '0000-00-00', '0000-00-00'),
(154, 'NI', 'NICARAGUA', 'Nicaragua', 'NIC', 558, 505, '1', '0000-00-00', '0000-00-00'),
(155, 'NE', 'NIGER', 'Niger', 'NER', 562, 227, '1', '0000-00-00', '0000-00-00'),
(156, 'NG', 'NIGERIA', 'Nigeria', 'NGA', 566, 234, '1', '0000-00-00', '0000-00-00'),
(157, 'NU', 'NIUE', 'Niue', 'NIU', 570, 683, '1', '0000-00-00', '0000-00-00'),
(158, 'NF', 'NORFOLK ISLAND', 'Norfolk Island', 'NFK', 574, 672, '1', '0000-00-00', '0000-00-00'),
(159, 'MP', 'NORTHERN MARIANA ISLANDS', 'Northern Mariana Islands', 'MNP', 580, 1670, '1', '0000-00-00', '0000-00-00'),
(160, 'NO', 'NORWAY', 'Norway', 'NOR', 578, 47, '1', '0000-00-00', '0000-00-00'),
(161, 'OM', 'OMAN', 'Oman', 'OMN', 512, 968, '1', '0000-00-00', '0000-00-00'),
(162, 'PK', 'PAKISTAN', 'Pakistan', 'PAK', 586, 92, '1', '0000-00-00', '0000-00-00'),
(163, 'PW', 'PALAU', 'Palau', 'PLW', 585, 680, '1', '0000-00-00', '0000-00-00'),
(164, 'PS', 'PALESTINIAN TERRITORY, OCCUPIED', 'Palestinian Territory, Occupied', NULL, NULL, 970, '1', '0000-00-00', '0000-00-00'),
(165, 'PA', 'PANAMA', 'Panama', 'PAN', 591, 507, '1', '0000-00-00', '0000-00-00'),
(166, 'PG', 'PAPUA NEW GUINEA', 'Papua New Guinea', 'PNG', 598, 675, '1', '0000-00-00', '0000-00-00'),
(167, 'PY', 'PARAGUAY', 'Paraguay', 'PRY', 600, 595, '1', '0000-00-00', '0000-00-00'),
(168, 'PE', 'PERU', 'Peru', 'PER', 604, 51, '1', '0000-00-00', '0000-00-00'),
(169, 'PH', 'PHILIPPINES', 'Philippines', 'PHL', 608, 63, '1', '0000-00-00', '0000-00-00'),
(171, 'PL', 'POLAND', 'Poland', 'POL', 616, 48, '1', '0000-00-00', '0000-00-00'),
(172, 'PT', 'PORTUGAL', 'Portugal', 'PRT', 620, 351, '1', '0000-00-00', '0000-00-00'),
(173, 'PR', 'PUERTO RICO', 'Puerto Rico', 'PRI', 630, 1787, '1', '0000-00-00', '0000-00-00'),
(174, 'QA', 'QATAR', 'Qatar', 'QAT', 634, 974, '1', '0000-00-00', '0000-00-00'),
(175, 'RE', 'REUNION', 'Reunion', 'REU', 638, 262, '1', '0000-00-00', '0000-00-00'),
(176, 'RO', 'ROMANIA', 'Romania', 'ROM', 642, 40, '1', '0000-00-00', '0000-00-00'),
(177, 'RU', 'RUSSIAN FEDERATION', 'Russian Federation', 'RUS', 643, 70, '1', '0000-00-00', '0000-00-00'),
(178, 'RW', 'RWANDA', 'Rwanda', 'RWA', 646, 250, '1', '0000-00-00', '0000-00-00'),
(179, 'SH', 'SAINT HELENA', 'Saint Helena', 'SHN', 654, 290, '1', '0000-00-00', '0000-00-00'),
(180, 'KN', 'SAINT KITTS AND NEVIS', 'Saint Kitts and Nevis', 'KNA', 659, 1869, '1', '0000-00-00', '0000-00-00'),
(181, 'LC', 'SAINT LUCIA', 'Saint Lucia', 'LCA', 662, 1758, '1', '0000-00-00', '0000-00-00'),
(182, 'PM', 'SAINT PIERRE AND MIQUELON', 'Saint Pierre and Miquelon', 'SPM', 666, 508, '1', '0000-00-00', '0000-00-00'),
(183, 'VC', 'SAINT VINCENT AND THE GRENADINES', 'Saint Vincent and the Grenadines', 'VCT', 670, 1784, '1', '0000-00-00', '0000-00-00'),
(184, 'WS', 'SAMOA', 'Samoa', 'WSM', 882, 684, '1', '0000-00-00', '0000-00-00'),
(185, 'SM', 'SAN MARINO', 'San Marino', 'SMR', 674, 378, '1', '0000-00-00', '0000-00-00'),
(186, 'ST', 'SAO TOME AND PRINCIPE', 'Sao Tome and Principe', 'STP', 678, 239, '1', '0000-00-00', '0000-00-00'),
(187, 'SA', 'SAUDI ARABIA', 'Saudi Arabia', 'SAU', 682, 966, '1', '0000-00-00', '0000-00-00'),
(188, 'SN', 'SENEGAL', 'Senegal', 'SEN', 686, 221, '1', '0000-00-00', '0000-00-00'),
(189, 'CS', 'SERBIA AND MONTENEGRO', 'Serbia and Montenegro', NULL, NULL, 381, '1', '0000-00-00', '0000-00-00'),
(190, 'SC', 'SEYCHELLES', 'Seychelles', 'SYC', 690, 248, '1', '0000-00-00', '0000-00-00'),
(191, 'SL', 'SIERRA LEONE', 'Sierra Leone', 'SLE', 694, 232, '1', '0000-00-00', '0000-00-00'),
(192, 'SG', 'SINGAPORE', 'Singapore', 'SGP', 702, 65, '1', '0000-00-00', '0000-00-00'),
(193, 'SK', 'SLOVAKIA', 'Slovakia', 'SVK', 703, 421, '1', '0000-00-00', '0000-00-00'),
(194, 'SI', 'SLOVENIA', 'Slovenia', 'SVN', 705, 386, '1', '0000-00-00', '0000-00-00'),
(195, 'SB', 'SOLOMON ISLANDS', 'Solomon Islands', 'SLB', 90, 677, '1', '0000-00-00', '0000-00-00'),
(196, 'SO', 'SOMALIA', 'Somalia', 'SOM', 706, 252, '1', '0000-00-00', '0000-00-00'),
(197, 'ZA', 'SOUTH AFRICA', 'South Africa', 'ZAF', 710, 27, '1', '0000-00-00', '0000-00-00'),
(199, 'ES', 'SPAIN', 'Spain', 'ESP', 724, 34, '1', '0000-00-00', '0000-00-00'),
(200, 'LK', 'SRI LANKA', 'Sri Lanka', 'LKA', 144, 94, '1', '0000-00-00', '0000-00-00'),
(201, 'SD', 'SUDAN', 'Sudan', 'SDN', 736, 249, '1', '0000-00-00', '0000-00-00'),
(202, 'SR', 'SURINAME', 'Suriname', 'SUR', 740, 597, '1', '0000-00-00', '0000-00-00'),
(203, 'SJ', 'SVALBARD AND JAN MAYEN', 'Svalbard and Jan Mayen', 'SJM', 744, 47, '1', '0000-00-00', '0000-00-00'),
(204, 'SZ', 'SWAZILAND', 'Swaziland', 'SWZ', 748, 268, '1', '0000-00-00', '0000-00-00'),
(205, 'SE', 'SWEDEN', 'Sweden', 'SWE', 752, 46, '1', '0000-00-00', '0000-00-00'),
(206, 'CH', 'SWITZERLAND', 'Switzerland', 'CHE', 756, 41, '1', '0000-00-00', '0000-00-00'),
(207, 'SY', 'SYRIAN ARAB REPUBLIC', 'Syrian Arab Republic', 'SYR', 760, 963, '1', '0000-00-00', '0000-00-00'),
(208, 'TW', 'TAIWAN, PROVINCE OF CHINA', 'Taiwan, Province of China', 'TWN', 158, 886, '1', '0000-00-00', '0000-00-00'),
(209, 'TJ', 'TAJIKISTAN', 'Tajikistan', 'TJK', 762, 992, '1', '0000-00-00', '0000-00-00'),
(210, 'TZ', 'TANZANIA, UNITED REPUBLIC OF', 'Tanzania, United Republic of', 'TZA', 834, 255, '1', '0000-00-00', '0000-00-00'),
(211, 'TH', 'THAILAND', 'Thailand', 'THA', 764, 66, '1', '0000-00-00', '0000-00-00'),
(212, 'TL', 'TIMOR-LESTE', 'Timor-Leste', NULL, NULL, 670, '1', '0000-00-00', '0000-00-00'),
(213, 'TG', 'TOGO', 'Togo', 'TGO', 768, 228, '1', '0000-00-00', '0000-00-00'),
(214, 'TK', 'TOKELAU', 'Tokelau', 'TKL', 772, 690, '1', '0000-00-00', '0000-00-00'),
(215, 'TO', 'TONGA', 'Tonga', 'TON', 776, 676, '1', '0000-00-00', '0000-00-00'),
(216, 'TT', 'TRINIDAD AND TOBAGO', 'Trinidad and Tobago', 'TTO', 780, 1868, '1', '0000-00-00', '0000-00-00'),
(217, 'TN', 'TUNISIA', 'Tunisia', 'TUN', 788, 216, '1', '0000-00-00', '0000-00-00'),
(218, 'TR', 'TURKEY', 'Turkey', 'TUR', 792, 90, '1', '0000-00-00', '0000-00-00'),
(219, 'TM', 'TURKMENISTAN', 'Turkmenistan', 'TKM', 795, 7370, '1', '0000-00-00', '0000-00-00'),
(220, 'TC', 'TURKS AND CAICOS ISLANDS', 'Turks and Caicos Islands', 'TCA', 796, 1649, '1', '0000-00-00', '0000-00-00'),
(221, 'TV', 'TUVALU', 'Tuvalu', 'TUV', 798, 688, '1', '0000-00-00', '0000-00-00'),
(222, 'UG', 'UGANDA', 'Uganda', 'UGA', 800, 256, '1', '0000-00-00', '0000-00-00'),
(223, 'UA', 'UKRAINE', 'Ukraine', 'UKR', 804, 380, '1', '0000-00-00', '0000-00-00'),
(224, 'AE', 'UNITED ARAB EMIRATES', 'United Arab Emirates', 'ARE', 784, 971, '1', '0000-00-00', '0000-00-00'),
(225, 'GB', 'UNITED KINGDOM', 'United Kingdom', 'GBR', 826, 44, '1', '0000-00-00', '0000-00-00'),
(226, 'US', 'UNITED STATES', 'United States', 'USA', 840, 1, '1', '0000-00-00', '0000-00-00'),
(227, 'UM', 'UNITED STATES MINOR OUTLYING ISLANDS', 'United States Minor Outlying Islands', NULL, NULL, 1, '1', '0000-00-00', '0000-00-00'),
(228, 'UY', 'URUGUAY', 'Uruguay', 'URY', 858, 598, '1', '0000-00-00', '0000-00-00'),
(229, 'UZ', 'UZBEKISTAN', 'Uzbekistan', 'UZB', 860, 998, '1', '0000-00-00', '0000-00-00'),
(230, 'VU', 'VANUATU', 'Vanuatu', 'VUT', 548, 678, '1', '0000-00-00', '0000-00-00'),
(231, 'VE', 'VENEZUELA', 'Venezuela', 'VEN', 862, 58, '1', '0000-00-00', '0000-00-00'),
(232, 'VN', 'VIET NAM', 'Viet Nam', 'VNM', 704, 84, '1', '0000-00-00', '2016-12-01'),
(233, 'VG', 'VIRGIN ISLANDS, BRITISH', 'Virgin Islands, British', 'VGB', 92, 1284, '1', '0000-00-00', '0000-00-00'),
(234, 'VI', 'VIRGIN ISLANDS, U.S.', 'Virgin Islands, U.s.', 'VIR', 850, 1340, '1', '0000-00-00', '0000-00-00'),
(235, 'WF', 'WALLIS AND FUTUNA', 'Wallis and Futuna', 'WLF', 876, 681, '1', '0000-00-00', '0000-00-00'),
(236, 'EH', 'WESTERN SAHARA', 'Western Sahara', 'ESH', 732, 212, '1', '0000-00-00', '2016-08-13'),
(237, 'YE', 'YEMEN', 'Yemen', 'YEM', 887, 967, '1', '0000-00-00', '2016-08-13');

-- --------------------------------------------------------

--
-- Table structure for table `ity_api_draft_tasks`
--

CREATE TABLE `ity_api_draft_tasks` (
  `draftID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `taskDetail` text NOT NULL,
  `createdDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ity_api_draft_tasks`
--

INSERT INTO `ity_api_draft_tasks` (`draftID`, `userID`, `taskDetail`, `createdDate`) VALUES
(1, 1, '{"taskName":"Post Moa111","orginatorID":"1","taskDescription":"","dueDate":"2016-11-12","toUsers":"1,2","ccUsers":"1,4","tags":"tag100,tag200"}', '2016-11-17 00:00:00'),
(2, 1, '{"taskName":"Post Moa111","orginatorID":"1","taskDescription":"","dueDate":"2016-11-12","toUsers":"1,2","ccUsers":"1,4","tags":"tag100,tag200"}', '2016-11-17 00:00:00'),
(3, 1, '{"taskName":"Draft Task","orginatorID":"1","taskDescription":"Draft Task Description","dueDate":"2016-11-20","toUsers":"1,2","ccUsers":"1,4","tags":"tag100,tag200,Tag300"}', '2016-11-18 00:00:00'),
(4, 1, '{"orginatorID":"1"}', '2016-11-18 00:00:00'),
(5, 1, '{"orginatorID":"1"}', '2016-11-18 00:00:00'),
(6, 2, '{"dueDate":"","orginatorID":"2","tags":"null","ccUsers":"null","taskDescription":"","taskName":"Draft testing","toUsers":"null"}', '2016-11-18 00:00:00'),
(7, 2, '{"dueDate":"","orginatorID":"2","tags":"null","ccUsers":"null","taskDescription":"","taskName":"Draft testing","toUsers":"null"}', '2016-11-18 00:00:00'),
(8, 2, '{"dueDate":"","orginatorID":"2","tags":"null","ccUsers":"null","taskDescription":"","taskName":"draft teting2","toUsers":"null"}', '2016-11-18 00:00:00'),
(9, 2, '{"dueDate":"","orginatorID":"2","tags":"null","ccUsers":"null","taskDescription":"","taskName":"draft teting2","toUsers":"null"}', '2016-11-18 00:00:00'),
(10, 2, '{"dueDate":"","orginatorID":"2","tags":"null","ccUsers":"null","taskDescription":"","taskName":"draft teting2","toUsers":"null"}', '2016-11-18 00:00:00'),
(11, 2, '{"dueDate":"","orginatorID":"2","tags":"null","ccUsers":"null","taskDescription":"","taskName":"draft teting2","toUsers":"null"}', '2016-11-18 00:00:00'),
(12, 2, '{"dueDate":"","orginatorID":"2","tags":"null","ccUsers":"null","taskDescription":"","taskName":"draft teting2","toUsers":"null"}', '2016-11-18 00:00:00'),
(13, 2, '{"dueDate":"","orginatorID":"2","tags":"null","ccUsers":"null","taskDescription":"","taskName":"draft teting2","toUsers":"null"}', '2016-11-18 00:00:00'),
(14, 2, '{"dueDate":"","orginatorID":"2","tags":"null","ccUsers":"null","taskDescription":"","taskName":"Drafts resting 3","toUsers":"null"}', '2016-11-18 00:00:00'),
(15, 2, '{"dueDate":"","orginatorID":"2","tags":"null","ccUsers":"null","taskDescription":"","taskName":"Drafts resting 3","toUsers":"null"}', '2016-11-18 00:00:00'),
(16, 2, '{"dueDate":"","orginatorID":"2","tags":"null","ccUsers":"null","taskDescription":"","taskName":"draft testing","toUsers":"2,"}', '2016-11-18 00:00:00'),
(17, 2, '{"dueDate":"","orginatorID":"2","tags":"null","ccUsers":"2,","taskDescription":"","taskName":"draft testing","toUsers":"2,"}', '2016-11-18 00:00:00'),
(18, 2, '{"dueDate":"18\\/11\\/2016 09:50:00 PM","orginatorID":"2","tags":"null","ccUsers":"2,","taskDescription":"","taskName":"draft testing","toUsers":"2,"}', '2016-11-18 00:00:00'),
(19, 2, '{"dueDate":"18\\/11\\/2016 09:50:00 PM","orginatorID":"2","tags":"null","ccUsers":"2,","taskDescription":"task created because of draft creating","taskName":"draft testing","toUsers":"2,"}', '2016-11-18 00:00:00'),
(20, 2, '{"dueDate":"","orginatorID":"2","tags":"null","ccUsers":"null","taskDescription":"","taskName":"xhxhhxbx","toUsers":"null"}', '2016-11-18 00:00:00'),
(21, 2, '{"dueDate":"","orginatorID":"2","tags":"null","ccUsers":"null","taskDescription":"","taskName":"dhdnxjjx","toUsers":"null"}', '2016-11-18 00:00:00'),
(22, 2, '{"dueDate":"","orginatorID":"2","tags":"null","ccUsers":"null","taskDescription":"","taskName":"fgghuuj","toUsers":"null"}', '2016-11-18 00:00:00'),
(23, 2, '{"dueDate":"","orginatorID":"2","tags":"null","ccUsers":"null","taskDescription":"","taskName":"draft6","toUsers":"null"}', '2016-11-18 00:00:00'),
(24, 2, '{"dueDate":"","orginatorID":"2","tags":"null","ccUsers":"null","taskDescription":"","taskName":"hxzbbzbs","toUsers":"null"}', '2016-11-18 00:00:00'),
(25, 2, '{"dueDate":"","orginatorID":"2","tags":"null","ccUsers":"null","taskDescription":"","taskName":"draft 8","toUsers":"null"}', '2016-11-18 00:00:00'),
(26, 2, '{"dueDate":"","orginatorID":"2","tags":"null","ccUsers":"null","taskDescription":"","taskName":"Google Analytics testing","toUsers":"null"}', '2016-11-19 00:00:00'),
(27, 2, '{"dueDate":"","orginatorID":"2","tags":"null","ccUsers":"null","taskDescription":"","taskName":"dhdhhdhdjd","toUsers":"null"}', '2016-11-22 00:00:00'),
(28, 2, '{"dueDate":"","orginatorID":"2","tags":"null","ccUsers":"null","taskDescription":"","taskName":"gkfk","toUsers":"null"}', '2016-11-22 00:00:00'),
(29, 1, '{"dueDate":"","orginatorID":"1","tags":"null","ccUsers":"null","taskDescription":"","taskName":"hhgss","toUsers":"null"}', '2016-11-24 00:00:00'),
(30, 2, '{"dueDate":"","orginatorID":"2","tags":"null","ccUsers":"null","taskDescription":"","taskName":"hjjj","toUsers":"null"}', '2016-11-26 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `ity_api_functionality_type_master`
--

CREATE TABLE `ity_api_functionality_type_master` (
  `functionalityTypeID` int(11) NOT NULL,
  `type` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ity_api_functionality_type_master`
--

INSERT INTO `ity_api_functionality_type_master` (`functionalityTypeID`, `type`) VALUES
(0, 'My To Do'),
(1, 'Individual'),
(2, 'Team'),
(3, 'Group'),
(4, 'Minutes of Metting');

-- --------------------------------------------------------

--
-- Table structure for table `ity_api_groups`
--

CREATE TABLE `ity_api_groups` (
  `groupName` varchar(255) NOT NULL,
  `groupDescription` text NOT NULL,
  `groupPhoto` varchar(255) NOT NULL,
  `createdDate` datetime NOT NULL,
  `modifiedDate` datetime NOT NULL,
  `status` enum('0','1') NOT NULL,
  `createdBy` int(11) NOT NULL,
  `groupID` int(11) NOT NULL,
  `actionTimeStamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ity_api_groups`
--

INSERT INTO `ity_api_groups` (`groupName`, `groupDescription`, `groupPhoto`, `createdDate`, `modifiedDate`, `status`, `createdBy`, `groupID`, `actionTimeStamp`) VALUES
('aaaaaqqq', 'xhxhxbnz', '{"photourl":"aHR0cDovL2l0YXNrdS5ib29rbXlob3VzZS5jby9pdGFza3lvdS8vbWVkaWEvYXBpdXNlcnMvcHJvZmlsZS8xNDgzNzkyMTM5LnBuZw=="}', '2017-01-07 00:00:00', '2017-01-09 15:22:04', '1', 130, 1, '2017-01-09 09:52:04'),
('aaaaaqqq', ',hhh,gg', '{"photourl":"aHR0cDovL2l0YXNrdS5ib29rbXlob3VzZS5jby9pdGFza3lvdS8vbWVkaWEvYXBpdXNlcnMvcHJvZmlsZS8xNDgzNzkyMzE0LnBuZw=="}', '2017-01-07 00:00:00', '2017-01-09 15:22:58', '1', 130, 2, '2017-01-09 09:52:58'),
('group', 'dhdhdndn', '{"photourl":"aHR0cDovL2l0YXNrdS5ib29rbXlob3VzZS5jby9pdGFza3lvdS8vbWVkaWEvYXBpdXNlcnMvcHJvZmlsZS8xNDgzNzkyMzY5LnBuZw=="}', '2017-01-07 00:00:00', '0000-00-00 00:00:00', '1', 130, 3, '2017-01-07 12:32:58'),
('halalaa', 'dudhdh', 'null', '2017-01-08 00:00:00', '0000-00-00 00:00:00', '1', 130, 4, '2017-01-08 10:05:44'),
('yyy', 'vbbb', 'null', '2017-01-08 00:00:00', '0000-00-00 00:00:00', '1', 130, 5, '2017-01-08 10:08:00'),
('ddkdkdkdkdkd', 'hello descdffjfjfjfjf', 'http://itasku.bookmyhouse.co/itaskyou//assets/images/logo.png', '2017-01-08 00:00:00', '0000-00-00 00:00:00', '1', 2, 6, '2017-01-08 10:09:23'),
('gejdndk', 'cnfnfn', 'null', '2017-01-08 00:00:00', '0000-00-00 00:00:00', '1', 130, 7, '2017-01-08 14:03:20'),
('Dhhdshhs', 'Zbzjjz', 'null', '2017-01-08 00:00:00', '0000-00-00 00:00:00', '1', 130, 8, '2017-01-08 15:49:48'),
('Ghjj', 'Yiio', 'null', '2017-01-09 00:00:00', '0000-00-00 00:00:00', '1', 2, 9, '2017-01-09 05:15:31'),
('Hello Sir', 'Halamddbsb', 'null', '2017-01-09 00:00:00', '0000-00-00 00:00:00', '1', 154, 10, '2017-01-09 05:34:52'),
('Hhh', 'Jrjfjfn', '{"photourl":"aHR0cDovL2l0YXNrdS5ib29rbXlob3VzZS5jby9pdGFza3lvdS8vbWVkaWEvYXBpdXNlcnMvcHJvZmlsZS8xNDgzOTQyNTIzLnBuZw=="}', '2017-01-09 00:00:00', '0000-00-00 00:00:00', '1', 154, 11, '2017-01-09 06:17:28'),
('Gghh', 'Ghhhj', 'null', '2017-01-09 00:00:00', '0000-00-00 00:00:00', '1', 154, 12, '2017-01-09 06:19:07'),
('Uuuhhh', 'Hhhh', '{"photourl":"aHR0cDovL2l0YXNrdS5ib29rbXlob3VzZS5jby9pdGFza3lvdS8vbWVkaWEvYXBpdXNlcnMvcHJvZmlsZS8xNDgzOTQyODExLnBuZw=="}', '2017-01-09 00:00:00', '0000-00-00 00:00:00', '1', 154, 13, '2017-01-09 06:20:16'),
('Ggvv', 'Tfffg', 'aHR0cDovL2l0YXNrdS5ib29rbXlob3VzZS5jby9pdGFza3lvdS8vbWVkaWEvYXBpdXNlcnMvcHJvZmlsZS8xNDgzOTQzODIyLnBuZw==', '2017-01-09 00:00:00', '0000-00-00 00:00:00', '1', 154, 14, '2017-01-09 06:37:24'),
('Ghhhv', 'Yhhhh', 'http://itasku.bookmyhouse.co/itaskyou//media/apiusers/profile/1483944487.png', '2017-01-09 00:00:00', '0000-00-00 00:00:00', '1', 154, 15, '2017-01-09 06:48:17'),
('Yyhhcnfn', 'Hhhg', '{"photourl":"aHR0cDovL2l0YXNrdS5ib29rbXlob3VzZS5jby9pdGFza3lvdS8vbWVkaWEvYXBpdXNlcnMvcHJvZmlsZS8xNDgzOTQ2MzQ4LnBuZw=="}', '2017-01-09 12:50:08', '0000-00-00 00:00:00', '1', 1, 16, '2017-01-09 07:20:08'),
('Test group by me', 'Ndnjfnf', 'http://itasku.bookmyhouse.co/itaskyou//media/apiusers/profile/1483946907.png', '2017-01-09 12:58:58', '0000-00-00 00:00:00', '1', 1, 17, '2017-01-09 07:28:58'),
('This is the group test', 'Jdjfjj', 'http://itasku.bookmyhouse.co/itaskyou//media/apiusers/profile/1483947548.png', '2017-01-09 13:09:50', '0000-00-00 00:00:00', '1', 1, 18, '2017-01-09 07:39:50'),
('Ehhddnjf', 'Hdhhd', 'null', '2017-01-09 13:17:51', '0000-00-00 00:00:00', '1', 1, 19, '2017-01-09 07:47:51'),
('yoga', 'Yoga class open here ....... ????', 'http://itasku.bookmyhouse.co/itaskyou//media/apiusers/profile/1483948327.png', '2017-01-09 13:24:03', '2017-01-09 18:19:13', '1', 1, 20, '2017-01-09 12:49:13'),
('Hello', 'Fufhdhdnn', 'null', '2017-01-09 15:47:38', '0000-00-00 00:00:00', '1', 2, 21, '2017-01-09 10:17:38'),
('Fyfhdh', 'Dh fbdbdn', 'http://itasku.bookmyhouse.co/itaskyou//media/apiusers/profile/1483957213.png', '2017-01-09 15:50:21', '0000-00-00 00:00:00', '1', 2, 22, '2017-01-09 10:20:21'),
('Ram lela group', 'Hhhh', 'http://itasku.bookmyhouse.co/itaskyou//media/apiusers/profile/1483966288.png', '2017-01-09 18:21:56', '0000-00-00 00:00:00', '1', 1, 23, '2017-01-09 12:51:56'),
('Djfnnd', 'Cncncnnxn', 'http://itasku.bookmyhouse.co/itaskyou//media/apiusers/profile/1483968061.png', '2017-01-09 18:51:34', '0000-00-00 00:00:00', '1', 2, 24, '2017-01-09 13:21:34'),
('My New Group', 'asdasdasdasd', 'http://itasku.bookmyhouse.co/itaskyou//assets/images/logo.png', '2017-01-11 15:04:36', '0000-00-00 00:00:00', '1', 1, 25, '2017-01-11 09:34:36'),
('My New Group222', 'asdasdasdasd', 'http://itasku.bookmyhouse.co/itaskyou//assets/images/logo.png', '2017-01-11 15:06:49', '0000-00-00 00:00:00', '1', 1, 26, '2017-01-11 09:36:49'),
('My New Group88', 'asdasdasdasd', 'http://itasku.bookmyhouse.co/itaskyou//assets/images/logo.png', '2017-01-11 15:07:10', '0000-00-00 00:00:00', '1', 1, 27, '2017-01-11 09:37:10'),
('Asif Group', 'asdasdasdasd', 'http://itasku.bookmyhouse.co/itaskyou//assets/images/logo.png', '2017-01-11 15:08:17', '0000-00-00 00:00:00', '1', 1, 28, '2017-01-11 09:38:17'),
('Asif Group3', 'asdasdasdasd', 'http://itasku.bookmyhouse.co/itaskyou//assets/images/logo.png', '2017-01-11 15:09:33', '0000-00-00 00:00:00', '1', 1, 29, '2017-01-11 09:39:33'),
('Asif Group34', 'asdasdasdasd', 'http://itasku.bookmyhouse.co/itaskyou//assets/images/logo.png', '2017-01-11 16:04:45', '0000-00-00 00:00:00', '1', 1, 30, '2017-01-11 10:34:45'),
('myNew Group', 'asxZxZxZXZX', 'http://itasku.bookmyhouse.co/itaskyou//assets/images/logo.png', '2017-01-11 16:59:41', '0000-00-00 00:00:00', '1', 1, 31, '2017-01-11 11:29:41'),
('myNew Group3', 'asxZxZxZXZX', 'http://itasku.bookmyhouse.co/itaskyou//assets/images/logo.png', '2017-01-11 17:26:36', '0000-00-00 00:00:00', '1', 4, 32, '2017-01-11 11:56:36'),
('myNew Group3', 'asxZxZxZXZX', 'http://itasku.bookmyhouse.co/itaskyou//assets/images/logo.png', '2017-01-11 17:27:00', '0000-00-00 00:00:00', '1', 2, 33, '2017-01-11 11:57:00'),
('myNew Group34', 'asxZxZxZXZX', 'http://itasku.bookmyhouse.co/itaskyou//assets/images/logo.png', '2017-01-11 17:27:13', '0000-00-00 00:00:00', '1', 1, 34, '2017-01-11 11:57:13');

-- --------------------------------------------------------

--
-- Table structure for table `ity_api_group_users`
--

CREATE TABLE `ity_api_group_users` (
  `groupUserID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `groupID` int(11) NOT NULL,
  `is_admin` enum('0','1') NOT NULL,
  `make_admin_by` int(11) NOT NULL COMMENT 'user id who made admin ',
  `groupCreator` enum('0','1') NOT NULL DEFAULT '0' COMMENT '1=Group Creator ',
  `exitTeam` enum('0','1') NOT NULL DEFAULT '0',
  `deleteTeam` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ity_api_group_users`
--

INSERT INTO `ity_api_group_users` (`groupUserID`, `userID`, `groupID`, `is_admin`, `make_admin_by`, `groupCreator`, `exitTeam`, `deleteTeam`) VALUES
(1, 130, 1, '1', 130, '1', '0', '0'),
(2, 2, 1, '0', 0, '0', '0', '0'),
(3, 0, 1, '0', 0, '0', '0', '0'),
(4, 130, 2, '1', 130, '1', '0', '0'),
(5, 1, 2, '0', 0, '0', '0', '0'),
(6, 2, 2, '0', 0, '0', '0', '0'),
(7, 0, 2, '0', 0, '0', '0', '0'),
(8, 130, 3, '1', 130, '1', '0', '0'),
(9, 2, 3, '0', 0, '0', '0', '0'),
(10, 0, 3, '0', 0, '0', '0', '0'),
(11, 130, 4, '1', 130, '1', '0', '0'),
(12, 1, 4, '0', 0, '0', '0', '0'),
(13, 2, 4, '0', 0, '0', '0', '0'),
(14, 138, 4, '0', 0, '0', '0', '0'),
(15, 0, 4, '0', 0, '0', '0', '0'),
(16, 130, 5, '1', 130, '1', '0', '0'),
(17, 2, 5, '0', 0, '0', '0', '0'),
(18, 0, 5, '0', 0, '0', '0', '0'),
(19, 2, 6, '1', 2, '1', '0', '0'),
(20, 3, 6, '0', 0, '0', '0', '0'),
(21, 4, 6, '0', 0, '0', '0', '0'),
(22, 130, 7, '1', 130, '1', '0', '0'),
(23, 2, 7, '0', 0, '0', '0', '0'),
(24, 138, 7, '0', 0, '0', '0', '0'),
(25, 0, 7, '0', 0, '0', '0', '0'),
(26, 130, 8, '1', 130, '1', '0', '0'),
(27, 138, 8, '0', 0, '0', '0', '0'),
(28, 0, 8, '0', 0, '0', '0', '0'),
(29, 2, 9, '1', 2, '1', '0', '0'),
(30, 1, 9, '0', 0, '0', '0', '0'),
(31, 0, 9, '0', 0, '0', '0', '0'),
(32, 154, 10, '1', 154, '1', '0', '0'),
(33, 2, 10, '0', 0, '0', '0', '0'),
(34, 138, 10, '0', 0, '0', '0', '0'),
(35, 0, 10, '0', 0, '0', '0', '0'),
(36, 154, 11, '1', 154, '1', '0', '0'),
(37, 2, 11, '0', 0, '0', '0', '0'),
(38, 0, 11, '0', 0, '0', '0', '0'),
(39, 3, 12, '1', 1, '1', '0', '0'),
(40, 3, 12, '1', 1, '0', '0', '0'),
(41, 3, 12, '1', 1, '0', '0', '0'),
(42, 3, 12, '1', 1, '0', '0', '0'),
(43, 154, 13, '1', 154, '1', '0', '0'),
(44, 138, 13, '0', 0, '0', '0', '0'),
(45, 0, 13, '0', 0, '0', '0', '0'),
(46, 154, 14, '1', 154, '1', '0', '0'),
(47, 0, 14, '0', 0, '0', '0', '0'),
(48, 154, 15, '1', 154, '1', '0', '0'),
(49, 138, 15, '0', 0, '0', '0', '0'),
(50, 0, 15, '0', 0, '0', '0', '0'),
(51, 1, 16, '1', 1, '1', '0', '0'),
(52, 129, 16, '0', 0, '0', '1', '0'),
(53, 128, 16, '0', 0, '0', '1', '0'),
(54, 130, 16, '0', 0, '0', '1', '0'),
(56, 1, 17, '1', 1, '1', '0', '0'),
(57, 129, 17, '0', 0, '0', '0', '0'),
(58, 128, 17, '0', 0, '0', '0', '0'),
(59, 130, 17, '0', 0, '0', '0', '0'),
(60, 0, 17, '0', 0, '0', '0', '0'),
(61, 1, 18, '1', 1, '1', '0', '0'),
(62, 129, 18, '0', 0, '0', '0', '0'),
(63, 130, 18, '0', 0, '0', '0', '0'),
(64, 0, 18, '0', 0, '0', '0', '0'),
(65, 1, 19, '1', 1, '1', '0', '0'),
(66, 129, 19, '0', 0, '0', '0', '0'),
(67, 0, 19, '0', 0, '0', '0', '0'),
(68, 1, 20, '1', 1, '1', '0', '0'),
(69, 129, 20, '0', 0, '0', '0', '0'),
(70, 128, 20, '0', 0, '0', '0', '0'),
(71, 130, 20, '0', 0, '0', '0', '0'),
(72, 144, 20, '0', 0, '0', '0', '0'),
(73, 2, 20, '0', 0, '0', '0', '0'),
(74, 2, 21, '1', 2, '1', '0', '0'),
(75, 1, 21, '0', 0, '0', '0', '0'),
(76, 138, 21, '0', 0, '0', '0', '0'),
(77, 2, 22, '1', 2, '1', '0', '0'),
(78, 1, 22, '0', 0, '0', '0', '0'),
(79, 138, 22, '0', 0, '0', '0', '0'),
(80, 128, 22, '0', 0, '0', '0', '0'),
(81, 1, 23, '1', 1, '1', '0', '0'),
(82, 129, 23, '0', 0, '0', '0', '0'),
(83, 130, 23, '0', 0, '0', '0', '0'),
(84, 2, 23, '0', 0, '0', '0', '0'),
(85, 2, 24, '1', 2, '1', '0', '0'),
(86, 138, 24, '0', 0, '0', '0', '0'),
(87, 1, 25, '1', 1, '1', '0', '0'),
(88, 2, 25, '0', 0, '0', '0', '0'),
(89, 3, 25, '0', 0, '0', '0', '0'),
(90, 4, 25, '0', 0, '0', '0', '0'),
(91, 1, 26, '1', 1, '1', '0', '0'),
(92, 2, 26, '0', 0, '0', '0', '0'),
(93, 3, 26, '0', 0, '0', '0', '0'),
(94, 4, 26, '0', 0, '0', '0', '0'),
(95, 1, 27, '1', 1, '1', '0', '0'),
(96, 2, 27, '0', 0, '0', '0', '0'),
(97, 3, 27, '0', 0, '0', '0', '0'),
(98, 4, 27, '0', 0, '0', '0', '0'),
(99, 1, 28, '1', 1, '1', '0', '0'),
(100, 2, 28, '0', 0, '0', '0', '0'),
(101, 3, 28, '0', 0, '0', '0', '0'),
(102, 4, 28, '0', 0, '0', '0', '0'),
(103, 1, 29, '1', 1, '1', '0', '0'),
(104, 2, 29, '0', 0, '0', '0', '0'),
(105, 3, 29, '0', 0, '0', '0', '0'),
(106, 4, 29, '0', 0, '0', '0', '0'),
(107, 1, 30, '1', 1, '1', '0', '0'),
(108, 5, 30, '0', 0, '0', '0', '0'),
(109, 6, 30, '0', 0, '0', '0', '0'),
(110, 1, 31, '1', 1, '1', '0', '0'),
(111, 10, 31, '0', 0, '0', '0', '0'),
(112, 12, 31, '0', 0, '0', '0', '0'),
(113, 13, 31, '0', 0, '0', '0', '0'),
(114, 4, 32, '1', 4, '1', '0', '0'),
(115, 10, 32, '0', 0, '0', '0', '0'),
(116, 12, 32, '0', 0, '0', '0', '0'),
(117, 13, 32, '0', 0, '0', '0', '0'),
(118, 2, 33, '1', 2, '1', '0', '0'),
(119, 10, 33, '0', 0, '0', '0', '0'),
(120, 12, 33, '0', 0, '0', '0', '0'),
(121, 13, 33, '0', 0, '0', '0', '0'),
(122, 1, 34, '1', 1, '1', '0', '0'),
(123, 10, 34, '0', 1, '0', '0', '0'),
(124, 12, 34, '1', 1, '0', '0', '0'),
(125, 13, 34, '1', 1, '0', '0', '0'),
(126, 2, 1, '0', 0, '0', '0', '0'),
(127, 3, 1, '0', 0, '0', '0', '0'),
(128, 4, 1, '0', 0, '0', '0', '0'),
(129, 2, 1, '0', 0, '0', '0', '0'),
(130, 3, 1, '0', 0, '0', '0', '0'),
(131, 4, 1, '0', 0, '0', '0', '0'),
(132, 2, 1, '0', 0, '0', '0', '0'),
(133, 3, 1, '0', 0, '0', '0', '0'),
(134, 4, 1, '0', 0, '0', '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `ity_api_hits_call`
--

CREATE TABLE `ity_api_hits_call` (
  `id` int(10) NOT NULL,
  `url` text NOT NULL,
  `request` text NOT NULL,
  `date` datetime NOT NULL,
  `userID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ity_api_hits_call`
--

INSERT INTO `ity_api_hits_call` (`id`, `url`, `request`, `date`, `userID`) VALUES
(1, '/android/MobileApi/change_group_params_value', '{"userID":"1","deviceID":"123123123123123","paramName":"groupName","paramValue":"asdasdasdZZZxZXZxZXZX","groupID":"20"}', '2017-01-09 18:07:38', 1),
(2, '/android/MobileApi/change_group_params_value', '{"userID":"1","deviceID":"123123123123123","paramName":"groupName","paramValue":"asdasdasdZZZxZXZxZXZX","groupID":"20"}', '2017-01-09 18:10:17', 1),
(3, '/android/MobileApi/change_group_params_value', '{"userID":"1","deviceID":"123123123123123","paramName":"groupName","paramValue":"asdasdasdZZZxZXZxZXZX","groupID":"20"}', '2017-01-09 18:11:17', 1),
(4, '/android/MobileApi/change_group_params_value', '{"userID":"1","deviceID":"123123123123123","paramName":"groupName","paramValue":"asdasdasdZZZxZXZxZXZX","groupID":"20"}', '2017-01-09 18:12:08', 1),
(5, '/android/MobileApi/change_group_params_value', '{"userID":"1","deviceID":"123123123123123","paramName":"groupName","paramValue":"asdasdasdZZZxZXZxZXZX","groupID":"20"}', '2017-01-09 18:12:39', 1),
(6, '/android/MobileApi/change_group_params_value', '{"userID":"1","deviceID":"123123123123123","paramName":"groupName","paramValue":"asdasdasdZZZxZXZxZXZX","groupID":"20"}', '2017-01-09 18:12:51', 1),
(7, '/android/MobileApi/change_group_params_value', '{"userID":"1","deviceID":"123123123123123","paramName":"groupName","paramValue":"asdasdasdZZZxZXZxZXZX","groupID":"20"}', '2017-01-09 18:15:49', 1),
(8, '/android/MobileApi/change_group_params_value', '{"userID":"1","deviceID":"123123123123123","paramName":"groupName","paramValue":"asdasdasdZZZxZXZxZXZX","groupID":"20"}', '2017-01-09 18:16:54', 1),
(9, '/android/MobileApi/MobileApi/change_group_params_value', '{"userID":"1","deviceID":"123123123123123","paramName":"groupName","paramValue":"yoga","groupID":"20"}', '2017-01-10 11:28:39', 1),
(10, '/android/MobileApi/change_group_params_value', '{"userID":"1","deviceID":"123123123123123","paramName":"groupName","paramValue":"yoga","groupID":"20"}', '2017-01-10 11:28:51', 1),
(11, '/android/MobileApi/change_group_params_value', '{"userID":"1","deviceID":"123123123123123","paramName":"groupName","paramValue":"yoga","groupID":"2"}', '2017-01-10 11:29:02', 1),
(12, '/android/MobileApi/change_group_params_value', '{"userID":"1","deviceID":"123123123123123","paramName":"groupAddMembers","paramValue":"yoga","groupID":"2"}', '2017-01-10 11:41:40', 1),
(13, '/android/MobileApi/change_group_params_value', '{"userID":"1","deviceID":"123123123123123","paramName":"groupExitGroup","paramValue":"yoga","groupID":"2"}', '2017-01-10 11:41:53', 1),
(14, '/android/MobileApi/change_group_params_value', '{"userID":"1","deviceID":"123123123123123","paramName":"addGroupMembers","paramValue":"1,2,3","groupID":"2"}', '2017-01-10 11:59:20', 1),
(15, '/android/MobileApi/change_group_params_value', '{"userID":"1","deviceID":"123123123123123","paramName":"addGroupMembers","paramValue":"1,2,3","groupID":"2"}', '2017-01-10 12:31:25', 1),
(16, '/android/MobileApi/MobileApi/get_tasks_at_home', '[]', '2017-01-11 10:30:01', 0),
(17, '/android/MobileApi/get_tasks_at_home', '[]', '2017-01-11 10:30:17', 0),
(18, '/android/MobileApi/get_tasks_at_home', '{"userID":"1"}', '2017-01-11 10:30:30', 1),
(19, '/android/MobileApi/get_tasks_at_home', '{"userID":"1","conatctNo":"9873878430","code":"91","deviceID":"356554061837833"}', '2017-01-11 10:38:55', 1),
(20, '/android/MobileApi/get_tasks_at_home', '{"userID":"1","contactNo":"9873878430","code":"91","deviceID":"356554061837833"}', '2017-01-11 10:39:13', 1),
(21, '/android/MobileApi/get_tasks_at_home', '{"userID":"1","contactNo":"9873878430","code":"91","deviceID":"356554061837833"}', '2017-01-11 11:49:03', 1),
(22, '/android/MobileApi/get_tasks_at_home', '{"userID":"1","contactNo":"9873878430","code":"91","deviceID":"356554061837833"}', '2017-01-11 11:53:24', 1),
(23, '/android/MobileApi/get_tasks_at_home', '{"userID":"1","contactNo":"9873878430","code":"91","deviceID":"356554061837833"}', '2017-01-11 11:55:33', 1),
(24, '/android/MobileApi/get_tasks_at_home', '{"userID":"1","contactNo":"9873878430","code":"91","deviceID":"356554061837833"}', '2017-01-11 11:55:48', 1),
(25, '/android/MobileApi/get_tasks_at_home', '{"userID":"1","contactNo":"9873878430","code":"91","deviceID":"356554061837833"}', '2017-01-11 11:56:23', 1),
(26, '/android/MobileApi/get_tasks_at_home', '{"userID":"1","contactNo":"9873878430","code":"91","deviceID":"356554061837833"}', '2017-01-11 11:58:25', 1),
(27, '/android/MobileApi/get_tasks_at_home', '{"userID":"1","contactNo":"9873878430","code":"91","deviceID":"356554061837833"}', '2017-01-11 11:59:06', 1),
(28, '/android/MobileApi/get_tasks_at_home', '{"userID":"1","contactNo":"9873878430","code":"91","deviceID":"356554061837833"}', '2017-01-11 11:59:41', 1),
(29, '/android/MobileApi/clean_all_tasks', '[]', '2017-01-11 12:06:35', 0),
(30, '/android/MobileApi/get_tasks_at_home', '{"userID":"1","contactNo":"9873878430","code":"91","deviceID":"356554061837833"}', '2017-01-11 12:06:41', 1),
(31, '/android/MobileApi/create_task', '[]', '2017-01-11 12:08:31', 0),
(32, '/android/MobileApi/create_task', '{"taskName":"chnage the database scheema","orginatorID":"1","taskDescription":"This is the test ","dueDate":"2016-01-12","toUsers":"2,3","ccUsers":"3,4","tag":"tag1,tag2"}', '2017-01-11 12:11:22', 1),
(33, '/android/MobileApi/create_task', '{"taskName":"chnage the database scheema","orginatorID":"1","taskDescription":"This is the test ","dueDate":"2016-01-12","toUsers":"2,3","ccUsers":"3,4","tags":"tag1,tag2"}', '2017-01-11 12:11:31', 1),
(34, '/android/MobileApi/get_tasks_at_home', '{"userID":"1","contactNo":"9873878430","code":"91","deviceID":"356554061837833"}', '2017-01-11 12:11:41', 1),
(35, '/android/MobileApi/get_tasks_at_home', '{"userID":"1","contactNo":"9873878430","code":"91","deviceID":"356554061837833"}', '2017-01-11 12:13:05', 1),
(36, '/android/MobileApi/get_tasks_at_home', '{"userID":"1","contactNo":"9873878430","code":"91","deviceID":"356554061837833"}', '2017-01-11 12:13:50', 1),
(37, '/android/MobileApi/create_task', '{"taskName":"desing issue in group detail screen","orginatorID":"1","taskDescription":"This is the test ","dueDate":"2016-01-12","toUsers":"4,5","ccUsers":"3,4","tags":"tag1,tag2"}', '2017-01-11 12:15:31', 1),
(38, '/android/MobileApi/get_tasks_at_home', '{"userID":"1","contactNo":"9873878430","code":"91","deviceID":"356554061837833"}', '2017-01-11 12:15:37', 1),
(39, '/android/MobileApi/create_task', '{"taskName":"desing issue in group detail screen2","orginatorID":"1","taskDescription":"This is the test ","dueDate":"2016-01-12","toUsers":"1","ccUsers":"3,4","tags":"tag1,tag2"}', '2017-01-11 12:15:46', 1),
(40, '/android/MobileApi/get_tasks_at_home', '{"userID":"1","contactNo":"9873878430","code":"91","deviceID":"356554061837833"}', '2017-01-11 12:15:49', 1),
(41, '/android/MobileApi/create_task', '{"taskName":"desing issue in group detail screen2","orginatorID":"1","taskDescription":"This is the test ","dueDate":"2016-01-12","toUsers":"5","ccUsers":"3,4","tags":"tag1,tag2"}', '2017-01-11 12:16:06', 1),
(42, '/android/MobileApi/get_tasks_at_home', '{"userID":"1","contactNo":"9873878430","code":"91","deviceID":"356554061837833"}', '2017-01-11 12:16:10', 1),
(43, '/android/MobileApi/create_task_in_a_group', '{"taskName":"desing issue in group detail screen2","orginatorID":"1","taskDescription":"This is the test ","dueDate":"2016-01-12","toUsers":"5","ccUsers":"3,4","tags":"tag1,tag2","groupID":"20"}', '2017-01-11 12:17:30', 1),
(44, '/android/MobileApi/create_task_in_a_group', '{"taskName":"groupTask","orginatorID":"1","taskDescription":"This is the test ","dueDate":"2016-01-12","toUsers":"5","ccUsers":"3,4","tags":"tag1,tag2","groupID":"20"}', '2017-01-11 12:17:46', 1),
(45, '/android/MobileApi/get_tasks_at_home', '{"userID":"1","contactNo":"9873878430","code":"91","deviceID":"356554061837833"}', '2017-01-11 12:17:51', 1),
(46, '/android/MobileApi/get_tasks_at_home', '{"userID":"1","contactNo":"9873878430","code":"91","deviceID":"356554061837833"}', '2017-01-11 12:19:18', 1),
(47, '/android/MobileApi/get_tasks_at_home', '{"userID":"1","contactNo":"9873878430","code":"91","deviceID":"356554061837833"}', '2017-01-11 12:22:39', 1),
(48, '/android/MobileApi/get_tasks_at_home', '{"userID":"1","contactNo":"9873878430","code":"91","deviceID":"356554061837833"}', '2017-01-11 12:22:41', 1),
(49, '/android/MobileApi/get_tasks_at_home', '{"userID":"1","contactNo":"9873878430","code":"91","deviceID":"356554061837833"}', '2017-01-11 12:24:54', 1),
(50, '/android/MobileApi/get_tasks_at_home', '{"userID":"1","contactNo":"9873878430","code":"91","deviceID":"356554061837833"}', '2017-01-11 12:25:03', 1),
(51, '/android/MobileApi/get_tasks_at_home', '{"userID":"1","contactNo":"9873878430","code":"91","deviceID":"356554061837833"}', '2017-01-11 12:25:48', 1),
(52, '/android/MobileApi/get_tasks_at_home', '{"userID":"1","contactNo":"9873878430","code":"91","deviceID":"356554061837833"}', '2017-01-11 12:26:15', 1),
(53, '/android/MobileApi/get_tasks_at_home', '{"userID":"1","contactNo":"9873878430","code":"91","deviceID":"356554061837833"}', '2017-01-11 12:26:47', 1),
(54, '/android/MobileApi/get_tasks_at_home', '{"userID":"1","contactNo":"9873878430","code":"91","deviceID":"356554061837833"}', '2017-01-11 12:27:02', 1),
(55, '/android/MobileApi/get_tasks_at_home', '{"userID":"1","contactNo":"9873878430","code":"91","deviceID":"356554061837833"}', '2017-01-11 12:30:22', 1),
(56, '/android/MobileApi/get_tasks_at_home', '{"userID":"1","contactNo":"9873878430","code":"91","deviceID":"356554061837833"}', '2017-01-11 12:30:25', 1),
(57, '/android/MobileApi/get_tasks_at_home', '{"userID":"1","contactNo":"9873878430","code":"91","deviceID":"356554061837833"}', '2017-01-11 12:30:42', 1),
(58, '/android/MobileApi/get_tasks_at_home', '{"userID":"1","contactNo":"9873878430","code":"91","deviceID":"356554061837833"}', '2017-01-11 12:31:14', 1),
(59, '/android/MobileApi/get_tasks_at_home', '{"userID":"1","contactNo":"9873878430","code":"91","deviceID":"356554061837833"}', '2017-01-11 12:31:17', 1),
(60, '/android/MobileApi/get_tasks_at_home', '{"userID":"1","contactNo":"9873878430","code":"91","deviceID":"356554061837833"}', '2017-01-11 12:31:35', 1),
(61, '/android/MobileApi/get_tasks_at_home', '{"userID":"1","contactNo":"9873878430","code":"91","deviceID":"356554061837833"}', '2017-01-11 12:31:58', 1),
(62, '/android/MobileApi/get_tasks_at_home', '{"userID":"1","contactNo":"9873878430","code":"91","deviceID":"356554061837833"}', '2017-01-11 12:32:23', 1),
(63, '/android/MobileApi/get_tasks_at_home', '{"userID":"1","contactNo":"9873878430","code":"91","deviceID":"356554061837833"}', '2017-01-11 12:33:22', 1),
(64, '/android/MobileApi/get_tasks_at_home', '{"userID":"1","contactNo":"9873878430","code":"91","deviceID":"356554061837833"}', '2017-01-11 12:33:44', 1),
(65, '/android/MobileApi/get_tasks_at_home', '{"userID":"1","contactNo":"9873878430","code":"91","deviceID":"356554061837833"}', '2017-01-11 12:33:58', 1),
(66, '/android/MobileApi/get_tasks_at_home', '{"userID":"1","contactNo":"9873878430","code":"91","deviceID":"356554061837833"}', '2017-01-11 12:34:21', 1),
(67, '/android/MobileApi/get_tasks_at_home', '{"userID":"1","contactNo":"9873878430","code":"91","deviceID":"356554061837833"}', '2017-01-11 12:35:45', 1),
(68, '/android/MobileApi/get_tasks_at_home', '{"userID":"1","contactNo":"9873878430","code":"91","deviceID":"356554061837833"}', '2017-01-11 12:37:12', 1),
(69, '/android/MobileApi/get_tasks_at_home', '{"userID":"1","contactNo":"9873878430","code":"91","deviceID":"356554061837833"}', '2017-01-11 12:39:27', 1),
(70, '/android/MobileApi/get_tasks_at_home', '{"userID":"1","contactNo":"9873878430","code":"91","deviceID":"356554061837833"}', '2017-01-11 12:40:43', 1),
(71, '/android/MobileApi/get_tasks_at_home', '{"userID":"1","contactNo":"9873878430","code":"91","deviceID":"356554061837833"}', '2017-01-11 12:42:28', 1),
(72, '/android/MobileApi/get_tasks_at_home', '{"userID":"1","contactNo":"9873878430","code":"91","deviceID":"356554061837833"}', '2017-01-11 12:43:24', 1),
(73, '/android/MobileApi/get_tasks_at_home', '{"userID":"1","contactNo":"9873878430","code":"91","deviceID":"356554061837833"}', '2017-01-11 12:43:57', 1),
(74, '/android/MobileApi/get_tasks_at_home', '{"userID":"1","contactNo":"9873878430","code":"91","deviceID":"356554061837833"}', '2017-01-11 12:47:10', 1),
(75, '/android/MobileApi/get_tasks_at_home', '{"userID":"1","contactNo":"9873878430","code":"91","deviceID":"356554061837833"}', '2017-01-11 12:47:31', 1),
(76, '/android/MobileApi/get_tasks_at_home', '{"userID":"1","contactNo":"9873878430","code":"91","deviceID":"356554061837833"}', '2017-01-11 12:47:33', 1),
(77, '/android/MobileApi/get_tasks_at_home', '{"userID":"1","contactNo":"9873878430","code":"91","deviceID":"356554061837833","tabval":"all"}', '2017-01-11 12:49:25', 1),
(78, '/android/MobileApi/get_tasks_at_home', '{"userID":"1","contactNo":"9873878430","code":"91","deviceID":"356554061837833","tabval":"tome"}', '2017-01-11 12:49:50', 1),
(79, '/android/MobileApi/get_tasks_at_home', '{"userID":"1","contactNo":"9873878430","code":"91","deviceID":"356554061837833","tabval":"byme"}', '2017-01-11 12:49:56', 1),
(80, '/android/MobileApi/get_tasks_at_home', '{"userID":"1","contactNo":"9873878430","code":"91","deviceID":"356554061837833","tabval":"all"}', '2017-01-11 12:50:07', 1),
(81, '/android/MobileApi/get_tasks_at_home', '{"userID":"1","contactNo":"9873878430","code":"91","deviceID":"356554061837833","tabval":"all"}', '2017-01-11 12:52:07', 1),
(82, '/android/MobileApi/get_tasks_at_home', '{"userID":"1","contactNo":"9873878430","code":"91","deviceID":"356554061837833","tabval":"all"}', '2017-01-11 13:00:35', 1),
(83, '/android/MobileApi/get_tasks_at_home', '{"userID":"1","contactNo":"9873878430","code":"91","deviceID":"356554061837833","tabval":"all"}', '2017-01-11 13:07:03', 1),
(84, '/android/MobileApi/get_tasks_at_home', '{"userID":"1","contactNo":"9873878430","code":"91","deviceID":"356554061837833","tabval":"all"}', '2017-01-11 13:08:17', 1),
(85, '/android/MobileApi/get_tasks_at_home', '{"userID":"1","contactNo":"9873878430","code":"91","deviceID":"356554061837833","tabval":"all"}', '2017-01-11 13:10:21', 1),
(86, '/android/MobileApi/get_tasks_at_home', '{"userID":"1","contactNo":"9873878430","code":"91","deviceID":"356554061837833","tabval":"all"}', '2017-01-11 13:18:45', 1),
(87, '/android/MobileApi/get_tasks_at_home', '{"userID":"1","contactNo":"9873878430","code":"91","deviceID":"356554061837833","tabval":"all"}', '2017-01-11 13:19:37', 1),
(88, '/android/MobileApi/get_tasks_at_home', '{"userID":"1","contactNo":"9873878430","code":"91","deviceID":"356554061837833","tabval":"all"}', '2017-01-11 13:19:44', 1),
(89, '/android/MobileApi/get_tasks_at_home', '{"userID":"1","contactNo":"9873878430","code":"91","deviceID":"356554061837833","tabval":"all"}', '2017-01-11 13:20:38', 1),
(90, '/android/MobileApi/get_tasks_at_home', '{"userID":"1","contactNo":"9873878430","code":"91","deviceID":"356554061837833","tabval":"all"}', '2017-01-11 13:21:10', 1),
(91, '/android/MobileApi/get_tasks_at_home', '{"userID":"1","contactNo":"9873878430","code":"91","deviceID":"356554061837833","tabval":"all"}', '2017-01-11 13:21:55', 1),
(92, '/android/MobileApi/get_tasks_at_home', '{"userID":"1","contactNo":"9873878430","code":"91","deviceID":"356554061837833","tabval":"all"}', '2017-01-11 13:22:16', 1),
(93, '/android/MobileApi/get_tasks_at_home', '{"userID":"1","contactNo":"9873878430","code":"91","deviceID":"356554061837833","tabval":"all"}', '2017-01-11 13:23:06', 1),
(94, '/android/MobileApi/get_tasks_at_home', '{"userID":"1","contactNo":"9873878430","code":"91","deviceID":"356554061837833","tabval":"all"}', '2017-01-11 13:23:47', 1),
(95, '/android/MobileApi/get_tasks_at_home', '{"userID":"1","contactNo":"9873878430","code":"91","deviceID":"356554061837833","tabval":"all"}', '2017-01-11 13:26:49', 1),
(96, '/android/MobileApi/get_tasks_at_home', '{"userID":"1","contactNo":"9873878430","code":"91","deviceID":"356554061837833","tabval":"all"}', '2017-01-11 13:29:26', 1),
(97, '/android/MobileApi/get_tasks_at_home', '{"userID":"1","contactNo":"9873878430","code":"91","deviceID":"356554061837833","tabval":"all"}', '2017-01-11 13:31:52', 1),
(98, '/android/MobileApi/get_tasks_at_home', '{"userID":"1","contactNo":"9873878430","code":"91","deviceID":"356554061837833","tabval":"all"}', '2017-01-11 13:32:03', 1),
(99, '/android/MobileApi/get_tasks_at_home', '{"userID":"1","contactNo":"9873878430","code":"91","deviceID":"356554061837833","tabval":"all"}', '2017-01-11 13:32:13', 1),
(100, '/android/MobileApi/get_tasks_at_home', '{"userID":"1","contactNo":"9873878430","code":"91","deviceID":"356554061837833","tabval":"all"}', '2017-01-11 13:32:41', 1),
(101, '/android/MobileApi/get_tasks_at_home', '{"userID":"1","contactNo":"9873878430","code":"91","deviceID":"356554061837833","tabval":"all"}', '2017-01-11 13:33:14', 1),
(102, '/android/MobileApi/get_tasks_at_home', '{"userID":"1","contactNo":"9873878430","code":"91","deviceID":"356554061837833","tabval":"all"}', '2017-01-11 13:33:31', 1),
(103, '/android/MobileApi/get_tasks_at_home', '{"userID":"1","contactNo":"9873878430","code":"91","deviceID":"356554061837833","tabval":"all"}', '2017-01-11 13:33:49', 1),
(104, '/android/MobileApi/get_tasks_at_home', '{"userID":"1","contactNo":"9873878430","code":"91","deviceID":"356554061837833","tabval":"all"}', '2017-01-11 13:34:38', 1),
(105, '/android/MobileApi/get_tasks_at_home', '{"userID":"1","contactNo":"9873878430","code":"91","deviceID":"356554061837833","tabval":"all"}', '2017-01-11 13:36:53', 1),
(106, '/android/MobileApi/get_tasks_at_home', '{"userID":"1","contactNo":"9873878430","code":"91","deviceID":"356554061837833","tabval":"all"}', '2017-01-11 13:49:52', 1),
(107, '/android/MobileApi/get_tasks_at_home', '{"userID":"1","contactNo":"9873878430","code":"91","deviceID":"356554061837833","tabval":"all"}', '2017-01-11 13:50:06', 1),
(108, '/android/MobileApi/get_tasks_at_home', '{"userID":"1","contactNo":"9873878430","code":"91","deviceID":"356554061837833","tabval":"all"}', '2017-01-11 13:52:04', 1),
(109, '/android/MobileApi/get_tasks_at_home', '{"userID":"1","contactNo":"9873878430","code":"91","deviceID":"356554061837833","tabval":"all"}', '2017-01-11 13:52:25', 1),
(110, '/android/MobileApi/get_tasks_at_home', '{"userID":"1","contactNo":"9873878430","code":"91","deviceID":"356554061837833","tabval":"all"}', '2017-01-11 13:53:20', 1),
(111, '/android/MobileApi/get_tasks_at_home', '{"userID":"1","contactNo":"9873878430","code":"91","deviceID":"356554061837833","tabval":"all"}', '2017-01-11 13:53:37', 1),
(112, '/android/MobileApi/get_tasks_at_home', '{"userID":"1","contactNo":"9873878430","code":"91","deviceID":"356554061837833","tabval":"all"}', '2017-01-11 13:54:42', 1),
(113, '/android/MobileApi/get_tasks_at_home', '{"userID":"1","contactNo":"9873878430","code":"91","deviceID":"356554061837833","tabval":"all"}', '2017-01-11 13:55:05', 1),
(114, '/android/MobileApi/get_tasks_at_home', '{"userID":"1","contactNo":"9873878430","code":"91","deviceID":"356554061837833","tabval":"all"}', '2017-01-11 13:55:11', 1),
(115, '/android/MobileApi/get_tasks_at_home', '{"userID":"1","contactNo":"9873878430","code":"91","deviceID":"356554061837833","tabval":"all"}', '2017-01-11 13:55:41', 1),
(116, '/android/MobileApi/get_tasks_at_home', '{"userID":"1","contactNo":"9873878430","code":"91","deviceID":"356554061837833","tabval":"all"}', '2017-01-11 13:56:18', 1),
(117, '/android/MobileApi/get_tasks_at_home', '{"userID":"1","contactNo":"9873878430","code":"91","deviceID":"356554061837833","tabval":"all"}', '2017-01-11 14:00:11', 1),
(118, '/android/MobileApi/get_tasks_at_home', '{"userID":"1","contactNo":"9873878430","code":"91","deviceID":"356554061837833","tabval":"all"}', '2017-01-11 15:03:14', 1),
(119, '/android/MobileApi/create_group', '[]', '2017-01-11 15:03:51', 0),
(120, '/android/MobileApi/create_group', '{"createdBy":"1","groupName":"My New Group","groupUsers":"2,3,4","groupDescription":"asdasdasdasd"}', '2017-01-11 15:04:36', 0),
(121, '/android/MobileApi/create_group', '{"createdBy":"1","groupName":"My New Group","groupUsers":"2,3,4","groupDescription":"asdasdasdasd"}', '2017-01-11 15:05:33', 0),
(122, '/android/MobileApi/get_tasks_at_home', '{"userID":"1","contactNo":"9873878430","code":"91","deviceID":"356554061837833","tabval":"all"}', '2017-01-11 15:05:37', 1),
(123, '/android/MobileApi/create_group', '{"createdBy":"1","groupName":"My New Group","groupUsers":"2,3,4","groupDescription":"asdasdasdasd"}', '2017-01-11 15:06:44', 0),
(124, '/android/MobileApi/create_group', '{"createdBy":"1","groupName":"My New Group222","groupUsers":"2,3,4","groupDescription":"asdasdasdasd"}', '2017-01-11 15:06:49', 0),
(125, '/android/MobileApi/create_group', '{"createdBy":"1","groupName":"My New Group222","groupUsers":"2,3,4","groupDescription":"asdasdasdasd"}', '2017-01-11 15:07:04', 0),
(126, '/android/MobileApi/create_group', '{"createdBy":"1","groupName":"My New Group88","groupUsers":"2,3,4","groupDescription":"asdasdasdasd"}', '2017-01-11 15:07:10', 0),
(127, '/android/MobileApi/get_tasks_at_home', '{"userID":"1","contactNo":"9873878430","code":"91","deviceID":"356554061837833","tabval":"all"}', '2017-01-11 15:07:35', 1),
(128, '/android/MobileApi/get_tasks_at_home', '{"userID":"1","contactNo":"9873878430","code":"91","deviceID":"356554061837833","tabval":"all"}', '2017-01-11 15:08:04', 1),
(129, '/android/MobileApi/create_group', '{"createdBy":"1","groupName":"My New Group88","groupUsers":"2,3,4","groupDescription":"asdasdasdasd"}', '2017-01-11 15:08:08', 0),
(130, '/android/MobileApi/create_group', '{"createdBy":"1","groupName":"Asif Group","groupUsers":"2,3,4","groupDescription":"asdasdasdasd"}', '2017-01-11 15:08:17', 0),
(131, '/android/MobileApi/get_tasks_at_home', '{"userID":"1","contactNo":"9873878430","code":"91","deviceID":"356554061837833","tabval":"all"}', '2017-01-11 15:09:09', 1),
(132, '/android/MobileApi/create_group', '{"createdBy":"1","groupName":"Asif Group3","groupUsers":"2,3,4","groupDescription":"asdasdasdasd"}', '2017-01-11 15:09:33', 0),
(133, '/android/MobileApi/get_tasks_at_home', '{"userID":"1","contactNo":"9873878430","code":"91","deviceID":"356554061837833","tabval":"all"}', '2017-01-11 15:09:36', 1),
(134, '/android/MobileApi/get_tasks_at_home', '{"userID":"1","contactNo":"9873878430","code":"91","deviceID":"356554061837833","tabval":"all"}', '2017-01-11 15:18:50', 1),
(135, '/android/MobileApi/get_tasks_at_home', '{"userID":"1","contactNo":"9873878430","code":"91","deviceID":"356554061837833","tabval":"all"}', '2017-01-11 15:19:13', 1),
(136, '/android/MobileApi/get_tasks_at_home', '{"userID":"1","contactNo":"9873878430","code":"91","deviceID":"356554061837833","tabval":"all"}', '2017-01-11 15:19:38', 1),
(137, '/android/MobileApi/get_tasks_at_home', '{"userID":"1","contactNo":"9873878430","code":"91","deviceID":"356554061837833","tabval":"all"}', '2017-01-11 15:22:12', 1),
(138, '/android/MobileApi/get_tasks_at_home', '{"userID":"1","contactNo":"9873878430","code":"91","deviceID":"356554061837833","tabval":"all"}', '2017-01-11 15:23:12', 1),
(139, '/android/MobileApi/get_tasks_at_home', '{"userID":"1","contactNo":"9873878430","code":"91","deviceID":"356554061837833","tabval":"all"}', '2017-01-11 15:24:49', 1),
(140, '/android/MobileApi/get_tasks_at_home', '{"userID":"1","contactNo":"9873878430","code":"91","deviceID":"356554061837833","tabval":"all"}', '2017-01-11 15:33:19', 1),
(141, '/android/MobileApi/get_tasks_at_home', '{"userID":"1","contactNo":"9873878430","code":"91","deviceID":"356554061837833","tabval":"all"}', '2017-01-11 15:33:39', 1),
(142, '/android/MobileApi/get_tasks_at_home', '{"userID":"1","contactNo":"9873878430","code":"91","deviceID":"356554061837833","tabval":"all"}', '2017-01-11 16:00:50', 1),
(143, '/android/MobileApi/get_tasks_at_home', '{"userID":"1","contactNo":"9873878430","code":"91","deviceID":"356554061837833","tabval":"all"}', '2017-01-11 16:01:15', 1),
(144, '/android/MobileApi/get_tasks_at_home', '{"userID":"1","contactNo":"9873878430","code":"91","deviceID":"356554061837833","tabval":"all"}', '2017-01-11 16:01:25', 1),
(145, '/android/MobileApi/get_tasks_at_home', '{"userID":"1","contactNo":"9873878430","code":"91","deviceID":"356554061837833","tabval":"all"}', '2017-01-11 16:01:46', 1),
(146, '/android/MobileApi/get_tasks_at_home', '{"userID":"1","contactNo":"9873878430","code":"91","deviceID":"356554061837833","tabval":"all"}', '2017-01-11 16:02:39', 1),
(147, '/android/MobileApi/get_tasks_at_home', '{"userID":"1","contactNo":"9873878430","code":"91","deviceID":"356554061837833","tabval":"all"}', '2017-01-11 16:03:01', 1),
(148, '/android/MobileApi/get_tasks_at_home', '{"userID":"1","contactNo":"9873878430","code":"91","deviceID":"356554061837833","tabval":"all"}', '2017-01-11 16:03:16', 1),
(149, '/android/MobileApi/get_tasks_at_home', '{"userID":"1","contactNo":"9873878430","code":"91","deviceID":"356554061837833","tabval":"all"}', '2017-01-11 16:03:34', 1),
(150, '/android/MobileApi/get_tasks_at_home', '{"userID":"1","contactNo":"9873878430","code":"91","deviceID":"356554061837833","tabval":"all"}', '2017-01-11 16:04:08', 1),
(151, '/android/MobileApi/create_group', '{"createdBy":"1","groupName":"Asif Group3","groupUsers":"5,6","groupDescription":"asdasdasdasd"}', '2017-01-11 16:04:40', 0),
(152, '/android/MobileApi/create_group', '{"createdBy":"1","groupName":"Asif Group34","groupUsers":"5,6","groupDescription":"asdasdasdasd"}', '2017-01-11 16:04:45', 0),
(153, '/android/MobileApi/get_tasks_at_home', '{"userID":"1","contactNo":"9873878430","code":"91","deviceID":"356554061837833","tabval":"all"}', '2017-01-11 16:04:50', 1),
(154, '/android/MobileApi/get_tasks_at_home', '{"userID":"1","contactNo":"9873878430","code":"91","deviceID":"356554061837833","tabval":"all"}', '2017-01-11 16:05:30', 1),
(155, '/android/MobileApi/get_tasks_at_home', '{"userID":"1","contactNo":"9873878430","code":"91","deviceID":"356554061837833","tabval":"all"}', '2017-01-11 16:07:21', 1),
(156, '/android/MobileApi/get_tasks_at_home', '{"userID":"1","contactNo":"9873878430","code":"91","deviceID":"356554061837833","tabval":"all"}', '2017-01-11 16:07:40', 1),
(157, '/android/MobileApi/get_tasks_at_home', '{"userID":"1","contactNo":"9873878430","code":"91","deviceID":"356554061837833","tabval":"all"}', '2017-01-11 16:07:52', 1),
(158, '/android/MobileApi/get_tasks_at_home', '{"userID":"1","contactNo":"9873878430","code":"91","deviceID":"356554061837833","tabval":"all"}', '2017-01-11 16:08:29', 1),
(159, '/android/MobileApi/get_tasks_at_home', '{"userID":"1","contactNo":"9873878430","code":"91","deviceID":"356554061837833","tabval":"all"}', '2017-01-11 16:10:24', 1),
(160, '/android/MobileApi/get_tasks_at_home', '{"userID":"1","contactNo":"9873878430","code":"91","deviceID":"356554061837833","tabval":"all"}', '2017-01-11 16:10:42', 1),
(161, '/android/MobileApi/get_tasks_at_home', '{"userID":"1","contactNo":"9873878430","code":"91","deviceID":"356554061837833","tabval":"all"}', '2017-01-11 16:11:11', 1),
(162, '/android/MobileApi/get_tasks_at_home', '{"userID":"1","contactNo":"9873878430","code":"91","deviceID":"356554061837833","tabval":"all"}', '2017-01-11 16:13:50', 1),
(163, '/android/MobileApi/create_task_in_a_group', '{"taskName":"desing issue in group detail screen2","orginatorID":"1","taskDescription":"This is the test ","dueDate":"2016-01-12","toUsers":"5","ccUsers":"3,4","tags":"tag1,tag2","groupID":"29"}', '2017-01-11 16:15:03', 1),
(164, '/android/MobileApi/create_task_in_a_group', '{"taskName":"desing issue in group detail screen2","orginatorID":"1","taskDescription":"This is the test ","dueDate":"2016-01-12","toUsers":"5","ccUsers":"3,4","tags":"tag1,tag2","groupID":"29"}', '2017-01-11 16:18:16', 1),
(165, '/android/MobileApi/get_tasks_at_home', '{"userID":"1","contactNo":"9873878430","code":"91","deviceID":"356554061837833","tabval":"all"}', '2017-01-11 16:19:50', 1),
(166, '/android/MobileApi/create_task_in_a_group', '{"taskName":"desing issue in group detail screen2","orginatorID":"1","taskDescription":"task29","dueDate":"2016-01-12","toUsers":"5","ccUsers":"3,4","tags":"tag1,tag2","groupID":"29"}', '2017-01-11 16:22:20', 1),
(167, '/android/MobileApi/get_tasks_at_home', '{"userID":"1","contactNo":"9873878430","code":"91","deviceID":"356554061837833","tabval":"all"}', '2017-01-11 16:22:31', 1),
(168, '/android/MobileApi/get_tasks_at_home', '{"userID":"1","contactNo":"9873878430","code":"91","deviceID":"356554061837833","tabval":"all"}', '2017-01-11 16:22:34', 1),
(169, '/android/MobileApi/get_tasks_at_home', '{"userID":"1","contactNo":"9873878430","code":"91","deviceID":"356554061837833","tabval":"all"}', '2017-01-11 16:24:13', 1),
(170, '/android/MobileApi/create_task_in_a_group', '{"taskName":"task29","orginatorID":"1","taskDescription":"task29","dueDate":"2016-01-12","toUsers":"1","ccUsers":"3,4","tags":"tag1,tag2","groupID":"29"}', '2017-01-11 16:28:20', 1),
(171, '/android/MobileApi/get_tasks_at_home', '{"userID":"1","contactNo":"9873878430","code":"91","deviceID":"356554061837833","tabval":"all"}', '2017-01-11 16:28:25', 1),
(172, '/android/MobileApi/get_tasks_at_home', '{"userID":"1","contactNo":"9873878430","code":"91","deviceID":"356554061837833","tabval":"all"}', '2017-01-11 16:29:35', 1),
(173, '/android/MobileApi/create_task_in_a_group', '{"taskName":"task292","orginatorID":"1","taskDescription":"task29","dueDate":"2016-01-12","toUsers":"1,3,5","ccUsers":"3,4","tags":"tag1,tag2","groupID":"29"}', '2017-01-11 16:30:07', 1),
(174, '/android/MobileApi/get_tasks_at_home', '{"userID":"1","contactNo":"9873878430","code":"91","deviceID":"356554061837833","tabval":"all"}', '2017-01-11 16:30:12', 1),
(175, '/android/MobileApi/get_tasks_at_home', '{"userID":"1","contactNo":"9873878430","code":"91","deviceID":"356554061837833","tabval":"all"}', '2017-01-11 16:30:42', 1),
(176, '/android/MobileApi/get_tasks_at_home', '{"userID":"1","contactNo":"9873878430","code":"91","deviceID":"356554061837833","tabval":"all"}', '2017-01-11 16:30:56', 1),
(177, '/android/MobileApi/get_tasks_at_home', '{"userID":"1","contactNo":"9873878430","code":"91","deviceID":"356554061837833","tabval":"all"}', '2017-01-11 16:31:40', 1),
(178, '/android/MobileApi/get_tasks_at_home', '{"userID":"1","contactNo":"9873878430","code":"91","deviceID":"356554061837833","tabval":"all"}', '2017-01-11 16:32:50', 1),
(179, '/android/MobileApi/get_tasks_at_home', '{"userID":"1","contactNo":"9873878430","code":"91","deviceID":"356554061837833","tabval":"all"}', '2017-01-11 16:33:02', 1),
(180, '/android/MobileApi/get_tasks_at_home', '{"userID":"1","contactNo":"9873878430","code":"91","deviceID":"356554061837833","tabval":"all"}', '2017-01-11 16:34:07', 1),
(181, '/android/MobileApi/create_task_in_a_group', '{"taskName":"task292","orginatorID":"1","taskDescription":"task29","dueDate":"2016-01-12","toUsers":"1,3,5","ccUsers":"3,4","tags":"tag1,tag2","groupID":"30"}', '2017-01-11 16:34:18', 1),
(182, '/android/MobileApi/get_tasks_at_home', '{"userID":"1","contactNo":"9873878430","code":"91","deviceID":"356554061837833","tabval":"all"}', '2017-01-11 16:34:21', 1),
(183, '/android/MobileApi/create_task_in_a_group', '{"taskName":"task292","orginatorID":"1","taskDescription":"task29","dueDate":"2016-01-12","toUsers":"1,3,5","ccUsers":"3,4","tags":"tag1,tag2","groupID":"29"}', '2017-01-11 16:34:42', 1),
(184, '/android/MobileApi/get_tasks_at_home', '{"userID":"1","contactNo":"9873878430","code":"91","deviceID":"356554061837833","tabval":"all"}', '2017-01-11 16:34:45', 1),
(185, '/android/MobileApi/get_tasks_at_home', '{"userID":"1","contactNo":"9873878430","code":"91","deviceID":"356554061837833","tabval":"all"}', '2017-01-11 16:34:58', 1),
(186, '/android/MobileApi/get_tasks_at_home', '{"userID":"1","contactNo":"9873878430","code":"91","deviceID":"356554061837833","tabval":"all"}', '2017-01-11 16:38:01', 1),
(187, '/android/MobileApi/get_tasks_at_home', '{"userID":"1","contactNo":"9873878430","code":"91","deviceID":"356554061837833","tabval":"all"}', '2017-01-11 16:38:55', 1),
(188, '/android/MobileApi/get_tasks_at_home', '{"userID":"1","contactNo":"9873878430","code":"91","deviceID":"356554061837833","tabval":"all"}', '2017-01-11 16:42:39', 1),
(189, '/android/MobileApi/get_tasks_at_home', '{"userID":"1","contactNo":"9873878430","code":"91","deviceID":"356554061837833","tabval":"all"}', '2017-01-11 16:43:44', 1),
(190, '/android/MobileApi/get_tasks_at_home', '{"userID":"1","contactNo":"9873878430","code":"91","deviceID":"356554061837833","tabval":"all"}', '2017-01-11 16:44:15', 1),
(191, '/android/MobileApi/get_tasks_at_home', '{"userID":"1","contactNo":"9873878430","code":"91","deviceID":"356554061837833","tabval":"all"}', '2017-01-11 16:44:23', 1),
(192, '/android/MobileApi/get_tasks_at_home', '{"userID":"1","contactNo":"9873878430","code":"91","deviceID":"356554061837833","tabval":"all"}', '2017-01-11 16:47:21', 1),
(193, '/android/MobileApi/get_tasks_at_home', '{"userID":"1","contactNo":"9873878430","code":"91","deviceID":"356554061837833","tabval":"all"}', '2017-01-11 16:48:42', 1),
(194, '/android/MobileApi/get_tasks_at_home', '{"userID":"1","contactNo":"9873878430","code":"91","deviceID":"356554061837833","tabval":"all"}', '2017-01-11 16:49:02', 1),
(195, '/android/MobileApi/get_tasks_at_home', '{"userID":"1","contactNo":"9873878430","code":"91","deviceID":"356554061837833","tabval":"all"}', '2017-01-11 16:49:20', 1),
(196, '/android/MobileApi/get_tasks_at_home', '{"userID":"1","contactNo":"9873878430","code":"91","deviceID":"356554061837833","tabval":"all"}', '2017-01-11 16:49:46', 1),
(197, '/android/MobileApi/get_tasks_at_home', '{"userID":"1","contactNo":"9873878430","code":"91","deviceID":"356554061837833","tabval":"all"}', '2017-01-11 16:50:23', 1),
(198, '/android/MobileApi/get_tasks_at_home', '{"userID":"1","contactNo":"9873878430","code":"91","deviceID":"356554061837833","tabval":"all"}', '2017-01-11 16:50:42', 1),
(199, '/android/MobileApi/get_tasks_at_home', '{"userID":"1","contactNo":"9873878430","code":"91","deviceID":"356554061837833","tabval":"all"}', '2017-01-11 16:51:00', 1),
(200, '/android/MobileApi/create_task_in_a_group', '{"taskName":"task292","orginatorID":"1","taskDescription":"task29","dueDate":"2016-01-12","toUsers":"1,3,5","ccUsers":"3,4","tags":"tag1,tag2","groupID":"28"}', '2017-01-11 16:51:13', 1),
(201, '/android/MobileApi/get_tasks_at_home', '{"userID":"1","contactNo":"9873878430","code":"91","deviceID":"356554061837833","tabval":"all"}', '2017-01-11 16:51:16', 1),
(202, '/android/MobileApi/create_task_in_a_group', '{"taskName":"task5454","orginatorID":"1","taskDescription":"task33erer","dueDate":"2016-01-12","toUsers":"10","ccUsers":"11","tags":"tag1,tag2","groupID":"28"}', '2017-01-11 16:51:43', 1),
(203, '/android/MobileApi/get_tasks_at_home', '{"userID":"1","contactNo":"9873878430","code":"91","deviceID":"356554061837833","tabval":"all"}', '2017-01-11 16:51:47', 1),
(204, '/android/MobileApi/create_task_in_a_group', '{"taskName":"task5454","orginatorID":"1","taskDescription":"task33erer","dueDate":"2016-01-12","toUsers":"10","ccUsers":"11","tags":"tag1,tag2","groupID":"20"}', '2017-01-11 16:53:25', 1),
(205, '/android/MobileApi/get_tasks_at_home', '{"userID":"1","contactNo":"9873878430","code":"91","deviceID":"356554061837833","tabval":"all"}', '2017-01-11 16:53:31', 1),
(206, '/android/MobileApi/create_task_in_a_group', '{"taskName":"task5454","orginatorID":"1","taskDescription":"task33erer","dueDate":"2016-01-12","toUsers":"10","ccUsers":"11","tags":"tag1,tag2","groupID":"29"}', '2017-01-11 16:53:48', 1),
(207, '/android/MobileApi/get_tasks_at_home', '{"userID":"1","contactNo":"9873878430","code":"91","deviceID":"356554061837833","tabval":"all"}', '2017-01-11 16:53:52', 1),
(208, '/android/MobileApi/get_tasks_at_home', '{"userID":"1","contactNo":"9873878430","code":"91","deviceID":"356554061837833","tabval":"all"}', '2017-01-11 16:55:18', 1),
(209, '/android/MobileApi/create_task', '{"taskName":"task5454","orginatorID":"1","taskDescription":"task33erer","dueDate":"2016-01-12","toUsers":"10","ccUsers":"11","tags":"tag1,tag2"}', '2017-01-11 16:55:52', 1),
(210, '/android/MobileApi/get_tasks_at_home', '{"userID":"1","contactNo":"9873878430","code":"91","deviceID":"356554061837833","tabval":"all"}', '2017-01-11 16:56:01', 1),
(211, '/android/MobileApi/get_tasks_at_home', '{"userID":"1","contactNo":"9873878430","code":"91","deviceID":"356554061837833","tabval":"all"}', '2017-01-11 16:57:20', 1),
(212, '/android/MobileApi/create_group', '{"createdBy":"1","groupName":"myNew Group","groupUsers":"10,12,13","groupDescription":"asxZxZxZXZX"}', '2017-01-11 16:59:41', 0),
(213, '/android/MobileApi/get_tasks_at_home', '{"userID":"1","contactNo":"9873878430","code":"91","deviceID":"356554061837833","tabval":"all"}', '2017-01-11 16:59:48', 1),
(214, '/android/MobileApi/get_tasks_at_home', '{"userID":"1","contactNo":"9873878430","code":"91","deviceID":"356554061837833","tabval":"all"}', '2017-01-11 17:02:57', 1),
(215, '/android/MobileApi/get_tasks_at_home', '{"userID":"1","contactNo":"9873878430","code":"91","deviceID":"356554061837833","tabval":"all"}', '2017-01-11 17:03:13', 1),
(216, '/android/MobileApi/get_tasks_at_home', '{"userID":"1","contactNo":"9873878430","code":"91","deviceID":"356554061837833","tabval":"all"}', '2017-01-11 17:04:03', 1),
(217, '/android/MobileApi/get_tasks_at_home', '{"userID":"1","contactNo":"9873878430","code":"91","deviceID":"356554061837833","tabval":"all"}', '2017-01-11 17:04:47', 1),
(218, '/android/MobileApi/get_tasks_at_home', '{"userID":"1","contactNo":"9873878430","code":"91","deviceID":"356554061837833","tabval":"all"}', '2017-01-11 17:04:58', 1),
(219, '/android/MobileApi/get_tasks_at_home', '{"userID":"1","contactNo":"9873878430","code":"91","deviceID":"356554061837833","tabval":"all"}', '2017-01-11 17:07:16', 1),
(220, '/android/MobileApi/get_tasks_at_home', '{"userID":"1","contactNo":"9873878430","code":"91","deviceID":"356554061837833","tabval":"all"}', '2017-01-11 17:08:01', 1),
(221, '/android/MobileApi/get_tasks_at_home', '{"userID":"1","contactNo":"9873878430","code":"91","deviceID":"356554061837833","tabval":"all"}', '2017-01-11 17:13:09', 1),
(222, '/android/MobileApi/get_tasks_at_home', '{"userID":"1","contactNo":"9873878430","code":"91","deviceID":"356554061837833","tabval":"all"}', '2017-01-11 17:26:16', 1),
(223, '/android/MobileApi/create_group', '{"createdBy":"4","groupName":"myNew Group","groupUsers":"10,12,13","groupDescription":"asxZxZxZXZX"}', '2017-01-11 17:26:29', 0),
(224, '/android/MobileApi/create_group', '{"createdBy":"4","groupName":"myNew Group3","groupUsers":"10,12,13","groupDescription":"asxZxZxZXZX"}', '2017-01-11 17:26:36', 0),
(225, '/android/MobileApi/create_group', '{"createdBy":"2","groupName":"myNew Group3","groupUsers":"10,12,13","groupDescription":"asxZxZxZXZX"}', '2017-01-11 17:27:00', 0),
(226, '/android/MobileApi/get_tasks_at_home', '{"userID":"1","contactNo":"9873878430","code":"91","deviceID":"356554061837833","tabval":"all"}', '2017-01-11 17:27:06', 1),
(227, '/android/MobileApi/create_group', '{"createdBy":"1","groupName":"myNew Group34","groupUsers":"10,12,13","groupDescription":"asxZxZxZXZX"}', '2017-01-11 17:27:13', 0),
(228, '/android/MobileApi/get_tasks_at_home', '{"userID":"1","contactNo":"9873878430","code":"91","deviceID":"356554061837833","tabval":"all"}', '2017-01-11 17:27:17', 1),
(229, '/android/MobileApi/get_tasks_at_home', '{"userID":"1","contactNo":"9873878430","code":"91","deviceID":"356554061837833","tabval":"all"}', '2017-01-11 17:44:39', 1),
(230, '/android/MobileApi/user_app_defualt_setting', '[]', '2017-01-12 16:07:03', 0),
(231, '/android/MobileApi/user_app_defualt_setting', '[]', '2017-01-12 16:07:16', 0),
(232, '/android/MobileApi/user_app_defualt_setting', '[]', '2017-01-12 16:08:07', 0),
(233, '/android/MobileApi/user_app_defualt_setting', '[]', '2017-01-12 16:09:16', 0),
(234, '/android/MobileApi/user_app_defualt_setting', '[]', '2017-01-12 16:11:06', 0),
(235, '/android/MobileApi/user_app_defualt_setting', '[]', '2017-01-12 16:24:58', 0),
(236, '/android/MobileApi/user_app_defualt_setting', '[]', '2017-01-12 16:28:44', 0),
(237, '/android/MobileApi/user_app_defualt_setting', '[]', '2017-01-12 17:36:43', 0),
(238, '/android/MobileApi/user_app_defualt_setting', '[]', '2017-01-12 17:37:35', 0),
(239, '/android/MobileApi/user_app_defualt_setting', '[]', '2017-01-12 17:38:22', 0),
(240, '/android/MobileApi/user_app_defualt_setting', '[]', '2017-01-12 17:38:36', 0),
(241, '/android/MobileApi/user_app_defualt_setting', '[]', '2017-01-12 17:38:43', 0),
(242, '/android/MobileApi/user_app_defualt_setting', '[]', '2017-01-12 17:39:33', 0),
(243, '/android/MobileApi/user_app_defualt_setting', '[]', '2017-01-12 17:40:27', 0),
(244, '/android/MobileApi/add_members_in_a_group', '[]', '2017-01-17 09:57:56', 0),
(245, '/android/MobileApi/add_members_in_a_group', '{"groupID":"1","userID":"1","participantID":"2,3,4"}', '2017-01-17 10:00:01', 1),
(246, '/android/MobileApi/add_members_in_a_group', '{"groupID":"1","userID":"1","participantID":"2,3,4"}', '2017-01-17 10:03:37', 1),
(247, '/android/MobileApi/add_members_in_a_group', '{"groupID":"1","userID":"1","participantID":"2,3,4"}', '2017-01-17 10:04:18', 1),
(248, '/android/MobileApi/add_members_in_a_group', '{"groupID":"1","userID":"1","participantID":"2,3,4"}', '2017-01-17 10:10:15', 1),
(249, '/android/MobileApi/MobileApi/change_group_params_value', '[]', '2017-01-20 15:12:47', 0),
(250, '/android/MobileApi/change_group_params_value', '[]', '2017-01-20 15:13:08', 0),
(251, '/android/MobileApi/MobileApi/exit_team_from_group', '[]', '2017-01-21 13:08:36', 0),
(252, '/android/MobileApi/MobileApi/exit_team_from_group', '[]', '2017-01-21 13:08:53', 0),
(253, '/android/MobileApi/exit_team_from_group', '[]', '2017-01-21 13:09:16', 0),
(254, '/android/MobileApi/exit_team_from_group', '{"userID":"1","groupID":"2"}', '2017-01-21 13:28:41', 1),
(255, '/android/MobileApi/exit_team_from_group', '{"userID":"1","groupID":"16"}', '2017-01-21 13:29:01', 1),
(256, '/android/MobileApi/exit_team_from_group', '{"userID":"1","groupID":"16"}', '2017-01-21 15:12:16', 1),
(257, '/android/MobileApi/exit_team_from_group', '{"userID":"1","groupID":"16"}', '2017-01-21 15:12:43', 1),
(258, '/android/MobileApi/exit_team_from_group', '{"userID":"1","groupID":"16"}', '2017-01-21 15:12:59', 1),
(259, '/android/MobileApi/exit_team_from_group', '{"userID":"1","groupID":"16"}', '2017-01-21 15:13:52', 1),
(260, '/android/MobileApi/exit_team_from_group', '{"userID":"1","groupID":"16"}', '2017-01-21 15:16:17', 1),
(261, '/android/MobileApi/exit_team_from_group', '{"userID":"1","groupID":"16"}', '2017-01-21 15:17:11', 1),
(262, '/android/MobileApi/exit_team_from_group', '{"userID":"1","groupID":"16"}', '2017-01-21 15:17:48', 1),
(263, '/android/MobileApi/exit_team_from_group', '{"userID":"1","groupID":"16"}', '2017-01-21 15:23:44', 1),
(264, '/android/MobileApi/exit_team_from_group', '{"userID":"1","groupID":"16"}', '2017-01-21 15:36:42', 1),
(265, '/android/MobileApi/exit_team_from_group', '{"userID":"1","groupID":"16"}', '2017-01-21 15:37:34', 1),
(266, '/android/MobileApi/exit_team_from_group', '{"userID":"1","groupID":"16"}', '2017-01-21 15:37:49', 1),
(267, '/android/MobileApi/exit_team_from_group', '{"userID":"1","groupID":"16"}', '2017-01-21 15:38:03', 1),
(268, '/android/MobileApi/exit_team_from_group', '{"userID":"1","groupID":"16"}', '2017-01-21 15:38:24', 1),
(269, '/android/MobileApi/exit_team_from_group', '{"userID":"1","groupID":"16"}', '2017-01-21 15:39:44', 1),
(270, '/android/MobileApi/exit_team_from_group', '{"userID":"1","groupID":"16"}', '2017-01-21 15:43:38', 1),
(271, '/android/MobileApi/exit_team_from_group', '{"userID":"1","groupID":"16"}', '2017-01-21 15:44:23', 1),
(272, '/android/MobileApi/exit_team_from_group', '{"userID":"1","groupID":"16"}', '2017-01-21 15:45:19', 1),
(273, '/android/MobileApi/exit_team_from_group', '{"userID":"1","groupID":"16"}', '2017-01-21 15:45:38', 1),
(274, '/android/MobileApi/exit_team_from_group', '{"userID":"1","groupID":"16"}', '2017-01-21 15:48:05', 1),
(275, '/android/MobileApi/exit_team_from_group', '{"userID":"1","groupID":"16"}', '2017-01-21 15:49:04', 1),
(276, '/android/MobileApi/exit_team_from_group', '{"userID":"1","groupID":"16"}', '2017-01-21 15:53:41', 1),
(277, '/android/MobileApi/exit_team_from_group', '{"userID":"1","groupID":"16"}', '2017-01-21 15:53:55', 1),
(278, '/android/MobileApi/exit_team_from_group', '{"userID":"1","groupID":"16"}', '2017-01-21 15:57:07', 1),
(279, '/android/MobileApi/exit_team_from_group', '{"userID":"1","groupID":"16"}', '2017-01-21 16:02:07', 1),
(280, '/android/MobileApi/exit_team_from_group', '{"userID":"1","groupID":"16"}', '2017-01-21 16:10:19', 1),
(281, '/android/MobileApi/exit_team_from_group', '{"userID":"1","groupID":"16"}', '2017-01-21 16:11:27', 1),
(282, '/android/MobileApi/exit_team_from_group', '{"userID":"1","groupID":"16"}', '2017-01-21 16:11:40', 1),
(283, '/android/MobileApi/exit_team_from_group', '{"userID":"1","groupID":"16"}', '2017-01-21 16:11:51', 1),
(284, '/android/MobileApi/exit_team_from_group', '{"userID":"1","groupID":"16"}', '2017-01-21 16:12:16', 1),
(285, '/android/MobileApi/exit_team_from_group', '{"userID":"1","groupID":"16"}', '2017-01-21 16:12:26', 1),
(286, '/android/MobileApi/exit_team_from_group', '{"userID":"1","groupID":"16"}', '2017-01-21 16:18:31', 1),
(287, '/android/MobileApi/exit_team_from_group', '{"userID":"1","groupID":"16"}', '2017-01-21 16:18:48', 1),
(288, '/android/MobileApi/exit_team_from_group', '{"userID":"1","groupID":"16"}', '2017-01-21 16:19:00', 1),
(289, '/android/MobileApi/exit_team_from_group', '{"userID":"1","groupID":"16"}', '2017-01-21 16:19:18', 1),
(290, '/android/MobileApi/exit_team_from_group', '{"userID":"1","groupID":"16"}', '2017-01-21 16:20:42', 1),
(291, '/android/MobileApi/exit_team_from_group', '{"userID":"1","groupID":"16"}', '2017-01-21 16:26:50', 1),
(292, '/android/MobileApi/exit_team_from_group', '{"userID":"1","groupID":"16"}', '2017-01-21 16:27:39', 1),
(293, '/android/MobileApi/exit_team_from_group', '{"userID":"1","groupID":"16"}', '2017-01-21 16:28:33', 1),
(294, '/android/MobileApi/exit_team_from_group', '{"userID":"1","groupID":"16"}', '2017-01-21 16:28:56', 1),
(295, '/android/MobileApi/exit_team_from_group', '{"userID":"1","groupID":"16"}', '2017-01-21 16:29:34', 1),
(296, '/android/MobileApi/exit_team_from_group', '{"userID":"1","groupID":"16"}', '2017-01-21 17:00:30', 1),
(297, '/android/MobileApi/exit_team_from_group', '{"userID":"1","groupID":"16"}', '2017-01-21 17:01:23', 1),
(298, '/android/MobileApi/exit_team_from_group', '{"userID":"1","groupID":"16"}', '2017-01-21 17:01:27', 1),
(299, '/android/MobileApi/marked_group_admin', '[]', '2017-01-24 10:41:41', 0),
(300, '/android/MobileApi/marked_group_admin', '{"userID":"1","groupID":"12","deviceID":"123123123123","mark_as_admin_user_ids":"2,3"}', '2017-01-24 10:42:59', 1),
(301, '/android/MobileApi/marked_group_admin', '{"userID":"1","groupID":"12","deviceID":"123123123123","mark_as_admin_user_ids":"2,3"}', '2017-01-24 10:43:19', 1),
(302, '/android/MobileApi/marked_group_admin', '{"userID":"1","groupID":"12","deviceID":"123123123123","mark_as_admin_user_ids":"2,3"}', '2017-01-24 10:46:06', 1),
(303, '/android/MobileApi/marked_group_admin', '{"userID":"1","groupID":"34","deviceID":"242342342341","mark_as_admin_user_ids":"12,13"}', '2017-01-24 10:49:06', 1),
(304, '/android/MobileApi/marked_group_admin', '{"userID":"1","groupID":"34","deviceID":"242342342341","mark_as_admin_user_ids":"12,13"}', '2017-01-24 10:52:42', 1),
(305, '/android/MobileApi/marked_group_admin', '{"userID":"1","groupID":"34","deviceID":"242342342341","mark_as_admin_user_ids":"12,13"}', '2017-01-24 10:54:05', 1),
(306, '/android/MobileApi/marked_group_admin', '{"userID":"1","groupID":"34","deviceID":"242342342341","mark_as_admin_user_ids":"12,13"}', '2017-01-24 10:54:53', 1),
(307, '/android/MobileApi/marked_group_admin', '{"userID":"1","groupID":"34","deviceID":"242342342341","mark_as_admin_user_ids":"12,13"}', '2017-01-24 10:55:53', 1),
(308, '/android/MobileApi/marked_group_admin', '{"userID":"1","groupID":"34","deviceID":"242342342341","mark_as_admin_user_ids":"12,13"}', '2017-01-24 10:56:10', 1),
(309, '/android/MobileApi/marked_group_admin', '{"userID":"1","groupID":"34","deviceID":"242342342341","mark_as_admin_user_ids":"12,13"}', '2017-01-24 10:56:55', 1),
(310, '/android/MobileApi/marked_group_admin', '{"userID":"1","groupID":"34","deviceID":"242342342341","mark_as_admin_user_ids":"12,13"}', '2017-01-24 10:57:40', 1),
(311, '/android/MobileApi/marked_group_admin', '{"userID":"1","groupID":"34","deviceID":"242342342341","mark_as_admin_user_ids":"12,13"}', '2017-01-24 10:58:33', 1),
(312, '/android/MobileApi/marked_group_admin', '{"userID":"1","groupID":"34","deviceID":"242342342341","mark_as_admin_user_ids":"12,13"}', '2017-01-24 10:58:53', 1),
(313, '/android/MobileApi/create_mom', '[]', '2017-02-01 12:39:53', 0),
(314, '/android/MobileApi/create_mom', '{"userID":"1","deviceID":"992929292","momName":"mom112","momDescription":"akdjalksdjjak ajsdasldkkajsd asdaksdkas asdasdl","momParticipant":"2,3,4"}', '2017-02-01 12:41:05', 1),
(315, '/android/MobileApi/create_mom', '{"userID":"1","deviceID":"992929292","momName":"mom112","momDescription":"akdjalksdjjak ajsdasldkkajsd asdaksdkas asdasdl","momParticipant":"2,3,4"}', '2017-02-01 12:44:40', 1),
(316, '/android/MobileApi/create_mom', '{"userID":"1","deviceID":"992929292","momName":"mom112","momDescription":"akdjalksdjjak ajsdasldkkajsd asdaksdkas asdasdl","momParticipant":"2,3,4"}', '2017-02-01 12:44:57', 1),
(317, '/android/MobileApi/create_mom', '{"userID":"1","deviceID":"992929292","momName":"mom112","momDescription":"akdjalksdjjak ajsdasldkkajsd asdaksdkas asdasdl","momParticipant":"2,3,4"}', '2017-02-01 12:45:09', 1),
(318, '/android/MobileApi/create_mom', '{"userID":"1","deviceID":"992929292","momName":"mom112","momDescription":"akdjalksdjjak ajsdasldkkajsd asdaksdkas asdasdl","momParticipant":"2,3,4"}', '2017-02-01 12:47:13', 1);
INSERT INTO `ity_api_hits_call` (`id`, `url`, `request`, `date`, `userID`) VALUES
(319, '/android/MobileApi/create_mom', '{"userID":"1","deviceID":"992929292","momName":"mom112222","momDescription":"akdjalksdjjak ajsdasldkkajsd asdaksdkas asdasdl","momParticipant":"2,3,4"}', '2017-02-01 12:47:21', 1),
(320, '/android/MobileApi/create_mom', '{"userID":"1","deviceID":"992929292","momName":"mom112222","momDescription":"akdjalksdjjak ajsdasldkkajsd asdaksdkas asdasdl","momParticipant":"2,3,4"}', '2017-02-01 12:47:54', 1),
(321, '/android/MobileApi/create_mom', '{"userID":"1","deviceID":"992929292","momName":"mom112222","momDescription":"akdjalksdjjak ajsdasldkkajsd asdaksdkas asdasdl","momParticipant":"2,3,4"}', '2017-02-01 12:48:05', 1),
(322, '/android/MobileApi/create_mom', '{"userID":"1","deviceID":"992929292","momName":"mom112222","momDescription":"akdjalksdjjak ajsdasldkkajsd asdaksdkas asdasdl","momParticipant":"2,3,4"}', '2017-02-01 12:55:52', 1),
(323, '/android/MobileApi/create_mom', '{"userID":"1","deviceID":"992929292","momName":"mom112222","momDescription":"akdjalksdjjak ajsdasldkkajsd asdaksdkas asdasdl","momParticipant":"2,3,4"}', '2017-02-01 12:56:09', 1),
(324, '/android/MobileApi/create_mom', '{"userID":"1","deviceID":"992929292","momName":"mom112222","momDescription":"akdjalksdjjak ajsdasldkkajsd asdaksdkas asdasdl","momParticipant":"2,3,4"}', '2017-02-01 12:58:34', 1),
(325, '/android/MobileApi/create_mom', '{"userID":"1","deviceID":"992929292","momName":"mom112222","momDescription":"akdjalksdjjak ajsdasldkkajsd asdaksdkas asdasdl","momParticipant":"2,3,4"}', '2017-02-01 13:00:44', 1),
(326, '/android/MobileApi/create_mom', '{"userID":"1","deviceID":"992929292","momName":"mom112222","momDescription":"akdjalksdjjak ajsdasldkkajsd asdaksdkas asdasdl","momParticipant":"2,3,4"}', '2017-02-01 13:01:41', 1),
(327, '/android/MobileApi/create_mom', '{"userID":"1","deviceID":"992929292","momName":"mom112222","momDescription":"akdjalksdjjak ajsdasldkkajsd asdaksdkas asdasdl","momParticipant":"2,3,4"}', '2017-02-01 13:02:04', 1),
(328, '/android/MobileApi/create_mom', '{"userID":"1","deviceID":"992929292","momName":"new111","momDescription":"akdjalksdjjak ajsdasldkkajsd asdaksdkas asdasdl","momParticipant":"2,3,4"}', '2017-02-01 13:03:14', 1),
(329, '/android/MobileApi/create_mom', '{"userID":"1","deviceID":"992929292","momName":"mom1","momDescription":"akdjalksdjjak ajsdasldkkajsd asdaksdkas asdasdl","momParticipant":"128,129,130"}', '2017-02-01 13:05:02', 1),
(330, '/android/MobileApi/create_mom', '{"userID":"1","deviceID":"992929292","momName":"mom1","momDescription":"akdjalksdjjak ajsdasldkkajsd asdaksdkas asdasdl","momParticipant":"131,132"}', '2017-02-01 13:06:07', 1),
(331, '/android/MobileApi/create_mom', '{"userID":"1","deviceID":"992929292","momName":"mom1","momDescription":"akdjalksdjjak ajsdasldkkajsd asdaksdkas asdasdl","momParticipant":"131,132"}', '2017-02-01 15:56:51', 1),
(332, '/android/MobileApi/create_mom', '{"userID":"1","deviceID":"992929292","momName":"mom1","momDescription":"akdjalksdjjak ajsdasldkkajsd asdaksdkas asdasdl","momParticipant":"131,132"}', '2017-02-02 10:04:51', 1),
(333, '/android/MobileApi/create_mom', '{"userID":"1","deviceID":"992929292","momName":"mom1","momDescription":"akdjalksdjjak ajsdasldkkajsd asdaksdkas asdasdl","momParticipant":"131,132"}', '2017-02-02 11:34:06', 1),
(334, '/android/MobileApi/create_mom', '{"userID":"1","deviceID":"992929292","momName":"mom1","momDescription":"akdjalksdjjak ajsdasldkkajsd asdaksdkas asdasdl","momParticipant":"131,132"}', '2017-02-02 11:34:33', 1),
(335, '/android/MobileApi/create_mom', '{"userID":"1","deviceID":"992929292","momName":"mom1","momDescription":"akdjalksdjjak ajsdasldkkajsd asdaksdkas asdasdl","momParticipant":"131,132"}', '2017-02-02 11:34:39', 1),
(336, '/android/MobileApi/create_mom', '{"userID":"1","deviceID":"992929292","momName":"mom1","momDescription":"akdjalksdjjak ajsdasldkkajsd asdaksdkas asdasdl","momParticipant":"131,132"}', '2017-02-02 11:35:47', 1),
(337, '/android/MobileApi/create_mom', '{"userID":"1","deviceID":"992929292","momName":"mom1","momDescription":"akdjalksdjjak ajsdasldkkajsd asdaksdkas asdasdl","momParticipant":"131,132"}', '2017-02-02 11:35:56', 1),
(338, '/android/MobileApi/create_mom', '{"userID":"1","deviceID":"992929292","momName":"mom1","momDescription":"akdjalksdjjak ajsdasldkkajsd asdaksdkas asdasdl","momParticipant":"131,132"}', '2017-02-02 11:36:18', 1),
(339, '/android/MobileApi/create_mom', '{"userID":"1","deviceID":"992929292","momName":"qwesadbftkm snd dndn dndnd","momDescription":"Test","momParticipant":"131,132"}', '2017-02-02 14:59:18', 1),
(340, '/android/MobileApi/create_mom', '{"userID":"1","deviceID":"992929292","momName":"qdcv","momDescription":"Test","momParticipant":"131,132"}', '2017-02-02 14:59:28', 1),
(341, '/android/MobileApi/create_mom', '{"userID":"1","deviceID":"992929292","momName":"qdcve","momDescription":"Test","momParticipant":"131,132"}', '2017-02-02 14:59:36', 1),
(342, '/android/MobileApi/create_mom', '{"userID":"1","deviceID":"992929292","momName":"qdcve","momDescription":"Test","momParticipant":"131,132"}', '2017-02-02 14:59:43', 1),
(343, '/android/MobileApi/create_mom', '{"userID":"1","deviceID":"992929292","momName":"qdcve","momDescription":"Test","momParticipant":"131,132","momParticipantCC":"12,34"}', '2017-02-02 15:20:02', 1),
(344, '/android/MobileApi/create_mom', '{"userID":"1","deviceID":"992929292","momName":"qdcve","momDescription":"Test","momParticipant":"131,132","momParticipantCC":"12,34"}', '2017-02-02 16:01:25', 1),
(345, '/android/MobileApi/create_mom', '{"userID":"1","deviceID":"992929292","momName":"qdcve","momDescription":"Test","momParticipant":"131,132","momParticipantCC":"12,34"}', '2017-02-02 16:02:04', 1),
(346, '/android/MobileApi/create_mom', '{"userID":"1","deviceID":"992929292","momName":"qdcve","momDescription":"Test","momParticipant":"131,132","momParticipantCC":"12,34"}', '2017-02-02 16:02:58', 1),
(347, '/android/MobileApi/create_mom', '{"userID":"1","deviceID":"992929292","momName":"qdcve","momDescription":"Test","momParticipant":"131,132,12,34","momParticipantCC":"12,34"}', '2017-02-02 16:03:18', 1),
(348, '/android/MobileApi/create_mom', '{"userID":"1","deviceID":"992929292","momName":"qdcve","momDescription":"Test","momParticipant":"131,132,12,34","momParticipantCC":"12,34"}', '2017-02-02 16:04:45', 1),
(349, '/android/MobileApi/create_mom', '{"userID":"1","deviceID":"992929292","momName":"qdcveadsasdasd","momDescription":"Test","momParticipant":"131,132,12,34","momParticipantCC":"12,34"}', '2017-02-02 16:04:48', 1),
(350, '/android/MobileApi/create_mom', '{"userID":"1","deviceID":"992929292","momName":"qdcveadsasdasdadasdasdasdasdasdasdasd","momDescription":"Test","momParticipant":"131,132,12,34","momParticipantCC":"12,34"}', '2017-02-02 16:04:54', 1),
(351, '/android/MobileApi/add_observations', '[]', '2017-02-03 14:53:30', 0),
(352, '/android/MobileApi/add_observations', '{"userID":"1","deviceID":"23123123123","momID":"1","observationName":"kasjdkasdja","observationDescription":"asdasdas asdasda asdasdas asdasd adasd adad asdasd asdad"}', '2017-02-03 14:55:43', 1),
(353, '/android/MobileApi/add_observations', '{"userID":"1","deviceID":"23123123123","momID":"1","observationName":"kasjdkasdja","observationDescription":"asdasdas asdasda asdasdas asdasd adasd adad asdasd asdad"}', '2017-02-03 14:56:57', 1),
(354, '/android/MobileApi/add_observations', '{"userID":"1","deviceID":"23123123123","momID":"1","observationName":"kasjdkasdja","observationDescription":"asdasdas asdasda asdasdas asdasd adasd adad asdasd asdad"}', '2017-02-03 15:04:00', 1),
(355, '/android/MobileApi/add_observations', '{"userID":"1","deviceID":"23123123123","momID":"1","observationName":"kasjdkasdja","observationDescription":"asdasdas asdasda asdasdas asdasd adasd adad asdasd asdad"}', '2017-02-03 15:04:30', 1),
(356, '/android/MobileApi/add_observations', '{"userID":"1","deviceID":"23123123123","momID":"1","observationName":"kasjdkasdja","observationDescription":"asdasdas asdasda asdasdas asdasd adasd adad asdasd asdad"}', '2017-02-03 15:04:50', 1),
(357, '/android/MobileApi/add_observations', '{"userID":"1","deviceID":"23123123123","momID":"1","observationName":"kasjdkasdja","observationDescription":"asdasdas asdasda asdasdas asdasd adasd adad asdasd asdad"}', '2017-02-03 15:05:27', 1),
(358, '/android/MobileApi/add_observations', '{"userID":"1","deviceID":"23123123123","momID":"1","observationName":"kasjdkasdja","observationDescription":"asdasdas asdasda asdasdas asdasd adasd adad asdasd asdad"}', '2017-02-03 15:06:09', 1),
(359, '/android/MobileApi/add_observations', '{"userID":"1","deviceID":"23123123123","momID":"1","observationName":"kasjdkasdja","observationDescription":"asdasdas asdasda asdasdas asdasd adasd adad asdasd asdad"}', '2017-02-03 15:07:02', 1),
(360, '/android/MobileApi/create_mom', '{"userID":"1","deviceID":"992929292","momName":"mom112","momDescription":"akdjalksdjjak ajsdasldkkajsd asdaksdkas asdasdl","momParticipant":"2,3,4"}', '2017-02-03 15:13:21', 1),
(361, '/android/MobileApi/create_mom', '{"userID":"1","deviceID":"992929292","momName":"mom112","momDescription":"akdjalksdjjak ajsdasldkkajsd asdaksdkas asdasdl","momParticipant":"2,3,4"}', '2017-02-03 15:14:11', 1),
(362, '/android/MobileApi/create_mom', '{"userID":"1","deviceID":"992929292","momName":"mom112","momDescription":"akdjalksdjjak ajsdasldkkajsd asdaksdkas asdasdl","momParticipant":"2,3,4"}', '2017-02-03 15:14:40', 1),
(363, '/android/MobileApi/create_mom', '{"userID":"1","deviceID":"992929292","momName":"mom112","momDescription":"akdjalksdjjak ajsdasldkkajsd asdaksdkas asdasdl","momParticipant":"2,3,4"}', '2017-02-03 15:15:01', 1),
(364, '/android/MobileApi/create_mom', '{"userID":"1","deviceID":"992929292","momName":"mom112","momDescription":"akdjalksdjjak ajsdasldkkajsd asdaksdkas asdasdl","momParticipant":"2,3,4"}', '2017-02-03 15:15:24', 1),
(365, '/android/MobileApi/create_mom', '{"userID":"1","deviceID":"992929292","momName":"mom112","momDescription":"akdjalksdjjak ajsdasldkkajsd asdaksdkas asdasdl","momParticipant":"2,3,4"}', '2017-02-03 15:17:25', 1),
(366, '/android/MobileApi/create_mom', '{"userID":"1","deviceID":"992929292","momName":"mom11212312","momDescription":"akdjalksdjjak ajsdasldkkajsd asdaksdkas asdasdl","momParticipant":"2,3,4"}', '2017-02-03 15:17:33', 1),
(367, '/android/MobileApi/create_mom', '{"userID":"1","deviceID":"992929292","momName":"mom11212312","momDescription":"akdjalksdjjak ajsdasldkkajsd asdaksdkas asdasdl","momParticipant":"2,3,4,1"}', '2017-02-03 15:17:44', 1),
(368, '/android/MobileApi/create_mom', '{"userID":"1","deviceID":"992929292","momName":"mom11212312","momDescription":"akdjalksdjjak ajsdasldkkajsd asdaksdkas asdasdl","momParticipant":"2,3,4,1"}', '2017-02-03 15:19:32', 1),
(369, '/android/MobileApi/create_mom', '{"userID":"1","deviceID":"992929292","momName":"mom11212312","momDescription":"akdjalksdjjak ajsdasldkkajsd asdaksdkas asdasdl","momParticipant":"2,3,4,1"}', '2017-02-04 13:20:24', 1),
(370, '/android/MobileApi/create_mom', '{"userID":"1","deviceID":"992929292","momName":"mom11212312","momDescription":"akdjalksdjjak ajsdasldkkajsd asdaksdkas asdasdl","momParticipant":"2,3,4,1"}', '2017-02-04 14:45:01', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ity_api_industory_type_master`
--

CREATE TABLE `ity_api_industory_type_master` (
  `type` varchar(255) DEFAULT NULL,
  `createdDate` date DEFAULT NULL,
  `modifiedDate` datetime DEFAULT NULL,
  `status` enum('1','0') NOT NULL DEFAULT '1',
  `typeID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ity_api_industory_type_master`
--

INSERT INTO `ity_api_industory_type_master` (`type`, `createdDate`, `modifiedDate`, `status`, `typeID`) VALUES
('IT', '2016-09-02', '2016-09-07 00:00:00', '1', 1),
('Real Estate', '2016-09-28', NULL, '1', 5),
('Retail', '2016-09-28', NULL, '1', 6),
('Ecommerce', '2016-09-28', NULL, '1', 7),
('Telecom', '2016-09-28', NULL, '1', 9);

-- --------------------------------------------------------

--
-- Table structure for table `ity_api_locations`
--

CREATE TABLE `ity_api_locations` (
  `locationID` int(11) NOT NULL,
  `address` text,
  `latitude` varchar(30) DEFAULT NULL,
  `longitude` varchar(30) DEFAULT NULL,
  `userID` int(11) DEFAULT NULL,
  `funcationalID` enum('teamID','groupID') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ity_api_log_task`
--

CREATE TABLE `ity_api_log_task` (
  `taskID` int(11) DEFAULT NULL,
  `userID` int(11) DEFAULT NULL,
  `actions` varchar(255) NOT NULL,
  `json` text NOT NULL,
  `createdDate` datetime NOT NULL,
  `title` varchar(255) NOT NULL,
  `act` varchar(255) NOT NULL,
  `histID` int(11) NOT NULL,
  `functionTypeID` int(11) NOT NULL,
  `functionnalityType` enum('Task','Group','MoM') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ity_api_log_task`
--

INSERT INTO `ity_api_log_task` (`taskID`, `userID`, `actions`, `json`, `createdDate`, `title`, `act`, `histID`, `functionTypeID`, `functionnalityType`) VALUES
(1, 1, 'New task created by mohd asif - chnage the database scheema', '{"taskID":"1","taskName":"chnage the database scheema","taskDescription":"This is the test ","allotmentDate":"2017-01-11 00:00:00","revisedDate":null,"dueDate":"2016-01-12 00:00:00","taskType":null,"orginatorID":"1","recieverID":"2,3","ccID":"3,4","firstName":"mohd","lastName":"asif","emailID":"asif@bookmyhouse.com","contactNo":"9873878430","countryPhoneCode":"91","funType":"Team","statusText":"pending","userPhoto":"http:\\/\\/itasku.bookmyhouse.co\\/itaskyou\\/\\/assets\\/images\\/default_avatar.png","taskTags":["tag1","tag2"],"receiverData":{"receiverCount":1,"receiverList":[{"userID":"2","firstName":"Shruti","lastName":"Bansal","status":"1","emailID":"bansalshruti489@gmail.com","industryType":"IT","subIndustryTypeID":null,"countryPhoneCode":"91","contactNo":"9988296115","userPhoto":"http:\\/\\/itasku.bookmyhouse.co\\/itaskyou\\/\\/assets\\/images\\/default_avatar.png"}]},"followingData":{"followingCount":0,"followingList":[]}}', '2017-01-11 00:00:00', 'New Task Created', 'new_task_created', 1, 0, 'Task'),
(2, 1, 'New task created by mohd asif - desing issue in group detail screen', '{"taskID":"2","taskName":"desing issue in group detail screen","taskDescription":"This is the test ","allotmentDate":"2017-01-11 00:00:00","revisedDate":null,"dueDate":"2016-01-12 00:00:00","taskType":null,"orginatorID":"1","recieverID":"4,5","ccID":"3,4","firstName":"mohd","lastName":"asif","emailID":"asif@bookmyhouse.com","contactNo":"9873878430","countryPhoneCode":"91","funType":"Team","statusText":"pending","userPhoto":"http:\\/\\/itasku.bookmyhouse.co\\/itaskyou\\/\\/assets\\/images\\/default_avatar.png","taskTags":["tag1","tag2"],"receiverData":{"receiverCount":0,"receiverList":[]},"followingData":{"followingCount":0,"followingList":[]}}', '2017-01-11 00:00:00', 'New Task Created', 'new_task_created', 2, 0, 'Task'),
(3, 1, 'New task created by mohd asif - desing issue in group detail screen2', '{"taskID":"3","taskName":"desing issue in group detail screen2","taskDescription":"This is the test ","allotmentDate":"2017-01-11 00:00:00","revisedDate":null,"dueDate":"2016-01-12 00:00:00","taskType":null,"orginatorID":"1","recieverID":"1","ccID":"3,4","firstName":"mohd","lastName":"asif","emailID":"asif@bookmyhouse.com","contactNo":"9873878430","countryPhoneCode":"91","funType":"My To Do","statusText":"pending","userPhoto":"http:\\/\\/itasku.bookmyhouse.co\\/itaskyou\\/\\/assets\\/images\\/default_avatar.png","taskTags":["tag1","tag2"],"receiverData":{"receiverCount":1,"receiverList":[{"userID":"1","firstName":"mohd","lastName":"asif","status":"1","emailID":"asif@bookmyhouse.com","industryType":"IT","subIndustryTypeID":null,"countryPhoneCode":"91","contactNo":"9873878430","userPhoto":"http:\\/\\/itasku.bookmyhouse.co\\/itaskyou\\/\\/assets\\/images\\/default_avatar.png"}]},"followingData":{"followingCount":0,"followingList":[]}}', '2017-01-11 00:00:00', 'New Task Created', 'new_task_created', 3, 0, 'Task'),
(4, 1, 'New task created by mohd asif - desing issue in group detail screen2', '{"taskID":"4","taskName":"desing issue in group detail screen2","taskDescription":"This is the test ","allotmentDate":"2017-01-11 00:00:00","revisedDate":null,"dueDate":"2016-01-12 00:00:00","taskType":null,"orginatorID":"1","recieverID":"5","ccID":"3,4","firstName":"mohd","lastName":"asif","emailID":"asif@bookmyhouse.com","contactNo":"9873878430","countryPhoneCode":"91","funType":"Individual","statusText":"pending","userPhoto":"http:\\/\\/itasku.bookmyhouse.co\\/itaskyou\\/\\/assets\\/images\\/default_avatar.png","taskTags":["tag1","tag2"],"receiverData":{"receiverCount":0,"receiverList":[]},"followingData":{"followingCount":0,"followingList":[]}}', '2017-01-11 00:00:00', 'New Task Created', 'new_task_created', 4, 0, 'Task'),
(5, 1, 'Task ''desing issue in group detail screen2'' was created by mohd asif', '{"taskID":"5","taskName":"desing issue in group detail screen2","taskDescription":"This is the test ","allotmentDate":"2017-01-11 00:00:00","revisedDate":null,"dueDate":"2016-01-12 00:00:00","taskType":null,"orginatorID":"1","recieverID":"5","ccID":"3,4","firstName":"mohd","lastName":"asif","emailID":"asif@bookmyhouse.com","contactNo":"9873878430","countryPhoneCode":"91","funType":"Group","statusText":"pending","userPhoto":"http:\\/\\/itasku.bookmyhouse.co\\/itaskyou\\/\\/assets\\/images\\/default_avatar.png","taskTags":["tag1","tag2"],"receiverData":{"receiverCount":0,"receiverList":[]},"followingData":{"followingCount":0,"followingList":[]}}', '2017-01-11 00:00:00', 'New Task is created in a group', 'new_task_is_created_in_a_group', 5, 0, 'Task'),
(6, 1, 'Task ''groupTask'' was created by mohd asif', '{"taskID":"6","taskName":"groupTask","taskDescription":"This is the test ","allotmentDate":"2017-01-11 00:00:00","revisedDate":null,"dueDate":"2016-01-12 00:00:00","taskType":null,"orginatorID":"1","recieverID":"5","ccID":"3,4","firstName":"mohd","lastName":"asif","emailID":"asif@bookmyhouse.com","contactNo":"9873878430","countryPhoneCode":"91","funType":"Group","statusText":"pending","userPhoto":"http:\\/\\/itasku.bookmyhouse.co\\/itaskyou\\/\\/assets\\/images\\/default_avatar.png","taskTags":["tag1","tag2"],"receiverData":{"receiverCount":0,"receiverList":[]},"followingData":{"followingCount":0,"followingList":[]}}', '2017-01-11 00:00:00', 'New Task is created in a group', 'new_task_is_created_in_a_group', 6, 0, 'Task'),
(10, 1, 'Task ''desing issue in group detail screen2'' was created by mohd asif', '{"taskID":"10","taskName":"desing issue in group detail screen2","taskDescription":"This is the test ","allotmentDate":"2017-01-11 00:00:00","revisedDate":null,"dueDate":"2016-01-12 00:00:00","taskType":null,"orginatorID":"1","recieverID":"5","ccID":"3,4","firstName":"mohd","lastName":"asif","emailID":"asif@bookmyhouse.com","contactNo":"9873878430","countryPhoneCode":"91","funType":"Group","statusText":"pending","userPhoto":"http:\\/\\/itasku.bookmyhouse.co\\/itaskyou\\/\\/assets\\/images\\/default_avatar.png","taskTags":["tag1","tag2"],"receiverData":{"receiverCount":0,"receiverList":[]},"followingData":{"followingCount":0,"followingList":[]}}', '2017-01-11 00:00:00', 'New Task is created in a group', 'new_task_is_created_in_a_group', 7, 0, 'Task'),
(11, 1, 'Task ''desing issue in group detail screen2'' was created by mohd asif', '{"taskID":"11","taskName":"desing issue in group detail screen2","taskDescription":"task29","allotmentDate":"2017-01-11 00:00:00","revisedDate":null,"dueDate":"2016-01-12 00:00:00","taskType":null,"orginatorID":"1","recieverID":"5","ccID":"3,4","firstName":"mohd","lastName":"asif","emailID":"asif@bookmyhouse.com","contactNo":"9873878430","countryPhoneCode":"91","funType":"Group","statusText":"pending","userPhoto":"http:\\/\\/itasku.bookmyhouse.co\\/itaskyou\\/\\/assets\\/images\\/default_avatar.png","taskTags":["tag1","tag2"],"receiverData":{"receiverCount":0,"receiverList":[]},"followingData":{"followingCount":0,"followingList":[]}}', '2017-01-11 00:00:00', 'New Task is created in a group', 'new_task_is_created_in_a_group', 8, 0, 'Task'),
(12, 1, 'Task ''task29'' was created by mohd asif', '{"taskID":"12","taskName":"task29","taskDescription":"task29","allotmentDate":"2017-01-11 00:00:00","revisedDate":null,"dueDate":"2016-01-12 00:00:00","taskType":null,"orginatorID":"1","recieverID":"1","ccID":"3,4","firstName":"mohd","lastName":"asif","emailID":"asif@bookmyhouse.com","contactNo":"9873878430","countryPhoneCode":"91","funType":"Group","statusText":"pending","userPhoto":"http:\\/\\/itasku.bookmyhouse.co\\/itaskyou\\/\\/assets\\/images\\/default_avatar.png","taskTags":["tag1","tag2"],"receiverData":{"receiverCount":1,"receiverList":[{"userID":"1","firstName":"mohd","lastName":"asif","status":"1","emailID":"asif@bookmyhouse.com","industryType":"IT","subIndustryTypeID":null,"countryPhoneCode":"91","contactNo":"9873878430","userPhoto":"http:\\/\\/itasku.bookmyhouse.co\\/itaskyou\\/\\/assets\\/images\\/default_avatar.png"}]},"followingData":{"followingCount":0,"followingList":[]}}', '2017-01-11 00:00:00', 'New Task is created in a group', 'new_task_is_created_in_a_group', 9, 0, 'Task'),
(13, 1, 'Task ''task292'' was created by mohd asif', '{"taskID":"13","taskName":"task292","taskDescription":"task29","allotmentDate":"2017-01-11 00:00:00","revisedDate":null,"dueDate":"2016-01-12 00:00:00","taskType":null,"orginatorID":"1","recieverID":"1,3,5","ccID":"3,4","firstName":"mohd","lastName":"asif","emailID":"asif@bookmyhouse.com","contactNo":"9873878430","countryPhoneCode":"91","funType":"Group","statusText":"pending","userPhoto":"http:\\/\\/itasku.bookmyhouse.co\\/itaskyou\\/\\/assets\\/images\\/default_avatar.png","taskTags":["tag1","tag2"],"receiverData":{"receiverCount":1,"receiverList":[{"userID":"1","firstName":"mohd","lastName":"asif","status":"1","emailID":"asif@bookmyhouse.com","industryType":"IT","subIndustryTypeID":null,"countryPhoneCode":"91","contactNo":"9873878430","userPhoto":"http:\\/\\/itasku.bookmyhouse.co\\/itaskyou\\/\\/assets\\/images\\/default_avatar.png"}]},"followingData":{"followingCount":0,"followingList":[]}}', '2017-01-11 00:00:00', 'New Task is created in a group', 'new_task_is_created_in_a_group', 10, 0, 'Task'),
(14, 1, 'Task ''task292'' was created by mohd asif', '{"taskID":"14","taskName":"task292","taskDescription":"task29","allotmentDate":"2017-01-11 00:00:00","revisedDate":null,"dueDate":"2016-01-12 00:00:00","taskType":null,"orginatorID":"1","recieverID":"1,3,5","ccID":"3,4","firstName":"mohd","lastName":"asif","emailID":"asif@bookmyhouse.com","contactNo":"9873878430","countryPhoneCode":"91","funType":"Group","statusText":"pending","userPhoto":"http:\\/\\/itasku.bookmyhouse.co\\/itaskyou\\/\\/assets\\/images\\/default_avatar.png","taskTags":["tag1","tag2"],"receiverData":{"receiverCount":1,"receiverList":[{"userID":"1","firstName":"mohd","lastName":"asif","status":"1","emailID":"asif@bookmyhouse.com","industryType":"IT","subIndustryTypeID":null,"countryPhoneCode":"91","contactNo":"9873878430","userPhoto":"http:\\/\\/itasku.bookmyhouse.co\\/itaskyou\\/\\/assets\\/images\\/default_avatar.png"}]},"followingData":{"followingCount":0,"followingList":[]}}', '2017-01-11 00:00:00', 'New Task is created in a group', 'new_task_is_created_in_a_group', 11, 0, 'Task'),
(15, 1, 'Task ''task292'' was created by mohd asif', '{"taskID":"15","taskName":"task292","taskDescription":"task29","allotmentDate":"2017-01-11 00:00:00","revisedDate":null,"dueDate":"2016-01-12 00:00:00","taskType":null,"orginatorID":"1","recieverID":"1,3,5","ccID":"3,4","firstName":"mohd","lastName":"asif","emailID":"asif@bookmyhouse.com","contactNo":"9873878430","countryPhoneCode":"91","funType":"Group","statusText":"pending","userPhoto":"http:\\/\\/itasku.bookmyhouse.co\\/itaskyou\\/\\/assets\\/images\\/default_avatar.png","taskTags":["tag1","tag2"],"receiverData":{"receiverCount":1,"receiverList":[{"userID":"1","firstName":"mohd","lastName":"asif","status":"1","emailID":"asif@bookmyhouse.com","industryType":"IT","subIndustryTypeID":null,"countryPhoneCode":"91","contactNo":"9873878430","userPhoto":"http:\\/\\/itasku.bookmyhouse.co\\/itaskyou\\/\\/assets\\/images\\/default_avatar.png"}]},"followingData":{"followingCount":0,"followingList":[]}}', '2017-01-11 00:00:00', 'New Task is created in a group', 'new_task_is_created_in_a_group', 12, 0, 'Task'),
(16, 1, 'Task ''task292'' was created by mohd asif', '{"taskID":"16","taskName":"task292","taskDescription":"task29","allotmentDate":"2017-01-11 00:00:00","revisedDate":null,"dueDate":"2016-01-12 00:00:00","taskType":null,"orginatorID":"1","recieverID":"1,3,5","ccID":"3,4","firstName":"mohd","lastName":"asif","emailID":"asif@bookmyhouse.com","contactNo":"9873878430","countryPhoneCode":"91","funType":"Group","statusText":"pending","userPhoto":"http:\\/\\/itasku.bookmyhouse.co\\/itaskyou\\/\\/assets\\/images\\/default_avatar.png","taskTags":["tag1","tag2"],"receiverData":{"receiverCount":1,"receiverList":[{"userID":"1","firstName":"mohd","lastName":"asif","status":"1","emailID":"asif@bookmyhouse.com","industryType":"IT","subIndustryTypeID":null,"countryPhoneCode":"91","contactNo":"9873878430","userPhoto":"http:\\/\\/itasku.bookmyhouse.co\\/itaskyou\\/\\/assets\\/images\\/default_avatar.png"}]},"followingData":{"followingCount":0,"followingList":[]}}', '2017-01-11 00:00:00', 'New Task is created in a group', 'new_task_is_created_in_a_group', 13, 0, 'Task'),
(17, 1, 'Task ''task5454'' was created by mohd asif', '{"taskID":"17","taskName":"task5454","taskDescription":"task33erer","allotmentDate":"2017-01-11 00:00:00","revisedDate":null,"dueDate":"2016-01-12 00:00:00","taskType":null,"orginatorID":"1","recieverID":"10","ccID":"11","firstName":"mohd","lastName":"asif","emailID":"asif@bookmyhouse.com","contactNo":"9873878430","countryPhoneCode":"91","funType":"Group","statusText":"pending","userPhoto":"http:\\/\\/itasku.bookmyhouse.co\\/itaskyou\\/\\/assets\\/images\\/default_avatar.png","taskTags":["tag1","tag2"],"receiverData":{"receiverCount":0,"receiverList":[]},"followingData":{"followingCount":0,"followingList":[]}}', '2017-01-11 00:00:00', 'New Task is created in a group', 'new_task_is_created_in_a_group', 14, 0, 'Task'),
(18, 1, 'Task ''task5454'' was created by mohd asif', '{"taskID":"18","taskName":"task5454","taskDescription":"task33erer","allotmentDate":"2017-01-11 00:00:00","revisedDate":null,"dueDate":"2016-01-12 00:00:00","taskType":null,"orginatorID":"1","recieverID":"10","ccID":"11","firstName":"mohd","lastName":"asif","emailID":"asif@bookmyhouse.com","contactNo":"9873878430","countryPhoneCode":"91","funType":"Group","statusText":"pending","userPhoto":"http:\\/\\/itasku.bookmyhouse.co\\/itaskyou\\/\\/assets\\/images\\/default_avatar.png","taskTags":["tag1","tag2"],"receiverData":{"receiverCount":0,"receiverList":[]},"followingData":{"followingCount":0,"followingList":[]}}', '2017-01-11 00:00:00', 'New Task is created in a group', 'new_task_is_created_in_a_group', 15, 0, 'Task'),
(19, 1, 'Task ''task5454'' was created by mohd asif', '{"taskID":"19","taskName":"task5454","taskDescription":"task33erer","allotmentDate":"2017-01-11 00:00:00","revisedDate":null,"dueDate":"2016-01-12 00:00:00","taskType":null,"orginatorID":"1","recieverID":"10","ccID":"11","firstName":"mohd","lastName":"asif","emailID":"asif@bookmyhouse.com","contactNo":"9873878430","countryPhoneCode":"91","funType":"Group","statusText":"pending","userPhoto":"http:\\/\\/itasku.bookmyhouse.co\\/itaskyou\\/\\/assets\\/images\\/default_avatar.png","taskTags":["tag1","tag2"],"receiverData":{"receiverCount":0,"receiverList":[]},"followingData":{"followingCount":0,"followingList":[]}}', '2017-01-11 00:00:00', 'New Task is created in a group', 'new_task_is_created_in_a_group', 16, 0, 'Task'),
(20, 1, 'New task created by mohd asif - task5454', '{"taskID":"20","taskName":"task5454","taskDescription":"task33erer","allotmentDate":"2017-01-11 00:00:00","revisedDate":null,"dueDate":"2016-01-12 00:00:00","taskType":null,"orginatorID":"1","recieverID":"10","ccID":"11","firstName":"mohd","lastName":"asif","emailID":"asif@bookmyhouse.com","contactNo":"9873878430","countryPhoneCode":"91","funType":"Individual","statusText":"pending","userPhoto":"http:\\/\\/itasku.bookmyhouse.co\\/itaskyou\\/\\/assets\\/images\\/default_avatar.png","taskTags":["tag1","tag2"],"receiverData":{"receiverCount":0,"receiverList":[]},"followingData":{"followingCount":0,"followingList":[]}}', '2017-01-11 00:00:00', 'New Task Created', 'new_task_created', 17, 0, 'Task');

-- --------------------------------------------------------

--
-- Table structure for table `ity_api_media`
--

CREATE TABLE `ity_api_media` (
  `mediaID` int(11) NOT NULL,
  `mediaType` enum('Image','Video','Audeo','Documentation') DEFAULT NULL,
  `mediaFor` enum('Task','Group','Mom') NOT NULL,
  `mediaURL` text,
  `functionTypeID` int(5) DEFAULT NULL,
  `actionID` int(11) NOT NULL COMMENT 'TaskID,GroupID,momID',
  `userID` int(11) NOT NULL,
  `createdDate` date DEFAULT NULL,
  `modifiedDate` datetime DEFAULT NULL,
  `caption` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ity_api_media_master`
--

CREATE TABLE `ity_api_media_master` (
  `mediaID` int(5) DEFAULT NULL,
  `mediaType` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ity_api_media_master`
--

INSERT INTO `ity_api_media_master` (`mediaID`, `mediaType`) VALUES
(0, 'Audio'),
(1, 'Video'),
(2, 'photo');

-- --------------------------------------------------------

--
-- Table structure for table `ity_api_mom`
--

CREATE TABLE `ity_api_mom` (
  `momID` int(11) NOT NULL,
  `momName` varchar(255) NOT NULL,
  `momDescription` text NOT NULL,
  `createdDate` date NOT NULL,
  `modifiedDate` datetime NOT NULL,
  `createdBy` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ity_api_mom`
--

INSERT INTO `ity_api_mom` (`momID`, `momName`, `momDescription`, `createdDate`, `modifiedDate`, `createdBy`) VALUES
(1, 'mom1', 'akdjalksdjjak ajsdasldkkajsd asdaksdkas asdasdl', '2017-02-01', '0000-00-00 00:00:00', 1),
(2, 'mom1', 'akdjalksdjjak ajsdasldkkajsd asdaksdkas asdasdl', '2017-02-01', '0000-00-00 00:00:00', 1),
(3, 'mom1', 'akdjalksdjjak ajsdasldkkajsd asdaksdkas asdasdl', '2017-02-01', '0000-00-00 00:00:00', 1),
(4, 'mom1', 'akdjalksdjjak ajsdasldkkajsd asdaksdkas asdasdl', '2017-02-02', '0000-00-00 00:00:00', 1),
(5, 'mom1', 'akdjalksdjjak ajsdasldkkajsd asdaksdkas asdasdl', '2017-02-02', '0000-00-00 00:00:00', 1),
(6, 'qdcv', 'Test', '2017-02-02', '0000-00-00 00:00:00', 1),
(7, 'qdcve', 'Test', '2017-02-02', '0000-00-00 00:00:00', 1),
(8, 'qdcve', 'Test', '2017-02-02', '0000-00-00 00:00:00', 1),
(9, 'qdcve', 'Test', '2017-02-02', '0000-00-00 00:00:00', 1),
(10, 'qdcve', 'Test', '2017-02-02', '0000-00-00 00:00:00', 1),
(11, 'qdcveadsasdasd', 'Test', '2017-02-02', '0000-00-00 00:00:00', 1),
(12, 'qdcveadsasdasdadasdasdasdasdasdasdasd', 'Test', '2017-02-02', '0000-00-00 00:00:00', 1),
(13, 'mom112', 'akdjalksdjjak ajsdasldkkajsd asdaksdkas asdasdl', '2017-02-03', '0000-00-00 00:00:00', 1),
(14, 'mom112', 'akdjalksdjjak ajsdasldkkajsd asdaksdkas asdasdl', '2017-02-03', '0000-00-00 00:00:00', 1),
(15, 'mom112', 'akdjalksdjjak ajsdasldkkajsd asdaksdkas asdasdl', '2017-02-03', '0000-00-00 00:00:00', 1),
(16, 'mom112', 'akdjalksdjjak ajsdasldkkajsd asdaksdkas asdasdl', '2017-02-03', '0000-00-00 00:00:00', 1),
(17, 'mom112', 'akdjalksdjjak ajsdasldkkajsd asdaksdkas asdasdl', '2017-02-03', '0000-00-00 00:00:00', 1),
(18, 'mom112', 'akdjalksdjjak ajsdasldkkajsd asdaksdkas asdasdl', '2017-02-03', '0000-00-00 00:00:00', 1),
(19, 'mom11212312', 'akdjalksdjjak ajsdasldkkajsd asdaksdkas asdasdl', '2017-02-03', '0000-00-00 00:00:00', 1),
(20, 'mom11212312', 'akdjalksdjjak ajsdasldkkajsd asdaksdkas asdasdl', '2017-02-03', '0000-00-00 00:00:00', 1),
(21, 'mom11212312', 'akdjalksdjjak ajsdasldkkajsd asdaksdkas asdasdl', '2017-02-03', '0000-00-00 00:00:00', 1),
(22, 'ttt', 'akdjalksdjjak ajsdasldkkajsd asdaksdkas asdasdl', '2017-02-04', '0000-00-00 00:00:00', 1),
(23, 'mom11212312', 'akdjalksdjjak ajsdasldkkajsd asdaksdkas asdasdl', '2017-02-04', '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ity_api_mom_observation`
--

CREATE TABLE `ity_api_mom_observation` (
  `observationID` int(11) NOT NULL,
  `momID` int(11) NOT NULL,
  `observationName` varchar(255) NOT NULL,
  `observationDescription` text NOT NULL,
  `createdDate` date NOT NULL,
  `modifiedDate` datetime NOT NULL,
  `createdBy` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ity_api_mom_observation`
--

INSERT INTO `ity_api_mom_observation` (`observationID`, `momID`, `observationName`, `observationDescription`, `createdDate`, `modifiedDate`, `createdBy`) VALUES
(1, 1, 'kasjdkasdja', 'asdasdas asdasda asdasdas asdasd adasd adad asdasd asdad', '2017-02-03', '0000-00-00 00:00:00', 1),
(2, 1, 'kasjdkasdja', 'asdasdas asdasda asdasdas asdasd adasd adad asdasd asdad', '2017-02-03', '0000-00-00 00:00:00', 1),
(3, 1, 'kasjdkasdja', 'asdasdas asdasda asdasdas asdasd adasd adad asdasd asdad', '2017-02-03', '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ity_api_mom_participant`
--

CREATE TABLE `ity_api_mom_participant` (
  `mompID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `momID` int(11) NOT NULL,
  `participantAs` enum('a','c') NOT NULL DEFAULT 'a' COMMENT 'a=participant ,c= cc participnat',
  `is_mom_creator` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ity_api_mom_participant`
--

INSERT INTO `ity_api_mom_participant` (`mompID`, `userID`, `momID`, `participantAs`, `is_mom_creator`) VALUES
(1, 1, 17, 'a', '1'),
(2, 2, 17, 'a', '0'),
(3, 3, 17, 'a', '0'),
(4, 4, 17, 'a', '0'),
(5, 0, 17, 'c', '0'),
(6, 1, 18, 'a', '1'),
(7, 2, 18, 'a', '0'),
(8, 3, 18, 'a', '0'),
(9, 4, 18, 'a', '0'),
(10, 0, 18, 'c', '0'),
(11, 1, 19, 'a', '1'),
(12, 2, 19, 'a', '0'),
(13, 3, 19, 'a', '0'),
(14, 4, 19, 'a', '0'),
(15, 0, 19, 'c', '0'),
(16, 1, 20, 'a', '1'),
(17, 2, 20, 'a', '0'),
(18, 3, 20, 'a', '0'),
(19, 4, 20, 'a', '0'),
(20, 0, 20, 'c', '0'),
(21, 1, 21, 'a', '1'),
(22, 2, 21, 'a', '0'),
(23, 3, 21, 'a', '0'),
(24, 4, 21, 'a', '0'),
(25, 0, 21, 'c', '0'),
(26, 1, 22, 'a', '1'),
(27, 2, 22, 'a', '0'),
(28, 3, 22, 'a', '0'),
(29, 4, 22, 'a', '0'),
(30, 0, 22, 'c', '0'),
(31, 1, 23, 'a', '1'),
(32, 2, 23, 'a', '0'),
(33, 3, 23, 'a', '0'),
(34, 4, 23, 'a', '0'),
(35, 0, 23, 'c', '0');

-- --------------------------------------------------------

--
-- Table structure for table `ity_api_organizations`
--

CREATE TABLE `ity_api_organizations` (
  `orgID` int(11) NOT NULL,
  `orgDomain` varchar(225) NOT NULL,
  `orgEmail` varchar(255) NOT NULL,
  `orgName` varchar(255) NOT NULL,
  `orgPhone` varchar(255) NOT NULL,
  `orgCity` varchar(255) NOT NULL,
  `orgState` varchar(225) NOT NULL,
  `orgCountry` varchar(255) NOT NULL,
  `orgAddress` varchar(255) NOT NULL,
  `orgEmployeeStraignth` varchar(11) NOT NULL,
  `orgPackage` varchar(255) NOT NULL,
  `orgPackageExpiredDate` datetime NOT NULL,
  `orgPackagePurchaseDate` datetime NOT NULL,
  `orgJoinedEmployees` int(5) NOT NULL,
  `status` enum('1','0','-1','-2') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ity_api_organizations`
--

INSERT INTO `ity_api_organizations` (`orgID`, `orgDomain`, `orgEmail`, `orgName`, `orgPhone`, `orgCity`, `orgState`, `orgCountry`, `orgAddress`, `orgEmployeeStraignth`, `orgPackage`, `orgPackageExpiredDate`, `orgPackagePurchaseDate`, `orgJoinedEmployees`, `status`) VALUES
(1, 'bookmyhouse.com', 'service@bookmyhouse.com', 'bookmyhouse', '9303003939', 'Gurgoan', 'Haryana', 'India', 'Raheja Mall Sona Road', '150', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '1');

-- --------------------------------------------------------

--
-- Table structure for table `ity_api_receiveer`
--

CREATE TABLE `ity_api_receiveer` (
  `taskID` int(11) DEFAULT NULL,
  `userID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ity_api_receiveer`
--

INSERT INTO `ity_api_receiveer` (`taskID`, `userID`) VALUES
(1, 2),
(2, 4),
(3, 1),
(4, 5),
(5, 5),
(6, 5),
(10, 5),
(11, 5),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 10),
(18, 10),
(19, 10),
(20, 10);

-- --------------------------------------------------------

--
-- Table structure for table `ity_api_share_contacts`
--

CREATE TABLE `ity_api_share_contacts` (
  `contactID` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `contactNumber` int(11) DEFAULT NULL,
  `userID` int(11) DEFAULT NULL,
  `functionalType` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ity_api_sub_industory_type_master`
--

CREATE TABLE `ity_api_sub_industory_type_master` (
  `subTypeID` int(11) NOT NULL,
  `subType` varchar(255) DEFAULT NULL,
  `createdDate` date DEFAULT NULL,
  `modifiedDate` datetime DEFAULT NULL,
  `typeID` int(11) NOT NULL,
  `status` enum('1','0') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ity_api_sub_industory_type_master`
--

INSERT INTO `ity_api_sub_industory_type_master` (`subTypeID`, `subType`, `createdDate`, `modifiedDate`, `typeID`, `status`) VALUES
(7, 'w', '2016-09-23', '2016-09-24 00:00:00', 4, '1'),
(8, 'Fixed Line Telecom', '2016-09-28', NULL, 9, '1'),
(9, 'Mobile Telecom', '2016-09-28', NULL, 9, '1'),
(10, 'Residential Real Estate', '2016-09-28', NULL, 5, '1'),
(11, 'Commercial Real Estate', '2016-09-28', NULL, 5, '1'),
(12, 'Industrial Real Estate', '2016-09-28', NULL, 5, '1'),
(13, 'Hardware', '2016-09-28', NULL, 1, '1'),
(14, 'Software', '2016-09-28', '2016-12-22 00:00:00', 1, '1'),
(15, 'Services', '2016-09-28', '2016-12-22 00:00:00', 1, '1'),
(16, 'Homefurnishing', '2016-09-28', '2016-09-29 00:00:00', 6, '1'),
(17, 'Automotive', '2016-09-28', '2016-12-22 00:00:00', 6, '1'),
(18, 'Apparel', '2016-09-28', '2016-09-29 00:00:00', 6, '1'),
(19, 'Industrial Real Estate', '2016-09-28', NULL, 0, '1'),
(20, 'B2B', '2016-09-29', '2016-12-08 00:00:00', 7, '1'),
(21, 'B2C', '2016-09-29', '2016-12-22 00:00:00', 7, '1'),
(22, 'C2B', '2016-09-29', '2016-12-08 00:00:00', 7, '1');

-- --------------------------------------------------------

--
-- Table structure for table `ity_api_tag_master`
--

CREATE TABLE `ity_api_tag_master` (
  `tagID` int(11) NOT NULL,
  `tagText` varchar(255) DEFAULT NULL,
  `userID` int(11) DEFAULT NULL,
  `createdDate` date DEFAULT NULL,
  `modifiedDate` datetime DEFAULT NULL,
  `status` enum('1','0') DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ity_api_tag_master`
--

INSERT INTO `ity_api_tag_master` (`tagID`, `tagText`, `userID`, `createdDate`, `modifiedDate`, `status`) VALUES
(1, 'asiftag', 1, '2016-11-24', NULL, '1'),
(2, ' mytags', 1, '2016-11-24', NULL, '1'),
(3, ' owntags', 1, '2016-11-24', NULL, '1'),
(4, 'taget', 1, '2016-11-25', NULL, '1'),
(5, ' djdjjd', 1, '2016-11-25', NULL, '1'),
(6, ' hdjjdj', 1, '2016-11-25', NULL, '1'),
(7, ' djjdhf', 1, '2016-11-25', NULL, '1'),
(8, ' hdjhhd', 1, '2016-11-25', NULL, '1'),
(9, 'tags', 2, '2016-11-25', NULL, '1'),
(10, ' zbbzzbbz', 2, '2016-11-25', NULL, '1'),
(11, ' zhzhjzzn', 2, '2016-11-25', NULL, '1'),
(12, 'taddd', 1, '2016-11-25', NULL, '1'),
(13, ' hdjjf', 1, '2016-11-25', NULL, '1'),
(14, ' hhjf', 1, '2016-11-25', NULL, '1'),
(15, ' hjjc', 1, '2016-11-25', NULL, '1'),
(16, ' hjdjjf', 1, '2016-11-25', NULL, '1'),
(17, 'vhdjdj', 1, '2016-11-25', NULL, '1'),
(18, ' djjjfjf', 1, '2016-11-25', NULL, '1'),
(19, ' jdjjfjf', 1, '2016-11-25', NULL, '1'),
(20, ' hjdjfj', 1, '2016-11-25', NULL, '1'),
(21, 'hdhjf jfjjf', 1, '2016-11-25', NULL, '1'),
(22, ' djjfjfj fjcjjf', 1, '2016-11-25', NULL, '1'),
(23, 'tag', 1, '2016-11-25', NULL, '1'),
(24, ' dxf', 1, '2016-11-25', NULL, '1'),
(25, ' xjxjx', 2, '2016-11-26', NULL, '1'),
(26, 'itsgshs', 2, '2016-11-26', NULL, '1'),
(27, ' xhxhxbbz', 2, '2016-11-26', NULL, '1'),
(28, ' dhjssjsnssb', 2, '2016-11-26', NULL, '1'),
(29, 'zbbzzbbz', 2, '2016-11-26', NULL, '1'),
(30, 'xjxjx', 2, '2016-11-26', NULL, '1'),
(31, 'zhzhjzzn', 2, '2016-11-26', NULL, '1'),
(32, 'xhxhxhxhxbbznx', 2, '2016-11-29', NULL, '1'),
(33, ' tag', 1, '2016-11-29', NULL, '1'),
(34, 'jdjjd', 1, '2016-11-29', NULL, '1'),
(35, ' jdjjjj', 1, '2016-11-29', NULL, '1'),
(36, ' hjjjj', 1, '2016-11-29', NULL, '1'),
(37, ' tag2', 1, '2016-11-29', NULL, '1'),
(38, 'app', 1, '2016-11-29', NULL, '1'),
(39, ' testing', 1, '2016-11-29', NULL, '1'),
(40, 'vhjkkkk', 2, '2016-11-29', NULL, '1'),
(41, ' ghijhgjjgvv', 2, '2016-11-29', NULL, '1'),
(42, 'tagrr', 1, '2016-11-29', NULL, '1'),
(43, ' fjjf', 1, '2016-11-29', NULL, '1'),
(44, ' hfhhfh', 1, '2016-11-29', NULL, '1'),
(45, ' chhhf', 1, '2016-11-29', NULL, '1'),
(46, 'gggh', 2, '2016-11-29', NULL, '1'),
(47, 'it', 2, '2016-11-30', NULL, '1'),
(48, ' sales', 2, '2016-11-30', NULL, '1'),
(49, ' market', 2, '2016-11-30', NULL, '1'),
(50, ' gggh', 2, '2016-11-30', NULL, '1'),
(51, ' ffjddjfgv', 2, '2016-11-30', NULL, '1'),
(52, ' hello', 2, '2016-11-30', NULL, '1'),
(53, ' bye', 2, '2016-11-30', NULL, '1'),
(54, ' sigh', 2, '2016-11-30', NULL, '1'),
(55, ' iujgfg', 2, '2016-11-30', NULL, '1'),
(56, ' xxchchchchc', 2, '2016-11-30', NULL, '1'),
(57, ' iijhbbnn', 2, '2016-11-30', NULL, '1'),
(58, ' yes ysyzyzxy', 2, '2016-11-30', NULL, '1'),
(59, ' xhxhxhxhxbbznx', 2, '2016-11-30', NULL, '1'),
(60, 'twst', 1, '2016-12-01', NULL, '1'),
(61, ' dx', 1, '2016-12-01', NULL, '1'),
(62, ' dfccff', 1, '2016-12-01', NULL, '1'),
(63, ' ffcfcccf', 1, '2016-12-01', NULL, '1'),
(64, ' fffcff', 1, '2016-12-01', NULL, '1'),
(65, ' ffcc', 1, '2016-12-01', NULL, '1'),
(66, 'zzxxxd', 1, '2016-12-01', NULL, '1'),
(67, ' dddfff', 1, '2016-12-01', NULL, '1'),
(68, ' fffgggggggg', 1, '2016-12-01', NULL, '1'),
(69, ' ffgggggg', 1, '2016-12-01', NULL, '1'),
(70, 'Gmail Gmail', 2, '2016-12-02', NULL, '1'),
(71, ' yahoo', 2, '2016-12-02', NULL, '1'),
(72, ' omg', 2, '2016-12-02', NULL, '1'),
(73, 'fttttt fgggghh', 2, '2016-12-02', NULL, '1'),
(74, 'tag1', 1, '2016-12-05', NULL, '1'),
(75, 'tag2', 1, '2016-12-05', NULL, '1'),
(76, '', 2, '2016-12-05', NULL, '1'),
(77, ' v', 2, '2016-12-05', NULL, '1'),
(78, ' h', 2, '2016-12-05', NULL, '1'),
(79, ' j', 2, '2016-12-05', NULL, '1'),
(80, ' k', 2, '2016-12-05', NULL, '1'),
(81, ' g', 2, '2016-12-05', NULL, '1'),
(82, ' i', 2, '2016-12-05', NULL, '1'),
(83, ' u', 2, '2016-12-05', NULL, '1'),
(84, ' ruur', 2, '2016-12-05', NULL, '1'),
(85, ' rjjrjr', 2, '2016-12-05', NULL, '1'),
(86, ' fjfjfj', 2, '2016-12-05', NULL, '1'),
(87, ' f', 2, '2016-12-05', NULL, '1'),
(88, ' y', 2, '2016-12-05', NULL, '1'),
(89, ' shruti', 2, '2016-12-05', NULL, '1'),
(90, ' s', 2, '2016-12-05', NULL, '1'),
(91, ' r', 2, '2016-12-05', NULL, '1'),
(92, ' t', 2, '2016-12-05', NULL, '1'),
(93, ' cfv', 2, '2016-12-05', NULL, '1'),
(94, ' hhgg', 2, '2016-12-05', NULL, '1'),
(95, ' huuuu', 2, '2016-12-05', NULL, '1'),
(96, ' hhl', 2, '2016-12-05', NULL, '1'),
(97, ' l', 2, '2016-12-05', NULL, '1'),
(98, ' uu', 2, '2016-12-05', NULL, '1'),
(99, ' hh', 2, '2016-12-05', NULL, '1'),
(100, ' uuu', 2, '2016-12-05', NULL, '1'),
(101, ' hhhh', 2, '2016-12-05', NULL, '1'),
(102, 'tag3', 2, '2016-12-05', NULL, '1'),
(103, 'test4 ', 2, '2016-12-05', NULL, '1'),
(104, ' e', 2, '2016-12-05', NULL, '1'),
(105, ' z', 2, '2016-12-05', NULL, '1'),
(106, ' x', 2, '2016-12-05', NULL, '1'),
(107, ' b', 2, '2016-12-05', NULL, '1'),
(108, ' n', 2, '2016-12-05', NULL, '1'),
(109, ' hhjj', 2, '2016-12-05', NULL, '1'),
(110, ' ghh', 2, '2016-12-05', NULL, '1'),
(111, ' fghj', 2, '2016-12-05', NULL, '1'),
(112, ' tags', 2, '2016-12-05', NULL, '1'),
(113, ' tagde', 2, '2016-12-05', NULL, '1'),
(114, ' a', 2, '2016-12-05', NULL, '1'),
(115, ' d', 2, '2016-12-05', NULL, '1'),
(116, ' eee', 2, '2016-12-05', NULL, '1'),
(117, ' ty', 2, '2016-12-05', NULL, '1'),
(118, ' yu', 2, '2016-12-05', NULL, '1'),
(119, ' u u tt', 2, '2016-12-05', NULL, '1'),
(120, ' u u u u tt gg', 2, '2016-12-05', NULL, '1'),
(121, ' tt', 2, '2016-12-05', NULL, '1'),
(122, ' gg', 2, '2016-12-05', NULL, '1'),
(123, 'u', 2, '2016-12-05', NULL, '1'),
(124, 'u u u u tt gg', 2, '2016-12-05', NULL, '1'),
(125, ' tag3', 2, '2016-12-05', NULL, '1'),
(126, ' tag4', 2, '2016-12-05', NULL, '1'),
(127, ' tag5', 2, '2016-12-05', NULL, '1'),
(128, 'tag5', 2, '2016-12-05', NULL, '1'),
(129, 'tag4', 2, '2016-12-05', NULL, '1'),
(130, 'tagq', 2, '2016-12-05', NULL, '1'),
(131, ' tagq', 2, '2016-12-05', NULL, '1'),
(132, ' Dhdhdhdh', 2, '2016-12-05', NULL, '1'),
(133, 'Dhdhdhdh', 2, '2016-12-05', NULL, '1'),
(134, ' GM''s', 2, '2016-12-06', NULL, '1'),
(135, 'hello', 2, '2016-12-06', NULL, '1'),
(136, 'GM''s', 2, '2016-12-06', NULL, '1'),
(137, 'testing', 1, '2016-12-06', NULL, '1'),
(138, 'tags200', 1, '2016-12-07', NULL, '1'),
(139, 'tag201', 1, '2016-12-07', NULL, '1'),
(140, ' uovhooh', 2, '2016-12-16', NULL, '1'),
(141, ' xys6r64', 2, '2016-12-16', NULL, '1'),
(142, ' WhatsApp', 91, '2016-12-16', NULL, '1'),
(143, 'tahhdj', 1, '2016-12-16', NULL, '1'),
(144, ' hjdjd', 1, '2016-12-16', NULL, '1'),
(145, 'adf', 1, '2016-12-16', NULL, '1'),
(146, ' df', 1, '2016-12-16', NULL, '1'),
(147, ' fffgg', 1, '2016-12-16', NULL, '1'),
(148, 'asdd', 1, '2016-12-16', NULL, '1'),
(149, ' dffff', 1, '2016-12-16', NULL, '1'),
(150, 'thhxhxh', 1, '2016-12-16', NULL, '1'),
(151, ' hhhdhdh', 1, '2016-12-16', NULL, '1'),
(152, ' hhxhhdh', 1, '2016-12-16', NULL, '1'),
(153, 'zdddf', 1, '2016-12-16', NULL, '1'),
(154, ' ffgggg', 1, '2016-12-16', NULL, '1'),
(155, ' fgggg', 1, '2016-12-16', NULL, '1'),
(156, 'zxxxxx', 1, '2016-12-16', NULL, '1'),
(157, ' zxxx', 1, '2016-12-16', NULL, '1'),
(158, ' it', 2, '2016-12-16', NULL, '1'),
(159, 'sales', 2, '2016-12-16', NULL, '1'),
(160, 'bye', 2, '2016-12-16', NULL, '1'),
(161, ' sjsjzj', 2, '2016-12-16', NULL, '1'),
(162, ' sdj', 2, '2016-12-16', NULL, '1'),
(163, ' she', 2, '2016-12-16', NULL, '1'),
(164, ' disks', 2, '2016-12-16', NULL, '1'),
(165, ' sisisjssjjssj', 2, '2016-12-16', NULL, '1'),
(166, 'sjsjzj', 2, '2016-12-16', NULL, '1'),
(167, 'sisisjssjjssj', 2, '2016-12-16', NULL, '1'),
(168, ' cjhc', 2, '2016-12-16', NULL, '1'),
(169, ' of', 2, '2016-12-16', NULL, '1'),
(170, ' Fifi', 2, '2016-12-16', NULL, '1'),
(171, ' ooh', 2, '2016-12-16', NULL, '1'),
(172, ' fyouf', 2, '2016-12-16', NULL, '1'),
(173, ' gpgipig', 2, '2016-12-16', NULL, '1'),
(174, 'apple', 2, '2016-12-16', NULL, '1'),
(175, 'gghg', 1, '2016-12-16', NULL, '1'),
(176, ' ggg', 1, '2016-12-16', NULL, '1'),
(177, ' ghg', 1, '2016-12-16', NULL, '1'),
(178, 'ta', 1, '2016-12-20', NULL, '1'),
(179, ' hhf', 1, '2016-12-20', NULL, '1'),
(180, 'hdhjd', 1, '2016-12-20', NULL, '1'),
(181, ' fhjfjf', 1, '2016-12-20', NULL, '1'),
(182, 'shdj', 1, '2016-12-20', NULL, '1'),
(183, ' hdhhf', 1, '2016-12-20', NULL, '1'),
(184, ' hfbfb', 1, '2016-12-20', NULL, '1'),
(185, 'ndhdh', 1, '2016-12-20', NULL, '1'),
(186, ' hxhfbbf', 1, '2016-12-20', NULL, '1'),
(187, ' hfbbb', 1, '2016-12-20', NULL, '1'),
(188, 'ut', 1, '2016-12-20', NULL, '1'),
(189, 'djjdjf', 1, '2016-12-20', NULL, '1'),
(190, ' hxhjfjf', 1, '2016-12-20', NULL, '1'),
(191, ' bchhfh', 1, '2016-12-20', NULL, '1'),
(192, 'djjd', 1, '2016-12-20', NULL, '1'),
(193, ' hdhbf', 1, '2016-12-20', NULL, '1'),
(194, ' vcbbf', 1, '2016-12-20', NULL, '1'),
(195, ' dvvf', 1, '2016-12-20', NULL, '1'),
(196, 'sjjd', 1, '2016-12-20', NULL, '1'),
(197, ' bdbbbf', 1, '2016-12-20', NULL, '1'),
(198, ' hfbbf', 1, '2016-12-20', NULL, '1'),
(199, 'djjdj', 1, '2016-12-20', NULL, '1'),
(200, ' hdhhfh', 1, '2016-12-20', NULL, '1'),
(201, ' gdbbfb', 1, '2016-12-20', NULL, '1'),
(202, 'xjjfjjf', 1, '2016-12-20', NULL, '1'),
(203, ' hfhhfhf', 1, '2016-12-20', NULL, '1'),
(204, ' hfhhfbf', 1, '2016-12-20', NULL, '1'),
(205, 'dhdjhd', 1, '2016-12-20', NULL, '1'),
(206, ' dbhfbfh', 1, '2016-12-20', NULL, '1'),
(207, ' fbbfbf', 1, '2016-12-20', NULL, '1'),
(208, ' hap', 2, '2016-12-20', NULL, '1'),
(209, ' gap', 2, '2016-12-20', NULL, '1'),
(210, 'dhdnd', 2, '2016-12-20', NULL, '1'),
(211, ' zn', 2, '2016-12-20', NULL, '1'),
(212, ' good', 2, '2016-12-20', NULL, '1'),
(213, ' bie', 2, '2016-12-20', NULL, '1'),
(214, ' aaasss', 2, '2016-12-20', NULL, '1'),
(215, ' Crm', 2, '2016-12-20', NULL, '1'),
(216, 'sale', 2, '2016-12-20', NULL, '1'),
(217, ' helehg', 2, '2016-12-20', NULL, '1'),
(218, ' sale', 2, '2016-12-20', NULL, '1'),
(219, ' gh', 2, '2016-12-20', NULL, '1'),
(220, ' hj', 2, '2016-12-20', NULL, '1'),
(221, 'hjj', 1, '2016-12-20', NULL, '1'),
(222, ' ghhh', 1, '2016-12-20', NULL, '1'),
(223, 'ggg', 1, '2016-12-20', NULL, '1'),
(224, ' hhh', 1, '2016-12-20', NULL, '1'),
(225, 'tyt', 1, '2016-12-20', NULL, '1'),
(226, 'hhhh', 1, '2016-12-21', NULL, '1'),
(227, ' gghh', 1, '2016-12-21', NULL, '1'),
(228, 'hjjjdf', 1, '2016-12-21', NULL, '1'),
(229, ' hxhhfj', 1, '2016-12-21', NULL, '1'),
(230, ' hfhhf', 1, '2016-12-21', NULL, '1'),
(231, ' hfhhhf', 1, '2016-12-21', NULL, '1'),
(232, 'xjjdjd', 1, '2016-12-21', NULL, '1'),
(233, ' hjdjdj', 1, '2016-12-21', NULL, '1'),
(234, ' hhhd', 1, '2016-12-21', NULL, '1'),
(235, ' hdhhdh', 1, '2016-12-21', NULL, '1'),
(236, ' bdbbf', 1, '2016-12-21', NULL, '1'),
(237, 'bbbb', 1, '2016-12-21', NULL, '1'),
(238, ' ccc', 1, '2016-12-21', NULL, '1'),
(239, ' also', 2, '2016-12-21', NULL, '1'),
(240, ' home', 2, '2016-12-21', NULL, '1'),
(241, 'dhhdh', 1, '2016-12-21', NULL, '1'),
(242, ' dhhfh', 1, '2016-12-21', NULL, '1'),
(243, ' hdhhd', 1, '2016-12-21', NULL, '1'),
(244, ' bdb', 1, '2016-12-21', NULL, '1'),
(245, ' dvbbd', 1, '2016-12-21', NULL, '1'),
(246, ' on', 2, '2016-12-21', NULL, '1'),
(247, 'hhshd', 1, '2016-12-21', NULL, '1'),
(248, ' djjjf', 1, '2016-12-21', NULL, '1'),
(249, ' djjf', 1, '2016-12-21', NULL, '1'),
(250, ' dhhf', 1, '2016-12-21', NULL, '1'),
(251, 'djdjhf', 1, '2016-12-21', NULL, '1'),
(252, ' fff', 1, '2016-12-21', NULL, '1'),
(253, ' fcg', 1, '2016-12-21', NULL, '1'),
(254, 'dhfh', 1, '2016-12-21', NULL, '1'),
(255, ' bxbhf', 1, '2016-12-21', NULL, '1'),
(256, 'modi', 2, '2016-12-21', NULL, '1'),
(257, 'duc', 90, '2016-12-21', NULL, '1'),
(258, 'gun', 90, '2016-12-21', NULL, '1'),
(259, ' fyfygodypdpy', 90, '2016-12-21', NULL, '1'),
(260, 'didi', 90, '2016-12-21', '2016-12-22 00:00:00', '1'),
(261, 'ttt', 92, '2016-12-22', NULL, '1'),
(262, 'crm', 91, '2016-12-22', NULL, '1'),
(263, 'shjd', 1, '2016-12-22', NULL, '1'),
(264, ' dbhfb', 1, '2016-12-22', NULL, '1'),
(265, 'dhhhf', 1, '2016-12-22', NULL, '1'),
(266, ' fhhfh', 1, '2016-12-22', NULL, '1'),
(267, 'dudud', 1, '2016-12-22', NULL, '1'),
(268, ' cbbb', 1, '2016-12-22', NULL, '1'),
(269, ' hfhhfj', 1, '2016-12-22', NULL, '1'),
(270, ' fhhf', 1, '2016-12-22', NULL, '1'),
(271, ' dhhhf', 1, '2016-12-22', NULL, '1'),
(272, ' asif', 1, '2016-12-22', NULL, '1'),
(273, 'dhdhh', 1, '2016-12-22', NULL, '1'),
(274, ' bxbbf', 1, '2016-12-22', NULL, '1'),
(275, ' hxhbf', 1, '2016-12-22', NULL, '1'),
(276, 'shsh', 1, '2016-12-22', NULL, '1'),
(277, 'abc', 2, '2016-12-22', NULL, '1'),
(278, ' aa', 2, '2016-12-22', NULL, '1'),
(279, 'hxjzjz', 2, '2016-12-22', NULL, '1'),
(280, ' hdzn', 2, '2016-12-22', NULL, '1'),
(281, ' dhhfj', 1, '2016-12-22', NULL, '1'),
(282, ' dbbfh', 1, '2016-12-22', NULL, '1'),
(283, 'dyyfy', 1, '2016-12-22', NULL, '1'),
(284, ' fhhbf', 1, '2016-12-22', NULL, '1'),
(285, 'iy', 16, '2016-12-23', NULL, '1'),
(286, ' hlo', 98, '2016-12-23', NULL, '1'),
(287, 'hslsks', 98, '2016-12-23', NULL, '1'),
(288, ' sbsbsn', 98, '2016-12-23', NULL, '1'),
(289, 'hleeoo', 98, '2016-12-23', NULL, '1'),
(290, 'gelllo', 98, '2016-12-23', NULL, '1'),
(291, 'iit', 98, '2016-12-23', NULL, '1'),
(292, 'yyy', 1, '2016-12-23', NULL, '1'),
(293, ' yyuuu', 1, '2016-12-23', NULL, '1'),
(294, 'tt', 1, '2016-12-23', NULL, '1'),
(295, ' iii', 1, '2016-12-23', NULL, '1'),
(296, ' opjjj', 1, '2016-12-23', NULL, '1'),
(297, 'dhhfhhf', 1, '2016-12-25', NULL, '1'),
(298, ' fhhfb', 1, '2016-12-25', NULL, '1'),
(299, ' fbbf', 1, '2016-12-25', NULL, '1'),
(300, 'isbsbz', 98, '2016-12-26', NULL, '1'),
(301, ' znzn', 98, '2016-12-26', NULL, '1'),
(302, 'xhxhx', 2, '2016-12-26', NULL, '1'),
(303, 'xhzbxzn', 2, '2016-12-26', NULL, '1'),
(304, 'xhxhz', 2, '2016-12-26', NULL, '1'),
(305, 'dvvec', 101, '2016-12-26', NULL, '1'),
(306, 'sbsbsbbs', 101, '2016-12-26', NULL, '1'),
(307, 'dhhssh', 126, '2016-12-27', NULL, '1'),
(308, 'hdhdh', 1, '2016-12-27', NULL, '1'),
(309, ' bfhhf', 1, '2016-12-27', NULL, '1'),
(310, 'gf', 126, '2016-12-27', NULL, '1'),
(311, ' kk', 126, '2016-12-27', NULL, '1'),
(312, 'gggg', 126, '2016-12-27', NULL, '1'),
(313, 'ggikkgkg', 126, '2016-12-27', NULL, '1'),
(314, 'djdjx', 126, '2016-12-27', NULL, '1'),
(315, 'iii', 126, '2016-12-27', NULL, '1'),
(316, 'duud', 1, '2016-12-27', NULL, '1'),
(317, 'yyyy', 1, '2016-12-27', NULL, '1'),
(318, ' uii', 1, '2016-12-27', NULL, '1'),
(319, ' iio', 1, '2016-12-27', NULL, '1'),
(320, ' ooo', 1, '2016-12-27', NULL, '1'),
(321, 'tu', 126, '2016-12-27', NULL, '1'),
(322, 'dddd', 126, '2016-12-27', NULL, '1'),
(323, 'nznz', 126, '2016-12-27', NULL, '1'),
(324, 'jvjcjv', 126, '2016-12-27', NULL, '1'),
(325, 'zhzbz', 126, '2016-12-27', NULL, '1'),
(326, 'sbsbsbbzbz', 126, '2016-12-27', NULL, '1'),
(327, 'vbhh', 126, '2016-12-27', NULL, '1'),
(328, 'xb', 126, '2016-12-27', NULL, '1'),
(329, 'hdhh', 1, '2016-12-28', NULL, '1'),
(330, ' bxhbx', 1, '2016-12-28', NULL, '1'),
(331, ' hd', 1, '2016-12-28', NULL, '1'),
(332, ' bd', 1, '2016-12-28', NULL, '1'),
(333, ' dhd', 1, '2016-12-28', NULL, '1'),
(334, ' xbbxxb', 2, '2016-12-28', NULL, '1'),
(335, ' vb', 2, '2016-12-28', NULL, '1'),
(336, 'yy', 1, '2016-12-28', NULL, '1'),
(337, ' xhxhx', 2, '2016-12-28', NULL, '1'),
(338, 'sbbd', 1, '2016-12-28', NULL, '1'),
(339, ' dbbf', 1, '2016-12-28', NULL, '1'),
(340, ' ggh', 1, '2016-12-29', NULL, '1'),
(341, 'song', 1, '2016-12-29', NULL, '1'),
(342, ' cake catting', 1, '2016-12-29', NULL, '1'),
(343, ' gift', 1, '2016-12-29', NULL, '1'),
(344, ' leave', 1, '2016-12-29', NULL, '1'),
(345, 'aa', 2, '2016-12-29', NULL, '1'),
(346, 'cvv', 2, '2016-12-29', NULL, '1'),
(347, 'zbbz', 2, '2016-12-29', NULL, '1'),
(348, 'zbznzn', 2, '2016-12-29', NULL, '1'),
(349, 'hhhb', 2, '2016-12-29', NULL, '1'),
(350, 'dkgs', 2, '2016-12-29', NULL, '1'),
(351, 'xhx', 2, '2016-12-29', NULL, '1'),
(352, 'ggh', 2, '2016-12-29', NULL, '1'),
(353, 'hh', 2, '2016-12-29', NULL, '1'),
(354, 'hj', 2, '2016-12-29', NULL, '1'),
(355, 'gh', 2, '2016-12-29', NULL, '1'),
(356, 'gg', 2, '2016-12-29', NULL, '1'),
(357, 'vjcv', 2, '2016-12-29', NULL, '1'),
(358, 'fgg', 2, '2016-12-29', NULL, '1'),
(359, 'bg', 2, '2016-12-29', NULL, '1'),
(360, 'dfjddj', 2, '2016-12-29', NULL, '1'),
(361, 'fjjc', 2, '2016-12-29', NULL, '1'),
(362, 'hbbj', 2, '2016-12-29', NULL, '1'),
(363, 'vbb', 2, '2016-12-29', NULL, '1'),
(364, 'bbn', 2, '2016-12-29', NULL, '1'),
(365, 'zhzb', 2, '2016-12-29', NULL, '1'),
(366, 'sjjz', 2, '2016-12-29', NULL, '1'),
(367, 'hxn', 2, '2016-12-29', NULL, '1'),
(368, 'hhh', 2, '2016-12-30', NULL, '1'),
(369, 'vb', 2, '2016-12-30', NULL, '1'),
(370, 'nn', 2, '2016-12-30', NULL, '1'),
(371, 'xnnx', 2, '2016-12-30', NULL, '1'),
(372, 'xbnx', 2, '2016-12-30', NULL, '1'),
(373, 'mm', 2, '2016-12-30', NULL, '1'),
(374, 'h', 2, '2016-12-30', NULL, '1'),
(375, 'hchchc', 2, '2016-12-31', NULL, '1'),
(376, 'cjch', 2, '2016-12-31', NULL, '1'),
(377, 'sss', 1, '2016-12-31', NULL, '1'),
(378, ' ddd', 1, '2016-12-31', NULL, '1'),
(379, 'jcj', 2, '2016-12-31', NULL, '1'),
(380, 'vvv', 2, '2016-12-31', NULL, '1'),
(381, 'jcjc', 2, '2016-12-31', NULL, '1'),
(382, 'jfj', 2, '2016-12-31', NULL, '1'),
(383, 'vbn', 2, '2016-12-31', NULL, '1'),
(384, 'n.', 2, '2016-12-31', NULL, '1'),
(385, 'bb', 2, '2016-12-31', NULL, '1'),
(386, 'ldhhd', 1, '2016-12-31', NULL, '1'),
(387, 'uuj', 1, '2016-12-31', NULL, '1'),
(388, 'cnnc', 2, '2016-12-31', NULL, '1'),
(389, 'yyyiii', 1, '2016-12-31', NULL, '1'),
(390, ' hhhhh', 1, '2016-12-31', NULL, '1'),
(391, ' frd', 1, '2016-12-31', NULL, '1'),
(392, 'xn', 2, '2016-12-31', NULL, '1'),
(393, 'vvk', 2, '2016-12-31', NULL, '1'),
(394, 'xh', 2, '2016-12-31', NULL, '1'),
(395, 'ghjj', 2, '2016-12-31', NULL, '1'),
(396, ' hjh', 1, '2016-12-31', NULL, '1'),
(397, 'back end', 128, '2016-12-31', NULL, '1'),
(398, ' hhvv', 1, '2016-12-31', NULL, '1'),
(399, 'xnxn', 2, '2016-12-31', NULL, '1'),
(400, 'B', 2, '2016-12-31', NULL, '1'),
(401, 'zj', 2, '2016-12-31', NULL, '1'),
(402, 'nhkkhhh', 1, '2016-12-31', NULL, '1'),
(403, ' ghhg', 0, '2017-01-01', NULL, '1'),
(404, ' ggy', 0, '2017-01-01', NULL, '1'),
(405, 'hsh', 128, '2017-01-01', NULL, '1'),
(406, 'gya', 128, '2017-01-01', NULL, '1'),
(407, 'dh', 130, '2017-01-01', NULL, '1'),
(408, 'hkv', 1, '2017-01-02', NULL, '1'),
(409, 'ddd', 1, '2017-01-02', NULL, '1'),
(410, 'jjj', 1, '2017-01-02', NULL, '1'),
(411, 'djd', 130, '2017-01-03', NULL, '1'),
(412, 'djhd', 138, '2017-01-03', NULL, '1'),
(413, ' cjjc', 138, '2017-01-03', NULL, '1'),
(414, ' cncn', 138, '2017-01-03', NULL, '1'),
(415, ' cncnn', 138, '2017-01-03', NULL, '1'),
(416, ' cjnc', 138, '2017-01-03', NULL, '1'),
(417, 'znn', 2, '2017-01-03', NULL, '1'),
(418, 'multimedia', 128, '2017-01-04', NULL, '1'),
(419, 'ggggg', 1, '2017-01-04', NULL, '1'),
(420, 'yyucjc', 1, '2017-01-04', NULL, '1'),
(421, ' vncb', 1, '2017-01-04', NULL, '1'),
(422, 'hdh', 2, '2017-01-04', NULL, '1'),
(423, 'test', 1, '2017-01-05', NULL, '1'),
(424, ' yyy', 1, '2017-01-05', NULL, '1'),
(425, 'zbzn', 140, '2017-01-05', NULL, '1'),
(426, 'yhhg', 1, '2017-01-05', NULL, '1'),
(427, ' hjvn', 1, '2017-01-05', NULL, '1'),
(428, 'hghgh', 1, '2017-01-05', NULL, '1'),
(429, ' vhjb', 1, '2017-01-05', NULL, '1'),
(430, 'zjnz', 130, '2017-01-06', NULL, '1'),
(431, 'yfg', 138, '2017-01-06', NULL, '1'),
(432, '5jyn', 138, '2017-01-06', NULL, '1'),
(433, 'hfjf', 137, '2017-01-06', NULL, '1'),
(434, 'jfjf', 137, '2017-01-06', NULL, '1'),
(435, 'jfjg', 137, '2017-01-06', NULL, '1'),
(436, ' hhgh', 1, '2017-01-07', NULL, '1'),
(437, ' bb', 2, '2017-01-08', NULL, '1'),
(438, ' vjfjcjx', 2, '2017-01-08', NULL, '1'),
(439, ' xbbxbd', 2, '2017-01-08', NULL, '1'),
(440, ' dhnxdn', 2, '2017-01-08', NULL, '1'),
(441, ' xhhxhx', 2, '2017-01-08', NULL, '1'),
(442, ' sbnzsn', 2, '2017-01-08', NULL, '1'),
(443, ' xjjxjjx', 2, '2017-01-08', NULL, '1'),
(444, ' xhhxbx', 2, '2017-01-08', NULL, '1'),
(445, ' no jxjx', 2, '2017-01-08', NULL, '1'),
(446, ' cc', 2, '2017-01-08', NULL, '1'),
(447, ' dd', 2, '2017-01-08', NULL, '1'),
(448, 'ubu', 138, '2017-01-09', NULL, '1'),
(449, 'kjfkf', 138, '2017-01-09', NULL, '1'),
(450, 'djjc', 138, '2017-01-09', NULL, '1'),
(451, 'jfjfjj', 138, '2017-01-09', NULL, '1'),
(452, 'jcjfj', 138, '2017-01-09', NULL, '1'),
(453, 'fkmf', 138, '2017-01-09', NULL, '1'),
(454, 'ffg', 138, '2017-01-09', NULL, '1'),
(455, 'fjjf', 138, '2017-01-09', NULL, '1');

-- --------------------------------------------------------

--
-- Table structure for table `ity_api_tag_task`
--

CREATE TABLE `ity_api_tag_task` (
  `tagID` int(11) DEFAULT NULL,
  `taskID` int(11) DEFAULT NULL,
  `userID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ity_api_tag_task`
--

INSERT INTO `ity_api_tag_task` (`tagID`, `taskID`, `userID`) VALUES
(74, 1, 1),
(75, 1, 1),
(74, 2, 1),
(75, 2, 1),
(74, 3, 1),
(75, 3, 1),
(74, 4, 1),
(75, 4, 1),
(74, 5, 1),
(75, 5, 1),
(74, 6, 1),
(75, 6, 1),
(74, 10, 1),
(75, 10, 1),
(74, 11, 1),
(75, 11, 1),
(74, 12, 1),
(75, 12, 1),
(74, 13, 1),
(75, 13, 1),
(74, 14, 1),
(75, 14, 1),
(74, 15, 1),
(75, 15, 1),
(74, 16, 1),
(75, 16, 1),
(74, 17, 1),
(75, 17, 1),
(74, 18, 1),
(75, 18, 1),
(74, 19, 1),
(75, 19, 1),
(74, 20, 1),
(75, 20, 1);

-- --------------------------------------------------------

--
-- Table structure for table `ity_api_tasks`
--

CREATE TABLE `ity_api_tasks` (
  `taskID` int(11) NOT NULL,
  `taskName` varchar(225) DEFAULT NULL,
  `taskDescription` text,
  `allotmentDate` datetime DEFAULT NULL,
  `orginatorID` int(11) DEFAULT NULL,
  `recieverID` varchar(255) DEFAULT NULL,
  `ccID` varchar(255) DEFAULT NULL,
  `tagID` varchar(255) DEFAULT NULL,
  `revisedDate` datetime DEFAULT NULL,
  `dueDate` datetime DEFAULT NULL,
  `taskType` int(5) DEFAULT NULL,
  `funtionalityType` int(5) DEFAULT NULL,
  `funcationlityTypeID` int(11) DEFAULT NULL,
  `status` int(5) DEFAULT NULL,
  `taskTags` text NOT NULL,
  `reassignJsonData` text NOT NULL,
  `taskIN` enum('Group','MOM','Task') NOT NULL DEFAULT 'Task',
  `actionType` enum('Group','MOM','Task') NOT NULL DEFAULT 'Task'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ity_api_tasks`
--

INSERT INTO `ity_api_tasks` (`taskID`, `taskName`, `taskDescription`, `allotmentDate`, `orginatorID`, `recieverID`, `ccID`, `tagID`, `revisedDate`, `dueDate`, `taskType`, `funtionalityType`, `funcationlityTypeID`, `status`, `taskTags`, `reassignJsonData`, `taskIN`, `actionType`) VALUES
(1, 'chnage the database scheema', 'This is the test ', '2017-01-11 00:00:00', 1, '2,3', '3,4', 'tag1,tag2', NULL, '2016-01-12 00:00:00', NULL, 2, NULL, 0, '["tag1","tag2"]', '', 'Task', 'Task'),
(2, 'desing issue in group detail screen', 'This is the test ', '2017-01-11 00:00:00', 1, '4,5', '3,4', 'tag1,tag2', NULL, '2016-01-12 00:00:00', NULL, 2, NULL, 0, '["tag1","tag2"]', '', 'Task', 'Task'),
(3, 'desing issue in group detail screen2', 'This is the test ', '2017-01-11 00:00:00', 1, '1', '3,4', 'tag1,tag2', NULL, '2016-01-12 00:00:00', NULL, 0, NULL, 0, '["tag1","tag2"]', '', 'Task', 'Task'),
(4, 'desing issue in group detail screen2', 'This is the test ', '2017-01-11 00:00:00', 1, '5', '3,4', 'tag1,tag2', NULL, '2016-01-12 00:00:00', NULL, 1, NULL, 0, '["tag1","tag2"]', '', 'Task', 'Task'),
(5, 'desing issue in group detail screen2', 'This is the test ', '2017-01-11 00:00:00', 1, '5', '3,4', 'tag1,tag2', NULL, '2016-01-12 00:00:00', NULL, 3, 20, 0, '["tag1","tag2"]', '', 'Group', 'Task'),
(6, 'groupTask', 'This is the test ', '2017-01-11 00:00:00', 1, '5', '3,4', 'tag1,tag2', NULL, '2016-01-12 00:00:00', NULL, 3, 29, 0, '["tag1","tag2"]', '', 'Group', 'Task'),
(7, '', NULL, NULL, 1, '2,3,4', NULL, NULL, NULL, NULL, NULL, 3, 28, 0, '', '', 'Group', 'Group'),
(8, '', NULL, NULL, 1, '2,3,4', NULL, NULL, NULL, NULL, NULL, 3, 29, 0, '', '', 'Group', 'Group'),
(9, '', NULL, NULL, 1, '5,6', NULL, NULL, NULL, NULL, NULL, 3, 30, 0, '', '', 'Group', 'Group'),
(10, 'desing issue in group detail screen2', 'This is the test ', '2017-01-11 00:00:00', 1, '5', '3,4', 'tag1,tag2', NULL, '2016-01-12 00:00:00', NULL, 3, 29, 0, '["tag1","tag2"]', '', 'Group', 'Task'),
(11, 'desing issue in group detail screen2', 'task29', '2017-01-11 00:00:00', 1, '5', '3,4', 'tag1,tag2', NULL, '2016-01-12 00:00:00', NULL, 3, 29, 0, '["tag1","tag2"]', '', 'Group', 'Task'),
(12, 'MOM Task', 'MOM Task', '2017-01-11 00:00:00', 1, '1', '3,4', 'tag1,tag2', NULL, '2016-01-12 00:00:00', NULL, 4, 29, 0, '["tag1","tag2"]', '', 'MOM', 'Task'),
(13, 'task292', 'task29', '2017-01-11 00:00:00', 1, '1,3,5', '3,4', 'tag1,tag2', NULL, '2016-01-12 00:00:00', NULL, 3, 29, 0, '["tag1","tag2"]', '', 'Group', 'Task'),
(14, 'task292', 'task29', '2017-01-11 00:00:00', 1, '1,3,5', '3,4', 'tag1,tag2', NULL, '2016-01-12 00:00:00', NULL, 3, 30, 0, '["tag1","tag2"]', '', 'Group', 'Task'),
(15, 'task292', 'task29', '2017-01-11 00:00:00', 1, '1,3,5', '3,4', 'tag1,tag2', NULL, '2016-01-12 00:00:00', NULL, 3, 29, 0, '["tag1","tag2"]', '', 'Group', 'Task'),
(16, 'task292', 'task29', '2017-01-11 00:00:00', 1, '1,3,5', '3,4', 'tag1,tag2', NULL, '2016-01-12 00:00:00', NULL, 3, 28, 0, '["tag1","tag2"]', '', 'Group', 'Task'),
(17, 'task5454', 'task33erer', '2017-01-11 00:00:00', 1, '10', '11', 'tag1,tag2', NULL, '2016-01-12 00:00:00', NULL, 3, 28, 0, '["tag1","tag2"]', '', 'Group', 'Task'),
(18, 'task5454', 'task33erer', '2017-01-11 00:00:00', 1, '10', '11', 'tag1,tag2', NULL, '2016-01-12 00:00:00', NULL, 3, 20, 0, '["tag1","tag2"]', '', 'Group', 'Task'),
(19, 'task5454', 'task33erer', '2017-01-11 00:00:00', 1, '10', '11', 'tag1,tag2', NULL, '2016-01-12 00:00:00', NULL, 3, 29, 0, '["tag1","tag2"]', '', 'Group', 'Task'),
(20, 'task5454', 'task33erer', '2017-01-11 00:00:00', 1, '10', '11', 'tag1,tag2', NULL, '2016-01-12 00:00:00', NULL, 1, NULL, 0, '["tag1","tag2"]', '', 'Task', 'Task'),
(21, 'mom task5', 'aaassads asdasd', '2017-02-11 00:00:00', 1, '10,12,13', NULL, NULL, NULL, NULL, NULL, 3, 31, 0, '', '', 'Group', 'Group'),
(22, 'mom task3', 'aaaaaaaaaaaaaaaaa', '2017-02-16 00:00:00', 4, '10,12,13', NULL, NULL, NULL, NULL, NULL, 3, 32, 0, '', '', 'Group', 'Group'),
(23, 'mom task2', 'mom discription', '2017-02-07 00:00:00', 2, '10,12,13', NULL, NULL, NULL, NULL, NULL, 4, 22, 0, '', '', 'Group', 'Group'),
(24, 'mom tasks', 'mom description', '2017-02-08 00:00:00', 1, '10,12,13', NULL, NULL, NULL, NULL, NULL, 4, 22, 0, '', '', 'Group', 'Group');

-- --------------------------------------------------------

--
-- Table structure for table `ity_api_task_carbon`
--

CREATE TABLE `ity_api_task_carbon` (
  `taskID` int(11) DEFAULT NULL,
  `userID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ity_api_task_carbon`
--

INSERT INTO `ity_api_task_carbon` (`taskID`, `userID`) VALUES
(1, 3),
(2, 3),
(3, 3),
(4, 3),
(5, 3),
(6, 3),
(10, 3),
(11, 3),
(12, 3),
(13, 3),
(14, 3),
(15, 3),
(16, 3),
(17, 11),
(18, 11),
(19, 11),
(20, 11);

-- --------------------------------------------------------

--
-- Table structure for table `ity_api_task_status`
--

CREATE TABLE `ity_api_task_status` (
  `taskID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `status` varchar(4) NOT NULL,
  `createdDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ity_api_task_status_master`
--

CREATE TABLE `ity_api_task_status_master` (
  `statusText` varchar(255) DEFAULT NULL,
  `taskStatus` int(5) NOT NULL,
  `coloeCode` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ity_api_task_status_master`
--

INSERT INTO `ity_api_task_status_master` (`statusText`, `taskStatus`, `coloeCode`) VALUES
('pending', 0, ''),
('declined', 1, ''),
('priority', 2, ''),
('overdue', 3, ''),
('completed', 4, ''),
('deleted', 5, ''),
('closed', 6, ''),
('draft', 7, ''),
('Closed', 5, '');

-- --------------------------------------------------------

--
-- Table structure for table `ity_api_task_type_master`
--

CREATE TABLE `ity_api_task_type_master` (
  `code` int(5) NOT NULL,
  `taskType` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ity_api_task_type_master`
--

INSERT INTO `ity_api_task_type_master` (`code`, `taskType`) VALUES
(0, 'Main Task'),
(1, 'sub Task'),
(2, 'Re Assigned Task');

-- --------------------------------------------------------

--
-- Table structure for table `ity_api_users`
--

CREATE TABLE `ity_api_users` (
  `userID` int(11) NOT NULL COMMENT 'primary key',
  `firstName` varchar(255) DEFAULT NULL,
  `lastName` varchar(255) DEFAULT NULL,
  `emailID` varchar(255) DEFAULT NULL,
  `industryType` int(11) DEFAULT NULL,
  `subIndustoryType` int(11) NOT NULL,
  `nationality` varchar(255) DEFAULT NULL,
  `deviceID` text,
  `appKey` text NOT NULL,
  `countryPhoneCode` int(5) NOT NULL,
  `contactNo` varchar(15) DEFAULT NULL,
  `userPhoto` text,
  `otp` varchar(255) DEFAULT NULL,
  `created_date` date DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  `status` enum('1','0','-1','-2') NOT NULL DEFAULT '1' COMMENT '''0''=>''De Activte'',''1''=>''Activate'',''-1''=>''Pending'',''-2''=>''Deleted''',
  `contactNoCopy` varchar(255) NOT NULL,
  `companyKey` text NOT NULL,
  `AppAccessFlag` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ity_api_users`
--

INSERT INTO `ity_api_users` (`userID`, `firstName`, `lastName`, `emailID`, `industryType`, `subIndustoryType`, `nationality`, `deviceID`, `appKey`, `countryPhoneCode`, `contactNo`, `userPhoto`, `otp`, `created_date`, `updated_date`, `status`, `contactNoCopy`, `companyKey`, `AppAccessFlag`) VALUES
(1, 'mohd', 'asif', 'asif@bookmyhouse.com', 1, 0, 'INDIAN', '356554061837833', 'cwBILOJj9bw:APA91bG2NfcvAEfOZPpJ8j-QYZexB4Ug6IGlwlxD8UeG7NphwMjcZZibyrPQXrzAW8v1tEC11qEHEjFVeRcJefysoqGCn0WTmpPxV_jDpGzZdtOcUps9Qnbi81Fdw3ClcyATKf2mT5mW', 91, '9873878430', 'http://itasku.bookmyhouse.co/itaskyou//assets/images/default_avatar.png', '', '2017-01-09', '2017-01-09 16:50:56', '1', '', '', '{"as_orginator":{"task":{"re_assign":true,"ratting":true}},"as_reciever":{"task":{"re_assign":true,"ratting":false}}}'),
(2, 'Shruti', 'Bansal', 'bansalshruti489@gmail.com', 1, 0, 'INDIAN', '358954060753411', 'd2uDW9H7XXo:APA91bHyiFB1r-KcwGw6KUb5MBxjPFobEh24Ywb_Fd67ucX_nOaL_SY2q0uN97PhXVR3rQ2-e5E998Z9p_rYeL47YAQoqZ9zw_jaSikhuNkSaPO8JPe-gPnRAGMSBdazCcEMe1lMJ2Ru', 91, '9988296115', 'http://itasku.bookmyhouse.co/itaskyou//assets/images/default_avatar.png', '', '2017-01-09', '2017-01-09 15:52:59', '1', '', '', '{"as_orginator":{"task":{"re_assign":true,"ratting":true}},"as_reciever":{"task":{"re_assign":true,"ratting":false}}}'),
(128, 'Aakash', 'Goel', 'aakash@bookmyhouse.com', 1, 13, 'INDIAN', '358223072478296', 'fNv2y8eq8jI:APA91bEJIInRCHjx47qtr3p2-pUXCam5fGSA2lmyBR-kMTH9smQnxmbfuuBiXl96f13UH86IswBMg42K8lsWdD2eJ03na3h8W9T64UuZhnML0CuBohGbrbzETL2L2p0HSg2wI78JV6Na', 91, '9599789982', 'http://itasku.bookmyhouse.co/itaskyou//assets/images/default_avatar.png', '', '2017-01-06', '2017-01-06 15:17:54', '1', '', '', '{"as_orginator":{"task":{"re_assign":true,"ratting":true}},"as_reciever":{"task":{"re_assign":true,"ratting":false}}}'),
(129, 'mohammad', 'rashid', 'rashid@gmail.com', 1, 0, 'INDIAN', '353508070665109', 'c4WBie_G7QU:APA91bFRefe3Gf8KoQwLzu8eMULXe-1EPx9Ru4mxEx7p0ekb69hJm3XXX1keWZHy2zDAcxaax9Xj-SYeLDSIUqCquC5UjP-tMtujE34miolCu1pU04vZ8amCgLmOfjlyyK_8xmz05sl3', 91, '9711022886', 'http://itasku.bookmyhouse.co/itaskyou//media/apiusers/profile/1483227133.png', '', '2017-01-01', '2017-01-01 05:03:55', '1', '', '', '{"as_orginator":{"task":{"re_assign":true,"ratting":true}},"as_reciever":{"task":{"re_assign":true,"ratting":false}}}'),
(130, 'dbdh', 'xhxbbx', 'xbxb@gmail.com', 1, 13, 'INDIAN', '358954060753411', 'fEFRfLHnNGo:APA91bFkmWnrVL4zV0mc6P7wCZQ1ztemQziEXZ4iy97FI_tZalAkJMmfLZFRRviRebYrah8KH_6lNID1dTtfzYv1yr64xtZC7uQPMlcEnEt04XorFYJtl5vAzLy1fCrpl8ESYs9pKVvQ', 91, '9599789986', 'http://itasku.bookmyhouse.co/itaskyou//assets/images/default_avatar.png', '', '2017-01-07', '2017-01-07 17:31:32', '1', '', '', '{"as_orginator":{"task":{"re_assign":true,"ratting":true}},"as_reciever":{"task":{"re_assign":true,"ratting":false}}}'),
(131, NULL, NULL, NULL, NULL, 0, NULL, '869644020375981', 'cV2VCAEOMkc:APA91bG3SWpt7bc2JlHDq8VjP5q-2eghtsA40V8occTNGislmCQgJi5gTdqBo7B0PjCr1WGbi375JWGfNffAm3dON4DIIO9Tj8D9pHBPn5psWxgP7ffB7a-urTYvGdwHrUC6SDHfptXt', 91, '9599869986', NULL, '1564', NULL, NULL, '-1', '', '', '{"as_orginator":{"task":{"re_assign":true,"ratting":true}},"as_reciever":{"task":{"re_assign":true,"ratting":false}}}'),
(132, NULL, NULL, NULL, NULL, 0, NULL, '358954060753411', 'fizUkhVUGHM:APA91bFDof4b8DaViBdElAf_hkaG3avBz--p9F3IZtsZ5iX4kEQor3NUs4jjASDXYBqKhOzAC0lJBV06rGkzqJwp1AhnDCiBLsJnlAFaz2g6ENogT10znc8OzZayQXoTqlfdlZjBT911', 91, '9025357016', NULL, '6565', NULL, NULL, '-1', '', '', '{"as_orginator":{"task":{"re_assign":true,"ratting":true}},"as_reciever":{"task":{"re_assign":true,"ratting":false}}}'),
(133, NULL, NULL, NULL, NULL, 0, NULL, '358954060753411', 'fizUkhVUGHM:APA91bFDof4b8DaViBdElAf_hkaG3avBz--p9F3IZtsZ5iX4kEQor3NUs4jjASDXYBqKhOzAC0lJBV06rGkzqJwp1AhnDCiBLsJnlAFaz2g6ENogT10znc8OzZayQXoTqlfdlZjBT911', 91, '9205357016', NULL, '1448', NULL, NULL, '-1', '', '', '{"as_orginator":{"task":{"re_assign":true,"ratting":true}},"as_reciever":{"task":{"re_assign":true,"ratting":false}}}'),
(134, NULL, NULL, NULL, NULL, 0, NULL, '358954060753411', 'fizUkhVUGHM:APA91bFDof4b8DaViBdElAf_hkaG3avBz--p9F3IZtsZ5iX4kEQor3NUs4jjASDXYBqKhOzAC0lJBV06rGkzqJwp1AhnDCiBLsJnlAFaz2g6ENogT10znc8OzZayQXoTqlfdlZjBT911', 91, '9910859909', NULL, '1560', NULL, NULL, '-1', '', '', '{"as_orginator":{"task":{"re_assign":true,"ratting":true}},"as_reciever":{"task":{"re_assign":true,"ratting":false}}}'),
(135, NULL, NULL, NULL, NULL, 0, NULL, '867290026921287', 'c8ajIKXcpoM:APA91bGHf2zV-P0uUwfH-h8qDrhaOCoel-DCBy-WdZEHRvcSzJc0EDYlj3MTJopxTXA4XCfz7jELffIJWLT4jSV5il_B7iTnpbbbkKtQenSqr0JOr4P5CrsA4VgodVLtKbja9PIgGhyj', 91, '0000000000', NULL, '3502', NULL, NULL, '-1', '', '', '{"as_orginator":{"task":{"re_assign":true,"ratting":true}},"as_reciever":{"task":{"re_assign":true,"ratting":false}}}'),
(136, 'umangv', 'varshney', 'umang@bookmyhouse.com', 1, 14, 'INDIAN', '867290026921287', 'c8ajIKXcpoM:APA91bGHf2zV-P0uUwfH-h8qDrhaOCoel-DCBy-WdZEHRvcSzJc0EDYlj3MTJopxTXA4XCfz7jELffIJWLT4jSV5il_B7iTnpbbbkKtQenSqr0JOr4P5CrsA4VgodVLtKbja9PIgGhyj', 91, '9873084508', 'http://itasku.bookmyhouse.co/itaskyou//assets/images/default_avatar.png', '', '2017-01-03', '2017-01-03 14:33:30', '1', '', '', '{"as_orginator":{"task":{"re_assign":true,"ratting":true}},"as_reciever":{"task":{"re_assign":true,"ratting":false}}}'),
(137, 'paras', 'test', 'paras@bookmyhouse.com', 1, 0, 'INDIAN', '868143029800173', 'dVApuBxrRyo:APA91bG7Xm2eknquSIfuTsKetgQmiL6lMB0I3oqBMq6CqMqxojHQItNfkvkFLv1EAyV9JFLKCdwPiqtfEX7B_iUr3WOmetl4jSX95k5wNRGVWG3oBcBCSEoMfQCQTjeWs-CzziEqfFYD', 91, '8439029032', 'http://itasku.bookmyhouse.co/itaskyou//assets/images/default_avatar.png', '', '2017-01-09', '2017-01-09 13:09:06', '1', '', '', '{"as_orginator":{"task":{"re_assign":true,"ratting":true}},"as_reciever":{"task":{"re_assign":true,"ratting":false}}}'),
(138, 'test', 'gupta', 'paras@bookmyhouse.com', 1, 0, 'INDIAN', '356642060040861', 'fMkoHLyz8Oc:APA91bF2vVeDyYRC6xieYmT14PCmeauUdy8LNDbBX45-_8pRYwqMWol65GdW40Zb_rfGh0Yym2hREfHcWqD0O-B9NzH7CToCXcqPRLFhL79TbRBQfQUxx1qLYepQFVzCOUo1_g0GR75R', 91, '9599789927', 'http://itasku.bookmyhouse.co/itaskyou//media/apiusers/profile/1483959817.png', '', '2017-01-09', '2017-01-09 13:08:14', '1', '', '', '{"as_orginator":{"task":{"re_assign":true,"ratting":true}},"as_reciever":{"task":{"re_assign":true,"ratting":false}}}'),
(139, NULL, NULL, NULL, NULL, 0, NULL, '358954060753411', 'deQbTiwE0q8:APA91bH9JN1hOuhCqXQsbfiqvQbuCtM0SWKEeEcYbNGnoA7KRpiSySFoUsU2pgXNcd2BKx1MBkZisyRxlebYci-APVyUIuQCCpKEZFssfMHfCymQyhinC5L9EHdyu2oQPRNMR-ci7k7W', 91, '9205357021', NULL, '8534', NULL, NULL, '-1', '', '', '{"as_orginator":{"task":{"re_assign":true,"ratting":true}},"as_reciever":{"task":{"re_assign":true,"ratting":false}}}'),
(140, 'Naresh', 'Gupta', 'Naresh@gmail.com', 1, 14, 'INDIAN', '358954060753411', 'dgWrsuEY6-k:APA91bFOaMMrOIXo5mlU4Vhikp8-hjf46_YHaK32evpO54xdQZG4E_DqZvWVBidCB72J4QI3SuEI7wf2Q1sYlstxWS5t2-H1nEOGEPf6-VZKTKNx31dcGHTIBQkouTB2vVuZiMIow23v', 91, '7503886081', 'http://itasku.bookmyhouse.co/itaskyou//assets/images/default_avatar.png', '6810', '2017-01-05', '2017-01-05 11:05:12', '1', '', '', '{"as_orginator":{"task":{"re_assign":false,"ratting":true}},"as_reciever":{"task":{"re_assign":true,"ratting":false}}}'),
(141, NULL, NULL, NULL, NULL, 0, NULL, '358954060753411', 'd-56WxiVmDY:APA91bFK2qDWe-BC4lOXnu7-wb8Q9VJJZIL18yLTUzL5s2qy8_EI1TqaM407BTeN6PQvqGQ8MbsHU9sVhkx75ncz5nBXPicsYz3rFp3fm-192SczqvGJaYasK0gDr0C79s4ATFySamQp', 91, '9810927104', NULL, '', NULL, NULL, '-1', '', '', '{"as_orginator":{"task":{"re_assign":true,"ratting":true}},"as_reciever":{"task":{"re_assign":true,"ratting":false}}}'),
(142, NULL, NULL, NULL, NULL, 0, NULL, '358954060753411', 'XYZ', 91, '9988296112', NULL, '2175', NULL, NULL, '-1', '', '', '{"as_orginator":{"task":{"re_assign":true,"ratting":true}},"as_reciever":{"task":{"re_assign":true,"ratting":false}}}'),
(143, NULL, NULL, NULL, NULL, 0, NULL, '358954060753411', 'emaiKRY9THA:APA91bFxpkXTYdcRa_hHsGliAj_Dn7DFw_BILl4ZbljFWimIzciPDT_0LUkm78lmjVpBwElqlUJ7Lx9n_DrHyEKXP5BV6EPphVH0DFiChOCGjAsoerUkYziMoFheLJhDvzPw834m-wro', 91, '8194090499', NULL, '3075', NULL, NULL, '-1', '', '', '{"as_orginator":{"task":{"re_assign":true,"ratting":true}},"as_reciever":{"task":{"re_assign":true,"ratting":false}}}'),
(144, 'shrjdj', 'zbxbzb', 'NAxnxn@gmail.com', 9, 8, 'INDIAN', '358954060753411', 'emaiKRY9THA:APA91bFxpkXTYdcRa_hHsGliAj_Dn7DFw_BILl4ZbljFWimIzciPDT_0LUkm78lmjVpBwElqlUJ7Lx9n_DrHyEKXP5BV6EPphVH0DFiChOCGjAsoerUkYziMoFheLJhDvzPw834m-wro', 91, '9599789981', 'http://itasku.bookmyhouse.co/itaskyou//assets/images/default_avatar.png', '', '2017-01-05', '2017-01-05 15:32:22', '1', '', '', '{"as_orginator":{"task":{"re_assign":true,"ratting":true}},"as_reciever":{"task":{"re_assign":true,"ratting":false}}}'),
(145, NULL, NULL, NULL, NULL, 0, NULL, '358954060753411', 'XYZ', 91, '9988296139', NULL, '9910', NULL, NULL, '-1', '', '', '{"as_orginator":{"task":{"re_assign":true,"ratting":true}},"as_reciever":{"task":{"re_assign":true,"ratting":false}}}'),
(146, NULL, NULL, NULL, NULL, 0, NULL, '356554061837833', 'XYZ', 91, '9988296167', NULL, '8858', NULL, NULL, '-1', '', '', '{"as_orginator":{"task":{"re_assign":true,"ratting":true}},"as_reciever":{"task":{"re_assign":true,"ratting":false}}}'),
(147, NULL, NULL, NULL, NULL, 0, NULL, '356554061837833', 'XYZ', 91, '9876543212', NULL, '6242', NULL, NULL, '-1', '', '', '{"as_orginator":{"task":{"re_assign":true,"ratting":true}},"as_reciever":{"task":{"re_assign":true,"ratting":false}}}'),
(148, NULL, NULL, NULL, NULL, 0, NULL, '358954060753411', 'e2xr7gRooos:APA91bGWH0Bx7yS9gW5Kswqc3iOEaf6IVOrB4NPZ6wxbCpWIuwwr2bLC-NWnbODpMRSAQb4lBCMIUumyprRuEVEJmE609NPxtqHnMRP4RMu5ODJWgtxwAD2ZtBk8SrJx5khUbUpO4dTC', 91, '9599789950', NULL, '1504', NULL, NULL, '-1', '', '', '{"as_orginator":{"task":{"re_assign":true,"ratting":true}},"as_reciever":{"task":{"re_assign":true,"ratting":false}}}'),
(149, NULL, NULL, NULL, NULL, 0, NULL, '358954060753411', 'duSxteIUhs4:APA91bF0c4fAYdEPfG8xfT57ZXKKbtNaYmSSlO46kIEewzbPYORCQyfO2kY-QVG70pMRuWKZ_PDTxJi6HfNHksXm4Bjo5t_jVtBYd5qZl5NI64Lmru2UFr7K6qpXz9TBfDM34SfWrsLY', 91, '9818511886', NULL, '', NULL, NULL, '-1', '', '', '{"as_orginator":{"task":{"re_assign":true,"ratting":true}},"as_reciever":{"task":{"re_assign":true,"ratting":false}}}'),
(150, NULL, NULL, NULL, NULL, 0, NULL, '356642060040861', 'd__xH0F4Tdw:APA91bFnAuAkZ5WEXVCW6GX0MxwecnIm7wD1xL7KiR8sy9xag0khCWlSNQAB1ZGL1xCwQ9lXxseslq-DgMHEVgIvF5X_sXErsBnvrOj0hHiY3oVuyK4XWUFNaimUF0RjFjHIWBHhyPnB', 91, '9865321645', NULL, '7582', NULL, NULL, '-1', '', '', '{"as_orginator":{"task":{"re_assign":true,"ratting":true}},"as_reciever":{"task":{"re_assign":true,"ratting":false}}}'),
(151, NULL, NULL, NULL, NULL, 0, NULL, '356642060040861', 'd__xH0F4Tdw:APA91bFnAuAkZ5WEXVCW6GX0MxwecnIm7wD1xL7KiR8sy9xag0khCWlSNQAB1ZGL1xCwQ9lXxseslq-DgMHEVgIvF5X_sXErsBnvrOj0hHiY3oVuyK4XWUFNaimUF0RjFjHIWBHhyPnB', 244, '9535457588', NULL, '9692', NULL, NULL, '-1', '', '', '{"as_orginator":{"task":{"re_assign":true,"ratting":true}},"as_reciever":{"task":{"re_assign":true,"ratting":false}}}'),
(152, NULL, NULL, NULL, NULL, 0, NULL, '358954060753411', 'e2xr7gRooos:APA91bGWH0Bx7yS9gW5Kswqc3iOEaf6IVOrB4NPZ6wxbCpWIuwwr2bLC-NWnbODpMRSAQb4lBCMIUumyprRuEVEJmE609NPxtqHnMRP4RMu5ODJWgtxwAD2ZtBk8SrJx5khUbUpO4dTC', 91, '9999264711', NULL, '9029', NULL, NULL, '-1', '', '', '{"as_orginator":{"task":{"re_assign":true,"ratting":true}},"as_reciever":{"task":{"re_assign":true,"ratting":false}}}'),
(153, NULL, NULL, NULL, NULL, 0, NULL, '353325062524412', 'ezIi_3SBXYA:APA91bHWao1f7VwyPqdEmSM63HECKd7YhLCVIRFOnAntb3MAP8n8j2FdZd_DcO3IcK-OyM2l7B-Zgnfb7kqnQDkrzjwFhKyZpfdvUAarxjyd7_S46HsGSemV7kTnQHeYamft22nM8Hhp', 91, '8826573113', NULL, '4241', NULL, NULL, '-1', '', '', '{"as_orginator":{"task":{"re_assign":true,"ratting":true}},"as_reciever":{"task":{"re_assign":true,"ratting":false}}}');

-- --------------------------------------------------------

--
-- Table structure for table `ity_api_user_tags`
--

CREATE TABLE `ity_api_user_tags` (
  `userID` int(11) NOT NULL,
  `tagID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ity_api_user_tags`
--

INSERT INTO `ity_api_user_tags` (`userID`, `tagID`) VALUES
(1, 74),
(1, 75);

-- --------------------------------------------------------

--
-- Table structure for table `ity_chat_master`
--

CREATE TABLE `ity_chat_master` (
  `chatID` int(11) NOT NULL,
  `chatRoomType` enum('Task','Group','MoM') NOT NULL,
  `chatRoomID` int(11) NOT NULL COMMENT 'groupID,momID,taskID, it specified chat from ',
  `taskID` int(11) NOT NULL,
  `message` text NOT NULL,
  `messageType` enum('Text','audeo','video','image','document','link') NOT NULL DEFAULT 'Text',
  `dateTime` datetime NOT NULL,
  `senderID` int(11) NOT NULL,
  `deviceID` varchar(255) NOT NULL,
  `reciverIDs` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ity_chat_master`
--

INSERT INTO `ity_chat_master` (`chatID`, `chatRoomType`, `chatRoomID`, `taskID`, `message`, `messageType`, `dateTime`, `senderID`, `deviceID`, `reciverIDs`) VALUES
(1, 'Task', 24, 24, 'Hello 1 and 2', 'Text', '2017-01-30 09:57:50', 3, '123123123123', '1,2'),
(2, 'Task', 24, 24, 'Hello 1 and 3', 'Text', '2017-01-30 09:58:27', 2, '123123123123', '1,3'),
(3, 'Task', 24, 24, 'Hello 1 ,3 and 4', 'Text', '2017-01-30 09:59:13', 2, '123123123123', '1,3,4'),
(4, 'Task', 24, 24, 'Hello 3 and 4', 'Text', '2017-01-30 10:00:09', 1, '123123123123', '3,4'),
(5, 'Task', 24, 24, 'Hello 3 and 4', 'Text', '2017-01-30 11:19:20', 5, '123123123123', '3,4,1'),
(6, 'Task', 24, 24, 'New message', 'Text', '2017-01-30 11:22:13', 5, '123123123123', '3,4,1'),
(7, 'Task', 24, 24, 'New message666', 'Text', '2017-01-30 11:25:34', 10, '123123123123', '9,11'),
(8, 'Task', 24, 24, 'New message666', 'Text', '2017-01-30 11:27:56', 15, '123123123123', '9,11');

-- --------------------------------------------------------

--
-- Table structure for table `ity_chat_recievers`
--

CREATE TABLE `ity_chat_recievers` (
  `chatReciverID` int(11) NOT NULL,
  `chatID` int(11) NOT NULL,
  `senderID` int(11) NOT NULL,
  `reciversID` int(11) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0- unread ,1-read',
  `dateTime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ity_chat_recievers`
--

INSERT INTO `ity_chat_recievers` (`chatReciverID`, `chatID`, `senderID`, `reciversID`, `status`, `dateTime`) VALUES
(1, 1, 3, 1, '0', '2017-01-30 09:57:50'),
(2, 1, 3, 2, '0', '2017-01-30 09:57:50'),
(3, 2, 2, 1, '0', '2017-01-30 09:58:27'),
(4, 2, 2, 3, '0', '2017-01-30 09:58:27'),
(5, 3, 2, 1, '0', '2017-01-30 09:59:13'),
(6, 3, 2, 3, '0', '2017-01-30 09:59:13'),
(7, 3, 2, 4, '0', '2017-01-30 09:59:13'),
(8, 4, 1, 3, '0', '2017-01-30 10:00:09'),
(9, 4, 1, 4, '0', '2017-01-30 10:00:09'),
(10, 5, 5, 3, '0', '2017-01-30 11:19:20'),
(11, 5, 5, 4, '0', '2017-01-30 11:19:20'),
(12, 5, 5, 1, '0', '2017-01-30 11:19:20'),
(13, 6, 5, 3, '0', '2017-01-30 11:22:14'),
(14, 6, 5, 4, '0', '2017-01-30 11:22:14'),
(15, 6, 5, 1, '0', '2017-01-30 11:22:14'),
(16, 7, 10, 9, '0', '2017-01-30 11:25:34'),
(17, 7, 10, 11, '0', '2017-01-30 11:25:34'),
(18, 8, 15, 9, '0', '2017-01-30 11:27:56'),
(19, 8, 15, 11, '0', '2017-01-30 11:27:56');

-- --------------------------------------------------------

--
-- Table structure for table `ity_group_tasks`
--

CREATE TABLE `ity_group_tasks` (
  `groupTaskID` int(11) NOT NULL,
  `groupID` int(11) NOT NULL,
  `taskID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ity_leads`
--

CREATE TABLE `ity_leads` (
  `id` int(11) NOT NULL,
  `hub_challenge` text NOT NULL,
  `inputval` longtext NOT NULL,
  `leadvalujson` text NOT NULL,
  `ad_id` text NOT NULL,
  `form_id` text NOT NULL,
  `leadgen_id` int(11) NOT NULL,
  `created_time` int(11) NOT NULL,
  `page_id` int(11) NOT NULL,
  `adgroup_id` int(11) NOT NULL,
  `leadFrom` varchar(255) NOT NULL,
  `createdDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ity_leads`
--

INSERT INTO `ity_leads` (`id`, `hub_challenge`, `inputval`, `leadvalujson`, `ad_id`, `form_id`, `leadgen_id`, `created_time`, `page_id`, `adgroup_id`, `leadFrom`, `createdDate`) VALUES
(1, '', '{"entry": [{"changes": [{"field": "leadgen", "value": {"ad_id": 0, "form_id": 1197444256989665, "leadgen_id": 1207146636019427, "created_time": 1476253995, "page_id": 1535724336689096, "adgroup_id": 0}}], "id": "1535724336689096", "time": 1476253996}], "object": "page"}', '{"lead":{"tell_us_are_you_interested_?":"yes","want_to_schedule_a_free_site_visit_?":"yes","email":"test@bookmyhouse.com","full_name":"raj","phone_number":"+919599789921","city":"delhi"},"respnse":{"created_time":"2016-10-12T06:33:15+0000","id":"1207146636019427","field_data":[{"name":"tell_us_are_you_interested_?","values":["yes"]},{"name":"want_to_schedule_a_free_site_visit_?","values":["yes"]},{"name":"email","values":["test@bookmyhouse.com"]},{"name":"full_name","values":["raj"]},{"name":"phone_number","values":["+919599789921"]},{"name":"city","values":["delhi"]}]}}', '', '1197444256989665', 2147483647, 1476253995, 2147483647, 0, '', '0000-00-00 00:00:00'),
(2, '', '{"entry": [{"changes": [{"field": "leadgen", "value": {"ad_id": 0, "form_id": 1197444256989665, "leadgen_id": 1207147996019291, "created_time": 1476254163, "page_id": 1535724336689096, "adgroup_id": 0}}], "id": "1535724336689096", "time": 1476254163}], "object": "page"}', '{"lead":{"tell_us_are_you_interested_?":"yes","want_to_schedule_a_free_site_visit_?":"yes","email":"test@bookmyhouse.com","full_name":"raj","phone_number":"+919599789921","city":"delhi"},"respnse":{"created_time":"2016-10-12T06:36:03+0000","id":"1207147996019291","field_data":[{"name":"tell_us_are_you_interested_?","values":["yes"]},{"name":"want_to_schedule_a_free_site_visit_?","values":["yes"]},{"name":"email","values":["test@bookmyhouse.com"]},{"name":"full_name","values":["raj"]},{"name":"phone_number","values":["+919599789921"]},{"name":"city","values":["delhi"]}]}}', '', '1197444256989665', 2147483647, 1476254163, 2147483647, 0, '', '0000-00-00 00:00:00'),
(4, '', '{"entry": [{"changes": [{"field": "leadgen", "value": {"ad_id": 0, "form_id": 1197444256989665, "leadgen_id": 1207148686019222, "created_time": 1476254300, "page_id": 1535724336689096, "adgroup_id": 0}}], "id": "1535724336689096", "time": 1476254300}], "object": "page"}', '{"lead":{"tell_us_are_you_interested_?":"<test lead: dummy data for tell_us_are_you_interested_?>","want_to_schedule_a_free_site_visit_?":"<test lead: dummy data for want_to_schedule_a_free_site_visit_?>","email":"test@fb.com","full_name":"<test lead: dummy data for full_name>","phone_number":"<test lead: dummy data for phone_number>","city":"<test lead: dummy data for city>"},"respnse":{"created_time":"2016-10-12T06:38:20+0000","id":"1207148686019222","field_data":[{"name":"tell_us_are_you_interested_?","values":["<test lead: dummy data for tell_us_are_you_interested_?>"]},{"name":"want_to_schedule_a_free_site_visit_?","values":["<test lead: dummy data for want_to_schedule_a_free_site_visit_?>"]},{"name":"email","values":["test@fb.com"]},{"name":"full_name","values":["<test lead: dummy data for full_name>"]},{"name":"phone_number","values":["<test lead: dummy data for phone_number>"]},{"name":"city","values":["<test lead: dummy data for city>"]}]}}', '', '1197444256989665', 2147483647, 1476254300, 2147483647, 0, '', '0000-00-00 00:00:00'),
(5, '', '{"entry": [{"changes": [{"field": "leadgen", "value": {"ad_id": 0, "form_id": 1197444256989665, "leadgen_id": 1207152322685525, "created_time": 1476254710, "page_id": 1535724336689096, "adgroup_id": 0}}], "id": "1535724336689096", "time": 1476254710}], "object": "page"}', '{"lead":{"tell_us_are_you_interested_?":"<test lead: dummy data for tell_us_are_you_interested_?>","want_to_schedule_a_free_site_visit_?":"<test lead: dummy data for want_to_schedule_a_free_site_visit_?>","email":"test@fb.com","full_name":"<test lead: dummy data for full_name>","phone_number":"<test lead: dummy data for phone_number>","city":"<test lead: dummy data for city>"},"respnse":{"created_time":"2016-10-12T06:45:10+0000","id":"1207152322685525","field_data":[{"name":"tell_us_are_you_interested_?","values":["<test lead: dummy data for tell_us_are_you_interested_?>"]},{"name":"want_to_schedule_a_free_site_visit_?","values":["<test lead: dummy data for want_to_schedule_a_free_site_visit_?>"]},{"name":"email","values":["test@fb.com"]},{"name":"full_name","values":["<test lead: dummy data for full_name>"]},{"name":"phone_number","values":["<test lead: dummy data for phone_number>"]},{"name":"city","values":["<test lead: dummy data for city>"]}]}}', '', '1197444256989665', 2147483647, 1476254710, 2147483647, 0, '', '0000-00-00 00:00:00'),
(6, '', '{"entry": [{"changes": [{"field": "leadgen", "value": {"ad_id": 0, "form_id": 1197444256989665, "leadgen_id": 1207160272684730, "created_time": 1476255113, "page_id": 1535724336689096, "adgroup_id": 0}}], "id": "1535724336689096", "time": 1476255113}], "object": "page"}', '{"lead":{"tell_us_are_you_interested_?":"yes","want_to_schedule_a_free_site_visit_?":"yes","email":"asif@bookmyhouse.com","full_name":"Mohammad Asif","phone_number":"+919873878430","city":"delhi"},"respnse":{"created_time":"2016-10-12T06:51:53+0000","id":"1207160272684730","field_data":[{"name":"tell_us_are_you_interested_?","values":["yes"]},{"name":"want_to_schedule_a_free_site_visit_?","values":["yes"]},{"name":"email","values":["asif@bookmyhouse.com"]},{"name":"full_name","values":["Mohammad Asif"]},{"name":"phone_number","values":["+919873878430"]},{"name":"city","values":["delhi"]}]}}', '', '1197444256989665', 2147483647, 1476255113, 2147483647, 0, '', '0000-00-00 00:00:00'),
(7, '', '{"entry": [{"changes": [{"field": "leadgen", "value": {"ad_id": 0, "form_id": 1197444256989665, "leadgen_id": 1207165326017558, "created_time": 1476255795, "page_id": 1535724336689096, "adgroup_id": 0}}], "id": "1535724336689096", "time": 1476255796}], "object": "page"}', '{"lead":{"tell_us_are_you_interested_?":"yes","want_to_schedule_a_free_site_visit_?":"yes","email":"asif@bookmyhouse.com","full_name":"mohammad Asif","phone_number":"+919873878430","city":"delhi"},"respnse":{"created_time":"2016-10-12T07:03:15+0000","id":"1207165326017558","field_data":[{"name":"tell_us_are_you_interested_?","values":["yes"]},{"name":"want_to_schedule_a_free_site_visit_?","values":["yes"]},{"name":"email","values":["asif@bookmyhouse.com"]},{"name":"full_name","values":["mohammad Asif"]},{"name":"phone_number","values":["+919873878430"]},{"name":"city","values":["delhi"]}]}}', '', '1197444256989665', 2147483647, 1476255795, 2147483647, 0, '', '0000-00-00 00:00:00'),
(8, '', '{"entry": [{"changes": [{"field": "leadgen", "value": {"ad_id": 0, "form_id": 1197444256989665, "leadgen_id": 1207166046017486, "created_time": 1476255896, "page_id": 1535724336689096, "adgroup_id": 0}}], "id": "1535724336689096", "time": 1476255896}], "object": "page"}', '{"lead":{"tell_us_are_you_interested_?":"yes","want_to_schedule_a_free_site_visit_?":"yes","email":"test@bookmyhouse.com","full_name":"raj","phone_number":"+919599789921","city":"delhi"},"respnse":{"created_time":"2016-10-12T07:04:56+0000","id":"1207166046017486","field_data":[{"name":"tell_us_are_you_interested_?","values":["yes"]},{"name":"want_to_schedule_a_free_site_visit_?","values":["yes"]},{"name":"email","values":["test@bookmyhouse.com"]},{"name":"full_name","values":["raj"]},{"name":"phone_number","values":["+919599789921"]},{"name":"city","values":["delhi"]}]}}', '', '1197444256989665', 2147483647, 1476255896, 2147483647, 0, '', '0000-00-00 00:00:00'),
(9, '', '{"entry": [{"changes": [{"field": "leadgen", "value": {"ad_id": 0, "form_id": 1197444256989665, "leadgen_id": 1207167392684018, "created_time": 1476256102, "page_id": 1535724336689096, "adgroup_id": 0}}], "id": "1535724336689096", "time": 1476256103}], "object": "page"}', '{"lead":{"tell_us_are_you_interested_?":"yes","want_to_schedule_a_free_site_visit_?":"yes","email":"mohdasif@gmail.com","full_name":"mohd asif","phone_number":"+919873878430","city":"delhi"},"respnse":{"created_time":"2016-10-12T07:08:22+0000","id":"1207167392684018","field_data":[{"name":"tell_us_are_you_interested_?","values":["yes"]},{"name":"want_to_schedule_a_free_site_visit_?","values":["yes"]},{"name":"email","values":["mohdasif@gmail.com"]},{"name":"full_name","values":["mohd asif"]},{"name":"phone_number","values":["+919873878430"]},{"name":"city","values":["delhi"]}]}}', '', '1197444256989665', 2147483647, 1476256102, 2147483647, 0, '', '0000-00-00 00:00:00'),
(10, '', '{"entry": [{"changes": [{"field": "leadgen", "value": {"ad_id": 0, "form_id": 531121810422697, "leadgen_id": 575482025986675, "created_time": 1476256192, "page_id": 1535724336689096, "adgroup_id": 0}}], "id": "1535724336689096", "time": 1476256192}], "object": "page"}', '{"lead":{"tell_us_are_you_interested_?":"Yes","want_to_schedule_a_free_site_visit_?":"Yes","preferred_day_for_site_visit_?":"Monday","full_name":"mohammad asif","email":"asif@bookmyhouse.com","city":"delhi","gender":"male","phone_number":"+919873878430"},"respnse":{"created_time":"2016-10-12T07:09:52+0000","id":"575482025986675","field_data":[{"name":"tell_us_are_you_interested_?","values":["Yes"]},{"name":"want_to_schedule_a_free_site_visit_?","values":["Yes"]},{"name":"preferred_day_for_site_visit_?","values":["Monday"]},{"name":"full_name","values":["mohammad asif"]},{"name":"email","values":["asif@bookmyhouse.com"]},{"name":"city","values":["delhi"]},{"name":"gender","values":["male"]},{"name":"phone_number","values":["+919873878430"]}]}}', '', '531121810422697', 2147483647, 1476256192, 2147483647, 0, '', '0000-00-00 00:00:00'),
(11, '', '{"entry": [{"changes": [{"field": "leadgen", "value": {"ad_id": 0, "form_id": 291371514527169, "leadgen_id": 367303646933955, "created_time": 1476257884, "page_id": 1535724336689096, "adgroup_id": 0}}], "id": "1535724336689096", "time": 1476257884}], "object": "page"}', '{"lead":[],"respnse":{"error":{"message":"Error validating access token: The session is invalid because the user logged out.","type":"OAuthException","code":190,"error_subcode":467,"fbtrace_id":"C/huBLzzi7H"}}}', '', '291371514527169', 2147483647, 1476257884, 2147483647, 0, '', '0000-00-00 00:00:00'),
(12, '', '{"entry": [{"changes": [{"field": "leadgen", "value": {"ad_id": 0, "form_id": 1197444256989665, "leadgen_id": 1207186616015429, "created_time": 1476257940, "page_id": 1535724336689096, "adgroup_id": 0}}], "id": "1535724336689096", "time": 1476257940}], "object": "page"}', '{"lead":[],"respnse":{"error":{"message":"Error validating access token: The session is invalid because the user logged out.","type":"OAuthException","code":190,"error_subcode":467,"fbtrace_id":"A4gWY3isqMa"}}}', '', '1197444256989665', 2147483647, 1476257940, 2147483647, 0, '', '0000-00-00 00:00:00'),
(13, '', '{"entry": [{"changes": [{"field": "leadgen", "value": {"ad_id": 0, "form_id": 1197444256989665, "leadgen_id": 1207187759348648, "created_time": 1476258054, "page_id": 1535724336689096, "adgroup_id": 0}}], "id": "1535724336689096", "time": 1476258055}], "object": "page"}', '{"lead":[],"respnse":{"error":{"message":"Error validating access token: The session is invalid because the user logged out.","type":"OAuthException","code":190,"error_subcode":467,"fbtrace_id":"DpJtW6H4hrO"}}}', '', '1197444256989665', 2147483647, 1476258054, 2147483647, 0, '', '0000-00-00 00:00:00'),
(14, '', '{"entry": [{"changes": [{"field": "leadgen", "value": {"ad_id": 0, "form_id": 1070283146424835, "leadgen_id": 1078595808926902, "created_time": 1476268305, "page_id": 1325585957467268, "adgroup_id": 0}}], "id": "1325585957467268", "time": 1476268305}], "object": "page"}', '{"lead":[],"respnse":{"error":{"message":"Error validating access token: Session has expired on Wednesday, 12-Oct-16 01:00:00 PDT. The current time is Wednesday, 12-Oct-16 03:31:53 PDT.","type":"OAuthException","code":190,"error_subcode":463,"fbtrace_id":"GnU4lwojhzy"}}}', '', '1070283146424835', 2147483647, 1476268305, 2147483647, 0, '', '0000-00-00 00:00:00'),
(15, '', '{"entry": [{"changes": [{"field": "leadgen", "value": {"ad_id": 0, "form_id": 1070283146424835, "leadgen_id": 1078596892260127, "created_time": 1476268439, "page_id": 1325585957467268, "adgroup_id": 0}}], "id": "1325585957467268", "time": 1476268440}], "object": "page"}', '{"lead":[],"respnse":{"error":{"message":"Error validating access token: Session has expired on Wednesday, 12-Oct-16 01:00:00 PDT. The current time is Wednesday, 12-Oct-16 03:34:06 PDT.","type":"OAuthException","code":190,"error_subcode":463,"fbtrace_id":"BzJbI0m23GG"}}}', '', '1070283146424835', 2147483647, 1476268439, 2147483647, 0, '', '0000-00-00 00:00:00'),
(16, '', 'signed_request=ZMlUGL1Aexl1rtqVtAQDbqTQKcCcgIvrl26AlOe62io.eyJhbGdvcml0aG0iOiJITUFDLVNIQTI1NiIsImV4cGlyZXMiOjE0NzYyNzM2MDAsImlzc3VlZF9hdCI6MTQ3NjI2ODYwMSwib2F1dGhfdG9rZW4iOiJFQUFYR05Wdm94T2NCQUt1bU9ZWkMzaUVKTmd6QW9jeWhPR29GYmZ1MjJrM3FJbk5zc2RQMGdYY2NEWkJHWkJ6NjNLNmh5SmMxYkY3VWhUU0pNR3ZEOFNuS1QyREhrak9rWW1Pc1NOaDF0bU5Xc09WOElPOU54Z2hxVzlLdmlGazBnbWRocFJsdU9zMWpjUGQ3S0Ntd0VyQkR4RlZpTlpCdWxRS2g2NXpkSGdaRFpEIiwidXNlciI6eyJjb3VudHJ5IjoiaW4iLCJsb2NhbGUiOiJlbl9VUyIsImFnZSI6eyJtaW4iOjIxfX0sInVzZXJfaWQiOiIxNDU0NjEwODM3ODk4NzQ5In0&fb_locale=en_US', '{"lead":[],"respnse":{"error":{"message":"Error validating access token: Session has expired on Wednesday, 12-Oct-16 01:00:00 PDT. The current time is Wednesday, 12-Oct-16 03:36:56 PDT.","type":"OAuthException","code":190,"error_subcode":463,"fbtrace_id":"BqxUhuGgnPu"}}}', '', '', 0, 0, 0, 0, '', '0000-00-00 00:00:00'),
(17, '', '{"entry": [{"changes": [{"field": "leadgen", "value": {"ad_id": 0, "form_id": 1070283146424835, "leadgen_id": 1078600562259760, "created_time": 1476269035, "page_id": 1325585957467268, "adgroup_id": 0}}], "id": "1325585957467268", "time": 1476269035}], "object": "page"}', '{"lead":[],"respnse":{"error":{"message":"Error validating access token: Session has expired on Wednesday, 12-Oct-16 01:00:00 PDT. The current time is Wednesday, 12-Oct-16 03:44:02 PDT.","type":"OAuthException","code":190,"error_subcode":463,"fbtrace_id":"FEfP9ExdgZg"}}}', '', '1070283146424835', 2147483647, 1476269035, 2147483647, 0, '', '0000-00-00 00:00:00'),
(18, '', '{"entry": [{"changes": [{"field": "leadgen", "value": {"ad_id": 0, "form_id": 668248243328181, "leadgen_id": 673256299494042, "created_time": 1476269092, "page_id": 791835064253420, "adgroup_id": 0}}], "id": "791835064253420", "time": 1476269093}], "object": "page"}', '', '', '', 0, 0, 0, 0, '', '0000-00-00 00:00:00'),
(19, '', '{"entry": [{"changes": [{"field": "leadgen", "value": {"ad_id": 0, "form_id": 1070283146424835, "leadgen_id": 1078601525592997, "created_time": 1476269178, "page_id": 1325585957467268, "adgroup_id": 0}}], "id": "1325585957467268", "time": 1476269179}], "object": "page"}', '{"lead":[],"respnse":{"error":{"message":"Error validating access token: Session has expired on Wednesday, 12-Oct-16 01:00:00 PDT. The current time is Wednesday, 12-Oct-16 03:46:26 PDT.","type":"OAuthException","code":190,"error_subcode":463,"fbtrace_id":"COfvCzymAZ6"}}}', '', '1070283146424835', 2147483647, 1476269178, 2147483647, 0, '', '0000-00-00 00:00:00'),
(20, '', '{"entry": [{"changes": [{"field": "leadgen", "value": {"ad_id": 0, "form_id": 1070283146424835, "leadgen_id": 1079372765515873, "created_time": 1476343510, "page_id": 1325585957467268, "adgroup_id": 0}}], "id": "1325585957467268", "time": 1476343511}], "object": "page"}', '{"lead":{"email":"test@fb.com","full_name":"<test lead: dummy data for full_name>","city":"<test lead: dummy data for city>","state":"<test lead: dummy data for state>","country":"<test lead: dummy data for country>","zip_code":"<test lead: dummy data for zip_code>","gender":"<test lead: dummy data for gender>"},"respnse":{"created_time":"2016-10-13T07:25:10+0000","id":"1079372765515873","field_data":[{"name":"email","values":["test@fb.com"]},{"name":"full_name","values":["<test lead: dummy data for full_name>"]},{"name":"city","values":["<test lead: dummy data for city>"]},{"name":"state","values":["<test lead: dummy data for state>"]},{"name":"country","values":["<test lead: dummy data for country>"]},{"name":"zip_code","values":["<test lead: dummy data for zip_code>"]},{"name":"gender","values":["<test lead: dummy data for gender>"]}]}}', '', '1070283146424835', 2147483647, 1476343510, 2147483647, 0, '', '0000-00-00 00:00:00'),
(21, '', '{"entry": [{"changes": [{"field": "leadgen", "value": {"ad_id": 0, "form_id": 1070283146424835, "leadgen_id": 1079373195515830, "created_time": 1476343587, "page_id": 1325585957467268, "adgroup_id": 0}}], "id": "1325585957467268", "time": 1476343588}], "object": "page"}', '{"lead":{"email":"mohdasif110@gmail.com","full_name":"Mohammad Asif","city":"New Delhi","state":"delhi","country":"IN","zip_code":"110095","gender":"male"},"respnse":{"created_time":"2016-10-13T07:26:27+0000","id":"1079373195515830","field_data":[{"name":"email","values":["mohdasif110@gmail.com"]},{"name":"full_name","values":["Mohammad Asif"]},{"name":"city","values":["New Delhi"]},{"name":"state","values":["delhi"]},{"name":"country","values":["IN"]},{"name":"zip_code","values":["110095"]},{"name":"gender","values":["male"]}]}}', '', '1070283146424835', 2147483647, 1476343587, 2147483647, 0, '', '0000-00-00 00:00:00'),
(22, '', '{"entry": [{"changes": [{"field": "leadgen", "value": {"ad_id": 0, "form_id": 1650448298580483, "leadgen_id": 1655459698079343, "created_time": 1476343674, "page_id": 791835064253420, "adgroup_id": 0}}], "id": "791835064253420", "time": 1476343675}], "object": "page"}', '', '', '', 0, 0, 0, 0, '', '0000-00-00 00:00:00'),
(23, '', '{"entry": [{"changes": [{"field": "leadgen", "value": {"ad_id": 0, "form_id": 1070283146424835, "leadgen_id": 1079395325513617, "created_time": 1476345983, "page_id": 1325585957467268, "adgroup_id": 0}}], "id": "1325585957467268", "time": 1476345984}], "object": "page"}', '{"lead":{"email":"test@fb.com","full_name":"<test lead: dummy data for full_name>","city":"<test lead: dummy data for city>","state":"<test lead: dummy data for state>","country":"<test lead: dummy data for country>","zip_code":"<test lead: dummy data for zip_code>","gender":"<test lead: dummy data for gender>"},"respnse":{"created_time":"2016-10-13T08:06:23+0000","id":"1079395325513617","field_data":[{"name":"email","values":["test@fb.com"]},{"name":"full_name","values":["<test lead: dummy data for full_name>"]},{"name":"city","values":["<test lead: dummy data for city>"]},{"name":"state","values":["<test lead: dummy data for state>"]},{"name":"country","values":["<test lead: dummy data for country>"]},{"name":"zip_code","values":["<test lead: dummy data for zip_code>"]},{"name":"gender","values":["<test lead: dummy data for gender>"]}]}}', '', '1070283146424835', 2147483647, 1476345983, 2147483647, 0, '', '0000-00-00 00:00:00'),
(24, '', '{"entry": [{"changes": [{"field": "leadgen", "value": {"ad_id": 0, "form_id": 1070283146424835, "leadgen_id": 1079470075506142, "created_time": 1476351064, "page_id": 1325585957467268, "adgroup_id": 0}}], "id": "1325585957467268", "time": 1476351065}], "object": "page"}', '{"lead":{"email":"mohdasif110@gmail.com","full_name":"Mohammad Asif","city":"New Delhi","state":"delhi","country":"IN","zip_code":"110095","gender":"male"},"respnse":{"created_time":"2016-10-13T09:31:04+0000","id":"1079470075506142","field_data":[{"name":"email","values":["mohdasif110@gmail.com"]},{"name":"full_name","values":["Mohammad Asif"]},{"name":"city","values":["New Delhi"]},{"name":"state","values":["delhi"]},{"name":"country","values":["IN"]},{"name":"zip_code","values":["110095"]},{"name":"gender","values":["male"]}]}}', '', '1070283146424835', 2147483647, 1476351064, 2147483647, 0, '', '0000-00-00 00:00:00'),
(25, '', '{"entry": [{"changes": [{"field": "leadgen", "value": {"ad_id": 0, "form_id": 1197444256989665, "leadgen_id": 1208144149253009, "created_time": 1476351436, "page_id": 1535724336689096, "adgroup_id": 0}}], "id": "1535724336689096", "time": 1476351436}], "object": "page"}', '{"lead":{"tell_us_are_you_interested_?":"yes","want_to_schedule_a_free_site_visit_?":"yes","email":"asif@bookmyhouse.com","full_name":"Mohammad Asif","phone_number":"+919873878430","city":"delhi"},"respnse":{"created_time":"2016-10-13T09:37:16+0000","id":"1208144149253009","field_data":[{"name":"tell_us_are_you_interested_?","values":["yes"]},{"name":"want_to_schedule_a_free_site_visit_?","values":["yes"]},{"name":"email","values":["asif@bookmyhouse.com"]},{"name":"full_name","values":["Mohammad Asif"]},{"name":"phone_number","values":["+919873878430"]},{"name":"city","values":["delhi"]}]}}', '', '1197444256989665', 2147483647, 1476351436, 2147483647, 0, '', '0000-00-00 00:00:00'),
(26, '', '{"entry": [{"changes": [{"field": "leadgen", "value": {"ad_id": 0, "form_id": 1197444256989665, "leadgen_id": 1208149119252512, "created_time": 1476351647, "page_id": 1535724336689096, "adgroup_id": 0}}], "id": "1535724336689096", "time": 1476351647}], "object": "page"}', '{"lead":{"tell_us_are_you_interested_?":"yes","want_to_schedule_a_free_site_visit_?":"yes","email":"test@test.com","full_name":"mohammad asif","phone_number":"+919599789921","city":"delhi"},"respnse":{"created_time":"2016-10-13T09:40:47+0000","id":"1208149119252512","field_data":[{"name":"tell_us_are_you_interested_?","values":["yes"]},{"name":"want_to_schedule_a_free_site_visit_?","values":["yes"]},{"name":"email","values":["test@test.com"]},{"name":"full_name","values":["mohammad asif"]},{"name":"phone_number","values":["+919599789921"]},{"name":"city","values":["delhi"]}]}}', '', '1197444256989665', 2147483647, 1476351647, 2147483647, 0, '', '0000-00-00 00:00:00'),
(27, '', '{"entry": [{"changes": [{"field": "leadgen", "value": {"ad_id": 0, "form_id": 531121810422697, "leadgen_id": 575977622603782, "created_time": 1476353358, "page_id": 1535724336689096, "adgroup_id": 0}}], "id": "1535724336689096", "time": 1476353359}], "object": "page"}', '{"lead":{"tell_us_are_you_interested_?":"<test lead: dummy data for tell_us_are_you_interested_?>","want_to_schedule_a_free_site_visit_?":"<test lead: dummy data for want_to_schedule_a_free_site_visit_?>","preferred_day_for_site_visit_?":"<test lead: dummy data for preferred_day_for_site_visit_?>","full_name":"<test lead: dummy data for full_name>","email":"test@fb.com","city":"<test lead: dummy data for city>","gender":"<test lead: dummy data for gender>","phone_number":"<test lead: dummy data for phone_number>"},"respnse":{"created_time":"2016-10-13T10:09:18+0000","id":"575977622603782","field_data":[{"name":"tell_us_are_you_interested_?","values":["<test lead: dummy data for tell_us_are_you_interested_?>"]},{"name":"want_to_schedule_a_free_site_visit_?","values":["<test lead: dummy data for want_to_schedule_a_free_site_visit_?>"]},{"name":"preferred_day_for_site_visit_?","values":["<test lead: dummy data for preferred_day_for_site_visit_?>"]},{"name":"full_name","values":["<test lead: dummy data for full_name>"]},{"name":"email","values":["test@fb.com"]},{"name":"city","values":["<test lead: dummy data for city>"]},{"name":"gender","values":["<test lead: dummy data for gender>"]},{"name":"phone_number","values":["<test lead: dummy data for phone_number>"]}]}}', '', '531121810422697', 2147483647, 1476353358, 2147483647, 0, '', '0000-00-00 00:00:00'),
(28, '', '{"entry": [{"changes": [{"field": "leadgen", "value": {"ad_id": 0, "form_id": 531121810422697, "leadgen_id": 575977855937092, "created_time": 1476353431, "page_id": 1535724336689096, "adgroup_id": 0}}], "id": "1535724336689096", "time": 1476353431}], "object": "page"}', '{"lead":{"tell_us_are_you_interested_?":"Yes","want_to_schedule_a_free_site_visit_?":"Yes","preferred_day_for_site_visit_?":"Monday","full_name":"mohammad Asif","email":"asif@bookmyhouse.com","city":"delhi","gender":"male","phone_number":"+919873878430"},"respnse":{"created_time":"2016-10-13T10:10:31+0000","id":"575977855937092","field_data":[{"name":"tell_us_are_you_interested_?","values":["Yes"]},{"name":"want_to_schedule_a_free_site_visit_?","values":["Yes"]},{"name":"preferred_day_for_site_visit_?","values":["Monday"]},{"name":"full_name","values":["mohammad Asif"]},{"name":"email","values":["asif@bookmyhouse.com"]},{"name":"city","values":["delhi"]},{"name":"gender","values":["male"]},{"name":"phone_number","values":["+919873878430"]}]}}', '', '531121810422697', 2147483647, 1476353431, 2147483647, 0, '', '0000-00-00 00:00:00'),
(29, '', '{"entry": [{"changes": [{"field": "leadgen", "value": {"ad_id": 0, "form_id": 1768360856784046, "leadgen_id": 1843118989308232, "created_time": 1476418114, "page_id": 1535724336689096, "adgroup_id": 0}}], "id": "1535724336689096", "time": 1476418115}], "object": "page"}', '{"lead":{"want_to_schedule_a_free_site_visit_?":"Yes","preferred_day_for_site_visit_?":"Monday","what_are_you_looking_for":"1 bhk (12.80  Lac)","full_name":"mohammad Asif","email":"asif@bookmyhouse.com","city":"delhi","state":"delhi","gender":"male","phone_number":"+919873878430"},"respnse":{"created_time":"2016-10-14T04:08:34+0000","id":"1843118989308232","field_data":[{"name":"want_to_schedule_a_free_site_visit_?","values":["Yes"]},{"name":"preferred_day_for_site_visit_?","values":["Monday"]},{"name":"what_are_you_looking_for","values":["1 bhk (12.80  Lac)"]},{"name":"full_name","values":["mohammad Asif"]},{"name":"email","values":["asif@bookmyhouse.com"]},{"name":"city","values":["delhi"]},{"name":"state","values":["delhi"]},{"name":"gender","values":["male"]},{"name":"phone_number","values":["+919873878430"]}]}}', '', '1768360856784046', 2147483647, 1476418114, 2147483647, 0, '', '0000-00-00 00:00:00'),
(30, '', '{"entry": [{"changes": [{"field": "leadgen", "value": {"ad_id": 0, "form_id": 971245442982668, "leadgen_id": 1084415114999033, "created_time": 1476544720, "page_id": 1535724336689096, "adgroup_id": 0}}], "id": "1535724336689096", "time": 1476544720}], "object": "page"}', '{"lead":{"interested_in_site_visit_":"Yes","preferred_date_for_site_visit_(dd-mm-yy)":"Tuesday","full_name":"raj","email":"test@bookmyhouse.com","city":"delhi","phone_number":"+919599789921"},"respnse":{"created_time":"2016-10-15T15:18:40+0000","id":"1084415114999033","field_data":[{"name":"interested_in_site_visit_","values":["Yes"]},{"name":"preferred_date_for_site_visit_(dd-mm-yy)","values":["Tuesday"]},{"name":"full_name","values":["raj"]},{"name":"email","values":["test@bookmyhouse.com"]},{"name":"city","values":["delhi"]},{"name":"phone_number","values":["+919599789921"]}]}}', '', '971245442982668', 2147483647, 1476544720, 2147483647, 0, '', '0000-00-00 00:00:00'),
(31, '', '{"entry": [{"changes": [{"field": "leadgen", "value": {"ad_id": 0, "form_id": 965898603458684, "leadgen_id": 1077624848952725, "created_time": 1476544758, "page_id": 1535724336689096, "adgroup_id": 0}}], "id": "1535724336689096", "time": 1476544758}], "object": "page"}', '{"lead":{"interested_in_site_visit":"YES","full_name":"mohammad rashid","email":"test@bookmyhouse.com","city":"delhi","country":"IN","phone_number":"+919599789921"},"respnse":{"created_time":"2016-10-15T15:19:18+0000","id":"1077624848952725","field_data":[{"name":"interested_in_site_visit","values":["YES"]},{"name":"full_name","values":["mohammad rashid"]},{"name":"email","values":["test@bookmyhouse.com"]},{"name":"city","values":["delhi"]},{"name":"country","values":["IN"]},{"name":"phone_number","values":["+919599789921"]}]}}', '', '965898603458684', 2147483647, 1476544758, 2147483647, 0, '', '0000-00-00 00:00:00'),
(32, '', '{"entry": [{"changes": [{"field": "leadgen", "value": {"ad_id": 0, "form_id": 577021472473307, "leadgen_id": 687821328059987, "created_time": 1476544833, "page_id": 1535724336689096, "adgroup_id": 0}}], "id": "1535724336689096", "time": 1476544833}], "object": "page"}', '{"lead":{"full_name":"<test lead: dummy data for full_name>","email":"test@fb.com","city":"<test lead: dummy data for city>","country":"<test lead: dummy data for country>","phone_number":"<test lead: dummy data for phone_number>"},"respnse":{"created_time":"2016-10-15T15:20:33+0000","id":"687821328059987","field_data":[{"name":"full_name","values":["<test lead: dummy data for full_name>"]},{"name":"email","values":["test@fb.com"]},{"name":"city","values":["<test lead: dummy data for city>"]},{"name":"country","values":["<test lead: dummy data for country>"]},{"name":"phone_number","values":["<test lead: dummy data for phone_number>"]}]}}', '', '577021472473307', 2147483647, 1476544833, 2147483647, 0, '', '0000-00-00 00:00:00'),
(33, '', '{"entry": [{"changes": [{"field": "feed", "value": {"item": "like", "verb": "add", "user_id": 1615193745447517}}], "id": "1325585957467268", "time": 1476551762}], "object": "page"}', '{"lead":[],"respnse":{"error":{"message":"Unsupported get request. Please read the Graph API documentation at https://developers.facebook.com/docs/graph-api","type":"GraphMethodException","code":100,"fbtrace_id":"Hn3t823fJCm"}}}', '', '', 0, 0, 0, 0, '', '0000-00-00 00:00:00'),
(34, '', '{"entry": [{"changes": [{"field": "feed", "value": {"item": "like", "verb": "add", "user_id": 263914527343536}}], "id": "1325585957467268", "time": 1476669577}], "object": "page"}', '{"lead":[],"respnse":{"error":{"message":"Unsupported get request. Please read the Graph API documentation at https://developers.facebook.com/docs/graph-api","type":"GraphMethodException","code":100,"fbtrace_id":"HQpQ1OAMSGx"}}}', '', '', 0, 0, 0, 0, '', '0000-00-00 00:00:00'),
(35, '', '{"entry": [{"changes": [{"field": "leadgen", "value": {"ad_id": 0, "form_id": 1197444256989665, "leadgen_id": 1212163845517706, "created_time": 1476682061, "page_id": 1535724336689096, "adgroup_id": 0}}], "id": "1535724336689096", "time": 1476682061}], "object": "page"}', '{"lead":{"tell_us_are_you_interested_?":"yes","want_to_schedule_a_free_site_visit_?":"yes","email":"test@bookmyhouse.com","full_name":"raj","phone_number":"+919599789921","city":"delhi"},"respnse":{"created_time":"2016-10-17T05:27:41+0000","id":"1212163845517706","field_data":[{"name":"tell_us_are_you_interested_?","values":["yes"]},{"name":"want_to_schedule_a_free_site_visit_?","values":["yes"]},{"name":"email","values":["test@bookmyhouse.com"]},{"name":"full_name","values":["raj"]},{"name":"phone_number","values":["+919599789921"]},{"name":"city","values":["delhi"]}]}}', '', '1197444256989665', 2147483647, 1476682061, 2147483647, 0, '', '0000-00-00 00:00:00'),
(36, '', '{"entry": [{"changes": [{"field": "leadgen", "value": {"ad_id": 0, "form_id": 291371514527169, "leadgen_id": 370287533302233, "created_time": 1476682328, "page_id": 1535724336689096, "adgroup_id": 0}}], "id": "1535724336689096", "time": 1476682329}], "object": "page"}', '{"lead":{"interested_in_site_visit_":"Yes","preferred_date_for_site_visit_(dd-mm-yy)":"aaaa","full_name":"aaaa","email":"test@bookmyhouse.com","city":"delhi","phone_number":"+919599789923"},"respnse":{"created_time":"2016-10-17T05:32:08+0000","id":"370287533302233","field_data":[{"name":"interested_in_site_visit_","values":["Yes"]},{"name":"preferred_date_for_site_visit_(dd-mm-yy)","values":["aaaa"]},{"name":"full_name","values":["aaaa"]},{"name":"email","values":["test@bookmyhouse.com"]},{"name":"city","values":["delhi"]},{"name":"phone_number","values":["+919599789923"]}]}}', '', '291371514527169', 2147483647, 1476682328, 2147483647, 0, '', '0000-00-00 00:00:00'),
(37, '', '{"entry": [{"changes": [{"field": "leadgen", "value": {"ad_id": 0, "form_id": 291371514527169, "leadgen_id": 370288599968793, "created_time": 1476682555, "page_id": 1535724336689096, "adgroup_id": 0}}], "id": "1535724336689096", "time": 1476682557}], "object": "page"}', '{"lead":{"interested_in_site_visit_":"Yes","preferred_date_for_site_visit_(dd-mm-yy)":"2016-10-20","full_name":"raj","email":"test@bookmyhouse.com","city":"delhi","phone_number":"+919599789921"},"respnse":{"created_time":"2016-10-17T05:35:55+0000","id":"370288599968793","field_data":[{"name":"interested_in_site_visit_","values":["Yes"]},{"name":"preferred_date_for_site_visit_(dd-mm-yy)","values":["2016-10-20"]},{"name":"full_name","values":["raj"]},{"name":"email","values":["test@bookmyhouse.com"]},{"name":"city","values":["delhi"]},{"name":"phone_number","values":["+919599789921"]}]}}', '', '291371514527169', 2147483647, 1476682555, 2147483647, 0, '', '0000-00-00 00:00:00'),
(38, '', '{"entry": [{"changes": [{"field": "leadgen", "value": {"ad_id": 0, "form_id": 1197444256989665, "leadgen_id": 1220895947977829, "created_time": 1477413643, "page_id": 1535724336689096, "adgroup_id": 0}}], "id": "1535724336689096", "time": 1477413643}], "object": "page"}', '{"lead":{"tell_us_are_you_interested_?":"yes","want_to_schedule_a_free_site_visit_?":"yes","email":"test@bookmyhouse.com","full_name":"raj","phone_number":"+919599789922","city":"delhi"},"respnse":{"created_time":"2016-10-25T16:40:43+0000","id":"1220895947977829","field_data":[{"name":"tell_us_are_you_interested_?","values":["yes"]},{"name":"want_to_schedule_a_free_site_visit_?","values":["yes"]},{"name":"email","values":["test@bookmyhouse.com"]},{"name":"full_name","values":["raj"]},{"name":"phone_number","values":["+919599789922"]},{"name":"city","values":["delhi"]}]}}', '', '1197444256989665', 2147483647, 1477413643, 2147483647, 0, '', '0000-00-00 00:00:00'),
(39, '', '{"entry": [{"changes": [{"field": "leadgen", "value": {"ad_id": 0, "form_id": 1197444256989665, "leadgen_id": 1220901004643990, "created_time": 1477413935, "page_id": 1535724336689096, "adgroup_id": 0}}], "id": "1535724336689096", "time": 1477413935}], "object": "page"}', '{"lead":{"tell_us_are_you_interested_?":"yes","want_to_schedule_a_free_site_visit_?":"yes","email":"asif@bookmyhouse.com","full_name":"Mohammad Asif","phone_number":"+919599789925","city":"delhi"},"respnse":{"created_time":"2016-10-25T16:45:35+0000","id":"1220901004643990","field_data":[{"name":"tell_us_are_you_interested_?","values":["yes"]},{"name":"want_to_schedule_a_free_site_visit_?","values":["yes"]},{"name":"email","values":["asif@bookmyhouse.com"]},{"name":"full_name","values":["Mohammad Asif"]},{"name":"phone_number","values":["+919599789925"]},{"name":"city","values":["delhi"]}]}}', '', '1197444256989665', 2147483647, 1477413935, 2147483647, 0, '', '0000-00-00 00:00:00'),
(40, '', '{"entry": [{"changes": [{"field": "leadgen", "value": {"ad_id": 0, "form_id": 1701697613447515, "leadgen_id": 1805652376385371, "created_time": 1477414048, "page_id": 1535724336689096, "adgroup_id": 0}}], "id": "1535724336689096", "time": 1477414048}], "object": "page"}', '{"lead":{"full_name":"Amitesh Kuamr","email":"kumar@bookmyhouse.com","phone_number":"+919599789926"},"respnse":{"created_time":"2016-10-25T16:47:28+0000","id":"1805652376385371","field_data":[{"name":"full_name","values":["Amitesh Kuamr"]},{"name":"email","values":["kumar@bookmyhouse.com"]},{"name":"phone_number","values":["+919599789926"]}]}}', '', '1701697613447515', 2147483647, 1477414048, 2147483647, 0, '', '0000-00-00 00:00:00'),
(41, '', '{"entry": [{"changes": [{"field": "leadgen", "value": {"ad_id": 0, "form_id": 965898603458684, "leadgen_id": 1085103254871551, "created_time": 1477414708, "page_id": 1535724336689096, "adgroup_id": 0}}], "id": "1535724336689096", "time": 1477414709}], "object": "page"}', '{"lead":{"interested_in_site_visit":"YES","full_name":"raj","email":"test55@bookmyhouse.com","city":"delhi","country":"IN","phone_number":"+919599789928"},"respnse":{"created_time":"2016-10-25T16:58:28+0000","id":"1085103254871551","field_data":[{"name":"interested_in_site_visit","values":["YES"]},{"name":"full_name","values":["raj"]},{"name":"email","values":["test55@bookmyhouse.com"]},{"name":"city","values":["delhi"]},{"name":"country","values":["IN"]},{"name":"phone_number","values":["+919599789928"]}]}}', '', '965898603458684', 2147483647, 1477414708, 2147483647, 0, '', '0000-00-00 00:00:00'),
(42, '', '{"entry": [{"changes": [{"field": "leadgen", "value": {"ad_id": 0, "form_id": 1197444256989665, "leadgen_id": 1221524631248294, "created_time": 1477478150, "page_id": 1535724336689096, "adgroup_id": 0}}], "id": "1535724336689096", "time": 1477478151}], "object": "page"}', '{"lead":{"tell_us_are_you_interested_?":"yes","want_to_schedule_a_free_site_visit_?":"yes","email":"test@bookmyhouse.com","full_name":"raj","phone_number":"+919599789921","city":"delhi"},"respnse":{"created_time":"2016-10-26T10:35:50+0000","id":"1221524631248294","field_data":[{"name":"tell_us_are_you_interested_?","values":["yes"]},{"name":"want_to_schedule_a_free_site_visit_?","values":["yes"]},{"name":"email","values":["test@bookmyhouse.com"]},{"name":"full_name","values":["raj"]},{"name":"phone_number","values":["+919599789921"]},{"name":"city","values":["delhi"]}]}}', '', '1197444256989665', 2147483647, 1477478150, 2147483647, 0, '', '0000-00-00 00:00:00'),
(43, '', '{"entry": [{"changes": [{"field": "leadgen", "value": {"ad_id": 0, "form_id": 291371514527169, "leadgen_id": 375743482756638, "created_time": 1477478235, "page_id": 1535724336689096, "adgroup_id": 0}}], "id": "1535724336689096", "time": 1477478236}], "object": "page"}', '{"lead":{"interested_in_site_visit_":"Yes","preferred_date_for_site_visit_(dd-mm-yy)":"10-11-2016","full_name":"Mohd Asif","email":"asif2@bookmyhouse.com","city":"delhi","phone_number":"+919873878329"},"respnse":{"created_time":"2016-10-26T10:37:15+0000","id":"375743482756638","field_data":[{"name":"interested_in_site_visit_","values":["Yes"]},{"name":"preferred_date_for_site_visit_(dd-mm-yy)","values":["10-11-2016"]},{"name":"full_name","values":["Mohd Asif"]},{"name":"email","values":["asif2@bookmyhouse.com"]},{"name":"city","values":["delhi"]},{"name":"phone_number","values":["+919873878329"]}]}}', '', '291371514527169', 2147483647, 1477478235, 2147483647, 0, '', '0000-00-00 00:00:00'),
(44, '', '{"entry": [{"changes": [{"field": "leadgen", "value": {"ad_id": 0, "form_id": 1701697613447515, "leadgen_id": 1806193169664625, "created_time": 1477478503, "page_id": 1535724336689096, "adgroup_id": 0}}], "id": "1535724336689096", "time": 1477478504}], "object": "page"}', '{"lead":{"full_name":"Kunal Gupta","email":"kunalt@bmh.com","phone_number":"+919588789926"},"respnse":{"created_time":"2016-10-26T10:41:43+0000","id":"1806193169664625","field_data":[{"name":"full_name","values":["Kunal Gupta"]},{"name":"email","values":["kunalt@bmh.com"]},{"name":"phone_number","values":["+919588789926"]}]}}', '', '1701697613447515', 2147483647, 1477478503, 2147483647, 0, '', '0000-00-00 00:00:00'),
(45, '', '{"entry": [{"changes": [{"field": "leadgen", "value": {"ad_id": 0, "form_id": 272668756415976, "leadgen_id": 359117554437762, "created_time": 1477480599, "page_id": 1535724336689096, "adgroup_id": 0}}], "id": "1535724336689096", "time": 1477480599}], "object": "page"}', '{"lead":{"what_are_you_looking_for":"2 BHK (16.57 Lac)","want_to_schedule_a_free_site_visit_?":"Yes","preferred_day_for_site_visit_?":"MONDAY","full_name":"Ankur jain","email":"ankurjain@bmh.com","city":"delhi","state":"delhi","gender":"male","phone_number":"+919599779927"},"respnse":{"created_time":"2016-10-26T11:16:39+0000","id":"359117554437762","field_data":[{"name":"what_are_you_looking_for","values":["2 BHK (16.57 Lac)"]},{"name":"want_to_schedule_a_free_site_visit_?","values":["Yes"]},{"name":"preferred_day_for_site_visit_?","values":["MONDAY"]},{"name":"full_name","values":["Ankur jain"]},{"name":"email","values":["ankurjain@bmh.com"]},{"name":"city","values":["delhi"]},{"name":"state","values":["delhi"]},{"name":"gender","values":["male"]},{"name":"phone_number","values":["+919599779927"]}]}}', '', '272668756415976', 2147483647, 1477480599, 2147483647, 0, '', '0000-00-00 00:00:00'),
(46, '', '{"entry": [{"changes": [{"field": "leadgen", "value": {"ad_id": 0, "form_id": 1197444256989665, "leadgen_id": 1228308653903225, "created_time": 1478073963, "page_id": 1535724336689096, "adgroup_id": 0}}], "id": "1535724336689096", "time": 1478073964}], "object": "page"}', '{"lead":{"tell_us_are_you_interested_?":"yes","want_to_schedule_a_free_site_visit_?":"yes","email":"asif2@bookmyhouse.com","full_name":"Mohamamad Asif","phone_number":"+919599789923","city":"delhi"},"respnse":{"created_time":"2016-11-02T08:06:03+0000","id":"1228308653903225","field_data":[{"name":"tell_us_are_you_interested_?","values":["yes"]},{"name":"want_to_schedule_a_free_site_visit_?","values":["yes"]},{"name":"email","values":["asif2@bookmyhouse.com"]},{"name":"full_name","values":["Mohamamad Asif"]},{"name":"phone_number","values":["+919599789923"]},{"name":"city","values":["delhi"]}]}}', '', '1197444256989665', 2147483647, 1478073963, 2147483647, 0, '', '0000-00-00 00:00:00'),
(47, '', '{"entry": [{"changes": [{"field": "leadgen", "value": {"ad_id": 0, "form_id": 1197444256989665, "leadgen_id": 1228311107236313, "created_time": 1478074176, "page_id": 1535724336689096, "adgroup_id": 0}}], "id": "1535724336689096", "time": 1478074177}], "object": "page"}', '{"lead":{"tell_us_are_you_interested_?":"yes","want_to_schedule_a_free_site_visit_?":"yes","email":"test@bookmyhouse.com","full_name":"raj","phone_number":"+919599789928","city":"delhi"},"respnse":{"created_time":"2016-11-02T08:09:36+0000","id":"1228311107236313","field_data":[{"name":"tell_us_are_you_interested_?","values":["yes"]},{"name":"want_to_schedule_a_free_site_visit_?","values":["yes"]},{"name":"email","values":["test@bookmyhouse.com"]},{"name":"full_name","values":["raj"]},{"name":"phone_number","values":["+919599789928"]},{"name":"city","values":["delhi"]}]}}', '', '1197444256989665', 2147483647, 1478074176, 2147483647, 0, '', '0000-00-00 00:00:00'),
(48, '', '{"entry": [{"changes": [{"field": "leadgen", "value": {"ad_id": 0, "form_id": 1768360856784046, "leadgen_id": 1855248154761982, "created_time": 1478074596, "page_id": 1535724336689096, "adgroup_id": 0}}], "id": "1535724336689096", "time": 1478074597}], "object": "page"}', '{"lead":{"want_to_schedule_a_free_site_visit_?":"Yes","preferred_day_for_site_visit_?":"Sunday","what_are_you_looking_for":"1 bhk (12.80  Lac)","full_name":"raj","email":"test999@bookmyhouse.com","city":"delhi","state":"delhi","gender":"male","phone_number":"+919599789873"},"respnse":{"created_time":"2016-11-02T08:16:36+0000","id":"1855248154761982","field_data":[{"name":"want_to_schedule_a_free_site_visit_?","values":["Yes"]},{"name":"preferred_day_for_site_visit_?","values":["Sunday"]},{"name":"what_are_you_looking_for","values":["1 bhk (12.80  Lac)"]},{"name":"full_name","values":["raj"]},{"name":"email","values":["test999@bookmyhouse.com"]},{"name":"city","values":["delhi"]},{"name":"state","values":["delhi"]},{"name":"gender","values":["male"]},{"name":"phone_number","values":["+919599789873"]}]}}', '', '1768360856784046', 2147483647, 1478074596, 2147483647, 0, '', '0000-00-00 00:00:00'),
(49, '', '{"entry": [{"changes": [{"field": "leadgen", "value": {"ad_id": 0, "form_id": 1768360856784046, "leadgen_id": 1855250638095067, "created_time": 1478075296, "page_id": 1535724336689096, "adgroup_id": 0}}], "id": "1535724336689096", "time": 1478075296}], "object": "page"}', '{"lead":{"want_to_schedule_a_free_site_visit_?":"Yes","preferred_day_for_site_visit_?":"Sunday","what_are_you_looking_for":"1 bhk (12.80  Lac)","full_name":"mmm","email":"test3@bookmyhouse.com","city":"delhi","state":"delhi","gender":"male","phone_number":"+919588789921"},"respnse":{"created_time":"2016-11-02T08:28:16+0000","id":"1855250638095067","field_data":[{"name":"want_to_schedule_a_free_site_visit_?","values":["Yes"]},{"name":"preferred_day_for_site_visit_?","values":["Sunday"]},{"name":"what_are_you_looking_for","values":["1 bhk (12.80  Lac)"]},{"name":"full_name","values":["mmm"]},{"name":"email","values":["test3@bookmyhouse.com"]},{"name":"city","values":["delhi"]},{"name":"state","values":["delhi"]},{"name":"gender","values":["male"]},{"name":"phone_number","values":["+919588789921"]}]}}', '', '1768360856784046', 2147483647, 1478075296, 2147483647, 0, '', '0000-00-00 00:00:00'),
(50, '', '{"entry": [{"changes": [{"field": "leadgen", "value": {"ad_id": 0, "form_id": 1197444256989665, "leadgen_id": 1228341013899989, "created_time": 1478077066, "page_id": 1535724336689096, "adgroup_id": 0}}], "id": "1535724336689096", "time": 1478077066}], "object": "page"}', '{"lead":{"tell_us_are_you_interested_?":"yes","want_to_schedule_a_free_site_visit_?":"yes","email":"test33@bookmyhouse.com","full_name":"mohd asif","phone_number":"+919873762639","city":"delhi"},"respnse":{"created_time":"2016-11-02T08:57:46+0000","id":"1228341013899989","field_data":[{"name":"tell_us_are_you_interested_?","values":["yes"]},{"name":"want_to_schedule_a_free_site_visit_?","values":["yes"]},{"name":"email","values":["test33@bookmyhouse.com"]},{"name":"full_name","values":["mohd asif"]},{"name":"phone_number","values":["+919873762639"]},{"name":"city","values":["delhi"]}]}}', '', '1197444256989665', 2147483647, 1478077066, 2147483647, 0, '', '0000-00-00 00:00:00'),
(51, '', '{"entry": [{"changes": [{"field": "leadgen", "value": {"ad_id": 0, "form_id": 1197444256989665, "leadgen_id": 1228342273899863, "created_time": 1478077214, "page_id": 1535724336689096, "adgroup_id": 0}}], "id": "1535724336689096", "time": 1478077214}], "object": "page"}', '{"lead":{"tell_us_are_you_interested_?":"yes","want_to_schedule_a_free_site_visit_?":"yes","email":"asif@bookmyhouse.com","full_name":"Mohammd Asif","phone_number":"+919599789921","city":"delhi"},"respnse":{"created_time":"2016-11-02T09:00:14+0000","id":"1228342273899863","field_data":[{"name":"tell_us_are_you_interested_?","values":["yes"]},{"name":"want_to_schedule_a_free_site_visit_?","values":["yes"]},{"name":"email","values":["asif@bookmyhouse.com"]},{"name":"full_name","values":["Mohammd Asif"]},{"name":"phone_number","values":["+919599789921"]},{"name":"city","values":["delhi"]}]}}', '', '1197444256989665', 2147483647, 1478077214, 2147483647, 0, '', '0000-00-00 00:00:00'),
(52, '', '{"entry": [{"changes": [{"field": "leadgen", "value": {"ad_id": 0, "form_id": 531121810422697, "leadgen_id": 586070631594481, "created_time": 1478079989, "page_id": 1535724336689096, "adgroup_id": 0}}], "id": "1535724336689096", "time": 1478079989}], "object": "page"}', '{"lead":{"tell_us_are_you_interested_?":"Yes","want_to_schedule_a_free_site_visit_?":"Yes","preferred_day_for_site_visit_?":"Sunday","full_name":"mohd asif","email":"mdasif@bookmyhouse.com","city":"delhi","gender":"male","phone_number":"+919599789928"},"respnse":{"created_time":"2016-11-02T09:46:29+0000","id":"586070631594481","field_data":[{"name":"tell_us_are_you_interested_?","values":["Yes"]},{"name":"want_to_schedule_a_free_site_visit_?","values":["Yes"]},{"name":"preferred_day_for_site_visit_?","values":["Sunday"]},{"name":"full_name","values":["mohd asif"]},{"name":"email","values":["mdasif@bookmyhouse.com"]},{"name":"city","values":["delhi"]},{"name":"gender","values":["male"]},{"name":"phone_number","values":["+919599789928"]}]}}', '', '531121810422697', 2147483647, 1478079989, 2147483647, 0, '', '0000-00-00 00:00:00'),
(53, '', '{"entry": [{"changes": [{"field": "leadgen", "value": {"ad_id": 0, "form_id": 1553299924970668, "leadgen_id": 1619600388340621, "created_time": 1478080726, "page_id": 1535724336689096, "adgroup_id": 0}}], "id": "1535724336689096", "time": 1478080727}], "object": "page"}', '{"lead":{"interested_in_site_visit_":"Yes","do_you_want_to_visit_the_site_on_weekend_?":"Yes","full_name":"gopal ji","email":"gopalji@bookmyhouse.com","city":"delhi","country":"IN","phone_number":"+919599789925"},"respnse":{"created_time":"2016-11-02T09:58:46+0000","id":"1619600388340621","field_data":[{"name":"interested_in_site_visit_","values":["Yes"]},{"name":"do_you_want_to_visit_the_site_on_weekend_?","values":["Yes"]},{"name":"full_name","values":["gopal ji"]},{"name":"email","values":["gopalji@bookmyhouse.com"]},{"name":"city","values":["delhi"]},{"name":"country","values":["IN"]},{"name":"phone_number","values":["+919599789925"]}]}}', '', '1553299924970668', 2147483647, 1478080726, 2147483647, 0, '', '0000-00-00 00:00:00'),
(54, '', '{"entry": [{"changes": [{"field": "leadgen", "value": {"ad_id": 0, "form_id": 1197444256989665, "leadgen_id": 1229223220478435, "created_time": 1478153207, "page_id": 1535724336689096, "adgroup_id": 0}}], "id": "1535724336689096", "time": 1478153208}], "object": "page"}', '{"lead":{"tell_us_are_you_interested_?":"yes","want_to_schedule_a_free_site_visit_?":"yes","email":"mohdasif@bookmyhouse.com","full_name":"raj","phone_number":"+919599789955","city":"delhi"},"respnse":{"created_time":"2016-11-03T06:06:47+0000","id":"1229223220478435","field_data":[{"name":"tell_us_are_you_interested_?","values":["yes"]},{"name":"want_to_schedule_a_free_site_visit_?","values":["yes"]},{"name":"email","values":["mohdasif@bookmyhouse.com"]},{"name":"full_name","values":["raj"]},{"name":"phone_number","values":["+919599789955"]},{"name":"city","values":["delhi"]}]}}', '', '1197444256989665', 2147483647, 1478153207, 2147483647, 0, '', '0000-00-00 00:00:00');
INSERT INTO `ity_leads` (`id`, `hub_challenge`, `inputval`, `leadvalujson`, `ad_id`, `form_id`, `leadgen_id`, `created_time`, `page_id`, `adgroup_id`, `leadFrom`, `createdDate`) VALUES
(55, '', '{"entry": [{"changes": [{"field": "leadgen", "value": {"ad_id": 0, "form_id": 1197444256989665, "leadgen_id": 1229228243811266, "created_time": 1478153739, "page_id": 1535724336689096, "adgroup_id": 0}}], "id": "1535724336689096", "time": 1478153739}], "object": "page"}', '{"lead":{"tell_us_are_you_interested_?":"yes","want_to_schedule_a_free_site_visit_?":"yes","email":"rmm@bookmyhouse.com","full_name":"mohammad asif","phone_number":"+919599789977","city":"delhi"},"respnse":{"created_time":"2016-11-03T06:15:39+0000","id":"1229228243811266","field_data":[{"name":"tell_us_are_you_interested_?","values":["yes"]},{"name":"want_to_schedule_a_free_site_visit_?","values":["yes"]},{"name":"email","values":["rmm@bookmyhouse.com"]},{"name":"full_name","values":["mohammad asif"]},{"name":"phone_number","values":["+919599789977"]},{"name":"city","values":["delhi"]}]}}', '', '1197444256989665', 2147483647, 1478153739, 2147483647, 0, '', '0000-00-00 00:00:00'),
(56, '', '{"entry": [{"changes": [{"field": "leadgen", "value": {"ad_id": 0, "form_id": 1768360856784046, "leadgen_id": 1855851758034955, "created_time": 1478171602, "page_id": 1535724336689096, "adgroup_id": 0}}], "id": "1535724336689096", "time": 1478171602}], "object": "page"}', '{"lead":{"want_to_schedule_a_free_site_visit_?":"Yes","preferred_day_for_site_visit_?":"Sunday","what_are_you_looking_for":"1 bhk (12.80  Lac)","full_name":"raj","email":"test@bookmyhouse.com","city":"delhi","state":"delhi","gender":"male","phone_number":"+919599789927"},"respnse":{"created_time":"2016-11-03T11:13:22+0000","id":"1855851758034955","field_data":[{"name":"want_to_schedule_a_free_site_visit_?","values":["Yes"]},{"name":"preferred_day_for_site_visit_?","values":["Sunday"]},{"name":"what_are_you_looking_for","values":["1 bhk (12.80  Lac)"]},{"name":"full_name","values":["raj"]},{"name":"email","values":["test@bookmyhouse.com"]},{"name":"city","values":["delhi"]},{"name":"state","values":["delhi"]},{"name":"gender","values":["male"]},{"name":"phone_number","values":["+919599789927"]}]}}', '', '1768360856784046', 2147483647, 1478171602, 2147483647, 0, '', '0000-00-00 00:00:00'),
(57, '', '{"entry": [{"changes": [{"field": "leadgen", "value": {"ad_id": 0, "form_id": 1768360856784046, "leadgen_id": 1855857274701070, "created_time": 1478172563, "page_id": 1535724336689096, "adgroup_id": 0}}], "id": "1535724336689096", "time": 1478172563}], "object": "page"}', '{"lead":{"want_to_schedule_a_free_site_visit_?":"Yes","preferred_day_for_site_visit_?":"Sunday","what_are_you_looking_for":"1 bhk (12.80  Lac)","full_name":"AAKASH","email":"test@bookmyhouse.com","city":"delhi","state":"delhi","gender":"male","phone_number":"+919599789921"},"respnse":{"created_time":"2016-11-03T11:29:23+0000","id":"1855857274701070","field_data":[{"name":"want_to_schedule_a_free_site_visit_?","values":["Yes"]},{"name":"preferred_day_for_site_visit_?","values":["Sunday"]},{"name":"what_are_you_looking_for","values":["1 bhk (12.80  Lac)"]},{"name":"full_name","values":["AAKASH"]},{"name":"email","values":["test@bookmyhouse.com"]},{"name":"city","values":["delhi"]},{"name":"state","values":["delhi"]},{"name":"gender","values":["male"]},{"name":"phone_number","values":["+919599789921"]}]}}', '', '1768360856784046', 2147483647, 1478172563, 2147483647, 0, '', '0000-00-00 00:00:00'),
(58, '', '{"entry": [{"changes": [{"field": "leadgen", "value": {"ad_id": 0, "form_id": 971245442982668, "leadgen_id": 1104113599695851, "created_time": 1478172722, "page_id": 1535724336689096, "adgroup_id": 0}}], "id": "1535724336689096", "time": 1478172722}], "object": "page"}', '{"lead":{"interested_in_site_visit_":"Yes","preferred_date_for_site_visit_(dd-mm-yy)":"Monday","full_name":"mohammad asif2","email":"asif2@bookmyhouse.com","city":"delhi","phone_number":"+919599789955"},"respnse":{"created_time":"2016-11-03T11:32:02+0000","id":"1104113599695851","field_data":[{"name":"interested_in_site_visit_","values":["Yes"]},{"name":"preferred_date_for_site_visit_(dd-mm-yy)","values":["Monday"]},{"name":"full_name","values":["mohammad asif2"]},{"name":"email","values":["asif2@bookmyhouse.com"]},{"name":"city","values":["delhi"]},{"name":"phone_number","values":["+919599789955"]}]}}', '', '971245442982668', 2147483647, 1478172722, 2147483647, 0, '', '0000-00-00 00:00:00'),
(59, '', '{"entry": [{"changes": [{"field": "leadgen", "value": {"ad_id": 0, "form_id": 1197444256989665, "leadgen_id": 1234472826620141, "created_time": 1478594954, "page_id": 1535724336689096, "adgroup_id": 0}}], "id": "1535724336689096", "time": 1478594954}], "object": "page"}', '{"lead":{"tell_us_are_you_interested_?":"yes","want_to_schedule_a_free_site_visit_?":"yes","email":"test2@bookmyhouse.com","full_name":"mohammad asif","phone_number":"+919599789989","city":"delhi"},"respnse":{"created_time":"2016-11-08T08:49:14+0000","id":"1234472826620141","field_data":[{"name":"tell_us_are_you_interested_?","values":["yes"]},{"name":"want_to_schedule_a_free_site_visit_?","values":["yes"]},{"name":"email","values":["test2@bookmyhouse.com"]},{"name":"full_name","values":["mohammad asif"]},{"name":"phone_number","values":["+919599789989"]},{"name":"city","values":["delhi"]}]}}', '', '1197444256989665', 2147483647, 1478594954, 2147483647, 0, '', '0000-00-00 00:00:00'),
(60, '', '{"entry": [{"changes": [{"field": "feed", "value": {"item": "like", "verb": "add", "user_id": 829698147172455}}], "id": "1325585957467268", "time": 1478684244}], "object": "page"}', '{"lead":[],"respnse":{"error":{"message":"Unsupported get request. Please read the Graph API documentation at https://developers.facebook.com/docs/graph-api","type":"GraphMethodException","code":100,"fbtrace_id":"BiAwZDpT9eb"}}}', '', '', 0, 0, 0, 0, '', '0000-00-00 00:00:00'),
(61, '', '{"entry": [{"changes": [{"field": "feed", "value": {"item": "like", "verb": "add", "user_id": 1614225582206733}}], "id": "1325585957467268", "time": 1478746201}], "object": "page"}', '{"lead":[],"respnse":{"error":{"message":"Unsupported get request. Please read the Graph API documentation at https://developers.facebook.com/docs/graph-api","type":"GraphMethodException","code":100,"fbtrace_id":"E+tEbCg1DPj"}}}', '', '', 0, 0, 0, 0, '', '0000-00-00 00:00:00'),
(62, '', '{"entry": [{"changes": [{"field": "feed", "value": {"item": "like", "verb": "add", "user_id": 1603673403272493}}], "id": "1325585957467268", "time": 1479016570}], "object": "page"}', '{"lead":[],"respnse":{"error":{"message":"Unsupported get request. Please read the Graph API documentation at https://developers.facebook.com/docs/graph-api","type":"GraphMethodException","code":100,"fbtrace_id":"HM1gh8G5Aas"}}}', '', '', 0, 0, 0, 0, '', '0000-00-00 00:00:00'),
(63, '', '{"entry": [{"changes": [{"field": "feed", "value": {"item": "like", "verb": "add", "user_id": 359612561055395}}], "id": "1325585957467268", "time": 1479029148}], "object": "page"}', '{"lead":[],"respnse":{"error":{"message":"Unsupported get request. Please read the Graph API documentation at https://developers.facebook.com/docs/graph-api","type":"GraphMethodException","code":100,"fbtrace_id":"AwAAhuhhNp7"}}}', '', '', 0, 0, 0, 0, '', '0000-00-00 00:00:00'),
(64, '', '{"entry": [{"changes": [{"field": "leadgen", "value": {"ad_id": 0, "form_id": 1197444256989665, "leadgen_id": 1252187601515330, "created_time": 1480048445, "page_id": 1535724336689096, "adgroup_id": 0}}], "id": "1535724336689096", "time": 1480048446}], "object": "page"}', '{"lead":{"tell_us_are_you_interested_?":"yes","want_to_schedule_a_free_site_visit_?":"yes","email":"test@bookmyhouse.com","full_name":"Mohammad Asif","phone_number":"+919599789997","city":"delhi"},"respnse":{"created_time":"2016-11-25T04:34:05+0000","id":"1252187601515330","field_data":[{"name":"tell_us_are_you_interested_?","values":["yes"]},{"name":"want_to_schedule_a_free_site_visit_?","values":["yes"]},{"name":"email","values":["test@bookmyhouse.com"]},{"name":"full_name","values":["Mohammad Asif"]},{"name":"phone_number","values":["+919599789997"]},{"name":"city","values":["delhi"]}]}}', '', '1197444256989665', 2147483647, 1480048445, 2147483647, 0, '', '0000-00-00 00:00:00'),
(65, '', '{"entry": [{"changes": [{"field": "feed", "value": {"parent_id": "1325585957467268_1555061781186350", "sender_name": "Shivam Rathoor", "comment_id": "1555061781186350_1676496855709508", "sender_id": 108924676263219, "item": "comment", "verb": "add", "created_time": 1480495036, "post_id": "1325585957467268_1555061781186350"}}], "id": "1325585957467268", "time": 1480495037}], "object": "page"}', '{"lead":[],"respnse":{"error":{"message":"Unsupported get request. Please read the Graph API documentation at https://developers.facebook.com/docs/graph-api","type":"GraphMethodException","code":100,"fbtrace_id":"B8J+p/18MOm"}}}', '', '', 0, 1480495036, 0, 0, '', '0000-00-00 00:00:00'),
(66, '', '{"entry": [{"changes": [{"field": "feed", "value": {"sender_name": "Shivam Rathoor", "comment_id": "1555061781186350_1676496855709508", "sender_id": 108924676263219, "item": "like", "verb": "add", "created_time": 1480495067}}], "id": "1325585957467268", "time": 1480495067}], "object": "page"}', '{"lead":[],"respnse":{"error":{"message":"Unsupported get request. Please read the Graph API documentation at https://developers.facebook.com/docs/graph-api","type":"GraphMethodException","code":100,"fbtrace_id":"Eixr/fM6F1u"}}}', '', '', 0, 1480495067, 0, 0, '', '0000-00-00 00:00:00'),
(67, '', '{"entry": [{"changes": [{"field": "feed", "value": {"parent_id": "1325585957467268_1555061781186350", "sender_name": "Mohammad Bilal", "sender_id": 191022578025790, "item": "like", "verb": "add", "created_time": 1480503444, "post_id": "1325585957467268_1555061781186350"}}], "id": "1325585957467268", "time": 1480503444}], "object": "page"}', '{"lead":[],"respnse":{"error":{"message":"Unsupported get request. Please read the Graph API documentation at https://developers.facebook.com/docs/graph-api","type":"GraphMethodException","code":100,"fbtrace_id":"HPFFOC9WhJT"}}}', '', '', 0, 1480503444, 0, 0, '', '0000-00-00 00:00:00'),
(68, '', '{"entry": [{"changes": [{"field": "feed", "value": {"parent_id": "1325585957467268_1466793270013202", "sender_name": "Mohammad Bilal", "sender_id": 191022578025790, "item": "like", "verb": "add", "created_time": 1480503454, "post_id": "1325585957467268_1466793270013202"}}], "id": "1325585957467268", "time": 1480503454}], "object": "page"}', '{"lead":[],"respnse":{"error":{"message":"Unsupported get request. Please read the Graph API documentation at https://developers.facebook.com/docs/graph-api","type":"GraphMethodException","code":100,"fbtrace_id":"FundzbQt+yy"}}}', '', '', 0, 1480503454, 0, 0, '', '0000-00-00 00:00:00'),
(69, '', '{"entry": [{"changes": [{"field": "feed", "value": {"item": "like", "verb": "add", "user_id": 566860713511853}}], "id": "1325585957467268", "time": 1481348313}], "object": "page"}', '{"lead":[],"respnse":{"error":{"message":"Unsupported get request. Please read the Graph API documentation at https://developers.facebook.com/docs/graph-api","type":"GraphMethodException","code":100,"fbtrace_id":"Ea7T/VlCFox"}}}', '', '', 0, 0, 0, 0, '', '0000-00-00 00:00:00'),
(70, '', '{"entry": [{"changes": [{"field": "feed", "value": {"item": "like", "verb": "add", "user_id": 464286700625684}}], "id": "1325585957467268", "time": 1481734882}], "object": "page"}', '{"lead":[],"respnse":{"error":{"message":"Error validating access token: Session has expired on Sunday, 11-Dec-16 23:21:45 PST. The current time is Wednesday, 14-Dec-16 09:01:28 PST.","type":"OAuthException","code":190,"error_subcode":463,"fbtrace_id":"AjGOQzHLvCJ"}}}', '', '', 0, 0, 0, 0, '', '0000-00-00 00:00:00'),
(71, '', '{"entry": [{"changes": [{"field": "feed", "value": {"item": "like", "verb": "add", "user_id": 179069835898480}}], "id": "1325585957467268", "time": 1481880721}], "object": "page"}', '{"lead":[],"respnse":{"error":{"message":"Error validating access token: Session has expired on Sunday, 11-Dec-16 23:21:45 PST. The current time is Friday, 16-Dec-16 01:32:08 PST.","type":"OAuthException","code":190,"error_subcode":463,"fbtrace_id":"HMy6PtAU7kR"}}}', '', '', 0, 0, 0, 0, '', '0000-00-00 00:00:00'),
(72, '', '{"entry": [{"changes": [{"field": "feed", "value": {"item": "like", "verb": "add", "user_id": 385481495122936}}], "id": "1325585957467268", "time": 1482332590}], "object": "page"}', '{"lead":[],"respnse":{"error":{"message":"Error validating access token: Session has expired on Sunday, 11-Dec-16 23:21:45 PST. The current time is Wednesday, 21-Dec-16 07:03:16 PST.","type":"OAuthException","code":190,"error_subcode":463,"fbtrace_id":"AF5v0yBuoSY"}}}', '', '', 0, 0, 0, 0, '', '0000-00-00 00:00:00'),
(73, '', '{"entry": [{"changes": [{"field": "feed", "value": {"item": "like", "verb": "add", "user_id": 314217392312473}}], "id": "1325585957467268", "time": 1482801240}], "object": "page"}', '{"lead":[],"respnse":{"error":{"message":"Error validating access token: Session has expired on Sunday, 11-Dec-16 23:21:45 PST. The current time is Monday, 26-Dec-16 17:14:07 PST.","type":"OAuthException","code":190,"error_subcode":463,"fbtrace_id":"Gv/u3bxVIoE"}}}', '', '', 0, 0, 0, 0, '', '0000-00-00 00:00:00'),
(74, '', '{"entry": [{"changes": [{"field": "feed", "value": {"item": "like", "verb": "add", "user_id": 353959334969503}}], "id": "1325585957467268", "time": 1482849889}], "object": "page"}', '{"lead":[],"respnse":{"error":{"message":"Error validating access token: Session has expired on Sunday, 11-Dec-16 23:21:45 PST. The current time is Tuesday, 27-Dec-16 06:44:56 PST.","type":"OAuthException","code":190,"error_subcode":463,"fbtrace_id":"HZKMJnkygYe"}}}', '', '', 0, 0, 0, 0, '', '0000-00-00 00:00:00'),
(75, '', '{"entry": [{"changes": [{"field": "feed", "value": {"item": "like", "verb": "add", "user_id": 1806248802982561}}], "id": "1325585957467268", "time": 1482936127}], "object": "page"}', '{"lead":[],"respnse":{"error":{"message":"Error validating access token: Session has expired on Sunday, 11-Dec-16 23:21:45 PST. The current time is Wednesday, 28-Dec-16 06:42:13 PST.","type":"OAuthException","code":190,"error_subcode":463,"fbtrace_id":"Am5XMRMRQxf"}}}', '', '', 0, 0, 0, 0, '', '0000-00-00 00:00:00'),
(76, '', '{"entry": [{"changes": [{"field": "leadgen", "value": {"ad_id": 0, "form_id": 668248243328181, "leadgen_id": 718238338329171, "created_time": 1483011110, "page_id": 791835064253420, "adgroup_id": 0}}], "id": "791835064253420", "time": 1483011112}], "object": "page"}', '', '', '', 0, 0, 0, 0, '', '0000-00-00 00:00:00'),
(77, '', '{"entry": [{"changes": [{"field": "leadgen", "value": {"ad_id": 0, "form_id": 668248243328181, "leadgen_id": 718238851662453, "created_time": 1483011247, "page_id": 791835064253420, "adgroup_id": 0}}], "id": "791835064253420", "time": 1483011249}], "object": "page"}', '', '', '', 0, 0, 0, 0, '', '0000-00-00 00:00:00'),
(78, '', '{"entry": [{"changes": [{"field": "leadgen", "value": {"ad_id": 0, "form_id": 668248243328181, "leadgen_id": 718242444995427, "created_time": 1483012025, "page_id": 791835064253420, "adgroup_id": 0}}], "id": "791835064253420", "time": 1483012027}], "object": "page"}', '', '', '', 0, 0, 0, 0, '', '0000-00-00 00:00:00'),
(79, '', '{"entry": [{"changes": [{"field": "leadgen", "value": {"ad_id": 0, "form_id": 668248243328181, "leadgen_id": 718244034995268, "created_time": 1483012313, "page_id": 791835064253420, "adgroup_id": 0}}], "id": "791835064253420", "time": 1483012314}], "object": "page"}', '', '', '', 0, 0, 0, 0, '', '0000-00-00 00:00:00'),
(80, '', '{"entry": [{"changes": [{"field": "leadgen", "value": {"ad_id": 0, "form_id": 668248243328181, "leadgen_id": 718244701661868, "created_time": 1483012517, "page_id": 791835064253420, "adgroup_id": 0}}], "id": "791835064253420", "time": 1483012518}], "object": "page"}', '', '', '', 0, 0, 0, 0, '', '0000-00-00 00:00:00'),
(81, '', '{"entry": [{"changes": [{"field": "leadgen", "value": {"ad_id": 0, "form_id": 668248243328181, "leadgen_id": 718245004995171, "created_time": 1483012600, "page_id": 791835064253420, "adgroup_id": 0}}], "id": "791835064253420", "time": 1483012601}], "object": "page"}', '', '', '', 0, 0, 0, 0, '', '0000-00-00 00:00:00'),
(82, '', '{"entry": [{"changes": [{"field": "leadgen", "value": {"ad_id": 0, "form_id": 668248243328181, "leadgen_id": 718245321661806, "created_time": 1483012728, "page_id": 791835064253420, "adgroup_id": 0}}], "id": "791835064253420", "time": 1483012729}], "object": "page"}', '', '', '', 0, 0, 0, 0, '', '0000-00-00 00:00:00'),
(83, '', '{"entry": [{"changes": [{"field": "leadgen", "value": {"ad_id": 0, "form_id": 668248243328181, "leadgen_id": 718246041661734, "created_time": 1483012908, "page_id": 791835064253420, "adgroup_id": 0}}], "id": "791835064253420", "time": 1483012910}], "object": "page"}', '', '', '', 0, 0, 0, 0, '', '0000-00-00 00:00:00'),
(84, '', '{"entry": [{"changes": [{"field": "leadgen", "value": {"ad_id": 0, "form_id": 668248243328181, "leadgen_id": 718247321661606, "created_time": 1483013125, "page_id": 791835064253420, "adgroup_id": 0}}], "id": "791835064253420", "time": 1483013127}], "object": "page"}', '', '', '', 0, 0, 0, 0, '', '0000-00-00 00:00:00'),
(85, '', '{"entry": [{"changes": [{"field": "leadgen", "value": {"ad_id": 0, "form_id": 1650448298580483, "leadgen_id": 1690572801234699, "created_time": 1483015585, "page_id": 791835064253420, "adgroup_id": 0}}], "id": "791835064253420", "time": 1483015586}], "object": "page"}', '', '', '', 0, 0, 0, 0, '', '0000-00-00 00:00:00'),
(86, '', '{"entry": [{"changes": [{"field": "feed", "value": {"parent_id": "1325585957467268_1334523336573530", "sender_name": "Anurag Thakur", "sender_id": 946539638809282, "item": "like", "verb": "add", "created_time": 1483066461, "post_id": "1325585957467268_1334523336573530"}}], "id": "1325585957467268", "time": 1483066461}, {"changes": [{"field": "feed", "value": {"reaction_type": "like", "parent_id": "1325585957467268_1334523336573530", "sender_id": 946539638809282, "item": "reaction", "verb": "add", "created_time": 1483066461, "post_id": "1325585957467268_1334523336573530"}}], "id": "1325585957467268", "time": 1483066461}], "object": "page"}', '{"lead":[],"respnse":{"error":{"message":"Error validating access token: Session has expired on Sunday, 11-Dec-16 23:21:45 PST. The current time is Thursday, 29-Dec-16 18:54:28 PST.","type":"OAuthException","code":190,"error_subcode":463,"fbtrace_id":"FMlpwAqG+AS"}}}', '', '', 0, 1483066461, 0, 0, '', '0000-00-00 00:00:00'),
(87, '', '{"entry": [{"changes": [{"field": "leadgen", "value": {"ad_id": 0, "form_id": 1650448298580483, "leadgen_id": 1690853811206598, "created_time": 1483079149, "page_id": 791835064253420, "adgroup_id": 0}}], "id": "791835064253420", "time": 1483079150}], "object": "page"}', '', '', '', 0, 0, 0, 0, '', '0000-00-00 00:00:00'),
(88, '', '{"entry": [{"changes": [{"field": "leadgen", "value": {"ad_id": 0, "form_id": 1650448298580483, "leadgen_id": 1690856477872998, "created_time": 1483079931, "page_id": 791835064253420, "adgroup_id": 0}}], "id": "791835064253420", "time": 1483079933}], "object": "page"}', '', '', '', 0, 0, 0, 0, '', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `ity_media_attachment`
--

CREATE TABLE `ity_media_attachment` (
  `attachmentID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `deviceID` varchar(255) NOT NULL,
  `actionID` int(11) NOT NULL COMMENT 'task ID or , GroupId, mom ID ',
  `attachementType` varchar(255) NOT NULL,
  `attachementFor` varchar(255) NOT NULL,
  `dateTime` datetime NOT NULL,
  `mediaContent` blob NOT NULL,
  `mediaURL` text NOT NULL,
  `tempAttachmentID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ity_media_attachment`
--

INSERT INTO `ity_media_attachment` (`attachmentID`, `userID`, `deviceID`, `actionID`, `attachementType`, `attachementFor`, `dateTime`, `mediaContent`, `mediaURL`, `tempAttachmentID`) VALUES
(1, 1, '356554061837833', 17, 'Image', 'Task', '2017-01-02 12:24:57', 0x616a73646b6a616b73646a6b617364, 'http://itasku.bookmyhouse.co/itaskyou/media/itasku_media/tasks/task_image/BMH-Task-83a10c724886c8ebc4bd4d3cef9bef6d.jpeg', 1),
(2, 1, '356554061837833', 17, 'Video', 'Task', '2017-01-02 12:24:57', 0x616a73646b6a616b73646a6b617364, 'http://itasku.bookmyhouse.co/itaskyou/media/itasku_media/tasks/task_video/BMH-Task-1615d881b020e175eb34b4f4c6b93c2d.Wmv', 12),
(3, 1, '356554061837833', 17, 'Documentation', 'Task', '2017-01-02 12:24:57', 0x616a73646b6a616b73646a6b617364, 'http://itasku.bookmyhouse.co/itaskyou/media/itasku_media/tasks/task_documentation/BMH-Task-afb947a6deb2f5353429875079ce01f9.pdf', 15);

-- --------------------------------------------------------

--
-- Table structure for table `ity_media_master`
--

CREATE TABLE `ity_media_master` (
  `mediaID` int(5) DEFAULT NULL,
  `mediaType` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ity_media_master`
--

INSERT INTO `ity_media_master` (`mediaID`, `mediaType`) VALUES
(0, 'Audio'),
(1, 'Video'),
(2, 'photo');

-- --------------------------------------------------------

--
-- Table structure for table `ity_packages`
--

CREATE TABLE `ity_packages` (
  `pkgID` int(11) NOT NULL,
  `users` varchar(50) NOT NULL,
  `monthlyCharge` int(11) NOT NULL,
  `annualyCharge` int(11) NOT NULL,
  `dateTime` datetime NOT NULL,
  `pkgType` enum('paid','free','self','trial') NOT NULL DEFAULT 'free'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ity_packages`
--

INSERT INTO `ity_packages` (`pkgID`, `users`, `monthlyCharge`, `annualyCharge`, `dateTime`, `pkgType`) VALUES
(1, '0-5', 0, 0, '2017-02-02 00:00:00', 'free'),
(2, '6-10', 500, 5500, '2017-02-02 00:00:00', 'paid'),
(3, '11-15', 1000, 10000, '2017-02-02 00:00:00', 'paid'),
(4, '16-25', 121, 123213, '2017-02-02 00:00:00', 'paid'),
(5, '26-50', 1234, 1244, '2017-02-02 00:00:00', 'paid');

-- --------------------------------------------------------

--
-- Table structure for table `ity_request_deadline_change`
--

CREATE TABLE `ity_request_deadline_change` (
  `requestID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `taskOrginatorID` int(11) NOT NULL,
  `taskID` int(11) NOT NULL,
  `taskDueDate` datetime NOT NULL,
  `requestedDate` datetime NOT NULL,
  `orginatorDate` datetime NOT NULL,
  `remark` text NOT NULL,
  `actionFrom` enum('reciever','orginator') NOT NULL DEFAULT 'reciever',
  `status` enum('pending','rejected','accepted','chnagedate') NOT NULL DEFAULT 'pending',
  `taskDetailJson` text NOT NULL,
  `funType` varchar(255) NOT NULL,
  `createdDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ity_request_deadline_change`
--

INSERT INTO `ity_request_deadline_change` (`requestID`, `userID`, `taskOrginatorID`, `taskID`, `taskDueDate`, `requestedDate`, `orginatorDate`, `remark`, `actionFrom`, `status`, `taskDetailJson`, `funType`, `createdDate`) VALUES
(1, 1, 1, 87, '2016-12-10 10:55:00', '2016-12-13 22:25:00', '0000-00-00 00:00:00', 'nhhbbbbb', 'reciever', 'pending', '{"taskID":"87","taskName":"Group Task1","taskDescription":"group task detail...","allotmentDate":"2016-12-07 00:00:00","revisedDate":null,"dueDate":"2016-12-10 10:55:00","taskType":null,"orginatorID":"1","recieverID":"2","ccID":"3,4","firstName":"mohammad","lastName":"asif","emailID":"asif@bookmyhouse.com","contactNo":"9873878430","countryPhoneCode":"91","funType":"Group","statusText":"completed","userPhoto":"http:\\/\\/3.bp.blogspot.com\\/-19GVoMdwoFo\\/Vj1Ccmi6MCI\\/AAAAAAAADL0\\/5Cz-PeAdGIQ\\/s640\\/Anonymous-facbook-profile-picture.jpg","taskTags":["tags200","tag201"],"receiverData":{"receiverCount":1,"receiverList":[{"userID":"2","firstName":"Shruti","lastName":"Bansal","status":"1","emailID":"bansalshruti489@gmail.com","industryType":"IT","subIndustryTypeID":"Software","countryPhoneCode":"91","contactNo":"9988296115","userPhoto":"http:\\/\\/itasku.bookmyhouse.co\\/itaskyou\\/media\\/apiusers\\/profile\\/1481612286.png"}]},"followingData":{"followingCount":2,"followingList":[{"userID":"3","firstName":"Sudhanshu","lastName":"Kumar","status":"1","emailID":"sudhanshu@bookmyhouse.com","industryType":"IT","subIndustryTypeID":"Software","countryPhoneCode":"91","contactNo":"989897979","userPhoto":"http:\\/\\/bookmyhouse.com\\/media\\/testimonial\\/20160808113235879846844.jpg"},{"userID":"4","firstName":"Aakash","lastName":"Goel","status":"1","emailID":"aakash@bookmyhouse.com","industryType":"IT","subIndustryTypeID":null,"countryPhoneCode":"91","contactNo":"9867543212","userPhoto":"http:\\/\\/bookmyhouse.com\\/media\\/testimonial\\/201608081140581656942057.jpg"}]}}', 'Group', '2016-12-13 00:00:00'),
(2, 1, 1, 87, '2016-12-10 10:55:00', '2016-12-13 22:36:00', '0000-00-00 00:00:00', 'gihupgupbpi', 'reciever', 'pending', '{"taskID":"87","taskName":"Group Task1","taskDescription":"group task detail...","allotmentDate":"2016-12-07 00:00:00","revisedDate":null,"dueDate":"2016-12-10 10:55:00","taskType":null,"orginatorID":"1","recieverID":"2","ccID":"3,4","firstName":"mohammad","lastName":"asif","emailID":"asif@bookmyhouse.com","contactNo":"9873878430","countryPhoneCode":"91","funType":"Group","statusText":"completed","userPhoto":"http:\\/\\/3.bp.blogspot.com\\/-19GVoMdwoFo\\/Vj1Ccmi6MCI\\/AAAAAAAADL0\\/5Cz-PeAdGIQ\\/s640\\/Anonymous-facbook-profile-picture.jpg","taskTags":["tags200","tag201"],"receiverData":{"receiverCount":1,"receiverList":[{"userID":"2","firstName":"Shruti","lastName":"Bansal","status":"1","emailID":"bansalshruti489@gmail.com","industryType":"IT","subIndustryTypeID":"Software","countryPhoneCode":"91","contactNo":"9988296115","userPhoto":"http:\\/\\/itasku.bookmyhouse.co\\/itaskyou\\/media\\/apiusers\\/profile\\/1481612286.png"}]},"followingData":{"followingCount":2,"followingList":[{"userID":"3","firstName":"Sudhanshu","lastName":"Kumar","status":"1","emailID":"sudhanshu@bookmyhouse.com","industryType":"IT","subIndustryTypeID":"Software","countryPhoneCode":"91","contactNo":"989897979","userPhoto":"http:\\/\\/bookmyhouse.com\\/media\\/testimonial\\/20160808113235879846844.jpg"},{"userID":"4","firstName":"Aakash","lastName":"Goel","status":"1","emailID":"aakash@bookmyhouse.com","industryType":"IT","subIndustryTypeID":null,"countryPhoneCode":"91","contactNo":"9867543212","userPhoto":"http:\\/\\/bookmyhouse.com\\/media\\/testimonial\\/201608081140581656942057.jpg"}]}}', 'Group', '2016-12-13 00:00:00'),
(3, 1, 1, 87, '2016-12-10 10:55:00', '2016-12-15 12:43:00', '0000-00-00 00:00:00', 'gggggg', 'reciever', 'pending', '{"taskID":"87","taskName":"Group Task1","taskDescription":"group task detail...","allotmentDate":"2016-12-07 00:00:00","revisedDate":null,"dueDate":"2016-12-10 10:55:00","taskType":null,"orginatorID":"1","recieverID":"2","ccID":"3,4","firstName":"mohammad","lastName":"asif","emailID":"asif@bookmyhouse.com","contactNo":"9873878430","countryPhoneCode":"91","funType":"Group","statusText":"completed","userPhoto":"http:\\/\\/3.bp.blogspot.com\\/-19GVoMdwoFo\\/Vj1Ccmi6MCI\\/AAAAAAAADL0\\/5Cz-PeAdGIQ\\/s640\\/Anonymous-facbook-profile-picture.jpg","taskTags":["tags200","tag201"],"receiverData":{"receiverCount":1,"receiverList":[{"userID":"2","firstName":"Shruti","lastName":"Bansal","status":"1","emailID":"bansalshruti489@gmail.com","industryType":"IT","subIndustryTypeID":"Software","countryPhoneCode":"91","contactNo":"9988296115","userPhoto":"http:\\/\\/itasku.bookmyhouse.co\\/itaskyou\\/media\\/apiusers\\/profile\\/1481612286.png"}]},"followingData":{"followingCount":2,"followingList":[{"userID":"3","firstName":"Sudhanshu","lastName":"Kumar","status":"1","emailID":"sudhanshu@bookmyhouse.com","industryType":"IT","subIndustryTypeID":"Software","countryPhoneCode":"91","contactNo":"989897979","userPhoto":"http:\\/\\/bookmyhouse.com\\/media\\/testimonial\\/20160808113235879846844.jpg"},{"userID":"4","firstName":"Aakash","lastName":"Goel","status":"1","emailID":"aakash@bookmyhouse.com","industryType":"IT","subIndustryTypeID":null,"countryPhoneCode":"91","contactNo":"9867543212","userPhoto":"http:\\/\\/bookmyhouse.com\\/media\\/testimonial\\/201608081140581656942057.jpg"}]}}', 'Group', '2016-12-15 00:00:00'),
(4, 1, 1, 87, '2016-12-10 10:55:00', '2016-12-15 20:42:00', '0000-00-00 00:00:00', 'cfdddddddd', 'reciever', 'pending', '{"taskID":"87","taskName":"Group Task1","taskDescription":"group task detail...","allotmentDate":"2016-12-07 00:00:00","revisedDate":null,"dueDate":"2016-12-10 10:55:00","taskType":null,"orginatorID":"1","recieverID":"2","ccID":"3,4","firstName":"mohammad","lastName":"asif","emailID":"asif@bookmyhouse.com","contactNo":"9873878430","countryPhoneCode":"91","funType":"Group","statusText":"completed","userPhoto":"http:\\/\\/3.bp.blogspot.com\\/-19GVoMdwoFo\\/Vj1Ccmi6MCI\\/AAAAAAAADL0\\/5Cz-PeAdGIQ\\/s640\\/Anonymous-facbook-profile-picture.jpg","taskTags":["tags200","tag201"],"receiverData":{"receiverCount":1,"receiverList":[{"userID":"2","firstName":"Shruti","lastName":"Bansal","status":"1","emailID":"bansalshruti489@gmail.com","industryType":"IT","subIndustryTypeID":"Software","countryPhoneCode":"91","contactNo":"9988296115","userPhoto":"http:\\/\\/itasku.bookmyhouse.co\\/itaskyou\\/media\\/apiusers\\/profile\\/1481612286.png"}]},"followingData":{"followingCount":2,"followingList":[{"userID":"3","firstName":"Sudhanshu","lastName":"Kumar","status":"1","emailID":"sudhanshu@bookmyhouse.com","industryType":"IT","subIndustryTypeID":"Software","countryPhoneCode":"91","contactNo":"989897979","userPhoto":"http:\\/\\/bookmyhouse.com\\/media\\/testimonial\\/20160808113235879846844.jpg"},{"userID":"4","firstName":"Aakash","lastName":"Goel","status":"1","emailID":"aakash@bookmyhouse.com","industryType":"IT","subIndustryTypeID":null,"countryPhoneCode":"91","contactNo":"9867543212","userPhoto":"http:\\/\\/bookmyhouse.com\\/media\\/testimonial\\/201608081140581656942057.jpg"}]}}', 'Group', '2016-12-15 00:00:00'),
(5, 2, 2, 104, '2016-12-16 15:25:00', '2016-12-16 15:00:00', '0000-00-00 00:00:00', 'dddf', 'reciever', 'pending', '{"taskID":"104","taskName":"test new","taskDescription":"hdjjdkfkkfk HD jdjdj","allotmentDate":"2016-12-16 15:23:48","revisedDate":null,"dueDate":"2016-12-16 15:25:00","taskType":null,"orginatorID":"2","recieverID":"91,92,1,","ccID":"1,","firstName":"Shruti","lastName":"Bansal","emailID":"bansalshruti489@gmail.com","contactNo":"9988296115","countryPhoneCode":"91","funType":"Team","statusText":"declined","userPhoto":"http:\\/\\/itasku.bookmyhouse.co\\/itaskyou\\/media\\/apiusers\\/profile\\/1481612286.png","taskTags":["tag"],"receiverData":{"receiverCount":3,"receiverList":[{"userID":"1","firstName":"mohammad","lastName":"asif","status":"1","emailID":"asif@bookmyhouse.com","industryType":"IT","subIndustryTypeID":"Software","countryPhoneCode":"91","contactNo":"9873878430","userPhoto":"http:\\/\\/3.bp.blogspot.com\\/-19GVoMdwoFo\\/Vj1Ccmi6MCI\\/AAAAAAAADL0\\/5Cz-PeAdGIQ\\/s640\\/Anonymous-facbook-profile-picture.jpg"},{"userID":"91","firstName":"Paras","lastName":"Gupta","status":"1","emailID":"paras@bookmyhouse.com","industryType":"IT","subIndustryTypeID":"Software","countryPhoneCode":"91","contactNo":"9599789927","userPhoto":"http:\\/\\/itasku.bookmyhouse.co\\/itaskyou\\/media\\/apiusers\\/profile\\/1481879230.png"},{"userID":"92","firstName":"Sudhanshu","lastName":"Kumar","status":"1","emailID":"sudhanshu@bookmyhouse.com","industryType":"IT","subIndustryTypeID":"Software","countryPhoneCode":"91","contactNo":"9599789984","userPhoto":"http:\\/\\/itasku.bookmyhouse.co\\/itaskyou\\/media\\/apiusers\\/profile\\/1481880396.png"}]},"followingData":{"followingCount":1,"followingList":[{"userID":"1","firstName":"mohammad","lastName":"asif","status":"1","emailID":"asif@bookmyhouse.com","industryType":"IT","subIndustryTypeID":"Software","countryPhoneCode":"91","contactNo":"9873878430","userPhoto":"http:\\/\\/3.bp.blogspot.com\\/-19GVoMdwoFo\\/Vj1Ccmi6MCI\\/AAAAAAAADL0\\/5Cz-PeAdGIQ\\/s640\\/Anonymous-facbook-profile-picture.jpg"}]}}', 'Team', '2016-12-16 00:00:00'),
(6, 2, 2, 114, '2016-12-17 01:29:00', '2017-12-06 18:30:00', '0000-00-00 00:00:00', '   %##$$', 'reciever', 'pending', '{"taskID":"114","taskName":"Buy two Apple","taskDescription":"hey Sidhanshu, please buy two apple.","allotmentDate":"2016-12-16 18:29:39","revisedDate":null,"dueDate":"2016-12-17 01:29:00","taskType":null,"orginatorID":"2","recieverID":"92,","ccID":"16,","firstName":"Shruti","lastName":"Bansal","emailID":"bansalshruti489@gmail.com","contactNo":"9988296115","countryPhoneCode":"91","funType":"Individual","statusText":"pending","userPhoto":"http:\\/\\/itasku.bookmyhouse.co\\/itaskyou\\/media\\/apiusers\\/profile\\/1481612286.png","taskTags":["apple"],"receiverData":{"receiverCount":1,"receiverList":[{"userID":"92","firstName":"Sudhanshu","lastName":"Kumar","status":"1","emailID":"sudhanshu@bookmyhouse.com","industryType":"IT","subIndustryTypeID":"Software","countryPhoneCode":"91","contactNo":"9599789984","userPhoto":"http:\\/\\/itasku.bookmyhouse.co\\/itaskyou\\/media\\/apiusers\\/profile\\/1481880396.png"}]},"followingData":{"followingCount":1,"followingList":[{"userID":"16","firstName":"Aakash","lastName":"Goel","status":"1","emailID":"aakash@bookmyhouse.com","industryType":"IT","subIndustryTypeID":null,"countryPhoneCode":"91","contactNo":"9599789982","userPhoto":"http:\\/\\/bookmyhouse.com\\/media\\/testimonial\\/201608081140581656942057.jpg"}]}}', 'Individual', '2016-12-16 00:00:00'),
(7, 2, 2, 115, '2016-12-23 16:32:00', '2018-01-11 18:34:00', '0000-00-00 00:00:00', 'apni mar,zi', 'reciever', 'pending', '{"taskID":"115","taskName":"buy flat","taskDescription":"this is a test","allotmentDate":"2016-12-16 18:33:12","revisedDate":null,"dueDate":"2016-12-23 16:32:00","taskType":null,"orginatorID":"2","recieverID":"92,","ccID":"","firstName":"Shruti","lastName":"Bansal","emailID":"bansalshruti489@gmail.com","contactNo":"9988296115","countryPhoneCode":"91","funType":"Individual","statusText":"pending","userPhoto":"http:\\/\\/itasku.bookmyhouse.co\\/itaskyou\\/media\\/apiusers\\/profile\\/1481612286.png","taskTags":["sales"],"receiverData":{"receiverCount":1,"receiverList":[{"userID":"92","firstName":"Sudhanshu","lastName":"Kumar","status":"1","emailID":"sudhanshu@bookmyhouse.com","industryType":"IT","subIndustryTypeID":"Software","countryPhoneCode":"91","contactNo":"9599789984","userPhoto":"http:\\/\\/itasku.bookmyhouse.co\\/itaskyou\\/media\\/apiusers\\/profile\\/1481880396.png"}]}}', 'Individual', '2016-12-16 00:00:00'),
(8, 1, 1, 69, '2016-12-30 14:45:00', '2016-12-29 14:49:00', '0000-00-00 00:00:00', 'gghhh', 'reciever', 'pending', '{"taskID":"69","taskName":"yyybbbb","taskDescription":"this is the notification test","allotmentDate":"2016-12-29 14:42:25","revisedDate":null,"dueDate":"2016-12-30 14:45:00","taskType":null,"orginatorID":"1","recieverID":"97,96,2","ccID":"97,1,","firstName":"mohd","lastName":"asif","emailID":"asif@bookmyhouse.com","contactNo":"9873878430","countryPhoneCode":"91","funType":"Team","statusText":"completed","userPhoto":"http:\\/\\/itasku.bookmyhouse.co\\/itaskyou\\/\\/assets\\/images\\/default_avatar.png","taskTags":["ggg"," ggg"," ggh"],"receiverData":{"receiverCount":3,"receiverList":[{"userID":"2","firstName":"Shruti","lastName":"Bansal","status":"1","emailID":"bansalshruti489@gmail.com","industryType":"IT","subIndustryTypeID":"Software","countryPhoneCode":"91","contactNo":"9988296115","userPhoto":"http:\\/\\/itasku.bookmyhouse.co\\/itaskyou\\/media\\/apiusers\\/profile\\/1482998041.png"},{"userID":"96","firstName":"sudhanshu","lastName":"ku","status":"1","emailID":"Sidhanshu.soft@gmail.com","industryType":"IT","subIndustryTypeID":"Software","countryPhoneCode":"91","contactNo":"9958585406","userPhoto":"http:\\/\\/itasku.bookmyhouse.co\\/itaskyou\\/\\/assets\\/images\\/default_avatar.png"},{"userID":"97","firstName":"mohammad","lastName":"rashid","status":"1","emailID":"rashid@gmail.com","industryType":"IT","subIndustryTypeID":null,"countryPhoneCode":"91","contactNo":"9711022886","userPhoto":"http:\\/\\/itasku.bookmyhouse.co\\/itaskyou\\/media\\/apiusers\\/profile\\/1482426334.png"}]},"followingData":{"followingCount":2,"followingList":[{"userID":"1","firstName":"mohd","lastName":"asif","status":"1","emailID":"asif@bookmyhouse.com","industryType":"IT","subIndustryTypeID":null,"countryPhoneCode":"91","contactNo":"9873878430","userPhoto":"http:\\/\\/itasku.bookmyhouse.co\\/itaskyou\\/\\/assets\\/images\\/default_avatar.png"},{"userID":"97","firstName":"mohammad","lastName":"rashid","status":"1","emailID":"rashid@gmail.com","industryType":"IT","subIndustryTypeID":null,"countryPhoneCode":"91","contactNo":"9711022886","userPhoto":"http:\\/\\/itasku.bookmyhouse.co\\/itaskyou\\/media\\/apiusers\\/profile\\/1482426334.png"}]}}', 'Team', '2016-12-29 00:00:00'),
(9, 1, 1, 69, '2016-12-29 15:00:00', '2016-12-29 15:20:00', '0000-00-00 00:00:00', 'duzyYfz', 'reciever', 'pending', '{"taskID":"69","taskName":"yyybbbb","taskDescription":"this is the notification test","allotmentDate":"2016-12-29 14:42:25","revisedDate":null,"dueDate":"2016-12-29 15:00:00","taskType":null,"orginatorID":"1","recieverID":"17,16,97,96,2","ccID":"96,97,1,","firstName":"mohd","lastName":"asif","emailID":"asif@bookmyhouse.com","contactNo":"9873878430","countryPhoneCode":"91","funType":"Team","statusText":"completed","userPhoto":"http:\\/\\/itasku.bookmyhouse.co\\/itaskyou\\/\\/assets\\/images\\/default_avatar.png","taskTags":["ggg"," ggg"," ggh"],"receiverData":{"receiverCount":5,"receiverList":[{"userID":"2","firstName":"Shruti","lastName":"Bansal","status":"1","emailID":"bansalshruti489@gmail.com","industryType":"IT","subIndustryTypeID":"Software","countryPhoneCode":"91","contactNo":"9988296115","userPhoto":"http:\\/\\/itasku.bookmyhouse.co\\/itaskyou\\/media\\/apiusers\\/profile\\/1482998041.png"},{"userID":"16","firstName":"Aakash","lastName":"Goel","status":"1","emailID":"aakash@bookmyhouse.com","industryType":"IT","subIndustryTypeID":"Software","countryPhoneCode":"91","contactNo":"9599789982","userPhoto":"http:\\/\\/itasku.bookmyhouse.co\\/itaskyou\\/\\/assets\\/images\\/default_avatar.png"},{"userID":"17","firstName":"Abhishek","lastName":"Srivastava","status":"1","emailID":"abhishek.srivastava@bookmyhouse.com","industryType":"IT","subIndustryTypeID":null,"countryPhoneCode":"0","contactNo":"9599789981","userPhoto":"http:\\/\\/www.virtuzo.in\\/assets\\/img\\/ab.png"},{"userID":"96","firstName":"sudhanshu","lastName":"ku","status":"1","emailID":"Sidhanshu.soft@gmail.com","industryType":"IT","subIndustryTypeID":"Software","countryPhoneCode":"91","contactNo":"9958585406","userPhoto":"http:\\/\\/itasku.bookmyhouse.co\\/itaskyou\\/\\/assets\\/images\\/default_avatar.png"},{"userID":"97","firstName":"mohammad","lastName":"rashid","status":"1","emailID":"rashid@gmail.com","industryType":"IT","subIndustryTypeID":null,"countryPhoneCode":"91","contactNo":"9711022886","userPhoto":"http:\\/\\/itasku.bookmyhouse.co\\/itaskyou\\/media\\/apiusers\\/profile\\/1482426334.png"}]},"followingData":{"followingCount":3,"followingList":[{"userID":"1","firstName":"mohd","lastName":"asif","status":"1","emailID":"asif@bookmyhouse.com","industryType":"IT","subIndustryTypeID":null,"countryPhoneCode":"91","contactNo":"9873878430","userPhoto":"http:\\/\\/itasku.bookmyhouse.co\\/itaskyou\\/\\/assets\\/images\\/default_avatar.png"},{"userID":"96","firstName":"sudhanshu","lastName":"ku","status":"1","emailID":"Sidhanshu.soft@gmail.com","industryType":"IT","subIndustryTypeID":"Software","countryPhoneCode":"91","contactNo":"9958585406","userPhoto":"http:\\/\\/itasku.bookmyhouse.co\\/itaskyou\\/\\/assets\\/images\\/default_avatar.png"},{"userID":"97","firstName":"mohammad","lastName":"rashid","status":"1","emailID":"rashid@gmail.com","industryType":"IT","subIndustryTypeID":null,"countryPhoneCode":"91","contactNo":"9711022886","userPhoto":"http:\\/\\/itasku.bookmyhouse.co\\/itaskyou\\/media\\/apiusers\\/profile\\/1482426334.png"}]}}', 'Team', '2016-12-29 00:00:00'),
(10, 126, 126, 49, '2017-12-27 14:50:00', '2018-12-12 08:05:00', '0000-00-00 00:00:00', 'frf', 'reciever', 'pending', '{"taskID":"49","taskName":"self","taskDescription":"zhfZfjxkgx","allotmentDate":"2016-12-27 14:51:17","revisedDate":null,"dueDate":"2017-12-27 14:50:00","taskType":null,"orginatorID":"126","recieverID":"2,","ccID":"2,16,","firstName":"Jio","lastName":"Sim","emailID":"jiosim@gmail.com","contactNo":"8700307839","countryPhoneCode":"91","funType":"Individual","statusText":"pending","userPhoto":"http:\\/\\/itasku.bookmyhouse.co\\/itaskyou\\/media\\/apiusers\\/profile\\/1482816800.png","taskTags":["iii"],"receiverData":{"receiverCount":1,"receiverList":[{"userID":"2","firstName":"Shruti","lastName":"Bansal","status":"1","emailID":"bansalshruti489@gmail.com","industryType":"IT","subIndustryTypeID":"Software","countryPhoneCode":"91","contactNo":"9988296115","userPhoto":"http:\\/\\/itasku.bookmyhouse.co\\/itaskyou\\/media\\/apiusers\\/profile\\/1483008168.png"}]},"followingData":{"followingCount":2,"followingList":[{"userID":"2","firstName":"Shruti","lastName":"Bansal","status":"1","emailID":"bansalshruti489@gmail.com","industryType":"IT","subIndustryTypeID":"Software","countryPhoneCode":"91","contactNo":"9988296115","userPhoto":"http:\\/\\/itasku.bookmyhouse.co\\/itaskyou\\/media\\/apiusers\\/profile\\/1483008168.png"},{"userID":"16","firstName":"Aakash","lastName":"Goel","status":"1","emailID":"aakash@bookmyhouse.com","industryType":"IT","subIndustryTypeID":"Software","countryPhoneCode":"91","contactNo":"9599789982","userPhoto":"http:\\/\\/itasku.bookmyhouse.co\\/itaskyou\\/\\/assets\\/images\\/default_avatar.png"}]}}', 'Individual', '2016-12-31 00:00:00'),
(11, 126, 126, 49, '2017-12-27 14:50:00', '2017-12-20 08:06:00', '0000-00-00 00:00:00', 'xd', 'reciever', 'pending', '{"taskID":"49","taskName":"self","taskDescription":"zhfZfjxkgx","allotmentDate":"2016-12-27 14:51:17","revisedDate":null,"dueDate":"2017-12-27 14:50:00","taskType":null,"orginatorID":"126","recieverID":"2,","ccID":"2,16,","firstName":"Jio","lastName":"Sim","emailID":"jiosim@gmail.com","contactNo":"8700307839","countryPhoneCode":"91","funType":"Individual","statusText":"pending","userPhoto":"http:\\/\\/itasku.bookmyhouse.co\\/itaskyou\\/media\\/apiusers\\/profile\\/1482816800.png","taskTags":["iii"],"receiverData":{"receiverCount":1,"receiverList":[{"userID":"2","firstName":"Shruti","lastName":"Bansal","status":"1","emailID":"bansalshruti489@gmail.com","industryType":"IT","subIndustryTypeID":"Software","countryPhoneCode":"91","contactNo":"9988296115","userPhoto":"http:\\/\\/itasku.bookmyhouse.co\\/itaskyou\\/media\\/apiusers\\/profile\\/1483008168.png"}]},"followingData":{"followingCount":2,"followingList":[{"userID":"2","firstName":"Shruti","lastName":"Bansal","status":"1","emailID":"bansalshruti489@gmail.com","industryType":"IT","subIndustryTypeID":"Software","countryPhoneCode":"91","contactNo":"9988296115","userPhoto":"http:\\/\\/itasku.bookmyhouse.co\\/itaskyou\\/media\\/apiusers\\/profile\\/1483008168.png"},{"userID":"16","firstName":"Aakash","lastName":"Goel","status":"1","emailID":"aakash@bookmyhouse.com","industryType":"IT","subIndustryTypeID":"Software","countryPhoneCode":"91","contactNo":"9599789982","userPhoto":"http:\\/\\/itasku.bookmyhouse.co\\/itaskyou\\/\\/assets\\/images\\/default_avatar.png"}]}}', 'Individual', '2016-12-31 00:00:00'),
(12, 1, 1, 17, '2017-01-02 12:47:00', '2020-01-02 17:14:00', '0000-00-00 00:00:00', 'gggggggg\n', 'reciever', 'pending', '{"taskID":"17","taskName":"test","taskDescription":"gggb","allotmentDate":"2017-01-02 12:47:20","revisedDate":null,"dueDate":"2017-01-02 12:47:00","taskType":null,"orginatorID":"1","recieverID":"129,1,2","ccID":"129,1,","firstName":"mohd","lastName":"asif","emailID":"asif@bookmyhouse.com","contactNo":"9873878430","countryPhoneCode":"91","funType":"Team","statusText":"pending","userPhoto":"http:\\/\\/itasku.bookmyhouse.co\\/itaskyou\\/\\/media\\/apiusers\\/profile\\/1483175203.png","taskTags":["ddd"],"receiverData":{"receiverCount":3,"receiverList":[{"userID":"1","firstName":"mohd","lastName":"asif","status":"1","emailID":"asif@bookmyhouse.com","industryType":"IT","subIndustryTypeID":null,"countryPhoneCode":"91","contactNo":"9873878430","userPhoto":"http:\\/\\/itasku.bookmyhouse.co\\/itaskyou\\/\\/media\\/apiusers\\/profile\\/1483175203.png"},{"userID":"2","firstName":"Shruti","lastName":"Bansal","status":"1","emailID":"bansalshruti489@gmail.com","industryType":"IT","subIndustryTypeID":"Software","countryPhoneCode":"91","contactNo":"9988296115","userPhoto":"http:\\/\\/itasku.bookmyhouse.co\\/itaskyou\\/\\/media\\/apiusers\\/profile\\/1483357314.png"},{"userID":"129","firstName":"mohammad","lastName":"rashid","status":"1","emailID":"rashid@gmail.com","industryType":"IT","subIndustryTypeID":null,"countryPhoneCode":"91","contactNo":"9711022886","userPhoto":"http:\\/\\/itasku.bookmyhouse.co\\/itaskyou\\/\\/media\\/apiusers\\/profile\\/1483227133.png"}]},"followingData":{"followingCount":2,"followingList":[{"userID":"1","firstName":"mohd","lastName":"asif","status":"1","emailID":"asif@bookmyhouse.com","industryType":"IT","subIndustryTypeID":null,"countryPhoneCode":"91","contactNo":"9873878430","userPhoto":"http:\\/\\/itasku.bookmyhouse.co\\/itaskyou\\/\\/media\\/apiusers\\/profile\\/1483175203.png"},{"userID":"129","firstName":"mohammad","lastName":"rashid","status":"1","emailID":"rashid@gmail.com","industryType":"IT","subIndustryTypeID":null,"countryPhoneCode":"91","contactNo":"9711022886","userPhoto":"http:\\/\\/itasku.bookmyhouse.co\\/itaskyou\\/\\/media\\/apiusers\\/profile\\/1483227133.png"}]}}', 'Team', '2017-01-02 00:00:00'),
(13, 128, 128, 26, '2017-01-05 03:01:00', '2017-01-04 11:58:00', '0000-00-00 00:00:00', 'xjxnxnxn', 'reciever', 'pending', '{"taskID":"26","taskName":"test 15","taskDescription":"sjksh","allotmentDate":"2017-01-04 03:02:18","revisedDate":null,"dueDate":"2017-01-05 03:01:00","taskType":null,"orginatorID":"128","recieverID":"2,138","ccID":"1,","firstName":"Aakash","lastName":"Goel","emailID":"aakash@bookmyhouse.com","contactNo":"9599789982","countryPhoneCode":"91","funType":"Team","statusText":"pending","userPhoto":"http:\\/\\/itasku.bookmyhouse.co\\/itaskyou\\/\\/assets\\/images\\/default_avatar.png","taskTags":["multimedia"],"receiverData":{"receiverCount":2,"receiverList":[{"userID":"2","firstName":"Shruti","lastName":"Bansal","status":"1","emailID":"bansalshruti489@gmail.com","industryType":"IT","subIndustryTypeID":"Software","countryPhoneCode":"91","contactNo":"9988296115","userPhoto":"http:\\/\\/itasku.bookmyhouse.co\\/itaskyou\\/\\/media\\/apiusers\\/profile\\/1483357314.png"},{"userID":"138","firstName":"test","lastName":"test","status":"1","emailID":"paras@bookmyhouse.com","industryType":"IT","subIndustryTypeID":null,"countryPhoneCode":"91","contactNo":"9599789927","userPhoto":"http:\\/\\/itasku.bookmyhouse.co\\/itaskyou\\/\\/assets\\/images\\/default_avatar.png"}]},"followingData":{"followingCount":1,"followingList":[{"userID":"1","firstName":"mohd","lastName":"asif","status":"1","emailID":"asif@bookmyhouse.com","industryType":"IT","subIndustryTypeID":null,"countryPhoneCode":"91","contactNo":"9873878430","userPhoto":"http:\\/\\/itasku.bookmyhouse.co\\/itaskyou\\/\\/media\\/apiusers\\/profile\\/1483358058.png"}]}}', 'Team', '2017-01-04 00:00:00'),
(14, 2, 2, 30, '2017-01-04 23:47:00', '2017-01-05 06:25:00', '0000-00-00 00:00:00', 'yujb', 'reciever', 'pending', '{"taskID":"30","taskName":"name change","taskDescription":"iydidznzxnxbx x","allotmentDate":"2017-01-04 22:26:20","revisedDate":null,"dueDate":"2017-01-04 23:47:00","taskType":null,"orginatorID":"2","recieverID":"1,138,128,2","ccID":"128,2,","firstName":"Shruti","lastName":"Bansal","emailID":"bansalshruti489@gmail.com","contactNo":"9988296115","countryPhoneCode":"91","funType":"Team","statusText":"deleted","userPhoto":"http:\\/\\/itasku.bookmyhouse.co\\/itaskyou\\/\\/media\\/apiusers\\/profile\\/1483549490.png","taskTags":["hdh"],"receiverData":{"receiverCount":4,"receiverList":[{"userID":"1","firstName":"mohd","lastName":"asif","status":"1","emailID":"asif@bookmyhouse.com","industryType":"IT","subIndustryTypeID":null,"countryPhoneCode":"91","contactNo":"9873878430","userPhoto":"http:\\/\\/itasku.bookmyhouse.co\\/itaskyou\\/\\/media\\/apiusers\\/profile\\/1483358058.png"},{"userID":"2","firstName":"Shruti","lastName":"Bansal","status":"1","emailID":"bansalshruti489@gmail.com","industryType":"IT","subIndustryTypeID":"Software","countryPhoneCode":"91","contactNo":"9988296115","userPhoto":"http:\\/\\/itasku.bookmyhouse.co\\/itaskyou\\/\\/media\\/apiusers\\/profile\\/1483549490.png"},{"userID":"128","firstName":"Aakash","lastName":"Goel","status":"1","emailID":"aakash@bookmyhouse.com","industryType":"IT","subIndustryTypeID":"Services","countryPhoneCode":"91","contactNo":"9599789982","userPhoto":"http:\\/\\/itasku.bookmyhouse.co\\/itaskyou\\/\\/assets\\/images\\/default_avatar.png"},{"userID":"138","firstName":"test","lastName":"test","status":"1","emailID":"paras@bookmyhouse.com","industryType":"IT","subIndustryTypeID":null,"countryPhoneCode":"91","contactNo":"9599789927","userPhoto":"http:\\/\\/itasku.bookmyhouse.co\\/itaskyou\\/\\/assets\\/images\\/default_avatar.png"}]},"followingData":{"followingCount":2,"followingList":[{"userID":"2","firstName":"Shruti","lastName":"Bansal","status":"1","emailID":"bansalshruti489@gmail.com","industryType":"IT","subIndustryTypeID":"Software","countryPhoneCode":"91","contactNo":"9988296115","userPhoto":"http:\\/\\/itasku.bookmyhouse.co\\/itaskyou\\/\\/media\\/apiusers\\/profile\\/1483549490.png"},{"userID":"128","firstName":"Aakash","lastName":"Goel","status":"1","emailID":"aakash@bookmyhouse.com","industryType":"IT","subIndustryTypeID":"Services","countryPhoneCode":"91","contactNo":"9599789982","userPhoto":"http:\\/\\/itasku.bookmyhouse.co\\/itaskyou\\/\\/assets\\/images\\/default_avatar.png"}]}}', 'Team', '2017-01-05 00:00:00'),
(15, 1, 1, 29, '2017-01-04 05:50:00', '2017-01-05 11:05:00', '0000-00-00 00:00:00', 'ffff', 'reciever', 'pending', '{"taskID":"29","taskName":"test","taskDescription":"this is the test","allotmentDate":"2017-01-04 05:52:48","revisedDate":null,"dueDate":"2017-01-04 05:50:00","taskType":null,"orginatorID":"1","recieverID":"2,129,128","ccID":"1,2","firstName":"mohd","lastName":"asif","emailID":"asif@bookmyhouse.com","contactNo":"9873878430","countryPhoneCode":"91","funType":"Team","statusText":"closed","userPhoto":"http:\\/\\/itasku.bookmyhouse.co\\/itaskyou\\/\\/media\\/apiusers\\/profile\\/1483358058.png","taskTags":["yyucjc"," vncb"],"receiverData":{"receiverCount":3,"receiverList":[{"userID":"2","firstName":"Shruti","lastName":"Bansal","status":"1","emailID":"bansalshruti489@gmail.com","industryType":"IT","subIndustryTypeID":"Software","countryPhoneCode":"91","contactNo":"9988296115","userPhoto":"http:\\/\\/itasku.bookmyhouse.co\\/itaskyou\\/\\/media\\/apiusers\\/profile\\/1483549490.png"},{"userID":"128","firstName":"Aakash","lastName":"Goel","status":"1","emailID":"aakash@bookmyhouse.com","industryType":"IT","subIndustryTypeID":"Services","countryPhoneCode":"91","contactNo":"9599789982","userPhoto":"http:\\/\\/itasku.bookmyhouse.co\\/itaskyou\\/\\/assets\\/images\\/default_avatar.png"},{"userID":"129","firstName":"mohammad","lastName":"rashid","status":"1","emailID":"rashid@gmail.com","industryType":"IT","subIndustryTypeID":null,"countryPhoneCode":"91","contactNo":"9711022886","userPhoto":"http:\\/\\/itasku.bookmyhouse.co\\/itaskyou\\/\\/media\\/apiusers\\/profile\\/1483227133.png"}]},"followingData":{"followingCount":2,"followingList":[{"userID":"1","firstName":"mohd","lastName":"asif","status":"1","emailID":"asif@bookmyhouse.com","industryType":"IT","subIndustryTypeID":null,"countryPhoneCode":"91","contactNo":"9873878430","userPhoto":"http:\\/\\/itasku.bookmyhouse.co\\/itaskyou\\/\\/media\\/apiusers\\/profile\\/1483358058.png"},{"userID":"2","firstName":"Shruti","lastName":"Bansal","status":"1","emailID":"bansalshruti489@gmail.com","industryType":"IT","subIndustryTypeID":"Software","countryPhoneCode":"91","contactNo":"9988296115","userPhoto":"http:\\/\\/itasku.bookmyhouse.co\\/itaskyou\\/\\/media\\/apiusers\\/profile\\/1483549490.png"}]}}', 'Team', '2017-01-05 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `ity_task_status_master`
--

CREATE TABLE `ity_task_status_master` (
  `statusText` varchar(255) DEFAULT NULL,
  `taskStatus` int(5) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ity_task_status_master`
--

INSERT INTO `ity_task_status_master` (`statusText`, `taskStatus`, `id`) VALUES
('Pending', 0, 1),
('Declined', 1, 2),
('Priority', 2, 3),
('Overdue', 3, 4),
('Completed', 4, 5),
('Deleted', 5, 6),
('Closed', 6, 7);

-- --------------------------------------------------------

--
-- Table structure for table `ity_temporary_media_attachment`
--

CREATE TABLE `ity_temporary_media_attachment` (
  `attachmentID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `deviceID` varchar(255) NOT NULL,
  `attachementType` varchar(255) NOT NULL,
  `attachementFor` varchar(255) NOT NULL,
  `dateTime` datetime NOT NULL,
  `mediaContent` blob NOT NULL,
  `mediaURL` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ity_temporary_media_attachment`
--

INSERT INTO `ity_temporary_media_attachment` (`attachmentID`, `userID`, `deviceID`, `attachementType`, `attachementFor`, `dateTime`, `mediaContent`, `mediaURL`) VALUES
(1, 1, '356554061837833', 'Contact', 'Task', '2017-01-04 07:10:08', 0x7b22656d61696c223a22222c226e616d65223a22426d682041736966222c2270686f6e65223a2239383733383738343330227d, ''),
(2, 1, '356554061837833', 'Contact', 'Task', '2017-01-04 07:10:57', 0x7b22656d61696c223a22222c226e616d65223a22426d68204173696632222c2270686f6e65223a2239383733383738343331227d, ''),
(3, 1, '356554061837833', 'Location', 'Task', '2017-01-04 07:12:35', 0x7b226c6174223a2237332e3238323338222c226c6e67223a2239342e38323733373420222c222061646472657373223a22536563746f722d332047757267616f6e227d, ''),
(4, 1, '356554061837833', 'Location', 'Task', '2017-01-04 07:12:41', 0x7b226c6174223a2237342e3238323338222c226c6e67223a2239342e38323733373420222c222061646472657373223a22536563746f722d332047757267616f6e227d, '');

-- --------------------------------------------------------

--
-- Table structure for table `ity_user_favorite_tasks`
--

CREATE TABLE `ity_user_favorite_tasks` (
  `favID` int(11) NOT NULL,
  `taskID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ity_user_favorite_tasks`
--

INSERT INTO `ity_user_favorite_tasks` (`favID`, `taskID`, `userID`, `created`) VALUES
(1, 17, 1, '2017-01-03 00:00:00'),
(2, 29, 1, '2017-01-04 18:06:34');

-- --------------------------------------------------------

--
-- Table structure for table `ity_web_users`
--

CREATE TABLE `ity_web_users` (
  `userID` int(11) NOT NULL,
  `firstName` varchar(255) DEFAULT NULL,
  `lastName` varchar(255) DEFAULT NULL,
  `emailID` varchar(255) DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `contactNo` varchar(15) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `userType` int(11) DEFAULT NULL,
  `lastLogin` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ity_web_users`
--

INSERT INTO `ity_web_users` (`userID`, `firstName`, `lastName`, `emailID`, `username`, `password`, `contactNo`, `address`, `userType`, `lastLogin`) VALUES
(1, 'Mohammad', 'Asif', 'asif@bookmyhouse.com', 'admin', '21232f297a57a5a743894a0e4a801fc3', '9873878430', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ity_api_country_master`
--
ALTER TABLE `ity_api_country_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ity_api_draft_tasks`
--
ALTER TABLE `ity_api_draft_tasks`
  ADD PRIMARY KEY (`draftID`);

--
-- Indexes for table `ity_api_groups`
--
ALTER TABLE `ity_api_groups`
  ADD PRIMARY KEY (`groupID`);

--
-- Indexes for table `ity_api_group_users`
--
ALTER TABLE `ity_api_group_users`
  ADD PRIMARY KEY (`groupUserID`);

--
-- Indexes for table `ity_api_hits_call`
--
ALTER TABLE `ity_api_hits_call`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ity_api_industory_type_master`
--
ALTER TABLE `ity_api_industory_type_master`
  ADD PRIMARY KEY (`typeID`);

--
-- Indexes for table `ity_api_locations`
--
ALTER TABLE `ity_api_locations`
  ADD PRIMARY KEY (`locationID`);

--
-- Indexes for table `ity_api_log_task`
--
ALTER TABLE `ity_api_log_task`
  ADD PRIMARY KEY (`histID`);

--
-- Indexes for table `ity_api_media`
--
ALTER TABLE `ity_api_media`
  ADD PRIMARY KEY (`mediaID`);

--
-- Indexes for table `ity_api_mom`
--
ALTER TABLE `ity_api_mom`
  ADD PRIMARY KEY (`momID`);

--
-- Indexes for table `ity_api_mom_observation`
--
ALTER TABLE `ity_api_mom_observation`
  ADD PRIMARY KEY (`observationID`);

--
-- Indexes for table `ity_api_mom_participant`
--
ALTER TABLE `ity_api_mom_participant`
  ADD PRIMARY KEY (`mompID`);

--
-- Indexes for table `ity_api_organizations`
--
ALTER TABLE `ity_api_organizations`
  ADD PRIMARY KEY (`orgID`);

--
-- Indexes for table `ity_api_share_contacts`
--
ALTER TABLE `ity_api_share_contacts`
  ADD PRIMARY KEY (`contactID`);

--
-- Indexes for table `ity_api_sub_industory_type_master`
--
ALTER TABLE `ity_api_sub_industory_type_master`
  ADD PRIMARY KEY (`subTypeID`);

--
-- Indexes for table `ity_api_tag_master`
--
ALTER TABLE `ity_api_tag_master`
  ADD PRIMARY KEY (`tagID`);

--
-- Indexes for table `ity_api_tasks`
--
ALTER TABLE `ity_api_tasks`
  ADD PRIMARY KEY (`taskID`);

--
-- Indexes for table `ity_api_users`
--
ALTER TABLE `ity_api_users`
  ADD PRIMARY KEY (`userID`);

--
-- Indexes for table `ity_chat_master`
--
ALTER TABLE `ity_chat_master`
  ADD PRIMARY KEY (`chatID`);

--
-- Indexes for table `ity_chat_recievers`
--
ALTER TABLE `ity_chat_recievers`
  ADD PRIMARY KEY (`chatReciverID`);

--
-- Indexes for table `ity_group_tasks`
--
ALTER TABLE `ity_group_tasks`
  ADD PRIMARY KEY (`groupTaskID`);

--
-- Indexes for table `ity_leads`
--
ALTER TABLE `ity_leads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ity_media_attachment`
--
ALTER TABLE `ity_media_attachment`
  ADD PRIMARY KEY (`attachmentID`);

--
-- Indexes for table `ity_packages`
--
ALTER TABLE `ity_packages`
  ADD PRIMARY KEY (`pkgID`);

--
-- Indexes for table `ity_request_deadline_change`
--
ALTER TABLE `ity_request_deadline_change`
  ADD PRIMARY KEY (`requestID`);

--
-- Indexes for table `ity_task_status_master`
--
ALTER TABLE `ity_task_status_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ity_temporary_media_attachment`
--
ALTER TABLE `ity_temporary_media_attachment`
  ADD PRIMARY KEY (`attachmentID`);

--
-- Indexes for table `ity_user_favorite_tasks`
--
ALTER TABLE `ity_user_favorite_tasks`
  ADD PRIMARY KEY (`favID`);

--
-- Indexes for table `ity_web_users`
--
ALTER TABLE `ity_web_users`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ity_api_country_master`
--
ALTER TABLE `ity_api_country_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=249;
--
-- AUTO_INCREMENT for table `ity_api_draft_tasks`
--
ALTER TABLE `ity_api_draft_tasks`
  MODIFY `draftID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `ity_api_groups`
--
ALTER TABLE `ity_api_groups`
  MODIFY `groupID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `ity_api_group_users`
--
ALTER TABLE `ity_api_group_users`
  MODIFY `groupUserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=135;
--
-- AUTO_INCREMENT for table `ity_api_hits_call`
--
ALTER TABLE `ity_api_hits_call`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=371;
--
-- AUTO_INCREMENT for table `ity_api_industory_type_master`
--
ALTER TABLE `ity_api_industory_type_master`
  MODIFY `typeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `ity_api_locations`
--
ALTER TABLE `ity_api_locations`
  MODIFY `locationID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ity_api_log_task`
--
ALTER TABLE `ity_api_log_task`
  MODIFY `histID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `ity_api_media`
--
ALTER TABLE `ity_api_media`
  MODIFY `mediaID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ity_api_mom`
--
ALTER TABLE `ity_api_mom`
  MODIFY `momID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `ity_api_mom_observation`
--
ALTER TABLE `ity_api_mom_observation`
  MODIFY `observationID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `ity_api_mom_participant`
--
ALTER TABLE `ity_api_mom_participant`
  MODIFY `mompID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `ity_api_organizations`
--
ALTER TABLE `ity_api_organizations`
  MODIFY `orgID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `ity_api_share_contacts`
--
ALTER TABLE `ity_api_share_contacts`
  MODIFY `contactID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ity_api_sub_industory_type_master`
--
ALTER TABLE `ity_api_sub_industory_type_master`
  MODIFY `subTypeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `ity_api_tag_master`
--
ALTER TABLE `ity_api_tag_master`
  MODIFY `tagID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=456;
--
-- AUTO_INCREMENT for table `ity_api_tasks`
--
ALTER TABLE `ity_api_tasks`
  MODIFY `taskID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `ity_api_users`
--
ALTER TABLE `ity_api_users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'primary key', AUTO_INCREMENT=154;
--
-- AUTO_INCREMENT for table `ity_chat_master`
--
ALTER TABLE `ity_chat_master`
  MODIFY `chatID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `ity_chat_recievers`
--
ALTER TABLE `ity_chat_recievers`
  MODIFY `chatReciverID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `ity_leads`
--
ALTER TABLE `ity_leads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;
--
-- AUTO_INCREMENT for table `ity_media_attachment`
--
ALTER TABLE `ity_media_attachment`
  MODIFY `attachmentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `ity_packages`
--
ALTER TABLE `ity_packages`
  MODIFY `pkgID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `ity_request_deadline_change`
--
ALTER TABLE `ity_request_deadline_change`
  MODIFY `requestID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `ity_task_status_master`
--
ALTER TABLE `ity_task_status_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `ity_temporary_media_attachment`
--
ALTER TABLE `ity_temporary_media_attachment`
  MODIFY `attachmentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `ity_user_favorite_tasks`
--
ALTER TABLE `ity_user_favorite_tasks`
  MODIFY `favID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `ity_web_users`
--
ALTER TABLE `ity_web_users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
