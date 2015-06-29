<?php
	include ('MyConnection.php');
	
	$menu_id = $_GET['id']; 
	
	$delquery = "DELETE FROM Menu WHERE menu_id = '$menu_id';";
	mysql_query($delquery) 
				or die(mysql_error());
	// redirect
	echo("<script>location.href= '/ThaiCafeProject/SuccessfulDeleteMenu.php?msg=$msg';</script>");
		//header('Location: SuccessfulAddExpense.php');
?>