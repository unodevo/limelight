<?php 
include 'header.php'; 

$isLoggedIn = isset($_SESSION['username']);

$con = mysqli_connect('localhost', 'u903839165_updevo', 'LKND,Lhdk8799#', 'u903839165_updevo');
$genreFilter = " WHERE genre IN ('Animation', 'Comedy', 'Fantasy')"; // Default to showing these genres
if (isset($_GET['genre']) && $_GET['genre'] != "") {
    $selectedGenre = mysqli_real_escape_string($con, $_GET['genre']); // Prevent SQL injection
    $genreFilter = " WHERE genre = '$selectedGenre'";
}

// The query to populate the dropdown remains the same
$genreQuery = "SELECT DISTINCT genre FROM movies WHERE genre IN ('Animation', 'Comedy', 'Fantasy')";
$genreResult = mysqli_query($con, $genreQuery);

$query = "SELECT * FROM movies" . $genreFilter;
$result = mysqli_query($con, $query);
?>


<body>
    <style>
        body {
            background-color: red !important;
            /* This will make the entire background red */
        }

        body {
            background:
                linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)),
                url('images/poster.jpg') no-repeat center center fixed;
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

        .show-more {
            color: gold;
            font-size: 1.2rem;
        }

        .show-less {
            color: gold;
            font-size: 1.2rem;
        }


        .quiz {
            background: white;
            margin-top: 50px;
        }

        .quiz .container-fluid {
            margin-top: 50px;
        }

        .question {
            margin-bottom: 20px;
        }

        .centered {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .img-wrapper {
            position: relative;
            overflow: hidden;
        }

        .img-wrapper:hover::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(255, 255, 255, 0.3);
            /* This is a white overlay with 30% opacity */
            z-index: 1;
        }

        .card {
            border: none;
        }

        .card {
            background-color: rgba(0, 0, 0, 0.5);
            /* 50% transparent blue */
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



        .text-dark {
            font-family: 'Montserrat', sans-serif;

        }

        .text-warning {
            font-family: 'Montserrat', sans-serif;

        }

        .card-text {
            font-family: 'Montserrat', sans-serif;
            color: white;
        }

        .text-black {
            font-family: 'Montserrat', sans-serif;
            font-size: 1rem;

        }

        .card-title {
            font-family: 'Montserrat', sans-serif;
            font-size: 1.2rem;
            color: white;
        }


        .badge-warning {
            background: rgb(244, 185, 77) !important;

        }


        .icon-card {
            background: none;
            /* Removes the default card background */
            border: none;
            /* Removes the default card border */
        }

        .icon-circle {
            background-color: rgba(226, 255, 5, 0.5);
            color: white;
            /* Color of the icon */
            border-radius: 50%;
            /* Makes it a circle */
            width: 100px;
            height: 100px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto;
            /* Centering it horizontally */
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

        /* form background */

        .opaque-black-bg {
            background-color: rgba(0, 0, 0, 0.7);
        }

        /* top margin movies container*/
        .custom-margin {
            margin-top: 100px;
        }
    </style>




    <body>

        <div class="container custom-margin">
            <div class="row mb-3">
                <div class="col-md-4">
                    <form action="" method="GET" class="opaque-black-bg">
                        <select name="genre" class="form-control" onchange="this.form.submit()">
                            <option value="">All Movies</option>
                            <?php 
                        while ($genreRow = mysqli_fetch_assoc($genreResult)) {
                            echo "<option value='" . $genreRow['genre'] . "'";
                            if(isset($selectedGenre) && $selectedGenre == $genreRow['genre']) {
                                echo " selected";
                            }
                            echo ">" . ucfirst($genreRow['genre']) . "</option>"; // ucfirst is used to capitalize the first letter
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
                                <p class="card-text  text-white short-description">
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
                            <div class="mb-1">
                                <p class=" badge badge-warning text-black">
                                    <?= htmlspecialchars($genre, ENT_QUOTES, 'UTF-8'); ?>
                                </p>
                            </div>
                            <div class="mb-1">
                                <p class=" badge badge-warning text-black">

                                    <?= htmlspecialchars($director, ENT_QUOTES, 'UTF-8'); ?>

                                </p>
                            </div>

                            <!-- Book and Trailer links -->
                            <!-- Book and Trailer buttons -->
                            <div class="d-flex align-items-center justify-content-start mt-3">

                                <a href="<?= $trailer_url ?>" class="btn btn-secondary btn-sm" target="_blank">
                                    Watch Trailer</a>
                            </div>
                        </div>
                    </div>

                </div>

                <?php
        }
        ?>

            </div>
        </div>


        </div>


        <div class="quiz container-fluid  centered">
            <h2 class="mb-5">Shazam! Movie Quiz</h2>
            <form id="shazamQuiz" class="w-50">
                <div class="question">
                    <p>1. Who is the main character in the movie Shazam!?</p>
                    <input type="radio" name="q1" value="a"> Superman<br>
                    <input type="radio" name="q1" value="b"> Batman<br>
                    <input type="radio" name="q1" value="c"> Billy Batson<br>
                    <input type="radio" name="q1" value="d"> Joker<br>
                </div>

                <div class="question">
                    <p>2. What does Billy need to shout to transform?</p>
                    <input type="radio" name="q2" value="a"> Alohomora!<br>
                    <input type="radio" name="q2" value="b"> Expelliarmus!<br>
                    <input type="radio" name="q2" value="c"> Abracadabra!<br>
                    <input type="radio" name="q2" value="d"> Shazam!<br>
                </div>

                <div class="question">
                    <p>3. Who is the villain in the movie?</p>
                    <input type="radio" name="q3" value="a"> Dr. Thaddeus Sivana<br>
                    <input type="radio" name="q3" value="b"> Two-Face<br>
                    <input type="radio" name="q3" value="c"> The Riddler<br>
                    <input type="radio" name="q3" value="d"> Penguin<br>
                </div>

                <div class="question">
                    <p>4. How many symbols did Dr. Sivana need to unlock the door?</p>
                    <input type="radio" name="q4" value="a"> 5<br>
                    <input type="radio" name="q4" value="b"> 6<br>
                    <input type="radio" name="q4" value="c"> 7<br>
                    <input type="radio" name="q4" value="d"> 8<br>
                </div>

                <div class="question">
                    <p>5. Who plays the character Shazam?</p>
                    <input type="radio" name="q5" value="a"> Zachary Levi<br>
                    <input type="radio" name="q5" value="b"> Dwayne Johnson<br>
                    <input type="radio" name="q5" value="c"> Chris Hemsworth<br>
                    <input type="radio" name="q5" value="d"> Robert Downey Jr.<br>
                </div>



                <div class="text-center mt-4 mb-5">
                    <input type="button" class="btn btn-primary btn-lg" value="Submit" onclick="checkAnswers()">
                </div>
        </div>
        </form>

        <div class="container mt-5">
            <div class="row">
                <!-- Card 1: IMAX Experience -->
                <div class="col-md-4">
                    <div class="icon-card my-3 text-center">
                        <div class="icon-circle">
                            <i class="fas fa-film fa-3x"></i>
                        </div>
                        <h5 class="card-title mt-3">IMAX Experience</h5>
                        <p class="card-text">Enjoy movies in an immersive IMAX format, offering unparalleled picture and
                            sound quality.</p>
                    </div>
                </div>

                <!-- Card 2: Premium Seating -->
                <div class="col-md-4">
                    <div class="icon-card my-3 text-center">
                        <div class="icon-circle">
                            <i class="fas fa-couch fa-3x"></i>
                        </div>
                        <h5 class="card-title mt-3">Premium Seating</h5>
                        <p class="card-text">Relax in our luxurious, reclining seats, ensuring the utmost comfort
                            throughout your movie experience.</p>
                    </div>
                </div>

                <!-- Card 3: Snack Bar -->
                <div class="col-md-4">
                    <div class="icon-card my-3 text-center">
                        <div class="icon-circle">
                            <i class="fas fa-hamburger fa-3x"></i>
                        </div>
                        <h5 class="card-title mt-3">Snack Bar</h5>
                        <p class="card-text">Our snack bar offers a wide range of treats to enhance your movie-watching
                            experience.</p>
                    </div>
                </div>
            </div>
        </div>




        <script>
            function checkAnswers() {
                let score = 0;

                const q1 = document.querySelector('input[name="q1"]:checked').value;
                if (q1 === "c") score++;

                const q2 = document.querySelector('input[name="q2"]:checked').value;
                if (q2 === "d") score++;

                const q3 = document.querySelector('input[name="q3"]:checked').value;
                if (q3 === "a") score++;

                const q4 = document.querySelector('input[name="q4"]:checked').value;
                if (q4 === "c") score++;

                const q5 = document.querySelector('input[name="q5"]:checked').value;
                if (q5 === "a") score++;

                document.getElementById("score").innerText = score;
                document.getElementById("results").style.display = "block";
            }
        </script>

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
    </body>

    <?php
include 'footer.php';
?>

    </html>