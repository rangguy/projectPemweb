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
          <li class="active">
            <a href="home.php"><span class="fa mr-3"></span> Home</a>
          </li>
          <?php 
            if($status == "admin"){
              echo "
              <li>
                <a href='home.php?page=1'><span class='fa mr-3'></span> Data User</a>
              </li>";
            }
          ?> 
          <li>
            <a href="home.php?page=2"><span class="fa mr-3"></span> Daftar Menu</a>
          </li>
          <li>
            <a href="home.php?page=3"><span class="fa mr-3"></span> Piring</a>
          </li>
          <li>
            <a href="../../logout.php"><span class="fa mr-3"></span> Log Out</a>
          </li>
        </ul>

    	</nav>

        <!-- Page Content  -->
      <div id="content" class="p-4 p-md-5 pt-5">
        
        <?php 
        error_reporting(E_ALL ^ E_NOTICE and E_DEPRECATED);
          switch($_GET['page']){
            case 1:
              include '../datauser.php';
              break;
            case 2:
              include '../daftarmenu.php';
              break;
            case 3:
              include '../cart.php';
              break;
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