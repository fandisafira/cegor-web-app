<?php
session_start();

if (!isset($_SESSION['login'])) {
	// code...
	header("Location: path_admin.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>CEGOR | Admin</title>
	<link rel="stylesheet" href="css/stylesadmin.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
</head>
<body>
	<div class="container">

		<!-- BACKGROUND -->
		<div class="bg-img">
			<img src="../img/latarbelakang.jpg" alt="">
		</div>

		<!-- MAIN -->
		<div class="main">
			<div class="brand">
				<h1>CEGOR</h1>
				<p>Cemilan Goreng</p>
			</div>

			<div class="nav-item logout">
				<a href="logout.php">keluar</a>
			</div>

			<div class="content">
				<!-- NAVBAR -->
				<ul class="nav-list">
					<li class="nav-item" id="makanan">makanan</li>
					<li class="nav-item" id="minuman">minuman</li>
					<li class="nav-item" id="tambah">tambah</li>
					<li class="nav-item" id="kontak">pesanan</li>
				</ul>


				<!-- TABLE LOAD -->
				<div class="modal" id="isi-modal">
					<!-- ISI MODAL -->
				</div>
			</div>

			<div class="open">
				<div class="weekday">
					<h3>Senin - Jum'at</h3>
					<p>08.00 - 22.00</p>
				</div>
				<div class="weekend">
					<h3>Sabtu - Minggu</h3>
					<p>10.00 - 23.00</p>
				</div>
			</div>

			<div class="location">
				<p>Kp. Bulak Poncol Pondok Melati <br> Kota Bekasi</p>
			</div>
		</div>

		
	
	</div>

	<script src="js/scriptadmin.js"></script>
</body>
</html>