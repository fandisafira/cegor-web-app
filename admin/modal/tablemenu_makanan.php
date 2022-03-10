<?php

session_start();

if (!isset($_SESSION['login'])) {
	// code...
	header("Location: path_admin.php");
}

require "../functions.php";

$makanan = query("SELECT * FROM makanan");
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<table class="list-menu">
	<tr>
		<th>
			Nama
		</th>
		<th>
			Harga
		</th>
		<th>
			Ketersedian
		</th>
		<th>
			Gambar
		</th>
		<th>
			Aksi
		</th>
	</tr>
	<?php $i = 1; ?>
	<?php foreach($makanan as $menu) : ?>
		<tr class="baris-data baris-menu">
			<td>
				<?= $menu['nama_makanan']; ?>
			</td>
			<td>
				Rp.<?= $menu['harga_makanan']; ?>
			</td>
			<td>
				<?= $menu['ketersediaan']; ?>
			</td>
			<td>
				<img src="../img/<?= $menu['gambar_makanan']; ?>">
			</td>
			<td>
				<a href="modal/ubah.php?table=makanan&id=<?= $menu['id_makanan']; ?>"><img src="../img/edit.png"></a>
				<a href="modal/hapus.php?table=makanan&id=<?= $menu['id_makanan']; ?>" onclick="return confirm('Yakin ingin menghapus?')"><img src="../img/delete.png"></a>
			</td>
		</tr>
		<?php $i++; ?>
	<?php endforeach; ?>
</table>
<div class="rows">
	<div class="row">
		<div class="prev prev-menu hide-row">
			&lt;
		</div>
	</div>
	<div class="row">
		<div class="next next-menu">
			&gt;
		</div>
	</div>
</div>
<script src="js/scriptadmin.js"></script>
<script>
    if($(".baris-data").length < 5){
        $(".next").addClass("hide-row");
    }
</script>