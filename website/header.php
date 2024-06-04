<!-- header -->
	<div class="top-header-area" id="sticker">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-sm-12 text-center">
					<div class="main-menu-wrap">
						<!-- logo -->
						<div class="site-logo">
							<a href="index.html">
								<img src="assets/img/logo.png" alt="">
							</a>
						</div>
						<!-- logo -->
						<?php
						include('connection.php');
						?>
						<!-- menu start -->
						<nav class="main-menu">
							<ul>
								<li class="current-list-item"><a href="index.php">Home</a>
								</li>
								<li><a href="about.php">About</a></li>
								<li><a href="shop.php">Order online</a>
									<ul class="sub-menu">
										<?php
										 $sqsel="SELECT * from foodcategory";
										 $res = mysqli_query($conn,$sqsel);
										 while($row = mysqli_fetch_assoc($res))
										 {
										 ?>
										<li><a href="shop.php?s=<?php echo $row['category'];?>"><?php echo $row['category'];?></a></li>
										<?php
										 }
										 ?>	
									</ul>
								</li>
								<li><a href="Contact.php">Contact</a>
									<ul class="sub-menu">
										<li><a href="shop.html">Shop</a></li>
										<li><a href="checkout.html">Check Out</a></li>
										<li><a href="single-product.html">Single Product</a></li>
										
									</ul>
								</li>
								<?php 
							
									
										 if(empty($_SESSION['uemail']))
										 {
											
											?>
										<li><a href="../adminpanel/userlogin.php">Log in</a></li>
										<?php
										 }
										 else
										 {
										?>
											
										<li><a href="sessionclose.php">Log out</a></li>
										
									<?php
									}
										 
										 ?>

								<li>
									<div class="header-icons">
									
									<?php
									if(empty($_SESSION['uemail']))
										 {
											?><a class="shopping-cart" href="../adminpanel/userlogin.php"><i class="fas fa-shopping-cart"></i></a>
										<?php
										 }
										else{
											?>
										<a class="user" href="../adminpanel/user.php?q=<?php echo $_SESSION['uemail'];?>"><i class="fas fa-user"></i></a>
										<a class="shopping-cart" href="cart.html"><i class="fas fa-shopping-cart"></i></a>
										<?php
										}
										?>
									</div>
								</li>
							</ul>
						</nav>
						<a class="mobile-show search-bar-icon" href="#"><i class="fas fa-search"></i></a>
						<div class="mobile-menu"></div>
						<!-- menu end -->
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end header -->
	