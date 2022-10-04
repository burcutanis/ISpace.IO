
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
<tr>  <th> Artwork ID</th> <th>Artwork Title</th> <th>Artist ID</th>
      <th>Artist Name</th> <th>Artist Surname</th> </tr>
<br>

<?php
    include "connect.php";
    // $sql_statement = "SELECT * FROM tvseries_cast ";
    $sql_statement = "SELECT A.artwork_id, A.artwork_title, R.artist_id_artwork ,R.artist_name_artwork, R.artist_surname_artwork
      FROM artworkhasartists H, artworks A, artist_list_artwork R
      WHERE H.artist_id_artwork = R.artist_id_artwork AND H.artwork_id = A.artwork_id ";
    $result = mysqli_query($db, $sql_statement); // Executing query

    while($row = mysqli_fetch_assoc($result))
    {
        $artworkid = $row['artwork_id'];
        $artworktitle = $row['artwork_title'];
        $artistid = $row['artist_id_artwork'];
        $artistname = $row['artist_name_artwork'];
        $artistsurname = $row['artist_surname_artwork'];

        echo "<tr>" . "<th>".$artworkid."</th>" ."<th>".$artworktitle."</th>" .
         "<th>".$artistid."</th>"  .  "<th>".$artistname."</th>" . "<th>".$artistsurname."</th>"  ."</tr>"  ;
    }
?>
</table>


</body>
</html>
