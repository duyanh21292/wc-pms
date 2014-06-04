<script>
    setPageType(SUPPLIER);
    initFrameNumberPage();
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
    <div id="list_suppliers_content" class="content_main">
        <div class="frame_title">Suppliers List</div>
        <div class="tool_frame">
            <table style="width: 100%">
                <tr class="search_condition">
                    <td class="search_condition">Available Task</td>
                    <td class="search_condition value_search_condition">
                        <select id="cb_atask_search" class="cb_search" name="atask_filter">
                            <option value="">++ All Available Task ++</option>
                        </select>
                    </td>
                    <td class="search_condition">Location</td>
                    <td class="search_condition value_search_condition">
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
                    <td class="search_condition value_search_condition">
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
                    <td class="search_condition value_search_condition">
                        <select id="cb_status_search" class="cb_search" name="status_filter">
                            <option value="">++ All Status ++</option>
                            <option>Active</option>
                            <option>Inactive</option>
                        </select>
                    </td>
                </tr>
                <tr class="search_condition" style="height: 50px">
                    <td class="search_condition value_search_condition" colspan="3" style="border-left: none">
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
                    <td class="search_condition value_search_condition" style="text-align: center">
                        <div class="frame_tool_text">
                            <div class="bt_tool_text tool_text_create"  onclick="goToPage('<?php echo Employees::BASE_URL?>/supplier/createNewSupplier')">
                                <div class="icon ion-ios7-plus-empty icon_tool_text"></div>
                                <div class="tool_text">New Supplier</div>
                            </div>
                        </div>
                    </td>
                </tr>
            </table>
            <script>
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
                    });
            </script>
        </div>
        <table id="supplier_list" class="list_data">
            <tr>
                <th>NO.</th>
                <th>Name /<br>ID</th>
                <th>Level /<br>Status</th>
                <th>Location /<br>Language Pair</th>
                <th>Available Task</th>
                <th>Major Industy</th>
                <th>Workload</th>
            </tr>
            <?php foreach($model as $obj):?>
                <tr>
                    <td style="text-align: center"><a class="supp_name" href="<?php echo Employees::BASE_URL?>/supplier/getSupplierDetail?supplier_no=<?php echo $obj->SupplierNo ?>"><?php echo $obj->SupplierNo ?></a></td>
                    <td>
                        <?php if ($obj->SType_ID == 1) echo '<div class="supp_company" style="float:left">('.$obj->TypeDescription.')&nbsp;</div>'; elseif($obj->SType_ID == 2) echo '<div class="supp_freelancer" style="float:left">('.$obj->TypeDescription.')&nbsp;</div>'; ?>
                        <?php echo $obj->SupplierName ?>
                        <div style="font-family: pms-font-regular, Arial, sans-serif"><?php echo $obj->UserID ?></div>
                    </td>
                    <td style="text-align: center"><?php echo $obj->Level_Name ?><br><?php echo $obj->Status ?></td>
                    <td style="text-align: center"><?php echo $obj->Location ?><br><?php echo $obj->Language_Pair_Name ?></td>
                    <td><?php echo $obj->Task_Name ?></td>
                    <td><?php echo $obj->Industry_Name ?></td>
                    <td style="text-align: center">%</td>
                </tr>
            <?php endforeach ?>
        </table>
        <div class="frame_page_number">

        </div>
    </div>
</div>