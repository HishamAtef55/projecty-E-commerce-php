<?php
session_start();
include_once("../framework/site_func.php");
include_once("../framework/config.php");


if(isset($_SESSION['admin_login']))
{
    //logged in
   
    include_once("header.php");
     ?>
        <h2>Add product</h2>
    <?php
    if(isset($_POST['submit']))
    {
        $product_name = validate($_POST['product_name']);
        $product_category_id = intval($_POST['product_category_id']);
        $product_price = intval($_POST['product_price']);
        $product_desc = validate($_POST['product_desc']);
        
        $product_image_name = time().$_FILES['product_image_name']['name'];
        $product_image_path = $_FILES['product_image_name']['tmp_name'];
        
        
        if($product_name!=NULL and $product_category_id!=NULL and
           $product_price!=NULL and $product_desc!=NULL and
           $product_image_path!=NULL)
        {
            $sql = "INSERT INTO product VALUES
                                        (NULL,'$product_name',$product_category_id,
                                        $product_price,'$product_desc',
                                        '$product_image_name',$_SESSION[admin_id])";
            $result = mysqli_query($con,$sql);
            if($result)
            {
                if(move_uploaded_file($product_image_path,"../imgs/$product_image_name"))
                {
                    output_msg("s","Product Added");
                    redirect(2,"view_product.php");
                }
                else
                {
                    output_msg("f","Error! upload file failed");
                    redirect(2,"view_product.php");
                }
            }
            else
            {
                output_msg();
            }
        }
        else
        {
            output_msg("f","Error! Please fill all data");
            redirect(2,"add_product.php");
        }
    }
    else
    {
        ?>
            <form method="post" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                <div class="form-group">
                    <label>Product Name</label>
                    <input type="text" name="product_name" class="form-control">
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
                                ?>
                                    <option value="<?php echo $row['category_id']; ?>"><?php echo $row['category_name']; ?></option>
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
                    <input type="number" name="product_price" class="form-control">
                </div>
                
                <div class="form-group">
                    <label>Product Desc</label>
                    <textarea class="form-control" name="product_desc"></textarea>
                </div>
                
                <div class="form-group">
                    <label>Product Image</label>
                    <input type="file" name="product_image_name" class="form-control">
                </div>
                
                <button type="submit" name="submit" class="btn btn-primary">
                    Add
                </button>
                
            </form>
        <?php
    }
    
    include_once("footer.php");
}
else
{
    include_once("login.php");
}



?>