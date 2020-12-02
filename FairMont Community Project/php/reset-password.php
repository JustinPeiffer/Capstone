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