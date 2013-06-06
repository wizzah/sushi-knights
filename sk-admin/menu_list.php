<?php
	// KEEPS SESSION FOR LOGGED IN MANAGER
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

	// INSERTS NEW ITEM INTO SK_MENU_ITEMS TABLE
	if(isset($_POST['item_name'])){
		$menuItem = mysql_real_escape_string($_POST['item_name']);
		$itemDetails = mysql_real_escape_string($_POST['item_details']);
		$itemPrice = mysql_real_escape_string($_POST['item_price']);
		$itemCategory = mysql_real_escape_string($_POST['item_category']);

		$insertQuery = "SELECT id FROM gfry.sk_menu_items WHERE menu_item='$menuItem' LIMIT 1";
		$result = $mysqli->query($insertQuery)
			or die ($mysqli->error);
		$productMatch = $result->num_rows;
		if($productMatch = 0){
			alert('This menu item name already exists!');
			exit();
		}

		$insertQuery = "INSERT INTO gfry.sk_menu_items (menu_item, image_url, price, details, category, date_added) 
			VALUES('$menuItem','$itemDetails', '$itemPrice', '$itemCategory', now())";
		$result = $mysqli->query($insertQuery)
			or die ($mysqli->error);
		// $pid = mysql_insert_id();
		// $newname = "$itemCategory-$pid.jpg";
		// move_uploaded_file($_FILES['file_name']['tmp_name'], '../menu_items/$itemCategory/$newname');

	}


	// GETS MENU LIST FROM DATABASE TABLE SK_MENU_ITEMS
	$menuList = "";
	$menuQuery = "SELECT * FROM gfry.sk_menu_items";
	$menuResult = $mysqli->query($menuQuery)
			or die ($mysqli->error);

	$menuCount = $result->num_rows;
	if($menuCount > 0) {
		while($row = $menuResult->fetch_object()) {
			$id = $row->id;
			$itemName = $row->menu_item;
			$imageURL = $row->image_url;
			$price = $row->price;
			$details = $row->details;
			$category = $row->category;
			$dateAdded = $row->date_added;

			$menuList .= "<tr class='admin-menu-list-container'>";
			$menuList .= "<td>$id&nbsp;</td>";
			$menuList .= "<td><img src='../menu_images/$category/$category-$id.png' alt='$itemName' /></td>";
			$menuList .= "<td>$itemName</td>";
			$menuList .= "<td>$$price</td>";
			$menuList .= "<td>$details</td>";
			$menuList .= "<td>$category</td>";
			$menuList .= "<td>$dateAdded</td>";
			$menuList .= "<td><a href='#'>EDIT</a>&nbsp;&bull;&nbsp;<a href='#'>DELETE</a></td>";
			$menuList .= "</tr>";
		}
	} else{
		$menuList = "You have no products listed in your store yet";
	}

?>
	

<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>Sushi Knights Menu List - Gerald Fry</title>

<?php include 'admin_header.php' ?>

<div id="main">
	<section id="page">
		<div class="container_12">
			<div class="ribbon-head grid_12">
				<h2>Manage menu items</h2>
			</div>
			<div class="clear"></div>
			<div class="grid_12">
				<div class="admin-menu-container">
					<h3>Menu Items</h3>
					<div class="add-item"><a href="#add-item-form" class="grey-btn">+</a></div>
					<div class="clear"></div>
					<table id="admin-menu-list-table">
						<tr class="admin-menu-list-head">
							<th>ID</th>
							<th>Image</th>
							<th>Item Name</th>
							<th>Price</th>
							<th>Description</th>
							<th>Category</th>
							<th>Date</th>
							<th>Actions</th>
						</tr>
						<?php echo $menuList; ?>
					</table>
				</div><!-- END MENU CONTAINER -->
			</div>
			
			<div class="clear"></div>

			<!-- ADD NEW ITEM FORM -->
			<div class="grid_9">
				<form name="add-item-form" id="add-item-form" class="admin-menu-container" method="post" action="menu_list.php">
					<h3>Add New Item</h3>
					<table cellpadding="6">
						<tr>
							<td>Menu Item Name</td>
							<td><input type="text" name="item_name" id="item_name" /></td>
						</tr>
						<tr>
							<td>Item Description</td>
							<td><textarea name="item_details" id="item_details" rows="10"></textarea></td>
						</tr>
						<tr>
							<td>Price</td>
							<td><input type="text" name="item_price" id="item_price" /></td>
						</tr>
						<tr>
							<td>Food Category</td>
							<td>
								<select name="item_category" id="item_category">
									<option value="combo">Combo</option>
									<option value="sushi">Sushi</option>
									<option value="hibachi">Hibachi</option>
									<option value="drink">Drink</option>
									<option value="side">Side</option>
								</select>
							</td>
						</tr>
						<tr>
							<td>Image Upload</td>
							<td><input type="text" name="file_name" id="file_name" /><input type="button" name="browse_images" id="browse_images" value="Browse" /></td>
						</tr>
						<tr>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
						</tr>
						<tr>
							<td>&nbsp;</td>
							<td><input type="button" name="upload_item" id="upload_item" class="grey-btn" value="Insert New Item" /></td>
						</tr>
					</table>
				</form>
			</div>
			<?php include 'template_admin_sidebar.php' ?>
			<div class="clear"></div>
		</div>
	</section>
</div>
	
<?php include '../includes/footer.php' ?>
	

