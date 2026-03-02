<?php
include 'db.php';

header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=participants.xls");

echo "Student Name\tRoll Number\tEvent Name\n";

$data = mysqli_query($conn, "
SELECT p.student_name, p.roll_no, e.name AS event_name
FROM participants p
JOIN events e ON p.event_id = e.id
");

while($row = mysqli_fetch_assoc($data)) {
    echo $row['student_name']."\t".$row['roll_no']."\t".$row['event_name']."\n";
}
?>
