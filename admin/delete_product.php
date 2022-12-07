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
        $product_id= intval($_GET['product_id']);
        
        $sql_product  = "SELECT * FROM product WHERE product_id=$product_id";
        $result_product = mysqli_query($con,$sql_product);
        if($result_product)
        {
            $row_product = mysqli_fetch_array($result_product);
            $sql = "DELETE FROM product WHERE product_id=$product_id";
            $result = mysqli_query($con,$sql);
            if($result)
            {
                unlink("../imgs/$row_product[product_image_name]");
                output_msg("s","Product Deleted");
                redirect(2,"view_product.php");
            }
            else
            {
                output_msg();
            }
        }
        else
        {
            output_msg();
        }
        
        
        
    }
    else
    {
        output_msg("f","Unexpected Error!");
    }
    
    include_once("footer.php");
}
else
{
    include_once("login.php");
}



?>