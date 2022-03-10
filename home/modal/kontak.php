<?php
require "../functions.php";

$makanan = query("SELECT * FROM makanan");

// cek apakah tombol submit sudah ditekan belum
if (isset($_POST['submit'])) {
  // var_dump($_POST);

	// cek apakah data berhasil ditambahkan atau tidak
	if (tambah($_POST) > 0) {
		echo "
				<script>
					alert('Data pesanan Anda telah dikirim.');
          document.location.href = '../../index.php';
				</script>
					";
	} else {
		echo "
				<script>
					alert('Data pesanan Anda gagal dikirim.');
          document.location.href = '../../index.php';
				</script>
					";
	}
}
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<div class="kontak">
  <h4>Menerima pesanan untuk menu makanan minimal selusin (12) porsi dengan hari pemesanan paling lambat h-1</h4>
   <form action="home/modal/kontak.php" method="POST" id="kontak">
    <table>
      <tr>
        <td class="label">
				  <label for="nama"><p>Nama Lengkap: </p></label>
        </td>
        <td>
					<input type="text" name="nama" id="nama" required>
        </td>
			</tr>
      <tr>
        <td class="label">
				  <label for="telp"><p>No. Telp.: </p></label>
        </td>
        <td>
					<input type="text" name="telp" id="telp" required>
        </td>
			</tr>
      <tr>
        <td class="label">
				  <label for="alamat"><p>Alamat: </p></label>
        </td>
        <td>
					<textarea name="alamat" id="alamat" cols="20" rows="5" placeholder="Masukkan alamat lengkap anda" required></textarea>
        </td>
			</tr>
      <tr>
        <td class="label">
				  <label for="pesanan"><p>Menu Pesanan: </p></label>
        </td>
        <td>
          <select name="pesanan" id="pesanan">
            <option value="">--Pilih Menu</option>
            <?php $i = 1; ?>
            <?php foreach($makanan as $menu) : ?>
              <option value="<?= $menu['nama_makanan']; ?>"><?= $menu['nama_makanan']; ?></option>
              <?php $i++; ?>
            <?php endforeach; ?>
          </select>
        </td>
			</tr>
      <tr>
        <td class="label">
					<label for="jumlah"><p>Jumlah Porsi: </p></label>
        </td>
        <td>
					<input type="number" name="jumlah" id="jumlah" min="12" required>
				</td>
			</tr>
      <tr>
        <td class="label">
				  <label for="ket"><p>Keterangan: </p></label>
        </td>
        <td>
					<textarea name="ket" id="ket" cols="20" rows="4" placeholder="Masukkan tambahan keterangan pesanan jika ada seperti level pedas dll."></textarea>
        </td>
      </tr>
      <tr>
				<td colspan="2" class="button">
					<button type="submit" name="submit">PESAN</button>
        </td>
			</tr>
    </table>
  </form>
</div>
<script src="home/js/script.js"></script>