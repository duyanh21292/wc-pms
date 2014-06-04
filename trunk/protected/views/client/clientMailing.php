<script>
    function searchContactMail(){
        var search_type = $('[name="search_type"]').val();
        var search_content = $('[name="search_content"]').val();
        var status = $('[name="status_filter"]').val();
        var location = $('[name="location_filter"]').val();
        var level_id = $('[name="level_filter"]').val();
        $.ajax({
            type:'GET',
            url: baseUrl + '/client/searchContactMail',
            data: {'search_type':search_type,'search_content':search_content,'status':status,'location':location,'level_id':level_id}
        }).success(function(data){
                $('#addresses_list').html(data);
            });
    }
</script>
<div class="content">
    <div class="content_title"> + Client Mailing</div>
    <div class="content_main content_main_without_nav" style="left: 0;margin-top: 10px">
        <table id="client_mailing_list" class="mail_form" border="0">
            <tr style="height: 40px">
                <td colspan="2" class="form org_div_name frame_title" style="background-color: #fff;padding-left: 10px">New Message</td>
            </tr>
            <tr style="height: 10px"><td colspan="2" class="form"></td></tr>
            <tr style="height: 30px">
                <td class="form info_form" style="padding-top: 10px;padding-bottom: 10px">Direct Manager</td>
                <td class="form mail_item" style="padding-top: 10px;padding-bottom: 10px">
                    <select id="cb_prj_mng" name="prj_mng">
                        <option># Project Manager</option>
                    </select>
                    <select id="cb_sales_mng" name="sales_mng">
                        <option># Sales Manager</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td rowspan="3" class="form info_form">Recipients</td>
                <td class="form mail_item">
                    <select id="cb_level_filter" class="cb_search" name="level_filter">
                        <option value="">++ All Level ++</option>
                    </select>
                    <script>
                        $.ajax({
                            type: 'GET',
                            url: baseUrl + '/clevel/getAllClientLevelCb'
                        }).success(function(data){
                                $('#cb_level_filter').append(data);
                            });
                    </script>
                    <select id="cb_status_filter" class="cb_search" name="status_filter">
                        <option value="">++ All Status ++</option>
                        <option value='Active'>Active</option>
                        <option value='Inactive'>Inactive</option>
                        <option value='Temporary'>Temporary</option>
                    </select>
                    <select id="cb_location_filter" class="cb_search" name="location_filter">
                        <option value="">++ All Location ++</option>
                        <option value='Domestic'>Domestic</option>
                        <option value='Abroad'>Abroad</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td class="form mail_item">
                    Detail search&nbsp;<input type="checkbox" name="detail_search">
                    <select class="cb_search_type" name="search_type" style="margin-left: 5px">
                        <option value='ClientName' selected>ClientName</option>
                        <option value='CountryName'>ClientCountry</option>
                        <option value='ClientTel' >ClientTel</option>
                        <option value='ClientFax' >ClientFax</option>
                        <option value='ContactName' >ContactsName</option>
                        <option value='Email' >ContactsEmail</option>
                        <option value='Mobile' >ContactsMobile</option>
                    </select>
                    <input id="ip_search_client_mail_content" type="text" name="search_content" style="width: 350px">
                    <script>
                        $('#ip_search_client_mail_content').keypress(function(e){
                            var code = e.keyCode || e.which;
                            if(code == 13) {
                                searchContactMail();
                            }
                        })
                    </script>
                    <i class="icon ion-ios7-search-strong search" onclick="searchContactMail()" title="Search" style="margin-left: 5px"></i>
                </td>
            </tr>
            <tr>
                <td class="form mail_item">
                    <div id="addresses_list" style="height: 200px;border: 1px solid #A9A9A9;background-color: #FFFFFF;overflow-y: auto">
                        <?php foreach($model as $obj): ?>
                            <?php if(!empty($obj->Email)):?>
                                <div class="contact_mail_highlight">
                                    <div style="float: left"><?php echo($obj->ContactName); ?></div><div style="float: left;font-family: pms-font-regular,Arial,sans-serif">&nbsp;- <?php echo($obj->Email); ?></div>
                                </div>
                            <?php endif ?>
                        <?php endforeach ?>
                    </div>
                </td>
            </tr>
            <tr style="height: 10px"><td colspan="2" class="form"></td></tr>
            <tr>
                <td class="form info_form">Title</td>
                <td class="form mail_item"><input type="text" name="title" style="width: 100%"></td>
            </tr>
            <tr style="height: 10px"><td colspan="2" class="form"></td></tr>
<!--            <tr style="height: 30px">-->
<!--                <td class="form info_form">Coding type</td>-->
<!--                <td class="form mail_item"><input name="coding_type" type="radio" value="html" checked> HTML <input name="coding_type" type="radio" value="html_text"> HTML + Text <input name="coding_type" type="radio" value="text"> Text &nbsp;<input name="use_template" type="checkbox" checked> Use template</td>-->
<!--            </tr>-->
            <tr>
                <td class="form info_form">Contents</td>
                <td class="form mail_item">
                    <textarea name="mail_content" style="width: 100%;height: 300px"></textarea>
                    <script>
                        CKEDITOR.replace('mail_content',{
                            skin: 'office2013'
                        });
                    </script>
                </td>
            </tr>
            <tr>
                <td class="form info_form" style="padding-top: 10px;padding-bottom: 10px">File attachment</td>
                <td class="form mail_item"  style="padding-top: 10px;padding-bottom: 10px"s>Number of attachment :
                    <select name="num_att">
                        <?php for($i = 1; $i<11; $i++):?>
                            <option value="<?php echo $i?>"><?php echo $i?></option>
                        <?php endfor?>
                    </select> : Not available to exceed to 2 MB.<br>
                    <input type="file" name="file_att">
                </td>
            </tr>
            <tr style="height: 10px"><td colspan="2" class="form"></td></tr>
            <tr style="height: 80px">
                <td colspan="2" class="form" style="text-align: center;background-color: #fff">
                    <button class="bt_large" style="margin-right: 10px">Preview</button>
                    <button class="bt_large" >Send</button>
                </td>
            </tr>
        </table>
        <script>
            $.ajax({
                type: 'GET',
                url: 'http://x.pms/employees/getEmployeeByJob',
                data: {job : 'Pm'}
            }).success(function(data){
                    $('#cb_prj_mng').append(data);
                    $.ajax({
                        type: 'GET',
                        url: 'http://x.pms/employees/getEmployeeByJob',
                        data: {job : 'Sales'}
                    }).success(function(data){
                            $('#cb_sales_mng').append(data);
                            $('.mail_form').animate({
                                opacity: 1
                            },'slow');
                        });
                });
        </script>
    </div>
</div>