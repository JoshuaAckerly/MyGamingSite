<?php
//**********************************************************
// File: dbc2.php
// Connect Read-only to MySQL database via PHP
//**********************************************************

	$host = "185.27.133.7";
	$userName = "graveyar";
	$passWord = "KH1k50t#uIo4(F";
	$dataBase = "graveyar_student";

	$con = mysqli_connect($host, $userName, $passWord, $dataBase);

	$conection_error = mysqli_connect_error();
	if ($conection_error != null){
		echo "<p>Error connecting to database: $conection_error </p>";
	} else {
		echo("Connected to Admin MySQL<br />");
	}
?>