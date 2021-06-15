<?php

$sName = "localhost";
$uName = "root";
$pass = "";
$dbname="todolist";

try{
	
	$con = new PDO("mysql:host=$sName;dbname=$dbname",
	                      $uName,$pass);
	
	$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	echo "connected";
}catch(PDOException $e){
	echo "connection failed:".$e->getMessage();
}


?>