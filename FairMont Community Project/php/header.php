<style>
* {box-sizing: border-box;}

body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

.topnav {
  overflow: hidden;
  background-color: #e9e9e9;
}

.topnav a {
  float: left;
  display: block;
  color: black;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color: #ddd;
  color: black;
}

.topnav a.active {
  background-color: #2196F3;
  color: white;
}

.topnav input[type=text] {
  padding: 6px;
  margin-top: 8px;
  font-size: 17px;
  border: none;
  width:280px;
}

.topnav .login-container button {
  padding: 6px 10px;
  margin-top: 8px;
  margin-right: 16px;
  background-color: #555;
  color: white;
  font-size: 17px;
  border: none;
  cursor: pointer;
}

.topnav .login-container button:hover {
  background-color: green;
}

@media screen and (max-width: 600px) {
  .topnav .login-container {
    float: none;
  }
  .topnav a, .topnav input[type=text], .topnav .login-container button {
    float: none;
    display: block;
    text-align: left;
    width: 100%;
    margin: 0;
    padding: 14px;
  }
  .topnav input[type=text] {
    border: 1px solid #ccc;  
  }
}
</style>
<div class="topnav">
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
			<div class="container">
				<label for="username"><b>Username or Email</b></label>
				<input type="text" placeholder="Enter Username or Email" name="username" required>
				<label for="psw"><b>Password</b></label>
				<input type="text" placeholder="Enter Password" name="psw" required>
				<button name="login-submit" type="submit">Login</button>
				<label><input type="checkbox" checked="checked" name="remember">Remember me</label>
			</div>
			<div class="container" style="background-color:#f1f1f1">
				<span class="psw">Forgot password?<a href="#"></a></span>
			</div>
		</form>';
	}
?>
</div>
	<a href="Main.html"><h1>Fairmount<br>Community</h1></a> 
</div>
<!--<img src=".jpg" alt="" width="600" height="600">-->

<?php
	if (isset($_SESSION['UID'])) {
		echo '<h1> Hello'." ".$_SESSION['fName']." ".$_SESSION['lName'].'</br>'."AccessLevel: ".$_SESSION['UserType'].'</br></h1>';
	}
?>
<nav><ul>
	<li><a href="Main.html">Home</a></li>
    <li><a href="Services.html">Services</a></li>
    <li><a href="Donations.html">Donations</a></li>
	<li><a href="History.html">History</a></li>
	<li><a href="SocialWorker.html">Social&nbsp;Worker</a></li>
	<li><a href="Events.html">Events</a></li>
	<li><a href="MonthlyMeetings.html">Monthly&nbsp;Meetings</a></li>
	<li><a href="School.html">School</a></li>
</ul></nav>
