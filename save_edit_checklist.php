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
$_title = Sanitizer::sanitize_one($_listItem1, 'string_dbsafe');
//echo "<br> List Item: " . $_listItem1;

if(isset($_POST['listItem2']))
        $_listItem2 =  urldecode( $_POST['listItem2'] );
$_title = Sanitizer::sanitize_one($_listItem2, 'string_dbsafe');
//echo "<br> List Item: " . $_listItem2;

if(isset($_POST['listItem3']))
        $_listItem3 =  urldecode( $_POST['listItem3'] );
$_title = Sanitizer::sanitize_one($_listItem3, 'string_dbsafe');
//echo "<br> List Item: " . $_listItem3;

if(isset($_POST['listItem4']))
        $_listItem4 =  urldecode( $_POST['listItem4'] );
$_title = Sanitizer::sanitize_one($_listItem4, 'string_dbsafe');
//echo "<br> List Item: " . $_listItem4;

if(isset($_POST['listItem5']))
        $_listItem5 =  urldecode( $_POST['listItem5'] );
$_title = Sanitizer::sanitize_one($_listItem5, 'string_dbsafe');
//echo "<br> List Item: " . $_listItem5;

if(isset($_POST['listItem6']))
        $_listItem6 =  urldecode( $_POST['listItem6'] );
$_title = Sanitizer::sanitize_one($_listItem6, 'string_dbsafe');
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

        $queryString = "        UPDATE  checklist SET  title =  '" . $_title . "'," .
        	"item1 =  '" . $_listItem1 . "'," .
            "item2 =  '" . $_listItem2 . "'," .
            "item3 =  '" . $_listItem3 . "'," .
            "item4 =  '" . $_listItem4 . "'," .
            "item5 =  '" . $_listItem5 . "', " .
            "item5 =  '" . $_listItem6 . "' WHERE  checklist.title = " . $_title . ";";


		$myConn->set_query_string ( $queryString );
        $result = $myConn->execute_query();

        echo "<h2>Experiment Updated Successfully!</h2>";

        //return back to edit_checklist.php and keep user's session
        header("Location: edit_checklist.php?user_id=" . $_user_id);

?>
