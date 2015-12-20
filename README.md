A chatbot is a type of conversational agent, a computer program designed to simulate an intelligent conversation with one or more human users via auditory or textual methods.
 
 its is designed in php with mysql as backend
 
 
 INSTALLATION
 
 
 Create database and username and edit config.php
 
 Import Following tables into your phpmyadmin
 
 CREATE TABLE IF NOT EXISTS `bot` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question` text NOT NULL,
  `key` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

INSERT INTO `bot` (`id`, `question`, `key`) VALUES
(1, 'I see different prices for books with the same title Why', 'warranty'),
(2, 'Why do I see different prices for the same product', 'prices'),
(3, 'What do I need to know before getting an order gift wrapped', 'discount'),
(4, 'Is it necessary to have an account to shop on Flipkart', 'refund'),
(5, 'For a Buyer what does Flipkart Advantage mean', 'offer');

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE IF NOT EXISTS `logs` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `userid` bigint(20) DEFAULT NULL,
  `q_id` bigint(20) DEFAULT NULL,
  `user_reply` text,
  `windowno` int(2) DEFAULT NULL,
  `sessionstarttime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `endsessiontime` text,
  `createdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `userid` int(10) NOT NULL,
  `password` varchar(10) NOT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userid`, `password`) VALUES
(10, 'ben'),
(20, 'ben');

 
