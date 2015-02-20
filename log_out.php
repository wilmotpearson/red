

<?php

require_once ( 'MySqlConn.class.php');

include('php_session.php');

require_once ('Sanitizer.class.php');



//check for session

session_start();



if (!is_logged_in( $_GET['user_id'] ) )

        die('You are not logged in');



$_user_id = $_SESSION['userId'];







if(isset($_GET['user_id']))

        $_user_id =  urldecode( $_GET['user_id'] );



//end the session from clicking the Log Out button

end_session();



//check if still logged in

if (is_logged_in( $_GET['user_id'] ) )

        die('You are still logged in!');



header("Location: index.html");



?>

