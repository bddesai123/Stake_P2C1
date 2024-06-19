<?php
$profile = $this->session->userdata("profile");
$user_id = $this->session->userdata("user_id");
?>
<style>
   .goal_reward_tabel {

      background: var(--bg) !important;

      box-shadow: rgb(0 0 0 / 20%) 0px 5px 15px;
      border-radius: 8px;
      margin-bottom: 15px;
      padding: 16px;
      overflow: auto;
   }

   .goal_reward_tabel th {
      color: var(--text2);
      border: none;
   }

   .user_name {
      background: var(--first);
      box-shadow: rgba(0, 0, 0, 0.2) 0px 5px 15px;
      border-radius: 8px;
      margin-bottom: 15px;
      padding: 16px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      border: 1px solid rgba(234, 240, 247, 0) !important;
   }
</style>

<div class="page-wrapper">
   <div class="page-content">
      <div class="user_content">
         <div class="card">
            <div class="card-body">
               <div class="user_content">

                  <div class="goal_reward_tabel">
                     <!-- <div class="col-lg-12">
                            <div class="user_name" style="background-color: #fff;">
                                <div class="usernmae_dashbord">
                                    <h5>Our Left Busines</h5>
                                    <p><b><?= $currency; ?><?= $my_left_business; ?></b></p>
                                </div>
                                <div class="dashborad_plan">
                                  
                                    <h5>Our Right Business</h5>
                                    <p><b> <?= $currency; ?><?= $my_right_business; ?></b></p>
                                </div>
                            </div>
                        </div> -->
                     <div class="card card-body card-bg-1">
                        <div class="table-responsive">
                           <table class="<?= $this->conn->setting('table_classes'); ?>">
                              <tbody>
                                 <tr>
                                    <th>Club Name</th>

                                    <th>Royalty</th>

                                    <th>Status</th>
                                 </tr>
                              </tbody>
                              <tbody>
                                 <?php
                                 $all_team = array();
                                 $userid = $this->session->userdata('user_id');
                                 $arr = $this->conn->runQuery("*", 'plan', "1='1'");
                                 $order_amount = $this->conn->runQuery("SUM(order_amount) as orderamount", 'orders', "1='1'")[0]->orderamount;
                                 $active_direct = $this->conn->runQuery("SUM(c9) as active_direct", 'user_wallets', "u_code='$userid'")[0]->active_direct;

                                 if ($arr) {
                                    for ($i = 0; $i < 6; $i++) {
                                       $p = $i + 1;
                                       $our_royalty = $arr[$i]->royalty_name;
                                       $global_business = $arr[$i]->global_business;
                                       $direct_required = $arr[$i]->direct_required;
                                       $royalty = $arr[$i]->royalty;

                                       $goalstatus = ($order_amount >= $global_business &&  $active_direct >= $direct_required && $profile->active_status == 1 ? 'Achieved' : 'Pending');

                                       if ($goalstatus == "Achieved") {
                                          $check_royalty_ = $this->conn->runQuery('u_code', 'royalty', "royalty_id='$p' and u_code='$user_id' and royalty='$our_royalty'");
                                          if (!$check_royalty_) {
                                             $royaltyinsert['u_code'] = $user_id;
                                             $royaltyinsert['royalty'] = $our_royalty;
                                             $royaltyinsert['is_complete'] = 1;
                                             $royaltyinsert['royalty_id'] = $p;
                                             $this->db->insert('royalty', $royaltyinsert);
                                          }
                                          $update_royalty['my_royalty'] = $our_royalty;
                                          $this->db->where('id', $user_id);
                                          $this->db->update('users', $update_royalty);
                                       }

                                 ?>
                                       <tr>
                                          <td>DSG Club <?= $p; ?></td>

                                          <td><?= $royalty ?>%</td>

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