<?php
include_once("../framework/config.php");
include_once("../framework/site_func.php");
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="Css/Home.css">
    <link rel="stylesheet" href="Css/style.css">
    <link rel="stylesheet" href="Css/styleBS.css">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet" />
    <script src="Js/jQuery.js"></script>

</head>

<body>
    <div class="container">
        <div
            class="desk-header row my-1 text-wrap text-lg-start align-content-between justify-content-center align-items-center">
            <div class="col-3 col-md-3">
                <img src="images/logo.png" alt="" width="130" />
            </div>
            <div class="col-3 col-md-6  header-search">
                <form method="get" action="">
                    <div class="input-group roundedw w-75 m-auto">
                        <input type="search" value="<?php if (isset($_GET['search'])) {
                                                        echo $_GET['search'];
                                                    } ?>" class="form-control rounded m-0" placeholder="Search"
                            aria-label="Search" aria-describedby="search-addon" name="search" id="search"
                            oninput="ValidateSearch(value)" />

                        <span onclick="searchFor()" class="rounded-1" id="search-addon">
                            <i class="fas fa-search"></i>
                        </span>

                    </div>
                </form>
                <div id="searchErrorDiv"></div>
            </div>
            <div class="col-3 col-md-3  rounded-1 text-end header-cart">
                <?php
                $select_rows = mysqli_query($con, "SELECT * FROM cart");
                $row_count = mysqli_num_rows($select_rows);

                ?>
                <a href="cart.php">
                    <button type="button" class="btn btn-dark position-relative">
                        <i class="fa-solid fa-bag-shopping fa-2x"></i>
                        <span
                            class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger cart-items">
                            <?php
                            if ($row_count == 0) {
                                echo 0;
                            } else {
                                echo $row_count;
                            }
                            ?>
                        </span>
                    </button>
                </a>
            </div>
        </div>
    </div>

    <!------------------------------------- mobile header Start -------------------------------------------->

    <div class="mobile-header d-block">
        <div class="row w-100 align-items-center pt-2 pb-2">
            <div class="col-1 ms-3">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa-solid fa-bars"></i>
                </button>
            </div>
            <div class="col-3">
                <img src="images/logo.png" alt="" width="100" />
            </div>
            <div class="col-3">

            </div>
            <div class="col-4 rounded-1 text-end header-cart align-items-center">
                <a href="wishlist.html">
                    <i class="fa-regular fa-heart"></i>
                </a>
                <a href="cart.html">

                    <button type="button" class="btn btn-dark border-0 position-relative">
                        <i class="fa-solid fa-bag-shopping fa-2x"></i>
                        <span
                            class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger cart-items">
                            0
                        </span>
                    </button>
                </a>
            </div>
        </div>



    </div>
    <!------------------------------------- header end -------------------------------------------->
    <!------------------------------------- Navbar Start -------------------------------------------->
    <?php
    if (isset($_SESSION['user_login'])) {
    ?>
    <div class="container-fluid  p-0">
        <nav class="navbar navbar-expand-lg bg-dark navbar-dark w-100 m-0 p-0">
            <div class="container-lg">
                <!--  <a class="navbar-brand" href="index.html">Furniture</a>-->

                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                    <ul class="navbar-nav m-auto mb-2 mb-lg-0 w-100 justify-content-evenly">
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="index.php">Home</a>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="about.php">About</a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">categories</a>

                            <ul class="dropdown-menu">

                                <?php
                                    $sql = "select * from category";
                                    $result = mysqli_query($con, $sql);
                                    if ($result) {
                                        if (mysqli_num_rows($result) > 0) {
                                            while ($row = mysqli_fetch_array($result)) {
                                    ?>
                                <li style="text-align: center;"><a
                                        href="products.php?cid=<?php echo $row['category_id']; ?>"><?php echo $row['category_name']; ?></a>
                                </li>
                                <?php
                                            }
                                        }
                                    }
                                    ?>
                            </ul>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="products.php">Products</a></li>
                        <li class="nav-item"><a class="nav-link" href="cart.php">Cart</a></li>
                        <li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>

                    </ul>


                </div>
            </div>
        </nav>
    </div>
    <?php
    } else {
    ?>

    <nav class="navbar navbar-expand-lg bg-dark navbar-dark w-100 m-0 p-0">
        <div class="container-lg">
            <!--  <a class="navbar-brand" href="index.html">Furniture</a>-->

            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <ul class="navbar-nav m-auto mb-2 mb-lg-0 w-100 justify-content-evenly">
                    <li class="nav-item"><a class="nav-link" href="login.php">login</a></li>
                    <li class="nav-item"><a class="nav-link" href="registration.php">Register</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <?php
    }