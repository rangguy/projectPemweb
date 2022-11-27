<?php

session_start();
include '../auth/config.php';
$delPesanan = $_GET['delPesanan'];
if ($delPesanan != "") {
	$sqlDelPesanan = "delete from pesanan where id_Pesanan='$delPesanan' ";
	$queryDelPesanan = mysqli_query($conn, $sqlDelPesanan);
	if ($queryDelPesanan) {
?>
		<!-- Javascript -->
		<script>
			alert('Data Pesanan Berhasil Dihapus!');
			document.location = 'home.php?page=piring';
		</script>
<?php
	}
}
?>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">

<body>
	<div id="pesanan">
		<h2 align="center">Pesanan</h2>
		<a href='home.php?page=daftarmenu' class='btn btn-success m-2'>Tambah Pesanan</a>
		<table class="table table-bordered table-striped table-hover table-responsive-sm">
			<tr class="thead-dark">
				<th>No</th>
				<th>Nama</th>
				<th>Jumlah</th>
				<th>Harga</th>
				<th>Aksi</th>
			</tr>
			<?php
			$no = 1;
			$harga = 0;
			$sql = "SELECT * from pesanan";
			$query = mysqli_query($conn, $sql);
			while ($row = mysqli_fetch_array($query)) {
				echo "
					<tr>
						<td>$no</td>
						<td>$row[nama]</td>
						<td>$row[jumlah]</td>
						<td>$row[totalHarga]</td>
						<td>
						<a href='home.php?page=piring&&delPesanan=$row[id_pesanan]' class='btn btn-danger'><i class='bi bi-trash'></i> </a>
                        </td>
					</tr>
					";
				$no++;
				$harga = $row['totalHarga'] + $harga;
			}
			echo "<tr>
					<td colspan=3><b>Total Harga</b></td>
					<td> $harga</td>
				";
			?>
			<td>
				Tunai
				<input type="text" name="uangBayar" id="uangBayar" size="4"><br>
				<!-- Button trigger modal-->
				<button type="button" class="btn btn-primary mt-2" data-toggle="modal" data-target="#exampleModal">
					Bayar
				</button>

				<!-- Modal -->
				<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog modal-dialog-scrollable" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLabel">Bayar</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<table width="100%">
									<tr>
										<th>Item</th>
										<th>Harga</th>
									</tr>
									<?php
									$i = 0;
									$sql = "SELECT * from pesanan";
									$query = mysqli_query($conn, $sql);
									while ($row = mysqli_fetch_array($query)) {
										echo "
										<tr>
											<td>$row[nama] x $row[jumlah]</td>
											<td>$row[totalHarga]</td>
										</tr>
										";
										$i++;
									}
									echo "<tr>
									<td><b>Total Harga</b></td>
									<td> $harga</td>
									</tr>
									<tr>
									<td><b>Tunai</b></td>
									<td>$tunai</td>
									</tr>
									<td><b>Kembalian</b></td>
									<td>$kembalian</td>
									</tr>
									";
									?>
								</table>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
								<a href="../deletePesanan.php"><button class="btn btn-primary">Lunas</button></a>
							</div>
						</div>
					</div>
				</div>
			</td>
			</tr>
		</table>
	</div>
</body>