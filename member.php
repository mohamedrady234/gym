<?php
session_start();
ob_start();
include_once("framework/framework.php");
include_once("framework/config.php");

if (isset($_SESSION['admin_login'])) {

	// logged  in // 
	include_once("header.php");

	if ($_SESSION['admin_username'] == "Male" or $_SESSION['admin_username'] == "admin") {
		$sql = "SELECT * FROM members";
	} else {
		$sql = "SELECT * FROM members_female";
	}

	$result = mysqli_query($con, $sql);

	if ($result) {
		if (mysqli_num_rows($result) > 0) {

?>

			<!-- CONTENT WRAPPER -->
			<div class="ec-content-wrapper">
				<div class="content">
					<div class="breadcrumb-wrapper breadcrumb-contacts">
						<div>
							<h1>Members</h1>

						</div>
						<div>

							<a href="add-members.php" class="btn btn-primary link_data ">
								Add Members
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
													<th>Id</th>
													<th>Member</th>
													<th>Name</th>
													<th>Subscription</th>
													<th>Phone</th>
													<th>Total</th>
													<th>Paid Up</th>
													<th>Remaining </th>
													<th>Salesman </th>
													<th>Start</th>
													<th>End</th>
												</tr>
											</thead>

											<tbody>
												<?php
												while ($row = mysqli_fetch_array($result)) {
												?>

													<tr>

														<td><?php if ($_SESSION['admin_username'] == "Male" or $_SESSION['admin_username'] == "admin") {
																echo $row['member_id'];
															} else {
																echo $row['member_id_female'];
															}; ?></td>
														<td>
															<a href="show_member.php?member_id=<?php
																								if ($_SESSION['admin_username'] == "Male"  or $_SESSION['admin_username'] == "admin") {
																									echo $row['member_id'];
																								} else {
																									echo $row['member_id_female'];
																								};
																								?>">
																<img class="vendor-thumb" src="assets/img/members/<?php echo $row['member_image']; ?>" alt="vendor image" />
															</a>
														</td>
														<td>
															<a href="show_member.php?member_id=<?php
																								if ($_SESSION['admin_username'] == "Male"  or $_SESSION['admin_username'] == "admin") {
																									echo $row['member_id'];
																								} else {
																									echo $row['member_id_female'];
																								};
																								?>" class="a_member">
																<?php echo $row['member_name']; ?>
															</a>
														</td>
														<td><?php echo $row['member_subscription']; ?></td>
														<td><?php echo $row['member_phone']; ?></td>
														<td><?php echo $row['member_paid_up'] + $row['member_remainder']; ?></td>
														<td><?php echo $row['member_paid_up']; ?></td>
														<td><?php echo $row['member_remainder']; ?></td>
														<td><?php echo $row['member_name_captain']; ?></td>
														<td><?php echo $row['member_start']; ?></td>
														<td><?php echo $row['member_end'];  ?></td>
														<td class="action_trainer">
															<div class="btn-group">
																<a href="edit_member.php?member_id=<?php if ($_SESSION['admin_username'] == "Male"  or $_SESSION['admin_username'] == "admin") {
																										echo $row['member_id'];
																									} else {
																										echo $row['member_id_female'];
																									}; ?>" class="btn btn-outline-success">
																	Edit
																</a>
																<?php
																if ($_SESSION['admin_username'] == "admin") {
																?>
																	<a href="delete_member.php?member_id=<?php if ($_SESSION['admin_username'] == "Male" or $_SESSION['admin_username'] == "admin") {
																												echo $row['member_id'];
																											} else {
																												echo $row['member_id_female'];
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


				</div> <!-- End Content -->
			</div>
			<!-- End Content Wrapper -->
			<!-- export sheet -->
			<button id="btnExport" onclick="fnExportToExcel('xlsx','old_member_sheet')" class="btn btn-outline-success">

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
							<h1>Members</h1>

						</div>
						<div>

							<a href="add-members.php" class="btn btn-primary link_data ">
								Add Member
							</a>

						</div>
					</div>

					<div class="output_edit">
						<p>Please Enter Member From Here </p>

					</div>
					<div>

						<a href="add-members.php" class="btn btn-primary link_data ">
							Add Member
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
