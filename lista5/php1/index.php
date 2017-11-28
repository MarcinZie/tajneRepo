<!DOCTYPE HTML>
<html lang = "pl">
<head>
	<meta charset="uft-8" />
	<title>Logowanie</title>
</head>

<body>

	<h1> Zaloguj się do banku</h1>
	
	<form action="zaloguj.php" method="post">
	Login:
	<input type="text" name="login"/>
	<br/><br/>
	Hasło:
	<input type="password" name="haslo"/>
	<br/><br/>
	
	<input type="submit" value="Zaloguj"/>
	</form>
	

	<h1> Zarejestruj się w banku</h1>
	<form action="zarejestruj.php" method="post">
	Nowy login:
	<input type="text" name="nowylogin"/>
	<br/><br/>
	Nowe hasło:
	<input type="password" name="nowehaslo"/>
	<br/><br/>
	
	<input type="submit" value="Zarejestruj"/>
	</form>
	
	
	<h1> Admin logowanie</h1>
	
	<form action="zalogujAdmin.php" method="post">
	Hasło:
	<input type="password" name="haslo"/>
	<br/><br/>
	<input type="submit" value="LogAdmin"/>
	</form>

</body>
</html>