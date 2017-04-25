<?php

namespace Edu\Cnm\DataDesign;
require_once("autoload.php");

/** <h1>Example of a really bad etsy page</h1>
 *
 * <p>This is a practice for a really bad etsy page where in a profile favorites a product</p>
 * @author a student named Danielle <dmartin61@cnm.edu>
 **/
class Profile implements \JsonSerializable {
	/**
	 *primary  key for profileId
	 * @var int $profileId
	 **/
	private $profileId;
	/**
	 * email of user
	 * @var string $profileEmail
	 **/
	private $profileEmail;
	/**
	 * email activation token
	 **/
	private $profileActivationToken;
	/**
	 * the user who owns this profile; foreign key
	 * @var int $profileAtHandle aka $userId
	 **/
	private $profileAtHandle;
	/**
	 * password hash
	 * @var string $profileHash
	 **/
	private $profileHash;
	/**
	 * password salt
	 * @var string $profileSalt
	 **/
	private $profileSalt;


	/**
	 *constructor for this Profile
	 *
	 * @param int|null $newProfileId of this profile or null if a new Profile
	 * @param string $newProfileEmail string containing user's email
	 * @param string $newProfileActivationToken activation token to safe guard against malicious accounts
	 * @param string $newProfileAtHandle string containing newAtHandle
	 * @param string $newProfileHash string containing password hash
	 * @param string $newProfileSalt string containing password salt
	 * @throws \InvalidArgumentException if data types are not valid
	 * @throws \RangeException if data values are out of bounds (ex. stings too long negative integers)
	 * @throws \TypeError if data types violate type hints
	 * @throws \Exception if some other exception occurs
	 * @Documentation https://php.net/manual/en/language.oop5.decon.php
	 **/


public function __construct(?int $newProfileId, string $newProfileEmail, ?string $newProfileActivationToken, string $newProfileAtHandle, string $newProfileHash, string $newProfileSalt) {
try {
$this->setProfileId($newProfileId);
$this->setProfileEmail($newProfileEmail);
$this->setProfileActivationToken($newProfileActivationToken);
$this->setProfileAtHandle($newProfileAtHandle);
$this->setProfileHash($newProfileHash);
$this->setProfileSalt($newProfileSalt);
}

catch
(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
	//determine what exception type was thrown
	$exceptionType = get_class($exception);
	throw(new $exceptionType($exception->getMessage(), 0, $exception));
}
}

	/**
	 * accessor method for profile id
	 *
	 * @return int value of profile id
	 * (or null if new profile)
	 **/
	public function getProfileId() {
	return ($this->profileId);
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
	public function setProfileId(?int $newProfileId): void {
	if($newProfileId === null) {
		$this->profileId = null;
		return;
	}
	//verify the profile id is positive
	if($newProfileId <= 0) {
		throw(new \RangeException("profile id is not positive"));
	}
	//convert and store the profile id
	$this->profileId = $newProfileId;
}

/**
 * mutator method for email
 *
 * @param string $newProfileEmail new value of email
 * @throws \InvalidArgumentException if $newEmail is not a valid email or insecure
 * @throws \RangeException if $newEmail is > 128 characters
 * @throws \TypeError if $newEmail is not a string
 **/
public function setProfileEmail(string $newProfileEmail): void {
	//verify the email is secure
	$newProfileEmail = trim($newProfileEmail);
	$newProfileEmail = filter_var($newProfileEmail, FILTER_VALIDATE_EMAIL);
	if(empty($newProfileEmail) === true) {
		throw(new \InvalidArgumentException("profile email is empty or insecure"));
	}
	//verify the email will fit in the database
	if(strlen($newProfileEmail) > 128) {
		throw(new \RangeException("profile email is too long"));
	}
	//store the email
	$this->profileEmail = $newProfileEmail;
}

	/**
	 * mutator method for account activation token
	 *
	 * @param string $newProfileActivationToken
	 * @throws \InvalidArgumentException if the toke is not a string or insecure
	 * @throws \RangeException if the token is not exactly 32 characters
	 * @throws \TypeError if the activation token is not a string
	 **/
public function setProfileActivationToken(?string $newProfileActivationToken): void {
	if($newProfileActivationToken === null) {
		$this->profileActivationToken = null;
		return;
	}
	$newProfileActivationToken = strtolower(trim($newProfileActivationToken));
	if(ctype_xdigit($newProfileActivationToken) === false) {
		throw(new\RangeException("user activation is not valid"));
	}
	//make sure user activation token is only 32 characters
	if(strlen($newProfileActivationToken) !== 32) {
		throw(new\RangeException("user token has to be 32"));
	}
	$this->profileActivationToken = $newProfileActivationToken;
}

/**
 * accessor method for at handle
 *
 * @return string value of at handle
 **/
public function getProfileAtHandle(): string {
	return ($this->profileAtHandle);
}
/**
 * mutator method for at handle
 *
 * @param string $newProfileAtHandle new value of at handle
 * @throws \InvalidArgumentException if $newAtHandle is not a string or insecure
 * @throws \RangeException if $newAtHandle is not a string or insecure
 * @throws \TypeError if $newAtHandle is not a string
 **/
public function setProfileAtHandle(string $newProfileAtHandle): void {
	//verify the at handle is secure
	$newProfileAtHandle = trim($newProfileAtHandle);
	$newProfileAtHandle = filter_var($newProfileAtHandle, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
if(empty($newProfileAtHandle) === true) {
	throw(new \InvalidArgumentException("profile at handle is empty or insecure"));
}
//verify the at handle will fit in the database
	if(strlen($newProfileAtHandle) > 32) {
		throw(new \RangeException("profile at handle is too large"));
	}
	//Store the at handle
	$this->profileAtHandle = $newProfileAtHandle;
}
/**
 * accessor method for profileHash
 * @return string value of hash
 **/
public function getProfileHash(): string {
	return $this->profileHash;
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

		if(empty($newProfileHash) === true ) {
			throw(new \InvalidArgumentException("profile hash empty or insecure"));
		}

		//enforce that the hash is a string representation of a hexidecimal
		if(!ctype_xdigit($newProfileHash)) {
			throw(new \InvalidArgumentException("profile hash empty or insecure"));
		}
		//enforce that the hash is exactly 128 characters.
		if(strlen($newProfileHash) !== 128) {
			throw(new \RangeException("profile hash must be 128 characters"));
		}
			//store the hash
			$this->profileHash = $newProfileHash;
		}


	/**
	 * Accessor method for profile salt
	 *
	 * @return string representation of the salt hexidecimal
	 **/
	public function getProfileSalt(): string {
	return $this->profileSalt;
}
	/**
	 * Mutator Method for profile salt
	 *
	 * @param string $newProfileSalt
	 * @throws \InvalidArgumentException if the salt is not secure
	 * @throws \RangeException if the salt is not 64 characters
	 * @throws \typeError if profile salt is not a string
	 **/
	public function setProfileSalt(string $newProfileSalt): void {
	//enforce that the salt is properly formatted
	$newProfileSalt = trim($newProfileSalt);
	$newProfileSalt = strtolower($newProfileSalt);

	//enforce that the salt us a string representation of a hexadecimal
	if(!ctype_xdigit($newProfileSalt)) {
		throw(new \InvalidArgumentException("profile password hash is empty or insecure"));
	}
	//enforce that the salt is exactly 64 characters
	if(strlen($newProfileSalt) !== 64) {
		throw(new \RangeException("profile salt must be 128 characters"));
	}
	//store the salt
	$this->profileSalt = $newProfileSalt;
}


	/**
	 * inserts this profile into mySQL
	 *
	 * @param \PDO $pdo PDO connection object
	 * @throws \PDOException when mySQL related errors occur
	 * @throws \TypeError if $pdo is not PDO connection object
	 **/
	public function insert(\PDO $pdo): void {
	// enforce the profileID is null (i.e., don;t insert a profile that already exists)
	if($this->profileId !== null) {
		throw(new \PDOException("not a new profile"));
	}

	//create query template
	$query = "INSERT INTO profile(profileActivationToken, profileAtHandle, profileEmail, profileHash, profileSalt) VALUES (:profileActivationToken, :profileAtHandle, :profileEmail, :profileHash, :profileSalt)";
	$statement = $pdo->prepare($query);

	//bind the member variables to the place holders in the template
	$parameters = ["profileActivationToken" => $this->profileActivationToken, "profileAtHandle" => $this->profileAtHandle, "profileEmail" => $this->profileEmail, "profileHash" => $this->profileHash, "profileSalt" => $this->profileSalt];
	$statement->execute($parameters);

	//update the null profileId with what mySQL just gave us
	$this->profileId = intval($pdo->lastInsertId());
}
	/**
	 * deletes this profile from mySQL
	 *
	 * @param \PDO $pdo PDO connection object
	 * @throws \PDOException when mySQL related errors occur
	 * @throws \TypeError if $ppo is not null (i.e.. don't delete a profile that does not exist)
	 **/
public function delete(\PDO $pdo): void {
	//enforce the profileId is not null (i.e., don't delete a profile that does not exist)
	if($this->profileId === null) {
		throw(new \PDOException("unable to delete a profile that dooes not exist"));
	}
	//create query template
	$query = "DELETE FROM profile WHERE profileId = :profileId";
	$statement = $pdo->prepare($query);

	//bind the member variables to the place holders in the template
	$parameters = ["profileId" => $this->profileId];
	$statement->execute($parameters);
}


/**
 * formats the state variables for JSON serialization
 *
 * @return array resulting state variables to serialize
 **/
public function jsonSerialize() {
	return (get_object_vars($this));
}




}
?>