CREATE TABLE `events` (
	`id` INT(50) NOT NULL AUTO_INCREMENT,
	`title` varchar(255) NOT NULL,
	`date_start` DATE NOT NULL,
	`date_end` DATE NOT NULL,
	`organisator` INT,
	PRIMARY KEY (`id`)
);

CREATE TABLE `users` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`name` varchar(20) NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `participants` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`id_event` INT NOT NULL,
	`id_participant` INT NOT NULL,
	PRIMARY KEY (`id`)
);

ALTER TABLE `events` ADD CONSTRAINT `events_fk0` FOREIGN KEY (`organisator`) REFERENCES `users`(`id`);

ALTER TABLE `participants` ADD CONSTRAINT `participants_fk0` FOREIGN KEY (`id_event`) REFERENCES `events`(`id`);

ALTER TABLE `participants` ADD CONSTRAINT `participants_fk1` FOREIGN KEY (`id_participant`) REFERENCES `users`(`id`);


