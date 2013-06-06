<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>Sushi Knights Home - Gerald Fry</title>

<?php include 'includes/header.php' ?>
<div id="main">
	<section id="featured">
		<div class="container_12">
			<div id="slider-overlay" class="grid_6">
				<h1>Best Sushi At UCF</h1>
				<hr />
				<p>Welcome to Sushi Knights! We are a sushi delivery service and restaurant located in the UCF Student Union. We currently only deliver the best sushi to students on campus.</p>
				<div class="order-menu-btn">
					<a href="catelog.php">View Menu</a>
					<a href="order_online.php">Order Online</a>
				</div>
			</div>		
		</div>
		<div id="slider-wrap">
			<div id="mask"></div>
			<img src="img/slider-img-01.png" alt="Fresh Sushi at Sushi Knights!" />
		</div>
	</section>

	<section id="featured-deals">
		<div class="container_12">
			<div class="ribbon-head grid_12">
				<h2>Try Our Popular Combos!</h2>
			</div>
			<!-- SELECT FROM DB SK_MENU_ITEMS -->
			<?php include 'includes/featured_product.php' ?>
		</div>
		<div class="clear"></div>
	</section>

	<section id="order-steps">
		<div class="container_12">
			<h4 class="head">How To order</h4>
			<div class="grid_4">
				<h4><span>Step 1</span>Choose From Two Styles</h4>
			</div>
			<div class="grid_4">
				<img src="img/step-1-1.png" alt="Choose from our selection of Sushi" />
			</div>
			<div class="grid_4">
				<img src="img/step-1-2.png" alt="Choose from our selection of Hibachi" />
			</div>
			<div class="clear"></div>
			<div class="grid_4">
				<h4><span>Step 2</span>Choose Drink and Side</h4>
			</div>
			<div class="grid_4">
				<img src="img/step-2-1.png" alt="Choose from our selection of Beverages" />
			</div>
			<div class="grid_4">
				<img src="img/step-2-2.png" alt="Choose from our selection of sides" />
			</div>
			<div class="clear"></div>
			<div class="grid_4">
				<h4><span>Step 3</span>Place Your Order</h4>
			</div>
			<div id="h-order-btn" class="push_1 grid_7">
				<div class="order-menu-btn">
					<a href="catelog.php">View Menu</a>
					<a href="order_online.php">Order Online</a>
				</div>
			</div>
			<div class="clear"></div>
		</div>
	</section>
</div>

<?php include 'includes/footer.php' ?>