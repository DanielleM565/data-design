<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8"/>
		<title>
			Conceptual Model
		</title>
	</head>
	<body>
		<main>
			<h1>
				Conceptual Model: Etsy User
			</h1>
			<h2>Profile</h2>
			<ul>
				<li>profileId</li> <!--primary key-->
				<li>profileUSerName</li>
				<li>profileEmail</li>
				<li>profileActivationCode</li> <!--verify account-->
				<li>profileAtHandle</li>
				<li>profileSalt</li> <!--password-->
				<li>profileHash</li> <!--password-->
			</ul>
			<h2>Products</h2>
			<ul>
				<li>productId</li> <!--primary key-->
				<li>productContent</li>
				<li>productPicture</li>
				<li>productDescription</li>
				<li>productTitle</li>
				<li>productPrice</li>
			</ul>
			<h2>Favorite</h2>
			<ul>
				<li>favoriteProductId</li>
				<li>favoriteProfileId</li>
			</ul>
				<h2>Relations</h2>
			<ul>
				<li>Many profiles can favorite many products (m to n)</li>
				<li>Many photos can have many favorites (m to n)</li>
			</ul>
		</main>
	</body>
</html>