<script>
    setPageType(EMPLOYEE);
    initFrameNumberPage();
</script>
<?php $no = 0; ?>
<div class="content">
    <div class="content_title"> + Employees Management</div>
    <div class="content_left_nav">
    </div>
    <script>
        $.ajax({
            type: 'GET',
            url: 'http://x.pms/division/getAllDivision'
        }).success(function(data){
                $('.content_left_nav').html('<div class="nav_item_emp"><div class="nav_item_parent_emp nav_selected">All list</div></div>' + data + '<div class="nav_item_emp"><div class="nav_item_parent_emp">My List</div></div>');
                navEmpSelectedListener();
            });
    </script>
    <div class="content_main">
        <div class="frame_title">Employees List</div>
        <div class="tool_frame">
            <table style="width: 100%">
                <tr class="search_condition">
                    <td class="search_condition">Job Title</td>
                    <td class="search_condition value_search_condition">
                        <select id="cb_job_search" class="cb_search" name="job_filter">
                            <option value="">++ All Job Title ++</option>
                        </select>
                    </td>
                    <td class="search_condition">Status</td>
                    <td class="search_condition value_search_condition">
                        <select id="cb_status_search" class="cb_search" name="status_filter">
                            <option value="">++ All Status ++</option>
                            <option value='Active'>Active</option>
                            <option value='Inactive'>Inactive</option>
                            <option value='Retirement'>Retirement</option>
                        </select>
                    </td>
                </tr>
                <tr class="search_condition" style="height: 50px">
                    <td class="search_condition value_search_condition" colspan="3" style="border-left: none">
                        <div  class="search_frame" style="text-align: center">
                            Search:
                            <select id="cb_search_type" name="search_type">
                                <option value="EmpNo">EmployeeNo.</option>
                                <option value="Full_Name">Full Name</option>
                            </select>
                            <input id="ip_search_content" type="text" name="search_content">
                            <i class="icon ion-ios7-search-strong search" onclick="actionSearch()" title="Search"></i>
                        </div>
                    </td>
                    <td class="search_condition value_search_condition" style="text-align: center">
                        <div class="frame_tool_text">
                            <div class="bt_tool_text tool_text_create"  onclick="">
                                <div class="icon ion-ios7-plus-empty icon_tool_text"></div>
                                <div class="tool_text">New Employee</div>
                            </div>
                        </div>
                    </td>
                </tr>
            </table>
            <script>
                $.ajax({
                    type: 'GET',
                    url: 'http://x.pms/job/getAllJobCb'
                }).success(function(data){
                        $('#cb_job_search').append(data);
                    });
            </script>
        </div>
        <table id="emp_list" class="list_data">
            <tr>
                <th>No.</th>
                <th>EmployeeNo.</th>
                <th>User ID</th>
                <th>Full Name</th>
                <th>Division</th>
                <th>Department</th>
                <th>Job Title</th>
                <th>Entry Date</th>
            </tr>
            <?php foreach($model as $obj):?>
                <?php $no++; ?>
                <tr class="tr_data">
                    <td class="cell_no"><?php echo $no.'.' ?></td>
                    <td><?php echo $obj->EmpNo ?></td>
                    <td><?php echo $obj->User_ID ?></td>
                    <td><?php echo $obj->Full_Name ?></td>
                    <td><?php echo $obj->DivisionName ?></td>
                    <td><?php echo $obj->DepName ?></td>
                    <td><?php echo $obj->JobName ?></td>
                    <td><?php $entryDate = date("Y-m-d", strtotime($obj->Entry_Date)); echo $entryDate;?></td>
                </tr>
            <?php endforeach ?>
        </table>
        <div class="frame_page_number">

        </div>
    </div>
</div>