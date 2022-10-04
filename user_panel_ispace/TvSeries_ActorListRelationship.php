
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
<tr>  <th>Tv Series ID</th> <th>Tv Series Name</th> <th>Actors ID</th>
      <th>Actors Name</th> <th>Actors Surname</th> </tr>
<br>

<?php
    include "connect.php";
    // $sql_statement = "SELECT * FROM tvseries_cast ";
    $sql_statement = "SELECT T.tvSeries_id, T.tvSeries_name, A.actor_id,A.actor_name,A.actor_surname
      FROM tvseries_cast R, actors A, tv_series T
      WHERE R.actor_id=A.actor_id AND R.tvSeries_id=T.tvSeries_id ";
    $result = mysqli_query($db, $sql_statement); // Executing query

    while($row = mysqli_fetch_assoc($result))
    {
        $tvsid = $row['tvSeries_id'];
        $tvsname = $row['tvSeries_name'];
        $actid = $row['actor_id'];
        $actname = $row['actor_name'];
        $actsurname = $row['actor_surname'];

        echo "<tr>" . "<th>".$tvsid."</th>" ."<th>".$tvsname."</th>" .
         "<th>".$actid."</th>"  .  "<th>".$actname."</th>" . "<th>".$actsurname."</th>"  ."</tr>"  ;
    }
?>
</table>


</body>
</html>
