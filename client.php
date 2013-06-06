<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>Sushi Knights Client Login - Gerald Fry</title>

<?php include 'admin_header.php' ?>

<div id="main">
	<section id="page">
		<div class="container_12">
			<div class="ribbon-head grid_12">
				<h2>Client Login</h2>
			</div>
			<div class="clear"></div>
			<div class="grid_4 push_4">
				<div class="menu-container">
					<h3 class="center-login-tab">Enter your Credentials</h3>
					<form name="admin-login" id="admin-login" method="post" action="admin_login.php">
						<p>Username</p>
						<input name="username" type="text" id="username" size="40" />
						<br /><br />
						<p>Password</p>
						<input name="password" type="password" id="password" size="40" />
						<br />
						<br />
						<input type="submit" name="button" id="button" value="Login" class="grey-btn" />
						<div class="clear"></div>
						<p>not working</p>
					</form>
				</div><!-- END MENU CONTAINER -->

			</div>
		</div>
	</section>
</div>

<?php
	if(isset($_POST['username']) && isset($_POST['password'])) {

		// $manager = preg_replace('#[^A-Za-z0-9]#i','', $_POST['username']);
		// $password = preg_replace('#[^A-Za-z0-9]#i','', $_POST['password']);

		$manager = $_POST['username'];
		$password = $_POST['password'];

		include '../includes/db_connect.php';
		$myquery = "SELECT id FROM gfry.sk_admin WHERE username='$manager' AND password='$password'";
		$result = $mysqli->query($myquery)
			or die ($mysqli->error);

			// print "connection working";
			// while($row = $result->fetch_object()) {
			// 	// $id = $row->id;
			// 	print "id = ".$row->id."<br />";
			// 	print "Username = ".$row->username."<br />";
			// 	print "Password = ".$row->password."<br />";
			// }

		$rowCount = $result->num_rows;
		if($rowCount == 1) {
			// print "row count is ".$rowCount;
			while($row = $result->fetch_object()) {
				$id = $row->id;
			}
			$_SESSION['id'] = $id;
			$_SESSION['manager'] = $manager;
			$_SESSION['password'] = $password;
			header('location: index.php');
			exit();
		}
	} else{
		// print "That information is incorrect, please try again <a href='index.php'>Login</a>";
		// exit();
	}
?>
	
<?php include '../includes/footer.php' ?>
	

