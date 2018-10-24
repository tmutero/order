<?php
include('functions.php');
//
if (!isLoggedIn()) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}


$username=$_SESSION['user']['username'];

$userId = $_SESSION['user']['id'];
//session_start();
require_once("dbcontroller.php");
$db_handle = new DBController();

if(!empty($_GET["action"])) {

    switch($_GET["action"]) {
        case "add":
            if(!empty($_POST["quantity"])) {
                $productByCode = $db_handle->runQuery("SELECT * FROM product WHERE code='" . $_GET["code"] . "'");
                $itemArray = array($productByCode[0]["code"]=>array('name'=>$productByCode[0]["name"], 'code'=>$productByCode[0]["code"], 'quantity'=>$_POST["quantity"], 'price'=>$productByCode[0]["o_price"], 'id'=>$productByCode[0]["id"], 'image'=>$productByCode[0]["image_name"]));

                if(!empty($_SESSION["cart_item"])) {
                    if(in_array($productByCode[0]["code"],array_keys($_SESSION["cart_item"]))) {
                        foreach($_SESSION["cart_item"] as $k => $v) {
                            if($productByCode[0]["code"] == $k) {
                                if(empty($_SESSION["cart_item"][$k]["quantity"])) {
                                    $_SESSION["cart_item"][$k]["quantity"] = 0;
                                }
                                $_SESSION["cart_item"][$k]["quantity"] += $_POST["quantity"];
                            }
                        }
                    } else {
                        $_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
                    }
                } else {
                    $_SESSION["cart_item"] = $itemArray;
                }
            }
            break;
        case "remove":
            if(!empty($_SESSION["cart_item"])) {
                foreach($_SESSION["cart_item"] as $k => $v) {
                    if($_GET["code"] == $k)
                        unset($_SESSION["cart_item"][$k]);
                    if(empty($_SESSION["cart_item"]))
                        unset($_SESSION["cart_item"]);
                }
            }
            break;
        case "empty":
            unset($_SESSION["cart_item"]);
            break;
    }
}
?>

<head>
    <title>Customer:: Home
    </title>

</head>
<?php include ("header.php");?>

<div id="alert_action" class="col-6" align="center"></div>
<div id="shopping-cart">
    <div class="txt-heading">Shopping Cart</div>

    <a id="btnEmpty" href="index.php?action=empty">Empty Cart</a>
    <?php
    if(isset($_SESSION["cart_item"])){
        $total_quantity = 0;
        $total_price = 0;
        ?>
        <table class="tbl-cart" cellpadding="10" cellspacing="1">
            <tbody>
            <tr>
                <th style="text-align:left;">Name</th>
                <th style="text-align:left;">Code</th>
                <th style="text-align:right;" width="5%">Quantity</th>
                <th style="text-align:right;" width="10%">Unit Price</th>
                <th style="text-align:right;" width="10%">Price</th>
                <th style="text-align:center;" width="5%">Remove</th>
            </tr>
            <?php
            foreach ($_SESSION["cart_item"] as $item){
                $item_price = $item["quantity"]*$item["price"];
                ?>
                <tr>
                    <td><img src="upload/<?php echo $item["image"]; ?>" class="cart-item-image"  width="240" height="150" /><?php echo $item["name"]; ?></td>
                    <td><?php echo $item["code"]; ?></td>
                    <td style="text-align:right;"><?php echo $item["quantity"]; ?></td>
                    <td  style="text-align:right;"><?php echo "$ ".$item["price"]; ?></td>
                    <td  style="text-align:right;"><?php echo "$ ". number_format($item_price,2); ?></td>
                    <td style="text-align:center;"><a href="index.php?action=remove&code=<?php echo $item["code"]; ?>" class="btnRemoveAction"><img src="icon-delete.png" alt="Remove Item" /></a></td>
                </tr>
                <?php
                $total_quantity += $item["quantity"];
                $total_price += ($item["price"]*$item["quantity"]);
            }
            ?>

            <tr>
                <td colspan="2" align="right">Total:</td>
                <td align="right"><?php echo $total_quantity; ?></td>
                <td align="right" colspan="2"><strong><?php echo "$ ".number_format($total_price, 2); ?></strong></td>
                <td><button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#em1">Make Payment</button></td>
            </tr>
            </tbody>
        </table>
        <?php
    } else {
        ?>
        <div class="no-records">Your Cart is Empty</div>
        <?php
    }
    ?>
</div>

<div id="product-grid" style="padding-bottom: 100%">
    <div class="txt-heading">Products</div>
    <div style="padding-left: 8%">
        <?php
        $product_array = $db_handle->runQuery("SELECT * FROM product ORDER BY id ASC");
        if (!empty($product_array)) {
            foreach($product_array as $key=>$value){
                ?>
                <div class="product-item">
                    <form method="post" action="index.php?action=add&code=<?php echo $product_array[$key]["code"]; ?>">
                        <div class="product-image"><img src="upload/<?php echo $product_array[$key]["image_name"]; ?> " width="240" height="150"></div>
                        <div class="product-tile-footer">
                            <div class="product-title"><?php echo $product_array[$key]["name"]; ?></div>
                            <div class="product-price"><?php echo "$".$product_array[$key]["o_price"]; ?></div>
                            <div class="cart-action"><input type="text" class="product-quantity" name="quantity" value="1" size="2" /><input type="submit" value="Add to Cart" class="btnAddAction" /></div>
                        </div>
                    </form>
                </div>
                <?php
            }
        }
        ?>
    </div>

</div>
<div class="modal fade" id="em1" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Submit Payment</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

              <?php
    if(isset($_SESSION["cart_item"])){
        $total_quantity = 0;
        $total_price = 0;

        ?>


        <table class="tbl-cart" cellpadding="10" cellspacing="1">
            <tbody>
            <tr>
                <th style="text-align:left;">Name</th>
                <th style="text-align:left;">Code</th>
                <th style="text-align:right;" width="5%">Quantity</th>
                <th style="text-align:right;" width="10%">Unit Price</th>
                <th style="text-align:right;" width="10%">Price</th>
                <th style="text-align:center;" width="5%">Remove</th>
            </tr>
            <?php
            foreach ($_SESSION["cart_item"] as $item){
                $item_price = $item["quantity"]*$item["price"];
                ?>
                <tr>
                    <td><img src="upload/<?php echo $item["image"]; ?>" class="cart-item-image"  width="240" height="150" /><?php echo $item["name"]; ?></td>
                    <td><?php echo $item["code"]; ?></td>
                    <td style="text-align:right;"><?php echo $item["quantity"]; ?></td>
                    <td  style="text-align:right;"><?php echo "$ ".$item["price"]; ?></td>
                    <td  style="text-align:right;"><?php echo "$ ". number_format($item_price,2); ?></td>
                    <td style="text-align:center;"><a href="index.php?action=remove&code=<?php echo $item["code"]; ?>" class="btnRemoveAction"><img src="icon-delete.png" alt="Remove Item" /></a></td>
                </tr>
                <?php
                $total_quantity += $item["quantity"];
                $total_price += ($item["price"]*$item["quantity"]);
            }
            ?>

            <tr>
                <td colspan="2" align="right">Total:</td>
                <td align="right"><?php echo $total_quantity; ?></td>
                <td align="right" colspan="2"><strong><?php echo "$ ".number_format($total_price, 2); ?></strong></td>
                <td><a href="checkout.php"> <button type="button" class="btn btn-info btn-sm" >Verify Payment</button></a></td>
            </tr>
            </tbody>
        </table>
        <?php
    } ?>

            </div>
        </div>
    </div>
</div>

    <div  class="modal fade" id="orders" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Order List</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <table class="table table-hover">
                        <thead>
                        <th>Order Number</th>
                        <th>Date Created</th>

                        <th>Quantity</th>
                        <th>Located</th>
                        <th>Product Name</th>
                        <th>Status</th>
                        <th>Action</th>
                        </thead>
                        <tbody>
                        <?php
                        include('conn.php');
                        $select = "SELECT  order_num,date_created,username, area,quantity,name,status,o.id
FROM `order` o JOIN  users  u  ON o.user_id=u.id JOIN product p ON o.product_id=p.id WHERE o.user_id='$userId' ORDER BY date_created DESC ";
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

                                <td><?php echo $quantity; ?></td>
                                <td><?php echo $area; ?></td>
                                <td><?php echo $product_name;?></td>
                                <td><?php echo $status;?></td>
                                <td class='text-center'><a href='#' id="<?php echo  $rows["id"];?>" class='delete_order'><span class='pe-7s-plus' aria-hidden='true'>Delete</span></a></td>



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
    <script type="text/javascript">
        $(function () {
            $(".delete_order").click(function () {

                var element = $(this);
                var appid = element.attr("id");
                var info = appid;


                if (confirm("Are you sure you want to delete this order?")) {
                    $.ajax({
                        type: "POST",
                        url: "deleteCustomerOrder.php",
                        data: {info: info},
                        success: function () {

                            $('#orders').modal('hide');

                            $('#alert_action').fadeIn().html('<div class="alert alert-success">'+data+'</div>');
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
<?php include ("footer.php");?>