<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $productId = $_POST['id'];
    $name = $_POST['name'];
    $comment = $_POST['comment'];
        echo "A: $productId";
        echo "B: $name";
        echo "C: $comment";
    if (empty($productId) || empty($name) || empty($comment)) {
                echo "wut";
        return;
    }
        echo "D";
    include('includes/dbc2.php');
        echo "E";
    $query = "INSERT INTO reviews (`product_id`, `name`, `comment`) VALUES('$productId', '$name', '$comment')";
        echo "F";
    $result = mysqli_query($con, $query);
        echo "G";
    if ($result == false) {
        echo "H";
          // An error occurred with the query.
          $error = mysqli_error($con);
        echo "I";
          echo "<p>There has been a query error: $error_message</p>";
    } else {
               echo "J";
        }
echo "K";
echo "alphabet party is over now :(";
} else {
echo "L";
}
?>

<!DOCTYPE html>
<!DOCTYPE html>
<html>
<head>
<title>My Gaming Products Site</title>
<link href="style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
	function checkForm() {
		var name = document.getElementById('name').value;
		var comment = document.getElementById('comment').value;
		
		if (name ==""){
			document.form1.name.focus();
			return false;
		}
		
		if (comment == ""){
			document.form1.comment.focus();
			return false;
		}
	}

</script>
</head>

<body>
<?php include('includes/header.inc'); ?>
<?php include('includes/nav.inc'); ?>
<div id="wrapper">
  <?php include('includes/aside.inc'); ?>
  <section>
	<h2>Add Review!</h2>
	<form id="form1" name="form1" method="post" action="<?php $_SERVER['PHP_SELF']; ?>" onsubmit="return checkForm()">
                <p>Product ID:<br><input type="text" readonly name="id" id="id" value="<?php echo $_GET['id']; ?>"</p>
                <p>Name:<br><input type="text" name="name" id="name"></p>
                <p>Comment:<br><input type="text" name="comment" id="comment">
                <p><input type="submit" value="Submit" name="submit_review"></p>
            </form><br><br>
            <?php 
                if(isset($msg)) {
                    echo $msg;
                }
             ?>
	</section>
</div>






