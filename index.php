<?php  
	
	$host = 'localhost';
	$dbname = 'clase_pdo';
	$user = 'root';
	$pass = '';

	try {
		
	//MySQL con PDO_MYSQL
	$pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
	$pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
	echo $e->getMessage();		
	}

	//$stmt = $pdo->prepare("INSERT INTO users(username, password, status)VALUES('r2d2', '1234', 1)");
	//$stmt->execute();


	//QUERY()
	//$insertados = $pdo->query("INSERT INTO users(username, password, status)VALUES('miguel', '1234', 1)");


	//ELIMINAR
	//$pdo->exec("DELETE FROM users WHERE username='r2d2'");

	//PREPARE
	//$stmt = $pdo->prepare('INSERT INTO users (username, password, status) VALUES (?, ?, ?)');

	//MARCADORES CONOCIDOS
	$stmt = $pdo->prepare('INSERT INTO users (username, password, status) VALUES (:username, :password, :status)');

	//BIND
	$stmt->bindParam(':username', $user);
	$stmt->bindParam(':password', $password);
	$stmt->bindParam(':status', $status);

	//INSERT
	$usern = 'r2d2';
	$password = '123';
	$status = 1;
	$stmt->execute();

	$pdo = null;
?>