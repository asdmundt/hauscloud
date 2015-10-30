<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');
//Yii::setPathOfAlias('bootstrap', dirname(__FILE__) . '/../extensions/bootstrap-1-0-5');
Yii::setPathOfAlias('bootstrap', dirname(__FILE__) . '/../extensions/yiibooster-2.0.0');
Yii::setPathOfAlias('editable', dirname(__FILE__) . '/../extensions/x-editable-yii-1-1-0');
// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'name' => 'hauscloud',
    'language' => 'de',
    'theme' => 'toweb',
    // preloading 'log' component
    'preload' => array('log', 'bootstrap'),
    // autoloading model and component classes
    'import' => array(
        'application.models.*',
        'application.components.*',
        'ext.giix-components.*', // giix components
        'ext.fileimagebehavior.*',
        'ext.gtc.components.*',
        'application.modules.kontakt.models.*',
        'application.modules.kontakt.*',       
        'application.modules.dokumente.models.*',
        'application.modules.dokumente.components.*',
        'application.modules.dokumente.controllers.*',
        'application.modules.dokumente.*',
        'application.modules.dokumente.models.*',
        'application.modules.vorgang.models.*',
        'application.modules.vorgang.components.*',
        'application.modules.vorgang.*',
        'application.modules.user.controllers.*',
        'application.modules.user.models.*',
        'application.modules.user.components.*',
        'application.modules.usergroup.controllers.*',
        'application.modules.usergroup.models.*',
        'application.modules.usergroup.components.*',
        'application.components.CAdvancedArBehavior',
        'application.extensions.debugtoolbar.*',
        'application.modules.ide.controllers.*',
        'application.modules.ide.models.*',
        'application.modules.imageManager.models.*',
        'application.modules.imageManager.*',
        'application.modules.imageManager.controllers',
        'application.modules.mailbox.models.*',
        'application.modules.mailbox.*',
        'application.modules.mailbox.controllers',
        'application.modules.ide.*',
        'ext.browsehistory.models.Browsehistory',
 
        'editable.*'
    ),

    'aliases' => array(
        //If you manually installed it
        'xupload' => 'application.modules.dokumente.extensions.xupload'
    ),
    'modules' => array(
        'kontakt' => array('mid' => 2,
            'mainmenu' => array('label' => Yii::t('KontaktModule.kontacts', 'Contacts'), 'url' => array('/kontakt/kontakte/index')),
            'artAlias'=>array(
            '1' => 'privatkontakt',
            '2' => 'kontakt',
            '3' => 'telkontakt',
            '4' => 'Firma',
            '5' => 'Projekt',
            '6' => 'Rechnungssteller',
        )
        ),
        'dokumente' => array(
            'mid' => 3,
            'mimeType' => array('txt', 'html', 'htm', 'php', 'doc', 'css', 'js', 'ini', 'csv', 'sh', 'java', 'svg', 'txt', 'doc', 'docx', 'odt', 'rtf', 'xml', 'xls'),
                    ),
        'vorgang' => array(
            'mid' => 7,
            ),
        'imageManager' => array(
            ),
        'admin' => array('mid' => 8),
        
'user' => array(
'debug' => false,
'userTable' => 'user',
'translationTable' => 'translation',

),
'mailbox'=> array(
    'userClass' => 'YumUser',   
 
),
 'avatar'=> array(
   
),  
'ide' => array(
'debug' => true,
 
),
'usergroup' => array(
'usergroupTable' => 'usergroup',
'usergroupMessageTable' => 'user_group_message',
 'userparticipationTable'  => 'user_usergroup',  
),
'membership' => array(
'membershipTable' => 'membership',
'paymentTable' => 'payment',
),
'friendship' => array(
'friendshipTable' => 'friendship',
),
'profile' => array(
'privacySettingTable' => 'privacysetting',
'profileFieldTable' => 'profile_field',
'profileTable' => 'profile',
'profileCommentTable' => 'profile_comment',
'profileVisitTable' => 'profile_visit',
),
'role' => array(
'roleTable' => 'role',
'userRoleTable' => 'user_role',
'actionTable' => 'action',
'permissionTable' => 'permission',
),
'message' => array(
'messageTable' => 'message',
),
        ),
                        
     
   
    // application components
    'components' => array(
    'user'=>array(
      'class' => 'application.modules.user.components.YumWebUser',
      'allowAutoLogin'=>true,
      'loginUrl' => array('//user/login'),
      //'admins' => array('admin', 'foo', 'bar'), // users with full access
    ),
        'settings'=>array(
        'class'             => 'application.components.CmsSettings',
        'cacheComponentId'  => 'fcache',
        'cacheId'           => 'global_website_settings',
        'cacheTime'         => 84000,
        'tableName'     => '{{settings}}',
        'dbComponentId'     => 'db',
        'createTable'       => true,
        'global'            => FALSE,    
        'dbEngine'      => 'InnoDB',
        ),
        'swiftMailer' => array('class' => 'ext.swiftMailer.SwiftMailer'),
        'metadata' => array('class' => 'application.components.Metadata'),
        'appHelper' => array('class' => 'application.components.THelper'),
         'cache'=>array('class'=>'system.caching.CMemCache'),
        //'cache'=>array( 'class'=>'system.caching.CApcCache'),
        'fcache'=>array(
            'class'=>'system.caching.CFileCache'),
        'file' => array('class' => 'application.modules.dokumente.extensions.file.CFile'),
        'errorHandler' => array(
            'errorAction' => 'site/error',
        ),
        'bootstrap' => array(
            'class' => 'bootstrap.components.Bootstrap',
            'responsiveCss' => true,
        ),
        'editable' => array(
            'class' => 'editable.EditableConfig',
            'form' => 'bootstrap', //form style: 'bootstrap', 'jqueryui', 'plain' 
            'mode' => 'inline', //mode: 'popup' or 'inline'  
            'defaults' => array(//default settings for all editable elements
                'emptytext' => 'Click to edit'
            )
        ),
/*
        'urlManager'=>array(
'urlFormat'=>'path',
'showScriptName'=>false,
),*/
        'db' => array(
            'class' => 'system.db.CDbConnection',
            'autoConnect' => true,
            'connectionString' => 'mysql:host=localhost;dbname=hauscloud',
            'emulatePrepare' => true,
            'username' => 'hauscloud',
            'password' => 'hauscloud',
            'charset' => 'utf8',
            'tablePrefix' => '',
        ),
        'session' => array(
		'sessionName' => 'SiteSession',
		'class' => 'CHttpSession',
		'autoStart' => true,
		),
        'errorHandler'=>array(
            'errorAction'=>'site/error',
        ),
        'log' => array(
            'class' => 'CLogRouter',
            'routes' => array(
                array(
                    'class' => 'CEmailLogRoute',
                    'levels' => CLogger::LEVEL_ERROR,
                    'emails' => array(Yii::app()->params['adminEmail']),
                    'sentFrom' => 'error@' . Yii::app()->params['appname'] . 'de',
                    'subject' => 'Error at ' . Yii::app()->params['appname'],
                ),
                array(
                    'class' => 'CFileLogRoute',
                    'levels' => CLogger::LEVEL_ERROR,
                    'logFile' => 'error.txt',
                ),
                array(
                    'class' => 'CDbLogRoute',
                    'levels' => CLogger::LEVEL_ERROR,
                    'connectionID' => 'db',
                    'logTableName' => 'Yii_log_error'
                ),
                
                array(
                    'class' => 'CDbLogRoute',
                    'categories' => 'statistik',
                    'levels' => CLogger::LEVEL_INFO,
                    'connectionID' => 'db',
                    'logTableName' => 'Yii_log_statistik'
                ),
                array(
                    'class' => 'CFileLogRoute',
                    'categories' => 'statistik',
                    'levels' => CLogger::LEVEL_INFO,
                    'logFile' => 'statistik.txt',
                ),
                array(
                    'class' => 'CFileLogRoute',
                    'categories' => 'dev',
                    'levels' => CLogger::LEVEL_INFO,
                    'logFile' => 'development.txt',
                ),
            /*

              array(
              'class'=>'XWebDebugRouter',
              'config'=>'alignLeft, runInDebug, fixedPos, collapsed',
              'levels'=>'error, warning, trace, profile, info',
              'allowedIPs'=>array('127.0.0.1','192.168.2.103'),
              ),
             */
            ),
        ),
    ),
    'params' => require(dirname(__FILE__) . '/params.php'),
);