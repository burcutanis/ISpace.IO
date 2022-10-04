
<!DOCTYPE html>
<html>
<head>
    <title>List Books</title>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
</head>

<body> 
<h2> List Books </h2>
<table>

<tr> <th> ID </th>  <th>Book Name/th> <th>Genre</th>  <th> Language</th>  <th>Release Date</th> 
    <th>Publisher</th>  <th>Pages</th> <th>Rating</th>  <th>Cover Link</th> </tr> 

<?php 

include "connect.php"; // Makes mysql connection

$sql_statement = "SELECT * FROM books"; 

$result = mysqli_query($db, $sql_statement); // Executing query

while($row = mysqli_fetch_assoc($result)) { // Iterating the result
    $id = $row['book_id']; 
    $name = $row['book_name']; 
    $genre   = $row['book_genre']; 
    $language   = $row['book_language']; 
    $rdate  = $row['book_release_date'];
    $publisher   = $row['book_publisher'];
    $pages   = $row['book_page_number'];
    $rt = $row['book_goodreads_rating']; 
    $blink = $row['book_cover'];  

        
    echo  "<tr>" ."<th>" . $id . "</th>" . "<th>" . $name . "</th>" . 
          "<th>". $genre."</th>" . "<th>". $language."</th>" . "<th>". $rdate."</th>" . 
          "<th>". $publisher."</th>" . "<th>". $pages."</th>" . "<th>".$rt."</th>" . 
          "<th>"."<a href=".$blink."> Link</a>". "</th>" .    "</tr>" ;

} 

?>
</table>

</body>
</html>

