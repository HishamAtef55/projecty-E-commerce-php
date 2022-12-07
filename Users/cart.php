<?php
include_once('header.php');
if (isset($_SESSION['user_login'])) {

    $query = "SELECT * FROM cart WHERE `user_id` =  $_SESSION[user_id] ";
    $result_cart = mysqli_query($con, $query);

    if (mysqli_num_rows($result_cart) > 0) {
?>
<table class="table w-75" style="text-align: center;">
    <thead>
        <tr>
            <th>Image</th>
            <th>Name</th>

            <th>Price</th>
            <th>quantity</th>
            <th>Delete</th>
        </tr>
    </thead>

    <?php
            while ($row_cart = mysqli_fetch_array($result_cart)) {
                $query_product = "SELECT * FROM product WHERE `product_id`= $row_cart[product_id]";
                $result_product = mysqli_query($con, $query_product);
                while ($val = mysqli_fetch_array($result_product)) {
            ?>
    <tbody>
        <tr>

            <td><img style="width: 100px;" src="../imgs/<?php echo $val['product_image_name']  ?>" alt="" srcset="">
            </td>
            <td><?php echo $val['product_name']; ?> </td>
            <td><?php echo $val['product_price'] ?></td>
            <td>
                <div class="row product-btns justify-content-center">
                    <div class="col-sm-2 ">
                        <input type='button' style="width: 30px;" value='-' field='quantity' onclick="decrementValue()"
                            class='qtyminus' data-product-id="<?php echo $val['product_id']; ?>" />
                    </div>
                    <div class="col-4 col-sm-2">
                        <input type='text' style="width: 30px; text-align:center;" class="input-number" name='quantity'
                            class='qty' value="<?php echo $row_cart['quantity']; ?>" />
                    </div>
                    <div class="col-4 col-sm-2">
                        <input type='button' style="width: 30px;" value='+' class='qtyplus' onclick="incrementValue()"
                            field='quantity' data-product-id="<?php echo $val['product_id']; ?>" />
                    </div>
                </div>
            </td>

            <td><button class="btn btn-danger btn-ld" onclick="deleteItem(<?php echo $val['product_id'] ?>)">X</button>
            </td>
        </tr>
    </tbody>



    <?php


                }
            }
            ?>
</table>


<?php


    } else {
    ?>
<div class="alert alert-danger" style="text-align: center;">
    Your cart is empty
</div>
<?php
    }
} else {
}





include_once('footer.php');

?> <script src="Js/product.js"></script>