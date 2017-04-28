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

	public function __construct(?int $newProdutId, int $newProductProfileId, string $newProductDescription, string $newProductTitle) {
		try{
				$this->setProductId($newProductId);
				$this->setProductProfileId($newProductProfileId);
				$this->setProductDescription($newProductDescription);
				$this->setProductTitle($newProductTitle);
		}
		//determine what exception type was thrown
		catch(\InvalidArgumentException | \RangeEsception | \Exception |\TypeError $exception) {
			$exceptionType = get_class($exception);
			throw(new $exceptionType($exception->getMessage(), 0, $exception));
		}
}












}
?>