<?php
/**
 * Base config overrides for backend application
 */
return [
    // So our relative path aliases will resolve against the `/backend` subdirectory and not nonexistent `/protected`
    'basePath' => 'backend',
    'import' => [
        'application.controllers.*',
        'application.controllers.actions.*',
        'common.actions.*',
        'common.extensions.easyimage.EasyImage'		
    ],
    'controllerMap' => [
        // Overriding the controller ID so we have prettier URLs without meddling with URL rules
        'site' => 'BackendSiteController'
    ],
    'modules' => array(
    		/*Backend can afford gii support */
    		'gii'=>array(
    				'generatorPaths' => ['bootstrap.gii'],
    				'class'=>'system.gii.GiiModule',
    				'password'=>'admin',
	
    		),
    ),
    'components' => [
    	'easyImage' => array(
    		'class' => 'common.extensions.easyimage.EasyImage',
    	),		
        // Backend uses the YiiBooster package for its UI
        'bootstrap' => [
            // `bootstrap` path alias was defined in global init script
            'class' => 'bootstrap.components.Bootstrap'
        ],
        'errorHandler' => array(
            // Installing our own error page.
            'errorAction' => 'site/error'
        ),
        'urlManager' => [
            // Some sane usability rules
            'rules' => [
                '<controller:\w+>/<id:\d+>' => '<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
                'site/login' => 'site/login',
               // '<controller:\w+>/'=>'<controller>/admin'

                // Your other rules here...
            ]
        ],
    ],
];