CREATE TABLE `personne`
(
	`pseudo` VARCHAR(30) NOT NULL,
	`nom_utilisateur` VARCHAR(30) ,
	`adresse_email` VARCHAR(100) NOT NULL,
	`mot_de_passe` VARCHAR(100) NOT NULL,
	`adresse_ip` VARCHAR(20) ,
	`token` TEXT NOT NULL,
	`photo_de_profil` TEXT(30),
	`nombre_communaute` INTEGER(100),
	`nombre_amiprive` INTEGER(100),
	`nombre_followers` INTEGER(100),
	`compte_confirme` BOOLEAN,

	UNIQUE(`pseudo`),

	PRIMARY KEY(`pseudo`)
);







CREATE TABLE `photo`
(
	`id_photo` INTEGER(100) NOT NULL AUTO_INCREMENT,
	`fichier_photo` VARCHAR(30) NOT NULL ,
	`pseudo` VARCHAR(30) ,

	FOREIGN KEY(`pseudo`) REFERENCES `personne`(`pseudo`),

	PRIMARY KEY(`id_photo`)
);

CREATE TABLE `storie`
(
	`id_storie` INTEGER(100) NOT NULL AUTO_INCREMENT,
	`fichier_storie` VARCHAR(30) NOT NULL ,
	`pseudo` VARCHAR(30) ,

	FOREIGN KEY(`pseudo`) REFERENCES `personne`(`pseudo`),

	PRIMARY KEY(`id_storie`)
);

CREATE TABLE `amiprive`
(
	`id_amiprive` INTEGER(100) NOT NULL AUTO_INCREMENT,
	`pseudo` VARCHAR(30) NOT NULL,
	`nom_utilisateur` VARCHAR(30) NOT NULL,
	`adresse_email` VARCHAR(100) NOT NULL,
	`mot_de_passe` VARCHAR(100) NOT NULL,
	`adresse_ip` INTEGER(100),
	`photo_de_profil` VARCHAR(30),
	`nombre_communaute` INTEGER(100),
	`nombre_amiprive` INTEGER(100),
	`nombre_followers` INTEGER(100),

	PRIMARY KEY(`id_amiprive`)
);

CREATE TABLE `followup`
(
	`id_followup` INTEGER(100) NOT NULL AUTO_INCREMENT,
	`pseudo` VARCHAR(30) NOT NULL,
	`nom_utilisateur` VARCHAR(30) NOT NULL,
	`adresse_email` VARCHAR(100) NOT NULL,
	`mot_de_passe` VARCHAR(100) NOT NULL,
	`adresse_ip` INTEGER(100),
	`photo_de_profil` VARCHAR(30),
	`nombre_communaute` INTEGER(100),
	`nombre_amiprive` INTEGER(100),
	`nombre_followers` INTEGER(100),

	PRIMARY KEY(`id_followup`)
);

CREATE TABLE `photoamiprive`
(
	`id_photoamiprive` INTEGER(100) NOT NULL AUTO_INCREMENT,
	`fichier_photoamiprive` VARCHAR(30) NOT NULL ,
	`id_amiprive` INTEGER(100) NOT NULL,
	`pseudo` VARCHAR(30) NOT NULL,
	`nombredejaime` BIGINT NOT NULL,
	`photo_de_profil` TEXT(30) NOT NULL,


	FOREIGN KEY(`id_amiprive`) REFERENCES `amiprive`(`id_amiprive`),

	PRIMARY KEY(`id_photoamiprive`)
);

CREATE TABLE `storieamiprive`
(
	`id_storieamiprive` INTEGER(100) NOT NULL AUTO_INCREMENT,
	`fichier_storieamiprive` VARCHAR(30) NOT NULL ,
	`id_amiprive` INTEGER(100) NOT NULL ,
	`pseudo` VARCHAR(30) NOT NULL,
	`nom_utilisateur` VARCHAR(30) NOT NULL,
	`adresse_email` VARCHAR(100) NOT NULL,
	`mot_de_passe` VARCHAR(100) NOT NULL,
	`adresse_ip` INTEGER(100),
	`photo_de_profil` VARCHAR(30),

	FOREIGN KEY(`id_amiprive`) REFERENCES `amiprive`(`id_amiprive`),

	PRIMARY KEY(`id_storieamiprive`)
);

CREATE TABLE `storiefollowup`
(
	`id_storiefollowup` INTEGER(100) NOT NULL AUTO_INCREMENT,
	`fichier_storiefollowup` VARCHAR(30) NOT NULL ,
	`id_followup` INTEGER(100) NOT NULL ,
	`pseudo` VARCHAR(30) NOT NULL,

	FOREIGN KEY(`id_followup`) REFERENCES `followup`(`id_followup`),

	PRIMARY KEY(`id_storiefollowup`)
);

CREATE TABLE `notification`
(
	`id_notification` INTEGER(100) NOT NULL AUTO_INCREMENT,
	`message_notification` VARCHAR(100) NOT NULL ,
	`pseudo` VARCHAR(30) ,

	FOREIGN KEY(`pseudo`) REFERENCES `personne`(`pseudo`),

	PRIMARY KEY(`id_notification`)
);

CREATE TABLE `evenement`
(
	`id_evenement` INTEGER(100) NOT NULL AUTO_INCREMENT ,
	`nom_evenement` VARCHAR(100) NOT NULL,
	`date_création_evenement` INTEGER(100),
	`photo_profil_evenement` VARCHAR(100) NOT NULL,

	PRIMARY KEY(`id_evenement`)
);

CREATE TABLE `communaute`
(
	`id_communaute` INTEGER(100) NOT NULL AUTO_INCREMENT,
	`nom_communaute` VARCHAR(30) NOT NULL,
	`nombre de membre` INTEGER(30) NOT NULL,

	PRIMARY KEY(`id_communaute`)
);

CREATE TABLE `messageevenement`
(
	`id_messageevenement` INTEGER(100) NOT NULL AUTO_INCREMENT,
	`message_messageevenement` VARCHAR(100) NOT NULL ,
	`id_evenement` INTEGER(100) NOT NULL ,

	FOREIGN KEY(`id_evenement`) REFERENCES `evenement`(`id_evenement`),

	PRIMARY KEY(`id_messageevenement`)
);

CREATE TABLE `messagecommunaute`
(
	`id_messagecommunaute` INTEGER(100) NOT NULL AUTO_INCREMENT,
	`message_messagecommunaute` VARCHAR(100) NOT NULL ,
	`id_communaute` INTEGER(100) NOT NULL,

	FOREIGN KEY(`id_communaute`) REFERENCES `communaute`(`id_communaute`),

	PRIMARY KEY(`id_messagecommunaute`)
);

CREATE TABLE `destinatairemessageindividuel`
(
	`id_destinatairemessageindividuel` INT AUTO_INCREMENT,
	`pseudo_destinatairemessageindividuel` VARCHAR(30) NOT NULL,
	`nomutilisateur_destinatairemessageindividuel` VARCHAR(30) NOT NULL,

	UNIQUE(`pseudo_destinatairemessageindividuel`),

	PRIMARY KEY(`id_destinatairemessageindividuel`)
);

CREATE TABLE `messageindividuel`
(
	`id_messageindividuel` INTEGER(100) NOT NULL AUTO_INCREMENT,
	`pseudo` VARCHAR(30) NOT NULL,
	`	photodeprofil_pseudo` VARCHAR(100) NOT NULL ,
	`id_destinatairemessageindividuel` INT ,
	`pseudo_destinatairemessageindividuel` VARCHAR(30) NOT NULL,
	`nomutilisateur_destinatairemessageindividuel` VARCHAR(30) NOT NULL,
	`photodeprofil_pseudodestinatairemessageindividuel` VARCHAR(100) NOT NULL ,
	`message_messageindividuel` VARCHAR(100) NOT NULL ,
	`quiaenvoyederniermessage` VARCHAR(100) NOT NULL ,

	FOREIGN KEY(`pseudo`) REFERENCES `personne`(`pseudo`),
	FOREIGN KEY(`id_destinatairemessageindividuel`) REFERENCES `destinatairemessageindividuel`(`id_destinatairemessageindividuel`),


	PRIMARY KEY(`id_messageindividuel`)
);

CREATE TABLE `conversationindividuel`
(
	`pseudo` VARCHAR(30) NOT NULL,
	`id_destinatairemessageindividuel` INT AUTO_INCREMENT,
	`pseudo_destinatairemessageindividuel` VARCHAR(30) NOT NULL,
	`nomutilisateur_destinatairemessageindividuel` VARCHAR(30) NOT NULL,
	`dernier_message` VARCHAR(30) NOT NULL,
	`recuouenvoyeetluounonlu` TEXT(100) NOT NULL,
	`svg_recuouenvoyeetluounonlu` TEXT(30) NOT NULL,
	`nombredemessagerecuenattente` INT NOT NULL,
	`date_derniermessage` TIMESTAMP NOT NULL,

	FOREIGN KEY(`pseudo`) REFERENCES `personne`(`pseudo`),
	FOREIGN KEY(`id_destinatairemessageindividuel`) REFERENCES `destinatairemessageindividuel`(`id_destinatairemessageindividuel`),

	PRIMARY KEY(`pseudo`,`id_destinatairemessageindividuel`)
);

CREATE TABLE `participantevenement`
(
	`id_participantevenement` INTEGER(100) NOT NULL AUTO_INCREMENT,
	`id_evenement` INTEGER(100) ,
	`pseudo` VARCHAR(30) ,
	`nom_utilisateur` VARCHAR(30) NOT NULL,
	`adresse_email` VARCHAR(100) NOT NULL,
	`mot_de_passe` VARCHAR(100) NOT NULL,
	`adresse_ip` INTEGER(100),
	`photo_de_profil` VARCHAR(30),
	`nombre_communaute` INTEGER(100),
	`nombre_amiprive` INTEGER(100),
	`nombre_followers` INTEGER(100),

	PRIMARY KEY(`id_participantevenement`),
	FOREIGN KEY(`id_evenement`) REFERENCES `evenement`(`id_evenement`)
);

CREATE TABLE `participantcommunaute`
(
	`id_participantcommunaute` INTEGER(100) NOT NULL AUTO_INCREMENT,
	`id_communaute` INTEGER(100) ,
	`pseudo` VARCHAR(30) ,
	`nom_utilisateur` VARCHAR(30) NOT NULL,
	`adresse_email` VARCHAR(100) NOT NULL,
	`mot_de_passe` VARCHAR(100) NOT NULL,
	`adresse_ip` INTEGER(100),
	`photo_de_profil` VARCHAR(30),
	`nombre_communaute` INTEGER(100),
	`nombre_amiprive` INTEGER(100),
	`nombre_followers` INTEGER(100),

	PRIMARY KEY(`id_participantcommunaute`),
	FOREIGN KEY(`id_communaute`) REFERENCES `communaute`(`id_communaute`)
);

CREATE TABLE `administrateur`
(
	`id_administrateur` INTEGER(100) NOT NULL AUTO_INCREMENT,
	`id_communaute` INTEGER(100) NOT NULL ,
	`pseudo` VARCHAR(30) NOT NULL,
	`nom_utilisateur` VARCHAR(30) NOT NULL,
	`adresse_email` VARCHAR(100) NOT NULL,
	`mot_de_passe` VARCHAR(100) NOT NULL,
	`adresse_ip` INTEGER(100),
	`photo_de_profil` VARCHAR(30),
	`nombre_communaute` INTEGER(100),
	`nombre_amiprive` INTEGER(100),
	`nombre_followers` INTEGER(100),

	PRIMARY KEY(`id_administrateur`),
	FOREIGN KEY(`pseudo`) REFERENCES `personne`(`pseudo`),
	FOREIGN KEY(`id_communaute`) REFERENCES `communaute`(`id_communaute`)
);

CREATE TABLE `personneenattente`
(
	`id_personneenattente` INTEGER(100) NOT NULL AUTO_INCREMENT,
	`pseudo` VARCHAR(30) NOT NULL,
	`nom_utilisateur` VARCHAR(30) NOT NULL,
	`adresse_email` VARCHAR(100) NOT NULL,
	`mot_de_passe` VARCHAR(100) NOT NULL,
	`adresse_ip` INTEGER(100),
	`photo_de_profil` VARCHAR(30),
	`nombre_communaute` INTEGER(100),
	`nombre_amiprive` INTEGER(100),
	`nombre_followers` INTEGER(100),

	PRIMARY KEY(`id_personneenattente`),
	FOREIGN KEY(`pseudo`) REFERENCES `personne`(`pseudo`)
);

CREATE TABLE `envoyemessageà`
(
	`id_envoimessageà` INTEGER(100) NOT NULL AUTO_INCREMENT,
	`pseudo` VARCHAR(30) NOT NULL,
	`nom_utilisateur` VARCHAR(30) NOT NULL,
	`adresse_email` VARCHAR(100) NOT NULL,
	`mot_de_passe` VARCHAR(100) NOT NULL,
	`adresse_ip` INTEGER(100),
	`photo_de_profil` VARCHAR(30),
	`nombre_communaute` INTEGER(100),
	`nombre_amiprive` INTEGER(100),
	`nombre_followers` INTEGER(100),

	PRIMARY KEY(`id_envoimessageà`),
	FOREIGN KEY(`pseudo`) REFERENCES `personne`(`pseudo`)
);

CREATE TABLE `personneappartientcommunaute`
(
	`id_communaute` INTEGER(100) NOT NULL,
	`pseudo` VARCHAR(30) NOT NULL ,

	PRIMARY KEY(`pseudo`, `id_communaute`)

);

CREATE TABLE `personneparticipeevenement`
(
	`id_evenement` INTEGER(100) NOT NULL,
	`pseudo` VARCHAR(30) NOT NULL,

	PRIMARY KEY(`pseudo`, `id_evenement`)
);

CREATE TABLE `follower`
(
	`id_follower` INTEGER(100) NOT NULL AUTO_INCREMENT,
	`pseudo` VARCHAR(30) NOT NULL,
	`nom_utilisateur` VARCHAR(30) NOT NULL,
	`adresse_email` VARCHAR(100) NOT NULL,
	`mot_de_passe` VARCHAR(100) NOT NULL,
	`adresse_ip` INTEGER(100),
	`photo_de_profil` VARCHAR(30),
	`nombre_communaute` INTEGER(100),
	`nombre_amiprive` INTEGER(100),
	`nombre_followers` INTEGER(100),

	PRIMARY KEY(`id_follower`)
);

CREATE TABLE `personneaamiprive`
(
	`id_amiprive` INTEGER(100) NOT NULL ,
	`pseudo` VARCHAR(30) NOT NULL,
	`nom_utilisateur` VARCHAR(30) NOT NULL,
	`adresse_email` VARCHAR(100) NOT NULL,
	`mot_de_passe` VARCHAR(100) NOT NULL,
	`adresse_ip` INTEGER(100),
	`photo_de_profil` VARCHAR(30),
	`nombre_communaute` INTEGER(100),
	`nombre_amiprive` INTEGER(100),
	`nombre_followers` INTEGER(100),

	PRIMARY KEY(`pseudo`, `id_amiprive`),
	FOREIGN KEY(`id_amiprive`) REFERENCES `amiprive`(`id_amiprive`)

);

CREATE TABLE `personneafollower`
(
	`id_follower` INTEGER(100) NOT NULL,
	`pseudo` VARCHAR(30) NOT NULL,
	`nom_utilisateur` VARCHAR(30) NOT NULL,
	`adresse_email` VARCHAR(100) NOT NULL,
	`mot_de_passe` VARCHAR(100) NOT NULL,
	`adresse_ip` INTEGER(100),
	`photo_de_profil` VARCHAR(30),
	`nombre_communaute` INTEGER(100),
	`nombre_amiprive` INTEGER(100),
	`nombre_followers` INTEGER(100),

	PRIMARY KEY(`pseudo`, `id_follower`),
	FOREIGN KEY(`id_follower`) REFERENCES `follower`(`id_follower`)
);

CREATE TABLE `personneafollowup`
(
	`id_followup` INTEGER(100) NOT NULL ,
	`pseudo` VARCHAR(30) NOT NULL,
	`nom_utilisateur` VARCHAR(30) NOT NULL,
	`adresse_email` VARCHAR(100) NOT NULL,
	`mot_de_passe` VARCHAR(100) NOT NULL,
	`adresse_ip` INTEGER(100),
	`photo_de_profil` VARCHAR(30),
	`nombre_communaute` INTEGER(100),
	`nombre_amiprive` INTEGER(100),
	`nombre_followers` INTEGER(100),

	PRIMARY KEY(`pseudo`, `id_followup`),
	FOREIGN KEY(`id_followup`) REFERENCES `followup`(`id_followup`)
);

CREATE TABLE `personnevoitstorieamiprive`
(
	`pseudo` VARCHAR(30) NOT NULL,
	`id_storieamiprive` INTEGER(100) NOT NULL ,
	`fichier_storieamiprive` VARCHAR(30) NOT NULL ,

	

	PRIMARY KEY(`pseudo`, `id_storieamiprive`)
);







/*Afficher la storie de tous les amis prives */
SELECT DISTINCT pseudo FROM storieamiprive;

/*Afficher la storie de tous les followups qui ne sont pas amis prives */
SELECT DISTINCT pseudo FROM storiefollowup WHERE pseudo NOT IN ( SELECT pseudo FROM storieamiprive);

/*Afficher le contenu de la storie d'un ami prive */
SELECT fichier_storieamiprive FROM storieamiprive WHERE pseudo='".$pseudo."' ;





