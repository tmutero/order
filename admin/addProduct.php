<?php
include ('../conn.php');
if (isset($_POST["btn"])) {

    $o_price = $_POST['o_price'];
    $name = $_POST['name'];
    $qty = $_POST['qty'];
    $expiry_date=$_POST['expiry_date'];
    $date_added=$_POST['date_added'];
    $description=$_POST['description'];
    $image = $_FILES['image']['name'];
    $code=$_POST['code'];
        // Get text
    $image_text = mysqli_real_escape_string($db, $_POST['image_text']);

    // image file directory
    $target = "../upload/".basename($image);


    $query = "INSERT INTO `product`( name, o_price, qty, date_added,expiry_date,qty_sold,description,image_name,code) VALUES ('$name','$o_price','$qty', '$date_added', '$expiry_date','0','$description','$image','$code')";
    $run_insert=mysqli_query($conn,$query);





    if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
        $msg = "Image uploaded successfully";
    }else{
        $msg = "Failed to upload image";
    }


   if ($run_insert){



        ?>

        <script>setTimeout(function(){window.location.href='product.php'},100);</script>

        <?php

    }

}
?>


