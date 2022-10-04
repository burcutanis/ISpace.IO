
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>add tvseries-genre relationship entry</title>
</head>
<body>

<br>
<b> add tvseries-genre relationship entry  </b>
<br>
<br>

<?php
// Start the session
session_start();
$genre_exists = false;
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
        
        $sqlcmd = "SELECT * FROM tv_series WHERE tvSeries_id='$tid'";
        $myresult = mysqli_query($db, $sqlcmd );
       
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
<select name="gname">
<?php
    include "connect.php";
    $sql_command = "SELECT * FROM genres";
    $myresult = mysqli_query($db, $sql_command);

    while($id_rows = mysqli_fetch_assoc($myresult))
    {
        $gname = $id_rows['genre_name'];
        echo "<option value=$gname>". $gname . "</option>";
    }

?>
</select>

<button>SELECT GENRE </button>
</form>

<br>

<?php
if($_SERVER['REQUEST_METHOD'] == "GET")
{

    if(!empty($_GET['gname']))
    {

        $gname = $_GET['gname'];
        echo "genre name:". $gname. "<br><br>" ;

        $genre_exists = true;
        $_SESSION["genre_flag"] = true;
        $_SESSION["genre_name"] = $gname ;
        
    }
}
?>


</section>

<br> <br><br>

<section>

<form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
    <button>SUBMIT (insert Tv_Series Genres relationship record) </button>
</form>

<br><br>

<?php
if($_SERVER['REQUEST_METHOD'] == "POST")
{
        $gname = $_SESSION["genre_name"] ;
        $tvsid = $_SESSION["tvs_id"] ;

        echo "<br> insert record into the tvseries_genre table for <br>" ;
        echo " tvseries id: ".$tvsid. " ". "genre: ". $gname. "<br>";

        include "connect.php";
        $sql_statement = "INSERT INTO tvseries_genre (tvSeries_id, genre_name) 
                VALUES('$tvsid', '$gname')";       
        $result1 = mysqli_query($db, $sql_statement);
        echo "result of insert is:" . $result1 . "<br><br>" ;
}

?>

</section>

</body>
</html>

