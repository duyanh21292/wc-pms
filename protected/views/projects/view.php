<script>
    setPageType(PROJECT);
    setNavSelectedValue('<?php echo $_GET['status_id'] ?>');
    initFrameNumberPage();
</script>
<?php $no = 0;?>
<div class="content">
    <div class="content_title"> + Project Management</div>
    <div class="content_left_nav">
        <a class="nav_item_link" href="<?php echo Employees::BASE_URL ?>/projects/getAllProjects"><div class="nav_item nav_selected">All list</div></a>
    </div>
    <script>
        $.ajax({
            type: 'GET',
            url: '<?php echo Employees::BASE_URL ?>/status/getAllStatus',
            data: { status_type : 'status'}
        }).success(function(data){
                $('.content_left_nav').append(data);
                var status_id_selected = '<?php echo $_GET['status_id'] ?>';
                if (!jQuery.isEmptyObject(status_id_selected)) {
                    $('.nav_selected').removeClass('nav_selected');
                    $('.nav_item').each(function(){
                        var status = $(this).attr('statusid');
                        if (status == status_id_selected){
                            $(this).addClass('nav_selected');
                        }
                    });
                }
            });
    </script>
    <div id="list_project_content" class="content_main visible">
        <div class="frame_title">Projects List</div>
        <div class="tool_frame">
            <table style="width: 100%">
                <tr class="search_condition">
                    <td class="search_condition">Finance Status</td>
                    <td class="search_condition value_search_condition">
                        <select id="cb_f_status_search" class="cb_search" name="f_status_filter">
                            <option value="">++ All Finance Status ++</option>
                        </select>
                    </td>
                    <td class="search_condition">Industry</td>
                    <td class="search_condition value_search_condition">
                        <select id="cb_industry_search"  class="cb_search" name="industry_filter">
                            <option value="">++ All Industry ++</option>
                        </select>
                    </td>
                </tr>
                <tr class="search_condition">
                    <td class="search_condition">Reg.Date</td>
                    <td class="search_condition value_search_condition">
                        <select id="cb_year_from" name="year_from"></select> / <select id="cb_month_from" name="month_from"></select> / <select id="cb_day_from" name="day_from"></select>
                        ~ <select id="cb_year_to" name="year_to"></select> / <select id="cb_month_to" name="month_to"></select> / <select id="cb_day_to" name="day_to"></select>
                    </td>
                    <td class="search_condition">My Project</td>
                    <td class="search_condition value_search_condition">
                        PM <input type="checkbox" name="PM_filter" value="PM"> or AM <input type="checkbox" name="AM_filter" value="AM">
                    </td>
                </tr>
                <tr class="search_condition" style="height: 50px">
                    <td class="search_condition value_search_condition" colspan="3" style="border-left: none">
                        <div class="search_frame" style="text-align: center">
                            Search:
                            <select id="cb_search_type" name="search_type">
                                <option value="ProjectNo">ProjectNo.</option>
                                <option value="ProjectName">Project Name</option>
                                <option value="ClientName">Client Name</option>
                                <option value="ProjectManagerName">PM,AM Name</option>
                            </select>
                            <input id="ip_search_content" type="text" name="search_content">
                            <i class="icon ion-ios7-search-strong search" onclick="actionSearch()" title="Search"></i>
                        </div>
                    </td>
                    <td class="search_condition value_search_condition" style="text-align: center">
                        <div class="frame_tool_text">
                            <div class="bt_tool_text tool_text_create"  onclick="goToPage('<?php echo Employees::BASE_URL?>/projects/createNewProject')">
                                <div class="icon ion-ios7-plus-empty icon_tool_text"></div>
                                <div class="tool_text">New Project</div>
                            </div>
                            <div class="bt_tool_text tool_text_extract"  onclick="" style="margin-left: 10px">
                                <div class="icon ion-ios7-filing-outline icon_tool_text"></div>
                                <div class="tool_text">Extract</div>
                            </div>
                        </div>
                    </td>
                </tr>
            </table>
            <script>
                $.ajax({
                    type: 'GET',
                    url: '<?php echo Employees::BASE_URL ?>/status/getAllStatusCb',
                    data: { status_type : 'f_status'}
                }).success(function(data){
                        $('#cb_f_status_search').append(data);
                    });
                $.ajax({
                    type: 'GET',
                    url: '<?php echo Employees::BASE_URL ?>/industry/getAllIndustryCb'
                }).success(function(data){
                        $('#cb_industry_search').append(data);
                    });
                $('#cb_year_from').html(getYearCbData(new Date().getFullYear()));
                $('#cb_year_to').html(getYearCbData(new Date().getFullYear()));
                $('#cb_month_from').html(getMonthCbData(0));
                $('#cb_month_to').html(getMonthCbData(new Date().getMonth()));
                $('#cb_day_from').html(getDayCbData(1));
                $('#cb_day_to').html(getDayCbData(new Date().getDate()));
            </script>
        </div>
        <table id="projects_list" class="list_data">
            <tr>
                <th>ProjectNo.</th>
                <th>Project Name</th>
                <th>Client /<br>Contact Name</th>
                <th>Budget</th>
                <th>Progress(%)</th>
                <th>Status /<br>F.Status</th>
                <th>Reg.Date /<br>Due Date</th>
            </tr>
            <?php $total= 0;?>
            <?php foreach($model as $obj):?>
                <?php $no++;?>
                <tr class="tr_data">
                    <td style="text-align: center"><?php echo $obj->ProjectNo ?></td>
                    <td style="min-width: 750px">
                        <div><a class="prj_name" href="<?php echo Employees::BASE_URL ?>/projects/getProjectDetail?prj_no=<?php echo $obj->ProjectNo ?>"><?php echo $obj->ProjectName ?></a></div>
                        <div style="font-family: pms-font-regular, Arial, sans-serif;text-align: right"><?php echo $obj->ProjectManagerName ?></div>
                    </td>
                    <td style="width: 250px;text-align: center"><?php echo $obj->ClientName ?>
                        <div style="font-family: pms-font-regular, Arial, sans-serif;"><?php echo $obj->ContactName ?></div></td>
                    <td class="cell_no" style="width: 200px"><div style="float: left"><input name="select_budget" type="checkbox" value="<?php echo $obj->Budget?>"></div><?php $total = $total + ((int)$obj->Budget); echo $obj->Budget ?> VND</td>
                    <td class="cell_no" style="width: 100px">0</td>
                    <td style="text-align: center;width: 95px"><?php echo $obj->Status ?><br><?php echo $obj->FStatus ?></td>
                    <td style="text-align: center;width: 80px"><?php $regDate = date("y-m-d", strtotime($obj->RegDate)); echo $regDate ?><br><?php  $dueDate = date("y-m-d", strtotime($obj->DueDate)); echo $dueDate ?></td>
                </tr>
            <?php endforeach ?>
            <tr class="tr_data" style="height: 30px">
                <td class="total" colspan="3">Total</td>
                <td class="total">
                    <div class="num_total_selected">0</div>
                    <div class="num_total"><?php echo $total?> VND</div>
                </td>
                <td class="total" colspan="3"></td>
            </tr>
        </table>
        <div class="frame_page_number">

        </div>
        <script>
            $('[name="select_budget"]').click(function(){
                var total_selected = 0;
                $('[name="select_budget"]:checked').each(function(){
                    total_selected = total_selected + parseInt($(this).val());
                });
                $('.num_total_selected').text(total_selected);
            })
        </script>
    </div>
</div>