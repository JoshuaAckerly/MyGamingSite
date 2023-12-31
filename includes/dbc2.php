<?php
//**********************************************************
// File: dbc2.php
// Connect Read-only to MySQL database via PHP
//**********************************************************

	$host = "localhost";
	$userName = "root";
	$passWord = "";
	$dataBase = "Student";

	$con = mysqli_connect($host, $userName, $passWord, $dataBase);

	$conection_error = mysqli_connect_error();
	if ($conection_error != null){
		echo "<p>Error connecting to database: $conection_error </p>";
	} else {
		echo("Connected to Admin MySQL<br />");
	}
?>