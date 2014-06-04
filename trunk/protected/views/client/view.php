<script>
    setPageType(CLIENT);
    initFrameNumberPage();
</script>
<?php $no = 0;?>
<div class="content">
    <div class="content_title"> + Client Management</div>
    <div class="content_left_nav">
        <div class="nav_item nav_selected">All level</div>
    </div>
    <script>
        $.ajax({
            type: 'GET',
            url: 'http://x.pms/clevel/getAllClientLevel'
        }).success(function(data){
                $('.content_left_nav').append(data);
                navSelectedListener();
            });
    </script>
    <div id="client_list_content" class="content_main visible">
        <div class="frame_title">Client List</div>
        <div class="tool_frame">
            <table style="width: 100%">
                <tr class="search_condition">
                    <td class="search_condition">Client Status</td>
                    <td class="search_condition value_search_condition">
                        <select id="cb_status_filter" class="cb_search" name="status_filter">
                            <option value="">++ All Status ++</option>
                            <option value='Active'>Active</option>
                            <option value='Inactive'>Inactive</option>
                            <option value='Temporary'>Temporary</option>
                        </select>
                    </td>
                    <td class="search_condition">Location</td>
                    <td class="search_condition value_search_condition">
                        <select id="cb_location_filter" class="cb_search" name="location_filter">
                            <option value="">++ All Location ++</option>
                            <option value='Domestic'>Domestic</option>
                            <option value='Abroad'>Abroad</option>
                        </select>
                    </td>
                </tr>
                <tr class="search_condition" style="height: 50px">
                    <td class="search_condition value_search_condition" colspan="3" style="border-left: none">
                        <div  class="search_frame" style="text-align: center">
                            Search:<select id="cb_search_type" name="search_type">
                                <option value="ClientName">Client Name</option>
                                <option value="CountryName">Country</option>
                                <option value="Tel">Tel</option>
                                <option value="Fax">Fax</option>
                            </select>
                            <input id="ip_search_content" type="text" name="search_content">
                            <i class="icon ion-ios7-search-strong search" onclick="actionSearch()" title="Search"></i>
                        </div>
                    </td>
                    <td class="search_condition value_search_condition" style="text-align: center">
                        <div class="frame_tool_text">
                            <div class="bt_tool_text tool_text_create"  onclick="goToPage('<?php echo Employees::BASE_URL?>/client/createNewClient')">
                                <div class="icon ion-ios7-plus-empty icon_tool_text"></div>
                                <div class="tool_text">New Client</div>
                            </div>
                        </div>
                    </td>
                </tr>
            </table>
        </div>
        <table id="clients_list" class="list_data">
            <tr>
                <th>No.</th>
                <th>Co.Name</th>
                <th>Level</th>
                <th>Location</th>
                <th>Country</th>
                <th>Tel</th>
                <th>Fax</th>
            </tr>
            <?php foreach($model as $obj):?>
                <?php $no++;?>
                <tr class="tr_data">
                    <td class="cell_no"><?php echo $no ?>.</td>
                    <td style="min-width: 200px"><a class="client_name" href="<?php echo Employees::BASE_URL?>/client/getClientDetail?client_id=<?php echo $obj->Client_ID ?>"><?php echo $obj->ClientName ?></a></td>
                    <td style="width: 70px"><?php echo $obj->Level ?></td>
                    <td style="width: 150px"><?php echo $obj->Location ?></td>
                    <td style="width: 275px"><?php echo $obj->CountryName ?></td>
                    <td style="width: 300px"><?php echo $obj->Tel ?></td>
                    <td style="width: 300px"><?php echo $obj->Fax ?></td>
                </tr>
            <?php endforeach ?>
        </table>
        <div class="frame_page_number">

        </div>
    </div>
</div>