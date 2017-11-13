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
							<a class="pure-menu-heading" href="index-imk.php"><i class="fa fa-rocket" aria-hidden="true"></i> E - Leaps</a></li>
								<li class="pure-menu-item"><a href="indexmhs.php" class="pure-menu-link"><i class="fa fa-home fa-lg" aria-hidden="true"></i> Home</a></li>
								<li class="pure-menu-item"><a href="uploadimk.php" class="pure-menu-link"><i class="fa fa-upload" aria-hidden="true"></i> Upload</a></li>

									</ul>
				</div>
		</div>
      <?php
      require_once 'imk.php';

      $sql = "SELECT * FROM file";
      $result = mysqli_query($conn, $sql);
				?>
        <div class="table-ini">
          <table class="u-full-width">
          <tr>
          <thead>
          <th>id</th>
          <th>nama file</th>
          <th>type file</th>
					<th>size file</th>
          </thead>
          </tr>
          <tbody>
          <?php while ($row = mysqli_fetch_assoc($result)) { ?>
              <tr>
                <td><?=$row["id"];?></td>
                <td>
										<a href="files/<?=$row['file'];?>" download><?=$row['file'];?></a>
								</td>
                <td><?=$row["type_file"];?></td>
                <td><?=$row["size_file"];?></td>
              </tr>
          <?php } ?>
          </tbody>
          </table>
				</div>
        <!--  <div class="table-ini">
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
        </div> -->
    <?php
      mysqli_close($conn);
      ?>
      </body>
</html>
