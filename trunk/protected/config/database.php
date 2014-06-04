<?php
return array(
	// application components
	//192.168.1.55
	'components'=>array(
		'db'=>array(
            'connectionString' => 'mysql:host=192.168.1.5;dbname=pms',
            'emulatePrepare' => true,
            'username' => 'root',
            'password' => '123456',
            'charset' => 'utf8',
            'schemaCachingDuration'=>3306,

        ),
	),
);