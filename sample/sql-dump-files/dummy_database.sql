SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `dummy_database`
--
CREATE DATABASE IF NOT EXISTS `dummy_database` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `dummy_database`;

-- --------------------------------------------------------

--
-- Table structure for table `MOCK_DATA`
--

CREATE TABLE `MOCK_DATA` (
  `id` int(11) NOT NULL,
  `MONTHS` varchar(50) DEFAULT NULL,
  `REVENUES` int(11) DEFAULT NULL,
  `PROFITS` int(11) DEFAULT NULL,
  `PROFIT_IN_PERCENTAGE` decimal(3,1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `MOCK_DATA`
--

INSERT INTO `MOCK_DATA` (`id`, `MONTHS`, `REVENUES`, `PROFITS`, `PROFIT_IN_PERCENTAGE`) VALUES
(1, 'Jan', 19405, 3741, '33.3'),
(2, 'Feb', 22394, 4975, '33.3'),
(3, 'Mar', 18967, 2256, '6.5'),
(4, 'Apr', 22004, 5393, '6.4'),
(5, 'May', 22082, 7392, '34.7'),
(6, 'Jun', 22588, 3121, '22.2'),
(7, 'July', 22708, 2385, '9.4'),
(8, 'Aug', 21389, 5110, '13.0'),
(9, 'Sept', 19451, 5618, '30.0'),
(10, 'Oct', 16247, 6467, '33.0'),
(11, 'Nov', 22209, 2653, '16.0'),
(12, 'Dec', 22438, 2445, '29.0');

