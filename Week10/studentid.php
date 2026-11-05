<?php
session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$servername = "sql1.njit.edu";
$username = "ks2334";
$password = ".>i?qkIwzcC34!=R<,(>";
$dbname = "ks2334";

$con = mysqli_connect($servername,$username,$password,$dbname);

if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

if (isset($_POST['submit']))
{
$id = $_POST['studentid'];

$query1 = "SELECT * FROM Student WHERE ID = '$id'";
$result = mysqli_query($con,$query1);
$rows = mysqli_num_rows($result);

if ($rows == 1)
{
$_SESSION['studentid'] = $id;
header("Location: studentinfo.php");
}
else
{
echo "<script>alert('STUDENT ID NOT FOUND. Please re-enter');</script>";
}
}

mysqli_close($con);
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Student ID</title>
</head>
<body>
<form method="post" action="studentid.php">
<label>Student ID</label>
<input type="text" name="studentid">
<br>
<input type="submit" name="submit" value="Submit">
</form>
</body>
</html>