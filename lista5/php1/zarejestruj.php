<?php

	require_once "connect.php";
	
	$polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);
	
	if ($polaczenie->connect_errno!=0)
	{
		echo "Error: ".$polaczenie->connect_errno;
	}
	else
	{
		$login = $_POST['nowylogin'];
		$haslo = $_POST['nowehaslo'];
		
		$hasloc = password_hash($haslo.$login, PASSWORD_DEFAULT);
		
		
		
		$sql2 = "SELECT * FROM users WHERE login='$login' ";
		if($rezultat = $polaczenie->query($sql2)){
			
			$ile_userow = $rezultat->num_rows;
			if($ile_userow==0){
				$sql = "INSERT INTO users(login, haslo) VALUES ('$login', '$hasloc')";
				$polaczenie->query($sql);
				echo $login." ".$haslo." ".$hasloc;
				header('Location: index2.php');
				
			}else{
				echo $login." ".$haslo." ".$hasloc;
			}
			
		}
		else{
			echo $polaczenie->query($sql2);
		}
		
		
		
		
		$polaczenie->close();
	}

	
	
	
	

?>