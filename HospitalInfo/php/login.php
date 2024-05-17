<?php
	session_start();
	include 'conn.php';

/*
	if($mysqli->connect_errno)
		echo 'not connected to database: '.$mysqli->connect_error;
	else
		echo 'connected';
 */
		$PID="";
		$pSIN="";
	if(empty($_POST['username']) || empty($_POST['password']))
		header('Location: ../index.html');
	else {
    		if(isset($_POST['login'])) {

			$username = $_POST['username'];
			$password = $_POST['password'];
			$password = md5($password);

			$_SESSION['username'] = $username;
			$_SESSION['password'] = $password;

			$sql = $mysqli -> prepare("SELECT * FROM Doctors WHERE username=? AND password=?");
			$sql -> bind_param('ss', $username, $password);
			$sql -> execute();
			$result = $sql -> get_result();

			if($result -> num_rows == 1) {
				$_SESSION['type'] = "Doctors";
				include '../includes/dheader.html';
				print("<p style=color:#D3212D>Welcome Dr.$username</p>");
				include '../includes/footer.html';
			}
	else {
	   $sql = $mysqli -> prepare("Select * From Patients where username=? AND password=?");
			$sql -> bind_param('ss', $username, $password);
			//$pSIN = md5($pSIN);
			$sql -> execute();
			$result = $sql -> get_result();
			if($result -> num_rows == 1) {
				$_SESSION['type'] = "Patients";
				include '../includes/pheader.html';
				print("<p style=color:#D3212D>Welcome $username</p>");
				include '../includes/footer.html';
			}
	else {
	   $sql = $mysqli -> prepare("select * from Pharmacy where username=? AND password=?");
			$sql -> bind_param('ss',$username,$password);
			//$PID = md5($PID);
			$sql -> execute();
			$result = $sql -> get_result();
			if($result -> num_rows == 1) {
			$_SESSION['type'] = "Pharmacy";
			include '../includes/fheader.html';
			print("<p style=color:#D3212D>Welcome $username Pharmacy</p>");
			include '../includes/footer.html';
			}
	 
		
	else{
	   header('Location: ../index.html');
	  }
	}
    }
  }
}
$mysqli -> close();

?>





