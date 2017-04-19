<?php
namespace Edu\Cnm\DataDesign;
require_once("autoloader.php");
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
	 * the user who owns this profile; foreign key
	 * @var int $userId
	 **/
	private $userId;
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
	 *
	 *
	 **/


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
	 * @throws UnexpectedValueException if $newProfileId is not an integer
	 *
	 * only one = means is/assign
	 * three === means is this true?
	 *
	 * filter_var is saying leave it alone if it's an int if not say something
	 **/
	public function setProfileId ($newProfileId) {
		$newProfileId = filter_var($newProfileId, FILTER_VALIDATE_INT) ;
		if($newProfileId === false) {
			throw(new UnexpectedValueException("profile id is not valid integer"));
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
	 * @paramstring $newFirstName new value of first name
	 * @throw UnexpectedValueException if $newFirstName is not valid
	 **/
	public function setFirstName($newFirstName) {
		//verify the first name is valid
		$newFirstName = filter_var($newFirstName, FILTER_SANTIZE_STRING);
		if($newFirstName ===false) {
			throw(new UnexpectedValueException)
		}


	}



}
?>