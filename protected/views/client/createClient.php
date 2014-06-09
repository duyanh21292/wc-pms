<script>
    function actionCreateNewClient(){
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
        var reg_date = new Date().getFullYear() + '/' + (new Date().getMonth() + 1) + '/' + new Date().getDate();
        var modify_date = new Date().getFullYear() + '/' + (new Date().getMonth() + 1) + '/' + new Date().getDate();

        $.ajax({
            type: 'POST',
            url: '<?php echo Employees::BASE_URL ?>/client/createClient',
            data: {'client_name' : client_name,
                'tel' : tel,
                'fax' : fax,
                'zip_code' : zip_code,
                'address' : address,
                'url' : url,
                'location' : location,
                'country_id' : country_id,
                'level_id' : level_id,
                'memo' : memo,
                'status' : status,
                'reg_date' : reg_date,
                'modify_date' : modify_date}
        }).success(function(msg){
                if(msg == 1){
                    alert("Create Client '" + client_name + "' successful!");
                    goToPage("<?php echo Employees::BASE_URL ?>/client/getAllClient");
                } else {
                    alert("Create Client '" + client_name + "' fail!");
                }
            });
    }
</script>
<div class="content">
    <div class="content_title"> + Client Management</div>
    <div class="content_left_nav">
        <a class="nav_item_link" href="#">
            <div class="nav_item nav_selected">All level</div>
        </a>
        <a class="nav_item_link" href="#">
            <div class="nav_item">Level A</div>
        </a>
        <a class="nav_item_link" href="#">
            <div class="nav_item">Level B</div>
        </a>
        <a class="nav_item_link" href="#">
            <div class="nav_item">Level C</div>
        </a>
        <a class="nav_item_link" href="#">
            <div class="nav_item">Level D</div>
        </a>
    </div>
    <div id="create_client_content" class="content_main">
        <div class="create_form">
            <div class="frame_title">New Client</div>
            <table border="0">
                <tr class="form"><td class="form info_form">Company Name</td><td class="form value_form"><input type="text" name="client_name" style="width: 400px"></td></tr>
                <tr class="form"><td class="form info_form">Tel.</td><td class="form value_form"><input type="text" name="tel" style="width: 250px"></td></tr>
                <tr class="form"><td class="form info_form">Fax.</td><td class="form value_form"><input type="text" name="fax" style="width: 250px"></td></tr>
                <tr class="form"><td class="form info_form">Zip Code</td><td class="form value_form"><input type="text" name="zip_code1" style="width: 50px"> - <input type="text" name="zip_code2" style="width: 50px"></td></tr>
                <tr class="form"><td class="form info_form">Address</td><td class="form value_form" style="padding-top: 3px;padding-bottom: 3px"><textarea name="address" style="width: 100%;height: 100px;"></textarea></td></tr>
                <tr class="form"><td class="form info_form">Url</td><td class="form value_form"><input type="text" name="url" style="width: 100%"></td></tr>
                <tr class="form"><td colspan="2" class="form"><div class="separator_hor" style="height: 2px;width: 100%"></div></td></tr>
                <tr class="form">
                    <td class="form info_form">Location</td>
                    <td class="form value_form">
                        <form>
                            <input type="radio" name="location" value="Domestic" checked> Domestic&nbsp;&nbsp;&nbsp;
                            <input type="radio" name="location" value="Abroad"> Abroad
                        </form>
                    </td>
                </tr>
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
                        <textarea name="memo" style="width: 100%;height: 100px;"></textarea>
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
                        <input type="radio" name="status" value="Active" checked> Active&nbsp;&nbsp;&nbsp;
                        <input type="radio" name="status" value="Temporary"> Temporary&nbsp;&nbsp;&nbsp;
                        <input type="radio" name="status" value="Inactive"> Inactive
                    </td>
                </tr>
                <tr style="height: 100px"><td colspan="2" class="form" style="text-align: center"><button class="bt_large" style="margin-right: 10px" onclick="actionCreateNewClient()">Create</button><button class="bt_large" onclick="goToPage('<?php echo Employees::BASE_URL?>/client/getAllClient')">List</button></td></tr>
            </table>
            <script>
                $.ajax({
                    type: 'GET',
                    url: '<?php echo Employees::BASE_URL?>/countries/getAllCountriesCb'
                }).success(function(data){
                        $('#cb_country').append(data);
                    });
                $.ajax({
                    type: 'GET',
                    url: '<?php echo Employees::BASE_URL ?>/clevel/getAllClientLevelCb'
                }).success(function(data){
                        $('#cb_level').append(data);
                    });
                $.ajax({
                    type: 'GET',
                    url: '<?php echo Employees::BASE_URL ?>/clevel/getAllClientLevelInfo'
                }).success(function(data){
                        $('#td_client_level').append(data);
                    });
            </script>
        </div>
    </div>
</div>