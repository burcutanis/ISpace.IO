<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>ADD ARTWORK PAGE</title>
</head>

<body>
<div align="left">

<h3> Add Actwork </h3>
<br>

<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
  <label for="name">Artwork title:</label>
  <input type="text" id="name" name="name"><br><br>
  <label for="size">Size:</label>
  <input type="text" id="size" name="size"><br><br>
  <label for="location">Location:</label>
  <input type="text" id="location" name="location"><br><br>
    <label for="period">Period:</label>
  <input type="text" id="period" name="period"><br><br>
    <label for="medium">Medium:</label>
  <input type="text" id="medium" name="medium"><br><br>
    <label for="date">Date:</label>
  <input type="text" id="date" name="date"><br><br>



<button> SUBMIT </button>
</form>
</div>
</body>
</html>

<?php
if($_SERVER['REQUEST_METHOD'] == "POST")
{
if (!empty($_POST['name'] )) {
	include "connect.php" ;
	$name = $_POST['name'] ;
	$location = $_POST['location'] ;
	$period = $_POST['period'] ;
	$medium = $_POST['medium'] ;
	$size = $_POST['size'] ;
	$date = $_POST['date'] ;



	$sql_statement = "INSERT INTO `artworks`(`artwork_title`, `artwork_size`, `artwork_location`, `artwork_period`, `artwork_medium`, `artwork_date`)
	          				VALUES ('$name','$size', '$location', 'period', 'medium', '$date')";


	$result = mysqli_query($db, $sql_statement);
	echo "artwork added, name: " .$name . "  size:" . $size . "<br><br>";

}
else {
	echo " the form is not set" . "<br>";
}
}
?>
