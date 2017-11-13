<?php
include "koneksi.php";
$nrplama = $_GET["nrp"];
$kons  = $_GET["kons"];

if(isset($_POST["submit"])){

$nama = $_POST["nama"];
$gender = $_POST["gender"];
$agama = $_POST["agama"];
if ($kons == 0) {
  $jurusan = $_POST["jurusan"];
  $program = $_POST["program"];
  $kelas = $_POST["kelas"];
  $umur  = $_POST["umur"];
} else {
  $matakuliah = $_POST["matakuliah"];
}
$alamat = $_POST["alamat"];
$tempat = $_POST["tempat"];
$tanggal = $_POST["tanggal"];


if ($kons == 0) {
  mysqli_query($conn,"UPDATE datamhs SET nama='$nama',jurusan='$jurusan',kelas='$kelas',program='$program',gender='$gender',umur='$umur',agama= '$agama',alamat= '$alamat', tanggal_lahir='$tanggal',tempat_lahir= '$tempat' WHERE nrp = $nrplama");
  header("location: indexmhs.php");
} else {
  mysqli_query($conn,"UPDATE dosen SET nama='$nama',gender='$gender',matakuliah='$matakuliah',agama='$agama',alamat='$alamat', tanggal_lahir='$tanggal',tempat_lahir='$tempat' WHERE nrp = $nrplama");
  header("location: indexmhs.php");
}

mysqli_close($conn);
}
?>
