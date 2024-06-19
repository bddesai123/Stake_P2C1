<?php
error_reporting(0);
$user_id = $this->session->userdata('user_id');
$company_payment_methods = $this->conn->runQuery('*', 'company_payment_methods', "status='1'");
$user_payment_methods = $this->conn->runQuery('*', 'user_payment_methods', "status='1' and u_code='$user_id'");
?>

<style>
  table.user_table_info_record.pin_record th,
  td {
    border: 1px solid #dddde5;
  }
</style>


<div class="page-wrapper">
  <div class="page-content">


    <?php
    //  add one time address condition //

    // if($user_payment_methods[0]->status!='1'){
    ?>
    <div class="user_main_card mb-3 detail_data_pins">
      <form role="form" method="post" action="" enctype="multipart/form-data" />
      <div class="user_card_body user_content_page pins_detail">

        <div class="user_form_row user_form_content">
          <div class="row">

            <div class="col-lg-12 mb-2">
              <label class="label_user_title">Select Payment Type</label>
              <select class="form-control d-inline form-control" name="account_type" id="account_type" data-response="add_account_sec" data-blursection="blursection" data-loader="account_add_loader">
                <option value="">---Select Type---</option>
                <?php
                foreach ($company_payment_methods as $method_details) {
                ?>
                  <option value="<?= $method_details->unique_name; ?>"><?= $method_details->method_name; ?></option>
                <?php } ?>
              </select>
            </div>
            <div id="add_account_sec">

            </div>

          </div>

        </div>

        <?php
        if ($profile_edited != 'readonly') {
          $account_with_otp = $this->conn->setting('account_with_otp');
          if ($account_with_otp == 'yes') {
            $display = (isset($_SESSION['otp']) ? 'block' : 'none');
        ?>
            <button type="button" data-response_area="action_areap" class="user_btn_button send_otp">Send OTP</button>

            <div id="action_areap" style="display:<?= $display; ?>">
              <div class="form-group">
                <label for="">Enter OTP </label>
                <input type="text" name="otp_input1" id="otp_input1" value="<?= set_value('otp_input1'); ?>" class="form-control user_input_text" placeholder="Enter OTP" aria-describedby="helpId">
                <span class=" "><?= form_error('otp_input1'); ?></span>
              </div>
              <div class="user_form_row_data user_form_content ">
                <div class="user_submit_button mb-2 mt-2">
                  <input type="submit" name="add_btn" value="Add Account" id="" class="user_btn_button btn btn-primary">
                </div>

              </div>
            </div>
          <?php
          } else {
          ?>
            <div class="user_form_row_data user_form_content ">
              <div class="user_submit_button mb-2 mt-2">
                <input type="submit" name="add_btn" value="Add Account" id="" class="user_btn_button btn btn-primary">
              </div>

            </div>
        <?php
          }
        }


        ?>



      </div>
      </form>

      <div class="card">
        <div class="col-lg-12">
          <div class="">

            <div class="card-body">
              <div class="table-responsive">
                <table id="model-datatables" class="table table-bordered nowrap table-striped align-middle" style="width:100%">
                  <thead>

                    <?php
                    $this->load->view($panel_directory . '/pages/payment_section/my_accounts');
                    ?>

                  </thead>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>




    </div>
  </div>
</div>