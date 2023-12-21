<?php
require_once("server.php");

$message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $pic = $_POST['image'];
    $genre = $_POST['genre'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $stock = $_POST['stock'];
    $director = $_POST['director'];
    $trailer_url = $_POST["trailer_url"];

    // Prepare the SQL statement
    $stmt = $con->prepare("INSERT INTO movies (genre, title, description, image, stock, director, trailer_url) VALUES (?, ?, ?, ?, ?, ?, ?)");

    // Check if the statement was prepared correctly
    if (!$stmt) {
        die("Statement preparation failed: " . $con->error);
    }

    // Bind parameters
    $stmt->bind_param("ssssiss", $genre, $title, $description, $pic, $stock, $director, $trailer_url);

    // Execute the statement
    if ($stmt->execute()) {
        header("location:movies.php");
        exit;
    } else {
        die("Execution failed: " . $stmt->error);
    }
}
?>