<?php
	session_start();
	include 'conn.php';

	if(empty($_SESSION['username']) || empty($_SESSION['password']))
		print("Access to database denied");
	else {
		$username = $_SESSION['username'];
		$password = $_SESSION['password'];
		$type = $_SESSION['type'];

		if($type == "Patients") {
			include '../includes/pheader.html';
		}
		else if($type == "Doctors") {
			include '../includes/dheader.html';
		}
		else {
			include '../includes/fheader.html';
		}

		if(isset($_POST["searchDoctor"])) {
			$keyword = $_POST['keyword'];
			$choice = $_POST['choice'];
 
			if($choice == "dSIN")
				$sql = $mysqli -> prepare("SELECT * FROM Doctors WHERE dSIN LIKE ?");
				
			if($choice == "name")
				$sql = $mysqli -> prepare("SELECT * FROM Doctors WHERE name LIKE ?");	
				
			if($choice == "Specialty")
				$sql = $mysqli -> prepare("SELECT * FROM Doctors WHERE Specialty LIKE ?");

			$keyword = '%'.$keyword.'%';
			$sql -> bind_param('s', $keyword);
			$sql -> execute();
			$result = $sql -> get_result();

			if(!$result)
				print("<p>Select query failed</p>");
			else {
				if($result -> num_rows == 0)
					print("<p>No Doctor found</p>");
        		else {
					print("<h1>Results</h1><table>");
	      			print("<tr><th>Doctor_SIN</th><th>Name</th><th>Specialty</th></b></th></tr>");
					while($row = $result -> fetch_object()) {
						echo '<tr>';
						echo '<td style=color:red>'.$row -> dSIN.'</td>';
						echo '<td style=color:red>'.$row -> name.'</td>';
						echo '<td style=color:red>'.$row -> Specialty.'</td>';
						echo '</tr>';
					}
					print("</table>");
				}
			}
		}
		else {
			include '../includes/searchDoctor.html';
			include '../includes/footer.html';
		}
	}
	$mysqli -> close();
?>
