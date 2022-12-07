<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap 101 Template</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <nav class="navbar navbar-default navbar-inverse">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Dashboard</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li <?php if (get_page_name() == "index.php") { ?> class="active" <?php } ?>><a
                            href="index.php">Home</a></li>
                    <li <?php if (get_page_name() == "edit_password.php") { ?> class="active" <?php } ?>><a
                            href="edit_password.php">Edit Password</a></li>
                    <li <?php if (get_page_name() == "edit_account.php") { ?> class="active" <?php } ?>><a
                            href="edit_account.php">Edit Account</a></li>
                    <li <?php if (get_page_name() == "logout.php") { ?> class="active" <?php } ?>><a
                            href="logout.php">Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <ul class="nav nav-pills nav-stacked">

                    <?php

          if ($_SESSION['admin_id'] == 1) {
          ?>
                    <li class="active"><a href="#">Admin</a></li>
                    <li><a href="add_admin.php">Add</a></li>
                    <li><a href="view_admin.php">View</a></li>
                    <?php
          }

          ?>

                    <li class="active"><a href="#">Category</a></li>
                    <li><a href="add_category.php">Add</a></li>
                    <li><a href="view_category.php">View</a></li>

                    <li class="active"><a href="#">Product</a></li>
                    <li><a href="add_product.php">Add</a></li>
                    <li><a href="view_product.php">View</a></li>
                    <li class="active"><a href="#">Users</a></li>
                    <li><a href="view_users.php">View</a></li>
                </ul>
            </div>


            <div class="col-md-9">