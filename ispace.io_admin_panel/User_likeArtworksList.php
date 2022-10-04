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
<tr> <th>User ID</th> <th>User name</th>  <th>Music ID</th> <th>Music name</th> <th>Comment</th>  </tr> 
<br>

<?php 

include "connect.php"; // Makes mysql connection

$sql_statement = "SELECT U.user_id,U.user_name, A.artwork_id,A.artwork_title, W.artwork_comment
      FROM  viewartwork W, users U, artworks A
      WHERE W.user_id=U.user_id AND W.artwork_id=A.artwork_id ";
$result = mysqli_query($db, $sql_statement); // Executing query

while($row = mysqli_fetch_assoc($result))
{ // Iterating the result
    $uid = $row['user_id']; 
    $uname = $row['user_name']; 
    $tvsid = $row['artwork_id']; 
    $tvsname = $row['artwork_title']; 
    $comment = $row['artwork_comment']; 
 
    echo "<tr>" . "<th>".$uid."</th>" . "<th>".$uname."</th>" .
                  "<th>".$tvsid."</th>" . "<th>".$tvsname."</th>" . 
                  "<th>".$comment."</th>" .  "</tr>"  ;
}

?>

</table>

</body>
</html>