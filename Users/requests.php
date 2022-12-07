<?php
session_start();
require '../framework/config.php';

if (isset($_GET['addtocartxx'])) {
    $id = $_GET['addtocartxx'];
    $user_id = $_SESSION['user_id'];
    $row_count = mysqli_query($con, "SELECT * FROM cart WHERE `product_id` = $id AND `user_id` = $user_id");
    $row = mysqli_fetch_array($row_count);
    if (count($row['quantity']) == 0) {
        $query = "INSERT INTO cart (`product_id`,`user_id`,`quantity`) VALUES ($id,$user_id,1)";
        $result = mysqli_query($con, $query);
    } else {
        $q =  $row_count['quantity'] + 1;
        $date =
            "UPDATE cart 
        SET  'quantity' = $q 
        WHERE `product_id`=$id 
        AND 
        `user_id` = $user_id";
        $result = mysqli_query($con, $data);

        // $data = Cart::updateColx(["user_id"=>$user_id,"product_id"=>$product_id],["quantity"=>$q]);
        //    echo '
        //     <input class="here" style="margin:0" value="'.($q++).'">';
    }
}

if (isset($_GET['removeFromCart'])) {
    $id = $_GET['removeFromCart'];
    $user_id = $_SESSION['user_id'];
    $query = "DELETE FROM cart WHERE `product_id`=$id AND `user_id`=$user_id";
    $result = mysqli_query($con, $query);
    echo $result;
}


if (isset($_POST['increasQuantity'])) {
    $q = intval($_POST['value']);
    $product_id =  intval($_POST['p_id']);
    $user_id = $_SESSION["user_id"];
    $query =
        "UPDATE cart 
    SET  `quantity` = $q
    WHERE `product_id` = $product_id
    AND `user_id=$user_id`";
    $x = mysqli_query($con, $query);
    echo $x;
}