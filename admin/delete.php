<?php
    require_once("server.php");
if(isset($_GET['Del']))
         {
             $id = $_GET['Del'];
             $query = " delete from users where id = '".$id."'";
             $result = mysqli_query($con,$query);
             echo "query";
             if($result)
             {
                 header("location:index.php");
             }
             else
             {
                 echo ' Please Check Your Query ';
             }
        }
         else
         {
             header("location:index.php");
         }

         ?>