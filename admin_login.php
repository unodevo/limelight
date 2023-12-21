<?php
session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $inputUsername = $_POST['username'];
    $inputPassword = $_POST['password'];

    // Verify against hardcoded values
    if ($inputUsername === "admin" && $inputPassword === "secret123") {
        $_SESSION['admin_login'] = true;
        header('Location: admin/admin-panel.php');
        exit;
    } else {
        $message = "Invalid username or password!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <style>
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
            overflow: hidden;
        }

        .full-page-cover {
            width: 100vw;
            height: 100vh;
            background-image: url('images/ab.jpg');
            background-size: cover;
            background-position: center center;
        }

        .container .py-5 {
            margin-top: 2rem !important;
        }
    </style>
</head>

<body>
    <div class="full-page-cover">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-7 mt-5">
                    <?php if ($message): ?>
                    <div class="alert alert-danger">
                        <?= $message ?>
                    </div>
                    <?php endif; ?>
                    <div class="card" style="border-radius: 1rem;">
                        <div class="row g-0">
                            <div class="col-md-6 d-flex align-items-center">
                                <div class="card-body p-4 p-lg-5 text-black">
                                    <form action="admin_login.php" method="post">
                                        <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Admin Login</h5>
                                        <div class="form-outline mb-4">
                                            <input type="text" name="username" class="form-control" required>
                                            <label class="form-label" for="username">Username</label>
                                        </div>
                                        <div class="form-outline mb-4">
                                            <input type="password" name="password" class="form-control" required>
                                            <label class="form-label" for="password">Password</label>
                                        </div>
                                        <div class="pt-1 mb-4">
                                            <button type="submit" class="btn btn-primary">Login</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
