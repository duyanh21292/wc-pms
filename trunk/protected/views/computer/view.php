<?php $no = 0 ?>
<div class="content">
    <div class="content_title"> + Computer Management</div>
    <div id="computer_content" class="content_main content_main_without_nav" style="left: 0;margin-top: 10px">
        <div class="frame_title" style="width: 1200px;margin: auto">Computers List</div>
        <div class="tool_frame" style="width: 1200px;margin: auto">
            <table style="width: 100%">
                <tr class="search_condition" style="height: 50px">
                    <td class="search_condition value_search_condition" colspan="3" style="border-left: none">
                        <div  class="search_frame" style="text-align: center">
                            Search:
                            <select id="cb_search_type" name="search_type">
                                <option value='AssetNumber'>Asset Number</option>
                                <option value='CompName'>Computer Name</option>
                                <option value='UserNo'>User</option>
                                <option value='ManagerNo'>Manager</option>
                                <option value='CPU'>CPU</option>
                                <option value='Update'>Update</option>
                            </select>
                            <input id="ip_search_content" type="text" name="search_content">
                            <input type="submit" value="Search" onclick="empMngResult()">
                        </div>
                    </td>
                    <td class="search_condition value_search_condition" style="text-align: center">
                        <div class="icon ion-ios7-plus bt_crud_30 create" onclick="goToPage('<?php echo Employees::BASE_URL ?>/computer/createNewComp')" title="New Computer"></div>
                    </td>
                </tr>
            </table>
        </div>
        <table class="list_data" style="width: 1200px;margin: auto">
            <tr>
                <th>No.</th>
                <th>Asset Number</th>
                <th>Computer Name</th>
                <th>User</th>
                <th>Manager</th>
                <th>CPU</th>
                <th>Update</th>
            </tr>
            <?php foreach($model as $obj):?>
                <?php $no++; ?>
                <tr>
                    <td class="cell_no"><?php echo $no.'.' ?></td>
                    <td style="text-align: center"><?php echo $obj->AssetNumber ?></td>
                    <td><?php echo $obj->CompName ?></td>
                    <td><?php echo $obj->UserNo ?></td>
                    <td><?php echo $obj->ManagerNo ?></td>
                    <td style="max-width: 600px"><?php echo $obj->CPU ?></td>
                    <td style="text-align: center"><?php $date = date("Y-m-d", strtotime($obj->Update )); echo $date;?></td>
                </tr>
            <?php endforeach ?>
        </table>
    </div>
</div>