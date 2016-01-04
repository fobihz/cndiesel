<?php

class Qtip extends CWidget
{
    public $baseurl;
    public $options;
    public $selector;
	
    public function init()
    {
	$dir = dirname(__FILE__) . DIRECTORY_SEPARATOR . 'source';
	$this->baseurl = Yii::app()->getAssetManager()->publish($dir);
        $cs = Yii::app()->clientScript;

        $cs->registerCssFile($this->baseurl."/jquery.qtip.min.css", "screen");
        $cs->registerCoreScript('jquery');
        $cs->registerScriptFile($this->baseurl."/jquery.qtip.min.js");
           

    	parent::init();
    }

    public function run()
    {
        
        Yii::app()->getClientScript()->registerScript(__CLASS__.$this->selector,"$('#$this->selector').qtip($this->options);",CClientScript::POS_READY);
    }
}
?>