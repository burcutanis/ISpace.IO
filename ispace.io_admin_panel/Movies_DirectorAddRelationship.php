
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>add movie-director relationship  </title>
</head>

<body>


<h2> add movie-director relationship  </h2>



<?php
// Start the session
session_start();
$dirid_exists = false;
$movieid_exists = false;
?>


<section> 


<form method="GET" action="<?php echo $_SERVER['PHP_SELF'];?>">
<select name="movie_ids">
<?php
    include "connect.php";
    $sqlcmd= "SELECT movie_id, movie_title FROM movies" ;
    $myresult = mysqli_query($db, $sqlcmd);
    
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
    <button>SUBMIT (insert Movie-Director relationship record) </button>
</form>

<br><br>

<?php
if($_SERVER['REQUEST_METHOD'] == "POST")
{
    $dirid = $_SESSION["director_id"];
    $id = $_SESSION["movie_id"] ;

    echo "<br> insert record into the movies-director table for <br>" ;
    echo " movie id: ".$id." director id:".$dirid ."<br>";

    include "connect.php";
    $sqlcmd = "INSERT INTO movies_directed_by(movie_id,director_id)  VALUES($id,$dirid)";       
        
    echo "<h4> execute following sql statement: </h4> " ;
    echo "<h4>----". $sqlcmd . "</h4>";
    
    $result = mysqli_query($db, $sqlcmd);
    
    echo  "<h4> result of sql statement is:".$result."</h4> " ;
}

?>

</section>

</body>
</html>

