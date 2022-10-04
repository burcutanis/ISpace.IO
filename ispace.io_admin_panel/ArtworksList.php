<!DOCTYPE html>
<html>


<head>
    <title>Messages</title>

<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 95%;
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
<tr> <th> ID </th>  <th>Title</th> <th>Size</th> <th>Location</th> <th>Period</th> <th>Medium</th> <th>Date</th></tr>
<br>
<?php

include "connect.php"; // Makes mysql connection

$sql_statement = "SELECT * FROM artworks";

$result = mysqli_query($db, $sql_statement); // Executing query

while($row = mysqli_fetch_assoc($result)) { // Iterating the result
    $id = $row['artwork_id'];
    $title  = $row['artwork_title'];
    $size = $row['artwork_size'];
    $location = $row['artwork_location'];
    $period = $row['artwork_period'];
    $medium = $row['artwork_medium'];
    $date  = $row['artwork_date'];
    echo  "<tr>" ."<th>" . $id . "</th>" . "<th>" . $title . "</th>" .
          "<th>". $size ."</th>" . "<th>". $location ."</th>" . "<th>". $period."</th>" . "<th>". $medium."</th>" .
          "<th>". $date."</th>" . "</tr>" ;
}

?>
</table>

</body>
</html>
