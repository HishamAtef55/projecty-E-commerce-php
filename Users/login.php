<?php
include_once('header.php');
?>
<div class="page-title-banner">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="text-center text-white fw-bold"></h2>
            </div>
        </div>
    </div>
</div>
<!-----------------------------------------login form ----->
<?php
if (isset($_POST['submit'])) {
  ///logged in
  $user_username = validate($_POST['user_username']);
  $user_password = validate($_POST['user_password']);
  if ($user_username != null and $user_password != null) {
    $user_password = enc_pass($user_password);
    $sql = "SELECT * FROM users WHERE user_username='$user_username' and user_password='$user_password'";
    $result = mysqli_query($con, $sql);
    if ($result) {
      if (mysqli_num_rows($result) > 0) {
        $row_user = mysqli_fetch_array($result);
        $_SESSION['user_login'] = "yes";
        $_SESSION['user_id'] = $row_user['user_id'];
        $_SESSION['user_username'] = $row_user['user_username'];
        output_msg('s', "logeed in successfully by$_SESSION[user_username]");

        redirect(1, 'index.php');
      } else {
        output_msg('f', "Wrong username / password");
        redirect(1, 'login.php');
      }
    }
  }
?>

<?php


} else {
?>
<section id="formSection">
    <div class="container-fluid align-content-center" style="background-color:#4c372b;">
        <div class=" row">
            <div class="col-md-3"></div>
            <div class=" col col-md-6 p-3">
                <div class="w-75 back-ground-wight border-1 p-2  p-lg-5 shadow p-3 m-auto mb-5 bg-white rounded ">
                    <div class="loginHeader my-3">
                        <h3 class="text-center ">Login to our website</h3>
                    </div>
                    <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                        <div class="input-group mb-3">
                            <span class="input-group-text back-ground" id="basic-addon1"><i
                                    class="bi bi-person-bounding-box w "></i></span>
                            <input name="user_username" type="text" class="form-control m-0" id="userName"
                                placeholder="userName" aria-describedby="userNameFeedback" />
                            <div id="userNameFeedback" class="invalid-feedback">
                                Please enter valid username as char only. </div>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text back-ground" id="basic-addon1"><i
                                    class="bi bi-key w"></i></span>
                            <input name="user_password" type="password" class="form-control m-0" id="password"
                                placeholder="Password" aria-describedby="passwordFeedback" />
                            <div id="passwordFeedback" class="invalid-feedback">
                                invalid password
                            </div>
                        </div>


                        <input type="submit" name="submit" class="btn btn-outline-success d-block w-50 m-auto my-3 "
                            onclick="go(event)" value="Submit">
                        <h6>If You don't Have Account <u><a href="registration.php">Create one?</a></u></h6>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
}
?>
<script src="Js/login.js"></script>
<?php
include_once('footer.php');
?>