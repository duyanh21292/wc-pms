<script>
    setPageType(PO);
//    initFrameNumberPage();
</script>
<?php $no = 0;?>
<div class="content">
    <div class="content_title"> + PO Management</div>
    <div class="content_left_nav">
    </div>
    <script>
        $.ajax({
            type: 'GET',
            url: '<?php echo Employees::BASE_URL ?>/postatus/getAllPoStatus'
        }).success(function(data){
                $('.content_left_nav').html('<a class="nav_item_link" href="#"><div class="nav_item nav_selected">All</div></a>' + data);
                navSelectedListener();
            });
    </script>
    <div id="list_project_content" class="content_main visible">
        <div class="frame_title">PO List</div>
        <div class="tool_frame">
            <table style="width: 100%">
                <tr class="search_condition" style="height: 50px">
                    <td class="search_condition value_search_condition" colspan="3" style="border-left: none">
                        <div class="search_frame" style="text-align: center">
                            Search:
                            <select id="cb_search_type" name="search_type">
                                <option value="EmpNo">PO No.</option>
                                <option value="Full_Name">Supplier Name</option>
                                <option value="Full_Name">Project Name</option>
                                <option value="Full_Name">PM Name</option>
                            </select>
                            <input id="ip_search_content" type="text" name="search_content">
                            <i class="icon ion-ios7-search-strong search" onclick="actionSearch()" title="Search"></i>
                        </div>
                    </td>
                    <td class="search_condition value_search_condition" style="text-align: center">
                        <div class="frame_tool_text">
                            <div class="bt_tool_text tool_text_create"  onclick="goToPage('<?php echo Employees::BASE_URL?>/po/createNewPO')">
                                <div class="icon ion-ios7-plus-empty icon_tool_text"></div>
                                <div class="tool_text">New PO</div>
                            </div>
                        </div>
                    </td>
                </tr>
            </table>
        </div>
        <table id="projects_list" class="list_data">
            <tr>
                <th>PO No.</th>
                <th>Supplier /<br>Contact Name	</th>
                <th>Reg.Date</th>
                <th>Project Name /<br>PM Name</th>
                <th>Org.Amt</th>
                <th>Amount</th>
                <th>Status</th>
            </tr>
            <?php foreach($model as $obj):?>
                <?php $no++;?>
                <tr class="tr_data">
                    <td style="text-align: center"><div class="po_name" onclick="goToPage('<?php echo Employees::BASE_URL ?>/po/getAllPrjPo?prj_no=<?php echo $obj->ProjectNo?>&po_no=<?php echo $obj->PoNo?>')"><?php echo $obj->PoNo ?></div></td>
                    <td style="text-align: center"><?php echo $obj->SupplierName ?>
                        <div style="font-family: pms-font-regular, Arial, sans-serif"><?php echo $obj->SupplierContactName ?></div></td>
                    <td style="text-align: center"><?php $reg_date = date('y-m-d', strtotime($obj->RegDate)); echo $reg_date ?></td>
                    <td style="text-align: left"><?php echo $obj->ProjectName ?>
                        <div style="font-family: pms-font-regular, Arial, sans-serif"><?php echo $obj->ProjectManagerName ?></div></td>
                    <td class="cell_no">USD</td>
                    <td class="cell_no"><?php echo $obj->Amount ?></td>
                    <td style="text-align: center"><?php echo $obj->Status ?></td>
                </tr>
            <?php endforeach ?>
        </table>
        <div class="frame_page_number">

        </div>
    </div>
</div>