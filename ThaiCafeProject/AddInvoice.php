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
<title> Thai Cafe: Add Invoice </title>

<?php
	include('Welcome.php');
?>

<div id="body">

		<b> Please add the invoice. </b><br /><br />
		
		<form action="/ThaiCafeProject/Invoice.php" method="post">			
			&nbsp;&nbsp;&nbsp;&nbsp; Date: <input type="date" name="invoice_date" value="" /> (Format: yyyy-mm-dd) <br/>
			&nbsp;&nbsp;&nbsp;&nbsp; Cost: <input type="double" name="invoice_amount" value="" /> <br/>
			&nbsp;&nbsp;&nbsp;&nbsp; Payment Type: <input type="int" name="invoice_paymentType" value="" /> ('1' for Cash, '2' for Card) <br/>
			<br />
			<input type="submit" name="submit" value="Submit"/>	
		</form>
		
		<form action="/ThaiCafeProject/AddInvoice.php" method="post">			
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