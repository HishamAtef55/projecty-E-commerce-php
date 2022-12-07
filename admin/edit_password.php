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
        //action
        $admin_password = validate($_POST['admin_password']);
        
        if($admin_password!=NULL)
        {
            $admin_password = enc_pass($admin_password);
            
            $sql = "UPDATE admin
                            SET
                            admin_password='$admin_password'
                            WHERE admin_id=$_SESSION[admin_id]";
            $result = mysqli_query($con,$sql);
            if($result)
            {
                output_msg("s","Password Updated");
                redirect(2,"index.php");
            }
            else
            {
                output_msg();
            }
        }
        else
        {
            output_msg("f","Error! Please fill all data");
            redirect(2,"edit_password.php");
        }
        
    }
    else
    {
        ?>
        <div class="row">
            <div class="col-md-4">
                <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="admin_password" class="form-control">
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary">
                        Edit
                    </button>
                </form>
            </div>
        </div>
            
        <?php
    }
    
    include_once("footer.php");
}
else
{
    include_once("login.php");
}



?>