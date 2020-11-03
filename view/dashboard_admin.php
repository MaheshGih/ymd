<?php 
$user_list = $objUserModel->GetRecentUsers();
$metrics = $objUserModel->GetAdminDashboardMetrics();
$cur_date = $objUtilModel->getCurDate($objUtilModel->date_format);
?>
<div class="content">
	<!-- Start Content-->
	<div class="container-fluid">
		<!-- start page update title -->
		<?php include '../include/referrence_link.php';?>
		<!-- end page update title -->



		<!-- start page title -->
		<!--  <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                                            <li class="breadcrumb-item active">Dashboard</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Dashboard</h4>
                                </div>
                            </div>
                        </div>-->
		<!-- end page title -->

		<div class="row">

			<div class="col-xl-4 col-sm-4">
			<a href="wallet.php">
				<div class="card-box widget-box-two widget-two-custom">
					<div class="media">
						<div
							class="avatar-lg rounded-circle bg-primary widget-two-icon align-self-center">
							<i class="mdi mdi-currency-inr avatar-title font-30 text-white"></i>
						</div>
						<div class="wigdet-two-content media-body">
							<p class="m-0 text-uppercase font-weight-medium text-truncate"
								title="Statistics">Wallet Balance</p>
							<h3 class="font-weight-medium my-2">
								&#8377 <span data-plugin="counterup"><?php echo $metrics['tot_amount']; ?></span>
							</h3>
							<p class="m-0">Till <?php echo $cur_date; ?></p>
						</div>
					</div>
				</div>
				</a>
			</div>
			<!-- end col -->

			<div class="col-xl-4 col-sm-4">
			<a href="all_users.php">
				<div class="card-box widget-box-two widget-two-custom ">
					<div class="media">
						<div
							class="avatar-lg rounded-circle bg-primary widget-two-icon align-self-center">
							<i
								class="mdi mdi-account-multiple avatar-title font-30 text-white"></i>
						</div>

						<div class="wigdet-two-content media-body">
							<p class="m-0 text-uppercase font-weight-medium text-truncate"
								title="Statistics">Total Users</p>
							<h3 class="font-weight-medium my-2">
							 <span data-plugin="counterup"><?php echo $metrics['users_cnt']; ?></span>
							</h3>
							<p class="m-0"><?php echo $cur_date;?></p>
						</div>
					</div>
				</div>
				</a>
			</div>
			<!-- end col -->

			<div class="col-xl-4 col-sm-4">
			<a href="all_transactions.php">
				<div class="card-box widget-box-two widget-two-custom ">
					<div class="media">
						<div
							class="avatar-lg rounded-circle bg-primary widget-two-icon align-self-center">
							<i class="mdi mdi-currency-gbp avatar-title font-30 text-white"></i>
						</div>

						<div class="wigdet-two-content media-body">
							<p class="m-0 text-uppercase font-weight-medium text-truncate"
								title="Statistics">Total Transactions</p>
							<h3 class="font-weight-medium my-2">
								<span data-plugin="counterup"><?php echo $metrics['txns_cnt']; ?></span>
							</h3>
							<p class="m-0"><?php echo $cur_date;?></p>
						</div>
					</div>
				</div>
				</a>
			</div>
			<!-- end col -->
		</div>
		<!-- end row -->

		<div class="row">

			<div class="col-xl-4 col-sm-4">
			<a href="news.php">
				<div class="card-box widget-box-two widget-two-custom">
					<div class="media">
						<div
							class="avatar-lg rounded-circle bg-primary widget-two-icon align-self-center">
							<i class=" far fa-newspaper avatar-title font-30 text-white"></i>
						</div>
						<div class="wigdet-two-content media-body">
							<p class="m-0 text-uppercase font-weight-medium text-truncate"
								title="Statistics">News</p>
							<h3 class="font-weight-medium my-2">
							 <span data-plugin="counterup"><?php echo $metrics['news_cnt']; ?></span>
							</h3>
							<p class="m-0">Till <?php echo $cur_date; ?></p>
						</div>
					</div>
				</div>
				</a>
			</div>
			<!-- end col -->

			<div class="col-xl-4 col-sm-4">
			<a href="employees.php">
			<div class="card-box widget-box-two widget-two-custom">
				<div class="media">
					<div
						class="avatar-lg rounded-circle bg-primary widget-two-icon align-self-center">
						<i
							class="mdi mdi-account-multiple avatar-title font-30 text-white"></i>
					</div>
					<div class="wigdet-two-content media-body">
						<p class="m-0 text-uppercase font-weight-medium text-truncate"
							title="Statistics">Our Employes</p>
						<h3 class="font-weight-medium my-2">
						1
							<!--&#8377 <span data-plugin="counterup"><?php echo $metrics['emp_cnt']; ?></span>-->
						</h3>
						<p class="m-0">Till <?php echo $cur_date; ?></p>
					</div>
				</div>
			</div>
			</a>
		</div>
		<!-- end col -->

		<div class="col-xl-4 col-sm-4">
			<a href="all_invitations.php">
				<div class="card-box widget-box-two widget-two-custom">
					<div class="media">
						<div
							class="avatar-lg rounded-circle bg-primary widget-two-icon align-self-center">
							<i class=" mdi mdi-contact-mail-outline avatar-title font-30 text-white"></i>
						</div>
						<div class="wigdet-two-content media-body">
							<p class="m-0 text-uppercase font-weight-medium text-truncate"
								title="Statistics">Invitations</p>
							<h3 class="font-weight-medium my-2">
    							<span data-plugin="counterup"><?php echo $metrics['invi_cnt']; ?></span>
							</h3>
							<p class="m-0">Till <?php echo $cur_date; ?></p>
						</div>
					</div>
				</div>
				</a>
			</div>
			<!-- end col -->
		</div>

		<div class="row">

			<div class="col-xl-4 col-sm-4">
			<a href="all_user_rewards.php">
				<div class="card-box widget-box-two widget-two-custom">
					<div class="media">
						<div
							class="avatar-lg rounded-circle bg-primary widget-two-icon align-self-center">
							<i class="fas fa-money-bill avatar-title font-30 text-white"></i>
						</div>
						<div class="wigdet-two-content media-body">
							<p class="m-0 text-uppercase font-weight-medium text-truncate"
								title="Statistics">Reward Users History</p>
							<h3 class="font-weight-medium my-2">
								<span data-plugin="counterup"><?php echo $metrics['rwd_cnt']; ?></span>
							</h3>
							<p class="m-0">Till <?php echo $cur_date; ?></p>
						</div>
					</div>
				</div>
				</a>
			</div>
			<!-- end col -->

			<div class="col-xl-4 col-sm-4">
			<a href="all_royalty_users.php">
				<div class="card-box widget-box-two widget-two-custom ">
					<div class="media">
						<div
							class="avatar-lg rounded-circle bg-primary widget-two-icon align-self-center">
							<i class=" fas fa-home avatar-title font-30 text-white"></i>
						</div>

						<div class="wigdet-two-content media-body">
							<p class="m-0 text-uppercase font-weight-medium text-truncate"
								title="Statistics">Housefull users History</p>
							<h3 class="font-weight-medium my-2">
								<span data-plugin="counterup"><?php echo $metrics['royalty_cnt']; ?></span>
							</h3>
							<p class="m-0"><?php echo $cur_date; ?></p>
						</div>
					</div>
				</div>
				</a>
			</div>
			<!-- end col -->

			<div class="col-xl-4 col-sm-4">
			<a href="all_royalty_users.php">
				<div class="card-box widget-box-two widget-two-custom ">
					<div class="media">
						<div
							class="avatar-lg rounded-circle bg-primary widget-two-icon align-self-center">
							<i class="mdi mdi-cowboy avatar-title font-30 text-white"></i>
						</div>

						<div class="wigdet-two-content media-body">
							<p class="m-0 text-uppercase font-weight-medium text-truncate"
								title="Statistics">Royality Users History</p>
							<h3 class="font-weight-medium my-2">
								<span data-plugin="counterup"><?php echo $metrics['royalty_cnt']; ?></span>
							</h3>
							<p class="m-0"><?php echo $cur_date;?></p>
						</div>
					</div>
				</div>
				</a>
			</div>
			<!-- end col -->
		</div>
		<!-- end row -->

		<div class="row">

			<div class="col-xl-4 col-sm-4">
			<a href="all_user_rewards.php">
				<div class="card-box widget-box-two widget-two-custom">
					<div class="media">
						<div
							class="avatar-lg rounded-circle bg-primary widget-two-icon align-self-center">
							<i class="mdi mdi-currency-inr avatar-title font-30 text-white"></i>
						</div>
						<div class="wigdet-two-content media-body">
							<p class="m-0 text-uppercase font-weight-medium text-truncate"
								title="Statistics">Autopool History</p>
							<h3 class="font-weight-medium my-2">
								<span data-plugin="counterup"><?php echo $metrics['tot_auto_pool']; ?></span>
							</h3>
							<p class="m-0">Till <?php echo $cur_date; ?></p>
						</div>
					</div>
				</div>
				</a>
			</div>
			<!-- end col -->

			<div class="col-xl-4 col-sm-4">
			<a href="all_invitations.php">
				<div class="card-box widget-box-two widget-two-custom ">
					<div class="media">
						<div
							class="avatar-lg rounded-circle bg-primary widget-two-icon align-self-center">
							<i class="fas fa-hands-helping avatar-title font-30 text-white"></i>
						</div>

						<div class="wigdet-two-content media-body">
							<p class="m-0 text-uppercase font-weight-medium text-truncate"
								title="Statistics">Get Help History</p>
							<h3 class="font-weight-medium my-2">
								<span data-plugin="counterup"><?php echo $metrics['tot_withdraws'] ?></span>
							</h3>
							<p class="m-0"><?php echo $cur_date;?></p>
						</div>
					</div>
				</div>
				</a>
			</div>
			<!-- end col -->

			<div class="col-xl-4 col-sm-4">
			<a href="all_invitations.php">
				<div class="card-box widget-box-two widget-two-custom ">
					<div class="media">
						<div
							class="avatar-lg rounded-circle bg-primary widget-two-icon align-self-center">
							<i class="fas fa-hands-helping avatar-title font-30 text-white"></i>
						</div>

						<div class="wigdet-two-content media-body">
							<p class="m-0 text-uppercase font-weight-medium text-truncate"
								title="Statistics">Provide Help History</p>
							<h3 class="font-weight-medium my-2">
								<span data-plugin="counterup"><?php echo $metrics['invi_cnt']; ?></span>
							</h3>
							<p class="m-0"><?php echo $cur_date;?></p>
						</div>
					</div>
				</div>
				</a>
			</div>
			<!-- end col -->
		</div>


		<div class="row">

			

			<div class="col-xl-4 col-sm-4">
			<a href="all_users.php">
				<div class="card-box widget-box-two widget-two-custom ">
					<div class="media">
						<div
							class="avatar-lg rounded-circle bg-primary widget-two-icon align-self-center">
							<i class="fas fa-user-check avatar-title font-30 text-white"></i>
						</div>

						<div class="wigdet-two-content media-body">
							<p class="m-0 text-uppercase font-weight-medium text-truncate"
								title="Statistics">Active Users</p>
							<h3 class="font-weight-medium my-2">
								<span data-plugin="counterup"><?php echo $metrics['active_cnt']; ?></span>
							</h3>
							<p class="m-0">Jan - Feb 2020</p>
						</div>
					</div>
				</div>
				</a>
			</div>
			<!-- end col -->
			
			<div class="col-xl-4 col-sm-4">
			<a href="all_users.php">
				<div class="card-box widget-box-two widget-two-custom ">
					<div class="media">
						<div
							class="avatar-lg rounded-circle bg-primary widget-two-icon align-self-center">
							<i class=" fas fa-user-slash avatar-title font-30 text-white"></i>
						</div>

						<div class="wigdet-two-content media-body">
							<p class="m-0 text-uppercase font-weight-medium text-truncate"
								title="Statistics">In Active Users</p>
							<h3 class="font-weight-medium my-2">
								<span data-plugin="counterup"><?php echo $metrics['inactive_cnt'] ?></span>
							</h3>
							<p class="m-0"><?php echo $cur_date;?></p>
						</div>
					</div>
				</div>
				</a>
			</div>
			<!-- end col -->

			<div class="col-xl-4 col-sm-4">
			<a href="all_users.php">
				<div class="card-box widget-box-two widget-two-custom ">
					<div class="media">
						<div
							class="avatar-lg rounded-circle bg-primary widget-two-icon align-self-center">
							<i class=" fas fa-user-times avatar-title font-30 text-white"></i>
						</div>

						<div class="wigdet-two-content media-body">
							<p class="m-0 text-uppercase font-weight-medium text-truncate"
								title="Statistics">Blocked Users</p>
							<h3 class="font-weight-medium my-2">
								<span data-plugin="counterup"><?php echo $metrics['blocked_cnt'] ?></span>
							</h3>
							<p class="m-0"><?php echo $cur_date;?></p>
						</div>
					</div>
				</div>
				</a>
			</div>
			<!-- end col -->
		</div>
		<!-- end row -->
	</div>

	<div class="row">
		<!--<div class="col-xl-6 col-lg-12">
			<div class="card-box">
				<h4 class="header-title">Recent Users</h4>
				<p class="sub-header">Recently joined user details here</p>

				<div class="table-responsive">
					<table class="table table-hover m-0 table-actions-bar">

						<thead>
							<tr>
								
								<th>Name</th>
								<th>Mobile</th>
								<th>Date of Joining</th>
							</tr>
						</thead>
						<tbody> <?php
                            while ($r = mysqli_fetch_assoc($user_list)) {
                                ?>
                            <tr>

								<td>
									<h5 class="m-0 font-weight-medium"><?php echo $r['full_name']; ?></h5>
								</td>

								<td><i class="fas fa-mobile-alt text-primary"></i> <?php echo $r['mobile']; ?>
                                                    </td>

								<td><i class="far fa-calendar-alt text-success"></i>  <?php echo $r['date_created']; ?>
                                                    </td>

							</tr>
							<?php
                            }
                            ?>
                       </tbody>
					</table>
				</div>
			</div>

		</div> -->
		<div class="col-12">
			<div class="card-box">
				<h4 class="header-title">Statistics</h4>
				<!-- <p class="sub-header">Recently joined user details here</p> -->
				<div class="text-center">
					<div id="website-stats1" style="height: 320px;" class="flot-chart mt-3"></div>
				</div>				
			</div>

		</div>

	</div>
	<!--- end row -->
</div>
<!-- end container-fluid -->
