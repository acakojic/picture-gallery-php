<?php
$page_title = "Add pictures";


if (isset ($_SESSION['username'])){
    header('location: index.php');
}
else{

    include 'mysqli_connect.php';

    include 'includes/header.html';

    include 'includes/navbar.html';

    include 'includes/navbar_pictures.html';

?>

<div class="container">
    <div class="container-left">
        <form action="" method="POST" enctype="multipart/form-data">
            <input type="file" name="fileToUpload" accept="uploads/*" onchange="loadPicture(event)"> <br>
            <input type="submit" value="Add picture">
        </form>
    </div>
    <br>
    <div class="new-picture">
        <img id="showPicture">
    </div>

<?php

$target_dir = "uploads/";

if (!empty ($_FILES["fileToUpload"]["name"])){
   echo "fileToUpload " . $_FILES["fileToUpload"]["name"] . "<br>";
   $target_file = $target_dir . basename ($_FILES["fileToUpload"]["name"]);
   $uploadOk = 1;
   $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
   // Check if image file is a actual image or fake image
   if(isset($_POST["submit"])) {
       $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
       if($check !== false) {
           echo "File is an image - " . $check["mime"] . ".";
           $uploadOk = 1;
       } else {
           echo "File is not an image.";
           $uploadOk = 0;
       }
   }
   // Check if file already exists
   if (file_exists($target_file)) {
       echo "Sorry, file already exists.";
       $uploadOk = 0;
   }
   // Check file size
   if ($_FILES["fileToUpload"]["size"] > 500000) {
       echo "Sorry, your file is too large.";
       $uploadOk = 0;
   }
   // Allow certain file formats
   if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
       echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
       $uploadOk = 0;
   }
   // Check if $uploadOk is set to 0 by an error
   if ($uploadOk == 0) {
       echo "Sorry, your file was not uploaded.";
       // if everything is ok, try to upload file
   } else {
       if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
           $picture_name = basename ($_FILES['fileToUpload']['name']);
           echo "The file ". $picture_name . " has been uploaded.";
           $username = $_SESSION['username'];
           $sql1 = "SELECT users_id FROM users WHERE users_username = '{$username}'";
           $result1 = mysqli_query ($connection, $sql1) or die (mysqli_error ($connection));

           if (mysqli_num_rows ($result1) > 0){
               while ($row = mysqli_fetch_assoc ($result1)){
                   $users_id = $row['users_id'];
                   $sql2 = "INSERT INTO pictures (pictures_name, id_users) VALUES ('{$picture_name}', '{$users_id}')";
                   $result2 = mysqli_query ($connection, $sql2) or die (mysqli_error ($connection));
                   if ($result2){
                       echo "New picture has added!";
                   }
                   else{
                       echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                   }
               }
           }
       }
       else {
           echo "Sorry, there was an error uploading your file.";
       }
   }
}//end of first if (!empty ($_FILES["fileToUpload"]["name"]){

mysqli_close ($connection);
unset ($connection);

}
?>

<script src="javascript/index.js"></script>

<?php

include 'includes/footer.html';

?>
