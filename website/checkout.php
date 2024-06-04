<?php session_start();
?>
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
    <!-- <div class="loader">
        <div class="loader-inner">
            <div class="circle"></div>
        </div>
    </div> -->
    <!--PreLoader Ends-->
	
	<?php include('header.php');
    ?>
    <?php
    include('connection.php');
    ?>
    <?php
    $E=$_SESSION['uemail'];
	$sqsel= "SELECT * from userregistration WHERE email='$E'";
	$ressel = mysqli_query($conn,$sqsel);
	while($row = mysqli_fetch_assoc($ressel))
	{
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
						<p>Fresh and Organic</p>
						<h1>Check Out Product</h1>
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
				<div class="col-lg-8">
					<div class="checkout-accordion-wrap">
						<div class="accordion" id="accordionExample">
						<div class="card single-accordion">
						    <div class="card-header" id="headingOne">
						      <h5 class="mb-0">
						        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
						          Billing Address
						        </button>
						      </h5>
						    </div>
							<form method="post">
						    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
						      <div class="card-body">
						        <div class="billing-address-form">
						        	
						        		<p><input type="text" name="name"  value="<?php echo $row['name'];?>" readonly></p>
						        		<p><input type="email"name="email" value="<?php echo $row['email'];?>" readonly></p>
						        		<p><input type="text" name="address" value="<?php echo $row['address'];?>" readonly></p>
						        		<p><input type="tel"  name="phoneno" value="<?php echo $row['phoneno'];?>" readonly></p>
						        	
						        </div>
						      </div>
						    </div>
						 </div>
                          
						  
						  <div class="card single-accordion">
						    <div class="card-header" id="headingThree">
						      <h5 class="mb-0">
						        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
						          Card Details
						        </button>
						      </h5>
						    </div>
						    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
						      <div class="card-body">
						        <div class="card-details">
									
									<p><input type="text" size="90"  placeholder="Enter card number" name="cdno"></p>
									<br>
									<p><input type="text" placeholder="Enter CVV" name="cvv"></p>
									<br>
									<p><input type="date" placeholder="Enter expiry"  name="ed" ><p>
								
						        </div>
						      </div>
						    </div>
						  </div>
						</div>

					</div>
				</div>
                <?php
                 }

                ?>
				<div class="col-lg-4">
					<div class="order-details-wrap">
						<table class="order-details">
							<thead>
								<tr>
									<th>Your order Details</th>
									<th>Price</th>
								</tr>
							</thead>
							<tbody class="order-details-body">
                            <?php
									$sqsel= "SELECT * from cart";
									$ressel = mysqli_query($conn,$sqsel);
									$t= 0;
									while($row = mysqli_fetch_assoc($ressel))
									{
										$t= $t+(float)$row['price']*(int)$row['quantity'];
								?>
								<tr>
                                <?php
									$fd=$row['productid'];
									$sqselect = "SELECT * from addfood where slno='$fd'";
									$res = mysqli_query($conn,$sqselect);
									while($row1 = mysqli_fetch_assoc($res))
									{
								?>

									<td><?php echo $row1['foodname'];?></td>
									<td><?php echo (double)$row['price']*(int)$row['quantity']; ?></td>
								</tr>
							</tbody>
                            
                            <?php
								
                                    }
                                }
                                    ?>
							<tbody class="checkout-details">
								<tr>
									<td>Subtotal</td>
									<td>$<?php echo $t ;?></td>
								</tr>
								<tr>
									<td>Shipping</td>
									<td>$50</td>
								</tr>
								<tr>
									<td>Total</td>
									<td>$<?php echo $t+50 ;?></td>
								</tr>
							</tbody>
						</table>
						<br>
					
						<input type="submit" class="cart-btn" value="Place Order" name="submit">
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end check out section -->
	<?php
			
		 if(isset($_POST['submit']))
		 {
			
			$usid=$_POST['email'];
			$billid=$_POST['phoneno'];
			$billid=rtrim($billid);
			$phno=$_POST['phoneno'];
			$address=$_POST['address'];
			$payment=$_POST['cdno'];
			$date=date('Y-m-d H:i:s');
		
		$sqsel= "SELECT * from cart WHERE userid='$E'";
		$ressel = mysqli_query($conn,$sqsel);
		while($row = mysqli_fetch_assoc($ressel))
		{
			$q=$row['quantity'];
			$fd=$row['productid'];
			$t= (float)$row['price']*(int)$row['quantity'];
			
			$sqselect = "SELECT * from addfood where slno='$fd'";
			$res = mysqli_query($conn,$sqselect);
			$row1 = mysqli_fetch_assoc($res);
			
				$fname=$row1['foodname'];

		  		$sql = "INSERT INTO billing VALUES('','$billid','$usid','$phno','$address','$payment','$date','$fname','$q','$t')";

		   if(mysqli_query($conn,$sql))
		   {
			
			 echo "<script>alert('Enter Successfull');window.location.href='../website/cart.php';</script>" ;
		   }
		   else
		   {
			 echo "<script>alert('Enter Unsuccessfull');</script>" ;
		   }
		 }
		 $sqldel="DELETE from cart where userid='$E'";
		 mysqli_query($conn,$sqldel);

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