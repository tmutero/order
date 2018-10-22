<?php
/**
 * Created by PhpStorm.
 * User: tmutero
 * Date: 5/10/2018
 * Time: 9:53 AM
 */
include('../conn.php');


$id = $_POST['info'];
$insert = "UPDATE `order` SET `status`='approved' WHERE id='$id'";
$run_insert = mysqli_query($conn, $insert);
//

$query1 = "SELECT * FROM `order` WHERE id='$id'";

$run_select1 =mysqli_query($conn, $query1);
$rows = mysqli_fetch_array($run_select1);
$quantity=$rows['quantity'];
$product_id=$rows['product_id'];
$payment_type=$rows['payment_type'];
$unit_price=$rows['unit_price'];
$order_num=$rows['order_num'];
$user_id=$rows['user_id'];
$total_price=$rows['total_price'];
//Update Product Quantity
$update="UPDATE `product` SET `qty_sold`=`qty_sold`+'$quantity' WHERE id='$product_id' ";
$run_insert2=mysqli_query($conn,$update);

//Insert Into Purchased Items
$query3="INSERT INTO `purchased_items`(`user_id`, `product_id`, `order_num`, `quantity`, `total_price`, `unit_price`, `payment_type`) 
VALUES ('$user_id','$product_id','$order_num','$quantity','$total_price','$unit_price','$payment_type') ";
$run_insert3=mysqli_query($conn,$query3);


?>