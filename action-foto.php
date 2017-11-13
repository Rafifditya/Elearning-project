<?php
include 'koneksi.php';
$nrp = $_POST["nrp"];
   if(isset($_POST['submit'])){
      $errors= array();
      $file_name = $_FILES['image']['name'];
      $file_size = $_FILES['image']['size'];
      $file_tmp = $_FILES['image']['tmp_name'];
      $file_type = $_FILES['image']['type'];
      $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));

      $expensions= array("jpeg","jpg","png");

      if(in_array($file_ext,$expensions)=== false){
         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
      }

      if(empty($errors)==true) {
         move_uploaded_file($file_tmp,"img/mhs/".$file_name);
         $filepath = "img/mhs/".$file_name;
         $sql = "UPDATE datamhs SET image = '$filepath' WHERE nrp = '$nrp'";
         if(mysqli_query($conn, $sql)){
         header("location: indexmhs.php");
         }
      }else{
         print_r($errors);
      }
   }
?>
