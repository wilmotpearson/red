<?php
require_once ('Sanitizer.class.php' );
require_once ('MySqlConn.class.php' );
session_start();
$_county = $_SESSION['county'];
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
			$myConn2 = new MySqlConn ( $dbHostname, $dbUsername, $dbPassword);

            $result2 = $myConn2->connect_to_database();
            if ( !$result2 )
            	die ( 'Error connecting to the database' );

            $result2 = $myConn2->select_database ( $dbDatabaseName );
            if ( !$result2 )
            	die ( 'Error selecting to the database' );

            $queryString2 = "SELECT title FROM checklist;" //get the list of titles from the checklist database

			$myConn2->set_query_string ( $queryString2 );
            $result2 = $myConn2->execute_query();
            if ( !$result2 )
            	die ( 'The query failed for some reason' );

            $myRow2 = $myConn2->get_first_result ( RETURN_ASSOC_ARRAY );
            $num_rows2 = $myConn2->get_number_of_returned_rows();

//display the form for choosing which checklist they want to edit
echo		"<form action = \"display_edit_checklist.php\" method = \"post\">";
echo        	"<table width=\"500\">";
echo            "<tr>";
echo            	"<td><h1>Choose a Checklist to Edit</h1></td>";
echo                "<td><select name = \"checklist\" >";
echo                	"<option value=\"-choose-\"> -choose- </option>       ";
							//displays the list of checklist titles in drop-down list of options
                        	for ( $i=1 ; $i<=$num_rows2 ; $i++ ){
                            	echo "<option value=" $i ">" . $myRow2['title'] . "</option>";
                                $myRow2 = $myConn2->get_next_result ( RETURN_ASSOC_ARRAY );
                            }
echo                "</td>";
echo            "</tr>";
echo            "</table>";
echo            "<p></p>";
echo            "<input type=\"submit\" value=\"Submit\" class = \"button\">";
echo		"</form>";

?>
		<footer></footer>
	</div>
	
	</body>
</html>
