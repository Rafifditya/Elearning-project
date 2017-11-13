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
								<li class="pure-menu-item"><a href="" class="pure-menu-link"><i class="fa fa-home fa-lg" aria-hidden="true"></i> Home</a></li>

								</li>

								</ul>
						</ul>
				</div>
		</div>

		<div class="table-itu">
				<h3><center>List file yang bisa di upload:</center></h3>
				<br><br>
				 <div class="docs-example docs-example-forms">
					 <form class="pure-form" action="action-upload-imk.php" method="post" enctype="multipart/form-data">
						 <div class="row" style="padding-left:150px;">
							 <div class="three columns">
								 <h1><i class="fa fa-file-pdf-o" aria-hidden="true"></i></h1>
								 <label for="text">PDF file</label>
							 </div>
							 <div class="three columns">
								 <h1><i class="fa fa-file-powerpoint-o" aria-hidden="true"></i></h1>
								 <label for="text">PPT file</label>
							 </div>
							 <div class="three columns">
								 <h1><i class="fa fa-file-word-o" aria-hidden="true"></i></h1>
								 <label for="text">Word file</label>
							 </div>
							 <div class="three columns">
								 <h1><i class="fa fa-file-text-o" aria-hidden="true"></i></h1>
								 <label for="text">text file</label>
							 </div>
							 <br>
						 </div>
						 <div class="row">
							 <hr>
							 <br>
							 <center><input type="file" name="file" value="browse">
								 <input type="submit" name="submit" value="upload"></center>
						 </div>
					 </form>
					 </div>
				 </div>
      </body>
</html>
