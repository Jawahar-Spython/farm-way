<?php
include 'db.php';
$events = mysqli_query($conn, "SELECT * FROM events");

if (isset($_POST['register'])) {
    $name = $_POST['name'];
    $roll = $_POST['roll'];
    $event = $_POST['event'];

    mysqli_query($conn, "INSERT INTO participants (student_name, roll_no, event_id)
    VALUES ('$name', '$roll', '$event')");
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Event Registration</title>
</head>
<body>

<h2>College Event Registration</h2>

<form method="POST">
<input type="text" name="name" placeholder="Student Name" required><br><br>
<input type="text" name="roll" placeholder="Roll Number" required><br><br>

<select name="event" required>
<option value="">Select Event</option>
<?php while($e=mysqli_fetch_assoc($events)){ ?>
<option value="<?= $e['id'] ?>"><?= $e['name'] ?></option>
<?php } ?>
</select><br><br>

<button name="register">Register</button>
</form>

</body>
</html>
