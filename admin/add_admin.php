<?php
session_start();
include_once("../framework/site_func.php");
include_once("../framework/config.php");


if(isset($_SESSION['admin_login']))
{
    //logged in
    include_once("header.php");
    
    ?>
        <h2>Add admin</h2>
    <?php
    if(isset($_POST['submit']))
    {
        $admin_username = validate($_POST['admin_username']);
        $admin_password = validate($_POST['admin_password']);
        $admin_email    = validate($_POST['admin_email']);
        
        if($admin_username!=NULL and $admin_password!=NULL and $admin_email!=NULL)
        {
            $admin_password = enc_pass($admin_password);
            
            $sql ="INSERT INTO admin VALUES
                                    (NULL,'$admin_username','$admin_password',
                                    '$admin_email')";
            $result = mysqli_query($con,$sql);
            if($result)
            {
                output_msg("s","Account Added");
                redirect(2,"view_admin.php");
            }
            else
            {
                output_msg();
            }
        }
        else
        {
            output_msg("f","Error! Please fill all data");
            redirect(2,"add_admin.php");
        }
    }
    else
    {
        ?>
            <form method="post" action="<?php echo htmlspecialchars ($_SERVER['PHP_SELF']); ?>">
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="admin_username" class="form-control">
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="admin_password" class="form-control">
                </div>
                <div class="form-group">
                    <label>E-mail</label>
                    <input type="email" name="admin_email" class="form-control">
                </div>
                
                <button type="submit" name="submit" class="btn btn-success">
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