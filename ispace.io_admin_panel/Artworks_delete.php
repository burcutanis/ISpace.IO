
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DELETE ARTWORK PAGE</title>
</head>

<body>

<h3> Delete Artwork </h3>
<br>

<div align="left">
<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
<select name="ids">

<?php
    include "connect.php";
    $sql_command = "SELECT artwork_id, artwork_title FROM artworks";
    $myresult = mysqli_query($db, $sql_command);

    while($id_rows = mysqli_fetch_assoc($myresult))
    {
        $artwork_id = $id_rows['artwork_id'];
        $title = $id_rows['artwork_title'];

        echo "<option value=$artwork_id>". $title . "</option>";
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
    $sql_statement = "DELETE FROM artworks WHERE artwork_id = '$id'";
    $result = mysqli_query($db, $sql_statement);
    echo "selected artwork was deleted";
}
else {
    echo " the form is not set" . "<br>"; 
}
}

?>
