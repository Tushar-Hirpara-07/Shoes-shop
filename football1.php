<?php
	include("function/session.php");
	include("db/dbconn.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Online Shoe Store</title>
	<link rel = "stylesheet" type = "text/css" href="css/style.css" media="all">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
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

			<?php
				$id = (int) $_SESSION['id'];

					$query = $conn->query ("SELECT * FROM customer WHERE customerid = '$id' ") or die (mysqli_error());
					$fetch = $query->fetch_array ();
			?>

			<ul>
				<li><a href="function/logout.php"><i class="icon-off icon-white"></i>logout</a></li>
				<li>Welcome:&nbsp;&nbsp;&nbsp;<a href="#profile" href  data-toggle="modal"><i class="icon-user icon-white"></i><?php echo $fetch['firstname']; ?>&nbsp;<?php echo $fetch['lastname'];?></a></li>
			</ul>
	</div>

		<div id="profile" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="width:700px;">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
					<h3 id="myModalLabel">My Account</h3>
				</div>
					<div class="modal-body">
						<?php
							$id = (int) $_SESSION['id'];

								$query = $conn->query ("SELECT * FROM customer WHERE customerid = '$id' ") or die (mysqli_error());
								$fetch = $query->fetch_array ();
						?>
						<center>
					<form method="post">
						<center>
							<table>
								<tr>
									<td class="profile">Name:</td><td class="profile"><?php echo $fetch['firstname'];?>&nbsp;<?php echo $fetch['mi'];?>&nbsp;<?php echo $fetch['lastname'];?></td>
								</tr>
								<tr>
									<td class="profile">Address:</td><td class="profile"><?php echo $fetch['address'];?></td>
								</tr>
								<tr>
									<td class="profile">Country:</td><td class="profile"><?php echo $fetch['country'];?></td>
								</tr>
								<tr>
									<td class="profile">ZIP Code:</td><td class="profile"><?php echo $fetch['zipcode'];?></td>
								</tr>
								<tr>
									<td class="profile">Mobile Number:</td><td class="profile"><?php echo $fetch['mobile'];?></td>
								</tr>
								<tr>
									<td class="profile">Telephone Number:</td><td class="profile"><?php echo $fetch['telephone'];?></td>
								</tr>
								<tr>
									<td class="profile">Email:</td><td class="profile"><?php echo $fetch['email'];?></td>
								</tr>
							</table>
						</center>
					</div>
				<div class="modal-footer">
					<a href="account.php?id=<?php echo $fetch['customerid']; ?>"><input type="button" class="btn btn-success" name="edit" value="Edit Account"></a>
					<button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Close</button>
				</div>
					</form>
			</div>




	<br>
<div id="container">

<div id="menu">
		<center>
			 <ul>
				<li><a href="home.php" id="home">Home</a></li>
				<li><a href="product.php" id="product">Product</a></li>
				<li><a href="aboutus.php" id="about">About Us</a></li>
				<li><a href="contactus.php" id="contact">Contact Us</a></li>
				<li><a href="privacy.php" id="privacy">Privacy Policy</a></li>
				<li><a href="faqs.php" id="FAQs">FAQs</a></li>
			</ul>
		</center>
	</div>

		<div class="nav1">
			<ul>
				<li><a href="product1.php">Basketball</a></li>
				<li>|</li>
				<li><a href="football1.php" class="active" style="color:#111;">Football</a></li>
				<li>|</li>
				<li><a href="running1.php">Running</a></li>
			</ul>
				<a href="cart.php"><button class="btn btn-inverse" style="right:1%; position:fixed; top:10%;"><i class="icon-shopping-cart icon-white"></i> View Cart</button></a>
		</div>

	<div id="content">
		<br />
		<br />
		<div id="product">

		<?php

$query = $conn->query("SELECT *FROM product WHERE category='football' ORDER BY product_id DESC") or die (mysqli_error());

	while($fetch = $query->fetch_array())
		{

		$pid = $fetch['product_id'];

		$query1 = $conn->query("SELECT * FROM stock WHERE product_id = '$pid'") or die (mysql_error());
		$rows = $query1->fetch_array();

		$qty = $rows['qty'];
		if($qty <= 5){

		}else{
			// echo "<div class='float'>";
			// echo "<center>";
			// echo "<a href='details.php?id=".$fetch['product_id']."'><img class='img-polaroid' src='photo/".$fetch['product_image']."' height = '300px' width = '300px'></a>";
			// echo "".$fetch['product_name']."";
			// echo "<br />";
			// echo "P ".$fetch['product_price']."";
			// echo "<br />";
			// echo "<h3 class='text-info' style='position:absolute; margin-top:-90px; text-indent:15px;'> Size: ".$fetch['product_size']."</h3>";
			// echo "</center>";
			// echo "</div>";
			echo "<div class='float'>";
			echo "<center>";
			echo "<img src='photo/".$fetch['product_image']."' height = '300px' width = '300px'></a>";
			echo " <h4> Size".$fetch['product_size']."</h4>";
			echo "<h5>Price : ".$fetch['product_price']."</h5>";
			echo " ".$fetch['product_name']."<br>";
			echo "<a href='details.php?id=".$fetch['product_id']."'><button class='button button1'>Add Cart</button></a>";
			echo "<br />";
			echo "<br />";
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
			<label style="font-size:17px;"> Copyrght &copy; </label>
			<p style="font-size:25px;">Online Shoe Store Inc. 2017 Brought To You by <a href="https://code-projects.org/">Code-Projects</a></p>
		</div>

			<div id="foot">
				<h4>Links</h4>
					<ul>
						<a href="http://www.facebook.com/OnlineShoeStore"><li>Facebook</li></a>
						<a href="http://www.twitter.com/OnlineShoeStore"><li>Twitter</li></a>
						<a href="http://www.pinterest.com/OnlineShoeStore"><li>Pinterest</li></a>
						<a href="http://www.tumblr.com/OnlineShoeStore"><li>Tumblr</li></a>
					</ul>
			</div>
	</div>
</body>
</html>
