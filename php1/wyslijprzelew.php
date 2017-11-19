<?php

	require_once "connect.php";
	
	$polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);
	
	if ($polaczenie->connect_errno!=0)
	{
		echo "Error: ".$polaczenie->connect_errno;
	}
	else{
		
		$imie = $_GET['imie'];
		$user = $_GET['user'];
		$numer = $_GET['numer'];
		$tytul = $_GET['tytul'];
		$hajs = $_GET['hajs'];
		$data = $_GET['data'];
		
		
		
		$sql = "INSERT INTO przelewy (name, user, numerek, tytul, hajs, data) VALUES ('$imie', '$user', '$numer', '$tytul', '$hajs', '$data')";
		
		if($rezultat = @$polaczenie->query($sql)){
			
			echo "Super";
			header('Location: potwierdzenie.php?login='.$user);
		}
		
	}
	
		
		
		
		
			//$ile_userow = $rezultat->num_rows;
			//if($ile_userow>0){
				
				//header('Location: formularz.php');
				
		//	}else{
				
			//}
			
	
		
		
		
		$polaczenie->close();
	

	
	
	
	

?>