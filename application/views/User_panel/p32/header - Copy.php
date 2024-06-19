<!doctype html>
<html lang="en" style="background:#000">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--favicon-->
	<link rel="icon" href="<?= $this->conn->company_info('symbol'); ?>" type="image/png" />
	<!--plugins-->
	<link href="<?= $panel_url; ?>assets/plugins/vectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet" />
	<link href="<?= $panel_url; ?>assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
	<link href="<?= $panel_url; ?>assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
	<link href="<?= $panel_url; ?>assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
	<!-- loader-->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="<?= $panel_url; ?>assets/css/pace.min.css" rel="stylesheet" />
	<script src="<?= $panel_url; ?>assets/js/pace.min.js"></script>
	<!-- Bootstrap CSS -->
	<link href="<?= $panel_url; ?>assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?= $panel_url; ?>assets/css/bootstrap-extended.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&amp;display=swap" rel="stylesheet">
	<link href="<?= $panel_url; ?>assets/css/app.css" rel="stylesheet">
	<link href="<?= $panel_url; ?>assets/css/icons.css" rel="stylesheet">
	<!-- Theme Style CSS -->
	<link rel="stylesheet" href="<?= $panel_url; ?>assets/css/custom.css" />
	<link rel="stylesheet" href="<?= $panel_url; ?>assets/css/style1.css" />
	<link rel="stylesheet" href="<?= $panel_url; ?>assets/css/dark-theme.css" />
	<link rel="stylesheet" href="<?= $panel_url; ?>assets/css/semi-dark.css" />
	<link rel="stylesheet" href="<?= $panel_url; ?>assets/css/extra.css" />
	<link rel="stylesheet" href="<?= $panel_url; ?>assets/css/header-colors.css" />
	<title><?= $this->conn->company_info('company_name'); ?></title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

	<style>
		.dashboard_data {
			display: flex;
			justify-content: space-between;
			align-items: center;
			margin-bottom: 10px;
		}

		:root {
			--first: #188a9d;
			--second: #f9b707;
			--text1: #214fbe;
			--text2: #fff;
			--black: #000;
		}

		body {
			background: #fff;
		}

		input {
			background: none !important;
			color: #000;
		}

		.card {
			background-color: #188a9d;
		}

		.user_pic_profile {
			margin: auto;
		}

		input.form-control {
			background: none !important;
			color: #dbdbdb !important;
		}

		.table td,
		.table th {
			color: #fff;
		}

		::placeholder {
			color: red;
			opacity: 1;
			/* Firefox */
		}

		input::placeholder {
			background: none;
			color: #000 !important;
			opacity: 1 !important;
			/* Firefox */
			font-size: 14px;
		}

		select.form-control {
			background: none !important;
			color: #dbdbdb !important;

		}

		.widthrawal_innce_report_tabel {
			background: black !important;
		}

		option {
			color: #000;
		}

		select {
			background: none;
			color: #7e7e7e;
		}

		input:focus {
			outline: none;
		}

		.form-control:focus {
			outline: none;
			box-shadow: none !important;
			border-color: #c89543 !important;
			color: #fff;
		}

		.topbar .navbar {
			background: #010101e0;
		}

		.dashboard_button_grade {
			background: #bf812a !important padding: 9px;
			border-radius: 8px;
		}

		.card-header {
			background: var(--first) !important;
			color: var(--text2) !important;
		}

		input.text-muted {
			background: #bf812a !important;
			color: var(--text2) !important;
			border: none;
		}

		button.text-muted {
			background: #bf812a !important;

			border: none;
		}

		span#tim55 {
			font-size: 30px;
			font-weight: 700;
			font-family: 'Montserrat', sans-serif;
		}

		.card.card-info {
			padding: 10px;
		}

		button.user_btn_button.send_otp {
			background: #bf812a !important;
			color: #fff;
			border: none;
		}

		button.user_btn_button.send_otp_account {
			background: #bf812a !important;
			color: #fff;
			border: none;
		}

		.form-inline1 button:hover {
			background: #bf812a !important;
		}

		button.text-muted a {

			color: #fff !important;

		}

		.dashboard_button_grade a {
			color: #fff;
			font-size: 16px;
			font-weight: 500;
			text-transform: capitalize;
			display: inline-block;
		}

		.sidebar-wrapper .metismenu {

			padding: 10px;
			margin-top: 86px;
		}

		.sidebar-header {
			height: 90px;
			padding-top: 10px;
			background-color: #000;
		}

		.profile_image_data {
			margin-bottom: 10px;
		}

		.profile_image_data img {
			padding: 10px;
			width: 77px;
			margin: auto;
			display: block;
			border: 1px solid #ced0d130;
			border-radius: 40px;
		}

		.table-responsive-data {
			overflow: auto;
			padding: 15px;
			margin-bottom: 20px;
		}

		table.table_foorex {
			border-collapse: collapse;
			width: 100%;
		}



		.table-responsive-data {
			/*	border: 2px solid #214fbe;*/
			background: var(--first) !important;
			border-radius: 18px;
		}

		table.table_foorex th {
			padding: 5px 22px;
			border: none;
			font-size: 12px;
			color: var(--text2);
		}

		.demo_detail_section.data {
			/*border: 2px dotted #214fbe;*/
		}

		.demo_detail_section.data p {
			font-size: 20px;
			color: var(--text2);
			font-weight: 600;
		}

		.demo_detail_section.data1 {
			background: linear-gradient(to top, #a66bff, #fb64bf) !important;
			padding: 24px;
		}

		.dashboard_data h4 {
			font-size: 20px;
			font-weight: 600;
			text-transform: uppercase;
			margin-bottom: 21px;
			color: var(--text2);
		}

		.demo_detail_section.data1 h3 {
			font-size: 20px;

			color: var(--text2);
		}

		.demo_detail_section.data1 h5 {
			color: var(--text2);
			font-size: 20px;
		}

		.demo_detail_section.data5 {
			background: linear-gradient(180deg, #CF9410 0%, #f9b707 100%);
			padding: 20px;
		}

		.demo_detail_section.data5 h3 {
			color: #fff;
			font-size: 20px;
			font-weight: 500;
		}

		.demo_detail_section.data5 h5 {
			font-size: 25px;
			font-weight: 600;
			color: #fff;
		}

		.demo_detail_section.data5 {
			text-align: center;
		}


		.page-content {
			width: 100%;
			background-position: center center;
			background-size: cover;
			background-repeat: no-repeat;
			position: relative;
		}

		.data_detail_page_group {
			display: flex;
			flex-wrap: wrap;
		}

		.card.card-bg-1 {

			padding-left: 6px;
		}

		.detail_input_group {
			margin: 5px 4px;
		}

		@media screen and (max-width: 768px) {
			.detail_input_group {

				width: 100%;
			}
		}

		.user_card_body {
			flex: 1 1 auto;
			padding: 6px 10px;
		}

		/*filter_css_end*/





		.btn-check:focus+.btn-success,
		.btn-success:focus {
			color: #fff;
			background-color: #0a404c !important;
			border-color: #0a404c !important;
			box-shadow: 0 0 0 0.25rem rgb(10 64 76) !important;
		}

		.btn-success:hover {
			color: #fff;
			background-color: #0a404c !important;
			border-color: #0a404c !important;
		}

		input#referral_link_right:focus {
			outline: none;
			box-shadow: none !important;
		}

		input#referral_link_left:focus {
			outline: none;
			box-shadow: none !important;
		}

		.news_dec {
			margin-top: 15px;
		}

		.news_dec h5 {
			font-size: 18px;
			text-transform: capitalize;
		}

		.news_dec p {
			font-size: 14px;
		}

		button.close {
			position: absolute;
			right: 0;
			bottom: 6px;
		}

		.detail_form_tab {
			position: relative;
		}

		table th,
		table td {
			border: 1px solid #e1dfdf24 !important;
		}

		.table_report_income table th,
		td {
			border: 1px solid #e1dfdf24 !important;
		}

		.form_topup form {
			color: #fff;
		}

		a.user_btn_button {

			border: 1px solid transparent;
			padding: 0.375rem 0.75rem;
			font-size: 14px;
			font-weight: 500;
			margin: 0;
			display: inline-block;

			background: var(--second) !important;
			color: var(--text2) !important;
		}


		.user_form_row_data {
			align-items: center;
		}

		input#referral_link_right {
			height: 44px;
			border: none;
			align-items: center;
			border: 1px solid #ddd3d3;
		}

		.input-group-text {
			padding: 9px !important;

		}

		input#referral_link_right:focus {
			outline: none;

		}

		.text-input {
			flex-wrap: wrap;
			align-items: center;
			display: flex;
		}

		p.support_detsil_para {
			color: #000;
		}

		li.breadcrumb-item a {
			text-transform: capitalize;
		}

		@media screen and (max-width: 768px) {
			.page-content {
				padding: 10px 10px;
			}
		}

		.demo_detail_section.data1 {
			text-align: center;
		}

		.mobile-toggle-menu i {
			color: var(--text2);
			margin-right: 10px;
		}

		.card-bg-1 {
			background-color: var(--first) ! important;
			color: var(--text2) !important;
			box-shadow: none;
		}

		.form-inline1 button:hover {
			background: #bf812a !important;
		}

		label.text-dark {
			color: var(--text2) !important;
		}

		span.text-dark {
			color: var(--text2) !important;
		}

		.breadcrumb {
			background: #fff;
			padding: 10px;
		}

		marquee {
			color: var(--text2);
		}

		select.form-control.mr-sm-2.selected_detail_data {
			padding: 8px !important;
			height: 38px !important;
		}

		.user-box .user-info {
			display: block;
		}

		.btn-dark {
			background: var(--first) !important;
			border-color: var(--first) !important;
			;
		}

		.toggle-icon {

			color: var(--text2) !important;
		}

		li.breadcrumb-item a {
			color: var(--text2) !important;
		}

		.regard_welcome_letter {
			color: var(--text2);
		}

		.ghost1 b {
			color: var(--text2) !important;
		}

		.user-info.ps-3 p {
			color: var(--text2) !important;
		}

		.input-group-text {
			padding: 9px !important;
			background: var(--first) !important;
			color: #5a5959 !important;
		}

		.welcome_color_bacakground,
		.welcome_logo_letter a img {
			background: var(--first) !important;
		}

		.container.welcome_color {
			border: 4px solid var(--first) !important;
		}

		.sidebar-wrapper .metismenu a .menu-title {

			font-size: 14px;
		}

		.sidebar-wrapper .metismenu ul a {

			font-size: 14px;

		}

		.user_eran_heading h5 {
			color: var(--text2);
			font-size: 20px;
			font-weight: 600;
		}

		.user_eran_heading p {
			color: var(--text2);
		}

		.location_link p {
			color: var(--text2);
			font-size: 14px;
		}

		.input-group-text {
			padding: 12px !important;
		}

		.input-group-prepend {
			margin-right: -2px;
		}

		.sidebar-wrapper .metismenu a .parent-icon {
			font-size: 16px;
		}

		.form-control {
			margin-bottom: 10px;
		}

		button.button_data_link {
			padding: 8px 16px;
			background: #bf812a;
			font-size: 16px;
			border: none;
			color: #fff;
		}

		a.user_anchor {
			padding: 8px 16px;
			background: #f9b707;
			font-size: 16px;
			border: none;
			color: var(--text2);
			border-radius: 4px;
		}

		.earn_refer_title {
			display: flex;
			align-items: center;
			justify-content: space-between;

		}

		input.reset_user_panel_button {
			background: var(--second);
			font-size: 16px;
			color: #fff;
		}

		input.reset_user_panel_button.detail_rest {
			padding: 8px 16px;
		}

		a.reset_user_panel_button_anhor {
			background: var(--second);
			font-size: 16px;
			color: var(--text2);
			padding: 4px 10px;
		}

		a.button_data_link_anhor {
			padding: 8px 16px;
			background: var(--second);
			font-size: 16px;
			border: none;
			color: var(--text2);
		}

		.breadcrumb-item+.breadcrumb-item::before {
			display: none !important;
		}

		p.mb-0 {

			color: var(--text2);
		}

		.page-footer {
			background-color: var(--first);
		}

		.sidebar-wrapper {
			background-color: #000;
		}

		.sidebar-wrapper .metismenu a {
			color: #fff;
			border: none;
			border-radius: 40px;
		}

		.sidebar-wrapper .metismenu .mm-active>a {
			background: #f9b707;
			color: #fff;
			border: none;
			border-radius: 40px;
		}

		.sidebar-wrapper .metismenu a:hover {
			background: #f9b707;
			color: #fff;
			border: none;

		}

		.sidebar-wrapper .metismenu ul {
			background-color: #000;
			border: none;
		}

		.widthrwal_report_user h3 {
			font-size: 16px;
			color: white;
		}

		.widthrwal_report_user p {
			margin: 0;
			color: white;
		}

		.demo_detail_section {
			padding: 16px;
			background-color: var(--first);
			border-radius: 16px;
			margin-bottom: 10px;
		}

		.detail_welcome_section h3,
		.detail_welcome_section h5 {
			color: #5a5959;
			font-size: 16px;
		}

		.detail_welcome_section h5 {
			margin-bottom: 2px;
		}

		.detail_welcome_section p {
			color: var(--text2);
			margin-bottom: 6px;
			font-size: 18px;
			font-weight: 600;
		}

		.inner_side_content {
			display: flex;
			align-items: center;

		}

		.topbar.d-flex.align-items-center {
			background: var(--first);
		}

		.data_detail_inner_icon {
			margin-left: auto;
		}

		.data_detail_inner h4 {
			font-size: 20px;
			color: var(--text2);
		}

		.data_detail_inner_icon i {
			width: 45px;
			height: 45px;
			display: flex;
			align-items: center;
			justify-content: center;
			background: #f9b707;
			font-size: 20px;
			border-radius: 10px;
			color: #fff;
			border: 1px solid #bf812a;
		}

		/*kyc_css*/
		table.table.table-bordered.table-responsive.table_detail {

			width: 100%;
			overflow-x: auto;
		}

		@media screen and (max-width: 768px) {
			table.table.table-bordered.table-responsive.table_detail {
				width: 100%;
				overflow-x: auto;
				display: block;
			}

			p.designattion.mb-0 {
				display: none;
			}

			.nav-link {
				padding: 0px;
			}
		}


		ul.tabs_detail {
			margin: 0px;
			padding: 0px;
			list-style: none;
			width: 100%;
			display: flex;
			white-space: nowrap;
		}

		ul.tabs_detail li {
			background: none;
			color: #fff;
			display: inline-block;

			margin-left: 5px;
			padding: 7px 15px;
			cursor: pointer;
			border: 1px solid var(--first);
			border-radius: 40px
		}

		ul.tabs_detail li.current {
			background-color: var(--first);
			color: #fff;

		}

		.tab-content {
			display: none;
			background: #ededed;
			padding: 15px;
			margin-top: 5px;
		}

		.tab-content.current {
			display: inherit;
		}

		.detail_form_tab input {
			padding: 8px 15px 8px 15px;
			border-radius: 5px 5px 5px 5px;
			width: 100%;
			max-width: 100%;
			margin: 10px 0px;
			border: none;
			background-color: #F6F7F9;
		}

		.form-group label {
			color: #fff;
		}

		.form-control:focus {
			background: none;
		}

		textarea.form-control {
			background: none;
		}

		input.user_btn_button {
			background: var(--second) !important;
			color: var(--text2) !important;
		}

		h5.user_card_title_group {
			color: var(--black);
		}

		h6.profile_information_heading {
			color: var(--text2);
			border-bottom: 1px solid #000;
		}

		table.table.table-bordered.table-hover th,
		td {
			color: white;
		}

		table.user_table_info_record th {
			color: white;
		}

		label.label_user_title {

			color: var(--text2);
		}

		.data_save p {
			color: var(--text2);
		}

		h5.user_card_title.filter_title {
			color: var(--text2);
		}

		h3.user_card_title {
			color: var(--text2);
		}

		.breadcrumb {
			background-color: #188a9d;
			margin: 20px 0px;
		}

		.user_main_card {
			background-color: #000;
			border: 1px solid #fff;
		}

		select.select_services_tab {
			padding: 8px 15px 8px 15px;
			border-radius: 5px 5px 5px 5px;
			width: 100%;
			max-width: 100%;
			margin: 10px 0px;
			border: none;
			background-color: #F6F7F9;
		}

		button.tab_button_click {
			padding: 8px 16px;
			font-weight: 500;
			font-size: 16px;
			margin-left: 15px;
			background-color: var(--second);
			font-size: 18px;
			font-weight: 500;
			color: var(--text2);
			border-radius: 4px;
			border: 1px solid var(--second);
			text-transform: capitalize;
			width: 100%;
			max-width: 106px;

		}

		button.tab_button_click:focus {
			outline: none;
		}

		.detail_form_tab label {
			width: 100% !important;
		}

		.tab_images_detail img {
			margin-bottom: 10px !important;
		}

		<?php
		$userid = $this->session->userdata('user_id');

		$profile = $this->session->userdata("profile");

		$kyc_details = $this->conn->runQuery('*', "user_accounts", "status='1' and u_code='$userid'");
		?>@media only screen and (max-width: 768px) {
			ul.tabs_detail li {
				font-size: 14px;
				padding: 4px 10px;
				cursor: pointer;
				margin-right: 5px;
				display: flex;
				align-items: center;
				border-radius: 4px
			}

			ul.tabs_detail {

				display: flex;
				overflow-x: scroll;
			}
		}

		.demo_detail_section h2 {
			color: var(--text2);
			font-size: 20px;
			font-weight: 600;

			text-transform: uppercase;
		}

		.user_list_team span {
			float: right;
		}

		.user_list_team ul {
			list-style: none;
			margin: 0;
			padding: 0;
		}

		.ghost1 b {

			font-weight: 400;
		}

		.user_list_team ul li i {
			margin-right: 8px;
		}

		.user_list_team ul li {
			padding: 8px 0;
			color: var(--text2);
			border-bottom: 1px solid #5a5959;
			font-size: 13px;
			font-weight: 500;
		}

		.sidebar-wrapper .metismenu a:focus {
			color: var(--text2);
			text-decoration: none;
			background: #f9b707;
		}

		.btn-success {
			background-color: #bf812a;
			border: none;
			color: var(--text2);
			margin-left: 10px;
			padding: 8px;
		}

		.btn-success i {

			color: #fff;

		}

		.table>:not(:last-child)>:last-child>* {
			border-bottom-color: #ffffff33 !important;
		}

		table th,
		table td {
			color: #fff;
			border: 1px solid #201f1f0d !important;
			vertical-align: middle;
			white-space: nowrap;
		}

		h5.user_card_title.profile_edit i {
			background-color: #bf812a !important;
		}

		button.close {
			float: right;
		}

		@media only screen and (max-width: 600px) {
			.dashboard_data h4 {
				margin-bottom: 0px;
				font-size: 16px;
			}

			.dashboard_button_grade {
				background: #214fbe;
				padding: 5px;

			}

			.dashboard_button_grade a {
				font-size: 14px;
			}
		}

		p.robo_heading {
			margin: 0;
			font-size: 15px;
			background-image: linear-gradient(to left, #dabb71, #d5af62, #c58d38, #daba70, #cd8e10, orange, #d8b86d);
			-webkit-background-clip: text;
			-moz-background-clip: text;
			background-clip: text;
			color: transparent;
			font-weight: 600;
		}

		a.btn.btn-primary {
			color: #fff;
			background-color: #2657cd;
			border-color: #2657cd;
		}
	</style>
</head>

<body>
	<!--wrapper-->
	<div class="wrapper">
		<!--sidebar wrapper -->
		<div class="sidebar-wrapper" data-simplebar="true">
			<div class="sidebar-header">
				<div>
					<img class="" src="<?= $this->conn->company_info('logo'); ?>" alt="<?= $this->conn->company_info('company_name'); ?>" style="width:65px;height:65px;">
				</div>
				<div>
					<!--<h4 class="logo-text">Rocker</h4>-->
				</div>
				<div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
				</div>
			</div>
			<!--navigation-->
			<ul class="metismenu" id="menu">
				<li>
					<a href="<?= $panel_path . 'dashboard'; ?>" class="" style="text-decoration: none;">
						<div class="parent-icon"><i class='bx bx-home-circle'></i>
						</div>
						<div class="menu-title">Dashboard</div>
					</a>

				</li>
				<?php
				if ($this->conn->plan_setting('profile_section') == 1) {
				?>
					<li>
						<a href="javascript:;" class="has-arrow" style="text-decoration: none;">
							<div class="parent-icon"><i class="fa fa-gear"></i>
							</div>
							<div class="menu-title">My Account</div>
						</a>
						<ul>
							<?php if ($this->conn->plan_setting('welcome_letter') == 1) { ?>
								<!--	<li> <a href="<?= $panel_path . 'profile/letter'; ?>" style = "text-decoration: none;"><i class="bx bx-right-arrow-alt"></i>Welcome Letter</a>
						</li>-->
							<?php
							}
							if ($this->conn->plan_setting('profile_page') == 1) {
							?>
								<li>
									<a href="<?= $panel_path . 'profile'; ?>" style="text-decoration: none;"><i class="bx bx-right-arrow-alt"></i>Profile</a>
								</li>
							<?php
							}
							if ($this->conn->plan_setting('profile_page') == 1) {
							?>
								<li>
									<a href="<?= $panel_path . 'profile/edit-profile'; ?>" style="text-decoration: none;"><i class="bx bx-right-arrow-alt"></i>Edit Profile</a>
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
								<li>
									<a href="<?= $panel_path . 'payment/add-account'; ?>" style="text-decoration: none;"><i class="bx bx-right-arrow-alt"></i>Accounts</a>
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
				<?php
				}
				?>


				<?php
				if ($this->conn->plan_setting('team_section') == 1) {
				?>
					<li>
						<a href="javascript:;" class="has-arrow" style="text-decoration: none;">
							<div class="parent-icon"> <i class="fa fa-users" aria-hidden="true "></i>
							</div>
							<div class="menu-title">My Genealogy</div>
						</a>
						<ul>
							<?php if ($this->conn->plan_setting('direct_team') == 1) {  ?>
								<li>
									<a href="<?= $panel_path . 'team/team-direct'; ?>" style="text-decoration: none;"><i class="bx bx-right-arrow-alt"></i>Direct</a>
								</li>
							<?php
							}
							?>
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
				$topup_type = $this->conn->setting('topup_type');
				if ($this->conn->plan_setting('fund_section') == 1 && $topup_type == 'amount') {
				?>
					<li>
						<a class="has-arrow" style="text-decoration: none;" href="javascript:;">
							<div class="parent-icon"><i class='bx bx-bookmark-heart'></i>
							</div>
							<div class="menu-title">Fund</div>
						</a>
						<ul>

							<?php if ($this->conn->plan_setting('add_fund') == 0) {  ?>
								<li>
									<a href="<?= $panel_path . 'fund/fund_add'; ?>" style="text-decoration: none;"><i class="bx bx-right-arrow-alt"></i>Add Fund</a>
								</li>
								<li>
									<a href="<?= $panel_path . 'fund/fund-add-history'; ?>" style="text-decoration: none;"><i class="bx bx-right-arrow-alt"></i>Add Fund History</a>
								</li>
								<li>
									<a href="<?= $panel_path . 'fund/request_history'; ?>" style="text-decoration: none;"><i class="bx bx-right-arrow-alt"></i> Fund Transfer History</a>
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
				<?php
				}
				?>
				<?php if ($this->conn->plan_setting('withdraw_fund') == 1 && $this->conn->setting('earning_type') == 'withdrawal') {  ?>
					<li>
						<a class="has-arrow" style="text-decoration: none;" href="javascript:;">
							<div class="parent-icon"><i class="fa fa-users " aria-hidden="true"></i>
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

				<?php
				if ($this->conn->plan_setting('invest_section') == 1) {
				?>
					<li>
						<a class="has-arrow" style="text-decoration: none;" href="javascript:;">
							<div class="parent-icon"><i class='bx bx-message-square-edit'></i>
							</div>
							<div class="menu-title">Topup</div>
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

				<?php if ($this->conn->plan_setting('income_section') == 1) { ?>
					<li>
						<a class="has-arrow" style="text-decoration: none;" href="javascript:;">
							<div class="parent-icon"> <i class="fa fa-money " aria-hidden="true"></i>
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
				<?php
				}
				?>

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

				<!--<li>-->
				<!--	<a href="<?php echo $right_link = base_url('register?ref=' . $profile->username); ?>" style = "text-decoration: none;" >-->
				<!--		<div class="parent-icon"> <i class="fa fa-registered new_left " aria-hidden="true"></i>-->
				<!--		</div>-->
				<!--		<div class="menu-title">Register New User</div>-->
				<!--	</a>-->
				<!--</li>-->

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
							<div class="parent-icon"> <i class="fa fa-newspaper-o new_left primary_color_page" aria-hidden="true"></i>
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
					<!--	<div class="search-bar flex-grow-1">
						<div class="position-relative search-bar-box">
							<input type="text" class="form-control search-control" placeholder="Type to search..."> <span class="position-absolute top-50 search-show translate-middle-y"><i class='bx bx-search'></i></span>
							<span class="position-absolute top-50 search-close translate-middle-y"><i class='bx bx-x'></i></span>
						</div>
					</div>-->

					<div class="ghost1 ">
						<p class="robo_heading"><?= $this->conn->company_info('company_name') ?></p>
						<!--<?php
							echo $this->conn->server_time();
							?>-->
					</div>
					<div class="top-menu ms-auto">
						<ul class="navbar-nav align-items-center">
							<!--	<li class="nav-item mobile-search-icon">
								<a class="nav-link" href="#">	<i class='bx bx-search'></i>
								</a>
							</li>-->
							<!--<li class="nav-item dropdown dropdown-large">
								<a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">	<i class='bx bx-category'></i>
								</a>
								<div class="dropdown-menu dropdown-menu-end">
									<div class="row row-cols-3 g-3 p-3">
										<div class="col text-center">
											<div class="app-box mx-auto bg-gradient-cosmic text-white"><i class='bx bx-group'></i>
											</div>
											<div class="app-title">Teams</div>
										</div>
										<div class="col text-center">
											<div class="app-box mx-auto bg-gradient-burning text-white"><i class='bx bx-atom'></i>
											</div>
											<div class="app-title">Projects</div>
										</div>
										<div class="col text-center">
											<div class="app-box mx-auto bg-gradient-lush text-white"><i class='bx bx-shield'></i>
											</div>
											<div class="app-title">Tasks</div>
										</div>
										<div class="col text-center">
											<div class="app-box mx-auto bg-gradient-kyoto text-dark"><i class='bx bx-notification'></i>
											</div>
											<div class="app-title">Feeds</div>
										</div>
										<div class="col text-center">
											<div class="app-box mx-auto bg-gradient-blues text-dark"><i class='bx bx-file'></i>
											</div>
											<div class="app-title">Files</div>
										</div>
										<div class="col text-center">
											<div class="app-box mx-auto bg-gradient-moonlit text-white"><i class='bx bx-filter-alt'></i>
											</div>
											<div class="app-title">Alerts</div>
										</div>
									</div>
								</div>
							</li>-->
							<li class="nav-item dropdown dropdown-large">
								<!--<a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"> <span class="alert-count">7</span>
									<i class='bx bx-bell'></i>
								</a>-->
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
												<div class="notify bg-light-primary text-primary"><i class="bx bx-group"></i>
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
												<div class="notify bg-light-danger text-danger"><i class="bx bx-cart-alt"></i>
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
												<div class="notify bg-light-success text-success"><i class="bx bx-file"></i>
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
												<div class="notify bg-light-warning text-warning"><i class="bx bx-send"></i>
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
												<div class="notify bg-light-info text-info"><i class="bx bx-home-circle"></i>
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">New Product Approved <span class="msg-time float-end">2 hrs ago</span></h6>
													<p class="msg-info">Your new product has approved</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="notify bg-light-danger text-danger"><i class="bx bx-message-detail"></i>
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
												<div class="notify bg-light-success text-success"><i class='bx bx-check-square'></i>
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
												<div class="notify bg-light-primary text-primary"><i class='bx bx-user-pin'></i>
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
												<div class="notify bg-light-warning text-warning"><i class='bx bx-door-open'></i>
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
								<!--<a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"> <span class="alert-count">8</span>
									<i class='bx bx-comment'></i>
								</a>-->
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
													<img src="assets/images/avatars/avatar-1.png" class="msg-avatar" alt="user avatar">
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
													<img src="assets/images/avatars/avatar-2.png" class="msg-avatar" alt="user avatar">
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
													<img src="assets/images/avatars/avatar-3.png" class="msg-avatar" alt="user avatar">
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
													<img src="assets/images/avatars/avatar-4.png" class="msg-avatar" alt="user avatar">
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
													<img src="assets/images/avatars/avatar-5.png" class="msg-avatar" alt="user avatar">
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
													<img src="assets/images/avatars/avatar-6.png" class="msg-avatar" alt="user avatar">
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
													<img src="assets/images/avatars/avatar-7.png" class="msg-avatar" alt="user avatar">
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
													<img src="assets/images/avatars/avatar-8.png" class="msg-avatar" alt="user avatar">
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
													<img src="assets/images/avatars/avatar-9.png" class="msg-avatar" alt="user avatar">
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
													<img src="assets/images/avatars/avatar-10.png" class="msg-avatar" alt="user avatar">
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
													<img src="assets/images/avatars/avatar-11.png" class="msg-avatar" alt="user avatar">
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


						<div class="user-info ps-3">
							<a class="dropdown-item" href="<?= $panel_path . 'logout'; ?>" style="color: #fff;"><i class='bx bx-log-out-circle' style="color: #fff;"></i><span>Logout</span></a>
						</div>


					</div>
				</nav>
			</div>
		</header>
		<!--end header -->
		<div class="page-wrapper" style="background:#000">