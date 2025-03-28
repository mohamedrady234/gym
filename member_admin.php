<?php
session_start();
ob_start();
include_once("framework/framework.php");
include_once("framework/config.php");

if (isset($_SESSION['admin_login'])) {

	// logged  in // 
	include_once("header.php");


	$sql_male = "SELECT * FROM newmembers";

	$sql_female = "SELECT * FROM newmembers_female";


	$result_male   = mysqli_query($con, $sql_male);
	$result_female = mysqli_query($con, $sql_female);


	if ($result_male) {
		if (mysqli_num_rows($result_male) > 0) {

?>
			<!-- CONTENT WRAPPER -->
			<div class="ec-content-wrapper">
				<div class="content">
					<div class="breadcrumb-wrapper breadcrumb-contacts titel_admin">
						<div>
							<h1>Male Members</h1>

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
													<th>The Captain</th>
													<th>Start</th>
													<th>End</th>
												</tr>
											</thead>

											<tbody>
												<?php

												$payments_male = 0;
												$unPayment_male = 0;
												while ($row = mysqli_fetch_array($result_male)) {
													$payments_male = $payments_male + $row['member_paid_up'];
													$unPayment_male = $unPayment_male + $row['member_remainder'];
												?>

													<tr>

														<td><?php echo $row['member_id'];; ?></td>
														<td>
															<a href="show_member.php?member_id=<?php
																								echo $row['member_id'];;
																								?>">
																<img class="vendor-thumb" src="assets/img/members/<?php echo $row['member_image']; ?>" alt="vendor image" />
															</a>
														</td>
														<td>
															<a href="show_member.php?member_id=<?php
																								echo $row['member_id'];;
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
																<a href="edit_member_new.php?member_id=<?php echo $row['member_id']; ?>" class="btn btn-outline-success">
																	Edit
																</a>
																<?php
																if ($_SESSION['admin_username'] == "admin") {
																?>
																	<a href="delete_member_new.php?member_id=<?php echo $row['member_id']; ?>" class="btn btn-outline-success">
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
										<div class="content">
											<!-- Top Statistics -->
											<div class="row boxes_report">
												<div class="col-xl-3 col-sm-6 p-b-15 lbl-card">
													<div class="card card-mini dash-card card-1">
														<div class="card-body">
															<h2 class="mb-1"><?php echo mysqli_num_rows($result_male) ?></h2>
															<p>Total Members</p>


															<span class="mdi mdi-currency-usd">
																<img src="assets/img/logo/logo.png" class="logo-in-profile" alt="">
															</span>
														</div>
													</div>
												</div>

												<div class="col-xl-3 col-sm-6 p-b-15 lbl-card">
													<div class="card card-mini dash-card card-3">
														<div class="card-body">
															<h2 class="mb-1"><?php echo $payments_male; ?> $</h2>
															<p>Payments</p>
															<span class="mdi mdi-currency-usd">
																<img src="assets/img/logo/logo.png" class="logo-in-profile" alt="">
															</span>
														</div>
													</div>
												</div>
												<div class="col-xl-3 col-sm-6 p-b-15 lbl-card">
													<div class="card card-mini dash-card card-4">
														<div class="card-body">
															<h2 class="mb-1"><?php echo $unPayment_male; ?> $</h2>
															<p>Unpaid sums</p>
															<span class="mdi mdi-currency-usd">
																<img src="assets/img/logo/logo.png" class="logo-in-profile" alt="">
															</span>

														</div>
													</div>
												</div>
											</div>


										</div>
										<!-- button for export  -->

										<button id="btnExport" onclick="fnExportToExcel('xlsx','myfirstsheet')" class="btn btn-outline-success">

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


									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- Add Vendor Modal  -->


				</div> <!-- End Content -->
			</div>
			<!-- End Content Wrapper -->


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
		if ($result_female) {
			if (mysqli_num_rows($result_female) > 0) {

				?>
					<!-- CONTENT WRAPPER -->
					<div class="ec-content-wrapper">
						<div class="content">
							<div class="breadcrumb-wrapper breadcrumb-contacts titel_admin">
								<div>
									<h1>Female Members</h1>

								</div>

							</div>


							<div class="row">
								<div class="col-12">
									<div class="ec-vendor-list card card-default">
										<div class="card-body">
											<div class="table-responsive">
												<table id="data-table" class="table">
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
															<th>The Captain</th>
															<th>Start</th>
															<th>End</th>
														</tr>
													</thead>

													<tbody>
														<?php
														$payments_female = 0;
														$unPayment_female = 0;
														foreach ($result_female as $row_female) {
															$payments_female  = $payments_female + $row_female['member_paid_up'];
															$unPayment_female = $unPayment_female + $row_female['member_remainder'];
														?>

															<tr>

																<td><?php echo $row_female['member_id_female']; ?></td>
																<td>
																	<a href="show_member.php?member_id=<?php
																										echo $row_female['member_id_female'];
																										?>">
																		<img class="vendor-thumb" src="assets/img/members/<?php echo $row_female['member_image']; ?>" alt="vendor image" />
																	</a>
																</td>
																<td>
																	<a href="show_member.php?member_id=<?php
																										echo $row_female['member_id_female'];
																										?>" class="a_member">
																		<?php echo $row_female['member_name']; ?>
																	</a>
																</td>
																<td><?php echo $row_female['member_subscription']; ?></td>
																<td><?php echo $row_female['member_phone']; ?></td>
																<td><?php echo $row_female['member_paid_up'] + $row_female['member_remainder']; ?></td>
																<td><?php echo $row_female['member_paid_up']; ?></td>
																<td><?php echo $row_female['member_remainder']; ?></td>
																<td><?php echo $row_female['member_name_captain']; ?></td>
																<td><?php echo $row_female['member_start']; ?></td>
																<td><?php echo $row_female['member_end'];  ?></td>
																<td class="action_trainer">
																	<div class="btn-group">
																		<a href="edit_member.php?member_id=<?php echo $row['member_id_female']; ?>" class="btn btn-outline-success">
																			Edit
																		</a>
																		<?php
																		if ($_SESSION['admin_username'] == "admin") {
																		?>
																			<a href="delete_member.php?member_id=<?php echo $row['member_id_female']; ?>" class="btn btn-outline-success">
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
												<div class="content">
													<!-- Top Statistics -->
													<div class="row boxes_report">
														<div class="col-xl-3 col-sm-6 p-b-15 lbl-card">
															<div class="card card-mini dash-card card-1">
																<div class="card-body">
																	<h2 class="mb-1"><?php echo mysqli_num_rows($result_female) ?></h2>
																	<p>Total Members</p>


																	<span class="mdi mdi-currency-usd">
																		<img src="assets/img/logo/logo.png" class="logo-in-profile" alt="">
																	</span>
																</div>
															</div>
														</div>

														<div class="col-xl-3 col-sm-6 p-b-15 lbl-card">
															<div class="card card-mini dash-card card-3">
																<div class="card-body">
																	<h2 class="mb-1"><?php echo $payments_female; ?> $</h2>
																	<p>Payments</p>
																	<span class="mdi mdi-currency-usd">
																		<img src="assets/img/logo/logo.png" class="logo-in-profile" alt="">
																	</span>
																</div>
															</div>
														</div>
														<div class="col-xl-3 col-sm-6 p-b-15 lbl-card">
															<div class="card card-mini dash-card card-4">
																<div class="card-body">
																	<h2 class="mb-1"><?php echo $unPayment_female; ?> $</h2>
																	<p>Unpaid sums</p>
																	<span class="mdi mdi-currency-usd">
																		<img src="assets/img/logo/logo.png" class="logo-in-profile" alt="">
																	</span>

																</div>
															</div>
														</div>
													</div>


												</div>
												<!-- button for export  -->
												<button id="btnExport" onclick="fnExportToExcel('xlsx','myfirstsheet')" class="btn btn-outline-success">

													Export To Excel

												</button>
												<script>
													function fnExportToExcel(fileExtension, fileName) {
														var elt = document.getElementById('data-table');
														var wb = XLSX.utils.table_to_book(elt, {
															sheet: "sheet1"
														});
														return XLSX.writeFile(wb, fileName + "." + fileExtension || ('MySheetName.' + (fileExtension || 'xlsx')));
													}
												</script>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!-- Add Vendor Modal  -->


						</div> <!-- End Content -->
					</div>
					<!-- End Content Wrapper -->


		<?php


			} else {
				outputmsg("info", "error 2");
			}
		} else {
			outputmsg("info", "error 1");
		}



		include_once("footer.php");
	} else {
		//  login please ? //

		include_once("sign-in.php");
	}
