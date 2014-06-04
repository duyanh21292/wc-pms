<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <script type="text/javascript" src="/scripts/ckeditor/ckeditor.js"></script>
    <link rel="stylesheet" type="text/css" href="../../../css/PLcss.css">
    <script type="text/javascript" src="/assets/18e7d7ae/jquery.min.js"></script>
    <script type="text/javascript"  src="../../../scripts/PL-javascript.js"></script>
</head>

<body data-spy="scroll" data-target=".bs-docs-sidebar" data-twttr-rendered="true">
<div class="content_main content_main_dlg_window" style="left: 20px;top:10px;right: 20px;min-width:750px;opacity: 1">
    <table border="0" style="margin:auto">
        <tr><td colspan="2" class="form"><div class="frame_title">New Contact</div></td></tr>
        <tr class="form"><td class="form info_form">Supplier</td><td class="form value_form"><div class="value_selected" style="font-size: medium"><?php echo(Yii::app()->request->getParam("supp_name"))?></div></td></tr>
        <tr class="form"><td class="form info_form">Name</td><td class="form value_form"><input type="text"  name="contact_name" style="width: 250px"></td></tr>
        <tr class="form"><td class="form info_form">Department</td><td class="form value_form"><input type="text"  name="department" style="width: 250px"></td></tr>
        <tr class="form"><td class="form info_form">Job Title</td><td class="form value_form"><input type="text"  name="job" style="width: 250px"></td></tr>
        <tr class="form"><td class="form info_form">Tel.</td><td class="form value_form"><input type="text"  name="tel" style="width: 250px"></td></tr>
        <tr class="form"><td class="form info_form">Fax.</td><td class="form value_form"><input type="text"  name="fax" style="width: 250px"></td></tr>
        <tr class="form"><td class="form info_form">Mobile</td><td class="form value_form"><input type="text"  name="mobile" style="width: 250px"></td></tr>
        <tr class="form"><td class="form info_form">Email</td><td class="form value_form"><input type="text"  name="email" style="width: 250px"></td></tr>
        <tr class="form"><td class="form info_form">Memo</td><td class="form value_form"><textarea name="memo" style="width: 100%;height: 100px;"></textarea></td></tr>
        <tr style="height: 100px"><td colspan="2" class="form" style="text-align: center"><button class="bt_large" style="margin-right: 10px" onclick="actionCreateNewContact()">Create</button><button class="bt_large" onclick="actionCancelNewContact()">Cancel</button></td></tr>
        <script type="text/javascript">
            CKEDITOR.replace('memo',{
                toolbarGroups: [
                    { name: 'document',	   groups: [ 'mode', 'document' ] },			// Displays document group with its two subgroups.
                    { name: 'clipboard',   groups: [ 'clipboard', 'undo' ] },			// Group's name will be used to create voice label.
                    '/',																// Line break - next group will be placed in new line.
                    { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
                    { name: 'links' }
                ],
                skin: 'office2013'
            });
            function actionCreateNewContact(){
                var supp_no = '<?php echo(Yii::app()->request->getParam("supp_no")) ?>';
                var name = $('[name="contact_name"]').val();
                var department = $('[name="department"]').val();
                var job = $('[name="job"]').val();
                var tel = $('[name="tel"]').val();
                var fax = $('[name="fax"]').val();
                var mobile = $('[name="mobile"]').val();
                var email = $('[name="email"]').val();
                var memo = $('[name="memo"]').val();
                $.ajax({
                    type: 'POST',
                url: 'http://x.pms/suppliercontact/createNewContact',
                data: {'supp_no' : supp_no,'name' : name,'department' : department,'job' : job,'tel' : tel,'fax' : fax,'mobile' : mobile,'email' : email,'memo' :memo}
                }).success(function(msg){
                    if(msg == 1){
                        alert("Create Contact successful!");
                        $.ajax({
                            type: 'GET',
                        url: '<?php echo(Employees::BASE_URL)?>/suppliercontact/getSupplierContact',
                        data: {'supp_no': '<?php echo(Yii::app()->request->getParam("supp_no")) ?>'}
                        }).success(function(data){
                            window.opener.jQuery(".contact_row").remove();
                            var tbl = window.opener.jQuery("#list_contact");
                            tbl.append(data);
                            self.close();
                        });
                    } else {
                        alert("Create Contact fail!");
                    }
                });
            }
            function actionCancelNewContact(){
                self.close();
            }
        </script>
    </table></div></body></html>