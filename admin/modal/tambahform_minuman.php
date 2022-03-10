<?php

session_start();

if (!isset($_SESSION['login'])) {
  // code...
  header("Location: ../path_admin.php");
}

require "../functions.php";

if (isset($_POST['submit'])) {
  // code...
  // var_dump($_POST);

  if (tambah_menu($_POST, 'minuman') > 0) {
    // code...
    echo "
        <script>
          alert('Data minuman berhasil ditambahkan.');
          document.location.href = '../admin.php';
        </script>
          ";
  } else {
    // code...
    echo "
        <script>
          alert('Data minuman gagal ditambahkan.');
        //   document.location.href = '../admin.php';
        </script>
          ";
  }
  
}
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<div class="modal-form">
  <div class="header-form">
    <h2 id="judul">Minuman</h2>
  </div>
  <form action="modal/tambahform_minuman.php" method="POST" enctype="multipart/form-data">
    <table>
      <tr>
        <td>
          <label for="nama"><p>Nama Minuman: </p></label>
        </td>
        <td>
          <input type="text" name="nama" id="nama" required>
        </td>
      </tr>
      <tr>
        <td>
          <label for="gambar"><p>Gambar Minuman: </p></label>
        </td>
        <td>
          <input type="file" name="gambar" id="gambar">
        </td>
      </tr>
      <tr>
        <td>
          <label for="harga"><p>Harga Minuman: </p></label>
        </td>
        <td>
          <input type="text" name="harga" id="harga" required>
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
          <button type="submit" name="submit">TAMBAH</button>
        </td>
      </tr>
    </table>
  </form>
</div>
<script src="js/scriptadmin.js"></script>