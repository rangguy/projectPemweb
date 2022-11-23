<?php

session_start();
include '../../auth/config.php';
$status = $_SESSION['status'];

?>
<!doctype html>
<html lang="en">
  <head>
  	<title>SIT APP</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
		
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="css/style.css">
  </head>
  <body>
		
		<div class="wrapper d-flex align-items-stretch">
			<nav id="sidebar">
				<div class="custom-menu">
					<button type="button" id="sidebarCollapse" class="btn btn-primary">
	        </button>
        </div>
	  		<div class="img bg-wrap text-center py-4" style="background-image: url(images/bg_1.jpg);">
	  			<div class="user-logo">
	  				<div class="img" style="background-image: url(images/profilkosong.png);"></div>
	  				<h3>
              <?php 
                  if(!$_SESSION['user']){
                    header("location:../../index.php");
                  }else{
                    echo $_SESSION['user'];  
                  }
                ?>   
            </h3>
	  			</div>
	  		</div>
        <ul class="list-unstyled components mb-5">
          <li >
            <a href="home.php?page=profil"><span class="fa mr-3"></span> Home</a>
          </li>
          <li >
            <a href='home.php?page=datauser'><span class='fa mr-3'></span> Data User</a>
          </li>
          <li class="">
            <a href="home.php?page=daftarmenu"><span class="fa mr-3"></span> Daftar Menu</a>
          </li>
          <li class="">
            <a href="home.php?page=piring"><span class="fa mr-3"></span> Piring</a>
          </li>
          <li class="">
            <a href="../../logout.php"><span class="fa mr-3"></span> Log Out</a>
          </li>
        </ul>

    	</nav>

        <!-- Page Content  -->
      <div id="content" class="p-4 p-md-5 pt-5">
        
        <?php 
        error_reporting(E_ALL ^ E_NOTICE and E_DEPRECATED);
        if(isset($_GET['page'])){
          if($_GET['page'] == 'datauser'){
            $active = "active";
            include '../datauser.php';
          }else if($_GET['page'] == 'daftarmenu'){
            $active = "active";
            include '../daftarmenu.php';
          }else if($_GET['page'] == 'piring'){
            $active = "active";
            include '../cart.php';
          }else if($_GET['page'] == 'insertMakanan'){
            $active = "active";
            include '../insertMakanan.php';
          }else if($_GET['page'] == 'insertMinuman'){
            $active = "active";
            include '../insertMinuman.php';
          }else if($_GET['page'] == 'updateMakanan'){
            $active = "active";
            include '../update/updateMakanan.php';
          }else if($_GET['page'] == 'updateMinuman'){
            $active = "active";
            include '../update/updateMinuman.php';
          }else{
            include '../profil.php';
          }
        }
        ?>
      </div>


		</div>

    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>