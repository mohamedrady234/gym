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
					<h1>Add Output</h1>

				</div>
				<div>
					<a href="output.php" class="btn btn-primary"> View All
					</a>
				</div>
			</div>
			<div class="row">
				<div class="col-12">
					<div class="card card-default">


						<div class="card-body">
							<div class="row ec-vendor-uploads">

								<div class="col-lg-8">
									<div class="ec-vendor-upload-detail">
										<?php

										if (isset($_POST['submit'])) {
											$name 			= validate($_POST['name']);
											$disc 	        = validate($_POST['disc']);
											$paid_up		= validate($_POST['paid_up']);
											$day 			= validate($_POST['day']);


											if (
												$name 			!= NULL and
												$disc 			!= NULL and
												$paid_up 		!= NULL and
												$day 		!= NULL
											) {


												$sql = "INSERT INTO out_put VALUES(NULL,
																								'$name',
																								'$disc',
																								'$paid_up',
																								'$day'
																								)";


												$result = @mysqli_query($con, $sql);
												if ($result) {

													include_once("looding.php");
													redirect("1", "output.php");
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





											<form class="row g-3" method="post" action="<?php reusable_action(); ?>" enctype="multipart/form-data">

												<div class="col-md-6">
													<label for="inputEmail4" class="form-label">Service</label>
													<input type="text" class="form-control slug-title" id="inputEmail4" name="name">
												</div>
												<div class="col-md-6">
													<label class="form-label">Description </label>
													<input type="text" class="form-control" id="price1" name="disc">
												</div>
												<div class="col-md-6">
													<label class="form-label">paid up </label>
													<input type="text" class="form-control" id="price1" name="paid_up">
												</div>

												<div class="col-md-6">
													<label class="form-label">day</label>
													<input type="date" class="form-control" id="quantity1" name="day">
												</div>




												<div class="col-md-12">
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

	include_once("footer.php");
} else {
	//  login please ? //

	include_once("sign-in.php");
}
