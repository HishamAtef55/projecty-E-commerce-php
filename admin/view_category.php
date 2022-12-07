<?php
session_start();
include_once("../framework/site_func.php");
include_once("../framework/config.php");


if(isset($_SESSION['admin_login']))
{
    //logged in
    include_once("header.php");
    
    $sql = "SELECT * FROM category";
    $result = mysqli_query($con,$sql);
    
    if($result)
    {
      if(mysqli_num_rows($result)>0)
      {
         ?>
           <table class="table">
             <thead>
                <tr>
                   <th>#</th>
                   <th>Category Name</th>
                   <th>Admin username</th>
                   <th>Edit</th>
                   <th>Delete</th>
                </tr>
             </thead>
             <tbody>
                <?php
                  while($row=mysqli_fetch_array($result))
                  {
                   
                     $sql_admin = "SELECT * FROM admin WHERE admin_id = $row[category_admin_id]";
                     $result_admin = mysqli_query($con,$sql_admin);
                     if($result_admin)
                     {
                       if(mysqli_num_rows($result_admin)>0)
                       {
                         $row_admin = mysqli_fetch_array($result_admin);
                         $admin_username = $row_admin['admin_username'];
                       }
                       else
                       {
                         $admin_username="N/A";
                       }
                       
                     }
                     else
                     {
                      output_msg();
                     }
                     
                     ?>
                       
                       <tr>
                         <td><?php echo $row['category_id']; ?></td>
                         <td><?php echo $row['category_name']; ?></td>
                         <td><?php echo $admin_username; ?></td>
                         <td><a href="edit_category.php?category_id=<?php echo $row['category_id']; ?>"><span class="glyphicon glyphicon-pencil"></span></a></td>
                         <td><a href="delete_category.php?category_id=<?php echo $row['category_id']; ?>"><span style="color: red;" class="glyphicon glyphicon-trash"></span></a></td>
                      </tr>
                     
                     <?php
                  }
                ?>
             </tbody>
           </table>
         <?php
      }
      else
      {
        output_msg("f","There is no data.");
        redirect(2,"add_category.php");
      }
    }
    else
    {
      output_msg();
    }
    
    include_once("footer.php");
}
else
{
    include_once("login.php");
}



?>