<?php
$profile = $this->session->userdata("profile");
$user_id = $this->session->userdata("user_id");
?>
<div class="page-wrapper">
    <div class="page-content">
        <div class="card">
            <div class="card-body">
                <div class="user_content">
                    <?php
                    $userid = $this->session->userdata('user_id');
                    $ttl = $this->conn->runQuery('sum(order_amount)as total,sum(order_bv)as bv', 'orders', "u_code='$user_id'");
                    $ttl_amnt = $ttl[0]->total;
                    $ttl_tx_charge = $ttl[0]->bv;
                    ?>
                    <div class="user_main_card mb-3">

                        <div class="user_card_body ">
                            <div class="report_detail_data widthrawal_data">
                                <div class="widthrwal_report_user">
                                    <h3>Total Staking Value</h3>
                                    <P><?= round($ttl_amnt) ?></P>
                                </div>
                                <!--<div class="widthrwal_report_user">-->
                                <!-- <h3>Total Package Bv</h3>-->
                                <!-- <P><?= round($ttl_tx_charge) ?></P>-->
                                <!--</div>-->


                            </div>
                        </div>
                        <div class="card card-body card-bg-1">
                            <div class="table-responsive">
                                <table class="<?= $this->conn->setting('table_classes'); ?>">
                                    <tbody>
                                        <tr>
                                            <th>S No.</th>
                                            <th>Staking Amount</th>
                                            <!--<th>Package BV</th>                -->
                                            <th>Contract Date</th>
                                            <th>Contract Status</th>
                                            <!--<th>Action</th>-->

                                        </tr>
                                        <?php
                                        $my_orders = $this->conn->runQuery('*', 'orders', "u_code='$user_id' ");

                                        if ($my_orders) {
                                            $sno = 0;
                                            foreach ($my_orders as $my_order) {
                                                $sno++;
                                        ?>
                                                <tr>
                                                    <td><?= $sno; ?></td>
                                                    <td><?= round($my_order->order_amount); ?></td>
                                                    <td><?= $my_order->added_on; ?></td>
                                                    <td><?= $my_order->status == 1 ? "Approved" : "Pending"; ?> </td>
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
        </div>
    </div>
</div>
</div>