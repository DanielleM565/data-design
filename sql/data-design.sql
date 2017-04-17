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
	/*productContent I plan for this to be a picture*/
	productDescription VARCHAR (520) NOT NULL,
	/* similar to tweet content in example */
	productTitle VARCHAR(128) NOT NULL,
	/*productPrice, not sure how to do a price */
	INDEX (productId),
	FOREIGN KEY(productId) REFERENCES profile(profileId),
	PRIMARY KEY(productId),

);

CREATE TABLE favorite (

	favoriteProductId INT UNSIGNED NOT NULL,
	favoriteProfileId INT UNSIGNED NOT NULL,

);