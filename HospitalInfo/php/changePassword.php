<?php
	session_start();
	include 'conn.php';

	if(empty($_SESSION['username']) || empty($_SESSION['password']))
		print("Access to database denied");
	else {
		$username = $_SESSION['username'];
		$password = $_SESSION['password'];
		$type = $_SESSION['type'];

		if($type == "Doctors") {
			$table = "Doctors";
			include '../includes/dheader.html';
		}
		if($type == "Pharmacy") {
			$table = "Pharmacy";
			include '../includes/fheader.html';
		}
		if($type == "Patients") {
			$table = "Patients";
			include '../includes/pheader.html';
		}
		

		if(isset($_POST["changePasswordButton"])) {
			$oldpassword = md5($_POST['oldpassword']);
			$newpassword = md5($_POST['newpassword']); // Calculate MD5 hash before bind_param

			if($oldpassword != $password)
				print("<p style=color:purple>Old password does not match</p>");
			else {
				$sql = $mysqli -> prepare("UPDATE $table SET password=? WHERE username=?");
				$sql -> bind_param('ss', $newpassword, $username); // Pass $newpassword variable
				$sql -> execute();

				if($sql -> errno)
					print("<p>Query failed</p>");
				else {
					print("<p>Password successfully changed</p>");
					$_SESSION['password'] = $newpassword;
				}
			}
		}
		else {
			include '../includes/changePasswordForm.html';
			include '../includes/footer.html';
		}
	}
	$mysqli -> close();
?>
