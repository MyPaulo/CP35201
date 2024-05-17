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
			print("<p>Insufficient privileges to delete Patients from catalogue.</p>");
		}
		else {
			include '../includes/dheader.html';
				
			if(isset($_POST["deletePatient"])) {
				$dpatient = $_POST['dpatient'];
				$count = count($dpatient);

				for($i = 0; $i < $count; $i++) {
					$sql = $mysqli -> prepare("DELETE FROM Patients WHERE pSIN=?");
					$sql -> bind_param('s', $dpatient[$i]);
					$sql -> execute();
					if($sql -> errno)
						print("Delete query failed");
				}
				if($count == 1)
					print("<p style=color:red>$count Patient removed from HospitalInfo catalogue.</p>");
				else
					print("<p style=color:red>$count Patients removed from HospitalInfo catalogue.</p>");
			}
			else {
				$sql = "SELECT * FROM Patients";
				$result = $mysqli -> query($sql);
				if(!$result)
					print("<p>Select query failed</p>");
				else {
					if($result -> num_rows == 0)
						print("<p>There are no Patients in HospitalInfo Database</p>");
					else {
						print("<h1 style=color:red>Select Patient(s) to remove from catalogue</h1>");
					?>

						<form  name="deletePatients" method="post" action="<?php $PHP_SELF?>">

					<?php
					
							
							print("<table><tr><th style=color:red></th><th>pSIN</th><th>Name</th><th>Address</th><th>Age</th></tr>\n");
							while($row = $result -> fetch_object()) {
								echo '<tr style=color:purple>';
								$pSIN = $row -> pSIN;
								print("<td style=color:red><input type=\"checkbox\" name=\"dpatient[]\" value=\"$pSIN\"></td>");
								echo '<td style=color:red>'.$row -> pSIN.'</td>';
								echo '<td style=color:red>'.$row -> Name.'</td>';
								echo '<td style=color:red>'.$row -> Address.'</td>';
								echo '<td style=color:red>'.$row -> Age.'</td>';
								echo '</tr>';
								print("\n");
							}
							print("</table style=color:#000><br />\n<input type=\"submit\" value=\"Delete selected Patients\" name=\"deletePatient\"></form>");
					}
				}
			}
		}
    	include '../includes/footer.html';
	}
	$mysqli -> close();
?>
