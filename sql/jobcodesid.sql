-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.11-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             10.1.0.5464
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table phhsystem.jobcodesid
CREATE TABLE IF NOT EXISTS `jobcodesid` (
  `jcodeid` int(11) NOT NULL AUTO_INCREMENT,
  `jobcode` varchar(50) NOT NULL DEFAULT 'false',
  `sid` int(11) NOT NULL,
  `period` varchar(4) DEFAULT NULL,
  `jlwsid` int(11) DEFAULT NULL,
  PRIMARY KEY (`jcodeid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table phhsystem.jobcodesid: ~0 rows (approximately)
/*!40000 ALTER TABLE `jobcodesid` DISABLE KEYS */;
/*!40000 ALTER TABLE `jobcodesid` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
