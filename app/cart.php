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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

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
			<script>
				$(document).ready(function() {
					$("#uangBayar").keyup(function() {
						var uangBayar = $("#uangBayar").val(); 
						var harga = <?php echo $harga ?>;
						
						var kembalian = parseInt(uangBayar) - parseInt(harga);
					
					$("#kembalian").val(kembalian);});
				});
			</script>
			<td>
				<!-- Button trigger modal-->
				<input type="button" name="btn" id="submitBtn" value="Bayar" data-toggle="modal" data-target="#exampleModal" class="btn btn-primary mt-2">
				<!-- Modal -->
				<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog modal-dialog-scrollable" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLabel">Warung Siti</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<?php
								 $nilaiTunai = isset($_POST['uangBayar']) ?$_POST['uangBayar']: '';
								 $nilaiKembalian = isset($_POST['kembalian']) ?$_POST['kembalian']: '';
								?>
								<table width="100%">
									<tr>
										<th>Total Harga</th>
										<th><?php echo $harga; ?></th>
									</tr>
									<tr>
										<th>Tunai</th>
										<td>
											<input type="text" name="uangBayar" id="uangBayar" value="<?php echo $tunai; ?>">
										</td>
									</tr>

									<tr>
										<th>Kembalian</th>
										<td>
											<input type="text" name="kembalian" id="kembalian" value="<?php echo $nilaiKembalian ?>">
										</td>
									</tr>
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
