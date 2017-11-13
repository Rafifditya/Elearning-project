<?php
require_once 'imk.php';
$target_dir = "Documents/";
$target_file = $target_dir . basename($_FILES["file"]["name"]);
$uploadOk = 1;
$FileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = filesize($_FILES["file"]["tmp_name"]);
    if($check !== false) {
        echo "File is a document" . $check["mime"] . ".<br>";
        $uploadOk = 1;
    }
	else {
        echo "File is not a document.<br>";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.<br>";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["file"]["size"] > 1000000) {
    echo "Sorry, your file is too large.<br>";
    $uploadOk = 0;
}
// Allow certain file formats
if($FileType != "doc" && $FileType != "docx" && $FileType != "pdf" && $FileType != "ppt" ) {
    echo "Sorry, only DOC, DOCX, PDF & PPT files are allowed.<br>";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.<br>";
// if everything is ok, try to upload file
}
else {
    $filetype = $_FILES["file"]["type"];
    $filesize = $_FILES["file"]["size"];

    if (move_uploaded_file($_FILES["file"]["tmp_name"], 'files/'.$_FILES['file']['name'])) {
        echo "The file ". basename( $_FILES["file"]["name"]). " has been uploaded.<br>";
		$nama_file = basename( $_FILES["file"]["name"]);
		$path_file = 'files/'.$nama_file;

		$sql2 = "INSERT INTO file(file,path_file,type_file,size_file) VALUES ('$nama_file','$path_file','$filetype','$filesize')";
		if(mysqli_query($conn, $sql2)){
		header("location: index-imk.php");
		}

	} else {
        echo "Sorry, there was an error uploading your file.";
    }

}
?>
