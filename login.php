<?php 

	require_once "db.php";
//nawiązanie połączenia z DB obiektem będącym instancją klasy mysqli, @ wycisza błędy.
	$connect= @new mysqli($host, $db_login, $db_pass, $db_name);
	
		if($connect->connect_errno!=0)
		{
//Nr błędu.	
			echo "Error ".$connect->connect_errno;			
/*$connect->connect_error; opis błędu.*/
		}
			else
			{
				$login=$_POST['login'];
				$password=$_POST['password'];
//Zapytanie do DB.				
				$sql="SELECT*FROM uzytkownicy WHERE user='$login' AND pass='$password'";
//				
				if($answer=@$connect->query($sql))
				
				$connect->close();
			}
			
	
?>