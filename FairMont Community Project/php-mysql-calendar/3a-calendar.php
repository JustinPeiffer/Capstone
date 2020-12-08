<?php
//require '../php/header.php';
// MONTHS
$months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];

// DEFAULT MONTH/YEAR = TODAY
$unix = strtotime("today");
$monthNow = date("M", $unix);
$yearNow = date("Y", $unix); ?>
<!DOCTYPE html>
<html>
  <head>
    <title>Simple PHP Calendar</title>
    <script src="public/3b-calendar.js"></script>
    <link href="public/3c-theme.css" rel="stylesheet">
  </head>
  <body>
  <?php
  session_start();
	if (isset($_SESSION['UID'])) {
		echo '<form action="http://localhost:8080/FairMont%20Community%20Project/php/logout.php" method="post">
			<div class="container">
				<button name="logout-submit" type="submit">Logout</button>
			</div>
			</form>';
	}
	else {
			echo '<form action="http://localhost:8080/FairMont%20Community%20Project/php/login.php" method="post">
				<label for="username" value="username"><b>Username or Email</b></label>
				<input type="text" placeholder="Enter Username or Email" name="username" required>
				<label for="psw"><b>Password</b></label>
				<input type="text" placeholder="Enter Password" name="psw" required>
				<button name="login-submit" type="submit">Login</button>
				<a href="http://localhost:8080/FairMont%20Community%20Project/reset-password.html">Forgot password?</a>
				<label><input type="checkbox" checked="checked" name="remember">Remember me</label>
			</form>
			<button onclick="window.location.href="http://localhost:8080/FairMont%20Community%20Project/Registration.html"" /><a href="Registration.html">Register</a></button>
			
			';
	}
	?>
	<style>
	button{
		padding: 6px 10px;
		margin-top: 8px;
		margin-right: 16px;
		background-color: #555;
		color: white;
		font-size: 17px;
		border: none;
		cursor: pointer;
		width: 75px;
	}
	a:visited 
	{
        color: puple;
    }	
</style>
<h1>
Fairmount
<br>
Community
</h1>
<!--<img src=".jpg" alt="" width="600" height="600">-->
<script>
document.write(); // Name goes here
</script>
<nav><ul>
	<li><a href="../Main.html">Home</a></li>
    <li><a href="../Services.html">Services</a></li>
    <li><a href="../Donations.html">Donations</a></li>
	<li><a href="../History.html">History</a></li>
	<li><a href="../SocialWorker.html">Social&nbsp;Worker</a></li>
	<li><a href="3a-calendar.php">Events</a></li>
	<li><a href="../MonthlyMeetings.html">Monthly&nbsp;Meetings</a></li>
	<li><a href="../School.html">School</a></li>
</ul></nav>
    <!-- [DATE SELECTOR] -->
    <div id="selector">
      <select id="month"><?php
        foreach ($months as $m) {
          printf("<option %svalue='%s'>%s</option>", 
            $m==$monthNow ? "selected='selected' " : "", $m, $m
          );
        }
      ?></select>
      <select id="year"><?php
        // 10 years range - change if not enough for you
        for ($y=$yearNow-10; $y<=$yearNow+10; $y++) {
          printf("<option %svalue='%s'>%s</option>",
            $y==$yearNow ? "selected='selected' " : "", $y, $y
          );
        }
      ?></select>
      <input type="button" value="SET" onclick="cal.list()"/>
    </div>

    <!-- [CALENDAR] -->
    <div id="container"></div>

    <!-- [EVENT] -->
    <div id="event"></div>
  </body>
</html>