<?php
	if(!isset($_SESSION)) {
		session_start();
	}
	
	if(isset($_SESSION['CurrentUser'])){
	} else {
		echo("<script>location.href= '/ThaiCafeProject/Login.php?msg=$msg';</script>");
	}
?>
<html>

<body bgcolor="#FBF5EF">
<title> Thai Cafe: Show Invoice</title>

<?php
	include('Welcome.php');
?>


<div id="body">

		<b>Show Invoice</b><br /><br />
		
		<form action="/ThaiCafeProject/showInvoice.php" method="post">			
			<b>From Date: <br /></b>
				&nbsp;&nbsp;&nbsp;&nbsp; Month: <input type="string" name="invoice_from_month" value="" > (ie. input: '01' for Jan.)  </input> <br />
				&nbsp;&nbsp;&nbsp;&nbsp; Day: <input type="string" name="invoice_from_day" value="" /><br />
				&nbsp;&nbsp;&nbsp;&nbsp; Year: <input type="string" name="invoice_from_year" value="" /> <br/><br />
			<b>To Date: <br /></b>
				&nbsp;&nbsp;&nbsp;&nbsp; Month: <input type="string" name="invoice_to_month" value="" > (ie. input: '01' for Jan.) </input> <br />
				&nbsp;&nbsp;&nbsp;&nbsp; Day: <input type="string" name="invoice_to_day" value="" margin: 12px; /> <br />
				&nbsp;&nbsp;&nbsp;&nbsp; Year: <input type="string" name="invoice_to_year" value="" /> <br/><br />
			
				Payment Type: <select name="invoice_paymentType"> 
							<option value="1"> Cash </option>
							<option value="2"> Card </option>
							<option value="*"> All </option>
						  </select>
			<br /> <br /> 
			<input type="submit" name="submit" value="Submit" />
			<input type="submit" name="back" value="Back to Main Menu" />
			<input type="submit" name="all" value="Show All Invoice" />
			<input type="submit" name="add" value="Add Invoice" />
		</form>
		
		<?php
			include('MyConnection.php');
			
			@$fm = $_POST['invoice_from_month'];
			@$fd = $_POST['invoice_from_day'];
			@$fy = $_POST['invoice_from_year'];
			@$in_f = $fy . '-' . $fm . '-' . $fd;
			@$tm = $_POST['invoice_to_month'];
			@$td = $_POST['invoice_to_day'];
			@$ty = $_POST['invoice_to_year'];
			@$in_t = $ty . '-' . $tm . '-' . $td;
			@$paymentType = $_POST['invoice_paymentType'];
	
			if(isset($_POST['submit'])) {
				
				if($paymentType == '*'){
					$query1 = "SELECT SUM(invoice_amount) AS total FROM Invoice, PaymentType 
							WHERE Invoice.invoice_paymentType = PaymentType.payment_id 
							AND invoice_date BETWEEN '$in_f' AND '$in_t';";
					$query2 = "SELECT * FROM Invoice, PaymentType 
							WHERE Invoice.invoice_paymentType = PaymentType.payment_id 
							AND invoice_date BETWEEN '$in_f' AND '$in_t'
							ORDER BY invoice_date DESC;";
							
				} else {
					$query1 = "SELECT SUM(invoice_amount) AS total FROM Invoice, PaymentType 
							WHERE Invoice.invoice_paymentType = PaymentType.payment_id 
							AND invoice_date BETWEEN '$in_f' AND '$in_t' 
							AND Invoice.invoice_paymentType = '$paymentType';";	
					$query2 = "SELECT * FROM Invoice, PaymentType 
							WHERE Invoice.invoice_paymentType = PaymentType.payment_id 
							AND invoice_date BETWEEN '$in_f' AND '$in_t' 
							AND Invoice.invoice_paymentType = '$paymentType'
							ORDER BY invoice_date DESC;";
				}
				
				//echo ($query);	
				$result1 = mysql_query($query1);
				$row1 = mysql_fetch_assoc($result1);
				$frow = sprintf("%.2f", $row1['total']);
				
				$result2 = mysql_query($query2);
				
				echo("Total from " . $in_f . " to " . $in_t . " is $" . $frow );					
				
				// display
				echo "<table style='margin: 2px auto' border='1' bordercolor='#FF8000'>
						<tr> <th width='100px'> Date </th>
							 <th width='200px'> Cost </th>
							 <th width='200px'> Payment Type </th> 
							 <th width='200px'> Delete </th></tr>
						";
				
				while($row2 = mysql_fetch_array($result2)){
					$id = $row2['invoice_id'];
					$date = $row2['invoice_date'];
					$cost = $row2['invoice_amount'];
					$type = $row2['payment_type'];
					
					$delBt = "<a href='/ThaiCafeProject/DeleteInvoice.php?id=$id'> Delete </a>";
					
					echo "<tr><td width='200px'> $date </td> 
					<td width='200px' align='center'> $cost </td>
					<td width='200px' align='center'> $type </td>
					<td width='200px' align='center'> $delBt";		
				}
				echo "</tr></table>";	
			} elseif(isset($_POST['back'])) {
				echo("<script>location.href= '/ThaiCafeProject/SuccessfulLogin.php?msg=$msg';</script>");
			} elseif(isset($_POST['all'])) {
				include('ShowAllInvoice.php');
			} elseif(isset($_POST['add'])) {
				echo("<script>location.href= '/ThaiCafeProject/AddInvoice.php?msg=$msg';</script>");
			}
		?>
</div>

</body>

<style type="text/css">
	#body{
		font-family: 'Open Sans', sans-serif;
  		font-weight: 400;
  		font-size: 14px;
  		color: black;
  		background: #F5D0A9;
  		margin: 0 auto;
  		padding: 25 25px;
	}
</style>


<?php
	include ('Footer.php');
?>
</html>