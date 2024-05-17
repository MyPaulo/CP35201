<?php
	session_start();
	include 'conn.php';

	if(empty($_SESSION['username']) || empty($_SESSION['password']))
		print("Access to database denied");
	else {
		$username = $_SESSION['username'];
		$password = $_SESSION['password'];
		$type = $_SESSION['type'];
		

		if($type != "Pharmacy") {
			include '../includes/dheader.html';
			include '../includes/fheader.html';
			print("<p>Insufficient privileges to Open Contracts.</p>");
		}
		else {
			include '../includes/fheader.html';

			if(isset($_POST["openContracts"])) {
				$dpatient = $_POST['dpatient'];
				$count = count($dpatient);

				for($i = 0; $i < $count; $i++) {
					$sql = $mysqli -> prepare("SELECT FROM Contracts WHERE PID=?");
					$sql -> bind_param('s', $dpatient[$i]);
					$sql -> execute();
					if($sql -> errno)
						print("Select query failed");
				}
				if($count == 1)
					print("");
				else
					print("");
			}
			else {
				$sql = "SELECT * FROM Contracts";
				$result = $mysqli -> query($sql);
				if(!$result)
					print("<p>Select query failed</p>");
				else {
					if($result -> num_rows == 0)
						print("<p>No Contracts Found!</p>");
					else {
						print("<h1 style=color:purple>List of Open Contract(s)</h1>");
					?>

						<form  name="deletePatients" method="post" action="<?php $PHP_SELF?>">

					<?php
					
							
	print("<table><tr><th style=color:purple></th><th>RxComoany</th><th>Pharmacy_Name</th><th>Start_date</th><th>End_Date</th><th>Supervisor</th></tr>\n");
							while($row = $result -> fetch_object()) {
								echo '<tr style=color:purple>';
								$PID = $row -> PID;
								$PID = $PID;
								print("<td style=color:red><input type=\"checkbox\" name=\"dpatient[]\" value=\"$PID\" disabled></td>");
								echo '<td style=color:red>'.$row -> RxName.'</td>';
								echo '<td style=color:red>'.$row -> Pharmacy_Name.'</td>';
								echo '<td style=color:red>'.$row -> Start_date.'</td>';
								echo '<td style=color:red>'.$row -> End_date.'</td>';
								echo '<td style=color:red>'.$row -> Supervisor.'</td>';
								echo '</tr>';
								print("\n");
							}
							//print("</table style=color:#000><br />\n<input type=\"submit\" value=\"Delete selected Patients\" name=\"deletePatient\"></form>");
					}
				}
			}
		}
    	include '../includes/footer.html';
	}
	$mysqli -> close();
?>
