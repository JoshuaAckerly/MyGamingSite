<?php
if(isset($_GET['id'])){
	$product_id = $_GET['id'];
}
?>
<!DOCTYPE html>
<html>
<head>
<title>My Gaming Products Site</title>
<link href="style.css" rel="stylesheet" type="text/css" />
</head>

<body>

	<?php include('includes/header.inc'); ?>

	<?php include('includes/nav.inc'); ?>

<div id="wrapper">


	<?php include('includes/aside.inc'); ?>


	<section>
		<?php
			include ('includes/dbc2.php');
			
			$query = "SELECT name, comment, review_date FROM reviews WHERE product_id = $product_id";
		
			$result = mysqli_query($con, $query) ;
		
		if($result == false){
			$error_message = mysqli_error();
				echo "<p>There has been a query error: $error_message</p>";
			}
			if(mysqli_num_rows($result)==0){
				echo "No content is available at this time. Please check back soon.";
			}
			while($row=mysqli_fetch_assoc($result)) {
				$name = $row['name'];
				$comment = $row['comment'];
				$review_date = $row['review_date'];
				
				echo "<p><strong>Name:</strong> $name</p>";
				echo "<p><strong>Comment:</strong> $comment</p>";
				echo "<p><strong>Review Date:</strong> $review_date</p>";
				echo "<hr>";
			}
			mysqli_free_result($result);
			mysqli_close($con);
		?>
	</section>

</div>

		<?php include('includes/footer.inc'); ?>
</body>
</html>
