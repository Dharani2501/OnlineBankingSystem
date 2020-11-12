
<?php
include 'config.php';

if(isset($_POST['submit']))
{
    $from = $_GET['id'];
    $toUser = $_POST['to'];
    $amnt = $_POST['amount'];

    $sql = "SELECT * from users where id=$from";
    $query = mysqli_query($conn,$sql);
    $sql1 = mysqli_fetch_array($query); // returns array or output of user from which the credits are to be transferred.

    $sql = "SELECT * from users where id=$toUser";
    $query = mysqli_query($conn,$sql);
    $sql2 = mysqli_fetch_array($query);

  //if amount that we are gonna deduct from any user is
  // greater than the current credits available then print insufficient balance.
 if($amnt > $sql1['credit']) 
    {
        
        echo '<script type="text/javascript">';
        echo ' alert("Insufficient Balance")';  // showing an alert box.
        echo '</script>';
    }
    
 else if($amnt == 0){
     echo "<script type='text/javascript'>alert('Enter Amount Greater than Zero');
</script>";
 }
    else {
        
        //if not then deduct the credits from the user's account that we selected.
        $newCredit = $sql1['credit'] - $amnt;
        $sql = "UPDATE users set credit=$newCredit where id=$from";
        mysqli_query($conn,$sql);
     


        $newCredit = $sql2['credit'] + $amnt;
        $sql = "UPDATE users set credit=$newCredit where id=$toUser";
        mysqli_query($conn,$sql);
           
        $sender = $sql1['name'];
        $receiver = $sql2['name'];
        $sql = "INSERT INTO `transaction`(`sender`,`receiver`, `amount`) VALUES ('$sender','$receiver','$amnt')";
        $tns=mysqli_query($conn,$sql);
        if($tns){
           echo "<script type='text/javascript'>alert('Transaction Successfull!');
window.location='transactionDetails.php';
</script>";
        }
       
        $newCredit= 0;
        $amnt =0;
       
     
    }
    
}
?>


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
                        <li><a class="navbar-brand nava" href="#">Credit Management System</a>
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


    <div class="container">
        <h1>Credits Transfer Process</h1>
        <form method="post" name="tcredit"><br/>
            <?php
                include 'config.php';
                $sid=$_GET['id'];
                $sql = "SELECT * FROM  users where id=$sid";
                $query=mysqli_query($conn,$sql);
                if(!$query)
                {
                    echo "Error ".$sql."<br/>".mysqli_error($conn);
                }
                $rows=mysqli_fetch_array($query);
            ?>
            <label> Credits Transfer From: </label><br/>
        <div class="table-responsive">
        <table class="table text-center table-striped table-hover tableStyle">

            <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Email</th>
            <th>Credits</th>
            </tr>

            <tr>
                <td><?php echo $rows['id']?></td>
                <td><?php echo $rows['name'] ;?></td>
                <td><?php echo $rows['email'] ;?></td>
                <td><?php echo $rows['credit'] ;?></td>
            </tr>
            
        </table>
              </div>
            <center><label for="fname">Credits Transfer To:</label></center>
        <center><select class="form-control bg-white col-lg-6 col-md-12"  name="to" style="margin-bottom:5%;" required>
            <option value="" disabled selected> To </option>
            <?php
                include 'config.php';
                $sid=$_GET['id'];
                $sql = "SELECT * FROM users where id!=$sid";
                $query=mysqli_query($conn,$sql);
                if(!$query)
                {
                    echo "Error ".$sql."<br/>".mysqli_error($conn);
                }
                while($rows = mysqli_fetch_array($query)) {
            ?>
                <option class="table text-center table-striped " value="<?php echo $rows['id'];?>" >
                
                    <?php echo $rows['name'] ;?> (Credits: 
                    <?php echo $rows['credit'] ;?> ) 
               
                </option>
            <?php 
                } 
            ?>
        </select> <br>
            <center><label for="fname">Enter Number of CREDITS to be Transferred:</label></center>
           <center><div class="col-lg-6 col-md-12"> <input type="number" id="amm" class="form-control" name="amount" min="0" required/> 
            <br>
                <div class="text-center btn3">
                    <button name="submit" type="submit" class="btn bg-cherry text-white">Transfer</button>
                        
           
            </div>
        </form>
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