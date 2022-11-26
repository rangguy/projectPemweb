<?php
session_start();
include '../auth/config.php';

$sql = "TRUNCATE TABLE pesanan";
$query = mysqli_query($conn, $sql);
?> 
<script>
    document.location = "home/home.php?page=piring";
</script>
<?php
?>