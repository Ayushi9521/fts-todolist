<?php 

if(isset($_POST['id'])){
	require 'db_con.php';
	
	$id = $_POST['id'];
	
	if(empty($id)){
			echo 'error';
	}else{
		$todos = $con->prepare("SELECT id, checked FROM todos");
		$todos->execute([$id]);
		$todo = $todos->fetch();
		$uid = $todo['id'];
		$checked = $todo['checked'];
		$uchecked = $checked ? 0 : 1;
		$res= $con->query("UPDATE todos SET checked=$uchecked WHERE id=$uid");

				if($res){
				    echo $checked ;
				}else{
					echo "error";
				}
		}
		$con = null;
		exit();
	}
}else{

	header("Location: index.php?mess=error");
}
?>