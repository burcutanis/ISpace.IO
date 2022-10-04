
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DELETE Music PAGE</title>
</head>

<body>
<div align="left">

<h2> Select Music to delete </h2>



<form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
<select name="ids">

<?php
include "connect.php";
$sqlcmd = "SELECT * FROM music"; 
$myresult = mysqli_query($db, $sqlcmd);

    while($row = mysqli_fetch_assoc($myresult))
    {
        $id = $row['music_id']; 
        $name = $row['music_title']; 
        echo "<option value=$id>". $id . " -  " . $name . "</option>";
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
    $sqlcmd = "DELETE FROM music WHERE music_id= $id ";

    echo "<h4> execute following sql statement: </h4> " ;
    echo "<h4>----". $sqlcmd . "</h4>";
    
    $result = mysqli_query($db, $sqlcmd);
    
    echo  "<h4> result of sql statement is:".$result."</h4> " ;
}

}

?>

