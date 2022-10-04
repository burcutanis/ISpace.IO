
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>delete a tvSeries-Directors relationship entry</title>
</head>

<body>
<br>
<h3> delete a tvSeries-Directors relationship entry </h3>
<br>
<br>

<?php
// Start the session
session_start();
$dirid_exists = false;
$tvsid_exists = false;
?>
   
<div align="left">

<h3> Select TvSeries-Directors relationship entry  to delete </b>
<br>


<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
<select name="ids">

<?php
    include "connect.php";
    $sql_command = "SELECT T.tvSeries_id,T.tvSeries_name, D.director_id,D.director_name,D.director_surname
            FROM tv_series_directed_by R, directors D, tv_series T
            WHERE R.director_id=D.director_id AND R.tvSeries_id=T.tvSeries_id ";

    $myresult = mysqli_query($db, $sql_command);

    while($row = mysqli_fetch_assoc($myresult))
    {
        $tvsid = $row['tvSeries_id'];
        $tvsname = $row['tvSeries_name'];
        $dirid = $row['director_id']; 
        $dirname = $row['director_name']; 
        $dirsurname = $row['director_surname']; 
 
        $str1 = "$tvsid,$tvsname,$dirid,$dirname,$dirsurname" ; 
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
    $tvsid = $dizi[0];
    $tvsname = $dizi[1];
    $dirid = $dizi[2];
    $dirname = $dizi[3];
    //$dirsurname = $dizi[4];

    //echo "the following tvseries-director relation entity will be deleted:<br>";
    //echo "------".$tvsid." ".$tvsname." ".$dirid." ".$dirname."<br>" ;
    $sql_statement = "DELETE FROM tvseries_director WHERE tvSeries_id = '$tvsid' AND director_id='$dirid' ";
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

