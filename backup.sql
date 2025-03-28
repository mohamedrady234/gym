

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_username` varchar(50) NOT NULL,
  `admin_password` varchar(50) NOT NULL,
  `admin_email` varchar(50) NOT NULL,
  `admin_image` varchar(200) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO admin VALUES("1","Male","72438","male@whitegym.com","");
INSERT INTO admin VALUES("2","Female","72438","female@whitegym.com","");
INSERT INTO admin VALUES("5","admin","c3377","admin@whitegym.com","");





CREATE TABLE `members` (
  `member_id` int(11) NOT NULL AUTO_INCREMENT,
  `member_name` varchar(50) NOT NULL,
  `member_phone` int(50) NOT NULL,
  `member_paid_up` int(50) NOT NULL,
  `member_remainder` int(50) NOT NULL,
  `member_start` date NOT NULL,
  `member_end` date NOT NULL,
  `member_name_captain` varchar(50) NOT NULL,
  `member_subscription` varchar(11) NOT NULL,
  `member_image` varchar(200) NOT NULL,
  PRIMARY KEY (`member_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;






CREATE TABLE `members_female` (
  `member_id_female` int(11) NOT NULL AUTO_INCREMENT,
  `member_name` varchar(50) NOT NULL,
  `member_phone` int(50) NOT NULL,
  `member_paid_up` int(50) NOT NULL,
  `member_remainder` int(50) NOT NULL,
  `member_start` date NOT NULL,
  `member_end` date NOT NULL,
  `member_name_captain` varchar(50) NOT NULL,
  `member_subscription` varchar(11) NOT NULL,
  `member_image` varchar(200) NOT NULL,
  PRIMARY KEY (`member_id_female`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;






CREATE TABLE `newmembers` (
  `member_id` int(11) NOT NULL AUTO_INCREMENT,
  `member_name` varchar(50) NOT NULL,
  `member_phone` varchar(200) NOT NULL,
  `member_paid_up` int(50) NOT NULL,
  `member_remainder` int(50) NOT NULL,
  `member_start` date NOT NULL,
  `member_end` date NOT NULL,
  `member_name_captain` varchar(50) NOT NULL,
  `member_subscription` varchar(11) NOT NULL,
  `member_image` varchar(200) NOT NULL,
  PRIMARY KEY (`member_id`),
  UNIQUE KEY `member_name` (`member_name`,`member_phone`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO newmembers VALUES("1","ehab rady","01123546852","2121","121212","2025-03-28","2025-03-28","null","1 - month","1743146679990f57beb0de3aa83e7de34e545f1275.jpg");





CREATE TABLE `newmembers_female` (
  `member_id_female` int(11) NOT NULL AUTO_INCREMENT,
  `member_name` varchar(50) NOT NULL,
  `member_phone` varchar(50) NOT NULL,
  `member_paid_up` int(50) NOT NULL,
  `member_remainder` int(50) NOT NULL,
  `member_start` date NOT NULL,
  `member_end` date NOT NULL,
  `member_name_captain` varchar(50) NOT NULL,
  `member_subscription` varchar(11) NOT NULL,
  `member_image` varchar(200) NOT NULL,
  PRIMARY KEY (`member_id_female`),
  UNIQUE KEY `member_name` (`member_name`,`member_phone`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;






CREATE TABLE `out_put` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `service` varchar(255) NOT NULL,
  `disc` varchar(255) NOT NULL,
  `paid_up` varchar(200) NOT NULL,
  `day` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;






CREATE TABLE `trainer` (
  `trainer_id` int(11) NOT NULL AUTO_INCREMENT,
  `trainer_first_name` varchar(50) NOT NULL,
  `trainer_last_name` varchar(50) NOT NULL,
  `trainer_address` varchar(200) NOT NULL,
  `trainer_join_on` date NOT NULL,
  `trainer_birthday` date NOT NULL,
  `trainer_salry` int(11) NOT NULL,
  `trainer_phone` int(11) NOT NULL,
  `trainer_image` varchar(200) NOT NULL,
  PRIMARY KEY (`trainer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;






CREATE TABLE `trainer_female` (
  `trainer_female_id` int(11) NOT NULL AUTO_INCREMENT,
  `trainer_first_name` varchar(50) NOT NULL,
  `trainer_last_name` varchar(50) NOT NULL,
  `trainer_address` varchar(50) NOT NULL,
  `trainer_join_on` date NOT NULL,
  `trainer_birthday` date NOT NULL,
  `trainer_salry` int(11) NOT NULL,
  `trainer_phone` int(11) NOT NULL,
  `trainer_image` varchar(200) NOT NULL,
  PRIMARY KEY (`trainer_female_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;






CREATE TABLE `trainernotes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `service` varchar(255) NOT NULL,
  `disc` varchar(255) NOT NULL,
  `paid_up` varchar(200) NOT NULL,
  `day` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;




