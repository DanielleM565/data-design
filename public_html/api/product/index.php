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
/**
 * inserts this product into mySQL
 *
 * @param \PDO $pdo PDO connection object
 * @throws \PDOException when mySQL related errors occur
 * @throws \TypeError if $pdo is not a PDO connection object
 **/
public function insert(\PDO $pdo) : void {
	//enforce the productId is null (i.e., don't insert a tweet that already exists)
	if($this->productId !== null) {
		throw(new \PDOException("not a new Product"));
	}
	//create query template
	$query = "INSERT INTO product(productProfileId, productDescription, productTitle) VALUES(:productProfileId, :productDescription, :productTitle)";
	$statement = $pdo->prepare($query);

	//bind the member variables to the place holders in the template
	$parameters = ["productProfileId" => $this->productProfileId, "productDescription" => $this->productDescription, "productTitle" => $this->productTitle,];
	$statement->execute($parameters);

	//update the null productId with what mySQL just gave us
	$this->productId = intval($pdo->lastInsertId());

}

/**
 * deletes this product from mySQL
 *
 * @param \PDO $pdo PDO connection object
 * @throws \PDOException when mySQL related errors occur
 * @throws \TypeError if $pdo is not a PDO connection object
 **/
public function delete(\PDO $pdo) : void {
	//enforce the productId is not null (i.e., don't delete a product that was never inserted to being with)
	if($this->productId === null) {
		throw(new \PDOException("unable to delete a product that does not exist"));
	}
	//create query template
	$query = "DELETE FROM product WHERE productId = :productId";
	$statement = $pdo->prepare($query);

	//bind the member variables to the place holder in the template
	$parameters = ["productId" => $this->productId];
	$statement->execute($parameters);
}

	/**
	 * updates this Product in mySQL
	 *
	 * @param \PDO $pdo PDO connection object
	 * @throws \PDOException when mySQL related errors occur
	 * @throws \TypeError if $pdo is not a PDO connection object
	 **/
public function update(\PDO $pdo) : void {
	//enforce the productId is not null (i.e., don't update a product that hasn't been inserted)
	if($this->productId === null) {
		throw(new \PDOException("unable to update a product that does not exist"));
	}
	//create query template
	$query = "UPDATE product SET productProfileId = :productProfileId, productDescription = :productDescription, productTitle = :productTitle";
	$statement = $pdo->prepare($query);

	//bind the member variables to the place holders in the template
	$parameters = ["productProfileId" => $this->productProfileId, "productDescription" => $this->productDescription, "productTitle" => $this->productTitle];
	$statement->execute($parameters);
}

	/**
	 * gets the Product by description
	 *
	 * @param \PDO $pdo PDO connection object
	 * @param string $productDescription product description to search for
	 * @return \SplFixedArray SplFixedArray of products found
	 * @throws \PDOException when mySQL related errors occur
	 * @throws \TypeError when variables are not the correct data type
	 **/
public static function getProductByProductDescription(\PDO $pdo, string $productDescription) : \SPLFixedArray {
	//sanitize the description before searching
	$productDescription = trim($productDescription);
	$productDescription = filter_var($productDescription, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
	if(empty($productDescription) === true) {
		throw(new \PDOException("product description is invalid"));
	}
	// create query template
	$query = "SELECT productId, productProfileId, productDescription, productTitle FROM product WHERE productDescription LIKE :productDescription";
	$statement = $pdo->prepare($query);

	//bind the product Description to the place holder in the template
	$productDescription = "%$productDescription";
	$parameters = ["productDescription" => $productDescription];
	$statement->execute($parameters);

	//build an array of products
	$products = new \SplFixedArray($statement->rowCount());
	$statement->setFetchMode(\PDO::FETCH_ASSOC);
	while(($row = $statement->fetch()) !== false) {
		try {
			$product = new Product($row["productId"], $row["productProfileId"], $row["productDescriptionId"], $row["productTitleId"]);
			$products[$products->key()] = $product;
			$products->next();
		} catch(\Exception $exception) {
			//if the row couldn't be converted, rethrow it
			throw(new \PDOException($exception->getMessage(), 0, $exception));
		}
	}
	return($products);
}




/**
 * gets the Product by productId
 *
 * @param \PDO $pdo PDO connection object \
 * @param int $productId product Id to search for
 * @return product|null product found or null if not found
 * @throws \PDOException when mySQL related errors occur
 * @throws \TypeError when variables are not the correct data type
 **/
public static function getProductByProductId(\PDO $pdo, int $productId) : ?Product {
	//sanitize the productId before searching
	if($productId <= 0) {
		throw(new \PDOException("product id us not positive"));
	}
//create query template
	$query = "SELECT productId, productProfileId, productDescription, productTitle FROM product WHERE productId = :productId";
	$statement = $pdo->prepare($query);

	//bind the product id to the place holder in the template
	$parameters = ["productId" => $productId];
	$statement->execute($parameters);

	//grab the tweet from mySQL
	try {
		$product = null;
		$statement->setFetchMode(\PDO::FETCH_ASSOC);
		$row = $statement->fetch();
		if($row !== false) {
			$product = new Product($row["productId"], $row["productProfileId"], $row["productDescription"], $row["productTitle"]);
		}
	}catch(\Exception $exception) {
			// if the row couldn't be converted, rethrow it
		throw(new \PDOException($exception->getMessage(), 0 , $exception));
		}
	return($product);
}





}
?>