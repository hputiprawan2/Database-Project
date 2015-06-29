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
<title> Thai Cafe: Add Menu </title>

<?php
	include('Welcome.php');
?>

<div id="body">

		<b> Please add/delete a menu! </b><br /><br />
		
		<form action="/ThaiCafeProject/Menu.php" method="post">			
			&nbsp;&nbsp;&nbsp;&nbsp; Menu Name: <input type="string" name="menu_name" value="" /> (* requires for add/delete) <br/>
			&nbsp;&nbsp;&nbsp;&nbsp; Meat Type: <select name="meat_type"> 
							<option value="Veggies"> Veggies </option>
							<option value="Tofu"> Tofu </option>
							<option value="Chicken"> Chicken </option>
							<option value="Pork"> Pork </option>
							<option value="Beef"> Beef </option>
							<option value="Shrimp"> Shrimp </option>
							<option value="Seafood"> Seafood </option>
							<option value="Fish"> Fish </option>
							<option value="Crab"> Crab </option>
							<option value="Duck"> Duck </option>
							<option value="None"> None </option>
						</select> (* requires for add/delete)<br/>
			&nbsp;&nbsp;&nbsp;&nbsp; Price: <input type="string" name="menu_price" value="" /> <br/>
			&nbsp;&nbsp;&nbsp;&nbsp; Time Serve: <input type="string" name="menu_time" value="" /> (Default: 'All Time') <br/>
			&nbsp;&nbsp;&nbsp;&nbsp; Spicy Level: <input type="string" name="spicy_level" value="" /> (Input: '0' to '10')<br/>
			&nbsp;&nbsp;&nbsp;&nbsp; Category: 
						<select name="menu_category"> 
							<option value="Appetizer"> Appetizer </option>
							<option value="Salad"> Salad </option>
							<option value="Soup"> Soup </option>
							<option value="American"> American </option>
							<option value="Noodles"> Noodles </option>
							<option value="Entrees"> Entrees </option>
							<option value="Curry"> Curry </option>
							<option value="Desserts"> Desserts </option>
							<option value="Drinks"> Drinks </option>
							<option value="Vegetarian"> Vegetarian </option>
						</select> <br/>
			<br />
			<input type="submit" name="submit" value="Add"/>	
			<input type="submit" name="delete" value="Delete"/>	
		</form>
		
		<form action="/ThaiCafeProject/AddMenu.php" method="post">			
			<input type="submit" name="back" value="Back to Main Menu" />
		</form>
		<?php
			if(isset($_POST['back'])) {
				echo("<script>location.href= '/ThaiCafeProject/SuccessfulLogin.php?msg=$msg';</script>");
			}
		?>
		<?php
			include('ShowAllMenuLogin.php');	
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