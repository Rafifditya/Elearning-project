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
        <meta name="viewport" content="width=device-width, initial-scale=1">
         <link rel="stylesheet" href="css/skeleton.css">
         <link rel="stylesheet" href="css/normalize.css">
         <link rel="stylesheet" href="font-awesome/css/font-awesome.css">
         <link rel="stylesheet" href="css/signup.css">
         <link rel="stylesheet" href="pure/pure-min.css">
     <title>E - Leaps</title>
    </head>
    <body>

      <div class="header">
          <div class="home-menu pure-menu pure-menu-horizontal pure-menu-fixed">
              <ul class="pure-menu-list"><li class="pure-menu-item pure-menu-heading">
                <a class="pure-menu-heading" href="#"><i class="fa fa-rocket" aria-hidden="true"></i> E - Leaps</a></li>
                <li class="pure-menu-item"><a href="indexmhs.php" class="pure-menu-link"><i class="fa fa-mail-reply" aria-hidden="true"></i> back</a></li>

              </ul>
          </div>
      </div>

    <br>
    <div class="daftar">
     <h6 class="docs-header">Selamat datang Admin</h6>
     <p>Halaman menambah user dosen.</p>
     <div class="docs-example docs-example-forms">
       <form class="pure-form" action="dosen-action.php" method="post">
         <div class="row">
           <div class="six columns">
             <label for="text">Nama Dosen Anda</label>
             <input class="u-full-width" type="text" placeholder="Name" name="nama" required>
           </div>
           <div class="six columns">
             <label for="text">Nrp Dosen Anda</label>
             <input class="u-full-width" type="text" placeholder="nrp dosen" name="nrp" required>
           </div>
         </div>
         <div class="row">
           <div class="six columns">
             <label for="exampleEmailInput">password</label>
             <input class="u-full-width" type="password" placeholder="password" name="password" required>
           </div>
         </div>
         <hr>
         <div class="pure-controls">
          <label for="cb" class="pure-checkbox">
              <input id="cb" type="checkbox"> Ya, Saya Sudah baca term dan kondisi
          </label>
        </div>
         <input class="button-primary" type="submit" value="submit" name="submit">
       </form>
     </div>
   </div>
    </body>
</html>
<?php } ?>
