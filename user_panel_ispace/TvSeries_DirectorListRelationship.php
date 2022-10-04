
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
<tr>  <th>Tv Series ID</th> <th>Tv Series Name</th> <th>Directors ID</th>
      <th>Directors Name</th> <th>Directors Surname</th> </tr>
<br>

<?php
    include "connect.php";

    $sql_statement = "SELECT T.tvSeries_id,T.tvSeries_name, D.director_id,D.director_name,D.director_surname
            FROM tv_series_directed_by R, directors D, tv_series T
            WHERE R.director_id=D.director_id AND R.tvSeries_id=T.tvSeries_id ";

    $xresult = mysqli_query($db, $sql_statement);

    while($row = mysqli_fetch_assoc($xresult))
    {
        $tvsid = $row['tvSeries_id'];
        $tvsname = $row['tvSeries_name'];
        $dirid = $row['director_id'];
        $dirname = $row['director_name'];
        $dirsurname = $row['director_surname'];

        echo "<tr>" . "<th>".$tvsid."</th>" ."<th>".$tvsname."</th>" .
         "<th>".$dirid."</th>"  .  "<th>".$dirname."</th>" . "<th>".$dirsurname."</th>"  ."</tr>"  ;
    }
?>
</table>


</body>
</html>
