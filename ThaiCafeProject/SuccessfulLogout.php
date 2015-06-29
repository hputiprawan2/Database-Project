<?php
	session_start();
	
	if($_SESSION['CurrentUser']){
		session_destroy();
		echo("<script>location.href= '/ThaiCafeProject/Home.php?msg=$msg';</script>");
	}
?>