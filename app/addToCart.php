<?php
include '../auth/config.php';
session_start();

$upd = $_POST['id_minuman'];
$jumlah = $_POST['jumlahMinuman'];
if(isset($_POST['addMinuman'])){
	$jumlahBeli = intval($_POST['jumlahBeliMinuman']);
    $stok = $jumlah - $jumlahBeli;
	$updatejumlah = "update minuman set jumlah_minuman='$stok' where id_minuman='$upd'";
	$queryUpdate = mysqli_query($conn, $updatejumlah);
    $insertPiring = "insert into piring(id_pesanan, nama_pesanan, harga_pesanan, jumlah_pesanan) values('', )";
	if($queryUpdate){
		?>
		<script>alert("Berhasil Memasukkan Ke Piring!"); 
        document.location="home/home.php?page=2"</script>
		<?php
	}
}

?>