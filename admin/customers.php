<?php
include('../functions.php');

if (!isAdmin()) {
    $_SESSION['msg'] = "You must log in first";
    header('location: ../login.php');
}

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
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Registered Customers</h4>
                        <p class="category">List of all users</p>
                    </div>
                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#addCustomer">Add
                        New Customer
                    </button>

                    <div class="content table-responsive table-full-width">

                        <table class="table table-hover">
                            <thead>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Date Created</th>

                            <th>Action</th>
                            </thead>
                            <tbody>
                            <?php
                            include('../conn.php');
                            $select = "SELECT  * FROM `users` WHERE user_type !='admin'";
                            $run_select = mysqli_query($conn, $select);
                            while ($rows = mysqli_fetch_array($run_select)) {
                                $username  = $rows['username'];
                                $email  = $rows['email'];
                                $datecreated=$rows['datecreated'];


                                ?>
                                <tr>
                                    <td><?php echo $username; ?></td>
                                    <td><?php echo $email; ?></td>
                                    <td><?php echo $datecreated; ?></td>

                                    <td class='text-center'><a href='#' id="<?php echo  $rows["id"];?>" class='delete'><span class='pe-7s-plus' aria-hidden='true'>Delete</span></a></td>



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
        $(".delete").click(function () {

            var element = $(this);
            var appid = element.attr("id");
            var info = appid;


            if (confirm("Are you sure you want to delete this customer?")) {
                $.ajax({
                    type: "POST",
                    url: "delete_customer.php",
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
