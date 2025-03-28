<?php
session_start();
ob_start();
include_once("framework/framework.php");
include_once("framework/config.php");

if(isset($_SESSION['admin_login']))
{

	

	// logged  in // 
    include_once("header.php");

	
		$sql = "SELECT * FROM newmembers ORDER BY member_start" ; 

		$sql_female = "SELECT * FROM newmembers_female ORDER BY member_start" ; 
	

		$result        = mysqli_query($con , $sql);
		$result_female = mysqli_query($con , $sql_female);

		if($result)
		{	
				$payments = 0 ; 
				$unPayment = 0 ;
				
				while( $row_data = mysqli_fetch_array($result))
				{
					$payments = $payments + $row_data['member_paid_up'] ;
					$unPayment = $unPayment + $row_data['member_remainder'] ;
				}
				
					?>
					<!-- CONTENT WRAPPER -->
					<div class="ec-content-wrapper">
						
						<div class="content">
							<!-- Top Statistics -->
							<div class="row boxes_report">
								<div class="col-xl-3 col-sm-6 p-b-15 lbl-card">
									<div class="card card-mini dash-card card-1">
										<div class="card-body">
											<h2 class="mb-1"><?php echo mysqli_num_rows($result) ?></h2>
											<p>Total Members</p>

														
											<span class="mdi mdi-currency-usd">
												<img src="assets/img/logo/all_logo.png" class= "logo-in-profile" alt="">
											</span>
										</div>
									</div>
								</div>
								
								<div class="col-xl-3 col-sm-6 p-b-15 lbl-card">
									<div class="card card-mini dash-card card-3">
										<div class="card-body">
											<h2 class="mb-1"><?php echo $payments ; ?> $</h2>
											<p>Payments</p>
											<span class="mdi mdi-currency-usd">
												<img src="assets/img/logo/all_logo.png" class= "logo-in-profile" alt="">
											</span>
										</div>
									</div>
								</div>
								<div class="col-xl-3 col-sm-6 p-b-15 lbl-card">
									<div class="card card-mini dash-card card-4">
										<div class="card-body">
											<h2 class="mb-1"><?php echo $unPayment ; ?> $</h2>
											<p>Unpaid sums</p>
											<span class="mdi mdi-currency-usd">
												<img src="assets/img/logo/all_logo.png" class= "logo-in-profile" alt="">
											</span>
											
										</div>
									</div>
								</div>
							</div>
							

						</div> 
						<!-- End Content -->
					</div> <!-- End Content Wrapper -->
					<div class="ec-content-wrapper">

											<div class="content">
												<div
													class="breadcrumb-wrapper breadcrumb-wrapper-2 d-flex align-items-center justify-content-between">
													<h1>Annual Report For Male</h1>
													
													<div class="search_div">
                                                <div class="search-box">
                                                    <input type="text" placeholder=" " id="myInput"/>
                                                    <span></span>
                                                </div>
                                          </div>

                                    <!--  search with j quary -->
                                          <script>
                                            $(document).ready(function(){

                                                $("#myInput").on("keyup",function(){
                                                    var value =$(this).val().toLowerCase();
                                                    $(".myTable tr").filter(function(){
                                                        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                                                    });
                                                });
                                            });

                                            
                                        </script>

													
												</div>
							<?php
							
							
										

														?>
										
															<h1 class="h1_report">January report</h1>
															
													
															<div class="row">
																<div class="col-12">
																	<div class="card card-default">
																		<div class="card-body">
																			<div class="table-responsive">
																				<table  class="table" style="width:100%">
																				<thead>
																						<tr>
																							<th>Id</th>
																							<th>Name</th>
																							<th>Subscription</th>
																							<th>Total</th>
																							<th>Paid_up</th>
																							<th>Remainder</th>
																							<th>Date</th>
																						</tr>
																					</thead>

																					<tbody class="myTable">
																					<?php
																					// we find solve  to use data any time in this website
																							$total_member_1 = 0 ;
																							$total_paid_up_1 = 0 ;
																							$total_remainder_1 = 0 ;
																							
																							foreach($result as $row) 
																							{
																								
																								if(get_month($row['member_start']) ==  get_month(date("2023-01-1")))
																									{	
																										?>
																											<tr>
																												<td><?php if($_SESSION['admin_username'] == "Male" or $_SESSION['admin_username'] == "admin"){echo $row['member_id'];}else{echo $row['member_id_female'];} ; ?></td>
																												<td><?php echo $row['member_name'] ; ?></td>
																												<td><?php echo $row['member_subscription'] ;?></td> 
																												<td><?php echo $row['member_paid_up'] + $row['member_remainder'] ;?></td>
																												<td><?php echo $row['member_paid_up'] ;?></td>
																												<td><?php echo $row['member_remainder'] ; ?></td>
																												<td><?php echo $row['member_start'] ; ?></td>
																											</tr>
																										<?php
																										
																										$total_member_1 ++ ;
																										$total_paid_up_1 =  $total_paid_up_1 + $row['member_paid_up'] ;
																										$total_remainder_1 = $total_remainder_1 + $row['member_remainder'] ;
																									}
																							}
																							$total_1 = $total_paid_up_1 + $total_remainder_1 ;
																					?>
																					</tbody>
																				</table>
																				<?php
																				report_monthly($total_member_1 ,$total_1 ,$total_paid_up_1 ,$total_remainder_1 );
																				?>
																			
																			</div>
																		</div>
																	</div>
																</div>
															</div>
															</div>
															<!-- End Content -->
															</div> <!-- End Content Wrapper -->
															
														<?php
							?>
							<?php
										?>
										<div class="ec-content-wrapper">
										<div class="content">
											<h1 class="h1_report">February report</h1>
											<div class="row">
												<div class="col-12">
													<div class="card card-default">
														<div class="card-body">
															<div class="table-responsive">
																<table id="responsive-data-table" class="table" style="width:100%">
																<thead>
																		<tr>
																			<th>Id</th>
																			<th>Name</th>
																			<th>Subscription</th>
																			<th>Total</th>
																			<th>Paid_up</th>
																			<th>Remainder</th>
																			<th>Date</th>
																		</tr>
																	</thead>

																	<tbody class="myTable">
																	<?php
																	// we find solve  to use data any time in this website
																				$total_member_2 = 0 ;
																				$total_paid_up_2 = 0 ;
																				$total_remainder_2 = 0 ;
																			foreach($result as $row) 
																			{
																				if(get_month($row['member_start']) ==  get_month(date("2023-02-1")))
																					{	
																						?>
																							<tr>
																								<td><?php if($_SESSION['admin_username'] == "Male" or $_SESSION['admin_username'] == "admin"){echo $row['member_id'];}else{echo $row['member_id_female'];} ; ?></td>
																								<td><?php echo $row['member_name'] ; ?></td>
																								<td><?php echo $row['member_subscription'] ;?></td> 
																								<td><?php echo $row['member_paid_up'] + $row['member_remainder'] ;?></td>
																								<td><?php echo $row['member_paid_up'] ;?></td>
																								<td><?php echo $row['member_remainder'] ; ?></td>
																								<td><?php echo $row['member_start'] ; ?></td>
																							</tr>
																						<?php

																							$total_member_2 ++ ;
																							$total_paid_up_2 =  $total_paid_up_2 + $row['member_paid_up'] ;
																							$total_remainder_2 = $total_remainder_2 + $row['member_remainder'] ;
																					}
																			}
																			$total_2 = $total_paid_up_2 + $total_remainder_2 ;

																	?>
																	</tbody>
																</table>
																			<?php
																				report_monthly($total_member_2 ,$total_2 ,$total_paid_up_2 ,$total_remainder_2 );
																			?>
															</div>
														</div>
													</div>
												</div>
											</div>
											</div>
											<!-- End Content -->
											</div> <!-- End Content Wrapper -->
											
										<?php
							?>
							<?php
										?>
										<div class="ec-content-wrapper">
										<div class="content">
											<h1 class="h1_report">March report</h1>
											<div class="row">
												<div class="col-12">
													<div class="card card-default">
														<div class="card-body">
															<div class="table-responsive">
																<table id="responsive-data-table" class="table" style="width:100%">
																<thead>
																		<tr>
																			<th>Id</th>
																			<th>Name</th>
																			<th>Subscription</th>
																			<th>Total</th>
																			<th>Paid_up</th>
																			<th>Remainder</th>
																			<th>Date</th>
																		</tr>
																	</thead>
																	<tbody class="myTable">
																	<?php
																	// we find solve  to use data any time in this website
																	$total_member_3 = 0 ;
																	$total_paid_up_3 = 0 ;
																	$total_remainder_3 = 0 ;
																			foreach($result as $row) 
																			{
																				if(get_month($row['member_start']) ==  get_month(date("2023-03-1")))
																					{	
																						?>
																							<tr>
																								<td><?php if($_SESSION['admin_username'] == "Male" or $_SESSION['admin_username'] == "admin"){echo $row['member_id'];}else{echo $row['member_id_female'];} ; ?></td>
																								<td><?php echo $row['member_name'] ; ?></td>
																								<td><?php echo $row['member_subscription'] ;?></td> 
																								<td><?php echo $row['member_paid_up'] + $row['member_remainder'] ;?></td>
																								<td><?php echo $row['member_paid_up'] ;?></td>
																								<td><?php echo $row['member_remainder'] ; ?></td>
																								<td><?php echo $row['member_start'] ; ?></td>
																							</tr>
																						<?php
																						$total_member_3 ++ ;
																						$total_paid_up_3 =  $total_paid_up_3 + $row['member_paid_up'] ;
																						$total_remainder_3 = $total_remainder_3 + $row['member_remainder'] ;
																					}
																			}
																			$total_3 = $total_paid_up_3 + $total_remainder_3 ;
																	?>
																	</tbody>
																</table>
																<?php
																	report_monthly($total_member_3 ,$total_3 ,$total_paid_up_3 ,$total_remainder_3 );
																?>
															</div>
														</div>
													</div>
												</div>
											</div>
											</div>
											<!-- End Content -->
											</div> <!-- End Content Wrapper -->	
										<?php
							?>
							<?php
							

										?>
										<div class="ec-content-wrapper">

										<div class="content">
											<h1 class="h1_report">April report</h1>
											
									
											<div class="row">
												<div class="col-12">
													<div class="card card-default">
														<div class="card-body">
															<div class="table-responsive">
																<table id="responsive-data-table" class="table" style="width:100%">
																<thead>
																		<tr>
																			<th>Id</th>
																			<th>Name</th>
																			<th>Subscription</th>
																			<th>Total</th>
																			<th>Paid_up</th>
																			<th>Remainder</th>
																			<th>Date</th>
																		</tr>
																	</thead>

																	<tbody class="myTable">
																	<?php
																	// we find solve  to use data any time in this website
																	$total_member_4    = 0 ;
																	$total_paid_up_4   = 0 ;
																	$total_remainder_4 = 0 ;
																			foreach($result as $row) 
																			{
																				if(get_month($row['member_start']) ==  get_month(date("2023-04-1")))
																					{	
																						?>
																							<tr>
																								<td><?php if($_SESSION['admin_username'] == "Male" or $_SESSION['admin_username'] == "admin"){echo $row['member_id'];}else{echo $row['member_id_female'];} ; ?></td>
																								<td><?php echo $row['member_name'] ; ?></td>
																								<td><?php echo $row['member_subscription'] ;?></td> 
																								<td><?php echo $row['member_paid_up'] + $row['member_remainder'] ;?></td>
																								<td><?php echo $row['member_paid_up'] ;?></td>
																								<td><?php echo $row['member_remainder'] ; ?></td>
																								<td><?php echo $row['member_start'] ; ?></td>
																							</tr>
																						<?php
																						$total_member_4 ++ ;
																						$total_paid_up_4 =  $total_paid_up_4 + $row['member_paid_up'] ;
																						$total_remainder_4 = $total_remainder_4 + $row['member_remainder'] ;
																					}
																			}
																			$total_4 = $total_paid_up_4 + $total_remainder_4 ;

																	?>
																	</tbody>
																</table>
																<?php
																	report_monthly($total_member_4 ,$total_4 ,$total_paid_up_4 ,$total_remainder_4 );
																?>
															</div>
														</div>
													</div>
												</div>
											</div>
											</div>
											<!-- End Content -->
											</div> <!-- End Content Wrapper -->
											
										<?php

							
							?>
							<?php
							


										?>
										<div class="ec-content-wrapper">

										<div class="content">
											<h1 class="h1_report">May report</h1>
											
									
											<div class="row">
												<div class="col-12">
													<div class="card card-default">
														<div class="card-body">
															<div class="table-responsive">
																<table id="responsive-data-table" class="table" style="width:100%">
																<thead>
																		<tr>
																			<th>Id</th>
																			<th>Name</th>
																			<th>Subscription</th>
																			<th>Total</th>
																			<th>Paid_up</th>
																			<th>Remainder</th>
																			<th>Date</th>
																		</tr>
																	</thead>

																	<tbody class="myTable">
																	<?php
																	// we find solve  to use data any time in this website
																	$total_member_5    = 0 ;
																	$total_paid_up_5   = 0 ;
																	$total_remainder_5 = 0 ;
																			foreach($result as $row) 
																			{
																				if(get_month($row['member_start']) ==  get_month(date("2023-05-1")))
																					{	
																						?>
																							<tr>
																								<td><?php if($_SESSION['admin_username'] == "Male" or $_SESSION['admin_username'] == "admin"){echo $row['member_id'];}else{echo $row['member_id_female'];} ; ?></td>
																								<td><?php echo $row['member_name'] ; ?></td>
																								<td><?php echo $row['member_subscription'] ;?></td> 
																								<td><?php echo $row['member_paid_up'] + $row['member_remainder'] ;?></td>
																								<td><?php echo $row['member_paid_up'] ;?></td>
																								<td><?php echo $row['member_remainder'] ; ?></td>
																								<td><?php echo $row['member_start'] ; ?></td>
																							</tr>
																						<?php
																						$total_member_5 ++ ;
																						$total_paid_up_5 =  $total_paid_up_5 + $row['member_paid_up'] ;
																						$total_remainder_5 = $total_remainder_5 + $row['member_remainder'] ;
																					}
																			}
																			$total_5 = $total_paid_up_5 + $total_remainder_5 ;

																	?>
																	</tbody>
																</table>
																<?php
																	report_monthly($total_member_5 ,$total_5 ,$total_paid_up_5 ,$total_remainder_5 );
																?>
															</div>
														</div>
													</div>
												</div>
											</div>
											</div>
											<!-- End Content -->
											</div> <!-- End Content Wrapper -->
											
										<?php

							
							?>
							<?php
							


										?>
										<div class="ec-content-wrapper">

										<div class="content">
											<h1 class="h1_report">June report</h1>
											
									
											<div class="row">
												<div class="col-12">
													<div class="card card-default">
														<div class="card-body">
															<div class="table-responsive">
																<table id="responsive-data-table" class="table" style="width:100%">
																<thead>
																		<tr>
																			<th>Id</th>
																			<th>Name</th>
																			<th>Subscription</th>
																			<th>Total</th>
																			<th>Paid_up</th>
																			<th>Remainder</th>
																			<th>Date</th>
																		</tr>
																	</thead>

																	<tbody class="myTable">
																	<?php
																	// we find solve  to use data any time in this website
																	$total_member_6    = 0 ;
																	$total_paid_up_6   = 0 ;
																	$total_remainder_6 = 0 ;
																			foreach($result as $row) 
																			{
																				if(get_month($row['member_start']) ==  get_month(date("2023-06-1")))
																					{	
																						?>
																							<tr>
																								<td><?php if($_SESSION['admin_username'] == "Male" or $_SESSION['admin_username'] == "admin"){echo $row['member_id'];}else{echo $row['member_id_female'];} ; ?></td>
																								<td><?php echo $row['member_name'] ; ?></td>
																								<td><?php echo $row['member_subscription'] ;?></td> 
																								<td><?php echo $row['member_paid_up'] + $row['member_remainder'] ;?></td>
																								<td><?php echo $row['member_paid_up'] ;?></td>
																								<td><?php echo $row['member_remainder'] ; ?></td>
																								<td><?php echo $row['member_start'] ; ?></td>
																							</tr>
																						<?php
																						$total_member_6 ++ ;
																						$total_paid_up_6 =  $total_paid_up_6 + $row['member_paid_up'] ;
																						$total_remainder_6 = $total_remainder_6 + $row['member_remainder'] ;
																					}
																			}
																			$total_6 = $total_paid_up_6 + $total_remainder_6 ;

																	?>
																	</tbody>
																</table>
																<?php
																	report_monthly($total_member_6 ,$total_6 ,$total_paid_up_6 ,$total_remainder_6 );
																?>
															</div>
														</div>
													</div>
												</div>
											</div>
											</div>
											<!-- End Content -->
											</div> <!-- End Content Wrapper -->
											
										<?php

							
							?>
							<?php
							


										?>
										<div class="ec-content-wrapper">

										<div class="content">
											<h1 class="h1_report">July report</h1>
											
									
											<div class="row">
												<div class="col-12">
													<div class="card card-default">
														<div class="card-body">
															<div class="table-responsive">
																<table id="responsive-data-table" class="table" style="width:100%">
																<thead>
																		<tr>
																			<th>Id</th>
																			<th>Name</th>
																			<th>Subscription</th>
																			<th>Total</th>
																			<th>Paid_up</th>
																			<th>Remainder</th>
																			<th>Date</th>
																		</tr>
																	</thead>

																	<tbody class="myTable">
																	<?php
																	// we find solve  to use data any time in this website
																	$total_member_7    = 0 ;
																	$total_paid_up_7   = 0 ;
																	$total_remainder_7 = 0 ;
																			foreach($result as $row) 
																			{
																				if (get_month($row['member_start']) ==  get_month(date("2023-07-1")))
																					{	
																						?>
																							<tr>
																								<td><?php if($_SESSION['admin_username'] == "Male" or $_SESSION['admin_username'] == "admin"){echo $row['member_id'];}else{echo $row['member_id_female'];} ; ?></td>
																								<td><?php echo $row['member_name'] ; ?></td>
																								<td><?php echo $row['member_subscription'] ;?></td> 
																								<td><?php echo $row['member_paid_up'] + $row['member_remainder'] ;?></td>
																								<td><?php echo $row['member_paid_up'] ;?></td>
																								<td><?php echo $row['member_remainder'] ; ?></td>
																								<td><?php echo $row['member_start'] ; ?></td>
																							</tr>
																						<?php
																						$total_member_7 ++ ;
																						$total_paid_up_7 =  $total_paid_up_7 + $row['member_paid_up'] ;
																						$total_remainder_7 = $total_remainder_7 + $row['member_remainder'] ;
																					}
																			}
																			$total_7 = $total_paid_up_7 + $total_remainder_7 ;

																	?>
																	</tbody>
																</table>
																<?php
																	report_monthly($total_member_7 ,$total_7 ,$total_paid_up_7 ,$total_remainder_7 );
																?>
															</div>
														</div>
													</div>
												</div>
											</div>
											</div>
											<!-- End Content -->
											</div> <!-- End Content Wrapper -->
											
										<?php

							
							?>
							<?php
						


										?>
										<div class="ec-content-wrapper">

										<div class="content">
											<h1 class="h1_report">August report</h1>
											
									
											<div class="row">
												<div class="col-12">
													<div class="card card-default">
														<div class="card-body">
															<div class="table-responsive">
																<table id="responsive-data-table" class="table" style="width:100%">
																<thead>
																		<tr>
																			<th>Id</th>
																			<th>Name</th>
																			<th>Subscription</th>
																			<th>Total</th>
																			<th>Paid_up</th>
																			<th>Remainder</th>
																			<th>Date</th>
																		</tr>
																	</thead>

																	<tbody class="myTable">
																	<?php
																	// we find solve  to use data any time in this website
																	$total_member_8    = 0 ;
																	$total_paid_up_8   = 0 ;
																	$total_remainder_8 = 0 ;
																			foreach($result as $row) 
																			{
																				if(get_month($row['member_start']) ==  get_month(date("2023-08-1")))
																					{	
																						?>
																							<tr>
																								<td><?php if($_SESSION['admin_username'] == "Male" or $_SESSION['admin_username'] == "admin"){echo $row['member_id'];}else{echo $row['member_id_female'];} ; ?></td>
																								<td><?php echo $row['member_name'] ; ?></td>
																								<td><?php echo $row['member_subscription'] ;?></td> 
																								<td><?php echo $row['member_paid_up'] + $row['member_remainder'] ;?></td>
																								<td><?php echo $row['member_paid_up'] ;?></td>
																								<td><?php echo $row['member_remainder'] ; ?></td>
																								<td><?php echo $row['member_start'] ; ?></td>
																							</tr>
																						<?php
																						$total_member_8 ++ ;
																						$total_paid_up_8 =  $total_paid_up_8 + $row['member_paid_up'] ;
																						$total_remainder_8 = $total_remainder_8 + $row['member_remainder'] ;
																					}
																			}
																			$total_8 = $total_paid_up_8 + $total_remainder_8 ;

																	?>
																	</tbody>
																</table>
																<?php
																	report_monthly($total_member_8 ,$total_8 ,$total_paid_up_8 ,$total_remainder_8 );
																?>
															</div>
														</div>
													</div>
												</div>
											</div>
											</div>
											<!-- End Content -->
											</div> <!-- End Content Wrapper -->
											
										<?php

							
							?>
							<?php
						


										?>
										<div class="ec-content-wrapper">

										<div class="content">
											<h1 class="h1_report">September report</h1>
											
									
											<div class="row">
												<div class="col-12">
													<div class="card card-default">
														<div class="card-body">
															<div class="table-responsive">
																<table id="responsive-data-table" class="table" style="width:100%">
																<thead>
																		<tr>
																			<th>Id</th>
																			<th>Name</th>
																			<th>Subscription</th>
																			<th>Total</th>
																			<th>Paid_up</th>
																			<th>Remainder</th>
																			<th>Date</th>
																		</tr>
																	</thead>

																	<tbody class="myTable">
																	<?php
																	// we find solve  to use data any time in this website
																	$total_member_9    = 0 ;
																	$total_paid_up_9   = 0 ;
																	$total_remainder_9 = 0 ;
																			foreach($result as $row) 
																			{
																				if(get_month($row['member_start']) ==  get_month(date("2023-09-1")))
																					{	
																						?>
																							<tr>
																								<td><?php if($_SESSION['admin_username'] == "Male" or $_SESSION['admin_username'] == "admin"){echo $row['member_id'];}else{echo $row['member_id_female'];} ; ?></td>
																								<td><?php echo $row['member_name'] ; ?></td>
																								<td><?php echo $row['member_subscription'] ;?></td> 
																								<td><?php echo $row['member_paid_up'] + $row['member_remainder'] ;?></td>
																								<td><?php echo $row['member_paid_up'] ;?></td>
																								<td><?php echo $row['member_remainder'] ; ?></td>
																								<td><?php echo $row['member_start'] ; ?></td>
																							</tr>
																						<?php
																						$total_member_9 ++ ;
																						$total_paid_up_9 =  $total_paid_up_9 + $row['member_paid_up'] ;
																						$total_remainder_9 = $total_remainder_9 + $row['member_remainder'] ;
																					}
																			}
																			$total_9 = $total_paid_up_9 + $total_remainder_9 ;

																	?>
																	</tbody>
																</table>
																<?php
																	report_monthly($total_member_9 ,$total_9 ,$total_paid_up_9 ,$total_remainder_9 );
																?>
															</div>
														</div>
													</div>
												</div>
											</div>
											</div>
											<!-- End Content -->
											</div> <!-- End Content Wrapper -->
											
										<?php

							
							?>
							<?php
										?>
										<div class="ec-content-wrapper">

										<div class="content">
											<h1 class="h1_report">October report</h1>
											<div class="row">
												<div class="col-12">
													<div class="card card-default">
														<div class="card-body">
															<div class="table-responsive">
																<table id="responsive-data-table" class="table" style="width:100%">
																<thead>
																		<tr>
																			<th>Id</th>
																			<th>Name</th>
																			<th>Subscription</th>
																			<th>Total</th>
																			<th>Paid_up</th>
																			<th>Remainder</th>
																			<th>Date</th>
																		</tr>
																	</thead>

																	<tbody class="myTable">
																	<?php
																	// we find solve  to use data any time in this website
																	$total_member_10    = 0 ;
																	$total_paid_up_10   = 0 ;
																	$total_remainder_10 = 0 ;
																			foreach($result as $row) 
																			{
																				if(get_month($row['member_start']) ==  get_month(date("2023-10-1")))
																					{	
																						?>
																							<tr>
																								<td><?php if($_SESSION['admin_username'] == "Male" or $_SESSION['admin_username'] == "admin"){echo $row['member_id'];}else{echo $row['member_id_female'];} ; ?></td>
																								<td><?php echo $row['member_name'] ; ?></td>
																								<td><?php echo $row['member_subscription'] ;?></td> 
																								<td><?php echo $row['member_paid_up'] + $row['member_remainder'] ;?></td>
																								<td><?php echo $row['member_paid_up'] ;?></td>
																								<td><?php echo $row['member_remainder'] ; ?></td>
																								<td><?php echo $row['member_start'] ; ?></td>
																							</tr>
																						<?php
																						$total_member_10 ++ ;
																						$total_paid_up_10 =  $total_paid_up_10 + $row['member_paid_up'] ;
																						$total_remainder_10 = $total_remainder_10 + $row['member_remainder'] ;
																					}
																			}
																			$total_10 = $total_paid_up_10 + $total_remainder_10 ;

																	?>
																	</tbody>
																</table>
																<?php
																	report_monthly($total_member_10 ,$total_10 ,$total_paid_up_10 ,$total_remainder_10 );
																?>
															</div>
														</div>
													</div>
												</div>
											</div>
											</div>
											<!-- End Content -->
											</div> <!-- End Content Wrapper -->
											
										<?php

							?>
							<?php
										?>
										<div class="ec-content-wrapper">
										<div class="content">
											<h1 class="h1_report">November report</h1>
											<div class="row">
												<div class="col-12">
													<div class="card card-default">
														<div class="card-body">
															<div class="table-responsive">
																<table id="responsive-data-table" class="table" style="width:100%">
																<thead>
																		<tr>
																			<th>Id</th>
																			<th>Name</th>
																			<th>Subscription</th>
																			<th>Total</th>
																			<th>Paid_up</th>
																			<th>Remainder</th>
																			<th>Date</th>
																		</tr>
																	</thead>

																	<tbody class="myTable">
																	<?php
																	// we find solve  to use data any time in this website
																	$total_member_11    = 0 ;
																	$total_paid_up_11   = 0 ;
																	$total_remainder_11 = 0 ;
																			foreach($result as $row) 
																			{
																				if(get_month($row['member_start']) ==  get_month(date("2023-11-1")))
																					{	
																						?>
																							<tr>
																								<td><?php if($_SESSION['admin_username'] == "Male" or $_SESSION['admin_username'] == "admin"){echo $row['member_id'];}else{echo $row['member_id_female'];} ; ?></td>
																								<td><?php echo $row['member_name'] ; ?></td>
																								<td><?php echo $row['member_subscription'] ;?></td> 
																								<td><?php echo $row['member_paid_up'] + $row['member_remainder'] ;?></td>
																								<td><?php echo $row['member_paid_up'] ;?></td>
																								<td><?php echo $row['member_remainder'] ; ?></td>
																								<td><?php echo $row['member_start'] ; ?></td>
																							</tr>
																						<?php
																						$total_member_11 ++ ;
																						$total_paid_up_11 =  $total_paid_up_11 + $row['member_paid_up'] ;
																						$total_remainder_11 = $total_remainder_11 + $row['member_remainder'] ;
																					}
																			}
																			$total_11 = $total_paid_up_11 + $total_remainder_11 ;

																	?>
																	</tbody>
																</table>
																<?php
																	report_monthly($total_member_11 ,$total_11 ,$total_paid_up_11 ,$total_remainder_11 );
																?>
															</div>
														</div>
													</div>
												</div>
											</div>
											</div>
											<!-- End Content -->
											</div> <!-- End Content Wrapper -->
											
										<?php

							
							?>
							<?php
										?>
										<div class="ec-content-wrapper">
										<div class="content">
											<h1 class="h1_report">December report</h1>								
											<div class="row">
												<div class="col-12">
													<div class="card card-default">
														<div class="card-body">
															<div class="table-responsive">
																<table id="responsive-data-table" class="table" style="width:100%">
																<thead>
																		<tr>
																			<th>Id</th>
																			<th>Name</th>
																			<th>Subscription</th>
																			<th>Total</th>
																			<th>Paid_up</th>
																			<th>Remainder</th>
																			<th>Date</th>
																		</tr>
																	</thead>
																	<tbody class="myTable">
																	<?php
																	// we find solve  to use data any time in this website
																	$total_member_12    = 0 ;
																	$total_paid_up_12   = 0 ;
																	$total_remainder_12 = 0 ;
																			foreach($result as $row) 
																			{
																				if( get_month($row['member_start']) ==  get_month(date("2023-12-1")) )
																					{	
																						?>
																							<tr>
																								<td><?php if($_SESSION['admin_username'] == "Male" or $_SESSION['admin_username'] == "admin"){echo $row['member_id'];}else{echo $row['member_id_female'];} ; ?></td>
																								<td><?php echo $row['member_name'] ; ?></td>
																								<td><?php echo $row['member_subscription'] ;?></td> 
																								<td><?php echo $row['member_paid_up'] + $row['member_remainder'] ;?></td>
																								<td><?php echo $row['member_paid_up'] ;?></td>
																								<td><?php echo $row['member_remainder'] ; ?></td>
																								<td><?php echo $row['member_start'] ; ?></td>
																							</tr>
																						<?php
																						$total_member_12 ++ ;
																						$total_paid_up_12 =  $total_paid_up_12 + $row['member_paid_up'] ;
																						$total_remainder_12 = $total_remainder_12 + $row['member_remainder'] ;
																					}
																			}
																			$total_12 = $total_paid_up_12 + $total_remainder_12 ;
																	?>
																	</tbody>
																</table>
																<?php
																	report_monthly($total_member_12 ,$total_12 ,$total_paid_up_12 ,$total_remainder_12 );
																?>
																<h1>
																	
																</h1>
															</div>
														</div>
													</div>
												</div>
											</div>
											</div>
											<!-- End Content -->
											</div> <!-- End Content Wrapper -->
											
										<?php

							
							?>
						
						
			
					<?php

					
				

		}else
		{
		outputmsg("info" , "error 1");
		}

		if($result_female)
		{	
				$payments = 0 ; 
				$unPayment = 0 ;
				
				while( $row_data = mysqli_fetch_array($result_female))
				{
					$payments = $payments + $row_data['member_paid_up'] ;
					$unPayment = $unPayment + $row_data['member_remainder'] ;
				}
				
					?>
					<!-- CONTENT WRAPPER -->
					<div class="ec-content-wrapper">
						
						<div class="content">
							<!-- Top Statistics -->
							<div class="row boxes_report">
								<div class="col-xl-3 col-sm-6 p-b-15 lbl-card">
									<div class="card card-mini dash-card card-1">
										<div class="card-body">
											<h2 class="mb-1"><?php echo mysqli_num_rows($result_female) ?></h2>
											<p>Total Members</p>

														
											<span class="mdi mdi-currency-usd">
												<img src="assets/img/logo/logo.png" class= "logo-in-profile" alt="">
											</span>
										</div>
									</div>
								</div>
								
								<div class="col-xl-3 col-sm-6 p-b-15 lbl-card">
									<div class="card card-mini dash-card card-3">
										<div class="card-body">
											<h2 class="mb-1"><?php echo $payments ; ?> $</h2>
											<p>Payments</p>
											<span class="mdi mdi-currency-usd">
												<img src="assets/img/logo/logo.png" class= "logo-in-profile" alt="">
											</span>
										</div>
									</div>
								</div>
								<div class="col-xl-3 col-sm-6 p-b-15 lbl-card">
									<div class="card card-mini dash-card card-4">
										<div class="card-body">
											<h2 class="mb-1"><?php echo $unPayment ; ?> $</h2>
											<p>Unpaid sums</p>
											<span class="mdi mdi-currency-usd">
												<img src="assets/img/logo/logo.png" class= "logo-in-profile" alt="">
											</span>
											
										</div>
									</div>
								</div>
							</div>
							

						</div> 
						<!-- End Content -->
					</div> <!-- End Content Wrapper -->
					<div class="ec-content-wrapper">

											<div class="content">
												<div
													class="breadcrumb-wrapper breadcrumb-wrapper-2 d-flex align-items-center justify-content-between">
													<h1>Annual Report For Female</h1>
													
													<div class="search_div">
                                                <div class="search-box">
                                                    <input type="text" placeholder=" " id="myInput"/>
                                                    <span></span>
                                                </div>
                                          </div>

                                    <!--  search with j quary -->
                                          <script>
                                            $(document).ready(function(){

                                                $("#myInput").on("keyup",function(){
                                                    var value =$(this).val().toLowerCase();
                                                    $(".myTable tr").filter(function(){
                                                        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                                                    });
                                                });
                                            });

                                            
                                        </script>

													
												</div>
							<?php
							
							
										

														?>
										
															<h1 class="h1_report">January report</h1>
															
													
															<div class="row">
																<div class="col-12">
																	<div class="card card-default">
																		<div class="card-body">
																			<div class="table-responsive">
																				<table  class="table" style="width:100%">
																				<thead>
																						<tr>
																							<th>Id</th>
																							<th>Name</th>
																							<th>Subscription</th>
																							<th>Total</th>
																							<th>Paid_up</th>
																							<th>Remainder</th>
																							<th>Date</th>
																						</tr>
																					</thead>

																					<tbody class="myTable">
																					<?php
																					// we find solve  to use data any time in this website
																							$total_member_1 = 0 ;
																							$total_paid_up_1 = 0 ;
																							$total_remainder_1 = 0 ;
																							
																							foreach($result_female as $row) 
																							{
																								
																								if(get_month($row['member_start']) ==  get_month(date("2023-01-1")))
																									{	
																										?>
																											<tr>
																												<td><?php echo $row['member_id_female'] ; ?></td>
																												<td><?php echo $row['member_name'] ; ?></td>
																												<td><?php echo $row['member_subscription'] ;?></td> 
																												<td><?php echo $row['member_paid_up'] + $row['member_remainder'] ;?></td>
																												<td><?php echo $row['member_paid_up'] ;?></td>
																												<td><?php echo $row['member_remainder'] ; ?></td>
																												<td><?php echo $row['member_start'] ; ?></td>
																											</tr>
																										<?php
																										
																										$total_member_1 ++ ;
																										$total_paid_up_1 =  $total_paid_up_1 + $row['member_paid_up'] ;
																										$total_remainder_1 = $total_remainder_1 + $row['member_remainder'] ;
																									}
																							}
																							$total_1 = $total_paid_up_1 + $total_remainder_1 ;
																					?>
																					</tbody>
																				</table>
																				<?php
																				report_monthly($total_member_1 ,$total_1 ,$total_paid_up_1 ,$total_remainder_1 );
																				?>
																			
																			</div>
																		</div>
																	</div>
																</div>
															</div>
															</div>
															<!-- End Content -->
															</div> <!-- End Content Wrapper -->
															
														<?php
							?>
							<?php
										?>
										<div class="ec-content-wrapper">
										<div class="content">
											<h1 class="h1_report">February report</h1>
											<div class="row">
												<div class="col-12">
													<div class="card card-default">
														<div class="card-body">
															<div class="table-responsive">
																<table id="responsive-data-table" class="table" style="width:100%">
																<thead>
																		<tr>
																			<th>Id</th>
																			<th>Name</th>
																			<th>Subscription</th>
																			<th>Total</th>
																			<th>Paid_up</th>
																			<th>Remainder</th>
																			<th>Date</th>
																		</tr>
																	</thead>

																	<tbody class="myTable">
																	<?php
																	// we find solve  to use data any time in this website
																				$total_member_2 = 0 ;
																				$total_paid_up_2 = 0 ;
																				$total_remainder_2 = 0 ;
																			foreach($result_female as $row) 
																			{
																				if(get_month($row['member_start']) ==  get_month(date("2023-02-1")))
																					{	
																						?>
																							<tr>
																								<td><?php echo $row['member_id_female'] ; ?></td>
																								<td><?php echo $row['member_name'] ; ?></td>
																								<td><?php echo $row['member_subscription'] ;?></td> 
																								<td><?php echo $row['member_paid_up'] + $row['member_remainder'] ;?></td>
																								<td><?php echo $row['member_paid_up'] ;?></td>
																								<td><?php echo $row['member_remainder'] ; ?></td>
																								<td><?php echo $row['member_start'] ; ?></td>
																							</tr>
																						<?php

																							$total_member_2 ++ ;
																							$total_paid_up_2 =  $total_paid_up_2 + $row['member_paid_up'] ;
																							$total_remainder_2 = $total_remainder_2 + $row['member_remainder'] ;
																					}
																			}
																			$total_2 = $total_paid_up_2 + $total_remainder_2 ;

																	?>
																	</tbody>
																</table>
																			<?php
																				report_monthly($total_member_2 ,$total_2 ,$total_paid_up_2 ,$total_remainder_2 );
																			?>
															</div>
														</div>
													</div>
												</div>
											</div>
											</div>
											<!-- End Content -->
											</div> <!-- End Content Wrapper -->
											
										<?php
							?>
							<?php
										?>
										<div class="ec-content-wrapper">
										<div class="content">
											<h1 class="h1_report">March report</h1>
											<div class="row">
												<div class="col-12">
													<div class="card card-default">
														<div class="card-body">
															<div class="table-responsive">
																<table id="responsive-data-table" class="table" style="width:100%">
																<thead>
																		<tr>
																			<th>Id</th>
																			<th>Name</th>
																			<th>Subscription</th>
																			<th>Total</th>
																			<th>Paid_up</th>
																			<th>Remainder</th>
																			<th>Date</th>
																		</tr>
																	</thead>
																	<tbody class="myTable">
																	<?php
																	// we find solve  to use data any time in this website
																	$total_member_3 = 0 ;
																	$total_paid_up_3 = 0 ;
																	$total_remainder_3 = 0 ;
																			foreach($result_female as $row) 
																			{
																				if(get_month($row['member_start']) ==  get_month(date("2023-03-1")))
																					{	
																						?>
																							<tr>
																								<td><?php echo $row['member_id_female'] ; ?></td>
																								<td><?php echo $row['member_name'] ; ?></td>
																								<td><?php echo $row['member_subscription'] ;?></td> 
																								<td><?php echo $row['member_paid_up'] + $row['member_remainder'] ;?></td>
																								<td><?php echo $row['member_paid_up'] ;?></td>
																								<td><?php echo $row['member_remainder'] ; ?></td>
																								<td><?php echo $row['member_start'] ; ?></td>
																							</tr>
																						<?php
																						$total_member_3 ++ ;
																						$total_paid_up_3 =  $total_paid_up_3 + $row['member_paid_up'] ;
																						$total_remainder_3 = $total_remainder_3 + $row['member_remainder'] ;
																					}
																			}
																			$total_3 = $total_paid_up_3 + $total_remainder_3 ;
																	?>
																	</tbody>
																</table>
																<?php
																	report_monthly($total_member_3 ,$total_3 ,$total_paid_up_3 ,$total_remainder_3 );
																?>
															</div>
														</div>
													</div>
												</div>
											</div>
											</div>
											<!-- End Content -->
											</div> <!-- End Content Wrapper -->	
										<?php
							?>
							<?php
							

										?>
										<div class="ec-content-wrapper">

										<div class="content">
											<h1 class="h1_report">April report</h1>
											
									
											<div class="row">
												<div class="col-12">
													<div class="card card-default">
														<div class="card-body">
															<div class="table-responsive">
																<table id="responsive-data-table" class="table" style="width:100%">
																<thead>
																		<tr>
																			<th>Id</th>
																			<th>Name</th>
																			<th>Subscription</th>
																			<th>Total</th>
																			<th>Paid_up</th>
																			<th>Remainder</th>
																			<th>Date</th>
																		</tr>
																	</thead>

																	<tbody class="myTable">
																	<?php
																	// we find solve  to use data any time in this website
																	$total_member_4    = 0 ;
																	$total_paid_up_4   = 0 ;
																	$total_remainder_4 = 0 ;
																			foreach($result_female as $row) 
																			{
																				if(get_month($row['member_start']) ==  get_month(date("2023-04-1")))
																					{	
																						?>
																							<tr>
																								<td><?php echo $row['member_id_female'] ; ?></td>
																								<td><?php echo $row['member_name'] ; ?></td>
																								<td><?php echo $row['member_subscription'] ;?></td> 
																								<td><?php echo $row['member_paid_up'] + $row['member_remainder'] ;?></td>
																								<td><?php echo $row['member_paid_up'] ;?></td>
																								<td><?php echo $row['member_remainder'] ; ?></td>
																								<td><?php echo $row['member_start'] ; ?></td>
																							</tr>
																						<?php
																						$total_member_4 ++ ;
																						$total_paid_up_4 =  $total_paid_up_4 + $row['member_paid_up'] ;
																						$total_remainder_4 = $total_remainder_4 + $row['member_remainder'] ;
																					}
																			}
																			$total_4 = $total_paid_up_4 + $total_remainder_4 ;

																	?>
																	</tbody>
																</table>
																<?php
																	report_monthly($total_member_4 ,$total_4 ,$total_paid_up_4 ,$total_remainder_4 );
																?>
															</div>
														</div>
													</div>
												</div>
											</div>
											</div>
											<!-- End Content -->
											</div> <!-- End Content Wrapper -->
											
										<?php

							
							?>
							<?php
							


										?>
										<div class="ec-content-wrapper">

										<div class="content">
											<h1 class="h1_report">May report</h1>
											
									
											<div class="row">
												<div class="col-12">
													<div class="card card-default">
														<div class="card-body">
															<div class="table-responsive">
																<table id="responsive-data-table" class="table" style="width:100%">
																<thead>
																		<tr>
																			<th>Id</th>
																			<th>Name</th>
																			<th>Subscription</th>
																			<th>Total</th>
																			<th>Paid_up</th>
																			<th>Remainder</th>
																			<th>Date</th>
																		</tr>
																	</thead>

																	<tbody class="myTable">
																	<?php
																	// we find solve  to use data any time in this website
																	$total_member_5    = 0 ;
																	$total_paid_up_5   = 0 ;
																	$total_remainder_5 = 0 ;
																			foreach($result_female as $row) 
																			{
																				if(get_month($row['member_start']) ==  get_month(date("2023-05-1")))
																					{	
																						?>
																							<tr>
																								<td><?php echo $row['member_id_female'] ; ?></td>
																								<td><?php echo $row['member_name'] ; ?></td>
																								<td><?php echo $row['member_subscription'] ;?></td> 
																								<td><?php echo $row['member_paid_up'] + $row['member_remainder'] ;?></td>
																								<td><?php echo $row['member_paid_up'] ;?></td>
																								<td><?php echo $row['member_remainder'] ; ?></td>
																								<td><?php echo $row['member_start'] ; ?></td>
																							</tr>
																						<?php
																						$total_member_5 ++ ;
																						$total_paid_up_5 =  $total_paid_up_5 + $row['member_paid_up'] ;
																						$total_remainder_5 = $total_remainder_5 + $row['member_remainder'] ;
																					}
																			}
																			$total_5 = $total_paid_up_5 + $total_remainder_5 ;

																	?>
																	</tbody>
																</table>
																<?php
																	report_monthly($total_member_5 ,$total_5 ,$total_paid_up_5 ,$total_remainder_5 );
																?>
															</div>
														</div>
													</div>
												</div>
											</div>
											</div>
											<!-- End Content -->
											</div> <!-- End Content Wrapper -->
											
										<?php

							
							?>
							<?php
							


										?>
										<div class="ec-content-wrapper">

										<div class="content">
											<h1 class="h1_report">June report</h1>
											
									
											<div class="row">
												<div class="col-12">
													<div class="card card-default">
														<div class="card-body">
															<div class="table-responsive">
																<table id="responsive-data-table" class="table" style="width:100%">
																<thead>
																		<tr>
																			<th>Id</th>
																			<th>Name</th>
																			<th>Subscription</th>
																			<th>Total</th>
																			<th>Paid_up</th>
																			<th>Remainder</th>
																			<th>Date</th>
																		</tr>
																	</thead>

																	<tbody class="myTable">
																	<?php
																	// we find solve  to use data any time in this website
																	$total_member_6    = 0 ;
																	$total_paid_up_6   = 0 ;
																	$total_remainder_6 = 0 ;
																			foreach($result_female as $row) 
																			{
																				if(get_month($row['member_start']) ==  get_month(date("2023-06-1")))
																					{	
																						?>
																							<tr>
																								<td><?php echo $row['member_id_female'] ; ?></td>
																								<td><?php echo $row['member_name'] ; ?></td>
																								<td><?php echo $row['member_subscription'] ;?></td> 
																								<td><?php echo $row['member_paid_up'] + $row['member_remainder'] ;?></td>
																								<td><?php echo $row['member_paid_up'] ;?></td>
																								<td><?php echo $row['member_remainder'] ; ?></td>
																								<td><?php echo $row['member_start'] ; ?></td>
																							</tr>
																						<?php
																						$total_member_6 ++ ;
																						$total_paid_up_6 =  $total_paid_up_6 + $row['member_paid_up'] ;
																						$total_remainder_6 = $total_remainder_6 + $row['member_remainder'] ;
																					}
																			}
																			$total_6 = $total_paid_up_6 + $total_remainder_6 ;

																	?>
																	</tbody>
																</table>
																<?php
																	report_monthly($total_member_6 ,$total_6 ,$total_paid_up_6 ,$total_remainder_6 );
																?>
															</div>
														</div>
													</div>
												</div>
											</div>
											</div>
											<!-- End Content -->
											</div> <!-- End Content Wrapper -->
											
										<?php

							
							?>
							<?php
							


										?>
										<div class="ec-content-wrapper">

										<div class="content">
											<h1 class="h1_report">July report</h1>
											
									
											<div class="row">
												<div class="col-12">
													<div class="card card-default">
														<div class="card-body">
															<div class="table-responsive">
																<table id="responsive-data-table" class="table" style="width:100%">
																<thead>
																		<tr>
																			<th>Id</th>
																			<th>Name</th>
																			<th>Subscription</th>
																			<th>Total</th>
																			<th>Paid_up</th>
																			<th>Remainder</th>
																			<th>Date</th>
																		</tr>
																	</thead>

																	<tbody class="myTable">
																	<?php
																	// we find solve  to use data any time in this website
																	$total_member_7    = 0 ;
																	$total_paid_up_7   = 0 ;
																	$total_remainder_7 = 0 ;
																			foreach($result_female as $row) 
																			{
																				if (get_month($row['member_start']) ==  get_month(date("2023-07-1")))
																					{	
																						?>
																							<tr>
																								<td><?php echo $row['member_id_female'] ; ?></td>
																								<td><?php echo $row['member_name'] ; ?></td>
																								<td><?php echo $row['member_subscription'] ;?></td> 
																								<td><?php echo $row['member_paid_up'] + $row['member_remainder'] ;?></td>
																								<td><?php echo $row['member_paid_up'] ;?></td>
																								<td><?php echo $row['member_remainder'] ; ?></td>
																								<td><?php echo $row['member_start'] ; ?></td>
																							</tr>
																						<?php
																						$total_member_7 ++ ;
																						$total_paid_up_7 =  $total_paid_up_7 + $row['member_paid_up'] ;
																						$total_remainder_7 = $total_remainder_7 + $row['member_remainder'] ;
																					}
																			}
																			$total_7 = $total_paid_up_7 + $total_remainder_7 ;

																	?>
																	</tbody>
																</table>
																<?php
																	report_monthly($total_member_7 ,$total_7 ,$total_paid_up_7 ,$total_remainder_7 );
																?>
															</div>
														</div>
													</div>
												</div>
											</div>
											</div>
											<!-- End Content -->
											</div> <!-- End Content Wrapper -->
											
										<?php

							
							?>
							<?php
						


										?>
										<div class="ec-content-wrapper">

										<div class="content">
											<h1 class="h1_report">August report</h1>
											
									
											<div class="row">
												<div class="col-12">
													<div class="card card-default">
														<div class="card-body">
															<div class="table-responsive">
																<table id="responsive-data-table" class="table" style="width:100%">
																<thead>
																		<tr>
																			<th>Id</th>
																			<th>Name</th>
																			<th>Subscription</th>
																			<th>Total</th>
																			<th>Paid_up</th>
																			<th>Remainder</th>
																			<th>Date</th>
																		</tr>
																	</thead>

																	<tbody class="myTable">
																	<?php
																	// we find solve  to use data any time in this website
																	$total_member_8    = 0 ;
																	$total_paid_up_8   = 0 ;
																	$total_remainder_8 = 0 ;
																			foreach($result_female as $row) 
																			{
																				if(get_month($row['member_start']) ==  get_month(date("2023-08-1")))
																					{	
																						?>
																							<tr>
																								<td><?php echo $row['member_id_female'] ; ?></td>
																								<td><?php echo $row['member_name'] ; ?></td>
																								<td><?php echo $row['member_subscription'] ;?></td> 
																								<td><?php echo $row['member_paid_up'] + $row['member_remainder'] ;?></td>
																								<td><?php echo $row['member_paid_up'] ;?></td>
																								<td><?php echo $row['member_remainder'] ; ?></td>
																								<td><?php echo $row['member_start'] ; ?></td>
																							</tr>
																						<?php
																						$total_member_8 ++ ;
																						$total_paid_up_8 =  $total_paid_up_8 + $row['member_paid_up'] ;
																						$total_remainder_8 = $total_remainder_8 + $row['member_remainder'] ;
																					}
																			}
																			$total_8 = $total_paid_up_8 + $total_remainder_8 ;

																	?>
																	</tbody>
																</table>
																<?php
																	report_monthly($total_member_8 ,$total_8 ,$total_paid_up_8 ,$total_remainder_8 );
																?>
															</div>
														</div>
													</div>
												</div>
											</div>
											</div>
											<!-- End Content -->
											</div> <!-- End Content Wrapper -->
											
										<?php

							
							?>
							<?php
						


										?>
										<div class="ec-content-wrapper">

										<div class="content">
											<h1 class="h1_report">September report</h1>
											
									
											<div class="row">
												<div class="col-12">
													<div class="card card-default">
														<div class="card-body">
															<div class="table-responsive">
																<table id="responsive-data-table" class="table" style="width:100%">
																<thead>
																		<tr>
																			<th>Id</th>
																			<th>Name</th>
																			<th>Subscription</th>
																			<th>Total</th>
																			<th>Paid_up</th>
																			<th>Remainder</th>
																			<th>Date</th>
																		</tr>
																	</thead>

																	<tbody class="myTable">
																	<?php
																	// we find solve  to use data any time in this website
																	$total_member_9    = 0 ;
																	$total_paid_up_9   = 0 ;
																	$total_remainder_9 = 0 ;
																			foreach($result_female as $row) 
																			{
																				if(get_month($row['member_start']) ==  get_month(date("2023-09-1")))
																					{	
																						?>
																							<tr>
																								<td><?php echo $row['member_id_female'] ; ?></td>
																								<td><?php echo $row['member_name'] ; ?></td>
																								<td><?php echo $row['member_subscription'] ;?></td> 
																								<td><?php echo $row['member_paid_up'] + $row['member_remainder'] ;?></td>
																								<td><?php echo $row['member_paid_up'] ;?></td>
																								<td><?php echo $row['member_remainder'] ; ?></td>
																								<td><?php echo $row['member_start'] ; ?></td>
																							</tr>
																						<?php
																						$total_member_9 ++ ;
																						$total_paid_up_9 =  $total_paid_up_9 + $row['member_paid_up'] ;
																						$total_remainder_9 = $total_remainder_9 + $row['member_remainder'] ;
																					}
																			}
																			$total_9 = $total_paid_up_9 + $total_remainder_9 ;

																	?>
																	</tbody>
																</table>
																<?php
																	report_monthly($total_member_9 ,$total_9 ,$total_paid_up_9 ,$total_remainder_9 );
																?>
															</div>
														</div>
													</div>
												</div>
											</div>
											</div>
											<!-- End Content -->
											</div> <!-- End Content Wrapper -->
											
										<?php

							
							?>
							<?php
										?>
										<div class="ec-content-wrapper">

										<div class="content">
											<h1 class="h1_report">October report</h1>
											<div class="row">
												<div class="col-12">
													<div class="card card-default">
														<div class="card-body">
															<div class="table-responsive">
																<table id="responsive-data-table" class="table" style="width:100%">
																<thead>
																		<tr>
																			<th>Id</th>
																			<th>Name</th>
																			<th>Subscription</th>
																			<th>Total</th>
																			<th>Paid_up</th>
																			<th>Remainder</th>
																			<th>Date</th>
																		</tr>
																	</thead>

																	<tbody class="myTable">
																	<?php
																	// we find solve  to use data any time in this website
																	$total_member_10    = 0 ;
																	$total_paid_up_10   = 0 ;
																	$total_remainder_10 = 0 ;
																			foreach($result_female as $row) 
																			{
																				if(get_month($row['member_start']) ==  get_month(date("2023-10-1")))
																					{	
																						?>
																							<tr>
																								<td><?php echo $row['member_id_female'] ; ?></td>
																								<td><?php echo $row['member_name'] ; ?></td>
																								<td><?php echo $row['member_subscription'] ;?></td> 
																								<td><?php echo $row['member_paid_up'] + $row['member_remainder'] ;?></td>
																								<td><?php echo $row['member_paid_up'] ;?></td>
																								<td><?php echo $row['member_remainder'] ; ?></td>
																								<td><?php echo $row['member_start'] ; ?></td>
																							</tr>
																						<?php
																						$total_member_10 ++ ;
																						$total_paid_up_10 =  $total_paid_up_10 + $row['member_paid_up'] ;
																						$total_remainder_10 = $total_remainder_10 + $row['member_remainder'] ;
																					}
																			}
																			$total_10 = $total_paid_up_10 + $total_remainder_10 ;

																	?>
																	</tbody>
																</table>
																<?php
																	report_monthly($total_member_10 ,$total_10 ,$total_paid_up_10 ,$total_remainder_10 );
																?>
															</div>
														</div>
													</div>
												</div>
											</div>
											</div>
											<!-- End Content -->
											</div> <!-- End Content Wrapper -->
											
										<?php

							?>
							<?php
										?>
										<div class="ec-content-wrapper">
										<div class="content">
											<h1 class="h1_report">November report</h1>
											<div class="row">
												<div class="col-12">
													<div class="card card-default">
														<div class="card-body">
															<div class="table-responsive">
																<table id="responsive-data-table" class="table" style="width:100%">
																<thead>
																		<tr>
																			<th>Id</th>
																			<th>Name</th>
																			<th>Subscription</th>
																			<th>Total</th>
																			<th>Paid_up</th>
																			<th>Remainder</th>
																			<th>Date</th>
																		</tr>
																	</thead>

																	<tbody class="myTable">
																	<?php
																	// we find solve  to use data any time in this website
																	$total_member_11    = 0 ;
																	$total_paid_up_11   = 0 ;
																	$total_remainder_11 = 0 ;
																			foreach($result_female as $row) 
																			{
																				if(get_month($row['member_start']) ==  get_month(date("2023-11-1")))
																					{	
																						?>
																							<tr>
																								<td><?php echo $row['member_id_female'] ; ?></td>
																								<td><?php echo $row['member_name'] ; ?></td>
																								<td><?php echo $row['member_subscription'] ;?></td> 
																								<td><?php echo $row['member_paid_up'] + $row['member_remainder'] ;?></td>
																								<td><?php echo $row['member_paid_up'] ;?></td>
																								<td><?php echo $row['member_remainder'] ; ?></td>
																								<td><?php echo $row['member_start'] ; ?></td>
																							</tr>
																						<?php
																						$total_member_11 ++ ;
																						$total_paid_up_11 =  $total_paid_up_11 + $row['member_paid_up'] ;
																						$total_remainder_11 = $total_remainder_11 + $row['member_remainder'] ;
																					}
																			}
																			$total_11 = $total_paid_up_11 + $total_remainder_11 ;

																	?>
																	</tbody>
																</table>
																<?php
																	report_monthly($total_member_11 ,$total_11 ,$total_paid_up_11 ,$total_remainder_11 );
																?>
															</div>
														</div>
													</div>
												</div>
											</div>
											</div>
											<!-- End Content -->
											</div> <!-- End Content Wrapper -->
											
										<?php

							
							?>
							<?php
										?>
										<div class="ec-content-wrapper">
										<div class="content">
											<h1 class="h1_report">December report</h1>								
											<div class="row">
												<div class="col-12">
													<div class="card card-default">
														<div class="card-body">
															<div class="table-responsive">
																<table id="responsive-data-table" class="table" style="width:100%">
																<thead>
																		<tr>
																			<th>Id</th>
																			<th>Name</th>
																			<th>Subscription</th>
																			<th>Total</th>
																			<th>Paid_up</th>
																			<th>Remainder</th>
																			<th>Date</th>
																		</tr>
																	</thead>
																	<tbody class="myTable">
																	<?php
																	// we find solve  to use data any time in this website
																	$total_member_12    = 0 ;
																	$total_paid_up_12   = 0 ;
																	$total_remainder_12 = 0 ;
																			foreach($result_female as $row) 
																			{
																				if( get_month($row['member_start']) ==  get_month(date("2023-12-1")) )
																					{	
																						?>
																							<tr>
																								<td><?php echo $row['member_id_female'] ; ?></td>
																								<td><?php echo $row['member_name'] ; ?></td>
																								<td><?php echo $row['member_subscription'] ;?></td> 
																								<td><?php echo $row['member_paid_up'] + $row['member_remainder'] ;?></td>
																								<td><?php echo $row['member_paid_up'] ;?></td>
																								<td><?php echo $row['member_remainder'] ; ?></td>
																								<td><?php echo $row['member_start'] ; ?></td>
																							</tr>
																						<?php
																						$total_member_12 ++ ;
																						$total_paid_up_12 =  $total_paid_up_12 + $row['member_paid_up'] ;
																						$total_remainder_12 = $total_remainder_12 + $row['member_remainder'] ;
																					}
																			}
																			$total_12 = $total_paid_up_12 + $total_remainder_12 ;
																	?>
																	</tbody>
																</table>
																<?php
																	report_monthly($total_member_12 ,$total_12 ,$total_paid_up_12 ,$total_remainder_12 );
																?>
																<h1>
																	
																</h1>
															</div>
														</div>
													</div>
												</div>
											</div>
											</div>
											<!-- End Content -->
											</div> <!-- End Content Wrapper -->
											
										<?php

							
							?>
						
						
			
					<?php

					
				

		}else
		{
		outputmsg("info" , "error 1");
		}

		include_once("footer.php");


	}else
	{
	//  login please ? //

	include_once("sign-in.php");


	}

?>