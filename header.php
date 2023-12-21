<?php
session_start();

$isLoggedIn = isset($_SESSION['username']);

// rest of your code...
// Function to check if the current page matches the link URL
function isCurrentPage($page)
{
    return basename($_SERVER['PHP_SELF']) === $page;
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Limelight cinema</title>

    <link
        href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;700&amp;family=Montserrat:ital,wght@1,100;1,300&amp;display=swap"
        rel="stylesheet">
    <!-- Bootstrap 5 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css"
        integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
</head>


<style>
    .navbar-custom {
        font-family: 'Montserrat', sans-serif;
        background-color: rgba(0, 0, 0, 0.722) !important;
        =
    }

    .navbar {
        margin-bottom: 80px !important;

    }

    .nav-link {
        color: white !important;
    }



    .nav-link:hover {
        color: rgb(244, 185, 77) !important;
        ;

    }

    .navbar-brand {
        color: rgb(244, 185, 77) !important;
    }

    /* Add this to highlight the active link in gold */
    .navbar-nav .nav-item .nav-link.active {
        color: rgb(244, 185, 77) !important;
    }




    /* Default State for Toggler */
    .navbar-toggler {
        background-color: transparent !important;
        /* Transparent background */
        border-color: #FFFFFF !important;
        /* White border */
    }

    .navbar-toggler-icon {
        background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' width='30' height='30' viewBox='0 0 30 30'%3e%3cpath stroke='rgba(255, 255, 255, 1)' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22m-22 8h22'%3e%3c/path%3e%3c/svg%3e") !important;
        /* White color bars */
    }

    /* Hover State for Toggler */
    .navbar-toggler:hover {
        border-color: gold !important;
        /* Gold border on hover */
    }

    .navbar-toggler:hover .navbar-toggler-icon {
        background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' width='30' height='30' viewBox='0 0 30 30'%3e%3cpath stroke='rgba(255, 215, 0, 1)' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22m-22 8h22'%3e%3c/path%3e%3c/svg%3e") !important;
        /* Gold color bars on hover */
    }
</style>

<body>

    <nav class="navbar navbar-expand-lg fixed-top navbar-custom">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">LimeLight</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>


            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <!-- me-auto for Bootstrap 5 -->
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about.php">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="events.php">Events</a>
                    </li>
                </ul>

                <?php if (isset($_SESSION['username'])): ?>
                <ul class="navbar-nav ms-auto">
                    <!-- ms-auto for Bootstrap 5 -->
                    <li class="nav-item">
                        <p class="navbar-text" style="color: rgb(244, 185, 77);">
                            <i class="fas fa-user" style="margin-right: 40px;">
                                <?= htmlspecialchars($_SESSION['username']) ?></i>
                        </p>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Log Out</a>
                    </li>
                </ul>
                <?php else: ?>
                <ul class="navbar-nav ms-auto">
                    <!-- ms-auto for Bootstrap 5 -->
                    <li class="nav-item">
                        <a class="nav-link" href="admin_login.php">Admin</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">Log In</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="register.php">Register</a>
                    </li>
                </ul>
                <?php endif; ?>
            </div>
        </div>
    </nav>

    <div class="main-content">
        <!-- Your main content starts here... -->
    </div>


    <!-- jQuery library -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>

    <!-- Popper.js -->
    <!-- Bootstrap 5 JS and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"
        integrity="sha384-eMNCOe7tC1do4A+gf8k5l7l4lMz4i3WDQn1Z7y/JonasIUNsobU+KZvishdDKinz" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js"
        integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
    </script>