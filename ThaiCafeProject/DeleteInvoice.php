<?php
	include ('myConnection.php');
	
	$invoice_id = $_GET['id']; 
	
	$delquery = "DELETE FROM Invoice WHERE invoice_id = '$invoice_id';";
	mysql_query($delquery) 
				or die(mysql_error());
	echo("<script>location.href= '/ThaiCafeProject/SuccessfulDeleteInvoice.php?msg=$msg';</script>");
?>