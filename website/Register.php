<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Responsive Bootstrap4 Shop Template, Created by Imran Hossain from https://imransdesign.com/">

	<!-- title -->
	<title>Check Out</title>

	<!-- favicon -->
	<link rel="shortcut icon" type="image/png" href="assets/img/favicon.png">
	<!-- google font -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
	<!-- fontawesome -->
	<link rel="stylesheet" href="assets/css/all.min.css">
	<!-- bootstrap -->
	<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
	<!-- owl carousel -->
	<link rel="stylesheet" href="assets/css/owl.carousel.css">
	<!-- magnific popup -->
	<link rel="stylesheet" href="assets/css/magnific-popup.css">
	<!-- animate css -->
	<link rel="stylesheet" href="assets/css/animate.css">
	<!-- mean menu css -->
	<link rel="stylesheet" href="assets/css/meanmenu.min.css">
	<!-- main style -->
	<link rel="stylesheet" href="assets/css/main.css">
	<!-- responsive -->
	<link rel="stylesheet" href="assets/css/responsive.css">

</head>
<body>
	
	<!--PreLoader-->
    <div class="loader">
        <div class="loader-inner">
            <div class="circle"></div>
        </div>
    </div>
    <!--PreLoader Ends-->
	
	
	<?php
    include('header.php');
    ?>
	<?php
    include('connection.php');
    ?>

	<!-- search area -->
	<div class="search-area">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<span class="close-btn"><i class="fas fa-window-close"></i></span>
					<div class="search-bar">
						<div class="search-bar-tablecell">
							<h3>Search For:</h3>
							<input type="text" placeholder="Keywords">
							<button type="submit">Search <i class="fas fa-search"></i></button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end search arewa -->
	
	<!-- breadcrumb-section -->
	<div class="breadcrumb-section breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
						<h1>Register</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->

	<!-- check out section -->
	<div class="checkout-section mt-150 mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="checkout-accordion-wrap">
						<div class="accordion" id="accordionExample">
						  <div class="card single-accordion">
						    <div class="card-header" id="headingOne">
						      <h5 class="mb-0">
						        <button  type="button" >
						          Billing Address
						        </button>
						      </h5>
						    </div>

						    <div  class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
						      <div class="card-body">
						        <div class="billing-address-form">
						        	<form method="post">
						        		<p><input type="text" placeholder="Name" name="name" required></p>
						        		<p><input type="email" placeholder="Email" name="email" required></p>
						        		<p><input type="text" placeholder="Address"name="address" required></p>
						        		<p><input type="tel" placeholder="Phone" name="phone" required></p>
										<p><input type="password" placeholder="Password" name="pass" required></p>
										<p><input type="password" placeholder="Re Enter Password" name="repass" required></p>
						        	
						        </div>
						      </div>
                              <center><input type="submit" class="cart-btn" value="Register" name="register"></center>
						    </div>
                            </form>
						  </div>
						  </div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end check out section -->
             <?php
             
            if(isset($_POST['register']))
            {
              $name = $_POST['name'];
              $email = $_POST['email'];
              $address = $_POST['address'];
              $phno = $_POST['phone'];
			  $pass = $_POST['pass'];

            $sqcheck="SELECT * from userregistration where email='$email' or phoneno='$phno'";
            $res= mysqli_query($conn,$sqcheck);
            $rc=mysqli_num_rows($res);
            if($rc==0)
            {
              $sql = "INSERT INTO userregistration VALUES('','$name','$email','$address','$phno','$pass')";

              if(mysqli_query($conn,$sql))
              {
                echo "<script>alert('Enter Successfull');</script>" ;
              }
              else
              {
                echo "<script>alert('Enter Unsuccessfull');</script>" ;
              }
            }
            else
            {
              echo "<script>alert('Already Exist');</script>" ;
            }
            }
            ?>
	<?php
	include('logo.php');
	?>
	
	<?php
	include('endfooter.php');
	?>
	<?php
	include('copyright.php');
	?>
	
	<!-- jquery -->
	<script src="assets/js/jquery-1.11.3.min.js"></script>
	<!-- bootstrap -->
	<script src="assets/bootstrap/js/bootstrap.min.js"></script>
	<!-- count down -->
	<script src="assets/js/jquery.countdown.js"></script>
	<!-- isotope -->
	<script src="assets/js/jquery.isotope-3.0.6.min.js"></script>
	<!-- waypoints -->
	<script src="assets/js/waypoints.js"></script>
	<!-- owl carousel -->
	<script src="assets/js/owl.carousel.min.js"></script>
	<!-- magnific popup -->
	<script src="assets/js/jquery.magnific-popup.min.js"></script>
	<!-- mean menu -->
	<script src="assets/js/jquery.meanmenu.min.js"></script>
	<!-- sticker js -->
	<script src="assets/js/sticker.js"></script>
	<!-- main js -->
	<script src="assets/js/main.js"></script>

</body>
</html>