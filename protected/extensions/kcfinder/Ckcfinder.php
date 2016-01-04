<?php

class Ckcfinder extends CInputWidget
{
    private $baseurl;
    public $kcFinderPath;
    public $name;
    public $value;
   
	
    public function init()
    {
	$dir = dirname(__FILE__) . DIRECTORY_SEPARATOR . 'source';
	$this->baseurl = Yii::app()->getAssetManager()->publish($dir);
    	$this->kcFinderPath = $this->baseurl;

        $cs = Yii::app()->clientScript;
        $cs->registerCssFile($this->baseurl."/run/kcfinder.css", "screen");
        $cs->registerScriptFile($this->baseurl."/run/kcfinder.js");

        parent::init();
    }
  
    public function run()
    {
         $this->name = get_class($this->model).'['.$this->attribute.']';
         $ok = $this->attribute;
         $this->value = $this->model->$ok;
          
         $session=new CHttpSession;
         $session->open();
         $session['KCFINDER'] = array(
                                        'disabled'=>false,
                                        'uploadURL'=>"/userfiles/editor/",
                                        'uploadDir'=>$_SERVER['DOCUMENT_ROOT']."/userfiles/editor/",
                                    );
	?>	 
        <div class="image" id="image_<?=$this->attribute?>" onclick="openKCFinder(this,'<?=$this->kcFinderPath?>','<?=$this->attribute?>')">
            <?
            if( empty($this->value) )
            {
                ?>
                <div style="margin:2px"><i>Кликните для выбора изображения</i></div>
            <?
            }
            else
            {
                ?>
                <img id="img_<?=$this->attribute?>" class="saved" src="/userfiles/small/<?=$this->value ?>" />
                <?
            }
            ?>
        </div>
        <a href="#" onclick="return dellPhoto('<?=$this->attribute?>');">удалить фото</a>
   	<?
        echo CHtml::activeHiddenField($this->model, $this->attribute,array('id'=>'imghiddenfield_'.$this->attribute));
        
    }
}
?>