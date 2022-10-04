
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
<tr> <th>User ID</th> <th>User name</th>  <th>Book ID</th> <th>Book name</th> <th>Comment</th>  </tr> 
<br>

<?php 

include "connect.php"; // Makes mysql connection

$sql_statement = "SELECT U.user_id,U.user_name, B.book_id,B.book_name, R.book_comment
      FROM readbooks R, users U, books B
      WHERE R.user_id=U.user_id AND B.book_id=R.book_id ";
$result = mysqli_query($db, $sql_statement); // Executing query

while($row = mysqli_fetch_assoc($result))
{ // Iterating the result
    $uid = $row['user_id']; 
    $uname = $row['user_name']; 
    $tvsid = $row['book_id']; 
    $tvsname = $row['book_name']; 
    $comment = $row['book_comment']; 
 
    echo "<tr>" . "<th>".$uid."</th>" . "<th>".$uname."</th>" .
                  "<th>".$tvsid."</th>" . "<th>".$tvsname."</th>" . 
                  "<th>".$comment."</th>" .  "</tr>"  ;
}

?>

</table>

</body>
</html>






