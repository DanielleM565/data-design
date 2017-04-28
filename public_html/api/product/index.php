<?php
namespace Edu\Cnm\DataDesign;

require_once("autoload.php");
/**
 * Small Cross Section of a bad etsy site product favorite message
 *
 * @author Danielle Martin
 * @version 1
 *
 **/
class product {
/**
 * id for this Tweet; this is the primary key
 * @var int $tweetId
 **/
private $productId;
/**
 *id for the Profile that sent this Tweet; this is a foreign key
 * @var int $productProfileId
 **/
private $productProfileId;
/**
 * actual textual description of what the product is
 * @var string $productDescription
 **/
private $productDescription;
	/**
	 *Name/title of product
	 * @var string $productTitle
	 **/
private $productTitle;

/**
 * constructor for this product
 *
 * @param int|null $newProductId id of this product or null if a new product
 * @param int $newProductProfileId id of the profile that posted the product (seller)
 *
 **/

/**
 * constructor for this tweet
 *
 * @param  int|null $newProductId id of this Product or null if a new Product
 * @param  int $newProductProfileId id of the profile that posted the product
 * @param  string $newProductDescription string with description of product
 * @param  string $newProductTitle string with the title of the product
**/

	public function __construct(?int $newProductId, int $newProductProfileId, string $newProductDescription, string $newProductTitle) {
		try{
				$this->setProductId($newProductId);
				$this->setProductProfileId($newProductProfileId);
				$this->setProductDescription($newProductDescription);
				$this->setProductTitle($newProductTitle);
		}
		//determine what exception type was thrown
		catch(\InvalidArgumentException | \RangeException | \Exception |\TypeError $exception) {
			$exceptionType = get_class($exception);
			throw(new $exceptionType($exception->getMessage(), 0, $exception));
		}
}

/**
 * accessor method for product Id
 *
 * @return int|null value of Product Id
 **/

public function getProductId() : int {
	return($this->productId);
}

/**
 * mutator method for tweet Id
 *
 * @param int|null $newProductId new value of product id
 * @throws \RangeException exception if $newProductId is not positive
 * @throws \TypeError if $newProductId is not and integer
 **/
public function setProductId(?int $newProductId) : void {
	//if tweet id is null immediately return it
	if($newProductId === null) {
		$this->productId = null;
		return;
	}
	//verify the tweet id is positive
	if($newProductId <= 0) {
		Throw(new \RangeException("product id is not positive"));
	}
	//convert and store the tweet id
	$this->productId = $newProductId;
}


/**
 * accessor method for product profile id
 *
 * @return int value of product profile id
 **/
	/**
	 * @return int
	 */
	public function getProductProfileId(): int {
		return $this->productProfileId;
	}

/**
 * mutator method for product id
 *
 * @param int $newProductProfileId new value of product profile id
 * @throws \RangeException if $newProfileId is not positive
 * @throws \TypeError if $ newProductId is not an integer
 **/
public function setProductProfileId(int $newProductProfileId) : void {
	//verify the profile id is positive
	if($newProductProfileId <= 0) {
		throw(new \RangeException("product profile id is not positive"));
	}
	//convert and store the profile id
	$this->productProfileId = $newProductProfileId;
}


}
?>