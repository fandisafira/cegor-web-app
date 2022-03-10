<?php

session_start();

if (!isset($_SESSION['login'])) {
	// code...
	header("Location: ../path_admin.php");
}

require '../functions.php';

// menangkap elemen id dan table
$table = $_GET['table'];
$id = $_GET['id'];

if ($table === 'makanan') {
	// code...
	$menu = query("SELECT * FROM makanan WHERE id_makanan=$id")[0];
	// var_dump($menu);
} else {
	// code...
	$menu = query("SELECT * FROM minuman WHERE id_minuman=$id")[0];
	// var_dump($menu);
}

if (isset($_POST['submit'])) {
	// code...
	// var_dump($_POST);
	// var_dump($_FILES);
	// die();

	if (ubah($_POST, $table, $id) > 0) {
		echo "
				<script>
					alert('Data menu telah diubah.');
          document.location.href = '../admin.php';
				</script>
					";
	} else {
		echo "
				<script>
					alert('Data menu gagal diubah.');
          document.location.href = '../admin.php';
				</script>
					";
	}
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>CEGOR | Admin</title>
	<link rel="stylesheet" href="../css/stylesadmin.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
</head>
<body>
	<div class="container">

		<!-- BACKGROUND -->
		<div class="bg-img">
			<img src="../../img/latarbelakang.jpg" alt="">
		</div>

		<!-- MAIN -->
		<div class="main main-ubah">
			<div class="brand">
				<h1>CEGOR</h1>
				<p>Cemilan Goreng</p>
			</div>

      <div class="form-ubah">
        <div class="modal-form">
          <div class="header-form">
            <h2 id="judul"><?=$table;?></h2>
          </div>
          <form action="" method="POST" enctype="multipart/form-data">
          	<?php if($table === 'makanan'):?>
              <input type="hidden" name="gambar_lama" value="../img/<?= $menu['gambar_makanan']; ?>">
            <?php else: ?>
              <input type="hidden" name="gambar_lama" value="../img/<?= $menu['gambar_minuman']; ?>">
            <?php endif; ?>
            <table>
            	<tr>
            		<td colspan='2' class="image">
                  <?php if($table === 'makanan'):?>
                  	<img src="../../img/<?= $menu['gambar_makanan']; ?>">
                  <?php else: ?>
                  	<img src="../../img/<?= $menu['gambar_minuman']; ?>">
                	<?php endif; ?>
                </td>
            	</tr>
              <tr>
                <td>
                  <label for="nama"><p>Nama <?=$table;?>: </p></label>
                </td>
                <td>
                  <?php if($table === 'makanan'):?>
                  	<input type="text" name="nama" id="nama" value="<?= $menu['nama_makanan']; ?>" required>
                  <?php else: ?>
                  	<input type="text" name="nama" id="nama" value="<?= $menu['nama_minuman']; ?>" required>
                	<?php endif; ?>
                </td>
              </tr>
              <tr>
                <td>
                  <label for="gambar"><p>Gambar <?=$table;?>: </p></label>
                </td>
                <td>
                	<input type="file" name="gambar" id="gambar">
                </td>
              </tr>
              <tr>
                <td>
                  <label for="harga"><p>Harga <?=$table;?>: </p></label>
                </td>
                <td>
                  <?php if($table === 'makanan'):?>
                  	<input type="text" name="harga" id="harga" value="<?= $menu['harga_makanan']; ?>" required>
                  <?php else: ?>
                  	<input type="text" name="harga" id="harga" value="<?= $menu['harga_minuman']; ?>" required>
                	<?php endif; ?>
                </td>
              </tr>
              <tr>
				        <td>
				          <label for="ketersediaan"><p>Ketersediaan: </p></label>
				        </td>
				        <td>
				          <select id="ketersediaan" name="ketersediaan">
				            <option value="Tersedia">Tersedia</option>
				            <option value="Kosong">Kosong</option>
				          </select>
				        </td>
				      </tr>
              <tr>
                <td colspan="2" class="button">
                  <button type="submit" name="submit">UBAH</button>
                </td>
              </tr>
            </table>
          </form>
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