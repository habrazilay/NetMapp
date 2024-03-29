CREATE SCHEMA `security`;

CREATE TABLE IF NOT EXISTS `security`.`users` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'auto incrementing user_id of each user, unique index',
  `user_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL COMMENT 'user''s name, unique',
  `user_password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'user''s password in salted and hashed format',
  `user_email` varchar(64) COLLATE utf8_unicode_ci NOT NULL COMMENT 'user''s email, unique',
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_name` (`user_name`),
  UNIQUE KEY `user_email` (`user_email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='user data';

/* USER FOR TESTING PURPOSES --- TO BE REMOVED */
INSERT INTO `security`.`users` (`user_name`, `user_password_hash`, `user_email`) VALUES ('newit', '$2y$10$p1r4HKCr1TB/yCYFsk5Ooe9snRIztvNo3gCafPiWsOL38POrQnZbW', 'info@newit.com');