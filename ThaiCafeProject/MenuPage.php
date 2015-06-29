<?php
	include('Welcome.php');
?>

<html>
<title> Thai Cafe: Menu </title>
<body>
	<div id="content">
		<div class="page-wrap"> 
		<?php
			include('ShowAllMenu.php');   
		?>
	</div>
</div>


<!-- CSS -->
<style type="text/css">
	#content{
  		border: 1px solid #FBF5EF;
  		background: #F5D0A9;
		font-family: 'Open Sans', sans-serif;
  		font-weight: 400;
  		font-size: 14px;
  		margin: 0 auto;
  		padding: 10px 10px;
	}
</style>

</body>

<?php
	include('Footer.php');
?>
</html>