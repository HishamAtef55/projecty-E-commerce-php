<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Signin Template for Bootstrap</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- <link href="../css/signin.css" rel="stylesheet"> -->
  </head>

  <body>

    <div class="container">
        <?php
            if(isset($_POST['submit']))
            {
                $admin_username = validate($_POST['admin_username']);
                $admin_password = validate($_POST['admin_password']);
                
                if($admin_username!=NULL and $admin_password!=NULL)
                {
                    $admin_password = enc_pass($admin_password);
                    
                    $sql = "SELECT * FROM admin WHERE
                            admin_username='$admin_username'
                            and
                            admin_password='$admin_password'";
                    $result = mysqli_query($con,$sql);
                    if($result)
                    {
                        if(mysqli_num_rows($result)>0)
                        {
                            $row_admin = mysqli_fetch_array($result);
                            $_SESSION['admin_login']="yes";
                            $_SESSION['admin_id']= $row_admin['admin_id'];
                            $_SESSION['admin_username']= $row_admin['admin_username'];
                            $_SESSION['admin_email']= $row_admin['admin_email'];
                            
                            output_msg("s","Logged in successfuly.Welcome, $row_admin[admin_username]");
                            redirect(2,"index.php");
                        }
                        else
                        {
                            output_msg("f","Error! Wrong username/password");
                            redirect(2,"index.php");
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
                    redirect(2,"index.php");
                }
                
            }
            else
            {
                ?>
                    <form class="form-signin" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                        <h2 class="form-signin-heading">Please sign in</h2>
                        <label for="inputusername" class="sr-only">Username</label>
                        <input name="admin_username" type="Username" id="inputusername" class="form-control" placeholder="Username">
                        <label for="inputPassword" class="sr-only">Password</label>
                        <input name="admin_password" type="password" id="inputPassword" class="form-control" placeholder="Password">
                        <button name="submit" class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
                    </form>
                <?php
            }
        
        ?>
    </div>
  </body>
</html>
