<?php
$nrplama = $_GET["nrp"];
include "koneksi.php";
if(isset($_POST["submit"])){

$nilai = $_POST["nilai"];

mysqli_query($conn,"UPDATE datamhs SET nilai='$nilai' WHERE nrp = $nrplama");
header("location: indexmhs.php");

mysqli_close($conn);
}
?>
