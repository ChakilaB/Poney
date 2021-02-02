--Création de la base 

DROP DATABASE IF EXISTS poney;
CREATE DATABASE poney;
USE poney;

--Création des utilisateurs et affectation des droits

CREATE USER IF NOT EXISTS 'Lola'@'localhost' IDENTIFIED BY 'coucou';
GRANT ALL ON poney.* TO 'Lola'@'localhost'; 

-- création des tables

CREATE TABLE `Adherents` (
adherentID int (11) PRIMARY KEY AUTO_INCREMENT,
prenom varchar (50) NOT NULL,
nom varchar (50) NOT NULL,
pseudo varchar (20)  UNIQUE NOT NULL,
`password` varchar (255) NOT NULL, 
email varchar (128) UNIQUE NOT NULL, 
numero varchar (20) UNIQUE NOT NULL,
adresse1 varchar (128) NOT NULL,
code_postal int, 
ville varchar (20),
dateAdhesion date NOT NULL,
INDEX (nom)
);



CREATE TABLE `interets` (
`interetId` int PRIMARY KEY AUTO_INCREMENT ,
Nom varchar(20) unique NOT NULL,)




CREATE TABLE profils(
profilId int PRIMARY KEY AUTO_INCREMENT,
Titre varchar(50) NOT NULL,
Photo varchar(50),
`Description`  text NOT NULL,
AderentID  int NOT NULL,
CONSTRAINT adherentID_FK FOREIGN KEY (adherentID) REFERENCES adherents (adherentID)
 );

CREATE TABLE `interetAdherent`(
 centreInteretID int NOT NULL,
  adherentID int NOT NULL,

  PRIMARY KEY (centreInteretID, adherentID),

  CONSTRAINT interet_FK FOREIGN KEY (centreInteretID) REFERENCES interets (interetId),
  CONSTRAINT adherentID_interet_FK FOREIGN KEY (adherentID) REFERENCES Adherents (adherentID)
)
