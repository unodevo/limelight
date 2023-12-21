<?php
include 'header.php';
?>

<style>
    body {
        background-image: url('images/bg11.jpg');
        background-size: cover;
        background-repeat: no-repeat;
        background-attachment: fixed;
        font-family: 'Montserrat', sans-serif;

    }

    .event-image-container img {
        height: 350px;
        width: 350px;
        object-fit: cover;
    }

    .bg-black {
        margin-top: 2rem !important;
    }

    .gold-icon {
        display: inline-block;
        width: 40px;
        /* Increased from 30px */
        height: 40px;
        /* Increased from 30px */
        border-radius: 50%;
        background-color: gold;
        text-align: center;
        line-height: 40px;
        /* Increased from 30px */
        vertical-align: middle;
        margin-right: 5px;
        font-size: 20px;
        /* New addition to increase the font size */
    }

    .carousel .card-img-top {
        height: 250px;
        object-fit: cover;
        object-position: top;
        /* This line ensures the top part of the image is shown */
        width: 100%;
        overflow: hidden;
    }

    #eventsCarousel {
        margin-bottom: 7rem !important;
    }
</style>
</head>

<body>

    <div class="container mt-5">
        <h1 class="mb-3">
            <span class="badge bg-black fs-3">Events coming up this month!</span>
        </h1>

        <h3 class="mb-5">
            <span>Get your ticket in advance and don't miss out!</span>
        </h3>


        <!-- Shrek Event -->
        <div class="card mb-4">
            <div class="row g-0">
                <div class="col-md-5">
                    <div class="event-image-container">
                        <img src="images/sherek.jfif" alt="Shrek" class="img-fluid">
                    </div>
                </div>
                <div class="col-md-7">

                    <div class="card-body">
                        <h3 class="card-title text-warning">Shrek</h3>
                        <p>
                            <span class="gold-icon"><i class="fas fa-info-circle"></i></span>
                            <strong>Description:</strong>
                            One of the greatest animated masterpieces is now back at the Limelight cinema venue.
                            Available from the 15th of January until the 1st of February. Recapture one of the most
                            thrilling experiences.
                        </p>

                        <p>
                            <span class="gold-icon"><i class="fas fa-ticket-alt"></i></span>
                            <strong>Booking:</strong> Perfect for families and animation enthusiasts. Tickets selling
                            fast, ensure you book early!
                        </p>

                        <p>
                            <span class="gold-icon"><i class="fas fa-calendar-alt"></i></span>
                            <strong>Date:</strong> 20th February 2023
                        </p>

                        <a class="btn btn-warning" href="#">Book now</a>
                    </div>


                </div>
            </div>
        </div>


        <!-- Spirited Away Event -->
        <div class="card mb-4">
            <div class="row g-0">
                <div class="col-md-5">
                    <div class="event-image-container">
                        <img src="images/spiritway.jpg" alt="Spirited Away" class="img-fluid">
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="card-body">
                        <h3 class="card-title text-warning">Spirited Away</h3>
                        <p>
                            <span class="gold-icon"><i class="fas fa-info-circle"></i></span>
                            <strong>Description:</strong>
                            Hayao Miyazaki's Japanese animated fairy tale film released in 2001. The
                            novel combines elements of medieval fantasy, contemporary romance, and paranormal realism.
                        </p>

                        <p>
                            <span class="gold-icon"><i class="fas fa-ticket-alt"></i></span>
                            <strong>Booking:</strong> Perfect for families and animation enthusiasts. Tickets selling
                            fast, ensure you book early!
                        </p>
                        <p>
                            <span class="gold-icon"><i class="fas fa-calendar-alt"></i></span>
                            <strong>Date:</strong> 20th February 2023
                        </p>
                        <a class="btn btn-warning" href="#">Book now</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Rock Live Event -->
        <div class="card mb-4">
            <div class="row g-0">
                <div class="col-md-5">
                    <div class="event-image-container">
                        <img src="images/music.jpg" alt="Rock Live" class="img-fluid">
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="card-body">
                        <h3 class="card-title text-warning">Rock Live</h3>
                        <p>
                            <span class="gold-icon"><i class="fas fa-info-circle"></i></span>
                            <strong>Description:</strong>
                            Relive top rock's most successful golden age. Return to the 1970s to enjoy
                            your favorite rock music and make new memories.</p>

                        <span class="gold-icon"><i class="fas fa-ticket-alt"></i></span>
                        <strong>Booking:</strong> Perfect for adults rock enthusiasts. Tickets selling
                        fast, ensure you book early!
                        </p>
                        <p>
                            <span class="gold-icon"><i class="fas fa-calendar-alt"></i></span>
                            <strong>Date:</strong> 20th February 2023
                        </p>
                        <a class="btn btn-warning" href="#">Book now</a>
                    </div>
                </div>
            </div>
        </div>

    </div>

   

    <?php
include 'footer.php';
?>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/5.0.0-beta3/js/bootstrap.min.js"></script>
</body>

</html>