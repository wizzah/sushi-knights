<?php

	require 'db_connect.php';

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
			$menuList .= "<td><img src='../menu_images/$category/$category-$id.png' alt='$itemName' /></td>";
			$menuList .= "<td>$itemName</td>";
			$menuList .= "<td>$$price</td>";
			$menuList .= "<td>$details</td>";
			$menuList .= "</tr>";
		}
	} else{
		$menuList = "You have no products listed in your cart yet";
	}

	print $menuList;

	// require 'db_connect.php';

	// $myQuery = "SELECT * FROM gfry.sk_menu_items";
	// $result = $mysqli->query($myQuery)
	// 	or die ($mysqli->error);

	// while($row = $result->fetch_object()) {
	// 	$id = $row->id;
	// 	$itemName = $row->menu_item;
	// 	$price = $row->price;
	// 	$details = $row->details;
	// 	$category = $row->category;

	// 	$menuList .= "<div class='grid_3'>";
	// 	$menuList .= "<div class='item-container'>";
	// 	$menuList .= "<h3>$itemName</h3>";
	// 	$menuList .= "<img src='menu_images/$category/$category-$id.png' alt='$itemName' />";
	// 	$menuList .= "<p class='price'>$$price</p>";
	// 	$menuList .= "<p>$details</p>";
	// 	$menuList .= "<input type='button' name='add_to_cart' value='Add to Cart' class='orange-btn' />";
	// 	$menuList .= "</div></div>";
	// }

	// print $menuList;
?>