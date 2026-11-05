<?php
session_start();
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Student Information</title>
</head>
<body>
<?php
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

$id = $_SESSION['studentid'];

$query1 = "SELECT Student.Name, Student.ID, Student.Major, Transcript.Course, Transcript.Grade
FROM Student
INNER JOIN Transcript
ON Student.ID = Transcript.ID
WHERE Student.ID = '$id'";
$printdata = mysqli_query($con,$query1);

echo "<table align='center' border='2px' style='width: 1500px; line-height:40px;'>
<tr>
<th>Name</th>
<th>ID</th>
<th>Major</th>
<th>Course</th>
<th>Grade</th>
</tr>";

while($row = mysqli_fetch_array($printdata))
{
echo "<tr>";
echo "<td>" . $row['Name'] . "</td>";
echo "<td>" . $row['ID'] . "</td>";
echo "<td>" . $row['Major'] . "</td>";
echo "<td>" . $row['Course'] . "</td>";
echo "<td>" . $row['Grade'] . "</td>";
echo "</tr>";
}
echo "</table>";

mysqli_close($con);
?>
<br>
<form action="studentid.php">
<input type="submit" value="Home">
</form>
</body>
</html>