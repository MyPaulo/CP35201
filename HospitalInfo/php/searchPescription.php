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
			include '../includes/dheader.html';
		}
		else if($type == "Patients") {
			include '../includes/pheader.html';
		}
		else {
			include '../includes/fheader.html';
		}

		if(isset($_POST["searchButton"])) {
			$keyword = $_POST['keyword'];
			$choice = $_POST['choice'];
 
			if($choice == "pSIN")
				$sql = $mysqli -> prepare("SELECT * FROM Pescription WHERE pSIN LIKE ?");
				
			if($choice == "dSIN")
				$sql = $mysqli -> prepare("SELECT * FROM Pescription WHERE dSIN LIKE ?");	
				
			if($choice == "Trade_Name")
				$sql = $mysqli -> prepare("SELECT * FROM Pescription WHERE Trade_Name LIKE ?");
				
			if($choice == "Date")
				$sql = $mysqli -> prepare("SELECT * FROM Pescription WHERE Date LIKE ?");
				
			if($choice == "Quantity")
				$sql = $mysqli -> prepare("SELECT * FROM Pescription WHERE Quantity LIKE ?");


			$keyword = '%'.$keyword.'%';
			$sql -> bind_param('s', $keyword);
			$sql -> execute();
			$result = $sql -> get_result();

			if(!$result)
				print("<p>Select query failed</p>");
			else {
				if($result -> num_rows == 0)
					print("<p>No match found</p>");
        		else {
					print("<h1>Results</h1><table>");
	      			print("<tr><th>Patient_SIN</th><th>Doctor_SIN</th><th>Trade_Name</th><th><b>Date</th><th>Quantity</th></b></th></tr>");
					while($row = $result -> fetch_object()) {
						echo '<tr>';
						echo '<td style=color:red>'.$row -> pSIN.'</td>';
						echo '<td style=color:red>'.$row -> dSIN.'</td>';
						echo '<td style=color:red>'.$row -> Trade_Name.'</td>';
						echo '<td style=color:red>'.$row -> Date.'</td>';
						echo '<td style=color:red>'.$row -> Quantity.'</td>';
						echo '</tr>';
					}
					print("</table>");
				}
			}
		}
		else {
			include '../includes/searchForm.html';
			include '../includes/footer.html';
		}
	}
	$mysqli -> close();
?>
