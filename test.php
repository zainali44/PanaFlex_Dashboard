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

// Prepare the SQL statement
$sql = "INSERT INTO Customer (customerName, customerPhone, rate, quantity, sizeX, sizeY, itemDescription, squareFeet, particulars)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

// Prepare and bind the parameters
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssssssss", $customerName, $customerPhone, $rate, $quantity, $sizeX, $sizeY, $itemDescription, $squareFeet, $particulars);

// Set dummy values for the variables
$customerName = "John Doe";
$customerPhone = "1234567890";
$rate = "10";
$quantity = "5";
$sizeX = "10";
$sizeY = "5";
$itemDescription = "Example item";
$squareFeet = "50";
$particulars = "Example particulars";

// Execute the statement
if ($stmt->execute()) {
    echo "Data inserted successfully.";
} else {
    echo "Error inserting data: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
