<<<<<<< HEAD
<?php
if (isset($_POST['reset-request-submit'])) {
	$selector = bin2hex(random_bytes(8));
	$token = random_bytes(32);
	
	$url = "http://localhost:8080/FairMont%20Community%20Project/php/create-new-password.php?selector=".$selector."&validator=".bin2hex($token);
	$expires = date("U") + 1800;
	
	require 'dbh.php';
	
	$userEmail = $_POST['email'];
	
	$sql = "DELETE FROM pwdReset WHERE pwdResetEmail=?";
	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt,$sql)) {
		echo "There was an error!";
		exit();
	}
	else {
		mysqli_stmt_bind_param($stmt, "s", $userEmail);
		mysqli_stmt_execute($stmt);
	}
	$sql = "INSERT INTO pwdReset (pwdResetEmail, pwdResetSelector, pwdResetToken, pwdResetExpires) VALUES (?, ?, ?, ?);";
	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt,$sql)) {
		echo "There was an error!";
		exit();
	}
	else {
		$hashToken = password_hash($token, PASSWORD_DEFAUlT);
		mysqli_stmt_bind_param($stmt, "ssss", $userEmail, $Selector, $hashToken, $expires);
		mysqli_stmt_execute($stmt);
	}
	mysqli_stmt_close($stmt);
	mysqli_close();
	
	
}	
else {
	header("Location: ../main.html");
	exit();
}
=======
	if (isset($_POST["signup-submit"])) {
		
		
		$username = $_POST['uid'];
		$email = $_POST['mail'];
		$password = $_POST['pwd'];
		$passwordRepeat = $_POST['pwd-repeat'];
		
		$sql = "SELECT UserID FROM users WHERE UserID=?";
		$stmt = mysqli_stmt_init($conn);
		
		/*if(!mysqli_stmt_prepare($stmt, $sql)) {
			header("Location: ../signup.php?error=sqlerror");
			exit();
		}
		else {
			mysqli_stmt_bind_param($stmt, "s", $username);
			mysqli_execute($stmt);
			mysqli_stmt_store_result($stmt);
			$resultCheck = mysqli_stmt_num_rows($stmt);
			if (%resultCheck > 0) {
				header("Location: ../signup.php?error=usertake&mail=".$email);
				exit();
			}
			else {
				$sql = "INSERT INTO users (UserID, Email, Password) VALUES(?, ?, ?)";
				$stmt = mysqli_stmt_init($conn);
				if(!mysqli_stmt_prepare($stmt, $sql)) {
					header("Location: ../signup.php?error=sqlerror");
					exit();
				}
				else {
					$hashedPwd = password_hash($password, PASSWORD_DEFAULT);
					mysqli_stmt_bind_param($stmt, "sss", $username, $email, $hashedPwd);
					mysqli_execute($stmt);
					header("Location: ../signup.php?signup=success");
					exit();
				}
			}
		}*/
		msqli_stmt_close($stmt);
		mysqli_close($conn);
		
	}
	else {
		header("Location: ../signup.php);
		exit();
	}
>>>>>>> 5ebc5c5d1bd059025862689e6cd915d2a3bc93ab
