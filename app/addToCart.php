<?php
include '../auth/config.php';
session_start();

if(isset($_POST['addMinuman'])){
	$updMinuman = $_POST['id_minuman'];
	$jumlahMinuman = $_POST['jumlahMinuman'];
	$jumlahBeliMinuman = intval($_POST['jumlahBeliMinuman']);
    $stokMinuman = $jumlahMinuman - $jumlahBeliMinuman;
	$updateJumlahMinuman = "update minuman set jumlah_minuman='$stokMinuman' where id_minuman='$updMinuman'";
	$queryUpdateMinuman = mysqli_query($conn, $updateJumlahMinuman);
	if($queryUpdateMinuman){
		?>
		<script>alert("Berhasil Memasukkan Ke Piring!"); 
        document.location="home/home.php?page=daftarmenu"</script>
		<?php
	}
}else if(isset($_POST['addMakanan'])){
	$updMakanan = $_POST['id_menu'];
	$jumlahMakanan = $_POST['jumlahMakanan'];
	$jumlahBeliMakanan = intval($_POST['jumlahBeliMakanan']);
    $stokMakanan = $jumlahMakanan - $jumlahBeliMakanan;
	$updateJumlahMakanan = "update menu set jumlah='$stokMakanan' where id_menu='$updMakanan'";
	$queryUpdateMakanan = mysqli_query($conn, $updateJumlahMakanan);
	if($queryUpdateMakanan){
		?>
		<script>alert("Berhasil Memasukkan Ke Piring!"); 
        document.location="home/home.php?page=daftarmenu"</script>
		<?php
	}
}

?>