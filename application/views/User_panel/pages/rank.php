<?php
$profile = $this->session->userdata("profile");
$user_id = $this->session->userdata("user_id");
$currency = $this->conn->company_info('currency');
$my_left_business = $this->team->team_by_business($user_id, 1);
$my_right_business = $this->team->team_by_business($user_id, 2);
?>

<div class="page-wrapper">
   <div class="page-content">
      <div class="user_content">
         <div class="card">
            <div class="card-body">
               <div class="user_content">
                  <div class="row">
                     <div class="col-12">
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
                                          <th>rank</th>
                                          <th>Left Business ($)</th>
                                          <th>Right Business ($)</th>
                                          <th>Bonus</th>
                                          <th>xTimes</th>
                                          <th>Status</th>
                                       </tr>
                                    </tbody>
                                    <tbody>
                                       <?php
                                       $all_team = array();
                                       $userid = $this->session->userdata('user_id');
                                       $ttl_ben = $this->team->ben_pairs($userid);
                                       $myleftteam = $this->team->my_actives_left_right($userid, '1');
                                       $myrightteam = $this->team->my_actives_left_right($userid, '2');
                                       //   print_r($myleftteam);die;
                                       $arr = $this->conn->runQuery("*", 'plan', "1='1'");
                                       if ($arr) {
                                          for ($i = 0; $i < 6; $i++) {
                                             $p = $i + 1;
                                             $our_rank = $arr[$i]->rank;
                                             $next_rank_name = $arr[$i]->next_rank_name;
                                             $left_bv_req = $arr[$i]->rank_team_business;
                                             $right_bv_req = $arr[$i]->rank_team_business;
                                             $package_name = $arr[$i]->package_name;
                                             if ($i == 0) {
                                                $goalstatus = ($my_left_business >= $left_bv_req &&  $my_right_business >= $right_bv_req && $profile->active_status == 1 ? 'Achieved' : 'Pending');
                                             }
                                             if ($i >= 1 && $i < 6) {
                                                $this->db->select('bonus_rank');
                                                $this->db->from('users');
                                                $this->db->where_in('id', $myrightteam);
                                                $queryright = $this->db->get();
                                                if ($queryright->num_rows() > 0) {
                                                   $resultsright = $queryright->result();
                                                   $statusright = in_array($next_rank_name, array_column($resultsright, 'bonus_rank'));
                                                   // echo "<br><br>statusright".$statusright;
                                                   $right_status = ($statusright ? "true" : "false");
                                                }


                                                $this->db->select('bonus_rank');
                                                $this->db->from('users');
                                                $this->db->where_in('id', $myleftteam);
                                                $queryleft = $this->db->get();
                                                if ($queryleft->num_rows() > 0) {
                                                   $resultsleft = $queryleft->result();
                                                   $statusleft = in_array($next_rank_name, array_column($resultsleft, 'bonus_rank'));
                                                   // echo "<br>statusleftt".$statusleft;
                                                   $left_status = ($statusleft ? "true" : "false");
                                                }
                                                // echo "<br>left_status=".$left_status;
                                                // echo "<br>right_status=".$right_status;
                                                // echo" <br>next_rank_name".$next_rank_name;
                                                $goalstatus = ($my_left_business >= $left_bv_req &&  $my_right_business >= $right_bv_req && $left_status == 'true' && $right_status == 'true' && $profile->active_status == 1 ? 'Achieved' : 'Pending');
                                             }
                                             if ($goalstatus == "Achieved") {
                                                $check_rank_ = $this->conn->runQuery('u_code', 'rank', "rank_id='$p' and u_code='$user_id' and rank='$our_rank'");
                                                if (!$check_rank_) {
                                                   $rankinsert['u_code'] = $user_id;
                                                   $rankinsert['rank'] = $our_rank;
                                                   $rankinsert['is_complete'] = 1;
                                                   $rankinsert['rank_id'] = $p;
                                                   $this->db->insert('rank', $rankinsert);
                                                }
                                                $update_rank['bonus_rank'] = $our_rank;
                                                $this->db->where('id', $user_id);
                                                $this->db->update('users', $update_rank);
                                             }

                                       ?>
                                             <tr>
                                                <td><?= $our_rank; ?></td>
                                                <td><?= $currency; ?> <?= $left_bv_req; ?></td>
                                                <td><?= $currency; ?> <?= $right_bv_req; ?></td>
                                                <td><?= $arr[$i]->rank_bonus; ?>/Day</td>
                                                <td><?= $arr[$i]->rank_times; ?> Days</td>
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
         </div>
      </div>