<!DOCTYPE html>
<html>

<head>
    <title>Actor List</title>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  border: 1px solid black;
  width: 95%;
}

th,td {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}
th {
  text-align: center;
}
tr:hover {background-color: #D6EEEE;}
tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
</head>


<html>
<body>

<table>
<tr> <th> ID </th> <th> ARTIST NAME </th> <th> ARTIST SURNAME</th> </tr>
<br>
<?php

include "connect.php"; // Makes mysql connection

$sql_statement = "SELECT * FROM artist_list_artwork";

$result = mysqli_query($db, $sql_statement); // Executing query

while($row = mysqli_fetch_assoc($result)) { // Iterating the result
    $id = $row['artist_id_artwork'];
    $name = $row['artist_name_artwork'];
    $surname = $row['artist_surname_artwork'];


    echo "<tr>" ."<th>" . $id . "</th>" . "<th>" . $name . "</th>" . "<th>" . $surname .  "</th>" . "</tr>" ;
}

?>
</table>

</body>
</html>
