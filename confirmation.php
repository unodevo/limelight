<?php
include 'header.php';
require_once 'vendor/autoload.php';

use Dompdf\Dompdf;



// Connection to your database
$con = mysqli_connect('localhost', 'u903839165_updevo', 'LKND,Lhdk8799#', 'u903839165_updevo');

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// Fetch submitted data from the form
$movieId = $_POST['movieId'];
$ticketCount = $_POST['ticketCount'];
$bookingDate = $_POST['bookingDate'];
$bookingTime = $_POST['bookingTime'];
$username = $_POST['username'];

// Fetch movie details based on movieId
$query = "SELECT * FROM movies WHERE id = '$movieId'";
$result = mysqli_query($con, $query);
$movie = mysqli_fetch_assoc($result);

// Start buffer
ob_start();
?>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8 text-center">
                <h2>Booking Confirmation</h2>
                <hr>

                <h4>User Details:</h4>
                <p><strong>Username:</strong> <?= $username ?></p>

                <h4>Booking Details:</h4>
                <p><strong>Number of Tickets:</strong> <?= $ticketCount ?></p>
                <p><strong>Date of Booking:</strong> <?= $bookingDate ?></p>
                <p><strong>Time of Booking:</strong> <?= $bookingTime ?></p>

                <h4>Movie Details:</h4>
                <img src='admin/images/<?= $movie['image'] ?>' alt='<?= $movie['title'] ?>' style="width: 200px;">
                <p><strong>Title:</strong> <?= $movie['title'] ?></p>
                <p><strong>Genre:</strong> <?= $movie['genre'] ?></p>
                <p><strong>Director:</strong> <?= $movie['director'] ?></p>

                <a href="confirmation.pdf" class="btn btn-success mt-5 mb-3" download>Download Confirmation</a>
            </div>
        </div>
    </div>
</body>

</html>
<?php
$html = ob_get_clean();

// Echo the HTML content to the webpage
echo $html;

// Generate PDF
$dompdf = new Dompdf();
$dompdf->loadHtml($html);
$dompdf->render();

$output = $dompdf->output();
file_put_contents('confirmation.pdf', $output);
?>