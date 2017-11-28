
<form action="akceptacja.php" method="POST">
<input type="hidden" name="nr" value="2"/>
<input type="submit" value="View my sweet kitty pictures, OHHHH SO SWEET CLICK IT MAN"/>
</form>

<form action="akceptacja.php" method="post">
			Zaakceptuj przelew nr:
			<input type="text" name="nr"/>
			<br/><br/>
			<input type="submit" value="Zaakceptuj"/>
		</form>

<?php

	require_once "connect.php";
	
	$polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);
	
	if ($polaczenie->connect_errno!=0)
	{
		echo "Error: ".$polaczenie->connect_errno;
	}
	else
	{
			
		
			
		$sql = "SELECT * FROM przelewy";
		$rows = array();
		if($rezultat = mysqli_query($polaczenie, $sql)){
			
			$ile_userow = $rezultat->num_rows;
			
			if($ile_userow>0){
				echo "Przelew dokonany na dane:<br/>";
				
				while($row = mysqli_fetch_array($rezultat)){
				
			
					echo "Numer przelewu: ".$row['id']."<br/>";
					echo "Numer konta: ".$row['numerek']."<br/>";
					echo "Odbiorca: ".$row['name']."<br/>";
					echo "Tytuł przelewu: ".$row['tytul']."<br/>";
					echo "Kwota: ".$row['hajs']."<br/>";
					echo "Data przelewu: ".$row['data']."<br/>";
					echo "Nadawca: ".$row['user']."<br/>";
					
				
					if ($row['zatwierdzony']==1){
						echo "Zaakceptowany<br/><br/>";
					}
					else{
						echo "Niezaakceptowany<br/><br/>";
					}
				
				}
				
				
			
				
				
				
			}else{
				
			}
			
		}
		
				
		$polaczenie->close();
	}

	
?>
