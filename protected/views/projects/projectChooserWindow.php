<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link rel="stylesheet" type="text/css" href="../../../css/PLcss.css">
    <script type="text/javascript" src="/assets/18e7d7ae/jquery.min.js"></script>
    <script type="text/javascript"  src="../../../scripts/PL-javascript.js"></script>
    <script type="text/javascript">
        function selectProject(no,name) {
            window.opener.document.getElementById("project_selected_name").innerHTML=name;
            window.opener.document.getElementById("project_selected_name").setAttribute("projno",no);
            self.close();
        }
    </script>
</head>

<body data-spy="scroll" data-target=".bs-docs-sidebar" data-twttr-rendered="true">
    <div class="content_main content_main_dlg_window" style="left: 0;opacity: 1">
        <div class="tool_frame">
            <div class="search_frame">
                Search:
                <select id="cb_search_type" name="search_type">
                    <option value="ClientName">Client Name</option>
                    <option value="ProjectNo">Project No.</option>
                    <option value="ProjectName">Project Name</option>
                    <option value="ProjectManagerName">PM Name</option>
                </select>
                <input id="ip_search_content" type="text" name="search_content">
                <input type="submit" value="Search">
            </div>
        </div>
        <table class="list_data">
            <tr>
                <th>Project No.</th>
                <th>Project Name</th>
                <th>Client</th>
                <th>Contact</th>
            </tr>
            <?php foreach($model as $obj):?>
                <tr>
                    <td style="text-align: center"><?php echo $obj->ProjectNo ?></td>
                    <td><div class="cell_click" onclick="selectProject('<?php echo $obj->ProjectNo ?>','<?php echo $obj->ProjectName ?>')"><?php echo $obj->ProjectName ?></div></td>
                    <td><?php echo $obj->ClientName ?></td>
                    <td><?php echo $obj->ContactName ?></td>
                </tr>
            <?php endforeach?>
        </table>
    </div>
</body>
</html>