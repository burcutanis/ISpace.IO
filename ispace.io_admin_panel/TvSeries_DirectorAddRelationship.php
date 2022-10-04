
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>add tv series director relationship </title>
</head>
<body>

<br>
<b> add tv series director relationship </b>
<br>
<br>

<?php
// Start the session
session_start();
$dirid_exists = false;
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
<select name="dir_ids">
<?php
    include "connect.php";
    $sql_command = "SELECT * FROM directors";
    $myresult = mysqli_query($db, $sql_command);

    while($id_rows = mysqli_fetch_assoc($myresult))
    {
        $id = $id_rows['director_id'];
        $name = $id_rows['director_name'];
        $surname = $id_rows['director_surname'];
        echo "<option value=$id>". $id . " - " .$name ." " . $surname. "</option>";
    }

?>
</select>

<button>SELECT DIRECTOR </button>
</form>

<br>

<?php
if($_SERVER['REQUEST_METHOD'] == "GET")
{

    if(!empty($_GET['dir_ids']))
    {
        include "connect.php";
        $id = $_GET['dir_ids'];
        
        $sql_statement = "SELECT * FROM directors WHERE director_id = $id";
        $result = mysqli_query($db, $sql_statement);
        echo "director_id:". $id. "<br><br>" ;
        if ($rows = mysqli_fetch_assoc($result))
        {
            $id = $rows['director_id'];
            $name = $rows['director_name'];
            $surname = $rows['director_surname'];
              
            $dirid_exists = true;
            $_SESSION["director_idflag"] = true;
            $_SESSION["director_id"] = $id ;
            $_SESSION["director_name"] = $name ;
            $_SESSION["director_surname"] = $surname ;

        }
    }
}
?>


</section>

<br> <br><br>

<section>

<form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
    <button>SUBMIT (insert Tv_Series Director relationship record) </button>
</form>

<br><br>

<?php
if($_SERVER['REQUEST_METHOD'] == "POST")
{
        $dirid = $_SESSION["director_id"];
        $tvsid = $_SESSION["tvs_id"] ;

        echo "<br> insert record into the tvseries_director table for <br>" ;
        echo " director id:".$dirid ." tvseries id: ".$tvsid."<br>";

        include "connect.php";
        $sql_statement = "INSERT INTO tv_series_directed_by (tvSeries_id, director_id) 
                VALUES('$tvsid', '$dirid')";       
        $result1 = mysqli_query($db, $sql_statement);
        echo "result of insert is:" . $result1 . "<br><br>" ;
}

?>

</section>

</body>
</html>

