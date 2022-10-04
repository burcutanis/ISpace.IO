
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>ADD Artist</title>
</head>

<body>
<div align="left">

<h3> Add Artist </h3>
<br>

<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
  <label for="name">Artist name:</label>
  <input type="text" id="name" name="name"><br><br>
  <label for="surname">Artist surname:</label>
  <input type="text" id="surname" name="surname"><br><br>

<button> SUBMIT </button>
</form>
</div>
</body>
</html>

<?php
if($_SERVER['REQUEST_METHOD'] == "POST")
{
if (!empty($_POST['name'] )) {
  include "connect.php" ;
  $name = $_POST['name'] ;
  $surname = $_POST['surname'] ;

  
  $sql_statement = "INSERT INTO artist_list_music(artist_name_music,artist_surname_music) 
                    VALUES ('$name','$surname')";
        

  $result = mysqli_query($db, $sql_statement);
  echo "artist added, name: " .$name . "  surname:" . $surname . "<br><br>";  

}
else {
  echo " the form is not set" . "<br>"; 
}
}
?>

