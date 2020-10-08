<?php 
$wallet = $objWalletContactModel->GetWalletByUserId($_SESSION['userid']);
$tot_con =  $objUserModel->GetTotalDetails($_SESSION['userid']);
$tot_det = explode('-',$tot_con);
$user_list = $objUserModel->GetRecentUsers();
$tot_invitation = $objUserModel->GetTotalInvitations();
$tot_activ_users = $objUserModel->GetActiveUsersCount();
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
								&#8377 <span data-plugin="counterup"><?php echo $wallet['total_amount']; ?></span>
							</h3>
							<p class="m-0">Till <?php echo date('d-m-Y'); ?></p>
						</div>
					</div>
				</div>
				</a>
			</div>
			<!-- end col -->

			<div class="col-xl-4 col-sm-4">
			<a href="users.php">
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
							<?php
							$sql="SELECT * FROM `user_details`";

							if ($result=mysqli_query($con,$sql))
							  {
							  // Return the number of rows in result set
							  $rowcount=mysqli_num_rows($result);
							  echo $rowcount;
							  // Free result set
							  mysqli_free_result($result);
							  }
							?>
								<!--<span data-plugin="counterup"><?php echo $tot_det[1]; ?></span>-->
							</h3>
							<p class="m-0">Jan - Feb 2020</p>
						</div>
					</div>
				</div>
				</a>
			</div>
			<!-- end col -->

			<div class="col-xl-4 col-sm-4">
			<a href="wallet.php">
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
								<span data-plugin="counterup"><?php echo $tot_det[2]; ?></span>
							</h3>
							<p class="m-0">Jan - Feb 2020</p>
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
			<a href="#">
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
								&#8377 <span data-plugin="counterup"><?php echo $wallet['total_amount']; ?></span>
							</h3>
							<p class="m-0">Till <?php echo date('d-m-Y'); ?></p>
						</div>
					</div>
				</div>
				</a>
			</div>
			<!-- end col -->

			<div class="col-xl-4 col-sm-4">
			<a href="#">
				<div class="card-box widget-box-two widget-two-custom ">
					<div class="media">
						<div
							class="avatar-lg rounded-circle bg-primary widget-two-icon align-self-center">
							<i class="mdi mdi-currency-krw avatar-title font-30 text-white"></i>
						</div>

						<div class="wigdet-two-content media-body">
							<p class="m-0 text-uppercase font-weight-medium text-truncate"
								title="Statistics">Today My Indirect Income</p>
							<h3 class="font-weight-medium my-2">
								<span data-plugin="counterup"><?php echo $tot_det[1]; ?></span>
							</h3>
							<p class="m-0">Jan - Feb 2020</p>
						</div>
					</div>
				</div>
				</a>
			</div>
			<!-- end col -->


			<div class="col-xl-4 col-sm-4">
			<a href="referred_users.php">
				<div class="card-box widget-box-two widget-two-custom ">
					<div class="media">
						<div
							class="avatar-lg rounded-circle bg-primary widget-two-icon align-self-center">
							<i
								class="mdi mdi-account-multiple avatar-title font-30 text-white"></i>
						</div>

						<div class="wigdet-two-content media-body">
							<p class="m-0 text-uppercase font-weight-medium text-truncate"
								title="Statistics">My Direct Members</p>
							<h3 class="font-weight-medium my-2">
								<span data-plugin="counterup"><?php echo $tot_det[1]; ?></span>
							</h3>
							<p class="m-0">Jan - Feb 2020</p>
						</div>
					</div>
				</div>
				</a>
			</div>
			<!-- end col -->
		</div>

		<div class="row">

			<div class="col-xl-4 col-sm-4">
			<a href="reward_users.php">
				<div class="card-box widget-box-two widget-two-custom">
					<div class="media">
						<div
							class="avatar-lg rounded-circle bg-primary widget-two-icon align-self-center">
							<i class="mdi mdi-currency-try avatar-title font-30 text-white"></i>
						</div>
						<div class="wigdet-two-content media-body">
							<p class="m-0 text-uppercase font-weight-medium text-truncate"
								title="Statistics">Reward Users History</p>
							<h3 class="font-weight-medium my-2">
							<?php
							$sql="SELECT * FROM `user_rewards`";

							if ($result=mysqli_query($con,$sql))
							  {
							  // Return the number of rows in result set
							  $rowcount=mysqli_num_rows($result);
							  echo $rowcount;
							  // Free result set
							  mysqli_free_result($result);
							  }
							?>
							<!--	&#8377 <span data-plugin="counterup"><?php echo $wallet['total_amount']; ?></span>-->
							</h3>
							<p class="m-0">Till <?php echo date('d-m-Y'); ?></p>
						</div>
					</div>
				</div>
				</a>
			</div>
			<!-- end col -->

			<div class="col-xl-4 col-sm-4">
			<a href="housefull_users.php">
				<div class="card-box widget-box-two widget-two-custom ">
					<div class="media">
						<div
							class="avatar-lg rounded-circle bg-primary widget-two-icon align-self-center">
							<i class="mdi mdi-currency-rub avatar-title font-30 text-white"></i>
						</div>

						<div class="wigdet-two-content media-body">
							<p class="m-0 text-uppercase font-weight-medium text-truncate"
								title="Statistics">Housefull users History</p>
							<h3 class="font-weight-medium my-2">
								<span data-plugin="counterup"><?php echo $tot_det[1]; ?></span>
							</h3>
							<p class="m-0">Jan - Feb 2020</p>
						</div>
					</div>
				</div>
				</a>
			</div>
			<!-- end col -->

			<div class="col-xl-4 col-sm-4">
			<a href="royalty_users.php">
				<div class="card-box widget-box-two widget-two-custom ">
					<div class="media">
						<div
							class="avatar-lg rounded-circle bg-primary widget-two-icon align-self-center">
							<i class="mdi mdi-currency-btc avatar-title font-30 text-white"></i>
						</div>

						<div class="wigdet-two-content media-body">
							<p class="m-0 text-uppercase font-weight-medium text-truncate"
								title="Statistics">Royality Users History</p>
							<h3 class="font-weight-medium my-2">
							<?php
							$sql="SELECT * FROM `user_royalty`";

							if ($result=mysqli_query($con,$sql))
							  {
							  // Return the number of rows in result set
							  $rowcount=mysqli_num_rows($result);
							  echo $rowcount;
							  // Free result set
							  mysqli_free_result($result);
							  }
							?>
								<!--<span data-plugin="counterup"><?php echo $tot_det[2]; ?></span>-->
							</h3>
							<p class="m-0">Jan - Feb 2020</p>
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
			<a href="#">
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
								&#8377 <span data-plugin="counterup"><?php echo $wallet['total_amount']; ?></span>
							</h3>
							<p class="m-0">Till <?php echo date('d-m-Y'); ?></p>
						</div>
					</div>
				</div>
				</a>
			</div>
			<!-- end col -->

			<div class="col-xl-4 col-sm-4">
			<a href="#">
				<div class="card-box widget-box-two widget-two-custom ">
					<div class="media">
						<div
							class="avatar-lg rounded-circle bg-primary widget-two-icon align-self-center">
							<i class="mdi mdi-hand-right avatar-title font-30 text-white"></i>
						</div>

						<div class="wigdet-two-content media-body">
							<p class="m-0 text-uppercase font-weight-medium text-truncate"
								title="Statistics">Get Help History</p>
							<h3 class="font-weight-medium my-2">
								<!--<span data-plugin="counterup"><?php echo $tot_det[1]; ?></span>-->
								<?php
							$sql="SELECT * FROM `provide_helpers`";

								if ($result=mysqli_query($con,$sql))
								  {
								  // Return the number of rows in result set
								  $rowcount=mysqli_num_rows($result);
								  echo $rowcount;
								  // Free result set
								  mysqli_free_result($result);
								  }
								  ?>
							</h3>
							<p class="m-0">Jan - Feb 2020</p>
						</div>
					</div>
				</div>
				</a>
			</div>
			<!-- end col -->

			<div class="col-xl-4 col-sm-4">
			<a href="#">
				<div class="card-box widget-box-two widget-two-custom ">
					<div class="media">
						<div
							class="avatar-lg rounded-circle bg-primary widget-two-icon align-self-center">
							<i class="mdi mdi-hand-left avatar-title font-30 text-white"></i>
						</div>

						<div class="wigdet-two-content media-body">
							<p class="m-0 text-uppercase font-weight-medium text-truncate"
								title="Statistics">Provide Help History</p>
							<h3 class="font-weight-medium my-2">
								<!--<span data-plugin="counterup"><?php echo $tot_det[2]; ?></span>-->
								<?php
							$sql="SELECT * FROM `provide_helpers`";

								if ($result=mysqli_query($con,$sql))
								  {
								  // Return the number of rows in result set
								  $rowcount=mysqli_num_rows($result);
								  echo $rowcount;
								  // Free result set
								  mysqli_free_result($result);
								  }
								  ?>
							</h3>
							<p class="m-0">Jan - Feb 2020</p>
						</div>
					</div>
				</div>
				</a>
			</div>
			<!-- end col -->
		</div>


		<div class="row">

			<div class="col-xl-4 col-sm-4">
			<a href="invitation_master.php">
				<div class="card-box widget-box-two widget-two-custom">
					<div class="media">
						<div
							class="avatar-lg rounded-circle bg-primary widget-two-icon align-self-center">
							<i class="mdi mdi-currency-ils avatar-title font-30 text-white"></i>
						</div>
						<div class="wigdet-two-content media-body">
							<p class="m-0 text-uppercase font-weight-medium text-truncate"
								title="Statistics">Invetations</p>
							<h3 class="font-weight-medium my-2">
							<?php
							$sql="SELECT * FROM `invitations`";

								if ($result=mysqli_query($con,$sql))
								  {
								  // Return the number of rows in result set
								  $rowcount=mysqli_num_rows($result);
								  echo $rowcount;
								  // Free result set
								  mysqli_free_result($result);
								  }
								  ?>
								<!--&#8377 <span data-plugin="counterup"><?php echo $wallet['total_amount']; ?></span>-->
							</h3>
							<p class="m-0">Till <?php echo date('d-m-Y'); ?></p>
						</div>
					</div>
				</div>
				</a>
			</div>
			<!-- end col -->

			<div class="col-xl-4 col-sm-4">
			<a href="active_users.php">
				<div class="card-box widget-box-two widget-two-custom ">
					<div class="media">
						<div
							class="avatar-lg rounded-circle bg-primary widget-two-icon align-self-center">
							<i class="mdi mdi-currency-cny avatar-title font-30 text-white"></i>
						</div>

						<div class="wigdet-two-content media-body">
							<p class="m-0 text-uppercase font-weight-medium text-truncate"
								title="Statistics">Active Users</p>
							<h3 class="font-weight-medium my-2">
								<span data-plugin="counterup"><?php echo $tot_det[1]; ?></span>
							</h3>
							<p class="m-0">Jan - Feb 2020</p>
						</div>
					</div>
				</div>
				</a>
			</div>
			<!-- end col -->

			<div class="col-xl-4 col-sm-4">
			<a href="inactive_users.php">
				<div class="card-box widget-box-two widget-two-custom ">
					<div class="media">
						<div
							class="avatar-lg rounded-circle bg-primary widget-two-icon align-self-center">
							<i class="mdi mdi-currency-eur avatar-title font-30 text-white"></i>
						</div>

						<div class="wigdet-two-content media-body">
							<p class="m-0 text-uppercase font-weight-medium text-truncate"
								title="Statistics">Blocked Users</p>
							<h3 class="font-weight-medium my-2">
								<span data-plugin="counterup"><?php echo $tot_det[2]; ?></span>
							</h3>
							<p class="m-0">Jan - Feb 2020</p>
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

		<div class="col-xl-4 col-sm-4">
		<a href="employees.php">
			<div class="card-box widget-box-two widget-two-custom">
				<div class="media">
					<div
						class="avatar-lg rounded-circle bg-primary widget-two-icon align-self-center">
						<i class="mdi mdi-currency-inr avatar-title font-30 text-white"></i>
					</div>
					<div class="wigdet-two-content media-body">
						<p class="m-0 text-uppercase font-weight-medium text-truncate"
							title="Statistics">Our Employes</p>
						<h3 class="font-weight-medium my-2">
						1
							<!--&#8377 <span data-plugin="counterup"><?php echo $wallet['total_amount']; ?></span>-->
						</h3>
						<p class="m-0">Till <?php echo date('d-m-Y'); ?></p>
					</div>
				</div>
			</div>
			</a>
		</div>
		<!-- end col -->

		<div class="col-xl-4 col-sm-4">
		<a href="userdetails.php">
			<div class="card-box widget-box-two widget-two-custom ">
				<div class="media">
					<div
						class="avatar-lg rounded-circle bg-primary widget-two-icon align-self-center">
						<i class="mdi mdi-hand-right avatar-title font-30 text-white"></i>
					</div>

					<div class="wigdet-two-content media-body">
						<p class="m-0 text-uppercase font-weight-medium text-truncate"
							title="Statistics">User Full Deatils</p>
						<h3 class="font-weight-medium my-2">
							<span data-plugin="counterup"><?php echo $tot_det[1]; ?></span>
						</h3>
						<p class="m-0">Jan - Feb 2020</p>
					</div>
				</div>
			</div>
			</a>
		</div>
		<!-- end col -->

		<div class="col-xl-4 col-sm-4">
			<div class="card-box widget-box-two widget-two-custom ">
				<div class="media">
					<div
						class="avatar-lg rounded-circle bg-primary widget-two-icon align-self-center">
						<i class="mdi mdi-hand-left avatar-title font-30 text-white"></i>
					</div>

					<div class="wigdet-two-content media-body">
						<p class="m-0 text-uppercase font-weight-medium text-truncate"
							title="Statistics">Left Team</p>
						<h3 class="font-weight-medium my-2">
							<span data-plugin="counterup"><?php echo $tot_det[2]; ?></span>
						</h3>
						<p class="m-0">Jan - Feb 2020</p>
					</div>
				</div>
			</div>
		</div>
		<!-- end col -->
	</div>







	<div class="row">

		<div class="col-xl-8 col-sm-4">
			<div class="card-box widget-box-two widget-two-custom">
				<div class="media">
					<div
						class="avatar-lg rounded-circle bg-primary widget-two-icon align-self-center">
						<i class="mdi mdi-currency-ils avatar-title font-30 text-white"></i>
					</div>
					<div class="wigdet-two-content media-body">
						<p class="m-0 text-uppercase font-weight-medium text-truncate"
							title="Statistics">Fund Withdraws</p>
						<h3 class="font-weight-medium my-2">
							&#8377 <span data-plugin="counterup"><?php echo $wallet['total_amount']; ?></span>
						</h3>
						<p class="m-0">Till <?php echo date('d-m-Y'); ?></p>
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
						<i class="mdi mdi-currency-cny avatar-title font-30 text-white"></i>
					</div>

					<div class="wigdet-two-content media-body">
						<p class="m-0 text-uppercase font-weight-medium text-truncate"
							title="Statistics">YMD AutoPool Income</p>
						<h3 class="font-weight-medium my-2">
							<span data-plugin="counterup"><?php echo $tot_det[1]; ?></span>
						</h3>
						<p class="m-0">Jan - Feb 2020</p>
					</div>
				</div>
			</div>
		</div>
		<!-- end col -->


	</div>
	<!-- end row -->
	<!-- </div> -->

	<div class="row">
		<div class="col-xl-6 col-lg-12">
			<div class="card-box">
				<h4 class="header-title">Recent Users</h4>
				<p class="sub-header">Recently joined user details here</p>

				<div class="table-responsive">
					<table class="table table-hover m-0 table-actions-bar">

						<thead>
							<tr>
								<!--<th></th>-->
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

		</div>
		<!-- end col -->
		<div class="col-xl-6 col-lg-6">
			<div class="row">
				<div class="col-xl-12 col-lg-12">
					<div class="card-box widget-box-two widget-two-custom ">
						<div class="media">
							<div
								class="avatar-lg rounded-circle bg-info widget-two-icon align-self-center">
								<i class="mdi mdi-human-handsup avatar-title font-30 text-white"></i>
							</div>

							<div class="wigdet-two-content media-body">
								<p class="m-0 text-uppercase font-weight-medium text-truncate"
									title="Statistics">Total Active Visitors</p>
								<h3 class="font-weight-medium my-2">
									<span data-plugin="counterup"><?php echo $tot_activ_users; ?></span>
								</h3>
								<p class="m-0"><?php  echo "Till ".date('M-Y');  ?></p>
							</div>
						</div>
					</div>

				</div>
			</div>
			<div class="row">
				<div class="col-xl-12 col-lg-12">
					<div class="card-box widget-box-two widget-two-custom ">
						<div class="media">
							<div
								class="avatar-lg rounded-circle bg-info widget-two-icon align-self-center">
								<i class="mdi mdi-email avatar-title font-30 text-white"></i>
							</div>
							<div class="wigdet-two-content media-body">
								<p class="m-0 text-uppercase font-weight-medium text-truncate"
									title="Statistics">Total Invitations</p>
								<h3 class="font-weight-medium my-2">
									<span data-plugin="counterup"><?php echo $tot_invitation; ?></span>
								</h3>
								<p class="m-0"><?php echo "Till ".date('M-Y'); ?></p>
							</div>
						</div>
					</div>

				</div>
			</div>

		</div>

	</div>
	<!--- end row -->
</div>
<!-- end container-fluid -->