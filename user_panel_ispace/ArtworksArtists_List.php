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
      color: #BFCBCD;
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
