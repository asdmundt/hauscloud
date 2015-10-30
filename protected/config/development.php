<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');
//Yii::setPathOfAlias('bootstrap', dirname(__FILE__) . '/../extensions/bootstrap-1-0-5');
Yii::setPathOfAlias('bootstrap', dirname(__FILE__) . '/../extensions/yiibooster-4.0.1');
Yii::setPathOfAlias('editable', dirname(__FILE__) . '/../extensions/x-editable-yii-1-1-0');
// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'name' => 'hauscloud',
    'language' => 'de',
    'theme' => 'toWebGrey',
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
        'application.components.CAdvancedArBehavior',
        'application.extensions.debugtoolbar.*',
        'application.modules.imageManager.models.*',
        'application.modules.imageManager.*',
        'application.modules.imageManager.controllers',
        'application.modules.mailbox.models.*',
        'application.modules.mailbox.*',
        'application.modules.mailbox.controllers',
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
            'artAlias' => array(
                '1' => 'privatkontakt',
                '2' => 'kontakt',
                '3' => 'telkontakt',
                '4' => 'Firma',
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
        'gii' => array(
            'class' => 'system.gii.GiiModule',
            'password' => '1',
            // If removed, Gii defaults to localhost only. Edit carefully to taste.
            'ipFilters' => array('188.97.190.39'),
            'generatorPaths' => array(
                'ext.gtc', //nested set  Model and Crud templates
                'application.gii',
                'bootstrap.gii',
                'ext.giix-core',
            ),
        ),
        'user' => array(
            # encrypting method (php hash function)
            'hash' => 'md5',
            # send activation email
            'sendActivationMail' => true,
            # allow access for non-activated users
            'loginNotActiv' => false,
            # activate user on registration (only sendActivationMail = false)
            'activeAfterRegister' => false,
            # automatically login from registration
            'autoLogin' => true,
            # registration path
            'registrationUrl' => array('/user/registration'),
            # recovery password path
            'recoveryUrl' => array('/user/recovery'),
            # login form path
            'loginUrl' => array('/user/login'),
            # page after login
            'returnUrl' => array('/user/profile'),
            # page after logout
            'returnLogoutUrl' => array('/user/login'),
            'debug' => false,
            'tableUsers' => 'users',
            'tableProfiles' => 'profiles',
            'tableProfileFields' => 'profiles_fields',
            'version' => '0.9.1-RC2-01-176',
        ),
        'mailbox' => array(
            'userClass' => 'WebUser',
        ),
        'imageManager' => array(
        ),
        'message' => array(
            'messageTable' => 'message',
        ),
    ),
    // application components
    'components' => array(
        'user' => array(
            'class' => 'WebUser',
            'allowAutoLogin' => true,
            'loginUrl' => array('/user/login'),
        ),
        'settings' => array(
            'class' => 'application.components.CmsSettings',
            'cacheComponentId' => 'fcache',
            'cacheId' => 'global_website_settings',
            'cacheTime' => 84000,
            'tableName' => '{{settings}}',
            'dbComponentId' => 'db',
            'createTable' => true,
            'global' => FALSE,
            'dbEngine' => 'InnoDB',
        ),
        'swiftMailer' => array('class' => 'ext.swiftMailer.SwiftMailer'),
        'metadata' => array('class' => 'application.components.Metadata'),
        'appHelper' => array('class' => 'application.components.THelper'),
        //'cache' => array('class' => 'system.caching.CMemCache'),
        'cache' => array('class' => 'system.caching.CApcCache'),
        'fcache' => array(
            'class' => 'system.caching.CFileCache'),
        'file' => array('class' => 'application.modules.dokumente.extensions.file.CFile'),
        'errorHandler' => array(
            'errorAction' => 'site/error',
        ),
        'bootstrap' => array(
            'class' => 'bootstrap.components.Booster',
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
          'urlManager' => array(
          'urlFormat' => 'path',
          'showScriptName' => false,
          'rules' => array(
          'user/<controller:\w+>/<action:\w+>' => 'user/<controller>/<action>'
          ),
          ), */
        'db' => array(
            'class' => 'system.db.CDbConnection',
            'autoConnect' => true,
            'connectionString' => 'mysql:host=localhost;dbname=dev_hauscloud',
            'emulatePrepare' => true,
            'username' => 'dev_hauscloud',
            'password' => 'dev_hauscloud',
            'charset' => 'utf8',
            'tablePrefix' => '',
        ),
        'session' => array(
            'sessionName' => 'SiteSession',
            'class' => 'CCacheHttpSession',
            'cacheID' => 'sessionCache',
            'autoStart' => true,
        ),
        'sessionCache' => array(
            'class' => 'CApcCache',
        ),
        'errorHandler' => array(
            'errorAction' => 'site/error',
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
                    'categories' => 'dokumente',
                    'levels' => CLogger::LEVEL_INFO,
                    'connectionID' => 'db',
                    'logTableName' => 'Yii_log_dokumente'
                ),
                array(
                    'class' => 'CFileLogRoute',
                    'categories' => 'dokumente',
                    'levels' => CLogger::LEVEL_INFO,
                    'logFile' => 'dokumente.txt',
                ),
                array(
                    'class' => 'CDbLogRoute',
                    'categories' => 'ide',
                    'levels' => CLogger::LEVEL_INFO,
                    'connectionID' => 'db',
                    'logTableName' => 'Yii_log_ide'
                ),
                array(
                    'class' => 'CFileLogRoute',
                    'categories' => 'ide',
                    'levels' => CLogger::LEVEL_INFO,
                    'logFile' => 'ide.txt',
                ),
                array(
                    'class' => 'CDbLogRoute',
                    'categories' => 'kontakt',
                    'levels' => CLogger::LEVEL_INFO,
                    'connectionID' => 'db',
                    'logTableName' => 'Yii_log_kontakte'
                ),
                array(
                    'class' => 'CFileLogRoute',
                    'categories' => 'kontakt',
                    'levels' => CLogger::LEVEL_INFO,
                    'logFile' => 'kontakte.txt',
                ),
                array(
                    'class' => 'CDbLogRoute',
                    'categories' => 'fileOperation',
                    'levels' => CLogger::LEVEL_INFO,
                    'connectionID' => 'db',
                    'logTableName' => 'Yii_log_fileOperation'
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
                array(
                    'class' => 'CFileLogRoute',
                    'categories' => 'application',
                    'levels' => CLogger::LEVEL_INFO,
                    'logFile' => 'application.txt',
                ),
            /*

              array(
              'class' => 'XWebDebugRouter',
              'config' => 'alignLeft, runInDebug, fixedPos, collapsed',
              'levels' => 'error, warning, trace, profile, info',
              'allowedIPs' => array('127.0.0.1'),
              ), */
            ),
        ),
    ),
    'params' => require(dirname(__FILE__) . '/dev_params.php'),
);
