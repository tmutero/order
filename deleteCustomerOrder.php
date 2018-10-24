<?php
/**
 * Created by PhpStorm.
 * User: tmutero
 * Date: 5/10/2018
 * Time: 9:53 AM
 */
include('conn.php');



$id=$_POST['info'];
$insert = "DELETE FROM `order` WHERE id='$id'";
$run_insert = mysqli_query($conn, $insert);



?>