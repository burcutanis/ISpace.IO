
<!DOCTYPE html>
<html>

<head>
    <title>Actor List</title>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  border: 1px solid black;
  width: 95%;
}

th,td {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}
th {
  text-align: center;
}
tr:hover {background-color: #D6EEEE;}
tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
</head>


<html>
<body> 

<table>
<tr> <th> ID </th> <th> ACTOR NAME </th> <th> ACTOR SURNAME</th> </tr> 
<br>
<?php 

include "connect.php"; // Makes mysql connection

$sql_statement = "SELECT * FROM actors"; 

$result = mysqli_query($db, $sql_statement); // Executing query

while($row = mysqli_fetch_assoc($result)) { // Iterating the result
    $id = $row['actor_id']; 
    $name = $row['actor_name']; 
    $surname = $row['actor_surname']; 
   
    
    echo "<tr>" ."<th>" . $id . "</th>" . "<th>" . $name . "</th>" . "<th>" . $surname .  "</th>" . "</tr>" ;
} 

?>
</table>

</body>
</html>

