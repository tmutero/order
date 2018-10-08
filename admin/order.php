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
                        <p class="category">List of all products by time</p>
                    </div>

                    <div class="content table-responsive table-full-width">
                        <table class="table table-hover">
                            <thead>
                            <th>Order Number</th>
                            <th>Date Created</th>
                            <th>Customer</th>
                            <th>Product Name</th>
                            <th>Quantity</th>
                            <th>View</th>
                            </thead>
                            <tbody>
                            <?php
                            include('../conn.php');
                            $select = "SELECT  * FROM `users`";
                            $run_select = mysqli_query($conn, $select);
                            while ($rows = mysqli_fetch_array($run_select)) {
                                $username  = $rows['username'];

                                ?>
                                <tr>
                                    <td><?php echo $username; ?></td>
                                    <td><?php echo $username; ?></td>
                                    <td><?php echo $username; ?></td>
                                    <td><?php echo $username; ?></td>
                                    <td><?php echo $username; ?></td>
                                    <td></td>

                                </tr>
                                <?php
                            }

                            ?>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>


            <div class="col-md-12">
                <div class="card card-plain">
                    <div class="header">
                        <h4 class="title">Table on Plain Background</h4>
                        <p class="category">Here is a subtitle for this table</p>
                    </div>
                    <div class="content table-responsive table-full-width">
                        <table class="table table-hover">
                            <thead>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Salary</th>
                            <th>Country</th>
                            <th>City</th>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>

                    </div>
                </div>
            </div>


        </div>
    </div>
</div>


<?php include('footer.php'); ?>
