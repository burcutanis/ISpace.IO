
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>ADD Movie</title>
</head>

<body>
<div align="left">

<h2> Add Movie </h2>


<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
  <label for="name">Movie name:</label>
  <input type="text" id="name" name="name"><br><br>
  <label for="duration">Duration:</label>
  <input type="text" id="duration" name="duration"><br><br>
  <label for="imdb">IMDB:</label>
  <input type="text" id="imdb" name="imdb"><br><br>
  <label for="rt">RT:</label>
  <input type="text" id="rt" name="rt"><br><br>
  <label for="rdate">Release Date:</label>
  <input type="text" id="rdate" name="rdate"><br><br>
  <label for="language">Language:</label>
  <input type="text" id="language" name="language"><br><br>
  <label for="des">Description:</label>
  <input type="text" id="des" name="des"><br><br>
  <label for="videolink">Video Link:</label>
  <input type="text" id="videolink" name="videolink"><br><br>
  <label for="image">Image:</label>
  <input type="text" id="image" name="image"><br><br>
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
  $duration = $_POST['duration'] ;
  $imdb = $_POST['imdb'] ;
  $rt = $_POST['rt'] ;
  $rdate = $_POST['rdate'] ;
  $videolink = $_POST['videolink'] ;
  $language = $_POST['language'] ;
  $des = $_POST['des'] ;
  $image = $_POST['image'] ;


  include "connect.php" ;

  //$sqlcmd = "INSERT INTO 'movies' ('movie_title', 'movie_duration', 'movie_IMDB_ranking','movie_RT_rating',
  //    'movie_releasedate','movie_video_links','movie_language','movie_description','movie_image') 
  //     VALUES ('$name','$duration', '$imdb', '$rt', '$rdate','$videolink','$language', '$des', '$image')";

  $sqlcmd = "INSERT INTO `movies` ( `movie_title`, `movie_duration`, `movie_IMDB_ranking`, `movie_RT_rating`, 
      `movie_releasedate`, `movie_language`, `movie_description`,`movie_video_links`,`movie_image`) 
      VALUES ('$name','$duration', '$imdb', '$rt', '$rdate','$language', '$des', '$videolink','$image')";


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

