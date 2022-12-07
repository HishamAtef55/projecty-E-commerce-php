<?php
session_start();
include_once("../framework/site_func.php");
include_once("../framework/config.php");


if(isset($_SESSION['admin_login']))
{
    //logged in
    include_once("header.php");
    
    if(isset($_GET['admin_id']))
    {
        $admin_id = intval($_GET['admin_id']);
        
        $sql = "DELETE FROM admin WHERE admin_id=$admin_id";
        $result = mysqli_query($con,$sql);
        if($result)
        {
            output_msg("s","Admin Deleted");
            redirect(2,"view_admin.php");
        }
        else
        {
            output_msg();
        }
    }
    else
    {
        output_msg("f","Unexpected Error!");
        redirect(2,"view_admin.php");
    }
    
    include_once("footer.php");
}
else
{
    include_once("login.php");
}



?>