<?php
	if(!isset($_SESSION)) {
		session_start();
	} 	
	
	if(isset($_SESSION['CurrentUser'])){
		echo("Hello! " . $_SESSION['CurrentUser']);
		echo("<script>location.href= '/ThaiCafeProject/SuccessfulLogin.php?msg=$msg';</script>");
	}
?>

<html>
<body bgcolor="#FBF5EF">
<title> Thai Cafe: Login </title>

<?php
	include('Welcome.php');
?>
<div id="content">

		<form action="/ThaiCafeProject/CheckLogin.php" method="post">
		
		User name: <input type="text" name="user" value="" /> <br/>
		Password: <input type="password" name="pwd" value="" /> <br/>
		<input type="submit" name="login" value="Login"/>
		</form>

</div>
</body>

<style type="text/css">
	#content {
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