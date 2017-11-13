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
				setTimeout(function(){window.location='../../login.php'}, 1000);
			</script>
		";
	} else {

?>
<!DOCTYPE html>
<html>
<head>
  <title>PenScoff:edit data mhs</title>
	<link rel="stylesheet" href="font-awesome/css/font-awesome.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/skeleton.css">
	 <link rel="stylesheet" href="css/normalize.css">
	 <link rel="stylesheet" href="css/signup.css">
		 <link rel="stylesheet" href="pure/pure-min.css">
		 <link rel="stylesheet" href="css/indexmhs.css">
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
      $nrplama = $_GET["nrp"];
			$role = $_GET["kons"];
			if ($role == 1 || $role == 2) {
				$sql = "SELECT * FROM dosen WHERE nrp = $nrplama";
			} else {
				$sql = "SELECT * FROM datamhs WHERE nrp = $nrplama";
			}
      $result = mysqli_query($conn, $sql);
      ?>

    <?php
		if ($role == 1 || $role == 2) {
			$getData = mysqli_query($conn , "SELECT *FROM dosen WHERE nrp='$nrplama'");
			$data = mysqli_fetch_array($getData);
		} else {
			$getData = mysqli_query($conn , "SELECT *FROM datamhs WHERE nrp='$nrplama'");
			$data = mysqli_fetch_array($getData);
		}
     ?>
		 <div class="daftar">
			 <?php if ($dataMhs['role_id'] == 1) {?>
			<h6 class="docs-header">Halo Admin!!!</h6>
			<p>Keep Hardworking admin</p>
			<?php } ?>
			<?php if ($dataMhs['role_id'] == 2) { ?>
				<h6 class="docs-header">halo <?=$dataMhs['nama'];?>!!!</h6>
				<p>Keep hardworking <?=$dataMhs['nama'];?></p>
			<?php }  ?>
			<?php if ($dataMhs['role_id'] == 0) { ?>
			<h6 class="docs-header">Halo <?=$dataMhs['nama'];?> !!!</h6>
			<p>pastikan data anda sesuai dengan data mahasiswa yang tercantum di kampus dan absensi kelas ya terimakasih</p>
			<?php } ?>
			<div class="docs-example docs-example-forms">
				<form class="pure-form" action="action-update.php?kons=<?=$role?>&nrp=<?=$nrplama?>" method="post">
					<div class="row">
						<div class="six columns">
							<label for="text">Nama Anda</label>
							<input class="u-full-width" type="text" placeholder="<?php echo $data["nama"]; ?>" name="nama">
						</div>
						<div class="six columns">
							<label for="text">Nrp / Nomor induk Anda</label>
							<input class="u-full-width" type="text" placeholder="<?php echo $data["nrp"]; ?>" name="nrp" readonly>
						</div>
					</div>
					<hr>
<?php if ($role == 0) { ?>
					<div class="row">
						<div class="six columns">
							<label>program</label>
							<select class="u-full-width" name="program">
								<option>D3</option>
								 <option>D4</option>
							</select>
						</div>
						<div class="six columns">
							<label>kelas</label>
							<select class="u-full-width" name="kelas">
								<option>1</option>
								<option>2</option>
								<option>3</option>
								<option>4</option>
							</select>
						</div>
					</div>
					<label>jurusan</label>
					<select name="jurusan" class="u-full-width">
						<option>Informatika</option>
						<option>Mekatronika</option>
						<option>Sistem Pembangkit Energi</option>
						<option>Elektronika</option>
						<option>Elektro Industri</option>
						<option>Game teknologi</option>
						<option>Multi Media Broadcasting</option>
						<option>Telekomunikasi</option>
					</select>
					<hr>
					<?php } ?>
					<div class="row">
						<div class="six columns">
							<label for="exampleEmailInput">agama</label>
							<select class="u-full-width" name="agama">
							<option>islam</option>
							<option>Katolik</option>
							<option>Protestan</option>
							<option>Hindu</option>
							<option>Budha</option>
						</select>
						</div>
						<div class="six columns">
							<label>Jenis kelamin</label>
							<select class="u-full-width" name="gender">
							<option>Laki-laki</option>
							<option>Perempuan</option>
						</select>
						</div>
					</div>
					<div class="row">
						<div class="six columns">
							<label for="text">tempat lahir Anda</label>
							<input class="u-full-width" type="text" placeholder="<?php echo $data["tempat_lahir"]; ?>" name="tempat" required>
						</div>
						<div class="six columns">
							<label for="text">Tanggal lahir Anda</label>
							<input class="u-full-width" type="text" placeholder="<?php echo $data["tanggal_lahir"]; ?>" name="tanggal" required>
						</div>
					</div>
					<?php if ($role > 0) { ?>
						<div class="row">
							<div class="six columns">
								<label for="text">matakuliah</label>
								<input class="u-full-width" type="text" placeholder="<?php echo $data["matakuliah"]; ?>" name="matakuliah">
							</div>
						</div>
				<?php	} else {?>
					<div class="row">
						<div class="six columns">
							<label for="text">umur</label>
							<input class="u-full-width" type="text" placeholder="umur" name="umur" required>
						</div>
					</div>
				<?php } ?>
					<label for="exampleMessage">Alamat Anda</label>
					<textarea class="u-full-width" placeholder="<?php echo $data["alamat"]; ?>" name="alamat"></textarea>
					<input class="button-primary" type="submit" value="UPDATE" name="submit">
				</form>
			</div>
		</div>
    </body>
</html>
<<?php } ?>
