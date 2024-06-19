<?php error_reporting(0); ?>
<div class="page-wrapper">
    <div class="page-content">
        <div class="user_content">
            <div class="card">
                <div class="card-body">
                    <h5 class="user_card_title_group"><i class="fa fa-filter"></i>Filter</h5>
                    <form action="<?= $panel_path . 'team/team-direct' ?>" method="get">
                        <div class="row">
                            <div class="col-lg-3 mb-2">
                                <div class="data_detail_page_group">
                                    <div class="detail_input_group">
                                        <div class="input-group ">
                                            <input name="name" type="text" id="" value='<?= isset($_REQUEST['name']) && $_REQUEST['name'] != '' ? $_REQUEST['name'] : ''; ?>' class="form-control user_input_text" placeholder="Search by Name">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 mb-2">
                                <div class="detail_input_group">
                                    <div class="input-group ">
                                        <input name="username" type="text" id="" value='<?= isset($_REQUEST['username']) && $_REQUEST['username'] != '' ? $_REQUEST['username'] : ''; ?>' class="form-control user_input_text" placeholder="Search by User ID">
                                    </div>

                                </div>
                            </div>
                            <div class="col-lg-3 mb-2">
                                <div class="detail_input_group">
                                    <div class="input-group ">
                                        <input name="start_date" type="date" id="" class="form-control user_input_text" value="<?= (isset($_REQUEST['start_date']) ? $_REQUEST['start_date'] : ''); ?>" placeholder="From Registration Date">

                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 mb-2">
                                <div class="detail_input_group">
                                    <div class="input-group ">
                                        <input name="end_date" type="date" id="end_date" class="form-control user_input_text" value="<?= (isset($_REQUEST['end_date']) ? $_REQUEST['end_date'] : ''); ?>" placeholder="To Registration Date">

                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 mb-2">
                                <div class="user_form_row_data">
                                    <div class="user_submit_button ">

                                        <input type="submit" name="submit" value="Filter" id="" class="user_btn_button btn btn-primary">

                                        <!-- <input type="submit" name="" value="Reset" id="" class="user_btn_button">-->
                                        <a href="<?= $panel_path . 'team/team-direct' ?>" class="user_btn_button btn btn-danger"> Reset </a>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>


        </div>
    </div>
    <div class="card card-body card-bg-1">
        <div class="table-responsive">
            <table class="<?= $this->conn->setting('table_classes'); ?>">
                <tbody>
                    <tr>
                        <th>Sr No.</th>
                        <th>Name</th>
                        <th>Username</th>
                        <!--<th>Email</th>-->
                        <th>Mobile</th>
                        <th>Join Date</th>
                        <th>Status</th>
                        <th>Package</th>
                        <?php $plan_ty = $this->conn->setting('reg_type');
                        if ($plan_ty == 'binary') {
                        ?>
                            <th>Current Business</th>
                            <th>Previous Business</th>
                            <th>Position</th>
                        <?php } ?>

                    </tr>
                    <?php
                    if ($table_data) {
                        foreach ($table_data as $t_data) {
                            $sr_no++;

                            $gen_team = $this->team->my_generation_with_personal($t_data['id']);

                    ?>
                            <tr>
                                <td>
                                    <?= $sr_no; ?>
                                </td>
                                <td>
                                    <?= $t_data['name']; ?>
                                </td>
                                <td>
                                    <?= $t_data['username']; ?>
                                </td>
                                <!-- <td><?= $t_data['email']; ?></td>-->
                                <td>
                                    <?= $t_data['mobile']; ?>
                                </td>
                                <td>
                                    <?= $t_data['added_on']; ?>
                                </td>
                                <td>
                                    <?php
                                    if ($t_data['active_status'] == 1) {
                                        echo "Active<br>";
                                        echo $t_data['active_date'];
                                    } else {
                                        echo "Inactive";
                                    }
                                    ?>
                                </td>
                                <td>
                                    <?= $t_data['active_status'] == 1 ? $this->business->package($t_data['id']) : 0; ?>
                                </td>
                                <?php $plan_ty = $this->conn->setting('reg_type');
                                if ($plan_ty == 'binary') {
                                ?>
                                    <td>
                                        <?= $t_data['active_status'] == 1 ? $this->business->current_session_bv($gen_team) : 0; ?>
                                    </td>
                                    <td>
                                        <?= $t_data['active_status'] == 1 ? $this->business->previous_bv($gen_team) : 0; ?>
                                    </td>
                                    <td>
                                        <?= $t_data['position'] == 1 ? 'Left' : 'Right'; ?>
                                    </td>
                                <?php } ?>
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

<?php

echo $this->pagination->create_links(); ?>

</div>
</div>
</div>