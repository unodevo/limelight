

<?php 
session_start();


include('includes/header.php');
$con = mysqli_connect('localhost', 'u903839165_updevo', 'LKND,Lhdk8799#', 'u903839165_updevo');
$query = "SELECT * FROM userslog"; // Corrected query
$result = mysqli_query($con,$query);
?>


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
  <link rel="stylesheet" href="../style/style.css">

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">



</head>





<body>

  <div class="w3-sidebar w3-bar-block w3-black" style="width:50px">
    <a href="../index.php" class="w3-bar-item w3-button"><i class="fa fa-home checked"></i></a>

    <a href="index.php" class="w3-bar-item w3-button"><i class="fa fa-users checked"></i></a>
    <a href="movies.php" class="w3-bar-item w3-button"><i class="fa fa-film checked"></i></a>
    <a href="logout.php" class="w3-bar-item w3-button"><i class="fa fa-sign-out checked"></i></a>

  </div>



  <!-- Header-->

  <body class="bg-dark">
    <div class="container p-3">
      <h2 class="mb-1 text-warning">Users Panel</h2>
      <p class="mb-1 text-white">Admin</p>



      <div class="row">
        <div class="col m-auto">
          <div class="card mt-5 bg-dark">
            <table class="table table-dark text-grey">
              <tr>
                <td> User ID </td>
                <td> Username</td>
                <td> Password </td>
                <td> Date of birth</td>
                <td> Edit </td>
                <td> Delete </td>
              </tr>
              <?php 

                                    while($row=mysqli_fetch_assoc($result))
                                    {
                                        $id = $row['id'];
                                        $username = $row['username'];
                                        $password = $row['password'];
                                        $dob = $row['dob'];
                            ?>
              <tr>
                <td type="hidden" name="id">#</td>
                <!--  <td><?//php echo $UserID ?></td>-->
                <td><?php echo $username?></td>
                <td><?php echo  $password?></td>
                <td><?php echo $dob?></td>
                <td> <a class="btn btn-secondary" href="edit.php?GetID=<?php echo $id?>">Edit</a></td>
                <td><a class="btn btn-warning" href="delete.php?Del=<?php echo $id?>">Delete</a></td>

              </tr>

              <?php 
                                    }  
                            ?>

              <td> <a class="btn btn-success" href="add.php">Add new</a></a></td>
            </table>

          </div>
          <br><br>
        </div>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
          integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
        </script>
  </body>


</html>