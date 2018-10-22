<?php
/**
 * Created by PhpStorm.
 * User: tmutero
 * Date: 10/13/18
 * Time: 6:55 PM
 */
include('functions.php');
include('conn.php');

if (!isLoggedIn()) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}

$output = '';
$od_num=$_GET['od_num'];
?>
    <head>
        <title>Order ::-<?php echo $od_num;?>
        </title>

    </head>
<?php include ("header.php");?>

<div class="container">
    <div class="row">
        <div class="col-lg-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-6">
                            <h3 class="panel-title">Order List</h3>
                        </div>

                    </div>
                </div>
                <div class="panel-body">
                    <table id="zero_config" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Order Number</th>
                            <th>Product</th>
                            <th>Total Amount</th>
                            <th>Payment Status</th>
                            <th>Order Status</th>
                            <th>Order Date</th>
                            <th></th>

                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $select = "SELECT * FROM `order` o JOIN `product` p WHERE order_num='$od_num' AND o.product_id=p.id";
                        $run_select = mysqli_query($conn, $select);
                        while ($rows = mysqli_fetch_array($run_select)) {
                            $order_num  = $rows['order_num'];
                            $product_name  = $rows['name'];
                            $quantity  = $rows['quantity'];
                            $total_price  = $rows['total_price'];
                            $unit_price  = $rows['unit_price'];
                            $payment_type=$rows['payment_type'];
                            $order_status=$rows['status'];
                            $date_created=$rows['date_created'];

                            ?>
                            <tr>
                                <td><?php echo $order_num; ?></td>
                                <td><?php echo $product_name; ?></td>
                                <td><?php echo $total_price; ?></td>
                                <td><?php echo $payment_type; ?></td>
                                <td><?php echo $order_status;?></td>
                                <td><?php echo $date_created; ?></td>
                                <td><a href="view_order.php?pdf=1&order_num=<?php echo $rows["order_num"];?>" class="btn btn-info btn-xs">View PDF</a></td>



                            </tr>
                            <?php
                        }

                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


<?php include ("footer.php");?>