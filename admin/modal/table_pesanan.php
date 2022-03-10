<?php
require "../functions.php";

$pesanan = query("SELECT * FROM kontak");
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<table class="list-menu pesanan">
	<tr>
    <th>
      ID
    </th>
		<th>
			Nama
		</th>
		<th>
			Alamat / No. Telp. 
		</th>
		<th>
			Menu
		</th>
		<th>
			Jumlah
		</th>
    <th>
			Keterangan
		</th>
	</tr>
	<?php $i = 0; ?>
	<?php foreach ($pesanan as $pesan): ?>
		<tr class="baris-data baris-pesanan">
	    <td>
	      <?= $pesan['id_pesanan']; ?>
	    </td>
			<td>
	      <?= $pesan['nama_pemesan']; ?>
			</td>
			<td>
	      <?= $pesan['alamat']; ?> / 
	      <?= $pesan['no_telp']; ?>
			</td>
			<td>
	      <?= $pesan['pesanan']; ?>
			</td>
			<td>
	      <?= $pesan['jumlah']; ?>
			</td>
	    <td>
	      <?= $pesan['keterangan']; ?>
			</td>
		</tr>
		<?php $i++; ?>
	<?php endforeach; ?>
</table>
<div class="rows">
	<div class="row">
		<div class="prev prev-pesanan hide-row">
			&lt;
		</div>
	</div>
	<div class="row">
		<div class="next next-pesanan">
			&gt;
		</div>
	</div>
</div>
<script src="js/scriptadmin.js"></script>
<script>
  if($(".baris-data").length < 6){
    $(".next").addClass("hide-row");
  }
</script>