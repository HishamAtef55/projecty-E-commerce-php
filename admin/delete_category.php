<?php
session_start();
include_once("../framework/site_func.php");
include_once("../framework/config.php");


if(isset($_SESSION['admin_login']))
{
    //logged in
    include_once("header.php");
    
    if(isset($_GET['category_id']))
    {
        $category_id = intval($_GET['category_id']);
        $sql = "DELETE FROM category WHERE category_id=$category_id";
        $result = mysqli_query($con,$sql);
        
        $sql_product = "DELETE FROM product WHERE product_category_id=$category_id";
        $result_product = mysqli_query($con,$sql_product);
        
        if($result and $result_product)
        {
            output_msg("s","Category Deleted");
            redirect(2,"view_category.php");
        }
        else
        {
            output_msg();
        }
    }
    else
    {
        output_msg("f","Error! Unepxected Error!");
    }
    
    include_once("footer.php");
}
else
{
    include_once("login.php");
}



?>