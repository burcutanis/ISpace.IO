<!DOCTYPE html>
<html>

<head>
    <title>Messages</title>

<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 90%;
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
<tr>  <th> Music ID</th> <th>Music Title</th> <th>Artist ID</th>
      <th>Artist Name</th> <th>Artist Surname</th> </tr>
<br>

<?php
    include "connect.php";
    // $sql_statement = "SELECT * FROM tvseries_cast ";
    $sql_statement = "SELECT M.music_id, M.music_title, R.artist_id_music ,R.artist_name_music, R.artist_surname_music
      FROM musicincludesartists I, music M, artist_list_music R
      WHERE I.artist_id_music = R.artist_id_music AND I.music_id = M.music_id ";
    $result = mysqli_query($db, $sql_statement); // Executing query

    while($row = mysqli_fetch_assoc($result))
    {
        $musicid = $row['music_id'];
        $musictitle = $row['music_title'];
        $artistid = $row['artist_id_music'];
        $artistname = $row['artist_name_music'];
        $artistsurname = $row['artist_surname_music'];
        echo "<tr>" . "<th>".$musicid."</th>" ."<th>".$musictitle."</th>" .
         "<th>".$artistid."</th>"  .  "<th>".$artistname."</th>" . "<th>".$artistsurname."</th>"  ."</tr>"  ;
    }
?>
</table>


</body>
</html>
