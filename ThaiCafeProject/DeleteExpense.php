<?php
	include ('MyConnection.php');
	
	$expense_id = $_GET['id']; 
	
	$delquery = "DELETE FROM Expense WHERE expense_id = '$expense_id';";
	mysql_query($delquery) 
				or die(mysql_error());
	// redirect
	echo("<script>location.href= '/ThaiCafeProject/SuccessfulDeleteExpense.php?msg=$msg';</script>");
		//header('Location: SuccessfulAddExpense.php');
?>