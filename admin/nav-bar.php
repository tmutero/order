
<head>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport'/>
    <meta name="viewport" content="width=device-width"/>


    <!-- Bootstrap core CSS     -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet"/>

    <!-- Animation library for notifications   -->
    <link href="../assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="../assets/css/light-bootstrap-dashboard.css" rel="stylesheet"/>


    <link href="../assets/css/pe-icon-7-stroke.css" rel="stylesheet"/>



</head>


<body>
<div id="addProduct" class="modal fade" role="dialog">
    <div class="modal-dialog  ">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Product Add</h4>
            </div>
            <div class="modal-body">


                <form method="POST" action="addProduct.php" enctype="multipart/form-data">
                    <input type="hidden" name="size" value="1000000">


                    <div class="form-group">
                        <label>Product Name</label>
                        <input type="text" class="form-control" placeholder="Enter ..." name="name" required="required">
                    </div>
                    <div class="form-group">
                        <label>Product Code</label>
                        <input type="text" class="form-control" placeholder="Enter ..." name="code" required="required">
                    </div>

                    <div class="form-group">
                        <label>Selling Price</label>
                        <input type="number" step="0.01" class="form-control" placeholder="Enter ..." name="o_price" required="required">
                    </div>

                    <div class="form-group">
                        <label>Quantity</label>
                        <input type="number" class="form-control" placeholder="Enter ..." name="qty" required="required">
                    </div>

                    <div class="form-group">
                        <label>Date added</label>
                        <input type="date" class="form-control" placeholder="Enter ..." name="date_added" required="required">
                    </div>

                    <div class="form-group">
                        <label>Expiry Date</label>
                        <input type="date" class="form-control" placeholder="Enter ..." name="expiry_date" required="required">
                    </div>

                    <div class="form-group">
                        <label>Product Image</label>
                        <input type="file" name="image" class="form-control" required="required">
                    </div>


                        <div class="box-footer">
                            <button type="submit" class="btn btn-default">Cancel</button>
                            <button type="submit" class="btn btn-info pull-right" name="btn" >Save</button>
                        </div>




                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>

<div id="addCustomer" class="modal fade" role="dialog">
    <div class="modal-dialog  ">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Customer Add</h4>
            </div>
            <div class="modal-body">

                <div class="login-form">
                    <form method="post" action="../functions.php">
                        <div class="form-group">
                            <label>User Name</label>
                            <input type="text" class="form-control" placeholder="User Name" name="username" value="<?php echo $username; ?>">

                        </div>
                        <div class="form-group">
                            <label>Email address</label>
                            <input type="email" class="form-control" placeholder="Email" name="email" value="<?php echo $email; ?>">
                        </div>

                        <div class="controls form-group">
                            <label>User Type</label>
                            <select class="form-control"  name="user_type" id="user_type" >
                                <option value="">Select Roles</option>
                                <option value="admin">Admin</option>
                                <option value="user">Customer</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" placeholder="Password" name="password_1" >
                        </div>
                        <div class="form-group">
                            <label>Confirm Password</label>
                            <input type="password" class="form-control" placeholder="Password" name="password_2" >
                        </div>


                        <button type="submit" class="btn btn-primary btn-flat m-b-30 m-t-30" name="register_btn">Register</button>


                    </form>

                </div>






            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>
<div class="wrapper">
    <div class="sidebar" data-color="purple" data-image="assets/img/sidebar-5.jpg">
        <div class="sidebar-wrapper">
            <div class="logo">
                <a href="#" class="simple-text">
                    Smart Store
                </a>
            </div>

            <ul class="nav">
                <li class="active">
                    <a href="home.php">
                        <i class="pe-7s-graph"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li>
                    <a href="customers.php">
                        <i class="pe-7s-user"></i>
                        <p>Users</p>
                    </a>
                </li>
                <li>
                    <a href="order.php">
                        <i class="pe-7s-note2"></i>
                        <p>Orders</p>
                    </a>
                </li>
                <li>
                    <a href="product.php">
                        <i class="pe-7s-news-paper"></i>
                        <p>Product</p>
                    </a>
                </li>



            </ul>

        </div>
    </div>

    <div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="home.php">Dashboard</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-left">
                        <li>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-dashboard"></i>
                            </a>
                        </li>
                    </ul>

                    <ul class="nav navbar-nav navbar-right">

                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <p>
                                    Account
                                    <b class="caret"></b>
                                </p>

                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Profile</a></li>
                                <li class="divider"></li>
                                <li><a href="#">View Orders</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="home.php?logout='1'">
                                <p>Log out</p>
                            </a>
                        </li>
                        <li class="separator hidden-lg"></li>
                    </ul>
                </div>
            </div>
        </nav>


        <script src="../assets/js/jquery-1.12.3.min.js"></script>








