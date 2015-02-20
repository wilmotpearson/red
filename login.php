

<?php

require_once ( 'MySqlConn.class.php');

require_once ('php_session.php');

require_once ('Sanitizer.class.php');



/**

* To include this code in the website, use this line of code for the form

* that includes the input boxes for email/username and password

*  <form action = "student_login.php" method = "post">

*/



if( isset( $_POST['email'] ) )

        $_email =  urldecode( $_POST['email'] );

$_email = Sanitizer::sanitize_one($_email, 'string_dbsafe');

//echo $_email;



if(isset($_POST['password']))

        $_password =  urldecode( $_POST['password'] );

$_password = Sanitizer::sanitize_one($_password, 'string_dbsafe');

//echo "<br> " . $_password;



include 'db_config.php';





                $myConn = new MySqlConn ( $dbHostname, $dbUsername, $dbPassword);



                $result = $myConn->connect_to_database();

                if ( !$result )

                        die ( 'Error connecting to the database' );



                $result = $myConn->select_database ( $dbDatabaseName );

                if ( !$result )

                        die ( 'Error selecting to the database' );





                $queryString = "SELECT sid FROM student" .                                                " WHERE email =  \"" . $_email . "\"  AND pass =   \"" . $_password . "\"  ;";

                //echo "<br>" . $queryString;





                //get all results from db

                $myConn->set_query_string ( $queryString );

                $result = $myConn->execute_query();

                $myRow = $myConn->get_first_result ( RETURN_ASSOC_ARRAY );

                $num_rows = $myConn->get_number_of_returned_rows();



                if ($num_rows == 0){

 //insert code for webpage here (if needed) as echo statements

                    echo "<h2>INVALID USERNAME OR PASSWORD!</h2>";



 		}Else{



                    if ( !$result )

                        die ( '<br/> The query failed for some reason' );

                        $myRow = $myConn->get_first_result ( RETURN_ASSOC_ARRAY );                        $_user_id = $myRow['sid'];

                        echo "<br> user id: " . $_user_id;

                        //echo $_userId;



                        //php sessin with users id

                        start_session($_user_id);

                        //print_r( "<br>session : " .  $_SESSION[$_userId] );



                        //go to users account page                        header("Location: student_home.php?user_id=" . $_user_id);

                }



?>
