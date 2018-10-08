<?php
/**
 * Created by PhpStorm.
 * User: tmutero
 * Date: 9/19/18
 * Time: 1:50 PM
 */

include ('../conn.php');

$select = "SELECT * FROM product;";
$run_select = mysqli_query($conn, $select);

?>