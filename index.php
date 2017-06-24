<html>
<head>
<title>Guest Wifi Registration</title>
<link href="style.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Cutive" rel="stylesheet">
</head>
<body>  

<img src="logo.jpg">
<p>

<div>
<b>Guest Wifi Registration</b>
<p>
<form action="create.php" method="post">
    First Name:<br /><input type="text" name="firstName" placeholder="first name" pattern="[a-zA-Z]+" autocomplete="off" required><br />
	Last Name:<br /><input type="text" name="lastName" placeholder="last name" pattern="[a-zA-Z]+" autocomplete="off" required><br />
    Email:<br /><input type="email" name="email" placeholder="user@email.com" autocomplete="off" ><br />
	Mobile Phone: <br /><input type="tel" name="phone" pattern="^\d{10}$" placeholder="area code + phone (e.g. 5591234567)" autocomplete="off" ><p>
    <p><input type="submit" name="submit" value="Submit" />
    </form>
</div>

</body>
</html>