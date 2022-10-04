<html>
<body> 

<head>
    <title>Director List</title>

<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  border: 1px solid black;
  width: 90%;
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

<head>
    <title>Messages</title>

<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
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

<table>
    <br>
<tr> <th> ID </th> <th> DIRECTOR NAME </th> <th> DIRECTOR SURNAME</th> </tr> 
<br>
<?php 

include "connect.php"; // Makes mysql connection

$sql_statement = "SELECT * FROM directors"; 

$result = mysqli_query($db, $sql_statement); // Executing query

while($row = mysqli_fetch_assoc($result)) { // Iterating the result
    $id = $row['director_id']; 
    $name = $row['director_name']; 
    $surname = $row['director_surname']; 
   
    
    echo "<tr>" ."<th>" . $id . "</th>" . "<th>" . $name . "</th>" . "<th>" . $surname .  "</th>" . "</tr>" ;
} 

?>
</table>

</body>
</html>

