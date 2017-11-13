<?php
require_once 'koneksi.php';
if(isset($_POST["submit"])){

$nama = $_POST["nama"];
$nrp = $_POST["nrp"];
$gender = $_POST["gender"];
$agama = $_POST["agama"];
$jurusan = $_POST["jurusan"];
$program = $_POST["program"];
$kelas = $_POST["kelas"];
$umur  = $_POST["umur"];
$alamat = $_POST["alamat"];
$tempat = $_POST["tempat"];
$tanggal = $_POST["tanggal"];
$password = md5($_POST["password"]);
$role = 0;

$sql = "INSERT INTO datamhs(nrp,nama,password,jurusan,program,kelas,gender,agama,umur,alamat,tempat_lahir,tanggal_lahir,role_id) VALUES ('$nrp','$nama','$password','$jurusan','$program','$kelas','$gender','$agama','$umur','$alamat','$tempat','$tanggal','$role')";

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
