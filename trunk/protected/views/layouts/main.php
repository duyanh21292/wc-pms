<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
    <link rel="stylesheet" type="text/css" href="../../../css/PLcss.css">
    <script type="text/javascript" src="../../../scripts/PL-javascript.js"></script>
</head>

<body data-spy="scroll" data-target=".bs-docs-sidebar" data-twttr-rendered="true">
    <?php $Get_url = "http://" . $_SERVER['HTTP_HOST']; ?>
	<div style="margin-top: 50px">
            <form action="<?php echo $Get_url; ?>/employees/login" method="post">
                 <table border="0" style="margin: auto">
                     <tr class="form">
                         <td class="form" style="min-width: 100px">User ID:</td>
                         <td class="form"><input type="text" name="user_id"></td>
                     </tr>
                     <tr class="form" style="min-width: 100px">
                         <td class="form" style="min-width: 100px">Password:</td>
                         <td class="form"><input type="password" name="pass"></td>
                     </tr>
                     <tr class="form">
                         <td class="form" colspan="2" style="text-align: center"><input type="submit" value="Login"></td>
                     </tr>
                 </table>
            </form>
	</div>
</body>
</html>
			