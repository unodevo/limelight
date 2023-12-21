<?php 

    require_once("server.php");
    

    $id = $_GET['GetID'];
    $query = " select * from movies where id='".$id."'";
    $result = mysqli_query($con,$query);
    while($row=mysqli_fetch_assoc($result))
    {
        $id= $row['id'];
        $trailer_url= $row['trailer_url'];
        $genre =$row['genre'];
        $title = $row['title'];
        $description = $row['description'];
        $pic= $row['image'];
        $director= $row['director'];
        $stock= $row['stock'];

       


    }

    
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
</head>

<body>
    <h3 class="display-4">edit movie</h3>


    <body class="bg-dark">

        <div class="container">
            <div class="row">
                <div class="col-lg-6 m-auto">
                    <div class="card mt-5">
                        <div class="card-title">
                            <h3 class="bg-success text-white text-center py-3">Edit Movie</h3>
                        </div>
                        <div class="card-body">

                            <form action="update_edit.php?id=<?php echo $id?>" method="post">
                                <select class="form-control mb-2" class="form-select" type="text" placeholder="genre"
                                    name="genre" value="<?php echo $genre ?>">
                                    <option selected>Select Genre</option>
                                    <option value="Drama">Drama</option>
                                    <option value="Horror">Horror</option>
                                    <option value="Comedy">Comedy</option>
                                    <option value="Triller">Triller</option>
                                    <option value="Action">Action</option>
                                    <option value="Fantasy">Fantasy</option>
                                    <option value="Animation">Animation</option>

                                </select>

                                <!-- Add the input field for the movie trailer URL -->
                                <div class="mb-3">
                                    <label for="trailer_url" class="form-label">Movie Trailer URL</label>
                                    <input type="text" class="form-control" name="trailer_url" id="trailer_url"
                                        placeholder="Enter YouTube video ID or URL">
                                </div>

                                <input type="text" class="form-control mb-2" placeholder="title" name="title"
                                    value="<?php echo $title ?>">
                                <input type="text" class="form-control mb-2" placeholder="description"
                                    name="description" value="<?php echo $description ?>">


                                <input type="text" class="form-control mb-2" placeholder="image name" name="image"
                                    value="<?php echo $pic ?>">

                                <input type="text" class="form-control mb-2" placeholder="director" name="director"
                                    value="<?php echo $director ?>">

                                <input type="int" class="form-control mb-2" placeholder="number stock" name="stock"
                                    value="<?php echo $stock ?>">
                                <button class="btn btn-primary" name="update">Update</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </body>

</html>

</html>