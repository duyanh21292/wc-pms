<script>
    function actionCreateSpec(){
        var prj_no = '<?php echo $model->ProjectNo ?>';
        var spec_task_id = $('[name="spec_task"]').val();
        var file_item = $('[name="file_item"]').val();
        var unit_id = $('[name="unit"]').val();
        var quantity = $('[name="quantity"]').val();
        var u_price = $('[name="u_price"]').val();
        var cur_id = $('#spec_currency').attr('curid');
        var memo = CKEDITOR.instances['memo'].getData();
        var exch_rate = $('#spec_currency').attr('exchrate');
        alert (prj_no);
        $.ajax({
            type: 'GET',
            url: '<?php Employees::BASE_URL ?>/spec/createSpec',
            data: {'prj_no': prj_no, 'spec_task_id': spec_task_id, 'file_item': file_item, 'unit_id': unit_id, 'quantity': quantity, 'u_price': u_price, 'cur_id': cur_id, 'memo': memo,'exch_rate':exch_rate}
        }).success(function(msg){
                if(msg == 1){
                    alert("Create Spec successful!");
                    $('#detail_create_spec').animate({
                        opacity: 0
                    },'fast',function(){
                        reloadListSpec(prj_no);
                    });
                } else {
                    alert("Create Spec fail!");
                }
            });
    }
</script>
<div id="detail_create_spec" class="detail_content" style="opacity: 0">
    <div class="frame_title" style="margin-top: 0">New Spec Registration</div>
    <table border="0">
        <tr class="form">
            <td class="form info_form">Task</td>
            <td class="form value_form">
                <select id="cb_spec_task" name="spec_task" style="min-width: 250px">
                    <option value="">-----------Select-----------</option>
                </select>
            </td>
        </tr>
        <tr class="form">
            <td class="form info_form">File/Item</td>
            <td class="form value_form">
                <input name="file_item" style="width: 300px">
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
                <input name="quantity" style="width: 150px">
            </td>
        </tr>
        <tr class="form">
            <td class="form info_form">U/Price</td>
            <td class="form value_form">
                <input name="u_price" style="width: 200px">
            </td>
        </tr>
        <tr class="form">
            <td class="form info_form">Currency</td>
            <td class="form value_form">
                <div id="spec_currency" style="font-family: pms-font-regular,Arial,sans-serif">USD </div>
            </td>
        </tr>
        <tr class="form">
            <td class="form info_form">Memo</td>
            <td class="form value_form">
                <textarea name="memo" style="width: 250px"></textarea>
            </td>
        </tr>
        <tr style="height: 100px">
            <td colspan="2" class="form" style="text-align: center">
                <button class="bt_large" style="margin-right: 10px" onclick="actionCreateSpec()">Create</button>
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
        url: '<?php echo Employees::BASE_URL ?>/spectask/getAllSpecTaskCb'
    }).success(function(data){
            $('#cb_spec_task').append(data);
        });
    $.ajax({
        type: 'GET',
        url: '<?php echo Employees::BASE_URL?>/currency/getCurrencyNo',
        data: {'cur_no': 'USD'}
    }).success(function(data){
            $('#spec_currency').attr('curid',data);
        });

    $.ajax({
        type: 'GET',
        url: '<?php echo Employees::BASE_URL?>/currency/getExchange',
        data: {'cur_no': 'USD'}
    }).success(function(data){
            $('#spec_currency').attr('exchrate',data);
            $('#spec_currency').append('(' + data + ' VND)');
        });
    CKEDITOR.replace('memo',{
        skin: 'office2013'
    });
</script>