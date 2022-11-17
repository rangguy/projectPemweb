<?php

session_start();
include '../auth/config.php';
$updMinuman = $_GET['id_minuman'];
$namaMinuman = $_POST['namaMinuman'];
$hargaMinuman = $_POST['hargaMinuman'];
$jumlahMinuman = $_POST['jumlahMinuman'];
if(isset($_POST['updateMinuman'])){
  $sqlUpdate = "update minuman set nama_minuman='$namaMinuman', harga_minuman='$hargaMinuman', jumlah_minuman='$jumlahMinuman' where id_minuman='$updMinuman'";
  $queryUpdate = mysqli_query($conn, $sqlUpdate);
  if ($queryUpdate){
    ?>
		<!-- Javascript -->
		<script>
			alert('Data Minuman Berhasil Diubah!');
			document.location = '../home/home.php?page=daftarmenu';
		</script>
	<?php
  }
}


$sql = "select * from minuman where id_minuman = '$updMinuman'";
$query = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($query);
if($row['id_minuman']!=""){
  ?>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <h2 align="center">Update Data Minuman</h2>

  <form method="POST" action="<?php $_SERVER['PHP_SELF']?>">
    <div class="row mb-3 mt-5">
      <label for="inputNamaMinuman" class="col-sm-2 col-form-label">Nama Minuman</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="namaMinuman" name="namaMinuman" value="<?php echo $row['nama_minuman'];?>">
      </div>
    </div>
    <div class="row mb-3">
      <label for="inputHargaMinuman" class="col-sm-2 col-form-label">Harga Minuman</label>
      <div class="col-sm-10">
        <input type="number" class="form-control" id="hargaMinuman" name="hargaMinuman" value="<?php echo $row['harga_minuman'];?>">
      </div>
    </div>
    <div class="row mb-3">
      <label for="jumlahMinuman" class="col-sm-2 col-form-label">Jumlah</label>
      <div class="col-sm-10">
        <input type="number" class="form-control" id="jumlahMinuman" name="jumlahMinuman" value="<?php echo $row['jumlah_minuman'];?>">
      </div>
    </div>
    <button type="submit" class="btn btn-primary" name="updateMinuman">Simpan Data</button>
  </form>


  <?php
}

?>
