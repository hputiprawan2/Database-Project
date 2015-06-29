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
<title> Thai Cafe: Add Expense </title>

<?php
	include('Welcome.php');
?>

<div id="body">

		<b> Adding Expense </b><br /><br />
		
		<form action="/ThaiCafeProject/Expense.php" method="post">
			&nbsp;&nbsp;&nbsp;&nbsp; Date: <input type="date" name="expense_date" value="" /> (Format: yyyy-mm-dd) <br/>
			&nbsp;&nbsp;&nbsp;&nbsp; Info: <input type="text" name="expense_info" value="" /> <br/>
			&nbsp;&nbsp;&nbsp;&nbsp; Cost: <input type="double" name="expense_cost" value="" /> <br/>
			&nbsp;&nbsp;&nbsp;&nbsp; Payment Type: <input type="int" name="expense_paymentType" value="" /> ('1' for Cash, '2' for Card) <br/>
			<br />
			<input type="submit" name="submit" value="Add" />
		</form>
		<form action="/ThaiCafeProject/AddExpense.php" method="post">			
			<input type="submit" name="back" value="Back to Main Menu" />
		</form>
		<?php
			if(isset($_POST['back'])) {
				echo("<script>location.href= '/ThaiCafeProject/SuccessfulLogin.php?msg=$msg';</script>");
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
	form {
    	display: inline;
	}
</style>


<?php
	include ('Footer.php');
?>
</html>