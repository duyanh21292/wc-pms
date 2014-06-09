<script>
    function actionModifyClient(client_id){
        var client_name = $('[name="client_name"]').val();
        var tel = $('[name="tel"]').val();
        var fax = $('[name="fax"]').val();
        var zip_code = '';
        var zc1 = $('[name="zip_code1"]').val();
        var zc2 = $('[name="zip_code2"]').val();
        if (!jQuery.isEmptyObject(zc1) && !jQuery.isEmptyObject(zc2)) {
            zip_code = zc1 + '-' + zc2;
        } else if (!jQuery.isEmptyObject(zc1)) {
            zip_code = zc1;
        } else if (!jQuery.isEmptyObject(zc2)) {
            zip_code = zc2;
        }
        var address = $('[name="address"]').val();
        var url = $('[name="url"]').val();
        var location = $('[name="location"]:checked').val();
        var country_id = $('[name="country"]').val();
        var level_id = $('[name="level"]').val();
        var memo = CKEDITOR.instances['memo'].getData();
        var status = $('[name="status"]:checked').val();
        var modify_date = new Date().getFullYear() + '/' + (new Date().getMonth() + 1) + '/' + new Date().getDate();

        $.ajax({
            type: 'POST',
            url: '<?php echo Employees::BASE_URL ?>/client/updateClient',
            data: {'client_id': client_id,'client_name' : client_name,'tel' : tel,'fax' : fax,'zip_code' : zip_code,'address' : address,'url' : url,'location' : location,'country_id' : country_id,'level_id' : level_id,'memo' : memo,'status' : status,'modify_date' : modify_date}
        }).success(function(msg){
                if(msg == 1){
                    alert("Modify Client successful!");
                    goToPage('<?php echo Employees::BASE_URL?>/client/getClientDetail?client_id='+client_id);
                } else {
                    alert("Modify Client fail!");
                }
            });
    }
</script>
<div class="content">
    <div class="content_title"> + Clients Management</div>
    <div class="content_left_nav">
        <a class="nav_item_link" href="<?php echo Employees::BASE_URL?>/client/getAllClient">
            <div class="nav_item nav_selected">All level</div>
        </a>
    </div>
    <script>
        $.ajax({
            type: 'GET',
            url: '<?php echo Employees::BASE_URL ?>/clevel/getAllClientLevel'
        }).success(function(data){
                $('.content_left_nav').append(data);
            });
    </script>
    <div id="create_client_content" class="content_main">
        <div class="create_form">
                <div class="frame_title"><?php echo($model->ClientName)?>'s information</div>
                <table border="0">
                    <tr class="form">
                        <td class="form info_form">Company Name</td>
                        <td class="form value_form">
                            <input type="text" name="client_name" style="width: 400px" value="<?php echo($model->ClientName)?>">
                        </td>
                    </tr>
                    <tr class="form">
                        <td class="form info_form">Tel.</td>
                        <td class="form value_form">
                            <input type="text" name="tel" style="width: 250px" value="<?php echo($model->Tel)?>">
                        </td>
                    </tr>
                    <tr class="form">
                        <td class="form info_form">Fax.</td>
                        <td class="form value_form">
                            <input type="text" name="fax" style="width: 250px" value="<?php echo($model->Fax)?>">
                        </td>
                    </tr>
                    <tr class="form">
                        <td class="form info_form">Zip Code</td>
                        <td class="form value_form">
                            <input type="text" name="zip_code1" style="width: 50px"> - <input type="text" name="zip_code2" style="width: 50px">
                        </td>
                    </tr>
                    <tr class="form">
                        <td class="form info_form">Address</td>
                        <td class="form value_form" style="padding-top: 3px;padding-bottom: 3px">
                            <textarea name="address" style="width: 100%;height: 100px;"><?php echo($model->Address)?></textarea>
                        </td>
                    </tr>
                    <tr class="form">
                        <td class="form info_form">Url</td>
                        <td class="form value_form">
                            <input type="text" name="url" style="width: 100%" value="<?php echo($model->Url)?>">
                        </td>
                    </tr>
                    <tr class="form"><td colspan="2" class="form"><div class="separator_hor" style="height: 2px;width: 100%"></div></td></tr>
                    <tr class="form">
                        <td class="form info_form">Location</td>
                        <td class="form value_form"><input type="radio" name="location" value="Domestic" <?php if($model->Location == 'Domestic') {echo('checked');} ?> > Domestic&nbsp;&nbsp;&nbsp;<input type="radio" name="location" value="Abroad" <?php if($model->Location == 'Abroad') {echo('checked');} ?>> Abroad</td></tr>
                    <tr class="form"><td class="form info_form">Country</td><td class="form value_form"><select id="cb_country" name="country"><option value="">-------------------Country-------------------</option></select></td></tr>
                    <tr class="form"><td colspan="2" class="form"><div class="separator_hor" style="height: 2px;width: 100%"></div></td></tr>
                    <tr class="form">
                        <td class="form info_form">Level</td>
                        <td id="td_client_level" class="form value_form">
                            <select id="cb_level" name="level"><option value="">------Level------</option></select>
                        </td>
                    </tr>
                    <tr class="form"><td colspan="2" class="form"><div class="separator_hor" style="height: 2px;width: 100%"></div></td></tr>
                    <tr class="form">
                        <td class="form info_form">Memo</td>
                        <td class="form value_form">
                            <textarea name="memo" style="width: 100%;height: 100px;"><?php echo($model->Memo)?></textarea>
                            <script>
                                CKEDITOR.replace('memo',{
                                    skin: 'office2013'
                                });
                            </script>
                        </td>
                    </tr>
                    <tr class="form">
                        <td class="form info_form">Status</td>
                        <td class="form value_form">
                            <input type="radio" name="status" value="Active" <?php if($model->Status == 'Active') {echo('checked');} ?> > Active&nbsp;&nbsp;&nbsp;
                            <input type="radio" name="status" value="Temporary" <?php if($model->Status == 'Temporary') {echo('checked');} ?> > Temporary&nbsp;&nbsp;&nbsp;
                            <input type="radio" name="status" value="Inactive" <?php if($model->Status == 'Inactive') {echo('checked');} ?> > Inactive
                        </td>
                    </tr>
                    <tr class="form">
                        <td class="form info_form"></td>
                        <td class="form value_form" style="text-align: right;color: #227ACC;font-family: pms-font-semibold,Arial,sans-serif"><?php $regDate = date("Y/m/d", strtotime($model->RegDate)); echo($regDate)?>&nbsp;Regist..&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;<?php $modifyDate = date("Y/m/d", strtotime($model->ModifyDate)); echo($modifyDate)?>&nbsp;Update..</td>
                    </tr>
                    <tr style="height: 100px"><td colspan="2" class="form" style="text-align: center"><button class="bt_large" style="margin-right: 10px" onclick="actionModifyClient(<?php echo($model->Client_ID)?>)">Save</button><button class="bt_large" onclick="goToPage('<?php echo Employees::BASE_URL?>/client/getClientDetail?client_id=<?php echo $model->Client_ID?>')">Cancel</button></td></tr>
                </table>
                <script>
                    $.ajax({
                        type: 'GET',
                        url: '<?php echo Employees::BASE_URL?>/countries/getAllCountriesCb'
                    }).success(function(data){
                            $('#cb_country').append(data);
                            $("#cb_country").children().each(function(){
                                var val = $(this).val();
                                if (val == "<?php echo($model->Country_ID)?>"){
                                    $(this).attr('selected',true);
                                }
                            });
                        });
                    $.ajax({
                        type: 'GET',
                        url: '<?php echo Employees::BASE_URL ?>/clevel/getAllClientLevelInfo'
                    }).success(function(data){
                            $('#td_client_level').append(data);
                        });
                    $.ajax({
                        type: 'GET',
                        url: '<?php echo Employees::BASE_URL ?>/clevel/getAllClientLevelCb'
                    }).success(function(data){
                            $('#cb_level').append(data);
                            $("#cb_level").children().each(function(){
                                var val = $(this).val();
                                if (val == '<?php echo($model->C_Level_ID)?>'){
                                    $(this).attr('selected',true);
                                }
                            });
                        });
                </script>
        </div>
    </div>
</div>