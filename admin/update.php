<?php 

    require_once("server.php");

    if(isset($_POST['update']))
    {

        $id= $_GET['id'];
        $username= $_POST['username'];
        $password = $_POST['password'];
        $dob = $_POST['dob'];

        $query = " update users set username = '".$username."', password='".$password."',dob='".$dob."' where id ='".$id."'";
        $result = mysqli_query($con,$query);



        if($result)
        {
            header("location:index.php");
        }
        else
        {
            echo ' Please Check Your Query updates ';
        }
    }
    else
    {
        header("location:index.php");
    }


?>