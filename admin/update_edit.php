<?php 

require_once("server.php");

if(isset($_POST['update'])) {
    $id = $_GET['id'];
    $genre = $_POST['genre'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $pic = $_POST['image'];
    $stock = $_POST['stock'];
    $director = $_POST['director'];
    $trailer_url = $_POST["trailer_url"];

    // Prepare an SQL statement
    $stmt = $con->prepare("UPDATE movies SET genre = ?, title = ?, description = ?, image = ?, stock = ?, director = ?, trailer_url = ? WHERE id = ?");
    // Bind parameters
    $stmt->bind_param("ssssissi", $genre, $title, $description, $pic, $stock, $director, $trailer_url, $id);

    // Execute the statement
    if ($stmt->execute()) {
        header("location:movies.php");
    } else {
        echo "Error updating record: " . $stmt->error;
    }
    
    $stmt->close();
    $con->close();
}
?>
