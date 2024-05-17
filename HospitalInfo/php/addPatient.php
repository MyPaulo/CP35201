<?php
	session_start();
	include 'conn.php';

	if(empty($_SESSION['username']) || empty($_SESSION['password']))
		print("Access to database denied");
	else {
		$username = $_SESSION['username'];
		$password = $_SESSION['password'];
		$type = $_SESSION['type'];

		if($type != "Doctors") {
			include '../includes/pheader.html';
		//	include '../includes/fheader.html';
			print("<p>Insufficient privileges to add Patients to Database</p>");      
		}
		else {
			include '../includes/dheader.html';

			if(isset($_POST["addPatientButton"]) ) {
				$pSIN = $_POST['pSIN'];
				$Name = $_POST['Name'];
				$Address = $_POST['Address'];
				$Age = $_POST['Age'];
				
				
				$dSIN= $password;
				
				$Pri_Phy= $username;
				 
				$sql = $mysqli -> prepare("INSERT INTO Patients(pSIN, Name, Address, Age) VALUES (?, ?, ?,?)");
				//$pSIN = md5($pSIN);
				$sql -> bind_param('ssss', $pSIN, $Name, $Address, $Age);
				$sql -> execute();
				$sql = $mysqli -> prepare("INSERT INTO Have(pSIN, dSIN, Pri_Phy) VALUES (?, ?, ?)");
				$sql -> bind_param('sss', $pSIN, $dSIN, $Pri_Phy);
				$sql -> execute();

				if($sql -> errno)
					print("<p style=color:red>Insert query failed</p>");
				else
					print("<p style=color:red>The patient $Name added to Database</p>");
			}
			else {
				include '../includes/addPatient.html';
				include '../includes/footer.html';
			}
		}
	}
	$mysqli -> close();
?>
