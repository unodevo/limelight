<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Limelight main</title>
  <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
  <link
    href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;700&amp;family=Montserrat:ital,wght@1,100;1,300&amp;display=swap"
    rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <script src="https://kit.fontawesome.com/e524ad7d5a.js" crossorigin="anonymous"></script>


  <!-- stylesheet -->
  <link rel="stylesheet" href="style/style.css">


</head>

<style>
  .carousel-item {
    max-height: 380px;

  }
</style>

<body>

  <nav class="navbar navbar-expand-lg bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.html">Limelight</a>
      <button class="navbar-toggler " type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon "></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">

          <li class="nav-item">
            <a class=" nav-link" href="about.php">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="contacts.php">Contacts</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="events.php">Events</a>
          </li>
        </ul>
        <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
          <ul class="navbar-nav ">
            <li class="nav-item">
              <a class="nav-link" href="admin_login.php">admin</a>
            </li>

          </ul>
        </div>
      </div>
    </div>
  </nav>
  <!-- Header-->

  <header class="masthead d-flex align-items-center bg-dark">
    <div class="container px-4 px-lg-5 text-center ">
      <br><br>
      <h2 class="mb-1 text-warning">Are member of Limelight cinema?</h2>
      <p class="mb-5 text-white">Sing Up today if you are student 20% discount!</p>

      <a class="btn btn-warning" href="register.php" role="button">Register</a>
      <a class="btn btn-success" href="login.php" role="button">Login</a>
      <br><br><br>
    </div>
  </header>
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



  <div class="container-fluid bg-dark">
    <div class="container py-3">
      <h2 class="card-text text-warning">
        Movies out now!
      </h2>
      <p class="text-white">Enjoy the comfortable seats at Limelight cinema</p>
      <p class="text-warning">Book now every film for 7.50</p>

    </div>

    <?php 
include('includes/header.php');
require_once("server.php");



$query = " select * from movies";
$result = mysqli_query($con,$query);



$id = $row['id'];
$genre = $row['genre'];
$title = $row['title'];
$description = $row['description'];
$pic = $row['image'];
$stock = $row['stock'];
$director = $row['director'];




?>


    <div class="container-lg bg-dark">
      <div class=" row">

        <?php

while($row=mysqli_fetch_assoc($result))
{

$id = $row['id'];
$genre = $row['genre'];
$title = $row['title'];
$description = $row['description'];
$pic = $row['image'];
$stock = $row['stock'];
$director = $row['director'];
?>



        <div class="col-md-4 col-lg-3">

          <div class="container-movie bg-dark">
            <img class="img-fluid " style="height: 420px;" src='admin/images/<?php echo $row ['image']; ?>'
              alt='<?php echo $row ['image']; ?>'>

            <div class="card-body">
              <br>
              <a class="btn btn-warning" href="register.php" role="button">Book now</a>
              <br>
              <br>
              <h5 class="card-title text-warning"><?php echo $title?></h5>
              <p class="badge bg-dark text-warning">
                <?php echo $genre?>
              </p>
              <p class="card-text text-secondary">
                Director: <?php echo $director?>
              </p>

              <p class="card-text text-white">
                <?php echo $description?>
              </p>
              <br>
            </div>

          </div>

        </div>

        <?php
}

?>



      </div>

    </div>
  </div>

  <!-- Remove the container if you want to extend the Footer to full width. -->

  <!-- Footer -->
  <footer class="text-center text-lg-start text-warning" style="background-color: #1b1c1d">
    <!-- Grid container -->
    <div class="container p-4 pb-0">
      <!-- Section: Links -->
      <section class="">
        <!--Grid row-->
        <div class="row">
          <!-- Grid column -->
          <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
            <h6 class="text-uppercase mb-4 font-weight-bold">
              Limelight
            </h6>
            <p>
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Officiis!
            </p>
          </div>
          <!-- Grid column -->

          <hr class="w-100 clearfix d-md-none" />

          <!-- Grid column -->
          <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mt-3">
            <h6 class="text-warning mb-4 font-weight-bold">USEFUL LINKS</h6>
            <p>
              <a href="about.php" class="text-reset">About</a>
            </p>
            <p>
              <a href="contacts.php" class="text-reset">Contacts</a>
            </p>
            <p>
              <a href="index.php" class="text-reset">Movies</a>
            </p>
            <p>
              <a href="events.php" class="text-reset">Events</a>
            </p>
          </div>
          <!-- Grid column -->

          <hr class="w-100 clearfix d-md-none" />

          <!-- Grid column -->
          <hr class="w-100 clearfix d-md-none" />

          <!-- Grid column -->
          <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mt-3">
            <h6 class="text-uppercase mb-4 font-weight-bold">Contact</h6>
            <p><i class="fas fa-home mr-3"></i> Edinburgh</p>
            <p><i class="fas fa-envelope mr-3"></i> limelight@gmail.com</p>
            <p><i class="fas fa-phone mr-3"></i> + 01 234 567 88</p>
            <p><i class="fas fa-print mr-3"></i> + 01 234 567 89</p>
          </div>
          <!-- Grid column -->

          <!-- Grid column -->
          <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mt-3">
            <h6 class="text-uppercase mb-4 font-weight-bold">Follow us</h6>

            <!-- Facebook -->
            <a class="btn btn-warning btn-floating m-1" href="#!" role="button"><i class="fab fa-facebook-f"></i></a>

            <!-- Twitter -->
            <a class="btn btn-warning btn-floating m-1" href="#!" role="button"><i class="fab fa-twitter"></i></a>

            <!-- Google -->


            <!-- Instagram -->
            <a class="btn btn-warning btn-floating m-1" href="#!" role="button"><i class="fab fa-instagram"></i></a>



          </div>
        </div>
        <!--Grid row-->
      </section>
      <!-- Section: Links -->
    </div>
    <!-- Grid container -->

    <!-- Copyright -->
    <div class="bg-warning text-center text-dark p-3">
      © 2023 Copyright:Limelight</a>
    </div>
    <!-- Copyright -->
  </footer>
  <!-- Footer -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
  </script>
</body>

</html>