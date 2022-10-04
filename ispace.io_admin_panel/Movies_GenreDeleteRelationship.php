
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>delete movie-genre relationship entry</title>
</head>

<body>

<h2> delete movie-genre relationship entry  </h2>


<?php
// Start the session
session_start();
$actorid_exists = false;
$tvsid_exists = false;
?>
   
<div align="left">

<h3> Select Movie-Genre relationship entry  to delete </b>


<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
<select name="ids">

<?php
    include "connect.php";

    $sqlcmd = "SELECT M.movie_id, M.movie_title, R.genre_name
        FROM movie_genre R, movies M
        WHERE R.movie_id=M.movie_id ";
    $result = mysqli_query($db, $sqlcmd); // Executing query 
 

    while($row = mysqli_fetch_assoc($result))
    {
        $id = $row['movie_id'];
        $name = $row['movie_title'];
        $gname = $row['genre_name']; 

        $str1 = "$id,$gname" ; 
        $len1 = strlen($str1);
        echo "<option value=$str1>".$id ."-".$name. ", genre name:" . $gname."</option>";
    }

?>


</select>
<button>DELETE</button>

</form>

</div>
</body>
</html>

<?php
if($_SERVER['REQUEST_METHOD'] == "POST")
{

if(!empty($_POST['ids']))
{
    include "connect.php";
    $idx = $_POST['ids'];
    
    $dizi = explode(",",$idx);

    $id = $dizi[0];
    $gname = $dizi[1];



    $sqlcmd = "DELETE FROM movie_genre WHERE movie_id = '$id' AND genre_name='$gname' ";

    echo "<h4> execute following sql statement: </h4> " ;
    echo "<h4>----". $sqlcmd . "</h4>";
    
    $result = mysqli_query($db, $sqlcmd);
    
    echo  "<h4> result of sql statement is:".$result."</h4> " ;
}

}

?>

