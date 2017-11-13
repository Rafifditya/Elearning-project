<?php
include "koneksi.php";
$nrplama = $_GET["nrp"];


$warn = 1;

mysqli_query($conn,"INSERT INTO massage(warning_type,nrp) VALUES ('$warn','$nrplama')");
header("location: indexmhs.php");

mysqli_close($conn);

?>
