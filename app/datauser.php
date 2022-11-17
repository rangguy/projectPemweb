<?php
include '../auth/config.php';
session_start();

$del = $_GET['del_user'];
if ($del != "") {
	$sql = "delete from user where id='$del' ";
	$query = mysqli_query($conn, $sql);
	if ($query) {
?>
		<!-- Javascript -->
		<script>
			alert('Data user Berhasil Dihapus!');
			document.location = 'home/home.php?page=1';
		</script>
<?php
	}
}
?>

<script>
function cekDel(){
	alert("Tidak Dapat Menghapus User!");
}
</script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
<h2 align="center">Data User</h2>
	<a href='../form/formuser.php' class="btn btn-success m-2">Tambah Data User</a>
	<table class="table table-bordered table-striped table-hover table-responsive-sm">
		<tr class="table-primary">
			<th>No</th>
			<th>Nama</th>
			<th>User</th>
			<th>Status</th>
			<th>Aksi</th>
		</tr>
		<?php
		$no = 1;
		$sql = "SELECT * from user";
		$query = mysqli_query($conn, $sql); 
		while ($row = mysqli_fetch_array($query)) {
			echo "
			<tr>
				<td>$no</td>
				<td>$row[nama]</td>
				<td>$row[username]</td>
				<td>$row[status]</td>
				<td>
					<a href='../form/edit-data.php?upd_user=$row[id]' class='btn btn-warning' > <i class='bi bi-pen' ></i></a> ";	
					if ($row['username']==$_SESSION['user'] | $_SESSION['status'] !="Owner"){
						echo "<a href='' class='btn btn-danger' onclick='return cekDel();' > <i class='bi bi-trash'></i> </a> ";
					}else{
						echo "<a href='../datauser.php?del_user=$row[id]' class='btn btn-danger'> <i class='bi bi-trash'></i> </a> ";
					}"				
				</td>
			</tr>
			";
			$no++;
		}
		?>
	
	</table>
