<?php
/**
 * Base overrides for frontend application
 */
return [
    // So our relative path aliases will resolve against the `/frontend` subdirectory and not nonexistent `/protected`
    'basePath' => 'frontend',
    'import' => [
        'application.controllers.*',
        'application.controllers.actions.*',
        'common.actions.*',
    ],
    'controllerMap' => [
        // Overriding the controller ID so we have prettier URLs without meddling with URL rules
        'site' => 'FrontendSiteController'
       
    ],
    'components' => [
        'Smtpmail'=>array(
            'class'=>'application.extensions.smtpmail.PHPMailer',
            'Host'=>"mail.surbzoravor.am",
            'Username'=>'info@surbzoravor.am',
            'Password'=>'ZoravorMail2)!4',
            'Mailer'=>'smtp',
            'Port'=>26,
            'SMTPAuth'=>true,
        ),
	    'bootstrap' => [
	  	  	// `bootstrap` path alias was defined in global init script
	    	'class' => 'bootstrap.components.Bootstrap'
    		],
        'errorHandler' => [
            // Installing our own error page.
            'errorAction' => 'site/error'
        ],
        'urlManager' => [
            // Some sane usability rules
            'rules' => [
                '<controller:\w+>/<id:\d+>' => '<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
                'general/view/<day:\d+>/<month:\d+>/<year:\d+>'=>'general/view/day/<day>/month/<month>/year/<year>',
                'general/<day:\d+>/<month:\d+>/<year:\d+>'=>'general/view/day/<day>/month/<month>/year/<year>', 
                'post/view/<slug:.*>' => 'post/view/slug/<slug>',
                
                'menu/view/<slug:.*>' => 'menu/view/slug/<slug>',
                'menu/own/<slug:.*>' => 'menu/own/slug/<slug>',
                'subscribe/remove/<hash:.*>' => 'site/removeSubscribe/hash/<hash>',
                'home'=>'site/index',
                'post/<slug:.*>' => 'post/view/slug/<slug>',

                // Your other rules here...
            ]
        ],
    ],
];