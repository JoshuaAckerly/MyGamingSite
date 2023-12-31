<?php
	session_start();
	$user = $_SESSION['user'];
	if(!isset($user)){
		header("Location:admin_login.php");		
	}
?>
<!DOCTYPE html>
<html>
<head>
<title>My Gaming Products Site</title>
<link href="style.css" rel="stylesheet" type="text/css" />
<script src="https://ajax.googleapis.com/ajax/jibs/jquery/1.11.3/jquery.min.js"></script>
<script>
	$(document).ready(function() {
		$('#sendData').click(function() {
			var theId = $('#id').val();
			var newTitle = $('#title').val();
			var newContent = $('#message').val();
			$.post('AJAX/ajax_update.php', { table:"home_page", id:theId, title:newTitle, message:newContent},
				  function(response, textStatus, jqXHR) {
						if(response){
							$('#updateResults').html('The response: '+response+ '<strong>' +textStatus+ '</strong>');
							$('#updateResults').append('<br><a href="home.php">Return to Home page</a>');
						} else {
							$('#updateResults').html("Sorry! It didn't work!");
						}
			});
			
		});
	});

</script>
</head>

<body>

	<?php include('includes/header.inc'); ?>

	<?php include('includes/nav.inc'); ?>

<div id="wrapper">


	<?php include('includes/aside.inc'); ?>


	<section>
		<h2>Update Home Page</h2>
		
		<?php
			if(isset($_POST['Submit_Update'])) {
				include('includes/dbc2.php');
				$table = $_POST['table'];
				$id = $_POST['id'];
				$title = $_POST['title'];
				$message = $_POST['message'];
				$sql = "UPDATE $table SET title='$title', message='$message' WHERE id='$id'";
				$result = mysqli_query($con, $sql);
				if($result!=0){
					$msg = "<h2>Your content has successfuly updated!</h2>";
				}
			}
			if(isset($msg)){
				echo $msg;
			}
		?>
		<div id="updateResults">
		<?php
			$id = $_GET['id'];
			$table = $_GET['table'];
			include('includes/dbc2.php');
			$sql = "SELECT * FROM $table WHERE id='$id'";
			$result = mysqli_query($con, $sql);
			while($row=mysqli_fetch_assoc($result)){
				echo '<input type="hidden" name="id" value="'.$id.'">';
				echo '<input type="hidden" name="table" value="'.$table.'">';
				echo '<p><input type="text" name="title" value="'.$row['title'].'"></p>';
				echo '<p><textarea name="message" rows="20" cols="75">'.$row['message'].'</textarea></p>';
			}
		?>
			<p><input type="button" name="Submit_Update" id="sendData" value="Update"</p>
		</div>
		</form>
	</section>
</div>
		<?php include('includes/footer.inc'); ?>
</body>
</html>
