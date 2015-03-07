<?php

require_once ('MySqlConn.class.php');
require_once ('php_session.php');
require_once ('Sanitizer.class.php');

        //check for session
          session_start();
          if (!is_logged_in( $_POST['user_id'] )){
                  die('You are not logged in');
                  }

          $_user_id = $_SESSION['userId'];

          if(isset($_POST['user_id']))
                  $_user_id =  urldecode( $_POST['user_id'] );
          $_user_id = Sanitizer::sanitize_one($_user_id, 'string_dbsafe');

if(isset($_POST['checklist']))
        $_checklist =  urldecode( $_POST['checklist'] );
$_checklist = Sanitizer::sanitize_one($_checklist, 'string_dbsafe');
echo "<br> " . $_checklist;

//Insert either an include with the database connection info or 
//the actual database connection info here

if(!$_eid <> '-choose-'){

 $myConn = new MySqlConn ( $dbHostname, $dbUsername, $dbPassword);

                $result = $myConn->connect_to_database();
                if ( !$result )
                        die ( 'Error connecting to the database' );

                $result = $myConn->select_database ( $dbDatabaseName );
                if ( !$result )
                        die ( 'Error selecting to the database' );


                $queryString = "SELECT * FROM checklist WHERE  title = " . $_checklist . " ;";

				$myConn->set_query_string ( $queryString );
                $result = $myConn->execute_query();

                if ( !$result ){
                        die ( '<br/> The query failed for some reason' );
                }

                $myRow = $myConn->get_first_result ( RETURN_ASSOC_ARRAY );
                $num_rows = $myConn->get_number_of_returned_rows();


?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title> Ready Wisconsin</title>
		<link rel = "stylesheet" type = "text/css"
			href = "style.css">
	</head>
	<body>
	<div id= "wrapper">
		<header></header>
			<nav>
			   <ul>
				<li><a href="#" >Checklist</a></li>
				<ul>
					<li><a>Add Checklist</a></li>
					<li><a>Edit Checklist</a></li>
				</ul>
				<li><a href="#">Push Notification</a></li>
				
				<li><a href="#">Seasonal Changes</a></li>
				<ul>
					<li><a>Spring</a></li>
					<li><a>Summer</a></li>
					<li><a>Fall</a></li>
					<li><a>Winter</a></li>
				</ul>
				<li><a href="#">View Damage Reports</a></li>

			  </ul>
			</nav>
<?php
echo			"<form action = \"save_edit_checklist.php\" method = \"post\">"
//This table displays textboxes with the current value of the list items and title automatically displayed within them
echo    		"<table width=\"500\" border=\"0\">"
echo			  "<tr>"
echo               " <td>Title:</td>"
echo               " <td><input id = \"title\" type=\"text\" name=\"title\" ></td>"
echo              "</tr>"
echo              "<tr>"
echo                "<td>List Item:</td>"
echo                "<td><input id = \"listItem1\" type=\"text\" name=\"listItem1\" value=\"" . myRow['item1'] . "\" ></td>"
echo             " </tr>"
echo              "<tr>"
echo                "<td>List Item:</td>"
echo               " <td><input id = \"listItem2\" type=\"text\" name=\"listItem2\" value=\"" . myRow['item2'] . "\" ></td>"
echo              "</tr>"
echo              "<tr>"
echo               " <td>List Item:</td>"
echo               " <td><input id = \"listItem3\" type=\"text\" name=\"listItem3\" value=\"" . myRow['item3'] . "\" ></td>"
echo              "</tr>"
echo              "<tr>"
echo               " <td>List Item:</td>"
echo               " <td><input id = \"listItem4\" type=\"text\" name=\"listItem4\" value=\"" . myRow['item4'] . "\" ></td>"
echo              "</tr>"
echo              "<tr>"
echo                "<td>List Item:</td>"
echo                "<td><input id = \"listItem5\" type=\"text\" name=\"listItem5\" value=\"" . myRow['item5'] . "\" ></td>"
echo              "</tr>"
echo              "<tr>"
echo                "<td>List Item:</td>"
echo               " <td><input id = \"listItem6\" type=\"text\" name=\"listItem6\" value=\"" . myRow['item6'] . "\" ></td>"
echo              "</tr>"
echo      		"</table>"
echo               " <input type=\"submit\" value=\"Submit\">"
echo        "</form>"
?>
		<footer></footer>
	</div>
	
	</body>
</html>
