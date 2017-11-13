<?php
	include '/assets/config.php';

	session_start();

	$username = $_POST['nrp'];
	$password = $_POST['password'];

	$sql = "SELECT * from datamhs WHERE nrp = '$username'";
	$result = $conn->query($sql);

	$passUser = $result->fetch_assoc();

	if(md5($password) == $passUser['password']) {
		header("location: indexmhs.php");
		$_SESSION['username'] = $username;
		$_SESSION['cek'] = 0;
	} else {
		$sql2 = "SELECT * from dosen WHERE nrp = '$username'";
		$result2 = $conn->query($sql2);

		$passUser2 = $result2->fetch_assoc();

		if(md5($password) == $passUser2['password']) {
			header("location: indexmhs.php");
			$_SESSION['username'] = $username;
			$_SESSION['cek'] = 1;
		}
		else {
				echo "
				<h3>Password yang anda masukkan salah!</h3>
				<script>
				setTimeout(function(){window.location='login.php'}, 1000);
				</script>
				";
		}
	}
?>
