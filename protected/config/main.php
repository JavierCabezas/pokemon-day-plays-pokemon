<?php
Yii::setPathOfAlias('booster', dirname(__FILE__) . '/../extensions/booster');

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

		'errorHandler'=>array(
			'errorAction'=>'site/error',
		),
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
		'active_game' 	=>	'gba',
		//All the following delays are for pressing button and are expressed in seconds.
		'main_delay'	=> 	'1', 	//for main buttons (suck as a and b).
		'start_delay'	=>  '10', 	//Delay for pressing the start button.
		'speed_delay'	=> 	'2', 	//Speed button delay.
	),
);