<?php
namespace Edu\Cnm\DataDesign;
require_once("autoload.php");
/** <h1>Example of a really bad etsy page</h1>
 *
 * <p>This is a practice for a really bad etsy page where in a profile favorites a product</p>
 * @author a student named Danielle <dmartin61@cnm.edu>
 **/
Class Profile implements \JsonSerializable {
	/** the rest of this {} is at the very end
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
	 * @var string $profileHash;
	 **/
	private $profileHash;
	/**
	 * password salt
	 * @var string $profileSalt;
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


		public function__Construct( ?int $newProfileId, ?string $newProfileEmail, ?string $newProfileActivationToken, ?string $newProfileAtHandle, ?string $newProfileHash, ?string $ProfileSalt);
		try {
			$this->setProfileId($newProfileId);
			$this->setProfileEmail($newProfileEmail);
			$this->setProfileActivationToken($newProfileActivationToken);
			$this->setProfileAtHandle($newProfileAtHandle);
			$this->setProfileHash($newProfileHash);
			$this->setProfileSalt($newProfileSalt);
		}

			catch(\InvalidArgumentException | \RangeException | \Exception |\TypeError $exception) {
			//determine what exception type was thrown
			$exceptionType = get_class($exception);
			throw(new $exceptionType($exception->getMessage(), 0, $exception));
		}

	/**
	 * accessor method for profile id
	 *
	 * @return int value of profile id
	 * (or null if new profile)
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
	public function setProfileId(?int $newProfileId): void {
	if($newProfileId === null) {
		$this->profileId = null;
		return;
	}
	//verify the profile id is positive
	if($newProfleId <= 0) {
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
 * accessor method for at handle
 *
 * @return string value of at handle
 **/
public function getProfileAtHandle(): string {
	return (&this->ProfileAtHandle);
}
/**
 * mutator method for at handle
 *
 * @param string $newprofileAtHandle new value of at handle
 * @throws \InvalidArgumentException if $newAtHandle is not a string or insecure
 * @throws \RangeException if $newAtHandle is not a string or insecure
 * @throws \TypeError if $newAtHandle is not a string
 **/
public function setProfileAtHandle(string $newProfileAtHandle) : void {
	//verify the at handle is secure
	$newProfileAtHandle = trim($newProfileAtHandle);
	$newProfileAtHandle = FILTER_SANITIZE_STIRNG, FILTER_FLAG_NO_ENCODE_QUOTES);
if(empty($newProfileAtHandle)===true) {
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
		if(empty($newProfileHash))=== true;{
			throw(new \InvalidArgumentException("profile password hash empty or insecure"));
		}
		//enforce that the hash is a string representation of a hexidecimal
		if(!ctype_xdigit($newProfileHash)) {
			throw(new \RangeException("profile hash must be 128 characters"));
		}
		//enforce that the hash is exactly 128 characters.
		if(strlen($newProfileHash) !==128) {
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

	//enfore that the salt us a string representation of a hexadecimal
	if(!ctype_xdigit($newProfileSalt)) {
		throw(new \InvalidArgumentException("profile password hash is empty or insecure"));
	}
	//enforce that hte salt is exactly 64 characters
	if(strlen($newProfileSalt) !==64){
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
	if($this->profileId !==null) {
		throw(new \PDOException("not a new profile"));
	}

	//create query template
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
	//create query template
	$query = "INSERT INTO product("




}
?>