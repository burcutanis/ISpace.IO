
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
<tr> <th> ID </th>  <th>NAME</th> <th>Seasons</th> <th>Episodes</th> <th> IMDB Rating</th> <th>RT Rating</th> <th>Start Date</th> <th>END DATE</th> <th>VIDEO LINK</th> <th>LANGUAGE</th> <th>DESCRIPTION</th> <th>IMAGE</th></tr>
<br>
<?php

include "connect.php"; // Makes mysql connection

$sql_statement = "SELECT * FROM tv_series";

$result = mysqli_query($db, $sql_statement); // Executing query

while($row = mysqli_fetch_assoc($result)) { // Iterating the result
    $id = $row['tvSeries_id'];
    $name = $row['tvSeries_name'];
    $seasons = $row['tvSeries_total_season'];
    $episodes = $row['tvSeries_total_episode'];
    $IMDB = $row['tvSeries_IMDB_rating'];
    $RT  = $row['tvSeries_RT_rating'];
    $Start_date  = $row['tvSeries_start_date'];
    $End_date  = $row['tvSeries_end_date'];
    $Video_link  = $row['tvSeries_video_link'];
    $Language   = $row['tvSeries_language'];
    $Description  = $row['tvSeries_description'];
    $Image = $row['tvSeries_image'];
    echo  "<tr>" ."<th>" . $id . "</th>" . "<th>" . $name . "</th>" .
          "<th>". $seasons ."</th>" . "<th>". $episodes ."</th>" . "<th>". $IMDB."</th>" . "<th>". $RT."</th>" .
          "<th>". $Start_date."</th>" . "<th>". $End_date."</th>" .
          "<th>". "<a href=".$Video_link."> videoLink</a>". "</th>" .
          "<th>". $Language."</th>" . "<th>". $Description."</th>" .
          "<th>". "<a href=".$Image."> imageLink</a>". "</th>" . "</tr>" ;
}

?>
</table>

</body>
</html>
