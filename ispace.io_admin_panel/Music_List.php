
<!DOCTYPE html>
<html>
<head>
    <title>Music List</title>
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

<body> 
<h2> List Music </h2>
<table>


<tr> <th> ID </th>  <th>NAME</th> <th>Album Name</th> <th>Release Date</th> 
     <th>Music link</th>  </tr> 

<?php 

include "connect.php"; // Makes mysql connection

$sql_statement = "SELECT * FROM music"; 

$result = mysqli_query($db, $sql_statement); // Executing query

while($row = mysqli_fetch_assoc($result)) { // Iterating the result
    $id = $row['music_id']; 
    $name = $row['music_title']; 
    $album = $row['album_name']; 
    $rdate  = $row['music_release_date'];
    $mlink  = $row['music_link']; 
 
    echo  "<tr>" ."<th>" . $id . "</th>" . "<th>" . $name . "</th>" . 
          "<th>".$album ."</th>" . "<th>". $rdate."</th>" . 
          "<th>". "<a href=".$mlink."> Music Link</a>". "</th>" . "</tr>" ;

} 

?>
</table>

</body>
</html>

