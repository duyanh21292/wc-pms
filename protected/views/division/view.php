<?php $no = 0 ?>
<div class="content">
    <div class="content_title"> + Organization</div>
    <div id="organization_content" class="content_main content_main_without_nav visible" style="left: 0;margin-top: 10px">
        <table id="organization_list" border="0" style="margin: auto;opacity: 0;display: none">
            <tr style="height: 55px">
                <td colspan="2" class="form org_div_name frame_title">Organization</td>
            </tr>
            <?php $count = count($model) ?>
            <?php foreach($model as $obj):?>
                <?php $no++; ?>
                <tr class="org_name">
                    <td id="td_org_div_name_<?php echo $obj->Division_ID ?>" class="form info_form org_div_name"><?php echo $obj->DivisionName ?></td>
                    <td class="form org_tool" style="text-align: center;font-weight: normal"><div id="org_div_tool_<?php echo $obj->Division_ID ?>" style="margin: auto;padding-right: 5px"><i class="icon ion-ios7-compose bt_crud_26 modify" style="margin-right: 10px" onclick="showFormModifyDiv(<?php echo "'".$obj->Division_ID."'" ?>)"></i><i class="icon ion-ios7-trash bt_crud_26 delete" onclick="delDiv(<?php echo "'".$obj->Division_ID."'" ?>,<?php echo "'".$obj->DivisionName."'" ?>)"></i></div></td>
                </tr>
                <tr>
                    <td colspan="2" style="border: none;background-color: transparent">
                        <table id="org_div_<?php echo $obj->Division_ID ?>" border="0" style="width: 100%">

                        </table>
                    </td>
                </tr>
                <script>
                    $.ajax({
                        type: 'GET',
                        url: '<?php echo Employees::BASE_URL ?>/department/getDeptOrganization',
                        data: {div_id: <?php echo "'".$obj->Division_ID."'" ?>}
                    }).success(function(data){
                            $('#org_div_' + <?php echo "'".$obj->Division_ID."'" ?>).append(data+
                                '<tr>' +
                                '<td colspan="2" class="form value_form org_dep_name" style="text-align:center">' +
                                '<div style="margin-left: 133px;float: left;"><input name="new_dept_' + <?php echo "'".$obj->Division_ID."'" ?> + '" type="text" style="width: 250px;margin-right: 10px;margin-top: 2px;float: left">' +
                                '<div onclick="actionCreateNewDept(\'<?php echo $obj->Division_ID ?>\')" style="float: left"><i class="icon ion-ios7-plus bt_crud_26 create"></i></div>' +
                                '</div></td>' +
                                '</tr>');
                            <?php if ($no == $count):?>
                            $('#organization_list').show();
                            $('#organization_list').animate({
                                opacity: 1
                            },'slow');
                            <?php endif ?>
                        });
                </script>
                <tr>
                    <td colspan="2" class="form" style="text-align: -webkit-center;"><div class="separator_hor" style="height: 2px;width: 100%"></div></td>
                </tr>
            <?php endforeach ?>
            <tr>
                <td colspan="2" class="form">
                    <input name="new_div" type="text" style="width: 250px;margin-right: 10px;margin-top: 2px;float: left">
                    <div onclick="actionCreateNewDiv()" style="float: left"><i class="icon ion-ios7-plus bt_crud_26 create"></i></div>
                </td>
            </tr>
        </table>
    </div>
</div>