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

<?php
	include ('Welcome.php');
?>

<body bgcolor="#FBF5EF">
<title> Thai Cafe: Successful Delete Invoice </title>

<div id="content">
	<div id="text">
			<?php
				echo "Invoice is deleted!";
			?>
	</div>
			<form action="/ThaiCafeProject/SuccessfulDeleteInvoice.php" method="post">

			<input type="submit" name="add" value="Add Invoice"/>
			<input type="submit" name="showInvoice" value="Show Invoice"/>
			<input type="submit" name="back" value="Back to Main Menu" />
			<?php
				if(isset($_POST['add'])){
					echo("<script>location.href= '/ThaiCafeProject/AddInvoice.php?msg=$msg';</script>");
				} elseif (isset($_POST['showInvoice'])){
					echo("<script>location.href= '/ThaiCafeProject/ShowInvoice.php?msg=$msg';</script>");
				} elseif(isset($_POST['back'])){
					echo("<script>location.href= '/ThaiCafeProject/SuccessfulLogin.php?msg=$msg';</script>");
				}
			?>
			</form>

</div>
</body>

<style type="text/css">
	#content {
		border: 1px solid #FBF5EF;
		background: #F5D0A9;
		font-family: 'Open Sans', sans-serif;
  		font-weight: 400;
  		font-size: 14px;
  		margin: 0 auto;
  		padding: 10px 10px;
  		text-align: center;
	}
	#text {
		padding: 10px;
	}
</style>

<?php
	include ('Footer.php');
?>

</html>

