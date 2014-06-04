<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link rel="stylesheet" type="text/css" href="../../../css/PLcss.css">
    <script type="text/javascript" src="/assets/18e7d7ae/jquery.min.js"></script>
    <script type="text/javascript"  src="../../../scripts/PL-javascript.js"></script>
    <script type="text/javascript">
        function selectSupplier(no,name,type,lang_pair_id,lang_pair_name,a_task_id,a_task_name) {
            var lang_pair_child = '';
            var a_task_child = '';
            if (!jQuery.isEmptyObject(lang_pair_id)) {
                var array_id = lang_pair_id.replace(/-/g,"").split(',');
                var array_name = lang_pair_name.split(',');
                for (var i = 0; i < array_id.length ; i ++) {
                    lang_pair_child += '<option value = "'+ array_id[i] +'">' + array_name[i] + '</option>';
                }
            } else {

            }

            if (!jQuery.isEmptyObject(a_task_id)) {
                var array_id = a_task_id.replace(/-/g,"").split(',');
                var array_name = a_task_name.split(',');
                for (var i = 0; i < array_id.length ; i ++) {
                    a_task_child += '<option value = "'+ array_id[i] +'">' + array_name[i] + '</option>';
                }
            } else {

            }

            window.opener.document.getElementById("cb_lang_pair").disabled = false;
            window.opener.document.getElementById("cb_lang_pair").innerHTML = lang_pair_child;
            window.opener.document.getElementById("cb_a_task").disabled = false;
            window.opener.document.getElementById("cb_a_task").innerHTML = a_task_child;
            if(type == 1){
                $.ajax({
                    type: 'GET',
                    url: '<?php echo(Employees::BASE_URL) ?>/suppliercontact/getSuppContactCb',
                    data: {'supp_no' : no}
                }).success(function(data){
                    window.opener.document.getElementById("supplier_selected_name").innerHTML= name + '&nbsp;' + data;
                    window.opener.document.getElementById("supplier_selected_name").setAttribute("suppno",no);
                    self.close();
                });
            } else {
                window.opener.document.getElementById("supplier_selected_name").innerHTML= name;
                window.opener.document.getElementById("supplier_selected_name").setAttribute("suppno",no);
                self.close();
            }
        }
    </script>
</head>

<body data-spy="scroll" data-target=".bs-docs-sidebar" data-twttr-rendered="true">
<div class="content_main content_main_dlg_window" style="left: 0;opacity: 1">
    <div class="tool_frame">
        <div class="search_frame">
            Search:
            <select id="cb_search_type" name="search_type">
                <option value="SupplierNo">Supplier No.</option>
                <option value="SupplierName">Name</option>
                <option value="UserID">Login ID</option>
                <option value="Address">Address</option>
                <option value="Tel">Tel</option>
            </select>
            <input id="ip_search_content" type="text" name="search_content">
            <input type="submit" value="Search">
        </div>
    </div>
    <table class="list_data">
        <tr>
            <th>NO.</th>
            <th>Name</th>
            <th>Login ID</th>
            <th>Location</th>
            <th>Level</th>
            <th>Workload</th>
        </tr>
        <?php $no = 0; ?>
        <?php foreach($model as $obj):?>
            <?php $no++; ?>
            <tr>
                <td class="cell_no"><?php echo $no ?>.</td>
                <td>
                    <?php if ($obj->SType_ID == 1):?>
                        <div class="supp_company" style="float:left">(<?php echo $obj->TypeDescription ?>)&nbsp;</div>
                    <?php elseif($obj->SType_ID == 2): ?>
                        <div class="supp_freelancer" style="float:left">(<?php echo $obj->TypeDescription ?>)&nbsp;</div>
                    <?php endif ?>
                    <div class="cell_click"
                         onclick="selectSupplier('<?php echo $obj->SupplierNo ?>',
                             '<?php echo $obj->SupplierName ?>',
                             '<?php echo $obj->SType_ID ?>',
                             '<?php echo $obj->Language_Pair_ID ?>',
                             '<?php echo $obj->Language_Pair_Name ?>',
                             '<?php echo $obj->ATask_ID ?>',
                             '<?php echo $obj->Task_Name ?>')"><?php echo $obj->SupplierName ?></div>
                </td>
                <td><?php echo $obj->UserID ?></td>
                <td><?php echo $obj->Location ?></td>
                <td><?php echo $obj->Level_Name ?></td>
                <td>%</td>
            </tr>
        <?php endforeach?>
    </table>
</div>
</body>
</html>