<?php
include("function/login.php");
include("function/customer_signup.php");
?>
<!DOCTYPE html>
<html>

<head>
	<title>Online Shoe Store</title>
	<link rel="icon" href="img/logo.jpg" />
	<link rel="stylesheet" type="text/css" href="css/style.css" media="all">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<script src="js/bootstrap.js"></script>
	<script src="js/jquery-1.7.2.min.js"></script>
	<script src="js/carousel.js"></script>
	<script src="js/button.js"></script>
	<script src="js/dropdown.js"></script>
	<script src="js/tab.js"></script>
	<script src="js/tooltip.js"></script>
	<script src="js/popover.js"></script>
	<script src="js/collapse.js"></script>
	<script src="js/modal.js"></script>
	<script src="js/scrollspy.js"></script>
	<script src="js/alert.js"></script>
	<script src="js/transition.js"></script>
	<script src="js/bootstrap.min.js"></script>
</head>

<body>
	<div id="header">
		<img src="img/logo.jpg">
		<label>Online Shoe Store</label>
		<div id="menu" style="float: right;">
		<a href="home.php" id="home">Home</a>
		<a href="product.php" id="product">Product</a>
		<a href="aboutus.php" id="about">About Us</a>
		<a href="contactus.php" id="contact">Contact Us</a>
		<a href="privacy.php" id="privacy">Privacy Policy</a>
		<a href="faqs.php" id="FAQs">FAQs</a>			
		</div>
	</div> 
	<a href="#signup"   data-toggle="modal"><button> loging</button></a>
		<div id="login" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="width:400px;">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
				<h3 id="myModalLabel">Login...</h3>
			</div>
			<div class="modal-body">
				<form method="post">
					<center>
						<input type="email" name="email" placeholder="Email" style="width:250px;">
						<input type="password" name="password" placeholder="Password" style="width:250px;">
					</center>
			</div>
			<div class="modal-footer">
				<input class="btn btn-primary" type="submit" name="login" value="Login">
				<button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Close</button>
				</form>
			</div>
		</div>

		<div id="signup" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="width:700px;">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
				<h3 id="myModalLabel">Sign Up Here...</h3>
			</div>
			<div class="modal-body">
				<center>
					<form method="post">
						<input type="text" name="firstname" placeholder="Firstname" required>
						<input type="text" name="mi" placeholder="Middle Initial" maxlength="1" required>
						<input type="text" name="lastname" placeholder="Lastname" required>
						<input type="text" name="address" placeholder="Address" style="width:430px;" required>
						<input type="text" name="country" placeholder="Province" required>
						<input type="text" name="zipcode" placeholder="ZIP Code" required maxlength="4">
						<input type="text" name="mobile" placeholder="Mobile Number" maxlength="11">
						<input type="text" name="telephone" placeholder="Telephone Number" maxlength="8">
						<input type="email" name="email" placeholder="Email" required>
						<input type="password" name="password" placeholder="Password" required>
				</center>
			</div>
			<div class="modal-footer">
				<input type="submit" class="btn btn-primary" name="signup" value="Sign Up">
				<button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Close</button>
			</div>
			</form>
		</div>
		<br>
		<div id="container1">

			<div id="carouselExampleSlidesOnly" data-ride="carousel">
				<div class="carousel-inner">
					<div class="carousel-item active">
						<img class="d-block w-100" src="img\banner2.jpg" alt="First slide">
					</div>
					<div class="carousel-item">
						<img class="d-block w-100" src="img\banner1.jpg" alt="First slide">
					</div>
					<<div class="carousel-item">
						<img class="d-block w-100" src="img\banner2.jpg" alt="First slide">
				</div>
			</div>
		</div>
	</div>
	<div id="container">
		<div id="content">
			<div id="product" style="position:relative; margin-top:30px;">
				<center>
					<h2>
						<legend>Feature Items</legend>
					</h2>
				</center>
				<br />

				<?php

				$query = $conn->query("SELECT *FROM product WHERE category='feature' ORDER BY product_id DESC") or die(mysqli_error());

				while ($fetch = $query->fetch_array()) {

					$pid = $fetch['product_id'];

					$query1 = $conn->query("SELECT * FROM stock WHERE product_id = '$pid'") or die(mysqli_error());
					$rows = $query1->fetch_array();

					$qty = $rows['qty'];
					if ($qty <= 5) {
					} else {
						echo "<div class='float'>";
						echo "<center>";
						echo "<a href='details.php?id=" . $fetch['product_id'] . "'><img class='img-polaroid' src='photo/" . $fetch['product_image'] . "' height = '300px' width = '300px'></a>";
						echo " " . $fetch['product_name'] . "";
						echo "<br />";
						echo "P " . $fetch['product_price'] . "";
						echo "<br />";
						echo "<h3 class='text-info' style='position:absolute; margin-top:-90px; text-indent:15px;'> Size: " . $fetch['product_size'] . "</h3>";
						echo "</center>";
						echo "</div>";
					}
				}
				?>
			</div>



		</div>

		<br />
	</div>
	<br />
	<div id="footer">
		<div class="foot">
			<label style="font-size:17px;"> Copyright &copy; </label>
			<p style="font-size:25px;">Online Shoe Store Inc. 2017 Brought To You by <a href="https://code-projects.org/">Code-Projects</a></p>
		</div>

		<div id="foot">
			<h4>Links</h4>
			<ul>
				<a href="http://www.facebook.com/OnlineShoeStore">
					<li>Facebook</li>
				</a>
				<a href="http://www.twitter.com/OnlineShoeStore">
					<li>Twitter</li>
				</a>
				<a href="http://www.pinterest.com/OnlineShoeStore">
					<li>Pinterest</li>
				</a>
				<a href="http://www.tumblr.com/OnlineShoeStore">
					<li>Tumblr</li>
				</a>
			</ul>
		</div>
	</div>
</body>

</html>