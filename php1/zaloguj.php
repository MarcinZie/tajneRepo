<?php

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
		
		$hasloc = password_hash($haslo.$login, PASSWORD_DEFAULT);
		
		
		$sql = "SELECT * FROM users WHERE login='$login' AND haslo='$hasloc'";
		
		if($rezultat = @$polaczenie->query($sql)){
			
			$ile_userow = $rezultat->num_rows;
			if($ile_userow>0){
				
				header('Location: formularz.php?login='.$login);
				
			}else{
				echo $hasloc." ".$haslo.$login;
			}
			
		}
		
		
		
		
		
		$polaczenie->close();
	}

	
	
	
	

?>