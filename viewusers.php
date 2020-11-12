<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="ISO-8859-1">
<link rel="shortcut icon" href="assets/images/logo/logo-dark.png">
<title>Online Banking System</title>
<link href="https://fonts.googleapis.com/css?family=Montserrat:100,200,300,400,500,600,700,800,900" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
<link rel="stylesheet" href="assets/vendors/menu/src/main.menu.css">
<link rel="stylesheet" type="text/css" href="assets/css/style.css">
<link rel="stylesheet" type="text/css" href="assets/css/utilities.css">
<link rel="stylesheet" type="text/css" href="assets/css/colors.css">
<link rel="stylesheet" type="text/css" href="assets/css/colors-gh.css">
<link rel="stylesheet" type="text/css" href="assets/css/colors-g.css">
<!-- CAROUSEL -->
<link rel="stylesheet" href="assets/vendors/owl.carousel/owl.carousel.min.css">
<link rel="stylesheet" href="assets/vendors/owl.carousel/owl.theme.default.min.css">

	<!-- ANIMATE -->
<link rel="stylesheet" type="text/css" href="assets/vendors/animate/animate.css">

	<!-- ANIMATED HEADLINES -->
<link rel="stylesheet" type="text/css" href="assets/vendors/animated-headline/css/style.css">

	<!-- FANCY BOX -->
<link rel="stylesheet" type="text/css" href="assets/vendors/fancybox/jquery.fancybox.min.css">

</head>
<body class="indexPage">
<div>
	<div class="main-header header-shadow cherry-header">
	    <div class="bg-cherry">
	        <div class="container">
	            <div class="row">
	                <div class="col-lg-6 col-md-12">
	                    <div class="text-white mt-10 text-center--md text-center--sm text-center--xs">
	                        Helpline 7382653664
	                    </div>
	                </div>
                  <div class="col-lg-6 col-md-12">
	                    <div class="text-right text-center--md text-center--sm text-center--xs">
	                        <a class="btn btn-white text-cherry text-size-11 text-bold-600 mt-5 mb-5 mt-10--md mb-10--md mt-10--sm mb-10--sm mt-10--xs mb-10--xs text-uppercase" href="#"><i class="zmdi zmdi-account-o text-size-15 mr-6 float-left mt-1"></i>Online Banking System</a>
	                        
	                    </div>
	                </div>
	            </div>
	        </div>
	    </div>
	
	  
	  <div class="container">

			<div class="main-header-container">

				<div class="burger-menu">
					<div class="line-menu line-half first-line"></div>
					<div class="line-menu"></div>
					<div class="line-menu line-half last-line"></div>
				</div> <!-- /BURGER MENU -->

				<nav class="main-menu menu-caret menu-hover-2 submenu-top-border submenu-scale">
					<ul>
						<li><a href="./index.php">Home</a></li>
						<li class="current-menu"><a href="./viewusers.php">View All Users</a></li>
						<li><a href="./transactionDetails.php">Transaction History</a></li>
					</ul>
				</nav> <!-- NAVIGATION MENU -->

			</div> <!-- /HEADER CONTAINER -->

		</div> <!-- /CONTAINER -->
	</div> <!-- /HEADER -->



</head>
<body class="indexPage">
<?php
    require 'config.php';
    $query = "SELECT * FROM users";
    $result = mysqli_query($conn,$query);
?>

     <nav class="navbar navbar-expand-md bg-dark navbar-dark navStyle ">
        <a class="navbar-brand nava" href="#">Online Banking System</a>
      
     </nav>
    <div class="container">
       
            <div class="row">
                <div class="col">
                    <div class="table-responsive-sm">
                    <table class="table table-hover tableStyle table-sm table-res" >
                        <thead>
                            <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email Id</th>
                            <th scope="col">Credits</th>
                            <th scope="col">Operations</th>
                            </tr>
                        </thead>
                        <tbody>
                <?php 
                    while($rows=mysqli_fetch_assoc($result)){
                ?>

                        <tr>
                        <td><?php echo $rows['id'] ?></td>
                        <td><?php echo $rows['name']?></td>
                        <td><?php echo $rows['email']?></td>
                        <td><?php echo $rows['credit']?></td> 
                        <td>
							<a href="selectedUserdetail.php?id= <?php echo $rows['id'] ;?>"class="text-red"> <button type="button" class="btn bg-cherry text-white">View</button></a>
						</td>

                    </tr>
                    <?php
                    }
                        ?>
            
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>  
    
</div>


<script src="assets/js/jquery-3.3.1.min.js"></script>
	<script src="assets/vendors/appear/jquery.appear.min.js"></script>
	<script src="assets/vendors/jquery.easing/jquery.easing.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/vendors/common/common.min.js"></script>

	<!-- FANCY-BOX -->
	<script src="assets/vendors/fancybox/jquery.fancybox.min.js"></script>

	<!-- MENU -->
	<script src="assets/vendors/menu/src/main.menu.js"></script>

	<!-- CAROUSEL -->
	<script src="assets/vendors/owl.carousel/owl.carousel.min.js"></script>

	<!-- ANIMATED-HEADLINES -->
	<script src="assets/vendors/animated-headline/js/animated-headline.js"></script>

	<!-- THEME-CUSTOM -->
	<script src="assets/js/main.js"></script>

	<!-- THEME-INITIALIZATION-FILES -->
	<script src="assets/js/theme.init.js"></script>
	<script src="assets/js/custom.js"></script>
	  
</body>
</html>