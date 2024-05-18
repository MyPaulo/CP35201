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
            print("<p>Insufficient privileges to add Patients to Database</p>");      
        }
        else {
            include '../includes/dheader.html';

            if(isset($_POST["addPatientButton"]) ) {
                $pSIN = $_POST['pSIN'];
                $Name = $_POST['Name'];
                $Address = $_POST['Address'];
                $Age = $_POST['Age'];
                $Username = $_POST['Username'];
                $Password = $_POST['Password'];

                $dSIN= $password;
                
                $Pri_Phy= $username;
                 
                // Include username and password in the same INSERT query
                $sql = $mysqli -> prepare("INSERT INTO Patients(username, password, pSIN, Name, Address, Age) VALUES (?, ?, ?, ?, ?, ?)");
                $Password = md5($Password); // Hash the password before storing it
                $sql -> bind_param('ssssss', $Username, $Password, $pSIN, $Name, $Address, $Age);
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
