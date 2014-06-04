<script>
    function actionModifySupp(supp_no){
        var check = 0;
        var stype_id = $('[name="supplier_type"]:checked').val();
        var location = $('[name="location"]:checked').val();
        var country_id = $('[name="country"]').val();
        var name = $('[name="name"]').val();
        var reg_no = '';
        var rn1 = $('[name="reg_no1"]').val();
        var rn2 = $('[name="reg_no2"]').val();
        if (!jQuery.isEmptyObject(rn1) && !jQuery.isEmptyObject(rn2)) {
            reg_no = rn1 + '-' + rn2;
        } else if (!jQuery.isEmptyObject(rn1)) {
            reg_no = rn1;
        } else if (!jQuery.isEmptyObject(rn2)) {
            reg_no = rn2;
        }
        var user_id = $('[name="user_id"]').val();
        var pass = $('[name="password"]').val();
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
        var tel = $('[name="tel"]').val();
        var fax = $('[name="fax"]').val();
        var mobile = $('[name="mobile"]').val();
        var email1 = $('[name="email_1"]').val();
        var email2 = $('[name="email_2"]').val();
        var website = $('[name="website"]').val();
        var bank_name = $('[name="bank_name"]').val();
        var branch_name = $('[name="branch_name"]').val();
        var branch_address = $('[name="branch_address"]').val();
        var beneficiary_name = $('[name="beneficiary_name"]').val();
        var account_no = $('[name="account_no"]').val();
        var level_id = $('[name="level"]').val();
        var currency_id = $('[name="currency"]').val();

        var lang_pair_id_selected = '';
        check = 0;
        $('[name="language_pair"]:checked').each(function(){
            if(check > 0) lang_pair_id_selected = lang_pair_id_selected + ','
            lang_pair_id_selected = lang_pair_id_selected + '-' + $(this).val() + '-';
            check++;
        });
        var language_pair_id = lang_pair_id_selected;

        var available_task_id_selected = '';
        check = 0;
        $('[name="available_task"]:checked').each(function(){
            if(check > 0) available_task_id_selected = available_task_id_selected + ','
            available_task_id_selected = available_task_id_selected + '-' + $(this).val() + '-';
            check++;
        });
        var atask_id = available_task_id_selected;

        var major_industry_id_selected = '';
        check = 0;
        $('[name="major_industry"]:checked').each(function(){
            if(check > 0) major_industry_id_selected = major_industry_id_selected + ','
            major_industry_id_selected = major_industry_id_selected + '-' + $(this).val() + '-';
            check++;
        });
        var mindustry_id = major_industry_id_selected;

        var status = $('[name="status"]:checked').val();
        var modify_date = new Date().getFullYear() + '/' + (new Date().getMonth() + 1) + '/' + new Date().getDate();

        $.ajax({
            type: 'POST',
            url: '<?php echo Employees::BASE_URL ?>/supplier/updateSupplier',
            data: {'supplier_no' : supp_no,'stype_id' : stype_id,'location' : location,'country_id' : country_id,'name' : name,'reg_no' : reg_no,'user_id' : user_id,'pass' : pass,'zip_code' : zip_code,'address' : address,'tel' : tel,'fax' : fax,'mobile' : mobile,'email1' : email1,'email2' : email2,'bank_name' : bank_name,'branch_name' : branch_name,'branch_address' : branch_address,'beneficiary_name' : beneficiary_name,'account_no' : account_no,'level_id' : level_id,'currency_id' : currency_id,'language_pair_id' : language_pair_id,'atask_id' : atask_id,'mindustry_id' : mindustry_id,'status' : status,'modify_date' : modify_date}
        }).success(function(msg){
                if(msg == 1){
                    alert("Modify Supplier successful!");
                    goToPage('<?php echo Employees::BASE_URL?>/supplier/getSupplierDetail?supplier_no='+supp_no);
                } else {
                    alert("Modify Supplier fail!");
                }
            });
    }

    function selectSupplierType(type_id,type_name){
        $('#td_supplier_name').text(type_name + ' name');
        if (type_id == 1){
            $('.reg_no').attr('disabled',true);
            $('[name="mobile"]').attr('disabled',true);
            $('[name="fax"]').attr('disabled',false);
            $('.supplier_email').attr('disabled',true);
            $('.branch').attr('disabled',false);
        } else if(type_id == 2){
            $('.reg_no').attr('disabled',false);
            $('[name="mobile"]').attr('disabled',false);
            $('[name="fax"]').attr('disabled',true);
            $('.supplier_email').attr('disabled',false);
            $('.branch').attr('disabled',true);
        }
        $('.reg_no').val('');
        $('[name="mobile"]').val('');
        $('[name="fax"]').val('');
        $('.supplier_email').val('');
        $('.branch').val('');
    }
</script>
<div class="content">
    <div class="content_title"> + Suppliers Management</div>
    <div class="content_left_nav">
        <a class="nav_item_link" href="#">
            <div class="nav_item nav_selected">All Suppliers</div>
        </a>
    </div>
    <script>
        $.ajax({
            type: 'GET',
            url: 'http://x.pms/suppliertype/getAllSupplierType'
        }).success(function(data){
                $('.content_left_nav').append(data);
            });
    </script>
    <div id="create_supplier_content" class="content_main">
        <div class="create_form">
            <div class="frame_title">
                <?php echo($model->SupplierName)?>'s information
            </div>
            <div id="frame_supp_type" style="width: 300px;height: 50px">

            </div>
            <table border="0" style="width: 1000px;max-width: 1000px">
                <tr class="form">
                    <td class="form info_form">Location</td>
                    <td class="form value_form">
                        <input type="radio" name="location" value="Domestic" <?php if ($model->Location == "Domestic") echo "checked"; ?>> Domestic&nbsp;&nbsp;&nbsp;
                        <input type="radio" name="location" value="Abroad" <?php if ($model->Location == "Abroad") echo "checked"; ?>> Abroad&nbsp;&nbsp;&nbsp;
                        <select id="cb_country" name="country"><option value="">-------------------Country-------------------</option></select>
                    </td>
                </tr>
                <tr class="form"><td id="td_supplier_name" class="form info_form">Company Name</td><td class="form value_form"><input type="text" name="name" style="width: 400px" value="<?php echo($model->SupplierName)?>"></td></tr>
                <tr class="form">
                    <td class="form info_form">Registration Number</td>
                    <td class="form value_form">
                        <?php if($model->SType_ID == 1): ?>
                            <input type="text" class="reg_no" name="reg_no1" style="width: 50px" disabled> - <input type="text" class="reg_no" name="reg_no2" style="width: 50px" disabled>
                        <?php elseif($model->SType_ID == 2): ?>
                            <input type="text" class="reg_no" name="reg_no1" style="width: 50px"> - <input type="text" class="reg_no" name="reg_no2" style="width: 50px">
                        <?php endif ?>
                    </td>
                </tr>
                <tr class="form">
                    <td class="form info_form" rowspan="2">Login</td>
                    <td class="form value_form">
                        <div style="width: 100px;float: left;margin-top: 4px;font-family: pms-font-regular,Arial,sans-serif">- User ID</div>
                        <input type="text" name="user_id" style="width: 150px;float: left" value="<?php echo($model->UserID)?>">
                    </td>
                </tr>
                <tr class="form">
                    <td class="form value_form">
                        <div style="width: 100px;float: left;margin-top: 4px;font-family: pms-font-regular,Arial,sans-serif">- Password</div>
                        <input type="password" name="password" style="width: 150px;float: left" value="<?php echo($model->Password)?>">
                    </td>
                </tr>
                <tr class="form">
                    <td class="form info_form">Zip Code</td>
                    <td class="form value_form">
                        <input type="text" name="zip_code1" style="width: 50px"> - <input type="text" name="zip_code2" style="width: 50px">
                    </td>
                </tr>
                <tr class="form"><td colspan="2" class="form"><div class="separator_hor" style="height: 2px;width: 100%"></div></td></tr>
                <tr class="form"><td class="form info_form">Address</td><td class="form value_form" style="padding-top: 3px;padding-bottom: 3px"><textarea name="address" style="width: 100%;height: 100px;"><?php echo($model->Address)?></textarea></td></tr>
                <tr class="form">
                    <td class="form info_form">Comm.</td>
                    <td class="form value_form">
                        <div style="width: 150px;float: left;margin-top: 4px;font-family: pms-font-regular,Arial,sans-serif">- Tel(home/office)</div>
                        <input type="text" name="tel" style="width: 150px;float: left" value="<?php echo($model->Tel)?>">
                        <?php if($model->SType_ID == 1): ?>
                            <div style="width: 100px;float: left;margin-top: 4px;margin-left: 20px;font-family: pms-font-regular,Arial,sans-serif">- Mobile</div>
                            <input type="text" name="mobile" style="width: 150px;float: left" disabled>
                            <div style="width: 50px;float: left;margin-top: 4px;margin-left: 20px;font-family: pms-font-regular,Arial,sans-serif">- Fax</div>
                            <input type="text" name="fax" style="width: 150px;float: left" value="<?php echo($model->Fax)?>">
                        <?php elseif($model->SType_ID == 2): ?>
                            <div style="width: 100px;float: left;margin-top: 4px;margin-left: 20px;font-family: pms-font-regular,Arial,sans-serif">- Mobile</div>
                            <input type="text" name="mobile" style="width: 150px;float: left" value="<?php echo($model->Mobile)?>">
                            <div style="width: 50px;float: left;margin-top: 4px;margin-left: 20px;font-family: pms-font-regular,Arial,sans-serif">- Fax</div>
                            <input type="text" name="fax" style="width: 150px;float: left" disabled>
                        <?php endif ?>
                    </td>
                </tr>
                <tr class="form">
                    <td class="form info_form" rowspan="2">Email</td>
                    <td class="form value_form">
                        <div style="width: 150px;float: left;margin-top: 4px;font-family: pms-font-regular,Arial,sans-serif">- 1st</div>
                        <?php if($model->SType_ID == 1): ?>
                            <input type="text" class="supplier_email" name="email_1" style="width: 424px;float: left" disabled>
                        <?php elseif($model->SType_ID == 2): ?>
                            <input type="text" class="supplier_email" name="email_1" style="width: 424px;float: left" value="<?php echo($model->Email1)?>">
                        <?php endif ?>
                    </td>
                </tr>
                <tr class="form">
                    <td class="form value_form">
                        <div style="width: 150px;float: left;margin-top: 4px;font-family: pms-font-regular,Arial,sans-serif">- 2nd</div>
                        <?php if($model->SType_ID == 1): ?>
                            <input type="text" class="supplier_email" name="email_2" style="width: 424px;float: left" disabled>
                        <?php elseif($model->SType_ID == 2): ?>
                            <input type="text" class="supplier_email" name="email_2" style="width: 424px;float: left" value="<?php echo($model->Email2)?>">
                        <?php endif ?>
                    </td>
                </tr>
                <tr class="form">
                    <td class="form info_form">Website</td>
                    <td class="form value_form"><input type="text" name="website" style="width: 100%" value="<?php echo($model->Website)?>"></td>
                </tr>
                <tr class="form"><td colspan="2" class="form"><div class="separator_hor" style="height: 2px;width: 100%"></div></td></tr>
                <tr class="form">
                    <td class="form info_form" rowspan="3">Bank Information</td>
                    <td class="form value_form">
                        <div style="width: 150px;float: left;margin-top: 4px;font-family: pms-font-regular,Arial,sans-serif">- Bank Name</div>
                        <input type="text" name="bank_name" style="width: 200px;float: left" value="<?php echo($model->BankName)?>">
                        <div style="width: 150px;float: left;margin-top: 4px;margin-left: 20px;font-family: pms-font-regular,Arial,sans-serif">- Branch Name</div>
                        <?php if($model->SType_ID == 1): ?>
                            <input type="text" class="branch" name="branch_name" style="width: 200px;float: left" value="<?php echo($model->BranchName)?>">
                        <?php elseif($model->SType_ID == 2): ?>
                            <input type="text" class="branch" name="branch_name" style="width: 200px;float: left" disabled>
                        <?php endif ?>
                    </td>
                </tr>
                <tr class="form">
                    <td class="form value_form">
                        <div style="width: 150px;float: left;margin-top: 4px;font-family: pms-font-regular,Arial,sans-serif">- Branch Address</div>
                        <?php if($model->SType_ID == 1): ?>
                            <input type="text" class="branch" name="branch_address" style="width: 574px;float: left" value="<?php echo($model->BranchAddress)?>">
                        <?php elseif($model->SType_ID == 2): ?>
                            <input type="text" class="branch" name="branch_address" style="width: 574px;float: left" disabled>
                        <?php endif ?>
                    </td>
                </tr>
                <tr class="form">
                    <td class="form value_form">
                        <div style="width: 150px;float: left;margin-top: 4px;font-family: pms-font-regular,Arial,sans-serif">- Beneficiary Name</div>
                        <input type="text" name="beneficiary_name" style="width: 200px;float: left" value="<?php echo($model->BeneficiaryName)?>">
                        <div style="width: 150px;float: left;margin-top: 4px;margin-left: 20px;font-family: pms-font-regular,Arial,sans-serif">- Account No</div>
                        <input type="text" name="account_no" style="width: 200px;float: left" value="<?php echo($model->AccountNo)?>">
                    </td>
                </tr>
                <tr class="form"><td colspan="2" class="form"><div class="separator_hor" style="height: 2px;width: 100%"></div></td></tr>
                <tr class="form">
                    <td class="form info_form" colspan="2">Qualification Information</td>
                </tr>
                <tr class="form">
                    <td class="form info_form"></td>
                    <td class="form value_form">
                        <table border="0" style="width: 100%">
                            <tr class="form">
                                <td class="form info_form" style="font-family: pms-font-regular,Arial,sans-serif;">- Level</td>
                                <td id="td_supplier_level" class="form value_form" style="padding-top: 10px;padding-bottom: 10px;">
                                    <select id="cb_level" name="level">
                                        <option value="">------Level------</option>
                                    </select>
                                </td>
                            </tr>
                            <tr class="form">
                                <td class="form info_form" style="font-family: pms-font-regular,Arial,sans-serif;">- Currency</td>
                                <td class="form value_form">
                                    <select id="cb_currency" name="currency">
                                        <option value="">------Currency------</option>
                                    </select>
                                </td>
                            </tr>
                            <tr class="form">
                                <td class="form info_form" style="font-family: pms-font-regular,Arial,sans-serif;">- Language Pair</td>
                                <td class="form value_form" style="padding-top: 10px;padding-bottom: 10px;">
                                    <div id="frame_language_pair" class="supplier_qlf_if"></div>
                                    <div id="language_pair_selected" class="supplier_qlf_selected"><?php echo $model->Language_Pair_Name?></div>
                                </td>
                            </tr>
                            <tr class="form">
                                <td class="form info_form" style="font-family: pms-font-regular,Arial,sans-serif;">- Available Task</td>
                                <td class="form value_form" style="padding-top: 10px;padding-bottom: 10px;">
                                    <div id="frame_available_task" class="supplier_qlf_if"></div>
                                    <div id="available_task_selected" class="supplier_qlf_selected"><?php echo $model->Task_Name?></div>
                                </td>
                            </tr>
                            <tr class="form">
                                <td class="form info_form" style="font-family: pms-font-regular,Arial,sans-serif;">- Major Industry</td>
                                <td class="form value_form" style="padding-top: 10px;padding-bottom: 10px;">
                                    <div id="frame_major_industry" class="supplier_qlf_if"></div>
                                    <div id="major_industry_selected" class="supplier_qlf_selected"><?php echo $model->Industry_Name?></div>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr class="form"><td colspan="2" class="form"><div class="separator_hor" style="height: 2px;width: 100%"></div></td></tr>
                <tr class="form">
                    <td class="form info_form">Status</td>
                    <td class="form value_form">
                        <input type="radio" name="status" value="Active" <?php if($model->Status == 'Active') {echo('checked');} ?> > Active&nbsp;&nbsp;&nbsp;
                        <input type="radio" name="status" value="Inactive" <?php if($model->Status == 'Inactive') {echo('checked');} ?> > Inactive
                    </td>
                </tr>
                <tr class="form">
                    <td class="form info_form"></td>
                    <td class="form value_form" style="text-align: left;color: #227ACC;font-family: pms-font-semibold,Arial,sans-serif"><?php $regDate = date("Y/m/d", strtotime($model->RegDate)); echo($regDate)?>&nbsp;Regist..&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;<?php $modifyDate = date("Y/m/d", strtotime($model->ModifyDate)); echo($modifyDate)?>&nbsp;Update..</td>
                </tr>
                <tr style="height: 100px"><td colspan="2" class="form" style="text-align: center"><button class="bt_large" style="margin-right: 10px" onclick="actionModifySupp('<?php echo $model->SupplierNo ?>')">Save</button><button class="bt_large" onclick="goToPage('<?php echo Employees::BASE_URL?>/supplier/getSupplierDetail?supplier_no=<?php echo $model->SupplierNo ?>')">Cancel</button></td></tr>
            </table>
            <script>
                var reg_no = '<?php echo $model->RegistrationNo?>';
                var reg_no_arr = reg_no.split("-");
                $('[name="reg_no1"]').val(reg_no_arr[0]);
                if (reg_no_arr.length > 1)
                    $('[name="reg_no2"]').val(reg_no_arr[1]);

                var zip_code = '<?php echo $model->ZipCode?>';
                var zip_code_arr = zip_code.split("-");
                $('[name="zip_code1"]').val(zip_code_arr[0]);
                if (zip_code_arr.length > 1)
                    $('[name="zip_code2"]').val(zip_code_arr[1]);

                $.ajax({
                    type: 'GET',
                    url: '<?php echo Employees::BASE_URL?>/suppliertype/getAllSupplierTypeRadio'
                }).success(function(data){
                        $('#frame_supp_type').append(data);
                        $('#frame_supp_type').children().each(function(){
                            var supp_type_id = $(this).children('input').val();
                            if (supp_type_id == '<?php echo $model-> SType_ID?>') {
                                $(this).children('input').attr('checked',true);
                            }
                        });
                    });
                $.ajax({
                    type: 'GET',
                    url: '<?php echo Employees::BASE_URL?>/countries/getAllCountriesCb'
                }).success(function(data){
                        $('#cb_country').append(data);
                        $('#cb_country').children().each(function(){
                            var country_id = $(this).val();
                            if (country_id == '<?php echo $model-> Country_ID?>') {
                                $(this).attr('selected',true);
                            }
                        });
                    });
                $.ajax({
                    type: 'GET',
                    url: '<?php echo Employees::BASE_URL ?>/slevel/getAllLevelCb'
                }).success(function(data){
                        $('#cb_level').append(data);
                        $('#cb_level').children().each(function(){
                            var level_id = $(this).val();
                            if (level_id == '<?php echo $model-> SLevel_ID?>') {
                                $(this).attr('selected',true);
                            }
                        });
                    });
                $.ajax({
                    type: 'GET',
                    url: '<?php echo Employees::BASE_URL ?>/slevel/getAllLevelInfo'
                }).success(function(data){
                        $('#td_supplier_level').append(data);
                    });
                $.ajax({
                    type: 'GET',
                    url: '<?php echo Employees::BASE_URL?>/currency/getAllCurrencyCb'
                }).success(function(data){
                        $('#cb_currency').append(data);
                        $('#cb_currency').children().each(function(){
                            var currency_id = $(this).val();
                            if (currency_id == '<?php echo $model-> Currency_ID?>') {
                                $(this).attr('selected',true);
                            }
                        });
                    });
                $.ajax({
                    type: 'GET',
                    url: '<?php echo Employees::BASE_URL?>/languagepair/getAllLangPairChb'
                }).success(function(data){
                        $('#frame_language_pair').append(data);
                        $('[name="language_pair"]').click(function(){
                            var lang_pair_selected = '';
                            var check = 0;
                            $('[name="language_pair"]:checked').each(function(){
                                if(check > 0) lang_pair_selected = lang_pair_selected + ' , '
                                lang_pair_selected = lang_pair_selected + $(this).attr('text');
                                check++;
                            });
                            $('#language_pair_selected').text(lang_pair_selected);
                        });
                        var lang_pair_string = '<?php echo $model->Language_Pair_ID?>';
                        var lang_pair_id_arr = lang_pair_string.replace(/-/g,"").split(',');
                        lang_pair_id_arr.forEach(function(elem){
                            $('[name="language_pair"]').each(function(){
                                var lang_pair_id = $(this).val();
                                if (lang_pair_id == elem) {
                                    $(this).attr('checked',true);
                                    return false;
                                }
                            });
                        });
                    });
                $.ajax({
                    type:'GET',
                    url:'<?php echo Employees::BASE_URL ?>/availabletask/getAllATaskChb'
                }).success(function(data){
                        $('#frame_available_task').append(data);
                        $('[name="available_task"]').click(function(){
                            var available_task_selected = '';
                            var check = 0;
                            $('[name="available_task"]:checked').each(function(){
                                if(check > 0) available_task_selected = available_task_selected + ' , '
                                available_task_selected = available_task_selected + $(this).attr('text');
                                check++;
                            });
                            $('#available_task_selected').text(available_task_selected);
                        });
                        var a_task_string = '<?php echo $model->ATask_ID?>';
                        var a_task_id_arr = a_task_string.replace(/-/g,"").split(',');
                        a_task_id_arr.forEach(function(elem){
                            $('[name="available_task"]').each(function(){
                                var a_task_id = $(this).val();
                                if (a_task_id == elem) {
                                    $(this).attr('checked',true);
                                    return false;
                                }
                            });
                        });
                    });
                $.ajax({
                    type:'GET',
                    url:'<?php echo Employees::BASE_URL ?>/majorindustry/getAllMajorIndustryChb'
                }).success(function(data){
                        $('#frame_major_industry').append(data);
                        $('[name="major_industry"]').click(function(){
                            var major_industry_selected = '';
                            var check = 0;
                            $('[name="major_industry"]:checked').each(function(){
                                if(check > 0) major_industry_selected = major_industry_selected + ' , '
                                major_industry_selected = major_industry_selected + $(this).attr('text');
                                check++;
                            });
                            $('#major_industry_selected').text(major_industry_selected);
                        });
                        var m_industry_string = '<?php echo $model->MIndustry_ID?>';
                        var m_industry_id_arr = m_industry_string.replace(/-/g,"").split(',');
                        m_industry_id_arr.forEach(function(elem){
                            $('[name="major_industry"]').each(function(){
                                var m_industry_id = $(this).val();
                                if (m_industry_id == elem) {
                                    $(this).attr('checked',true);
                                    return false;
                                }
                            });
                        });
                    });
            </script>
        </div>
    </div>
</div>