<?php
	include ('MyConnection.php');
	
	$date = $_POST['expense_date'];
	$info = $_POST['expense_info'];
	$cost = $_POST['expense_cost'];
	$type = $_POST['expense_paymentType'];
	
	mysql_query("INSERT INTO Expense 
				(expense_date, expense_info, expense_cost, expense_paymentType)
				VALUES('$date', '$info', $cost, $type);") 
				or die(mysql_error());
	// redirect
	echo("<script>location.href= '/ThaiCafeProject/SuccessfulAddExpense.php?msg=$msg';</script>");
		//header('Location: SuccessfulAddExpense.php');
?>