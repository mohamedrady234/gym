<?php
session_start();
ob_start();
include_once("framework/framework.php");
include_once("framework/config.php");

if (isset($_SESSION['admin_login'])) {

    // logged  in // 
    include_once("header.php");

    if (isset($_GET['trainer_id'])) {
        //  to get int value from trainer id 
        $trainer_id = intval($_GET['trainer_id']);

        if ($_SESSION['admin_username'] == "Male") {
            $sql = "DELETE FROM trainer WHERE trainer_id = $trainer_id";
        } else {
            $sql = "DELETE FROM trainer_female WHERE trainer_female_id = $trainer_id";
        }



        $result = mysqli_query($con, $sql);

        if ($result) {
            include_once("looding.php");
            redirect("1", "trainer-list.php");
        } else {
            outputmsg("info", "error in trainer id ");
            redirect("1", "trainer-list.php");
        }
    } else {
        outputmsg("info", "error in trainer id ");
        redirect("1", "trainer-list.php");
    }



    include_once("footer.php");
} else {
    //  login please ? //

    include_once("sign-in.php");
}
