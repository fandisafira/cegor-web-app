<?php
// koneksi ke db
$conn = mysqli_connect("localhost", "root", "", "cegor");

function query($query){
	global $conn;
	$result = mysqli_query($conn, $query);
	$rows = []; // menyiapkan array kosong untuk setiap record
	while ($row = mysqli_fetch_assoc($result)) {
		$rows[] = $row;
	}
	return $rows;
}

function tambah_menu($data, $table){
	global $conn;
	$nama = htmlspecialchars($data['nama']);
	$harga = htmlspecialchars($data['harga']);

	$gambar = upload();
	if (!$gambar) {
		// code...
		return false;
	}


	$ketersediaan = $data['ketersediaan'];

	// query INSERT DATA
	$query = "INSERT INTO $table
				VALUES
				(null, '$nama', '$harga', '$gambar', '$ketersediaan')
				";
	mysqli_query($conn, $query);

	// cek apakah data berhasil ditambahkan atau tidak
	return mysqli_affected_rows($conn);
}


function upload(){
	$namaFile = $_FILES['gambar']['name'];
	$ukuranFile = $_FILES['gambar']['size'];
	$error = $_FILES['gambar']['error'];
	$tmpName = $_FILES['gambar']['tmp_name'];

	// memeriksa apakah ada gambar yang diupload
	if ($error === 4) {
		// code...
		echo "	<script>
					alert('Upload gambar terlebih dahulu!')
				</script>";
		return false;
	}

	// memeriksa apakah yang diupload adalah gambar
	$extGambarFormat = ['jpg', 'jpeg', 'png'];
	$extGambar = explode('.', $namaFile);
	$extGambar = strtolower(end($extGambar));

	// memeriksa apakah ada extGambarFormat dalam nama file
	if (!in_array($extGambar, $extGambarFormat)) {
		// code...
		echo "	<script>
					alert('File yang diupload bukan gambar!')
				</script>";
		return false;
	}

	// memeriksa ukuran gambar, tidak boleh lebih dari 5mb
	if ($ukuranFile > 5000000) {
		// code...
		echo "	<script>
					alert('Ukuran file gambar melebihi 5 MB!')
				</script>";
		return false;
	}

	// gambar siap diupload

	// buat nama file baru
	$namaFileBaru = uniqid();
	$namaFileBaru .= '.';
	$namaFileBaru .= $extGambar;

	move_uploaded_file($tmpName, '../../img/' . $namaFileBaru);

	return $namaFileBaru;
}

function hapus($id, $table){
	global $conn;
	// mysqli_query($conn, "DELETE FROM $table WHERE id_$table='$id'");

	// ambil data yang ingin dihapus
	$file = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM $table WHERE id_$table='$id'"));

	// hapus file
	if ($table === 'makanan') {
		// code...
		unlink('../../img/' . $file['gambar_makanan']);
	} else {
		unlink('../../img/' . $file['gambar_minuman']);
	}

	$hapusBaris = "DELETE FROM $table WHERE id_$table='$id'"; // hapus record db

	mysqli_query($conn, $hapusBaris);

	return mysqli_affected_rows($conn);
}


function ubah($data, $table, $id){
	global $conn;
	$nama = htmlspecialchars($data['nama']);
	$harga = htmlspecialchars($data['harga']);
	$ketersediaan = $data['ketersediaan'];

	$gambar_lama = htmlspecialchars($data['gambar_lama']);

	// memeriksa apakah memilih gambar baru atau tidak
	if ($_FILES['gambar']['error'] === 4) {
		$gambar = $gambar_lama;
	} else {
		$gambar = upload(); // jalankan fungsi upload di atas
	}

	// query UPDATE DATA
	$query = "UPDATE $table
				SET
					nama_$table = '$nama',
					gambar_$table = '$gambar',
					harga_$table = '$harga',
					ketersediaan = '$ketersediaan'
				WHERE
					id_$table = $id
				";
	
	mysqli_query($conn, $query);

	// cek apakah data berhasil ditambahkan atau tidak
	return mysqli_affected_rows($conn);
}

function daftar($data){
	global $conn;

	$nama = $data['nama'];
	$uname = strtolower(stripslashes($data['username']));
	$password = mysqli_real_escape_string($conn, $data['password']);
	$pw_valid = mysqli_real_escape_string($conn, $data['pw_valid']);

	// cek uname
	$cek_uname = mysqli_query($conn, "SELECT username FROM admin WHERE username = '$uname'");

	if (mysqli_fetch_assoc($cek_uname)) {
		// code...
		echo "<script>
            	alert('Username telah terdaftar!');
            	document.location.href = 'path_admin.php';
          	  </script>";
        return false;
	}

	// cek password
	if ($password !== $pw_valid) {
		// code...
		echo "<script>
            	alert('Password tidak sama!');
				document.location.href = 'path_admin.php';
              </script>";
        return false;
	}

	// enkripsi password
	$password = password_hash($password, PASSWORD_DEFAULT);

	// insert ke database
	mysqli_query($conn, "INSERT INTO admin VALUES (null, '$nama', '$uname', '$password')");

	return mysqli_affected_rows($conn);
}
?>