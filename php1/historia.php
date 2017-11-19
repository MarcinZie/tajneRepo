<?php

	require_once "connect.php";
	
	$polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);
	
	if ($polaczenie->connect_errno!=0)
	{
		echo "Error: ".$polaczenie->connect_errno;
	}
	else
	{
		$login = $_GET['login'];
		
		echo $login;
		
		$sql = "SELECT * FROM przelewy WHERE przelewy.user = '$login'";
		$rows = array();
		if($rezultat = mysqli_query($polaczenie, $sql)){
			echo "LICZBA ROWÓW".$rezultat->num_rows."dfsfdssdf  ".$login;
			$ile_userow = $rezultat->num_rows;
			
			if($ile_userow>0){
				echo "Przelew dokonany na dane:<br/>";
				
				while($row = mysqli_fetch_array($rezultat)){
				
			
					
					echo "Numer konta: ".$row['numerek']."<br/>";
					echo "Odbiorca: ".$row['name']."<br/>";
					echo "Tytuł przelewu: ".$row['tytul']."<br/>";
					echo "Kwota: ".$row['hajs']."<br/>";
					echo "Data przelewu: ".$row['data']."<br/>";
					echo "Nadawca: ".$row['user']."<br/><br/>";
				}
			
			
				
				
				
			}else{
				
			}
			
		}
		
				
		$polaczenie->close();
	}

	
?>
