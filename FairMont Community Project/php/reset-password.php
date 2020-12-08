<?php

# ----- Dec 8th - The page is not currently coming up. 
if (isset($_POST['reset-password-submit'])) {
	$selector = $_POST['selector'];
	$validator = $_POST['validator'];
	$password = $_POST['pwd'];
	$passwordRepeat = $_POST['pwd-repeat'];
	
	if (empty($password) || empty($passwordRepeat)) {
		header("Location: ../create-new-passoword.html?newpwd=empty");
		exit();
	}
	else if ($password != $passwordRepeat) {
		header("Location: ../create-new-passoword.html?newpwd=pwdnotsame");
		exit();
	}
	
	$currentDate = date("U");
	
	require = 'dbh.php';
	
	$sql = "SELECT * FROM pwdReset WHERE pwdResetSelector=? AND pwdResetExpires>=?";
	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
		echo "There was an error";
		exit();
	}
	else {
		mysqli_stmt_bind_param($stmt, "s", $selector);
		mysqli_stmt_execute($stmt);
		$result = mysqli_stmt_get_result($stmt);
		if (!$row = mysqli_fetch_assoc($result)) {
			echo "There was an error!";
			exit();
		}
		else {
			$tokenBin = hex2bin($validator);
			$tokenCheck = password_verify($tokenBin, $row["pwdResetToken"]);
		}
		if ($tokenCheck === false) {
			echo "You need to re-submit your request.";
			exit();
		}
		else if ($tokenCheck === true) { 
			$tokenEmail = $row['pwdResetEmail'];
			$sql = "SELECT * FROm users WHERE Email=?;";
			$stmt = mysqli_stmt_init($conn);
			if (!mysqli_stmt_prepare($stmt, $sql)) {
				echo "There was an error";
				exit();
			}
			else {
				mysqli_stmt_bind_param($stmt, "s", $tokenEmail);
				mysqli_stmt_execute($stmt);
				if (!$row = mysqli_fetch_assoc($result)) {
					echo "There was an error!";
					exit();
				}
				else {
					$sql = "UPDATE users SET pwdUsers=?";
					if (!$row = mysqli_fetch_assoc($result)) {
						echo "There was an error!";
						exit();
					}
					else {
						$newPwdHash = password_hash($password, PASSWORD_DEFAULT);
						mysqli_stmt_bind_param($stmt, "ss", $tokenEmail, $newPwdHash);
						mysqli_stmt_execute($stmt);
						$sql = "DELETE FROM pwdReset WHERE pwdResetEmail=?";
						$stmt = mysqli_stmt_init($conn);
						if (!mysqli_stmt_prepare($stmt, $sql)) {
							echo "There was an error";
							exit();
						}
						else {
							mysqli_stmt_bind_param($stmt, "s", $tokenEmail);
							mysqli_stmt_execute($stmt);
							header("Location: ../Main.html?mewpwd=passwordupdated");
						}
					}
				}	
			}
		}	
	}
}
else {
	header("Location: ../main.php?error=passwordreset2");
	exit();
}
