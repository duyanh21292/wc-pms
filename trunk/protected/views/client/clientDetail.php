<div class="content">
    <div class="content_title"> + Project Management</div>
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
    <div class="content_main">
        <div class="frame_title" style="width: 1000px">
            <?php echo $model->ClientName ?>
            <div class="icon ion-ios7-compose-outline bt_crud_26 modify" style="float: right;margin-top: 20px;margin-left: 10px;margin-right: 10px" title="Modify" onclick="goToPage('<?php echo Employees::BASE_URL?>/client/modifyClient?client_id=<?php echo($model->Client_ID) ?>')"></div>
        </div>
        <table style="width: 1000px">
            <tr class="client_detail">
                <td class="client_detail">Comm.</td>
                <td class="client_detail value_prj_detail">Tel: <?php echo($model->Tel) ?>, Fax: <?php echo($model->Fax) ?></td>
                <td class="client_detail">Address.</td>
                <td class="client_detail value_prj_detail"><?php echo $model->Address ?></td>
            </tr>
            <tr class="client_detail">
                <td class="client_detail">Location</td>
                <td class="client_detail value_prj_detail"><div style="float: left;margin-top: 3px;"><?php echo($model->Location) ?> (<?php echo($model->CountryName) ?>)</div><div class="flag_icon" style="float: left;margin-left: 10px"></div></td>
                <td class="client_detail">Url</td>
                <td class="client_detail value_prj_detail"><?php echo $model->Url ?></td>
            </tr>
            <tr class="client_detail">
                <td class="client_detail">Level</td>
                <td class="client_detail value_prj_detail"><?php echo($model->Level) ?></td>
                <td class="client_detail">Status</td>
                <td class="client_detail value_prj_detail"><?php echo $model->Status ?></td>
            </tr>
            <tr class="client_detail">
                <td class="client_detail">Memo</td>
                <td class="client_detail value_prj_detail" colspan="3"><?php echo($model->Memo) ?></td>
            </tr>
            <script>
                changeFlagIcon(<?php echo "\"".$model->CountryName."\"" ?>);
            </script>
        </table>
        <div class="frame_title" style="font-size: xx-large;width: 1000px">
            Contacts
            <div class="icon ion-ios7-plus-outline bt_crud_26 create" style="float: right;margin-top: 2px;margin-left: 10px;margin-right: 10px" title="New Contact" onclick="openNewWindow('<?php echo Employees::BASE_URL ?>/contact/createNewContactWindow?client_id=<?php echo($model->Client_ID) ?>&client_name=<?php echo($model->ClientName) ?>','New Contact',800,600)"></div>
            <div class="icon ion-ios7-email-outline bt_crud_26 email" style="float: right;margin-top: 2px;" title="Contacts Mail"></div>
        </div>
        <table id="list_contact" class="list_data" style="width: 1000px">
            <tr>
                <th class="client_contact">Name</th>
                <th class="client_contact">Department</th>
                <th class="client_contact">Job Title</th>
                <th class="client_contact">Tel</th>
                <th class="client_contact">Fax</th>
                <th class="client_contact">Mobile</th>
                <th class="client_contact">Email</th>
            </tr>
            <script>
                $.ajax({
                    type: 'GET',
                    url: '<?php echo Employees::BASE_URL ?>/contact/getClientContact',
                    data: {'client_id': <?php echo "'".$model->Client_ID."'" ?>}
                }).success(function(data){
                        $('#list_contact').append(data);
                    });
            </script>
        </table>
        <div class="frame_title" style="font-size: xx-large;width: 1000px">
            FTP
            <div class="icon ion-ios7-plus-outline bt_crud_26 create" style="float: right;margin-top: 2px;margin-left: 10px;margin-right: 10px" title="New FTP" onclick="openNewWindow('<?php echo Employees::BASE_URL ?>/ftp/createNewFtpWindow?client_id=<?php echo($model->Client_ID) ?>&client_name=<?php echo($model->ClientName) ?>','New FTP',800,500)"></div>
        </div>
        <table id="list_ftp" class="list_data" style="width: 1000px">
            <tr>
                <th class="client_ftp">Name</th>
                <th class="client_ftp">Url</th>
                <th class="client_ftp">ID</th>
                <th class="client_ftp">PW</th>
            </tr>
            <script>
                $.ajax({
                    type: 'GET',
                    url: '<?php echo Employees::BASE_URL ?>/ftp/getClientFtp',
                    data: {'client_id': <?php echo "'".$model->Client_ID."'" ?>}
                }).success(function(data){
                        $('#list_ftp').append(data);
                    });
            </script>
        </table>
        <div class="frame_title" style="font-size: xx-large;width: 1000px">
            Comments
            <div class="icon ion-ios7-plus-outline bt_crud_26 create" style="float: right;margin-top: 2px;margin-left: 10px;margin-right: 10px" title="New Comment"></div>
        </div>
        <table id="list_comments" class="list_data" style="width: 1000px">
            <tr>
                <th class="client_comments">Date</th>
                <th class="client_comments">Comments</th>
                <th class="client_comments">Writer</th>
                <th class="client_comments">ect</th>
            </tr>
            <script>
                //get List Comments
            </script>
        </table>
    </div>
</div>