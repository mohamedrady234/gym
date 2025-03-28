<?php
session_start();
ob_start();
include_once("framework/framework.php");
include_once("framework/config.php");

if (isset($_SESSION['admin_login'])) {

	// logged  in // 
	include_once("header.php");

	if ($_SESSION['admin_username'] == "Male" or $_SESSION['admin_username'] == "admin") {
		$sql = "SELECT * FROM trainer";
	} else {
		$sql = "SELECT * FROM trainer_female";
	}
	$result = mysqli_query($con, $sql);

	if ($result) {
		if (mysqli_num_rows($result) >= 0) {
?>
			<!-- CONTENT WRAPPER -->
			<div class="ec-content-wrapper">
				<div class="content">
					<div class="breadcrumb-wrapper breadcrumb-contacts">
						<div>
							<h1>Trainers</h1>

						</div>
						<div>

							<a href="add-trainer.php" class="btn btn-primary link_data ">
								Add Trainer
							</a>

						</div>
					</div>
					<div class="row">
						<div class="col-12">
							<div class="ec-vendor-list card card-default">
								<div class="card-body">
									<div class="table-responsive">
										<table id="responsive-data-table" class="table">
											<thead>
												<tr>

													<th>Profile</th>
													<th>Name</th>
													<th>Address</th>
													<th>Birthday</th>
													<th>Join On</th>
													<th>Phone Number</th>
													<th>salry</th>
												</tr>
											</thead>

											<tbody>
												<?php
												while ($row = mysqli_fetch_array($result)) {
												?>
													<tr>

														<td><img class="vendor-thumb" src="assets/img/trainer/<?php echo $row['trainer_image']; ?>" alt="vendor image" /></td>
														<td><?php echo $row['trainer_first_name'];
															echo " ";
															echo $row['trainer_last_name']; ?></td>
														<td><?php echo $row['trainer_address']; ?></td>
														<td><?php echo $row['trainer_birthday']; ?></td>
														<td><?php echo $row['trainer_join_on']; ?></td>
														<td><?php echo $row['trainer_phone']; ?></td>
														<td><?php echo $row['trainer_salry']; ?></td>
														<td class="action_trainer">
															<div class="btn-group">
																<a href="edit_trainer.php?trainer_id=<?php if ($_SESSION['admin_username'] == "Male" or $_SESSION['admin_username'] == "admin") {
																											echo $row['trainer_id'];
																										} else {
																											echo $row['trainer_female_id'];
																										}; ?>" class="btn btn-outline-success">
																	Edit
																</a>
																<?php
																if ($_SESSION['admin_username'] == "admin") {
																?>
																	<a href="delete-trainer.php?trainer_id=<?php if ($_SESSION['admin_username'] == "Male" or $_SESSION['admin_username'] == "admin") {
																												echo $row['trainer_id'];
																											} else {
																												echo $row['trainer_female_id'];
																											}; ?>" class="btn btn-outline-success">
																		Delete
																	</a>
																<?php
																}
																?>
															</div>
														</td>
													</tr>

												<?php
												}
												?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- Add Vendor Modal  -->
					<div class="modal fade modal-add-contact" id="addVendor" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
						<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
							<div class="modal-content">

							</div>
						</div>
					</div>

				</div> <!-- End Content -->
			</div>
			<!-- End Content Wrapper -->
			<!-- export sheet -->
			<button id="btnExport" onclick="fnExportToExcel('xlsx','trainer_sheet')" class="btn btn-outline-success">

				Export To Excel

			</button>

			<script>
				function fnExportToExcel(fileExtension, fileName) {
					var elt = document.getElementById('responsive-data-table');
					var wb = XLSX.utils.table_to_book(elt, {
						sheet: "sheet1"
					});
					return XLSX.writeFile(wb, fileName + "." + fileExtension || ('MySheetName.' + (fileExtension || 'xlsx')));
				}
			</script>


		<?php


		} else {
		?>
			<!-- CONTENT WRAPPER -->
			<div class="ec-content-wrapper">
				<div class="content">
					<div class="breadcrumb-wrapper breadcrumb-contacts">
						<div>
							<h1>Trainer</h1>

						</div>
						<div>

							<a href="add-trainer.php" class="btn btn-primary link_data ">
								Add Trainer
							</a>

						</div>
					</div>

					<div class="output_edit">
						<p>Please Enter Trainer From Here </p>

					</div>
					<div>

						<a href="add-trainer.php" class="btn btn-primary link_data ">
							Add Trainer
						</a>

					</div>

		<?php
		}
	} else {
		outputmsg("info", "error 1");
	}



	include_once("footer.php");
} else {
	//  login please ? //

	include_once("sign-in.php");
}
