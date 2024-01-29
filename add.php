<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Rakeeb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve the data from the AJAX request
$data = json_decode($_POST['data'], true);

// Prepare the SQL statement
$sql = "INSERT INTO Customer (customerName, customerPhone, rate, quantity, sizeX, sizeY, itemDescription, squareFeet, particulars)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);

// Bind the parameters
$stmt->bind_param("sssssssss", $customerName, $customerPhone, $rate, $quantity, $sizeX, $sizeY,$itemDescription, $squareFeet, $particulars);

// Insert the data for each row
foreach ($data as $row) {
    $customerName = $_POST['customerName'];
    $customerPhone = $_POST['customerPhone'];
    $rate = $_POST['rate'];
    $quantity = $_POST['quantity'];
    $sizeX = $_POST['sizeX'];
    $sizeY = $_POST['sizeY'];
    $itemDescription = $_POST['itemDescription'];
    $squareFeet = $_POST['squareFeet'];
    $particulars = $_POST['particulars'];

    $stmt->execute();
}

$stmt->close();
$conn->close();

echo "Data inserted successfully.";

?>
