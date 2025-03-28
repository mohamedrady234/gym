<?php
session_start();
ob_start();
include_once("framework/framework.php");
include_once("framework/config.php");

if (isset($_SESSION['admin_login'])) {

    // logged  in // 
    include_once("header.php");

    if (isset($_GET['member_id'])) {
        //  to get int value from trainer id 
        $member_id = intval($_GET['member_id']);

        if ($_SESSION['admin_username'] == "Male" or $_SESSION['admin_username'] == "admin") {
            $sql = "DELETE FROM members WHERE member_id = $member_id";
        } else {
            $sql = "DELETE FROM members_female WHERE member_id_female = $member_id";
        }



        $result = mysqli_query($con, $sql);

        if ($result) {
            include_once("looding.php");
            redirect("1", "oldmember_admin.php");
        } else {
            outputmsg("info", "error in trainer id ");
            redirect("1", "oldmember_admin.php");
        }
    } else {
        outputmsg("info", "error in trainer id ");
        redirect("1", "oldmember_admin.php");
    }



    include_once("footer.php");
} else {
    //  login please ? //

    include_once("sign-in.php");
}
