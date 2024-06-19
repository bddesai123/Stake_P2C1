<?php
$userid = $this->session->userdata('user_id');

$profile = $this->session->userdata("profile");

$kyc_details = $this->conn->runQuery('*', "user_accounts", "status='1' and u_code='$userid'");
?>
<!doctype html>
<html lang="en">


<!-- Mirrored from codervent.com/mons/dashtreme/demo/vertical/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 31 May 2023 10:54:32 GMT -->

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--favicon-->
	<link rel="icon" href="<?= $this->conn->company_info('logo'); ?>" type="image/png" />
	<!--plugins-->
	<link href="<?= $panel_url; ?>assets/plugins/vectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet" />
	<link href="<?= $panel_url; ?>assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
	<link href="<?= $panel_url; ?>assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
	<link href="<?= $panel_url; ?>assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
	<!-- loader-->
	<link href="<?= $panel_url; ?>assets/css/pace.min.css" rel="stylesheet" />
	<script src="<?= $panel_url; ?>assets/js/pace.min.js"></script>
	<!-- Bootstrap CSS -->
	<link href="<?= $panel_url; ?>assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&amp;display=swap" rel="stylesheet">
	<link href="<?= $panel_url; ?>assets/css/app.css" rel="stylesheet">
	<link href="<?= $panel_url; ?>assets/css/icons.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
	<title><?= $this->conn->company_info('company_name'); ?></title>
</head>

<body class="bg-theme bg-theme2">
	<!--wrapper-->
	<div class="wrapper">
		<!--sidebar wrapper -->
		<div class="sidebar-wrapper" data-simplebar="true">
			<div class="sidebar-header">
				<div>
					<img src="<?= $this->conn->company_info('logo'); ?>" class="logo-icon" alt="logo icon">
				</div>
				<div>
					<h4 class="logo-text"><?= $this->conn->company_info('company_name'); ?></h4>
				</div>
				<div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
				</div>
			</div>
			<!--navigation-->
			<ul class="metismenu" id="menu">
				<li>
					<a href="<?= $panel_path . 'dashboard'; ?>">
						<div class="parent-icon"><i class='bx bx-cookie'></i>
						</div>
						<div class="menu-title">Dashboard</div>
					</a>
				</li>

				<?php
				if ($this->conn->plan_setting('profile_section') == 1) {
				?>
					<li>
						<a href="javascript:;" class="has-arrow">
							<div class="parent-icon"><i class="bx bx-category"></i>
							</div>
							<div class="menu-title">My Account</div>
						</a>
						<ul>

							<?php
							if ($this->conn->plan_setting('profile_page') == 1) {
							?>
								<li> <a href="<?= $panel_path . 'profile'; ?>"><i class="bx bx-right-arrow-alt"></i>Profile</a>
								</li>
							<?php
							}
							if ($this->conn->plan_setting('profile_page') == 1) {
							?>
								<li> <a href="<?= $panel_path . 'profile/edit-profile'; ?>"><i class="bx bx-right-arrow-alt"></i>Edit Profile</a>
								</li>
							<?php
							}
							if ($this->conn->plan_setting('id_card') == 1) {
							?>
								<!-- <li>
                                    <a href="<?= $panel_path . 'profile/id-card'; ?>" style = "text-decoration: none;"><i class="bx bx-right-arrow-alt"></i>vCard</a>
                                </li>-->
							<?php
							}
							if ($this->conn->plan_setting('change_password') == 1) {
							?>
								<li>
									<a href="<?= $panel_path . 'profile/change-password'; ?>" style="text-decoration: none;"><i class="bx bx-right-arrow-alt"></i>Change Password</a>
								</li>
							<?php
							}
							if ($this->conn->plan_setting('add_account_section') == 1) {
							?>
								<li> <a href="<?= $panel_path . 'payment/add-account'; ?>"><i class="bx bx-right-arrow-alt"></i> Account</a>
								</li>
							<?php
							}
							?>
							<?php if ($this->conn->plan_setting('form') == 1) {  ?>
								<!--<li>
                                    <a href="<?= $panel_path . 'profile/form'; ?>" style = "text-decoration: none;"><i class="bx bx-right-arrow-alt" ></i>Form</a>
                                </li>-->
							<?php }
							if ($this->conn->plan_setting('change_tx_password') == 1) {
							?>
								<li>
									<a href="<?= $panel_path . 'profile/tx-change-password'; ?>" style="text-decoration: none;"><i class="bx bx-right-arrow-alt"></i>Change Tx Password</a>
								</li>
							<?php }
							if ($this->conn->plan_setting('set_tx_password') == 1) {
							?>
								<li>
									<a href="<?= $panel_path . 'profile/set_user_password'; ?>" style="text-decoration: none;"><i class="bx bx-right-arrow-alt"></i>Set Tx Password</a>
								</li>
							<?php
							}
							?>
						</ul>
					</li>
				<?php } ?>


				<?php
				$topup_type = $this->conn->setting('topup_type');
				if ($this->conn->plan_setting('fund_section') == 1 && $topup_type == 'amount') {
				?>
					<li>
						<a href="javascript:;" class="has-arrow">
							<div class="parent-icon"><i class="bx bx-category"></i>
							</div>
							<div class="menu-title">Fund</div>
						</a>
						<ul>
							<?php if ($this->conn->plan_setting('add_fund') == 0) {  ?>
								<li> <a href="<?= $panel_path . 'fund/fund_add'; ?>"><i class="bx bx-right-arrow-alt"></i>Add Fund</a>
								</li>
								<li> <a href="<?= $panel_path . 'fund/fund-add-history'; ?>"><i class="bx bx-right-arrow-alt"></i>Add Fund History</a>
								</li>
								<li> <a href="<?= $panel_path . 'fund/request_history'; ?>" style="text-decoration: none;"><i class="bx bx-right-arrow-alt"></i> Fund Transfer History</a>
								</li>
							<?php } ?>

							<?php if ($this->conn->plan_setting('fund_request') == 1) {  ?>
								<li>
									<a href="<?= $panel_path . 'fund/fund-request'; ?>" style="text-decoration: none;"><i class="bx bx-right-arrow-alt"></i>Fund Request</a>
								</li>
							<?php } ?>
							<?php if ($this->conn->plan_setting('fund_deposit') == 1) {  ?>
								<li>
									<a href="<?= $panel_path . 'fund/fund-deposit'; ?>" style="text-decoration: none;"><i class="bx bx-right-arrow-alt"></i>Deposit Fund</a>
								</li>
							<?php } ?>


							<?php if ($this->conn->plan_setting('transfer_fund') == 0) {  ?>
								<li>
									<a href="<?= $panel_path . 'fund/fund-transfer'; ?>" style="text-decoration: none;"><i class="bx bx-right-arrow-alt"></i> Transfer Fund</a>
								</li>
								<li>
									<a href="<?= $panel_path . 'fund/transfer-history'; ?>" style="text-decoration: none;"><i class="bx bx-right-arrow-alt"></i>Fund Transfer History</a>
								</li>
							<?php } ?>



							<?php if ($this->conn->plan_setting('fund_convert') == 0) {  ?>
								<li>
									<a href="<?= $panel_path . 'fund/fund-convert'; ?>" style="text-decoration: none;"><i class="bx bx-right-arrow-alt"></i> Fund Convert</a>
								</li>

							<?php } ?>

							<?php if ($this->conn->plan_setting('fund_request') == 1) {  ?>
								<li>
									<a href="<?= $panel_path . 'fund/request_history'; ?>" style="text-decoration: none;"><i class="bx bx-right-arrow-alt"></i> Fund Request History</a>
								</li>
							<?php } ?>
						</ul>
					</li>
				<?php } ?>

				<?php
				if ($this->conn->plan_setting('invest_section') == 1) {
				?>
					<li>
						<a href="javascript:;" class="has-arrow">
							<div class="parent-icon"><i class="bx bx-category"></i>
							</div>
							<div class="menu-title">Top up</div>
						</a>
						<ul>
							<?php if ($this->conn->plan_setting('investment') == 1) { ?>
								<li>
									<a href="<?= $panel_path . 'invest/investment'; ?>" style="text-decoration: none;"><i class="bx bx-right-arrow-alt"></i>Member Topup</a>
								</li>
							<?php
							}
							?>
							<?php if ($this->conn->plan_setting('reinvestment') == 1) {
								error_reporting(0);
							?>
								<li>
									<a href="<?= $panel_path . 'invest/reinvestment'; ?>" style="text-decoration: none;"><i class="bx bx-right-arrow-alt"></i>Upgrade Account</a>
								</li>
							<?php }
							?>

						</ul>
					</li>
				<?php } ?>


				<?php
				if ($this->conn->plan_setting('team_section') == 1) {
				?>
					<li>
						<a href="javascript:;" class="has-arrow">
							<div class="parent-icon"><i class="bx bx-category"></i>
							</div>
							<div class="menu-title">My Genealogy</div>
						</a>
						<ul>
							<?php if ($this->conn->plan_setting('direct_team') == 1) {  ?>
								<li> <a href="<?= $panel_path . 'team/team-direct'; ?>"><i class="bx bx-right-arrow-alt"></i>Directs</a>
								</li>
							<?php } ?>
							<?php if ($this->conn->plan_setting('generation_team') == 1) {  ?>
								<li>
									<a href="<?= $panel_path . 'team/team-generation'; ?>" style="text-decoration: none;"><i class="bx bx-right-arrow-alt"></i>Generation</a>
								</li>
							<?php
							}
							?>
							<?php if ($this->conn->plan_setting('left_team') == 1) {  ?>
								<li>
									<a href="<?= $panel_path . 'team/team-left'; ?>" style="text-decoration: none;"><i class="bx bx-right-arrow-alt"></i>Left Team</a>
								</li>
							<?php
							}
							?>
							<?php if ($this->conn->plan_setting('right_team') == 1) {  ?>
								<li>
									<a href="<?= $panel_path . 'team/team-right'; ?>" style="text-decoration: none;"><i class="bx bx-right-arrow-alt"></i>Right Team</a>
								</li>
							<?php
							}
							?>
							<?php if ($this->conn->plan_setting('tree') == 1) {  ?>
								<li>
									<a href="<?= $panel_path . 'team/team-tree'; ?>" style="text-decoration: none;"><i class="bx bx-right-arrow-alt"></i>Tree</a>
								</li>
							<?php
							}
							?>
							<!-- <?php if ($this->conn->plan_setting('matrix') == 0) {  ?>
                                <li>
                                    <a href="<?= $panel_path . 'team/team-matrix-generation'; ?>" style = "text-decoration: none;"><i class="bx bx-right-arrow-alt"></i>Matrix</a>
                                </li>
                                <?php
									}
								?> -->
							<?php if ($this->conn->plan_setting('single_leg_team') == 1) {  ?>
								<li>
									<a href="<?= $panel_path . 'team/team-single-leg'; ?>" style="text-decoration: none;"><i class="bx bx-right-arrow-alt"></i>Single Leg</a>
								</li>
							<?php } ?>
						</ul>
					</li>
				<?php } ?>

				<?php

				if ($this->conn->plan_setting('pin_section') == 1 && $topup_type == 'pin') {
				?>
					<li>
						<a class="has-arrow" style="text-decoration: none;" href="javascript:;">
							<div class="parent-icon"> <i class="fa fa-thumb-tack " aria-hidden="true"></i>
							</div>
							<div class="menu-title"> E-pin</div>
						</a>
						<ul>
							<?php if ($this->conn->plan_setting('generate_pin') == 1) {  ?>
								<li>
									<a href="<?= $panel_path . 'pin/pin-generate'; ?>" style="text-decoration: none;"><i class="bx bx-right-arrow-alt"></i>Generate pin</a>
								</li>
							<?php
							}
							?>
							<?php if ($this->conn->plan_setting('transfer_pin') == 1) {  ?>
								<li>
									<a href="<?= $panel_path . 'pin/pin-transfer'; ?>" style="text-decoration: none;"><i class="bx bx-right-arrow-alt"></i>Pin Transfer</a>
								</li>
							<?php
							}
							?>
							<?php if ($this->conn->plan_setting('pin_request') == 1) {  ?>
								<li>
									<a href="<?= $panel_path . 'pin/epin-request'; ?>" style="text-decoration: none;"><i class="bx bx-right-arrow-alt"></i>Pin Request</a>
								</li>
							<?php
							}
							?>
							<?php if ($this->conn->plan_setting('pin_history') == 1) {  ?>
								<li>
									<a href="<?= $panel_path . 'pin/pin-history'; ?>" style="text-decoration: none;"><i class="bx bx-right-arrow-alt"></i>Pin History</a>
								</li>
							<?php
							}
							?>
							<?php if ($this->conn->plan_setting('pin_box') == 1) {  ?>
								<li>
									<a href="<?= $panel_path . 'pin/pin-box'; ?>" style="text-decoration: none;"><i class="bx bx-right-arrow-alt"></i>Pinbox</a>
								</li>
							<?php } ?>
						</ul>
					</li>
				<?php } ?>


				<?php if ($this->conn->plan_setting('income_section') == 1) { ?>
					<li>
						<a href="javascript:;" class="has-arrow">
							<div class="parent-icon"><i class="bx bx-category"></i>
							</div>
							<div class="menu-title">Bonus Reports</div>
						</a>
						<ul>
							<?php
							$reg_plan = $this->session->userdata('reg_plan');

							$all_income = $this->conn->runQuery('*', 'wallet_types', "wallet_type='income' and status='1' and $reg_plan='1' ");
							if ($all_income) {
								foreach ($all_income as $income) {
							?>
									<li>
										<a href="<?= $panel_path . 'income/details?source=' . $income->slug; ?>" style="text-decoration: none;"><i class="bx bx-right-arrow-alt"></i><?= $income->name; ?></a>
									</li>
							<?php
								}
							}
							?>
						</ul>
					</li>
				<?php } ?>

				<?php if ($this->conn->plan_setting('withdraw_fund') == 1 && $this->conn->setting('earning_type') == 'withdrawal') {  ?>
					<li>
						<a href="javascript:;" class="has-arrow">
							<div class="parent-icon"><i class="bx bx-category"></i>
							</div>
							<div class="menu-title">Withdrawal</div>
						</a>
						<ul>
							<?php if ($this->conn->plan_setting('withdraw_fund') == 1 && $this->conn->setting('earning_type') == 'withdrawal') {  ?>
								<li>
									<a href="<?= $panel_path . 'fund/fund-withdraw'; ?>" style="text-decoration: none;"><i class="bx bx-right-arrow-alt"></i>Withdrawal</a>
								</li>
							<?php  } ?>

							<li>
								<a href="<?= $panel_path . 'transactions/withdrawals'; ?>" style="text-decoration: none;"><i class="bx bx-right-arrow-alt"></i>Withdrawal Report</a>
							</li>
						</ul>
					</li>
				<?php } ?>


				<?php
				if ($this->conn->plan_setting('order_section') == 1) {
				?>
					<li>
						<a href="<?= $panel_path . 'orders'; ?>" style="text-decoration: none;">
							<div class="parent-icon"> <i class="fa fa-sort" aria-hidden="true"></i>
							</div>
							<div class="menu-title">Staking Contracts</div>
						</a>
					</li>
				<?php
				}
				?>
				<?php
				if ($this->conn->plan_setting('reward_section') == 1) {
				?>
					<li>
						<a href="<?= $panel_path . 'team/rank'; ?>" style="text-decoration: none;">
							<div class="parent-icon"><i class="fa fa-trophy" aria-hidden="true"></i>
							</div>
							<div class="menu-title">Rank Bonus</div>
						</a>
					</li>
					<li>
						<a href="<?= $panel_path . 'team/royalty'; ?>" style="text-decoration: none;">
							<div class="parent-icon"><i class="fa fa-trophy" aria-hidden="true"></i>
							</div>
							<div class="menu-title">Daily Growth Share Club</div>
						</a>
					</li>
					<li>
						<a href="<?= $panel_path . 'team/reward'; ?>" style="text-decoration: none;">
							<div class="parent-icon"><i class="fa fa-trophy" aria-hidden="true"></i>
							</div>
							<div class="menu-title">Matching Slab Bonus</div>
						</a>
					</li>

				<?php
				}
				?>

				<?php
				if ($this->conn->plan_setting('income_report_section') == 1) {
				?>
					<li>
						<a href="<?= $panel_path . '/report/income'; ?>" style="text-decoration: none;">
							<div class="parent-icon"> <i class="bx bx-cookie" aria-hidden="true"></i>
							</div>
							<div class="menu-title">Report</div>
						</a>
					</li>
				<?php
				}
				?>
				<?php
				if ($this->conn->plan_setting('news_alert_section') == 1) {
				?>
					<li>
						<a href="<?= $panel_path . 'profile/news'; ?>" style="text-decoration: none;">
							<div class="parent-icon"> <i class="fa fa-life-ring new_left primary_color_page" aria-hidden="true"></i>
							</div>
							<div class="menu-title">News & Event</div>
						</a>
					</li>
				<?php
				}
				?>

				<?php
				// if($this->conn->plan_setting('support_section')==1){
				?>
				<li>
					<a href="<?= $panel_path . 'support'; ?>" style="text-decoration: none;">
						<div class="parent-icon"> <i class="fa fa-life-ring new_left primary_color_page" aria-hidden="true"></i>
						</div>
						<div class="menu-title">Support</div>
					</a>
				</li>
				<?php
				// }
				?>
				<li>
					<a href="<?= $panel_path . 'logout'; ?>" style="text-decoration: none;">
						<div class="parent-icon"> <i class="fa fa-sign-out new_left primary_color_page" aria-hidden="true"></i>
						</div>
						<div class="menu-title">Logout</div>
					</a>
				</li>

			</ul>
			<!--end navigation-->
		</div>
		<!--end sidebar wrapper -->
		<!--start header -->
		<header>
			<div class="topbar d-flex align-items-center">
				<nav class="navbar navbar-expand">
					<div class="mobile-toggle-menu"><i class='bx bx-menu'></i>
					</div>
					<div class="search-bar flex-grow-1">
						<div class="position-relative search-bar-box">

							<span class="position-absolute top-50 search-close translate-middle-y"><i class='bx bx-x'></i></span>
						</div>
					</div>
					<div class="top-menu ms-auto">
						<ul class="navbar-nav align-items-center">
							<li class="nav-item mobile-search-icon">
								<a class="nav-link" href="#"> <i class='bx bx-search'></i>
								</a>
							</li>
							<li class="nav-item dropdown dropdown-large">

								<div class="dropdown-menu dropdown-menu-end">
									<div class="row row-cols-3 g-3 p-3">
										<div class="col text-center">
											<div class="app-box mx-auto"><i class='bx bx-group'></i>
											</div>
											<div class="app-title">Teams</div>
										</div>
										<div class="col text-center">
											<div class="app-box mx-auto"><i class='bx bx-atom'></i>
											</div>
											<div class="app-title">Projects</div>
										</div>
										<div class="col text-center">
											<div class="app-box mx-auto"><i class='bx bx-shield'></i>
											</div>
											<div class="app-title">Tasks</div>
										</div>
										<div class="col text-center">
											<div class="app-box mx-auto"><i class='bx bx-notification'></i>
											</div>
											<div class="app-title">Feeds</div>
										</div>
										<div class="col text-center">
											<div class="app-box mx-auto"><i class='bx bx-file'></i>
											</div>
											<div class="app-title">Files</div>
										</div>
										<div class="col text-center">
											<div class="app-box mx-auto"><i class='bx bx-filter-alt'></i>
											</div>
											<div class="app-title">Alerts</div>
										</div>
									</div>
								</div>
							</li>
							<li class="nav-item dropdown dropdown-large">

								<div class="dropdown-menu dropdown-menu-end">
									<a href="javascript:;">
										<div class="msg-header">
											<p class="msg-header-title">Notifications</p>
											<p class="msg-header-clear ms-auto">Marks all as read</p>
										</div>
									</a>
									<div class="header-notifications-list">
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="notify"><i class="bx bx-group"></i>
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">New Customers<span class="msg-time float-end">14 Sec
															ago</span></h6>
													<p class="msg-info">5 new user registered</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="notify"><i class="bx bx-cart-alt"></i>
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">New Orders <span class="msg-time float-end">2 min
															ago</span></h6>
													<p class="msg-info">You have recived new orders</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="notify"><i class="bx bx-file"></i>
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">24 PDF File<span class="msg-time float-end">19 min
															ago</span></h6>
													<p class="msg-info">The pdf files generated</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="notify"><i class="bx bx-send"></i>
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">Time Response <span class="msg-time float-end">28 min
															ago</span></h6>
													<p class="msg-info">5.1 min avarage time response</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="notify"><i class="bx bx-home-circle"></i>
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">New Product Approved <span class="msg-time float-end">2 hrs ago</span></h6>
													<p class="msg-info">Your new product has approved</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="notify"><i class="bx bx-message-detail"></i>
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">New Comments <span class="msg-time float-end">4 hrs
															ago</span></h6>
													<p class="msg-info">New customer comments recived</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="notify"><i class='bx bx-check-square'></i>
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">Your item is shipped <span class="msg-time float-end">5 hrs
															ago</span></h6>
													<p class="msg-info">Successfully shipped your item</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="notify"><i class='bx bx-user-pin'></i>
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">New 24 authors<span class="msg-time float-end">1 day
															ago</span></h6>
													<p class="msg-info">24 new authors joined last week</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="notify"><i class='bx bx-door-open'></i>
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">Defense Alerts <span class="msg-time float-end">2 weeks
															ago</span></h6>
													<p class="msg-info">45% less alerts last 4 weeks</p>
												</div>
											</div>
										</a>
									</div>
									<a href="javascript:;">
										<div class="text-center msg-footer">View All Notifications</div>
									</a>
								</div>
							</li>
							<li class="nav-item dropdown dropdown-large">

								<div class="dropdown-menu dropdown-menu-end">
									<a href="javascript:;">
										<div class="msg-header">
											<p class="msg-header-title">Messages</p>
											<p class="msg-header-clear ms-auto">Marks all as read</p>
										</div>
									</a>
									<div class="header-message-list">
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="user-online">
													<img src="<?= $panel_url; ?>assets/images/avatars/avatar-1.png" class="msg-avatar" alt="user avatar">
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">Daisy Anderson <span class="msg-time float-end">5 sec
															ago</span></h6>
													<p class="msg-info">The standard chunk of lorem</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="user-online">
													<img src="<?= $panel_url; ?>assets/images/avatars/avatar-2.png" class="msg-avatar" alt="user avatar">
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">Althea Cabardo <span class="msg-time float-end">14
															sec ago</span></h6>
													<p class="msg-info">Many desktop publishing packages</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="user-online">
													<img src="<?= $panel_url; ?>assets/images/avatars/avatar-3.png" class="msg-avatar" alt="user avatar">
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">Oscar Garner <span class="msg-time float-end">8 min
															ago</span></h6>
													<p class="msg-info">Various versions have evolved over</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="user-online">
													<img src="<?= $panel_url; ?>assets/images/avatars/avatar-4.png" class="msg-avatar" alt="user avatar">
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">Katherine Pechon <span class="msg-time float-end">15
															min ago</span></h6>
													<p class="msg-info">Making this the first true generator</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="user-online">
													<img src="<?= $panel_url; ?>assets/images/avatars/avatar-5.png" class="msg-avatar" alt="user avatar">
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">Amelia Doe <span class="msg-time float-end">22 min
															ago</span></h6>
													<p class="msg-info">Duis aute irure dolor in reprehenderit</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="user-online">
													<img src="<?= $panel_url; ?>assets/images/avatars/avatar-6.png" class="msg-avatar" alt="user avatar">
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">Cristina Jhons <span class="msg-time float-end">2 hrs
															ago</span></h6>
													<p class="msg-info">The passage is attributed to an unknown</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="user-online">
													<img src="<?= $panel_url; ?>assets/images/avatars/avatar-7.png" class="msg-avatar" alt="user avatar">
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">James Caviness <span class="msg-time float-end">4 hrs
															ago</span></h6>
													<p class="msg-info">The point of using Lorem</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="user-online">
													<img src="<?= $panel_url; ?>assets/images/avatars/avatar-8.png" class="msg-avatar" alt="user avatar">
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">Peter Costanzo <span class="msg-time float-end">6 hrs
															ago</span></h6>
													<p class="msg-info">It was popularised in the 1960s</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="user-online">
													<img src="<?= $panel_url; ?>assets/images/avatars/avatar-9.png" class="msg-avatar" alt="user avatar">
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">David Buckley <span class="msg-time float-end">2 hrs
															ago</span></h6>
													<p class="msg-info">Various versions have evolved over</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="user-online">
													<img src="<?= $panel_url; ?>assets/images/avatars/avatar-10.png" class="msg-avatar" alt="user avatar">
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">Thomas Wheeler <span class="msg-time float-end">2 days
															ago</span></h6>
													<p class="msg-info">If you are going to use a passage</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="user-online">
													<img src="<?= $panel_url; ?>assets/images/avatars/avatar-11.png" class="msg-avatar" alt="user avatar">
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">Johnny Seitz <span class="msg-time float-end">5 days
															ago</span></h6>
													<p class="msg-info">All the Lorem Ipsum generators</p>
												</div>
											</div>
										</a>
									</div>
									<a href="javascript:;">
										<div class="text-center msg-footer">View All Messages</div>
									</a>
								</div>
							</li>
						</ul>
					</div>
					<div class="user-box dropdown">
						<a class="d-flex align-items-center nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
							<!-- <img src="<?= $panel_url; ?>assets/images/avatars/avatar-2.png" class="user-img" alt="user avatar"> -->
							<?php if ($profile->img != '') { ?>
								<img src="<?= base_url('images/users/') . $profile->img; ?>" alt="images" class="rounded-circle p-1 bg-primary" width="60px">
							<?php } else { ?>
								<img src="<?= $this->conn->company_info('logo'); ?>" alt="images" class="rounded-circle p-1 bg-primary" width="60px">
							<?php } ?>
							<div class="user-info ps-3">
								<p class="user-name mb-0"><?= $this->session->userdata('profile')->username; ?></p>
							</div>
						</a>
						<ul class="dropdown-menu dropdown-menu-end">

							<li><a class="dropdown-item" href="<?= $panel_path . 'logout'; ?>"><i class='bx bx-log-out-circle'></i><span>Logout</span></a>
							</li>
						</ul>
					</div>
				</nav>
			</div>
		</header>
		<!--end header -->