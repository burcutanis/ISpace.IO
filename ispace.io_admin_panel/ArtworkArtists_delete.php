
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DELETE ARTWORK ARTIST PAGE</title>
</head>

<body>

<h3> Delete Artwork Artist </h3>
<br>

<div align="left">
<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
<select name="ids">

<?php
    include "connect.php";
    $sql_command = "SELECT artist_id_artwork, artist_name_artwork, artist_surname_artwork FROM artist_list_artwork";
    $myresult = mysqli_query($db, $sql_command);

    while($id_rows = mysqli_fetch_assoc($myresult))
    {
        $artist_id = $id_rows['artist_id_artwork'];
        $name = $id_rows['artist_name_artwork'];
        $surname = $id_rows['artist_surname_artwork'];
        echo "<option value=$artist_id>". $name . " " . $surname . "</option>";
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
if (!empty($_POST['ids'] )) {
    include "connect.php" ;
    $id = $_POST['ids'];
    $sql_statement = "DELETE FROM artist_list_artwork WHERE artist_id_artwork = '$id'";
    $result = mysqli_query($db, $sql_statement);
    echo "selected artwork artist was deleted";
}
else {
    echo " the form is not set" . "<br>";
}
}

?>
