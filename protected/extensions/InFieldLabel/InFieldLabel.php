<?php

class InFieldLabel extends CWidget
{
    public $options;
    public $selector;
    public $baseurl;

    public function init()
    {
	$dir = dirname(__FILE__) . DIRECTORY_SEPARATOR . 'src';
	$this->baseurl = Yii::app()->getAssetManager()->publish($dir);
        $cs = Yii::app()->clientScript;

        $cs->registerCssFile($this->baseurl."/style.css", "screen");
        $cs->registerCoreScript('jquery');
        $cs->registerScriptFile($this->baseurl."/jquery.infieldlabel.min.js");

    	parent::init();
    }

    public function run()
    {
        ?>
        <script type="text/javascript">
        $(document).ready(function(){
            $('<?=$this->selector?>').inFieldLabels(<?=$this->options?>);
        });
        </script>
        <?
    }
}
?>
