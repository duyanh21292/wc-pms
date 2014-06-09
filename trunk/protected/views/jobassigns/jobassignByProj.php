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
            <div id="prj_detail_menu_spec" class="prj_detail_menu_item" onclick="goToPage('<?php echo Employees::BASE_URL ?>/spec/getProjectSpec?prj_no=<?php echo $_GET['prj_no'] ?> ')">Spec</div>
            <div id="prj_detail_menu_jobassign" class="prj_detail_menu_item prj_detail_selected" onclick="goToPage('<?php echo Employees::BASE_URL?>/jobassigns/getAllJobassigns?prj_no=<?php echo $_GET['prj_no'] ?>')">Jobassign</div>
            <div id="prj_detail_menu_po" class="prj_detail_menu_item" onclick="goToPage('<?php echo Employees::BASE_URL ?>/po/getAllPrjPo?prj_no=<?php echo $_GET['prj_no'] ?>')">PO</div>
            <div id="prj_detail_menu_invoice" class="prj_detail_menu_item">Invoice</div>
            <div id="prj_detail_menu_collection" class="prj_detail_menu_item">Collection</div>
            <div id="prj_detail_menu_status" class="prj_detail_menu_item">Status</div>
            <div id="prj_detail_menu_time_track" class="prj_detail_menu_item">Time Track</div>
            <div id="prj_detail_menu_lqa" class="prj_detail_menu_item">LQA</div>
            <div id="prj_detail_menu_client_evaluation" class="prj_detail_menu_item">Client Evaluation</div>
        </div>
        <div id="detail_job_assign" class="detail_content visible">
            <div class="icon ion-ios7-plus-outline bt_crud_26 create" style="float: right;margin-bottom: 10px;margin-left: 10px;margin-right: 5px" title="New JobAssign" onclick="createNewJobAssign('<?php echo $_GET['prj_no'] ?>')"></div>
            <table id="tbl_job_assign" style="margin-top: 10px;width: 100%">
                <tr>
                    <th>Employees</th>
                    <th>Task</th>
                    <th>Unit</th>
                    <th>Quantity</th>
                    <th>Date</th>
                    <th>Hour</th>
                    <th>Status</th>
                    <th>Comment</th>
                    <th>LQA</th>
                </tr>
                <?php foreach($model as $obj):?>
                    <?php
                    $stDate = date("y-m-d", strtotime($obj->StartDate));
                    $endDate = date("y-m-d", strtotime($obj->EndDate));
                    ?>
                    <tr class="job_assign">
                        <td><?php echo $obj->Full_Name ?></td>
                        <td><?php echo $obj->TaskName ?> > <?php echo $obj->ActivitiesName ?></td>
                        <td style="text-align: center"><?php echo $obj->Unit ?></td>
                        <td style="text-align: center"><?php echo $obj->Quantity ?></td>
                        <td style="text-align: center"><?php echo $stDate ?> ~ <?php echo $endDate ?></td>
                        <td style="text-align: center"><?php echo $obj->AssignedHour?></td>
                        <td style="text-align: center"><?php echo $obj->Status ?></td>
                        <td style="text-align: center">
                            <?php if(!empty($obj->Comment)):?>
                                <div class="icon ion-ios7-eye bt_crud_26 view"></div>
                            <?php else:?>
                                No Comment
                            <?php endif ?>
                        </td>
                        <td style="text-align:center"><input type="checkbox" name="lqa_<?php echo $obj->JobAssign_ID ?>"></td>
                    </tr>
                <?php endforeach ?>
            </table>
        </div>
    </div>
</div>