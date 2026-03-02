<?php
include 'db.php';

if (isset($_POST['add'])) {
    $name = $_POST['name'];
    $date = $_POST['date'];
    $venue = $_POST['venue'];
    $limit = $_POST['limit'];

    mysqli_query($conn, "INSERT INTO events (name, date, venue, max_participants)
    VALUES ('$name', '$date', '$venue', '$limit')");
}

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    mysqli_query($conn, "DELETE FROM events WHERE id=$id");
}

$events = mysqli_query($conn, "SELECT * FROM events");
?>

<!DOCTYPE html>
<html>
<head>
<title>Manage Events</title>
<style>
body{font-family:Arial;background:#f4f6f8;padding:20px}
form,input,button{padding:8px;margin:5px}
table{width:100%;border-collapse:collapse}
th,td{padding:10px;border:1px solid #ccc}
th{background:#333;color:white}
</style>
</head>
<body>

<h2>Manage College Events</h2>

<form method="POST">
<input type="text" name="name" placeholder="Event Name" required>
<input type="date" name="date" required>
<input type="text" name="venue" placeholder="Venue" required>
<input type="number" name="limit" placeholder="Max Participants" required>
<button name="add">Add Event</button>
</form>

<table>
<tr>
<th>ID</th><th>Name</th><th>Date</th><th>Venue</th><th>Limit</th><th>Action</th>
</tr>

<?php while($row=mysqli_fetch_assoc($events)){ ?>
<tr>
<td><?= $row['id'] ?></td>
<td><?= $row['name'] ?></td>
<td><?= $row['date'] ?></td>
<td><?= $row['venue'] ?></td>
<td><?= $row['max_participants'] ?></td>
<td>
<a href="?delete=<?= $row['id'] ?>" onclick="return confirm('Delete event?')">Delete</a>
</td>
</tr>
<?php } ?>

</table>

</body>
</html>
