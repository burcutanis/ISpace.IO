
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Add Book</title>
</head>

<body>
<div align="left">

<h2> Add Book </h2>


<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
  <label for="name">Book name:</label>
  <input type="text" id="name" name="name"><br><br>
  <label for="genre">Book Genre:</label>
  <input type="text" id="genre" name="genre"><br><br>
  <label for="goodreads">Good Reads Rating:</label>
  <input type="text" id="goodreads" name="goodreads"><br><br>
  <label for="lng">Language:</label>
  <input type="text" id="lng" name="lng"><br><br>
  <label for="cover">Book Cover:</label>
  <input type="text" id="cover" name="cover"><br><br>
  <label for="pub">Publisher:</label>
  <input type="text" id="pub" name="pub"><br><br>
  <label for="rdate">Release Date:</label>
  <input type="text" id="rdate" name="rdate"><br><br>
  <label for="page">Total Page:</label>
  <input type="text" id="page" name="page"><br><br>
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
  $genre = $_POST['genre'] ;
  $goodreads = $_POST['goodreads'] ;
  $lng = $_POST['lng'] ;
  $cover = $_POST['cover'] ;
  $pub = $_POST['pub'] ;
  $rdate = $_POST['rdate'] ;
  $page = $_POST['page'] ;



  include "connect.php" ;

$sqlcmd =  "INSERT INTO `books`(`book_name`, `book_genre`, `book_goodreads_rating`, `book_language`, 
     `book_cover`, `book_publisher`, `book_release_date`, `book_page_number`) 
      VALUES   ('$name','$genre', '$goodreads', '$lng', '$cover','$pub','$rdate', '$page')"; 

  // $sqlcmd = "INSERT INTO 'books' ('book_name', 'book_genre', 'book_goodreads_rating','book_language',
  //  'book_cover','book_publisher','book_release_date','book_page_number') 
  //   VALUES ('$name','$genre', '$goodreads', '$lng', '$cover','$pub','$rdate', '$page')";

  //$sqlcmd = "INSERT INTO `movies` ( `movie_title`, `movie_duration`, `movie_IMDB_ranking`, `movie_RT_rating`, 
  //    `movie_releasedate`, `movie_language`, `movie_description`,`movie_video_links`,`movie_image`) 
   //   VALUES ('$name','$duration', '$imdb', '$rt', '$rdate','$language', '$des', '$videolink','$image')";


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

