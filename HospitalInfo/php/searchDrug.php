<?php
    session_start();
    include 'conn.php';

    if(empty($_SESSION['username']) || empty($_SESSION['password']))
        print("Access to database denied");
    else {
        $username = $_SESSION['username'];
        $password = $_SESSION['password'];
        $type = $_SESSION['type'];

        if($type == "Pharmacy") {
            include '../includes/fheader.html';
        }
        else if($type == "Patients") {
            include '../includes/pheader.html';
        }
        else {
            include '../includes/dheader.html';
        }

        if(isset($_POST["searchButton"])) {
            $keyword = $_POST['keyword'];
            $choice = $_POST['choice'];

            // Check if keyword is empty
            if(empty($keyword)) {
                print("<p>Please enter a keyword to search.</p>");
            } else {
                if($choice == "PID")
                    $sql = $mysqli -> prepare("SELECT * FROM Sells WHERE PID LIKE ?");
                    
                if($choice == "Trade_Name")
                    $sql = $mysqli -> prepare("SELECT * FROM Sells WHERE Trade_Name LIKE ?");    
                    
                if($choice == "Pharmacy_Name")
                    $sql = $mysqli -> prepare("SELECT * FROM Sells WHERE Pharmacy_Name LIKE ?");
                    
                if($choice == "Prices")
                    $sql = $mysqli -> prepare("SELECT * FROM Sells WHERE Prices LIKE ?");

                $keyword = '%'.$keyword.'%';
                $sql -> bind_param('s', $keyword);
                $sql -> execute();
                $result = $sql -> get_result();

                if(!$result)
                    print("<p>Select query failed</p>");
                else {
                    if($result -> num_rows == 0)
                        print("<p>No Drug(s) found</p>");
                    else {
                        print("<h1 style=color:purple>Drug(s) Found!</h1><table>");
                        print("<tr><th>PID</th><th>Trade_Name</th><th>Pharmacy_Name</th><th>Prices</th></b></th></tr>");
                        while($row = $result -> fetch_object()) {
                            echo '<tr>';
                            echo '<td style=color:red>'.$row -> PID.'</td>';
                            echo '<td style=color:red>'.$row -> Trade_Name.'</td>';
                            echo '<td style=color:red>'.$row ->Pharmacy_Name.'</td>';
                            echo '<td style=color:red>'.$row -> Prices.'</td>';
                            echo '</tr>';
                        }
                        print("</table>");
                    }
                }
            }
        }
        else {
            include '../includes/searchDrug.html';
            include '../includes/footer.html';
        }
    }
    $mysqli -> close();
?>
