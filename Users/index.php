<?php
include_once('header.php');
include_once('../framework/config.php');
?>
<!------------------------------------- Navbar End -------------------------------------------->

<!------------------------------------- Slider Start -------------------------------------------->
<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">

    <div class="carousel-inner">
        <div class="carousel-item active">
            <div class="overlay0"></div>
            <img src="images/4.jpg" style="height: 500px;" class="d-block w-100" alt="...">
            <div class="carousel-caption d-md-block">
                <h1 class="font-weight-bold">Welcome to Our Furniture</h1>
                <p class="mt-3 mb-3">Lorem ipsum dolor sit amet consectetur adipisicing
                    elit. Doloribus ducimus culpa totam dolorum harum quidem debitis sunt impedit aperiam illo.
                </p>
                <button class="btn btn-light mt-3"><a class="text-dark" href="#">Browse Products</a> </button>
            </div>
        </div>
        <div class="carousel-item">
            <div class="overlay0"></div>
            <img src="images/5.jpg" style="height: 500px;" class="d-block w-100" alt="...">
            <div class="carousel-caption d-md-block">
                <h1 class="font-weight-bold">Welcome to Our Furniture</h1>
                <p class="mt-3 mb-3">Lorem ipsum dolor sit amet consectetur adipisicing
                    elit. Doloribus ducimus culpa totam dolorum harum quidem debitis sunt impedit aperiam illo.
                </p>
                <button class="btn btn-light mt-3"><a class="text-dark" href="#">Browse Products</a> </button>
            </div>
        </div>
        <div class="carousel-item">
            <div class="overlay0"></div>
            <img src="images/8.jpg" style="height: 500px;" class="d-block w-100" alt="...">
            <div class="carousel-caption d-md-block">
                <h1 class="font-weight-bold">Welcome to Our Furniture</h1>
                <p class="mt-3 mb-3">Lorem ipsum dolor sit amet consectetur adipisicing
                    elit. Doloribus ducimus culpa totam dolorum harum quidem debitis sunt impedit aperiam illo.
                </p>
                <button class="btn btn-light mt-3"><a class="text-dark" href="#">Browse Products</a> </button>
            </div>
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
        data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
        data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>

<!------------------------------------- Slider End -------------------------------------------->



<!------------------------------------- Products Start -------------------------------------------->

<?php
if (isset($_GET['search'])) {

    $filtervalues = $_GET['search'];
    $sql = "SELECT * FROM product WHERE `product_name` like '%$filtervalues%'";
    $result = mysqli_query($con, $sql);

?>
<div class="container-fluid">
    <div class="row">

        <?php
            while ($row = mysqli_fetch_array($result)) {


            ?>
        <div class="card-container col-12 col-md-3 col-lg-4 mt-2 w-40">
            <div class="card border-0 shadow  bg-white rounded">

                <img id="sora" class="card-img-top" src="../imgs/<?php echo $row['product_image_name']; ?>"
                    style="width:100%; object-fit:contain;" />


                <div class="card-body mb-0 pb-0" style="text-align: center;">
                    <h6 class="card-title"><?php echo $row['product_name']; ?></h6>
                    <!-- <p class="card-text"> 
                      <?php /* echo $row ['product_desc']; */ ?>
                    </p> -->
                    <span class="text-danger"><?php echo $row['product_price'] ?></span>
                </div>

            </div>
        </div>

        <?php
            }
            ?>
    </div>
    <?php
} else {




    $sql = "SELECT * FROM product";
    $result = mysqli_query($con, $sql);

    ?>
    <div class="container-fluid">
        <div class="row">

            <?php
                while ($row = mysqli_fetch_array($result)) {


                ?>
            <div class="card-container col-12 col-md-3 col-lg-4 mt-2 w-40">
                <div class="card border-0 shadow  bg-white rounded">

                    <img id="sora" class="card-img-top" src="../imgs/<?php echo $row['product_image_name']; ?>"
                        style="width:100%; object-fit:contain;" />


                    <div class="card-body mb-0 pb-0" style="text-align: center;">
                        <h6 class="card-title"><?php echo $row['product_name']; ?></h6>
                        <!-- <p class="card-text"> 
                      <?php /* echo $row ['product_desc']; */ ?>
                    </p> -->
                        <span class="text-danger"><?php echo $row['product_price'] ?></span>
                    </div>

                </div>
            </div>

            <?php
                }
                ?>
        </div>
    </div>

    <?php
}

include_once('footer.php');
    ?>