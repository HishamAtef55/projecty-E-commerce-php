<?php
session_start();
include_once("../framework/site_func.php");
include_once("../framework/config.php");


if(isset($_SESSION['admin_login']))
{
    //logged in
    include_once("header.php");
    
    if(isset($_GET['product_id']))
    {
        $product_id = intval($_GET['product_id']);
        
        $sql_product = "SELECT * FROM product WHERE product_id=$product_id";
        $result_product = mysqli_query($con,$sql_product);
        if($result_product)
        {
            if(mysqli_num_rows($result_product)>0)
            {
                $row_old_product = mysqli_fetch_array($result_product);
                
                if(isset($_POST['submit']))
                {
                 
                    $product_name = validate($_POST['product_name']);
                    $product_category_id = intval($_POST['product_category_id']);
                    $product_price = intval($_POST['product_price']);
                    $product_desc = validate($_POST['product_desc']);
                    
                    $product_image_name = time().$_FILES['product_image_name']['name'];
                    $product_image_path = $_FILES['product_image_name']['tmp_name'];
                    
                    if($product_name!=NULL and $product_category_id!=NULL and
                       $product_price!=NULL and $product_desc!=NULL
                       and $product_image_path!=NULL)
                    {
                        //update image
                        $sql_update = "UPDATE product
                                                SET
                                                product_name = '$product_name',
                                                product_category_id = $product_category_id,
                                                product_price = $product_price,
                                                product_desc = '$product_desc',
                                                product_image_name = '$product_image_name',
                                                product_admin_id = $_SESSION[admin_id]
                                                WHERE product_id = $product_id";
                                                
                        $result_update = mysqli_query($con,$sql_update);
                        if($result_update)
                        {
                            if(move_uploaded_file($product_image_path,"../imgs/$product_image_name"))
                            {
                                unlink("../imgs/$row_old_product[product_image_name]");
                                output_msg("s","Product Updated");
                                redirect(2,"view_product.php");
                            }
                            else
                            {
                                output_msg("f","Error! upload file");
                            }
                        }
                        else
                        {
                            output_msg();
                        }
                        
                    }
                    elseif($product_name!=NULL and $product_category_id!=NULL and
                       $product_price!=NULL and $product_desc!=NULL)
                    {
                        // update without image
                        $sql_update = "UPDATE product
                                                SET
                                                product_name = '$product_name',
                                                product_category_id = $product_category_id,
                                                product_price = $product_price,
                                                product_desc = '$product_desc',
                                                product_admin_id = $_SESSION[admin_id]
                                                WHERE product_id = $product_id";
                                                
                        $result_update = mysqli_query($con,$sql_update);
                        if($result_update)
                        {
                            output_msg("s","Product Updated");
                            redirect(2,"view_product.php");
                        }
                        else
                        {
                            output_msg();
                        }
                    }
                    else
                    {
                        output_msg("f","Error! Please fill all data");
                        redirect(2,"edit_product.php?product_id=$product_id");
                    }
                    
                }
                else
                {
                    ?>
                        <form method="post" enctype="multipart/form-data"
                              action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])."?product_id=$product_id"; ?>">
                            
                            <div class="form-group">
                                <label>Product Name</label>
                                <input value="<?php echo $row_old_product['product_name']; ?>" type="text" name="product_name" class="form-control">
                            </div>
                            
                            <?php
                    
                                $sql = "SELECT * FROM category";
                                $result = mysqli_query($con,$sql);
                                if($result)
                                {
                                    if(mysqli_num_rows($result)>0)
                                    {
                                        ?>
                                        <label>Category</label>
                                        <select class="form-control" name="product_category_id">
                                        <?php
                                        while($row=mysqli_fetch_array($result))
                                        {
                                            //$row_old_product[product_category_id]==> 3
                                            ?>
                                                <option
                                                       <?php
                                                                        //3                                   3
                                                            if($row_old_product['product_category_id']==$row['category_id'])
                                                            {
                                                                echo "selected";
                                                            }
                                                        ?>
                                                    value="<?php echo $row['category_id']; ?>"><?php echo $row['category_name']; ?></option>
                                                            
                                            <?php
                                        }
                                        ?>
                                            </select>
                                        <?php
                                    }
                                    else
                                    {
                                        output_msg("f","Error! There is no category to select");
                                        redirect(2,"add_category.php");
                                    }
                                }
                                else
                                {
                                    output_msg();
                                }
                            
                            ?>
                            
                            
                            <div class="form-group">
                                <label>Product Price</label>
                                <input value="<?php echo $row_old_product['product_price']; ?>" type="number" name="product_price" class="form-control">
                            </div>
                            
                            <div class="form-group">
                                <label>Product Desc</label>
                                <textarea class="form-control" name="product_desc"><?php echo $row_old_product['product_desc']; ?></textarea>
                            </div>
                            
                            
                             <div class="form-group">
                                <label>Product Image</label>
                                <input type="file" name="product_image_name" class="form-control">
                                <br>
                                <img style="width: 150px;" src="../imgs/<?php echo $row_old_product['product_image_name']; ?>">
                             </div>
                            
                            <button type="submit" name="submit" class="btn btn-primary">
                                Edit
                            </button>
                            
                            
                        </form>
                    <?php
                }
            }
            else
            {
                output_msg("f","Unexpected Error!");
            }
        }
        else
        {
            output_msg();
        }
    }
    else
    {
        output_msg("f","Error! Unexpected Error");
    }
    
    include_once("footer.php");
}
else
{
    include_once("login.php");
}



?>