<?php
	if(!isset($_SESSION)) {
		session_start();
	}
	if(isset($_SESSION['CurrentUser'])){
	} else {
		echo("<script>location.href= '/ThaiCafeProject/Login.php?msg=$msg';</script>");
	}
?>

<?php
	include ('Welcome.php');
?>

<html>
<body bgcolor="#FBF5EF">
<title> Thai Cafe: Employee Login </title>

<div id="content">

			<form action="/ThaiCafeProject/SuccessfulLogin.php" method="post">
			<b> Main Menu </b><br /><br />
			<input type="submit" name="addExpense" value="Add Expense" /><br />
			<input type="submit" name="showExpense" value="Show Expense" /><br />
			<input type="submit" name="addInvoice" value="Add Invoice" /><br />
			<input type="submit" name="showInvoice" value="Show Invoice" /><br />
			<input type="submit" name="addMenu" value="Add/Delete Menu" /><br /><br />
			<input type="submit" name="logout" value="Logout" />
			</form>
			<?php
				if(isset($_POST['addExpense'])){
					echo("<script>location.href= '/ThaiCafeProject/AddExpense.php?msg=$msg';</script>");
					// header('Location: AddExpense.php');
				} elseif (isset($_POST['showExpense'])){
					echo("<script>location.href= '/ThaiCafeProject/ShowExpense.php?msg=$msg';</script>");
					//header('Location: showExpense.php');
				} elseif (isset($_POST['addInvoice'])){
					echo("<script>location.href= '/ThaiCafeProject/AddInvoice.php?msg=$msg';</script>");
					// header('Location: addInvoice.php');
				} elseif (isset($_POST['showInvoice'])){
					echo("<script>location.href= '/ThaiCafeProject/ShowInvoice.php?msg=$msg';</script>");
					// header('Location: showInvoice.php');
				} elseif (isset($_POST['addMenu'])){
					echo("<script>location.href= '/ThaiCafeProject/AddMenu.php?msg=$msg';</script>");
				} elseif (isset($_POST['logout'])){
					echo("<script>location.href= '/ThaiCafeProject/SuccessfulLogout.php?msg=$msg';</script>");
				}	
			?>

</div>
</body>

<style type="text/css">
	#content{
		border: 1px solid #FBF5EF;
		background: #F5D0A9;
		font-family: 'Open Sans', sans-serif;
  		font-weight: 400;
  		font-size: 14px;
  		margin: 0 auto;
  		padding: 10px 0px;
  		text-align: center;
	}
	input {
    	width: 20em;  
	}
</style>


<?php
	include ('Footer.php');
?>

</html>