<?php


Yii::import('zii.widgets.grid.CGridView');


class CSortableGridView extends CGridView
{
    public $url;
    public $model_name;
    public $cond_attr;
   
  
    public function init()
    {
        parent::init();

        $this->url = Yii::app()->getController()->createUrl('sort');
        $this->model_name = get_class($this->filter);
       
        $this->rowCssClassExpression =  '"items[]_{$data->id}"';
        
        $cond = '';
        if(!empty($this->cond_attr))
        {
            $attr = $this->cond_attr;
            $value = $this->filter->$attr;
            $cond = ",attr:'".$attr."',value:'".$value."'";
        }

        $str_js = "
                    var fixHelper = function(e, ui) {
                        ui.children().each(function() {
                            $(this).width($(this).width());
                        });
                        return ui;
                    };

                    $('#".$this->id." table.items tbody').sortable({
                        forcePlaceholderSize: true,
                        forceHelperSize: true,
                        items: 'tr',
                        update : function (event,ui) {

                            var el_index = ui.item.index();
                            var el_class = ui.item.attr('class');
                            var tmp = el_class.split('_');
                            var el_id = tmp[1];


                            $.ajax({
                                'url': '" . $this->url . "',
                                'type': 'post',
                                'data': {index:el_index,id:el_id,model:'".$this->model_name."'".$cond."},
                                'success': function(data){
                                    //alert(data);
                                     $('#".$this->id." table.items tbody tr:even').css('background','#eee');
                                     $('#".$this->id." table.items tbody tr:odd').css('background','#F8F8F8');
                                },
                                'error': function(request, status, error){
                                    //alert('We are unable to set the sort order at this time.  Please try again in a few minutes.');
                                }
                            });
                        },
                        helper: fixHelper
                    }).disableSelection();

                    $('#".$this->id." table.items tbody tr:even').css('background','#eee');
                    $('#".$this->id." table.items tbody tr:odd').css('background','#F8F8F8');
        ";
        Yii::app()->clientScript->registerScript('sortable-project', $str_js);
        Yii::app()->clientScript->registerCoreScript('jquery.ui');
        
    }
}