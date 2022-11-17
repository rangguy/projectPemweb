<?php

session_start();

$delMakanan = $_GET['delMakanan'];
if ($delMakanan != "") {
	$sqlDelMakan = "delete from menu where id_menu='$delMakanan' ";
	$queryDelMakan= mysqli_query($conn, $sqlDelMakan);
	if ($queryDelMakan) {
?>
		<!-- Javascript -->
		<script>
			alert('Data Makanan Berhasil Dihapus!');
			document.location = 'home.php?page=daftarmenu';
		</script>
<?php
	}
}
$delMinuman = $_GET['delMinuman'];
if ($delMinuman != "") {
	$sqlDelMinum = "delete from minuman where id_minuman='$delMinuman' ";
	$queryDelMinum= mysqli_query($conn, $sqlDelMinum);
	if ($queryDelMinum) {
?>
		<!-- Javascript -->
		<script>
			alert('Data Minuman Berhasil Dihapus!');
			document.location = 'home.php?page=daftarmenu';
		</script>
<?php
	}
}


?>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">

<body>	
	<h2 align="center">Makanan</h2>
	<a href='home.php?page=insertMakanan' class='btn btn-success m-2'>Tambah Data Makanan</a>
	<table class="table table-bordered table-striped table-hover table-responsive-sm">
		<tr class="thead-dark">
			<th>No</th>
			<th>Nama</th>
			<th>Harga</th>
			<th>Jumlah</th>
			<th>Aksi</th>
		</tr>
		<?php
		$no = 1;
		$status = $_SESSION['status']; 
		$sql = "SELECT * from menu order by harga asc";
		$query = mysqli_query($conn, $sql); 
		while ($row = mysqli_fetch_array($query)) {
			echo "
			<tr>
				<td>$no</td>
				<td>$row[nama_menu]</td>
				<td>$row[harga]</td>
				<td>$row[jumlah]</td>
				<td> 
				<form method='post' action='../addToCart.php'>
				<input type='number' name='jumlahMakanan' value='$row[jumlah]' hidden>
				<input type='text' name='id_menu' value='$row[id_menu]' hidden>
				<input type='number' name='jumlahBeliMakanan' min=1 max=$row[jumlah]>
				<button type='submit' name='addMakanan' class='btn btn-info' >Tambah Ke Piring</button>
				</form> 
				<a href='home.php?page=updateMakanan&&id_menu=$row[id_menu]' class='btn btn-warning' ><i class='bi bi-pen' ></i> </a>
				<a href='home.php?page=daftarmenu&&delMakanan=$row[id_menu]' class='btn btn-danger'><i class='bi bi-trash'></i> </a>
				</td>
			</tr>
			";
		$no++;
		}
		?>
	</table>

	<h2 align="center">Minuman</h2>
	<a href='home.php?page=insertMinuman' class='btn btn-success m-2'>Tambah Data Minuman</a>
	<table class="table table-bordered table-striped table-hover table-responsive-sm">
		<tr class="thead-dark">
			<th>No</th>
			<th>Nama</th>
			<th>Harga</th>
			<th>Jumlah</th>
			<th>Aksi</th>
		</tr>
		<?php
		$no = 1;
		$sql = "SELECT * from minuman order by harga_minuman asc";
		$query = mysqli_query($conn, $sql);
		while ($row = mysqli_fetch_array($query)) {
			echo "
			<tr>
				<td>$no</td>
				<td>$row[nama_minuman]</td>
				<td>$row[harga_minuman]</td>
				<td>$row[jumlah_minuman]</td>
				<td>
					<form method='post' action='../addToCart.php'>
					<input type='number' name='jumlahMinuman' value='$row[jumlah_minuman]' hidden>
					<input type='text' name='id_minuman' value='$row[id_minuman]' hidden>
					<input type='number' name='jumlahBeliMinuman' min=1 max=$row[jumlah_minuman]>
					<button type='submit' name='addMinuman' class='btn btn-info' >Tambah Ke Piring</button>
					</form> 
					<a href='home.php?page=updateMinuman&&id_minuman=$row[id_minuman]' class='btn btn-warning'> <i class='bi bi-pen' ></i> </a> 
					<a href='home.php?page=daftarmenu&&delMinuman=$row[id_minuman]' class='btn btn-danger'> <i class='bi bi-trash'></i> </a> 
				</td>
			</tr>
			";
			$no++;
		}
		?>
	</table>

</body>
</html>
