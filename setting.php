<?php
session_start();
ob_start();
include_once("framework/framework.php");
include_once("framework/config.php");

if (isset($_SESSION['admin_login'])) {

    // logged  in // 
    include_once("header.php");




    $sql = "SELECT * FROM gym_data ";



    $result = mysqli_query($con, $sql);

    if ($result) {

        if (mysqli_num_rows($result) > 0) {
            $row_old_data  = mysqli_fetch_array($result);

            if (isset($_POST["submit"])) {
                $gym_phone             = validate($_POST['gym_phone']);
                $gym_face     = validate($_POST['gym_face']);
                $gym_insta            = validate($_POST['gym_insta']);
                $gym_youtube    = validate($_POST['gym_youtube']);
                $gym_website            = validate($_POST['gym_website']);

                if (
                    $gym_phone != NULL and
                    $gym_face != NULL and
                    $gym_insta != NULL and
                    $gym_youtube != NULL and
                    $gym_website != NULL

                ) {

                    $sql_update = "UPDATE  gym_data SET 
                                gym_phone          = '$gym_phone',
                                gym_face           = '$gym_face',
                                gym_insta          = '$gym_insta',
                                gym_youtube        = '$gym_youtube',
                                gym_website        = '$gym_website'
                                 ";


                    $result_update = mysqli_query($con, $sql_update);
                    if ($result_update) {

                        include_once("looding.php");
                        redirect("1", "index.php");
                    } else {
                        outputmsg("info", "error before sql ");

                        include_once("looding.php");
                        redirect("1", "index.php");
                    }
                } else {
                    outputmsg("danger", "please fill all data ");
                    include_once("looding.php");
                    redirect("1", "index.php");
                }
            } else {
?>
                <div class="row">
                    <div class="col-12">
                        <div class="card card-default card_setting">
                            <div class="card-header card-header-border-bottom">
                                <h1>SETTING</h1>
                            </div>

                            <div class="card-body">
                                <div class="row ec-vendor-uploads">

                                    <div class="col-lg-12">
                                        <div class="ec-vendor-upload-detail">
                                            <form class="row g-3" method="post" action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>" enctype="multipart/form-data">

                                                <div>
                                                    <label for="inputEmail4" class="form-label">admin name</label>
                                                    <input disabled type="text" class="form-control slug-title" id="inputEmail4" name="member_name" value="<?php echo $_SESSION['admin_username'] ?>">
                                                </div>


                                                <div class="col-lg-4">
                                                    <div class="ec-vendor-img-upload card_img_setting">
                                                        <div class="ec-vendor-main-img">
                                                            <div class="avatar-upload">

                                                                <div class="avatar-preview ec-preview">
                                                                    <div class="imagePreview ec-div-preview">
                                                                        <img class="ec-image-preview img_setting"
                                                                            src="assets/img/logo/all logo.png" alt="edit" />
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-12">
                                                    <label class="form-label">Phone</label>
                                                    <input type="number" class="form-control" id="group_tag" data-role="tagsinput" name="gym_phone" value="<?php echo $row_old_data['gym_phone'] ?>">
                                                </div>
                                                <div class="col-md-12">
                                                    <label class="form-label">Facebook Link</label>
                                                    <input type="url" class="form-control" id="group_tag" data-role="tagsinput" name="gym_face" value="<?php echo $row_old_data['gym_face'] ?>">
                                                </div>
                                                <div class="col-md-12">
                                                    <label class="form-label">Instgram Link</label>
                                                    <input type="url" class="form-control" id="group_tag" data-role="tagsinput" name="gym_insta" value="<?php echo $row_old_data['gym_insta'] ?>">
                                                </div>
                                                <div class="col-md-12">
                                                    <label class="form-label">Website Link</label>
                                                    <input type="url" class="form-control" id="group_tag" data-role="tagsinput" name="gym_website" value="<?php echo $row_old_data['gym_website'] ?>">
                                                </div>
                                                <div class="col-md-12">
                                                    <label class="form-label">Youtube Link</label>
                                                    <input type="url" class="form-control" id="group_tag" data-role="tagsinput" name="gym_youtube" value="<?php echo $row_old_data['gym_youtube'] ?>">
                                                </div>




                                                <div class="col-md-12">
                                                    <button type="submit" class="btn btn-primary" name="submit">Save Change</button>
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
            redirect("1", "index.php");
        }
    } else {
        outputmsg("info", "error 2 ");
        redirect("1", "index.php");
    }




    include_once("footer.php");
} else {
    //  login please ? //

    include_once("sign-in.php");
}
