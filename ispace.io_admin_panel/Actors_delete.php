
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DELETE ACTORS PAGE</title>
</head>
<body>
<div align="left">
<br>
<h3> Select Actor to delete </b>
<br>
<br>

<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
<select name="ids">

<?php
include "connect.php";
$sql_command = "SELECT actor_id, actor_name, actor_surname FROM actors";

$myresult = mysqli_query($db, $sql_command);

    while($id_rows = mysqli_fetch_assoc($myresult))
    {
        $actor_id = $id_rows['actor_id'];
        $name = $id_rows['actor_name'];
        $surname = $id_rows['actor_surname'];
        
        echo "<option value=$actor_id>". $name . " " . $surname . "</option>";

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
    $sql_statement = "DELETE FROM actors WHERE actor_id = '$id'";
    $result = mysqli_query($db, $sql_statement);
    echo "selected actor was deleted";
}

else {
    echo " the form is not set" . "<br>"; 
}
}
?>

