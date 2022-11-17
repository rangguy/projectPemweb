<?php

session_start();
include '../auth/config.php';
$upd = $_GET['id_menu'];
$namaMakanan = $_POST['namaMakanan'];
$hargaMakanan = $_POST['hargaMakanan'];
$jumlahMakanan = $_POST['jumlahMakanan'];
if(isset($_POST['updateMakanan'])){
  $sqlUpdate = "update menu set nama_menu='$namaMakanan', harga='$hargaMakanan', jumlah='$jumlahMakanan' where id_menu='$upd'";
  $queryUpdate = mysqli_query($conn, $sqlUpdate);
  if ($queryUpdate){
    ?>
		<!-- Javascript -->
		<script>
			alert('Data Makanan Berhasil Diubah!');
			document.location = '../home/home.php?page=daftarmenu';
		</script>
	<?php
  }
}


$sql = "select * from menu where id_menu = '$upd'";
$query = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($query);
if($row['id_menu']!=""){
  ?>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <h2 align="center">Update Data Makanan</h2>

  <form method="POST" action="<?php $_SERVER['PHP_SELF']?>">
    <div class="row mb-3 mt-5">
      <label for="inputNamaMakanan" class="col-sm-2 col-form-label">Nama Makanan</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="namaMakanan" name="namaMakanan" value="<?php echo $row['nama_menu'];?>">
      </div>
    </div>
    <div class="row mb-3">
      <label for="inputHargaMakanan" class="col-sm-2 col-form-label">Harga Makanan</label>
      <div class="col-sm-10">
        <input type="number" class="form-control" id="hargaMakanan" name="hargaMakanan" value="<?php echo $row['harga'];?>">
      </div>
    </div>
    <div class="row mb-3">
      <label for="jumlahMakanan" class="col-sm-2 col-form-label">Jumlah</label>
      <div class="col-sm-10">
        <input type="number" class="form-control" id="jumlahMakanan" name="jumlahMakanan" value="<?php echo $row['jumlah'];?>">
      </div>
    </div>
    <button type="submit" class="btn btn-primary" name="updateMakanan">Simpan Data</button>
  </form>


  <?php
}

?>
