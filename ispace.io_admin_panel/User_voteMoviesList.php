<!DOCTYPE html>
<html>

<head>
    <title>Messages</title>

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


<table>
<br>
<tr> <th>User ID</th> <th>User name</th>  <th>Movies ID</th> <th>Movies name</th>  <th>Rate</th> <th>Comment</th>  </tr> 
<br>

<?php 

include "connect.php"; // Makes mysql connection

$sql_statement = "SELECT U.user_id,U.user_name, M.movie_id,M.movie_title, W.movie_rating, W.movie_comment
      FROM watch_movie W, users U, movies M
      WHERE W.user_id=U.user_id AND W.movie_id=M.movie_id ";
$result = mysqli_query($db, $sql_statement); // Executing query

while($row = mysqli_fetch_assoc($result))
{ // Iterating the result
    $uid = $row['user_id']; 
    $uname = $row['user_name']; 
    $mid = $row['movie_id']; 
    $mname = $row['movie_title']; 
    $comment = $row['movie_comment']; 
    $rate = $row['movie_rating'];
    echo "<tr>" . "<th>".$uid."</th>" . "<th>".$uname."</th>" .
                  "<th>".$mid."</th>" . "<th>".$mname."</th>" . 
                  "<th>".$rate."</th>" . "<th>".$comment."</th>" .  "</tr>"  ;
}

?>

</table>

</body>
</html>


