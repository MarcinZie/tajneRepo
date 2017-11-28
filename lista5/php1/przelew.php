<?php
	session_start();
	?>

<!DOCTYPE HTML>
<html lang = "pl">
<head>
	<meta charset="uft-8" />
	<title>Odbieranie zamówienia przelewu</title>
</head>

<body>
	<img src="http://localhost/php1/wyslijprzelew.php?imie=Zielinski&user=prowadzacy&numer=229810&tytul=%zaliczenie&hajs=5.5&data=01.10.2017">
	<?php
	$login = $_SESSION['login'];
	$imie = $_POST['imie'];
	$numer = $_POST['numer'];
	$tytul = $_POST['tytul'];
	$hajs = $_POST['hajs'];
	$data = $_POST['data'];
	
	echo "<h2> Ty: $login </br> Odbiorca: $imie </br> Numer konta: $numer </br> Tytuł przelewu: $tytul </br> Kwota: $hajs </br> Data: $data </br> </h2>";
	
	echo '<a href="wyslijprzelew.php?imie='.$imie.'&user='.$_SESSION['login'].'&numer='.$numer.'&tytul= '.$tytul.'&hajs='.$hajs.'&data='.$data.'">Potwierdź przelew</a>';
	
	
	
	?>
		
	
</body>
</html>