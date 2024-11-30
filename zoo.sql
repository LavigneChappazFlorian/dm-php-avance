CREATE TABLE IF NOT EXISTS `animals` (
	`id` int AUTO_INCREMENT NOT NULL UNIQUE,
	`name` varchar(50) NOT NULL,
	`description` varchar(250) NOT NULL,
	`specie` varchar(100) NOT NULL,
	`created_at` varchar(50) NOT NULL,
	`enclos_id` int NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE IF NOT EXISTS `enclosure` (
	`id` int AUTO_INCREMENT NOT NULL UNIQUE,
	`name` varchar(50) NOT NULL,
	`description` varchar(250) NOT NULL,
	`created_at` varchar(50) NOT NULL,
	PRIMARY KEY (`id`)
);

ALTER TABLE `animals` ADD CONSTRAINT `animals_fk5` FOREIGN KEY (`enclos_id`) REFERENCES `enclosure`(`id`);
