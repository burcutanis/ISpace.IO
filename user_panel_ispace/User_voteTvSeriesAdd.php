
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>user vote tv series</title>
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
<b> user vote tv series  </b>
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
//   echo "  " . $username . " " . $userid . "<br>";

}
?>



<section>

<form method="GET" action="<?php echo $_SERVER['PHP_SELF'];?>">
<select name="tvs_ids">
<?php


    include "connect.php";

    $sql_command = "SELECT tvSeries_id, tvSeries_name FROM tv_series" ;
    $myresult = mysqli_query($db, $sql_command);

    while($trows = mysqli_fetch_assoc($myresult))
    {
        $tid = $trows['tvSeries_id'];
        $tname = $trows['tvSeries_name'];
        echo "<option value=$tid>". $tid ." - " . $tname . "</option>" ;
    }
?>
</select>
<button>SELECT TVSERIES</button>
</form>

<br>

<?php
if($_SERVER['REQUEST_METHOD'] == "GET")
{

    if(!empty($_GET["tvs_ids"]))
    {
        include "connect.php";
        $tid = $_GET["tvs_ids"];

        $sql_statement = "SELECT * FROM tv_series WHERE tvSeries_id='$tid'";
        $myresult = mysqli_query($db, $sql_command);

        if ($tvrows = mysqli_fetch_assoc($myresult))
        {
            echo "tvseries id:".$tid."<br><br>";
            $tvsid_exists = true;
            $_SESSION["tvs_idflag"] = true;
            $_SESSION["tvs_id"] = $tid ;

        }

    }

}
?>

</section>

<br> <br><br>

<section>

<form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
  <label for="rate">tv series rate </label>
  <input type="text" id="rate" name="rate"><br><br>
  <label for="comment">comment</label>
  <input type="text" id="comment" name="comment"><br>
  <br>

<button>INSERT watch_tv_series record </button>
</form>

<br><br>

<?php
if($_SERVER['REQUEST_METHOD'] == "POST")
{
    if ( !empty($_POST["rate"]) )
    {

        $username = $_SESSION["username"];
        $userid = $_SESSION["userid"];
        // echo "  " . $username . " " . $userid .  "<br>";


        $tvsid = $_SESSION["tvs_id"] ;
        $rate = $_POST['rate'] ;
        $comment = $_POST['comment'] ;

        echo "<br> insert record into the watch_tv_series table for <br>" ;
        echo " user id:".$userid ." tvseries id: ".$tvsid."<br>";
        echo " rate:".$rate." comment:".$comment."<br><br>" ;

        include "connect.php";
        $sql_statement = "INSERT INTO watch_tv_series (user_id, tvSeries_id, tvSeries_comment, rate)
                VALUES('$userid','$tvsid', '$comment','$rate')";
        $result1 = mysqli_query($db, $sql_statement);



    }


}

?>

</section>

</body>
</html>
