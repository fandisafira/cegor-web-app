<?php
session_start();

require '../functions.php';

if (isset($_SESSION['login'])) {
  header("Location: ../admin.php");
  exit;
}


if (isset($_POST['login'])) {
  // code...

  $uname = $_POST['username'];
  $pw = $_POST['password'];

  $cek_data = mysqli_query($conn, "SELECT * FROM admin WHERE username = '$uname'");

  // cek username
  if (mysqli_num_rows($cek_data) === 1) {

    $data = mysqli_fetch_assoc($cek_data);

    // cek password
    if (password_verify($pw, $data['password'])) {

      // set sesion
      $_SESSION['login'] = true;

      // cek remember me
      if ($_POST['ingat'] === 'ya') {

        // buat cookies
        setcookie('id', $data['id_admin'], time()+300);
        setcookie('kunci', hash('sha256', $data['username']), time()+300);
      }

      header("Location: ../admin.php");
      exit;
    } else {
      // code...
      echo "<script>
              alert('Password salah.');
              document.location.href = '../path_admin.php';
            </script>";
    }
  } else {
    echo "<script>
            alert('Username tidak ada.');
            document.location.href = '../path_admin.php';
          </script>";
  }
}
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<div class="login">
  <h4>Masuk sebagai admin.</h4>
   <form action="modal/login.php" method="POST" id="login">
    <table>
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
          <label for="ingat"><p>Ingat Aku: </p></label>
        </td>
        <td>
          <select name="ingat" id="ingat">
            <option value="tidak">Tidak</option>
            <option value="ya">Ya</option>
          </select>
        </td>
      </tr>
      <tr>
        <td colspan='2' class="button">
          <button type="submit" name="login">LOGIN</button>
        </td>
      </tr>
    </table>
  </form>
</div>
<script src="scriptpath.js"></script>