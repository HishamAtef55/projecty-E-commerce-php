<?php
include_once('header.php');
if (isset($_SESSION['user_login'])) {
  output_msg('s', "Goodbye $_SESSION[user_username]");


  session_unset();

  redirect(2, "index.php");


  include_once("footer.php");
}