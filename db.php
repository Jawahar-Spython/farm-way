<?php
$conn = new mysqli("localhost","root","","college_event_db");
if ($conn->connect_error) die("DB Error");
session_start();
?>
