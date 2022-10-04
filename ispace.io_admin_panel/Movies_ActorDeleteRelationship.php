
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>delete a Movie-Actor relationship record</title>
</head>

<body>

<h2> delete a Movie-Actor relationship record  </h2>


<?php
// Start the session
session_start();
$actorid_exists = false;
$tvsid_exists = false;
?>
   
<div align="left">

<h3> Select Movie-Actor  relationship entry  to delete </b>
<br>


<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
<select name="ids">

<?php
    include "connect.php";

    $sqlcmd = "SELECT M.movie_id, M.movie_title, A.actor_id,A.actor_name,A.actor_surname
      FROM movies_cast R, actors A, movies M
      WHERE R.actor_id=A.actor_id AND R.movie_id=M.movie_id ";
   

    $myresult = mysqli_query($db, $sqlcmd);  // Executing query 

    while($row = mysqli_fetch_assoc($myresult))
    {
        $id = $row['movie_id'];
        $name = $row['movie_title'];
        $actid = $row['actor_id']; 
        $actname = $row['actor_name']; 
        $actsurname = $row['actor_surname']; 

 
        $str1 = "$id,$actid" ; 
        $len1 = strlen($str1);
        echo "<option value=$str1>".$id ."-".$name." ----- ".$actid."-".$actname." ".$actsurname. "</option>";

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
    $actid = $dizi[1];

    echo "the following movie-actor relation entity will be deleted:<br>";
    echo "------movie id:".id." actor id:".$actid." <br>" ;

    $sqlcmd = "DELETE FROM movies_cast WHERE movie_id = '$id' AND actor_id='$actid' ";


    echo "execute following sql statement: <br>" ;
    echo "----". $sqlcmd . "<br>";
    
    $result = mysqli_query($db, $sqlcmd);
    
    echo " result of delete is:" . $result . "<br><br>" ;
}
else {
  echo " the form is not set" . "<br>"; 
}
}

?>

