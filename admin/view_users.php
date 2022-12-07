<?php
session_start();
include_once("../framework/site_func.php");
include_once("../framework/config.php");


if(isset($_SESSION['admin_login']))
{
    //logged in
    include_once("header.php");
    
    $sql = "SELECT * FROM users";
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
                            <th>Username</th>
                            <th>Password</th>
                            <th>Phone</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            while($row = mysqli_fetch_array($result))
                            {
                                ?>
                                    <tr>
                                        <td><?php echo $row['user_id']; ?></td>
                                        <td><?php echo $row['user_username']; ?></td>
                                        <td>*********</td>
                                        <td><?php echo $row['user_phone']; ?></td>
                                        <td>
                                            <?php
                                                if($row['user_id']==1)
                                                {
                                                    ?>
                                                        <span style="cursor: not-allowed;" class="glyphicon glyphicon-trash">
                                                        </span>
                                                    <?php
                                                }
                                                else
                                                {
                                                    ?>
                                                        <a href="delete_user.php?user_id=<?php echo $row['user_id']; ?>">
                                                            <span style="color: red;" class="glyphicon glyphicon-trash">
                                                            </span>
                                                        </a>
                                                    <?php
                                                }
                                            ?>
                                        </td>
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
            output_msg("f","Error! There is no data");
            redirect(2,"add_admin.php");
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