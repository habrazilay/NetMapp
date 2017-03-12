INSERT INTO `project`.`sites` (`id`,`name`,`city`,`address`,`createdBy`,`dateCreated`) VALUES 
(1,'Haifa','Haifa','Zabutinski 2',1,'2016-11-08 21:46:37'),
(2,'Data Replication','Tel Aviv','Ben Gurion 85',1,'2016-11-08 22:05:29'),
(3,'Main','Netanya','Habarzel 99',1,'2016-11-08 22:05:52'),
(4,'Data Center','Raanana','Hertzel 23',1,'2017-03-07 13:39:11'),
(5,'New Data Center - GDC','Hertzelia','Aba Even 12',1,'2017-03-07 13:49:11')
;

INSERT INTO `project`.`rooms` (`id`,`sid`,`name`,`floor`,`location`,`length`,`width`,`description`,`createdBy`,`dateCreated`,`cabAmount`) VALUES 
(1,4,'Main Room','-1','Data Building',8,8,'Main data center',1,'2017-03-07 13:41:37',0),
(2,1,'servers-backup','2','backup building',10,10,'backup room',1,'2017-03-07 14:02:49',0),
(3,2,'Cabin','0','woods',9,5,'chill',1,'2017-03-07 14:10:53',0),
(4,4,'Data Replication','3','Backup building',6,6,'DR Room of Main DC',1,'2017-03-07 14:12:06',0),
(5,5,'Main Room','-1','GDC Main',6,6,'Full GDC',1,'2017-03-07 14:12:06', 5)
;

INSERT INTO `mapping`.`cabinets` (`id`,`rid`,`name`,`clientName`,`uHeight`,`depth`,`width`,`height`,`description`) VALUES 
(1,1,'A1','A1-Servers',42,120,60,220,'Vmware Servers'),
(2,1,'A2','A2-LAN',40,120,60,190,'DMZ-LAN'),
(3,1,'A3','A3-WAN',21,140,60,100,'DMZ-WAN'),
(4,1,'B1','B1-BackBone',42,120,60,200,'Back Bone'),
(5,5,'A1','A1-BackBone',42,120,60,220,'Back Bone'),
(6,5,'A2','A2-WAN',42,120,60,220,'WAN'),
(7,5,'A3','A3-LAN',42,120,60,220,'LAN')
;
