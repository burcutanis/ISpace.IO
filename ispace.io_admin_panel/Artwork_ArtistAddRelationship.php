
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Add Artwork Artist Relationship </title>
</head>
<body>

<br>
<b> Add Artwork Artist Relationship  </b>
<br>
<br>

<?php
// Start the session
session_start();
$artwork_id_exists = false;
$artistid_artwork_exists = false;
?>


<section>

<form method="GET" action="<?php echo $_SERVER['PHP_SELF'];?>">
<select name="artworks_ids">
<?php
    include "connect.php";
    $sql_command = "SELECT artwork_id, artwork_title FROM artworks" ;
    $myresult = mysqli_query($db, $sql_command);

    while($trows = mysqli_fetch_assoc($myresult))
    {
        $artworkid = $trows['artwork_id'];
        $artworktitle = $trows['artwork_title'];
        echo "<option value=$artworkid>". $artworkid ." - " . $artworktitle . "</option>" ;
    }
?>
</select>
<button>SELECT ARTWORKS</button>
</form>

<br>

<?php
if($_SERVER['REQUEST_METHOD'] == "GET")
{

    if(!empty($_GET["artworks_ids"]))
    {
        include "connect.php";
        $artworkid = $_GET["artworks_ids"];

        $sql_statement = "SELECT * FROM artworks WHERE artwork_id='$artworkid'";
        $myresult = mysqli_query($db, $sql_command);

        if ($tvrows = mysqli_fetch_assoc($myresult))
        {
            echo "artwork id:".$artworkid."<br><br>";
            $artworkid_exists = true;
            $_SESSION["artwork_idflag"] = true;
            $_SESSION["artwork_id"] = $artworkid;
            $_SESSION["artwork_title"] = $tvrows["artwork_title"] ;

        }

    }

}
?>

</section>

<br> <br><br>

<section>

<form method="GET" action="<?php echo $_SERVER['PHP_SELF'];?>">
<select name="artist_ids">
<?php
    include "connect.php";
    $sql_command = "SELECT * FROM artist_list_artwork";
    $myresult = mysqli_query($db, $sql_command);

    while($id_rows = mysqli_fetch_assoc($myresult))
    {
        $id = $id_rows['artist_id_artwork'];
        $name = $id_rows['artist_name_artwork'];
        $surname = $id_rows['artist_surname_artwork'];
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

    if(!empty($_GET['artist_ids']))
    {
        include "connect.php";
        $id = $_GET['artist_ids'];

        $sql_statement = "SELECT * FROM artist_list_artwork WHERE artist_id_artwork = $id";
        $result = mysqli_query($db, $sql_statement);
        echo "artist_id_artwork:". $id. "<br><br>" ;
        if ($arows = mysqli_fetch_assoc($result))
        {
            $id = $arows['artist_id_artwork'];
            $name = $arows['artist_name_artwork'];
            $surname = $arows['artist_surname_artwork'];

            $actorid_exists = true;
            $_SESSION["artist_id_artworkflag"] = true;
            $_SESSION["artist_id_artwork"] = $id ;
            $_SESSION["artist_name_artwork"] = $name ;
            $_SESSION["artist_surname_artwork"] = $surname ;

        }
    }
}
?>


</section>

<br> <br><br>

<section>

<form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
    <button>SUBMIT (insert Artwork-Artist relationship record) </button>
</form>

<br><br>

<?php
if($_SERVER['REQUEST_METHOD'] == "POST")
{
        $artworkid = $_SESSION["artwork_id"];
        $artistid = $_SESSION["artist_id_artwork"] ;

        echo "<br> insert record into the has table for <br>" ;
        echo " artwork id:".$artworkid ." artist id: ".$artistid."<br>";

        include "connect.php";
        $sql_statement = "INSERT INTO artworkhasartists (artwork_id, artist_id_artwork)
                VALUES('$artworkid', '$artistid')";
        $result1 = mysqli_query($db, $sql_statement);
        echo "result of insert is:" . $result1 . "<br><br>" ;
}

?>

</section>

</body>
</html>
