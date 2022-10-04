
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>add tv series episode relationship </title>
</head>
<body>

<br>
<b> add tv series episode relationship record </b>
<br>
<br>

<?php
// Start the session
session_start();
$tvsid_exists = false;
?>


<section> 

<form method="GET" action="<?php echo $_SERVER['PHP_SELF'];?>">
<select name="tvs_ids">
<?php
    include "connect.php";
    $sql_command = "SELECT tvSeries_id, tvSeries_name FROM tv_series" ;
    $myresult = mysqli_query($db, $sql_command);
    
    while($trows = mysqli_fetch_assoc($myresult))
    {
        $tid = $trows['tvSeries_id'];
        $tname = $trows['tvSeries_name'];
        echo "<option value=$tid>". $tid ." - " . $tname . "</option>" ;   
    }
?>
</select>
<button>SELECT TVSERIES</button>
</form>

<br>

<?php
if($_SERVER['REQUEST_METHOD'] == "GET")
{

    if(!empty($_GET["tvs_ids"]))
    {
        include "connect.php";
        $tid = $_GET["tvs_ids"];
        
        $sql_statement = "SELECT * FROM tv_series WHERE tvSeries_id='$tid'";
        $myresult = mysqli_query($db, $sql_command);
       
        if ($tvrows = mysqli_fetch_assoc($myresult))
        {     
            echo "tvseries id:".$tid."<br><br>";           
            $tvsid_exists = true;
            $_SESSION["tvs_idflag"] = true;
            $_SESSION["tvs_id"] = $tvrows["tvSeries_id"] ;
            $_SESSION["tvs_name"] = $tvrows["tvSeries_name"] ;

        }  

    }

}
?>

</section>

<br> <br><br>

<section>

<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
  <label for="snnumber">Season number:</label>
  <input type="text" id="snnumber" name="snnumber"><br><br>
  <label for="epnumber">Episode number:</label>
  <input type="text" id="epnumber" name="epnumber"><br><br>
  <label for="eptitle">Episode title:</label>
  <input type="text" id="eptitle" name="eptitle"><br><br>
  <label for="epdur">Episode duration:</label>
  <input type="text" id="epdur" name="epdur"><br><br>
  <button>SUBMIT (insert Tv_Series Episode record) </button>
</form>

<br><br>

<?php
if($_SERVER['REQUEST_METHOD'] == "POST")
{
        $tvsid = $_SESSION["tvs_id"] ;
        $tvsname = $_SESSION["tvs_name"];
        
        $snnumber = $_POST['snnumber'] ;
        $epnumber = $_POST['epnumber'] ;
        $eptitle  = $_POST['eptitle'] ;
        $epdur    = $_POST['epdur'];

        echo "<br> insert record into the episodes table for <br>" ;
        echo "tv series id: ".$tvsid. "tv series name:".$tvsname. "<br>";
        echo "season:".$snnumber." episode:".$epnumber." ".$eptitle ."<br><br>"; 
        echo "duration:".$epdur."<br><br>"; 

        include "connect.php";
        $sql_statement = "INSERT INTO episodes (tvSeries_id,season_number,episode_number,episode_title,episode_duration) 
                VALUES('$tvsid', '$snnumber','$epnumber','$eptitle','$epdur')";       
                      
        $result1 = mysqli_query($db, $sql_statement);
        echo "result of insert is:" . $result1 . "<br><br>" ;
}

?>

</section>

</body>
</html>

