<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Week Eight Participation</title>
</head>
<body>
<form action="week8.php" method="POST">
Enter a value: <input type="text" name="value[]"><br>
Enter a value: <input type="text" name="value[]"><br>
Enter a value: <input type="text" name="value[]"><br>
Enter a value: <input type="text" name="value[]"><br>
Enter a value: <input type="text" name="value[]"><br>
Enter a value: <input type="text" name="value[]"><br>
Enter a value: <input type="text" name="value[]"><br>
Enter a value: <input type="text" name="value[]"><br>
<input type="submit" value="Submit">
</form>
<br>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
$arr = $_POST['value'];

echo "Original array<br>";
for ($i = 0; $i < count($arr); $i++)
{
echo $arr[$i] . "<br>";
}
echo "<br><br>";
echo "Original array showing keys<br>";
print_r($arr);
echo "<br><br>";

unset($arr[0]);
unset($arr[2]);

echo "Array after 2 elements deleted<br>";
for ($i = 0; $i < count($arr); $i++)
{
if (isset($arr[$i]))
{
echo $arr[$i];
}
echo "<br>";
}
echo "<br><br>";
echo "Array after 2 elements deleted with keys<br>";
print_r($arr);
echo "<br><br>";

$arr = array_values($arr);

echo "Array after gaps removed<br>";
for ($i = 0; $i < count($arr); $i++)
{
echo $arr[$i] . "<br>";
}
echo "<br><br>";
echo "Array after gaps removed with keys<br>";
print_r($arr);
echo "<br><br>";

$sorted = $arr;
sort($sorted);

echo "Array after sort ascending order<br>";
for ($i = 0; $i < count($sorted); $i++)
{
echo $sorted[$i] . "<br>";
}
echo "<br><br>";
echo "Array after ascending sort with keys<br>";
print_r($sorted);
echo "<br><br>";

$reversed = $arr;
rsort($reversed);

echo "Array after sort descending order<br>";
for ($i = 0; $i < count($reversed); $i++)
{
echo $reversed[$i] . "<br>";
}
echo "<br><br>";
echo "Array after descending sort with keys<br>";
print_r($reversed);
echo "<br><br>";

asort($sorted);

echo "Array after sort ascending order according to values and keeping keys<br>";
for ($i = 0; $i < count($sorted); $i++)
{
echo $sorted[$i] . "<br>";
}
echo "<br><br>";
echo "Array after ascending sort according to keys according to values and keeping keys with keys<br>";
print_r($sorted);
echo "<br><br>";

ksort($sorted);

echo "Array after sort ascending order according to keys<br>";
for ($i = 0; $i < count($sorted); $i++)
{
echo $sorted[$i] . "<br>";
}
echo "<br><br>";
echo "Array after ascending sort according to keys with keys<br>";
print_r($sorted);
}
?>
</body>
</html>