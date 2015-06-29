<?php
	include ('MyConnection.php');
	
	$menu = $_POST['menu_name'];
	$meat = $_POST['meat_type'];
	$price = $_POST['menu_price'];
	$time = $_POST['menu_time'];
	$spicy = $_POST['spicy_level'];
	$category = $_POST['menu_category'];
	
	if(isset($_POST['submit'])){
	mysql_query("INSERT INTO Menu 
				(menu_name, meat_type, menu_price, menu_time, spicy_level, menu_category)
				VALUES('$menu', '$meat', '$price', '$time', '$spicy', '$category');") 
				or die(mysql_error());
	// redirect
	echo("<script>location.href= '/ThaiCafeProject/SuccessfulAddMenu.php?msg=$msg';</script>");
	} elseif(isset($_POST['delete'])){
		mysql_query("DELETE FROM Menu WHERE menu_name = '$menu' AND meat_type = '$meat';") 
				or die(mysql_error());
		echo("<script>location.href= '/ThaiCafeProject/SuccessfulDeleteMenu.php?msg=$msg';</script>");
	}
?>