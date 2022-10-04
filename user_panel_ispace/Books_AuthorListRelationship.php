
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
<tr>  <th>Book ID</th> <th>Book Name</th> <th>Author ID</th>
      <th>Author Name</th> <th>Author Surname</th> </tr>


<?php
    include "connect.php";

    $sqlcmd = "SELECT B.book_id, B.book_name, A.author_id,A.author_name,A.author_surname
      FROM written_by R, author A, books B
      WHERE R.author_id=A.author_id AND R.book_id=B.book_id ";

    $xresult = mysqli_query($db, $sqlcmd);

    while($row = mysqli_fetch_assoc($xresult))
    {
        $id = $row['book_id'];
        $name = $row['book_name'];
        $autid = $row['author_id'];
        $autname = $row['author_name'];
        $autsurname = $row['author_surname'];

        echo "<tr>" . "<th>".$id."</th>" ."<th>".$name."</th>" .
         "<th>".$autid."</th>"  .  "<th>".$autname."</th>" . "<th>".$autsurname."</th>"  ."</tr>"  ;
    }
?>
</table>


</body>
</html>
