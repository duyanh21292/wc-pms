<script>
    function actionModifyProject(prj_no){
        var project_name = $('[name="project_name"]').val();
        var password = $('[name="password"]').val();
        var division_id = $('[name="biz_division"]').val();
        var industry_id = $('[name="industry"]').val();
        var client_id = $('#client_selected_name').attr("clientID");
        var c_contact_id = $('[name="c_contact"]').val();
        var c_fcontact_id = $('[name="c_fcontact"]').val();
        var c_po_no = $('[name="c_po_no"]').val();
        var c_pj_no = $('[name="c_pj_no"]').val();
        var pj_mng_no = $('[name="prj_mng"]').val();
        var sales_mng_no = $('[name="sales_mng"]').val();
        var vat_tax = $('[name="vat_tax"]').val();
        var currency_id = $('[name="currency"]').val();
        var due_date = $('[name="year_due"]').val() + '-' + $('[name="month_due"]').val() + '-' + $('[name="day_due"]').val();
        var reg_date = $('[name="year_reg"]').val() + '-' + $('[name="month_reg"]').val() + '-' + $('[name="day_reg"]').val();

        $.ajax({
            type: 'POST',
            url: '<?php echo Employees::BASE_URL ?>/projects/updateProject',
            data: {'prj_no': prj_no,'project_name': project_name, 'password': password, 'division_id': division_id, 'industry_id': industry_id, 'client_id': client_id, 'c_contact_id': c_contact_id, 'c_fcontact_id': c_fcontact_id, 'c_po_no': c_po_no, 'c_pj_no': c_pj_no, 'pj_mng_no': pj_mng_no, 'sales_mng_no': sales_mng_no, 'vat_tax': vat_tax, 'currency_id': currency_id, 'due_date': due_date, 'reg_date': reg_date}
        }).success(function(msg){
                if(msg == 1){
                    alert("Modify project successful!");
                    goToPage('<?php echo Employees::BASE_URL ?>/projects/getProjectDetail?prj_no=<?php echo $model->ProjectNo ?>');
                } else {
                    alert("Modify project fail!");
                }
            });
    }
</script>
<div class="content">
    <div class="content_title"> + Project Management</div>
    <div class="content_left_nav">
        <a class="nav_item_link" href="<?php echo Employees::BASE_URL?>/projects/getAllProjects"><div class="nav_item">All list</div></a>
    </div>
    <script>
        $.ajax({
            type: 'GET',
            url: '<?php echo Employees::BASE_URL?>/status/getAllStatus',
            data: { status_type : 'status'}
        }).success(function(data){
                $('.content_left_nav').append(data);
            });
    </script>
    <div id="create_project_content" class="content_main">
        <div class="create_form">
            <div class="frame_title">Project Modify</div>
            <table border="0">
                <tr class="form">
                    <td class="form info_form">Project No.</td>
                    <td class="form value_form"><div class="value_selected" style="font-size: medium"><?php echo $model->ProjectNo ?></div></td>
                </tr>
                <tr class="form">
                    <td class="form info_form">Project Name</td>
                    <td class="form value_form">
                        <input type="text" name="project_name" style="width: 400px" value="<?php echo $model->ProjectName ?>">
                    </td>
                </tr>
                <tr class="form">
                    <td class="form info_form">Password</td>
                    <td class="form value_form">
                        <input type="password" name="password" style="width: 250px" value="<?php echo $model->Password ?>">
                    </td>
                </tr>
                <tr class="form">
                    <td class="form info_form">Biz. Division</td>
                    <td class="form value_form">
                        <select id="cb_biz_division" name="biz_division" style="min-width: 200px"></select>
                    </td>
                </tr>
                <tr class="form">
                    <td class="form info_form">Industry</td>
                    <td class="form value_form">
                        <select id="cb_industry" name="industry" style="min-width: 300px"></select>
                    </td>
                </tr>
                <tr class="form"><td colspan="2" class="form"><div class="separator_hor" style="height: 2px;width: 100%"></div></td></tr>
                <tr class="form">
                    <td class="form info_form">Client</td>
                    <td class="form value_form">
                        <div class="value_selected" id="client_selected_name" clientID="<?php echo $model-> Client_ID ?>"><?php echo $model->ClientName?></div>
                        <button onclick="openNewWindow('<?php echo Employees::BASE_URL?>/client/getAllClientWindow','Clients List')" class="bt_select">Client Select</button>
                    </td>
                </tr>
                <tr class="form">
                    <td class="form info_form">C - Contact</td>
                    <td class="form value_form">
                        <select id="cb_c_contact" name="c_contact" style="min-width: 200px" disabled>
                            <option>Client has not been selected</option>
                        </select>
                    </td>
                </tr>
                <tr class="form">
                    <td class="form info_form">C - F.Contact</td>
                    <td class="form value_form">
                        <select id="cb_c_fcontact" name="c_fcontact" style="min-width: 200px" disabled>
                            <option>Client has not been selected</option>
                        </select>
                    </td>
                </tr>
                <tr class="form">
                    <td class="form info_form">C - PO No.</td>
                    <td class="form value_form">
                        <input type="text" name="c_po_no" style="width: 250px" value="<?php echo $model->C_PoNo?>">
                    </td>
                </tr>
                <tr class="form">
                    <td class="form info_form">C - Project No.</td>
                    <td class="form value_form">
                        <input type="text" name="c_pj_no" style="width: 250px" value="<?php echo $model->C_ProjectNo?>">
                    </td>
                </tr>
                <tr class="form"><td colspan="2" class="form"><div class="separator_hor" style="height: 2px;width: 100%"></div></td></tr>
                <tr class="form">
                    <td class="form info_form">Sales Manager</td>
                    <td class="form value_form">
                        <select id="cb_sales_mng" name="sales_mng" style="min-width: 200px"></select>
                    </td>
                </tr>
                <tr class="form">
                    <td class="form info_form">Project Manager</td>
                    <td class="form value_form">
                        <select id="cb_prj_mng" name="prj_mng" style="min-width: 200px"></select>
                    </td>
                </tr>
                <tr class="form"><td colspan="2" class="form"><div class="separator_hor" style="height: 2px;width: 100%"></div></td></tr>
                <tr class="form">
                    <td class="form info_form">VAT/TAX</td>
                    <td class="form value_form">
                        <input type="text" name="vat_tax" value="<?php echo $model->VATTAX ?>" style="text-align: right;min-width: 100px">&nbsp;%
                    </td>
                </tr>
                <tr class="form">
                    <td class="form info_form">Currency</td>
                    <td class="form value_form">
                        <select id="cb_currency" name="currency" style="min-width: 100px"></select>
                    </td>
                </tr>
                <tr class="form"><td colspan="2" class="form"><div class="separator_hor" style="height: 2px;width: 100%"></div></td></tr>
                <tr class="form">
                    <td class="form info_form">Reg. Date</td>
                    <td class="form value_form"><select id="cb_year_reg" name="year_reg"></select>&nbsp;Year&nbsp;<select id="cb_month_reg" name="month_reg"></select>&nbsp;Month&nbsp;<select id="cb_day_reg" name="day_reg"></select>&nbsp;Day&nbsp;</td>
                </tr>
                <tr class="form">
                    <td class="form info_form">Due Date</td>
                    <td class="form value_form"><select id="cb_year_due" name="year_due"></select>&nbsp;Year&nbsp;<select id="cb_month_due" name="month_due"></select>&nbsp;Month&nbsp;<select id="cb_day_due" name="day_due"></select>&nbsp;Day&nbsp;</td>
                </tr>
                <tr style="height: 100px">
                    <td colspan="2" class="form" style="text-align: center">
                        <button class="bt_large" style="margin-right: 10px" onclick="actionModifyProject('<?php echo $model->ProjectNo ?>')">Save</button>
                        <button class="bt_large" onclick="goToPage('<?php echo Employees::BASE_URL ?>/projects/getProjectDetail?prj_no=<?php echo $model->ProjectNo ?>')">Cancel</button>
                    </td>
                </tr>
            </table>
            <script>
                $.ajax({
                    type: 'GET',
                    url: '<?php echo Employees::BASE_URL?>/contact/getAllContactCb',
                    data: {client_id : '<?php echo $model->Client_ID?>'}
                }).success(function(data){
                    $('#cb_c_contact').attr('disabled',false);
                    $('#cb_c_contact').html(data);
                    $('#cb_c_contact').children().each(function(){
                        var cont_id = $(this).val();
                        if(cont_id == '<?php echo $model->C_Contact_ID ?>'){
                            $(this).attr('selected',true);
                        }
                    });
                    $('#cb_c_fcontact').attr('disabled',false);
                    $('#cb_c_fcontact').html(data);
                    $('#cb_c_fcontact').children().each(function(){
                        var cont_id = $(this).val();
                        if(cont_id == '<?php echo $model->C_FContact_ID ?>'){
                            $(this).attr('selected',true);
                        }
                    });
                });
                $.ajax({
                    type: 'GET',
                    url: '<?php echo Employees::BASE_URL?>/division/getAllDivisionCb'
                }).success(function(data){
                        $('#cb_biz_division').html(data);
                        $('#cb_biz_division').children().each(function(){
                            var div_id = $(this).val();
                            if(div_id == '<?php echo $model->Division_ID ?>'){
                                $(this).attr('selected',true);
                            }
                        });
                    });
                $.ajax({
                    type: 'GET',
                    url: '<?php echo Employees::BASE_URL?>/industry/getAllIndustryCb'
                }).success(function(data){
                        $('#cb_industry').html(data);
                        $('#cb_industry').children().each(function(){
                            var ind_id = $(this).val();
                            if(ind_id == '<?php echo $model->Industry_ID ?>'){
                                $(this).attr('selected',true);
                            }
                        });
                    });
                $.ajax({
                    type: 'GET',
                    url: '<?php echo Employees::BASE_URL?>/employees/getEmployeeByJob',
                    data: {job : 'Pm'}
                }).success(function(data){
                        $('#cb_prj_mng').html(data);
                        $('#cb_prj_mng').children().each(function(){
                            var emp_no = $(this).val();
                            if(emp_no == '<?php echo $model->ProjectManagerNo ?>'){
                                $(this).attr('selected',true);
                            }
                        });
                    });
                $.ajax({
                    type: 'GET',
                    url: '<?php echo Employees::BASE_URL?>/employees/getEmployeeByJob',
                    data: {job : 'Sales'}
                }).success(function(data){
                        $('#cb_sales_mng').html(data);
                        $('#cb_sales_mng').children().each(function(){
                            var emp_no = $(this).val();
                            if(emp_no == '<?php echo $model->SaleManagerNo ?>'){
                                $(this).attr('selected',true);
                            }
                        });
                    });
                $.ajax({
                    type: 'GET',
                    url: '<?php echo Employees::BASE_URL?>/currency/getAllCurrencyCb'
                }).success(function(data){
                        $('#cb_currency').html(data);
                        $('#cb_currency').children().each(function(){
                            var curr_id = $(this).val();
                            if(curr_id == '<?php echo $model->Currency_ID ?>'){
                                $(this).attr('selected',true);
                            }
                        });
                    });
                var regDate = "<?php $reg_date = date('Y-m-d', strtotime($model->RegDate)); echo  $reg_date?>";
                var dueDate = "<?php $due_date = date('Y-m-d', strtotime($model->DueDate)); echo  $due_date?>";
                var regSplit = regDate.split('-');
                var dueSplit = dueDate.split('-');
                regSplit[0]  = parseInt(regSplit[0]);
                regSplit[1]  = parseInt(regSplit[1]) - 1;
                regSplit[2]  = parseInt(regSplit[2]);

                dueSplit[0]  = parseInt(dueSplit[0]);
                dueSplit[1]  = parseInt(dueSplit[1]) - 1;
                dueSplit[2]  = parseInt(dueSplit[2]);

                $('#cb_year_due').html(getYearCbData(dueSplit[0]));
                $('#cb_year_reg').html(getYearCbData(regSplit[0]));
                $('#cb_month_due').html(getMonthCbData(dueSplit[1]));
                $('#cb_month_reg').html(getMonthCbData(regSplit[1]));
                $('#cb_day_due').html(getDayCbData(dueSplit[2]));
                $('#cb_day_reg').html(getDayCbData(regSplit[2]));
            </script>
        </div>
    </div>
</div>