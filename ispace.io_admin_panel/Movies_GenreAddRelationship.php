
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>add movie-genre relationship entry</title>
</head>
<body>


<h2> add movie-genre relationship entry  </h2>



<?php
// Start the session
session_start();
$genre_exists = false;
$movieid_exists = false;
?>


<section> 

<form method="GET" action="<?php echo $_SERVER['PHP_SELF'];?>">
<select name="movie_ids">
<?php
    include "connect.php";
    $sql_command = "SELECT movie_id, movie_title FROM movies" ;
    $myresult = mysqli_query($db, $sql_command);
    
    while($rows = mysqli_fetch_assoc($myresult))
    {
        $id = $rows['movie_id'];
        $name = $rows['movie_title'];
        echo "<option value=$id>". $id ." - " . $name . "</option>" ;   
    }
?>
</select>
<button>SELECT MOVIE</button>
</form>

<br>

<?php
if($_SERVER['REQUEST_METHOD'] == "GET")
{

    if(!empty($_GET["movie_ids"]))
    {
        include "connect.php";
        $id = $_GET["movie_ids"];
        
        $sqlcmd = "SELECT * FROM movies WHERE movie_id='$id'";
        $myresult = mysqli_query($db, $sqlcmd );
        if ($row = mysqli_fetch_assoc($myresult))
        {     
            echo "movie id:".$id."<br><br>";           
            $movieid_exists = true;
            $_SESSION["movie_idflag"] = true;
            $_SESSION["movie_id"] = $id;
            $_SESSION["movie_title"] = $row["movie_title"] ;
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
    <button>SUBMIT (insert Movies Genres relationship record) </button>
</form>

<br><br>

<?php
if($_SERVER['REQUEST_METHOD'] == "POST")
{
    $gname = $_SESSION["genre_name"] ;
    $id = $_SESSION["movie_id"] ;

    echo "<br> insert record into the movies_genre table for <br>" ;
    echo " movie id: ".$id. " ". "genre: ". $gname. "<br>";

    include "connect.php";
    $sqlcmd = "INSERT INTO movie_genre (movie_id, genre_name) 
                VALUES('$id', '$gname')";       

    echo "<h4> execute following sql statement: </h4> " ;
    echo "<h4>----". $sqlcmd . "</h4>";
    
    $result = mysqli_query($db, $sqlcmd);
    
    echo  "<h4> result of sql statement is:".$result."</h4> " ;
}

?>

</section>

</body>
</html>

