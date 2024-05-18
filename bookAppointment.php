<?php
    session_start();
    include 'conn.php';

    if(empty($_SESSION['username']) || empty($_SESSION['password']))
        print("Access to database denied");
    else {
        $username = $_SESSION['username'];
        $password = $_SESSION['password'];
        $type = $_SESSION['type'];

        if($type != "Patients") {
            print("<p>Insufficient privileges to book appointments</p>");
        }
        else {
            if(isset($_POST["book_appointment"])) {
                $doctor_id = $_POST['doctor_id'];
                $date = $_POST['date'];
                $time = $_POST['time'];

                $sql = $mysqli -> prepare("INSERT INTO appointments(username, dSIN, date, time) VALUES (?, ?, ?, ?)");
                $sql -> bind_param('ssss', $username, $doctor_id, $date, $time);
                $sql -> execute();

                if($sql -> errno)
                    print("<p>Booking failed</p>");
                else
                    print("<p>Appointment successfully booked</p>");
            }
            else {
                include '../includes/bookAppointment.html';
            }
        }
    }
    $mysqli -> close();
?>
