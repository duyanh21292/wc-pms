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
    <div class="content_main">
        <div class="frame_title" style="width: 1000px;height: 48px">
            <div class="frame_title <?php if($model->SType_ID == 1) echo('supp_company'); else  echo('supp_freelancer')?>" style="float: left;margin-right:10px;font-size: xx-large"><?php echo $model->SupplierType ?>:</div>
            <?php echo $model->SupplierName ?>
            <div class="icon ion-ios7-compose-outline bt_crud_26 modify" style="float: right;margin-top: 20px;margin-left: 10px;margin-right: 10px" title="Modify" onclick="goToPage('<?php echo Employees::BASE_URL ?>/supplier/modifySupplier?supplier_no=<?php echo $model->SupplierNo?>')"></div>
            <div class="icon ion-ios7-copy-outline bt_crud_26 copy" style="float: right;margin-top: 20px;" title="Summary"></div>
        </div>
        <table style="width: 1000px">
            <tr class="supp_detail">
                <td class="supp_detail" rowspan="2">Login</td>
                <td class="supp_detail value_supp_detail">- ID: <?php echo($model->UserID) ?></td>
                <td class="supp_detail" rowspan="2">Comm</td>
                <td class="supp_detail value_supp_detail">
                    Tel(home/office): <?php echo $model->Tel ?>
                </td>
            </tr>
            <tr class="supp_detail">
                <td class="supp_detail value_supp_detail">
                    - Password: <?php echo($model->Password) ?>
                </td>
                <td class="supp_detail value_supp_detail">
                    <?php if($model->SType_ID == 2) echo 'Mobile: '.$model->Mobile ;
                    elseif ($model->SType_ID == 1) echo 'Fax: '.$model->Fax ;?>
                </td>
            </tr>
            <tr class="supp_detail">
                <td class="supp_detail">Location</td>
                <td class="supp_detail value_supp_detail"><div style="float: left;margin-top: 3px;"><?php echo($model->Location) ?> (<?php echo($model->CountryName) ?>)</div><div class="flag_icon" style="float: left;margin-left: 10px"></div></td>
                <td class="supp_detail">Web Site</td>
                <td class="supp_detail value_supp_detail"><?php echo $model->Website ?></td>
            </tr>
            <tr class="supp_detail">
                <td class="supp_detail">Address</td>
                <td class="supp_detail value_supp_detail" colspan="3"><?php echo($model->Address) ?></td>
            </tr>
            <tr class="supp_detail">
                <td class="supp_detail" rowspan="2">Registration No</td>
                <td class="supp_detail value_supp_detail" rowspan="2"><?php echo($model->RegistrationNo) ?></td>
                <td class="supp_detail" rowspan="2">E-mail</td>
                <td class="supp_detail value_supp_detail">- 1st: <?php echo($model->Email1) ?></td>
            </tr>
            <tr class="supp_detail">
                <td class="supp_detail value_supp_detail">- 2nd: <?php echo($model->Email2) ?></td>
            </tr>
            <tr class="supp_detail">
                <td class="supp_detail" rowspan="3">Bank Information</td>
                <td class="supp_detail value_supp_detail" colspan="2">- Bank Name: <?php echo($model->BankName) ?></td>
                <td class="supp_detail value_supp_detail">- Branch Name: <?php echo($model->BranchName) ?></td>
            </tr>
            <tr class="supp_detail">
                <td class="supp_detail value_supp_detail" colspan="3">- Branch Address: <?php echo($model->BranchAddress) ?></td>
            </tr>
            <tr class="supp_detail">
                <td class="supp_detail value_supp_detail" colspan="2">- Beneficiary Name: <?php echo($model->BeneficiaryName) ?></td>
                <td class="supp_detail value_supp_detail">- Account No: <?php echo($model->AccountNo) ?></td>
            </tr>
            <tr class="supp_detail">
                <td class="supp_detail" rowspan="4">Qualification Information</td>
                <td class="supp_detail value_supp_detail" colspan="2">- Level: <?php echo($model->Level_Name) ?></td>
                <td class="supp_detail value_supp_detail">- Currency: <?php echo($model->CurrencyNo) ?></td>
            </tr>
            <tr class="supp_detail">
                <td class="supp_detail value_supp_detail" colspan="3">- Language Pair: <?php echo($model->Language_Pair_Name) ?></td>
            </tr>
            <tr class="supp_detail">
                <td class="supp_detail value_supp_detail" colspan="3">- Available Task: <?php echo($model->Task_Name) ?></td>
            </tr>
            <tr class="supp_detail">
                <td class="supp_detail value_supp_detail" colspan="3">- Major Industry: <?php echo($model->Industry_Name) ?></td>
            </tr>
            <script>
                changeFlagIcon(<?php echo "\"".$model->CountryName."\"" ?>);
            </script>
        </table>
        <?php if($model->SType_ID == 1): ?>
            <div class="frame_title" style="font-size: xx-large;width: 1000px">
                Contacts
                <div class="icon ion-ios7-plus-outline bt_crud_26 create" style="float: right;margin-top: 2px;margin-left: 10px;margin-right: 10px" title="New Contact" onclick="openNewWindow('<?php echo Employees::BASE_URL ?>/suppliercontact/createNewContactW?supp_no=<?php echo($model->SupplierNo) ?>&supp_name=<?php echo($model->SupplierName) ?>','New Contact',800,720)"></div>
                <div class="icon ion-ios7-email-outline bt_crud_26 email" style="float: right;margin-top: 2px;" title="Contacts Mail"></div>
            </div>
            <table id="list_contact" class="list_data" style="width: 1000px">
                <tr>
                    <th class="client_contact">No.</th>
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
                        url: '<?php echo Employees::BASE_URL ?>/suppliercontact/getSupplierContact',
                        data: {'supp_no': <?php echo "'".$model->SupplierNo."'" ?>}
                    }).success(function(data){
                            $('#list_contact').append(data);
                        });
                </script>
            </table>
        <?php endif ?>
    </div>
</div>