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
            <div class="col-md-6">
                <div class="card ">
                    <div class="header">
                        <h4 class="title"></h4>
                        <p class="category">All products including</p>
                    </div>
                    <div class="content">
                        <div id="product" class="ct-chart"></div>

                        <div class="footer">
                            <hr>
                            <div class="stats">
                                <i class="fa fa-check"></i> Product information
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>


<?php include('footer.php'); ?>
