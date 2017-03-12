/*
This schema will be used as the basic database of each project.
This base schema is a self-updating database, expands by new data provided by the technicians.
The content of this database is details about well known network related devices, types of cables, connectors, industrial power plugs and fiber optic equipment. 
*/
CREATE SCHEMA `base` DEFAULT CHARACTER SET hebrew ;


/*
This table contains details about power plugs and sockets types.
mostly including the variety of IEC 60320 plugs and sockets.

colums:
id 			- 	unique row identifier.
type 		- 	type of the connector. (Ex. C13,C19)
maxCurrent	- 	max current rating of the connector. (Ex. 32A)
picLoc		-	path location for an image of the connector.
*/
CREATE TABLE base.powerSocketAndPlugTypes
(
	`id` int PRIMARY KEY NOT NULL AUTO_INCREMENT,
	`type` varchar(20) NOT NULL,
	`maxCurrent` varchar(10) DEFAULT NULL,
	`picLoc` varchar(255)
);


/*
This table contains details about business networking rooms equipment.
including servers, blade systems, storage, switches, routers, access points, firewall, adapters, and so on.

colums:
id 						- 	unique row identifier.
brand 					- 	brand/manufacture of the device.
type 					- 	purpose of the device. (Ex. switch/server/...)
model			 		- 	specific model of the device. (Ex. 2960/ProLiant 360/...)
uHeight					- 	the size of the device in Units.
uLength					- 	the length of the device in Units. (Ex. 0.5 for half U device).
builtInPowerFeedType 	-	referencing power socket row identifier matching this device.	
builtInPowerFeedAmount	-	amount of power sockets built in for this device.
picLoc 	-	path location for an image of the device.
*/
CREATE TABLE base.devices
(
	`id` int PRIMARY KEY NOT NULL AUTO_INCREMENT,
	`brand` varchar(30) DEFAULT "Not Specified",
	`type` varchar(30) DEFAULT "Not Specified",
	`model` varchar(100) NOT NULL,
	`uHeight` tinyint DEFAULT 1,
	`uLength` DECIMAL(4,3) DEFAULT 1.0,
	`builtInPowerFeedType` int DEFAULT NULL,
	FOREIGN KEY (builtInPowerFeedType)
		REFERENCES base.powerSocketAndPlugTypes(id)
		ON DELETE RESTRICT,
	`builtInPowerFeedAmount` tinyint DEFAULT 1,
	`picLoc` varchar(255) DEFAULT NULL
);


/*
This table contains details about plug types.
including network related plug types such as RJ-45/RJ-11 , server plug types such as VGA/RS232, and so on.

colums:
id 				- 	unique row identifier.
type 			- 	type of the connector. (Ex. network,display,audio)
connector 		- 	name of the connector. (Ex. RJ-45/VGA)
maleConPicLoc 	- 	path location for an image of the male connector.
femaleConPicLoc	-	path location for an image of the female connector.
*/
CREATE TABLE base.plugTypes
(
	`id` int PRIMARY KEY NOT NULL AUTO_INCREMENT,
	`type` varchar(40) NOT NULL,
	`connector` varchar (40) NOT NULL,
	`maleConPicLoc` varchar (255),
	`femaleConPicLoc` varchar (255)
);

/*
This table contains details about industrial and multiphase power plugs and sockets types.
mostly including the variety of IEC 60309 plugs and sockets.

colums:
id 		- 	unique row identifier.
type 	- 	type of the connector. (Ex. IEC 60309)
voltage	-	voltage range of the connector. (Ex. 220-240V)
current - 	current rating of the connector. (Ex. 32A)
phases 	- 	phases of the connector. (Ex. single-phase,three-phase)
picLoc	-	path location for an image of the connector.
*/
CREATE TABLE base.powerIndustrialPlugTypes
(
	`id` int PRIMARY KEY NOT NULL AUTO_INCREMENT,
	`type` varchar(50) NOT NULL,
	`voltRange` varchar(20) DEFAULT "Not Specified",
	`current` varchar(20) DEFAULT 0,
	`phases` varchar(30) DEFAULT "Not Specified",
	`picLoc` varchar(255)
);



/*
This table contains details about fiber optic transceivers.
including fiber optic transceivers such as SFP+,GBIC.

colums:
id 			- 	unique row identifier.
type 		- 	type of the transceiver. (Ex. SFP+,GBIC)
model 		- 	model of the transceiver. (Ex. 10GBASE-USR,1000BASE-SX)
plugTypeid	-	the row id of the matching plug type which connect to this transceiver. (Ex. the identifier of the LC plug type).
*/
CREATE TABLE base.opticalTransceiverTypes
(
	`id` int PRIMARY KEY NOT NULL AUTO_INCREMENT,
	`model` varchar(40) NOT NULL,
	`type` varchar(40) NOT NULL,
	`plugTypeid` int NOT NULL,
	FOREIGN KEY (plugTypeid)
		REFERENCES base.plugTypes(id)
		ON DELETE RESTRICT
);