<?php
include('../functions.php');

if (!isAdmin()) {
    $_SESSION['msg'] = "You must log in first";
    header('location: ../login.php');
}

?>

<html>

<head>
    <title>Home:: Order
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
                        <p class="category">List of all orders by time</p>
                    </div>

                    <div class="content table-responsive table-full-width">
                        <table class="table table-hover">
                            <thead>
                            <th>Order Number</th>
                            <th>Date Created</th>
                            <th>Customer</th>
                            <th>Quantity</th>
                            <th>Located</th>
                            <th>Product Name</th>
                            <th>Status</th>
                            <th>Action</th>
                            </thead>
                            <tbody>
                            <?php
                            include('../conn.php');
                            $select = "SELECT  order_num,date_created,username, area,quantity,name,status,o.id
FROM `order` o JOIN  users  u  ON o.user_id=u.id JOIN product p ON o.product_id=p.id ORDER BY date_created DESC ";
                            $run_select = mysqli_query($conn, $select);
                            while ($rows = mysqli_fetch_array($run_select)) {
                                $order_num  = $rows['order_num'];
                                $date_created  = $rows['date_created'];
                                $username  = $rows['username'];
                                $area  = $rows['area'];
                                $quantity  = $rows['quantity'];
                                $product_name=$rows['name'];
                                $status=$rows['status'];

                                ?>
                                <tr>
                                    <td><?php echo $order_num; ?></td>
                                    <td><?php echo $date_created; ?></td>
                                    <td><?php echo $username; ?></td>
                                    <td><?php echo $quantity; ?></td>
                                    <td><?php echo $area; ?></td>
                                    <td><?php echo $product_name;?></td>
                                    <td><?php echo $status;?></td>
                                    <td class='text-center'><a href='#' id="<?php echo  $rows["id"];?>" class='aprove'><span class='glyphicon glyphicon-user' aria-hidden='true'>Approve</span></a></td>

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
        $(".aprove").click(function () {

            var element = $(this);
            var appid = element.attr("id");
            var info = appid;


            if (confirm("Are you sure you want to approve this?")) {
                $.ajax({
                    type: "POST",
                    url: "approve.php",
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