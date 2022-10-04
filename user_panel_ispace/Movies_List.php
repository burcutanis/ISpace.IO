
<!DOCTYPE html>
<html>
<head>
    <title>Movies List</title>
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
<h2> List Movies </h2>
<table>

<tr> <th> ID </th>  <th>NAME</th> <th>Duration</th>  <th> IMDB Rating</th> <th>RT Rating</th> <th>Release Date</th>  <th>LANGUAGE</th> <th>DESCRIPTION</th> <th>VIDEO LINK</th> <th>IMAGE</th></tr>

<?php

include "connect.php"; // Makes mysql connection

$sql_statement = "SELECT * FROM movies";

$result = mysqli_query($db, $sql_statement); // Executing query

while($row = mysqli_fetch_assoc($result)) { // Iterating the result
    $id = $row['movie_id'];
    $name = $row['movie_title'];
    $duration = $row['movie_duration'];
    $imdb = $row['movie_IMDB_ranking'];
    $rt  = $row['movie_RT_rating'];
    $rdate  = $row['movie_releasedate'];
    $videolink  = $row['movie_video_links'];
    $language   = $row['movie_language'];
    $des  = $row['movie_description'];
    $image = $row['movie_image'];
    echo  "<tr>" ."<th>" . $id . "</th>" . "<th>" . $name . "</th>" .
          "<th>". $duration ."</th>" . "<th>". $imdb."</th>" . "<th>". $rt."</th>" .
          "<th>". $rdate."</th>" .
          "<th>". $language."</th>" . "<th>". $des."</th>" .
          "<th>". "<a href=".$videolink."> videoLink</a>". "</th>" .
          "<th>". "<a href=".$image."> imageLink</a>". "</th>" . "</tr>" ;

}

?>
</table>

</body>
</html>


<!----
    echo  "<tr>" ."<th>" . $id . "</th>" . "<th>" . $name . "</th>" .
          "<th>". $duration ."</th>" . "<th>". $IMDB."</th>" . "<th>". $RT."</th>" .
          "<th>". $rdate."</th>" .
          "<th>". "<a href=".$Video_link."> videoLink</a>". "</th>" .
          "<th>". $Language."</th>" . "<th>". $Description."</th>" .
          "<th>". "<a href=".$Image."> imageLink</a>". "</th>" . "</tr>" ;
--->
