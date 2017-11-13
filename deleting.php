  <?php
  require_once 'koneksi.php';
  $nrp = $_GET["nrp"];
  $sql = "DELETE FROM datamhs WHERE nrp = $nrp";

      if (mysqli_query($conn, $sql))
      {
        header("location: indexmhs.php");
      }
      else
      {
        $color = "red";
          $pesan = "Gagal, Error : " . mysqli_error($conn);
      }

  mysqli_close($conn);

  ?>
