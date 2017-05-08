<?php

namespace Edu\Cnm\DataDesign;
require_once("autoload.php");

/**
 * Cross section of product like
 *
 * This is a cross section of what probably occurs when a profile favorites a product on etsy
 * (weak entity) from m-to-n relationship between profile and product)
 *
 * @author Danielle Martin
 * @version 1.0
 **/


class Favorite implements \JsonSerializable {

	/**
	 * id of the Product being favourite-ed this is a component of a composite primary key (and a foreign key)
	 * @var int $favoriteProductId
	 **/
	private $favoriteProductId;

	/**
	 * id of the Profile that favorite-ed this is also a component of a primary ket and a foreign key
	 * @var int $favoriteProfileId
	 **/
	private $favoriteProfileId;


	/**
	 * constructor for this favorite
	 *
	 * @param int $newFavoriteProfileId id of the parent profile
	 * @param int $newFavoriteProductId id of the parent favorite
	 * @throws \Exception if some other exception occurs
	 * @throws \TypeError if data types violate type hints
	 * @Documentation https://php.net/manual/en/language.oop5.decon.php
	 *
	 **/

	public function __construct(int $newFavoriteProfileId, int $newFavoriteProductId = null) {
		try {
			$this->setFavoriteProfileId($newFavoriteProfileId);
			$this->setFavoriteProductId($newFavoriteProfileId);
		} catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {

			//determine what exception type was thrown
			$exceptionType = get_class($exception);
			throw(new $exceptionType($exception->getMessage(), 0, $exception));
		}
	}

	/**
	 * accessor method for profile id
	 *
	 * @return int value of profile id
	 **/

	public function getFavoriteProfileId(): int {
		return ($this->favoriteProfileId);
	}

	/**
	 * mutator method
	 *
	 * @param int $newProfileId new value of profile Id
	 * @throws \RangeException if $newProfileId is not positive
	 * @throws \TypeError if $newProfileId is not an integer
	 **/

	/**
	 * @return mixed
	 */
	public function setFavoriteProfileId(int $newProfileId): void {
		//verify the profile id is positive
		if($newProfileId <= 0) {
			throw(new \RangeException("profile id is not possible, like do you even exist?"));
		}
		// convert and store the profile id
		$this->favoriteProfileId = $newProfileId;

	}

	/**
	 * accessor method for product id
	 *
	 * @return int value of product id
	 **/

	public function getFavoriteProductId(): int {
		return ($this->favoriteProductId);
	}
	/**
	 *mutator method for product Id
	 *
	 * @param int $newFavoriteProductId new value of product id
	 * @throws \RangeException
	 * @throws \TypeError if $newFavoriteProductId is not an integer
	 **/
	public function setFavoriteProductId(int $newFavoriteProductId): void {
		//verify the product id is positive
		if($newFavoriteProductId <= 0) {
			throw(new \RangeException("product id is not positive"));
		}
		// convert and store the profile id
		$this->favoriteProductId = $newFavoriteProductId;
	}

	/**
	 * insert statci function that puts info into mysql
	 *
	 * @param \PDO $pdo PDO connection object
	 * @throws \PDOException when mySQL related errors occur
	 * @throws \TypeError if $pdo is not a PDO connection object
	 **/

	public function insert(\PDO $pdo): void {
		//ensure the object exists before inserting no empty data in sql!
		if($this->favoriteProfileId === null || $this->favoriteProductId === null) {
			throw(new \PDOException("not a valid favorite"));
		}
		//create query template
		$query = "INSERT INTO favorite(favoriteProfileId, favoriteProductId) VALUES(:favoriteProfileId, :favoriteProductId)";
		$statement = $pdo->prepare($query);

		//bind the member variables to the place holders in the template
		$parameters = ["favoriteProfileId" => $this->favoriteProfileId, "favoriteProductId" => $this->favoriteProductId];
		$statement->execute($parameters);
	}




	/**
	 *gets the Like by product id and profile id
	 *
	 *@param \PDO $pdo PDO connection object
	 *@throws  \PDOException when mySQL related errors occur
	 *@throws \TypeError if $pdo is not a PDO connection object
	 **/
public function delete(\PDO $pdo) : void {
	//ensure the object exists before deleting
	if($this->favoriteProductId === null || $this->favoriteProductId === null) {
		throw(new \PDOException("not a valid favorite"));
	}
//create query template
	$query = "DELETE FROM 'favorite' WHERE favoriteProfileId = :favoriteProfileId AND favoriteProductId = :favoriteProductId";
	$statement = $pdo->prepare($query);

	//bind the member variables to the place holders in the template
	$parameters = ["favoriteProfileId" => $this->favoriteProfileId, "favorite" => $this->favoriteProfileId];
	$statement->execute($parameters);
}


	/**
	 * gets the Favorite by Product id and profile id
	 *
	 * @param \PDO $pdo PDO connection object
	 * @param int $favoriteProfileId profile id to search for
	 * @param int $favoriteProductId product id to search for
	 * @return Product|null Favorite found or null if not found
	 **/
public static function getFavoriteByFavoriteProductIdAndFavoriteProfileId(\PDO $pdo, int $favoriteProfileId, int$)



















/**
 * formats the state variables for JSON serialization
 *
 * @return array resulting state variables to serialize
 **/

public function jsonSerialize() {
	$fields = get_object_vars($this);
	//format the date so that the front end can consume it
	return($fields);
}

}
?>