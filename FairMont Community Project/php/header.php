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

<div class="login-container">
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
			<button onclick="window.location.href="http://localhost:8080/FairMont%20Community%20Project/Registration.html"" /><a href="Registration.html">Register</a></button>';
	}
	if (isset($_GET['newpwd'])) {
		if ($_GET['newpwd'] == "passwordupdated") {
			echo '<p class = "signupsuccess">Your password has been reset!</p>';
		}
	}
?>	
</div>
<div class="topnav">
	<h1>Fairmount<br>Community</h1>

<!--<img src=".jpg" alt="" width="600" height="600">-->

	<?php
		if (isset($_SESSION['UID'])) {
			echo '<h1> Hello'." ".$_SESSION['fName']." ".$_SESSION['lName'].'</h1>';
		}
	?>
	<nav><ul>
		<li><a href="Main.html">Home</a></li>
		<li><a href="Services.html">Services</a></li>
		<li><a href="https://www.paypal.com/paypalme/FairmontCommunity/">Donations</a></li>
		<li><a href="History.html">History</a></li>
		<li><a href="SocialWorker.html">Social&nbsp;Worker</a></li>
		<li><a href="http://localhost:8080/FairMont%20Community%20Project/php-mysql-calendar/3a-calendar.php">Events</a></li>
		<li><a href="MonthlyMeetings.html">Monthly&nbsp;Meetings</a></li>
		<li><a href="School.html">School</a></li>
	</ul></nav>
</div>
