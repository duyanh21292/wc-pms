<?php $no = 0; ?>
<div class="content">
    <div class="content_title"> + Project Management</div>
    <div class="content_left_nav">
        <a class="nav_item_link" href="<?php echo Employees::BASE_URL ?>/projects/getAllProjects"><div class="nav_item">All list</div></a>
    </div>
    <script>
        $.ajax({
            type: 'GET',
            url: 'http://x.pms/status/getAllStatus',
            data: { status_type : 'status'}
        }).success(function(data){
                $('.content_left_nav').append(data);
            });
    </script>
    <div id="detail_content_main" class="content_main" style="opacity: 1">
        <div class="detail_menu_frame">
            <div id="detail_prj_name"></div>
            <script>
                $.ajax({
                    type: 'GET',
                    url: '<?php echo Employees::BASE_URL?>/projects/getProjectName',
                    data: {'prj_no': '<?php echo $_GET['prj_no'] ?>'}
                }).success(function(data){
                        $('#detail_prj_name').html(data);
                    })
            </script>
            <div style="float: left;height: 23px;width: 100px;text-align: center;font-size: small;font-weight: normal;padding-top: 7px;background-color: #E7E7E7;color: #616161;font-family: pms-font-bold,Arial,sans-serif;"><?php echo $_GET['prj_no'] ?></div>
            <div id="prj_detail_menu_basic" class="prj_detail_menu_item" onclick="goToPage('<?php echo Employees::BASE_URL?>/projects/getProjectDetail?prj_no=<?php echo $_GET['prj_no'] ?>')">Basic Info.</div>
            <div id="prj_detail_menu_spec" class="prj_detail_menu_item prj_detail_selected" onclick="goToPage('<?php echo Employees::BASE_URL ?>/spec/getProjectSpec?prj_no=<?php echo $_GET['prj_no'] ?> ')">Spec</div>
            <div id="prj_detail_menu_jobassign" class="prj_detail_menu_item" onclick="goToPage('<?php echo Employees::BASE_URL?>/jobassigns/getAllJobassigns?prj_no=<?php echo $_GET['prj_no'] ?>')">Jobassign</div>
            <div id="prj_detail_menu_po" class="prj_detail_menu_item" onclick="goToPage('<?php echo Employees::BASE_URL ?>/po/getAllPrjPo?prj_no=<?php echo $_GET['prj_no'] ?>')">PO</div>
            <div id="prj_detail_menu_invoice" class="prj_detail_menu_item">Invoice</div>
            <div id="prj_detail_menu_collection" class="prj_detail_menu_item">Collection</div>
            <div id="prj_detail_menu_status" class="prj_detail_menu_item">Status</div>
            <div id="prj_detail_menu_time_track" class="prj_detail_menu_item">Time Track</div>
            <div id="prj_detail_menu_lqa" class="prj_detail_menu_item">LQA</div>
            <div id="prj_detail_menu_client_evaluation" class="prj_detail_menu_item">Client Evaluation</div>
        </div>
        <div id="detail_list_spec" class="detail_content visible">
            <div class="icon ion-ios7-plus-outline bt_crud_26 create" style="float: right;margin-bottom: 10px;margin-left: 10px;margin-right: 5px" title="New Spec" onclick="createNewSpec('<?php echo $_GET['prj_no'] ?>')"></div>
            <table id="tbl_spec" style="margin-top: 10px;width: 100%">
                <tr>
                    <th>Task</th>
                    <th>File/Item</th>
                    <th>Unit</th>
                    <th>Quantity</th>
                    <th>U/Price</th>
                    <th>Exch.Rate</th>
                    <th>Amount</th>
                    <th></th>
                </tr>
                <?php
                    $total_amount_usd = 0.0000;
                    $total_amount_vnd = 0.0000;
                ;?>
                <?php foreach($model as $obj):?>
                    <?php
                        $total_amount_usd = $total_amount_usd + ($obj->Quantity * $obj->UPrice);
                        $total_amount_vnd = $total_amount_vnd + $obj-> Amount;
                    ?>
                    <tr class="spec">
                        <td><?php echo $obj-> SpecTask_Name?></td>
                        <td><?php echo $obj-> Fileitem ?></td>
                        <td style="text-align: center"><?php echo $obj-> Unit ?></td>
                        <td style="text-align: center"><?php echo number_format($obj-> Quantity,4,".",",")?></td>
                        <td style="text-align: right"><?php echo number_format($obj-> UPrice,4,".",",").' '.$obj-> CurrencyNo?></td>
                        <td style="text-align: center"><?php echo number_format($obj-> ExchRate,4,".",",")?></td>
                        <td style="text-align: right">VND <?php echo number_format($obj-> Amount,4,".",",")?></td>
                        <td style="text-align: center;width: 80px">
                            <div class="icon ion-ios7-compose bt_crud_24 modify"></div>
                            <div class="icon ion-ios7-trash bt_crud_24 delete" style="margin-left: 5px"></div>
                        </td>
                    </tr>
                <?php endforeach?>
                <tr class="spec" style="height: 30px">
                    <td class="total" colspan="3">Total Amount</td>
                    <td class="total" colspan="2" style="text-align: right">
                        <div id="total_amount_usd" class="total"><?php echo number_format($total_amount_usd,4,".",",");?> USD</div>
                    </td>
                    <td class="total" colspan="2" style="text-align: right">
                        <div id="total_amount_vnd" class="total">VND <?php echo number_format($total_amount_vnd,4,".",",");?></div>
                    </td>
                    <td class="total"></td>
                </tr>
            </table>
        </div>
    </div>
</div>