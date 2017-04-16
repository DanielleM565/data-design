DROP TABLE IF EXISTS favorite;
DROP TABLE IF EXISTS product;
DROP TABLE IF EXISTS profile;

CREATE TABLE profile (
profileId INT UNSIGNED AUTO_INCREMENT NOT NULL,
profileUserName VARCHAR(128) UNIQUE NOT NULL,
profileEmail VARCHAR(128) UNIQUE NOT NULL,
profileActivationToken CHAR(32),
profileAtHandle VARCHAR(32) NOT NULL,
profileHash CHAR (128) NOT NULL,
profileSalt CHAR (64) NOT NULL,
UNIQUE(profileEmail),
UNIQUE(profileAtHandle),

PRIMARY KEY(profileId)

);

CREATE TABLE product (

	productId INT UNSIGNED AUTO_INCREMENT NOT NULL,
	productContent VARCHAR(140) NOT NULL,
	productDescription VARCHAR (320) NOT NULL,
	productTitle VARCHAR(128) NOT NULL,
	productPrice

);