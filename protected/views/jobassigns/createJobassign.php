<script>
    function actionCreateJobAssign(){
        var prj_no = $('#project_selected_name').attr('prjno');
        var emp_no = $('#emp_selected_name').attr('empNo');
        var task_id = $('[name="task"]').val();
        var act_id = $('[name="activities"]').val();
        var unit = $('[name="unit"]').val();
        var quantity = $('[name="quantity"]').val();
        var assigned_hour = $('[name="assigned_hour"]').val();
        var start_date = $('[name="year_start"]').val() + '-' + $('[name="month_start"]').val() + '-' + $('[name="day_start"]').val();
        var end_date = $('[name="year_end"]').val() + '-' + $('[name="month_end"]').val() + '-' + $('[name="day_end"]').val();
        var comment = CKEDITOR.instances['comments'].getData();

        $.ajax({
            type: 'POST',
            url: '<?php Employees::BASE_URL ?>/jobassigns/createJobassigns',
            data: {'prj_no':prj_no,'emp_no':emp_no,'task_id':task_id,'act_id':act_id,'unit':unit,'quantity':quantity,'assigned_hour':assigned_hour,'start_date':start_date,'end_date':end_date,'comment':comment}
        }).success(function(msg){
                if(msg == 1){
                    alert("Create Jobassign successful!");
                    $('#detail_create_job_assign').animate({
                        opacity: 0
                    },'fast',function(){
                        reloadListJobAssign(prj_no);
                    });
                } else {
                    alert("Create Jobassign fail!");
                }
            });
    }
</script>
<div id="detail_create_job_assign" class="detail_content" style="opacity: 0">
    <div class="frame_title" style="margin-top: 0">New JobAssign Registration</div>
    <table border="0">
        <tr class="form">
            <td class="form info_form">Project Name</td>
            <td class="form value_form">
                <div class="value_selected" prjno="<?php echo $model->ProjectNo ?>" id="project_selected_name" style="font-size: medium;margin-top:2px"><?php echo $model-> ProjectName?></div>
                <button class="bt_select" onclick="openNewWindow('<?php echo Employees::BASE_URL?>/projects/getAllProjectWindow','Projects List',985)">Project Select</button>
            </td>
        </tr>
        <tr class="form">
            <td class="form info_form">Employee Name</td>
            <td class="form value_form">
                <div class="value_selected" id="emp_selected_name"></div>
                <button class="bt_select" onclick="openNewWindow('<?php echo Employees::BASE_URL?>/employees/getAllEmpWindow','Employees List')">Employee Select</button>
            </td>
        </tr>
        <tr class="form">
            <td class="form info_form">Task</td>
            <td class="form value_form">
                <select id="cb_task" name="task" style="min-width: 300px" onchange="cbTaskSelectionChange()">
                    <option value="">------Select------</option>
                </select>
            </td>
        </tr>
        <tr class="form">
            <td class="form info_form">Activities</td>
            <td class="form value_form">
                <select id="cb_activities" name="activities" style="min-width: 200px" disabled>
                    <option>Task has not been selected</option>
                </select>
            </td>
        </tr>
        <tr class="form">
            <td class="form info_form">Unit</td>
            <td class="form value_form">
                <select id="cb_unit" name="unit" style="min-width: 150px"></select>
            </td>
        </tr>
        <tr class="form">
            <td class="form info_form">Quantity</td>
            <td class="form value_form">
                <input type="text" name="quantity" style="width: 100px">
            </td>
        </tr>
        <tr class="form">
            <td class="form info_form">Assigned Hour</td>
            <td class="form value_form">
                <input type="text" name="assigned_hour" style="width: 100px">&nbsp;Hour
            </td>
        </tr>
        <tr class="form">
            <td class="form info_form">Start Date</td>
            <td class="form value_form"><select id="cb_year_start" name="year_start"></select>&nbsp;Year&nbsp;<select id="cb_month_start" name="month_start"></select>&nbsp;Month&nbsp;<select id="cb_day_start" name="day_start"></select>&nbsp;Day&nbsp;</td>
        </tr>
        <tr class="form">
            <td class="form info_form">End Date</td>
            <td class="form value_form"><select id="cb_year_end" name="year_end"></select>&nbsp;Year&nbsp;<select id="cb_month_end" name="month_end"></select>&nbsp;Month&nbsp;<select id="cb_day_end" name="day_end"></select>&nbsp;Day&nbsp;</td>
        </tr>
        <tr class="form">
            <td class="form info_form">Comments</td>
            <td class="form value_form">
                <textarea name="comments" style="width: 250px"></textarea>
            </td>
        </tr>
        <tr style="height: 100px">
            <td colspan="2" class="form" style="text-align: center">
                <button class="bt_large" style="margin-right: 10px" onclick="actionCreateJobAssign()">Create</button>
                <button class="bt_large" onclick="actionCancel('detail_create_job_assign','detail_job_assign')">Cancel</button>
            </td>
        </tr>
    </table>
</div>
<script>
    $.ajax({
        type: 'GET',
        url: '<?php echo Employees::BASE_URL ?>/unit/getAllUnitCb'
    }).success(function(data){
            $('#cb_unit').html(data);
        });
    $.ajax({
        type: 'GET',
        url: '<?php echo Employees::BASE_URL ?>/task/getAllTaskCb'
    }).success(function(data){
            $('#cb_task').append(data);
        });
    $('#cb_year_start').html(getYearCbData(new Date().getFullYear()));
    $('#cb_year_end').html(getYearCbData(new Date().getFullYear()));
    $('#cb_month_start').html(getMonthCbData(new Date().getMonth()));
    $('#cb_month_end').html(getMonthCbData(new Date().getMonth()));
    $('#cb_day_start').html(getDayCbData(new Date().getDate()));
    $('#cb_day_end').html(getDayCbData(new Date().getDate()));
    CKEDITOR.replace('comments',{
        skin: 'office2013'
    });
</script>