<?php session_start(); 

if(!($_SESSION['log_ok']))
	{
		header('Location: index.php');
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
<?php 
echo "WITAJ ".$_SESSION['user']."!";
echo "<p><b>GOLD</b> ".$_SESSION['gold']."| ";
echo "<b>SILVER</b> ".$_SESSION['silver']."| ";
echo "<b>POINTS</b> ".$_SESSION['points'];
echo "<p><b>Email:</b> ".$_SESSION['email'];
echo "<p><b>Dni premium</b> ".$_SESSION['dnipremium'];

?>
	<br><br><a href="logout.php">wyloguj</a>
</body>
</html>