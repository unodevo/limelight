<?php
include 'header.php'; 

$isLoggedIn = isset($_SESSION['username']);

$con = mysqli_connect('localhost', 'u903839165_updevo', 'LKND,Lhdk8799#', 'u903839165_updevo');

$genreFilter = "";
if (isset($_GET['genre']) && $_GET['genre'] != "") {
    $selectedGenre = mysqli_real_escape_string($con, $_GET['genre']); // Prevent SQL injection
    $genreFilter = " WHERE genre = '$selectedGenre'";
}

$genreQuery = "SELECT DISTINCT genre FROM movies WHERE genre IN ('Drama', 'Horror', 'Comedy', 'Triller', 'Action', 'Fantasy', 'Animation')";
$genreResult = mysqli_query($con, $genreQuery);

$query = "SELECT * FROM movies" . $genreFilter;
$result = mysqli_query($con, $query);
?>

<style>
    body {
        background-color: red !important;
        /* This will make the entire background red */
    }

    body {
        background:
            linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)),
            url('images/about.jpg') no-repeat center center fixed;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
    }

    .card-img-top {
        max-width: 100%;
        height: auto;
    }


    */

    /* This will hide the border of the card */
    .card {
        border: none;
    }

    .card-body {
        background-color: transparent !important;
    }

    .card-img-top {
        transition: transform .2s;
        /* Smooth transition for scaling effect */
        display: block;
        width: 100%;
        height: auto;
    }

    .card:hover .card-img-top {
        transform: scale(1.1);
        /* Scale the image up by 10% on hover */
    }


    .card {
        overflow: hidden;
        position: relative; // This ensures that the children's positioning (like absolute) is relative to the card
    }


    .card,
    .card-body,
    .list-group-item,
    .card-link {
        background-color: transparent !important;
        border: none !important;
        color: #fff !important;
        /* white text color to ensure it's visible on a dark background */
    }

    .show-more {
        color: gold;
        font-size: 1.2rem;
    }

    .show-less {
        color: gold;
        font-size: 1.2rem;
    }

    <blade media|%20(max-width%3A%20576px)%20%7B%20%20%2F*%20Adjust%20according%20to%20your%20needs%20*%2F%0D>.card-title {
        font-size: 1.2rem;
    }

    .card-text {
        font-size: 0.9rem;
    }
    }


    <blade media|%20(max-width%3A%20576px)%20%7B%0D>select.form-control {
        font-size: 0.9rem;
        padding: 8px 12px;
    }
    }

    .bg-yellow {
        background-color: yellow !important;
        color: black !important;
        /* Adjust if necessary for best contrast */
    }

    .btn {
        background-color: rgba(14, 4, 123, 0.796) !important;
        /* !important ensures your styles take precedence over Bootstrap's */
        border: none !important;
        color: white;
        font-family: 'Montserrat', sans-serif;

    }

    .btn:hover {
        background-color: rgba(31, 8, 238, 0.796) !important;
        border-color: yellow !important;
        color: gold;
    }


    .badge-warning {
        background: rgb(244, 185, 77) !important;

    }

    .card {
        background-color: rgba(0, 0, 0, 0.5);
        /* 50% transparent blue */
    }


    .text-black {
        font-family: 'Montserrat', sans-serif;
        font-size: 1rem;

    }


    .text-warning {
        font-family: 'Montserrat', sans-serif;
        color: rgb(244, 185, 77) !important;
    }


    .text-white {
        font-family: 'Montserrat', sans-serif;

    }

    .card-text {
        font-family: 'Montserrat', sans-serif;


    }

    /* profile page margin top movies container */

    .custom-margin {
        margin-top: 100px;
    }
</style>

<body>

    <!-- Previous code... -->

    <div class="container custom-margin">
        <div class="row mb-3">
            <div class="col-md-4">
                <form action="" method="GET">
                    <select name="genre" class="form-control" onchange="this.form.submit()">
                        <option value="">All Movies</option> <!-- This line is the 'All' option -->
                        <?php 
                        while ($genreRow = mysqli_fetch_assoc($genreResult)) {
                            echo "<option value='" . $genreRow['genre'] . "'";
                            if(isset($selectedGenre) && $selectedGenre == $genreRow['genre']) {
                                echo " selected";
                            }
                            echo ">" . $genreRow['genre'] . "</option>";
                        }
                        ?>
                    </select>
                </form>
            </div>
        </div>

        <!-- Rest of the code... -->

        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 justify-content-center g-3">

            <?php
        while ($row = mysqli_fetch_assoc($result)) {
            $id = $row['id'];
            $genre = $row['genre'];
            $title = $row['title'];
            $description = $row['description'];
            $pic = $row['image'];
            $director = $row['director'];
            $trailer_url = $row['trailer_url'];
        ?>

            <div class="col mb-4">
                <div class="card">
                    <img class="card-img-top" style="height: 420px;" src='admin/images/<?php echo $row['image']; ?>'
                        alt='<?php echo $row['image']; ?>'>
                    <div class="card-body text-left">
                        <h5 class="card-title text-warning"><?= $title ?></h5>

                        <!-- Description Section -->
                        <div class="description-wrapper mb-3">
                            <p class="card-text short-description">
                                <?= substr($description, 0, 100) ?>...
                                <!-- Display only the first 100 chars or adjust as needed -->
                                <a href="#" class="show-more"><i class=" fas fa-angle-double-right"></i></a>
                            </p>
                            <p class="card-text full-description" style="display: none;">
                                <?= $description ?>
                                <a href="#" class="show-less"><i class="fas fa-angle-double-up"></i></a>
                            </p>
                        </div>

                        <!-- Genre & Director with Badges -->
                        <div class="mb-3">
                            <span class="badge badge-warning text-dark">
                                <?= htmlspecialchars($genre, ENT_QUOTES, 'UTF-8'); ?></span>
                        </div>
                        <div class="mb-3">
                            <span class="badge badge-dark text-warning">
                                <?= htmlspecialchars($director, ENT_QUOTES, 'UTF-8'); ?>
                            </span>
                        </div>

                        <!-- Book and Trailer links -->
                        <!-- Book and Trailer buttons -->
                        <div class="d-flex align-items-center justify-content-start mt-3">
                            <a href="#" class="btn btn-warning btn-sm mr-2" data-toggle="modal"
                                data-target="#bookingModal<?= $id ?>">Book Now</a>
                            <a href="<?= $trailer_url ?>" class="btn btn-secondary btn-sm" target="_blank">
                                Watch Trailer</a>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="bookingModal<?= $id ?>" tabindex="-1" role="dialog"
                    aria-labelledby="bookingModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <form id="bookingForm<?= $id ?>" action="confirmation.php" method="post">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="bookingModalLabel">Booking for <?= $title ?></h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="ticketCount">Number of Tickets</label>
                                        <input type="number" class="form-control" name="ticketCount" id="ticketCount"
                                            min="1" value="1" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="bookingDate">Date</label>
                                        <input type="date" class="form-control" name="bookingDate" id="bookingDate"
                                            required>
                                    </div>
                                    <div class="form-group">
                                        <label for="bookingTime">Time</label>
                                        <input type="time" class="form-control" name="bookingTime" id="bookingTime"
                                            required>
                                    </div>
                                    <input type="hidden" name="movieId" value="<?= $id ?>">
                                    <input type="hidden" name="username" value="<?= $_SESSION['username'] ?>">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Book Now</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>



            <?php
        }
        ?>

        </div>
    </div>

</body>


<!-- jQuery library -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>

<!-- Popper.js -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>

<!-- Bootstrap JS library -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<!-- Your custom script -->

<!-- Your custom script -->
<script>
    $(document).ready(function () {
        $('.show-more').on('click', function (e) {
            e.preventDefault();
            $(this).closest('.description-wrapper').find('.short-description').hide();
            $(this).closest('.description-wrapper').find('.full-description').show();
        });

        $('.show-less').on('click', function (e) {
            e.preventDefault();
            $(this).closest('.description-wrapper').find('.short-description').show();
            $(this).closest('.description-wrapper').find('.full-description').hide();
        });
    });
</script>
<script>
    function confirmBooking(movieId) {
        let form = document.getElementById("bookingForm" + movieId);
        let ticketCount = form.querySelector("#ticketCount").value;

        alert(`Successfully booked ${ticketCount} tickets for movie ID ${movieId}!`);

        // You can send a POST request here to process the booking in the backend if needed.

        // Close the modal after booking
        $('#bookingModal' + movieId).modal('hide');
    }
</script>

</body>

<?php
include 'footer.php';
?>

</html>