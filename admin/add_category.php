<?php
session_start();
include_once("../framework/site_func.php");
include_once("../framework/config.php");


if(isset($_SESSION['admin_login']))
{
    //logged in
    include_once("header.php");
    ?>
        <h2>Add Category</h2>
    <?php
    
    if(isset($_POST['submit']))
    {
        $category_name = validate($_POST['category_name']);
        
        if($category_name!=null)
        {
                        $sql  = "INSERT INTO category
                        VALUES
                        (NULL,'$category_name',$_SESSION[admin_id])";
            $result = mysqli_query($con,$sql);
            if($result)
            {
            output_msg("s","Category Added");
            redirect(2,"view_category.php");
            }
            else
            {
            output_msg();
            }   
        }
        else
        {
            output_msg("f","please fill data");
            redirect(2,"add_category.php");

        }
    }
    else
    {
        ?>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                <div class="form-group">
                    <label>Category Name</label>
                    <input type="text" name="category_name" class="form-control">
                </div>
                <button type="submit" name="submit" class="btn btn-primary">
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