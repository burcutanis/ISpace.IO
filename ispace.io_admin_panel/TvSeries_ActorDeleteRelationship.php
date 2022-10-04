
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>delete a tvSeries-Actors relationship record</title>
</head>

<body>
<br>
<h3> delete a tvSeries-Actors relationship record  </h3>
<br>
<br>

<?php
// Start the session
session_start();
$actorid_exists = false;
$tvsid_exists = false;
?>
   
<div align="left">

<h3> Select TvSeries-Actors relationship entry  to delete </b>
<br>


<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
<select name="ids">

<?php
    include "connect.php";
    $sql_command = "SELECT T.tvSeries_id, T.tvSeries_name, A.actor_id,A.actor_name,A.actor_surname
             FROM tvseries_cast R, actors A, tv_series T
             WHERE R.actor_id=A.actor_id AND R.tvSeries_id=T.tvSeries_id ";

    $myresult = mysqli_query($db, $sql_command);

    while($idrow = mysqli_fetch_assoc($myresult))
    {
        $tvsid = $idrow['tvSeries_id'];
        $tvsname = $idrow['tvSeries_name'];
        $actid = $idrow['actor_id']; 
        $actname = $idrow['actor_name']; 
        $actsurname = $idrow['actor_surname']; 

 
        $str1 = "$tvsid,$tvsname,$actid,$actname,$actsurname" ; 
        $len1 = strlen($str1);
        echo "<option value=$str1>". $str1 . "</option>";

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
    $idx = $_POST['ids'];
    
    $dizi = explode(",",$idx);
    // foreach ($dizi as $value) {
    //    echo "$value <br>";
    // }

    $tvsid = $dizi[0];
    $tvsname = $dizi[1];
    $actid = $dizi[2];
    $actname = $dizi[3];
    $actsurname = $dizi[4];

    echo "the following tvseries-actor relation entity will be deleted:<br>";
    echo "------".$tvsid." ".$tvsname." ".$actid." ".$actname." ".$actsurname." <br>" ;
    $sql_statement = "DELETE FROM tvseries_cast WHERE tvSeries_id = '$tvsid' AND actor_id='$actid' ";
    echo "execute following sql statement: <br>" ;
    echo "----". $sql_statement . "<br>";
    $result = mysqli_query($db, $sql_statement);
    echo " selected table entry deleted";
}
else {
  echo " the form is not set" . "<br>"; 
}
}

?>

