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
		
		$sql = "SELECT DISTINCT * FROM przelewy WHERE przelewy.user = '$login' ORDER BY przelewy.id DESC LIMIT 1";
		
		if($rezultat = @$polaczenie->query($sql)){
			
			$ile_userow = $rezultat->num_rows;
			if($ile_userow>0){
				echo "Przelew dokonany na dane:<br/>";
				
				$row = $rezultat -> fetch_assoc();
				
				echo "Numer konta: ".$row['numerek']."<br/>";
				echo "Odbiorca: ".$row['name']."<br/>";
				echo "Tytuł przelewu: ".$row['tytul']."<br/>";
				echo "Kwota: ".$row['hajs']."<br/>";
				echo "Data przelewu: ".$row['data']."<br/>";
				echo "Nadawca: ".$row['user']."<br/>";
				
				
				
				
				
			}else{
				
			}
			
		}
		$login = $_GET['login'];
		echo '<a href="historia.php?login='.$login.'">Historia przelewów</a>';
		$polaczenie->close();
	
	
	}

	
?>

