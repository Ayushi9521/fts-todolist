<?php 

if(isset($_POST['task'])){
	require 'db_con.php';
	
	$task = $_POST['task'];
	
	if(empty($task)){
			header("Location: index.php?mess=error");
	}else{
		$stmt = $con->prepare("INSERT INTO todos(task) value(?)");
		$res = $stmt->execute([$task]);
		
		if($res){
			header("Location: index.php?mess=success");
		}else{
			header("Location: index.php");
		}
		$con = null;
		exit();
	}
}else{

	header("Location: index.php?mess=error");
}
?>