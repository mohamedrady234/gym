<?php
session_start();
include_once("framework/framework.php");

if (isset($_SESSION['admin_login'])) {
    // logged  in // 
    //  make success page 
    include_once("looding.php");
    session_destroy();
    redirect("1");
} else {
    //  login please ? //

    include_once("sign-in.php");
}
