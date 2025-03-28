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

        $sql = "SELECT *  FROM trainer WHERE trainer_id = $trainer_id";

        $result = mysqli_query($con, $sql);

        if ($result) {
            if (mysqli_num_rows($result) > 0) {
                $row_old_member = mysqli_fetch_array($result);

                if (isset($_post['submit'])) {
                } else {
?>
                    <!-- CONTENT WRAPPER -->
                    <div class="ec-content-wrapper">
                        <div class="content">
                            <div class="breadcrumb-wrapper d-flex align-items-center justify-content-between">
                                <div>
                                    <h1>Departure</h1>

                                </div>

                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="card card-default">
                                        <div class="card-header card-header-border-bottom">
                                            <h2>Add Departure</h2>
                                        </div>

                                        <div class="card-body">
                                            <div class="row ec-vendor-uploads">
                                                <div class="col-lg-4">
                                                    <div class="ec-vendor-img-upload">
                                                        <div class="ec-vendor-main-img">
                                                            <div class="avatar-upload">
                                                                <img src="assets/img/trainer/u1.jpg " class="img_attend">
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-8">
                                                    <div class="ec-vendor-upload-detail">
                                                        <?php

                                                        if (isset($_POST['submit'])) {
                                                            $member_name             = validate($_POST['member_name']);
                                                            $member_subscription     = validate($_POST['member_subscription']);
                                                            $member_phone            = validate($_POST['member_phone']);
                                                            $member_name_captain    = validate($_POST['member_name_captain']);
                                                            $member_paid_up            = validate($_POST['member_paid_up']);
                                                            $member_remainder         = validate($_POST['member_remainder']);
                                                            $member_start             = validate($_POST['member_start']);
                                                            $member_end             = validate($_POST['member_end']);

                                                            if (
                                                                $member_name             != NULL and
                                                                $member_phone             != NULL and
                                                                $member_name_captain     != NULL and
                                                                $member_paid_up         != NULL and
                                                                $member_remainder         != NULL and
                                                                $member_start             != NULL and
                                                                $member_end             != NULL
                                                            ) {
                                                                //  we make this if to insert into male or female //
                                                                if ($_SESSION['admin_username'] == "Male") {
                                                                    $sql = "INSERT INTO      VALUES(NULL,
                                                                                                                    '$member_name',
                                                                                                                    '$member_phone',
                                                                                                                    '$member_paid_up',
                                                                                                                    '$member_remainder',
                                                                                                                    '$member_start',
                                                                                                                    '$member_end',
                                                                                                                    '$member_name_captain',
                                                                                                                    '$member_subscription'
                                                                                                                    )";
                                                                } else {
                                                                    $sql = "INSERT INTO  VALUES(NULL,
                                                                                                                    '$member_name',
                                                                                                                    '$member_phone',
                                                                                                                    '$member_paid_up',
                                                                                                                    '$member_remainder',
                                                                                                                    '$member_start',
                                                                                                                    '$member_end',
                                                                                                                    '$member_name_captain',
                                                                                                                    '$member_subscription'
                                                                                                                    )";
                                                                }

                                                                $result = mysqli_query($con, $sql);
                                                                if ($result) {

                                                                    include_once("looding.php");
                                                                    redirect("1", "member.php");
                                                                } else {
                                                                    outputmsg("info", "error after sql ");
                                                                    include_once("looding.php");
                                                                    redirect("1", "add-members.php");
                                                                }
                                                            } else {
                                                                outputmsg("info", "error before sql ");
                                                                //  error message ///////
                                                                include_once("looding.php");
                                                                redirect("1", "add-members.php");
                                                            }
                                                        } else {

                                                        ?>

                                                            <form class="row g-3" method="post" action="<?php reusable_action(); ?>">
                                                                <div class="col-md-12">
                                                                    <label for="inputEmail4" class="form-label">Month</label>
                                                                    <input type="time" class="form-control slug-title" id="inputEmail4" name="member_name">
                                                                </div>

                                                                <div class="col-md-12 btn_attend">
                                                                    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                                                                </div>
                                                            </form>

                                                        <?php
                                                        }
                                                        ?>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- End Content -->
                    </div> <!-- End Content Wrapper -->
<?php
                }
            } else {
                outputmsg("info", "error in trainer id ");
                redirect("2", "trainer-list.php");
            }
        } else {
            outputmsg("info", "error in trainer id ");
            redirect("2", "trainer-list.php");
        }
    } else {
        outputmsg("info", "error in trainer id ");
        redirect("2", "trainer-list.php");
    }



    include_once("footer.php");
} else {
    //  login please ? //

    include_once("sign-in.php");
}
