
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DELETE Artist</title>
</head>
<body>
<div align="left">
<br>
<h3> Select Artist to delete </b>
<br>
<br>

<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
<select name="ids">

<?php
include "connect.php";
$sql_command = "SELECT * FROM artist_list_music";

$myresult = mysqli_query($db, $sql_command);

    while($row = mysqli_fetch_assoc($myresult))
    {
        $id = $row['artist_id_music']; 
        $name = $row['artist_name_music']; 
        $surname = $row['artist_surname_music']; 
        
        echo "<option value=$id>". $name . " " . $surname . "</option>";

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
    $sql_statement = "DELETE FROM artist_list_music WHERE artist_id_music = '$id'";
    $result = mysqli_query($db, $sql_statement);
    echo "selected actor was deleted";
}

else {
    echo " the form is not set" . "<br>"; 
}
}
?>

