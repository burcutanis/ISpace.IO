<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add Authors to Books </title>
</head>
<body>

<br>
<b> Add Authors to Books </b>
<br>
<br>

<?php
// Start the session
session_start();
$actorid_exists = false;
$tvsid_exists = false;
?>


<section> 

<form method="GET" action="<?php echo $_SERVER['PHP_SELF'];?>">
<select name="tvs_ids">
<?php
    include "connect.php";
    $sql_command = "SELECT book_id, book_name FROM books" ;
    $myresult = mysqli_query($db, $sql_command);
    
    while($trows = mysqli_fetch_assoc($myresult))
    {
        $tid = $trows['book_id'];
        $tname = $trows['book_name'];
        echo "<option value=$tid>". $tid ." - " . $tname . "</option>" ;   
    }
?>
</select>
<button>SELECT BOOK</button>
</form>

<br>

<?php
if($_SERVER['REQUEST_METHOD'] == "GET")
{

    if(!empty($_GET["tvs_ids"]))
    {
        include "connect.php";
        $tid = $_GET["tvs_ids"];
        
        $sql_statement = "SELECT * FROM books WHERE book_id='$tid'";
        $myresult = mysqli_query($db, $sql_command);
       
        if ($tvrows = mysqli_fetch_assoc($myresult))
        {     
            echo "Book ID:".$tid."<br><br>";           
            $tvsid_exists = true;
            $_SESSION["tvs_idflag"] = true;
            $_SESSION["tvs_id"] = $tvrows["book_id"] ;
            $_SESSION["tvs_name"] = $tvrows["book_name"] ;

        }  

    }

}
?>

</section>

<br> <br><br>

<section>

<form method="GET" action="<?php echo $_SERVER['PHP_SELF'];?>">
<select name="author_ids">
<?php
    include "connect.php";
    $sql_command = "SELECT * FROM author";
    $myresult = mysqli_query($db, $sql_command);

    while($id_rows = mysqli_fetch_assoc($myresult))
    {
        $id = $id_rows['author_id'];
        $name = $id_rows['author_name'];
        $surname = $id_rows['author_surname'];
        echo "<option value=$id>". $id . " - " .$name ." " . $surname. "</option>";
    }

?>
</select>

<button>SELECT AUTHOR </button>
</form>

<br>

<?php
if($_SERVER['REQUEST_METHOD'] == "GET")
{

    if(!empty($_GET['author_ids']))
    {
        include "connect.php";
        $id = $_GET['author_ids'];
        
        $sql_statement = "SELECT * FROM author WHERE author_id = $id";
        $result = mysqli_query($db, $sql_statement);
        echo "actor_id:". $id. "<br><br>" ;
        if ($arows = mysqli_fetch_assoc($result))
        {
            $id = $arows['author_id'];
            $name = $arows['author_name'];
            $surname = $arows['author_surname'];
              
            $actorid_exists = true;
            $_SESSION["author_idflag"] = true;
            $_SESSION["author_id"] = $id ;
            $_SESSION["author_name"] = $name ;
            $_SESSION["author_surname"] = $surname ;

        }
    }
}
?>


</section>

<br> <br><br>

<section>

<form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
    <button>SUBMIT (Insert Authors to Books) </button>
</form>

<br><br>

<?php
if($_SERVER['REQUEST_METHOD'] == "POST")
{
        $authorid = $_SESSION["author_id"];
        $tvsid = $_SESSION["tvs_id"] ;

        echo "<br> insert record into the tvseries_cast table for <br>" ;
        echo " Author ID:".$authorid ." Book ID: ".$tvsid."<br>";

        include "connect.php";
        $sql_statement = "INSERT INTO written_by (book_id, author_id) 
                VALUES('$tvsid', '$authorid')";       
        $result1 = mysqli_query($db, $sql_statement);
        echo "result of insert is:" . $result1 . "<br><br>" ;
}

?>

</section>

</body>
</html>

