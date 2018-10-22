<?php
include('../functions.php');

if (!isAdmin()) {
    $_SESSION['msg'] = "You must log in first";
    header('location: ../login.php');
}

?>

<html>

<head>
    <title>Home:: Products
    </title>

</head>

<?php include('nav-bar.php'); ?>
<div class="content">
    <div class="container-fluid">
        <div class="row">


            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Products Ordered</h4>
                        <p class="category">List of all products by time</p>
                    </div>

                    <div class="content table-responsive table-full-width">

                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#addProduct">Add
                            New Product
                        </button>
                        <table class="table table-hover">
                            <thead>
                            <th>Product Name</th>
                            <th>Quantity</th>
                            <th>Selling Price($)</th>
                            <th>Quantity Sold</th>
                            <th>Quantity Left</th>
                            <th>Total Amount ($)</th>
                            <th>Amount Received($)</th>
                            <th>Action</th>
                            </thead>
                            <tbody>
                            <?php
                            include('../conn.php');
                            $select = "SELECT *, o_price * qty as totalCost,o_price*qty_sold as amountReceived, qty-qty_sold as quantityInHand FROM product;";
                            $run_select = mysqli_query($conn, $select);
                            while ($rows = mysqli_fetch_array($run_select)) {
                                $name  = $rows['name'];
                                $qty  = $rows['qty'];
                                $o_price  = $rows['o_price'];
                                $qty_sold  = $rows['qty_sold'];
                                $totalCost  = $rows['totalCost'];
                                $amountReceived=$rows['amountReceived'];
                                $quantityInHand=$rows['quantityInHand'];

                                ?>
                                <tr>
                                    <td><?php echo $name; ?></td>
                                    <td><?php echo $qty; ?></td>
                                    <td><?php echo $o_price; ?></td>
                                    <td><?php echo $qty_sold; ?></td>
                                    <td><?php echo $quantityInHand;?></td>
                                    <td><?php echo $totalCost; ?></td>
                                    <td><?php echo $amountReceived;?></td>
                                    <td class='text-center'><a href='#' id="<?php echo  $rows["id"];?>" class='delete_product'><span class='pe-7s-plus' aria-hidden='true'>Delete</span></a></td>



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
</div>

<script type="text/javascript">
    $(function () {
        $(".delete_product").click(function () {

            var element = $(this);
            var appid = element.attr("id");
            var info = appid;


            if (confirm("Are you sure you want to delete this product?")) {
                $.ajax({
                    type: "POST",
                    url: "delete_product.php",
                    data: {info: info},
                    success: function () {
                    }
                });
                $(this).parent().parent().fadeOut(300, function () {
                    $(this).remove();
                });
            }
            return false;
        });
    });
</script>
<?php include('footer.php'); ?>
