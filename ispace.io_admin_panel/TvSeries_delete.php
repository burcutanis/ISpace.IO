
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>DELETE TV SERIES PAGE</title>
</head>

<body>
<div align="left">

<h3> Select Tv Series to delete </b>
<br>


<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
<select name="ids">

<?php
include "connect.php";
$sql_command = "SELECT tvSeries_id, tvSeries_name, tvSeries_total_season, tvSeries_total_episode, tvSeries_IMDB_rating, tvSeries_RT_rating,tvSeries_start_date, tvSeries_end_date, tvSeries_video_link, tvSeries_language, tvSeries_description, tvSeries_image  FROM tv_series";

$myresult = mysqli_query($db, $sql_command);

    while($id_rows = mysqli_fetch_assoc($myresult))
    {
        $tvSeries_id = $id_rows['tvSeries_id'];
        $name = $id_rows['tvSeries_name'];
        
        echo "<option value=$tvSeries_id>". $name . "</option>";

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
    $id = $_POST['ids'];
    $sql_statement = "DELETE FROM tv_series WHERE tvSeries_id = '$id'";
    $result = mysqli_query($db, $sql_statement);
    echo "selected tv series was deleted";
}
else {
  echo " the form is not set" . "<br>"; 
}
}

?>

