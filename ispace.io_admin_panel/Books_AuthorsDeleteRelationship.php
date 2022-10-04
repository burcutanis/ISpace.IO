
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Delete Author from Book</title>
</head>

<body>

<h2> Delete Author from Book</h2>


<?php
// Start the session
session_start();
$autid_exists = false;
$bookid_exists = false;
?>
   
<div align="left">

<h3> Select Book-Author record to delete </b>
<br>


<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
<select name="ids">

<?php
    include "connect.php";

    $sqlcmd = "SELECT B.book_id, B.book_name, A.author_id,A.author_name,A.author_surname
      FROM written_by R, author A, books B
      WHERE R.author_id=A.author_id AND R.book_id=B.book_id ";

    $myresult = mysqli_query($db, $sqlcmd);

    while($row = mysqli_fetch_assoc($myresult))
    {
        $id = $row['book_id'];
        $name = $row['book_name'];
        $autid = $row['author_id']; 
        $autname = $row['author_name']; 
        $autsurname = $row['author_surname']; 
         
        $str1 = "$id,$autid" ; 
        $len1 = strlen($str1);
        echo "<option value=$str1>".$id ."-".$name. "-----".$autid."-".$autname." ". $autsurname."</option>";

    }

?>


</select>
<button>DELETE</button>

</form>

</div>
</body>
</html>

<?php
if($_SERVER['REQUEST_METHOD'] == "POST")
{

if(!empty($_POST['ids']))
{
    include "connect.php";
    $idx = $_POST['ids'];
    
    $dizi = explode(",",$idx);
    $id = $dizi[0];
    $autid = $dizi[1];


    echo "the following movie-director relation entity will be deleted:<br>";
    echo "------".$id." ".$autid."<br>" ;
    $sqlcmd = "DELETE FROM written_by WHERE book_id = '$id' AND author_id='$autid' ";

    echo "<h4> execute following sql statement: </h4> " ;
    echo "<h4>----". $sqlcmd . "</h4>";
    
    $result = mysqli_query($db, $sqlcmd);
    
    echo  "<h4> result of sql statement is:".$result."</h4> " ;
}

}

?>

