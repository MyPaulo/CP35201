<?php

session_Start();
$_SESSION = array();
session_destroy();
header('Location: http://localhost/CP35201/HospitalInfo/index.html')
?>
