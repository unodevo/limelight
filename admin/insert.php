<?php

    require_once("server.php");

    if(isset($_POST['submit']))
    {
        if(empty($_POST['username']) || empty($_POST['password']) || empty($_POST['dob']))
        {
            echo ' Please Fill in the Blanks ';
        }
        else
        {
            $username= $_POST['username'];
            $password = $_POST['password'];
            $dob = $_POST['dob'];

            $query = " insert into users (username, password, dob) values('$username','$password','$dob')";
            $result = mysqli_query($con,$query);



            

            if($result)
            {
                header("location:index.php");
            }
            else
            {
                echo '  Please Check Your Query insert ';
            }
        }
    }
    else
    {
        header("location:index.php");
    }



?>