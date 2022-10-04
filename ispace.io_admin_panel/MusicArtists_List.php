
<!DOCTYPE html>
<html>

<head>
    <title>Artist List</title>

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

<h2> Artist List </h2>


<table>
<tr>  <th>Artist ID</th> <th>Artist Name</th> <th>Artist Surname</th> </tr> 

<?php 
    include "connect.php"; 

    $sql_statement = "SELECT * FROM artist_list_music ";
    $result = mysqli_query($db, $sql_statement); // Executing query 

    while($row = mysqli_fetch_assoc($result))
    {

        $id = $row['artist_id_music']; 
        $name = $row['artist_name_music']; 
        $surname = $row['artist_surname_music']; 
        
        echo "<tr>" . "<th>".$id."</th>" ."<th>".$name."</th>" . "<th>".$surname."</th>"  ."</tr>"  ;
    }
?>
</table>


</body>
</html>