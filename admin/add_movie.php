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
    <br>
    <div class="text-center">
        <h2 class="text-success">Add movie</h2>
    </div>

    <body class="bg-dark">

        <div class="container">
            <div class="row">
                <div class="col-lg-6 m-auto">
                    <div class="card mt-5">
                        <div class="card-title">
                            <h3 class="bg-success text-white text-center py-3">Add new Movie</h3>
                        </div>
                        <div class="card-body">

                            <form action="insert-new.php" method="post">

                        </div> <input type="text" class="form-control mb-2" placeholder="image" name="image">
                        <select class="form-select" type="text" class="form-control mb-2" placeholder="genre"
                            name="genre">
                            <option selected>Select Genre</option>
                            <option value="Drama">Drama</option>
                            <option value="Horror">Horror</option>
                            <option value="Comedy">Comedy</option>
                            <option value="Triller">Triller</option>
                            <option value="Action">Action</option>
                            <option value="Fantasy">Fantasy</option>
                            <option value="Animation">Animation</option>
                        </select>
                        <input type="text" class="form-control mb-2" placeholder="title" name="title">
                        <input type="int" class="form-control mb-2" placeholder="stock" name="stock">
                        <input type="text" class="form-control mb-2" placeholder="description" name="description">
                        <input type="text" class="form-control mb-2" placeholder="director" name="director">

<!-- Add the input field for the movie trailer URL -->
<div class="mb-3">
    <label for="trailer_url" class="form-label">Movie Trailer URL</label>
    <input type="text" class="form-control" name="trailer_url" id="trailer_url" placeholder="Enter YouTube video ID or URL">
</div>


                        <button class="btn btn-primary" name="submit">Submit</button>
                        </form>


                    </div>
                </div>
            </div>
        </div>
        </div>

    </body>

</html>