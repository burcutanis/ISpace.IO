
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DELETE DIRECTOR PAGE</title>
</head>

<body>

<h3> Delete Director </h3>
<br>

<div align="left">
<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
<select name="ids">

<?php
    include "connect.php";
    $sql_command = "SELECT director_id, director_name, director_surname FROM directors";
    $myresult = mysqli_query($db, $sql_command);

    while($id_rows = mysqli_fetch_assoc($myresult))
    {
        $director_id = $id_rows['director_id'];
        $name = $id_rows['director_name'];
        $surname = $id_rows['director_surname'];
        echo "<option value=$director_id>". $name . " " . $surname . "</option>";
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
    $sql_statement = "DELETE FROM directors WHERE director_id = '$id'";
    $result = mysqli_query($db, $sql_statement);
    echo "selected director was deleted";
}
else {
    echo " the form is not set" . "<br>"; 
}
}

?>



