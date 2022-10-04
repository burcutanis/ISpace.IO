
<!DOCTYPE html>
<html>
<body> 

<head>
    <title>listAllUsers</title>
    
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  border: 1px solid black;
  width: 95%;
}


th,td {
  border: 2px solid black;
  border-collapse: collapse;
  text-align: left;
  padding: 8px;
}
th {
  text-align: center;
}

tr:hover {background-color: #D6EEEE;}

tr:nth-child(even) {
  background-color: #D6EEEE;
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
<tr> <th> ID </th> <th> USER </th> <th>EMAIL ADDRESS</th> <th>PASSWORD</th> </tr> 
<br>
<?php 

include "connect.php"; // Makes mysql connection

$sql_statement = "SELECT * FROM users"; 

$result = mysqli_query($db, $sql_statement); // Executing query

while($row = mysqli_fetch_assoc($result)) { // Iterating the result
    $id = $row['user_id']; 
    $name = $row['user_name']; 
    $email = $row['user_email']; 
    $pass= $row['login_password'];
    
    echo "<tr>" ."<th>" . $id . "</th>" . "<th>" . $name . "</th>" . 
         "<th>". $email ."</th>" . "<th>". $pass .  "</th>" . "</tr>" ;
} 

?>
</table>

</body>
</html>

