<?php session_start();

	if(isset($_SESSION['log_ok']))
	{
		header('Location: user_site.php');
		exit();
	}

 ?>
<!DOCUMENT HTML>
<html lang="pl">
<head>
	<meta charset="utf-8"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1"/>
	<title>Formularz rejestracji</title>
</head>

<body>
	<form  action="login.php" method= "post">
		Login: <br><input type="text" name="login"/><br>
		Password: <br><input type="password" name="password"/><br><br>
		<input type="submit" value="zaloguj"/>
		
	</form>
	
<?php 
	if(isset($_SESSION['wrong_login']))
	{
		echo $_SESSION['wrong_login'];
		unset($_SESSION['wrong_login']);
	}	
?>

</body>
</html>