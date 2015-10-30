<?php
if(Yii::app()->user->isGuest){
$file = dirname(__FILE__).DIRECTORY_SEPARATOR.Yii::app()->user->name.'_params.inc';
$content = file_get_contents($file);
$arr = unserialize(base64_decode($content));
return CMap::mergeArray(
        $arr,
        array(
   'dir' => '/var/www',
        'adminEmail' => 'asdmundt@gmail.com',
        'company' => 'asdmundt',
         'appname' => 'familycloud',
        'mandantId' => '1',
       'debug'=> FALSE,
            'baseLayout' => '//layouts/main',
      //  'css' => 'blue',
      //  'theme' => 'custom',
        'statistik' => true, 
        'version' => '1.1.1',
        'env' => 'www',
	
       

   
        )
    );
}  else {
       return    array(
         'dir' => '/',
        'adminEmail' => 'asdmundt@gmail.com',
        'company' => 'asdmundt',
         'appname' => 'familycloud',
        'debug'=> FALSE,
        'mandantId' => '1',
       'baseLayout' => '//layouts/main',
        'statistik' => true, 
        'version' => '1.1.1', 
        'env' => 'www',

       

   
        );
}
?>