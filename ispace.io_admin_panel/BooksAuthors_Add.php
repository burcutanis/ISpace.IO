<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>ADD AUTHORS</title>
</head>

<body>
<div align="left">

<h2> Add Author </h2>


<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
  <label for="name">Author name:</label>
  <input type="text" id="name" name="name"><br><br>
  <label for="surname">Author Surname:</label>
  <input type="text" id="surname" name="surname"><br><br>
  
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
  $surname = $_POST['surname'] ;
  



  include "connect.php" ;

   $sqlcmd = "INSERT INTO `author`(`author_name`, `author_surname`)
     VALUES ('$name','$surname')";



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

