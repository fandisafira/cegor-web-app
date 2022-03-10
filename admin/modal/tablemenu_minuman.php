<?php

session_start();

if (!isset($_SESSION['login'])) {
	// code...
	header("Location: path_admin.php");
}

require "../functions.php";

$minuman = query("SELECT * FROM minuman");
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
	<?php foreach($minuman as $menu) : ?>
		<tr class="baris-data baris-menu">
			<td>
				<?= $menu['nama_minuman']; ?>
			</td>
			<td>
				Rp.<?= $menu['harga_minuman']; ?>
			</td>
			<td>
				<?= $menu['ketersediaan']; ?>
			</td>
			<td>
				<img src="../img/<?= $menu['gambar_minuman']; ?>">
			</td>
			<td>
				<a href="modal/ubah.php?table=minuman&id=<?= $menu['id_minuman']; ?>"><img src="../img/edit.png"></a>
				<a href="modal/hapus.php?table=minuman&id=<?= $menu['id_minuman']; ?>" onclick="return confirm('Yakin ingin menghapus?')"><img src="../img/delete.png"></a>
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