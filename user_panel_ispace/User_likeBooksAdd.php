<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>user like book </title>
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

<br>
<b> user like book </b>
<br>
<br>
<?php
// Initialize the session
session_start();
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
else {
//   $username = $_SESSION["username"];
//   $userid = $_SESSION["userid"];
//   echo " " . $username . " " . $userid . "<br>";

}
?>


<section>

<form method="GET" action="<?php echo $_SERVER['PHP_SELF'];?>">
<select name="mids">
<?php
    include "connect.php";
    $sql_command = "SELECT * FROM books"  ;
    $myresult = mysqli_query($db, $sql_command);

    while($trows = mysqli_fetch_assoc($myresult))
    {
        $mid = $trows['book_id'];
        $mname = $trows['book_name'];
        echo "<option value=$mid>". $mid ." - " . $mname . "</option>" ;
    }
?>
</select>
<button>SELECT BOOK</button>
</form>

<br>

<?php
if($_SERVER['REQUEST_METHOD'] == "GET")
{

    if(!empty($_GET["mids"]))
    {
        include "connect.php";
        $mid = $_GET["mids"];

        $sql_statement = "SELECT * FROM music WHERE book_id='$mid'";

        $myresult = mysqli_query($db, $sql_command);

        if ($trows = mysqli_fetch_assoc($myresult))
        {
            echo "book id:".$mid."<br><br>";
            $book_exists = true;
            $_SESSION["book_idflag"] = true;
            $_SESSION["book_id"] = $mid ;
            $_SESSION["book_name"] =  $trows['book_name'];

        }

    }

}
?>

</section>

<br> <br><br>

<section>

<form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
  <label for="comment">comment</label>
  <input type="text" id="comment" name="comment"><br>
  <br>

<button>INSERT like book record </button>
</form>

<br><br>

<?php
if($_SERVER['REQUEST_METHOD'] == "POST")
{
    if ( !empty($_POST['comment'] ) )
    {

        $username = $_SESSION["username"];
        $userid = $_SESSION["userid"];
        // echo " " . $username . " " . $userid .  "<br>";


        $mid = $_SESSION["book_id"] ;


        $comment = $_POST['comment'] ;

        echo "<br> insert record into the like music table for <br>" ;
        echo " user id:".$userid." book id: ".$mid."<br>";
        echo " comment:".$comment."<br><br>" ;

        include "connect.php";
        $sql_statement = "INSERT INTO readbooks (user_id, book_id, book_comment)
                VALUES('$userid','$mid', '$comment')";
        $result1 = mysqli_query($db, $sql_statement);
        //echo $sql_statement . " <br>" ;
        //echo $result1 . " <br>" ;
    }


}

?>

</section>

</body>
</html>
