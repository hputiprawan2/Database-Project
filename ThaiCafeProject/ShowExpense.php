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
<title> Thai Cafe: Show Expense</title>

<?php
	include('Welcome.php');
?>


<div id="body">

		<b>Show Expense</b><br /><br />
		
		<form action="/ThaiCafeProject/showExpense.php" method="post">			
			<b>From Date: <br /></b>
				&nbsp;&nbsp;&nbsp;&nbsp; Month: <input type="string" name="expense_from_month" value="" > (ie. input: '01' for Jan.)  </input> <br />
				&nbsp;&nbsp;&nbsp;&nbsp; Day: <input type="string" name="expense_from_day" value="" /><br />
				&nbsp;&nbsp;&nbsp;&nbsp; Year: <input type="string" name="expense_from_year" value="" /> <br/><br />
			<b>To Date: <br /></b>
				&nbsp;&nbsp;&nbsp;&nbsp; Month: <input type="string" name="expense_to_month" value="" > (ie. input: '01' for Jan.) </input> <br />
				&nbsp;&nbsp;&nbsp;&nbsp; Day: <input type="string" name="expense_to_day" value="" margin: 12px; /> <br />
				&nbsp;&nbsp;&nbsp;&nbsp; Year: <input type="string" name="expense_to_year" value="" /> <br/><br />
			
				Payment Type: <select name="expense_paymentType"> 
							<option value="1"> Cash </option>
							<option value="2"> Card </option>
							<option value="*"> All </option>
						  </select>
			<br /> <br /> 
			<input type="submit" name="submit" value="Submit" />
			<input type="submit" name="back" value="Back to Main Menu" />
			<input type="submit" name="all" value="Show All Expense" />
			<input type="submit" name="add" value="Add Expense" />
		</form>
		<?php
			include('MyConnection.php');
			
			@$fm = $_POST['expense_from_month'];
			@$fd = $_POST['expense_from_day'];
			@$fy = $_POST['expense_from_year'];
			@$ex_f = $fy . '-' . $fm . '-' . $fd;
			@$tm = $_POST['expense_to_month'];
			@$td = $_POST['expense_to_day'];
			@$ty = $_POST['expense_to_year'];
			@$ex_t = $ty . '-' . $tm . '-' . $td;
			@$paymentType = $_POST['expense_paymentType'];
	
			if(@$_POST['submit']) {
				
				if($paymentType == '*'){
					$query1 = "SELECT SUM(expense_cost) AS total FROM Expense, PaymentType 
							WHERE Expense.expense_paymentType = PaymentType.payment_id 
							AND expense_date BETWEEN '$ex_f' AND '$ex_t';";
					$query2 = "SELECT * FROM Expense, PaymentType 
							WHERE Expense.expense_paymentType = PaymentType.payment_id 
							AND expense_date BETWEEN '$ex_f' AND '$ex_t'
							ORDER BY expense_date DESC;";
							
				} else {
					$query1 = "SELECT SUM(expense_cost) AS total FROM Expense, PaymentType 
							WHERE Expense.expense_paymentType = PaymentType.payment_id 
							AND expense_date BETWEEN '$ex_f' AND '$ex_t' 
							AND Expense.expense_paymentType = '$paymentType';";	
					$query2 = "SELECT * FROM Expense, PaymentType 
							WHERE Expense.expense_paymentType = PaymentType.payment_id 
							AND expense_date BETWEEN '$ex_f' AND '$ex_t' 
							AND Expense.expense_paymentType = '$paymentType'
							ORDER BY expense_date DESC;";
				}
				
				//echo ($query);	
				$result1 = mysql_query($query1);
				$row1 = mysql_fetch_assoc($result1);
				$frow = sprintf("%.2f", $row1['total']);
				
				$result2 = mysql_query($query2);
				
				echo("Total from " . $ex_f . " to " . $ex_t . " is $" . $frow);	
							
				
				// display
				echo "<table style='margin: 2px auto' border='1' bordercolor='#FF8000'>
						<tr> <th width='100px'> Date </th>
							 <th width='200px'> Expense Info </th>
							 <th width='200px'> Cost </th>
							 <th width='200px'> Payment Type </th> 
							 <th width='200px'> Delete </th></tr>
						";
				
				while($row2 = mysql_fetch_array($result2)){
					$id = $row2['expense_id'];
					$date = $row2['expense_date'];
					$info = $row2['expense_info'];
					$cost = $row2['expense_cost'];
					$type = $row2['payment_type'];

					$delBt = "<a href='/ThaiCafeProject/DeleteExpense.php?id=$id'> Delete </a>";

					echo "<tr><td width='200px'> $date </td> 
					<td width='450px'> $info </td>
					<td width='200px' align='center'> $cost </td>
					<td width='200px' align='center'> $type </td>
					<td width='200px' align='center'> $delBt";	
					
				}
				echo "</tr></table>";		
				
									
			} elseif(isset($_POST['back'])) {
				echo("<script>location.href= '/ThaiCafeProject/SuccessfulLogin.php?msg=$msg';</script>");
			} elseif(isset($_POST['all'])) {
				include('ShowAllExpense.php');
			} elseif(isset($_POST['add'])) {
				echo("<script>location.href= '/ThaiCafeProject/AddExpense.php?msg=$msg';</script>");
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