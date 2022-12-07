<?php

include_once('header.php');
if (isset($_SESSION['user_login'])) {
?>
<div class="paga-title-banner" style=" width: 100%px;
        height: 400px;
        background-color: #9b877c;
        padding-top: 70px;
        padding-bottom: 70px;
        background-image: url('https://eskil.qodeinteractive.com/wp-content/uploads/2022/03/rev-img-1.jpg');
        background-position: 18% 68%;
        background-size: cover;">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="text-center text-white fw-bold"></h2>
            </div>
        </div>
    </div>
</div>
<?php

    if (isset($_GET['cid'])) {
        $category_id = intval($_GET['cid']);
        $sql = "SELECT * FROM product WHERE product_category_id = $category_id";
    } else {

        if (isset($_GET['search'])) {

            $filtervalues = $_GET['search'];
            $sql = "SELECT * FROM product WHERE `product_name` like '%$filtervalues%'";
        } else {
            $sql = "SELECT * FROM product";
        }
    }

    $result = mysqli_query($con, $sql);
    if ($result) {
        if (mysqli_num_rows($result) > 0) {
    ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-3">
            <div class="filterPrice bg-light p-3">
                <h5 class="mb-2">Filter by price</h5>

                <input type="see" value="<?php if (isset($_GET['see'])) {
                                                            echo $_GET['see'];
                                                        } ?>" style="width: 158px;">

                <?php
                            if (isset($_GET['search'])) {

                                $filtervalues = $_GET['search'];
                                $sql = "SELECT * FROM product WHERE `product_price` like '%$filtervalues%'";
                                $result = mysqli_query($con, $sql);
                                if ($result) {
                                } else {
                                }
                            } else {
                            }


                            ?>






                <div class="filter-by-categories mt-4">
                    <h5>
                        <a href="products.php" role="button">categories</a>
                    </h5>


                    <!-- <ul class="dropdown-menu"> -->

                    <?php
                                $sql_cata = "select * from category";
                                $result_cata = mysqli_query($con, $sql_cata);
                                if ($result_cata) {
                                    if (mysqli_num_rows($result) > 0) {
                                        while ($row_cata = mysqli_fetch_array($result_cata)) {
                                ?>
                    <li style="list-style: circle; color:black; "> <a
                            href="products.php?cid=<?php echo $row_cata['category_id']; ?>"><?php echo $row_cata['category_name']; ?></a>
                    </li>
                    <?php
                                        }
                                    }
                                }
                                ?>
                    <!-- </ul>   -->
                </div>
            </div>
        </div>
        <?php
                    while ($row_product = mysqli_fetch_array($result)) {


                    ?>
        <div class="card-container col-12 col-md-3 col-lg-4  w-25" id=" filter">
            <div class="card border-0 mb-5 shadow p-3 mb-5 bg-white rounded">

                <img id="sora" class="card-img-top" src="../imgs/<?php echo $row_product['product_image_name']; ?>"
                    style="height: 300px; width:100%; object-fit:contain;" />


                <div class="card-body mb-0 pb-0" style="text-align: center;">
                    <h6 class="card-title"><?php echo $row_product['product_name']; ?></h6>
                    <!-- <p class="card-text"> 
                          <?php /* echo $row ['product_desc']; */ ?>
                        </p> -->
                    <span class="product-price" value="<?php echo $row_product['product_price'] ?>"
                        name=" price"><?php echo $row_product['product_price'] ?></span>
                </div>

                <div class="row product-btns p-2 justify-content-center">


                    <button id="displa" class="btn btn-dark add-to-cart col-6 p-0 p-lg-2"
                        onclick="createOrder(<?php echo $row_product['product_id'] ?>)">
                        Add to cart
                    </button>
                    <span id="show" style="display: none;">item add to cart</span>
                </div>
                <button type="button" class="btn btn-primary">
                    <a style="color:aliceblue;"
                        href='product_details.php?pid=<?php echo $row_product['product_id'] ?>'>Read
                        more</a>
                </button>
            </div>
        </div>

        <?php
                    }
                    ?>
    </div>
</div>

<?php
        } else {
            output_msg("f", "this catagory doesnot have any product");
        }
    } else {
        output_msg();
    }




    include_once('footer.php');
} else {
    require './index.php';
}


?> <script src="Js/product.js"></script>