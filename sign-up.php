<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="font-awesome/css/font-awesome.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
     <link rel="stylesheet" href="css/skeleton.css">
         <link rel="stylesheet" href="css/normalize.css">
         <link rel="stylesheet" href="css/signup.css">
           <link rel="stylesheet" href="pure/pure-min.css">
     <title>Sign to E - Leaps</title>
    </head>
    <body>

      <div class="header">
          <div class="home-menu pure-menu pure-menu-horizontal pure-menu-fixed">
              <ul class="pure-menu-list"><li class="pure-menu-item pure-menu-heading">
                <a class="pure-menu-heading" href="login.php"><i class="fa fa-rocket" aria-hidden="true"></i> E - LEAPS</a></li>
              </ul>
          </div>
      </div>

    <br>
    <div class="daftar">
     <h6 class="docs-header">Selamat Datang Mahasiswa Baru</h6>
     <p>isi form dibawah ini sesuai dengan program studi kalian dan kelas kalian diharapkan untuk diisi semua terimakasih</p>
     <div class="docs-example docs-example-forms">
       <form class="pure-form" action="action-sign.php" method="post">
         <div class="row">
           <div class="six columns">
             <label for="text">Nama Anda</label>
             <input class="u-full-width" type="text" placeholder="Name" name="nama" required>
           </div>
           <div class="six columns">
             <label for="text">Nrp Anda</label>
             <input class="u-full-width" type="text" placeholder="nrp" name="nrp" required>
           </div>
         </div>
         <div class="row">
           <div class="six columns">
             <label for="exampleEmailInput">password</label>
             <input class="u-full-width" type="password" placeholder="password" name="password" required>
           </div>
         </div>
         <hr>
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
             <input class="u-full-width" type="text" placeholder="tempat lahir" name="tempat" required>
           </div>
           <div class="six columns">
             <label for="text">Tanggal lahir Anda</label>
             <input class="u-full-width" type="text" placeholder="tanggal lahir" name="tanggal" required>
           </div>
           <div class="row">
           	<div class="six columns">
           		<label for="text">umur</label>
           		<input class="u-full-width" type="text" placeholder="umur" name="umur" required>
           	</div>
           </div>
         </div>
         <label for="exampleMessage">Alamat Anda</label>
         <textarea class="u-full-width" placeholder="alamat" name="alamat"></textarea>
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
