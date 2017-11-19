<!DOCTYPE HTML>
<html lang = "pl">
<head>
	<meta charset="uft-8" />
	<title>Odbieranie zamówienia przelewu</title>
</head>

<body>

	<?php
	$login = $_GET['login'];
	$imie = $_POST['imie'];
	$numer = $_POST['numer'];
	$tytul = $_POST['tytul'];
	$hajs = $_POST['hajs'];
	$data = $_POST['data'];
	
	echo "<h2> Ty: $login </br> Odbiorca: $imie </br> Numer konta: $numer </br> Tytuł przelewu: $tytul </br> Kwota: $hajs </br> Data: $data </br> </h2>";
	
	echo '<a href="wyslijprzelew.php?imie='.$imie.'&user='.$login.'&numer='.$numer.'&tytul= '.$tytul.'&hajs='.$hajs.'&data='.$data.'">Potwierdź przelew</a>';

	
	?>
		
	
</body>
</html>