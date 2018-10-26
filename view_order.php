<?php

//view_order.php

if (isset($_GET["pdf"]) && isset($_GET['order_num'])) {
    require_once 'pdf.php';
    include('conn.php');
    include('functions.php');
    if (!isLoggedIn()) {
        $_SESSION['msg'] = "You must log in first";
        header('location: login.php');
    }

    $username = $_SESSION['user']['username'];
    $output = '';

    $order_num = $_GET['order_num'];

    $select = "SELECT * FROM `order` o JOIN `product` p WHERE order_num='$order_num' AND o.product_id=p.id limit 1";
    $run_select = mysqli_query($conn, $select);

    foreach ($run_select as $row)
        $output .= '
		<table width="100%" border="1" cellpadding="5" cellspacing="0">
			<tr>
				<td colspan="2" align="center" style="font-size:18px"><b>Invoice</b></td>
			</tr>
			<tr>
				<td colspan="2">
				<table width="100%" cellpadding="5">
					<tr>
						<td width="65%">
							To,<br />
							<b>RECEIVER (BILL TO)</b><br />
							Name : ' . $username . '<br />	
							Billing Address : ' . $row["delievery_address"] . '<br />
						</td>
						<td width="35%">
							Reverse Charge<br />
							Invoice No. : ' . $row["order_num"] . '<br />
							Invoice Date : ' . $row["date_created"] . '<br />
						</td>
					</tr>
				</table>
				<br />
				<table width="100%" border="1" cellpadding="5" cellspacing="0">
					<tr>
					
						<th>Order Num</th>
							<th>Product</th>	
						<th>Quantity</th>
								<th>Price</th>
						
					</tr>
					';
        $select = "SELECT * FROM `order` o JOIN `product` p WHERE order_num='$order_num' AND o.product_id=p.id";
        $run_select = mysqli_query($conn, $select);
    $total_order = 0;
    $total_cash_order = 0;
        while ($rows = mysqli_fetch_array($run_select)) {
            $order_num = $rows['order_num'];
            $product_name = $rows['name'];
            $quantity = $rows['quantity'];
            $total_price = $rows['total_price'];
            $unit_price = $rows['unit_price'];
            $payment_type = $rows['payment_type'];
            $order_status = $rows['status'];
            $date_created = $rows['date_created'];

            $total_order = $total_order + $rows["quantity"];
            $total_cash_order = $total_cash_order + $rows["total_price"];
            $output .= '
                    <tr>
                    
                    <td>'.$order_num.'</td>
                  
                   <td>'.$product_name.'</td>
                   
                   <td>'.$quantity.'</td>
                    <td>'.$total_price.'</td>
            
					</tr>
					
		';



    }

    $output .= '
   <tr>
                                <td align="right"><b>Total</b></td>
                                <td></td>
                                <td><b>'.$total_order.' </b></b></td>
                                <td><b>'.$total_cash_order.'</b></td>
                             

                            </tr>
						</table>
						<br />
						<br />
						<br />
						<br />
						<br />
						<br />
						<p align="right">----------------------------------------<br />Receiver Signature</p>
						<br />
						<br />
						<br />
					</td>
				</tr>
			</table>
		';

$pdf = new Pdf();
$file_name = 'Order-' . $row["order_num"] . '.pdf';
$pdf->loadHtml($output);
$pdf->render();
$pdf->stream($file_name, array("Attachment" => false));
}

?>