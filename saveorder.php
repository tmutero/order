<?php include('functions.php');
include('conn.php');
//
if (!isLoggedIn()) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}

$userId = $_SESSION['user']['id'];

function createRandomOrder()
{
    $chars = "997662500087652";
    srand((double)microtime() * 1000000);
    $i = 0;
    $pass = '';
    while ($i <= 5) {

        $num = rand() % 22;

        $tmp = substr($chars, $num, 1);

        $pass = $pass . $tmp;

        $i++;

    }
    return $pass;
}

$order_num = 'ODI' . createRandomOrder();






if (isset($_POST["btn"])) {


    $delievery_address = $_POST['delievery_address'];
    $area = $_POST['area'];
    $payment_type = $_POST['payment_type'];


    foreach ($_SESSION["cart_item"] as $item) {
        $item_price = $item["quantity"] * $item["price"];

        $quantity=$item["quantity"];
        $unit_price=$item["price"];
        $product_id=$item["id"];


        $query = "INSERT INTO `order`(`user_id`, `order_num`, `product_id`, `quantity`, `total_price`, `unit_price`,`payment_type`,`area`,`delievery_address`,`status`) 
              VALUES ('$userId','$order_num','$product_id','$quantity','$item_price','$unit_price','$payment_type','$area','$delievery_address','pending')";
        $run_insert=mysqli_query($conn,$query);








        if ($run_insert){

            unset($_SESSION["cart_item"]);

            header("location:  orderportal.php?od_num=$order_num");

        }



        $total_quantity += $item["quantity"];
        $total_price += ($item["price"]*$item["quantity"]);

    }


}

?>

