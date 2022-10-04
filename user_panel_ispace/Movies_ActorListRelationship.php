
<!DOCTYPE html>
<html>

<head>
    <title>Movies-Actors List</title>

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
