<?php
include 'koneksi.php';
session_start();
$_SESSION['username'];

$nrps = $_SESSION['username'];
$cek = $_SESSION['cek'];
//Ambil data
if ($cek == 1) {
	$cariMhs = mysqli_query($conn, "SELECT * FROM dosen WHERE nrp='$nrps'");
	$dataMhs = mysqli_fetch_array($cariMhs);
} else {
	$cariMhs = mysqli_query($conn, "SELECT *FROM datamhs WHERE nrp='$nrps'");
	$dataMhs = mysqli_fetch_array($cariMhs);
}



	if(!isset($_SESSION['username']))
	{
		echo "
			<h3>Anda belum login!</h3>
			<script>
				setTimeout(function(){window.location='login.php'}, 1000);
			</script>
		";
	} else {

?>
<!DOCTYPE html>
<html>
<head>
      <link rel="stylesheet" href="pure/pure-min.css">
      <link rel="stylesheet" href="pure/buttons-min.css">
      <link rel="stylesheet" href="pure/grids-responsive-min.css">
      <link rel="stylesheet" href="font-awesome/css/font-awesome.css">
      <link rel="stylesheet" href="css/modal.css">
      <link rel="stylesheet" href="css/normalize.css">
			<link rel="stylesheet" href="css/indexmhs.css">
			<link rel="stylesheet" href="css/skeleton.css">
  <title>E - Leaps</title>
</head>
    <body>

			<div class="header">
					<div class="home-menu pure-menu pure-menu-horizontal pure-menu-fixed">
						<ul class="pure-menu-list"><li class="pure-menu-item pure-menu-heading" padding-right="2000px">
							<a class="pure-menu-heading" href="indexmhs.php"><i class="fa fa-rocket" aria-hidden="true"></i> E - Leaps</a></li>
								<li class="pure-menu-item"><a href="indexmhs.php" class="pure-menu-link"><i class="fa fa-home fa-lg" aria-hidden="true"></i> Home</a></li>

								</li>
								<?php if ($dataMhs['role_id'] == 0) { ?>
								<li class="pure-menu-item pure-menu-has-chilldren pure-menu-allow-hover">
									<a href="#" class="pure-menu-link"><i class="fa fa-book" aria-hidden="true"></i> E - Learning Module</a>
									<ul class="pure-menu-children">
										<?php if (!empty($dataMhs['nama_file'])) { ?>
										<li class="pure-menu-item"><a href="ganti.php" class="pure-menu-link"><i class="fa fa-cogs" aria-hidden="true"></i> ganti</a></li>
										<?php } else { ?>
											<li class="pure-menu-item"><a href="upload.php" class="pure-menu-link"><i class="fa fa-upload" aria-hidden="true"></i> Upload</a></li>
										<?php }
										}?>
									</ul>
								</li>
								<?php if ($dataMhs['role_id'] == 0) {?>
								<li class="pure-menu-item pure-menu-has-chilldren pure-menu-allow-hover">
									<?php if (empty($dataMhs['image'])) { ?>
											<a><img src="img/user.png" alt="" class="img-tags"></a>
												<?php } else { ?>
													<a><img src="<?=$dataMhs['image'];?>" alt="" class="img-tags"></a>
													<?php	} ?>
										</li>
										<?php } ?>
								<li class="pure-menu-item pure-menu-has-chilldren pure-menu-allow-hover">
									<?php if (!$dataMhs['role_id'] == 0) { ?>
									<a href="#" class="pure-menu-link"><i class="fa fa-users	 fa-lg" aria-hidden="true"></i> <?=$dataMhs['nama'];?></a>
										<?php } else { ?>
											<a href="#" class="pure-menu-link"><?=$dataMhs['nama'];?></a>
										<?php } ?>
									<ul class="pure-menu-children">
										<?php if ($dataMhs['role_id'] == 1) { ?>
											<li class="pure-menu-item"><a href="dosen.php" class="pure-menu-link"><i class="fa fa-bank fa-lg" aria-hidden="true"></i> tambahkan user dosen</a></li>
											<li class="pure-menu-item"><a href="insert.php" class="pure-menu-link"><i class="fa fa-mortar-board fa-lg" aria-hidden="true"></i> tambahkan user student</a></li>
											<li class="pure-menu-item"><a href="action-out.php" class="pure-menu-link"><i class="fa fa-sign-out fa-lg" aria-hidden="true"></i> sign out</a></li>
											<?php } else { ?>
												<li class="pure-menu-item"><a href="updating.php?nrp=<?=$dataMhs["nrp"];?>&kons=<?=$dataMhs["role_id"];?>" class="pure-menu-link"><i class="fa fa-wrench" aria-hidden="true"></i> Edit</a></li>
												<li class="pure-menu-item"><a href="profile.php" class="pure-menu-link"><i class="fa fa-user" aria-hidden="true"></i> profile</a></li>
												<li class="pure-menu-item"><a href="action-out.php" class="pure-menu-link"><i class="fa fa-sign-out" aria-hidden="true"></i> sign out</a></li>
												<?php } ?>
											</ul>
						</ul>
				</div>
		</div>

      <?php
      require_once 'koneksi.php';
      $key = $_GET['nrp'];
      $sql = "SELECT * FROM datamhs WHERE nrp = '$key'";
      $result = mysqli_query($conn, $sql);
      $row = mysqli_fetch_assoc($result);

        ?>

<div class="row">
		<div class="table-ini">
			<div class="seven columns">
          <table class="u-full-width">
        <tr>
          <td>
          <th>nrp</th>
        </td>
          <td>
            <?=$row['nrp'];?>
          </td>
        </tr>
        <tr>
          <td>
              <th>nama lengkap</th>
          </td>
          <td>
            <?=$row['nama'];?>
          </td>
        </tr>
        <tr>
          <td>
          <th>jurusan</th>
      </td>
          <td>
            <?=$row['jurusan'];?>
          </td>
        </tr>
        <tr>
          <td>
					<th>kelas</th>
      </td>
          <td>
            <?=$row['kelas'];?>
          </td>
        </tr>
        <tr>
          <td>
					<th>program</th>
      </td>
          <td>
            <?=$row['program'];?>
          </td>
        </tr>
        <tr>
          <td>
					<th>jenis kelamin</th>
      </td>
          <td>
            <?=$row['gender'];?>
          </td>
        </tr>
        <tr>
          <td>
					<th>agama</th>
      </td>
          <td>
            <?=$row['agama'];?>
          </td>
        </tr>
        <tr>
          <td>
					<th>umur</th>
      </td>
          <td>
            <?=$row['umur'];?>
          </td>
        </tr>
        <tr>
          <td>
					<th>tempat lahir/tanggal lahir</th>
      </td>
          <td>
            <?=$row['tempat_lahir'];?>, <?=$row['tanggal_lahir'];?>
          </td>
        </tr>
        <tr>
          <td>
					<th>alamat</th>
      </td>
          <td>
            <?=$row['alamat'];?>
          </td>
        </tr>
          </table>
				</div>
      <div class="one columns">
				<?php if (empty($row['image'])){ ?>
					<img src="img/user.png" alt="" class="img-circle"/>
					<?php } ?>
        <img src="<?=$row['image'];?>" class="img-circle" />
      </div>
		</div>
    </div>


    <?php

      mysqli_close($conn);

      ?>

      </body>
</html>
<?php } ?>
