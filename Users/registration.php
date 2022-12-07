<?php

include_once('header.php')

?>
<div class="pige-title-banner" style="width: 100%px;
    height: 400px;
    background-color: #9b877c;
    padding-top: 70px;
    padding-bottom: 70px;
    background-image: url('https://eskil.qodeinteractive.com/wp-content/uploads/2022/03/rev-img-2.jpg');
    background-position: center;
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
?>
<?php


if (isset($_POST['submit'])) {

    $user_username = validate($_POST['user_username']);
    $user_email = validate($_POST['user_email']);
    $user_phone = intval($_POST['user_phone']);
    $user_password = validate($_POST['user_password']);
    if ($user_username != null and $user_password != null and $user_phone != null and $user_email != null) {


        $user_password = enc_pass($user_password);
        $sql = "INSERT INTO users  
        VALUES
        (NULL,'$user_username','$user_password',
        '$user_phone','$user_email')";

        $result = mysqli_query($con, $sql);

        if ($result) {
            output_msg('s', 'account added successfully ');
            redirect(2, 'index.php');
        } else {
            output_msg('f', 'account not added');
        }
    }
} else {
?>
<section id="formSection">
    <div class="container-fluid align-content-center" style="background-color: #4c4e4d;">
        <div class=" row">
            <div class="col-md-3"></div>
            <div class=" col col-md-6 p-3">
                <div class="w-75 back-ground-wight border-1 p-2  p-lg-5 shadow p-3 m-auto mb-5 bg-white rounded ">
                    <div class="loginHeader my-3">
                        <h3 class="text-center ">Create Account</h3>
                    </div>
                    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                        <div class="input-group mb-3">
                            <span class="input-group-text back-ground" id="basic-addon1"><i
                                    class="bi bi-person-bounding-box w "></i></span>
                            <input type="text" class="form-control" id="userName" placeholder="userName"
                                aria-describedby="userNameFeedback" name="user_username" />
                            <div id="userNameFeedback" class="invalid-feedback">
                                Please enter valid username as char only.
                            </div>

                            <div class="input-group mt-3">
                                <span style="color: white;" class="input-group-text back-ground" id="basic-addon4">
                                    <i class="fa-solid fa-envelope"></i></span>
                                <input type="text" class="form-control" id="email" placeholder="E-mail"
                                    aria-describedby="emailFeedback" name="user_email" />
                                <div id="emailFeedback" class="invalid-feedback">
                                    invaild email
                                </div>
                            </div>


                        </div>

                        <div class="input-group mb-3">
                            <span class="input-group-text back-ground" id="basic-addon3">
                                <i class="bi bi-telephone-fill w"></i></span>
                            <input type="number" class="form-control" id="phone" placeholder="Phone"
                                aria-describedby="phoneFeedback" name="user_phone" />
                            <div id="phoneFeedback" class="invalid-feedback">
                                Mobile should start with 010 or 011 or 012 and 11 digits
                            </div>
                        </div>

                        <div class="input-group mb-3">
                            <span class="input-group-text back-ground" id="basic-addon2"><i
                                    class="bi bi-key w"></i></span>
                            <input type="password" class="form-control" id="password" placeholder="Password"
                                aria-describedby="passwordFeedback" name="user_password" />
                            <span class="input-group-text back-ground" onclick="change()">
                                <i class="fa-solid fa-eye"></i>
                            </span>
                            <script>
                            function change() {
                                var showpass = document.getElementById("password");
                                const type =
                                    showpass.getAttribute("type") === "password" ? "text" : "password";
                                showpass.setAttribute("type", type);
                            }
                            </script>

                            <div id="passwordFeedback" class="invalid-feedback">
                                Password must be 8 chars at least and at least 1 capital letter , 1 small , 1 number .
                            </div>

                        </div>



                        <input type="submit" name="submit" class="btn btn-outline-success d-block w-50 m-auto my-3 "
                            onclick="go(event)" value="Submit">
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
}
?>
<script src="Js/registra.js"></script>
<?php
include_once('footer.php');