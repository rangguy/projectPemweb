<?php

session_start();
include '../../auth/config.php';
$namaMakanan = $_POST['namaMakanan'];
$hargaMakanan = $_POST['hargaMakanan'];
$jumlahMakanan = $_POST['jumlahMakanan'];
if(isset($_POST['insertMakanan'])){
    $sqlInsert = "INSERT INTO menu(id_menu, nama_menu, harga, jumlah) VALUES ('', '$namaMakanan', '$hargaMakanan', '$jumlahMakanan')";
    $queryInsert = mysqli_query($conn, $sqlInsert);
    $sqlSelect = "SELECT * FROM menu";
    $querySelect = mysqli_query($conn, $sqlSelect);
    $row = mysqli_fetch_array($querySelect);
    if($queryInsert && $namaMakanan!=$row['nama_menu']){
        ?>
		<script>
            alert("Berhasil Memasukkan Data Makanan!");
            document.location='home.php?page=daftarmenu';
        </script>
		<?php
	}else {
        ?>
		<script>
            alert("Nama Makanan telah dimasukkan!");
        </script>
		<?php
    }
}

?>


<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<h2 align="center">Insert Makanan</h2>

<form method="POST" action="<?php $_SERVER['PHP_SELF']?>">
  <div class="row mb-3 mt-5">
    <label for="inputNamaMakanan" class="col-sm-2 col-form-label">Nama Makanan</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="namaMakanan" name="namaMakanan">
    </div>
  </div>
  <div class="row mb-3">
    <label for="inputHargaMakanan" class="col-sm-2 col-form-label">Harga Makanan</label>
    <div class="col-sm-10">
      <input type="number" class="form-control" id="hargaMakanan" name="hargaMakanan">
    </div>
  </div>
  <div class="row mb-3">
    <label for="jumlahMakanan" class="col-sm-2 col-form-label">Jumlah</label>
    <div class="col-sm-10">
      <input type="number" class="form-control" id="jumlahMakanan" name="jumlahMakanan">
    </div>
  </div>
  <button type="submit" class="btn btn-primary" name="insertMakanan">Simpan Data</button>
</form>
