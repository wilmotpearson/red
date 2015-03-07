<?php
require_once ('Sanitizer.class.php' );
require_once ('MySqlConn.class.php' );
session_start();
$_county = $_SESSION['county'];

//
//Checks to see if the title and list items are passed with the session
//
if(isset($_POST['title']))
        $_title =  urldecode( $_POST['title'] );
$_title = Sanitizer::sanitize_one($_title, 'string_dbsafe');
//echo "<br> Title: " . $_title;

if(isset($_POST['listItem1']))
        $_listItem1 =  urldecode( $_POST['listItem1'] );
$_listItem1 = Sanitizer::sanitize_one($_listItem1, 'string_dbsafe');
//echo "<br> List Item: " . $_listItem1;

if(isset($_POST['listItem2']))
        $_listItem2 =  urldecode( $_POST['listItem2'] );
$_listItem2 = Sanitizer::sanitize_one($_listItem2, 'string_dbsafe');
//echo "<br> List Item: " . $_listItem2;

if(isset($_POST['listItem3']))
        $_listItem3 =  urldecode( $_POST['listItem3'] );
$_listItem3 = Sanitizer::sanitize_one($_listItem3, 'string_dbsafe');
//echo "<br> List Item: " . $_listItem3;

if(isset($_POST['listItem4']))
        $_listItem4 =  urldecode( $_POST['listItem4'] );
$_listItem4 = Sanitizer::sanitize_one($_listItem4, 'string_dbsafe');
//echo "<br> List Item: " . $_listItem4;

if(isset($_POST['listItem5']))
        $_listItem5 =  urldecode( $_POST['listItem5'] );
$_listItem5 = Sanitizer::sanitize_one($_listItem5, 'string_dbsafe');
//echo "<br> List Item: " . $_listItem5;

if(isset($_POST['listItem6']))
        $_listItem6 =  urldecode( $_POST['listItem6'] );
$_listItem6 = Sanitizer::sanitize_one($_listItem6, 'string_dbsafe');
//echo "<br> List Item: " . $_listItem6;



//Insert either an include with the database connection info or 
//the actual database connection info here

$myConn2 = new MySqlConn ( $dbHostname, $dbUsername, $dbPassword);

$result2 = $myConn2->connect_to_database();
if ( !$result2 )
    die ( 'Error connecting to the database' );

$result2 = $myConn2->select_database ( $dbDatabaseName );

if ( !$result2 )
    die ( 'Error selecting to the database' );

//checks to see if there is already a checklist created with the same title
$queryString2 = "SELECT __ FROM __ WHERE title =  \"" . $_title . "\"  ;";

                $myConn2->set_query_string ( $queryString2 );
                $result2 = $myConn2->execute_query();

                if ( !$result2 )
                        die ( '<br/> The query failed for some reason' );

                $myRow2 = $myConn2->get_first_result ( RETURN_ASSOC_ARRAY );
                $num_rows2 = $myConn2->get_number_of_returned_rows();

//prints out the error statement if results are found via the select statement
if ($num_rows2 > 0){
	echo "<p>That checklist title has already been used</p>";

}else{

                $myConn = new MySqlConn ( $dbHostname, $dbUsername, $dbPassword);

                $result = $myConn->connect_to_database();
                if ( !$result )
                        die ( 'Error connecting to the database' );

                $result = $myConn->select_database ( $dbDatabaseName );
                if ( !$result )
                        die ( 'Error selecting to the database' );

                        $queryString = "INSERT INTO __ (`__`) VALUES" .
                         "( " . $_user_id . " , \"" . $_title . "\" , " . $_listItem1 . " , \"" . $_listItem2 .  "\" , \"" . $_listItem3 . "\" , \"" . $_listItem4 . "\" , \"" . $_listItem5 . "\" , " . $_listItem6 .  ");";

                echo "<br> " . $queryString;

                //insert the data into the database
                $myConn->set_query_string ( $queryString );
                $result = $myConn->execute_query();

				echo "Success!";

				//redirect to the add checklist page and keep the user's session
                header("Location: add_checklist.php?user_id=" . $_user_id);
?>
