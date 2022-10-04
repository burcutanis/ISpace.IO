
<!DOCTYPE html>
<html>

<head>
    <title>Actor List</title>
<style>
body {
  font-family: 'Fira Sans', sans-serif;
  font-weight: 400;
  font-size: 14px;
  color: #BFCBCD;
  text-decoration: none;
}
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  border: 1px solid black;
  width: 95%;
}

th,td {
  border: 1px solid #7B59FF;
  text-align: left;
  padding: 8px;
}
th {
  text-align: center;
}
tr:hover {background-color: #2E4D5B;}
tr:nth-child(even) {
  background-color: #7B59FF;
}
</style>
</head>


<html>
<body>

<table>
<tr> <th> ID </th> <th> ACTOR NAME </th> <th> ACTOR SURNAME</th> </tr>
<br>
<?php

include "connect.php"; // Makes mysql connection

$sql_statement = "SELECT * FROM actors";

$result = mysqli_query($db, $sql_statement); // Executing query

while($row = mysqli_fetch_assoc($result)) { // Iterating the result
    $id = $row['actor_id'];
    $name = $row['actor_name'];
    $surname = $row['actor_surname'];


    echo "<tr>" ."<th>" . $id . "</th>" . "<th>" . $name . "</th>" . "<th>" . $surname .  "</th>" . "</tr>" ;
}

?>
</table>

</body>
</html>
