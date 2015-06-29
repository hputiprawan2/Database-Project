<?php
			include('myConnection.php');
			
			$query1 = "SELECT SUM(expense_cost) AS total FROM Expense;";
			$query2 = "SELECT * FROM Expense, PaymentType 
							WHERE Expense.expense_paymentType = PaymentType.payment_id 
							ORDER BY expense_date DESC;";


			$result1 = mysql_query($query1);
			$row1 = mysql_fetch_assoc($result1);
			$frow = sprintf("%.2f", $row1['total']);
				
			$result2 = mysql_query($query2);
				
			echo("Total is $" . $frow);	
							
				
			echo "<table style='margin: 2px auto' border='1' bordercolor='#FF8000'>
						<tr> <th width='100px'> Date </th>
							 <th width='200px'> Expense Info </th>
							 <th width='200px'> Cost </th>
							 <th width='200px'> Payment Type </th> 
							 <th width='200px'> Delete </th></tr>
						";
				
				while($row2 = mysql_fetch_array($result2)){
					$id = $row2['expense_id'];
					$date = $row2['expense_date'];
					$info = $row2['expense_info'];
					$cost = $row2['expense_cost'];
					$type = $row2['payment_type'];

					$delBt = "<a href='DeleteExpense.php?id=$id'> Delete </a>";

					echo "<tr><td width='200px'> $date </td> 
					<td width='450px'> $info </td>
					<td width='200px' align='center'> $cost </td>
					<td width='200px' align='center'> $type </td>
					<td width='200px' align='center'> $delBt";	
					
				}
				echo "</tr></table>";	
				
				
?>	