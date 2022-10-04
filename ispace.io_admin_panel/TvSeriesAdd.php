
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>ADD TV SERIES PAGE</title>
</head>

<body>
<div align="left">
<h3> Add Tv Series </h3>
<br>
<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
  <label for="name">Tv Series name:</label>
  <input type="text" id="name" name="name"><br><br>
  <label for="seasons">Seasons:</label>
  <input type="text" id="seasons" name="seasons"><br><br>
  <label for="ep">Episodes:</label>
  <input type="text" id="ep" name="ep"><br><br>
  <label for="imdb">IMDB:</label>
  <input type="text" id="imdb" name="imdb"><br><br>
  <label for="rt">RT:</label>
  <input type="text" id="rt" name="rt"><br><br>
  <label for="sdate">Start Date:</label>
  <input type="text" id="sdate" name="sdate"><br><br>
  <label for="edate">End Date:</label>
  <input type="text" id="edate" name="edate"><br><br>
  <label for="videolink">Video Link:</label>
  <input type="text" id="videolink" name="videolink"><br><br>
  <label for="language">Language:</label>
  <input type="text" id="language" name="language"><br><br>
  <label for="des">Description:</label>
  <input type="text" id="des" name="des"><br><br>
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
if (!empty($_POST['name'] )) {
$name = $_POST['name'] ;
$sea = $_POST['seasons'] ;
$ep = $_POST['ep'] ;
$imdb = $_POST['imdb'] ;
$rt = $_POST['rt'] ;
$sdate = $_POST['sdate'] ;
$edate = $_POST['edate'] ;
$videolink = $_POST['videolink'] ;
$language = $_POST['language'] ;
$des = $_POST['des'] ;
$image = $_POST['image'] ;


include "connect.php" ;

$sql_statement = "INSERT INTO tv_series(tvSeries_name ,tvSeries_total_season, tvSeries_total_episode, tvSeries_IMDB_rating, tvSeries_RT_rating,tvSeries_start_date, tvSeries_end_date, tvSeries_video_link, tvSeries_language, tvSeries_description, tvSeries_image ) 
          VALUES ('$name','$sea', '$ep', '$imdb', '$rt', '$sdate','$edate','$videolink','$language', '$des', '$image')";
        

$result = mysqli_query($db, $sql_statement);
echo "tv series added, name: " . $name . "<br>"; 

}
else {
  echo " the form is not set" . "<br>"; 
}
}

?>

