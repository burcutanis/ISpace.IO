
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>add tv series actor relationship </title>
</head>
<body>

<br>
<b> add tv series actor relationship  </b>
<br>
<br>

<?php
// Start the session
session_start();
$actorid_exists = false;
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

<form method="GET" action="<?php echo $_SERVER['PHP_SELF'];?>">
<select name="actor_ids">
<?php
    include "connect.php";
    $sql_command = "SELECT * FROM actors";
    $myresult = mysqli_query($db, $sql_command);

    while($id_rows = mysqli_fetch_assoc($myresult))
    {
        $id = $id_rows['actor_id'];
        $name = $id_rows['actor_name'];
        $surname = $id_rows['actor_surname'];
        echo "<option value=$id>". $id . " - " .$name ." " . $surname. "</option>";
    }

?>
</select>

<button>SELECT ACTOR </button>
</form>

<br>

<?php
if($_SERVER['REQUEST_METHOD'] == "GET")
{

    if(!empty($_GET['actor_ids']))
    {
        include "connect.php";
        $id = $_GET['actor_ids'];
        
        $sql_statement = "SELECT * FROM actors WHERE actor_id = $id";
        $result = mysqli_query($db, $sql_statement);
        echo "actor_id:". $id. "<br><br>" ;
        if ($arows = mysqli_fetch_assoc($result))
        {
            $id = $arows['actor_id'];
            $name = $arows['actor_name'];
            $surname = $arows['actor_surname'];
              
            $actorid_exists = true;
            $_SESSION["actor_idflag"] = true;
            $_SESSION["actor_id"] = $id ;
            $_SESSION["actor_name"] = $name ;
            $_SESSION["actor_surname"] = $surname ;

        }
    }
}
?>


</section>

<br> <br><br>

<section>

<form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
    <button>SUBMIT (insert Tv_Series Actor relationship record) </button>
</form>

<br><br>

<?php
if($_SERVER['REQUEST_METHOD'] == "POST")
{
        $actorid = $_SESSION["actor_id"];
        $tvsid = $_SESSION["tvs_id"] ;

        echo "<br> insert record into the tvseries_cast table for <br>" ;
        echo " actor id:".$actorid ." tvseries id: ".$tvsid."<br>";

        include "connect.php";
        $sql_statement = "INSERT INTO tvseries_cast (tvSeries_id, actor_id) 
                VALUES('$tvsid', '$actorid')";       
        $result1 = mysqli_query($db, $sql_statement);
        echo "result of insert is:" . $result1 . "<br><br>" ;
}

?>

</section>

</body>
</html>

