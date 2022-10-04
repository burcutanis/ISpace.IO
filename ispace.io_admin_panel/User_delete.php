
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>DELETE USER PAGE</title>
    
</head>

<body>
<div align="left">

<h3> Select User to delete </b>
<br>

<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
<select name="ids">
<?php
    include "connect.php";
    $sql_command = "SELECT * FROM users";

    $myresult = mysqli_query($db, $sql_command);

    while($idrow = mysqli_fetch_assoc($myresult))
    {
        $id = $idrow['user_id']; 
        $name = $idrow['user_name']; 
        $email = $idrow['user_email']; 
        echo "<option value=$id>" .$name . " - ". $email . "</option>" ;
    }
?>
</select>
<button>DELETE</button>
</form>

</div>
</body>
</html>

<?php
if($_SERVER['REQUEST_METHOD'] == "POST")
{



if(!empty($_POST['ids']))
{
    include "connect.php";
    $id = $_POST['ids'];
    $sql_statement = "DELETE FROM users WHERE user_id = $id";
    $result = mysqli_query($db, $sql_statement);
    echo "selected user was deleted";
}
else {
  echo " the form is not set <br>"; 
}
}

?>


