
<!DOCTYPE html>
<html>

<head>
    <title>Movies-Genre List</title>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 90%;
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
<h2>  Movies-Genre List </h2>

<table>
<tr>  <th>Movie ID</th> <th>Movie Title</th> <th>Genre Name</th>  </tr> 


<?php 
    include "connect.php"; 
    
    $sqlcmd = "SELECT M.movie_id, M.movie_title, R.genre_name
        FROM movie_genre R, movies M
        WHERE R.movie_id=M.movie_id ";
    $result = mysqli_query($db, $sqlcmd); // Executing query 

    while($row = mysqli_fetch_assoc($result))
    {
        $id = $row['movie_id'];
        $name = $row['movie_title'];
        $genrename = $row['genre_name']; 

        
        echo "<tr>" . "<th>".$id."</th>" ."<th>".$name."</th>" .
             "<th>".$genrename."</th>"  ."</tr>"  ;
    }
?>
</table>


</body>
</html>


