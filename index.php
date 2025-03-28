<?php
session_start();
include_once("framework/framework.php");
include_once("framework/config.php");
if (isset($_SESSION['admin_login'])) {

	include_once("header.php");


	if ($_SESSION['admin_username'] == "Male" or $_SESSION['admin_username'] == "admin") {
		$sql = "SELECT * FROM members";
	} else {
		$sql = "SELECT * FROM members_female";
	}

	$result = mysqli_query($con, $sql);

	if ($result) {

		// include_once("countdown.php");s

?>


		<!-- CONTENT WRAPPER -->
		<div class="ec-content-wrapper">
			<div class="content">

				<div class="card bg-white profile-content">
					<div class="row">
						<div class="col-lg-6 col-xl-3">
							<div class="profile-content-left profile-left-spacing">
								<div class="text-center widget-profile px-0 border-0">

									<div class="card-body">
										<img src="assets/img/logo/logo name.png" class="img_user_profile" alt="">

									</div>
								</div>

								<hr class="w-100">


							</div>
						</div>



					</div>
				</div>
			</div> <!-- End Content -->
		</div> <!-- End Content Wrapper -->

<?php


	} else {
		msg_for_user(false, "error in sql");
	}


	include_once("footer.php");
} else {
	//  login please ? //

	include_once("sign-in.php");
}


?>