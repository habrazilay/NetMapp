/*
This schema will be used to gather detailed information in order to build a map of connections, before the relocation phase.
The purpose of this database is to achieve real time updates between mapping technicians, and speed up the mapping process.
The content of this database is details about the cabinets,servers,networking gear,physical power connections,physical network connections and their paths.
*/
CREATE SCHEMA `mapping` DEFAULT CHARACTER SET hebrew ;

/*
This table contains information and specifications about rack cabinets.

colums:
id 			- 	unique row identifier.
rid 		- 	room row identifier where the cabinet is placed.
name 		- 	unique name to easily identify a cabinet by technicians. (Ex. A2,B1)
clientName 	- 	name to easily identify a cabinet by the client. (Ex. CLOUD STORAGE1)
uHeight		- 	maximum amount of Units availiable.
depth		- 	cabinets depth in centimeters.
width		- 	cabinets width in centimeters.
height		- 	cabinets height in centimeters.
description	-	cabinet description.
*/
CREATE TABLE mapping.cabinets
(
	`id` int PRIMARY KEY NOT NULL AUTO_INCREMENT,
	`rid` int NOT NULL ,
	FOREIGN KEY (rid)
		REFERENCES project.rooms(id)
		ON DELETE CASCADE,
	`name` varchar(50) NOT NULL,
	`clientName` varchar(50) DEFAULT NULL,
	`uHeight` smallint NOT NULL DEFAULT 42,
	`depth` smallint DEFAULT 120,
	`width` smallint DEFAULT 60,
	`height` smallint DEFAULT 200,
	`description` varchar(100) DEFAULT NULL,
	UNIQUE(`rid`,`name`)
);


/*
This table contains mapping related information about each device.

colums:
id 				- 	unique row identifier.
cabid 			- 	cabinet row identifier where the device is placed.
masterid	 	- 	unique id to easily identify the device by technicians. (Ex. A-0192,B-9813)
uLoc			-	the lowest Unit location of the device inside the cabinet.
uHeight			- 	the size of the device in Units.
uEnd			-	the highest U for this device.
uLength			- 	the length of the device in Units. (Ex. 0.5 for half U device).
name 			- 	name to identify the device by the client.
typeid			-	referencing device row identifier of the base database, for more details about the device.
powerFeedType 	-	referencing power socket row identifier matching this device.	
powerFeedAmount	-	amount of power sockets availiable for this device.
activePorts		-	indicates how many required to be mapped on this device. (for estimation and status reports)
intallationType*-	indicates in which way the device installed to the cabin. (ear/rails/shelf)
phase			-	indicates the moving phase of this device. (0 for untransferred devices) 
arrivalDate		-	date of arrival.
faceFront		-	indicates whether or not this slot is facing the front side of the device. (otherwise facing rear side)
description		-	device description.

* installationType values: 0-ears, 1-rails, 2-shelf, 3-ear+shelf, 4-Uninstalled(placed over another device), 5-on top, 6-next to the cabin.
*/
CREATE TABLE mapping.devices
(
	`id` int PRIMARY KEY AUTO_INCREMENT,
	`cabid` int NOT NULL,
	FOREIGN KEY (cabid)
		REFERENCES mapping.cabinets(id)
		ON DELETE CASCADE,
	`masterid` varchar(20) NOT NULL,
	`uLoc` tinyint DEFAULT NULL,
	`uHeight` tinyint DEFAULT 1,
	`uEnd` tinyint as (`uLoc`+`uHeight`-1),
	`uLength` DECIMAL(4,3) DEFAULT 1.0,
	`name` varchar(50) DEFAULT NULL,
	`typeid` int NOT NULL ,
	FOREIGN KEY (typeid)
		REFERENCES base.devices(id)
		ON DELETE RESTRICT,
	`powerFeedType` int NOT NULL ,
	FOREIGN KEY (powerFeedType)
		REFERENCES base.powerSocketAndPlugTypes(id)
		ON DELETE RESTRICT,
	`powerFeedAmount` tinyint DEFAULT 1,
	`activePorts` smallint DEFAULT NULL,
	`installationType` tinyint DEFAULT 0,
	`phase` tinyint DEFAULT 0,
	`arrivalDate` datetime DEFAULT NULL,
	`faceFront` boolean DEFAULT TRUE,
	`description` varchar(100) DEFAULT NULL,
	UNIQUE(masterId)
);

/*
This table contains information about cabinets power feeding plugs.

colums:
id 				- 	unique row identifier.
cabid 			- 	cabinet row identifier who this plug is feeding.
typeid			-	referencing plug type row identifier of the base database, for more details about the plug connector.
description		-	device description.
*/
CREATE TABLE mapping.cabinetPowerPlugs
(
	`id` int PRIMARY KEY NOT NULL AUTO_INCREMENT,
	`cabid` int NOT NULL ,
	FOREIGN KEY (cabid)
		REFERENCES mapping.cabinets(id)
		ON DELETE CASCADE,
	`typeid` int NOT NULL ,
	FOREIGN KEY (typeid)
		REFERENCES base.powerIndustrialPlugTypes(id)
		ON DELETE RESTRICT,
	`description` varchar (100) DEFAULT NULL,
	INDEX(cabid)
);

/*
This table contains information about power outlets located inside the cabinets, such as Power Distribution Units (PDU).

colums:
id			- 	unique row identifier.
cabid 		- 	cabinet row identifier where the outlets located.
outTypeid	-	referencing plug type row identifier of the base database, for more details about the outlet connector.
amount		- 	amount of outlets of this type.
plugid 		-	referencing power plug row identifier who feeds those outlets.	
description	-	device description.
*/
CREATE TABLE mapping.cabinetPowerOutlets
(
	`id` int PRIMARY KEY NOT NULL AUTO_INCREMENT,
	`cabid` int NOT NULL ,
	FOREIGN KEY (cabid)
		REFERENCES mapping.cabinets(id)
		ON DELETE CASCADE,
	`outTypeid` int NOT NULL ,
	FOREIGN KEY (outTypeid)
		REFERENCES base.powerSocketAndPlugTypes(id)
		ON DELETE RESTRICT,
	`amount` tinyint NOT NULL,
	`plugid` int NOT NULL ,
	FOREIGN KEY (plugid)
		REFERENCES mapping.cabinetPowerPlugs(id)
		ON DELETE CASCADE,
	`description` varchar (100) DEFAULT NULL,
	INDEX(cabid)
);

/*
This table lists all the slots of the devices.

colums:
id 			- 	unique row identifier.
devid		-	referencing device identifier that owns this slot.
name		-	the name or number of this slot.
faceFront		-	indicates whether or not this slot is facing the front side of the device. (otherwise facing rear side)
topLeftX	-	the X location of the starting point of this slot.
topLeftY	-	the Y location of the starting point of this slot.
bottomRightX-	the X location of the ending point of this slot.
bottomRightY-	the Y location of the ending point of this slot. 

*/
CREATE TABLE mapping.slots
(
	`id` int PRIMARY KEY NOT NULL AUTO_INCREMENT,
	`devid` int NOT NULL ,
	FOREIGN KEY (devid)
		REFERENCES mapping.devices(id)
		ON DELETE CASCADE,
	`name` varchar(20) NOT NULL DEFAULT "0",
	`faceFront` boolean DEFAULT TRUE,
	`topLeftX` int DEFAULT NULL,
	`topLeftY` int DEFAULT NULL,
	`bottomRightX` int DEFAULT NULL,
	`bottomRightY` int DEFAULT NULL,
	INDEX(devid)
);

/*
This table lists all the ports of the devices.

colums:
id 			- 	unique row identifier.
devid		-	referencing device identifier that owns this port.
slot 		-	referencing slot identifier that owns this port.
port		-	the name of this port.
plugTypeid	-	referencing plug type identifier of this port, for more details about the connector type.
portType*	-	indicates the type of this port.
topLeftX	-	the X location of the starting point of this port.
topLeftY	-	the Y location of the starting point of this port.
bottomRightX-	the X location of the ending point of this port.
bottomRightY-	the Y location of the ending point of this port. 

*portType values:	0-device port, 1-patch panel port. (might be expended later for transparent ports)
*/
CREATE TABLE mapping.ports
(
	`id` int PRIMARY KEY NOT NULL AUTO_INCREMENT,
	`devid` int NOT NULL ,
	FOREIGN KEY (devid)
		REFERENCES mapping.devices(id)
		ON DELETE CASCADE,
	`slotid` int DEFAULT NULL,
	FOREIGN KEY (slotid)
		REFERENCES mapping.slots(id)
		ON DELETE CASCADE,
	`port` varchar(20) NOT NULL,
	`plugTypeid` int,
	FOREIGN KEY (plugTypeid)
		REFERENCES base.plugTypes(id)
		ON DELETE SET NULL,
	`portType` tinyint NOT NULL,
	`topLeftX` int DEFAULT NULL,
	`topLeftY` int DEFAULT NULL,
	`bottomRightX` int DEFAULT NULL,
	`bottomRightY` int DEFAULT NULL,
	
	INDEX(devid)
);

/*
This table lists all of the connections between ports.
each row will define a physical cable connection between two ports. 

Note: 	connections will be stored without any duplicates 
		(if a row from port id 1 to 20 exists, row from 20 to 1 must not be listed as well)

colums:
portIdA 	-	port identifier of one of this connection's sides.
portIdZ 	-	port identifier of the other side of this connection.
color		-	the color of the cable that connects port A to port Z.
tag 		-	the number or text listed on a sticker over the cable.

*/
CREATE TABLE mapping.connections
(
	`portIdA` int DEFAULT NULL ,
	FOREIGN KEY (portIdA)
		REFERENCES mapping.ports(id)
		ON DELETE SET NULL,
	`portIdZ` int PRIMARY KEY NOT NULL,
	FOREIGN KEY (portIdZ)
		REFERENCES mapping.ports(id)
		ON DELETE CASCADE,
	`color` VARCHAR(6) DEFAULT "D3D3D3",
	`tag` VARCHAR(20) DEFAULT NULL,
	INDEX(portIdA),
	INDEX(portIdZ)
);
