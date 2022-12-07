<?php
session_start();
include_once("../framework/site_func.php");
include_once("../framework/config.php");


if(isset($_SESSION['admin_login']))
{
    //logged in
    include_once("header.php");
    
    if(isset($_GET['user_id']))
    {
        $user_id = intval($_GET['user_id']);
        
        $sql = "DELETE FROM users WHERE user_id=$user_id";
        $result = mysqli_query($con,$sql);
        if($result)
        {
            output_msg("s","user Deleted");
            redirect(2,"view_users.php");
        }
        else
        {
            output_msg();
        }
    }
    else
    {
        output_msg("f","Unexpected Error!");
        redirect(2,"view_user.php");
    }
    
    include_once("footer.php");
}
else
{
    include_once("login.php");
}



?>