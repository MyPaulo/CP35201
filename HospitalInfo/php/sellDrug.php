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
			include '../includes/pheader.html';
			print("<p>Insufficient privileges to sell Drugs.</p>");
		}
		else {
			include '../includes/fheader.html';

			if(isset($_POST["sellDrug"])) {
				$dpatient = $_POST['dpatient'];
				$count = count($dpatient);

				for($i = 0; $i < $count; $i++) {
					$sql = $mysqli -> prepare("SELECT FROM Sells WHERE PID=?");
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
				$sql = "SELECT * FROM Sells";
				$result = $mysqli -> query($sql);
				if(!$result)
					print("<p>Select query failed</p>");
				else {
					if($result -> num_rows == 0)
						print("<p>We don't have any Drug. All Sold out bud Come back later!</p>");
					else {
						print("<h1 style=color:purple>List of Drug And Prices</h1>");
					?>

						<form  name="deletePatient" method="post" action="<?php $PHP_SELF?>">

					<?php
					
							
							print("<table><tr><th style=color:purple></th><th>Pharmacy_Name</th><th>Trade_Name</th><th>Price</th></tr>\n");
							while($row = $result -> fetch_object()) {
								echo '<tr style=color:purple>';
								$PID = $row -> PID;
								$PID = $PID;
								print("<td style=color:red><input type=\"checkbox\" name=\"dpatient[]\" value=\"$PID\" disabled></td>");
								echo '<td style=color:red>'.$row -> Pharmacy_Name.'</td>';
								echo '<td style=color:red>'.$row -> Trade_Name.'</td>';
								echo '<td style=color:red>'.$row -> Prices.'</td>';
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
