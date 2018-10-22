<?php include('functions.php');
include('conn.php');

if (!isLoggedIn()) {
$_SESSION['msg'] = "You must log in first";
header('location: login.php');
}
?>
<head>
    <title>Customer:: Checkout
    </title>

</head>
<?php include ("header.php");

$userId = $_SESSION['user']['id'];
foreach ($_SESSION["cart_item"] as $item) {
    $total_quantity += $item["quantity"];
    $total_price += ($item["price"]*$item["quantity"]);

}





?>

<div class="privacy py-sm-5 py-4">
    <div class="container py-xl-4 py-lg-2">
        <!-- tittle heading -->

        <div id="orderSuccess"></div>
        <h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">
            <span>C</span>heckout
        </h3>
        <!-- //tittle heading -->
        <div class="checkout-right">
            <h4 class="mb-sm-4 mb-3">Your shopping cart contains:
                <span><?php echo  $total_quantity;?>-- Products</span>
            </h4>
            <div class="table-responsive">
                <table class="timetable_sub">
                    <thead>
                    <tr>
                        <th>Product Quantity</th>
                        <th>Total Price ($)</th>


                    </tr>
                    </thead>
                    <tbody>

                    <tr class="rem2">

                        <td class="invert">
                            <div class="quantity">
                                <div class="quantity-select">
                                    <div class="">&nbsp;</div>
                                    <div class="entry value">
                                        <span><?php echo  $total_quantity;?></span>
                                    </div>
                                    <div class="">&nbsp;</div>
                                </div>
                            </div>
                        </td>
                        <td class="invert"><?php echo  $total_price?></td>


                    </tr>

                    </tbody>
                </table>
            </div>
        </div>
        <div class="checkout-left">
            <div class="address_form_agile mt-sm-5 mt-4">
                <h4 class="mb-sm-4 mb-3">Add a new Details</h4>
                <form method="POST" action="saveorder.php">
                    <div class="creditly-wrapper wthree, w3_agileits_wrapper">
                        <div class="information-wrapper">
                            <div class="first-row">

                                <div class="controls form-group">
                                    <select class="option-w3ls" name="area">
                                        <option value="">Area Of Delievery </option>
                                        <option value="CBD">CBD</option>
                                        <option value="Chitungwiza">Chitungwiza</option>
                                        <option value="Avondale">Avondale</option>

                                    </select>
                                </div>

                                <div class="controls form-group">
                                    <select class="option-w3ls" name="payment_type">
                                        <option value="">Payment Type</option>
                                        <option value="Ecocash">Ecocash</option>
                                        <option value="Cash">Cash</option>
                                        <option value="Transfer">Transfer RTGS</option>

                                    </select>
                                </div>
                                <div class="controls form-group">
                                    <select class="option-w3ls" name="delievery_address">
                                        <option value="">Select Address type</option>
                                        <option value="office">Office</option>
                                        <option value="home">Home</option>


                                    </select>
                                </div>


                            </div>
                            <button name="btn" class="btn btn-group-lg btn-primary"> Make Payment</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
<script src="jquery-1.12.3.min.js"></script>
<script type="text/javascript">
    function saveOrder() {


        var delievery_address =$("#delievery_address").val();
        var payment_type=$("#payment_type").val();
        var area=$("#area").val();
        var btn=$("#btn").val();

        var userId=$("#userId").val();



        $.post("saveorder.php", {
                delievery_address :delievery_address ,
                btn:btn,
                area:area,
                payment_type:payment_type,
                userId:userId,


            },
            function(data) {

                $('#orderSuccess').html(data);
            });
    }
</script>
<?php include ("footer.php");?>



