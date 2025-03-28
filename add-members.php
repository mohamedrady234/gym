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
					<h1>Add Members</h1>

				</div>
				<div>
					<a href="new_member.php" class="btn btn-primary"> View All
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
											$member_name 			= validate($_POST['member_name']);
											$member_subscription 	= validate($_POST['member_subscription']);
											$member_phone			= validate($_POST['member_phone']);
											$member_name_captain	= validate($_POST['member_name_captain']);
											$member_paid_up			= validate($_POST['member_paid_up']);
											$member_remainder 		= validate($_POST['member_remainder']);
											$member_start 			= validate($_POST['member_start']);
											$member_end 			= validate($_POST['member_end']);
											$member_image			= time() . $_FILES['member_image']['name'];
											$member_image_path			= $_FILES['member_image']['tmp_name'];

											if (
												$member_name 			!= NULL and
												$member_phone 			!= NULL and
												$member_name_captain 	!= NULL and
												$member_paid_up 		!= NULL and
												$member_remainder 		!= NULL and
												$member_start 			!= NULL and
												$member_end 			!= NULL and
												$member_image_path 		!= NULL
											) {
												if ($_SESSION['admin_username'] == "Male"  or $_SESSION['admin_username'] == "admin") {
													$check_user = "SELECT * from members where member_name='$member_name' or member_phone='$member_phone'";
													$result_check = @mysqli_query($con, $check_user);
													$count = mysqli_num_rows($result_check);
												} else {
													$check_user = "SELECT * from members_female where member_name='$member_name' or member_phone='$member_phone'";
													$result_check = @mysqli_query($con, $check_user);
													$count = mysqli_num_rows($result_check);
												}

												//  we make this if to insert into male or female //
												if ($count > 0) {


													msg_for_user(false, "USER IS ALREADY FOUND IN DATABASE ! CHECK IT");

													redirect("2", "add-members.php");
												} else {

													if ($_SESSION['admin_username'] == "Male"  or $_SESSION['admin_username'] == "admin") {
														$sql = "INSERT INTO newmembers VALUES(NULL,
																											'$member_name',
																											'$member_phone',
																											'$member_paid_up',
																											'$member_remainder',
																											'$member_start',
																											'$member_end',
																											'$member_name_captain',
																											'$member_subscription',
																											'$member_image'
																											)";
													} else {
														$sql = "INSERT INTO newmembers_female VALUES(NULL,
																											'$member_name',
																											'$member_phone',
																											'$member_paid_up',
																											'$member_remainder',
																											'$member_start',
																											'$member_end',
																											'$member_name_captain',
																											'$member_subscription',
																											'$member_image'
																											)";
													}

													$result = @mysqli_query($con, $sql);
													if ($result) {

														if (move_uploaded_file($member_image_path, "assets/img/members/$member_image")) {
															include_once("looding.php");
															if ($_SESSION['admin_username'] == "admin") {
																redirect("1", "member_admin.php");
															} else {
																redirect("1", "member.php");
															}
														} else {

															outputmsg("info", "error when move image ");


															redirect("2", "add-members.php");
														}
													} else {

														outputmsg("info", "error after sql ");
														include_once("looding.php");
														redirect("1", "add-members.php");
													}
												}
											} else {

												msg_for_user(false, "Photo Cannot be Null !!!!!  Please All fields must be completed.");

												// include_once("looding.php");
												redirect("3", "add-members.php");
											}
										} else {

										?>





											<form class="row g-3" method="post" action="<?php reusable_action(); ?>" enctype="multipart/form-data">
												<div class="col-lg-4">
													<div class="ec-vendor-img-upload">
														<div class="ec-vendor-main-img">
															<div class="avatar-upload">
																<div class="avatar-edit">
																	<input type='file' id="imageUpload" class="ec-image-upload"
																		accept=".png, .jpg, .jpeg" name="member_image" />
																	<label for="imageUpload">
																		<img
																			src="assets/img/icons/edit.svg"
																			class="svg_img header_svg" alt="edit" />
																	</label>
																</div>
																<div class="avatar-preview ec-preview">
																	<div class="imagePreview ec-div-preview">
																		<img class="ec-image-preview"
																			src="assets/img/members/vender-upload-preview.jpg"
																			alt="edit" />
																	</div>
																</div>
															</div>

														</div>
													</div>
												</div>
												<div>
													<label for="inputEmail4" class="form-label">Member name</label>
													<input type="text" class="form-control slug-title" id="inputEmail4" name="member_name">
												</div>



												<div class="col-md-6">

													<label class="form-label">Subscription</label>


													<select name="member_subscription" id="" class="form-label">
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
												<div class="col-md-6">
													<label class="form-label">Phone</label>

													<input id="slug" class="form-control here set-slug" type="number" name="member_phone">

												</div>
												<div class="col-md-12">
													<label class="form-label">Salesman</label>
													<input type="text" class="form-control" id="group_tag" data-role="tagsinput" name="member_name_captain" value="null">
												</div>
												<div class="col-md-6">
													<label class="form-label">paid up </label>
													<input type="number" class="form-control" id="price1" name="member_paid_up">
												</div>
												<div class="col-md-6">
													<label class="form-label">The rest of the amount</label>
													<input type="number" class="form-control" id="quantity1" name="member_remainder">
												</div>
												<div class="col-md-6">
													<label class="form-label">ٍٍStart</label>
													<input type="date" class="form-control" id="quantity1" name="member_start">
												</div>
												<div class="col-md-6">
													<label class="form-label">End</label>
													<input type="date" class="form-control" id="quantity1" name="member_end">
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
