<?php
Yii::setPathOfAlias('booster', dirname(__FILE__) . '/../extensions/booster');
Yii::setPathOfAlias('mods', dirname(__FILE__) . '/../models');

return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Pokémon day plays pokémon',
	'preload'=>array(
		'booster'
	),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
	),

	'modules'=>array(
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'gii',
			'generatorPaths' => array('booster.gii'),
			'ipFilters'=>array('127.0.0.1','::1'),
		),
	),
	
	// application components
	'components'=>array(
        'booster' => array(
            'class' => 'booster.components.Booster'
        ),
		'user'=>array(
			'allowAutoLogin'=>true,
		),
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=pp',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => 'lcgrszpr',
			'charset' => 'utf8',
		),
		'errorHandler'=>array(
			'errorAction'=>'site/error',
		),
		'systemStatus' => array('class' => 'mods.SystemStatus'),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
				array(
					'class'=>'CWebLogRoute',
				),
			),
		),

	),

	'params'=>array(
		'active_game' 			=>	'gba',
		//All the following delays are for pressing button and are expressed in milliseconds.
		'main_delay'			=> 	'800', 		//For main buttons (suck as a and b).
		'default_delay'			=> 	'3000',		//For everything else.
		'start_delay'			=>  '10000', 	//Delay for pressing the start button.
		'speed_delay'			=> 	'5000', 	//Speed button delay.
		'time_per_status' 	    =>	'15000',    //How many seconds does each status last (democracy or anarchy)
		'democracy_per_status'	=>  '3',        //Times that a democracy round goes per status change.
	),
);
