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
//
//
//    while ($rows = mysqli_fetch_array($run_select)) {
//        $output .= '
//		<table width="100%" border="1" cellpadding="5" cellspacing="0">
//			<tr>
//				<td colspan="2" align="center" style="font-size:18px"><b>Invoice</b></td>
//			</tr>
//			<tr>
//				<td colspan="2">
//				<table width="100%" cellpadding="5">
//					<tr>
//						<td width="65%">
//							To,<br />
//							<b>RECEIVER (BILL TO)</b><br />
//							Name :. Admin <br />
//							Billing Address :. 54 Causeway Street One Stop Shop, Hre<br />
//						</td>
//						<td width="35%">
//							From . : ' . $username . '<br />
//							Invoice No. : ' . $rows["order_num"] . '<br />
//							Invoice Date :' . $rows["date_created"] . ' <br />
//						</td>
//					</tr>
//				</table>
//				<br />
//
//
//
//
//
//
//		';
//    }
    foreach($run_select as $row)
    {
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
							Name : '.$username.'<br />	
							Billing Address : '.$row["delievery_address"].'<br />
						</td>
						<td width="35%">
							Reverse Charge<br />
							Invoice No. : '.$row["order_num"].'<br />
							Invoice Date : '.$row["date_created"].'<br />
						</td>
					</tr>
				</table>
				<br />
				<table width="100%" border="1" cellpadding="5" cellspacing="0">
					<tr>
					
						<th>Price</th>	<th>Price</th>	<th>Price</th>	<th>Price</th>	<th>Price</th>
						
					</tr>
					
		';
        $query2 = "SELECT * FROM `order` o JOIN `product` p WHERE order_num='$order_num' AND o.product_id=p.id'";

        $result2 = mysqli_query($conn, $query2);
        $count = 0;
        $total = 0;
        $total_actual_amount = 0;
        $total_tax_amount = 0;
        foreach($result2 as $sub_row)
        {
            $output .= '
				<tr>
					<td>'.$sub_row['order_num'].'</td>
					<td>'.$sub_row['order_num'].'</td>
					<td>'.$sub_row["order_num"].'</td>
					<td>'.$sub_row["order_num"].'%</td>
			
				</tr>
			';
        }
        $output .= '
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
    }
    $pdf = new Pdf();
    $file_name = 'Order-' . $row["order_num"] . '.pdf';
    $pdf->loadHtml($output);
    $pdf->render();
    $pdf->stream($file_name, array("Attachment" => false));
}

?>