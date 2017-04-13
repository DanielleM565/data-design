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
			<ul>
				<h1>Profile</h1> <!--primary key-->
				<li>profileID</li>
				<li>profileUSerName</li>
				<li>profileEmail</li>
				<li>profileActivationCode</li> <!--verify account-->
				<li>profileAtHandle</li>
				<li>profileSalt</li> <!--password-->
				<li>profileHash</li> <!--password-->
				<li>profileStorageFolders</li> <!-- organize liked photos-->
				<li>profileShoppingCart</li>
			</ul>
			<ul>
				<h1>Photos</h1>
				<li>photoID</li> <!--primary key-->
				<li>photoIDprofileID</li> <!--foreign key-->
				<li>photoContent</li>
				<li>photoFolders</li>
			</ul>
			<ul>
				<h1>favorite</h1>
				<li>favoritePhotoID</li>
				<li>favoriteProfileID</li>
			</ul>
			<ul>
				<h1>Relations</h1>
				<li>One profile can post many photos 1 to n</li>
				<li>Many profiles cna favorite many photos m to n</li>
				<li>Many photos cna have many favorites m to n</li>
			</ul>
		</main>
	</body>
</html>