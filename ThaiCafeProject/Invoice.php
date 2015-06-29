<?php
	include ('MyConnection.php');
	
	$date = $_POST['invoice_date'];
	$amount = $_POST['invoice_amount'];
	$type = $_POST['invoice_paymentType'];
	
	mysql_query("INSERT INTO Invoice (invoice_date, invoice_amount, invoice_paymentType) 
				VALUES('$date', $amount, $type)") 
				or die(mysql_error());
	// redirect
	echo("<script>location.href= '/ThaiCafeProject/SuccessfulAddInvoice.php?msg=$msg';</script>");
		//header('Location: SuccessfulAddExpense.php');
?>