<?php
session_start();
include_once("../framework/site_func.php");
include_once("../framework/config.php");


if(isset($_SESSION['admin_login']))
{
    //logged in
    include_once("header.php");
    
    if(isset($_POST['submit']))
    {
        $admin_username = validate($_POST['admin_username']);
        $admin_email    = validate($_POST['admin_email']);
        
        if($admin_username!=NULL and $admin_email!=NULL)
        {
            $sql = "UPDATE admin
                            SET
                            admin_username = '$admin_username',
                            admin_email    = '$admin_email'
                            WHERE admin_id =  $_SESSION[admin_id]";
            $result = mysqli_query($con,$sql);
            
            if($result)
            {
                $_SESSION['admin_username'] = $admin_username;
                $_SESSION['admin_email']    = $admin_email;
                
                output_msg("s","Account Updated");
                redirect(2,"edit_account.php");
            }
            else
            {
                output_msg();
            }
        }
        else
        {
            output_msg("f","Error! Please fill all data");
            redirect(2,"edit_account.php");
        }
    }
    else
    {
        ?>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                <div class="form-group">
                    <label>Username</label>
                    <input value="<?php echo $_SESSION['admin_username']; ?>" type="text" name="admin_username" class="form-control">
                </div>
                <div class="form-group">
                    <label>E-mail</label>
                    <input value="<?php echo $_SESSION['admin_email']; ?>" type="email" name="admin_email" class="form-control">
                </div>
                <button class="btn btn-danger" type="submit" name="submit">
                    Edit
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