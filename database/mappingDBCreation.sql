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
length		- 	cabinets length in centimeters.
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
	`length` smallint DEFAULT 80,
	`width` smallint DEFAULT 60,
	`height` smallint DEFAULT 200,
	`description` varchar(100) DEFAULT NULL,
	UNIQUE(name)
);


/*
This table contains mapping related information about each device.

colums:
id 				- 	unique row identifier.
cabid 			- 	cabinet row identifier where the device is placed.
masterid	 	- 	unique id to easily identify the device by technicians. (Ex. A-0192,B-9813)
uLoc			-	the lowest Unit location of the device inside the cabinet.
uHeight			- 	the size of the device in Units.
uLenght			- 	the length of the device in Units. (Ex. 0.5 for half U device).
name 			- 	name to identify the device by the client.
typeid			-	referencing device row identifier of the base database, for more details about the device.
powerFeedType 	-	referencing power socket row identifier matching this device.	
powerFeedAmount	-	amount of power sockets availiable for this device.
activePorts		-	indicates how many required to be mapped on this device. (for estimation and status reports)
intallationType*		-	indicates in which way the device installed to the cabin. (ear/rails/shelf) 
arrivalDate		-	date of arrival.
description		-	device description.

* installationType values: 0-ears, 1-rails, 2-shelf, 3-ear+shelf, 4-on top, 5-next to the cabin.
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
	`uLenght` DECIMAL(1,3) DEFAULT 1.0,
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
This table contains information about patch panels extenders between cabinets.

colums:
id 					- 	unique row identifier.
cabidA*				- 	cabinet row identifier of the patch panel first side.
cabidB*				- 	cabinet row identifier of the patch panel second side.
ppName		 		- 	name of  the patch panel. (Ex. A4 to B2)
uLoc				-	the Unit location of the patch panel inside the cabinet.
uHeight				- 	the size of the patch panel in Units.
plugTypeid			-	referencing plug type row identifier of the base database, for more details about the patch panel output connectors.
amount				- 	amount of ports availiable in this patch panel.
firstPortPattern**	- 	pattern for naming the ports of this patch panel.
isNumeric**			-	indicates whether or not the port name logical increasement is numeric or alphabet.
description			- 	patch panel description.

*	first and second will be determined by lowest cabinet identifier first.

**	for example, if firstPortPattern is set to "RJ***", isNumeric set to TRUE and amount set to 48,
	then the ports for this patch panel will be created with the names: RJ001, RJ002, ... , RJ047, RJ048.
	
*/
CREATE TABLE mapping.patchPanels
(
	`id` int PRIMARY KEY NOT NULL AUTO_INCREMENT,
	`cabAid` int NOT NULL,
	FOREIGN KEY (cabAid)
		REFERENCES mapping.cabinets(id)
		ON DELETE CASCADE,
	`cabBid` int NOT NULL ,
	FOREIGN KEY (cabBid)
		REFERENCES mapping.cabinets(id)
		ON DELETE CASCADE,
	`ppName` varchar(15) DEFAULT NULL,
	`uLoc` tinyint DEFAULT NULL,
	`uHeight` tinyint DEFAULT 1,
	`plugTypeid` int,
	FOREIGN KEY (plugTypeid)
		REFERENCES base.plugTypes(id)
		ON DELETE RESTRICT,
	`amount` smallint NOT NULL,
	`firstPortPattern` varchar(20) NOT NULL DEFAULT "**",
	`isNumeric` boolean NOT NULL DEFAULT TRUE,
	`Description` varchar(50) DEFAULT NULL,
	INDEX(cabAid),
	INDEX(cabBid)
);

/*
This table lists all the ports of the devices.

colums:
id 			- 	unique row identifier.
devid		-	referencing device identifier that owns this port.
slot 		-	the device's slot where this port is located.
port		-	the name of this port.
plugTypeid	-	referencing plug type identifier of this port, for more details about the connector type.

*/
CREATE TABLE mapping.devicePorts
(
	`id` int PRIMARY KEY NOT NULL AUTO_INCREMENT,
	`devid` int NOT NULL ,
	FOREIGN KEY (devid)
		REFERENCES mapping.devices(id)
		ON DELETE CASCADE,
	`slot` varchar(20) DEFAULT NULL,
	`port` varchar(20) NOT NULL,
	`plugTypeid` int,
	FOREIGN KEY (plugTypeid)
		REFERENCES base.plugTypes(id)
		ON DELETE SET NULL,
	INDEX(devid)
);


/*
This table lists all the ports of the patch panels.

colums:
id 		- 	unique row identifier.
ppid	-	referencing patch panel identifier that owns this port.
port	-	the name of this port.

*/
CREATE TABLE mapping.patchPanelPorts
(
	`id` int PRIMARY KEY NOT NULL AUTO_INCREMENT,
	`ppid` int NOT NULL ,
	FOREIGN KEY (ppid)
		REFERENCES mapping.patchPanels(id)
		ON DELETE CASCADE,
	`port` varchar(20) NOT NULL,
	INDEX(ppid)
);


/*
This table lists all the ports availiable.
its a helper table for the mapping.connectionsPath table.

colums:
id 			- 	unique row identifier.
portType*	-	indicates the type of this port.
ppPortid	-	referencing patch panel port identifier of this port. (nullable only if the port is not a device port)
ppPortid	-	referencing patch panel port identifier of this port. (nullable only if the port is not a patch panel port)

*portType values:	0-device port, 1-patch panel port. (might be expended later for transparent ports)

chk_portid_not_null - this check verifys that the relevant identifier of the port is not NULL.

*/
CREATE TABLE mapping.ports
(
	`id`int PRIMARY KEY NOT NULL AUTO_INCREMENT,
	`portType` tinyint NOT NULL,
	`devPortid` int,
	FOREIGN KEY (devPortid)
		REFERENCES mapping.devicePorts(id)
		ON DELETE CASCADE,
	`ppPortid` int ,
	FOREIGN KEY (ppPortid)
		REFERENCES mapping.patchPanelPorts(id)
		ON DELETE CASCADE,
	INDEX(devPortid),
	INDEX(ppPortid),
	CONSTRAINT chk_portid_not_null CHECK ( (portType=0 AND devPortid!=NULL) OR (portType=1 AND ppPortid!=NULL) )
);

/*
This table lists all of the connections between ports.
each row will act as a doubly linked list, where each port has prev and next pointing to the matching port id.

colums:
prevPortid 	-	referencing the prior port identifier.
portid		-	referencing this port identifier, will also be the unique identifier for this table.
nextPortid	-	referencing the following port identifier.

*/
CREATE TABLE mapping.connectionsPath
(
	`prevPortid` int DEFAULT NULL ,
	FOREIGN KEY (prevPortid)
		REFERENCES mapping.ports(id)
		ON DELETE SET NULL,
	`portid` int PRIMARY KEY NOT NULL,
	FOREIGN KEY (portid)
		REFERENCES mapping.ports(id)
		ON DELETE CASCADE,
	`color` VARCHAR(6) DEFAULT "D3D3D3",
	`nextPortid` int DEFAULT NULL,
	FOREIGN KEY (nextPortid)
		REFERENCES mapping.ports(id)
		ON DELETE SET NULL,
	INDEX(prevPortid),
	INDEX(nextPortid)
);




/*
This is contains the patch panels path between two active device ports.
This table contains the all of the end to end connections between device ports, the path across the patch panel is stored in a different helper table.

colums:
id 			- 	unique row identifier.
portAid* 	-	referencing the fisrt side port identifier.
cableNumAPP	-	the number of the cable from port A to the 1st PP in his path to port B.
colorAPP	-	the color of the cable from port A to the 1st PP in his path to port B.
ppPortid<X>	-	referencing the X-th patch panel port identifier in the path.
cableNum<XY>-	the number of the cable from the X-th PP to the (X+1)-th PP in the path from A to B.
colorPP<XY>	-	the color of the cable from the X-th PP to the (X+1)-th PP in the path from A to B.
cableNumBPP	-	the number of the cable from the last PP to port B.
colorBPP	-	the color of the cable from the last PP to port B.
cableNumAB	-	the number of the cable from port A to Port B (in case of direct connection).
colorAB		-	the color of the cable from port A to Port B (in case of direct connection).
portBid* 	-	referencing the second side port identifier.

*portA will be the port with lower device port id.
*/
CREATE TABLE mapping.connectionsFullPath
(
	`id` int PRIMARY KEY NOT NULL AUTO_INCREMENT,
	`portAid` int NOT NULL,
	`cableNumAPP` VARCHAR(20) DEFAULT NULL,
	`colorAPP` VARCHAR(6) DEFAULT "D3D3D3",
	FOREIGN KEY (portAid)
		REFERENCES mapping.devicePorts(id)
		ON DELETE CASCADE,
	`ppPortid1` int DEFAULT NULL,
	`cableNum12` VARCHAR(20) DEFAULT NULL,
	`colorPP12` VARCHAR(6) DEFAULT "D3D3D3",
	FOREIGN KEY (ppPortid1)
		REFERENCES mapping.patchPanelPorts(id)
		ON DELETE CASCADE,
	`ppPortid2` int DEFAULT NULL,
	`cableNum23` VARCHAR(20) DEFAULT NULL,
	`colorPP23` VARCHAR(6) DEFAULT "D3D3D3",
	FOREIGN KEY (ppPortid2)
		REFERENCES mapping.patchPanelPorts(id)
		ON DELETE CASCADE,	
	`ppPortid3` int DEFAULT NULL,
	`cableNum34` VARCHAR(20) DEFAULT NULL,
	`colorPP34` VARCHAR(6) DEFAULT "D3D3D3",
	FOREIGN KEY (ppPortid3)
		REFERENCES mapping.patchPanelPorts(id)
		ON DELETE CASCADE,
	`ppPortid4` int DEFAULT NULL,
	`cableNum45` VARCHAR(20) DEFAULT NULL,
	`colorPP45` VARCHAR(6) DEFAULT "D3D3D3",
	FOREIGN KEY (ppPortid4)
		REFERENCES mapping.patchPanelPorts(id)
		ON DELETE CASCADE,
	`ppPortid5` int DEFAULT NULL,
	`cableNumAPP` VARCHAR(20) DEFAULT NULL,
	`colorBPP` VARCHAR(6) DEFAULT "D3D3D3",
	FOREIGN KEY (ppPortid5)
		REFERENCES mapping.patchPanelPorts(id)
		ON DELETE CASCADE,
	`portBid` int DEFAULT NULL,
	`cableNumAB` VARCHAR(20) DEFAULT NULL,
	`colorAB` VARCHAR(6) DEFAULT "D3D3D3",
	FOREIGN KEY (portBid)
		REFERENCES mapping.devicePorts(id)
		ON DELETE CASCADE,
	INDEX(portAid),
	INDEX(portBid)
);


/*
This is a different approch for storing the connections in the database.
This table contains the all of the end to end connections between device ports, the path across the patch panel is stored in a different helper table.

colums:
id 			- 	unique row identifier.
portAid* 	-	referencing the fisrt side port identifier.
portBid* 	-	referencing the second side port identifier.
status**		- 	determining the status of this connection.
pathid		-	referencing the path row identifier, which contains the full path details between port A to port B.

*portA will be the port with lower device port id.
**status values: 0-confirmed, 1-waiting for confirmation(for connection autofilled by cable number), 2-confirmed by the client.
*/
CREATE TABLE mapping.fullConnections
(
	`id` int PRIMARY KEY NOT NULL AUTO_INCREMENT,
	`status` tinyint NOT NULL DEFAULT 0,
	`portAid` int NOT NULL,
	FOREIGN KEY (portAid)
		REFERENCES mapping.devicePorts(id)
		ON DELETE CASCADE,
	`portBid` int NOT NULL ,
	FOREIGN KEY (portBid)
		REFERENCES mapping.devicePorts(id)
		ON DELETE CASCADE,
	`pathid` int,
	FOREIGN KEY (pathid)
		REFERENCES mapping.connectionsFullPath(id)
		ON DELETE CASCADE,
	INDEX(portAid),
	INDEX(portBid),
	INDEX(pathid)
);
