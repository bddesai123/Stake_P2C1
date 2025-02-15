<?php
error_reporting(0);
?>

<div class="page-wrapper">
    <div class="page-content">
        <div class="card">
            <div class="card-body">
                <div class="user_content">
                    <h5 class="user_card_title_group"><i class="fa fa-filter"></i>Filter</h5>
                    <form action="<?= $panel_path . 'team/team-generation' ?>" method="get">
                        <div class="user_form_row">
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
                                    <div class="detail_input_group">
                                        <select name="selected_level" id="" class="form-control user_input_select">
                                            <option value="all" <?= (isset($_REQUEST['selected_level']) && $_REQUEST['selected_level'] == 'all' ? 'selected' : ''); ?>> All</option>
                                            <?php
                                            for ($l = 1; $l <= 10; $l++) {
                                            ?><option value="<?= $l; ?>" <?= (isset($_REQUEST['selected_level']) && $_REQUEST['selected_level'] == $l ? 'selected' : ''); ?>> Level <?= $l; ?></option><?php
                                                                                                                                                                                                    }
                                                                                                                                                                                                        ?>

                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3 mb-2">
                                    <div class="detail_input_group">
                                        <select name="active_status" id="" class="form-control user_input_select">
                                            <option value="">-- Status --</option>
                                            <option value="1" <?php if ($select_status == "1") echo "selected"; ?>>Active</option>
                                            <option value="0" <?php if ($select_status == "0") echo "selected"; ?>>Inactive</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-3 mb-2">
                                    <div class="user_form_row_data">
                                        <div class="user_submit_button ">

                                            <input type="submit" name="submit" value="Filter" id="" class="user_btn_button btn btn-primary">
                                      
                                            <!-- <input type="submit" name="" value="Reset" id="" class="user_btn_button">-->
                                            <a href="<?= $panel_path . 'team/team-generation' ?>" class="user_btn_button btn btn-danger"> Reset </a>

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
    <ol class="breadcrumb">

        <li class="breadcrumb-item active" aria-current="page">
            <?php

            $my_id = $this->session->userdata('user_id');


            //$check_my_level_team = $this->team->my_generation($my_id);


            if ($this->session->has_userdata('selected_user')) {
                $user_id = $this->session->userdata('selected_user');
            } else {
                $user_id = $my_id;
            }

            if ($user_id != $my_id && in_array($user_id, $check_my_level_team)) {
                $sponsor = $this->profile->sponsor($user_id);
                if ($my_id != $sponsor && in_array($sponsor, $check_my_level_team)) {
            ?>
                    <a href="<?= $panel_path . 'team/team-generation?selected_user=' . $sponsor; ?>"><i class="fa fa-reply" aria-hidden="true"></i></a> /
                <?php
                }
                ?>

                <a href="<?= $panel_path . 'team/team-generation?selected_user=' . $my_id; ?>" class="user_btn_button">My team </a>/
            <?php



            }

            $details = $this->profile->profile_info($user_id, 'name,username');
            $name = $details->name;
            $username = $details->username;
            echo " $name ( $username )";

            ?>



        </li>
    </ol>
    <div class="card card-body card-bg-1">
        <div class="table-responsive">
            <table class="<?= $this->conn->setting('table_classes'); ?>">
                <thead>
                    <tr>
                        <th>Sr No.</th>
                        <th>Action</th>
                        <th>Name</th>
                        <th>Username</th>
                        <!--<th>Email</th>       -->
                        <th>Join Date</th>
                        <th>Active Status</th>
                        <th>Level</th>
                        <th>Sponsor ID(Name)</th>
                        <!-- <th>Current Business</th>
                            <th>Previous Business</th>-->
                    </tr>
                </thead>
                <tbody>
                    <?php

                    //$my_level_team = $this->team->my_generation($user_id);

                    $my_level_team = $this->team->my_level_team($my_id);

                    $first_arrays = $my_level_team[1];
                    $first_arrays2 = $my_level_team[2];
                    $first_arrays3 = $my_level_team[3];
                    $first_arrays4 = $my_level_team[4];
                    $first_arrays5 = $my_level_team[5];
                    $first_arrays6 = $my_level_team[6];
                    $first_arrays7 = $my_level_team[7];
                    $first_arrays8 = $my_level_team[8];
                    $first_arrays9 = $my_level_team[9];
                    $first_arrays10 = $my_level_team[10];
                    $first_arrays11 = $my_level_team[11];
                    $first_arrays12 = $my_level_team[12];
                    $first_arrays13 = $my_level_team[13];
                    $first_arrays14 = $my_level_team[14];
                    $first_arrays15 = $my_level_team[15];


                    if ($table_data) {
                        foreach ($table_data as $t_data) {
                            $ids = $t_data['id'];
                            $sr_no++;
                            $gen_team = $this->team->my_generation_with_personal($t_data['id']);
                            $team_details = $this->conn->runQuery("*", 'users', "id='$ids'");
                            if ($team_details) {


                                if (in_array($t_data['id'], $first_arrays)) {
                                    $level = "Level1";
                                } elseif (in_array($t_data['id'], $first_arrays2)) {

                                    $level = "Level2";
                                } elseif (in_array($t_data['id'], $first_arrays3)) {

                                    $level = "Level3";
                                } elseif (in_array($t_data['id'], $first_arrays4)) {

                                    $level = "Level4";
                                } elseif (in_array($t_data['id'], $first_arrays5)) {

                                    $level = "Level5";
                                } elseif (in_array($t_data['id'], $first_arrays6)) {

                                    $level = "Level6";
                                } elseif (in_array($t_data['id'], $first_arrays7)) {

                                    $level = "Level7";
                                } elseif (in_array($t_data['id'], $first_arrays8)) {

                                    $level = "Level8";
                                } elseif (in_array($t_data['id'], $first_arrays9)) {

                                    $level = "Level9";
                                } elseif (in_array($t_data['id'], $first_arrays10)) {

                                    $level = "Level10";
                                } elseif (in_array($t_data['id'], $first_arrays11)) {

                                    $level = "Level11";
                                } elseif (in_array($t_data['id'], $first_arrays12)) {

                                    $level = "Level12";
                                } elseif (in_array($t_data['id'], $first_arrays13)) {

                                    $level = "Level13";
                                } elseif (in_array($t_data['id'], $first_arrays14)) {

                                    $level = "Level14";
                                } elseif (in_array($t_data['id'], $first_arrays15)) {

                                    $level = "Level15";
                                }
                            }
                    ?>
                            <tr>
                                <td><?= $sr_no; ?></td>
                                <td><a href="<?= $panel_path . 'team/team-generation?selected_user=' . $t_data['id']; ?>"><i class="fa fa-sitemap"></i></a></td>
                                <td><?= $t_data['name']; ?></td>
                                <td><?= $t_data['username']; ?></td>
                                <!--<td><?= $t_data['email']; ?></td>      -->
                                <td><?= $t_data['added_on']; ?></td>
                                <td><?php
                                    if ($t_data['active_status'] == 1) {
                                        echo "Active<br>";
                                        echo $t_data['active_date'];
                                    } else {
                                        echo "Inactive";
                                    }
                                    ?></td>
                                <td><?= (isset($_REQUEST['selected_level'])) ? $_REQUEST['selected_level'] : $level; ?> </td>
                                <td>
                                    <?php
                                    $sponsor_info = $this->profile->sponsor_info($t_data['id']);
                                    if ($sponsor_info) {
                                        echo "$sponsor_info->username ($sponsor_info->name)";
                                    }
                                    ?>
                                </td>
                                <!-- <td><?= $t_data['active_status'] == 1 ? $this->business->current_session_bv($gen_team) : 0; ?></td> 
                                    <td><?= $t_data['active_status'] == 1 ? $this->business->previous_bv($gen_team) : 0; ?></td> -->
                            </tr>
                    <?php
                            //  }
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