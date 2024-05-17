<?php
	session_start();
	include 'conn.php';

	if(empty($_SESSION['username']) || empty($_SESSION['password']))
		print("Access to database denied");
	else {
		$username = $_SESSION['username'];
		$password = $_SESSION['password'];
		$type = $_SESSION['type'];
		$dpatient = " ";

		if($type != "Pharmacy") {
			include '../includes/pheader.html';
			
			print("<p>Insufficient privileges to remove Drugs from catalogue.</p>");
		}
		else {
			include '../includes/fheader.html';

			if(isset($_POST["deletePatient"])) {
				$dpatient = 1;
				$dpatient = $_POST['dpatient'];
				$count = count($dpatient);

				for($i = 0; $i < $count; $i++) {
					$sql = $mysqli -> prepare("DELETE FROM Sells WHERE PID=?");
					$sql -> bind_param('s', $dpatient[$i]);
					$sql -> execute();
					if($sql -> errno)
						print("Delete query failed");
				}
				if($count == 1)
					print("<p>$count Drug removed from HospitalInfo catalogue.</p>");
				else
					print("<p>$count Drugs removed from HospitalInfo catalogue.</p>");
			}
			else {
				$sql = "SELECT * FROM Sells";
				$result = $mysqli -> query($sql);
				if(!$result)
					print("<p>Select query failed</p>");
				else {
					if($result -> num_rows == 0)
						print("<p>There are no Drugs in HospitalInfo Database</p>");
					else {
						print("<h1 style=color:purple>Select Drug(s) to remove from catalogue</h1>");
					?>

						<form  name="deletePatients" method="post" action="<?php $PHP_SELF?>">

					<?php
					
							
						print("<table><tr><th style=color:purple></th><th>PID</th><th>Trade_Name</th><th>Pharmacy_Name</th><th>Prices</th></tr>\n");
							while($row = $result -> fetch_object()) {
								echo '<tr style=color:purple>';
								$PID = $row -> PID;
								print("<td style=color:red><input type=\"checkbox\" name=\"dpatient[]\" value=\"$PID\"></td>");
								echo '<td style=color:red>'.$row -> PID.'</td>';
								echo '<td style=color:red>'.$row -> Trade_Name.'</td>';
								echo '<td style=color:red>'.$row ->Pharmacy_Name.'</td>';
								echo '<td style=color:red>'.$row -> Prices.'</td>';
								echo '</tr>';
								print("\n");
							}
							print("</table style=color:#000><br />\n<input type=\"submit\" value=\"Delete selected Drugs\" name=\"deletePatient\"></form>");
					}
				}
			}
		}
    	include '../includes/footer.html';
	}
	$mysqli -> close();
?>
