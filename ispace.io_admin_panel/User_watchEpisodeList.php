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
<tr> <th>User ID</th> <th>User name</th>  <th>Episode ID</th> <th>Episode name</th>  </tr> 
<br>

<?php 

include "connect.php"; // Makes mysql connection

$sql_statement = "SELECT U.user_id,U.user_name, E.episode_id,E.episode_title
      FROM watch_episode W, users U, episodes E
      WHERE W.user_id=U.user_id AND W.episode_id=E.episode_id ";
$result = mysqli_query($db, $sql_statement); // Executing query

while($row = mysqli_fetch_assoc($result))
{ // Iterating the result
    $uid = $row['user_id']; 
    $uname = $row['user_name']; 
    $eid = $row['episode_id']; 
    $ename = $row['episode_title']; 
    
    echo "<tr>" . "<th>".$uid."</th>" . "<th>".$uname."</th>" .
                  "<th>".$eid."</th>" . "<th>".$ename.". </th>" .  "</tr>"  ;
}

?>

</table>

</body>
</html>





