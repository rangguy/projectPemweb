<?php
session_start();
include '../auth/config.php';
$id = $_SESSION['id'];
$nama = $_SESSION['nama'];
$user = $_SESSION['user'];
$status = $_SESSION['status'];
$pass = $_SESSION['pass'];

?>

</script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
<h2 align="center">Profil User</h2>
<table class="table table-bordered table-striped table-hover table-responsive-sm mt-4">
    <?php
    echo "<tr>
            <td><b>Nama</b></td>
            <td>$nama</td>
        </tr>
        <tr>
            <td><b>Username</b></td>
            <td>$user</td>
        </tr>
        <tr>
            <td><b>Status</b></td>
            <td>$status</td>
        </tr>
        <tr>
            <td colspan='2'><a href='../form/edit-data.php?upd_user=$id' class='btn btn-warning'> <i class='bi bi-pen' ></i></a></td>
        </tr>
        ";
    ?>

</table>