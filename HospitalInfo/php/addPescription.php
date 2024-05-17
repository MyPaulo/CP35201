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
			include '../includes/fheader.html';
			print("<p>Insufficient privileges to add Pescription to Database</p>");      
		}
		else {
			include '../includes/dheader.html';

			if(isset($_POST["addPescriptionButton"])) {
				$pSIN = $_POST['pSIN'];
				$dSIN = $_POST['dSIN'];
				$Trade_Name = $_POST['Trade_Name'];
				$Date = $_POST['Date'];
				$Quantity = $_POST['Quantity'];

				$sql = $mysqli -> prepare("INSERT INTO Pescription(pSIN, dSIN, Trade_Name, Date, Quantity) VALUES (?, ?, ?,?,?)");
				$sql -> bind_param('sssss', $pSIN, $dSIN, $Trade_Name, $Date, $Quantity);
				$sql -> execute();

				if($sql -> errno)
					print("<p style=color:purple>Insert query failed</p>");
				else
					print("<p style=color:purple> Dr.$username Pescription added to the Database<br> Hope you recovery very soon Patient </p>");
			}
			else {
				include '../includes/addPescription.html';
				include '../includes/footer.html';
			}
		}
	}
	$mysqli -> close();
?>
