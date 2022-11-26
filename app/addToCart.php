<?php
session_start();
include '../auth/config.php';

if(isset($_POST['addMinuman'])){
	$updMinuman = $_POST['id_minuman'];
	$jumlahMinuman = $_POST['jumlahMinuman'];
	$jumlahBeliMinuman = intval($_POST['jumlahBeliMinuman']);
    $stokMinuman = $jumlahMinuman - $jumlahBeliMinuman;
	$updateJumlahMinuman = "update minuman set jumlah_minuman='$stokMinuman' where id_minuman='$updMinuman'";
	$queryUpdateMinuman = mysqli_query($conn, $updateJumlahMinuman);
	if($queryUpdateMinuman){
		$sqlNama = "select nama_minuman from minuman where id_minuman ='$updMinuman'";
		$queryNama = mysqli_query($conn, $sqlNama);
		while ($row = $queryNama->fetch_assoc()) {
			$nama = $row['nama_minuman'];
		}
		$sqlHargaMinuman = "select harga_minuman from minuman where id_minuman='$updMinuman'";
		$queryHargaMinuman = mysqli_query($conn, $sqlHargaMinuman);
		while ($row = $queryHargaMinuman->fetch_assoc()) {
			$harga = $row['harga_minuman'];
		}
		$hargaMinuman = $jumlahBeliMinuman * $harga;
		$sqlInsertPesanan = "insert into pesanan (id_pesanan, nama, jumlah, totalHarga) values('', 
		'$nama', '$jumlahBeliMinuman','$hargaMinuman')";
		$queryInsertPesanan = mysqli_query($conn, $sqlInsertPesanan);
		if($queryInsertPesanan){
			?>
			<script>alert("Berhasil Memasukkan Ke Piring!"); 
			document.location="home/home.php?page=daftarmenu"</script>
			<?php
		}
	}
}else if(isset($_POST['addMakanan'])){
	$updMakanan = $_POST['id_menu'];
	$jumlahMakanan = $_POST['jumlahMakanan'];
	$jumlahBeliMakanan = intval($_POST['jumlahBeliMakanan']);
    $stokMakanan = $jumlahMakanan - $jumlahBeliMakanan;
	$updateJumlahMakanan = "update menu set jumlah='$stokMakanan' where id_menu='$updMakanan'";
	$queryUpdateMakanan = mysqli_query($conn, $updateJumlahMakanan);
	if($queryUpdateMakanan){
		$sqlNama = "select nama_menu from menu where id_menu ='$updMakanan'";
		$queryNama = mysqli_query($conn, $sqlNama);
		while ($row = $queryNama->fetch_assoc()) {
			$nama = $row['nama_menu'];
		}
		$sqlHargaMakanan = "select harga from menu where id_menu='$updMakanan'";
		$queryHargaMakanan = mysqli_query($conn, $sqlHargaMakanan);
		while ($row = $queryHargaMakanan->fetch_assoc()) {
			$harga = $row['harga'];
		}
		$hargaMakanan = $jumlahBeliMakanan * $harga;
		$sqlInsertPesanan = "insert into pesanan (id_pesanan, nama, jumlah, totalHarga) values('', 
		'$nama', '$jumlahBeliMakanan','$hargaMakanan')";
		$queryInsertPesanan = mysqli_query($conn, $sqlInsertPesanan);
		if($queryInsertPesanan){
			?>
			<script>alert("Berhasil Memasukkan Ke Piring!"); 
			document.location="home/home.php?page=daftarmenu"</script>
			<?php
		}
	}
}
?>