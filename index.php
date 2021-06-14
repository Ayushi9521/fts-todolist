<?php
require 'db_con.php';
?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <title>To Do List!</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="task.css" type="text/css">
	<script src="task.js"> </script>
  </head>
  <body onload="create_unfinished_task();">
<!--navbar code-->
<div id="content_container" class="container-fluid">
	<div id="Task_header">
    <nav class="navbar navbar-dark icon-bar ">
	<a class="active" href="#"><i class="fa fa-home"></i></a>
    <a   href="#">To Do List</a>
    
</nav>
	
<div ><h1> Welcome in your To Do List application!!!</h1>

</div>
</div>
<!--form for taking task as a input-->
<div class="card" id="task_input_container">
  <div class="card-body">
  <form  method ="POST" action="del.php" autocomplete="off">
    <input type="text" id="input_box" placeholder="Enter a task"/>
  <button type="button" id="input_button" class="btn btn-success">Add task
  <i class="fa fa-arrow-circle-right"></i></button>
  </form>
  </div>
</div>
<?php

$todos = $con->query("SELECT * FROM todos ORDER BY id DESC");
?>
<br/><br/>
<h3> Task to do </h3>
<!--show to do list-->
<div class="show task">
<?php if($todos->rowCount() <= 0) { ?> 
<div class="todo-item">
   <div class="empty">
   <img src="img/list.jpg" />
   </div>
</div>
<?php } ?>

<?php while($todo = $todos->fetch(PDO::FETCH_ASSOC)){ ?>
<div class="todo-item">
<span id="<?php echo $todo['id'];?>" class="remove-to-do"> x</span>
<?php if($todo['checked']){?>
	<input type="checkbox" class="check-box" checked/>
	<h4 class="checked"> <?php echo $todo['task'] ?> </h4>
	<?php }else{ ?>
	<input type="checkbox" class="check-box" />
	<h4> <?php echo $todo['task'] ?> </h4>
	
	<?php } ?>
<br>
<small> created: <?php echo $todo['date_time'] ?> </small>
<?php } ?>
</div>
</div>


</body>
</html>


