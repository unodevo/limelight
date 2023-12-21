<?php
    require_once("server.php");
if(isset($_GET['Del']))
         {
             $id = $_GET['Del'];
             $query = " delete from movies where id = '".$id."'";
             $result = mysqli_query($con,$query);
             echo "query";
             if($result)
             {
                 header("location:movies.php");
             }
             else
             {
                 echo ' Please Check Your Query ';
             }
        }
         else
         {
             header("location:movies.php");
         }

         ?>