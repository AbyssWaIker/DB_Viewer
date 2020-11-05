<!DOCTYPE html>
<html>
<head>
	<title> Login into the database</title>
	<link rel="stylesheet" a href="css\login-style.css">
</head>

<body>
	<div class="container">
	<img src="img/database.svg"/>
		<form action="php/validate.php" method="post">
			<div class="form-input">
				<input type="text" required name="database_name" placeholder="database name"/>	
			</div>
			<div class="form-input">
				<input type="text" required name="username" placeholder="username"/>	
			</div>
			<div class="form-input">
				<input type="password" required name="password" placeholder="password"/>
			</div>
			<input type="submit" type="submit" value="LOGIN" class="btn-login"/>
		</form>
	</div>
</body>
</html>
