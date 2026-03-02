<?php
include 'db.php';

$event_count = mysqli_fetch_row(mysqli_query($conn, "SELECT COUNT(*) FROM events"))[0];
$participant_count = mysqli_fetch_row(mysqli_query($conn, "SELECT COUNT(*) FROM participants"))[0];
?>

<!DOCTYPE html>
<html>
<head>
<title>College Event Dashboard</title>
<style>
body{
    margin:0;
    font-family: 'Segoe UI', sans-serif;
    background:#f1f4f9;
}
.header{
    background:#0a2540;
    color:white;
    padding:20px;
    text-align:center;
    font-size:26px;
}
.container{
    padding:40px;
}
.cards{
    display:flex;
    gap:30px;
    margin-bottom:40px;
}
.card{
    flex:1;
    background:white;
    padding:30px;
    border-radius:12px;
    box-shadow:0 10px 25px rgba(0,0,0,0.1);
    text-align:center;
}
.card h1{
    font-size:40px;
    color:#0a2540;
}
.card p{
    font-size:18px;
    color:#555;
}
.actions{
    display:grid;
    grid-template-columns: repeat(2, 1fr);
    gap:25px;
}
.actions a{
    text-decoration:none;
}
.actions button{
    width:100%;
    padding:20px;
    font-size:18px;
    border:none;
    border-radius:10px;
    background:#2563eb;
    color:white;
    cursor:pointer;
    transition:0.3s;
}
.actions button:hover{
    background:#1e40af;
}
.footer{
    text-align:center;
    padding:15px;
    background:#0a2540;
    color:white;
    margin-top:40px;
}
</style>
</head>

<body>

<div class="header">
    College Event   Management System
</div>

<div class="container">

<div class="cards">
    <div class="card">
        <h1><?php echo $event_count; ?></h1>
        <p>Total Events</p>
    </div>
    <div class="card">
        <h1><?php echo $participant_count; ?></h1>
        <p>Total Participants</p>
    </div>
</div>

<div class="actions">
    <a href="manage_events.php"><button>Manage Events</button></a>
    <a href="register.php"><button>Student Registration</button></a>
    <a href="view_participants.php"><button>View Participants</button></a>
    <a href="export_excel.php"><button>Download Excel Report</button></a>
</div>

</div>

<div class="footer">
    © 2026 College Event Management System
</div>

</body>
</html>
