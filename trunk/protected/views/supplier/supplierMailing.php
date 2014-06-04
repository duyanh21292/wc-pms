<div class="content">
    <div class="content_title"> + Supplier Mailing</div>
    <div class="content_main content_main_without_nav" style="left: 0;margin-top: 10px">
        <table id="supplier_mailing_list" class="mail_form" border="0">
            <tr style="height: 40px">
                <td colspan="2" class="form org_div_name frame_title" style="background-color: #fff;padding-left: 10px">New Message</td>
            </tr>
            <tr>
                <td colspan="2" class="form org_div_name" style="background-color: #fff">
                    <div id="frame_supp_type" style="width: 300px;height: 50px">

                    </div>
                </td>
            </tr>
            <tr>
                <td colspan="2" style="background-color: #FFFFFF;border: none;;padding: 0">
                    <table style="width: 100%">
                        <tr class="search_condition">
                            <td class="search_condition">Available Task</td>
                            <td class="search_condition value_search_condition">
                                <select id="cb_atask_search" class="cb_search" name="atask_filter">
                                    <option value="">++ All Available Task ++</option>
                                </select>
                            </td>
                            <td class="search_condition">Location</td>
                            <td class="search_condition value_search_condition" style="border-right: none">
                                <select id="cb_location_search" class="cb_search" name="location_filter">
                                    <option value="">++ All Location ++</option>
                                    <option value='Domestic'>Domestic</option>
                                    <option value='Abroad'>Abroad</option>
                                </select>
                            </td>
                        </tr>
                        <tr class="search_condition">
                            <td class="search_condition">Major Industry</td>
                            <td class="search_condition value_search_condition">
                                <select id="cb_mindustry_search" class="cb_search" name="mindustry_filter">
                                    <option value="">++ All Major Industry ++</option>
                                </select>
                            </td>
                            <td class="search_condition">Level</td>
                            <td class="search_condition value_search_condition" style="border-right: none">
                                <select id="cb_level_search" class="cb_search" name="level_filter">
                                    <option value="">++ All Level ++</option>
                                </select>
                            </td>
                        </tr>
                        <tr class="search_condition">
                            <td class="search_condition">Language Pair</td>
                            <td class="search_condition value_search_condition">
                                <select id="cb_lang_pair_search" class="cb_search" name="lang_pair_filter">
                                    <option value="">++ All Language Pair ++</option>
                                </select>
                            </td>
                            <td class="search_condition">Status</td>
                            <td class="search_condition value_search_condition" style="border-right: none">
                                <select id="cb_status_search" class="cb_search" name="status_filter">
                                    <option value="">++ All Status ++</option>
                                    <option>Active</option>
                                    <option>Inactive</option>
                                </select>
                            </td>
                        </tr>
                        <tr class="search_condition" style="height: 50px">
                            <td class="search_condition value_search_condition" colspan="4" style="border-left: none;border-right: none">
                                <div  class="search_frame" style="text-align: center">
                                    Search:<select id="cb_search_type" name="search_type">
                                        <option value='s_name'>Name</option>
                                        <option value='s_addr'>Address</option>
                                        <option value='s_tel'>Tel</option>
                                        <option value='s_suppno'>Supp.No</option>
                                        <option value='s_id'>Login ID</option>
                                        <option value='s_no'>No</option>
                                    </select>
                                    <input id="ip_search_content" type="text" name="search_content">
                                    <i class="icon ion-ios7-search-strong search" onclick="actionSearch()" title="Search"></i>
                                </div>
                            </td>
                        </tr>
                    </table>
                    <script>
                        $.ajax({
                            type: 'GET',
                            url: '<?php echo Employees::BASE_URL?>/suppliertype/getAllSupplierTypeRadio'
                        }).success(function(data){
                                $('#frame_supp_type').append(data);
                            });
                        $.ajax({
                            type:'GET',
                            url:'<?php echo Employees::BASE_URL ?>/slevel/getAllLevelCb'
                        }).success(function(data){
                                $('#cb_level_search').append(data);
                            });
                        $.ajax({
                            type:'GET',
                            url:'<?php echo Employees::BASE_URL ?>/availabletask/getAllATaskCb'
                        }).success(function(data){
                                $('#cb_atask_search').append(data);
                            });
                        $.ajax({
                            type:'GET',
                            url:'<?php echo Employees::BASE_URL ?>/majorindustry/getAllMajorIndustryCb'
                        }).success(function(data){
                                $('#cb_mindustry_search').append(data);
                            });
                        $.ajax({
                            type:'GET',
                            url:'<?php echo Employees::BASE_URL ?>/languagepair/getAllLangPairCb'
                        }).success(function(data){
                                $('#cb_lang_pair_search').append(data);
                                $('.mail_form').animate({
                                    opacity: 1
                                },'slow');
                            });
                    </script>
                </td>
            </tr>
            <tr style="height: 10px"><td colspan="2" class="form"></td></tr>
            <tr>
                <td class="form info_form">Recipients</td>
                <td class="form mail_item"><textarea name="addresses_list" style="width: 100%;height: 200px"></textarea></td>
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
    </div>
</div>