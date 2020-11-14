<!DOCTYPE html>
<html>
<head>
	<title> Login into the database</title>
	<link rel="stylesheet" a href="css\login-style.css">
</head>
<body>
	<div class="container">
	<img src="img/database.svg"/>
		<form action="php/set_session.php" method="post">
			<div class="form-input">
				<input type="text" required name="database_name" placeholder="database name"/>	
			</div>
			<div class="form-input">
				<input type="text" required name="username" placeholder="username"/>	
			</div>
			<div class="form-input">
				<input type="password" required name="password" placeholder="password"/>
			</div>
			<input type="submit" value="LOGIN" class="btn-login"/>
		</form>
	</div>
	
    <?php

    if(isset($_COOKIE['login_error']))
    {
        echo "<script src='js/scripts.js'></script>\n";
        $message = trim(str_replace(PHP_EOL, '', $_COOKIE['login_error']));//чертовы \n не дают просто сделать $message = $_COOKIE['login_error']
        echo "<script>notify('$message')</script>\n";
        setcookie ('login_error', '', time() - 3600);
    }
    ?>
</body>

</html>
