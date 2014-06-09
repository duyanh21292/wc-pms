<?php
    $user_id = $_SESSION['user'];
    $criteria = new CDbCriteria();
    $criteria->condition = 'User_ID=:User_ID';
    $criteria->params = array(':User_ID'=>$user_id);
    $modelUser = Users::model()->find($criteria);
    if (empty($modelUser)) {
        header('Location: '.Employees::BASE_URL);
    }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
    <script type="text/javascript" src="/scripts/ckeditor/ckeditor.js"></script>
    <link rel="stylesheet" type="text/css" href="../../../css/PLcss.css">
    <link rel="stylesheet" type="text/css" href="../../../css/ionicons-1.4.1/css/ionicons.css" media="screen">
    <script type="text/javascript"  src="<?php echo Yii::app()->request->baseUrl; ?>/scripts/PL-javascript.js"></script>
</head>

<body data-spy="scroll" data-target=".bs-docs-sidebar" data-twttr-rendered="true">
<div class="container">
    <div class="header">
        <div class="user_frame">
<!--            <div class="user_icon" onclick="goMyPage()"></div>-->
            <div class="icon ion-ios7-contact-outline emp_icon" onclick="goMyPage()"></div>
            <?php if(isset($_SESSION['user'])) { echo "<div style=\"text-align: right;margin-top: 2px;color: #f37020;font-weight: normal;font-family: pms-font-semibold, Arial, sans-serif;font-size: 14px;margin-left: 50px;margin-right: 80px;\">".$_SESSION['user']."</div><div style=\"text-align: right;font-size: smaller;color: #464646;font-family: pms-font-semibold, Arial, sans-serif;margin-left: 50px;margin-right: 80px;\">".$_SESSION['role']."</div>";}?>
            <div class="separator_ver" style="position: absolute;height: 30px;top: 5px;right: 75px;border-color: #B8B8B8;"></div>
            <i class="icon ion-ios7-email emp_email" style="font-size: 30px;position: absolute;top: 6px;right: 40px;cursor: pointer;" title="Email"></i>
            <a href="<?php echo Employees::BASE_URL?>/employees/logout">
                <div class="icon ion-log-out log_out" style="font-size: 30px;position: absolute;top: 6px;right: 5px;cursor: pointer;" title="Sign Out"></div>
            </a>
        </div>
    </div>
    <div class="menubar_frame">
        <div class="menubar_frame_content">
            <div id="menubar_item_home" class="menubar_button">
                <div class="menubar_button_text">
                    <ul class="nav">
                        <li class="pl_menu_item_intro">
                            <div class="a">Home</div>
                        </li>
                    </ul>
                </div>
            </div>
            <div id="menubar_item_company" class="menubar_button">
                <div class="menubar_button_text">
                    <ul class="nav">
                        <li class="pl_menu_item_product">
                            <div class="a">Company</div>
                            <ul>
                                <li>
                                    <a class="menu_item" href="<?php echo Employees::BASE_URL ?>/company/getCompanyInfo">
                                        <div class="pl_menu_item_text">Basic Information</div>
                                    </a>
                                </li>
                                <li>
                                    <a class="menu_item" href="<?php echo Employees::BASE_URL ?>/division/getAllDivOrganization">
                                        <div style="position: relative;left:-2px;top:-4px;width: 180px;height: 1px;background-color: #fff"></div>
                                        <div class="pl_menu_item_text">Organization</div>
                                    </a>
                                </li>
                                <li>
                                    <a class="menu_item" href="#">
                                        <div style="position: relative;left:-2px;top:-4px;width: 180px;height: 1px;background-color: #fff"></div>
                                        <div class="pl_menu_item_text">Process Weight Definition</div>
                                    </a>
                                </li>
                                <li>
                                    <a class="menu_item" href="#">
                                        <div style="position: relative;left:-2px;top:-4px;width: 180px;height: 1px;background-color: #fff"></div>
                                        <div class="pl_menu_item_text">Task Billable</div>
                                    </a>
                                </li>
                                <li>
                                    <a class="menu_item" href="<?php echo Employees::BASE_URL ?>/computer/getAllComp">
                                        <div style="position: relative;left:-2px;top:-4px;width: 180px;height: 1px;background-color: #fff"></div>
                                        <div class="pl_menu_item_text">Computer Management</div>
                                    </a>
                                </li>
                                <li>
                                    <a class="menu_item" href="<?php echo Employees::BASE_URL ?>/currency/getAllCurrency">
                                        <div style="position: relative;left:-2px;top:-4px;width: 180px;height: 1px;background-color: #fff"></div>
                                        <div class="pl_menu_item_text">Currency</div>
                                    </a>
                                </li>
                                <li>
                                    <a class="menu_item" href="#">
                                        <div style="position: relative;left:-2px;top:-4px;width: 180px;height: 1px;background-color: #fff"></div>
                                        <div class="pl_menu_item_text">Budget</div>
                                    </a>
                                </li>
                                <li>
                                    <a class="menu_item" href="#">
                                        <div style="position: relative;left:-2px;top:-4px;width: 180px;height: 1px;background-color: #fff"></div>
                                        <div class="pl_menu_item_text">LQA Target</div>
                                    </a>
                                </li>
                                <li>
                                    <a class="menu_item" href="#">
                                        <div style="position: relative;left:-2px;top:-4px;width: 180px;height: 1px;background-color: #fff"></div>
                                        <div class="pl_menu_item_text">Bank Information</div>
                                    </a>
                                </li>
                                <li>
                                    <a class="menu_item" href="#">
                                        <div style="position: relative;left:-2px;top:-4px;width: 180px;height: 1px;background-color: #fff"></div>
                                        <div class="pl_menu_item_text">Signature Management</div>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
            <div id="menubar_item_employees" class="menubar_button">
                <div class="menubar_button_text">
                    <ul class="nav">
                        <li class="pl_menu_item_feed">
                            <div class="a">Employees</div>
                            <ul>
                                <li>
                                    <a class="menu_item" href="<?php echo Employees::BASE_URL ?>/employees/getAllEmployees">
                                        <div class="pl_menu_item_text">Employees Management</div>
                                    </a>
                                </li>
                                <li>
                                    <a class="menu_item" href="#">
                                        <div style="position: relative;left:-2px;top:-4px;width: 180px;height: 1px;background-color: #fff"></div>
                                        <div class="pl_menu_item_text">Employees Status</div>
                                    </a>
                                </li>
                                <li>
                                    <a class="menu_item" href="<?php echo Employees::BASE_URL ?>/employees/getAllContactInfo">
                                        <div style="position: relative;left:-2px;top:-4px;width: 180px;height: 1px;background-color: #fff"></div>
                                        <div class="pl_menu_item_text">Contact Information</div>
                                    </a>
                                </li>
                                <li>
                                    <a class="menu_item" href="#">
                                        <div style="position: relative;left:-2px;top:-4px;width: 180px;height: 1px;background-color: #fff"></div>
                                        <div class="pl_menu_item_text">Vacation Management</div>
                                    </a>
                                </li>
                                <li>
                                    <a class="menu_item" href="#">
                                        <div style="position: relative;left:-2px;top:-4px;width: 180px;height: 1px;background-color: #fff"></div>
                                        <div class="pl_menu_item_text">Welfare Expense</div>
                                    </a>
                                </li>
                                <li>
                                    <a class="menu_item" href="#">
                                        <div style="position: relative;left:-2px;top:-4px;width: 180px;height: 1px;background-color: #fff"></div>
                                        <div class="pl_menu_item_text">Time Track</div>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
            <div id="menubar_item_client" class="menubar_button">
                <div class="menubar_button_text">
                    <ul class="nav">
                        <li class="pl_menu_item_address">
                            <div class="a">Client</div>
                            <ul>
                                <li>
                                    <a class="menu_item" href="<?php echo Employees::BASE_URL ?>/client/getAllClient">
                                        <div class="pl_menu_item_text">Client Management</div>
                                    </a>
                                </li>
                                <li>
                                    <a class="menu_item" href="<?php echo Employees::BASE_URL ?>/client/clientMailing">
                                        <div style="position: relative;left:-2px;top:-4px;width: 180px;height: 1px;background-color: #fff"></div>
                                        <div class="pl_menu_item_text">Client Mailing</div>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
            <div id="menubar_item_supplier" class="menubar_button">
                <div class="menubar_button_text">
                    <ul class="nav">
                        <li class="pl_menu_item_career">
                            <div class="a">Suppliers</div>
                            <ul>
                                <li>
                                    <a class="menu_item" href="<?php echo Employees::BASE_URL ?>/supplier/getAllSuppliers">
                                        <div class="pl_menu_item_text">Suppliers Management</div>
                                    </a>
                                </li>
                                <li>
                                    <a class="menu_item" href="<?php echo Employees::BASE_URL ?>/supplier/supplierMailing">
                                        <div style="position: relative;left:-2px;top:-4px;width: 180px;height: 1px;background-color: #fff"></div>
                                        <div class="pl_menu_item_text">Suppliers Mailing</div>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
            <div id="menubar_item_project" class="menubar_button">
                <div class="menubar_button_text">
                    <ul class="nav">
                        <li class="pl_menu_item_career">
                            <div class="a">Project</div>
                            <ul>
                                <li>
                                    <a class="menu_item" href="<?php echo Employees::BASE_URL ?>/projects/getAllProjects">
                                        <div class="pl_menu_item_text">Project Management</div>
                                    </a>
                                </li>
                                <li>
                                    <a class="menu_item" href="<?php echo(Employees::BASE_URL)?>/po/GetAllPo">
                                        <div style="position: relative;left:-2px;top:-4px;width: 180px;height: 1px;background-color: #fff"></div>
                                        <div class="pl_menu_item_text">PO Management</div>
                                    </a>
                                </li>
                                <li>
                                    <a class="menu_item" href="#">
                                        <div style="position: relative;left:-2px;top:-4px;width: 180px;height: 1px;background-color: #fff"></div>
                                        <div class="pl_menu_item_text">Invoice Management</div>
                                    </a>
                                </li>
                                <li>
                                    <a class="menu_item" href="#">
                                        <div style="position: relative;left:-2px;top:-4px;width: 180px;height: 1px;background-color: #fff"></div>
                                        <div class="pl_menu_item_text">Multiple Management</div>
                                    </a>
                                </li>
                                <li>
                                    <a class="menu_item" href="#">
                                        <div style="position: relative;left:-2px;top:-4px;width: 180px;height: 1px;background-color: #fff"></div>
                                        <div class="pl_menu_item_text">Collection Management</div>
                                    </a>
                                </li>
                                <li>
                                    <a class="menu_item" href="#">
                                        <div style="position: relative;left:-2px;top:-4px;width: 180px;height: 1px;background-color: #fff"></div>
                                        <div class="pl_menu_item_text">LQA Management</div>
                                    </a>
                                </li>
                                <li>
                                    <a class="menu_item" href="#">
                                        <div style="position: relative;left:-2px;top:-4px;width: 180px;height: 1px;background-color: #fff"></div>
                                        <div class="pl_menu_item_text">Client Evaluation Management</div>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
            <div id="menubar_item_report" class="menubar_button">
                <div class="menubar_button_text">
                    <ul class="nav">
                        <li class="pl_menu_item_career">
                            <div class="a">Report</div>
                        </li>
                    </ul>
                </div>
            </div>
            <div id="menubar_item_knowledgebase" class="menubar_button">
                <div class="menubar_button_text">
                    <ul class="nav">
                        <li class="pl_menu_item_career">
                            <div class="a">Knowledge Base</div>
                        </li>
                    </ul>
                </div>
            </div>
            <div id="menubar_item_wiseterm" class="menubar_button" style="border-right: 1px dotted">
                <div class="menubar_button_text">
                    <ul class="nav">
                        <li class="pl_menu_item_career">
                            <div class="a">Wise Term</div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <?php echo $content; ?>
    <script type="text/javascript">
        $('.content_main').animate({
            opacity: 1
        },'slow');
        $('.content_left_nav').animate({
            opacity: 1
        },'slow');
    </script>
    <div class="footer">
        <div style="margin-top: 5px;margin-left: 10px;font-size: smaller;font-family: pms-font-bold;">Contact SuperAdmin | Wise Concetti</div>
        <div style="margin-top: 30px;margin-left: 10px;font-size: smaller;font-family: pms-font-semibold;">Copyright(c) 2008-2014. Wise-Concetti Ltd. All rights reserved.</div>
    </div>
</div>
</body>
</html>