	<!--start page wrapper -->
	<?php
    error_reporting(0);
    $plan_type = $this->session->userdata('reg_plan');
    $profile = $this->session->userdata("profile");
    $user_id = $this->session->userdata('user_id');
    $plan = $this->conn->runQuery("*", 'plan', "1=1");
    $website_settings = $this->conn->plan_setting("dashboard");
    $currency = $this->conn->company_info('currency');
    $incomes = $this->conn->runQuery("*", 'wallet_types', "wallet_type='income' and  status='1' and $plan_type='1'");
    $team = $this->conn->runQuery("*", 'wallet_types', "wallet_type='team' and  status='1' and $plan_type='1'");
    $wallets = $this->conn->runQuery("*", 'wallet_types', "wallet_type IN ('wallet','pin') and  status='1'  and $plan_type='1'");
    $withdrawals = $this->conn->runQuery("*", 'wallet_types', "wallet_type = 'withdrawal' and  status='1'  and $plan_type='1'");
    $payouts = $this->conn->runQuery("*", 'wallet_types', "wallet_type = 'payout' and  status='1'  and $plan_type='1'");
    $w_balance = $this->conn->runQuery('*', 'user_wallets', "u_code='$user_id'");
    $wallet_balance = $w_balance ? $w_balance[0] : array();
    // date(date)=DATE(NOW())

    $total = $this->conn->runQuery('SUM(amount) as total', 'transaction', "u_code='$user_id' and tx_type='income'")[0]->total;
    $my_package1 = $this->business->package($user_id);
    // $my_package=$this->business->package_all($user_id);

    $u_sponsorssss = $this->conn->runQuery('u_sponsor', 'users', "id='$user_id' and 1=1");
    $spons_id = $u_sponsorssss[0]->u_sponsor;
    $u_spos = $this->conn->runQuery('username,name', 'users', "id='$spons_id' and 1=1");

    if (is_object($u_spos[0])) {
        $sponsor_name = $u_spos[0]->name;
        $sponsor_username = $u_spos[0]->username;
    }
    $u_profile = $this->conn->runQuery('*', 'users', "id='$user_id' and 1=1");
    $status = $u_profile[0]->active_status;
    $active_date = $u_profile[0]->active_date;
    $user_name = $u_profile[0]->name;

    $latest_package = $this->conn->runQuery('*', 'orders', "u_code='$user_id' ORDER BY id DESC LIMIT 1");


    ?>
	<?php
    if ($currency == 'Rs') {

        $fas = "fa fa-inr";
    } elseif ($currency == '$') {
        $fas = "fa fa-dollar";
    }

    ?>
	<div class="page-wrapper">
	    <div class="page-content">
	        <h3 class="mb-1">Welcome back! <?= $user_name; ?>(<?= $this->session->userdata('profile')->username; ?>)</h3>
	        <?php
            $get_alert_mar = $this->conn->runQuery('*', 'notice_board', "type='marquee' and status='1' order by id desc");
            //echo $this->db->last_query();
            //die();
            if ($get_alert_mar) {
                // print_R($get_alert_mar);
            ?>
	            <marquee behavior="scroll" direction="left" scrollamount="10" class="description_marquee"><?= $get_alert_mar[0]->description; ?></marquee>
	        <?php
            } else { ?>
	            <marquee behavior="scroll" direction="left" scrollamount="10" class="description_marquee"><?= $this->conn->company_info('news'); ?></marquee>

	        <?php } ?>
	        <div class="card radius-10">
	            <div class="row row-cols-1 row-cols-md-2 row-cols-xl-4 row-group g-0">
	                <div class="col">
	                    <div class="card-body">

	                        <div class="d-flex align-items-center">
	                            <h5 class="mb-0">$ 0</h5>
	                            <div class="ms-auto">
	                                <i class='fs-3 text-white'></i>
	                            </div>
	                        </div>
	                        <div class="progress my-3" style="height:3px;">
	                            <div class="progress-bar" role="progressbar" style="width: 55%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
	                        </div>
	                        <div class="d-flex align-items-center text-white">
	                            <p class="mb-0">My Staking</p>
	                            <?php
                                $total_order_amountss = $this->conn->runQuery('SUM(order_amount) as order_amts', 'orders', "u_code='$user_id' ")[0]->order_amts;
                                ?>
	                            <p class="mb-0 ms-auto"><span style=""><?= $currency; ?></span>&nbsp;<?= ($total_order_amountss) ? ($total_order_amountss) : 0; ?><span><i class='bx bx-up-arrow-alt'></i></span></p>
	                        </div>
	                    </div>
	                </div>

	                <?php
                    $ttl = array();
                    foreach ($incomes as $income) {
                        $slug =  $income->wallet_column;
                        if ($slug == 'c15') {
                            $col = '6';
                        } elseif ($slug == 'c4') {
                            $col = '6';
                        } else {
                            $col = '6';
                        }
                    ?>
	                    <div class="col">
	                        <div class="card-body">

	                            <div class="d-flex align-items-center">
	                                <h5 class="mb-0"><?= $currency; ?></span>&nbsp;<?= $ttl[] = round(!empty($wallet_balance) && isset($wallet_balance->$slug) ? $wallet_balance->$slug : 0, 2); ?></h5>
	                                <div class="ms-auto">
	                                    <i class='fs-3 text-white'></i>
	                                </div>
	                            </div>
	                            <div class="progress my-3" style="height:3px;">
	                                <div class="progress-bar" role="progressbar" style="width: 55%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
	                            </div>
	                            <div class="d-flex align-items-center text-white">
	                                <p class="mb-0"><?= $income->name; ?></p>
	                                <p class="mb-0 ms-auto"><?= $currency; ?></span>&nbsp;<?= $ttl[] = round(!empty($wallet_balance) && isset($wallet_balance->$slug) ? $wallet_balance->$slug : 0, 2); ?> <span><i class='bx bx-up-arrow-alt'></i></span></p>
	                            </div>
	                        </div>
	                    </div>

	                <?php } ?>

	            </div><!--end row-->
	        </div>


	        <div class="row align-start">
	            <div class="col-12 col-lg-8 col-xl-8 d-flex">
	                <div class="card radius-10 w-100 ">
	                    <div class="col-lg-12">
	                        <div class="user_name" style="">
	                            <div class="usernmae_dashbord">
	                                <h1><?= $this->session->userdata('profile')->username; ?></h1>
	                                <p><?= $this->session->userdata('profile')->name; ?></p>
	                                <?php
                                    $profile = $this->profile->profile_info($user_id);
                                    $actives_directs = $this->conn->runQuery('SUM(c9) as actives_directs ', 'user_wallets', "u_code='$user_id' ")[0]->actives_directs;

                                    if ($actives_directs >= 2) {
                                        $yieldx = 3;
                                    } elseif ($actives_directs < 2) {
                                        $yieldx = 2;
                                    }
                                    $subtraction_result = ($total_order_amountss * $yieldx) - round($total, 2);

                                    //  echo "actives_directs".$actives_directs;die;
                                    ?>
	                            </div>
	                            <div class="dashborad_plan">
	                                <?php
                                    $profile = $this->profile->profile_info($user_id);

                                    ?>
	                                <p>Activation date <span><?php echo $profile->active_date; ?></span></p>
	                                <p>Join date <span><?php echo $profile->added_on; ?></span></p>
	                            </div>
	                        </div>
	                    </div>
	                </div>
	            </div>

	            <div class="col-12 col-lg-4 col-xl-4 d-flex">
                <div class="card radius-10 overflow-hidden w-100">
					<div class="card-body">
						<div class="d-flex align-items-center">
							<div>

								<?php
								$plan_type = $this->conn->setting('reg_type');
								if ($plan_type == 'binary') {
								?>
							</div>
						</div>
						<div class="col-12">
							<div class="refreal_data_links">
								<h3>Referral Link </h3>
								<br>
								<h3>Left</h3>
								<div class="wallet_input">
									<input type="text" class="form-control linkToCopy" id="referral_link_left" maxlength="" value="<?php echo $left_link = base_url('register?ref=' . $profile->username . "&position=1"); ?>">
									<button class="copy_button copyButton btn-dark" onclick="copyLink1('left')" style="z-index: 999;">
										<i class="fa-regular fa-copy"></i>
									</button>

								</div>
								<br>
								<br>
								<h3>Right</h3>
								<div class="wallet_input">

									<input type="text" class="form-control linkToCopy" id="referral_link_right" maxlength="" value="<?php echo $right_link = base_url('register?ref=' . $profile->username . "&position=2"); ?>">
									<button class="copy_button copyButton btn-dark" onclick="copyLink('right')" style="z-index: 999;">
										<i class="fa-regular fa-copy"></i>
									</button>
								</div>
							<?php
								} else {
							?>

								<div class="wallet_input">
									<input type="text" class="form-control linkToCopy" maxlength="" value="<?php echo $left_link = base_url('register?ref=' . $profile->username); ?>">
									<button id="" class="copy_button copyButton" data-clipboard-text="" onclick="copyLink1('left')">
										<i class="fa fa-copy "></i></button>
								<?php } ?>


								</div>
							</div>
						</div>
					</div>
				</div>
	            </div><!--End Row-->


	            <div class="row row-cols-1 row-cols-lg-3">
	                <?php

                    foreach ($wallets as $section) {
                        $slug1 =  $section->wallet_column;
                        if ($slug1 != 'c19') {
                            $currencys = $this->conn->company_info('currency');
                            $icon = 'money';
                        } else {
                            $currencys = '';
                            $icon = 'thumb-tack';
                        }
                    ?>
	                    <div class="col">
	                        <div class="card radius-10">
	                            <div class="card-body">
	                                <div class="d-flex align-items-center">
	                                    <div class="w_chart easy-dash-chart" data-percent="60">
	                                        <span class="w_percent">
	                                            <img src="<?= $panel_url; ?>assets/images/pay-per-click-unscreen.gif" alt="" class="w-100">
	                                        </span>
	                                    </div>
	                                    <div class="ms-3">
	                                        <h6 class="mb-0"><?= $section->name; ?> </h6>
	                                        <small class="mb-0"><?= $currency; ?></span>&nbsp;<?= round(!empty($wallet_balance) && isset($wallet_balance->$slug1) ? $wallet_balance->$slug1 : 0, 2); ?></small>
	                                    </div>

	                                </div>
	                            </div>
	                        </div>
	                    </div>
	                <?php } ?>

	                <?php
                    foreach ($withdrawals as $section) {
                        $slug1 =  $section->wallet_column;
                    ?>
	                    <div class="col">
	                        <div class="card radius-10">
	                            <div class="card-body">
	                                <div class="d-flex align-items-center">
	                                    <div class="w_chart easy-dash-chart" data-percent="75">
	                                        <span class="w_percent">
	                                            <img src="<?= $panel_url; ?>assets/images/clock-unscreen.gif" alt="" class="w-100">
	                                        </span>
	                                    </div>
	                                    <div class="ms-3">
	                                        <h6 class="mb-0"><?= $section->name; ?></h6>
	                                        <small class="mb-0"><?= ($slug == 'c1' ? $currency : ''); ?>&nbsp;<?= round(!empty($wallet_balance) && isset($wallet_balance->$slug1) ? $wallet_balance->$slug1 : 0, 2); ?></small>
	                                    </div>

	                                </div>
	                            </div>
	                        </div>
	                    </div>
	                <?php } ?>
	                <div class="col">
	                    <div class="card radius-10">
	                        <div class="card-body">
	                            <div class="d-flex align-items-center">
	                                <div class="w_chart easy-dash-chart" data-percent="75">
	                                    <span class="w_percent">
	                                        <img src="<?= $panel_url; ?>assets/images/clock-unscreen.gif" alt="" class="w-100">
	                                    </span>
	                                </div>
	                                <div class="ms-3">
	                                    <h6 class="mb-0">Total Income</h6>
	                                    <small class="mb-0"><?= ($total) ? ($total) : 0; ?></small>
	                                </div>

	                            </div>
	                        </div>
	                    </div>
	                </div>
	            </div>





	            <div class="row">
	                <div class="col-lg-12 col-md-12 col-sm-12">
	                    <div class="sponser_name_team">
	                        <div class="package_sponser_name">
	                            <div class="sponser_inner_content">

	                                <h4>Team Section</h4>
	                            </div>
	                            <div class="sponser_inner_content_image">
	                                <img src="<?= $panel_url; ?>assets/images/teamwork.png">
	                            </div>
	                        </div>
	                        <div class="team_pv">
	                            <?php
                                foreach ($team as $section) {
                                    $slug =  $section->wallet_column;
                                    //print_R($slug);
                                    if ($slug == 'c8') {
                                        $cl = "";
                                        $icon = "users";
                                    } elseif ($slug == 'c9') {
                                        $cl = "#f9b707";
                                        $icon = "user";
                                    } elseif ($slug == 'c10') {
                                        $cl = "";
                                        $icon = "users";
                                    } elseif ($slug == 'c11') {
                                        $cl = "#f9b707";
                                        $icon = "users";
                                    } elseif ($slug == 'c12') {
                                        $cl = "";
                                        $icon = "users";
                                    } elseif ($slug == 'c13') {
                                        $cl = "";
                                        $icon = "user-plus";
                                    } elseif ($slug == 'c14') {
                                        $cl = "";
                                        $icon = "user-plus";
                                    } elseif ($slug == 'c24') {
                                        $cl = "";
                                        $icon = "users";
                                    } elseif ($slug == 'c25') {
                                        $cl = "";
                                        $icon = "users";
                                    }
                                ?>
	                                <div class="team_pv_data">
	                                    <span><?= $section->name; ?> </span>
	                                    <h6><?= (!empty($wallet_balance) && isset($wallet_balance->$slug) ? $wallet_balance->$slug : 0); ?></h6>
	                                </div>
	                            <?php
                                }
                                ?>
	                        </div>
	                    </div>
	                </div>
	            </div><!--End Row-->

	        </div>
	    </div>