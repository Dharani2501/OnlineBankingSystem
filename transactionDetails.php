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
						<li><a href="./viewusers.php">View All Users</a></li>
						<li class="current-menu"><a href="./transactionDetails.php">Transaction History</a></li>
					</ul>
				</nav> <!-- NAVIGATION MENU -->

			</div> <!-- /HEADER CONTAINER -->

		</div> <!-- /CONTAINER -->
	</div> <!-- /HEADER -->
    
   
</head>

<body class="indexPage">

<nav class="navbar navbar-expand-md bg-dark navbar-dark navStyle ">
        <a class="navbar-brand nava" href="#">Online Banking System</a>
      
     </nav>
        <div class="container divStyle">
        <h2 class="text-center">Transaction History</h2>
        
       <br>
       <div class="table-responsive-sm">
    <table class="table text-center table-striped table-hover tableStyle ">
            <thead>
            <tr>
            <th>Sender</th>
            <th>Receiver</th>
            <th>Credits</th>
        
            </tr>
        </thead>
        <tbody>
            <?php

            include 'config.php';

            $sql ="select * from transaction";

            $query =mysqli_query($conn, $sql);

            while($rows = mysqli_fetch_array($query))
            {
                ?>
            <tr>
           
            <td><?php echo $rows['sender']; ?></td>
            <td><?php echo $rows['receiver']; ?></td>
            <td><?php echo $rows['amount']; ?> </td>
                
            <?php
            }

            ?>
            


        </tbody>
    </table>
    </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

</body>
</html>