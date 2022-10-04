
<!DOCTYPE html>
<html>

<head>
    <title>Movies-Directors List</title>

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

<h2> Movies-Directors List </h2>


<table>
<tr>  <th>Movie ID</th> <th>Movie Name</th> <th>Directors ID</th>
      <th>Directors Name</th> <th>Directors Surname</th> </tr>


<?php
    include "connect.php";

    $sqlcmd = "SELECT M.movie_id, M.movie_title, D.director_id,D.director_name,D.director_surname
      FROM movies_directed_by R, directors D, movies M
      WHERE R.director_id=D.director_id AND R.movie_id=M.movie_id ";

    $xresult = mysqli_query($db, $sqlcmd);

    while($row = mysqli_fetch_assoc($xresult))
    {
        $id = $row['movie_id'];
        $name = $row['movie_title'];
        $dirid = $row['director_id'];
        $dirname = $row['director_name'];
        $dirsurname = $row['director_surname'];

        echo "<tr>" . "<th>".$id."</th>" ."<th>".$name."</th>" .
         "<th>".$dirid."</th>"  .  "<th>".$dirname."</th>" . "<th>".$dirsurname."</th>"  ."</tr>"  ;
    }
?>
</table>


</body>
</html>
