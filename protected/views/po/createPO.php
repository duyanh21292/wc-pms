<?php
    $url_callback = Employees::BASE_URL.'/po/getAllPo';
    $url_prj_no = $_GET['prj_no'];
    $bt_cancel = 'List';
?>
<?php if(!empty($url_prj_no)):?>
    <?php $url_callback = Employees::BASE_URL.'/po/getAllPrjPo?prj_no='.$url_prj_no;
    $bt_cancel = 'Cancel'; ?>
<?php endif; ?>
<script>
    function actionCreatePO(){
        var month = (new Date().getMonth()) + 1;
        if (month < 10) {
            month = '0' + month;
        }
        var year = new Date().getFullYear() + '';
        var po_no = year.substring(2) + '' + month;
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
            url: '<?php echo Employees::BASE_URL ?>/po/createPO',
            data: {'po_no' : po_no,'project_no' : project_no, 'supplier_no' : supplier_no, 's_contact_id' : s_contact_id, 'language_pair_id' : language_pair_id, 'a_task_id' : a_task_id, 'unit_id' : unit_id, 'quantity' : quantity, 'u_price' : u_price, 'currency_id' : currency_id, 'file_item' : file_item, 'reg_date' : reg_date, 'due_date' : due_date, 'work_load' : work_load, 'delivery_method_id' : delivery_method_id, 'comments' : comments}
        }).success(function(msg){
                if(msg == 1){
                    alert("Create PO successful!");
                    goToPage('<?php echo $url_callback?>');
                } else {
                    alert("Create PO fail!");
                }
            });
    }
</script>
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
            });
    </script>
    <div id="create_project_content" class="content_main">
        <div class="create_form">
            <div class="frame_title">New PO Registration</div>
            <table border="0">
                <tr class="form">
                    <td class="form info_form">Project</td>
                    <td class="form value_form">
                        <?php if(!empty($url_prj_no)):?>
                            <script>
                                $.ajax({
                                    type: 'GET',
                                    url: '<?php echo Employees::BASE_URL?>/projects/getProjectName',
                                    data: {'prj_no': '<?php echo $url_prj_no ?>'}
                                }).success(function(data){
                                        $('#project_selected_name').html(data);
                                        $('#project_selected_name').attr('projno','<?php echo $url_prj_no ?>');
                                    });
                            </script>
                        <?php endif; ?>
                        <div class="value_selected" id="project_selected_name" style="font-size: medium;"></div>
                        <button onclick="openNewWindow('<?php echo Employees::BASE_URL?>/projects/getAllProjectWindow','Projects List')" class="bt_select">Project Select</button>
                    </td>
                </tr>
                <tr class="form">
                    <td class="form info_form">Supplier</td>
                    <td class="form value_form">
                        <div class="value_selected" id="supplier_selected_name"></div>
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
                        <input type="text" name="quantity" style="width: 150px">
                    </td>
                </tr>
                <tr class="form">
                    <td class="form info_form">U/Price</td>
                    <td class="form value_form">
                        <input type="text" name="u_price" style="width: 250px">
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
                        <input type="text" name="file_item" style="width: 250px">
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
                        <input type="text" name="work_load" style="text-align: right;width: 100px">&nbsp;%
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
                        <textarea name="comments"></textarea>
                    </td>
                </tr>
                <tr style="height: 100px">
                    <td colspan="2" class="form" style="text-align: center">
                        <button class="bt_large" style="margin-right: 10px" onclick="actionCreatePO()">Create</button>
                        <button class="bt_large" onclick="goToPage('<?php echo $url_callback?>')"><?php echo $bt_cancel?></button>
                    </td>
                </tr>
            </table>
            <script>
                CKEDITOR.replace('comments',{
                    skin: 'office2013'
                });
                $.ajax({
                    type: 'GET',
                    url: '<?php echo(Employees::BASE_URL)?>/unit/getAllUnitCb'
                }).success(function(data){
                        $('#cb_unit').html(data);
                    });
                $.ajax({
                    type: 'GET',
                    url: '<?php echo Employees::BASE_URL?>/currency/getAllCurrencyCb'
                }).success(function(data){
                        $('#cb_currency').html(data);
                    });
                $.ajax({
                    type: 'GET',
                    url: '<?php echo Employees::BASE_URL?>/deliverymethod/getAllDeliveryMethodCb'
                }).success(function(data){
                        $('#cb_delivery_method').append(data);
                    });
                $('#cb_year_due').html(getYearCbData(new Date().getFullYear()));
                $('#cb_year_reg').html(getYearCbData(new Date().getFullYear()));
                $('#cb_month_due').html(getMonthCbData(new Date().getMonth()));
                $('#cb_month_reg').html(getMonthCbData(new Date().getMonth()));
                $('#cb_day_due').html(getDayCbData(new Date().getDate()));
                $('#cb_day_reg').html(getDayCbData(new Date().getDate()));
            </script>
        </div>
    </div>
</div>