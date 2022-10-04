
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>ADD USER PAGE</title>
  
</head>

<body>
<div align="left">

<h3> Add User  </h3>
<br>


<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
  <label for="name">Username:</label>
  <input type="text" id="name" name="name"><br><br>
  <label for="email">Email:</label>
  <input type="text" id="email" name="email"><br><br>
  <label for="password">Password:</label>
  <input type="password" id="password" name="password"><br><br>
  <br>


<button> SUBMIT </button>
</form>
</div>
</body>
</html>

<?php
if($_SERVER['REQUEST_METHOD'] == "POST")
{
if (!empty($_POST['name'] )) {
 include "connect.php" ;
 $name = $_POST['name'] ;
 $email = $_POST['email'] ;
 $password = $_POST['password'] ;
 
 $sql_statement = "INSERT INTO users(user_name,user_email,login_password) 
					VALUES ('$name','$email', '$password')";
				

 $result = mysqli_query($db, $sql_statement);
 echo "user added, user name: " . $name . "  email:" . $email . "<br><br>"; 

}

else {
	echo " the form is not set" . "<br>"; 
}
}

?>