<?php
// change the following paths if necessary
$yii=dirname(__FILE__).'/yii/framework/yii.php';
$config=dirname(__FILE__).'/protected/config/main.php';

// remove the following lines when in production mode
if(isset($_SERVER['REMOTE_ADDR']) && in_array($_SERVER['REMOTE_ADDR'], array('118.70.181.44')))
	defined('YII_DEBUG') or define('YII_DEBUG',true);
else
	defined('YII_DEBUG') or define('YII_DEBUG',false);

// specify how many levels of call stack should be shown in each log message
defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL',3);
define('HOME_URL', '');

define('HOME_PATH', dirname(__FILE__));
define('CODE_PATH', dirname(__FILE__).'/protected');

require_once($yii);
Yii::createWebApplication($config)->run();?>