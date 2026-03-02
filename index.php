<?php include "db.php"; ?>

<!DOCTYPE html>
<html>
<head>
<title>Admin Login</title>
<style>
body { background:#2c3e50; font-family:Arial; }
.box { width:300px; margin:120px auto; background:white; padding:20px; border-radius:8px; }
input,button { width:100%; padding:10px; margin:8px 0; }
button { background:#27ae60; color:white; border:none; }
</style>
</head>
<body>

<div class="box">
<h2>Admin Login</h2>
<form method="post">
<input type="text" name="user" placeholder="Username" required>
<input type="password" name="pass" placeholder="Password" required>
<button name="login">Login</button>
</form>
</div>

<?php
if(isset($_POST['login'])){
$u=$_POST['user'];
$p=$_POST['pass'];
$check=$conn->query("SELECT * FROM admins WHERE username='$u' AND password='$p'");
if($check->num_rows==1){
$_SESSION['admin']=$u;
header("Location: dashboard.php");
}else{
echo "<p style='color:red;text-align:center'>Invalid Login</p>";
}
}
?>
</body>
</html>
