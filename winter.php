<?php
require_once ('Sanitizer.class.php' );
require_once ('MySqlConn.class.php' );
session_start();
$_county = $_SESSION['county'];
?>

<!doctype html>


<html>
<head>
<meta charset="utf-8">
<title>Ready Wisconsin</title>
<link href="style.css" rel="stylesheet" type="text/css">

<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
<script type="text/javascript">
    $(function() {
      if ($.browser.msie && $.browser.version.substr(0,1)<7)
      {
        $('li').has('ul').mouseover(function(){
            $(this).children('ul').show();
            }).mouseout(function(){
            $(this).children('ul').hide();
            })
      }
    });        
</script>
</head>

<body>
<div id= "wrapper">
	<header>
	<img src="images/wemLogo.png" width="150" height="150" alt="wem"/>
	</header>
		<ul id="menu">
			<li><a href="second_page.html">Home</a></li>
			<li>
				<a href="#">Checklist</a>
		<ul>
            <li><a href="#">Add Checklist</a></li>
            <li><a href="#">Edit Checklist</a></li>
        </ul>
			</li>
			<li><a href="#">Push Notification</a></li>
			<li>
				<a href="#">Seasonal Changes</a>
        <ul>
            <li><a href="#">Spring</a></li>
            <li><a href="#">Summer</a></li>
            <li><a href="#">Fall</a></li>
            <li><a href="#">Winter</a></li>
		</ul>
			</li>
			<li><a href="#">Damage Report</a></li>
			<li><a href="#">Zombies</a></li>
		</ul>
		<div id="one">
  
		<h1>Winter Survival Kit</h1>
		<p>Everyone should carry a Winter Survival Kit in their car. In an emergency, it
		could save your life and the lives of your passengers. </br>Here is what you need:
		
		<ul>
			<li type=circle>a shovel
			<li type=circle>windshield scraper and a small broom
			<li type=circle>flashlight with extra batteries
			<li type=circle>battery powered radio
			<li type=circle>water
			<li type=circle>snack food including energy bars
			<li type=circle>raisins and mini candy bars
			<li type=circle>matches and small candles
			<li type=circle>extra hats, socks and mittens
			<li type=circle>First aid kit with pocket knife
			<li type=circle>Necessary medications
			<li type=circle>blankets or sleeping bags
			<li type=circle>tow chains or rope
			<li type=circle>road salt, sand, or cat litter for traction
			<li type=circle>booster cables
			<li type=circle>emergency flares and reflectors
			<li type=circle>fluorescent distress flag and whistle to attract attention
			<li type=circle>Cell phone adapter to plug into lighter
		</ul></br>
		<h1>Kit tips:</h1>
		<ul>
			<li type=circle>Reverse batteries in flashlight to avoid accidental switching and burnout.
			<li type=circle>Store items in the passenger compartment in case the trunk is jammed or frozen shut.
			<li type=circle>Choose small package of food that you can eat hot or cold.
		</ul></br>
		<h1>911 tips:</h1>
		<ul>
			<li type=circle>If possible, call 911 on your cell phone. Provide your location, condition of everyone in the vehicle and the problem you're experiencing.
			<li type=circle>Follow instructions: you may be told to say where your are until help arrives.
			<li type=circle>Do not hang up until you know who you have spoken with and what will happen next.
			<li type=circle>If you must leave the vehicle, write down your name, address, phone number and destination. Place the piece of paper inside the front windshield for someone to see.
		</ul></br>
		<h1>Survival tips:</h1>
		<ul>
			<li type=circle>Prepare your vehicle: Make sure you keep your gas tank at least half full.
			<li type=circle>Be easy to find: Tell someone where you are going and the route you will take.
			<li type=circle>If stuck: Tie a florescent flag (from your kit) on your a antenna or hang it out the window. At night, keep your dome light on. Rescue crews can see a small glow at a 
			distance. To reduce battery drain, use emergency flashers only if you hear approaching vehicle. If you're with someone else, make sure at least one person is awake and keeping watch
			for help at all times.
			<li type=circle>Stay in your vehicle: Walking in a storm can be very dangerous. You might become lost or exhausted. your vehicle is a good shelter.
			<li type=circle>Avoid Overexertion: Shovelling snow or pushing your car takes a lot of effort in storm conditions. Don't risk a heart attach or injury. The work can also make you hot and sweaty.
			Wet clothing loses insulation value, making you susceptible to hypothermia.
			<li type=circle>Fresh Air: It's better to be cold and awake than comfortable warm and sleepy. Snow can plug your vehicle's exhaust system and cause deadly carbon monoxide gas to enter your car.
			Only run the engine for 10 minutes an hour and make sure the exhaust pipe is free of snow. Keeping a window open a crack while running the engine is also a good idea.
			<li type=circle>Don't expect to be comfortable: Your want to survive until you're found.
		</ul>
		</div>
		</br>
		</br>
		<footer></footer>
	</div>
	
</body>
</html>
