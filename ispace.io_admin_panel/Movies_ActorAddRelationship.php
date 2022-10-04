
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>aadd movie-actor relationship  </title>
</head>
<body>


<h2> add movie-actor relationship  </h2>



<?php
// Start the session
session_start();
$actorid_exists = false;
$tvsid_exists = false;
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
<select name="actor_ids">
<?php
    include "connect.php";
    $sql_command = "SELECT * FROM actors";
    $myresult = mysqli_query($db, $sql_command);

    while($rows = mysqli_fetch_assoc($myresult))
    {
        $id = $rows['actor_id'];
        $name = $rows['actor_name'];
        $surname = $rows['actor_surname'];
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
    <button>SUBMIT (insert Movie-Actor relationship record) </button>
</form>

<br><br>

<?php
if($_SERVER['REQUEST_METHOD'] == "POST")
{
        $actorid = $_SESSION["actor_id"];
        $id = $_SESSION["movie_id"] ;

        echo "<br> insert record into the movies_cast table for <br>" ;
        echo " actor id:".$actorid ." movie id: ".$id."<br>";

        include "connect.php";
        $sqlcmd = "INSERT INTO movies_cast(movie_id,actor_id)  VALUES($id,$actorid)";       
        
        echo "execute following sql statement: <br>" ;
        echo "----". $sqlcmd. "<br>";
        
        $result1 = mysqli_query($db, $sqlcmd);
        echo "result of insert is:" . $result1 . "<br><br>" ;
}

?>

</section>

</body>
</html>

