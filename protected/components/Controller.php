<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends RController
{
   public function filters(){
	return array(
		
		'rights'
	);
    }

    /*public function  allowedActions() {
        return '*';
    }*/
    
    public $layout='//layouts/column1';
    public $menu=array();
    public $breadcrumbs=array();
    public $metadescr;
    public $metakeys;
}