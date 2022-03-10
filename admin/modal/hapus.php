<?php

session_start();

if (!isset($_SESSION['login'])) {
	// code...
	header("Location: ../path_admin.php");
}

require '../functions.php';

// menangkap elemen id
$table = $_GET['table'];
$id = $_GET['id'];

if (hapus($id, $table) > 0) {
	echo "
		<script>
			alert('Data berhasil dihapus');
			document.location.href = '../admin.php';
		</script>
	";
} else {
	echo "
		<script>
			alert('Data gagal dihapus');
			document.location.href = '../admin.php';
		</script>
	";
}
?>