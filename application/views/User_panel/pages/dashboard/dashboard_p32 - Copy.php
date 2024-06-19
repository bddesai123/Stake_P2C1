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

<style>
    .profile_card_panel_design {
        margin-bottom: 0px;
        padding: 8px;
    }

    .profile_card_panel_design {
        margin-bottom: 10px;
        padding: 14px;
        border: 1px solid #0f143c;
    }

    @media only screen and (max-width:800px) {
        .profile_card_panel_design {
            flex-direction: column;
            align-items: baseline;
        }
    }

    .profile_card_panel_design {
        display: flex;


        background: #fff;
        margin-bottom: 0px;
        padding: 8px;
        border-radius: 6px;
        margin-bottom: 10px;
    }

    .profile_image-date.data_detail {
        display: inline-block;
        max-width: 160px;
        width: 100%;
    }

    .profile_image-date.data_detail h6 {
        font-size: 14px;
    }

    .profile-image-card-joning-date.data_detail h6 {
        font-size: 14px;
    }


    .profile_image-date.data_detail h6 {
        color: #000;
        line-height: 23px;
        text-transform: capitalize;
        font-size: 14px;
        letter-spacing: 1px;
        display: block;
        margin-bottom: 2px;
    }

    .profile_image-date.data_detail span {
        color: #fff;
        text-transform: capitalize;
        font-size: 13px;
    }

    .profile_image-date.data_detail span {
        color: #000 !important;
        text-transform: capitalize;
    }


    .h1,
    .h2,
    .h3,
    .h4,
    .h5,
    .h6,
    h1,
    h2,
    h3,
    h4,
    h5,
    h6 {
        color: #ffffff;
    }



    .user_inner_desc {
        padding: 20px;
        background: #202020;
        border-radius: 10px;
        margin-bottom: 15px;
        sl
    }

    .user_image_winner img {
        width: 100px;
        text-align: center;
        margin: auto;
        display: block;
    }

    .user_image_winner {
        margin-bottom: 15px;
    }

    .user_images_desc {
        text-align: center;
        margin-bottom: 10px;
    }

    .user_images_desc h4 {
        font-weight: 900;
        color: #ec65cb;
        font-size: 20px;
        text-transform: capitalize;
        margin-bottom: 2px;
    }

    .user_images_desc h6 {
        font-size: 14px;
    }

    .user_images_desc p {
        color: #fff;
        font-size: 20px;
        margin-bottom: 5px;
    }

    .user_images_desc b {
        color: #fff;
        font-size: 18px;
        text-transform: uppercase;
    }

    .user_date {
        padding: 6px 0px 0px 0px;
        border-top: 1px solid #edecea3b;
    }

    .user_date p {
        color: #fff;
        font-size: 12px;
        display: flex;
        justify-content: space-between;
        margin-bottom: 3px;
    }

    .user_image_winner h2 {
        text-align: center;
        padding: 9px 0px 0px 0px;
        color: #fff;
        text-transform: capitalize;
        font-size: 20px;
        font-weight: 700;
    }

    #countdown {
        font-size: 24px;
        font-weight: bold;
        text-align: center;
        margin-top: 50px;
    }
</style>


<?php
if ($currency == 'Rs') {

    $fas = "fa fa-inr";
} elseif ($currency == '$') {
    $fas = "fa fa-dollar";
}

?> <!--start page wrapper -->
<div class="page-content" style="background: black;">
    <div class="container">
        <div class="row">

            <?php
            $panel_pa = $this->conn->company_info('panel_directory');
            $this->load->view($panel_pa . '/pages/dashboard/alert');
            ?>


            <!--<div class="col-lg-6 col-md-12 col-sm-12">
	         <div class="demo_detail_section">
	             <div class="detail_welcome_section">
	             <h3 class="welcome_heading">Welcome Back,<?= $profile->name; ?>!</h3>
	             	<?php
                        $get_alert_mar = $this->conn->runQuery('*', 'notice_board', "type='marquee' and status='1' order by id desc");
                        if ($get_alert_mar) {
                        ?>
	             <marquee behavior="scroll" direction="left" scrollamount="10" class=""><?= $get_alert_mar[0]->description; ?></marquee>
	              <?php
                        } else { ?>
           	<marquee behavior="scroll" direction="left" scrollamount="10" class=""><?= $this->conn->company_info('news'); ?></marquee>
           <?php } ?>
	         </div>
	         </div>
	     </div>-->
            <!--	      <div class="col-lg-6 col-md-12 col-sm-12">
	     <div class="table-responsive-data">
<table class="table_foorex">
<tbody>



<tr>
    <th>User id: </th>
    <th><?= $this->session->userdata('profile')->username; ?></th>
    </tr>
<tr>
    <th>Full Name:</th>
    <th><?= $this->session->userdata('profile')->name; ?></th>
</tr>


<tr>
    <th>Status: </th>
    <th ><?php if ($status == 1) {
                echo "<span style='color:green; font-size:20px;'> Active</span>";
            } else {
                echo "<span style='color:red; font-size:20px;'> InActive</span>";
            } ?></th>
    </tr>

</tbody>
</table>
</div>
                        </div>-->


        </div>
        <!--first-row-start -->
        <div class="row">
            <div class="col-12">
                <div class="banner">

                    <div class="page-content col-lg-8 col-md-12">
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

                    </div>

                </div>
            </div>
        </div>
        <!--first-row-end-->
        <!--    <div id="demo" class="carousel slide" data-bs-ride="carousel" style="padding-bottom: 60px;">-->


        <!--<div class="carousel-indicators">-->
        <!--  <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>-->
        <!--  <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>-->
        <!--  <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>-->
        <!--</div>-->

        <!-- The slideshow/carousel -->
        <!--<div class="carousel-inner">-->
        <!--  <div class="carousel-item active">-->
        <!--    <img src="<?= $this->conn->company_info('banner1'); ?>" alt="Los Angeles" class="d-block" style="width:100%">-->
        <!--  </div>-->
        <!--  <div class="carousel-item">-->
        <!--    <img src="<?= $this->conn->company_info('banner2'); ?>" alt="Chicago" class="d-block" style="width:100%">-->
        <!--  </div>-->
        <!--  <div class="carousel-item">-->
        <!--    <img src="<?= $this->conn->company_info('banner3'); ?>" alt="New York" class="d-block" style="width:100%">-->
        <!--  </div>-->
        <!--</div>-->

        <!-- Left and right controls/icons -->
        <!--  <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">-->
        <!--    <span class="carousel-control-prev-icon"></span>-->
        <!--  </button>-->
        <!--  <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">-->
        <!--    <span class="carousel-control-next-icon"></span>-->
        <!--  </button>-->
        <!--</div>-->



        <div class="row">
            <div class="col-xl-8">
                <div class="row">
                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <div class="demo_detail_section data5" style="border-style: double;background: #202020;border-color: blueviolet;" ;>
                            <div class="detail_welcome_section">
                                <h3 class="welcome_heading">My Staking</h3>
                                <!--<p>This month </p>-->
                                <?php
                                $total_order_amountss = $this->conn->runQuery('SUM(order_amount) as order_amts', 'orders', "u_code='$user_id' ")[0]->order_amts;
                                ?>
                                <h5><span style=""><?= $currency; ?></span>&nbsp;<?= ($total_order_amountss) ? ($total_order_amountss) : 0; ?></h5>
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
                        <div class="col-lg-<?= $col; ?> col-md-12 col-sm-12">
                            <div class="demo_detail_section data1" style="border: #991818;background: linear-gradient(to top, #4f39b3de, #4f39b3de)  !important;border-style: double;">
                                <div class="detail_welcome_section">
                                    <h3 class="welcome_heading"><?= $income->name; ?></h3>
                                    <!--<p>This month</p>-->
                                    <h5><span style=""><?= $currency; ?></span>&nbsp;<?= $ttl[] = round(!empty($wallet_balance) && isset($wallet_balance->$slug) ? $wallet_balance->$slug : 0, 2); ?></h5>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                    <!--<div class="col-lg-6 col-md-12 col-sm-12">-->
                    <!--      <div class="demo_detail_section data1">-->
                    <!--         <div class="detail_welcome_section">-->
                    <!--          <h3 class="welcome_heading">Total Income</h3>-->

                    <!--          <h5><?= ($total) ? ($total) : 0; ?></h5>-->
                    <!--      </div>-->
                    <!--      </div>-->
                    <!--  </div>-->

                </div>
            </div>

            <div class="col-xl-4 ">
                <div class="row">
                    <div class="col-12">
                        <div class="user_inner_desc">
                            <div class="user_images_desc">
                                <h4><?= $this->session->userdata('profile')->username; ?> </h4>
                                <h6><?= $this->session->userdata('profile')->name; ?></h6>
                                <br>
                                <!-- <div class="user_date">
                          
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
                          
                          <p>Earned Yield <span>Remaining Yield</span></p>
                          <p><?= $currency; ?>&nbsp;<?= round($total, 2) ? round($total, 2) : 0; ?><span><?= $currency; ?>&nbsp;
                          <?= ($subtraction_result) ? ($subtraction_result) : 0; ?></span></p> -->
                            </div>
                            <div class="user_date">

                                <?php
                                $profile = $this->profile->profile_info($user_id);

                                ?>

                                <p>Activation date <span><?php echo $profile->active_date; ?></span></p>
                                <p>Join date <span><?php echo $profile->added_on; ?></span></p>
                            </div>

                        </div>
                    </div>
                    <!-- <div class="col-12 ">
                    <div class="demo_detail_section data5" style="border-style: double;background: #202020;border-color: blueviolet;";>
                        <div class="detail_welcome_section">
            	             
            	          
            	             <?php
                                $curr_date = date('Y-m-d H:i:s');
                                $order_expiredate = $this->conn->runQuery("*", "orders", "u_code='$user_id'", "id DESC", 1)[0]->expire_on;
                                $order_payout_status = $this->conn->runQuery("*", "orders", "u_code='$user_id'", "id DESC", 1)[0]->payout_status;
                                $finalDatetime = date('Y-m-d H:i:s', strtotime('+72 hours', strtotime($order_expiredate)));
                                if ($finalDatetime >= $curr_date && $order_payout_status == 1) {
                                    $currentDatetime = date('Y-m-d H:i:s');
                                    $expireTimestamp = strtotime($order_expiredate);
                                    $currentTimestamp = strtotime($currentDatetime);

                                    $remainingSeconds = $expireTimestamp - $currentTimestamp;

                                    // Update the countdown every second
                                    $countdownInterval = 1000; // Milliseconds (1 second)

                                ?>
            	                    <h3 class="welcome_heading">Expiring On</h3>
            	             <h5><?= $finalDatetime ?> </h5>
            	               <div id="countdown" style="color:red;"></div>
            	             <?php
                                }
                                if ($finalDatetime < $curr_date && $order_payout_status == 1) {

                                ?>           
            	                    
            	                  <h5 style="color: #e90a3d;"> Your Id Expired</h5>
            	                 <?php
                                } ?>
            	             <?php
                                if ($order_payout_status == 0) {

                                ?>           
            	              
            	                  
            	                 <?php
                                }
                                    ?>
            	             
            	             <?php
                                $active_status = $this->conn->runQuery("active_status", "users", "id='$user_id'", "id DESC", 1)[0]->active_status;
                                if ($active_status == 0) {
                                ?>           
            	              
            	                  <h5 style="color: #e90a3d;"> Please Active Your Id</h5>
            	                 <?php

                                } ?>
            	             <?php
                                $order_payout_status = $this->conn->runQuery("*", "orders", "u_code='$user_id'", "id DESC", 1)[0]->payout_status;
                                if ($order_payout_status == 0 && $order_payout_status != NULL) { ?>
            	               <h5 style="color: green;">Staking Active</h5>
            	             <?php
                                } ?>
            	             
                        </div>
                    </div>
                </div> -->
                </div>
            </div>


        </div>

        <div class="row">
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

                <div class="col-lg-4 col-md-12 col-sm-12">
                    <div class="demo_detail_section data" style="background-color: #4f39b3de;">
                        <div class="detail_welcome_section ">
                            <div class="inner_side_content">
                                <div class="data_detail_inner">
                                    <p><?= $section->name; ?></p>
                                    <h4><span style=""><?= $currency; ?></span>&nbsp;<?= round(!empty($wallet_balance) && isset($wallet_balance->$slug1) ? $wallet_balance->$slug1 : 0, 2); ?></h4>
                                </div>
                                <div class="data_detail_inner_icon">
                                    <?php
                                    if ($slug1 != 'c19') {
                                    ?>
                                        <i class="<?= $fas; ?>" aria-hidden="true"></i>
                                    <?php } else {
                                    ?>
                                        <i class="fa fa-thumb-tack" aria-hidden="true"></i>
                                    <?php

                                    } ?>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>

            <?php
            foreach ($withdrawals as $section) {
                $slug1 =  $section->wallet_column;
            ?>
                <div class="col-lg-6 col-md-12 col-sm-12">
                    <div class="demo_detail_section detail" style="background-color: #4f39b3de;">
                        <div class="detail_welcome_section ">
                            <div class="inner_side_content">
                                <div class="data_detail_inner">
                                    <p><?= $section->name; ?></p>
                                    <h4><?= ($slug == 'c1' ? $currency : ''); ?>&nbsp;<?= round(!empty($wallet_balance) && isset($wallet_balance->$slug1) ? $wallet_balance->$slug1 : 0, 2); ?></h4>
                                </div>
                                <div class="data_detail_inner_icon">
                                    <i class="<?= $fas; ?>" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            <?php
            }
            ?>
            <div class="col-lg-6 col-md-12 col-sm-12">
                <div class="demo_detail_section detail" style="background-color: #4f39b3de;">
                    <div class="detail_welcome_section ">
                        <div class="inner_side_content">
                            <div class="data_detail_inner">
                                <p>Total Income</p>
                                <h4><?= ($total) ? ($total) : 0; ?></h4>
                            </div>
                            <div class="data_detail_inner_icon">
                                <i class="<?= $fas; ?>" aria-hidden="true"></i>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">



            <!--<div class="col-lg-6 col-md-12 col-sm-12">-->
            <!--      <div class="demo_detail_section detail">-->
            <!--         <div class="detail_welcome_section ">-->
            <!--          <div class="inner_side_content">-->
            <!--                 <div class="data_detail_inner">-->
            <!--                     <p>Total Income</p>-->
            <!--                     <h4><?= ($total) ? ($total) : 0; ?></h4>-->
            <!--                 </div>-->
            <!--                 <div class="data_detail_inner_icon">-->
            <!--                     <i class="<?= $fas; ?>" aria-hidden="true"></i>-->

            <!--                 </div>-->
            <!--             </div>-->
            <!--      </div>-->
            <!--      </div>-->
            <!--  </div>
	   <!--  <div class="col-lg-4 col-md-12 col-sm-12">
	         <div class="demo_detail_section">
	            <div class="detail_welcome_section">
	             <div class="inner_side_content">
	                    <div class="data_detail_inner">
	                        <p>Total Orders</p>
	                        <h4>4805</h4>
	                    </div>
	                    <div class="data_detail_inner_icon">
	                        <i class="fa fa-inr" aria-hidden="true"></i>
	                        
	                    </div>
	                </div>
	         </div>
	         </div>
	     </div>
	    -->

        </div>
        <div class="row">
            <!-- <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
    <div class="card card-body card-bg-1">
        <h6>Fund Convert</h6>

         <?php
            echo form_open($panel_path . 'fund/fund-convert');

            $userid = $this->session->userdata('user_id');
            $currency = $this->conn->company_info('currency');

            $convert_from_wallets = $this->conn->setting('convert_from_wallets');
            $convert_to_wallets = $this->conn->setting('convert_to_wallets');

            ?>
        <div class="form-group">
            <label for="" class="text-dark ">Select From Wallet</label>
            <select name="from_wallet" class="check_balance form-control" data-response="from_area" >
                <option value="" class="text-dark ">Select Wallet</option>
                <?php
                $convert_from_wallet_arr = json_decode($convert_from_wallets, true);
                foreach ($convert_from_wallet_arr as $sl => $wl_name) {
                ?>
                        <option value="<?= $sl; ?>"><?= $wl_name; ?></option>
                        <?php
                    }
                        ?>
            </select>
             <span id="from_area" class="text-danger " ><?= form_error('from_wallet'); ?></span>
        </div>
        <div class="form-group">
            <label for="" class="text-dark ">Select To Wallet</label>
            <select name="to_wallet" class="form-control">
                <option value="" class="text-dark ">Select Wallet</option>
                <?php
                $convert_to_wallet_arr = json_decode($convert_to_wallets, true);
                foreach ($convert_to_wallet_arr as $sl => $wl_name) {
                ?>
                        <option value="<?= $sl; ?>"><?= $wl_name; ?></option>
                        <?php
                    }
                        ?>
            </select>
            <span class="text-danger "><?= form_error('to_wallet'); ?></span>
        </div>
             
        <div class="form-group">
            <label for="" class="text-dark ">Enter Amount</label>
            <input type="number" name="amount" id="amount" value="<?= set_value('amount'); ?>" class="form-control" placeholder="Enter Amount" aria-describedby="helpId">
            <span class="text-danger " ><?= form_error('amount'); ?></span>  
        </div>           
        <br>
            <input type="submit" class="user_btn_button" name="convert_btn"  value="Convert">
        </form>
    </div>
    </div>-->

            <div class="col-lg-6 col-md-12 col-sm-12">
                <?php
                $plan_type = $this->conn->setting('reg_type');
                if ($plan_type != 'binary') {
                ?>
                    <div class="demo_detail_section" style="background-color: #4f39b3de;">
                        <div class="card_new_body">

                            <div class="earn_refer_title">
                                <div class="user_eran_heading">
                                    <h5>Refer Us &amp; Earn</h5>
                                    <p>Use the bellow link to invite your friends.</p>
                                </div>
                                <div class="user_invite">
                                    <a href="<?php echo base_url('register?ref=' . $profile->username); ?>" class="user_anchor">Invite</a>
                                </div>
                            </div>
                            <div class="text-input">
                                <!--  <div class="input-group-prepend">
            			<span class="input-group-text text-black label_font">Referral Link</span>
            		  </div>-->
                                <input style="width:100%;color: white;" type="text" id="referral_link_right" class="" value="<?php echo $right_link = base_url('register?ref=' . $profile->username); ?>" aria-describedby="basic-addon1">

                                <button type="submit" class="btn " onclick="copyLink('right')" style="padding: 9px 9px 9px;padding-bottom:-1px">
                                    <i class="fa fa-copy" style="color:#f9b707;font-size: 18px;"></i>
                                </button>
                                <a href="<?php echo $right_link; ?>" target="_blank" class=""> <button type="submit" class="btn " style="color: #fff; padding: 9px 9px 9px ;">
                                        <i class="fa fa-link" style="color:#f9b707; font-size: 18px;"></i></a></button>

                                <a href="whatsapp://send?text=<?php echo $right_link; ?>" target="_blank" data-action="share/whatsapp/share"> <button type="submit" class="btn" style="padding: 9px 9px 9px;">
                                        <i class="fa fa-whatsapp" style="color: green;font-size: 18px;"></i></a> </button>
                            </div>
                        </div>
                    </div>
                <?php
                }
                if ($plan_type == 'binary') {
                ?>
                    <div class="demo_detail_section" id="section_tema_detail_data" style="background-color: #4f39b3de;">
                        <div class="card_new_body">

                            <div class="earn_refer_title">
                                <div class="user_eran_heading">
                                    <h5>Refer Us &amp; Earn</h5>
                                    <p>Use the bellow link to invite your friends.</p>
                                </div>
                                <div class="user_invite">
                                    <a href="<?php echo base_url('register?ref=' . $profile->username); ?>" class="user_anchor">Invite</a>
                                </div>
                            </div>

                            <div class="input-group card-bg-2 ">
                                <div class="input-group-prepend">
                                    <span class="input-group-text text-black label_font">Left Referral</span>
                                </div>
                                <input type="text" style="height:50px;" id="referral_link_left" class="form-control" value="<?php echo $left_link = base_url('register?ref=' . $profile->username . "&position=1"); ?>">
                                <div class="input-group-append">
                                    <div class="input-group-btn ml-2">
                                        <button type="submit" class="btn btn-default" onclick="copyLink1('left')">
                                            <i class="fa fa-copy" style="color: #feb302; font-size: 18px;"></i>
                                        </button>
                                        <a href="<?php echo $left_link; ?>" target="_blank"><button type="submit" class="btn btn-default">
                                                <i class="fa fa-link" style="color: #feb302; font-size: 18px;"></i>
                                        </a></button>
                                        <a class="" href="whatsapp://send?text=<?php echo urlencode($left_link); ?>" target="_blank" data-action="share/whatsapp/share"><button type="submit" class="btn btn-default">
                                                <i class="fa fa-whatsapp" style="color: green; font-size: 18px;"></i>
                                        </a></button>
                                    </div>
                                </div>

                            </div>
                            <br>
                            <div class="input-group card-bg-2 ">
                                <div class="input-group-prepend">
                                    <span class="input-group-text text-black label_font" style="background-color">Right Referral</span>
                                </div>
                                <input type="text" style="height:50px;" id="referral_link_right" class="form-control" value="<?php echo $right_link = base_url('register?ref=' . $profile->username . "&position=2"); ?>">
                                <div class="input-group-append">
                                    <div class="input-group-btn ml-2">
                                        <button type="submit" class="btn btn-default" onclick="copyLink('right')">
                                            <i class="fa fa-copy" style="color: #feb302; font-size: 18px;"></i>
                                        </button>
                                        <a href="<?php echo $right_link; ?>" target="_blank"><button type="submit" class="btn btn-default">
                                                <i class="fa fa-link" style="color: #feb302; font-size: 18px;"></i>
                                        </a></button>
                                        <a class="" href="whatsapp://send?text=<?php echo urlencode($right_link); ?>" target="_blank" data-action="share/whatsapp/share"><button type="submit" class="btn btn-default">
                                                <i class="fa fa-whatsapp" style="color: green; font-size: 18px;"></i>
                                        </a></button>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                <?php
                }
                ?>


            </div>




            <div class="col-lg-6 col-md-12 col-sm-12">
                <div class="demo_detail_section" id="section_tema_detail_data" style="background-color: #4f39b3de;">
                    <h2> Team Section</h2>
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


                        <div class="user_list_team">
                            <ul>
                                <li><i class="fa fa-<?= $icon; ?>" style="color:<?= $cl; ?>;"></i>
                                    <span><?= (!empty($wallet_balance) && isset($wallet_balance->$slug) ? $wallet_balance->$slug : 0); ?></span><?= $section->name; ?>
                                </li>
                            </ul>
                        </div>
                    <?php
                    }
                    ?>
                    <!--<div class="user_list_team">
                        <ul>
                            <li><i class="fa fa-users" style="color:#fb6b25;"></i>
                                <span>5</span>Active generation </li>
                        </ul>
                    </div>
                    <div class="user_list_team">
                        <ul>
                            <li><i class="fa fa-user-plus"></i>
                                <span>2</span>Left team </li>
                        </ul>
                    </div>
                    <div class="user_list_team">
                        <ul>
                            <li><i class="fa fa-user-plus"></i>
                                <span>0</span>Right team </li>
                        </ul>
                    </div>
                    <div class="user_list_team">
                        <ul>
                            <li><i class="fa fa-users"></i>
                                <span>0</span>Carry </li>
                        </ul>
                    </div>-->
                </div>
            </div>
        </div>


        <div class="row">

            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="demo_detail_section" id="section_tema_detail_data" style="background-color: #4f39b3de;">
                    <div class="card_new_body">

                        <div class="location_link">
                            <h2>We're here to help you!</h2>
                            <p>Ask a question or file a support ticket, manage request, report an issues. Our team support team will get back to you by email.</p>
                            <div class="user_support">
                                <a href="<?= $panel_path . 'support'; ?>" class="user_anchor">Get Support Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<br>
<?php
$datetime = DateTime::createFromFormat('Y-m-d H:i:s', $finalDatetime);
$formattedDatetime = $datetime->format('D M d Y H:i:s \G\M\TO (e)');
//echo $formattedDatetime;
?>
<script>
    var storedTargetTime = localStorage.getItem("targetTime");

    // Retrieve the target time from PHP and convert it to a Unix timestamp in milliseconds
    var targetTime = storedTargetTime ? parseInt(storedTargetTime) : new Date("<?php echo $formattedDatetime ?>").getTime();
    console.log(targetTime);
    var currentTime = new Date().getTime();
    var remainingTime = targetTime - currentTime;

    if (remainingTime <= 0) {
        document.getElementById("countdown").innerHTML = "ID Expired!";
    } else {
        var countdownInterval = setInterval(updateCountdown, 1000);
    }

    function updateCountdown() {
        var currentTime = new Date().getTime();
        var remainingTime = targetTime - currentTime;

        if (remainingTime <= 0) {
            clearInterval(countdownInterval);
            document.getElementById("countdown").innerHTML = "ID Expired!";
            return;
        }

        var hours = Math.floor(remainingTime / (1000 * 60 * 60));
        var minutes = Math.floor((remainingTime % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((remainingTime % (1000 * 60)) / 1000);

        var countdownString = hours + "h " + minutes + "m " + seconds + "s";
        document.getElementById("countdown").innerHTML = countdownString;

        // Store the target time in local storage
        localStorage.setItem("targetTime", targetTime);
    }
</script>




<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>