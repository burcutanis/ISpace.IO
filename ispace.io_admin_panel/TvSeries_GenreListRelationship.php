
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
<tr>  <th>Tv Series ID</th> <th>Tv Series Name</th> <th>Genre Name</th>  </tr> 
<br>

<?php 
    include "connect.php"; 
    
    $sql_statement = "SELECT T.tvSeries_id, T.tvSeries_name, R.genre_name
      FROM tvseries_genre R, tv_series T
      WHERE R.tvSeries_id=T.tvSeries_id ";
    $result = mysqli_query($db, $sql_statement); // Executing query 

    while($row = mysqli_fetch_assoc($result))
    {
        $tvsid = $row['tvSeries_id'];
        $tvsname = $row['tvSeries_name'];
        $genrename = $row['genre_name']; 

        
        echo "<tr>" . "<th>".$tvsid."</th>" ."<th>".$tvsname."</th>" .
             "<th>".$genrename."</th>"  ."</tr>"  ;
    }
?>
</table>


</body>
</html>


