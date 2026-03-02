<?php
include 'db.php';

$data = mysqli_query($conn, "
SELECT p.student_name, p.roll_no, e.name AS event_name
FROM participants p
JOIN events e ON p.event_id = e.id
");
?>

<!DOCTYPE html>
<html>
<head>
<title>Participants</title>
</head>
<body>

<h2>Registered Participants</h2>

<table border="1" cellpadding="10">
<tr>
<th>Student Name</th>
<th>Roll No</th>
<th>Event</th>
</tr>

<?php while($row = mysqli_fetch_assoc($data)) { ?>
<tr>
<td><?php echo $row['student_name']; ?></td>
<td><?php echo $row['roll_no']; ?></td>
<td><?php echo $row['event_name']; ?></td>
</tr>
<?php } ?>

</table>

</body>
</html>
