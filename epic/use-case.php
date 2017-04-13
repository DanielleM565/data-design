<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8"/>
		<title>
			Use Case
		</title>
	</head>
	<body>
		<h2>Why, when, where and with what devices will a Persona be using the site </h2>
			<table>
				<tr>
					<th>Why</th>
					<th>To share,favorite, buy and sell photos</th>
				</tr>
				<tr>
					<th>When</th>
					<th>Anytime, mostly use in the evenings</th>
				</tr>
				<tr>
					<th>Where</th>
					<th>Anywhere, most used at home, work and cafe's</th> <!--public and private internet connections-->
				</tr>
				<tr>
					<th>How</th>
					<th>Any device, most often personal laptop computer</th>
				</tr>
			</table>
			<h2>Interaction flow</h2>
		<ul>
			<li>A user chooses a user name for a profile</li>
			<li>Site checks database for availability and sends confirmation</li>
			<li>User receives ok go nad chooses password</li>
			<li>Site uses a hash and salt on password</li> <!--Does not save password-->
			<li>User generates a profile</li>
			<li>Site stores profile information in database</li>
			<li>user begins searching for photos</li>
			<li>site redirects to product page</li>
			<li>user favorites photo</li>
			<li>site stores photoID with profileID as a favorite photo</li>
		</ul>
	</body>
</html>