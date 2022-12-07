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
        
        $sql =  "SELECT * FROM category WHERE category_id=$category_id";
        $result = mysqli_query($con,$sql);
        if($result)
        {
            if(mysqli_num_rows($result)>0)
            {
                $row_old_category = mysqli_fetch_array($result);
                
                if(isset($_POST['submit']))
                {
                    $category_name = validate($_POST['category_name']);
                    if($category_name!=NULL)
                    {
                        
                        
                        $sql = "UPDATE category
                                        SET
                                        category_name='$category_name',
                                        category_admin_id=$_SESSION[admin_id]
                                        WHERE category_id=$category_id";
                        $result = mysqli_query($con,$sql);
                        
                        if($result)
                        {
                            output_msg("s","Category Updated");
                            redirect(2,"view_category.php");
                        }
                        else
                        {
                            output_msg();
                        }
                    }
                    else
                    {
                        output_msg("f","Error! Please fill all data");
                        redirect(2,"edit_category.php?category_id=$category_id");
                    }
                }
                else
                {
                    ?>
                        <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])."?category_id=$category_id"; ?>">
                            <div class="form-group">
                                <label>Category Name</label>
                                <input value="<?php echo $row_old_category['category_name']; ?>" type="text" name="category_name" class="form-control">
                            </div>
                            <button type="submit" name="submit" class="btn btn-danger">
                                Edit
                            </button>
                        </form>
                    <?php
                }
            }
            else
            {
                output_msg("f","Error! Unexpected Error");
            }
        }
        else
        {
            output_msg();
        }
    }
    else
    {
        output_msg("f","Error! Unexpected error");
    }
    
    
    include_once("footer.php");
}
else
{
    include_once("login.php");
}



?>