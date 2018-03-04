<?php
//Connection à la BDD

$host = "localhost";
$user = "root";
$pass = "root";
$db_name = "DataEntreprise";


$mysqli = new mysqli($host, $user, $pass, $db_name);

if (mysqli_connect_errno()) {
	die("database error: ".mysqli_connect_error());
}

$mysqli->set_charset("utf8");
