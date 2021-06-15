<?php 
	require 'db_con.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>todo list</title>
  </head>
  <body>
    <h1>To Do List app using php</h1>
	<div class="main-section">
	<div class="add-section"> 
	<form action="add.php" method="POST" autocomplete = "off">
		<?php if(isset($_GET['mess']) && $_GET['mess'] == 'error'){ ?>
			<input type="text" name="task" style ="border-color: #ff6666" placeholder ="This is required"/>
	<button type="submit">Add &nbsp; <span> &#43;</span> </button>
		
		<?php }else{ ?>
	<input type="text" name="task" placeholder ="What do you need to do?"/>
	<button type="submit">Add &nbsp; <span> &#43;</span> </button>
		<?php } ?>
	</form>
	</div>
		<?php
          $todos = $con->query("SELECT * FROM todos ORDER BY id DESC");
   ?>
	<div class="show-to-do">
		<?php if($todos->rowCount() <= 0) {?>
		<div class ="todoitem">
			<div class="empty">
				<img src="list.jpg"/>
		</div>
		<?php } ?>
		
		<?php while($todo = $todos->fetch(PDO::FETCH_ASSOC)) { ?>
	<div class ="todoitem">
		<span id="<?php echo $todo['id']; ?>" name="delte" class="remove-to-do" > x</span>
			<?php if($todo['checked']){?>
				<input type="checkbox"  data-todo-id = "<?php echo $todo['id']; ?>" class="check-box" checked />
				<h3 class="checked"> <?php echo $todo['task'] ?>  </h3>
		<?php }else { ?>
					<input type="checkbox" data-todo-id = "<?php echo $todo['id']; ?>" class="check-box"  />
				<h3> <?php echo $todo['task'] ?>  </h3>
			<?php } ?>
			<small> created:<?php echo $todo['date_time'] ?> </small>
	</div>
		<?php } ?>
	</div>
	
	</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <script>
  $(document).ready(function(){
		$('.remove-to-do').click(function(){
			const id = $(this).attr('id');
			$.post("remove.php",
			{
				id: id
			},
			(data) =>{
				alert(data);
			if(data){
				$(this).parent().hide(600);
			}
				
				});
				
				$(".check-box").click(function(e){
					const id = $(this).attr('data-todo-id');
					alert(id);
					
					$.POST('check.php',
						id: id
					),
					(data) =>{
				alert(data);
			if(data != 'error'){
				const h3 = $(this).next();
				if(data === '1'){
				 h2.removeClass('checked');
				}else{
				     h2.addClass('checked');
				}
			}
					;
					
		});
  });
  </script>
  
  </body>
</html>