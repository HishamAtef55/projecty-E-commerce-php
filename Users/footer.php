<footer class="footer footer-container text-start">
    <div class="container p-4">
        <div class="row">
            <div class="col-lg-4 col-md-6 mb-4 mb-md-0">
                <h5 class="text-uppercase">About Us</h5>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse totam debitis illo, iure ad non
                    eaque veritatis nostrum assumenda facilis vel voluptates, a laudantium voluptate maiores nulla
                    perferendis ratione id.
                </p>
            </div>
            <div class="col-lg-5 col-md-8">
                <h5 class="text-uppercase mb-0">categories</h5>
                <ul id="footerCatregory" class="cata>
              <?php
              $sql = "select * from category";
              $result = mysqli_query($con, $sql);
              if ($result) {
                if (mysqli_num_rows($result) > 0) {
                  while ($row = mysqli_fetch_array($result)) {
              ?>
                                    <li style=" border:1px solid white; display:inline; margin:10px"> <a
                        href="product.php?cid=<?php echo $row['category_id'] ?>"><?php echo $row['category_name']; ?></a>
                    </li>
                    <?php
                  }
                }
              }
    ?>
                </ul>
            </div>
            <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                <h5 class="text-uppercase">Links</h5>
                <ul class="list-unstyled mb-0">
                    <li class="pb-0"><a class="text-dark" href="Home.php">Home</a></li>
                    <li class="pb-0"><a class="text-dark" href="about.php">About</a></li>
                    <li class="pb-0"><a class="text-dark" href="#">Categories</a></li>
                    <li class="pb-0"><a class="text-dark" href="products.php">Products</a></li>
                    <li class="pb-0"><a class="text-dark" href="#">Wishlist</a></li>
                    <li class="pb-0"><a class="text-dark" href="cart.php">Cart</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
        © 2022 Copyright:
        <a class="text-dark" href="about.html">IT Gate Project</a>
    </div>
</footer>
<!------------------------------------- Footer End -------------------------------------------->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
</script>

<!-- <script src="JS/about.js"></script> -->


</body>

</html>