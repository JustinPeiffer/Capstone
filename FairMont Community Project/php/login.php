<?php
	if (isset($_POST['login-submit'])) {
		require 'dbh.php';
		
		$username = $_POST['username'];
		$password = $_POST['psw'];
		
		$sql = "SELECT * FROM users WHERE Username=? OR Email=?";
		$stmt = mysqli_stmt_init($conn);
		if (!mysqli_stmt_prepare($stmt, $sql)) {
			header("Location: ../login.html?error=sqlerror");
			eixt();
		}
		else {
			mysqli_stmt_bind_param($stmt, "ss", $username, $username);
			mysqli_stmt_execute($stmt);
			$result = mysqli_stmt_get_result($stmt);
			if ($row = mysqli_fetch_assoc($result)) {
				$pswCheck = password_verify($password, $row['Password']);
				if ($pswCheck == false) {
					header("Location: ../login.html?error=wrongpsw");
					exit();
				} 
				else if($pswCheck == true) {
					session_start();
					$_SESSION['UID'] = $row['UserID'];
					$_SESSION['fName'] = $row['FirstName'];
					$_SESSION['lName'] = $row['LastName'];
					header("Location: ../services.html?login=success");
					eixt();
				} 
				else {
					header("Location: ../login.html?error=wrongpsw");
					exit();
				}
			}
			else {
				header("Location: ../login.html?error=nouser");
				exit();
			}
		}
	}
	else {
		header("Location: ../services.html");
		exit();
	}
