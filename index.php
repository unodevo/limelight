<?php
include 'header.php';
?>

<style>
  body {
    background:
      linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)),

      url('images/cinema.jpg') no-repeat center center fixed;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
    margin-top: 50px
  }

  .carousel-item {
    max-height: 380px;

  }

  .show-more {
    color: gold;
    font-size: 1.2rem;
  }

  .show-less {
    color: gold;
    font-size: 1.2rem;
  }



  .popup {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
    z-index: 9999;
  }

  .popup-content {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background-color: #fff;
    padding: 20px;
    text-align: center;
  }

  h2 {
    margin-bottom: 10px;
  }

  button {
    padding: 10px 20px;
    background-color: #007bff;
    color: #fff;
    border: none;
    cursor: pointer;
  }

  button:hover {
    background-color: #0056b3;
  }

  .badge-warning {
    background: rgb(244, 185, 77) !important;

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




  .icon-card {
    background: none;
    /* Removes the default card background */
    border: none;
    /* Removes the default card border */
    margin-bottom: 30px;
  }

  .icon-circle {
    background-color: rgb(244, 185, 77);
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

  .card-title {
    color: rgb(244, 185, 77);
    font-family: 'Montserrat', sans-serif;

  }

  .card-text {
    color: white;
    margin-bottom: 3rem !important;
    font-family: 'Montserrat', sans-serif;

  }

  .divider {
    border-bottom: 1px solid rgb(244, 185, 77);
    /* change color as required */
    width: 100%;
    height: 0;
    margin: 20px 0;
    /* adjust spacing as needed */
  }
</style>

<body>


  <div class="d-flex-intro px-lg-5 text-center ">
    <br><br>
    <h2 class="mb-1 text-warning">Are member of Limelight cinema?</h2>
    <p class="mb-5 text-white">Sing Up today if you are student 20% discount!</p>

    <a class="btn btn-warning" href="register.php" role="button">Register</a>
    <a class="btn btn-dark" href="login.php" role="button">Login</a>
    <br><br><br>
  </div>

  <div class="d-flex">
    <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
      <!-- Carousel indicators -->
      <ol class="carousel-indicators">
        <li data-bs-target="#myCarousel" data-bs-slide-to="0" class="active"></li>
        <li data-bs-target="#myCarousel" data-bs-slide-to="1"></li>
        <li data-bs-target="#myCarousel" data-bs-slide-to="2"></li>
      </ol>

      <!-- Wrapper for carousel items -->
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="images/avt.jpg" class="d-block w-100" alt="Slide 1">
        </div>
        <div class="carousel-item">
          <img src="images/avatar4.jpg" class="d-block w-100" alt="Slide 2">
        </div>

        <div class="carousel-item">
          <img src="images/avatar1.jpg" class="d-block w-100" alt="Slide 3">
        </div>
      </div>

      <!-- Carousel controls -->
      <a class="carousel-control-prev" href="#myCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon"></span>
      </a>
      <a class="carousel-control-next" href="#myCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon"></span>
      </a>
    </div>
  </div>



  <div class="container-fluid">
    <div class="container py-3">
      <h2 class="card-text text-warning">Enjoy the comfortable seats at Limelight cinema</h2>
      <h3 class="badge badge-success text-white">Book now every film for 7.50</ph3>

    </div>
    <?php
$con = mysqli_connect('localhost', 'u903839165_updevo', 'LKND,Lhdk8799#', 'u903839165_updevo');

$query = "SELECT * FROM movies";
$result = mysqli_query($con, $query);

?>
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
              <p class="card-text text-white short-description">
                <?= substr($description, 0, 100) ?>...
                <!-- Display only the first 100 chars or adjust as needed -->
                <a href="#" class="show-more"><i class=" fas fa-angle-double-right"></i></a>

              </p>
              <p class="card-text text-white full-description" style="display: none;">
                <?= $description ?>
                <a href="#" class="show-less"><i class="fas fa-angle-double-up"></i></a>
              </p>
            </div>

            <!-- Genre & Director with Badges -->
            <div class="mb-3">
              <span class="badge badge-warning text-black">
                <?= htmlspecialchars($genre, ENT_QUOTES, 'UTF-8'); ?></span>

            </div>
            <div class="mb-3">
              <span class="badge badge-warning text-black">Director:
                <?= htmlspecialchars($director, ENT_QUOTES, 'UTF-8'); ?>
              </span>
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

  <div class="container mt-5">
    <h2 class="mb-1 text-center text-warning">LimeLight Cinema's Premier Amenities</h2>
    <div class="divider"></div>
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

  <!-- Pop-up for cookies consent -->
  <div id="cookies-popup" class="popup">
    <div class="popup-content">
      <h2>Cookies Consent</h2>
      <p>This website uses cookies to enhance user experience. By using this site, you consent to the use of
        cookies in accordance with our <a href="privacy.html">Privacy Policy</a>.</p>
      <button onclick="acceptCookies()">I Accept</button>
    </div>
  </div>

  <!-- Rest of your website content goes here... -->

  <script src="script.js"></script>

</body>

<?php
include 'footer.php';
?>

</html>