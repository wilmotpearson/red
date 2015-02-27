

<html>
<head>
<?php
include('connect.php');

$username = @$_POST['username'];
$password = @$_POST['password'];
$repeatpassword = @$_POST['repeatpassword'];
$submit = @$_POST['submit'];


?>

<title>Web portal</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel = "stylesheet" type = "text/css" href = "ready.css"/>
    </head>
    <body>
        <div class = "wrapper">

<form method="post">
<label for="username"> Username:</label>
<input name="username" type="text"><br>
<label for="password"> Password:</label>
<input name="password" type="password"><br>
<label for="password"> Repeat Password:</label>
<input name="repeatpassword" type="password"><br>
<input name="submit" type="submit"><br>
</form>

</div>
</body>
</html>
