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

      $sql = "SELECT * FROM datamhs";
      $result = mysqli_query($conn, $sql);
		if ($dataMhs['role_id'] == 0) {

			$cari = mysqli_query($conn, "SELECT *FROM massage WHERE nrp='$nrps'");
			$msg = mysqli_fetch_array($cari);

		}
      if (mysqli_num_rows($result) > 0) {
					?>
		<div class="table-ini">
			<?php if ($dataMhs['role_id'] == 0) { ?>
			<?php if (empty($dataMhs['nama_file'])) { ?>
				<?php if ($msg['warning_type'] == 1) { ?>
			<h6 class="docs-header">Anda Belum upload E-learning</h6>
      <p>anda di minta dosen anda segera mengirim kan module E-learning anda terimakasih.</p>
			<?php }
				}
			}
				?>
          <table class="u-full-width">
          <tr>
          <thead>
          <th>nrp</th>
          <th>nama lengkap</th>
          <th>jurusan</th>
					<th>E-learning Module</th>
					<th>nilai</th>
          <th>
						<div class="row">
							<form method="post" action="searchsiswa.php">
								<div class="four columns">
									<input type="text" class="u-full-width" placeholder="nrp" name="nrp">
								</div>
								<div class="four columns">
									<input type="submit" class="submit input" name="search" value="Search"></i>
								</div>
								<?php if ($dataMhs['role_id'] == 1) {?>
								<div class="one columns">
										<a class="button input" href="insert.php"><i class="fa fa-pencil" aria-hidden="true"></i> Tambahkan data</a>
								</div>
								<?php } ?>
								</form>
						</div>
          </th>
          </thead>
          </tr>
          <tbody>
          <?php while ($row = mysqli_fetch_assoc($result)) { ?>
              <tr>
                <td><?=$row["nrp"];?></td>
                <td><a href="selecting.php?nrp=<?=$row["nrp"];?>"><?=$row["nama"];?></a></td>
                <td><?=$row["jurusan"];?></td>
								<td>
									<?php if (!empty($row['nama_file'])) { ?>
										<a href="files/<?=$row['nama_file'];?>" download><?=$row['nama_file'];?></a>
									<?php } else { ?>
										<a href="#">-</a>
									<?php } ?>
								</td>
								<td>
									<?php if ($dataMhs['role_id'] == 1 || $dataMhs['role_id'] == 2) {?>
										<form class="" action="action-nilai.php?nrp=<?=$row["nrp"];?>" method="post">
												<div class="three columns">
													<input class="u-full-width" type="text" placeholder="<?=$row["nilai"];?>" name="nilai">
												</div>
												<div class="one columns">
													<input class="submit input" type="submit" name="submit" value="nilai">
												</div>
										</form>
									<?php } else {?>
										<?=$row["nilai"];?>
									<?php } ?>
								</td>
                <td>
									<?php $orp = $row['nrp']; ?>
									<?php $cari2 = mysqli_query($conn,"SELECT *FROM massage WHERE nrp= $orp"); ?>
									<?php $row2 = mysqli_fetch_assoc($cari2); ?>
									<?php if ($dataMhs['role_id'] == 2) { ?>
										<?php if (!empty($row['nama_file'])) { ?>
											<a href="#" class="button input"><i class="fa fa-check-square-o fa-lg" aria-hidden="true"></i> Sudah terupdload</a>
											<?php } else { ?>
										<?php if ($row2["nrp"] == $row["nrp"]) { ?>
											<a href="#" class="button input"><i class="fa fa-refresh fa-spin fa-fw fa-lg" aria-hidden="true"></i> Sedang diproses upload</a>
														<?php } else { ?>
															<a href="action-alert.php?nrp=<?=$row["nrp"];?>" class="button input"><i class="fa fa-flash fa-lg" aria-hidden="true"></i> Meminta Segera Mengirim E-learning</a>
														<?php } ?>
												<?php } ?>
									<?php } ?>
									<?php if ($dataMhs['role_id'] == 1) {?>
                  <a href="updating.php?nrp=<?=$row["nrp"];?>&kons=0" class="button input"><i class="fa fa-edit" aria-hidden="true"></i> Edit</a>
                  <a href="deleting.php?nrp=<?=$row["nrp"];?>" class="button input"><i class="fa fa-ban" aria-hidden="true"></i> Hapus</a>
									<?php } ?>
                </td>
              </tr>
          <?php } ?>
          </tbody>
          </table>
				</div>
      <?php
    } else {
      ?>
          <div class="table-ini">
          <table class="u-full-width">
          <tr>
          <thead>
						<th>nrp</th>
	          <th>nama lengkap</th>
	          <th>jurusan</th>
						<th>E-learning Module</th>
						<th>nilai</th>
	          <th>
          <form method="post" action="searchsiswa.php">
           <input type="text" class="pure-input-rounded" placeholder="nrp" name="nrp">
          <input type="submit" class="button input" name="search" value="Search"></i>
					<?php if ($dataMhs['role_id'] == 1) {?>
            <a class="button input" href="insert.php"><i class="fa fa-pencil" aria-hidden="true"></i> Tambahkan data</a>
					<?php } ?>
					</form>
          </th>
          </thead>
          </tr>
          <tbody>
              <tr>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
								<td>-</td>
						  </tr>
          </tbody>
          </table>
        </div>
    <?php  }
      mysqli_close($conn);
      ?>
      </body>
</html>
<?php } ?>
