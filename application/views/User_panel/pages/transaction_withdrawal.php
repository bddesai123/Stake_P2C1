<?php

$userid = $this->session->userdata('user_id');
$total_withdrawal = $this->conn->runQuery("SUM(amount) as amt", 'transaction', "u_code='$userid' and tx_type='withdrawal'");
$total_paid_withdrawal = $this->conn->runQuery("SUM(amount) as amt", 'transaction', "u_code='$userid' and tx_type='withdrawal' and status='1'");
$total_reject_withdrawal = $this->conn->runQuery("SUM(amount) as amt", 'transaction', "u_code='$userid' and tx_type='withdrawal' and status='2'");
?>
<div class="page-wrapper">
    <div class="page-content">
        <div class="user_content">
            <div class="card">
                <div class="card-body">
                    <div class="user_content">

                        <body>
                            <div class="withdrawal_report">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-4 col-md-12 col-sm-12">
                                            <div class="widthrawal_innce_report">
                                                <form action="" method="post">
                                                    <div class="withdrawal_ecxel">
                                                        <input type="submit" name="export_to_excel" class="user_btn_button" value="Export to excel">
                                                        <input type="hidden" name="userid" value="<?= $userid; ?>">
                                                    </div>
                                                </form>
                                                <ul>
                                                    <li>
                                                        <h6>Total Withdrawal</h6>
                                                        <p><?= $this->conn->company_info('currency'); ?>&nbsp;<?= ($total_withdrawal[0]->amt != '' ? $total_withdrawal[0]->amt : 0); ?></p>
                                                    </li>
                                                    <li>
                                                        <h6>Paid Withdrawal</h6>
                                                        <p><?= $this->conn->company_info('currency'); ?>&nbsp;<?= ($total_paid_withdrawal[0]->amt != '' ? $total_paid_withdrawal[0]->amt : 0); ?></p>
                                                    </li>
                                                    <li>
                                                        <h6>Reject Withdrawal</h6>
                                                        <p><?= $this->conn->company_info('currency'); ?>&nbsp;<?= ($total_reject_withdrawal[0]->amt != '' ? $total_reject_withdrawal[0]->amt : 0); ?></p>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>

                                        <div class="col-lg-8 col-md-12 col-sm-12">
                                            <div class="table-responsive">

                                                <table class="<?= $this->conn->setting('table_classes'); ?>">
                                                    <tr>
                                                        <th>S No.</th>
                                                        <th>Amount ($)</th>
                                                        <!--<th>TDS(5%)</th>-->
                                                        <th>Withdrawal charge ($)</th>
                                                        <th>Payable Amount ($)</th>
                                                        <th>Status</th>
                                                        <th>Tx Hash</th>
                                                        <th>Date </th>
                                                    </tr>
                                                    <?php
                                                    $user = $this->session->userdata('profile');
                                                    if ($table_data) {

                                                        foreach ($table_data as $t_data) {
                                                            $tx_profile = false;
                                                            $tx_profile = $this->profile->profile_info($t_data['tx_u_code']);
                                                            $sr_no++;
                                                    ?>
                                                            <tr>
                                                                <td><?= $sr_no; ?></td>
                                                                <td><?= $ttl = $t_data['amount'] + $t_data['tx_charge']; ?></td>

                                                                <td><?= $t_data['tx_charge']; ?></td>
                                                                <td><?= $t_data['amount']; ?></td>
                                                                <td><?php
                                                                    switch ($t_data['status']) {
                                                                        case 1:
                                                                            echo 'Approved';
                                                                            break;
                                                                        case 0:
                                                                            echo 'Pending';
                                                                            break;
                                                                        case 2:
                                                                            echo 'Rejected';
                                                                            break;
                                                                    }
                                                                    ?></td>
                                                                <td><a href="<?= $t_data['tx_hash']; ?>"><?= $t_data['tx_hash']; ?></a></td>
                                                                <td><?= $t_data['date']; ?></td>

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
                            </div>
                        </body>
                    </div>
                </div>
            </div>
        </div>