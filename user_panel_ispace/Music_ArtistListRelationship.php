
<!DOCTYPE html>
<html>

<head>
    <title>Music-Artist List</title>

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

<h2> Music-Artist List </h2>


<table>
<tr>  <th>Music ID</th> <th>Music Name</th> <th>Artist ID</th>
      <th>Artist Name</th> <th>Artist Surname</th> </tr>

<?php
    include "connect.php";

    $sql_statement = "SELECT M.music_id, M.music_title, A.artist_id_music,
      A.artist_name_music,A.artist_surname_music
      FROM musicincludesartists R, artist_list_music A, music M
      WHERE R.artist_id_music=A.artist_id_music AND R.music_id=M.music_id ";
    $result = mysqli_query($db, $sql_statement); // Executing query

    while($row = mysqli_fetch_assoc($result))
    {
        $id = $row['music_id'];
        $name = $row['music_title'];
        $actid = $row['artist_id_music'];
        $actname = $row['artist_name_music'];
        $actsurname = $row['artist_surname_music'];

        echo "<tr>" . "<th>".$id."</th>" ."<th>".$name."</th>" .
         "<th>".$actid."</th>"  .  "<th>".$actname."</th>" . "<th>".$actsurname."</th>"  ."</tr>"  ;
    }
?>
</table>


</body>
</html>
