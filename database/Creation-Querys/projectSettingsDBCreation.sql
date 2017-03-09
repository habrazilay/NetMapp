/*
This schema will be used to customize projects based on client and project manager demends.
The content of this database is additional client demends and user permissions.
*/
CREATE SCHEMA `projectSettings` DEFAULT CHARACTER SET hebrew ;


/*
This table contains users permissions for this project.

colums:
id	 				- 	unique row identifier.
uid					-	referencing user identifier.
canViewProject		-	indicates whether or not the user can view this project.	
canCreateSite		-	indicates whether or not the user has the permissions to create sites in this project.
canModifySite		-	indicates whether or not the user has the permissions to modify sites in this project.
canCreateRoom		-	indicates whether or not the user has the permissions to create rooms in this project.
canModifyRoom		-	indicates whether or not the user has the permissions to modify rooms in this project.
canCreatecabinet	-	indicates whether or not the user has the permissions to create cabinets in this project.
canModifycabinet	-	indicates whether or not the user has the permissions to modify cabinets in this project.
canCreateDevice		-	indicates whether or not the user has the permissions to create devices in this project.
canModifyDevice		-	indicates whether or not the user has the permissions to modify devices in this project.
canCreateConnection	-	indicates whether or not the user has the permissions to create connections in this project.
canModifyConnection	-	indicates whether or not the user has the permissions to modify connections in this project.
createdBy	-	referencing user identifier who created the user.
dateCreated	-	the date this user has been created.
modBy		-	referencing user identifier who last modified this user permissions.
modDate		- 	last modified date of this user permissions.
*/
CREATE TABLE projectSettings.userPermissions
(
	`id` int PRIMARY KEY NOT NULL AUTO_INCREMENT,
	`uid` int NOT NULL,
	FOREIGN KEY (uid)
		REFERENCES security.users(id)
		ON DELETE CASCADE,
	`canViewProject` boolean NOT NULL DEFAULT TRUE,
	`canCreateSite` boolean NOT NULL DEFAULT FALSE,
	`canModifySite` boolean NOT NULL DEFAULT FALSE,
	`canCreateRoom` boolean NOT NULL DEFAULT FALSE,
	`canModifyRoom` boolean NOT NULL DEFAULT FALSE,
	`canCreatecabinet` boolean NOT NULL DEFAULT TRUE,
	`canModifycabinet` boolean NOT NULL DEFAULT TRUE,
	`canCreateDevice` boolean NOT NULL DEFAULT TRUE,
	`canModifyDevice` boolean NOT NULL DEFAULT TRUE,
	`canCreateConnection` boolean NOT NULL DEFAULT TRUE,
	`canModifyConnection` boolean NOT NULL DEFAULT TRUE,
	`createdBy` int,
	FOREIGN KEY (createdBy)
		REFERENCES security.users(id)
		ON DELETE SET NULL,
	`dateCreated` datetime NOT NULL DEFAULT NOW(),
	`modBy` int,
	FOREIGN KEY (modBy)
		REFERENCES security.users(id)
		ON DELETE SET NULL,
	`modDate` datetime NOT NULL DEFAULT NOW()
);

/*
This tables contains additionl non-default mapping demends for this project.

colums:
id			- 	unique row identifier.
dataBase	-	the schema name where this demend will be added (Ex. mapping,projectSettings).
tableName	-	the table name where this demend will be added (Ex. devices,rooms).
varibleName	-	the varible data name of this demend (Ex. ip,mac-address,serial-number).
varibleType	-	the varible data type of this demend (Ex. int,boolean).
isNullAble	-	indicates whether or not this demend must be defined.
*/
CREATE TABLE projectSettings.additionalOptions
(
	`id` int PRIMARY KEY NOT NULL AUTO_INCREMENT,
	`dataBase` varchar(30) NOT NULL,
	`tableName` varchar(30) NOT NULL,
	`varibleType` varchar(30) NOT NULL,
	`isNullAble` boolean NOT NULL DEFAULT TRUE,
	`varibleName`  varchar(30) NOT NULL,
	`createdBy` int,
	FOREIGN KEY (createdBy)
		REFERENCES security.users(id)
		ON DELETE SET NULL,
	`dateCreated` datetime NOT NULL DEFAULT NOW()
);
