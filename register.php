<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST["name"];
    $dob = $_POST["dob"];
    $password = $_POST["password"];

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $con = mysqli_connect('localhost', 'u903839165_updevo', 'LKND,Lhdk8799#', 'u903839165_updevo');
    
    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    }
    
    $stmt = $con->prepare("INSERT INTO userslog (username, dob, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $username, $dob, $hashedPassword);

    if ($stmt->execute()) {
        header("Location: login.php");
        exit;
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $con->close();
}
?>

<?php
include 'header.php';
?>
<style>
    html,
    body {
        height: 100%;
        margin: 0;
        padding: 0;
        overflow: hidden;
        /* Prevent scroll */
    }

    .full-page-cover {
        width: 100vw;
        /* Full viewport width */
        height: 100vh;
        /* Full viewport height */
        background-image: url('images/bg2.jpg');
        background-size: cover;
        background-position: center center;
    }

    .container .py-5 {
        margin-bottom: 5rem !important;
    }
</style>

<body>

    <div class="full-page-cover">
        <div class="container py-5 h-160">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-7 mt-5">
                    <div class="card" style="border-radius: 1rem;">
                        <div class="row g-0">
                            <div class="col-md-6 d-flex align-items-center">
                                <div class="card-body p-4 p-lg-5 text-black">
                                    <form action="register.php" method="post">
                                        <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Register as new
                                            Member
                                        </h5>
                                        <div class="form-outline mb-4">
                                            <input type="text" name="name" class="form-control" required>
                                            <label class="form-label" for="form2Example17">Username</label>
                                        </div>
                                        <div class="form-outline mb-4">
                                            <input type="password" name="password" class="form-control" required>
                                            <label class="form-label" for="form2Example27">Password</label>
                                        </div>

                                        <!-- Date of Birth Field -->
                                        <div class="form-outline mb-4">
                                            <input type="date" name="dob" class="form-control" required>
                                            <label class="form-label" for="dob">Date of Birth</label>
                                        </div>

                                        <div class="pt-1 mb-4">
                                            <button type="submit" class="btn btn-primary"
                                                value="Register">Register</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>
</body>

</html>