<?php

$db = mysqli_connect('localhost','root','','ispace2');

if($db->connect_errno > 0){
    die('Unable to connect to database [' . $db->connect_error . ']');
}
else {
 //   echo " connected to database" ;
}
?>