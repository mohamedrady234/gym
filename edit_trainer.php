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
            $sql = "SELECT * FROM trainer WHERE trainer_id = $trainer_id";
        } else {
            $sql = "SELECT * FROM trainer_female WHERE trainer_female_id = $trainer_id";
        }


        $result = mysqli_query($con, $sql);

        if ($result) {

            if (mysqli_num_rows($result) > 0) {
                $row_old_data  = mysqli_fetch_array($result);

                if (isset($_POST["submit"])) {
                    $trainer_first_name = validate($_POST['trainer_first_name']);
                    $trainer_last_name     = validate($_POST['trainer_last_name']);
                    $trainer_address    = validate($_POST['trainer_address']);
                    $trainer_join_on    = validate($_POST['trainer_join_on']);
                    $trainer_birthday    = validate($_POST['trainer_birthday']);
                    $trainer_salry         = validate($_POST['trainer_salry']);
                    $trainer_phone         = validate($_POST['trainer_phone']);

                    $trainer_image        = time() . $_FILES['trainer_image']['name'];
                    $trainer_image_path    = $_FILES['trainer_image']['tmp_name'];

                    if (
                        $trainer_first_name != NULL and
                        $trainer_last_name != NULL and
                        $trainer_address != NULL and
                        $trainer_join_on != NULL and
                        $trainer_birthday != NULL and
                        $trainer_salry != NULL and
                        $trainer_phone != NULL and
                        $trainer_image_path != NULL
                    ) {
                        if ($_SESSION['admin_username'] == "Male") {

                            $sql_update = "UPDATE  trainer SET 
                                                    trainer_first_name = '$trainer_first_name',
                                                    trainer_last_name  = '$trainer_last_name',
                                                    trainer_address    = '$trainer_address',
                                                    trainer_join_on    = '$trainer_join_on',
                                                    trainer_birthday   = '$trainer_birthday',
                                                    trainer_salry      = '$trainer_salry',
                                                    trainer_phone      = '$trainer_phone',
                                                    trainer_image      = '$trainer_image'
                                                    WHERE trainer_id   = $trainer_id ";
                        } else {
                            $sql_update = "UPDATE  trainer_female SET 
                            trainer_first_name = '$trainer_first_name',
                            trainer_last_name  = '$trainer_last_name',
                            trainer_address    = '$trainer_address',
                            trainer_join_on    = '$trainer_join_on',
                            trainer_birthday   = '$trainer_birthday',
                            trainer_salry      = '$trainer_salry',
                            trainer_phone      = '$trainer_phone',
                            trainer_image      = '$trainer_image'
                            WHERE trainer_female_id    = $trainer_id ";
                        }

                        $result_update = mysqli_query($con, $sql_update);
                        if ($result_update) {
                            if (move_uploaded_file($trainer_image_path, "assets/img/trainer/$trainer_image")) {
                                include_once("looding.php");
                                redirect("1", "trainer-list.php");
                            } else {
                                outputmsg("info", "error when move image ");
                            }
                        } else {
                            outputmsg("info", "error before sql ");

                            include_once("looding.php");
                            redirect("1", "trainer-list.php");
                        }
                    } elseif (
                        $trainer_first_name != NULL and
                        $trainer_last_name != NULL and
                        $trainer_address != NULL and
                        $trainer_join_on != NULL and
                        $trainer_birthday != NULL and
                        $trainer_salry != NULL and
                        $trainer_phone != NULL
                    ) {
                        if ($_SESSION['admin_username'] == "Male") {

                            $sql_update = "UPDATE  trainer SET 
                                                    trainer_first_name = '$trainer_first_name',
                                                    trainer_last_name  = '$trainer_last_name',
                                                    trainer_address    = '$trainer_address',
                                                    trainer_join_on    = '$trainer_join_on',
                                                    trainer_birthday   = '$trainer_birthday',
                                                    trainer_salry      = '$trainer_salry',
                                                    trainer_phone      = '$trainer_phone'
                                                    WHERE trainer_id   = $trainer_id ";
                        } else {
                            $sql_update = "UPDATE  trainer_female SET 
                            trainer_first_name = '$trainer_first_name',
                            trainer_last_name  = '$trainer_last_name',
                            trainer_address    = '$trainer_address',
                            trainer_join_on    = '$trainer_join_on',
                            trainer_birthday   = '$trainer_birthday',
                            trainer_salry      = '$trainer_salry',
                            trainer_phone      = '$trainer_phone'
                            WHERE trainer_female_id    = $trainer_id ";
                        }


                        $result_update = mysqli_query($con, $sql_update);
                        if ($result_update) {

                            include_once("looding.php");
                            redirect("1", "trainer-list.php");
                        } else {
                            outputmsg("info", "error before sql ");

                            include_once("looding.php");
                            redirect("1", "trainer-list.php");
                        }
                    } else {
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
                                                <form class="row g-3" method="post" action="<?php htmlspecialchars($_SERVER['PHP_SELF']) . "?trainer_id = $trainer_id"; ?>" enctype="multipart/form-data">

                                                    <div class="col-lg-4">
                                                        <div class="ec-vendor-img-upload">
                                                            <div class="ec-vendor-main-img">
                                                                <div class="avatar-upload">
                                                                    <div class="avatar-edit">
                                                                        <input type='file' id="imageUpload" class="ec-image-upload"
                                                                            accept=".png, .jpg, .jpeg" name="trainer_image" />
                                                                        <label for="imageUpload"><img
                                                                                src="assets/img/icons/edit.svg"
                                                                                class="svg_img header_svg" alt="edit" /></label>
                                                                    </div>
                                                                    <div class="avatar-preview ec-preview">
                                                                        <div class="imagePreview ec-div-preview">
                                                                            <img class="ec-image-preview"
                                                                                src="assets/img/trainer/<?php echo $row_old_data['trainer_image'] ?>" alt="edit" />
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <label for="inputEmail4" class="form-label">First Name</label>
                                                        <input type="text" class="form-control slug-title" name="trainer_first_name" value="<?php echo $row_old_data['trainer_first_name'] ?>">
                                                    </div>

                                                    <div>
                                                        <label for="inputEmail4" class="form-label">Last Name</label>
                                                        <input type="text" class="form-control slug-title" name="trainer_last_name" value="<?php echo $row_old_data['trainer_last_name'] ?>">
                                                    </div>
                                                    <div class="col-md-12">
                                                        <label for="inputEmail4" class="form-label">PHONE NUMBER</label>
                                                        <input type="text" class="form-control slug-title" name="trainer_phone" value="<?php echo $row_old_data['trainer_phone'] ?>">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label">Address </label>
                                                        <input type="text" class="form-control" id="price1" name="trainer_address" value="<?php echo $row_old_data['trainer_address'] ?>">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label">Join On</label>
                                                        <input type="date" class="form-control" id="quantity1" name="trainer_join_on" value="<?php echo $row_old_data['trainer_join_on'] ?>">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label">Birthday</label>
                                                        <input type="date" class="form-control" id="quantity1" name="trainer_birthday" value="<?php echo $row_old_data['trainer_birthday'] ?>">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label">Salry</label>
                                                        <input type="number" class="form-control" id="quantity1" name="trainer_salry" value="<?php echo $row_old_data['trainer_salry'] ?>">
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
                redirect("1", "trainer-list.php");
            }
        } else {
            outputmsg("info", "error 2 ");
            redirect("1", "trainer-list.php");
        }
    } else {
        outputmsg("info", "error 1 ");
        redirect("1", "trainer-list.php");
    }



    include_once("footer.php");
} else {
    //  login please ? //

    include_once("sign-in.php");
}
