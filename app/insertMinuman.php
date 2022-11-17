<?php

session_start();
include '../../auth/config.php';
$namaMinuman = $_POST['namaMinuman'];
$hargaMinuman = $_POST['hargaMinuman'];
$jumlahMinuman = $_POST['jumlahMinuman'];
if(isset($_POST['insertMinuman'])){
    $sqlInsert = "INSERT INTO minuman(id_minuman, nama_minuman, harga_minuman, jumlah_minuman) VALUES ('', '$namaMinuman', '$hargaMinuman', '$jumlahMinuman')";
    $queryInsert = mysqli_query($conn, $sqlInsert);
    $sqlSelect = "SELECT * FROM menu";
    $querySelect = mysqli_query($conn, $sqlSelect);
    $row = mysqli_fetch_array($querySelect);
    if($queryInsert && $namaMinuman!=$row['nama_minuman']){
        ?>
		<script>
            alert("Berhasil Memasukkan Data Minuman!");
            document.location='home.php?page=daftarmenu';
        </script>
		<?php
	}else {
        ?>
		<script>
            alert("Nama Minuman telah dimasukkan!");
        </script>
		<?php
    }
}

?>


<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<h2 align="center">Insert Minuman</h2>

<form method="POST" action="<?php $_SERVER['PHP_SELF']?>">
  <div class="row mb-3 mt-5">
    <label for="inputNamaMinuman" class="col-sm-2 col-form-label">Nama Minuman</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="namaMinuman" name="namaMinuman">
    </div>
  </div>
  <div class="row mb-3">
    <label for="inputHargaMinuman" class="col-sm-2 col-form-label">Harga Minuman</label>
    <div class="col-sm-10">
      <input type="number" class="form-control" id="hargaMinuman" name="hargaMinuman">
    </div>
  </div>
  <div class="row mb-3">
    <label for="jumlahMinuman" class="col-sm-2 col-form-label">Jumlah</label>
    <div class="col-sm-10">
      <input type="number" class="form-control" id="jumlahMinuman" name="jumlahMinuman">
    </div>
  </div>
  <button type="submit" class="btn btn-primary" name="insertMinuman">Simpan Data</button>
</form>
