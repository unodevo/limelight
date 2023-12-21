<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST["username"];
    $inputPassword = $_POST["password"]; 

$con = mysqli_connect('localhost', 'u903839165_updevo', 'LKND,Lhdk8799#', 'u903839165_updevo');
    
    if ($conn->connect_error) {
        die("Connection failed: " . $con->connect_error);
    }

    $stmt = $con->prepare("SELECT password, dob FROM userslog WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();
        $storedPassword = $row["password"];
        $dob = $row["dob"];

        if (password_verify($inputPassword, $storedPassword)) {
            $currentDate = date("Y-m-d");
            $diff = date_diff(date_create($dob), date_create($currentDate));
            $age = $diff->format('%y');

            // Set session variables only after successful password verification
            $_SESSION["logged_in"] = true;
            $_SESSION['username'] = $username;

            if ($age < 18) {
                header("Location: junior_page.php");
            } else {
                header("Location: adult_page.php");
            }
            exit;
        } else {
            header("Location: login.php?error=1");
            exit;
        }
    } else {
        header("Location: login.php?error=1");
        exit;
    }

    $stmt->close();
    $conn->close();
}

?>