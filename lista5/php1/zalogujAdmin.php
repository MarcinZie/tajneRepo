<?php

	require_once "connect.php";
	
	$polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);
	
	if ($polaczenie->connect_errno!=0)
	{
		echo "Error: ".$polaczenie->connect_errno;
	}
	else
	{
		
		$haslo = $_POST['haslo'];
		
	
		
		
		
			if($haslo == "admin1"){
				
				header('Location: adminPanel.php');
				
			}else{
				echo "coś się zepsuło";
			}
			
		
		
		
		
		
		
		$polaczenie->close();
	}

	
	
	
	

?>