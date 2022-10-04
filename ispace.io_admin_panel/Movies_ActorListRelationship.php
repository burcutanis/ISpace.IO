
<!DOCTYPE html>
<html>

<head>
    <title>Movies-Actors List</title>

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

<h2> Movies-Actors List </h2>


<table>
<tr>  <th>Movie ID</th> <th>Movie Name</th> <th>Actors ID</th> 
      <th>Actors Name</th> <th>Actors Surname</th> </tr> 

<?php 
    include "connect.php"; 

    $sql_statement = "SELECT M.movie_id, M.movie_title, A.actor_id,A.actor_name,A.actor_surname
      FROM movies_cast R, actors A, movies M
      WHERE R.actor_id=A.actor_id AND R.movie_id=M.movie_id ";
    $result = mysqli_query($db, $sql_statement); // Executing query 

    while($row = mysqli_fetch_assoc($result))
    {
        $id = $row['movie_id'];
        $name = $row['movie_title'];
        $actid = $row['actor_id']; 
        $actname = $row['actor_name']; 
        $actsurname = $row['actor_surname']; 
        
        echo "<tr>" . "<th>".$id."</th>" ."<th>".$name."</th>" .
         "<th>".$actid."</th>"  .  "<th>".$actname."</th>" . "<th>".$actsurname."</th>"  ."</tr>"  ;
    }
?>
</table>


</body>
</html>


