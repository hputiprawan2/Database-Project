<?php
	if(!isset($_SESSION)) {
		session_start();
	}
?>
<html>

<body bgcolor="#FBF5EF">

<!-- header -->
<div id="header">
	<div id="header_block">
		<h1>
			<img src=/ThaiCafeProject/images/house-icon1.png  />
				Thai Cafe
			<img src=/ThaiCafeProject/images/house-icon1.png  /><br/>
            <div id="h10">:: Authentic Thai Food ::</div>
			
		</h1>
	</div>
</div>

<!-- menu bar -->
<div id="cssmenu">
	<ul>
		<li><a href="/ThaiCafeProject/Home.php"> Home </a></li>
		<li><a href="/ThaiCafeProject/MenuPage.php"> Menu </a></li>
		<li><a href="/ThaiCafeProject/ContactUs.php"> Contact Us </a></li>
		<li><a href="/ThaiCafeProject/Login.php"> Login </a></li>
		<li><login> <b><?php
					if(isset($_SESSION['CurrentUser'])){
						echo("Hello! " . $_SESSION['CurrentUser']);
					} 
				?> </b></li></login>
		<sm>	<form align="right" action = "/ThaiCafeProject/Welcome.php" method="post">
				<div id="date">
					<?php
						echo 'Date: ' . date("m-d-Y");
					?>
				</div>	
				Search Menu: <input type="search" name="menu_search" style="width: 180px"/>
				<input type="submit" name="search_bt" value="Search" style="width: 75px"/>
				</form>
		</sm>
	</ul>
</div>

	<?php
		include('MyConnection.php');
		
		@$menu = $_POST['menu_search'];
		
		
		if(@$_POST['search_bt']) {
			@$query = "SELECT * FROM Menu 
						WHERE menu_name = '$menu';";
			//echo(@$query);
		
		@$result = mysql_query($query);
				
		// display
		echo "<table style='margin: 2px auto' border='1' bordercolor='#FF8000'>
				<tr> <th width='450px'> Menu </th>
					 <th width='200px'> Meat </th>
					 <th width='200px'> Spicy </th>
					 <th width='200px'> Price </th> </tr>
				";
		
		while(@$row = mysql_fetch_array($result)){
			$menu = $row['menu_name'];
			$meat = $row['meat_type'];
			$spicy = $row['spicy_level'];
			$price = $row['menu_price'];
					
			echo "<tr><td width='450px'> $menu </td> 
			<td width='200px'> $meat </td>
			<td width='200px' align='center'> $spicy </td>
			<td width='200px' align='center'> $price </td>";			
		}
			echo "</tr></table>";
			include("Footer.php");
		}
		
		
	?>
			
</body>


<!-- CSS -->
<style type="text/css">

	/* 	source: http://red-team-design.com/cool-headings-with-pseudo-elements/ */
	#header_block {
                text-align: center;
                top: 0;
                font-family: 'Open Sans', sans-serif;
                font-size: 20;
                color: white;

                width: 50%;
                height: 100px;
                margin: 5px auto;
                border: 5px solid #FFE0AE;
                border: 5px solid rgba(0,0,0,.05);
                background: #f96e5b;
                background-clip: padding-box;
                box-shadow: 0 0 2px rgba(0, 0, 0, .5);
        }
        #header img{
                width:45px;
                height:40px;
        }
        #header{
                color: white;
                right: 10px;
                font-family: 'Open Sans', sans-serif;
                font-weight: 700px;
                font-size: 14px;
                background: #FB8C7E;
                border: 1px solid #FBF5EF;
                padding: 5px;
                height: 17%;
        }
        
	#date{
		right: 10px;
	}
        
	#h10 {
        color: white;
    	text-align: center;
        font-size: 12px;
        font-family: 'Open Sans', sans-serif;
        font-weight: 200px;
    }	
		
	/* CSS for menu bar source: http://cssmenumaker.com/menu/simple-responsive-menu	 */
	#cssmenu {
  		background: #f96e5b;
  		width: auto;
  		height: 4%;
  		border: 1px solid #FBF5EF;
  		padding: 8 0px;
	}
	#cssmenu ul {
  		list-style: none;
  		margin: -12;
  		padding: -50;
  		line-height: 1;
  		display: block;
	}
	#cssmenu ul:after {
  		content: " ";
  		display: block;
  		font-size: 0;
  		height: 0;
  		clear: both;
  		visibility: hidden;
	}
	#cssmenu ul li {
  		display: inline-block;
  		padding: 0;
  		margin: 0;
	}
	#cssmenu.align-right ul li {
  		float: right;
	}
	#cssmenu.align-center ul {
  		text-align: center;
	}
	#cssmenu ul li a {
  		color: #ffffff;
  		text-decoration: none;
  		display: block;
  		padding: 15px 25px;
  		font-family: 'Open Sans', sans-serif;
  		font-weight: 700;
  		text-transform: uppercase;
  		font-size: 14px;
  		position: relative;
  		-webkit-transition: color .25s;
  		-moz-transition: color .25s;
  		-ms-transition: color .25s;
  		-o-transition: color .25s;
  		transition: color .25s;
	}
	#cssmenu ul li a:hover {
  		color: #333333;
	}
	#cssmenu ul li a:hover:before {
  		width: 100%;
	}
	#cssmenu ul li a:after {
  		content: "";
  		display: block;
  		position: absolute;
  		right: -3px;
  		top: 19px;
  		height: 6px;
  		width: 6px;
  		background: #ffffff;
  		opacity: .5;
	}
	#cssmenu ul li a:before {
  		content: "";
  		display: block;
  		position: absolute;
  		left: 0;
  		bottom: 0;
  		height: 3px;
  		width: 0;
  		background: #333333;
  		-webkit-transition: width .25s;
  		-moz-transition: width .25s;
  		-ms-transition: width .25s;
  		-o-transition: width .25s;
  		transition: width .25s;
	}
	#cssmenu ul li.last > a:after,
	#cssmenu ul li:last-child > a:after {
  		display: none;
	}
	#cssmenu ul li.active a {
  		color: #333333;
	}
	#cssmenu ul li.active a:before {
  		width: 100%;
	}
	#cssmenu.align-right li.last > a:after,
	#cssmenu.align-right li:last-child > a:after {
  		display: block;
	}
	#cssmenu.align-right li:first-child a:after {
  		display: none;
	}
	@media screen and (max-width: 768px) {
  		#cssmenu ul li {
    		float: none;
    		display: block;
  		}
  		#cssmenu ul li a {
    		width: 100%;
    		-moz-box-sizing: border-box;
    		-webkit-box-sizing: border-box;
    		box-sizing: border-box;
    		border-bottom: 1px solid #fb998c;
  		}
  		#cssmenu ul li.last > a,
  		#cssmenu ul li:last-child > a {
    		border: 0;
  		}
  		#cssmenu ul li a:after {
    		display: none;
  		}
  		#cssmenu ul li a:before {
    		display: none;
  		}
	}			
	#cssmenu sm{
		color: white;
		font-family: 'Open Sans', sans-serif;
  		font-weight: 700px;
  		font-size: 14px;
  		position: absolute;
  		right: 10px;
  		top: 142px;
	}
	#cssmenu login{
		color: white;
		font-family: 'Open Sans', sans-serif;
  		font-size: 14px;
  		padding: 15px;
	}
		
</style>
</html>