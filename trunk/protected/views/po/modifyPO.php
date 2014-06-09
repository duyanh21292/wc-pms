<?php
    $url_callback = Employees::BASE_URL.'/po/getAllPrjPo?prj_no='.$model->ProjectNo.'&po_no='.$model->PoNo;
?>
<script>
    function actionModifyPO(po_no){
        var project_no = $('#project_selected_name').attr('projno');
        var supplier_no = $('#supplier_selected_name').attr('suppno');
        var s_contact_id = $('[name="supp_contact"]').val();
        var language_pair_id = $('[name="lang_pair"]').val();
        var a_task_id = $('[name="a_task"]').val();
        var unit_id = $('[name="unit"]').val();
        var quantity = $('[name="quantity"]').val();
        var u_price = $('[name="u_price"]').val();
        var currency_id = $('[name="currency"]').val();
        var file_item = $('[name="file_item"]').val();
        var work_load = $('[name="work_load"]').val();
        var delivery_method_id = $('[name="delivery_method"]').val();
        var comments = CKEDITOR.instances['comments'].getData();

        var due_date = $('[name="year_due"]').val() + '-' + $('[name="month_due"]').val() + '-' + $('[name="day_due"]').val();
        var reg_date = $('[name="year_reg"]').val() + '-' + $('[name="month_reg"]').val() + '-' + $('[name="day_reg"]').val();

        $.ajax({
            type: 'POST',
            url: '<?php echo Employees::BASE_URL ?>/po/updatePo',
            data: {'po_no' : po_no,'project_no' : project_no, 'supplier_no' : supplier_no, 's_contact_id' : s_contact_id, 'language_pair_id' : language_pair_id, 'a_task_id' : a_task_id, 'unit_id' : unit_id, 'quantity' : quantity, 'u_price' : u_price, 'currency_id' : currency_id, 'file_item' : file_item, 'reg_date' : reg_date, 'due_date' : due_date, 'work_load' : work_load, 'delivery_method_id' : delivery_method_id, 'comments' : comments}
        }).success(function(msg){
                if(msg == 1){
                    alert("Modify PO successful!");
                    goToPage('<?php echo $url_callback?>');
                } else {
                    alert("Modify PO fail!");
                }
            });
    }
</script>
<div class="content">
    <div class="content_title"> + PO Management</div>
    <div class="content_left_nav">
        <a class="nav_item_link" href="#"><div class="nav_item nav_selected">All</div></a>
    </div>
    <script>
        $.ajax({
            type: 'GET',
            url: '<?php echo Employees::BASE_URL ?>/postatus/getAllPoStatus'
        }).success(function(data){
                $('.content_left_nav').append(data);
            });
    </script>
    <div id="create_project_content" class="content_main">
        <div class="create_form">
            <div class="frame_title">Po Modify</div>
            <table border="0">
                <tr class="form">
                    <td class="form info_form">PO No.</td>
                    <td class="form value_form"><div class="value_selected" style="font-size: medium"><?php echo $model->PoNo ?></div></td>
                </tr>
                <tr class="form">
                    <td class="form info_form">Project</td>
                    <td class="form value_form">
                        <div class="value_selected" id="project_selected_name" style="font-size: medium;" projno="<?php echo $model->ProjectNo; ?>"><?php echo $model->ProjectName ?></div>
<!--                        <button onclick="openNewWindow('--><?php //echo Employees::BASE_URL?><!--/projects/getAllProjectWindow','Projects List')" class="bt_select">Project Select</button>-->
                    </td>
                </tr>
                <tr class="form">
                    <td class="form info_form">Supplier</td>
                    <td class="form value_form">
                        <div class="value_selected" id="supplier_selected_name" suppno="<?php echo $model->SupplierNo ?>"><?php echo $model->SupplierName ?></div>
                        <button onclick="openNewWindow('<?php echo Employees::BASE_URL?>/supplier/getAllSupplierWindow','Projects List')" class="bt_select">Supplier Select</button>
                    </td>
                </tr>
                <tr class="form">
                    <td class="form info_form">Language Pair</td>
                    <td class="form value_form">
                        <select id="cb_lang_pair" name="lang_pair" style="min-width: 300px" disabled>
                            <option>Supplier has not been selected</option>
                        </select>
                    </td>
                </tr>
                <tr class="form">
                    <td class="form info_form">Task</td>
                    <td class="form value_form">
                        <select id="cb_a_task" name="a_task" style="min-width: 300px" disabled>
                            <option>Supplier has not been selected</option>
                        </select>
                    </td>
                </tr>
                <tr class="form"><td colspan="2" class="form"><div class="separator_hor" style="height: 2px;width: 100%"></div></td></tr>
                <tr class="form">
                    <td class="form info_form">Unit</td>
                    <td class="form value_form">
                        <select id="cb_unit" name="unit" style="min-width: 150px">

                        </select>
                    </td>
                </tr>
                <tr class="form">
                    <td class="form info_form">Quantity</td>
                    <td class="form value_form">
                        <input type="text" name="quantity" style="width: 150px" value="<?php echo $model->Quantity ?>">
                    </td>
                </tr>
                <tr class="form">
                    <td class="form info_form">U/Price</td>
                    <td class="form value_form">
                        <input type="text" name="u_price" style="width: 250px" value="<?php echo $model->UPrice ?>">
                    </td>
                </tr>
                <tr class="form">
                    <td class="form info_form">Currency</td>
                    <td class="form value_form">
                        <select id="cb_currency" name="currency" style="min-width: 150px"></select>
                    </td>
                </tr>
                <tr class="form">
                    <td class="form info_form">File/Item</td>
                    <td class="form value_form">
                        <input type="text" name="file_item" style="width: 250px" value="<?php echo $model->FileItem ?>">
                    </td>
                </tr>
                <tr class="form"><td colspan="2" class="form"><div class="separator_hor" style="height: 2px;width: 100%"></div></td></tr>
                <tr class="form">
                    <td class="form info_form">Reg. Date</td>
                    <td class="form value_form">
                        <select id="cb_year_reg" name="year_reg"></select>&nbsp;Year&nbsp;<select id="cb_month_reg" name="month_reg"></select>&nbsp;Month&nbsp;<select id="cb_day_reg" name="day_reg"></select>&nbsp;Day&nbsp;
                    </td>
                </tr>
                <tr class="form">
                    <td class="form info_form">Due Date</td>
                    <td class="form value_form">
                        <select id="cb_year_due" name="year_due"></select>&nbsp;Year&nbsp;<select id="cb_month_due" name="month_due"></select>&nbsp;Month&nbsp;<select id="cb_day_due" name="day_due"></select>&nbsp;Day&nbsp;
                    </td>
                </tr>
                <tr class="form">
                    <td class="form info_form">Work Load</td>
                    <td class="form value_form">
                        <input type="text" name="work_load" style="text-align: right;width: 100px" value="<?php echo $model->WorkLoad ?>">&nbsp;%
                    </td>
                </tr>
                <tr class="form">
                    <td class="form info_form">Delivery Method</td>
                    <td class="form value_form">
                        <select id="cb_delivery_method" name="delivery_method" style="min-width: 150px">
                            <option value="">---------Select---------</option>
                        </select>
                    </td>
                </tr>
                <tr class="form"><td colspan="2" class="form"><div class="separator_hor" style="height: 2px;width: 100%"></div></td></tr>
                <tr class="form">
                    <td class="form info_form">Comments</td>
                    <td class="form value_form">
                        <textarea name="comments"><?php echo($model->Comments)?></textarea>
                    </td>
                </tr>
                <tr style="height: 100px">
                    <td colspan="2" class="form" style="text-align: center">
                        <button class="bt_large" style="margin-right: 10px" onclick="actionModifyPO('<?php echo $model->PoNo ?>')">Save</button>
                        <button class="bt_large" onclick="goToPage('<?php echo $url_callback?>')">Cancel</button>
                    </td>
                </tr>
            </table>
            <script>
                CKEDITOR.replace('comments',{
                    skin: 'office2013'
                });
                if (!jQuery.isEmptyObject('<?php echo $model->Contact_ID?>')) {
                    $.ajax({
                        type: 'GET',
                        url: '<?php echo(Employees::BASE_URL) ?>/suppliercontact/getSuppContactCb',
                        data: {'supp_no' : '<?php echo $model->SupplierNo?>'}
                    }).success(function(data){
                            $('#supplier_selected_name').append(data);
                            $('#cb_supp_contact').children().each(function(){
                                var contact_id = $(this).val();
                                if(contact_id == '<?php echo $model->Contact_ID ?>'){
                                    $(this).attr('selected',true);
                                }
                            });
                        });
                }
                $.ajax({
                    type: 'GET',
                    url: '<?php echo Employees::BASE_URL?>/supplier/getSupplierLangPairCb',
                    data: {'supplier_no': '<?php echo $model->SupplierNo ?>'}
                }).success(function(data){
                        $('#cb_lang_pair').attr('disabled',false);
                        $('#cb_lang_pair').html(data);
                        $('#cb_lang_pair').children().each(function(){
                            var lang_id = $(this).val();
                            if(lang_id == '<?php echo $model->Language_Pair_ID ?>'){
                                $(this).attr('selected',true);
                            }
                        });
                    });
                $.ajax({
                    type: 'GET',
                    url: '<?php echo Employees::BASE_URL?>/supplier/getSupplierTaskCb',
                    data: {'supplier_no': '<?php echo $model->SupplierNo ?>'}
                }).success(function(data){
                        $('#cb_a_task').attr('disabled',false);
                        $('#cb_a_task').html(data);
                        $('#cb_a_task').children().each(function(){
                            var lang_id = $(this).val();
                            if(lang_id == '<?php echo $model->ATask_ID ?>'){
                                $(this).attr('selected',true);
                            }
                        });
                    });
                $.ajax({
                    type: 'GET',
                    url: '<?php echo(Employees::BASE_URL)?>/unit/getAllUnitCb'
                }).success(function(data){
                        $('#cb_unit').html(data);
                        $('#cb_unit').children().each(function(){
                            var unit_id = $(this).val();
                            if(unit_id == '<?php echo $model->Unit_ID ?>'){
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
                            var currency_id = $(this).val();
                            if(currency_id == '<?php echo $model->Currency_ID ?>'){
                                $(this).attr('selected',true);
                            }
                        });
                    });
                $.ajax({
                    type: 'GET',
                    url: '<?php echo Employees::BASE_URL?>/deliverymethod/getAllDeliveryMethodCb'
                }).success(function(data){
                        $('#cb_delivery_method').append(data);
                        $('#cb_delivery_method').children().each(function(){
                            var delivery_id = $(this).val();
                            if(delivery_id == '<?php echo $model->DeliveryMethod_ID ?>'){
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