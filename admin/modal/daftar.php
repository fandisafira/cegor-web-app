<?php
require '../functions.php';

if (isset($_POST['daftar'])) {
  // code...
  // var_dump($_POST);

  if (daftar($_POST) > 0) {
    // code...
    echo "<script>
            alert('User admin berhasil ditambahkan.');
            document.location.href = '../path_admin.php';
          </script>";
  } else {
    echo "<script>
            alert('User admin gagal ditambahkan.');
            document.location.href = '../path_admin.php';
          </script>";
    echo mysqli_error($conn);
  }
}

?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<div class="login">
  <h4>Daftar sebagai admin.</h4>
   <form action="modal/daftar.php" method="POST" id="login">
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
				  <label for="username"><p>Username: </p></label>
        </td>
        <td>
					<input type="text" name="username" id="username" required>
        </td>
			</tr>
      <tr>
        <td class="label">
          <label for="password"><p>Password: </p></label>
        </td>
        <td>
          <input type="password" name="password" id="password" required>
        </td>
      </tr>
      <tr>
        <td class="label">
          <label for="pw_valid"><p>Konfirmasi Password: </p></label>
        </td>
        <td>
          <input type="password" name="pw_valid" id="pw_valid" required>
        </td>
      </tr>
      <tr>
        <td colspan='2' class="button">
          <button type="submit" name="daftar">DAFTAR</button>
        </td>
      </tr>
    </table>
  </form>
</div>
<script src="scriptpath.js"></script>