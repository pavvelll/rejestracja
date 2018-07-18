<?php session_start();

	if(!isset($_POST['login']) || (!isset($_POST['password'])))
	{
	header('Location: index.php');
	exit();
	}
	
	require_once "db.php";
//nawiązanie połączenia z DB obiektem będącym instancją klasy mysqli, @ wycisza błędy.
	$connect= new mysqli($host, $db_login, $db_pass, $db_name);
	
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
				
					$login=htmlentities($login, ENT_QUOTES, "UTF-8");
					$password=htmlentities($password, ENT-QUOTES, "UTF-8");			
			
//	kwerenda do połączenia nawiązanego w $connect, 		
				if($answer=@$connect->query(sprintf("SELECT*FROM uzytkownicy WHERE user='%s' AND pass='%s'",
				mysqli_real_escape_string($connect,$login),
				mysqli_real_escape_string($connect,$password))))
				{
					$query_answer=$answer->num_rows;
					if($query_answer>0)
					{
						$_SESSION['log_ok']=true;
						
						$row=$answer->fetch_assoc();
							$_SESSION['user']=$row['user'];
							$_SESSION['email']=$row['email'];
							$_SESSION['gold']=$row['gold'];
							$_SESSION['silver']=$row['silver'];
							$_SESSION['points']=$row['points'];
							$_SESSION['dnipremium']=$row['dnipremium'];
							
						
					
						$answer->close();
						header('Location: user_site.php');
					}
					else
					{
						$_SESSION['wrong_login']='<span style="color:red">Zły login i/lub hasło.</span>';
						header('Location: index.php');
					}
				}
				
				$connect->close();
			}
			
	
?>