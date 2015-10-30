<?php
/**
 * params-private.php
 *
 * @author: soehnke mundt <asdmundt@gmail.com>
 * @version string
 */
return array(
	'rootDir' => DIRECTORY_SEPARATOR . "var" . DIRECTORY_SEPARATOR . "www" . DIRECTORY_SEPARATOR . "files" . DIRECTORY_SEPARATOR . Yii::app()->params['mandantId'] ,
        'wsdir' =>  DIRECTORY_SEPARATOR . "private" . DIRECTORY_SEPARATOR . Yii::app()->user->name,
        'baseLayout' => '//layouts/main',
        'sudopwd' => '',
);