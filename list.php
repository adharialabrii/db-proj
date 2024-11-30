<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP with Embedded CSS</title>
<link rel="stylesheet" href="form2.css">
              </head>
<body>
<?php
$servername = "localhost";
$username = "root";
//$password = "";
///Mac user
$password = "root";
$dbname = "database_project-2";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
 die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $customer_id = $_POST['customerid'];}
$sql = "SELECT * FROM contract INNER JOIN customer ON customer.CustomerID=contract.CustomerID INNER JOIN vehicle ON vehicle.CarID=contract.CarID INNER JOIN contractfeature ON contractfeature.ContractID = contract.ContractID INNER JOIN feature ON feature.FeatureID = contractfeature.FeatureID WHERE customer.CustomerID=$customer_id";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
 // output data of each row
 while($row = mysqli_fetch_assoc($result)) {
 echo "Contract ID: " . $row["ContractID"] . "<br>"."<br>";
echo "Start Date: " . $row["StartDate"] . "<br>"."<br>";
echo "Due Date: " . $row["DueDate"] . "<br>"."<br>";
echo "Customer ID: " . $row["CustomerID"] . "<br>"."<br>";
echo "Name: " . $row["FNC"] .$row["LNC"]. "<br>"."<br>";
echo "Address: " . $row["City"] . "<br>"."<br>";
echo "Phone: " . $row["Phone"] . "<br>"."<br>";
echo "Plate Number: " . $row["Plate Number"] . "<br>"."<br>";
echo "Make: " . $row["Make"] . "<br>"."<br>";
echo "Model: " . $row["Model"] . "<br>"."<br>";
echo "Color: " . $row["Color"] . "<br>"."<br>";
echo "Mileage: " . $row["Mileage"] . "<br>"."<br>";
echo "Type: " . $row["Type_Car"] . "<br>"."<br>";
echo "Extra: " . $row["NameF"] . "<br>"."<br>";
echo "Extra daily rate: " .$row["F-PricePerDay"]. "<br>"."<br>";
echo "car daily rate: " . $row["Car_PricePerDay"] . "<br>"."<br>";

$days = (strtotime($row["DueDate"]) - strtotime($row["StartDate"]))/(60*60*24); // Difference in days
            $extra_cost = $days * $row["F-PricePerDay"];
echo "Extra Cost: " . $extra_cost. "<br>"."<br>";
$vehicle_cost=$days*$row["Car_PricePerDay"];
echo "vehicle Cost: " . $vehicle_cost. "<br>"."<br>";
echo "Total Cost: " . $extra_cost+$vehicle_cost. "<br>"."<br>";





}
} else {
 echo "0 results";
}
mysqli_close($conn);
?>
</body>
</html>