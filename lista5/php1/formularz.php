<!DOCTYPE HTML>
<html lang = "pl">
<head>
	<meta charset="uft-8" />
	<title>Bank</title>
</head>

<body>

	<h1> Wykonaj przelewy</h1>
	
	
	<form action="przelew.php" method="post">
	
	<br/>
	Nazwa odbiorcy:
	<input type="text" name="imie"/>
	<br/><br/>
	Numer konta:
	<input type="text" name="numer"/>
	<br/><br/>
	Tytu³ przelewu:
	<input type="text" name="tytul"/>
	<br/><br/>
	Kwota:
	<input type="text" name="hajs"/>
	<br/><br/>
	Data:
	<input type:="date" name="data"/>
	<br/><br/>
	<input type="submit" value="Wyœlij przelew"/>
	</form>
	


</body>
</html>