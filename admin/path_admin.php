<?php

session_start();

require 'functions.php';

// cek cookies
if (isset($_COOKIE['id']) && isset($_COOKIE['kunci'])) {

  $id = $_COOKIE['id'];
  $kunci = $_COOKIE['kunci'];

  // ambil data berdasarkan id
  $cek_username = mysqli_query($conn, "SELECT username FROM admin WHERE id_admin=$id");
  $baris = mysqli_fetch_assoc($cek_username);

  // cek cookie by uname dengan username database
  if ($kunci === hash('sha256', $baris['username'])) {
    $_SESSION['login'] = true;
  }
}

if (isset($_SESSION['login'])) {
	// code...
	header("Location: admin.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>CEGOR | Path Admin</title>
	<link rel="stylesheet" href="css/stylespath.css">
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

			<ul class="nav-list">
				<li class="nav-item" id="login">login</li>
				<li class="nav-item home" id="home"><a href="../index.php">home</a></li>
				<li class="nav-item" id="daftar">daftar</li>
			</ul>

			<div class="open">
				<div class="weekday">
					<h3>Senin s.d. Jumat</h3>
					<p>08.00--22.00</p>
				</div>
				<div class="weekend">
					<h3>Sabtu s.d. Minggu</h3>
					<p>10.00--23.00</p>
				</div>
			</div>

			<div class="location">
				<p>Kp. Bulak Poncol Pondok Melati <br> Kota Bekasi</p>
			</div>
		</div>

		<div class="modal">
			<div class="modal-container">
				<div class="header-modal">
					<h2 id="judul"></h2>
				</div>
				<div class="isi-modal" id="isi-modal">
					<!-- CROP -->
					<!-- <div class="menu-pilihan">
						<div class="tiap-pilihan">
							<h3>Nasi Goreng</h3>
							<img src="img/nasi-goreng.jpg">
							<p>Rp.13.000</p>
						</div>
						<div class="tiap-pilihan">
							<h3>Kwetiau Goreng</h3>
							<img src="img/kwetiau-goreng.jpg">
							<p>Rp.13.000</p>
						</div>
						<div class="tiap-pilihan">
							<h3>Mie Tektek</h3>
							<img src="img/mie-tektek.jpg">
							<p>Rp.15.000</p>
						</div>
						<div class="tiap-pilihan">
							<h3>Mie Aceh</h3>
							<img src="img/mie-aceh.jpg">
							<p>Rp.18.000</p>
						</div>
					</div> -->
				</div>
				<div class="tutup-modal">
					<p>X</p>
				</div>
			</div>
		</div>
	
	</div>

	<script src="js/scriptpath.js"></script>
</body>
</html>
