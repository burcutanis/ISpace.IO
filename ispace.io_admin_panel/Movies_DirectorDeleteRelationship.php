
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>delete a Movie-Director relationship entry</title>
</head>

<body>

<h2> delete a Movie-Director relationship entry </h2>


<?php
// Start the session
session_start();
$dirid_exists = false;
$tvsid_exists = false;
?>
   
<div align="left">

<h3> Select Movie-Director relationship entry  to delete </b>
<br>


<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
<select name="ids">

<?php
    include "connect.php";
    $sqlcmd = "SELECT M.movie_id, M.movie_title, D.director_id,D.director_name,D.director_surname
      FROM movies_directed_by R, directors D, movies M
      WHERE R.director_id=D.director_id AND R.movie_id=M.movie_id ";

    $myresult = mysqli_query($db, $sqlcmd);

    while($row = mysqli_fetch_assoc($myresult))
    {
        $id = $row['movie_id'];
        $name = $row['movie_title'];
        $dirid = $row['director_id']; 
        $dirname = $row['director_name']; 
        $dirsurname = $row['director_surname']; 
         
        $str1 = "$id,$dirid" ; 
        $len1 = strlen($str1);
        echo "<option value=$str1>".$id ."-".$name. "-----".$dirid."-".$dirname." ". $dirsurname."</option>";

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
    $dirid = $dizi[1];


    echo "the following movie-director relation entity will be deleted:<br>";
    echo "------".$id." ".$dirid."<br>" ;
    $sqlcmd = "DELETE FROM movies_directed_by WHERE movie_id = '$id' AND director_id='$dirid' ";

    echo "<h4> execute following sql statement: </h4> " ;
    echo "<h4>----". $sqlcmd . "</h4>";
    
    $result = mysqli_query($db, $sqlcmd);
    
    echo  "<h4> result of sql statement is:".$result."</h4> " ;
}

}

?>

