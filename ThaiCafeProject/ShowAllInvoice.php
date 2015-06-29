<?php
			include('myConnection.php');
			
				$query1 = "SELECT SUM(invoice_amount) AS total FROM Invoice, PaymentType 
							WHERE Invoice.invoice_paymentType = PaymentType.payment_id;";
				$query2 = "SELECT * FROM Invoice, PaymentType 
							WHERE Invoice.invoice_paymentType = PaymentType.payment_id 
							ORDER BY invoice_date DESC;";
				
				$result1 = mysql_query($query1);
				$row1 = mysql_fetch_assoc($result1);
				$frow = sprintf("%.2f", $row1['total']);
				
				$result2 = mysql_query($query2);
				
				echo("Total is $" . $frow );					
				
				// display
				echo "<table style='margin: 2px auto' border='1' bordercolor='#FF8000'>
						<tr> <th width='100px'> Date </th>
							 <th width='200px'> Cost </th>
							 <th width='200px'> Payment Type </th> 
							 <th width='200px'> Delete </tr>
						";
				
				while($row2 = mysql_fetch_array($result2)){
					$id = $row2['invoice_id'];
					$date = $row2['invoice_date'];
					$cost = $row2['invoice_amount'];
					$type = $row2['payment_type'];
					
					$delBt = "<a href='DeleteInvoice.php?id=$id'> Delete </a>";
					
					echo "<tr><td width='200px'> $date </td> 
					<td width='200px' align='center'> $cost </td>
					<td width='200px' align='center'> $type </td>
					<td width='200px' align='center'> $delBt </td>";		
				}
				echo "</tr></table>";
?>