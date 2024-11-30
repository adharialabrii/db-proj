<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP with Embedded CSS</title>
<link rel="stylesheet" href="form1.css">
              </head>
<body>
<?php
$con = mysqli_connect("localhost","root","root");
if (!$con)
{die('Could not connect: ' . mysql_error());}
mysqli_select_db($con, "database_project-2");
$sql="INSERT INTO customer(CustomerID, FNC, LNC, City, Phone) VALUES
('$_POST[customerid]','$_POST[firstname]','$_POST[lastname]','$_POST[cityname]','$_POST[phonenumber]')";
if (!mysqli_query($con, $sql))
{die('Error: ' . mysqli_error($con));}
echo "1 customer added";
mysqli_close($con);
?>
</body>
</html>