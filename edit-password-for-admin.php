<?php
ob_start();
session_start();
include_once("framework/framework.php");
include_once("framework/config.php");

if (isset($_SESSION['admin_login'])) {

    // logged  in // 
    include_once("header.php");

?>

    <!-- CONTENT WRAPPER -->
    <div class="ec-content-wrapper">

        <div class="content">
            <div class="breadcrumb-wrapper d-flex align-items-center justify-content-between">
                <div>
                    <h1>Edit Password</h1>

                </div>

            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card card-default">
                        <div class="card-header card-header-border-bottom">
                            <h2>New Password</h2>
                        </div>

                        <div class="card-body">
                            <div class="row ec-vendor-uploads">

                                <div class="col-lg-12">
                                    <div class="ec-vendor-upload-detail">
                                        <?php
                                        if (isset($_POST['submit'])) {

                                            $admin_password = validate($_POST['admin_password']);

                                            if ($admin_password != NULL) {
                                                $admin_password = enc_password($admin_password);

                                                $sql = "UPDATE admin SET admin_password='$admin_password' WHERE admin_id=$_SESSION[admin_id]";

                                                $result = mysqli_query($con, $sql);
                                                if ($result) {

                                                    include_once("looding.php");
                                                    redirect();
                                                } else {
                                                    redirect();
                                                }
                                            } else {
                                                include_once("looding.php");
                                                redirect("2", "edit-password-for-admin.php");
                                            }
                                        } else {
                                        ?>
                                            <form class="row g-3" method="post" action="<?php reusable_action(); ?>">
                                                <div class="col-md-12">
                                                    <div class="col-12">
                                                        <input id="slug" name="admin_password" class="form-control here set-slug" type="password">
                                                    </div>
                                                </div>

                                                <div class="col-md-12">
                                                    <button type="submit" class="btn btn-primary" name="submit">Change</button>
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

    include_once("footer.php");
} else {
    //  login please ? //

    include_once("sign-in.php");
}


?>