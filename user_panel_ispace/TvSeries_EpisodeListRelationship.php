
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
<tr>  <th>Tv Series ID</th> <th>Tv Series Name</th>
      <th>Season Number</th> <th>Episode Number</th>
      <th>Episode Title</th> <th>Episode Duration</th> <th>Episode ID</th>
</tr>

<br>

<?php
    include "connect.php";

    $sql_statement = "SELECT T.tvSeries_id, T.tvSeries_name, E.season_number,E.episode_number,
                      E.episode_title,E.episode_duration,E.episode_id
                      FROM episodes E, tv_series T  WHERE  E.tvSeries_id=T.tvSeries_id ";
    $result = mysqli_query($db, $sql_statement); // Executing query

    while($row = mysqli_fetch_assoc($result))
    {
        $tvsid = $row['tvSeries_id'];
        $tvsname = $row['tvSeries_name'];
        $snnumber = $row['season_number'];
        $epnumber = $row['episode_number'];
        $epid = $row['episode_id'];
        $eptitle = $row['episode_title'];
        $epdur = $row['episode_duration'];

        echo "<tr>" . "<th>".$tvsid."</th>" ."<th>".$tvsname."</th>" .
                      "<th>".$snnumber."</th>"  .  "<th>".$epnumber."</th>" .
                      "<th>".$eptitle."</th>" . "<th>".$epdur."</th>" . "<th>".$epid."</th>" . "</tr>"  ;
    }
?>
</table>


</body>
</html>
