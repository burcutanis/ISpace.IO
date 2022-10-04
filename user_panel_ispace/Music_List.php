<!DOCTYPE html>
<html>


<head>
    <title>Messages</title>

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

<body>
<table>
<br>
<tr> <th> ID </th>  <th>Title</th> <th>Album Name</th> <th>Release Date</th> <th>Image</th> <th>Preview</th> <th>Link</th></tr>
<br>
<?php

include "connect.php"; // Makes mysql connection

$sql_statement = "SELECT * FROM music";

$result = mysqli_query($db, $sql_statement); // Executing query

while($row = mysqli_fetch_assoc($result)) { // Iterating the result
    $id = $row['music_id'];
    $title  = $row['music_title'];
    $albumname = $row['album_name'];
    $releasedate = $row['music_release_date'];
    $image = $row['music_cover_image'];
    $preview = $row['music_preview'];
    $link  = $row['music_link'];
    echo  "<tr>" ."<th>" . $id . "</th>" . "<th>" . $title . "</th>" .
          "<th>". $albumname ."</th>" . "<th>". $releasedate ."</th>" . "<th>". $image."</th>" . "<th>". $preview."</th>" .
          "<th>". $link."</th>" . "</tr>" ;
}

?>
</table>

</body>
</html>
