
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>add music-artist relationship  </title>
</head>
<body>


<h2> add music-artist relationship  </h2>



<?php
// Start the session
session_start();
$artistid_exists = false;
$musicid_exists = false;
?>


<section> 


<form method="GET" action="<?php echo $_SERVER['PHP_SELF'];?>">
<select name="ids">
<?php
    include "connect.php";
    $sql_command = "SELECT * FROM music" ;
    $myresult = mysqli_query($db, $sql_command);
    
    while($rows = mysqli_fetch_assoc($myresult))
    {
        $id = $rows['music_id'];
        $name = $rows['music_title'];
        echo "<option value=$id>". $id ." - " . $name . "</option>" ;   
    }
?>
</select>
<button>SELECT MUSIC</button>
</form>

<br>

<?php
if($_SERVER['REQUEST_METHOD'] == "GET")
{

    if(!empty($_GET["ids"]))
    {
        include "connect.php";
        $id = $_GET["ids"];
        
        $sqlcmd = "SELECT * FROM music WHERE music_id='$id'";
        $myresult = mysqli_query($db, $sqlcmd );
        if ($row = mysqli_fetch_assoc($myresult))
        {     
            echo "movie id:".$id."<br><br>";           
            $musicid_exists = true;
            $_SESSION["music_idflag"] = true;
            $_SESSION["music_id"] = $id;
            $_SESSION["music_title"] = $row["music_title"] ;
        }  
    }
}
?>

</section>

<br> <br><br>

<section>

<form method="GET" action="<?php echo $_SERVER['PHP_SELF'];?>">
<select name="ids">
<?php
    include "connect.php";
    $sql_command = "SELECT * FROM artist_list_music";
    $myresult = mysqli_query($db, $sql_command);

    while($row = mysqli_fetch_assoc($myresult))
    {
        $idx = $row['artist_id_music']; 
        $name = $row['artist_name_music']; 
        $surname = $row['artist_surname_music']; 
        echo "<option value=$idx>". $idx . " - " .$name ." " . $surname. "</option>";
    }

?>
</select>

<button>SELECT ARTIST </button>
</form>

<br>

<?php
if($_SERVER['REQUEST_METHOD'] == "GET")
{

    if(!empty($_GET['ids']))
    {
        include "connect.php";
        $id = $_GET['ids'];
        
        $sql_statement = "SELECT * FROM artist_list_music WHERE artist_id_music = $id";
        $result = mysqli_query($db, $sql_statement);
        echo "actor_id:". $id. "<br><br>" ;
        if ($row = mysqli_fetch_assoc($result))
        {
            $id = $row['artist_id_music']; 
            $name = $row['artist_name_music']; 
            $surname = $row['artist_surname_music'];  

            $artistid_exists = true;
            $_SESSION["artist_idflag"] = true;
            $_SESSION["artist_id"] = $id ;
            $_SESSION["artist_name"] = $name ;
            $_SESSION["artist_surname"] = $surname ;

        }
    }
}
?>


</section>

<br> <br><br>

<section>

<form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
    <button>SUBMIT (insert Music-Artist relationship record) </button>
</form>

<br><br>

<?php
if($_SERVER['REQUEST_METHOD'] == "POST")
{
        $artistid = $_SESSION["artist_id"];
        $id = $_SESSION["music_id"] ;

        echo "<br> insert record into the movies_cast table for <br>" ;
        echo " artist id:".$artistid ." music id: ".$id."<br>";

        include "connect.php";
        $sqlcmd = "INSERT INTO musicincludesartists(music_id,artist_id_music)  VALUES($id,$artistid)";       
        echo "execute following sql statement: <br>" ;
        echo "----". $sqlcmd. "<br>";
        
        $result1 = mysqli_query($db, $sqlcmd);
        echo "result of insert is:" . $result1 . "<br><br>" ;
}

?>

</section>

</body>
</html>

