<?php 

// Error handling function
function handleError($errorMessage) {
    echo "<div class='error-message'>Error: $errorMessage</div>";
    // Optionally, write the error message to a log file
    // file_put_contents('error_log.txt', $errorMessage . "\n", FILE_APPEND);
    exit;
}

// Start the session
session_start();

// Check if the admin is logged in, if not redirect to login page
if (!isset($_SESSION['admin_login']) || $_SESSION['admin_login'] !== true) {
    header('Location: login.php');
    exit;
}

// Handle logout request
if (isset($_GET['logout']) && $_GET['logout'] === 'true') {
    session_unset();
    session_destroy();
    header('Location: admin_login.php');
    exit;
}

// Include the header
include('includes/header.php');

// Create a connection to the database
$con = mysqli_connect('localhost', 'u903839165_updevo', 'LKND,Lhdk8799#', 'u903839165_updevo');
if (mysqli_connect_errno()) {
    handleError("Failed to connect to the database: " . mysqli_connect_error());
}

// Query to fetch data from admin_users table
$query = "SELECT * from admin_users";
$result = mysqli_query($con, $query);
if (!$result) {
    handleError("Query failed: " . mysqli_error($con));
}

// Fetching total number of movies
$query_total_movies = "SELECT COUNT(*) AS total_movies FROM movies";
$result_total_movies = mysqli_query($con, $query_total_movies);
if (!$result_total_movies) {
    handleError("Error fetching total movies: " . mysqli_error($con));
}
$row_total_movies = mysqli_fetch_assoc($result_total_movies);
$total_movies = $row_total_movies['total_movies'];

// Fetching total stock of movies
$query_total_stock = "SELECT SUM(stock) AS total_stock FROM movies";
$result_total_stock = mysqli_query($con, $query_total_stock);
if (!$result_total_stock) {
    handleError("Error fetching total stock: " . mysqli_error($con));
}
$row_total_stock = mysqli_fetch_assoc($result_total_stock);
$total_stock = $row_total_stock['total_stock'];

// Fetching number of movies per genre
$query_movies_per_genre = "SELECT genre, COUNT(*) AS count_per_genre FROM movies GROUP BY genre";
$result_movies_per_genre = mysqli_query($con, $query_movies_per_genre);
if (!$result_movies_per_genre) {
    handleError("Error fetching movies per genre: " . mysqli_error($con));
}

// Query for total users
$query_total_users = "SELECT COUNT(*) AS total_users FROM userslog";
$result_total_users = mysqli_query($con, $query_total_users);
$row_total_users = mysqli_fetch_assoc($result_total_users);
$total_users = $row_total_users['total_users'];

// Query for adult users (assuming an adult is 18 or older)
$query_adult_users = "SELECT COUNT(*) AS total_adults FROM userslog WHERE YEAR(CURDATE()) - YEAR(dob) >= 18";
$result_adult_users = mysqli_query($con, $query_adult_users);
$row_adult_users = mysqli_fetch_assoc($result_adult_users);
$total_adults = $row_adult_users['total_adults'];

// Calculate number of juniors
$total_juniors = $total_users - $total_adults;

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin panel</title>
    <script src="https://kit.fontawesome.com/e524ad7d5a.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../style/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
</head>

<style>
    .card {
    transition: transform .2s;
}

.card:hover {
    transform: scale(1.05);
}

h1 {
    font-weight: bold;
    color: #333;
    margin-bottom: 1rem;
}

hr {
    width: 100%;
    border-top: 2px solid #ccc;
}


</style>


<body>
    
    <div class="row justify-content-center mb-5">
    <div class="col-12 text-center">
        <h1>Admin Dashboard</h1>
        <hr>
    </div>
</div>

    <div class="container mt-5">
    <div class="row justify-content-center">

        <!-- Movies Card -->
        <div class="col-md-4">
            <div class="card mb-4 shadow">
                <div class="card-body text-center">
                    <i class="fas fa-film fa-3x mb-3"></i>
                    <h5 class="card-title">Movies</h5>
                    <a href="movies.php" class="btn btn-primary">View Movies</a>
                </div>
            </div>
        </div>

        <!-- Users Card -->
        <div class="col-md-4">
            <div class="card mb-4 shadow">
                <div class="card-body text-center">
                    <i class="fas fa-users fa-3x mb-3"></i>
                    <h5 class="card-title">Users</h5>
                    <a href="users.php" class="btn btn-primary">View Users</a>
                </div>
            </div>
        </div>

        <!-- Home Card -->
        <div class="col-md-4">
            <div class="card mb-4 shadow">
                <div class="card-body text-center">
                    <i class="fas fa-home fa-3x mb-3"></i>
                    <h5 class="card-title">Home</h5>
                    <a href="/index.php" class="btn btn-primary">Go Home</a>
                </div>
            </div>
        </div>

    </div>
</div>

<div class="container p-3">
    <h2 class="mb-1 text-warning">Movies Dashboard</h2>
    <p class="mb-1 text-white">Admin</p>

    <div class="row">

        <!-- Card for Total Movies -->
        <div class="col-md-4">
            <div class="card mt-3 bg-primary text-white shadow-sm hover-shadow-lg">
                <div class="card-body text-center">
                    <i class="fa fa-film fa-3x mb-3"></i>
                    <h5 class="card-title">Total Movies</h5>
                    <p class="card-text"><?php echo $total_movies; ?></p>
                </div>
            </div>
        </div>

        <!-- Card for Total Stock -->
        <div class="col-md-4">
            <div class="card mt-3 bg-success text-white shadow-sm hover-shadow-lg">
                <div class="card-body text-center">
                    <i class="fa fa-cube fa-3x mb-3"></i>
                    <h5 class="card-title">Total Stock</h5>
                    <p class="card-text"><?php echo $total_stock; ?></p>
                </div>
            </div>
        </div>

        <!-- Cards for Movies Per Genre -->
        <?php while($row = mysqli_fetch_assoc($result_movies_per_genre)) { ?>
            <div class="col-md-4">
                <div class="card mt-3 bg-light text-dark shadow-sm hover-shadow-lg">
                    <div class="card-body text-center">
                        <i class="fa fa-tags fa-3x mb-3"></i>
                        <h5 class="card-title">Genre: <?php echo $row['genre']; ?></h5>
                        <p class="card-text">Movies: <?php echo $row['count_per_genre']; ?></p>
                    </div>
                </div>
            </div>
        <?php } ?>

    </div>

    <div class="row mt-3">
        <div class="col-md-12">
            <a href="add_movie.php" class="btn btn-success">Add New Movie</a>
        </div>
    </div>
</div>


<div class="container p-3">
    <h2 class="mb-1 text-warning">Users Dashboard</h2>
    <p class="mb-1 text-white">Admin</p>

    <div class="row">

        <!-- Card for Total Users -->
        <div class="col-md-4">
            <div class="card mt-3 bg-primary text-white shadow-sm hover-shadow-lg">
                <div class="card-body">
                    <i class="fa fa-users fa-2x mb-2"></i>
                    <h5 class="card-title">Total Users</h5>
                    <p class="card-text"><?php echo $total_users; ?></p>
                </div>
            </div>
        </div>

        <!-- Card for Adult Users -->
        <div class="col-md-4">
            <div class="card mt-3 bg-success text-white shadow-sm hover-shadow-lg">
                <div class="card-body">
                    <i class="fa fa-user fa-2x mb-2"></i> <!-- Icon representing an adult -->
                    <h5 class="card-title">Adult Users</h5>
                    <p class="card-text"><?php echo $total_adults; ?></p>
                </div>
            </div>
        </div>

        <!-- Card for Junior Users -->
        <div class="col-md-4">
            <div class="card mt-3 bg-warning text-dark shadow-sm hover-shadow-lg">
                <div class="card-body">
                    <i class="fa fa-child fa-2x mb-2"></i> <!-- Icon representing a junior/child -->
                    <h5 class="card-title">Junior Users</h5>
                    <p class="card-text"><?php echo $total_juniors; ?></p>
                </div>
            </div>
        </div>

    </div>
</div>


</body>
</html>
