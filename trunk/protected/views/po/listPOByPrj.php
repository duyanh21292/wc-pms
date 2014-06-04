<?php
    $no = 0;
    $url_po_no = $_GET['po_no'];
?>
<script>
    function viewPo(po_no){
        $.ajax({
            type: 'GET',
            url: '<?php echo Employees::BASE_URL ?>/po/getPoDetail',
            data: {'po_no': po_no}
        }).success(function(data){
                $('.po_selected').remove();
                $('#po_name_' + po_no).append('<div class="icon ion-ios7-flag bt_crud_26 po_selected"></div>');
                $('#detail_view_po').css({'margin-top':'10px'})
                $('#detail_view_po').html(data);
            });
    }
</script>
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
            <div id="prj_detail_menu_spec" class="prj_detail_menu_item">Spec</div>
            <div id="prj_detail_menu_jobassign" class="prj_detail_menu_item" onclick="goToPage('<?php echo Employees::BASE_URL?>/jobassigns/getAllJobassigns?prj_no=<?php echo $_GET['prj_no'] ?>')">Jobassign</div>
            <div id="prj_detail_menu_po" class="prj_detail_menu_item prj_detail_selected" onclick="goToPage('<?php echo Employees::BASE_URL ?>/po/getAllPrjPo?prj_no=<?php echo $_GET['prj_no'] ?>')">PO</div>
            <div id="prj_detail_menu_invoice" class="prj_detail_menu_item">Invoice</div>
            <div id="prj_detail_menu_collection" class="prj_detail_menu_item">Collection</div>
            <div id="prj_detail_menu_status" class="prj_detail_menu_item">Status</div>
            <div id="prj_detail_menu_time_track" class="prj_detail_menu_item">Time Track</div>
            <div id="prj_detail_menu_lqa" class="prj_detail_menu_item">LQA</div>
            <div id="prj_detail_menu_client_evaluation" class="prj_detail_menu_item">Client Evaluation</div>
        </div>
        <div id="detail_view_po" class="detail_content" style="margin-top: 0">
            <?php if(!empty($url_po_no)): ?>
                <script>
                    viewPo('<?php echo $url_po_no ?>');
                </script>
            <?php endif ?>
        </div>
        <div id="detail_list_po" class="detail_content">
            <div class="icon ion-ios7-plus-outline bt_crud_26 create" style="float: right;margin-bottom: 10px;margin-left: 10px;margin-right: 5px" title="New PO" onclick="goToPage('<?php Employees::BASE_URL ?>/po/createNewPO?prj_no=<?php echo $_GET['prj_no'] ?>')"></div>
            <table id="tbl_job_assign" style="margin-top: 10px;width: 100%">
                <tr>
                    <th>Cnt</th>
                    <th>Po No.</th>
                    <th>Supplier</th>
                    <th>Reg. Date</th>
                    <th>Amount</th>
                    <th>Status</th>
                </tr>
                <?php foreach($model as $obj):?>
                    <?php
                        $no++;
                        $regDate = date("y-m-d", strtotime($obj->RegDate));
                    ?>
                    <tr>
                        <td class="cell_no"><?php echo $no ?>.</td>
                        <td style="text-align: center"><div id="po_name_<?php echo $obj->PoNo ?>" class="po_name" onclick="viewPo('<?php echo $obj->PoNo ?>')"><?php echo $obj->PoNo ?></div></td>
                        <td><?php echo $obj->SupplierName ?></td>
                        <td style="text-align: center"><?php echo $regDate ?></td>
                        <td style="text-align: right">VND <?php echo $obj->Amount ?></td>
                        <td style="text-align: center"><?php echo $obj->Status ?></td>
                    </tr>
                <?php endforeach ?>
            </table>
        </div>
    </div>
</div>