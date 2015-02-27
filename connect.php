
<?php

$hostname = "127.0.0.1";
$username = "root";
$password = "";
$database = "testdb";
$db = mysqli_connect ($hostname, $username, $password, $database )or die("There is a problem in sector 7G");


$insert = "INSERT INTO users(id, username, password)
VALUES('2','joe', 'blue')";

$result = mysqli_query($db, $insert);

if($result) {
echo "Sucess";
}



?>
