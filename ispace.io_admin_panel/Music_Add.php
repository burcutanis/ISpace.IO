
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Add Music</title>
</head>

<body>
<div align="left">

<h2> Add Music </h2>


<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
  <label for="name">Music name:</label>
  <input type="text" id="name" name="name"><br><br>
  <label for="album">Album name:</label>
  <input type="text" id="album" name="album"><br><br>
  <label for="rdate">Release Date:</label>
  <input type="text" id="rdate" name="rdate"><br><br>
  <label for="cover">Cover Link:</label>
  <input type="text" id="cover" name="cover"><br><br>
  <label for="mlink">Music Link:</label>
  <input type="text" id="mlink" name="mlink"><br><br>
<button> SUBMIT </button>
</form>
</div>
</body>
</html>

<?php
if($_SERVER['REQUEST_METHOD'] == "POST")
{
if (!empty($_POST['name'] )) 
{
  $name = $_POST['name'] ;
  $album = $_POST['album'] ;
  $rdate = $_POST['rdate'] ;
  $cover = $_POST['cover'] ;
  $mlink = $_POST['mlink'] ;


  include "connect.php" ;

  

  $sqlcmd = "INSERT INTO `music`(`music_title`, `album_name`, 
  `music_release_date`, `music_cover_image`, `music_link`) 
  VALUES ('$name','$album','$rdate', '$cover','$mlink')"; 

    echo "<h4> execute following sql statement: </h4> " ;
    echo "<h4>----". $sqlcmd . "</h4>";
    
    $result = mysqli_query($db, $sqlcmd);
    
    echo  "<h4> result of sql statement is:".$result."</h4> " ;
}
else 
{
  echo "<h4> the form is not set </h4>" ; 
}
}

?>

