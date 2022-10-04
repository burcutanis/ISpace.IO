
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>ADD DIRECTOR PAGE</title>
</head>
<body>

<h3> Add Director </h3>
<br>

<div align="left">
<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
  <label for="name">Director name:</label>
  <input type="text" id="name" name="name"><br><br>
  <label for="surname">Director surname:</label>
  <input type="text" id="surname" name="surname"><br><br>
	<button> SUBMIT </button>
</form>
</div>
</body>
</html>


<?php
if($_SERVER['REQUEST_METHOD'] == "POST")
{
	if (!empty($_POST['name'] ))
	{
		include "connect.php" ;
		$name = $_POST['name'] ;
		$surname = $_POST['surname'] ;

		$sql_statement = "INSERT INTO directors(director_name,director_surname) 
						VALUES ('$name','$surname')";
				
		echo "director added, name: " .$name . "  surname:" . $surname . "<br><br>"; 
		$result = mysqli_query($db, $sql_statement);
	}
	else 
	{
    echo " the form is not set" . "<br>"; 
	}
}


?>




