<?php

$likecondition = ($this->session->userdata($search_string) ? $this->session->userdata($search_string) : array());

?>

<div class="page-wrapper">
    <div class="page-content">
        <div class="user_content">
            <div class="card">
                <div class="card-body">
                    <h5 class="user_card_title_group"><i class="fa fa-filter"></i>Filter</h5>
                    <form action="<?= $panel_path . 'team/team-left' ?>" method="post">
                        <div class="user_form_row">
                            <div class="row">
                                <div class="col-lg-3 mb-2">
                                    <div class="data_detail_page_group">
                                        <div class="detail_input_group">
                                            <div class="input-group ">
                                                <input type="text" Placeholder="Enter Name" name="<?= $search_string; ?>[name]" class="form-control user_input_text" value='<?= (array_key_exists("name", $likecondition) ? $likecondition['name'] : ''); ?>'>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-3 mb-2">
                                    <div class="detail_input_group">
                                        <div class="input-group ">
                                            <input type="text" Placeholder="Enter Username" name="<?= $search_string; ?>[username]" class="form-control user_input_text" value='<?= (array_key_exists("username", $likecondition) ? $likecondition['username'] : ''); ?>'>
                                        </div>

                                    </div>
                                </div>


                                <div class="col-lg-3 mb-2">
                                    <div class="user_form_row_data">
                                        <div class="user_submit_button ">

                                            <input type="submit" name="submit" value="Filter" id="" class="user_btn_button btn btn-primary">

                                            <!-- <input type="submit" name="" value="Reset" id="" class="user_btn_button">-->
                                            <a href="<?= $panel_path . 'team/team-left' ?>" class="user_btn_button btn btn-danger"> Reset </a>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
                </form>
            </div>
        </div>
    </div>
    <div class="card card-body card-bg-1">
        <div class="table-responsive">
            <table class="<?= $this->conn->setting('table_classes'); ?>">
                <tbody>
                    <tr>
                        <th>S No.</th>
                        <th>Name</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Join Date</th>
                        <th>Active Status</th>
                    </tr>
                <tbody>
                    <?php
                    if ($table_data) {
                        foreach ($table_data as $t_data) {
                            $sr_no++;
                    ?>
                            <tr>
                                <td><?= $sr_no; ?></td>
                                <td><?= $t_data['name']; ?></td>
                                <td><?= $t_data['username']; ?></td>
                                <td><?= $t_data['email']; ?></td>
                                <td><?= $t_data['added_on']; ?></td>
                                <td><?php
                                    if ($t_data['active_status'] == 1) {
                                        echo "Active<br>";
                                        echo $t_data['active_date'];
                                    } else {
                                        echo "Inactive";
                                    }
                                    ?></td>
                            </tr>
                    <?php
                        }
                    }
                    ?>

                </tbody>
            </table>

        </div>
    </div>
    <?php

    echo $this->pagination->create_links(); ?>

</div>
</div>



</div>
</div>