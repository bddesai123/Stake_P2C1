<?php
$profile = $this->session->userdata("profile");
$user_id = $profile->id;
?>



<div class="page-wrapper">
   <div class="page-content">
      <div class="container">
         <div class="main-body">

            <div class="col-lg-7 col-xl-8 col-md-12 col-sm-12">
               <?php
               $success['param'] = 'success';
               $success['alert_class'] = 'alert-success';
               $success['type'] = 'success';
               $this->show->show_alert($success);
               ?>
               <?php
               $erroralert['param'] = 'error';
               $erroralert['alert_class'] = 'alert-danger';
               $erroralert['type'] = 'error';
               $this->show->show_alert($erroralert);
               ?>
               <div class="card">
                  <div class="card-body">
                     <h4>Edit Profile</h4>
                  </div>
                  <form action="" method="post" enctype='multipart/form-data'>
                     <div class="card">
                        <div class="card-body">
                           <div class="row mb-3">
                              <div class="col-sm-3">
                                 <h6 class="mb-0">User Name</h6>
                              </div>
                              <div class="col-sm-9">
                                 <input type="text" class="form-control" id="exampleInputname" placeholder="" value="<?= $profile->username; ?>" readonly>
                              </div>
                           </div>


                           <div class="row mb-3">
                              <div class="col-sm-3">
                                 <h6 class="mb-0">Name</h6>
                              </div>
                              <div class="col-sm-9">
                                 <input type="text" class="form-control" id="exampleInputname" placeholder="Name" name="name" value="<?= $profile->name; ?>">
                              </div>
                           </div>


                           <div class="row mb-3">
                              <div class="col-sm-3">
                                 <h6 class="mb-0">Profile Pic</h6>
                              </div>
                              <div class="col-sm-9">
                                 <input type="file" name="profile_pic" class="form-control" id="exampleInputEmail1" placeholder="Email Address">
                                 <span class="text-danger"><?= (isset($upload_error) ? $upload_error : ''); ?></span>
                              </div>
                           </div>

                           <div class="row mb-3">
                              <div class="col-sm-3">
                                 <h6 class="mb-0">Email Address</h6>
                              </div>
                              <div class="col-sm-9">
                                 <input type="email" name="email" value="<?= $profile->email; ?>" class="form-control" id="exampleInputEmail1" placeholder="Email Address">
                              </div>
                           </div>


                           <div class="row mb-3">
                              <div class="col-sm-3">
                                 <h6 class="mb-0">Mobile Number</h6>
                              </div>
                              <div class="col-sm-9">
                                 <input type="number" name="mobile" value="<?= $profile->mobile; ?>" class="form-control" id="exampleInputEmail1" placeholder="Contact Number">
                              </div>
                           </div>




                           <?php
                           //  if($profile_edited!='readonly'){
                           $edit_profile_with_otp = $this->conn->setting('edit_profile_with_otp');
                           if ($edit_profile_with_otp == 'yes') {
                              $display = (isset($_SESSION['otp']) ? 'block' : 'none');
                           ?>
                              <button type="button" data-response_area="action_areap" class="user_btn_button send_otp">Send OTP</button>

                              <div id="action_areap" style="display:<?= $display; ?>">
                                 <!--<p> Resend OTP in <span id="countdowntimer">30 </span> Seconds</p>-->
                                 <!-- <button type="button" data-response_area="action_areap" id="proceed" class="user_btn_button send_otp" >Re-Send OTP</button>-->

                                 <div class="form-group">
                                    <label for="">Enter OTP </label>
                                    <input type="text" name="otp_input1" id="otp_input1" value="<?= set_value('otp_input1'); ?>" class="form-control user_input_text" placeholder="Enter OTP" aria-describedby="helpId">
                                    <span class=" "><?= form_error('otp_input1'); ?></span>
                                 </div>
                                 <div class="profile_card_bottom">
                                    <button type="submit" name="edit_btn" class="btn btn-primary">Save</button>
                                    <a href="<?= $panel_path . 'profile/edit-profile'; ?>" class="cancel_data btn btn-danger"> Cancel</a>
                                 </div>
                              </div>
                           <?php
                           } else {
                           ?>
                              <div class="profile_card_bottom">
                                 <button type="submit" name="edit_btn" class="btn btn-primary">Updated</button>
                                 <a href="<?= $panel_path . 'profile/edit-profile'; ?>" class="cancel_data btn btn-danger"> Cancel</a>
                              </div>
                           <?php
                           }
                           //   }


                           ?>
                        </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>

   <br>