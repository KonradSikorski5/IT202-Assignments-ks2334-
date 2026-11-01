<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Week 9 Student and Transcript</title>
</head>
<body>
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$servername = "sql1.njit.edu";
$username = "ks2334";
$password = "PLACE YOUR MYSQL PASSWORD HERE";
$dbname = "ks2334";

$con = mysqli_connect($servername,$username,$password,$dbname);

if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$query1 = "DROP TABLE IF EXISTS Student";
$droptable = mysqli_query($con,$query1);

$query2 = "DROP TABLE IF EXISTS Transcript";
$droptable2 = mysqli_query($con,$query2);

$query3 = "CREATE TABLE Student (
Name VARCHAR(100) NOT NULL,
ID INT(4) NOT NULL PRIMARY KEY,
Major VARCHAR(100)
)";
$createtable = mysqli_query($con,$query3);

$query4 = "CREATE TABLE Transcript (
ID INT(4) NOT NULL,
Course VARCHAR(100),
Grade VARCHAR(100)
)";
$createtable2 = mysqli_query($con,$query4);

$query5 = "INSERT INTO Student (Name, ID, Major) VALUES
('Konrad', '1101', 'Information Technology'),
('Damien', '2202', 'Computer Science'),
('Madisyn', '3303', 'Psychology'),
('Marissa', '4404', 'Business')";
$insertdata = mysqli_query($con,$query5);

$query6 = "INSERT INTO Transcript (ID, Course, Grade) VALUES
('1101', 'IT120', 'A'),
('1101', 'IT201', 'C+'),
('2202', 'CS113', 'B'),
('2202', 'IT101', 'C+'),
('3303', 'PSY210', 'A'),
('3303', 'PSY325', 'B'),
('4404', 'ACCT115', 'B+'),
('4404', 'IS265', 'B+')";
$insertdata2 = mysqli_query($con,$query6);

$query7 = "SELECT * FROM Student";
$printdata = mysqli_query($con,$query7);

echo "<table align='center' border='2px' style='width: 1500px; line-height:40px;'>
<tr>
<th>Name</th>
<th>ID</th>
<th>Major</th>
</tr>";

while($row = mysqli_fetch_array($printdata))
{
echo "<tr>";
echo "<td>" . $row['Name'] . "</td>";
echo "<td>" . $row['ID'] . "</td>";
echo "<td>" . $row['Major'] . "</td>";
echo "</tr>";
}
echo "</table>";

echo "<br>";

$query8 = "SELECT * FROM Transcript";
$printdata2 = mysqli_query($con,$query8);

echo "<table align='center' border='2px' style='width: 1500px; line-height:40px;'>
<tr>
<th>ID</th>
<th>Course</th>
<th>Grade</th>
</tr>";

while($row = mysqli_fetch_array($printdata2))
{
echo "<tr>";
echo "<td>" . $row['ID'] . "</td>";
echo "<td>" . $row['Course'] . "</td>";
echo "<td>" . $row['Grade'] . "</td>";
echo "</tr>";
}
echo "</table>";

echo "<br>";

$query9 = "SELECT Student.Name, Student.ID, Student.Major, Transcript.Course, Transcript.Grade
FROM Student
INNER JOIN Transcript
ON Student.ID = Transcript.ID";
$printdata3 = mysqli_query($con,$query9);

echo "<table align='center' border='2px' style='width: 1500px; line-height:40px;'>
<tr>
<th>Name</th>
<th>ID</th>
<th>Major</th>
<th>Course</th>
<th>Grade</th>
</tr>";

while($row = mysqli_fetch_array($printdata3))
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
</body>
</html>