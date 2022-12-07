<?php
session_start();
include_once("../framework/site_func.php");


if(isset($_SESSION['admin_login']))
{
    //logged in
    include_once("header.php");
    
    output_msg("s","Logged out. Bye $_SESSION[admin_username]");
    
    session_destroy();
    
    redirect(2,"index.php");
    
    
    include_once("footer.php");
}
else
{
    include_once("login.php");
}



?>