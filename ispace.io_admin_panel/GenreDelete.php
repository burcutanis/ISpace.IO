
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DELETE GENRE PAGE</title>
</head>
<body>
<div align="left">

<h3> Delete Genre  </h3>
<br>

<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
<select name="ids">

<?php
    include "connect.php";
    $sql_command = "SELECT genre_name FROM genres";

    $myresult = mysqli_query($db, $sql_command);

    while($id_rows = mysqli_fetch_assoc($myresult))
    {
        $name = $id_rows['genre_name'];
         echo "<option value=$name>". $name . "</option>";
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
    $sql_statement = "DELETE FROM genres WHERE genre_name = '$id'";
    $result = mysqli_query($db, $sql_statement);
    echo "selected genre was deleted";
}


else {
    echo " the form is not set" . "<br>"; 
}
}

?>