<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Delete an Artwork-Artist relationship record</title>
</head>

<body>
<br>
<h3> Delete an Artwork-Artist relationship record  </h3>
<br>
<br>

<?php
// Start the session
session_start();
$artworkid_exists = false;
$artistid_exists = false;
?>

<div align="left">

<h3> Select Artwork-Artist relationship entry to delete </b>
<br>


<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
<select name="ids">

<?php
    include "connect.php";
    $sql_command = "SELECT A.artwork_id, A.artwork_title, R.artist_id_artwork, 
             R.artist_name_artwork, R.artist_surname_artwork
             FROM artworkhasartists H, artworks A, artist_list_artwork R
             WHERE H.Artist_id_artwork=R.artist_id_artwork AND H.Artwork_id=A.artwork_id ";


    $myresult = mysqli_query($db, $sql_command);

    while($idrow = mysqli_fetch_assoc($myresult))
    {
        $artworkid = $idrow['artwork_id'];
        $title = $idrow['artwork_title'];
        $artistid = $idrow['artist_id_artwork'];
        $name = $idrow['artist_name_artwork'];
        $surname = $idrow['artist_surname_artwork'];


        //str1 = "$artworkid,$artworktitle,$artistid,$artistname,$artistsurname" ;,
        $str1 = "$artworkid,$artistid" ;
        $len1 = strlen($str1);
        echo "<option value=$str1>". $artworkid ."-". $title. " --- " .$artistid. " " .$name. " ". $surname."</option>";

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

    $artworkid = $dizi[0];
    $artistid = $dizi[1];


    echo "the following artwork-artist relation entity will be deleted:<br>";
    echo "------".$artworkid." ".$artistid." <br>" ;
    $sql_statement = "DELETE FROM artworkhasartists WHERE artwork_id = '$artworkid' AND artist_id_artwork='$artistid' ";
    echo "execute following sql statement: <br>" ;
    echo "----". $sql_statement . "<br>";
    $result = mysqli_query($db, $sql_statement);
    echo " selected table entry deleted";
}
else {
  echo " the form is not set" . "<br>";
}
}

?>
