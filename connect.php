
<?php
//Password and username entered by user.
$usernameForm = $_POST['username'];
$passwordForm= $_POST['password'];



$hostname = "127.0.0.1";

$username = "root";

$password = "";

$database = "testdb";


$db = mysqli_connect ($hostname, $username, $password, $database )or die("There is a problem in sector 7G");





$select = "SELECT u.username, u.password FROM users u WHERE 
 u.username = '$usernameForm' AND u.password = '$passwordForm';";



$result = mysqli_query($db, $select);
echo $select;
if($result) {

$rows = mysqli_num_rows($result);

if($rows == 1) {


//Redirect from login to county page.
header("Location: sucess.html");


} else {
echo "Login failed";
  }

}else {
header("Location: register.php");
}








?>




