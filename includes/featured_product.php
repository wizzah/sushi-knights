<?php

	require 'db_connect.php';

	$myQuery = "SELECT * FROM gfry.sk_menu_items WHERE featured_item=1";
	$result = $mysqli->query($myQuery)
		or die ($mysqli->error);

	while($row = $result->fetch_object()) {
		$id = $row->id;
		$itemName = $row->menu_item;
		$price = $row->price;
		$details = $row->details;
		$category = $row->category;

		$menuList .= "<div class='grid_3'>";
		$menuList .= "<div class='deal-container'>";
		$menuList .= "<h3>$itemName</h3>";
		$menuList .= "<img src='menu_images/$category/$category-$id.png' alt='$itemName' />";
		$menuList .= "<p class='price'>$$price</p>";
		$menuList .= "<p>$details</p>";
		$menuList .= "</div></div>";
	}

	print $menuList;
?>