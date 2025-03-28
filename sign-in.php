<?php
ob_start();

?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from maraviyainfotech.com/projects/ekka/ekka-v35/ekka-admin/sign-in.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 14 Sep 2023 02:37:47 GMT -->

<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta name="description" content="Ekka - Admin Dashboard HTML Template.">

	<title>White Gym System</title>

	<!-- GOOGLE FONTS -->
	<link rel="preconnect" href="https://fonts.googleapis.com/">
	<link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;300;400;500;600;700;800&amp;family=Poppins:wght@300;400;500;600;700;800;900&amp;family=Roboto:wght@400;500;700;900&amp;display=swap" rel="stylesheet">

	<link href="css/materialdesignicons.min.css" rel="stylesheet" />

	<!-- Ekka CSS -->
	<link id="ekka-css" rel="stylesheet" href="assets/css/ekka.css" />

	<!-- FAVICON -->
	<link href="assets/img/favicon.png" rel="shortcut icon" />
</head>

<body class="sign-inup" id="body">
	<div class="container d-flex align-items-center justify-content-center form-height-login pt-24px pb-24px">
		<div class="row justify-content-center">
			<div class="col-lg-6 col-md-10">
				<div class="card">
					<div class="card-header bg-primary">
						<div class="ec-brand">
							<a href="index.php" title="white gym">
								<img class="ec-brand-icon" src="assets/img/logo/logo name.png" alt="" />
							</a>
						</div>
					</div>
					<div class="card-body p-5">
						<h4 class="text-dark mb-5">Sign In</h4>

						<?php

						// echo enc_password("123456");
						if (isset($_POST['submit'])) {
							$admin_email    = validate($_POST['admin_email']);
							$admin_password = validate($_POST['admin_password']);

							if ($admin_email != NULL and $admin_password != NULL) {
								$admin_password = enc_password($admin_password);

								$sql = "SELECT * FROM admin WHERE admin_email='$admin_email' and admin_password='$admin_password'";

								$result = mysqli_query($con, $sql);

								if ($result) {
									if (mysqli_num_rows($result) > 0) {
										$row_admin = mysqli_fetch_array($result);
										$_SESSION['admin_login'] = "yes";
										$_SESSION['admin_id'] = $row_admin['admin_id'];
										$_SESSION['admin_username'] = $row_admin['admin_username'];
										$_SESSION['admin_email'] = $row_admin['admin_email'];

										//  we need make a success page my bro 
										include_once("looding.php");
										redirect();
									} else {
										//  we need make a error page my bro 
										include_once("looding.php");
										redirect();
									}
								} else {
									//  we need make a error page my bro 

									include_once("looding.php");
									redirect();
								}
							} else {
								//  we need make a error page my bro 
								msg_for_user(false, "Please enter your email and password.");

								redirect();
							}
						} else {
						?>
							<form action="<?php reusable_action(); ?>" method="post">
								<div class="row">
									<div class="form-group col-md-12 mb-4">
										<input type="email" class="form-control" id="email" placeholder="Username" name="admin_email">
									</div>

									<div class="form-group col-md-12 ">
										<input type="password" class="form-control" id="password" placeholder="Password" name="admin_password">
									</div>

									<div class="col-md-12">
										<div class="d-flex my-2 justify-content-between">


										</div>

										<button type="submit" class="btn btn-primary btn-block mb-4" name="submit">Sign In</button>


									</div>
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

	<!-- Javascript -->
	<script src="assets/plugins/jquery/jquery-3.5.1.min.js"></script>
	<script src="assets/js/bootstrap.bundle.min.js"></script>
	<script src="assets/plugins/jquery-zoom/jquery.zoom.min.js"></script>
	<script src="assets/plugins/slick/slick.min.js"></script>

	<!-- Ekka Custom -->
	<script src="assets/js/ekka.js"></script>
</body>

<!-- Mirrored from maraviyainfotech.com/projects/ekka/ekka-v35/ekka-admin/sign-in.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 14 Sep 2023 02:37:47 GMT -->

</html>