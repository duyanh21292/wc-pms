<script>
    function actionCreateNewComp(){
        var asset_number = $('[name="asset_number"]').val();
        var comp_name = $('[name="computer_name"]').val();
        var manager_no = $('[name="mng_no"]').attr('empNo');
        var user_no = $('[name="user_no"]').attr('empNo');
        var cpu = $('[name="cpu"]').val();
        var ram = $('[name="ram"]').val();
        var mb = $('[name="mb"]').val();
        var graphic = $('[name="graphic"]').val();
        var hdd = $('[name="hdd"]').val();
        var cd_rom = $('[name="cd_rom"]').val();
        var fdd = $('[name="fdd"]').val();
        var sound = $('[name="sound"]').val();
        var lan = $('[name="lan"]').val();
        var display = $('[name="display"]').val();
        var internet_settings = $('[name="internet_settings"]').val();
        var as_details = $('[name="as_details"]').val();
        var operating_system_and_others = $('[name="operating_system_and_others"]').val();
        var update = new Date().getFullYear() + '-' + new Date().getMonth() + '-' + new Date().getDate();

        $.ajax({
            type: 'GET',
            url: baseUrl + '/computer/createComp',
            data: {'asset_number': asset_number,
                'comp_name': comp_name,
                'manager_no': manager_no,
                'user_no': user_no,
                'cpu': cpu,
                'ram': ram,
                'mb': mb,
                'graphic': graphic,
                'hdd': hdd,
                'cd_rom': cd_rom,
                'fdd': fdd,
                'sound': sound,
                'lan': lan,
                'display': display,'internet_settings': internet_settings,'as_details': as_details,'operating_system_and_others': operating_system_and_others,'update': update}
        }).success(function(msg){
                if(msg == 1){
                    alert("Create Computer '" + comp_name + "' successful!");
                    goToPage('<?php echo Employees::BASE_URL?>/computer/getAllComp')
                } else {
                    alert("Create Computer '" + comp_name + "' fail!");
                }
            });
    }
</script>
<div class="content">
    <div class="content_title"> + Computer Management</div>
    <div id="create_computer_content" class="content_main content_main_without_nav" style="margin-top: 10px">
        <div class="frame_title" style="width: 1000px;height: auto;padding-bottom: 5px;margin: auto;">New Computer</div>
        <table border="0" style="width: 1000px;margin: auto;">
            <tr class="form">
                <td class="form info_form info_form_comp">Asset Number</td><td class="form value_form_comp"><input type="text" name="asset_number" style="width: 100%"></td>
                <td class="form info_form info_form_comp">Manager</td><td class="form value_form_comp"><input id="ip_mng_no" type="text" name="mng_no" style="width: 200px;margin-right: 5px"><button class="bt_select" onclick="openNewWindow('<?php echo Employees::BASE_URL ?>/employees/getAllEmpWindow?id=ip_mng_no','Employees List')">Employee Select</button></td>
            </tr>
            <tr class="form">
                <td class="form info_form info_form_comp">Computer Name</td><td class="form value_form_comp"><input type="text" name="computer_name" style="width: 100%"></td>
                <td class="form info_form info_form_comp">User</td><td class="form value_form_comp"><input id="ip_user_no" type="text" name="user_no" style="width: 200px;margin-right: 5px"><button class="bt_select" onclick="openNewWindow('<?php echo Employees::BASE_URL ?>/employees/getAllEmpWindow?id=ip_user_no','Employees List')">Employee Select</button></td>
            </tr>
            <tr class="form"><td colspan="4" class="form"><div class="separator_hor" style="height: 2px;width: 100%"></div></td></tr>
            <tr class="form">
                <td class="form info_form info_form_comp">CPU</td><td class="form value_form_comp"><input type="text" name="cpu" style="width: 100%"></td>
                <td class="form info_form info_form_comp">RAM</td><td class="form value_form_comp"><input type="text" name="ram" style="width: 100%"></td>
            </tr>
            <tr class="form">
                <td class="form info_form info_form_comp">M/B</td><td class="form value_form_comp"><input type="text" name="mb" style="width: 100%"></td>
                <td class="form info_form info_form_comp">Graphic</td><td class="form value_form_comp"><input type="text" name="graphic" style="width: 100%"></td>
            </tr>
            <tr class="form">
                <td class="form info_form info_form_comp">HDD</td><td class="form value_form_comp"><input type="text" name="hdd" style="width: 100%"></td>
                <td class="form info_form info_form_comp">CD-ROM</td><td class="form value_form_comp"><input type="text" name="cd_rom" style="width: 100%"></td>
            </tr>
            <tr class="form">
                <td class="form info_form info_form_comp">FDD</td><td class="form value_form_comp"><input type="text" name="fdd" style="width: 100%"></td>
                <td class="form info_form info_form_comp">Sound</td><td class="form value_form_comp"><input type="text" name="sound" style="width: 100%"></td>
            </tr>
            <tr class="form">
                <td class="form info_form info_form_comp">Lan</td><td class="form value_form_comp"><input type="text" name="lan" style="width: 100%"></td>
                <td class="form info_form info_form_comp">Display</td><td class="form value_form_comp"><input type="text" name="display" style="width: 100%"></td>
            </tr>
            <tr class="form"><td colspan="4" class="form"><div class="separator_hor" style="height: 2px;width: 100%"></div></td></tr>
            <tr class="form">
                <td class="form info_form info_form_comp">Internet Settings</td><td class="form value_form_comp"><textarea name="internet_settings" style="width: 100%;height: 100px"></textarea></td>
                <td class="form info_form info_form_comp">A/S Details</td><td class="form value_form_comp"><textarea name="as_details" style="width: 100%;height: 100px"></textarea></td>
            </tr>
            <tr style="height: 10px"><td colspan="4" class="form"></td></tr>
            <tr class="form">
                <td class="form info_form info_form_comp">Operating System and Others</td><td colspan="3" class="form" style="padding-right: 20px;"><textarea name="operating_system_and_others" style="width: 100%;height: 100px"></textarea></td>
            </tr>
            <tr style="height: 100px"><td colspan="4" class="form" style="text-align: center"><button class="bt_large" style="margin-right: 10px" onclick="actionCreateNewComp()">Create</button><button class="bt_large" onclick="goToPage('<?php echo Employees::BASE_URL ?>/computer/getAllComp')">Cancel</button></td></tr>
        </table>
    </div>
</div>
