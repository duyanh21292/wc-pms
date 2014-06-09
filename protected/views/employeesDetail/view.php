<div class="content">
    <div class="content_title"> + Employees Management</div>
    <div class="content_left_nav">
        <a class="nav_item_link" href="#"><div class="nav_item nav_selected">My information</div></a>
        <a class="nav_item_link" href="#"><div class="nav_item">My history</div></a>
        <a class="nav_item_link" href="#"><div class="nav_item">Memorial day</div></a>
        <a class="nav_item_link" href="#"><div class="nav_item">Vacation</div></a>
        <a class="nav_item_link" href="#"><div class="nav_item">Welfare Expense</div></a>
        <div class="nav_item" onclick="showAllTimetrackByEmp()">Time Track</div>
        <div class="nav_item" onclick="showListMyProject()">My Project</div>
        <a class="nav_item_link" href="#"><div class="nav_item">My Workload</div></a>
        <a class="nav_item_link" href="#"><div class="nav_item">Report</div></a>
    </div>
    <div id="info_content" class="content_main visible"  style="width: 650px;">
        <div class="frame_title">My Information</div>
        <?php foreach($model as $obj):?>
            <table style="width: 100%">
                <tr class="form">
                    <td class="form my_info_form">Employee Number</td>
                    <td class="form my_info_value"><?php echo $obj->EmpNo?></td>
                </tr>
                <tr class="form">
                    <td class="form my_info_form">User ID</td>
                    <td class="form my_info_value"><?php echo $_SESSION['user']?></td>
                </tr>
                <tr class="form">
                    <td class="form my_info_form">Password</td>
                    <td class="form my_info_value"><button class="bt_select">Password Change</button></td>
                </tr>
                <tr class="form">
                    <td class="form my_info_form">Name</td>
                    <td class="form my_info_value"><?php echo $obj->Full_Name?></td>
                </tr>
                <tr class="form">
                    <td class="form my_info_form">Gender</td>
                    <td class="form my_info_value"><?php if($obj->Gender == 1) echo 'Male'; else echo 'Female'?></td>
                </tr>
                <tr class="form">
                    <td class="form my_info_form">Registration Number</td>
                    <td class="form my_info_value"><?php echo $obj->Reg_Number?></td>
                </tr>
                <tr class="form">
                    <td class="form my_info_form">Division</td>
                    <td class="form my_info_value"><?php echo $obj->DivisionName?></td>
                </tr>
                <tr class="form">
                    <td class="form my_info_form">Department</td>
                    <td class="form my_info_value"><?php echo $obj->DepName?></td>
                </tr>
                <tr class="form">
                    <td class="form my_info_form">Job Title</td>
                    <td class="form my_info_value"><?php echo $obj->JobName?></td>
                </tr>
                <tr class="form">
                    <td class="form my_info_form">Manager</td>
                    <td class="form my_info_value"><?php echo $obj->Manager_Name?></td>
                </tr>
                <tr class="form">
                    <td class="form my_info_form">Entry Date</td>
                    <td class="form my_info_value"><?php $entry_date = date("Y-m-d", strtotime($obj->Entry_Date)); echo $entry_date;?></td>
                </tr>
                <tr class="form">
                    <td class="form my_info_form">Address</td>
                    <td class="form my_info_value"><input type="text" name="info_address" value="<?php echo $obj->Address?>" style="width: 400px;"></td>
                </tr>
                <tr class="form">
                    <td class="form my_info_form">Mobile Phone</td>
                    <td class="form my_info_value"><input type="text" name="info_mobile" value="<?php echo $obj->Mobile?>"></td>
                </tr>
                <tr class="form">
                    <td class="form my_info_form">Tel (Home)</td>
                    <td class="form my_info_value"><input type="text" name="info_tel_home" value="<?php echo $obj->Tel_Home?>"></td>
                </tr>
                <tr class="form">
                    <td class="form my_info_form">Extension Number</td>
                    <td class="form my_info_value"><input type="text" name="info_ext_number" value="<?php echo $obj->Ext_Number?>"></td>
                </tr>
                <tr class="form">
                    <td class="form my_info_form">Education</td>
                    <td class="form my_info_value"><select id="cb_edu" name="info_edu" style="min-width: 150px"></select></td>
                </tr>
                <tr class="form">
                    <td class="form my_info_form">E-mail</td>
                    <td class="form my_info_value"><input type="text" name="info_email" value="<?php echo $obj->Email?>" style="width: 300px;"></td>
                </tr>
                <tr class="form">
                    <td class="form my_info_form">Private E-mail</td>
                    <td class="form my_info_value"><input type="text" name="info_email" value="<?php echo $obj->Private_Email?>" style="width: 300px;"></td>
                </tr>
                <tr class="form">
                    <td class="form my_info_form">Birth Date</td>
                    <td class="form my_info_value"><select id="cb_year" name="year"></select>&nbsp;Year&nbsp;<select id="cb_month" name="month"></select>&nbsp;Month&nbsp;<select id="cb_day" name="day"></select>&nbsp;Day&nbsp;</td>
                </tr>
                <tr class="form">
                    <td class="form my_info_form">Marital</td>
                    <td class="form my_info_value"><input type="radio" name="marital_status" value="no">&nbsp;No<input type="radio" name="marital_status" value="yes" style="margin-left: 5px">&nbsp;Yes</td>
                </tr>
                <tr style="height: 100px">
                    <td colspan="2" class="form" style="text-align: center">
                        <button class="bt_large" style="margin-right: 10px">Save</button>
                        <button class="bt_large">Reset</button>
                    </td>
                </tr>
                <script>
                    $.ajax({
                        type: 'GET',
                        url: '<?php echo Employees::BASE_URL ?>/education/getAllEduCb'
                    }).success(function(data){
                            $('#cb_edu').html(data);
                            $("#cb_edu").children().each(function(){
                                var val = $(this).text();
                                if (val == <?php echo "'".$obj->EducationName."'"?>){
                                    $(this).attr('selected',true);
                                }
                            });
                        });
                    var strDate = <?php $birth_date = date("Y-m-d", strtotime($obj->Birth_Date)); echo "'".$birth_date."'";?>;
                    var bdate = new Date(strDate);
                    $("#cb_year").html(getYearCbData(bdate.getFullYear()));
                    $("#cb_month").html(getMonthCbData(bdate.getMonth()));
                    $("#cb_day").html(getDayCbData(bdate.getDate()));
                    var marital = <?php echo $obj->Marital_Status?>;
                    if(marital == 1){
                        $('[name="marital_status"]').filter('[value=yes]').prop('checked',true);
                    } else if (marital == 0){
                        $('[name="marital_status"]').filter('[value=no]').prop('checked',true);
                    }
                </script>
            </table>
        <?php endforeach ?>
    </div>
</div>