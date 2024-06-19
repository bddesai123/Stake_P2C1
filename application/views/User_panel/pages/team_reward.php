<?php
$profile = $this->session->userdata("profile");
$user_id = $this->session->userdata("user_id");
$my_left_business = $this->team->team_by_business($user_id, 1);
$my_right_business = $this->team->team_by_business($user_id, 2);
?>
<div class="page-wrapper">
    <div class="page-content">
        <div class="user_content">
            <div class="card">
                <div class="card-body">
                    <div class="user_content">
                        <div class="goal_rank_tabel">
                            <div class="col-lg-12">
                                <div class="user_name">
                                    <div class="usernmae_dashbord">
                                        <h5>Our Left Busines</h5>
                                        <p><b><?= $currency; ?><?= $my_left_business ?  $my_left_business : 0; ?></b></p>
                                    </div>
                                    <div class="dashborad_plan">

                                        <h5>Our Right Business</h5>
                                        <p><b> <?= $currency; ?><?= $my_right_business ?  $my_right_business : 0; ?></b></p>
                                    </div>
                                </div>
                            </div>
                            <div class="card card-body card-bg-1">
                                <div class="table-responsive">
                                    <table class="<?= $this->conn->setting('table_classes'); ?>">
                                        <tbody>
                                            <tr>
                                                <th>Reward</th>
                                                <th>Left Business ($)</th>
                                                <th>Right Business ($)</th>
                                                <!-- <th>Income ($)/24hrs</th> -->
                                                <!-- <th>Max. Income ($)</th> -->
                                                <th>Status</th>
                                            </tr>
                                        </tbody>
                                        <tbody>
                                            <?php
                                            $datetime = date('Y-m-d H:i:s');
                                            $all_team = array();
                                            $userid = $this->session->userdata('user_id');
                                            $ttl_ben = $this->team->ben_pairs($userid);
                                            $arr = $this->conn->runQuery("*", 'plan', "1='1'");
                                            if ($arr) {
                                                for ($i = 0; $i < 10; $i++) {
                                                    $p = $i + 1;
                                                    $reward = $arr[$i]->reward;
                                                    $our_rank = $arr[$i]->package_name;
                                                    $left_bv_req = $arr[$i]->reward_team_business;
                                                    $right_bv_req = $arr[$i]->reward_team_business;


                                                    $goalstatus = ($my_left_business >= $left_bv_req &&  $my_right_business >= $right_bv_req && $profile->active_status == 1 ? 'Achieved' : 'Pending');

                                                    if ($goalstatus == "Achieved") {
                                                        $check_rank_ = $this->conn->runQuery('u_code', 'reward', "reward_id='$p' and u_code='$user_id' and reward='$our_rank'");
                                                        if (!$check_rank_) {
                                                            $rewardinsert['u_code'] = $user_id;
                                                            $rewardinsert['reward'] = $our_rank;
                                                            $rewardinsert['is_complete'] = 1;
                                                            $rewardinsert['reward_id'] = $p;
                                                            if ($this->db->insert('reward', $rewardinsert)) {
                                                                $income = array();
                                                                $income['u_code'] = $userid;
                                                                $income['tx_type'] = 'income';
                                                                $income['source'] = 'reward';
                                                                $income['debit_credit'] = 'credit';
                                                                $income['amount'] = $reward;

                                                                ///	$income['token']=$payable_amt1;					
                                                                $income['date'] = $datetime;
                                                                $income['added_on'] = date('Y-m-d H:i:s');
                                                                $income['status'] = 1;
                                                                $income['tx_record'] = $bonus_rank;
                                                                $income['txs_res'] = 1;
                                                                $income['wallet_type'] = 'roi_wallet';
                                                                $income['remark'] = "Recieve Matching Slab Bonus of amount $reward for Level $p";

                                                                if ($this->db->insert('transaction', $income)) {

                                                                    $this->update_ob->add_amnt($user_id, 'reward', $reward);
                                                                    $this->update_ob->add_amnt($user_id, 'main_wallet', $reward);
                                                                }
                                                            }
                                                        }
                                                        // $update_rank['my_rank']=$our_rank;
                                                        // $this->db->where('id',$user_id);
                                                        // $this->db->update('users',$update_rank);
                                                    }

                                            ?>
                                                    <tr>
                                                        <td><?= $p; ?></td>
                                                        <td><?= $currency; ?> <?= $left_bv_req; ?></td>
                                                        <td><?= $currency; ?> <?= $right_bv_req; ?></td>
                                                        <!-- <td><?= $income24; ?></td> -->
                                                        <!-- <td><?= $max_income; ?></td> -->
                                                        <td><?= $goalstatus; ?></td>
                                                    </tr>
                                            <?php }
                                            } ?>
                                        </tbody>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>