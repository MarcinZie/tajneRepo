<?php
	session_start();
	require_once "connect.php";
	
	$polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);
	
	if ($polaczenie->connect_errno!=0)
	{
		echo "Error: ".$polaczenie->connect_errno;
	}
	else
	{
		$login = $_POST['login'];
		$haslo = $_POST['haslo'];
		
	
		
		
		$sql = "SELECT haslo FROM users WHERE login='$login'";
		
		$rezultat = @$polaczenie->query($sql);
			$row = $rezultat -> fetch_assoc();
				
				
					$text = $row['haslo'];  
					
				
				
			$ile_userow = $rezultat->num_rows;
			if($ile_userow>0 &&  password_verify($haslo.$login, $text)){
				$_SESSION['login']=$login;
				header('Location: formularz.php');
				
			}else{
				echo " ".$text;
			}
			
		
		
		
		
		
		
		$polaczenie->close();
	}

	
	
	
	

?>