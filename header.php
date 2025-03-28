<?php
ob_start();
include_once("framework/framework.php");
include_once("framework/config.php");
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">


<!-- Mirrored from maraviyainfotech.com/projects/ekka/ekka-v35/ekka-admin/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 14 Sep 2023 02:36:57 GMT -->

<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta name="description" content="Ekka - Admin Dashboard eCommerce HTML Template.">
	<meta name="viewport" content="width=device-width, initial-scale=1">


	<title>White Gym System</title>
	<!--=============== error page  ===============-->

	<!--  -->
	<link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>

	<link rel="stylesheet" href="assets/error/css/styles.css">

	<!-- GOOGLE FONTS -->
	<link rel="preconnect" href="https://fonts.googleapis.com/">
	<link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;300;400;500;600;700;800&amp;family=Poppins:wght@300;400;500;600;700;800;900&amp;family=Roboto:wght@400;500;700;900&amp;display=swap" rel="stylesheet">

	<link href="../../../../../cdn.jsdelivr.net/mdi/4.4.95/css/materialdesignicons.min.css" rel="stylesheet" />

	<!-- PLUGINS CSS STYLE -->
	<link href="assets/plugins/daterangepicker/daterangepicker.css" rel="stylesheet">
	<link href="assets/plugins/simplebar/simplebar.css" rel="stylesheet" />

	<!-- Ekka CSS -->
	<link id="ekka-css" href="assets/css/ekka.css" rel="stylesheet" />



	<!-- FAVICON -->
	<link href="assets/img/favicon.png" rel="shortcut icon" />
	<link rel="stylesheet" type="text/css" href="css/style.css">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
	<!-- jquery -->
	<script src="js/jquery.min.js"></script>
	<script type="text/javascript" src="https://unpkg.com/xlsx@0.15.1/dist/xlsx.full.min.js"></script>

	<!-- boot strap -->

</head>

<body class="ec-header-fixed ec-sidebar-fixed ec-sidebar-light ec-header-light" id="body">

	<!--  WRAPPER  -->
	<div class="wrapper">
		<!-- LEFT MAIN SIDEBAR -->
		<div class="ec-left-sidebar ec-bg-sidebar">
			<div id="sidebar" class="sidebar ec-sidebar-footer">
				<div class="ec-brand">
					<a href="index.php" title="White Gym">
						<img class="ec-brand-icon" src="assets/img/logo/logo.png" alt="" />
						<!-- Here we can write any thing big size -->
						<img src="assets/img/logo/logo_name.png" class="img_header" alt="">
						<!-- <span class="ec-brand-name text-truncate">
							White Gym
						</span> -->
					</a>
				</div>
				<!-- begin sidebar scrollbar -->
				<div class="ec-navigation" data-simplebar>
					<!-- sidebar menu -->
					<ul class="nav sidebar-inner" id="sidebar-menu">
						<!-- Users -->
						<li class="has-sub <?php if (get_page_name() == "index.php") {
												echo  "active";
											} ?>">
							<a class="sidenav-item-link" href="javascript:void(0)">
								<i class="mdi mdi-account-group"></i>
								<span class="nav-text">Users</span>
								<b class="caret"></b>

							</a>
							<div class="collapse">
								<ul class="sub-menu" id="users" data-parent="#sidebar-menu">
									<li class="">
										<a class="sidenav-item-link" href="index.php">
											<span class="nav-text">Users Profile</span>
										</a>
									</li>
								</ul>
							</div>
						</li>
						<!-- trainer -->
						<li class="has-sub <?php if (get_page_name() == "trainer-list.php" or get_page_name() == "add-trainer.php") {
												echo  "active";
											} ?>">
							<a class="sidenav-item-link" href="javascript:void(0)">
								<i class="mdi mdi-account-group-outline"></i>
								<span class="nav-text">Trainers</span>


								<b class="caret"></b>

							</a>
							<div class="collapse">
								<ul class="sub-menu" id="vendors" data-parent="#sidebar-menu">
									<li class="">
										<a class="sidenav-item-link" href="add-trainer.php">
											<span class="nav-text">Add Trainers</span>
										</a>
									</li>

									<li class="">
										<a class="sidenav-item-link" href="trainer-list.php">
											<span class="nav-text">Trainers List</span>
										</a>
									</li>
									<li class="">
										<a class="sidenav-item-link" href="add_trainer_notes.php">
											<span class="nav-text">Add Trainers Notes </span>
										</a>
									</li>
									<li class="">
										<a class="sidenav-item-link" href="trainer_list.php">
											<span class="nav-text">Trainers Notes </span>
										</a>
									</li>

								</ul>
							</div>
						</li>
						<!-- members -->
						<li class="has-sub <?php if (get_page_name() == "add-members.php" or get_page_name() == "new_member.php" or get_page_name() == "Remaining_funds.php" or get_page_name() == "sup_expire.php" or get_page_name() == "new_search.php") {
												echo  "active";
											} ?>">
							<a class="sidenav-item-link" href="javascript:void(0)">
								<i class="mdi mdi-palette-advanced"></i>
								<span class="nav-text">New Members</span>
								<b class="caret"></b>

							</a>
							<div class="collapse">
								<ul class="sub-menu" id="products" data-parent="#sidebar-menu">
									<li class="">
										<a class="sidenav-item-link" href="add-members.php">
											<span class="nav-text">Add Members</span>
										</a>
									</li>
									<li class="">
										<a class="sidenav-item-link" href="<?php if ($_SESSION['admin_username'] == "admin") {
																				echo "member_admin.php";
																			} else {
																				echo "new_member.php";
																			} ?>">
											<span class="nav-text">New Members List </span>
										</a>
									</li>


									<li class="">
										<a class="sidenav-item-link" href="Remaining_funds.php">
											<span class="nav-text">Remaining funds</span>
										</a>
									</li>
									<li class="">
										<a class="sidenav-item-link" href="sup_expire.php">
											<span class=" li_sub_expire">Subscriptions Expired</span>
										</a>
									</li>
									<li class="">
										<a class="sidenav-item-link" href="new_search.php">
											<span class=" li_sub_expire">Search</span>
										</a>
									</li>



								</ul>
							</div>

						</li>
						<li class="has-sub <?php if (get_page_name() == "member.php" or get_page_name() == "oldRemaining_funds.php" or get_page_name() == "oldsup_expire.php"  or get_page_name() == "search.php") {
												echo  "active";
											} ?>">
							<a class="sidenav-item-link" href="javascript:void(0)">
								<i class="mdi mdi-palette-advanced"></i>
								<span class="nav-text">Old Members</span>
								<b class="caret"></b>

							</a>
							<div class="collapse">
								<ul class="sub-menu" id="products" data-parent="#sidebar-menu">

									<li class="">
										<a class="sidenav-item-link" href="<?php if ($_SESSION['admin_username'] == "admin") {
																				echo "oldmember_admin.php";
																			} else {
																				echo "member.php";
																			} ?>">
											<span class="nav-text">Old Members List </span>
										</a>
									</li>
									<li class="">
										<a class="sidenav-item-link" href="oldRemaining_funds.php">
											<span class="nav-text">Remaining funds</span>
										</a>
									</li>
									<li class="">
										<a class="sidenav-item-link" href="oldsup_expire.php">
											<span class=" li_sub_expire">Subscriptions Expired</span>
										</a>
									</li>
									<li class="">
										<a class="sidenav-item-link" href="search.php">
											<span class=" li_sub_expire">Search</span>
										</a>
									</li>

								</ul>
							</div>

						</li>
						<li class="has-sub <?php if (get_page_name() == "add-output.php" or get_page_name() == "output.php") {
												echo  "active";
											} ?>">
							<a class="sidenav-item-link" href="javascript:void(0)">
								<i class="mdi mdi-palette-advanced"></i>
								<span class="nav-text">Gym outputs</span>
								<b class="caret"></b>

							</a>
							<div class="collapse">
								<ul class="sub-menu" id="products" data-parent="#sidebar-menu">
									<li class="">
										<a class="sidenav-item-link" href="add-output.php">
											<span class="nav-text">Add OutPut</span>
										</a>
									</li>
									<li class="">
										<a class="sidenav-item-link" href="<?php if ($_SESSION['admin_username'] == "admin") {
																				echo "member_admin.php";
																			} else {
																				echo "output.php";
																			} ?>">
											<span class="nav-text">OutPut List </span>
										</a>
									</li>


								</ul>
							</div>
						</li>
						<!-- report -->
						<?php
						if ($_SESSION['admin_username'] == "admin") {
						?>
							<li class="<?php if (get_page_name() == "report.php") {
											echo  "active";
										} ?>">
								<a class="sidenav-item-link" href="report.php">
									<i class="mdi mdi-star-half"></i>
									<span class="nav-text">Report</span>
								</a>
							</li>
						<?php
						}
						?>


						<!-- edit password -->
						<li class="<?php if (get_page_name() == "edit-password-for-admin.php") {
										echo  "active";
									} ?>">
							<a class="sidenav-item-link" href="edit-password-for-admin.php">
								<i class="mdi mdi-tag-faces"></i>
								<span class="nav-text">Edit password</span>
							</a>
							<hr>
						</li>
						<li class="<?php if (get_page_name() == "export.php") {
										echo  "active";
									} ?>">
							<a class="sidenav-item-link" href="export data base/export.php">
								<i class="mdi mdi-tag-faces"></i>
								<span class="nav-text">Export Database</span>
							</a>
							<hr>
						</li>

					</ul>
				</div>
			</div>
		</div>
		<!--  PAGE WRAPPER -->
		<div class="ec-page-wrapper">
			<!-- Header -->
			<header class="ec-main-header" id="header">
				<nav class="navbar navbar-static-top navbar-expand-lg">
					<!-- Sidebar toggle button -->
					<!--  we can use this id="sidebar-toggler" to togle button back  -->
					<button id="sidebar-toggler" class="sidebar-toggle">
						<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
							<path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z" />
						</svg>
					</button>
					<!-- search form -->

					<!-- navbar right -->
					<div class="navbar-right">
						<ul class="nav navbar-nav">
							<!-- User Account -->
							<a href="new_search.php	" class="search_link">
								<li>

									<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
										<path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
									</svg>

								</li>
							</a>

							<?php
							if ($_SESSION['admin_username'] == "Male" or $_SESSION['admin_username'] == "admin") {
								$sql = "SELECT * FROM newmembers ORDER BY member_end ";
							} else {
								$sql = "SELECT * FROM newmembers_female ORDER BY member_end";
							}

							$result = mysqli_query($con, $sql);

							if ($result) {
								if (mysqli_num_rows($result) > 0) {
							?>
									<li class="dropdown notifications-menu custom-dropdown ">


										<div class="card card-default dropdown-notify dropdown-menu-right mb-0">
											<div class="card-header card-header-border-bottom px-3">
												<h2>Notifications</h2>
											</div>

											<ul class="list-unstyled" data-simplebar style="height: 360px">


												<?php
												$num_noti = 0;
												while ($row = mysqli_fetch_array($result)) {
													if (strtotime($row['member_end']) ==  strtotime(date("y-m-d"))) {
												?>

														<li>
															<a href="sup_expire.php"
																class="media media-message media-notification ">

																<div class="icon rounded-circle mr-3 bg-primary img_noti">
																	<img class="vendor-thumb img_noti" src="assets/img/members/<?php echo $row['member_image']; ?>" alt="vendor image" />
																</div>

																<div class="media-body d-flex justify-content-between">
																	<div class="message-contents">
																		<h4 class="title"><?php echo $row['member_name']; ?></h4>
																		<p class="last-msg font-size-14"> <?php echo $row['member_end']; ?></p>

																		<span
																			class="font-size-12 font-weight-medium text-secondary">
																			<i class="mdi mdi-clock-outline"></i> Subscription has expired
																		</span>
																	</div>
																</div>
															</a>
														</li>

												<?php
														$num_noti = $num_noti + 1;
													}
												}

												?>
											</ul>

										</div>

										<button class=" notify-toggler search_link ">
											<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-bell" viewBox="0 0 16 16">
												<path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zM8 1.918l-.797.161A4.002 4.002 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4.002 4.002 0 0 0-3.203-3.92L8 1.917zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5.002 5.002 0 0 1 13 6c0 .88.32 4.2 1.22 6z" />
											</svg>
											<span class="icon-button__badge"><?php echo $num_noti; ?></span>
										</button>

									</li>
							<?php
								} else {
									outputmsg("info", "error 2");
								}
							} else {
								outputmsg("info", "error 1");
							}
							?>

							<li class="dropdown user-menu search_link">
								<button class="dropdown-toggle nav-link ec-drop" data-bs-toggle="dropdown"
									aria-expanded="false">


									<img src="<?php if ($_SESSION['admin_username'] == "Male" or $_SESSION['admin_username'] == "admin") {
													echo "assets/img/user/u1.jpg ";
												} else {
													echo "assets/img/user/u2.jpg";
												} ?>" class="user-image" alt="User Image" />
								</button>
								<ul class="dropdown-menu dropdown-menu-right ec-dropdown-menu">
									<!-- User image -->
									<li class="dropdown-header">
										<img src="<?php if ($_SESSION['admin_username'] == "Male" or $_SESSION['admin_username'] == "admin") {
														echo "assets/img/user/u1.jpg";
													} else {
														echo "assets/img/user/u2.jpg";
													} ?>" class="img-circle" alt="User Image" />
										<div class="d-inline-block">
											<?php echo $_SESSION['admin_username']; ?>
											<small class="pt-1">
												<?php echo $_SESSION['admin_email']; ?>
											</small>
										</div>
									</li>

									<!-- <?php
											//if( $_SESSION['admin_username'] == "admin")
											{
											?>
												<li class="dropdown-footer">
													<a href="setting.php">
													<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-gear" viewBox="0 0 16 16">
														<path d="M8 4.754a3.246 3.246 0 1 0 0 6.492 3.246 3.246 0 0 0 0-6.492zM5.754 8a2.246 2.246 0 1 1 4.492 0 2.246 2.246 0 0 1-4.492 0z"/>
														<path d="M9.796 1.343c-.527-1.79-3.065-1.79-3.592 0l-.094.319a.873.873 0 0 1-1.255.52l-.292-.16c-1.64-.892-3.433.902-2.54 2.541l.159.292a.873.873 0 0 1-.52 1.255l-.319.094c-1.79.527-1.79 3.065 0 3.592l.319.094a.873.873 0 0 1 .52 1.255l-.16.292c-.892 1.64.901 3.434 2.541 2.54l.292-.159a.873.873 0 0 1 1.255.52l.094.319c.527 1.79 3.065 1.79 3.592 0l.094-.319a.873.873 0 0 1 1.255-.52l.292.16c1.64.893 3.434-.902 2.54-2.541l-.159-.292a.873.873 0 0 1 .52-1.255l.319-.094c1.79-.527 1.79-3.065 0-3.592l-.319-.094a.873.873 0 0 1-.52-1.255l.16-.292c.893-1.64-.902-3.433-2.541-2.54l-.292.159a.873.873 0 0 1-1.255-.52l-.094-.319zm-2.633.283c.246-.835 1.428-.835 1.674 0l.094.319a1.873 1.873 0 0 0 2.693 1.115l.291-.16c.764-.415 1.6.42 1.184 1.185l-.159.292a1.873 1.873 0 0 0 1.116 2.692l.318.094c.835.246.835 1.428 0 1.674l-.319.094a1.873 1.873 0 0 0-1.115 2.693l.16.291c.415.764-.42 1.6-1.185 1.184l-.291-.159a1.873 1.873 0 0 0-2.693 1.116l-.094.318c-.246.835-1.428.835-1.674 0l-.094-.319a1.873 1.873 0 0 0-2.692-1.115l-.292.16c-.764.415-1.6-.42-1.184-1.185l.159-.291A1.873 1.873 0 0 0 1.945 8.93l-.319-.094c-.835-.246-.835-1.428 0-1.674l.319-.094A1.873 1.873 0 0 0 3.06 4.377l-.16-.292c-.415-.764.42-1.6 1.185-1.184l.292.159a1.873 1.873 0 0 0 2.692-1.115l.094-.319z"/>
													</svg>
														Setting
													</a>
												</li>
											<?php
											}
											?> -->
									<li class="dropdown-footer">
										<a href="log-out.php">
											<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
												<path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z" />
												<path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z" />
											</svg>

											Log Out
										</a>
									</li>
								</ul>
							</li>


						</ul>
					</div>
				</nav>
			</header>