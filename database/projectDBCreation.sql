/*
This schema will be used to store general information about this project sites and rooms.
*/
CREATE SCHEMA `project` DEFAULT CHARACTER SET hebrew ;


/*
This table contains general details about the project.

colums:
id 			- 	unique row identifier.
name	 	- 	name of the project.
createdBy	-	referencing user identifier who created this project.
dateCreated	-	the date this project has been created.
*/
CREATE TABLE project.projectInfo
(
	`id` int PRIMARY KEY NOT NULL AUTO_INCREMENT,
	`name` varchar(50) NOT NULL,
	`createdBy` int NOT NULL REFERENCES security.users(id),
	`dateCreated` datetime NOT NULL DEFAULT NOW()
);


/*
This table contains details about the sites of this project.

colums:
id 			- 	unique row identifier.
name	 	- 	name of the site.
city		-	city where the site is located.
address		-	address of the site.
createdBy	-	referencing user identifier who created this project.
dateCreated	-	the date this project has been created.
*/
CREATE TABLE project.sites
(
	`id` int PRIMARY KEY NOT NULL AUTO_INCREMENT,
	`name` varchar(100) NOT NULL,
	`city` varchar(100) DEFAULT NULL,
	`address` varchar(100) DEFAULT NULL,
	`createdBy` int NOT NULL REFERENCES security.users(id),
	`dateCreated` datetime NOT NULL DEFAULT NOW()
);


/*
This table contains details about the rooms of this project.

colums:
id 				- 	unique row identifier.
sid				-	referencing site identifier who belongs this room.
name	 		- 	name of the room.
floor			-	floor number/name of this room.
location		-	information to identify the room location inside the floor.
length			-	length of the room in centimeters.
width			-	width of the room in centimeters.
description		-	room description.
createdBy		-	referencing user identifier who created this room.
dateCreated		-	the date this room has been created.
cabAmount		-	amount of relevant cabinets for mapping in the room.
*/
CREATE TABLE project.rooms
(
	`id` int PRIMARY KEY NOT NULL AUTO_INCREMENT,
	`sid` int NOT NULL REFERENCES sites(id),
	`name` varchar(100) NOT NULL,
	`floor` varchar(10) DEFAULT NULL,
	`location` varchar(100) DEFAULT NULL,
	`length` int DEFAULT NULL,
	`width` int DEFAULT NULL,	
	`description` varchar(100) DEFAULT NULL,
	`createdBy` int NOT NULL REFERENCES security.users(id),
	`dateCreated` datetime NOT NULL DEFAULT NOW(),
	`cabAmount` int NOT NULL DEFAULT 0
);