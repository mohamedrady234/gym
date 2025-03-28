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
            $sql = "SELECT * FROM members WHERE member_id = $member_id";
        } else {
            $sql = "SELECT * FROM members_female WHERE member_id_female  = $member_id";
        }


        $result = mysqli_query($con, $sql);

        if ($result) {

            if (mysqli_num_rows($result) > 0) {
                $row_old_data  = mysqli_fetch_array($result);

                if (isset($_POST["submit"])) {
                    $member_name             = validate($_POST['member_name']);
                    $member_subscription     = validate($_POST['member_subscription']);
                    $member_phone            = validate($_POST['member_phone']);
                    $member_name_captain    = validate($_POST['member_name_captain']);
                    $member_paid_up            = validate($_POST['member_paid_up']);
                    $member_remainder         = validate($_POST['member_remainder']);
                    $member_start             = validate($_POST['member_start']);
                    $member_end             = validate($_POST['member_end']);

                    $member_image            = time() . $_FILES['member_image']['name'];
                    $member_image_path        = $_FILES['member_image']['tmp_name'];


                    if (
                        $member_name != NULL and
                        $member_subscription != NULL and
                        $member_phone != NULL and
                        $member_name_captain != NULL and
                        $member_paid_up != NULL and
                        $member_remainder != NULL and
                        $member_start != NULL and
                        $member_end != NULL and
                        $member_image_path != NULL
                    ) {
                        //  update all data

                        if ($_SESSION['admin_username'] == "Male" or $_SESSION['admin_username'] == "admin") {
                            $sql_update = "UPDATE  members SET 
                            member_name          = '$member_name',
                            member_subscription  = '$member_subscription',
                            member_phone         = '$member_phone',
                            member_name_captain  = '$member_name_captain',
                            member_paid_up       = '$member_paid_up',
                            member_remainder     = '$member_remainder',
                            member_start         = '$member_start',
                            member_end           = '$member_end',
                            member_image         = '$member_image'
                            WHERE member_id      = $member_id ";
                        } else {
                            $sql_update = "UPDATE  members_female SET 
                            member_name          = '$member_name',
                            member_subscription  = '$member_subscription',
                            member_phone         = '$member_phone',
                            member_name_captain  = '$member_name_captain',
                            member_paid_up       = '$member_paid_up',
                            member_remainder     = '$member_remainder',
                            member_start         = '$member_start',
                            member_end           = '$member_end',
                            member_image         = '$member_image'
                            WHERE member_id_female        = $member_id ";
                        }

                        $result_update = mysqli_query($con, $sql_update);
                        if ($result_update) {
                            if (move_uploaded_file($member_image_path, "assets/img/members/$member_image")) {
                                include_once("looding.php");
                                redirect("1", "member.php");
                            } else {
                                outputmsg("info", "error when move image ");
                            }
                        } else {
                            outputmsg("info", "error before sql ");

                            include_once("looding.php");
                            redirect("1", "member.php");
                        }
                    } elseif (
                        $member_name != NULL and
                        $member_subscription != NULL and
                        $member_phone != NULL and
                        $member_name_captain != NULL and
                        $member_paid_up != NULL and
                        $member_remainder != NULL and
                        $member_start != NULL and
                        $member_end != NULL

                    ) {
                        //  update all data with out image

                        if ($_SESSION['admin_username'] == "Male" or $_SESSION['admin_username'] == "admin") {
                            $sql_update = "UPDATE  members SET 
                                member_name          = '$member_name',
                                member_subscription  = '$member_subscription',
                                member_phone         = '$member_phone',
                                member_name_captain  = '$member_name_captain',
                                member_paid_up       = '$member_paid_up',
                                member_remainder     = '$member_remainder',
                                member_start         = '$member_start',
                                member_end           = '$member_end'
                                WHERE member_id      = $member_id ";
                        } else {
                            $sql_update = "UPDATE  members_female SET 
                                member_name          = '$member_name',
                                member_subscription  = '$member_subscription',
                                member_phone         = '$member_phone',
                                member_name_captain  = '$member_name_captain',
                                member_paid_up       = '$member_paid_up',
                                member_remainder     = '$member_remainder',
                                member_start         = '$member_start',
                                member_end           = '$member_end'
                                WHERE member_id_female        = $member_id ";
                        }

                        $result_update = mysqli_query($con, $sql_update);
                        if ($result_update) {

                            include_once("looding.php");
                            redirect("1", "member.php");
                        } else {
                            outputmsg("info", "error before sql ");

                            include_once("looding.php");
                            redirect("1", "member.php");
                        }
                    } else {
                        outputmsg("danger", "please fill all data ");
                        include_once("looding.php");
                        redirect("1", "member.php");
                    }
                } else {
?>
                    <div class="row">
                        <div class="col-12">
                            <div class="card card-default">
                                <div class="card-header card-header-border-bottom">
                                    <h2>Edit Trainer</h2>
                                </div>

                                <div class="card-body">
                                    <div class="row ec-vendor-uploads">

                                        <div class="col-lg-8">
                                            <div class="ec-vendor-upload-detail">
                                                <form class="row g-3" method="post" action="<?php htmlspecialchars($_SERVER['PHP_SELF']) . "?member_id = $member_id"; ?>" enctype="multipart/form-data">


                                                    <div class="col-lg-4">
                                                        <div class="ec-vendor-img-upload">
                                                            <div class="ec-vendor-main-img">
                                                                <div class="avatar-upload">
                                                                    <div class="avatar-edit">
                                                                        <input type='file' id="imageUpload" class="ec-image-upload"
                                                                            accept=".png, .jpg, .jpeg" name="member_image" />
                                                                        <label for="imageUpload"><img
                                                                                src="assets/img/icons/edit.svg"
                                                                                class="svg_img header_svg" alt="edit" /></label>
                                                                    </div>
                                                                    <div class="avatar-preview ec-preview">
                                                                        <div class="imagePreview ec-div-preview">
                                                                            <img class="ec-image-preview"
                                                                                src="assets/img/members/<?php echo $row_old_data['member_image'] ?>" alt="edit" />
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div>
                                                        <label for="inputEmail4" class="form-label">Member name</label>
                                                        <input type="text" class="form-control slug-title" id="inputEmail4" name="member_name" value="<?php echo $row_old_data['member_name'] ?>">
                                                    </div>

                                                    <div class="col-md-6">
                                                        <label class="form-label">Subscription</label>

                                                        <select name="member_subscription" id="" class="form-label">

                                                            <option><?php echo $row_old_data['member_subscription'] ?></option>
                                                            <option>1 - month</option>
                                                            <option>2 - month</option>
                                                            <option>3 - month</option>
                                                            <option>4 - month</option>
                                                            <option>5 - month</option>
                                                            <option>6 - month</option>
                                                            <option>7 - month</option>
                                                            <option>8 - month</option>
                                                            <option>9 - month</option>
                                                            <option>10 - month</option>
                                                            <option>11 - month</option>
                                                            <option>12 - month</option>
                                                            <option>15 - month</option>
                                                            <option>18 - month</option>
                                                        </select>

                                                    </div>

                                                    <div class="col-md-12">
                                                        <label class="form-label">Phone</label>
                                                        <input type="number" class="form-control" id="group_tag" data-role="tagsinput" name="member_phone" value="<?php echo $row_old_data['member_phone'] ?>">
                                                    </div>
                                                    <div class="col-md-12">
                                                        <label class="form-label">The Captain</label>
                                                        <input type="text" class="form-control" id="group_tag" data-role="tagsinput" name="member_name_captain" value="<?php echo $row_old_data['member_name_captain'] ?>">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label">paid up </label>
                                                        <input type="number" class="form-control" id="price1" name="member_paid_up" value="<?php echo $row_old_data['member_paid_up'] ?>">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label">The rest of the amount</label>
                                                        <input type="number" class="form-control" id="quantity1" name="member_remainder" value="<?php echo $row_old_data['member_remainder'] ?>">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label">ٍٍStart</label>
                                                        <input type="date" class="form-control" id="quantity1" name="member_start" value="<?php echo $row_old_data['member_start'] ?>">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label">End</label>
                                                        <input type="date" class="form-control" id="quantity1" name="member_end" value="<?php echo $row_old_data['member_end'] ?>">
                                                    </div>


                                                    <div class="col-md-12">
                                                        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                                                    </div>
                                                </form>



                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
<?php
                }
            } else {
                outputmsg("info", "error 3 ");
                redirect("1", "member.php");
            }
        } else {
            outputmsg("info", "error 2 ");
            redirect("1", "member.php");
        }
    } else {
        outputmsg("info", "error 1 ");
        redirect("1", "member.php");
    }



    include_once("footer.php");
} else {
    //  login please ? //

    include_once("sign-in.php");
}
