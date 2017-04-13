<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8"/>
		<title>
			Use Case
		</title>
	</head>
	<body>
		<h2>Etsy </h2>
			<p>Lucy (Photo_lover8) is browsing on her laptop on lunch break for a photo of coffee for home to hang obout the coffee make. She found a nice photo of a latte with a leaf drawn in the foam and hit the favorite button.Lucy wants to come back to it and later and wait until payday, friday, to think about buying it.</p>
			<h3>Interaction flow</h3>
		<ul>
			<li>User logs into site with user name and password</li>
			<li>Site retrieves hash and salt from database to confirm password and username match</li>
			<li>User searches for product</li>
			<li>Site redirects user to products</li>
			<li>User clicks favorite button on product</li>
			<li>Site stores photo id with user's profile in favorites folder</li>
		</ul>
	</body>
</html>