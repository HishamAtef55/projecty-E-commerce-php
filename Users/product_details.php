<?php
include_once('header.php');
?>
    <div class="page-title-banner">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h2 class="text-center text-white fw-bold"></h2>
          </div>
        </div>
      </div>
    </div>

<?php
    if(isset($_GET['pid']))
    {
       $product_id = intval($_GET['pid']);
       $sql = "SELECT * FROM product WHERE product_id=$product_id";
       $result=mysqli_query($con,$sql);
       if($result)
       {
            if(mysqli_num_rows($result)> 0)
            {
                $row=mysqli_fetch_array($result);
                $sql_category = "SELECT * FROM category WHERE category_id = $row[product_category_id]";
                $result_category = mysqli_query($con,$sql_category);
                if( $result_category)
                {
                    if(mysqli_num_rows($result_category)>0)
                    {
                      $row_Category = mysqli_fetch_array($result_category);
                      $category_name =  $row_Category['category_name'];

                    }
                    else
                    {
                        $category_name = "N/A";
                    }
                }

                ?>
                 <div class="container-fluid">
                    <div class="row">
                        <div class="single-p row"><div class="col-md-4 p-5">
                        <img width="500px;" height="400px;" src="../../imgs/<?php echo $row['product_image_name']; ?>"/>
                        </div>
                            <div class="col-md-4 offset-2 p-5">
                                <p><h3 style="color:red;">Name:</h3><?php echo $row['product_name']; ?></p>
                                <p class="pt-2"><h3 style="color:red;">Description :</h3><?php echo $row['product_desc']; ?></p>
                                <h5>Category : <?php echo  $category_name; ?></h5>
                                <h4>price :<span class="text-danger mt-5"><?php echo $row['product_price']; ?></span> </h4>

                                <div class="product-btns mt-3">
                                    <span hidden class="product-id">${products[i]["id"]}</span>
                                    <button class="btn btn-light border minus" onclick="decreaseNum()">-</button>
                                    <button class="btn btn-light border plus" onclick="increaseNum()">+</button>
                                    <input class="number-inc  border-0" type="number" value =1 />
                                    <button class="btn btn-dark add-to-cart" onclick="addToCart(${products[i]['id']} ,${products[i]["price"]})">Add to cart</button>
                                    <button class="btn btn-light border add-to-wishlist" onclick="addToWishList(${products[i]['id']})"><i class="fa-solid fa-heart"></i></button>
                            </div>
                          </div>
                    </div>
                  </div>
                <?php
            } 
       }
       else
       {
        output_msg("f","unexpected error"); 
       }
    }
    else
    {
       output_msg("f","unexpected error"); 
    }
    
include_once('footer.php');
?>