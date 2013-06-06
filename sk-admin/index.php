<?php
	session_start();
	if(!isset($_SESSION['manager'])){
		header("location: admin_login.php");
		exit();
	}

	// $managerID = preg_replace('#[^0-9]#i','', $_SESSION["id"]);
	// $manager = preg_replace('#[^A-Za-z0-9]#i','', $_SESSION["manager"]);
	// $password = preg_replace('#(^A-Za-z0-9]#i','', $_SESSION["password"]);

	$managerID = $_SESSION['id'];
	$manager = $_SESSION['manager'];
	$password = $_SESSION['password'];

	include '../includes/db_connect.php';
	$myquery = "SELECT * FROM gfry.sk_admin WHERE id='$managerID' AND username='$manager' AND password='$password' LIMIT 1";
	$result = $mysqli->query($myquery)
		or die ($mysqli->error);

	$rowCount = $result->num_rows;
	if($rowCount == 0) {
		header("location: ../index.php");
		exit();
	}
?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>Sushi Knights Admin Panel - Gerald Fry</title>

<?php include 'admin_header.php' ?>

<div id="main">
	<section id="page">
		<div class="container_12">
			<div class="ribbon-head grid_12">
				<h2>Welcome to the Admin view</h2>
			</div>
			<div class="clear"></div>
			<div class="grid_9">
				<div class="menu-container">
					<h3>Admin Panel</h3>
					<ul>
						<li><a href="menu_list.php">Manage Menu Items</a></li>
					</ul>
					
				</div><!-- END MENU CONTAINER -->

			</div>
			<?php include 'template_admin_sidebar.php' ?>
		</div>
	</section>
</div>
	
<?php include '../includes/footer.php' ?>
	

