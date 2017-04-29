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

/**
 * accessor method for product description
 *
 * @return string value of product description
 **/
	/**
	 * @return string
	 */
	public function getProductDescription(): string {
		return ($this->productDescription);
	}

/**
 * mutator method for product description
 *
 * @param string $newProductDescription new value of product description
 * @throws \InvalidArgumentException if $newProductDescription is not a string or insecure
 * @throws \RangeException if $newProductDescription is > 520 characters
 * @throws \TypeError if $newProductDescription is not a string
 **/

	public function setProductDescription(string $newProductDescription) : void {
		//verify the product description is secure//

		$newProductDescription = trim($newProductDescription);
		$newProductDescription = filter_var($newProductDescription, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
		if(empty($newProductDescription) === true) {
			throw(new \InvalidArgumentException("product content is empty or insecure"));
		}

		//verify the product description will fin in the database
		if(strlen($newProductDescription) > 520) {
			throw(new \RangeException("Product Description too long, please shorten"));
		}
		//store the product description
		$this->productDescription = $newProductDescription;
	}
	/**
	 * accessor method for Product Title
	 *
	 * @return string value of productTitle
	 **/

	public function getProductTitle(): string {
		return $this->productTitle;
	}

	/**
	 * mutator method for Product Title
	 *
	 * @param string $newProductTitle new value of product title
	 * @throws \InvalidArgumentException if $newProductTitle is not a string or insecure
	 * @throws \RangeException if $newProductTitle is > 128 characters
	 * @throws \TypeError if $newProductTitle is not a string
	 **/

	public function setProductTitle(string $newProductTitle) : void {
		//verify product title is secure
		$newProductTitle = trim($newProductTitle);
		$newProductTitle = filter_var($newProductTitle, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
		if(empty($newProductTitle) === true) {
			throw(new \InvalidArgumentException("Product Title is empty or insecure"));
		}
		//verify the Product Title will fit into the database
		if(strlen($newProductTitle) > 128) {
			throw(new \RangeException("Product Title is too long"));
		}
		// store the Product Title
		$this->productTitle = $newProductTitle;
	}











}
?>