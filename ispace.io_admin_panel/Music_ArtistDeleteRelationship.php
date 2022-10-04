<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>delete a Music-Artist relationship record</title>
</head>

<body>
<br>
<h3> Delete a Music-Artist relationship record  </h3>
<br>
<br>

<?php
// Start the session
session_start();
$musicid_exists = false;
$artistid_exists = false;
?>

<div align="left">

<h3> Select Music-Artist relationship entry  to delete </b>
<br>


<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
<select name="ids">

<?php
    include "connect.php";
    $sql_command = "SELECT M.music_id, M.music_title, R.artist_id_music, R.artist_name_music,R.artist_surname_music
             FROM musicincludesartists I, music M, artist_list_music R
             WHERE I.artist_id_music=R.artist_id_music AND I.music_id=M.music_id ";

    $myresult = mysqli_query($db, $sql_command);

    while($idrow = mysqli_fetch_assoc($myresult))
    {
        $msuicid = $idrow['music_id'];
        $musictitle = $idrow['music_title'];
        $artistid = $idrow['artist_id_music'];
        $artistname = $idrow['artist_name_music'];
        $artistsurname = $idrow['artist_surname_music'];


        $str1 = "$artworkid,$artworktitle,$artistid,$artistname,$artistsurname" ;
        $len1 = strlen($str1);
        echo "<option value=$str1>". $str1 . "</option>";

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
    // foreach ($dizi as $value) {
    //    echo "$value <br>";
    // }

    $musicid = $dizi[0];
    $musictitle= $dizi[1];
    $artistid = $dizi[2];
    $artistname = $dizi[3];
    $artistsurname = $dizi[4];

    echo "the following artwork-artist relation entity will be deleted:<br>";
    echo "------".$musicid." ".$musictitle." ".$artistid." ".$artistname." ".$artistsurname." <br>" ;
    $sql_statement = "DELETE FROM musicincludesartists WHERE music_id = '$musicid' AND artist_id_music='$artistid' ";
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
