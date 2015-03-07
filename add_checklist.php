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

			<h1>Add a Checklist</h1>

			<form action = "exp_create.php" method = "post">

    		<table width="500" border="0">
              <tr>
                <td>Title:</td>
                <td><input id = "title" type="text" name="title" ></td>
              </tr>
              <tr>
                <td>List Item:</td>
                <td><input id = "listItem1" type="text" name="listItem1" ></td>
              </tr>
              <tr>
                <td>List Item:</td>
                <td><input id = "listItem2" type="text" name="listItem2" ></td>
              </tr>
              <tr>
                <td>List Item:</td>
                <td><input id = "listItem3" type="text" name="listItem3" ></td>
              </tr>
              <tr>
                <td>List Item:</td>
                <td><input id = "listItem4" type="text" name="listItem4" ></td>
              </tr>
              <tr>
                <td>List Item:</td>
                <td><input id = "listItem5" type="text" name="listItem5" ></td>
              </tr>
              <tr>
                <td>List Item:</td>
                <td><input id = "listItem6" type="text" name="listItem6" ></td>
              </tr>
      		</table>
                <input type="submit" value="Submit">
        </form>


		<footer></footer>
	</div>
	
	</body>
</html>
