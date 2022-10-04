
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>ADD GENRE PAGE</title>
</head>

<body>
<div align="left">

<h3> Add Genre </h3>
<br>

<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
  <label for="name">Genre name:</label>
  <input type="text" id="name" name="name"><br><br>
	<button> SUBMIT</button>
</form>
</div>
</body>
</html>

<?php
if (!empty($_POST['name'] )) {
$name = $_POST['name'] ;
include "connect.php" ;


$sql_statement = "INSERT INTO genres(genre_name) 
					VALUES ('$name')";
				

$result = mysqli_query($db, $sql_statement);
echo "genre added, name: " .$name  . "<br><br>"; 

}


?>
