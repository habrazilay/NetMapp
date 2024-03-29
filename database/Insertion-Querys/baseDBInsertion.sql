INSERT INTO `base`.`powerSocketAndPlugTypes` (`id`, `type`, `maxCurrent`, `isBasic`, `picLoc`) VALUES
(1, 'C13', '10A', TRUE, '/NetMapp/vendors/ms-Dropdown/images/PowerPlugs/C13.jpg'),
(2, 'C14', '10A', TRUE, '/NetMapp/vendors/ms-Dropdown/images/PowerPlugs/C14.jpg'),
(3, 'C19', '16A', TRUE, '/NetMapp/vendors/ms-Dropdown/images/PowerPlugs/C19.jpg'),
(4, 'C20', '16A', TRUE, '/NetMapp/vendors/ms-Dropdown/images/PowerPlugs/C20.jpg'),
(5, 'TypeH-Socket', '16A', TRUE, '/NetMapp/vendors/ms-Dropdown/images/PowerPlugs/TypeH-Socket.jpg'),
(6, 'TypeH-Plug', '16A', TRUE, '/NetMapp/vendors/ms-Dropdown/images/PowerPlugs/TypeH-Plug.jpg'),
(7, 'TypeC-Socket', '16A', TRUE, '/NetMapp/vendors/ms-Dropdown/images/PowerPlugs/TypeC-Socket.jpg'),
(8, 'TypeC-Plug', '16A', TRUE, '/NetMapp/vendors/ms-Dropdown/images/PowerPlugs/TypeC-Plug.jpg')
;

INSERT INTO `base`.`powerSocketAndPlugTypes` (`type`, `maxCurrent`) VALUES
('C1', '0.2A'),
('C2', '0.2A'),
('C3', '2.5A'),
('C4', '2.5A'),
('C5', '2.5A'),
('C6', '2.5A'),
('C7', '2.5A'),
('C8', '2.5A'),
('C9', '6A'),
('C10', '6A'),
('C11', '10A'),
('C12', '10A'),
('C13', '10A'),
('C15', '10A'),
('C16', '10A'),
('C17', '10A'),
('C18', '10A'),
('C21', '16A'),
('C22', '16A'),
('C23', '16A'),
('C24', '16A'),
('TypeA-Socket', '15A'),
('TypeA-Plug', '15A'),
('TypeB-Socket', '15A'),
('TypeB-Plug', '15A'),
('TypeC-Socket', '2.5A'),
('TypeC-Plug', '2.5A'),
('TypeD-Socket', '5A'),
('TypeD-Plug', '5A'),
('TypeE-Socket', '16A'),
('TypeE-Plug', '16A'),
('TypeF-Socket', '16A'),
('TypeF-Plug', '16A'),
('TypeG-Socket', '13A'),
('TypeG-Plug', '13A'),
('TypeI-Socket', '10A'),
('TypeI-Plug', '10A'),
('TypeJ-Socket', '10A'),
('TypeJ-Plug', '10A'),
('TypeK-Socket', '16A'),
('TypeK-Plug', '16A'),
('TypeL-Socket', '10/16A'),
('TypeL-Plug', '10/16A'),
('TypeM-Socket', '15A'),
('TypeM-Plug', '15A'),
('TypeN-Socket', '10/20A'),
('TypeN-Plug', '10/20A'),
('TypeO-Socket', '16A'),
('TypeO-Plug', '16A')
;


INSERT INTO `base`.`devices` (`brand`, `type`,`model` ,`uHeight`, `uLength`, `builtInPowerFeedType`, `builtInPowerFeedAmount`) VALUES 
('Cisco', 'Switch-Lan', 'Cisco Catalyst 2960X', 1, 1.0, 2, 1),
('Cisco', 'Switch-Lan', 'Cisco Catalyst 2960X-24Ports', 1, 1.0, 2, 1),
('Cisco', 'Switch-Lan', 'Cisco Catalyst 2960X-48Ports', 1, 1.0, 2, 1),
('Cisco', 'Switch-Lan', 'Cisco Catalyst 2960X-24Ports-PoE-370W', 1, 1.0, 2, 1),
('Cisco', 'Switch-Lan', 'Cisco Catalyst 2960X-48Ports-PoE-370W', 1, 1.0, 2, 1),
('Cisco', 'Switch-Lan', 'Cisco Catalyst 2960X-48Ports-PoE-740W', 1, 1.0, 2, 1),
('Cisco', 'Switch-Lan', 'Cisco Catalyst 3750', 1, 1.0, 2, 1),
('Cisco', 'Switch-Lan', 'Cisco Catalyst 3750v2-24', 1, 1.0, 2, 1),
('Cisco', 'Switch-Lan', 'Cisco Catalyst 3750v2-PoE-24', 1, 1.0, 2, 1),
('Cisco', 'Switch-Lan', 'Cisco Catalyst 3750v2-48', 1, 1.0, 2, 1),
('Cisco', 'Switch-Lan', 'Cisco Catalyst 3750v2-PoE-48', 1, 1.0, 2, 1),
('Cisco', 'Router-Branch', 'Cisco 4300 Series', NULL , NULL, 2, NULL),
('Cisco', 'Router-Branch', 'Cisco 4300 Series - 4221', 1, 1.0, 2, 1),
('Cisco', 'Router-Branch', 'Cisco 4300 Series - 4321', 1, 1.0, 2, 1),
('Cisco', 'Router-Branch', 'Cisco 4300 Series - 4331', 1, 1.0, 2, 1),
('Cisco', 'Router-Branch', 'Cisco 4300 Series - 4351', 2, 1.0, 2, 1),
('Cisco', 'Router-Branch', 'Cisco 4300 Series - 4531', 1, 1.0, 2, 2),
('Cisco', 'Router-Branch', 'Cisco 4300 Series - 4451', 2, 1.0, 2, 2),
('HP', 'Server-Tower', 'HP ProLiant ML110 G6', NULL , NULL, NULL, NULL),
('HP', 'Server-Tower', 'HP ProLiant ML115 G6', NULL , NULL, NULL, NULL),
('HP', 'Server-Tower', 'HP ProLiant ML150 G6', NULL , NULL, NULL, NULL),
('HP', 'Server-Rack Unit', 'HP ProLiant DL160 G6', 1, 1.0, NULL, NULL),
('HP', 'Server-Tower', 'HP ProLiant ML310 G5p', NULL , NULL, NULL, NULL),
('HP', 'Server-Tower', 'HP ProLiant ML310e Gen8', NULL , NULL, NULL, NULL),
('HP', 'Server-Tower', 'HP ProLiant ML310e Gen8 v2', NULL , NULL, NULL, NULL),
('HP', 'Server-Tower', 'HP ProLiant ML330 G6', NULL , NULL, NULL, NULL),
('HP', 'Server-Tower', 'HP ProLiant ML350 G6', NULL , NULL, NULL, NULL),
('HP', 'Server-Tower', 'HP ProLiant ML350e Gen8', NULL , NULL, NULL, NULL),
('HP', 'Server-Tower', 'HP ProLiant ML350e Gen8 v2', NULL , NULL, NULL, NULL),
('HP', 'Server-Tower', 'HP ProLiant ML350p Gen8', NULL , NULL, NULL, NULL),
('HP', 'Server-Tower', 'HP ProLiant ML350 Gen9', NULL , NULL, NULL, NULL),
('HP', 'Server-Tower', 'HP ProLiant ML370 G6', NULL , NULL, NULL, NULL),
('HP', 'Server-Rack Unit', 'HP ProLiant DL320 G5', 1, 1.0, NULL, NULL),
('HP', 'Server-Rack Unit', 'HP ProLiant DL320 G6', 1, 1.0, NULL, NULL),
('HP', 'Server-Rack Unit', 'HP ProLiant DL360 G5', 1, 1.0, NULL, NULL),
('HP', 'Server-Rack Unit', 'HP ProLiant DL360 G6', 1, 1.0, NULL, NULL),
('HP', 'Server-Rack Unit', 'HP ProLiant DL360 G7', 1, 1.0, NULL, NULL),
('HP', 'Server-Rack Unit', 'HP ProLiant DL360 G8', 1, 1.0, NULL, NULL),
('HP', 'Server-Rack Unit', 'HP ProLiant DL360E G8', 1, 1.0, NULL, NULL),
('HP', 'Server-Rack Unit', 'HP ProLiant DL380 G7', 2, 1.0, NULL, NULL),
('HP', 'Server-Rack Unit', 'HP ProLiant DL385', 2, 1.0, NULL, NULL),
('HP', 'Server-Rack Unit', 'HP ProLiant DL385 G2', 2, 1.0, NULL, NULL),
('HP', 'Server-Rack Unit', 'HP ProLiant DL385 G5', 2, 1.0, NULL, NULL),
('HP', 'Server-Rack Unit', 'HP ProLiant DL385 G5p', 2, 1.0, NULL, NULL),
('HP', 'Server-Rack Unit', 'HP ProLiant DL385 G6', 2, 1.0, NULL, NULL),
('HP', 'Server-Rack Unit', 'HP ProLiant DL385 G7', 2, 1.0, NULL, NULL),
('HP', 'Server-Rack Unit', 'HP ProLiant DL580 G4', 4, 1.0, NULL, NULL),
('HP', 'Server-Rack Unit', 'HP ProLiant DL580 G5', 4, 1.0, NULL, NULL),
('HP', 'Server-Rack Unit', 'HP ProLiant DL580 G6', 4, 1.0, NULL, NULL),
('HP', 'Server-Rack Unit', 'HP ProLiant DL580 G7', 4, 1.0, NULL, NULL),
('HP', 'Server-Rack Unit', 'HP ProLiant DL585', 4, 1.0, NULL, NULL),
('HP', 'Server-Rack Unit', 'HP ProLiant DL585 G2', 4, 1.0, NULL, NULL),
('HP', 'Server-Rack Unit', 'HP ProLiant DL585 G5', 4, 1.0, NULL, NULL),
('HP', 'Server-Rack Unit', 'HP ProLiant DL585 G6', 4, 1.0, NULL, NULL),
('HP', 'Server-Rack Unit', 'HP ProLiant DL785', 7, 1.0, NULL, NULL),
('HP', 'Server-Rack Unit', 'HP ProLiant DL785 G6', 7, 1.0, NULL, NULL),
('HP', 'Server-Rack Unit', 'HP ProLiant DL980 G7', 8, 1.0, NULL, NULL),
('HP', 'Server-Blade', 'HP ProLiant BL20p G1', NULL, NULL, NULL, NULL),
('HP', 'Server-Blade', 'HP ProLiant BL20p G2', NULL, NULL, NULL, NULL),
('HP', 'Server-Blade', 'HP ProLiant BL20p G3', NULL, NULL, NULL, NULL),
('HP', 'Server-Blade', 'HP ProLiant BL20p G4', NULL, NULL, NULL, NULL),
('HP', 'Server-Blade', 'HP ProLiant BL20p G5', NULL, NULL, NULL, NULL),
('HP', 'Server-Blade', 'HP ProLiant BL25p G1', NULL, NULL, NULL, NULL),
('HP', 'Server-Blade', 'HP ProLiant BL25p G2', NULL, NULL, NULL, NULL),
('HP', 'Server-Blade', 'HP ProLiant BL30p', NULL, NULL, NULL, NULL),
('HP', 'Server-Blade', 'HP ProLiant BL35p', NULL, NULL, NULL, NULL),
('HP', 'Server-Blade', 'HP ProLiant BL40p', NULL, NULL, NULL, NULL),
('HP', 'Server-Blade', 'HP ProLiant BL45p G1', NULL, NULL, NULL, NULL),
('HP', 'Server-Blade', 'HP ProLiant BL45p G2', NULL, NULL, NULL, NULL),
('HP', 'Server-Blade', 'HP ProLiant BL2x220c G5', NULL, NULL, NULL, NULL),
('HP', 'Server-Blade', 'HP ProLiant BL2x220c G6', NULL, NULL, NULL, NULL),
('HP', 'Server-Blade', 'HP ProLiant BL2x220c G7', NULL, NULL, NULL, NULL),
('HP', 'Server-Blade', 'HP ProLiant BL260c (G5 only)', NULL, NULL, NULL, NULL),
('HP', 'Server-Blade', 'HP ProLiant BL280c (G6 only)', NULL, NULL, NULL, NULL),
('HP', 'Server-Blade', 'HP ProLiant BL460c G1', NULL, NULL, NULL, NULL),
('HP', 'Server-Blade', 'HP ProLiant BL460c G5', NULL, NULL, NULL, NULL),
('HP', 'Server-Blade', 'HP ProLiant BL460c G6', NULL, NULL, NULL, NULL),
('HP', 'Server-Blade', 'HP ProLiant BL460c G7', NULL, NULL, NULL, NULL),
('HP', 'Server-Blade', 'HP ProLiant BL460c Gen8', NULL, NULL, NULL, NULL),
('HP', 'Server-Blade', 'HP ProLiant BL460c Gen9', NULL, NULL, NULL, NULL),
('HP', 'Server-Blade', 'HP ProLiant BL465c G1', NULL, NULL, NULL, NULL),
('HP', 'Server-Blade', 'HP ProLiant BL465c G5', NULL, NULL, NULL, NULL),
('HP', 'Server-Blade', 'HP ProLiant BL465c G6', NULL, NULL, NULL, NULL),
('HP', 'Server-Blade', 'HP ProLiant BL465c G7', NULL, NULL, NULL, NULL),
('HP', 'Server-Blade', 'HP ProLiant BL465c G8', NULL, NULL, NULL, NULL),
('HP', 'Server-Blade', 'HP ProLiant BL480c', NULL, NULL, NULL, NULL),
('HP', 'Server-Blade', 'HP ProLiant BL490c G6', NULL, NULL, NULL, NULL),
('HP', 'Server-Blade', 'HP ProLiant BL490c G7', NULL, NULL, NULL, NULL),
('HP', 'Server-Blade', 'HP ProLiant BL495c G5', NULL, NULL, NULL, NULL),
('HP', 'Server-Blade', 'HP ProLiant BL490c G6', NULL, NULL, NULL, NULL),
('HP', 'Server-Blade', 'HP ProLiant BL660c G8', NULL, NULL, NULL, NULL),
('HP', 'Server-Blade', 'HP ProLiant BL680c G1', NULL, NULL, NULL, NULL),
('HP', 'Server-Blade', 'HP ProLiant BL680c G5', NULL, NULL, NULL, NULL),
('HP', 'Server-Blade', 'HP ProLiant BL685c G1', NULL, NULL, NULL, NULL),
('HP', 'Server-Blade', 'HP ProLiant BL685c G5', NULL, NULL, NULL, NULL),
('HP', 'Server-Blade', 'HP ProLiant BL685c G6', NULL, NULL, NULL, NULL),
('HP', 'Server-Blade', 'HP ProLiant BL685c G7', NULL, NULL, NULL, NULL),
('HP', 'Server-Rack Unit', 'HP Integrity rx1600', 1, 1.0, NULL, NULL),
('HP', 'Server-Rack Unit', 'HP Integrity rx1600', 1, 1.0, NULL, NULL),
('HP', 'Server-Rack Unit', 'HP Integrity rx1620', 1, 1.0, NULL, NULL),
('HP', 'Server-Rack Unit', 'HP Integrity rx2600', 2, 1.0, NULL, NULL),
('HP', 'Server-Rack Unit', 'HP Integrity rx2600', 2, 1.0, NULL, NULL),
('HP', 'Server-Rack Unit', 'HP Integrity rx2620', 2, 1.0, NULL, NULL),
('HP', 'Server-Rack Unit', 'HP Integrity rx2660', 2, 1.0, NULL, NULL),
('HP', 'Server-Rack Unit', 'HP Integrity rx3600', 4, 1.0, NULL, NULL),
('HP', 'Server-Rack Unit', 'HP Integrity rx4610', 7, 1.0, NULL, NULL),
('HP', 'Server-Rack Unit', 'HP Integrity rx4640', 4, 1.0, NULL, NULL),
('HP', 'Server-Rack Unit', 'HP Integrity rx5670', 7, 1.0, NULL, NULL),
('HP', 'Server-Rack Unit', 'HP Integrity rx6600', 7, 1.0, NULL, NULL),
('HP', 'Server-Rack Unit', 'HP Integrity rx7600', 10, 1.0, NULL, NULL),
('HP', 'Server-Rack Unit', 'HP Integrity rx7610', 10, 1.0, NULL, NULL),
('HP', 'Server-Rack Unit', 'HP Integrity rx7620', 10, 1.0, NULL, NULL),
('HP', 'Server-Rack Unit', 'HP Integrity rx7640', 10, 1.0, NULL, NULL),
('HP', 'Server-Rack Unit', 'HP Integrity rx8600', 17, 1.0, NULL, NULL),
('HP', 'Server-Rack Unit', 'HP Integrity rx8620', 17, 1.0, NULL, NULL),
('HP', 'Server-Rack Unit', 'HP Integrity rx8640', 17, 1.0, NULL, NULL),
('HP', 'Server-Rack Unit', 'HP Integrity BL60p', NULL, NULL, NULL, NULL),
('HP', 'Server-Rack Unit', 'HP Integrity BL860c', NULL, NULL, NULL, NULL),
('HP', 'Server-Rack Unit', 'HP Integrity BL870c', NULL, NULL, NULL, NULL)
;

INSERT INTO `base`.`plugTypes` (`id`,`type`,`connector`) VALUES 
('1', 'Network', 'RJ-45'),
('2', 'Network', 'LC-Duplex'),
('3', 'Network', 'LC-Single'),
('4', 'Network', 'RJ-11'),
('5', 'Network', 'SC-Duplex'),
('6', 'Network', 'SC-Single'),
('7', 'Network', 'FC'),
('8', 'Network', 'ST'),
('9', 'Network', 'E2000'),
('10', 'Network', 'MTRJ'),
('11', 'Network', 'MU'),
('12', 'Network', 'DIN'),
('13', 'Network', 'SMA'),
('14', 'Network', 'FDDI'),
('15', 'Network', 'DAC')
;

INSERT INTO `base`.`powerIndustrialPlugTypes` (`type`, `voltRange`,	`current`, `phases`, `isBasic`, `picLoc`) VALUES
('IEC60309 Yellow', '110-130V', '16A', '2P+E', TRUE, '/NetMapp/vendors/ms-Dropdown/images/PowerPlugs/IEC60309-IP44-Yellow-Socket.jpg'),
('IEC60309 Blue', '220/250V', '16A', '2P+E', TRUE, '/NetMapp/vendors/ms-Dropdown/images/PowerPlugs/IEC60309-IP44-Blue-Socket.jpg'),
('IEC60309 Blue', '220/250V', '32A', '2P+E', TRUE, '/NetMapp/vendors/ms-Dropdown/images/PowerPlugs/IEC60309-IP44-Blue-Socket.jpg'),
('IEC60309 Red', '220-240V', '16A', '3P+N+E', TRUE, '/NetMapp/vendors/ms-Dropdown/images/PowerPlugs/IEC60309-IP44-Red-Socket.jpg'),
('IEC60309 Red', '220-240V', '32A', '3P+N+E', TRUE, '/NetMapp/vendors/ms-Dropdown/images/PowerPlugs/IEC60309-IP44-Red-Socket.jpg'),
('IEC60309 Red', '220-240V', '63A', '3P+N+E', TRUE, '/NetMapp/vendors/ms-Dropdown/images/PowerPlugs/IEC60309-IP44-Red-Socket.jpg')
;

INSERT INTO `base`.`powerIndustrialPlugTypes` (`type`, `voltRange`,	`current`, `phases`) VALUES
('IEC60309 Yellow', '110-130V', '32A', '2P+E'),
('IEC60309 Yellow', '120V', '20A', '2P+E'),
('IEC60309 Yellow', '120V', '30A', '2P+E'),
('IEC60309 Blue', '220/250V', '16A', '3P+E'),
('IEC60309 Blue', '208-250V', '16A', '3P+N+E'),
('IEC60309 Blue', '220/250V', '20A', '2P+E'),
('IEC60309 Blue', '220/250V', '16A / 20A', '2P+E'),
('IEC60309 Blue', '120-144V', '16A', '3P+N+E'),
('IEC60309 Blue', '120/208-144/250V', '16A', '3P+N+E'),
('IEC60309 Blue', '220/250V', '30A', '2P+E'),
('IEC60309 Blue', '220/250V', '32A / 30A', '2P+E'),
('IEC60309 Blue', '120-144V', '32A', '3P+N+E'),
('IEC60309 Blue', '120/208-144/250V', '32A', '3P+N+E'),
('IEC60309 Blue', '220/250V', '32A', '3P+E'),
('IEC60309 Blue', '208-250V', '32A', '3P+N+E'),
('IEC60309 Blue', '220/250V', '60A', '2P+E'),
('IEC60309 Blue', '220/250V', '63A', '2P+E'),
('IEC60309 Blue', '220/250V', '63A / 60A', '2P+E'),
('IEC60309 Blue', '220/250V', '63A', '3P+E'),
('IEC60309 Blue', '120-144V', '63A', '3P+N+E'),
('IEC60309 Blue', '208-250V', '63A', '3P+N+E'),
('IEC60309 Blue', '120/208-144/250V', '63A', '3P+N+E'),
('IEC60309 Blue', '220/250V', '125A', '2P+E'),
('IEC60309 Blue', '220/250V', '125A', '3P+E'),
('IEC60309 Blue', '120-144V', '125A', '3P+N+E'),
('IEC60309 Blue', '208-250V', '125A', '3P+N+E'),
('IEC60309 Blue', '120/208-144/250V', '125A', '3P+N+E'),
('IEC60309 Red', '380/415V', '16A', '2P+E'),
('IEC60309 Red', '380/415V', '16A', '3P+E'),
('IEC60309 Red', '220-240V', '20A', '3P+N+E'),
('IEC60309 Red', '220-240V', '16A / 20A', '3P+N+E'),
('IEC60309 Red', '380-415V', '16A', '3P+N+E'),
('IEC60309 Red', '380-415V', '20A', '3P+N+E'),
('IEC60309 Red', '380-415V', '16A / 20A', '3P+N+E'),
('IEC60309 Red', '220/380-240/415V', '16A / 20A', '3P+N+E'),
('IEC60309 Red', '380/415V', '32A', '2P+E'),
('IEC60309 Red', '380/415V', '32A', '3P+E'),
('IEC60309 Red', '220-240V', '30A', '3P+N+E'),
('IEC60309 Red', '220-240V', '32A / 30A', '3P+N+E'),
('IEC60309 Red', '380-415V', '30A', '3P+N+E'),
('IEC60309 Red', '380-415V', '32A', '3P+N+E'),
('IEC60309 Red', '380-415V', '32A / 30A', '3P+N+E'),
('IEC60309 Red', '220/380-240/415V', '32A / 30A', '3P+N+E'),
('IEC60309 Red', '380/415V', '63A', '2P+E'),
('IEC60309 Red', '380/415V', '63A', '3P+E'),
('IEC60309 Red', '220-240V', '60A', '3P+N+E'),
('IEC60309 Red', '220-240V', '63A / 60A', '3P+N+E'),
('IEC60309 Red', '380-415V', '60A', '3P+N+E'),
('IEC60309 Red', '380-415V', '63A', '3P+N+E'),
('IEC60309 Red', '380-415V', '63A / 60A', '3P+N+E'),
('IEC60309 Red', '220/380-240/415V', '63A / 60A', '3P+N+E'),
('IEC60309 Red', '380/415V', '125A', '2P+E'),
('IEC60309 Red', '380/415V', '125A', '3P+E'),
('IEC60309 Red', '220-240V', '100A', '3P+N+E'),
('IEC60309 Red', '220-240V', '125A', '3P+N+E'),
('IEC60309 Red', '220-240V', '125A / 100A', '3P+N+E'),
('IEC60309 Red', '380-415V', '100A', '3P+N+E'),
('IEC60309 Red', '380-415V', '125A', '3P+N+E'),
('IEC60309 Red', '380-415V', '125A / 100A', '3P+N+E'),
('IEC60309 Red', '220/380-240/415V', '125A / 100A', '3P+N+E')
;



INSERT INTO `base`.`opticalTransceiverTypes` (`model`, `type`, `plugTypeid`) VALUES
('Generic Single-Mode LC', 'SFP/SFP+/XFP', 2),
('Generic Multi-Mode LC', 'SFP/SFP+/XFP', 2),
('Generic RJ45', 'SFP/SFP+/XFP', 1),
('Generic RJ45 10G', 'SFP/SFP+/XFP', 1),
('Generic Multi-Mode 6G', 'SFP+', 2),
('Generic Multi-Mode 8.5G', 'SFP+', 2),
('Generic Multi-Mode 10G', 'SFP+', 2),
('Generic Single-Mode 6G', 'SFP+', 2),
('Generic Single-Mode 8.5G', 'SFP+', 2),
('Generic Single-Mode 10G', 'SFP+', 2),
('Generic Multi-Mode 10G', 'SFP+', 2),
('Generic Multi-Mode 10G', 'SFP+', 2),
('10GBASE-USR',	'X2', 2),
('10GBASE-USR', 'SFP+', 2),
('10GBASE-SR', 'XENPAK', 2),
('10GBASE-SR', 'X2', 2),
('10GBASE-SR', 'XFP', 2),
('10GBASE-SR', 'SFP+', 2),
('10GBASE-LR',	'XENPAK', 2),
('10GBASE-LR', 'X2', 2),
('10GBASE-LR', 'XFP', 2),
('10GBASE-LR', 'SFP+', 2),
('10GBASE-ER',	'XENPAK', 2),
('10GBASE-ER', 'X2', 2),
('10GBASE-ER', 'XFP', 2),
('10GBASE-ER', 'SFP+', 2),
('10GBASE-ZR',	'XENPAK', 2),
('10GBASE-ZR', 'X2', 2),
('10GBASE-ZR', 'XFP', 2),
('10GBASE-ZR', 'SFP+', 2),
('10GBASE-LX4',	'XENPAK', 2),
('10GBASE-LX4', 'X2', 2),
('10GBASE-LX4', 'SFP+', 2),
('10GBASE-LRM',	'XENPAK', 2),
('10GBASE-LRM', 'X2', 2),
('10GBASE-LRM', 'SFP+', 2),
('10GBASE-CX4',	'XENPAK', 2),
('10GBASE-CX4', 'X2', 2)
;
