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
				Conceptual Model: Photo Lover
			</h1>
			<h2>Profile</h2>
			<ul>
				<li>profileID</li> <!--primary key-->
				<li>profileUSerName</li>
				<li>profileEmail</li>
				<li>profileActivationCode</li> <!--verify account-->
				<li>profileAtHandle</li>
				<li>profileSalt</li> <!--password-->
				<li>profileHash</li> <!--password-->
				<li>profileStorageFolders</li> <!-- organize liked photos-->
				<li>profileShoppingCart</li>
			</ul>
			<h2>Products</h2>
			<ul>
				<li>productID</li> <!--primary key-->
				<li>productIDprofileID</li> <!--foreign key-->
				<li>productContent</li>
				<li>productFolders</li>
			</ul>
			<h2>favorite</h2>
			<ul>
				<li>favoriteProductID</li>
				<li>favoriteProfileID</li>
			</ul>
				<h2>Relations</h2>
			<ul>
				<li>One profile can post many products 1 to n</li>
				<li>Many profiles cna favorite many products m to n</li>
				<li>Many photos can have many favorites m to n</li>
			</ul>
		</main>
	</body>
</html>