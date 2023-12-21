<!DOCTYPE html>
<html>

<head>
   <title>Upload multiple files</title>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
   <form action="upload.php" method="POST" enctype="multipart/form-data">
      <label>Upload image</label>
      <input type="file" name="name" multiple="multiple"><br><br>
      <br>
      <input type="submit" value="Submit">
   </form>
</body>

</html>

<?php
$pic= $_FILES ['photo'] ['name'];
if (move_uploaded_file($_FILES['photo'] [temp_name], "images/" . $_FILES["photo"] ['name'])){
   echo "Uploaded";

}else{
   echo "File was not uploaded";
}

print_r ($_FILES);
echo '<br><img src="images/' . $_FILES ["photo"] ['name'] .'">';


$query = " insert into movies (image) values('$pic')";
$result = mysqli_query($con,$query);

$show_movie= "SELECT * movies";
$result = mysqli_query($con,$query);

while($row=mysqli_fetch_assoc($result))
{
   echo  '<br><img src="images/'. $row ['image'] .'">';
}

?>