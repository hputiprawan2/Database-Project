<?php
	if(!isset($_SESSION)) {
		session_start();
	}
?>

<?php
	$user = $_POST['user'];
	$pass = $_POST['pwd'];
	
	if($user == "Hanna" && $pass == "1234"){
		$_SESSION['CurrentUser'] = $user;
		echo("<script>location.href= '/ThaiCafeProject/SuccessfulLogin.php?msg=$msg';</script>");
	} else {
		echo ("Login Fail!");
	}
?>