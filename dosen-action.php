<?php
require_once 'koneksi.php';
if(isset($_POST["submit"])){

$nama = $_POST["nama"];
$nrp = $_POST["nrp"];
$password = md5($_POST["password"]);
if ($nama == admin) {
  $role_id = 1;
}
else {
  $role_id = 2;
}

$sql = "INSERT INTO dosen(nrp,nama,password,role_id) VALUES ('$nrp','$nama','$password','$role_id')";

if (mysqli_query($conn, $sql))
{
  header("location: login.php");
}
else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
}
?>
