<?php
    session_start();
    include 'config.php';
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $_SESSION['user'] = $_POST['username'];
    $query = mysqli_query($conn, "SELECT * from user where username = '$username' AND password = '$password'");
    $row1 = mysqli_fetch_array($query);
    if($row1['username']==$username && $row1['password']==$password){     
        ?>
        <script>
        alert("Berhasil Login");
        </script>
        <?php
        $_SESSION['nama'] = $row1['nama'];
        $_SESSION['status'] = $row1['status'];
        $_SESSION['pass'] = $row1['password'];
        header("Location:../app/home/home.php");
    }else{
        ?>
        <script>
        alert("Username atau Password Salah!");
        </script>
        <?php
        header("Location:../index.php");
    }   
?>
