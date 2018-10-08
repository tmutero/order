<?php include('functions.php') ?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>Smart Store | Home</title>
    <!-- Meta tag Keywords -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8" />
    <meta name="keywords" content="Electro Store Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design"
    />
    <script>
        addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <!-- //Meta tag Keywords -->

    <!-- Custom-Files -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
    <!-- Bootstrap css -->
    <link href="assets/css/style.css" rel="stylesheet" type="text/css" media="all" />
    <!-- Main css -->
    <link rel="stylesheet" href="assets/css/fontawesome-all.css">
    <!-- Font-Awesome-Icons-CSS -->
    <link href="assets/css/popuo-box.css" rel="stylesheet" type="text/css" media="all" />
    <!-- pop-up-box -->
    <link href="assets/css/menu.css" rel="stylesheet" type="text/css" media="all" />
    <!-- menu style -->
    <!-- //Custom-Files -->

    <!-- web fonts -->
    <link href="//fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i&amp;subset=latin-ext" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese"
          rel="stylesheet">
    <!-- //web fonts -->

</head>

<body>
<!-- top-header -->
<div class="agile-main-top">
    <div class="container-fluid">
        <div class="row main-top-w3l py-2">
            <div class="col-lg-4 header-most-top">
                <p class="text-white text-lg-left text-center">Smart Store Deals & Discounts
                    <i class="fas fa-shopping-cart ml-1"></i>
                </p>
            </div>
            <div class="col-lg-8 header-right mt-lg-0 mt-2">
                <!-- header lists -->
                <ul>
                    <li class="text-center border-right text-white">
                        <a class="play-icon popup-with-zoom-anim text-white" href="#small-dialog1">
                            <i class="fas fa-map-marker mr-2"></i>Select Location</a>
                    </li>
                    <li class="text-center border-right text-white">
                        <a href="#" data-toggle="modal" data-target="#exampleModal" class="text-white">
                            <i class="fas fa-truck mr-2"></i>Track Order</a>
                    </li>
                    <li class="text-center border-right text-white">
                        <i class="fas fa-phone mr-2"></i> 001 234 5678
                    </li>
                    <li class="text-center text-white">
                        <a href="#" data-toggle="modal" data-target="#exampleModal2" class="text-white">
                            <i class="fas fa-sign-out-alt mr-2"></i>Register </a>
                    </li>
                </ul>
                <!-- //header lists -->
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-3"></div>
        <div class="col-6" style="padding-top: 5%;padding-bottom: 10%">
            <div class="panel panel-default">
                <div style="text-align: center;">  <div class="panel-body">Log In</div></div>

            </div>
            <form role="form" method="post" action="login.php">
                <?php echo display_error(); ?>
                <div class="form-group">
                    <label class="col-form-label">Username</label>
                    <input type="text" class="form-control" placeholder=" " name="username" required="" value="<?php echo $username; ?>">
                </div>
                <div class="form-group">
                    <label class="col-form-label">Password</label>
                    <input type="password" class="form-control" placeholder=" " name="password" required=""value="<?php echo $password; ?>">
                </div>
                <div class="right-w3l">
                    <input type="submit" class="form-control" name="login_btn" value="Log in">
                </div>
                <div class="sub-w3l">
                    <div class="custom-control custom-checkbox mr-sm-2">
                        <input type="checkbox" class="custom-control-input" id="customControlAutosizing">
                        <label class="custom-control-label" for="customControlAutosizing">Remember me?</label>
                    </div>
                </div>
                <p class="text-center dont-do mt-3">Don't have an account?
                    <a href="#" data-toggle="modal" data-target="#exampleModal2">
                        Register Now</a>
                </p>
            </form>
        </div>
        <div class="col-3"></div>


    </div>

</div>

<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Register</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="login.php">
                    <?php echo display_error(); ?>
                    <div class="form-group">
                        <label class="col-form-label">Your Name</label>
                        <input type="text" class="form-control" placeholder=" " name="username" required="" value="<?php echo $username; ?>">
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">Email</label>
                        <input type="email" class="form-control" placeholder=" " required=""  name="email" value="<?php echo $email; ?>">
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">Password</label>
                        <input type="password" class="form-control" placeholder=" " id="password1" required=""  name="password_1" >
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">Confirm Password</label>
                        <input type="password" class="form-control" placeholder=" "  id="password2"  name="password_2" >
                    </div>
                    <div class="right-w3l">
                        <input type="submit" class="form-control" name="register_btn" value="Register">
                    </div>
                    <div class="sub-w3l">
                        <div class="custom-control custom-checkbox mr-sm-2">
                            <input type="checkbox" class="custom-control-input" id="customControlAutosizing2">
                            <label class="custom-control-label" for="customControlAutosizing2">I Accept to the Terms & Conditions</label>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="copy-right py-3">
    <div class="container">
        <p class="text-center text-white">© 2018 Edrite Soft Tech. All rights reserved | Design by
            <a href="http://tansoft.com"> Tansoft Tech.</a>
        </p>
    </div>
</div>
<!-- //copyright -->

<!-- js-files -->
<!-- jquery -->
<script src="assets/js/jquery-2.2.3.min.js"></script>
<!-- //jquery -->


<script src="assets/js/bootstrap.js"></script>
<!-- //for bootstrap working -->
<!-- //js-files -->
</body>

</html>
