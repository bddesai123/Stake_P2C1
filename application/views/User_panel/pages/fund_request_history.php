<div class="page-wrapper">
    <div class="page-content">
        <div class="row">
            <div class="col-xs- col-sm-12 col-md-12 col-lg-12">
                <div class="user_main_card mb-3">
                    <div class="user_card_body">
                        <h5 class="user_card_title_group"><i class="fa fa-filter"></i>Filter</h5>
                        <form action="<?= $panel_path . 'fund/request_history' ?>" method="get">
                            <div class="user_form_row">
                                <div class="row">
                                    <div class="col-lg-3 col-sm-6 col-md-4 mb-2">
                                        <select name="limit" id="" class="form-control user_input_select">
                                            <option value="20" <?= isset($_REQUEST['limit']) && $_REQUEST['limit'] == 20 ? 'selected' : ''; ?>>20</option>
                                            <option value="50" <?= isset($_REQUEST['limit']) && $_REQUEST['limit'] == 50 ? 'selected' : ''; ?>>50</option>
                                            <option value="100" <?= isset($_REQUEST['limit']) && $_REQUEST['limit'] == 100 ? 'selected' : ''; ?>>100</option>
                                            <option value="200" <?= isset($_REQUEST['limit']) && $_REQUEST['limit'] == 200 ? 'selected' : ''; ?>>200</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-3 col-sm-6 col-md-4 mb-2">
                                        <select name="status" class="form-control user_input_select">
                                            <option value="all">Select Status</option>
                                            <option value="0">Pending</option>
                                            <option value="1">Approved</option>
                                            <option value="2">Rejected</option>

                                        </select>
                                    </div>

                                    <div class="col-lg-3 col-sm-6 col-md-4 mb-2">

                                        <div class="input-group ">
                                            <input name="start_date" type="date" id="" value='<?= (isset($_REQUEST['start_date']) ? $_REQUEST['start_date'] : ''); ?>"' class="form-control user_input_text">
                                        </div>

                                    </div>
                                    <div class="col-lg-3 col-sm-6 col-md-4 mb-2">

                                        <div class="input-group ">
                                            <input name="end_date" type="date" id="" value='<?= (isset($_REQUEST['end_date']) ? $_REQUEST['end_date'] : ''); ?>"' class="form-control user_input_text">
                                        </div>

                                    </div>

                                </div>
                                <div class="user_form_row_data">
                                    <div class="user_submit_button mb-2">
                                        <input type="submit" name="submit" value="Filter" id="" class="user_btn_button btn btn-primary">
                                    

                                        <a href="<?= $panel_path . 'fund/request_history' ?>" class="user_btn_button btn btn-danger"> Reset </a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>


                <div class="card card-body card-bg-1">
                    <div class="table-responsive">
                    <table class="<?= $this->conn->setting('table_classes'); ?>">
                            <thead>
                                <tr>
                                    <th>S No.</th>


                                    <th>Amount (<?= $this->conn->company_info('currency'); ?>)</th>
                                    <th> Type</th>
                                    <th> Debit/Credit</th>
                                    <th>Status</th>
                                    <th>Remark</th>
                                    <th>Narration</th>
                                    <th>Date </th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $user = $this->session->userdata('profile');
                                if ($table_data) {

                                    foreach ($table_data as $t_data) {
                                        $tx_profile = false;
                                        $tx_profile = $this->profile->profile_info($t_data['tx_u_code']);
                                        $sr_no++;
                                ?>
                                        <tr>
                                            <td class="text-left border-right"><?= $sr_no; ?></td>



                                            <td><?= $t_data['amount']; ?></td>
                                            <td><?= $t_data['tx_type']; ?></td>
                                            <td><?= $t_data['debit_credit']; ?></td>
                                            <td>
                                                <?php
                                                switch ($t_data['status']) {
                                                    case '1':
                                                        echo 'Approved';
                                                        break;
                                                    case '0':
                                                        echo 'Pending';
                                                        break;
                                                    case '2':
                                                        echo 'Rejected';
                                                        break;
                                                }
                                                ?>
                                            </td>
                                            <td class="text-left"><small><?= $t_data['remark']; ?></small></td>
                                            <td class="text-left"><small><?= $t_data['reason']; ?></small></td>
                                            <td class="text-left"><?= $t_data['updated_on']; ?></td>

                                        </tr>
                                <?php
                                    }
                                }
                                ?>

                            </tbody>
                        </table>

                    </div>
                </div>

            </div>
        </div>


    </div><!-- .components-preview -->
</div>
</div>
</div>
</div>

<?php echo $this->pagination->create_links(); ?>
</div>
</div>