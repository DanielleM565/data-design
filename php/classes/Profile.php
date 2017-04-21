<?php
namespace Edu\Cnm\DataDesign;
require_once("autoload.php");
/** <h1>Example of a really bad etsy page</h1>
 *
 * <p>This is a practice for a really bad etsy page where in a profile favorites a product</p>
 * @author a student named Danielle <dmartin61@cnm.edu>
 **/
Class Profile {
	/** the rest of this {} is at the very end
	 *primary  key for profileId
	 * @var int $profileId
	 **/
	private $profileId;
	/**
	 * first name of user
	 * @var string $firstName
	 **/
	private $firstName;
	/**
	 * last name of user
	 * @var string $lastName
	 **/
	private $lastName;
	/**
	 * password hash
	 * @var string $profileHash
	 **/
	private $profileHash;
	/**
	 * password salt
	 * @var string $profileSalt
	 **/
	private $profileSalt
	/**
	 * email of user
	 * @var string $profileEmail
	 **/
	 private $profileEmail;
	/**
	 * the user who owns this profile; foreign key
	 * @var int $profileAtHandle aka $userId
	 **/
	 private $profileAtHandle;




	/**
	 * accessor method for profile id
	 *
	 * @return int value of profile id
	 **/
	public function getProfileId() {
		return($this->profileId);
	}
	/**
	 * mutator method for profileId
	 * it's like a clean up or a save
	 *
	 * @param int $newProfileId new value of profile id
	 * @throws \UnexpectedValueException if $newProfileId is not an integer
	 *
	 * only one = means is/assign
	 * three === means is this true?
	 *
	 * filter_var is saying leave it alone if it's an int if not say something
	 **/
	public function setProfileId ($newProfileId) {
		$newProfileId = filter_var($newProfileId, FILTER_VALIDATE_INT) ;
		if($newProfileId === false) {
			throw(new \UnexpectedValueException("profile id is not valid integer"));
		}
		/**
		 * intval will convert this to an integer and store it
		 **/
		// convert and store the profile id
		$this ->profileId = intval($newProfileId);
	}

	/**accessor method for the first name
	 *
	 * @return string value of first name
	 **/
	public function getFirstName() {
		return($this->firstName);
	}
	/**
	 * matuator method for first name
	 *
	 * @param string $newFirstName new value of first name
	 * @throw UnexpectedValueException if $newFirstName is not valid
	 **/
	public function setFirstName($newFirstName) {
		//verify the first name is valid
		$newFirstName = filter_var($newFirstName, FILTER_SANTIZE_STRING);
		if($newFirstName ===false) {
			throw(new \UnexpectedValueException("First Name is not a valid string"));
		}}

		/**
		 *accessor method for last name
		 *
		 * @return string value of last name
		 **/
	public function getLastName() {
	return ($this->lastName);
}

		/**
		 * mutator method for last name
		 *
		 * @param string $newLastName
		 * @throws UnexpectedValueException if $newLastName is not valid
		 **/
	public function setLastName($newLastName) {
		$newFirstName = filter_var($newFirstName, FILTER_SANITIZE_STRING);
		if($newLastName ===false) {
			throw(new \UnexpectedValueException("Last name is not a valid string"));
		}
	}

		/**
		 * accessor method for email
		 *
		 * @return string value of email
		 **/
		public function getProfileEmail() {
			return ($this->ProfileEmail);
		}

	/**
	 * mutator method for email
	 *
	 * @param string $newProfileEmail
	 * @throws \UnexpectedValueException if $
	 */
	public function setProfileEmail($newProfileEmail) {
		$newProfileEmail = filter_var($newProfileEmail, FILTER_SANTIZE_STRING);
		if($newProfileEmail ===false)  {
			throw(new \UnexpectedValueException("Email invalid"));
		}
	}

	/**
	 * Mutator method for profile has password
	 *
	 * @param string $newProfileHash
	 * @throws \InvalidArgumentException if the hash is not secure
	 * @throws \RangeException if the hash is not  128 characters
	 * @throws \TypeError if profile hash is not a string
	 **/

	public function setProfileHash(string $newProfileHash): void {
		//enforce that the hash is properly formatted
		$newProfileHash = trim($newProfileHash);
		$newProfileHash = strtolower($newProfileHash);
		if(empty($newProfileHash))=== true) {
			throw(new \InvalidArgumentException("profile password hash empty or insecure"));
		}
		//enforce that the hash is a string representation of a hexidecimal
		if(!ctype_xdigit($newProfileHash))
		 throw(new \RangeException("profile hash must be 128 characters"));

		//enforce that the hash is exactly 128 characters.
		if(strlen($newProfileHash) !==128) {
			throw(new \RangeException("profile hash must be 128 characters"));
		}
		//store the hash
		$this->profileHash = $newProfileHash;
	}

/**
 * formats the state variables for JSON serialization
 *
 * @return array resulting state variables to serialize
 **/
public function jsonSerialize() {
	$fields = get_object_vars($this);
	//format the date so that the front end can consume it
	$fields["favoriteDate"] = round(floatval($this->favoriteDate->format("U.u"))*1000);
		return($fields);
}


/**
 * inserts product action into mySQL
 *
 * @param \PDO $pdo PDO connection object
 * @throws \PDOException when mySQL related errors occur
 * @throws \TypeError if $pdo is not a PDO connection object
 **/

	public function insert(\PDO $pdo) : void {
		// enforce the productId is null (i.e., don't insert the same product twice)
		if($this->productId !== null) {
				throw(new \PDOException("not a new product"));
		}
	}




}
?>