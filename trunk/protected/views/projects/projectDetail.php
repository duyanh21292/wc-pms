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
    <div id="detail_content_main" class="content_main">
        <?php foreach($model as $obj):?>
            <div class="detail_menu_frame">
                <div id="detail_prj_name"><?php echo $obj->ProjectName ?></div>
                <div style="float: left;height: 23px;width: 100px;text-align: center;font-size: small;font-weight: normal;padding-top: 7px;background-color: #E7E7E7;color: #616161;font-family: pms-font-bold,Arial,sans-serif;"><?php echo $_GET['prj_no'] ?></div>
                <div id="prj_detail_menu_basic" class="prj_detail_menu_item prj_detail_selected" onclick="goToPage('<?php echo Employees::BASE_URL?>/projects/getProjectDetail?prj_no=<?php echo $_GET['prj_no'] ?>')">Basic Info.</div>
                <div id="prj_detail_menu_spec" class="prj_detail_menu_item">Spec</div>
                <div id="prj_detail_menu_jobassign" class="prj_detail_menu_item" onclick="goToPage('<?php echo Employees::BASE_URL?>/jobassigns/getAllJobassigns?prj_no=<?php echo $_GET['prj_no'] ?>')">Jobassign</div>
                <div id="prj_detail_menu_po" class="prj_detail_menu_item" onclick="goToPage('<?php echo Employees::BASE_URL ?>/po/getAllPrjPo?prj_no=<?php echo $_GET['prj_no'] ?>')">PO</div>
                <div id="prj_detail_menu_invoice" class="prj_detail_menu_item">Invoice</div>
                <div id="prj_detail_menu_collection" class="prj_detail_menu_item">Collection</div>
                <div id="prj_detail_menu_status" class="prj_detail_menu_item">Status</div>
                <div id="prj_detail_menu_time_track" class="prj_detail_menu_item">Time Track</div>
                <div id="prj_detail_menu_lqa" class="prj_detail_menu_item">LQA</div>
                <div id="prj_detail_menu_client_evaluation" class="prj_detail_menu_item">Client Evaluation</div>
            </div>
            <div id="detail_basic_info" class="detail_content">
                <table style="width: 100%">
                    <tr class="prj_detail">
                        <td class="prj_detail">Status</td>
                        <td class="prj_detail value_prj_detail"><select id="cb_prj_status" name="prj_status"></select></td>
                        <script>
                            $.ajax({
                                type: 'GET',
                                url: 'http://x.pms/status/getAllStatusCb',
                                data: { status_type : 'status'}
                            }).success(function(data){
                                    $('#cb_prj_status').html(data);
                                    $('#cb_prj_status').children().each(function(){
                                        var val = $(this).val();
                                        if (val == <?php echo "'".$obj->Status."'" ?>){
                                            $(this).attr('selected',true);
                                        }
                                    });
                                });
                        </script>
                        <td class="prj_detail">Finance Status</td>
                        <td class="prj_detail value_prj_detail"><?php echo $obj->FStatus ?></td>
                    </tr>
                    <tr class="prj_detail">
                        <td class="prj_detail">Biz. Division</td>
                        <td class="prj_detail value_prj_detail" colspan="3"><?php echo $obj->DivisionName ?></td>
                    </tr>
                    <tr class="prj_detail">
                        <td class="prj_detail">Reg.Date</td>
                        <td class="prj_detail value_prj_detail"><?php $regDate = date("Y-m-d", strtotime($obj->RegDate)); echo $regDate ?></td>
                        <td class="prj_detail">Due Date</td>
                        <td class="prj_detail value_prj_detail"><?php $dueDate = date("Y-m-d", strtotime($obj->DueDate)); echo $dueDate ?></td>
                    </tr>
                    <tr class="prj_detail">
                        <td class="prj_detail">Sales Manager</td>
                        <td class="prj_detail value_prj_detail"><?php echo $obj->SaleManagerName ?></td>
                        <td class="prj_detail">Project Manager</td>
                        <td class="prj_detail value_prj_detail"><?php echo $obj->ProjectManagerName ?></td>
                    </tr>
                    <tr class="prj_detail">
                        <td class="prj_detail">Industry</td>
                        <td class="prj_detail value_prj_detail"><?php echo $obj->IndustryName ?></td>
                        <td class="prj_detail">Password</td>
                        <td class="prj_detail value_prj_detail"><input type="password" value="<?php echo $obj->Password ?>" disabled></td>
                    </tr>
                    <tr>
                        <td style="background-color: transparent;border: none" colspan="4"></td>
                    </tr>
                    <tr class="prj_detail">
                        <td class="prj_detail">Client</td>
                        <td class="prj_detail value_prj_detail" colspan="3"><?php echo $obj->ClientName ?></td>
                    </tr>
                    <tr class="prj_detail">
                        <td class="prj_detail">C - Contact</td>
                        <td class="prj_detail value_prj_detail"><?php echo $obj->ContactName ?></td>
                        <td class="prj_detail">C - F.Contact</td>
                        <td class="prj_detail value_prj_detail"><?php echo $obj->FContactName ?></td>
                    </tr>
                    <tr class="prj_detail">
                        <td class="prj_detail">C - PO No.</td>
                        <td class="prj_detail value_prj_detail"><?php echo $obj->C_PoNo ?></td>
                        <td class="prj_detail">C - Project No.</td>
                        <td class="prj_detail value_prj_detail"><?php echo $obj->C_ProjectNo ?></td>
                    </tr>
                    <tr class="prj_detail">
                        <td class="prj_detail">View Po</td>
                        <td class="prj_detail value_prj_detail" colspan="3"></td>
                    </tr>
                    <tr>
                        <td style="background-color: transparent;border: none" colspan="4"></td>
                    </tr>
                    <tr class="prj_detail">
                        <td class="prj_detail">Internal Cost</td>
                        <td class="prj_detail value_prj_detail">VND <?php echo $obj->InternalCost ?></td>
                        <td class="prj_detail">VAT/TAX</td>
                        <td class="prj_detail value_prj_detail"><?php echo $obj->VATTAX ?>%</td>
                    </tr>
                    <tr class="prj_detail">
                        <td class="prj_detail">Buy-Ins Amount</td>
                        <td class="prj_detail value_prj_detail">VND <?php echo $obj->BuyInsAmount ?></td>
                        <td class="prj_detail">Balance</td>
                        <td class="prj_detail value_prj_detail">VND <?php echo $obj->Balance ?></td>
                    </tr>
                    <tr class="prj_detail">
                        <td class="prj_detail">Amount</td>
                        <td class="prj_detail value_prj_detail">VND <?php echo $obj->Amount ?></td>
                        <td class="prj_detail">Gross Margin</td>
                        <td class="prj_detail value_prj_detail">VND <?php echo $obj->GrossMargin ?></td>
                    </tr>
                    <tr class="prj_detail">
                        <td class="prj_detail">View Quote</td>
                        <td class="prj_detail value_prj_detail" colspan="3"></td>
                    </tr>
                </table>
            </div>
            <div class="frame_tool_text" style="float: left;display: block;width: 1014px;margin-top: 5px">
                <div class="bt_tool_text tool_text_modify" style="font-size: small;float: right;border: none" onclick="goToPage('<?php echo Employees::BASE_URL?>/projects/modifyProject?prj_no=<?php echo $_GET['prj_no'] ?>')">
                    <div class="icon ion-ios7-compose-outline icon_tool_text26"></div>
                    <div class="tool_text">Modify</div>
                </div>
                <div class="bt_tool_text tool_text_mail" style="font-size: small;float: right;margin-right: 5px;border: none" onclick="">
                    <div class="icon ion-ios7-email-outline icon_tool_text26"></div>
                    <div class="tool_text">Mail</div>
                </div>
                <div class="bt_tool_text tool_text_upload" style="font-size: small;float: right;margin-right: 5px;border: none" onclick="">
                    <div class="icon ion-ios7-upload-outline icon_tool_text26"></div>
                    <div class="tool_text">Upload Quote</div>
                </div>
                <div class="bt_tool_text tool_text_upload" style="font-size: small;float: right;margin-right: 5px;border: none" onclick="">
                    <div class="icon ion-ios7-upload-outline icon_tool_text26"></div>
                    <div class="tool_text">Upload PO</div>
                </div>
            </div>
        <?php endforeach ?>
    </div>
</div>