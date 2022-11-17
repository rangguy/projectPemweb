<?php
session_start();
include '../../auth/config.php';
$upd = $_GET['upd_user'];

$nama = $_POST['nama'];
$user = $_POST['username'];
$password = md5($_POST['password']);
$status = $_POST['status'];

if(isset($_POST['update'])){
	$sql = "update user set nama='$nama',username = '$user',password='$password',status='$status' where id='$upd' ";
	$query = mysqli_query($conn, $sql);
	if($query){
		?>
		<script>
			alert("Berhasil Update Data User!");
            document.location='../home/home.php?page=1';
			</script>
		<?php
	}
}
$sql = "SELECT * from user where id='$upd'";
$query = mysqli_query($conn, $sql);
$row1 = mysqli_fetch_array($query);

?>
<?php
if($row1['id'] != ""){
?>
	<!-- Required meta tags-->
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Colorlib Templates">
	<meta name="author" content="Colorlib">
	<meta name="keywords" content="Colorlib Templates">

	<!-- Title Page-->
	<title>Form Edit</title>

	<!-- Icons font CSS-->
	<link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
	<link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
	<!-- Font special for pages-->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">

	<!-- Vendor CSS-->
	<link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
	<link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

	<!-- Main CSS-->
	<link href="css/main.css" rel="stylesheet" media="all">

	</head>

	<body>
	<div class="page-wrapper bg-gra-03 p-t-45 p-b-50">
		<div class="wrapper wrapper--w790">
			<div class="card card-5">
				<div class="card-heading">
					<h2 class="title">Update Data SIMTI</h2>
				</div>
				<div class="card-body">
					<form method="POST" action="<?php $_SERVER['PHP_SELF']?>">
						<div class="form-row">
							<div class="name">Nama Lengkap</div>
							<div class="value">
								<div class="input-group">
									<input class="input--style-5" type="text" name="nama" id="nama" value="<?php echo $row1['nama'];?>">
								</div>
							</div>
						</div>
						<div class="form-row">
							<div class="name">Username</div>
							<div class="value">
								<div class="input-group">
									<input class="input--style-5" type="text" name="username" id="username" value="<?php echo $row1['username'];?>">
								</div>
							</div>
						</div>
						<div class="form-row">
							<div class="name">Password</div>
							<div class="value">
								<div class="input-group">
									<input class="input--style-5" type="password" name="password" id="password" value="<?php echo $row1['password'];?>">
								</div>
							</div>
						</div>
						<div class="form-row">
							<div class="name">Status</div>
							<div class="value">
								<div class="input-group">
									<select name="status" class="input--style-5">
									<?php
										$stat = array("Owner", "Admin");
										foreach ($stat as $stat){
											if ($stat == $row1['status']) {
												echo "<option value='$stat' selected> $stat </option>";
											} else {
												echo "<option value='$stat'> $stat </option>";
											}
										}
										?>
									</select>
								</div>
							</div>
						</div>
					
						<div>
							<button class="btn btn--radius-2 btn--red" type="submit" name="update">Simpan</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

	<!-- Jquery JS-->
	<script src="vendor/jquery/jquery.min.js"></script>
	<!-- Vendor JS-->
	<script src="vendor/select2/select2.min.js"></script>
	<script src="vendor/datepicker/moment.min.js"></script>
	<script src="vendor/datepicker/daterangepicker.js"></script>

	<!-- Main JS-->
	<script src="js/global.js"></script>

	</body><!-- This templates was made by Colorlib (https://colorlib.com) -->



<?php
}

?>
<head>
