CREATE TABLE `articles` (
	`Id` INT(11) NOT NULL DEFAULT '0',
	`Titre` VARCHAR(50) NULL DEFAULT NULL COLLATE 'utf8mb4_general_ci',
	`Description` TEXT(65535) NULL DEFAULT NULL COLLATE 'utf8mb4_general_ci',
	`DateAjout` DATE NULL DEFAULT NULL,
	`Auteur` VARCHAR(50) NULL DEFAULT NULL COLLATE 'utf8mb4_general_ci',
	`ImageRepository` VARCHAR(50) NULL DEFAULT NULL COLLATE 'utf8mb4_general_ci',
	`ImageFileName` VARCHAR(50) NULL DEFAULT NULL COLLATE 'utf8mb4_general_ci',
	`Categorie` INT(10) UNSIGNED NULL DEFAULT NULL,
	PRIMARY KEY (`Id`) USING BTREE,
	INDEX `Categorie` (`Categorie`) USING BTREE,
	CONSTRAINT `Catégorie de l'article ` FOREIGN KEY (`Categorie`) REFERENCES `cesiblog`.`categories` (`ID`) ON UPDATE RESTRICT ON DELETE RESTRICT
)
COLLATE='utf8mb4_general_ci'
ENGINE=InnoDB
;


	`Icon` VARCHAR(50) NULL DEFAULT NULL COLLATE 'utf8mb4_general_ci',
	PRIMARY KEY (`ID`) USING BTREE
)
COLLATE='utf8mb4_general_ci'
ENGINE=InnoDB
AUTO_INCREMENT=8
;
