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
        $this->widget(
                'booster.widgets.TbNavbar', array(
            'brand' => Yii::app()->name,
            'type' => 'inverse',
            'fixed' => 'top',
            'fluid' => FALSE,
            'items' => array(
                array(
                    'class' => 'booster.widgets.TbMenu',
                    'type' => 'navbar',
                    'items' => array(
                        array('label' => Yii::t('app', 'home'), 'url' => array('/site/index'), 'active' => true),
                        array('label' => Yii::t('app', 'Contacts'), 'url' => array('/kontakt/kontakte/index'), 'visible' => (!Yii::app()->user->isGuest)),
                        array('label' => Yii::t('app', 'Documents'), 'url' => array('/dokumente/file/fileExplorer'), 'visible' => (!Yii::app()->user->isGuest)),
                    )
                ),
                array(
                    'class' => 'booster.widgets.TbMenu',
                    'type' => 'navbar',
                    'htmlOptions' => array('class' => 'pull-right'),
                    'items' => array(
                        array('label' => Yii::t('app', 'login'), 'url' => array('/user/login'), 'visible' => (Yii::app()->user->isGuest)),
                        array('label' => Yii::t('app', 'logout'), 'url' => array('/user/logout'), 'visible' => (!Yii::app()->user->isGuest)),
                        array('label' => Yii::t('app', 'Settings'), 'url' => array('/user/profile'), 'itemOptions' => array('rel' => 'subcontentMyAccount', 'id' => 'idSubcontentMyAccount'), 'visible' => (!Yii::app()->user->isGuest)),
                        array('label' => Yii::t('app', 'profile settings'), 'url' => array('user/admin'), 'visible' => (Yii::app()->user->isAdmin())),
                        array('label' => Yii::t('app', 'help'), 'url' => array('/site/page', 'view' => 'about')),
                    )
                )
            )
                )
        );
        ?>


        </div>
        <div class="menuWindow" id="subcontentMyAccount" style="position:absolute; visibility: hidden;width: 250px; height: 420px;">
            <div class="window_decoration">Information</div>
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

        <div class="container-fluid">


            <div class="row">          
                <?php if (isset($this->breadcrumbs)): ?>

                    <?php
                    $this->widget(
                            'booster.widgets.TbBreadcrumbs', array(
                        'links' => $this->breadcrumbs,
                            )
                    );
                    ?><!-- breadcrumbs -->

                <?php endif ?>
            </div>                        

            <div class="row">                             

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
            var x = screen.availHeight - 100;
            var h = x + 'px';

            document.getElementById('mainPanel').style.height = h;
            dropdowncontent.init("idSubcontentMyAccount", "left-bottom", 500, "mouseover");


        </script>              

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