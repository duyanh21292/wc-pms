<div class="content">
    <div class="content_title"> + Basic Information</div>
    <div id="organization_content" class="content_main content_main_without_nav visible" style="left: 0;margin-top: 10px">
        <table id="basic_info" border="0" style="margin: auto">
            <tr style="height: 35px">
                <td colspan="2" class="form org_div_name frame_title">Information</td>
            </tr>
            <?php foreach($model as $obj):?>
                <tr>
                    <td class="form info_form">Company Name</td>
                    <td class="form value_form"><?php echo $obj->CompanyName?></td>
                </tr>
                <tr>
                    <td class="form info_form">Address</td>
                    <td class="form value_form"><?php echo $obj->Address?></td>
                </tr>
                <tr>
                    <td class="form info_form">Telephone</td>
                    <td class="form value_form"><?php echo $obj->Telephone?></td>
                </tr>
                <tr>
                    <td class="form info_form">Fax</td>
                    <td class="form value_form"><?php echo $obj->Fax?></td>
                </tr>
                <tr>
                    <td class="form info_form">Website</td>
                    <td class="form value_form"><?php echo $obj->Website?></td>
                </tr>
                <tr>
                    <td class="form info_form">License No.</td>
                    <td class="form value_form"><?php echo $obj->LicenseNo?></td>
                </tr>
                <tr>
                    <td class="form info_form">Tax code</td>
                    <td class="form value_form"><?php echo $obj->TaxCode?></td>
                </tr>
                <tr>
                    <td class="form info_form">Business lines</td>
                    <td class="form value_form"><?php echo $obj->BusinessLines?></td>
                </tr>
                <tr>
                    <td class="form info_form">Rep Office</td>
                    <td class="form value_form"><?php echo $obj->RepOffice?></td>
                </tr>
                <tr>
                    <td class="form info_form">No.Initial</td>
                    <td class="form value_form"><?php echo $obj->NoInitial?></td>
                </tr>
            <?php endforeach ?>
        </table>
    </div>
</div>
