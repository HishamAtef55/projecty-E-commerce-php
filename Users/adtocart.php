<!-- <?php
// include_once('header.php');
// $product_id=$_GET['id'];

// if($_GET['do']=='adcart'){
//     $sql  = "SELECT * FROM product WHERE product_id=$product_id";
//     $result = mysqli_query($con,$sql);
//     if($result)
//     {
//         if(mysqli_num_rows($result)>0)
//         {
//             ?>
             <div class="container cart">
        <p class="cart-alert"></p>
        <div class="row">
            <div class="col-md-10 cart-table-cont m-auto p-0">
                <table class="table">
                    <thead>
                        <tr>
                            <th class="col-1"></th>
                            <th class="col-5">Product Name</th>
                            <th class="col-1">Price</th>
                            <th class="col-2">Quantity</th>
                            <th class="col-1">Total</th>
                            <th class="col-2">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        
 <tr class="align-middle">
                        <
                        <td class="col-2"><button class="btn btn-light border minus" onclick="decreaseNumInCart(${products[j].id},${products[j]["price"]})">-</button>
                        <button class="btn btn-light border plus" onclick="increaseNumInCart(${products[j].id},${products[j]["price"]})">+</button> 
                        <input class="number-inc border-0" readonly type="number" value="${ids[i]["quantity"]}"></td>
                        <td class="col-1 total">${parseInt(products[j]["price"]) * parseInt(ids[i]["quantity"])}</td>
                        <td class="col-2"><button class="btn btn-dark remove-from-cart product-btns" onclick="removeFromCart(${products[j].id})">Remove From Cart</button></td>
                    </tr>`;
                    </tbody>
                </table>
            </div>
            <div class="col-md-2 cart-total-summaray mb-5">
              <div class="cart-total-1 border rounded mb-3">
                <h5>total <span >0</span></h5>
            </div>
                <button class="btn btn-dark clear-cart" onclick="clearCart()">Clear Cart</button>
                
            </div>
        </div>
    </div>
?> -->
<?php
include_once('header.php');
session_start();
$product_id =  $_GET["id"];
$user_id =  $_SESSION['user_id'];
$sql = "INSERT INTO cart VALUES ($product_id,$user_id)";
$result = mysqli_query($con,$sql);
if($result)
{
    echo 'true';
}
else{
    echo 'false';
}
?>