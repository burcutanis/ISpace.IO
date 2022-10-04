<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>User Watch Episode </title>
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
<b> User Watch Episode </b>
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
    $sql_command = "SELECT episode_id, episode_title FROM episodes"  ;
    $myresult = mysqli_query($db, $sql_command);

    while($trows = mysqli_fetch_assoc($myresult))
    {
        $eid = $trows['episode_id'];
        $ename = $trows['episode_title'];
        echo "<option value=$eid>". $eid ." - " . $ename . "</option>" ;
    }
?>
</select>
<button>SELECT EPISODE</button>
</form>

<br>

<?php
if($_SERVER['REQUEST_METHOD'] == "GET")
{

    if(!empty($_GET["mids"]))
    {
        include "connect.php";
        $eid = $_GET["mids"];

        $sql_statement = "SELECT episode_id, episode_title FROM episodes WHERE episode_id='$eid'";

        $myresult = mysqli_query($db, $sql_command);

        if ($trows = mysqli_fetch_assoc($myresult))
        {
            echo "episode id:".$eid."<br><br>";
            $music_exists = true;
            $_SESSION["episode_idflag"] = true;
            $_SESSION["episode_id"] = $eid ;
            $_SESSION["episode_title"] =  $trows['episode_title'];

        }

    }

}
?>

</section>

<br> <br><br>

<section>

<form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">


<button>INSERT WATCHED EPISODES </button>
</form>

<br><br>

<?php
if($_SERVER['REQUEST_METHOD'] == "POST")
{

        $username = $_SESSION["username"];
        $userid = $_SESSION["userid"];
        //echo " " . $username . " " . $userid .  "<br>";


        $eid = $_SESSION["episode_id"] ;




        echo "<br> insert record into the watched episode table for <br>" ;
        echo " user id:".$userid." Episode id: ".$eid."<br>";


        include "connect.php";
        $sql_statement = "INSERT INTO watch_episode (user_id, episode_id)
                VALUES('$userid','$eid')";
        $result1 = mysqli_query($db, $sql_statement);
        //echo $sql_statement . " <br>" ;
        //echo $result1 . " <br>" ;

}

?>

</section>

</body>
</html>
