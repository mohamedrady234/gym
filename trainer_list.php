<?php
session_start();
ob_start();
include_once("framework/framework.php");
include_once("framework/config.php");

if (isset($_SESSION['admin_login'])) {

	// logged  in // 
	include_once("header.php");


	$sql = "SELECT * FROM trainernotes";

	$result = mysqli_query($con, $sql);

	if ($result) {
		if (mysqli_num_rows($result) > 0) {

?>
			<!-- CONTENT WRAPPER -->
			<div class="ec-content-wrapper">
				<div class="content">
					<div class="breadcrumb-wrapper breadcrumb-contacts">
						<div>
							<h1>Trainer Notes</h1>

						</div>
						<div>

							<a href="add_trainer_notes.php" class="btn btn-primary link_data ">
								Add Trainer Notes
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
													<th>coach Name</th>
													<th>disc</th>
													<th>Withdrawn</th>
													<th>Day</th>

												</tr>
											</thead>

											<tbody>
												<?php
												while ($row = mysqli_fetch_array($result)) {
												?>

													<tr>

														<td><?php echo $row['id'];; ?></td>

														<td>

															<?php echo $row['service']; ?>

														</td>
														<td><?php echo $row['disc']; ?></td>
														<td><?php echo $row['paid_up']; ?></td>
														<td><?php echo $row['day']; ?></td>
														<td class="action_trainer">
															<div class="btn-group">
																<?php
																if ($_SESSION['admin_username'] == "admin") {
																?>
																	<a href="edit_member.php?id=<?php echo $row['id']; ?>" class="btn btn-outline-success">
																		Edit
																	</a>
																	<?php

																	?>
																	<a href="delete_member.php?id=<?php echo $row['id']; ?>" class="btn btn-outline-success">
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
			<button id="btnExport" onclick="fnExportToExcel('xlsx','trainer_notes')" class="btn btn-outline-success">

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
							<h1>Trainer Notes</h1>

						</div>
						<div>

							<a href="add_trainer_notes.php" class="btn btn-primary link_data ">
								Add Trainer Notes
							</a>

						</div>
					</div>

					<div class="output_edit">
						<p>Please Enter Trainer Notes From Here </p>

					</div>
					<div>

						<a href="add_trainer_notes.php" class="btn btn-primary link_data ">
							Add Trainer Notes
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
