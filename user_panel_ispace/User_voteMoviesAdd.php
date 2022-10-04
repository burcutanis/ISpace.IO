<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>user vote movies</title>
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
<b> user vote movies </b>
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
    $sql_command = "SELECT movie_id, movie_title FROM movies" ;
    $myresult = mysqli_query($db, $sql_command);

    while($trows = mysqli_fetch_assoc($myresult))
    {
        $mid = $trows['movie_id'];
        $mname = $trows['movie_title'];
        echo "<option value=$mid>". $mid ." - " . $mname . "</option>" ;
    }
?>
</select>
<button>SELECT MOVIE</button>
</form>

<br>

<?php
if($_SERVER['REQUEST_METHOD'] == "GET")
{

    if(!empty($_GET["mids"]))
    {
        include "connect.php";
        $mid = $_GET["mids"];

        $sql_statement = "SELECT * FROM movies WHERE movie_id='$mid'";
        $myresult = mysqli_query($db, $sql_command);

        if ($trows = mysqli_fetch_assoc($myresult))
        {
            echo "movie id:".$mid."<br><br>";
            $movid_exists = true;
            $_SESSION["mov_idflag"] = true;
            $_SESSION["mov_id"] = $mid ;


        }

    }

}
?>

</section>

<br> <br><br>

<section>

<form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
  <label for="rate">movies rate </label>
  <input type="text" id="rate" name="rate"><br><br>
  <label for="comment">comment</label>
  <input type="text" id="comment" name="comment"><br>
  <br>

<button>INSERT watch_movie record </button>
</form>

<br><br>

<?php
if($_SERVER['REQUEST_METHOD'] == "POST")
{
    if ( !empty($_POST["rate"]) )
    {

        $username = $_SESSION["username"];
        $userid = $_SESSION["userid"];
        // echo " " . $username . " " . $userid .  "<br>";


        $movid = $_SESSION["mov_id"] ;


        $rate = $_POST['rate'] ;
        $comment = $_POST['comment'] ;

        echo "<br> insert record into the watch_movie table for <br>" ;
        echo " user id:".$userid." Movies id: ".$movid."<br>";
        echo " rate:".$rate." comment:".$comment."<br><br>" ;

        include "connect.php";
        $sql_statement = "INSERT INTO watch_movie (user_id, movie_id, movie_comment, movie_rating)
                VALUES('$userid','$movid', '$comment','$rate')";
        $result1 = mysqli_query($db, $sql_statement);



    }


}

?>

</section>

</body>
</html>
