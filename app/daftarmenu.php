<?php

session_start();


?>

<body>	
	<h2 align="center">Makanan</h2>
	<?php
	if($status=="admin"){
		echo "<a href='insert.php' class='btn btn-success m-2'>Tambah Data Makanan</a>";
	};?>
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
				<input type='number' name='jumlahBeliMakanan' min=1 max=$row[jumlah]>
				<button type='submit' name='addMakanan' class='btn btn-info' >Tambah Ke Piring</button>
				</form> 
					"?>
						<?php if($status=="admin"){
							echo "<a href='daftarmenu.php?del=$row[id_menu]' class='btn btn-warning'>Edit </a> ";
							echo "<a href='daftarmenu.php?del=$row[id_menu]' class='btn btn-danger'>Delete </a>";
						}
						;?><?php
				"</td>
			</tr>
			";
		$no++;
		}
		?>
	</table>

	<h2 align="center">Minuman</h2>
	<?php 
	if($status=="admin"){
		echo "<a href='insert.php' class='btn btn-success m-2'>Tambah Data Minuman</a>";
	};?>
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
					<input type='number' name='jumlahBeliMinuman' min=1 max=$row[jumlah_minuman]>
					<button type='submit' name='addMinuman' class='btn btn-info' >Tambah Ke Piring</button>
					</form> 
					"?>
						<?php if($status=="admin"){
							echo "<a href='daftarmenu.php?del=$row[id_minum]' class='btn btn-warning'> Edit </a> ";
							echo "<a href='view.php?del=$row[id_minum]' class='btn btn-danger'> Delete </a> ";
						}
						;?><?php
				"</td>
			</tr>
			";
			$no++;
		}
		?>
	</table>

</body>
</html>
