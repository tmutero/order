
<!DOCTYPE html>
<html lang="zxx">

<head>

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

    <link href="assets/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
    <!-- Bootstrap css -->
    <link href="assets/css/style.css" rel="stylesheet" type="text/css" media="all" />
    <!-- Main css -->
    <link rel="stylesheet" href="assets/css/fontawesome-all.css">
    <!-- Font-Awesome-Icons-CSS -->
    <link href="assets/css/popuo-box.css" rel="stylesheet" type="text/css" media="all" />
    <!-- pop-up-box -->
    <link href="assets/css/menu.css" rel="stylesheet" type="text/css" media="all" />
    <link href="cartCSS.css" rel="stylesheet" type="text/css">


    <!-- web fonts -->
    <link href="//fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i&amp;subset=latin-ext" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese"
          rel="stylesheet">


    <script src="assets/js/datatables.min.js"></script>

    <link href="assets/js/dataTables.bootstrap4.css" rel="stylesheet">


    <script src="assets/js/jquery-1.12.3.min.js"></script>


</head>

<body>
<!-- top-header -->
<div class="agile-main-top">
    <div class="container-fluid">
        <div class="row main-top-w3l py-2">
            <div class="col-lg-4 header-most-top">
                <p class="text-white text-lg-left text-center">Offer Zone Top Deals & Discounts
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
                        <i class="fas fa-user mr-2"></i>Welcome:-<?php echo $username;?>
                    </li>
                    <li class="text-center border-right text-white">
                        <a href="index.php?logout='1" class="text-white">
                            <i class="fas fa-sign-in-alt mr-2"></i> Logout </a>
                    </li>

                </ul>
                <!-- //header lists -->
            </div>
        </div>
    </div>
</div>


<div id="small-dialog1" class="mfp-hide">
    <div class="select-city">
        <h3>
            <i class="fas fa-map-marker"></i> Please Select Your Location</h3>
        <select class="list_of_cities">
            <optgroup label="Popular Cities">
                <option selected style="display:none;color:#eee;">Select Street</option>
                <option>First Street</option>
                <option>Copa Cabana</option>
                <option>Charge Office</option>
                <option>Gulf Complex</option>
                <option>Joina City</option>

            </optgroup>


        </select>
        <div class="clearfix"></div>
    </div>
</div>


<div class="header-bot">
    <div class="container">
        <div class="row header-bot_inner_wthreeinfo_header_mid">
            <!-- logo -->
            <div class="col-md-3 logo_agile">
                <h1 class="text-center">
                    <a href="index.php" class="font-weight-bold font-italic">
                        <img src="assets/images/logo2.png" alt=" " class="img-fluid">Smart Store
                    </a>
                </h1>
            </div>
            <!-- //logo -->
            <!-- header-bot -->
            <div class="col-md-9 header mt-4 mb-md-0 mb-4">
                <div class="row">
                    <!-- search -->
                    <div class="col-10 agileits_search">
                        <form class="form-inline" action="#" method="post">
                            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" required>
                            <button class="btn my-2 my-sm-0" type="submit">Search</button>
                        </form>
                    </div>
                    <!-- //search -->
                    <!-- cart details -->
                    <div class="col-2 top_nav_right text-center mt-sm-0 mt-2">
                        <div class="wthreecartaits wthreecartaits2 cart cart box_1">
                            <form action="#" method="post" class="last">
                                <input type="hidden" name="cmd" value="_cart">
                                <input type="hidden" name="display" value="1">


                                <a href="#" data-toggle="modal" data-target="#orders" class="nav-link" href="">

                                    <button class="btn w3view-cart" type="submit" name="submit" value="">
                                        <i class="fas fa-cart-arrow-down"></i>
                                    </button>
                                </a>
                            </form>
                        </div>
                    </div>
                    <!-- //cart details -->
                </div>
            </div>
        </div>
    </div>
</div>

<div class="navbar-inner">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto text-center mr-xl-5">
                    <li class="nav-item active mr-lg-2 mb-lg-0 mb-2">
                        <a class="nav-link" href="index.php">Home
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item mr-lg-2 mb-lg-0 mb-2">
                        <a href="#" data-toggle="modal" data-target="#orders" class="nav-link" href="">My Orders</a>
                    </li>


                </ul>
            </div>
        </nav>
    </div>
</div>
