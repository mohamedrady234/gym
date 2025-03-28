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
?>
                <div class="row">
                    <div class="col-12">
                        <div class="card card-default">
                            <div class="card-header card-header-border-bottom member_show">
                                <h2>Show Member</h2>
                                <a type="submit" class="btn btn-primary" href="new_member.php">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-bar-left" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M12.5 15a.5.5 0 0 1-.5-.5v-13a.5.5 0 0 1 1 0v13a.5.5 0 0 1-.5.5ZM10 8a.5.5 0 0 1-.5.5H3.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L3.707 7.5H9.5a.5.5 0 0 1 .5.5Z" />
                                    </svg>
                                    Back
                                </a>


                            </div>


                            <div class="card-body">
                                <div class="row ec-vendor-uploads">

                                    <div class="col-lg-8">
                                        <div class="ec-vendor-upload-detail">
                                            <form class="row g-3" method="post" action="<?php htmlspecialchars($_SERVER['PHP_SELF']) . "?member_id = $member_id"; ?>" enctype="multipart/form-data">


                                                <div class="col-lg-8">
                                                    <div class="ec-vendor-img-upload">
                                                        <div class="ec-vendor-main-img">
                                                            <div class="avatar-upload">

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

                                                <div class="col-md-6">
                                                    <label for="inputEmail4" class="form-label">Member name</label>
                                                    <input disabled type="text" class="form-control slug-title" id="inputEmail4" name="member_name" value="<?php echo $row_old_data['member_name'] ?>">
                                                </div>

                                                <div class="col-md-6">
                                                    <label class="form-label">Subscription</label>

                                                    <select disabled name="member_subscription" id="" class="form-label">

                                                        <option><?php echo $row_old_data['member_subscription'] ?></option>

                                                    </select>

                                                </div>

                                                <div class="col-md-6">
                                                    <label class="form-label">Phone</label>
                                                    <input disabled type="number" class="form-control" id="group_tag" data-role="tagsinput" name="member_phone" value="<?php echo $row_old_data['member_phone'] ?>">
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label">The Captain</label>
                                                    <input disabled type="text" class="form-control" id="group_tag" data-role="tagsinput" name="member_name_captain" value="<?php echo $row_old_data['member_name_captain'] ?>">
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label">paid up </label>
                                                    <input disabled type="number" class="form-control" id="price1" name="member_paid_up" value="<?php echo $row_old_data['member_paid_up'] ?>">
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label">The rest of the amount</label>
                                                    <input disabled type="number" class="form-control " id="quantity1" name="member_remainder" value="<?php echo $row_old_data['member_remainder'] ?>">
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label">ٍٍStart</label>
                                                    <input disabled type="date" class="form-control" id="quantity1" name="member_start" value="<?php echo $row_old_data['member_start'] ?>">
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label">End</label>
                                                    <input disabled type="date" class="form-control" id="quantity1" name="member_end" value="<?php echo $row_old_data['member_end'] ?>">
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
