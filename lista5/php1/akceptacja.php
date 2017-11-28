<?php

	require_once "connect.php";
	
	$polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);
	
	if ($polaczenie->connect_errno!=0)
	{
		echo "Error: ".$polaczenie->connect_errno;
	}
	else
	{
		$nr = $_POST['nr'];
		
		$sql = "UPDATE przelewy SET przelewy.zatwierdzony = '1' WHERE przelewy.id = '$nr'";
		
		if($rezultat = @$polaczenie->query($sql)){
				
				header('Location: adminPanel.php');
			
				
		}else{
			echo "Błąd akceptacji";
		}
			
		
		$polaczenie->close();
	
	
	}

	
?>

