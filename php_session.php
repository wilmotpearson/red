
<?php



        require_once ( 'MySqlConn.class.php');





        function start_session($userId)

        {

                session_start();

                $_SESSION['userId'] = $userId;

        }



        function is_logged_in($userId)

        {

                if ( isset ( $_SESSION['userId'] ) && $_SESSION['userId'] == $userId )

                {

                        return true;

                }else{

                        return false;

                }

        }



        function end_session()

        {

                unset( $_SESSION['userId'] );

        }



        function get_userId_prof($_email){





                if( isset( $_POST['email'] ) )

                        $_email =  urldecode( $_POST['email'] );

                echo $_email;



                if(isset($_POST['password']))

                        $_password =  urldecode( $_POST['password'] );

                echo "<br> " . $_password;



                include 'db_config.php';



                $myConn = new MySqlConn ( $dbHostname, $dbUsername, $dbPassword);



                $result = $myConn->connect_to_database();

                if ( !$result )

                        die ( 'Error connecting to the database' );



                $result = $myConn->select_database ( $dbDatabaseName );

                if ( !$result )

                        die ( 'Error selecting to the database' );





                $queryString = "SELECT prof_id FROM prof " .

                                                " WHERE prof_email =  \"" . $_email . "\"  ;";





                //get all the isbsn for some genreId

                $myConn->set_query_string ( $queryString );

                $result = $myConn->execute_query();



                if ( !$result )

                        die ( '<br/> The query failed for some reason' );



                        $myRow = $myConn->get_first_result ( RETURN_ASSOC_ARRAY );

                        $_userId = $myRow['prof_id'];



                return $_userId;



        }



        function get_userId_student($_email){





                if( isset( $_POST['email'] ) )

                        $_email =  urldecode( $_POST['email'] );

                echo $_email;



                if(isset($_POST['password']))

                        $_password =  urldecode( $_POST['password'] );

                echo "<br> " . $_password;



                include 'db_config.php';



                $myConn = new MySqlConn ( $dbHostname, $dbUsername, $dbPassword);



                $result = $myConn->connect_to_database();

                if ( !$result )

                        die ( 'Error connecting to the database' );





                $result = $myConn->select_database ( $dbDatabaseName );

                if ( !$result )

                        die ( 'Error selecting to the database' );





                $queryString = "SELECT sid FROM student " .

                                                " WHERE email =  \"" . $_email . "\"  ;";



                //get all the isbsn for some genreId

                $myConn->set_query_string ( $queryString );

                $result = $myConn->execute_query();



                if ( !$result )

                        die ( '<br/> The query failed for some reason' );



                        $myRow = $myConn->get_first_result ( RETURN_ASSOC_ARRAY );

                        $_userId = $myRow['sid'];



                return $_userId;



        }



?>
