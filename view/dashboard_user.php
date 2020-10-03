<?php 
$metrics = $objUserModel->GetUserDashboardMetrics($_SESSION['userid']);
$cur_date = $objUtilModel->getCurDate($objUtilModel->date_format);
?>
<div class="content">

	<!-- Start Content-->
	<div class="container-fluid">
		<!-- start page update title -->
		<?php include '../include/referrence_link.php';?>
		<!-- end page update title -->
		<div class="row">
			<div class="col-xl-4 col-sm-4">
				<div class="card-box widget-box-two widget-two-custom">
					<div class="media">
						<div
							class="avatar-lg rounded-circle bg-primary widget-two-icon align-self-center">
							<i class="mdi mdi-currency-inr avatar-title font-30 text-white"></i>
						</div>
						<a href="wallet.php">
						<div class="wigdet-two-content media-body">
							<p class="m-0 text-uppercase font-weight-medium text-truncate"
								title="Statistics">Wallet Balance</p>
							<h3 class="font-weight-medium my-2">
								&#8377 <span data-plugin="counterup"><?php echo $metrics['tot_amount']; ?></span>
							</h3>
							<p class="m-0">Till <?php echo $cur_date ?></p>
						</div>
						</a>
					</div>
				</div>
			</div>
			<!-- end col -->

			<div class="col-xl-4 col-sm-4">
				<div class="card-box widget-box-two widget-two-custom ">
					<div class="media">
						<div
							class="avatar-lg rounded-circle bg-primary widget-two-icon align-self-center">
							<i
								class="mdi mdi-account-multiple avatar-title font-30 text-white"></i>
						</div>
						<a href="#">
						<div class="wigdet-two-content media-body">
							<p class="m-0 text-uppercase font-weight-medium text-truncate"
								title="Statistics">Total Users</p>
							<h3 class="font-weight-medium my-2">
								<span data-plugin="counterup"><?php echo $metrics['childCount']['cnt']; ?></span>
							</h3>
							<p class="m-0">Till <?php echo $cur_date ?></p>
						</div>
						</a>
					</div>
				</div>
			</div>
			<!-- end col -->

			<div class="col-xl-4 col-sm-4">
				<div class="card-box widget-box-two widget-two-custom ">
					<div class="media">
						<div
							class="avatar-lg rounded-circle bg-primary widget-two-icon align-self-center">
							<i class="mdi mdi-currency-gbp avatar-title font-30 text-white"></i>
						</div>
						<a href="wallet.php">
						<div class="wigdet-two-content media-body">
							<p class="m-0 text-uppercase font-weight-medium text-truncate"
								title="Statistics">Total Transactions</p>
							<h3 class="font-weight-medium my-2">
								<span data-plugin="counterup"><?php echo $metrics['tot_trans']; ?></span>
							</h3>
							<p class="m-0">Till <?php echo $cur_date ?></p>
						</div>
						</a>
					</div>
				</div>
			</div>
			<!-- end col -->
		</div>
		<!-- end row -->

		<div class="row">

			<div class="col-xl-4 col-sm-4">
				<div class="card-box widget-box-two widget-two-custom">
					<div class="media">
						<div
							class="avatar-lg rounded-circle bg-primary widget-two-icon align-self-center">
							<i class="mdi mdi-currency-usd avatar-title font-30 text-white"></i>
						</div>
						<div class="wigdet-two-content media-body">
							<p class="m-0 text-uppercase font-weight-medium text-truncate"
								title="Statistics">Today My Direct Income</p>
							<h3 class="font-weight-medium my-2">
								&#8377 <span data-plugin="counterup"><?php echo $metrics['todayMyRefIncome']; ?></span>
							</h3>
							
						</div>
					</div>
				</div>
			</div>
			<div class="col-xl-4 col-sm-4">
				<div class="card-box widget-box-two widget-two-custom">
					<div class="media">
						<div
							class="avatar-lg rounded-circle bg-primary widget-two-icon align-self-center">
							<i class="mdi mdi-currency-usd avatar-title font-30 text-white"></i>
						</div>
						<a href="#">
						<div class="wigdet-two-content media-body">
							<p class="m-0 text-uppercase font-weight-medium text-truncate"
								title="Statistics">My Direct Income</p>
							<h3 class="font-weight-medium my-2">
								&#8377 <span data-plugin="counterup"><?php echo $metrics['myRefIncome']; ?></span>
							</h3>
							
						</div>
						</a>
					</div>
				</div>
			</div>
			<!-- end col -->

			<div class="col-xl-4 col-sm-4">
				<div class="card-box widget-box-two widget-two-custom ">
					<div class="media">
						<div
							class="avatar-lg rounded-circle bg-primary widget-two-icon align-self-center">
							<i class="mdi mdi-currency-krw avatar-title font-30 text-white"></i>
						</div>
					<a href="wallet.php">
						<div class="wigdet-two-content media-body">
							<p class="m-0 text-uppercase font-weight-medium text-truncate"
								title="Statistics">My Spill Income</p>
							<h3 class="font-weight-medium my-2">
								<span data-plugin="counterup"><?php echo $metrics['myLVLIncome']; ?></span>
							</h3>
							
						</div>
					</a>
					</div>
				</div>
			</div>
			<!-- end col -->			
			<!-- end col -->
		</div>

		<div class="row">

			<div class="col-xl-4 col-sm-4">
				<div class="card-box widget-box-two widget-two-custom">
					<div class="media">
						<div
							class="avatar-lg rounded-circle bg-primary widget-two-icon align-self-center">
							<i class="mdi mdi-currency-try avatar-title font-30 text-white"></i>
						</div>
						<a href="wallet.php">
						<div class="wigdet-two-content media-body">
							<p class="m-0 text-uppercase font-weight-medium text-truncate"
								title="Statistics">My Royality Income</p>
							<h3 class="font-weight-medium my-2">
								&#8377 <span data-plugin="counterup"><?php echo $metrics['myRoyalIncome']; ?></span>
							</h3>
							<p class="m-0">Till <?php echo $cur_date ?></p>
						</div>
						</a>
					</div>
				</div>
			</div>
			<!-- end col -->

			<div class="col-xl-4 col-sm-4">
				<div class="card-box widget-box-two widget-two-custom ">
					<div class="media">
						<div
							class="avatar-lg rounded-circle bg-primary widget-two-icon align-self-center">
							<i class="mdi mdi-currency-rub avatar-title font-30 text-white"></i>
						</div>

						<div class="wigdet-two-content media-body">
							<p class="m-0 text-uppercase font-weight-medium text-truncate"
								title="Statistics">Pending Withdraw Income</p>
							<h3 class="font-weight-medium my-2">
								<span data-plugin="counterup"><?php echo $metrics['totPendingWithdrawAmnt']; ?></span>
							</h3>
							<p class="m-0">Till <?php echo $cur_date ?></p>
						</div>
					</div>
				</div>
			</div>
			<!-- end col -->

			<div class="col-xl-4 col-sm-4">
				<div class="card-box widget-box-two widget-two-custom ">
					<div class="media">
						<div
							class="avatar-lg rounded-circle bg-primary widget-two-icon align-self-center">
							<i class="mdi mdi-currency-btc avatar-title font-30 text-white"></i>
						</div>

						<div class="wigdet-two-content media-body">
							<p class="m-0 text-uppercase font-weight-medium text-truncate"
								title="Statistics">Total Withdraws</p>
							<h3 class="font-weight-medium my-2">
								<span data-plugin="counterup"><?php echo $metrics['totWithdrawnAmnt']; ?></span>
							</h3>
							<p class="m-0">Till <?php echo $cur_date ?></p>
						</div>
					</div>
				</div>
			</div>
			<!-- end col -->
		</div>
		<!-- end row -->

		<div class="row">

			<div class="col-xl-4 col-sm-4">
				<div class="card-box widget-box-two widget-two-custom">
					<div class="media">
						<div
							class="avatar-lg rounded-circle bg-primary widget-two-icon align-self-center">
							<i class="mdi mdi-currency-inr avatar-title font-30 text-white"></i>
						</div>
						<a href="rewards.php">
						<div class="wigdet-two-content media-body">
							<p class="m-0 text-uppercase font-weight-medium text-truncate"
								title="Statistics">YMD Matching Rewards Income</p>
							<h3 class="font-weight-medium my-2">
								&#8377 <span data-plugin="counterup"><?php echo $metrics['totRewardAmnt']; ?></span>
							</h3>
							<p class="m-0">Till <?php echo $cur_date ?></p>
						</div>
						</a>
					</div>
				</div>
			</div>
			<!-- end col -->
			<div class="col-xl-4 col-sm-4">
				<div class="card-box widget-box-two widget-two-custom ">
					<div class="media">
						<div
							class="avatar-lg rounded-circle bg-primary widget-two-icon align-self-center">
							<i class="mdi mdi-currency-cny avatar-title font-30 text-white"></i>
						</div>
						<a href="rewards.php">
						<div class="wigdet-two-content media-body">
							<p class="m-0 text-uppercase font-weight-medium text-truncate"
								title="Statistics">YMD AutoPool Income</p>
							<h3 class="font-weight-medium my-2">
								<span data-plugin="counterup"><?php echo $metrics['totAutopoolIncome']; ?></span>
							</h3>
							<p class="m-0">Till <?php echo $cur_date ?></p>
						</div>
						</a>
					</div>
				</div>
			</div>
			<!-- end col -->
			<div class="col-xl-4 col-sm-4">
				<div class="card-box widget-box-two widget-two-custom ">
					<div class="media">
						<div
							class="avatar-lg rounded-circle bg-primary widget-two-icon align-self-center">
							<i
								class="mdi mdi-account-multiple avatar-title font-30 text-white"></i>
						</div>
						<a href="referred_users.php">
						<div class="wigdet-two-content media-body">
							<p class="m-0 text-uppercase font-weight-medium text-truncate"
								title="Statistics">My Direct Members</p>
							<h3 class="font-weight-medium my-2">
								<span data-plugin="counterup"><?php echo $metrics['myReferralTot']; ?></span>
							</h3>
							<p class="m-0">Till <?php echo $cur_date ?></p>
						</div>
						</a>
					</div>
				</div>
			</div>
			
			<!-- end col -->
		</div>
		
			
		<div class="row">
			<div class="col-xl-4 col-sm-4">
				<div class="card-box widget-box-two widget-two-custom ">
					<div class="media">
						<div
							class="avatar-lg rounded-circle bg-primary widget-two-icon align-self-center">
							<i class="mdi mdi-hand-left avatar-title font-30 text-white"></i>
						</div>
						<a href="tree.php">
						<div class="wigdet-two-content media-body">
							<p class="m-0 text-uppercase font-weight-medium text-truncate"
								title="Statistics">Left Team</p>
							<h3 class="font-weight-medium my-2">
								<span data-plugin="counterup"><?php echo $metrics['childCount']['lsize']; ?></span>
							</h3>
							<p class="m-0">Till <?php echo $cur_date ?></p>
						</div>
						</a>
					</div>
				</div>
			</div>
			<!-- end col -->
			
			<div class="col-xl-4 col-sm-4">
				<div class="card-box widget-box-two widget-two-custom ">
					<div class="media">
						<div
							class="avatar-lg rounded-circle bg-primary widget-two-icon align-self-center">
							<i class="mdi mdi-hand-right avatar-title font-30 text-white"></i>
						</div>
						<a href="tree.php">
						<div class="wigdet-two-content media-body">
							<p class="m-0 text-uppercase font-weight-medium text-truncate"
								title="Statistics">Right Team</p>
							<h3 class="font-weight-medium my-2">
								<span data-plugin="counterup"><?php echo $metrics['childCount']['rsize']; ?></span>
							</h3>
							<p class="m-0">Till <?php echo $cur_date ?></p>
						</div>
						</a>
					</div>
				</div>
			</div>
			<!-- end col -->
			<div class="col-xl-4 col-sm-4">
				<div class="card-box widget-box-two widget-two-custom ">
					<div class="media">
						<div
							class="avatar-lg rounded-circle bg-primary widget-two-icon align-self-center">
							<i class="mdi mdi-currency-eur avatar-title font-30 text-white"></i>
						</div>

						<div class="wigdet-two-content media-body">
							<p class="m-0 text-uppercase font-weight-medium text-truncate"
								title="Statistics">UPDATE SOON</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- end row -->

		<div class="row">

			<div class="col-xl-4 col-sm-4">
				<div class="card-box widget-box-two widget-two-custom"
					style="background-color: #4d1f8c;">
					<div class="media">
						<div class="wigdet-two-content media-body">
							<p class="m-0 text-uppercase font-weight-medium text-truncate"
								title="Statistics" style="color: #f1e906">Present <?php echo $metrics['present_lvl']['level_name'];?></p>
							<h5 style="color: #FFFFFF" class="font-weight-medium my-2">
								Earned Amount: &#8377 <span data-plugin="counterup">
                                            <?php
                                            if ($metrics['present_lvl']['auto_pool_inr'] > 0) {
                                                $amnt_label = 'Reward ' . $metrics['present_lvl']['inr_value'] . ' Rs. + Auto Pool ' . $metrics['present_lvl']['auto_pool_inr'] . ' Rs.';
                                                echo $amnt_label;
                                            } else {
                                                echo $metrics['present_lvl']['inr_value'];
                                            }
                                            ?>                
                                            </span>
							</h5>
							<p style="color: #4bf505" class="m-0">Till <?php echo $cur_date; ?></p>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xl-8 col-sm-8">
				<div class="card-box widget-box-two widget-two-custom "
					style="background-color: #4d1f8c;">

					<div class="media">
						<div class="responsive">
							<p style="color: #f1e906">NEXT LEVEL: <?php echo $metrics['next_lvl']['level_name'];?></p>

						</div>
							<?php
                                $rsize = $metrics['childCount']['rsize'];
                                $lsize = $metrics['childCount']['lsize'];
                                $next_l = $metrics['next_lvl']['left_pairs'];
                                $next_r = $metrics['next_lvl']['right_pairs'];
                                $req_l = $next_l - $lsize;
                                $req_r = $next_r - $rsize;
                             ?>
                            <div class="wigdet-two-content media-body">
							<p style="color: #f1e906"
								class="m-0 text-uppercase font-weight-medium text-truncate"
								title="Statistics">Earn Rewords: <?php echo $metrics['next_lvl']['inr_value'];?> Rs. </p>
                                 <?php  if($metrics['present_lvl']['auto_pool_inr']>0){ ?>
                                 <h5 style="color: #ffffff" class="font-weight-medium my-2">
								Auto Pool Amount: &#8377 <span data-plugin="counterup"><?php echo $metrics['next_lvl']['auto_pool_inr']  ?></span>
								</h5>
                                            <?php
                                            }else{
                                                echo '<br/><br/>';
                                            }
                                            ?>
                              <p style="color: #4bf505" align="center" class="m-0">Required Persions :Left Side <?php echo $req_l?> & Right Side <?php echo $req_r?></p>
						
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end container-fluid -->

</div>
<!-- end content -->