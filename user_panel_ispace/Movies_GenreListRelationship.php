
<!DOCTYPE html>
<html>

<head>
    <title>Movies-Genre List</title>
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
<h2>  Movies-Genre List </h2>

<table>
<tr>  <th>Movie ID</th> <th>Movie Title</th> <th>Genre Name</th>  </tr>


<?php
    include "connect.php";

    $sqlcmd = "SELECT M.movie_id, M.movie_title, R.genre_name
        FROM movie_genre R, movies M
        WHERE R.movie_id=M.movie_id ";
    $result = mysqli_query($db, $sqlcmd); // Executing query

    while($row = mysqli_fetch_assoc($result))
    {
        $id = $row['movie_id'];
        $name = $row['movie_title'];
        $genrename = $row['genre_name'];


        echo "<tr>" . "<th>".$id."</th>" ."<th>".$name."</th>" .
             "<th>".$genrename."</th>"  ."</tr>"  ;
    }
?>
</table>


</body>
</html>
