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

                    <div class="content table-responsive table-full-width">

                        <table class="table table-hover">
                            <thead>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Date Created</th>
                            <th>Phone Number</th>

                            </thead>
                            <tbody>
                            <?php
                            include('../conn.php');
                            $select = "SELECT  * FROM `users`";
                            $run_select = mysqli_query($conn, $select);
                            while ($rows = mysqli_fetch_array($run_select)) {
                                $username  = $rows['username'];
                                $email  = $rows['email'];
                                $datecreated=$rows['datecreated'];
                                $id=$rows['id'];

                                ?>
                                <tr>
                                    <td><?php echo $username; ?></td>
                                    <td><?php echo $email; ?></td>
                                    <td><?php echo $datecreated; ?></td>
                                    <td><?php echo $email; ?></td>


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


<?php include('footer.php'); ?>
