<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="de" lang="de">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="language" content="de" />


        <title>
            <?php
            if (Yii::app()->params['env'] == 'dev')
                echo Yii::app()->params['version'];
            else
                echo CHtml::encode($this->pageTitle);
            ?>
        </title>
        <script type="text/javascript" src="<?php echo Yii::app()->baseUrl; ?>/js/dropdowncontent.js"></script>
        
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->getBaseUrl(); ?>/css/styles.css" />

        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->getBaseUrl(); ?>/css/fonts.css" />
  
    </head>

    <body>
       

        <?php
        
        
        ?>
        <div id="topnav">
            <div id="innerTopnavLeft">
                <div class="topnav_text">
                    &nbsp;
                    <a href="<?php echo Yii::app()->createUrl("/site/index") ?>"><?php echo Yii::t('app', 'home'); ?></a>
                    <?php if (!Yii::app()->user->isGuest): ?>
                        <a href="<?php echo Yii::app()->createUrl("/kontakt/kontakte/index") ?>" title="<?php echo Yii::t('app', 'Contacts'); ?>"><?php echo Yii::t('app', 'Contacts'); ?></a>
                        <a href="<?php echo Yii::app()->createUrl("/dokumente/file/fileExplorer", array('view' => 'about')) ?>" title="<?php echo Yii::t('app', 'Documents'); ?>"><?php echo Yii::t('app', 'Documents'); ?></a>
                        
                        <a href="<?php echo Yii::app()->createUrl("/user/profile") ?>" rel="subcontentMyAccount" id="idSubcontentMyAccount" ><?php echo Yii::t('app', 'Settings'); ?></a>
                        <?php if (Yii::app()->user->isAdmin()): ?>
                            <a href="<?php echo Yii::app()->createUrl("user/admin") ?>"><?php echo Yii::t('app', 'profile settings'); ?></a>
                        <?php endif;
                            else:
                        ?>
                            
                        <a href="<?php echo Yii::app()->createUrl("/user/login") ?>" title="<?php echo Yii::t('app', 'login'); ?>"><?php echo Yii::t('app', 'my account'); ?></a>
                        
                    <?php endif ?>
                        <a href="<?php echo Yii::app()->createUrl("/site/page", array('view' => 'about')) ?>"><?php echo Yii::t('app', 'help'); ?></a>
                </div>
            </div>

        </div>


        </div>
        <div class="window" id="subcontentMyAccount" style="position:absolute; visibility: hidden;width: 350px; height: 120px; padding: 4px;">
            <div class="window_decoration"></div>
            <div class="window_inner">
                <div style="width: 100%; float: left" class="lightning">
                    <ul>
                        <li><a href="http://www.dynamicdrive.com">Dynamic Drive</li>
                        <li><a href="http://www.javascriptkit.com">JavaScript Kit</li>
                        <li><a href="http://www.cssdrive.com">CSS Drive</li>
                        <li><a href="http://www.codingforums.com">Coding Forums</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="container-fluid" id="page">


            <div class="breadcrumbs"> 
                <?php if (isset($this->breadcrumbs)): ?>

                    <?php
                    $this->widget('application.extensions.exbreadcrumbs.EXBreadcrumbs', array(
                        'cssFile' => Yii::app()->theme->getBaseUrl() . "/css/xbreadcrumbs.css",
                        'htmlOptions' => array('class' => 'xbreadcrumbs xbreadcrumbs_style'),
                        'links' => $this->breadcrumbs,
                    ));
                    ?><!-- breadcrumbs -->

                <?php endif ?>
            </div>               
            <div id="nav-bar">
                <?php
                $this->widget('ext.mbmenu.MbMenu', array(
                    'items' => $this->tabMenu
                ));
                /*
                 $this->tabMenu = array(
                        array('label' => 'Dashboard', 'url' => array('/site/index'), 'itemOptions' => array('class' => 'test')),
                        array('label' => Yii::t('app', 'Contacts'), 'url' => array('/kontakt/kontakte/index'), 'visible' => (!Yii::app()->user->isGuest)),
                        array('label' => Yii::t('ImageManagerModule.images', 'imageGallery'),
                            'items' => array(
                                array('label' => Yii::t('ImageManagerModule.images', 'View'), 'url' => array('/imageManager/images/index')),
                                array('label' => Yii::t('ImageManagerModule.images', 'Edit'), 'url' => array('/imageManager/images/update')),
                            ),
                            'visible' => (!Yii::app()->user->isGuest)),
                        array('label' => Yii::t('DokumenteModule.main', 'Manage Files and Docs'),
                            'items' => array(
                                array('label' => Yii::t('DokumenteModule.file', 'Fileexplorer'), 'url' => array('/dokumente/file/fileExplorer', 'link' => '/var/www/vhosts')),
                                array('label' => Yii::t('DokumenteModule.dokumente', 'Document attachments'), 'url' => array('/dokumente/dokumente/index')),
                                array('label' => Yii::t('DokumenteModule.dokumente', 'word processing'), 'url' => array('/dokumente/dokumente/index'))),
                            'visible' => !Yii::app()->user->isGuest),
                        array('label' => Yii::t('VorgangModule.vorgang', 'task and workflow managment'),
                            'items' => array(array('label' => Yii::t('app', 'Tasks'), 'url' => array('/vorgang/vorgang/index')),
                                array('label' => Yii::t('app', 'Workflow'), 'url' => array('/vorgang/workflow/index'), 'visible' => (!Yii::app()->user->isGuest) && (Yii::app()->user->isAdmin()))), 'visible' => (!Yii::app()->user->isGuest)),
                        array('label' => 'Login', 'url' => array('/user/login'), 'visible' => Yii::app()->user->isGuest),
                        array('label' => 'Logout (' . Yii::app()->user->name . ')', 'url' => array('/user/logout'), 'visible' => !Yii::app()->user->isGuest),
                    );
                 */
                ?>		
            </div>
            <div class="row" id="row">                             
                <div id="toolbar" >
                    <div class="toolbar_right" >                                       
                        <?php
                        $this->widget('booster.widgets.TbButtonGroup', array(
                            'size' => 'small',
                            'buttonType' => 'link',
                             'buttons' => $this->menu,
                        ));
                        ?>
                    </div>
                </div>         
                <?php
                /**
                  $this->widget('ext.jpupdater.JPeriodicalUpdater', array(
                  'url'=>array("/site/updatemsg"),
                  'method'=>'get',
                  'maxTimeout'=>6000,
                  'callback'=>array(
                  "var myHtml = ''+data+''",
                  "var oldHtml = $('#msg').html()",
                  "$('#msg').text(myHtml)",

                  ),
                  ));
                 * 
                 */
                echo $content;
                ?>
            </div>
            <div class="clear"></div>
        </div><!-- page -->
        <script type="text/javascript">
            //Call dropdowncontent.init("anchorID", "positionString", glideduration, "revealBehavior") at the end of the page:

            dropdowncontent.init("idSubcontentMyAccount", "right-bottom", 500, "mouseover");
           

        </script>              
<?php Yii::app()->clientScript->registerScript('resize', "
    $(document).ready(function () {
   
        if (document.all||document.getElementById||document.layers){
        var h =  $(document).height()-150;
         $('.bootstrap-widget').height(h  + 'px');
         //  $('#sidebar').height(h  + 'px'); 
 }
	return false;
}
);
"); ?>
        <?php
        $this->beginWidget('zii.widgets.jui.CJuiDialog', array(
            'id' => 'updateDialog',
            'options' => array(
                'title' => Yii::t('app', 'Edit'),
                'autoOpen' => FALSE,
                'modal' => 'true',
                'width' => '800',
                'height' => '500',
                'cssFile' => Yii::app()->theme->getBaseUrl() . '/css/dialog.css'
            ),
        ));
        ?>
        <div class="divForForm"></div>
        <?php $this->endWidget(); ?>
        <?php
//--------------------- begin new code --------------------------
        // add the (closed) dialog for the iframe
        $this->beginWidget('zii.widgets.jui.CJuiDialog', array(
            'id' => 'cru-dialog',
            'options' => array(
                'title' => Yii::t('app', 'Edit'),
                'autoOpen' => false,
                'modal' => TRUE,
                'width' => 820,
                'height' => 500,
                'cssFile' => Yii::app()->theme->getBaseUrl() . '/css/dialog.css'
            ),
        ));
        ?>
        <iframe id="cru-frame" width="95%" height="95%"></iframe>
        <?php
        $this->endWidget();

//--------------------- end new code --------------------------
        ?>
    </body>
</html>