
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>delete tv series episode relationship record </title>
</head>
<body>

<br>
<h3> delete tv series episode relationship record </h3>
<br>
<br>

<form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
<select name="ids">
<?php
    include "connect.php";
    $sql_command = "SELECT T.tvSeries_id, T.tvSeries_name, E.season_number,E.episode_number,
                      E.episode_id,E.episode_title
                      FROM episodes E, tv_series T  WHERE  E.tvSeries_id=T.tvSeries_id ";
    $myresult = mysqli_query($db, $sql_command);
    
    while($row = mysqli_fetch_assoc($myresult))
    {
        $tvsid = $row['tvSeries_id'];
        $tvsname = $row['tvSeries_name'];
        $snnumber = $row['season_number'];
        $epnumber = $row['episode_number']; 
        $epid = $row['episode_id']; 
        $eptitle = $row['episode_title'];    

        $str1 = "$epid,$tvsname,$snnumber,$epnumber,$eptitle" ; 
        $len1 = strlen($str1);  
        echo "<option value=$str1>".$epid." ".$tvsname." ".$snnumber." ".$epnumber." ".$eptitle ."</option>" ;   
    }
?>
</select>
<button>DELETE Episode</button>
</form>

<br><br>

</body>
</html>

<?php
if($_SERVER['REQUEST_METHOD'] == "POST")
{

if(!empty($_POST['ids']))
{
    
    $idx = $_POST['ids'];
    
    $dizi = explode(",",$idx);

    $str1 = "$epid,$tvsname,$snnumber,$epnumber,$eptitle" ; 

    $epid = $dizi[0];
    $tvsname = $dizi[1];
    $snnumber = $dizi[2];
    $epnumber = $dizi[3];
    $eptitle = $dizi[4];

    echo "the following tvseries-episode relationship entry will be deleted:<br>";
    echo "------".$epid." ".$tvsname." ".$snnumber." ".$epnumber." ".$eptitle." <br>" ;

    $sql_statement = "DELETE FROM episodes WHERE episode_id=$epid  ";
    echo "execute following sql statement: <br>" ;
    echo "----". $sql_statement . "<br>";
    
    include "connect.php";
    $result = mysqli_query($db, $sql_statement);
    echo " selected table entry deleted, result:". $result ."<br>";
}
else {
  echo " the form is not set" . "<br>"; 
}
}

?>

