<?php
include('../functions.php');

if (!isAdmin()) {
    $_SESSION['msg'] = "You must log in first";
    header('location: ../login.php');
}
$countUsers = "SELECT * FROM `users`";
$countU = mysqli_query($db, $countUsers);
$totalUsers = mysqli_num_rows($countU);


$countOrders = "SELECT * FROM `order`";
$countO = mysqli_query($db, $countOrders);
$totalOrders = mysqli_num_rows($countO);

$countProducts = "SELECT * FROM `product`";
$countP = mysqli_query($db, $countProducts);
$totalProduct = mysqli_num_rows($countP);

$countPurchased = "SELECT * FROM `purchased_items`";
$countPurchases = mysqli_query($db, $countPurchased);
$totalPurchasedProducts = mysqli_num_rows($countPurchases);


?>

<html>
<head>
    <title>Home:: Home
    </title>

</head>

<?php include('nav-bar.php'); ?>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <div class="panel panel-default">
                    <div class="panel-heading"><strong>Total User</strong></div>
                    <div class="panel-body" align="center">
                        <h3><?php echo $totalUsers; ?></h3>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="panel panel-default">
                    <div class="panel-heading"><strong>Total Purchased Products</strong></div>
                    <div class="panel-body" align="center">
                        <h3><?php echo $totalPurchasedProducts; ?></h3>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="panel panel-default">
                    <div class="panel-heading"><strong>Total Product in Stock</strong></div>
                    <div class="panel-body" align="center">
                        <h3><?php echo $totalProduct; ?></h3>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="panel panel-default">
                    <div class="panel-heading"><strong>Total Orders</strong></div>
                    <div class="panel-body" align="center">
                        <h3><?php echo $totalOrders; ?></h3>
                    </div>
                </div>
            </div>

        </div>


        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading"><strong>Total Purchase Products </strong></div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                            <thead>
                            <th>Transcation Number</th>
                            <th>Date Purchased</th>
                            <th>Product Name</th>
                            <th>Quantity</th>
                            <th>Total Price</th>

                            <th>Customer</th>
                            </thead>
                            <tbody>
                            <?php
                            include('../conn.php');
                            $total_order = 0;
                            $total_cash_order = 0;

                            $select = "SELECT * FROM purchased_items p JOIN product pr ON p.product_id=pr.id JOIN users u ON p.user_id=u.id";
                            $run_select = mysqli_query($conn, $select);
                            while ($rows = mysqli_fetch_array($run_select)) {
                                $order_num = $rows['order_num'];
                                $date_created = $rows['date_approved'];
                                $username = $rows['username'];
                                $area = $rows['area'];
                                $quantity = $rows['quantity'];
                                $product_name = $rows['name'];
                                $total_price = $rows['total_price'];

                                ?>
                                <tr>
                                    <td><?php echo $order_num; ?></td>
                                    <td><?php echo $date_created; ?></td>
                                    <td><?php echo $product_name; ?></td>
                                    <td><?php echo $quantity; ?></td>
                                    <td><?php echo $total_price; ?></td>
                                    <td><?php echo $username; ?></td>

                                </tr>

                                <?php

                                $total_order = $total_order + $rows["quantity"];
                                $total_cash_order = $total_cash_order + $rows["total_price"];

                            }


                            ?>
                            <tr>
                                <td align="right"><b>Total</b></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td><b><?php echo '$'.$total_cash_order;?></b></td>
                                <td></td>

                            </tr>

                            </tbody>
                        </table>

                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php include('footer.php'); ?>
