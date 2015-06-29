			<?php
				include('myConnection.php');
	
				$query = "SELECT * FROM Menu";
				$result = mysql_query($query);
				
				// display
				echo "<table style='margin: 2px auto' border='1' bordercolor='#FF8000'>
						<tr> <th width='450px'> Menu </th>
							 <th width='200px'> Meat </th>
							 <th width='200px'> Spicy </th>
							 <th width='200px'> Price </th>
							 <th width='200px'> Delete </th></tr>
						";
				
				while($row = mysql_fetch_array($result)){
					
					$id = $row['menu_id'];
					$menu = $row['menu_name'];
					$meat = $row['meat_type'];
					$spicy = $row['spicy_level'];
					$price = $row['menu_price'];
					$delBt = "<a href='DeleteMenu.php?id=$id'> Delete </a>";
					
					echo "<tr><td width='450px'> $menu </td> 
					<td width='200px'> $meat </td>
					<td width='200px' align='center'> $spicy </td>
					<td width='200px' align='center'> $price </td>
					<td width='200px' align='center'> $delBt </td>";
					
					
				}
				
				
				echo "</tr></table>";
			?> 