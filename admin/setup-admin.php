<?php


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "admin";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$adminUsername = "admin";
$adminPassword = "secret123";
$hashedPassword = password_hash($adminPassword, PASSWORD_DEFAULT);

$sql = "INSERT INTO admin_users (username, password_hash) VALUES (?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $adminUsername, $hashedPassword);

if ($stmt->execute()) {
    echo "Admin user created successfully";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();

?>