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

function tambah($data) {
	global $conn;
	// data pesanan
	$nama = htmlspecialchars($data['nama']);
	$telp = htmlspecialchars($data['telp']);
	$alamat = htmlspecialchars($data['alamat']);
	$pesanan = $data['pesanan'];
	$jumlah = $data['jumlah'];
	$ket = htmlspecialchars($data['ket']);

	// query INSERT DATA
	$query = "INSERT INTO kontak
				VALUES
				(null, '$nama', '$telp', '$alamat', '$pesanan', '$jumlah', '$ket')
				";
	mysqli_query($conn, $query);

	// cek apakah data berhasil ditambahkan atau tidak
	return mysqli_affected_rows($conn);
}

?>